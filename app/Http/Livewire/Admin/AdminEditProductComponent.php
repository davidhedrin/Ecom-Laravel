<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name; 
    public $slug; 
    public $short_desc; 
    public $description; 
    public $regular_price; 
    public $sale_price; 
    public $SKU; 
    public $stock_status; 
    public $featured; 
    public $quantity; 
    public $image; 
    public $category_id;
    public $newimage;
    public $product_id;

    public function mount($product_slug)
    {
        $prodct = Product::where('slug', $product_slug)->first();
        $this->name = $prodct->name;
        $this->slug = $prodct->slug;
        $this->short_desc = $prodct->short_desc;
        $this->description = $prodct->description;
        $this->regular_price = $prodct->regular_price;
        $this->sale_price = $prodct->sale_price;
        $this->SKU = $prodct->SKU;
        $this->stock_status = $prodct->stock_status;
        $this->featured = $prodct->featured;
        $this->quantity = $prodct->quantity;
        $this->image = $prodct->image;
        $this->category_id = $prodct->category_id;
        $this->product_id = $prodct->id;

    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_desc'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
            //'newimage'=>'required|mimes:jpeg,png',
            'category_id'=>'required'
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_desc'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
            //'newimage'=>'required|mimes:jpeg,png',
            'category_id'=>'required'
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_desc = $this->short_desc;
        $product->description = $this->description;
        $product->regular_price = currencyIDRToNumeric($this->regular_price);
        if($this->sale_price != null){
            $product->sale_price = currencyIDRToNumeric($this->sale_price);
        }else{
            $product->sale_price = $this->sale_price;
        }
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('messageEditProd', 'Product has been UPDATE successfully!');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories])->layout('layouts.baseAdmin');
    }
}
