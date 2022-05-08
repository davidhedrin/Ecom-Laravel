<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function soreCategory()
    {
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        $this->name = null;
        $this->slug = null;
        session()->flash('message', 'Category has been created successfully!');
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('msgDelete', 'has been deleted successfully!');
        session()->flash('msgDeleteId', $id);
    }
    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.baseAdmin');
    }
}
