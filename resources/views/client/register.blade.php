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
                            <form id="registrationForm">
    <label for="full_name">Nhập học và tên <span>*</span></label>
    <input id="full_name" type="text" name="full_name" placeholder="Xin vui lòng nhập học và tên">
    
    <label for="email">Nhập Email <span>*</span></label>
    <input id="email" type="text" name="email" placeholder="Xin vui lòng nhập email">
    
    <label for="phone">Nhập Số Điện Thoại <span>*</span></label>
    <input id="phone" type="text" name="phone" placeholder="Xin vui lòng nhập số điện thoại...">
    
    <label for="password">Nhập Password <span>*</span></label>
    <input id="password" type="password" name="password" placeholder="Xin vui lòng nhập password...">
    
    <div class="form-group">
        <label for="province1">Chọn Thành Phố <span>*</span></label>
        <select id="province1" class="form-control" name="provincestore">
            
            <!-- Thêm các option khác -->
        </select>
    </div>
    <div class="form-group">
        <label for="district">Chọn Quận Huyện <span>*</span></label>
        <select class="form-control" id="district" name="districtstore">
            <!-- Các option sẽ được thêm vào đây -->
        </select>
    </div>
    <div class="form-group">
        <label for="commune">Chọn Phường Xã <span>*</span></label>
        <select class="form-control" id="commune" name="communestore">
            <!-- Các option sẽ được thêm vào đây -->
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
    <input type="button" value="Đăng Ký" class="tp-in-btn w-100" onclick="submitForm()">
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
 function submitForm() {
    // Lấy giá trị của các trường input
    var fullName = document.getElementById('full_name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('password').value;
    
    var provinceSelect = document.getElementById('province1');
    var provinceText = provinceSelect.options[provinceSelect.selectedIndex].text;
    
    var districtSelect = document.getElementById('district');
    var districtText = districtSelect.options[districtSelect.selectedIndex].text;
    
    var communeSelect = document.getElementById('commune');
    var communeText = communeSelect.options[communeSelect.selectedIndex].text;
    
    // Hiển thị giá trị trong console
    console.log('Full Name: ' + fullName);
    console.log('Email: ' + email);
    console.log('Phone: ' + phone);
    console.log('Password: ' + password);
    console.log('Province: ' + provinceText);
    console.log('District: ' + districtText);
    console.log('Commune: ' + communeText);
    
    // Tạo đối tượng FormData và thêm dữ liệu
    var formData = new FormData();
    formData.append('full_name', fullName);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('password', password);
    formData.append('province', provinceText);
    formData.append('district', districtText);
    formData.append('commune', communeText);
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(csrfToken);
    formData.append('_token', csrfToken);

    
    // Gửi AJAX request
    $.ajax({
        type: 'POST',
        url: '{{ route('client.register') }}', // Cập nhật URL với route thực tế của bạn
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Xử lý phản hồi JSON nếu cần
            alert(response.message); // Hiển thị thông báo từ phản hồi JSON
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi nếu có
            var errorMessage = xhr.responseJSON.message; // Lấy thông báo lỗi từ phản hồi JSON
            alert(errorMessage); // Hiển thị thông báo lỗi
        }
    });
}


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
            url: "http://127.0.0.1:8000/api/province",
            context: document.body
        }).done(function(data) {
            console.log(data.data);
            $('#province1').empty()
            $.each(data.data,function(index,item){
                $('#province1').append('<option value="' + item.id + '">' + item._name + '</option>');
            })
            // Thực hiện xử lý dữ liệu ở đây nếu cần
        });
        $('#province1').on('change',function(){
            var selectprovinceId = $(this).val();
            $.ajax({
                url: "http://127.0.0.1:8000/api/district/"+selectprovinceId,
                context:document.body
            }).done(function(data){
                console.log(data.data)
                $('#district').empty()
                $.each(data.data,function(index,item){
                    $('#district').append('<option value="' + item.id + '">' + item._name + '</option>');
                })
            })
        });
        $('#district').on('change',function(){
            var selectdistrict = $(this).val();
            $.ajax({
                url : "http://127.0.0.1:8000/api/ward/"+selectdistrict,

            }).done(function(data){
                console.log(data)
                $('#commune').empty()
                $.each(data.data,function(index,item){
                    $('#commune').append('<option value="' + item.id + '">' + item._name + '</option>');

                })
            })
        })
    });
</script>
@endsection