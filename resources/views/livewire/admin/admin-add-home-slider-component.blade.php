<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>New Home Slider Form</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.homeslider') }}" type="button" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" wire:submit.prevent="addSlide">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="col-form-label" for="val-sku">Status: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control-sm" name="" id="" wire:model="status" required >
                                        <option value="" selected disabled>Select Status Slider</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label" for="val-sku">Type Align Text: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <select class="form-control-sm" name="" id="" wire:model="type_slide" required >
                                        <option value="" selected disabled>Select Type Slider</option>
                                        <option value="1">Slider 1 (Center)</option>
                                        <option value="3">Slider 2 (Left)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-sku">Title: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Title Slider" wire:model="title" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-qty">Subtitle: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Subtitle Slider" wire:model="subtitle" required />
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-sku">Price: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Rp" type-currency="IDR" wire:model="price" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="val-qty">Link: <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <input type="text" class="form-control input-default" placeholder="Enter Link Slider" wire:model="link" required />
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div>
                                <label class="col-form-label" for="val-productImage"><i class="fa fa-paperclip m-r-5 f-s-18"></i> Slider Image: <span class="text-danger">*</span></label>
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
