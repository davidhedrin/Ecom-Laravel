@push('styles')
@endpush
<div>
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
</div>
@push('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type='text/javascript'>
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'Y-MM-DD h:m:s',
        })
        .on('dp.change', function(ev){
            var data = $('#datetimepicker1').val();
            @this.set('sale_date', data);
        });
    });
</script> --}}
@endpush