<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Edit Product Form</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.products') }}" type="button" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-sku">SKU: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter SKU Product" wire:model="SKU" />
                                    @error('SKU')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-qty">Quantity: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Quantity Product" wire:model="quantity" />
                                    @error('quantity')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-nameProduct">Product Name: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Product Name" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-slugProduct">Product Slug: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Product Slug" wire:model="slug" disabled />
                                    @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-regPrice">Regular Price: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="regular_price" />
                                    @error('regular_price')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-salePrice">Sale Price:
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="sale_price" />
                                    @error('sale_price')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-stockProduct">Stock Product: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="stock_status" required >
                                        <option value="" selected disabled>Select Stock Product</option>
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-featured">Featured: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="featured" >
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-category">Category: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="category_id" required >
                                        <option value="" selected disabled>Select Category Product</option>
                                        @foreach ($categories as $categ)
                                            <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-shortDesc">Short Description: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input class="form-control input-default" placeholder="Enter Short Description" wire:model="short_desc" />
                                    @error('short_desc')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <label class="col-form-label" for="val-Description">Description: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <textarea rows="4" class="form-control input-default" placeholder="Enter Description Product" wire:model="description"></textarea>
                                    @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div>
                                <label class="col-form-label" for="val-productImage">Product Image: <span class="text-danger">*</span></label>
                            </div>
                            <div>
                                <input type="file" name="" id="" wire:model="newimage" >
                                @if ($newimage)
                                    <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                @else
                                    <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="120">
                                @endif
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
</div>

@push('scripts')
@endpush