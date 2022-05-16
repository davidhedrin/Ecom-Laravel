<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Edit Coupon</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.coupons') }}" type="button" class="btn btn-success btn-sm">All Coupon</a>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateCoupon">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label">Coupon Code: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" wire:model="code"  placeholder="Enter coupon code" />
                                    @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Coupon Type: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" wire:model="type">
                                        <option value="" selected disabled>Select type</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label">Coupon Value: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" wire:model="value"  placeholder="Enter coupon value" />
                                    @error('value') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Cart Value: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" wire:model="cart_value"  placeholder="Enter cart value" />
                                    @error('cart_value') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 text">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>