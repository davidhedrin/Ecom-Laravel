<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->coupon_id = $coupon->id;
    }

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required',
            'cart_value'=>'required',
        ]); 
    }
    
    public function updateCoupon()
    {
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required',
            'cart_value'=>'required',
        ]);
        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('msgEditCoup', 'Coupon has been UPDATED successfully!');
        return redirect()->route("admin.coupons");
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.baseAdmin');
    }
}
