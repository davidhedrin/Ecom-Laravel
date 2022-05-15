<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refrenshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refrenshComponent');
    }

    public function destroyItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refrenshComponent');
        session()->flash('success_message', 'Item has been removed');
    }

    public function destroyAllItems()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refrenshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
