@extends('home')

@section('title', "list product")

@section('slider')
    @include('layouts.client.name-page')
@endsection

@section('product')
    <!-- Shop Section Start -->
    <div class="shop-section section pt-60 pt-lg-40 pt-md-30 pt-sm-20 pt-xs-30  pb-70 pb-lg-50 pb-md-40 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-area">
                        <div class="row">
                            <div class="col-12">
                                <!-- Grid & List View Start -->
                                <div class="shop-topbar-wrapper d-flex justify-content-between align-items-center">
                                    <div class="grid-list-option d-flex">
                                        <ul class="nav">
                                            <li>
                                                <a class="active show" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#list" class=""><i class="fa fa-th-list"></i></a>
                                            </li>
                                        </ul>
                                        <p>Showing 1–9 of 41 results</p>
                                    </div>
                                    <div style="width:50%;" class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Search</label>
                                        <input type="text" data-token="{{ csrf_token() }}" class="form-control" name="search" id="txtSearch" placeholder="Search" aria-describedby="emailHelp">
                                      </div>
                                    <!--Toolbar Short Area Start-->
                                    <div class="toolbar-short-area d-md-flex align-items-center">
                                        <div class="toolbar-shorter ">
                                            <label>Sort By:</label>
                                            <select class="wide">
                                                <option data-display="Select">Nothing</option>
                                                <option value="Relevance">Relevance</option>
                                                <option value="Name, A to Z">Name, A to Z</option>
                                                <option value="Name, Z to A">Name, Z to A</option>
                                                <option value="Price, low to high">Price, low to high</option>
                                                <option value="Price, high to low">Price, high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--Toolbar Short Area End-->
                                </div>
                                <!-- Grid & List View End -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 order-lg-1 order-2">
                                <!-- Single Sidebar Start  -->
                                <div class="common-sidebar-widget">
                                    <h3 class="sidebar-title">Product categories</h3>
                                    <ul class="sidebar-list">
                                        <li><a href="#"><i class="fa fa-plus"></i>Accessories <span class="count">(14)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Decor <span class="count">(14)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Furniture <span class="count">(28)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Lighting <span class="count">(14)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Outdoor <span class="count">(14)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Sports <span class="count">(13)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Storage <span class="count">(9)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Toys <span class="count">(9)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Uncategorized <span class="count">(0)</span></a></li>
                                    </ul>
                                </div>
                                <!-- Single Sidebar End  -->
                                <!-- Single Sidebar Start  -->
                                <div class="common-sidebar-widget">
                                    <h3 class="sidebar-title">Filter by price</h3>
                                    <div class="sidebar-price">
                                        <div id="price-range" class="mb-20"></div>
                                        <button type="button" class="btn">Filter</button>
                                        <input type="text" id="price-amount" class="price-amount" readonly>
                                    </div>
                                </div>
                                <!-- Single Sidebar End  -->
                                <!-- Single Sidebar Start  -->
                                <div class="common-sidebar-widget">
                                    <h3 class="sidebar-title">Filter by</h3>
                                    <ul class="sidebar-list">
                                        <li><a href="#"><i class="fa fa-plus"></i>Gold <span class="count">(1)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>Green <span class="count">(1)</span></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i>White <span class="count">(1)</span></a></li>
                                    </ul>
                                </div>
                                <!-- Single Sidebar End  -->
                                <!-- Single Sidebar Start  -->
                                <div class="common-sidebar-widget">
                                    <h3 class="sidebar-title">Compare Products</h3>
                                    <div class="compare-products-list">
                                        <ul>
                                            <li>
                                                <a href="#" class="title">Cras neque metus</a>
                                                <a href="#" class="remove-compare"><i class="fa fa-close"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="title">Cras neque metus</a>
                                                <a href="#" class="remove-compare"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <a href="#" class="clear-btn">Clear all</a>
                                        <button type="button" class="btn compare-btn">Compare</button>
                                    </div>
                                </div>
                                <!-- Single Sidebar End  -->
                                <!-- Single Sidebar Start  -->
                                <div class="common-sidebar-widget">
                                    <h3 class="sidebar-title">Product tags</h3>
                                    <ul class="sidebar-tag">
                                        <li><a href="#">blouse</a></li>
                                        <li><a href="#">clothes</a></li>
                                        <li><a href="#">fashion</a></li>
                                        <li><a href="#">handbag</a></li>
                                        <li><a href="#">laptop</a></li>
                                    </ul>
                                </div>
                                <!-- Single Sidebar End  -->
                            </div>
                            <div class="col-lg-9 order-lg-2 order-1">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="shop-product">
                                            <div id="myTabContent-2" class="tab-content">
                                                <div id="grid" class="tab-pane fade active show">
                                                    <div class="product-grid-view">
                                                        <div class="row">
                                                            @foreach ($product as $item)
                                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                                <!--  Single Grid product Start -->
                                                                <div class="single-grid-product mb-40">
                                                                    <div class="product-image">
                                                                        <div class="product-label">
                                                                            <span>-{{$item->pro_sale}}%</span>
                                                                        </div>
                                                                        <a href="{{route('client.single-product', $item->id)}}">
                                                                            @if($item->imgpro != "")
                                                                            @php
                                                                                $images = explode('|', $item->imgpro->add_avatar)
                                                                            @endphp  
                                                                            <img src="{{asset("images/product/$images[0]")}}" class="img-fluid" alt="">
                                                                            @empty(!$images[1])
                                                                                <img src="{{asset("images/product/$images[1]")}}" class="img-fluid" alt="">
                                                                            @endempty
                                                                            
                                                                            @endif
                                                                        </a>

                                                                        <div class="product-action">
                                                                            <ul>
                                                                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <h3 class="title"> <a href="single-product.html">{{$item->pro_name}}</a></h3>
                                                                        <p class="product-price"><span class="discounted-price">{{$item->pro_price}} đ</span> <span class="main-price discounted">$230.00</span></p>
                                                                    </div>
                                                                </div>
                                                                <!--  Single Grid product End -->
                                                            </div>
                                                            @endforeach
                                                            

                                                            

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="list" class="tab-pane fade">
                                                    <div class="product-list-view">
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span class="sale">New</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-3.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-4.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Miro Dining Table</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$170.00</span> <span class="main-price discounted">$210.00</span></p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span class="sale">New</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-1.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-2.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Stylish Design Chair</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$190.00</span> <span class="main-price discounted">$230.00</span></p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span class="sale">New</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-3.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-4.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Janus Table Lamp</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$130.00</span> <span class="main-price discounted">$150.00</span></p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span class="sale">New</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-5.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-6.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Normal Dining chair</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$190.00</span></p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span class="sale">Sale</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-7.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-8.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Affordances Side Table</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$130.00</span> </p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span>-20%</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-10.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-11.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Hot Design Table</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$153.00</span> </p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <div class="product-label">
                                                                                <span>-29%</span>
                                                                            </div>
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-12.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-13.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Outdoor Lock Chair</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$190.00</span> <span class="main-price discounted">$230.00</span></p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                        <!-- Single List Product Start -->
                                                        <div class="product-list-item mb-40">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                    <div class="single-grid-product">
                                                                        <div class="product-image">
                                                                            <a href="single-product.html">
                                                                                <img src="{{asset('assets/images/product/product-16.jpg')}}" class="img-fluid" alt="">
                                                                                <img src="{{asset('assets/images/product/product-15.jpg')}}" class="img-fluid" alt="">
                                                                            </a>

                                                                            <div class="product-action">
                                                                                <ul>
                                                                                    <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                                                                    <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                                    <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-6">
                                                                    <div class="product-content-shop-list">
                                                                        <div class="product-content">
                                                                            <h3 class="title"> <a href="single-product.html">Normal Dining chair</a></h3>
                                                                            <div class="product-category-rating">
                                                                                <span class="rating">
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star active"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </span>
                                                                                <span class="review"><a href="#">(1 review)</a></span>
                                                                            </div>
                                                                            <p class="product-price"><span class="discounted-price">$287.00</span></p>
                                                                            <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single List Product Start -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-30 mb-sm-40 mb-xs-30">
                                    <div class="col">
                                        {{$product->links("pagination::bootstrap-4")}}
                                        <ul class="page-pagination">
                                            <li class="active"><a href="#">01</a></li>
                                            <li><a href="#">02</a></li>
                                            <li><a href="#">03</a></li>
                                            <li><a href="#">04</a></li>
                                            <li><a href="#">05</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#txtSearch').on('keyup',function(){
    console.log("quân");
      $value = $(this).val();
      $.ajax({
          type: 'GET',
          url: "{{route('admin.product.search-product')}}",
          data: {
              'search': $value,
              // "_method": 'POST',
              // "_token": token,
          },
          // dataType:'json',
          // headers: {
          //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          // },
          
          success:function(data){
            console.log("abc");
            console.log(data);
            //   $('tbody').html(data);
          }
      });
  })
    </script>

    <!-- Shop Section End -->
@endsection


@section('testimonial')
    @include('layouts.client.testimonial')
@endsection