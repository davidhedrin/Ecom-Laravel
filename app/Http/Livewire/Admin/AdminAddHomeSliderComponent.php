<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $type_slide;

    public function mount()
    {
        $this->status = '';
        $this->type_slide = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'=>'required',
            'subtitle'=>'required',
            'price'=>'required',
            'link'=>'required',
            'image'=>'required|mimes:jpeg,png',
            'status'=>'required',
            'type_slide'=>'required'
        ]);
    }
    public function addSlide()
    {
        $this->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'price'=>'required',
            'link'=>'required',
            'image'=>'required|mimes:jpeg,png',
            'status'=>'required',
            'type_slide'=>'required'
        ]);
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = currencyIDRToNumeric($this->price);
        $slider->link = $this->link;
        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imagename);
        $slider->image = $imagename;
        $slider->status = $this->status;
        $slider->type_slide = $this->type_slide;
        $slider->save();
        session()->flash('messageAddSlider', 'Slider has been CREATED successfully!');
        return redirect()->route('admin.homeslider');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.baseAdmin');
    }
}
