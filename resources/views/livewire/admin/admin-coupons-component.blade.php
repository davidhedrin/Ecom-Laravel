@push('styles')
@endpush
<div>
    
    {{-- <div class="row" id="cardAddProduct">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Add New Categories</h4> 
                    </div>
                    <div>
                        <i class="fa fa-close" id="buttonCloseAddCateg" onclick="showHideAddCateg()"></i>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Added!</strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    <form id="addCate-form-admin" class="form-valide" action="" wire:submit.prevent="soreCategory">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-username">Category Name: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" wire:model="name" wire:keyup="generateslug"  placeholder="Enter category Name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-email">Category Slug: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter category Slug" wire:model="slug" disabled />
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
    </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>All Coupon</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.addcoupon') }}" type="button" class="btn btn-success btn-sm">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('msgDeleteCoup'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Deleted! </strong>Coupon ID: <strong>{{ Session::get('msgDeleteId') }}</strong> {{ Session::get('msgDeleteCoup') }}
                        </div>
                    @endif
                    @if (Session::has('msgAddCoup'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Added!</strong> {{ Session::get('msgAddCoup') }}
                        </div>
                    @endif
                    @if (Session::has('msgEditCoup'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Updated!</strong> {{ Session::get('msgEditCoup') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Value</th>
                                    <th>Cart Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td  style="color: rgb(23, 204, 10)">{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        @if ($coupon->type == 'fixed')
                                            <td>{{ currency_IDR($coupon->value) }}</td>
                                        @else
                                            <td>{{ $coupon->value }}%</td>
                                        @endif
                                        <td>{{ $coupon->cart_value }}</td>
                                        <td>
                                            <a href="{{ route('admin.editcoupon', ['coupon_id'=>$coupon->id]) }}" class="pr-2"><i class="fa fa-edit" style="color: rgb(255, 170, 0)"></i></a>
                                            <a href="#" wire:click.prevent="deleteCoupon({{ $coupon->id }})"><i class="fa fa-trash" style="color: red"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Code</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Value</th>
                                    <th>Cart Value</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $coupons->links('pagination-links') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
@endpush