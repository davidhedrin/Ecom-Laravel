<main id="main" class="main-site left-sidebar">
    <div class="container">
        
        <style>
            .product-wish{
                position: absolute;
                top: 10%;
                left: 0;
                z-index: 99;
                right: 30px;
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color: #cbcbcb;
                font-size: 28px;
            }
            .product-wish .fa:hover{
                color: #ff3007;
            }
            .fill-heart{
                color: #ff3007 !important;
            }
        </style>

        <div class="row" style="padding-top: 5%">
            @if (Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @foreach (Cart::instance('wishlist')->content() as $item) 
                        <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}" title="{{ $item->model->name }}">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    @if ($item->model->sale_price > 0 && $sale->status == 0 && $sale->sale_date > Carbon\Carbon::now())
                                        <del><p>{{ currency_IDR($item->model->regular_price) }}</p></del>
                                        <h4 style="font-weight: bold; color:rgb(228, 148, 0);">{{ currency_IDR($item->model->sale_price) }}</h4>
                                    @else
                                        <p style="color: white">1</p>
                                        <h4 style="font-weight: bold; color:rgb(228, 148, 0);">{{ currency_IDR($item->model->regular_price) }}</h4>
                                    @endif
                                    <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}"><span>{{ $item->model->name }}</span></a>
                                    <div class="wrap-price">Stock: <span class="product-price" style="color: {{ $item->model->stock_status == 'instock' ? 'rgb(53, 228, 0)' : 'red' }}">{{ $item->model->stock_status }}</span></div>
                                    <div class="product-rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <a href="#" class="count-review">(05 review)</a>
                                    </div>
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowId }}')">Move To Cart</a>
                                    <div class="product-wish">
                                        <a href="#" wire:click.prevent="removeFromWishlist({{ $item->model->id }})"><i class="fa fa-heart fill-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center">
                    <img src="{{ asset('assets/images/emptyWishlist.png') }}" width="400" alt="">
                    <h3>No item in your Wishlist</h3>
                    <a class="link-to-shop" href="/shop">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            @endif
        </div>

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
</main>