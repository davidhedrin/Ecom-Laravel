<div>
    <style>
        .rowCategory{
            cursor: pointer;
            transition: 0.3s all;
        }
        .rowCategory:hover{
            background-color: rgb(227, 241, 255) !important;
            font-weight: bold;
            font-size: 10pt;
            transition: 0.3s all;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
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
                                    <tr class="rowCategory" onclick="window.location='{{ route('user.orderdetails',['order_id'=>$order->id]) }}'">
                                        <td>{{ $noList++ }}</td>
                                        <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                                        <td>{{ currency_IDR($order->subtotal) }}</td>
                                        <td>{{ currency_IDR($order->discount) }}</td>
                                        <td>{{ currency_IDR($order->tax) }}</td>
                                        <td>{{ currency_IDR($order->total) }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>
                                            <div style="color: {{ $order->status == "ordered" ? "orange" : ($order->status == "delivered" ? "green" : ($order->status == "cenceled" ? "red" : "")) }}; font-weight: 800">
                                                {{ $order->status == "ordered" ? "ordered" : ($order->status == "delivered" ? "delivered" : ($order->status == "cenceled" ? "canceled" : "")) }}
                                            </div>
                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links('pagination-links') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
