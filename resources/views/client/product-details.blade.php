@extends('client/layout/layout')
@section('content')
<style>
    .product-image {
    /* margin-top:-200px; */
    /* Các thuộc tính CSS khác bạn muốn áp dụng cho hình ảnh */
}

</style>
<style>
        .product-image img {
            width: 100%;
            height: 500px; /* Chiều cao cố định */
            object-fit: cover; /* Đảm bảo hình ảnh không bị biến dạng */
        }
    </style>
<main>
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- product-details-start -->
 
        <div class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product__details-nav d-sm-flex align-items-start">
                            <!-- <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="thumbOne-tab" data-bs-toggle="tab" data-bs-target="#thumbOne" type="button" role="tab" aria-controls="thumbOne" aria-selected="true">
                                      <img src="assets/img/product/nav/product-nav-1.jpg" alt="">
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="thumbTwo-tab" data-bs-toggle="tab" data-bs-target="#thumbTwo" type="button" role="tab" aria-controls="thumbTwo" aria-selected="false">
                                    <img src="assets/img/product/nav/product-nav-2.jpg" alt="">
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="thumbThree-tab" data-bs-toggle="tab" data-bs-target="#thumbThree" type="button" role="tab" aria-controls="thumbThree" aria-selected="false">
                                    <img src="{{ asset('images/' . $product->img_product) }}" alt="" width="500">
                                  </button>
                                </li>
                            </ul> -->
                            <div class="product__details-thumb">
                                <div class="tab-content" id="productThumbContent">
                                    <div class="tab-pane fade show active" id="thumbOne" role="tabpanel" aria-labelledby="thumbOne-tab">
                                        <div class="product__details-nav-thumb w-img product-image">
                                            <input type="hidden" value="{{$product->img_product}}" >
                                        <img  id="img_products" src="{{ asset('images/' . $product->img_product) }}" alt="" class="product-image" width="400" id = "product-image">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="thumbTwo" role="tabpanel" aria-labelledby="thumbTwo-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="assets/img/product/nav/product-nav-big-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="thumbThree" role="tabpanel" aria-labelledby="thumbThree-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <!-- <img src="{{ asset('images/' . $product->img_product) }}" alt=""> -->
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product__details-content">
                            <input type="hidden"  value="{{$product->product_name}}">
                            <h6 id="name_product">{{$product->product_name}}</h6>
                            <div class="pd-rating mb-10">
                                <ul class="rating">
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                </ul>
                                <span>(01 review)</span>
                                <span><a href="#">Add your review</a></span>
                            </div>
                            <div class="price mb-10">
                                <input type="hidden"  value="{{$product->price}}" name = "price" >
                                <span  id="product_price">{{$product->price}} vnd</span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                <!-- <ul>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                </ul> -->
                            </div>
                            <div class="product-stock mb-20">
                                <h5>Hiện Tại Còn: <span> {{$product->stock_quantity}}</span></h5>
                            </div>
                            <div class="cart-option mb-15">
                                <div class="product-quantity mr-20">
                                    <div class="cart-plus-minus p-relative"><input type="text" value="1" id="quantity_product"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                </div>
                                <!-- <input type="submit" class="cart-btn" value="Thêm vào giỏ hàng" > -->
                                <button type="submit" onclick="addToCart()"  class="cart-btn">Thêm vào giỏ hàng</button>
                            </div>
                            <div class="details-meta">
                                <div class="d-meta-left">
                                    <div class="dm-item mr-20">
                                        <a href="#"><i class="fal fa-heart"></i>Add to wishlist</a>
                                    </div>
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-layer-group"></i>Compare</a>
                                    </div>
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tag-area mt-15">
                                <div class="product_info">
                                    <span class="sku_wrapper">
                                        <span class="title">SKU:</span>
                                        <span class="sku">DK1002</span>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Categories:</span>
                                        <a href="#">iPhone</a>
                                        <a href="#">Tablets</a>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="title">Tags:</span>
                                        <a href="#">Smartphone</a>, 
                                        <a href="#">Tablets</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </form> -->

        <!-- product-details-end -->

        <!-- product-details-des-start -->
        <div class="product-details-des mt-40 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-des-tab">
                            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Mô Tảs </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Thông Số Máy</button>
                                  </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Đánh Giá </button>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="prodductDesTaContent">
                    <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <div class="product__details-des-wrapper">
                            <p class="des-text mb-35">{{$product->description}}</p>
                            <!-- <h6 class="des-sm-title">The standard passage, used since the 1500s.</h6>
                            <p class="des-text mb-35">A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <div class="features-des-image text-center">
                                <img src="assets/img/features-product/product-content-1.jpg" alt="">
                            </div> -->
                          
                          
                      
                           
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                        <div class="product__desc-info">
                            <ul>
                               <li>
                                  <h6>Weight</h6>
                                  <span>2 lbs</span>
                               </li>
                               <li>
                                  <h6>Dimensions</h6>
                                  <span>12 × 16 × 19 in</span>
                               </li>
                               <li>
                                  <h6>Product</h6>
                                  <span>Purchase this product on rag-bone.com</span>
                               </li>
                               <li>
                                  <h6>Color</h6>
                                  <span>Gray, Black</span>
                               </li>
                               <li>
                                  <h6>Size</h6>
                                  <span>S, M, L, XL</span>
                               </li>
                               <li>
                                  <h6>Model</h6>
                                  <span>Model	</span>
                               </li>
                               <li>
                                  <h6>Shipping</h6>
                                  <span>Standard shipping: $5,95</span>
                               </li>
                               <li>
                                  <h6>Care Info</h6>
                                  <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                               </li>
                               <li>
                                  <h6>Brand</h6>
                                  <span>Kazen</span>
                               </li>
                            </ul>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="product__details-review">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="review-rate">
                                        <h5>5.00</h5>
                                        <div class="review-star">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </div>
                                        <span class="review-count">01 Review</span>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="review-des-infod">
                                        <h6>1 review for "<span>Wireless Bluetooth Over-Ear Headphones</span>"</h6>
                                        <div class="review-details-des">
                                            <div class="author-image mr-15">
                                                <a href="#"><img src="assets/img/author/author-sm-1.jpeg" alt=""></a>
                                            </div>
                                            <div class="review-details-content">
                                                <div class="str-info">
                                                    <div class="review-star mr-15">
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                    </div>
                                                    <div class="add-review-option">
                                                        <a href="#">Add Review</a>
                                                    </div>
                                                </div>
                                                <div class="name-date mb-30">
                                                    <h6> admin – <span> May 27, 2021</span></h6>
                                                </div>
                                                <p>A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in <br> voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
        <!-- product-details-des-end -->

        <!-- shop modal start -->
        
        <!-- shop modal end -->

    </main>
    <script src="{{ asset('client/thaotac/cart.js') }}"></script>
    @endsection