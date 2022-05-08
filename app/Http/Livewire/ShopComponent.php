<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 0;
        $this->max_price = 1000000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        // whereBetween('regular_price', [$this->min_price, $this->max_price])->
        if($this->sorting == 'date'){
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->sorting == 'price'){
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }else if($this->sorting == 'price-desc'){
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }else{
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }

        $categories = Category::all();
        $popular_product = Product::inRandomOrder()->where('stock_status', 'instock')->paginate(5);

        return view('livewire.shop-component', ['products' => $product, 'categories'=>$categories, 'popular_product'=>$popular_product])->layout('layouts.base');
    }
}
