@extends('client/layout/layout')
@section('content')
<main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="{{asset('images/page-banner-4.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Tài Khoản</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Trang Chủ</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Nhập mật khẩu</span>
                                         </li>
                                      </ul>
                                   </nav> 
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-banner-area-end -->

        <!-- account-area-start -->
        <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="basic-login mb-50">
                            <h5>Nhập mật khẩu mới</h5>
                            <form action="{{ route('client.chane_password') }}" method="post">
                            @csrf <!-- Đây là token CSRF cho Laravel -->
                            <input type="hidden" name="tokenpass" value="{{$token}}">
                            <input type="hidden" name="email"{{$email}}>
                           
                            <label for="pass">Nhập Password <span>*</span></label>
                            <input id="pass" type="password" name="new_password" placeholder="Xin vui lòng nhập password...">
                            <!-- Thuộc tính name được thêm vào -->

                            <div class="login-action mb-10 fix">
                            <span class="forgot-login f-left">
                                    <a href="/register">Đăng Ký</a>
                                </span>
                                <span class="forgot-login f-right">
                                    <a href="#">Quên Mật Khẩu</a>
                                </span>
                            </div>
                            <input type="submit" value="Đăng Nhập" class="tp-in-btn w-100">
                        </form>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- account-area-end -->

        <!-- cta-area-start -->
        <section class="cta-area d-ldark-bg pt-55 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item cta-item-d mb-30">
                            <h5 class="cta-title">Follow Us</h5>
                            <p>We make consolidating, marketing and tracking your social media website easy.</p>
                            <div class="cta-social">
                                <div class="social-icon">
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                    <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Sign Up To Newsletter</h5>
                            <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
                            <div class="subscribe__form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email here...">
                                    <button>subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Download App</h5>
                            <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                            <div class="cta-apps">
                                <div class="apps-store">
                                    <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- cta-area-end -->

    </main>
@endsection