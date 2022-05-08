<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>New Product Form</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.products') }}" type="button" class="btn btn-success btn-sm">All Products</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-sku">SKU: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter SKU Product" wire:model="SKU" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-qty">Quantity: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Quantity Product" wire:model="quantity" required />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-nameProduct">Product Name: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Product Name" wire:model="name" wire:keyup="generateSlug" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-slugProduct">Product Slug: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Product Slug" wire:model="slug" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-regPrice">Regular Price: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="regular_price" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-salePrice">Sale Price:
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="sale_price" />
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-featured">Featured: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="featured" required >
                                        <option value="" selected disabled>Select Featured Product</option>
                                        <option value="0">No</option>
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-shortDesc">Short Description: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input class="form-control input-default" placeholder="Enter Short Description" wire:model="short_desc" required />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <label class="col-form-label" for="val-Description">Description: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <textarea rows="4" class="form-control input-default" placeholder="Enter Description Product" wire:model="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div>
                                <label class="col-form-label" for="val-productImage"><i class="fa fa-paperclip m-r-5 f-s-18"></i> Product Image: <span class="text-danger">*</span></label>
                            </div>
                            <div>
                                <input class="l-border-1" type="file" name="" id="" wire:model="image" required >
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120">
                                @endif
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
</div>

@push('scripts')
@endpush