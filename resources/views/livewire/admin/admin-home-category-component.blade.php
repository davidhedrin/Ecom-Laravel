@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Manage Home Categories</h4> 
                    </div>
                    {{-- <div>
                        <a href="{{ route('admin.addproduct') }}" type="button" class="btn btn-success btn-sm">Save</a>
                    </div> --}}
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Updated!</strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="" wire:submit.prevent="updateHomeCategory">
                        <div class="form-group">
                            <label class="col-form-label" for="val-qty">No of Products: <span class="text-danger">*</span>
                            </label>
                            <div>
                                <input type="text" class="form-control-sm input-default" placeholder="Count To Display" wire:model="numberofproducts" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" wire:ignore>
                                <label class="col-form-label" for="val-sku">Choose Category <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select id="multipleSelectCateg" class="form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories_select as $categ)
                                            @php
                                                $c_products = DB::table('products')->where('category_id', $categ->id)->get()->take($no_of_products);
                                            @endphp
                                            <option value="{{ $categ->id }}" {{ $c_products->count() > 0 ? '':'disabled' }}>{{ $categ->name }} {{ $c_products->count() > 0 ? '':'(No product in this Category)' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="pb-2">
                        <h4>All Category Display</h4> 
                    </div>
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            @foreach ($categories as $key=>$categ)
                                @php
                                    $c_products = DB::table('products')->where('category_id', $categ->id)->get()->take($no_of_products);
                                @endphp
                                @if ($c_products->count() > 0)
                                    <li class="nav-item"><a class="nav-link {{ $key == 0 ? 'active':''}}" data-toggle="tab" href="#category_{{ $categ->id }}">{{ $categ->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($categories as $key=>$categ)
                                <div class="tab-pane fade show {{ $key == 0 ? 'active':''}}" id="category_{{ $categ->id }}" role="{{ $key == 0 ? 'tabpanel':''}}">
                                    @php
                                        $c_products = DB::table('products')->where('category_id', $categ->id)->get()->take($no_of_products);
                                    @endphp
                                    <div class="p-t-15">
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
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($c_products as $product)
                                                        <tr>
                                                            <td>{{ $product->id }}</td>
                                                            <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" alt=""></td>
                                                            <td>{{ $product->name }}</td>
                                                            <td><span class="badge badge-{{ $product->stock_status == 'instock' ? 'success':'danger' }}">{{ $product->stock_status }}</span></td>
                                                            <td>{{ currency_IDR($product->regular_price) }}</td>
                                                            <td>{{ currency_IDR($product->sale_price) }}</td>
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
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#multipleSelectCateg').select2();
        $('#multipleSelectCateg').on('change', function(e){
            var data = $('#multipleSelectCateg').select2("val");
            @this.set('selected_categories', data);
        });
    });
</script>
@endpush