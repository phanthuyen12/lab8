@extends('client/layout/layout')
@section('content')

<style>
        .custom-select {
            width: 100%;
            height: 45px;
            border: 1px solid #e5e5e5;
            color: #222;
            padding: 0 20px;
            margin-bottom: 20px;
            display: none;
            transition: 0.3s;
        }
    </style>
<main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="{{asset('images/page-banner-4.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Đăng Ký Tài Khoản</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Trang chủ</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span> Đăng Ký Tài Khoản</span>
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
                            <h5>Đăng Ký Tài Khoản</h5>
                            <form action="{{ route('client.register') }}" method="post">
                            @csrf <!-- Đây là token CSRF cho Laravel -->
                            <label for="name">Nhập học và tên <span>*</span></label>
                            <input id="name" type="text" name="full_name" placeholder="Xin vui lòng nhập email">
                            <label for="name">Nhập Email <span>*</span></label>
                            <input id="name" type="text" name="email" placeholder="Xin vui lòng nhập email">
                            <!-- Thuộc tính name được thêm vào -->
                                                        
                            <label for="pass">Nhập Số Điện Thoại <span>*</span></label>
                            <input id="phone" type="text" name="phone" placeholder="Xin vui lòng nhập số điện thoại...">
                            <!-- Thuộc tính name được thêm vào -->
                            <label for="pass">Nhập Password <span>*</span></label>
                            <input id="pass" type="password" name="password" placeholder="Xin vui lòng nhập password...">
                            <!-- Thuộc tính name được thêm vào -->
                        
                            <div class="form-group">
                <label for="province">Chọn Thành Phố <span>*</span></label>
                <!-- <select class="form-control  custom-select" id="province1" name="provincestore "style="display: none;" required>
                </select> -->
                <select style="display: none;" id="province1"class="form-control " name="provincestore">
                </select>

            </div>
            <div class="form-group">
                <!-- <label for="district">Chọn Quận Huyện <span>*</span></label> -->
                <select class="form-control" id="district" name="districtstore" style="display: none;">
                    <!-- <option>Chọn Quận Huyện</option> -->
                </select>
            </div>
            <div class="form-group">
                <!-- <label for="commune">Chọn Phường Xã <span>*</span></label> -->
                <select class="form-control " id="commune" name="communestore" style="display: none;">
                    <!-- <option>Chọn Phường Xã</option> -->
                </select>
            </div>
                            <div class="login-action mb-10 fix">
                               
                            <span class="forgot-login f-left">
                                    <a href="/login">Đăng Nhập</a>
                                </span>
                                <span class="forgot-login f-right">
                                    <a href="/password-back">Quên Mật Khẩu</a>
                                </span>
                            </div>
                            <input type="submit" value="Đăng Ký" class="tp-in-btn w-100">
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
    <script>
    $(document).ready(function() {
        $('select').niceSelect();

        $('#province1').css('display', 'block');
        $('#district').css('display', 'block');
        $('#commune').css('display', 'block');

        $("#user_registration_form").submit(function(e){
            e.preventDefault(); // Ngăn form gửi yêu cầu HTTP mặc định

            $.ajax({
                type: "POST",
                url: $(this).attr('action'), // Lấy URL từ thuộc tính action của form
                data: $(this).serialize(), // Gửi dữ liệu từ form
                dataType: "json",
                success: function(response){
                    // Xử lý phản hồi JSON nếu cần
                    alert(response.message); // Hiển thị thông báo từ phản hồi JSON
                },
                error: function(xhr, status, error){
                    // Xử lý lỗi nếu có
                    // xhr  đây là biến chwuas thông tin gửi về từ sever
                    // nhận tham số từ sever ví dụ như 500 200
                    // error nhận thông báo lỗi từ sever
                    //responseJSON xác định cấu trúc json
                    var errorMessage = xhr.responseJSON.message; // Lấy thông báo lỗi từ phản hồi JSON
                    alert(errorMessage); // Hiển thị thông báo lỗi
                }
            });
        });
        $.ajax({
            url: "https://toinh-api-tinh-thanh.onrender.com/province",
            context: document.body
        }).done(function(data) {
            console.log(data);
            $('#province1').empty()
            $.each(data,function(index,item){
                $('#province1').append('<option value="' + item.idProvince + '">' + item.name + '</option>');
            })
            // Thực hiện xử lý dữ liệu ở đây nếu cần
        });
        $('#province1').on('change',function(){
            var selectprovinceId = $(this).val();
            $.ajax({
                url: "https://toinh-api-tinh-thanh.onrender.com/district?idProvince="+selectprovinceId,
                context:document.body
            }).done(function(data){
                console.log(data)
                $('#district').empty()
                $.each(data,function(index,item){
                    $('#district').append('<option value="' + item.idDistrict + '">' + item.name + '</option>');
                })
            })
        });
        $('#district').on('change',function(){
            var selectdistrict = $(this).val();
            $.ajax({
                url : "https://api-tinh-thanh-git-main-toiyours-projects.vercel.app/commune?idDistrict="+selectdistrict,

            }).done(function(data){
                console.log(data)
                $('#commune').empty()
                $.each(data,function(index,item){
                    $('#commune').append('<option value="' + item.idCommune + '">' + item.name + '</option>');

                })
            })
        })
    });
</script>
@endsection