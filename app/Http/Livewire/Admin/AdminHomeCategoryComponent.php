<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->numberofproducts = $category->no_of_products;
    }

    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();
        session()->flash('message', 'HomeCategory has been UPDATED successfully!');
        return redirect()->route('admin.homecategories');
    }
    public function render()
    {
        $categories_select = Category::all();
        $category = HomeCategory::find(1);
        
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_products;
        return view('livewire.admin.admin-home-category-component', ['categories_select'=>$categories_select, 'categories'=>$categories, 'no_of_products'=>$no_of_products])->layout('layouts.baseAdmin');
    }
}
