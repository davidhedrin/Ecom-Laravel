<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Wishlist</span></li>
            </ul>
        </div>
        
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

        <div class="row">
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
                    <h3>No item in your Wishlist</h3>
                    <a class="link-to-shop" href="/shop">Continue Shopping <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            @endif
        </div>
    </div>
</main>