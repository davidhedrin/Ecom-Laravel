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
                                    <th>Name</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="rowCategory" onclick="window.location='{{ route('admin.orderdetails',['order_id'=>$order->id]) }}'">
                                        <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                        <td>{{ currency_IDR($order->subtotal) }}</td>
                                        <td>{{ currency_IDR($order->discount) }}</td>
                                        <td>{{ currency_IDR($order->tax) }}</td>
                                        <td>{{ currency_IDR($order->total) }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td><div class="badge badge-warning" style="color: white">{{ $order->status }}</div></td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
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
