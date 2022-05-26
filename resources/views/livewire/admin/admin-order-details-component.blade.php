<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Order Details</h4> 
                    </div>
                    <div>
                        <a href="{{ route('admin.orders') }}" type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-chevron-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
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
                                        <td>{{ $item->quantity }}</td>
                                        <td class="text-right">{{ currency_IDR($item->price * $item->quantity) }}</td>
                                        {{-- <td>
                                            <span class="badge badge-primary px-2">Sale</span>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <div class="pt-2">
                        <h4>Order Summary</h4>
                        <div class="pt-1 d-flex justify-content-between">
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
            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Billing Details</h4>
                    </div>
                </div>
                <div class="card-body">
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

            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <div>
                        <h4>Shipping Details</h4>
                    </div>
                </div>
                <div class="card-body">
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

            <div class="card">
                <div class="card-body pb-0 d-flex justify-content-between" style="vertical-align: middle;">
                    <h4>Transaction</h4>
                    @if ($order->transaction->mode == "cod")
                        <img src="{{ asset('assets/images/checkout/checkout.png') }}" width="150" alt="Checkout">
                    @elseif ($order->transaction->mode == "card")
                        <img src="{{ asset('assets/images/checkout/card.png') }}" width="130" alt="">
                    @endif
                </div>
                <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
