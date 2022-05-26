<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>All Orders</h4> 
                    </div>
                    {{-- <div>
                        <a href="{{ route('admin.addCategory') }}" type="button" class="btn btn-success btn-sm">Add New</a>
                    </div> --}}
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
                                    <th>Or-ID</th>
                                    <th>Name</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                        <td>{{ currency_IDR($order->subtotal) }}</td>
                                        <td>{{ currency_IDR($order->discount) }}</td>
                                        <td>{{ currency_IDR($order->tax) }}</td>
                                        <td>{{ currency_IDR($order->total) }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        {{-- <td>
                                            <a href="#" class="pr-2"><i class="fa fa-edit" style="color: rgb(255, 170, 0)"></i></a>
                                            <a href="#"><i class="fa fa-trash" style="color: red"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Or-ID</th>
                                    <th>Name</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                        {{ $orders->links('pagination-links') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
