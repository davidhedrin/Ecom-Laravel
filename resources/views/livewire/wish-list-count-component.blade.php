<div class="wrap-icon-section {{ Cart::instance('wishlist')->count() > 0 ? 'minicart' : 'wishlist' }}">
    <a href="{{ route('product.wishlist') }}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true" style="color: {{ Cart::instance('wishlist')->count() > 0 ? '#ff3007':'' }} !important;"></i>
        <div class="left-info">
            @if (Cart::instance('wishlist')->count() > 0)
                <span class="index">{{ Cart::instance('wishlist')->count() }} {{ Cart::instance('wishlist')->count() == 1 ? 'item':'items' }}</span>
            @else
                <span class="index">0 item</span>
            @endif
            <span class="title">Wishlist</span>
        </div>
    </a>
</div>