<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\HomeCategory;
use App\Models\Category;
use App\Models\Sale;
use Cart;

class HomeComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component', 'refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $product = Product::all();
        $sliders = HomeSlider::where('status', 0)->get();

        // Latest Products
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);

        // Category Product
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_products;

        // On Sale
        $sproducts = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        return view(
            'livewire.home-component',
            [
                'products' => $product, 
                'sliders'=>$sliders,
                'lproducts'=>$lproducts,
                'categories'=>$categories,
                'no_of_products'=>$no_of_products,
                'sproducts'=>$sproducts,
                'sale'=>$sale
            ]
        )->layout('layouts.base');
    }
}
