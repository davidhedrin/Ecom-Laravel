<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="display-5"><i class="fa-regular fa-calendar-check gradient-1-text"></i></span>
                                <h5>Order Date</h5>
                                <h3>{{ $order->created_at }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                @if ($order->status == "delivered")
                                    <span class="display-5"><i class="fa-solid fa-truck-fast gradient-1-text"></i></span>
                                @elseif ($order->status == "cenceled")
                                    <span class="display-5"><i class="fa-solid fa-truck-arrow-right gradient-1-text"></i></span>
                                @else
                                    <span class="display-5"><i class="fa-solid fa-boxes-packing gradient-4-text"></i></span>
                                @endif
                                <h5>Status</h5>
                                @if ($order->status == "delivered")
                                    <h3>Delivered</h3>
                                @elseif ($order->status == "cenceled")
                                    <h3>Canceled</h3>
                                @else
                                    <h3>Ordered</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="display-5"><i class="fa-regular fa-calendar-days {{ $order->status == "ordered" ? "gradient-4-text":"gradient-1-text" }}"></i></span>
                                @if ($order->status == "delivered")
                                    <h5>Delivery Date</h5>
                                    <h3>{{ $order->delivered_date }}</h3>
                                @elseif ($order->status == "cenceled")
                                    <h5>Canceled Date</h5>
                                    <h3>{{ $order->canceled_date }}</h3>
                                @else
                                    <h5>Deliver/Cancel Date</h5>
                                    <h3>-</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                        <td>x {{ $item->quantity }}</td>
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
                <div id="accordion-two" class="accordion">
                    <div class="card-body">
                        <div>
                            <h4 class="collapsed" data-toggle="collapse" data-target="#billingDetails" aria-expanded="true" aria-controls="billingDetails">
                                <i class="fa" aria-hidden="true"></i> Billing Details
                            </h4>
                        </div>
                        <div id="billingDetails" class="collapse" data-parent="#accordion-two">
                            <div class="row mt-3">
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

            <div class="card">
                <div id="accordion-two" class="accordion">
                    <div class="card-body">
                        <div>
                            <h4 class="collapsed" data-toggle="collapse" data-target="#shippingDetail" aria-expanded="false" aria-controls="shippingDetail">
                                <i class="fa" aria-hidden="true"></i> Shipping Details
                            </h4>
                        </div>
                        <div id="shippingDetail" class="collapse" data-parent="#accordion-two">
                            <div class="mt-3">
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
