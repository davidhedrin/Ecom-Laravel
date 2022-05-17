<div>
    {{-- <div class="row">
        <div class="col-12 m-b-30">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>Your Products:</h4> 
                </div>
            </div>
            <div class="row">
                @foreach ($popular_product as $p_product)
                    <div class="col-lg-3">
                        <div class="card">
                            <img class="img-fluid" src="{{ asset('assets/images/products') }}/{{ $p_product->image }}" alt="{{ $p_product->name }}">
                            <div class="card-body">
                                <span class="badge badge-{{ $p_product->stock_status == 'instock' ? 'success':'danger' }}" style="color: white">{{ $p_product->stock_status }}</span>
                                @if ($p_product->sale_price > 0)
                                    <del><p class="pt-2 card-text">{{ currency_IDR($p_product->regular_price) }}</p></del>
                                    <p class="card-title" style="font-weight: bold; color:rgb(228, 148, 0);">{{ currency_IDR($p_product->sale_price) }}</p>
                                @else
                                    <p class="pt-2 card-title" style="font-weight: bold; color:rgb(228, 148, 0);">{{ currency_IDR($p_product->regular_price) }}</p>
                                @endif
                                <a class="card-text pt-0" href="{{ route('admin.editproduct', ['product_slug' => $p_product->slug]) }}" style="color:black; font-size: 13pt">{{ $p_product->name }}</a>
                                <p style="font-size: 10pt">{{ $p_product->category->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>All Products</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.addproduct') }}" type="button" class="btn btn-success btn-sm">Add New</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" alt=""></td>
                                        <td>{{ $product->name }}</td>
                                        <td><span class="badge badge-{{ $product->stock_status == 'instock' ? 'success':'danger' }}">{{ $product->stock_status }}</span></td>
                                        <td>{{ currency_IDR($product->regular_price) }}</td>
                                        <td>{{ currency_IDR($product->sale_price) }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}" class="pr-2"><i class="fa fa-edit" style="color: rgb(255, 170, 0)"></i></a>
                                            <a href="#" wire:click.prevent="deleteProduct({{ $product->id }})"><i class="fa fa-trash" style="color: red"></i></a>
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