<main id="main" class="main-site">

    <div class="container">
        <div class=" main-content-area">

            {{-- @if (Auth::user()) --}}
                <div class="wrap-iten-in-cart" style="padding-top: 5%">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success </strong>{{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if (Cart::instance('cart')->count() > 0)
                        <div class="row" style="padding-bottom: 10px">
                            <div class="col-md-6">
                                <h3 class="box-title">Products Detail</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-danger btn-sm" href="#" wire:click.privent="destroyAllItems()">Clear Cart <i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <ul class="products-cart">
                            @foreach (Cart::instance('cart')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        @if ($item->model->sale_price > 0 && $sale->status == 0 && $sale->sale_date > Carbon\Carbon::now())
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
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ currency_IDR(Cart::instance('cart')->subtotal()) }}</b></p>
                                @if (Session::has('coupon'))
                                    <p class="summary-info"><span class="title" style="color: rgb(23, 204, 10)">Discount  ({{ Session::get('coupon')['code'] }}) <a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger" style="color: rgb(23, 204, 10)"></i></a></span><b class="index" style="color: rgb(23, 204, 10)">- {{ currency_IDR($discount) }}</b></p>
                                    <p class="summary-info"><strong class="title">Subtotal with Discount</strong><b class="index">{{ currency_IDR($subtotalAfterDiscount) }}</b></p>
                                    <p class="summary-info"><span class="title">Tax ({{ config("cart.tax") }}%)</span><b class="index">{{ currency_IDR($taxAfterDiscount) }}</b></p>
                                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{ currency_IDR($totalAfterDiscount) }}</b></p>
                                @else
                                    <p class="summary-info"><span class="title">Tax ({{ config("cart.tax") }}%)</span><b class="index">{{ currency_IDR((Cart::instance('cart')->subtotal() * config("cart.tax"))/100) }}</b></p>
                                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{ currency_IDR(Cart::instance('cart')->total()) }}</b></p>
                                @endif
                            </div>
                            <div class="checkout-info">
                                @if (!Session::has('coupon'))
                                    <label class="checkbox-field">
                                        <input class="frm-input" name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode" />
                                        <span>I have coupon code</span>
                                    </label>
                                    @if ($haveCouponCode == 1)
                                        <div class="summary-item">
                                            <form wire:submit.prevent="applyCouponCode">
                                                <h4 class="title-box">Coupon Code</h4>
                                                @if (Session::has('couponMessage'))
                                                    <div class="alert alert-danger" role="danger">
                                                        <strong>Opss! </strong>{{ Session::get('couponMessage') }}
                                                    </div>
                                                @endif
                                                <p class="row-in-form">
                                                    <label for="coupon-code">
                                                        Enter your coupon code:
                                                    </label>
                                                    <input type="text" name="coupon-code" wire:model="couponCode" />
                                                </p>
                                                <button type="submit" class="btn btn-small">Apply</button>
                                            </form>
                                        </div>  
                                    @endif
                                @endif
                                <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                            </div> 
                            {{-- <a class="btn btn-update" href="#">Update Shopping Cart</a> --}}
                        </div>
                    @else
                        <div class="text-center">
                            <img src="{{ asset('assets/images/emptyCart.png') }}" width="350" alt="">
                            <h3>No item in your Cart</h3>
                            <a class="btn btn-success link-to-shop" href="/shop">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    @endif
                    
                    <hr>
                    <div wire:ignore class="wrap-show-advance-info-box style-1 box-in-site">
                        <h3 class="title-box">Most Viewed Products</h3>
                        <div class="wrap-products">
                            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                                @foreach ($popular_product as $p_product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details', ['slug'=>$p_product->slug]) }}" title="{{ $p_product->name }}">
                                                <figure><img src="{{ asset('assets/images/products') }}/{{ $p_product->image }}" width="214" height="214" alt="{{ $p_product->name }}"></figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="{{ route('product.details', ['slug'=>$p_product->slug]) }}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', ['slug'=>$p_product->slug]) }}" class="product-name"><span>{{ $p_product->name }}</span></a>
                                            <div class="wrap-price"><span class="product-price">{{ currency_IDR($p_product->regular_price) }}</span></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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