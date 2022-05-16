<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;

class AdminCouponsComponent extends Component
{
    use WithPagination;

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('msgDeleteCoup', 'Coupon has been DELETED successfully!');
        session()->flash('msgDeleteId', $coupon_id);
    }

    public function render()
    {
        $coupons = Coupon::paginate(10);
        return view('livewire.admin.admin-coupons-component', ['coupons'=>$coupons])->layout('layouts.baseAdmin');
    }
}
