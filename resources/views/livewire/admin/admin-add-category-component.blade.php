<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Add New Categories</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.categories') }}" type="button" class="btn btn-success btn-sm">All category</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Added!</strong> {{ Session::get('message') }}
                        </div>
                    @endif
                    <form id="addCate-form-admin" class="form-valide" action=""  wire:submit.prevent="soreCategory">
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
    </div>
    {{-- <div class="container" style="padding: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route("admin.categories") }}" class="pull-right"><i class="fa fa-close" style="font-size: 15px; color:black"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="soreCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Name:</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Category Slug:</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter category Slug" class="form-control input-md" wire:model="slug" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
