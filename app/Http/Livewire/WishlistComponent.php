<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use Cart;

class WishlistComponent extends Component
{
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-count-component', 'refrenshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $sale = Sale::find(1);
        return view('livewire.wishlist-component', ['sale'=>$sale])->layout('layouts.base');
    }
}
