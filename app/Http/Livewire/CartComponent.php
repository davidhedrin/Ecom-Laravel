<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Sale;
use Cart;
use Carbon\Carbon;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function destroyItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed');
    }

    public function destroyAllItems()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if(!$coupon)
        {
            session()->flash('couponMessage', 'Coupon code is Invalid!');
            return;
        }

        session()->put('coupon', [
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value,
        ]);
    }

    public function calculateDiscounts()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }

            if($this->discount > Cart::instance('cart')->subtotal())
            {
                $this->subtotalAfterDiscount = 0;
                $this->taxAfterDiscount = (Cart::instance('cart')->subtotal() * config('cart.tax'))/100;
                $this->totalAfterDiscount = $this->taxAfterDiscount;
            }
            else
            {
                $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
                $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
                $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
            }
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon'))
        {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        }
        else
        {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else{
                $this->calculateDiscounts();
            }
        }
        
        $this->setAmountForCheckout();
        
        $popular_product = Product::inRandomOrder()->limit(10)->get();
        $sale = Sale::find(1);
        return view('livewire.cart-component', ['popular_product'=>$popular_product, 'sale'=>$sale])->layout('layouts.base');
    }
}
