<div>
    <style>
        .rowCategory{
            cursor: pointer;
            transition: 0.3s all;
        }
        .rowCategory:hover{
            background-color: rgb(227, 241, 255) !important;
            font-weight: bold;
            font-size: 11pt;
            transition: 0.3s all;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Home Sale Setting</h4> 
                    </div>
                    {{-- <div>
                        <a href="{{ route('admin.addproduct') }}" type="button" class="btn btn-success btn-sm">Add New</a>
                    </div> --}}
                </div>
                <div class="card-body">
                    @if (Session::has('messageUpdSale'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Updated!</strong> {{ Session::get('messageUpdSale') }}
                        </div>
                    @endif
                    <form action="" wire:submit.prevent="updateSale">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label">Status: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" wire:model="status" required >
                                        <option value="" selected disabled>Select status Sale</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Sale Date: <span class="text-danger">*</span> <span style="font-style: italic">(year-mounth-day house:minute:second)</span></label>
                                <div>
                                    <input type="text" id='datetimepicker1' class="form-control input-default" wire:model="sale_date">
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>All Sales Products</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.products') }}" type="button" class="btn btn-success btn-sm">All Products</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Deleted!</strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    @if (Session::has('messageAddProd'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>New Product!</strong> {{ Session::get('messageAddProd') }}
                        </div>
                    @endif
                    @if (Session::has('messageEditProd'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Edit Product!</strong> {{ Session::get('messageEditProd') }}
                        </div>
                    @endif
                    @if (Session::has('messageDelProd'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Deleted! </strong>Product ID: <strong>{{ Session::get('messageDelProdId') }}</strong> {{ Session::get('messageDelProd') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    {{-- <th>Date</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="rowCategory" onclick="window.location='{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}'">
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" alt=""></td>
                                        <td>{{ $product->name }}</td>
                                        <td><span class="badge badge-{{ $product->stock_status == 'instock' ? 'success':'danger' }}">{{ $product->stock_status }}</span></td>
                                        <td>{{ currency_IDR($product->regular_price) }}</td>
                                        <td>{{ currency_IDR($product->sale_price) }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        {{-- <td>{{ $product->created_at }}</td> --}}
                                        <td class="text-center">
                                            <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}" class="pr-2"><i class="fa fa-edit" style="color: rgb(255, 170, 0)"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    {{-- <th>Date</th> --}}
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $products->links('pagination-links') }}
                </div>
            </div>
        </div>
    </div>
</div>
