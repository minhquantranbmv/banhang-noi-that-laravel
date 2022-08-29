@extends('home')

@section('title', "list product")

@section('slider')
    @include('layouts.client.name-page')
@endsection

@section('product')
    <!--Cart section start-->
    <div class="cart-section section pt-90 pt-lg-70 pt-md-60 pt-sm-50 pt-xs-45  pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <!-- Cart Table -->
                    <div class="cart-table table-responsive mb-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    @if($cart->product->imgpro !="")
                                    @php
                                        $images = explode('|', $cart->product->imgpro->add_avatar)
                                    @endphp 
                                    <td class="pro-thumbnail"><a href="#"><img src="{{asset("images/product/$images[0]")}}" alt="Product"></a></td>
                                    @endif
                                    <td class="pro-title"><a href="#">{{$cart->product->pro_name}}</a></td>
                                    <td class="pro-price"><span>{{$cart->product->into_price}}</span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input type="number" value="{{$cart->quantity}}"></div>
                                    </td>
                                    <td class="pro-subtotal"><span>{{$cart->money}}</span></td>
                                    <td class="pro-remove">
                                        <form action="{{route('client.delete-cart', $cart->id)}}" method="POST">
                                            @csrf
                                            <button><i class="fa fa-trash-o"></i></button>
                                            @method('DELETE')
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5">
                            <!-- Calculate Shipping -->
                            <div class="calculate-shipping">
                                <h4>Calculate Shipping</h4>
                                <form action="{{route('client.order')}}" method="POST">
                                    @csrf
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">FullName</label>
                                        <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                                      </div>
                                      {{-- </div> --}}
                                    {{-- <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Comilla</option>
                                                <option>Chittagong</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Postcode / Zip">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <button class="btn">Estimate</button>
                                        </div>
                                    </div> --}}
                                    @method('POST')
                                    <div class="col-md-6 col-12 mb-25">
                                        <button class="btn">Estimate</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Discount Coupon -->
                            <div class="discount-coupon">
                                <h4>Discount Coupon Code</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <button class="btn">Apply Code</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="col-lg-6 col-12 mb-30 d-flex">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    <p>Sub Total <span>$75.00</span></p>
                                    <p>Shipping Cost <span>$00.00</span></p>
                                    <h2>Grand Total <span>$75.00</span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <button class="btn">Checkout</button>
                                    <button class="btn">Update Cart</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--Cart section end-->
    <!-- Newsletter Section Start -->
    <div class="newsletter-section section bg-gray-two pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-content">
                        <h2>Subscribe Our Newsletter</h2>
                        <p>Subscribe Today for free and save 10% on your first purchase.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="newsletter-wrap">
                        <div class="newsletter-form">
                            <form id="mc-form" class="mc-form">
                                <input type="email" placeholder="Enter Your Email Address Here..." required>
                                <button type="submit" value="submit">SUBSCRIBE!</button>
                            </form>

                        </div>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Section End -->
@endsection


@section('testimonial')
    @include('layouts.client.testimonial')
@endsection