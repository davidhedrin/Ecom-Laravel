<div class="wrap-icon-section {{ Cart::instance('cart')->count() > 0 ? 'minicart' : 'wishlist' }}">
    <a href="/cart" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true" style="color: {{ Cart::instance('cart')->count() > 0 ? '#ff3007':'' }} !important;"></i>
        <div class="left-info">
            @if (Cart::instance('cart')->count() > 0)
                <span class="index">{{ Cart::instance('cart')->count() }} {{ Cart::instance('cart')->count() > 1 ? 'item':'items' }}</span>
            @else
                <span class="index">0 item</span>
            @endif
            <span class="title">CART</span>
        </div>
    </a>
</div>