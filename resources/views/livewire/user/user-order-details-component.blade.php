<div>
    <style>
        .table tr td{
            vertical-align: middle !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <strong>Order Details</strong>
                    </div>
                    <div class="panel-body">
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
