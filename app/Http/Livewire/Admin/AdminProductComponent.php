<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('messageDelProd', 'has been deleted successfully!');
        session()->flash('messageDelProdId', $id);
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $popular_product = Product::inRandomOrder()->paginate(4);
        return view('livewire.admin.admin-product-component', ['products'=>$products, 'popular_product'=>$popular_product])->layout('layouts.baseAdmin');
    }
}
