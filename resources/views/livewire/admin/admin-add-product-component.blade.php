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
                                    <input type="text" class="form-control input-default" placeholder="Enter SKU Product" wire:model="SKU" />
                                    @error('SKU')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-qty">Quantity: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Quantity Product" wire:model="quantity" />
                                    @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-nameProduct">Product Name: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Product Name" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-slugProduct">Product Slug: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Product Slug" wire:model="slug" disabled />
                                    @error('slug')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-regPrice">Regular Price: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="regular_price" />
                                    @error('regular_price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-salePrice">Sale Price:
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="sale_price" />
                                    @error('sale_price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-stockProduct">Stock Product: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="stock_status">
                                        <option value="" selected disabled>Select Stock Product</option>
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-featured">Featured:
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="featured">
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <label class="col-form-label" for="val-category">Category: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control input-default" name="" id="" wire:model="category_id" required >
                                        <option value="" selected disabled>Select Category Product</option>
                                        @foreach ($categories as $categ)
                                            <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label class="col-form-label" for="val-shortDesc">Short Description: <span class="text-danger">*</span>
                            </label>
                            <div wire:ignore>
                                <textarea id="short_desc" class="form-control input-default" placeholder="Enter Short Description" wire:model="short_desc"></textarea>
                                @error('short_desc')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label class="col-form-label" for="val-Description">Description: <span class="text-danger">*</span>
                            </label>
                            <div wire:ignore>
                                <textarea rows="4" id="description" class="form-control input-default" placeholder="Enter Description Product" wire:model="description"></textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="pt-3">
                            <div>
                                <label class="col-form-label" for="val-productImage"><i class="fa fa-paperclip m-r-5 f-s-18"></i> Product Image: <span class="text-danger">*</span></label>
                            </div>
                            <div>
                                <input class="l-border-1" type="file" name="" id="" wire:model="image" >
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120">
                                @endif
                            </div>
                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
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
    <script>
        $(function(){
            tinymce.init({
                selector: '#short_desc',
                setup: function(editor){
                    editor.on('change', function(e){
                       tinyMCE.triggerSave();
                       var sd_data = $('#short_desc').val();
                       @this.set('short_desc', sd_data);
                    });
                }
            });

            tinymce.init({
                selector: '#description',
                setup: function(editor){
                    editor.on('change', function(e){
                       tinyMCE.triggerSave();
                       var d_data = $('#description').val();
                       @this.set('description', d_data);
                    });
                }
            });
        });
    </script>
@endpush