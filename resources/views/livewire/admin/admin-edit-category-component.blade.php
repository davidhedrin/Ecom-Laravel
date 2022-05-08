<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Edit Categories</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.categories') }}" type="button" class="btn btn-success btn-sm">All category</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Edited!</strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    <form id="addCate-form-admin" class="form-valide" wire:submit.prevent="updateCategory">
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
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
