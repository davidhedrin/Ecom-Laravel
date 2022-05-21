@push('styles')
    <link href="{{ asset('admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
@endpush
<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Add New Coupon</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.coupons') }}" type="button" class="btn btn-success btn-sm">All Coupon</a>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="storeCoupon">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="col-form-label">Expiry Date: <span class="text-danger">*</span>
                                </label>
                                <div wire:ignore>
                                    <input type="text" id="mdate" class="form-control input-default" wire:model="expiry_date"  placeholder="Set expiry coupon" />
                                    @error('expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
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
                                        <option value="">Select type</option>
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
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('admin/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/form-pickers-init.js') }}"></script>
    <script>
        $(function(){
            $('#mdate').on('change', function(ev){
                var data = $('#mdate').val();
                @this.set('expiry_date', data);
            })
        });
    </script>
@endpush