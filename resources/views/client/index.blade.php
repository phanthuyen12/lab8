@extends('client/layout/layout')
<style>
        .product-image img {
            width: 100%;
            height: 200px; /* Chiều cao cố định */
            object-fit: cover; /* Đảm bảo hình ảnh không bị biến dạng */
        }
    </style>
@section('content')
<main>

<!-- slider-area-start -->
<div class="slider-area light-bg-s pt-60">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-7">
                <div class="swiper-container slider__active pb-30">
                    <div class="slider-wrapper swiper-wrapper product-image" id = "product-image">
                        <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="{{asset('images/02-slide-1.jpg')}}" width="940" id = "product-image">
                            <div class="slider-content slider-content-2">
                                <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">Gaming Headset<br> Brilliant Lighting Effect</h2>
                                <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount 40% On Products & Free Shipping</p>
                                <div class="slider-bottom-btn mt-65">
                                    <a data-animation="fadeInUp" data-delay="1.15s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                </div>
                            </div>
                        </div><!-- /single-slider -->
                        <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="{{asset('images/02-slide-2.jpg')}}">
                            <div class="slider-content slider-content-2">
                                <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">SALE 20% OFF<br> SAMSUNG GALAXY BUDS </h2>
                                <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.7s">Discount 30% On Products & Free Shipping</p>
                                <div class="slider-bottom-btn mt-65">
                                    <a data-animation="fadeInUp" data-delay="1.9s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                </div>
                            </div>
                        </div><!-- /single-slider -->
                        <div class="single-slider b-radius-2 swiper-slide slider-height-2 d-flex align-items-center" data-background="{{asset('images/02-slide-3.jpg')}}">
                            <div class="slider-content slider-content-2">
                                <h2 data-animation="fadeInLeft" data-delay="1.5s" class="pt-15 slider-title pb-5">Sport Edition<br> Red Special Edition</h2>
                                <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.8s">Wireless Connection With TV, Computer, Laptop... </p>
                                <div class="slider-bottom-btn mt-65">
                                    <a data-animation="fadeInUp" data-delay="1.10s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                </div>
                            </div>
                        </div><!-- /single-slider -->
                        <div class="main-slider-paginations"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img b-radius-2">
                                <a href="product-details.html"><img src="{{asset('images/banner-10.jpg')}}" alt=""></a>
                            </div>
                            <div class="banner__content banner__content-2">
                                <h6><a href="product-details.html">Canyon <br> Star Raider</a></h6>
                                <p>Headphone & Audio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img b-radius-2">
                                <a href="product-details.html"><img src="{{asset('images/banner-11.jpg')}}" alt=""></a>
                            </div>
                            <div class="banner__content banner__content-2">
                                <h6><a href="product-details.html">Phone <br> Galaxy S20</a></h6>
                                <p>Cellphone & Tablets</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img b-radius-2">
                                <a href="product-details.html"><img src="{{asset('images/banner-13.jpg')}}" alt=""></a>
                            </div>
                            <div class="banner__content banner__content-2">
                                <h6><a href="product-details.html">Galaxy <br> Buds Plus</a></h6>
                                <p>Headphone & Audio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img b-radius-2">
                                <a href="product-details.html"><img src="{{asset('images/banner-12.jpg')}}" alt=""></a>
                            </div>
                            <div class="banner__content banner__content-2">
                                <h6><a href="product-details.html">Chair <br>Swoon Lounge</a></h6>
                                <p>Headphone & Audio</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-area-end -->

