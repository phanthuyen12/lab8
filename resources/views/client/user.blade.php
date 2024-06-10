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
                                            <a href="index.html"><span>Trang chủ</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Thông Tin Tài Khoản</span>
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
        @if (isset($user))
        <div class="account-area mt-70 mb-70">
            <div class="container">
                <div class="row">
                <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
    <div class="card-body">
        <h5>
            Thông tin tài khoản
        </h5>
        
       <div class="mt-4">
        <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Họ và tên</label>
                        <input type="text" class="form-control" value="{{$user['full_name']}}" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Email</label>
                        <input type="text" class="form-control" value="{{$user['email']}}" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Số Điện Thoại</label>
                        <input type="text" class="form-control" value="{{$user['phone']}}" readonly="">
                    </div>
                 
                   
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Thời gian tham gia</label>
                        <input type="text" class="form-control" value="{{$user['created_at']}}" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">

                    <form id="logout-form" action="{{ route('client.logout') }}" method="POST" >
    @csrf
    <!-- Nút để gửi form -->
    <button class="btn btn-primary"  type="submit">Đăng Xuất</button>
</form>
</div>


                </div>
       </div>
    </div>
</div>        </div>
        <div class="col-md-6">
            <div class="card mb-4">
    <div class="card-body">
        <h5>
            Đổi mật khẩu
        </h5>
        
       <div class="mt-4">
        <form action="{{route('client.update_password')}}" method="post">
        @csrf  
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="current_password" placeholder="Nhập mật khẩu cũ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="new_password" placeholder="Nhập mật khẩu mới">
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Thay
                            đổi</button>
                    </div>
                </form>
       </div>
    </div>
</div>        </div>
    </div>
                </div>
    </div>
        </div>

        @else
            <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true" style="padding-right: 0px; display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục.
                        </div>
                        <div class="modal-footer">
                            <a href="/index" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                            <a href="{{ route('client.get_login') }}" class="btn btn-primary">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>      
            
            @endif
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