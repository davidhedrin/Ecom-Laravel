<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="pleaceOrder">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                    @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                    @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess<span>*</span></label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1<span>*</span></label>
                                    <input type="text" name="add" value="" placeholder="Enter your address" wire:model="line1">
                                    @error('line1') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2</label>
                                    <input type="text" name="add" value="" placeholder="Enter your address" wire:model="line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="United States" wire:model="country">
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Province<span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="Province name" wire:model="province">
                                    @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP<span>*</span></label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                    @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Shipping Address --}}
                    @if ($ship_to_different)
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Shipping Address</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                                        @error('s_firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                                        @error('s_lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Addreess:</label>
                                        <input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                                        @error('s_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
                                        @error('s_mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Line 1:</label>
                                        <input type="text" name="add" value="" placeholder="Enter address" wire:model="s_line1">
                                        @error('s_line1') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Line 2</label>
                                        <input type="text" name="add" value="" placeholder="Enter address" wire:model="s_line2">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country<span>*</span></label>
                                        <input type="text" name="country" value="" placeholder="United States" wire:model="s_country">
                                        @error('s_country') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="province">Province<span>*</span></label>
                                        <input type="text" name="province" value="" placeholder="Province name" wire:model="s_province">
                                        @error('s_province') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Town / City<span>*</span></label>
                                        <input type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                                        @error('s_city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:</label>
                                        <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                        @error('s_zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                                    </p>
                                </div>
                            </div>
                        </div>    
                    @endif
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method<span class="text-danger">*</span></h4>
                        @error('paymentmode') <span class="text-danger">{{ $message }}</span> @enderror
                        <div class="row">
                            <div class="col-md-7">
                                <div class="choose-payment-methods">
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-cod" value="cod" type="radio" wire:model="paymentmode">
                                        <span>Cash On Delivery</span>
                                        <span class="payment-desc">Order Now Pay on Delivery</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment-method" id="payment-method-card" value="card" type="radio" wire:model="paymentmode">
                                        <span>Debit / Kredit</span>
                                        <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5 text-right" wire:ignore>
                                <img id="icon-cod-method" style="display: none" src="{{ asset('assets/images/checkout/checkout.png') }}" width="200" alt="Checkout">
                                <img id="icon-card-method" style="display: none" src="{{ asset('assets/images/checkout/card.png') }}" width="200" alt="Checkout">
                                <h2 id="icon-choose-method" style="color: rgb(186, 186, 186)"><em>*Choose Payment Method</em></h2>
                            </div>
                        </div>
                        <hr>
                        <div class="shipping-method">
                            <h4 class="title-box">Shipping method</h4>
                            <p class="summary-info"><span class="title">Flat Rate</span></p>
                            <p class="summary-info"><span class="title">Fixed Rp. 0</span></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            @if (Session::has('checkout'))
                                <span class="title-box">Grand Total</span>
                                <span class="title-box">{{ currency_IDR(Session::get('checkout')['total']) }},00</span>
                            @endif
                        </div>
                        <div class="text-right" style="padding-top: 15px">
                            <button type="submit" class="btn btn-medium">Checkout Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>
@push('scripts')
<script>
    $("input[name='payment-method']").change(function() {
        if($("#payment-method-cod").is(':checked')){
            $("#icon-cod-method").show();
            $("#icon-card-method").hide();
            $("#icon-choose-method").hide();
        }else if($("#payment-method-card").is(':checked')){
            $("#icon-cod-method").hide();
            $("#icon-card-method").show();
            $("#icon-choose-method").hide();
        }else{
            $("#icon-cod-method").hide();
            $("#icon-card-method").hide();
            $("#icon-choose-method").show();
        }

        // $("div.desc").hide();
        // $("#Cars" + test).show();
    });
</script>
@endpush