<!-- trending-product-area-start -->
<section class="trending-product-area light-bg-s pt-25 pb-15">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Sản phẩm của chúng tôi</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
       
            @foreach ($product_item as $product )
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                <div class="product__item product__item-2 b-radius-2 mb-20">
                    <div class="product__thumb fix">
                        <div class="product-image w-img">
                            <a href="product-details.html">
                            <img src="{{ asset('images/' . $product->img_product) }}" alt="product" class="product-image" id ="product-image" width="360px">
                            </a>
                        </div>
                        <div class="product__offer">
                        <span class="discount">còn {{$product->stock_quantity}}</span>
                        </div>
                        <div class="product-action product-action-2">
                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                <i class="fal fa-eye"></i>
                                <i class="fal fa-eye"></i>
                            </a>
                            <a href="#" class="icon-box icon-box-1">
                                <i class="fal fa-heart"></i>
                                <i class="fal fa-heart"></i>
                            </a>
                            <a href="#" class="icon-box icon-box-1">
                                <i class="fal fa-layer-group"></i>
                                <i class="fal fa-layer-group"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__content product__content-2">
                        <h6><a href="product-details.html">{{$product->product_name}}</a></h6>
                        <div class="rating mb-5 mt-10">
                            <ul>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                            </ul>
                            <span>(01 review)</span>
                            </div>
                        <div class="price">
                            <span>{{$product->price}}</span>
                        </div>
                    </div>
                    <div class="product__add-cart text-center">
                        
                        <a href="/product-detail/{{ $product->product_id }}"class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
             
           
           
               
        </div>
    </div>
</section>
<!-- trending-product-area-end -->

<!-- banner__area-start -->
<!-- <section class="categories__area light-bg-s pt-20 pb-10">
    <div class="container custom-conatiner">
   
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Danh Mục Sản Phẩm Bán chạy</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html"><img src="client/img/categorie/cat-1.jpg" alt=""></a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">Decor & Furniture</a></h6>
                        <p>(7 Products)</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html"><img src="client/img/categorie/cat-2.jpg" alt=""></a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">Smart Phones</a></h6>
                        <p>(12 Products)</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html"><img src="client/img/categorie/cat-3.jpg" alt=""></a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">Fashion & Clothing</a></h6>
                        <p>(5 Products)</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html"><img src="client/img/categorie/cat-4.jpg" alt=""></a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">Home Kitchen</a></h6>
                        <p>(9 Products)</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html"><img src="client/img/categorie/cat-5.jpg" alt=""></a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">Camera & Photos</a></h6>
                        <p>(7 Products)</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html"><img src="client/img/categorie/cat-6.jpg" alt=""></a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">Speaker & Audio</a></h6>
                        <p>(15 Products)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- banner__area-end -->



<!-- banner__area-start -->
<section class="banner__area light-bg-s pt-40 pb-10">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="banner__item p-relative w-img mb-30">
                    <div class="banner__img b-radius-2">
                        <a href="product-details.html"><img src="{{asset('images/banner-14.jpg')}}" alt=""></a>
                    </div>
                    <div class="banner__content banner__content-2">
                        <h6><a href="product-details.html">Microsoft <br> Surface Laptop 14”</a></h6>
                        <p class="sm-p">Up To -30%</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="banner__item p-relative mb-30 w-img">
                    <div class="banner__img b-radius-2">
                        <a href="product-details.html"><img src="{{asset('images/banner-15.jpg')}}" alt=""></a>
                    </div>
                    <div class="banner__content banner__content-2">
                        <h6><a href="product-details.html">Cameras <br>Best Sport Edition </a></h6>
                        <p class="sm-p">Up To -20%</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="banner__item p-relative mb-30 w-img">
                    <div class="banner__img b-radius-2">
                        <a href="product-details.html"><img src="{{asset('images/banner-16.jpg')}}" alt=""></a>
                    </div>
                    <div class="banner__content banner__content-2">
                        <h6><a href="product-details.html">Sneaker <br>Nike Air Max 90 </a></h6>
                        <p class="sm-p">Up To -60%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner__area-end -->


<!-- featured-end -->

