<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

            {{-- @if (Auth::user()) --}}
                <div class="wrap-iten-in-cart">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success </strong>{{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if (Cart::count() > 0)
                        <div class="row" style="padding-bottom: 10px">
                            <div class="col-md-6">
                                <h3 class="box-title">Products Detail</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-danger btn-sm" href="#" wire:click.privent="destroyAllItems()">Clear Cart <i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <ul class="products-cart">
                            @foreach (Cart::content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        @if ($item->model->sale_price > 0)
                                            <div class="text-left">
                                                <span><del style="font-size: 12px">{{ currency_IDR($item->model->regular_price) }}</del></span>
                                                <p class="price">{{ currency_IDR($item->model->sale_price) }}</p>
                                            </div>
                                        @else
                                            <div class="text-left">
                                                <p class="price">{{ currency_IDR($item->model->regular_price) }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" disabled />									
                                            <a class="btn btn-increase" href="" wire:click.privent="increaseQuantity('{{ $item->rowId }}')"></a>
                                            <a class="btn btn-reduce" href="" wire:click.privent="decreaseQuantity('{{ $item->rowId }}')"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">{{ currency_IDR($item->subtotal) }}</p></div>
                                    <div class="delete">
                                        <a href="#" class="btn btn-delete" title="" wire:click.privent="destroyItem('{{ $item->rowId }}')">
                                            <span>Delete from your cart</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach											
                        </ul>
                        
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">Rp. {{ Cart::subtotal() }}</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b class="index">Rp. {{ Cart::tax() }}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info total-info "><span class="title">Total</span><b class="index">Rp. {{ Cart::total() }}</b></p>
                            </div>
                            <div class="checkout-info">
                                <label class="checkbox-field">
                                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                                </label>
                                <a class="btn btn-checkout" href="checkout.html">Check out</a>
                            </div>
                            {{-- <a class="btn btn-update" href="#">Update Shopping Cart</a> --}}
                        </div>
                        
                        <div class="wrap-show-advance-info-box style-1 box-in-site">
                            <h3 class="title-box">Most Viewed Products</h3>
                            <div class="wrap-products">
                                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_3.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products/digital_5.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <h3>No item in your Cart</h3>
                            <a class="link-to-shop" href="/shop">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    @endif
                </div>
            {{-- @else
                <div class="text-center">
                    <h3>You are not yet Login</h3>
                    <a class="link-to-shop" href="{{ route('login') }}">Login here <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            @endif --}}
        </div>
    </div>

</main>