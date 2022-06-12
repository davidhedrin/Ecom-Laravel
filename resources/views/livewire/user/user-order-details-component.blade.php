<div>
    <style>
        .table tr td{
            vertical-align: middle !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        @if (Session::has('order_msg'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('order_msg') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <strong>Order Date</strong>
                    </div>
                    <div class="panel-body">
                        <h3><strong>{{ $order->created_at }}</strong></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <strong>Order Status</strong>
                    </div>
                    <div class="panel-body">
                        @if ($order->status == "delivered")
                            <h3 style="color: green"><strong>Delivered</strong></h3>
                        @elseif ($order->status == "cenceled")
                            <h3 style="color: red"><strong>Canceled</strong></h3>
                        @else
                            <h3 style="color: orange"><strong>Ordered</strong></h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        @if ($order->status == "delivered")
                            <strong>Delivery Date</strong>
                        @elseif ($order->status == "cenceled")
                            <strong>Canceled Date</strong>
                        @else
                            <strong>Deliver/Cancel Date</strong>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if ($order->status == "delivered")
                            <h3><strong>{{ $order->delivered_date }}</strong></h3>
                        @elseif ($order->status == "cenceled")
                            <h3><strong>{{ $order->canceled_date }}</strong></h3>
                        @else
                            <h3><strong>-</strong></h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Order Details</strong>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.orders') }}" class="btn btn-warning btn-sm pull-right" style="margin-left: 10px">Back</a>
                                @if ($order->status == 'ordered')
                                    <a href="#" wire:click.prevent="cancelOrder" class="btn btn-danger btn-sm pull-right">Cancel Order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('msg_review'))
                            <p class="alert alert-success" role="alert">{{ Session::get('msg_review') }}</p>
                        @endif
                        <table class="table">
                            @foreach ($order->OrderItems as $item)
                                <tr>
                                    <th style="vertical-align: middle;">{{ $item->product->SKU }}</th>
                                    <td>
                                        <img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}" width="70" alt="{{ $item->product->name }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editproduct', ['product_slug'=>$item->product->slug]) }}">{{ $item->product->name }}</a>
                                    </td>
                                    <td>{{ currency_IDR($item->price) }}</td>
                                    <td>x {{ $item->quantity }}</td>
                                    <td class="text-right">{{ currency_IDR($item->price * $item->quantity) }}</td>
                                    @if ($order->status == 'delivered' && $item->rstatus == false)
                                        <td class="text-right"><a href="{{ route('user.review', ['order_item_id'=>$item->id]) }}"><strong>Write Review</strong></a></td>
                                    @elseif ($order->status == 'ordered' || $order->status == 'cenceled' && $item->rstatus == false)
                                    @else
                                        <td class="text-right"><strong>Reviewed</strong></td>
                                    @endif
                                    {{-- <td>
                                        <span class="badge badge-primary px-2">Sale</span>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </table>
                        <hr>
                        <div class="pt-2">
                            <strong>Order Summary</strong>
                            <div class="pt-3 d-flex justify-content-between">
                                <span>Subtotal </span><b class="index">{{ currency_IDR($order->subtotal) }}</b>
                            </div>
                            <div class="pt-1 d-flex justify-content-between">
                                <span>Tax </span><b class="index">{{ currency_IDR($order->tax) }}</b>
                            </div>
                            <div class="pt-1 d-flex justify-content-between">
                                <span>Shipping </span><b class="index">Free Shipping</b>
                            </div>
                            <div class="pt-1 d-flex justify-content-between">
                                <span>Total </span><b class="index">{{ currency_IDR($order->total) }}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Billing Details</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>First Name</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->firstname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Name</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Line 1</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->line1 }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>City</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->city }}</td>
                                            </tr>
                                            <tr>
                                                <th>Province</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->province }}</td>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->country }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zip Code</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->zipcode }}</td>
                                            </tr>
                                            <tr>
                                                <th>Line 2</th>
                                                <td><strong>:</strong></td>
                                                <td>{{ $order->line2 }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Shipping Details</strong>
                    </div>
                    <div class="panel-body">
                        @if ($order->is_shipping_different)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>First Name</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->firstname }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Name</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->lastname }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->mobile }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Line 1</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->line1 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>City</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->city }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Province</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->province }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->country }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Zip Code</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->zipcode }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Line 2</th>
                                                    <td><strong>:</strong></td>
                                                    <td>{{ $order->shipping->line2 }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        @else
                            <hr style="margin-top: 0">
                            <div class="text-center">
                                <h3>No Shipping Details</h3>
                                <h5>Shipping address not created</h5>
                            </div>
                            <hr>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading d-flex justify-content-between">
                        <strong>Transaction</strong>
                        @if ($order->transaction->mode == "cod")
                            <img src="{{ asset('assets/images/checkout/checkout.png') }}" width="150" alt="Checkout">
                        @elseif ($order->transaction->mode == "card")
                            <img src="{{ asset('assets/images/checkout/card.png') }}" width="130" alt="">
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <td>{{ $order->transaction->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Date</th>
                                        <th>:</th>
                                        <td>{{ $order->transaction->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