<!-- moveing-text-area-start -->
<section class="moveing-text-area">
    <div class="container">
        <div class="ovic-running">
            <div class="wrap">
                <div class="inner">
                    <p class="item">Chào mừng bạn đến với cửa hàng của chúng tôi</p>
                    <p class="item">Nơi có nhiều ưu đãi và sale hấp dẫn</p>
                    <h2 class="item">Hãy chọn 1 sản phẩm phù hợp với bạn nào</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- moveing-text-area-end -->

<!-- recomand-product-area-start -->
<section class="recomand-product-area light-bg-s pt-50 pb-15">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Sản phẩm phù hợp với bạn</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach ($product_item as $product )
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                <div class="product__item product__item-2 b-radius-2 mb-20">
                    <div class="product__thumb fix">
                        <div class="product-image w-img">
                            <a href="product-details.html">
                            <img src="{{ asset('images/' . $product->img_product) }}" alt="product" class="product-image" id ="product-image" width="360px">
                            </a>
                        </div>
                        <div class="product__offer">
                        <span class="discount">còn {{$product->stock_quantity}}</span>
                        </div>
                        <div class="product-action product-action-2">
                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                <i class="fal fa-eye"></i>
                                <i class="fal fa-eye"></i>
                            </a>
                            <a href="#" class="icon-box icon-box-1">
                                <i class="fal fa-heart"></i>
                                <i class="fal fa-heart"></i>
                            </a>
                            <a href="#" class="icon-box icon-box-1">
                                <i class="fal fa-layer-group"></i>
                                <i class="fal fa-layer-group"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product__content product__content-2">
                        <h6><a href="product-details.html">{{$product->product_name}}</a></h6>
                        <div class="rating mb-5 mt-10">
                            <ul>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                            </ul>
                            <span>(01 review)</span>
                            </div>
                        <div class="price">
                            <span>{{$product->price}}</span>
                        </div>
                    </div>
                    <div class="product__add-cart text-center">
                        
                        <a href="/product-detail/{{ $product->product_id }}"class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
             
           
        </div>
    </div>
</section>
<!-- recomand-product-area-end -->

<!-- blog-area-start -->

<!-- blog-area-end -->

<!-- brand-area-start -->
<!-- <section class="brand-area light-bg-s pb-60">
    <div class="container custom-conatiner">
        <div class="brand-slider brand-slider-2 swiper-container pt-35 pb-30">
            <div class="swiper-wrapper">
                <div class="brand-item w-img swiper-slide">
                    <a href="#"><img src="client/img/brand/brand-1.jpg" alt="brand"></a>
                </div>
                <div class="brand-item w-img swiper-slide">
                    <a href="#"><img src="client/img/brand/brand-2.jpg" alt="brand"></a>
                </div>
                <div class="brand-item w-img swiper-slide">
                    <a href="#"><img src="client/img/brand/brand-3.jpg" alt="brand"></a>
                </div>
                <div class="brand-item w-img swiper-slide">
                    <a href="#"><img src="client/img/brand/brand-4.jpg" alt="brand"></a>
                </div>
                <div class="brand-item w-img swiper-slide">
                    <a href="#"><img src="client/img/brand/brand-5.jpg" alt="brand"></a>
                </div>
                <div class="brand-item w-img swiper-slide">
                    <a href="#"><img src="client/img/brand/brand-6.jpg" alt="brand"></a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- brand-area-end -->

