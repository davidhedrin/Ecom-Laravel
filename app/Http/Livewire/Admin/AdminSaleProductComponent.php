<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Livewire\WithPagination;

class AdminSaleProductComponent extends Component
{
    use WithPagination;
    public $sale_date;
    public $status;

    public function mount()
    {
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }

    public function updateSale()
    {
        $sale = Sale::find(1);
        $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        session()->flash('messageUpdSale', 'Record has been UPDATED successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('messageDelProd', 'has been deleted successfully!');
        session()->flash('messageDelProdId', $id);
    }
    public function render()
    {
        $products = Product::whereNotNull('sale_price')->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-sale-product-component', ['products'=>$products])->layout('layouts.baseAdmin');
    }
}
