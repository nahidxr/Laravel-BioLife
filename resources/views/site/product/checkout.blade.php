@extends('site.layouts.app')
@section('content')
{{-- @include('flash::message') --}}



<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Checkout</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">

                <!--checkout progress box-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 1st">
                                <div class="checkout-act active">
                                    <h3 class="title-box"><span class="number">Info</span>Order Information</h3>
                                    <div class="box-content">
                                        <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a>
                                            You’ll be able to save your details to create an account with us later.</p>
                                        <div class="login-on-checkout">
                                            <form action="{{ url("/checkout") }}" name="frm-login" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <p class="form-row">
                                                    <label for="input_email">Name</label>
                                                    <input readonly type="text" class="form-control" name="name"
                                                        id="input_name" value="{{ Auth::user()->name }}"
                                                        placeholder="Your Name">


                                                </p>
                                                <p class="form-row">
                                                    <label for="input_email">Email Address</label>
                                                    <input readonly class="form-control" type="email" name="useremail"
                                                        id="input_useremail" value="{{ Auth::user()->email }}"
                                                        placeholder="Your email">


                                                </p>
                                                <p class="form-row">
                                                    <label for="input_email">Phone Number</label>
                                                    <input required class="form-control" type="number"
                                                        name="phonenumber" id="input_number" value=""
                                                        placeholder="Your Number">


                                                </p>
                                                <p class="form-row">
                                                    {{-- <input type="hidden" name="shipping" value=""> --}}

                                                    <label for="input_email">Shipping Address</label>
                                                    <textarea required class="form-control" name="shippingAddress"
                                                        id="shippingAddress" cols="50" rows="5"></textarea>


                                                </p>
                                                {{-- <p class="form-row">
                                                    <label for="input_email">Email Address</label>
                                                    <input class="col-6" type="email" name="email" id="input_email"
                                                        value="" placeholder="Your email">


                                                </p> --}}


                                                <button class="btn btn-success" type="submit" name="btn-sbmt"
                                                    class="btn">Order</button>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div
                    class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                            <a href="{{ url('/cart/') }}" class="link-forward">Edit cart</a>
                        </div>
                        @php
                        $total=0;
                        $count=0;
                        $tax=5;
                        $shipping_price=20;

                        @endphp
                        @foreach ($cartCollection as $cart)
                        @php
                        $total+=$cart->price * $cart->quantity;
                        $count++
                        @endphp
                        @endforeach
                        <div class="cart-list-box short-type">
                            <input type="hidden" name="count" value="{{ $count }}">
                            <span class="number">{{ $count }}items</span>
                            <ul class="cart-list">

                                @foreach ($cartCollection as $cart)
                                <input type="hidden" name="product_id[]" value="{{ $cart->id }}">


                                <li class="cart-elem">
                                    <div class="cart-item">
                                        <div class="product-thumb">
                                            {{-- <input type="hidden" name="pro_id[]" value=""> --}}
                                            {{-- <input type="hidden" name="product_id" value="{{ $cart->id}}"> --}}

                                            <a class="prd-thumb" href="#">
                                                <figure><img
                                                        src="{{ asset("/storage/".$cart->attributes->featured_image) }}"
                                                        width="113" height="113" alt="shop-cart"></figure>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <input type="hidden" name="quantity[]" value="{{ $cart->quantity}}">

                                            <span class="txt-quantity">{{ $cart->quantity }}X</span>
                                            <a href="#" class="pr-name">{{ $cart->name }}</a>
                                        </div>
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">£</span>{{ $cart->price }}</span></ins>
                                            {{-- <del><span class="price-amount"><span
                                                        class="currencySymbol">£</span>95.00</span></del> --}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                {{-- -------------------- --}}

                            </ul>
                            <ul class="subtotal">



                                {{-- 
                     @foreach ($cartCollection as $cart)
                    @php
                    $total+=$cart->price *$cart->quantity;
                    @endphp 
                    @endforeach --}}
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">SubTotall</b>
                                        <input type="hidden" name="subtotal" value="{{ $total }}">
                                        <span class="stt-price">{{ $total }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <input type="hidden" name="shipping_price" value="{{ $shipping_price }}">
                                        <span class="stt-price">£{{ $shipping_price }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Tax</b>
                                        <input type="hidden" name="tax" value="{{ $tax }}">
                                        <span class="stt-price">£{{ $tax }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">total:</b>
                                        <input type="hidden" name="total" value="{{ $total + $shipping_price + $tax }}">
                                        <span class="stt-price">{{ $total + $shipping_price + $tax }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">


                                        <input checked type="checkbox" name="payment_method" value="cash_on">
                                        <b class="stt-name">Cash On Dalivery</b>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