<!-- features-2__area-start -->
<section class="features-2__area d-ddark-bg">
    <div class="container custom-conatiner">
        <div class="features-2__lists pt-25 pb-25">
            <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 gx-0">
                <div class="col">
                    <div class="features-2__item">
                        <div class="features-2__icon mr-20">
                            <i class="fal fa-truck"></i>
                        </div>
                        <div class="features-2__content">
                            <h6>FREE DELIVERY</h6>
                            <p>For all orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features-2__item">
                        <div class="features-2__icon mr-20">
                            <i class="fal fa-money-check"></i>
                        </div>
                        <div class="features-2__content">
                            <h6>SAFE PAYMENT</h6>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features-2__item">
                        <div class="features-2__icon mr-20">
                            <i class="fal fa-comments-alt"></i>
                        </div>
                        <div class="features-2__content">
                            <h6>24/7 HELP CENTER</h6>
                            <p>Delicated 24/7 support</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features-2__item">
                        <div class="features-2__icon mr-20">
                            <i class="fal fa-hand-holding-usd"></i>
                        </div>
                        <div class="features-2__content">
                            <h6>SHOP WITH CONFIDENCE</h6>
                            <p>If goods have problems</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="features-2__item">
                        <div class="features-2__icon mr-20">
                            <i class="fad fa-user-headset"></i>
                        </div>
                        <div class="features-2__content">
                            <h6>FRIENDLY SERVICES</h6>
                            <p>30 day satisfaction guarantee</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- features-2__area-end -->


<!-- shop modal start -->
<div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered product__modal" role="document">
    <div class="modal-content">
        <div class="product__modal-wrapper p-relative">
            <div class="product__modal-close p-absolute">
                <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
            </div>
            <div class="product__modal-inner">
                <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product__modal-box">
                        <div class="tab-content" id="modalTabContent">
                            <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                <div class="product__modal-img w-img">
                                    <img src="client/img/quick-view/quick-view-1.jpg" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                <div class="product__modal-img w-img">
                                    <img src="client/img/quick-view/quick-view-2.jpg" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                <div class="product__modal-img w-img">
                                    <img src="client/img/quick-view/quick-view-3.jpg" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                <div class="product__modal-img w-img">
                                    <img src="client/img/quick-view/quick-view-4.jpg" alt="">
                                </div>
                            </div>
                            </div>
                        <ul class="nav nav-tabs" id="modalTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                    <img src="client/img/quick-view/quick-nav-1.jpg" alt="">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                <img src="client/img/quick-view/quick-nav-2.jpg" alt="">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                <img src="client/img/quick-view/quick-nav-3.jpg" alt="">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                <img src="client/img/quick-view/quick-nav-4.jpg" alt="">
                                </button>
                            </li>
                            </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product__modal-content">
                        <h4><a href="product-details.html">Samsung C49J89: £875, Debenhams Plus</a></h4>
                        <div class="product__review d-sm-flex">
                            <div class="rating rating__shop mb-10 mr-30">
                            <ul>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                            </ul>
                            </div>
                            <div class="product__add-review mb-15">
                            <span>01 review</span>
                            </div>
                        </div>
                        <div class="product__price">
                            <span>$109.00 – $307.00</span>
                        </div>
                        <div class="product__modal-des mt-20 mb-15">
                            <ul>
                                <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage & SIM: 12GB RAM, 256GB.</a></li>
                                <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                            </ul>
                        </div>
                        <div class="product__stock mb-20">
                            <span class="mr-10">Availability :</span>
                            <span>1795 in stock</span>
                        </div>
                        <div class="product__modal-form">
                            <form action="#">
                            <div class="pro-quan-area d-lg-flex align-items-center">
                                <div class="product-quantity mr-20 mb-25">
                                    <div class="cart-plus-minus p-relative"><input type="text" value="1" /></div>
                                </div>
                                <div class="pro-cart-btn mb-25">
                                    <button class="cart-btn" type="submit">Add to cart</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="product__stock mb-30">
                            <ul>
                                <li><a href="#">
                                    <span class="sku mr-10">SKU:</span>
                                    <span>Samsung C49J89: £875, Debenhams Plus</span></a>
                                </li>
                                <li><a href="#">
                                    <span class="cat mr-10">Categories:</span>
                                    <span>iPhone, Tablets</span></a>
                                </li>
                                <li><a href="#">
                                    <span class="tag mr-10">Tags:</span>
                                    <span>Smartphone, Tablets</span></a>
                                </li>
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
<!-- shop modal end -->

</main>
@endsection