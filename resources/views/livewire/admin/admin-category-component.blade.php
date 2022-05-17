@push('styles')
@endpush
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
    {{--  class="rowCategory" onclick="window.location='{{ route('admin.editcategory', ['category_slug'=>$categ->slug]) }}'" --}}
    
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
                        <h4>All Categories</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.addCategory') }}" type="button" class="btn btn-success btn-sm">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('msgDelete'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Deleted! </strong>Category ID: <strong>{{ Session::get('msgDeleteId') }}</strong> {{ Session::get('msgDelete') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categ)
                                    <tr>
                                        <td>{{ $categ->id }}</td>
                                        <td>{{ $categ->name }}</td>
                                        <td>{{ $categ->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.editcategory', ['category_slug'=>$categ->slug]) }}" class="pr-2"><i class="fa fa-edit" style="color: rgb(255, 170, 0)"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $categ->id }})"><i class="fa fa-trash" style="color: red"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $categories->links('pagination-links') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
{{-- <script>
    $( document ).ready(function() {
        var x = document.getElementById("cardAddProduct");
        x.style.display = "none";
    });
    function showHideAddCateg() {
        var x = document.getElementById("cardAddProduct");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script> --}}
{{-- <script>
    document.addEventListener('livewire:load', function () {
        $("#dataTable").DataTable({
            "columnDefs": [{
                "targets": [3],
                "orderable": false
            }]
        });
    });
</script> 
<script src="{{ asset('admin/plugins/tables/js/jquery.dataTables.min.js') }}"></sc>
<script src="{{ asset('admin/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
--}}
@endpush