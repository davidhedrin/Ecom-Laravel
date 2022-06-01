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
                    @if (Session::has('orderMsg'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                            <strong>Updated! </strong>{{ Session::get('orderMsg') }}
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
                                    <th><i class="fa-solid fa-circle-info"></i></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                        <td>{{ currency_IDR($order->subtotal) }}</td>
                                        <td>{{ currency_IDR($order->discount) }}</td>
                                        <td>{{ currency_IDR($order->tax) }}</td>
                                        <td>{{ currency_IDR($order->total) }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>
                                            <div class="badge {{ $order->status == "ordered" ? "badge-warning" : ($order->status == "delivered" ? "badge-success" : ($order->status == "cenceled" ? "badge-danger" : "")) }}" style="color: white">
                                                {{ $order->status == "ordered" ? "ordered" : ($order->status == "delivered" ? "delivered" : ($order->status == "cenceled" ? "canceled" : "")) }}
                                            </div>
                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.orderdetails',['order_id'=>$order->id]) }}"><i class="fa-solid fa-info"></i></a></td>
                                        <td>
                                            <div class="basic-dropdown">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Status</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'delivered')" style="pointer-events: {{ $order->status == "delivered" ? "none" : "" }}">Delivered <i class="fa-solid {{ $order->status == "delivered" ? "fa-check" : "" }} "></i></a> 
                                                        <a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'cenceled')"  style="pointer-events: {{ $order->status == "cenceled" ? "none" : "" }}">Canceled <i class="fa-solid {{ $order->status == "cenceled" ? "fa-check" : "" }} "></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
                                    <th><i class="fa-solid fa-circle-info"></i></th>
                                    <th>Action</th>
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
