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

    // Form Form Edit
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

    // For Display
    public $name_product;
    public $category_name;
    public $short_desc_text;
    public $description_text;
    public $regular_price_text;
    public $sale_price_text;
    public $SKU_text;
    public $stock_status_text;
    public $quantity_text;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        
        // Form Form Edit
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_desc = $product->short_desc;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;

        // For Display
        $this->name_product = $product->name;
        $this->category_name = $product->category->name;
        $this->short_desc_text = $product->short_desc;
        $this->description_text = $product->description;
        $this->regular_price_text = $product->regular_price;
        $this->sale_price_text = $product->sale_price;
        $this->SKU_text = $product->SKU;
        $this->stock_status_text = $product->stock_status;
        $this->quantity_text = $product->quantity;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'=>'required',
            'short_desc'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
            'category_id'=>'required'
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'name'=>'required',
            'short_desc'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
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
            $product->sale_price = null;
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
