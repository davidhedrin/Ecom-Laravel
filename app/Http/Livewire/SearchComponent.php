<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Sale;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cat;
    public $product_cat_id;
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
        $this->min_price = 0;
        $this->max_price = 10000000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }
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
        if($this->sorting == 'date'){
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name', 'like', '%'.$this->search.'%')->where('category_id', 'like', '%'.$this->product_cat_id.'%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->sorting == 'price'){
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name', 'like', '%'.$this->search.'%')->where('category_id', 'like', '%'.$this->product_cat_id.'%')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }else if($this->sorting == 'price-desc'){
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name', 'like', '%'.$this->search.'%')->where('category_id', 'like', '%'.$this->product_cat_id.'%')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }else{
            $product = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('name', 'like', '%'.$this->search.'%')->where('category_id', 'like', '%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }

        $categories = Category::all();
        $popular_product = Product::inRandomOrder()->where('stock_status', 'instock')->paginate(5);
        $sale = Sale::find(1);

        return view('livewire.search-component', 
        [
            'products' => $product, 
            'categories'=>$categories, 
            'popular_product'=>$popular_product,
            'sale'=>$sale,
        ])->layout('layouts.base');
    }
}
