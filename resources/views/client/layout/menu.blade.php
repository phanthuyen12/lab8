   <header class="header d-blue-bg">
        <div class="header-top">
            <div class="container custom-conatiner">
                <div class="header-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-7">
                            <div class="header-inner-start">
                                <!-- <div class="header__currency border-right">
                                    <div class="s-name">
                                        <span>Language: </span>
                                    </div>
                                    <select>
                                        <option>English</option>
                                        <option>Deutsch</option>
                                        <option>Français</option>
                                        <option>Espanol</option>
                                    </select>
                                </div> -->
                                <!-- <div class="header__lang border-right">
                                    <div class="s-name">
                                        <span>Currency: </span>
                                    </div>
                                    <select>
                                        <option> USD</option>
                                        <option>EUR</option>
                                        <option>INR</option>
                                        <option>BDT</option>
                                        <option>BGD</option>
                                    </select>
                                </div> -->
                                <div class="support d-none d-sm-block">
                                    <p>Need Help? <a href="tel:+001123456789">+001 123 456 789</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                            <div class="header-inner-end text-md-end">
                                <div class="ovic-menu-wrapper ovic-menu-wrapper-2">
                                    <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Order Tracking</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container custom-conatiner">
                <div class="heade-mid-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                            <div class="header__info">
                                <div class="logo">
                                    <a href="/index" class="logo-image"><img src="client/img/logo/logo1.svg" alt="logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="header__search">
                                <form action="#">
                                    <div class="header__search-box">
                                        <input class="search-input search-input-2" type="text" placeholder="I'm shopping for...">
                                        <button class="button button-2" type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                    <!-- <div class="header__search-cat">
                                        <select>
                                            <option>All Categories</option>
                                            <option>Best Seller Products</option>
                                            <option>Top 10 Offers</option>
                                            <option>New Arrivals</option>
                                            <option>Phones &amp; Tablets</option>
                                            <option>Electronics &amp; Digital</option>
                                            <option>Fashion &amp; Clothings</option>
                                            <option>Jewelry &amp; Watches</option>
                                            <option>Health &amp; Beauty</option>
                                            <option>Sound &amp; Speakers</option>
                                            <option>TV &amp; Audio</option>
                                            <option>Computers</option>
                                        </select>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                            <div class="header-action">
                                <div class="block-userlink">
                                    
                                    @if(session('user'))
                                    <a class="icon-link icon-link-2" href="/user">
                                    <i class="flaticon-user"></i>
                                    <span class="text">

                                    <span class="sub">{{ print_r(session('user')['full_name'])}}</span>
                                    Tài Khoản </span>
@else
<a class="icon-link icon-link-2" href="/login">
<i class="flaticon-user"></i>
<span class="text">

    <span class="sub">Đăng Nhập</span>
    Tài Khoản</span>
@endif

                                   
                                    </a>
                                </div>
                                <div class="block-wishlist action">
                                    <a class="icon-link icon-link-2" href="/history">
                                    <i class="flaticon-heart"></i>
                                    <!-- <span class="count count-2">99+</span> -->
                                    <span class="text">
                                    <span class="sub">Lịch Sử </span>
                                    Mua Hàng </span>
                                    </a>
                                </div>
                                <div class="block-cart action">
                                    <a class="icon-link icon-link-2" href="/cart">
                                    <i class="flaticon-shopping-bag"></i>
                                    <!-- <span class="count count-2">1</span> -->
                                    <span class="text">
                                    <span class="sub">Giỏ Hàng:</span>
                                    Xem Giỏ hàng </span>

                                    <!-- $00.00 </span>
                                    </a>
                                    <div class="cart">
                                        <div class="cart__mini">
                                            <ul>
                                                <li>
                                                  <div class="cart__title">
                                                    <h4>Your Cart</h4>
                                                    <span>(1 Item in Cart)</span>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="cart__item d-flex justify-content-between align-items-center">
                                                    <div class="cart__inner d-flex">
                                                      <div class="cart__thumb">
                                                        <a href="product-details.html">
                                                          <img src="client/img/cart/20.jpg" alt="">
                                                        </a>
                                                      </div>
                                                      <div class="cart__details">
                                                        <h6><a href="product-details.html"> Samsung C49J89: £875, Debenhams Plus  </a></h6>
                                                        <div class="cart__price">
                                                          <span>$255.00</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="cart__del">
                                                        <a href="#"><i class="fal fa-times"></i></a>
                                                    </div>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="cart__sub d-flex justify-content-between align-items-center">
                                                    <h6>Subtotal</h6>
                                                    <span class="cart__sub-total">$255.00</span>
                                                  </div>
                                                </li>
                                                <li>
                                                    <a href="cart.html" class="wc-cart mb-10">View cart</a>
                                                    <a href="checkout.html" class="wc-checkout">Checkout</a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container custom-conatiner">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-3">                        
                        <div class="cat__menu-wrapper side-border d-none d-lg-block">
                            <div class="cat-toggle">
                                <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Danh Mục</button>
                                <div class="cat__menu-2 cat__menu">
                                    <nav id="mobile-menu" style="display: block;">
                                        <ul>
                                            <li>
                                                <a href="product.html">All Categories <i class="far fa-angle-down"></i></a>
                                                <ul class="mega-menu">
                                                    <li><a href="product.html">Shop Pages</a>
                                                        <ul class="mega-item">
                                                            <li><a href="product-details.html">Standard SHop Page</a></li>
                                                            <li><a href="product-details.html">Shop Right Sidebar</a></li>
                                                            <li><a href="product-details.html">Shop Left Sidebar</a></li>
                                                            <li><a href="product-details.html">Shop 3 Column</a></li>
                                                            <li><a href="product-details.html">Shop 4 Column</a></li>
                                                        </ul>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-3">
                      <div class="header__bottom-left d-flex d-xl-block align-items-center">
                        <div class="side-menu d-lg-none mr-20">
                          <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <!-- <li>
                                        <a href="index.html" class="active">Home <i class="far fa-angle-down"></i></a>
                                        <ul class="megamenu-1">
                                            <li><a href="index.html">Home Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html" class="active">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="product-details.html">Shop 3 Column</a></li>
                                                    <li><a href="product-details.html">Shop 4 Column</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Product Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Product Details</a></li>
                                                    <li><a href="product-details.html">Product V2</a></li>
                                                    <li><a href="product-details.html">Product V3</a></li>
                                                    <li><a href="product-details.html">Varriable Product</a></li>
                                                    <li><a href="product-details.html">External Product</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Other Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">wishlist</a></li>
                                                    <li><a href="product-details.html">Shopping Cart</a></li>
                                                    <li><a href="product-details.html">Checkout</a></li>
                                                    <li><a href="product-details.html">Login</a></li>
                                                    <li><a href="product-details.html">Register</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Phone &amp; Tablets</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Catagory 1</a></li>
                                                    <li><a href="product-details.html">Catagory 2</a></li>
                                                    <li><a href="product-details.html">Catagory 3</a></li>
                                                    <li><a href="product-details.html">Catagory 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Phone &amp; Tablets</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Catagory 1</a></li>
                                                    <li><a href="product-details.html">Catagory 2</a></li>
                                                    <li><a href="product-details.html">Catagory 3</a></li>
                                                    <li><a href="product-details.html">Catagory 4</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li><a href="/index">Trang Chủ</a></li>

                                    <li><a href="about.html">Giới Thiệu</a></li>
                                    <li><a href="/shop">Cửa Hàng</a></li>

                                    <li><a href="blog.html">Tin Tức <i class="far fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-9">
                        <div class="shopeing-text text-sm-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </header>