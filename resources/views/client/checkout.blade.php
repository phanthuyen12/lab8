@extends('client/layout/layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="{{asset('images/page-banner-4.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Checkout</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Home</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Checkout</span>
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

        <!-- coupon-area-start -->
        <section class="coupon-area pt-120 pb-30">
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <!-- <h3>Bạn Chưa Đăng Nhập Thì Vui Lòng <span id="showlogin">Đăng Nhập</span></h3> -->
                        <!-- <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                            <form action="#">
                                    <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                    </p>
                                    <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="text">
                                    </p>
                                    <p class="form-row">
                                    <button class="tp-btn-h1" type="submit">Login</button>
                                    <label>
                                        <input type="checkbox">
                                        Remember me
                                    </label>
                                    </p>
                                    <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                    </p>
                            </form>
                        </div>
                        </div> -->
                        <!-- ACCORDION END -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <!-- <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                    <p class="checkout-coupon">
                                    <input type="text" placeholder="Coupon Code">
                                    <button class="tp-btn-h1" type="submit">Apply Coupon</button>
                                    </p>
                            </form>
                        </div>
                        </div> -->
                        <!-- ACCORDION END -->
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- coupon-area-end -->
       

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Địa điểm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           </button>
      </div>
      <div class="modal-body">
      <form id="radioForm">
    <input type="radio" id="option1" name="option" value="1">
    <label for="option1">Giao theo địa điểm tài khoản</label><br>
    <input type="radio" id="option2" name="option" value="2">
    <label for="option2">Giao địa điểm mới</label><br>
</form>         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id = "saveBtn">Lưu</button>
      </div>
    </div>
  </div>
</div>
        <!-- checkout-area-start -->
        <form action="{{ route('client.check_out') }}" method="post">
        @csrf <!-- Đây là token CSRF cho Laravel -->
        <input type="hidden" name="products" id="products_input">

        <section class="checkout-area pb-85">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3>Thông tin khách hàng</h3>
                                <div class="row">
                                <div class="col-md-12">
                                <div class="checkout-form-list">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Xin vui lòng chọn loại địa điểm
                                    </button>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Họ Và Tên <span class="required">*</span></label>
                                            <input type="text" placeholder="xin vui lòng điền họ tên" name = "full_name" id ="full_name">
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ isset($user['user_id']) ? $user['user_id'] : null }}" name="user_id">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email</label>
                                            <input type="text" placeholder="Xin Vui Lòng Nhập" name="email" id ="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" placeholder="Xin Vui Lòng Nhập Số Điện Thoại"  name = "phone" id = "phone">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                    <div class="country-select">
                                            <label>Tỉnh thành Phố <span class="required">*</span></label>
                                            <select style="display: none;" class="col-md-12" id = "province1" name = "province">
                                               
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list country-select">
                                            <label>Quận Huyện <span class="required">*</span></label>
                                            <select style="display: none;" class="col-md-12" id= "district" name = "district">
                                                
                                            </select>                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list country-select">
                                            <label>Thị Trấn<span class="required">*</span></label>
                                            <select style="display: none;" class="col-md-12" id="commune" name = "commune">
                                             
                                            </select>                                            </div>
                                    </div>
                                   
                                   
                                </div>
                             
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order mb-30 ">
                                <h3>Giỏ hàng</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                    <tr>
                                    <form id="ma-gam-gia">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input type="hidden" name="subtotal_product_gg" id="subtotal_product_gg">
                                        <button class="tp-btn-h1 " name="apply_coupon" type="button">Nhập mã giảm giá</button>
                                    </div>
                                </form>
                                    </tr>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản Phẩm</th>
                                                <th class="product-total">Tổng Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody id= "product_item">
                                            
                                        </tbody>
                                        <tfoot>
                                           
                                        <tr class="shipping">
                                        <th>Giao Hàng</th>
                                        <td>
                                            <ul>
                                                <li>
                                                    <input type="radio" name="shipping" value="online_payment">
                                                    <label>Thanh Toán Online</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping" value="home_delivery">
                                                    <label>Giao Tận Nhà</label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                                                                <tr class="order-total">
                                                <th>Tổng tiền</th>
                                                <td><strong><span id="totls_product" name = "totals_product"></span></strong>
                                               <input type="hidden" name="totals_product" id = "totals_producttg">
                                       
                                                </td>
                                                <tr>
                                                <th>Giá sau áp dụng giảm giá</th>
                                       <td>
                                       <span id ="gg_subtotal_product" name = "totalamountsale">0</span>
                                       <input type="hidden" name="totals_productkm" id = "totals_productkm">

                                       </td>
                                                </tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">
                               
                                 
                                   
                                    </div>
                                    <div class="order-button-payment mt-20">
                                        <input type="submit" value="Thanh Toán">
                                    <!-- <button type="submit" class="tp-btn-h1">Place order</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        </form>
        <!-- checkout-area-end -->

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
   function get_user(token){
    var formData = new FormData();
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(csrfToken);
    formData.append('_token', csrfToken);
    formData.append('token', token);

    $.ajax({
        type: "post",
        url: "/get_usertk_token",
        data: formData, // Sửa formData thay vì data
        processData: false,  // Không xử lý dữ liệu gửi đi
        contentType: false,  // Không thiết lập loại nội dung
        success: function(response){
            // Xử lý phản hồi JSON nếu cần
            data =response.message
            document.getElementById('full_name').value = data.full_name;
           
            console.log(data);
            document.getElementById('email').value =data.email;
            document.getElementById('phone').value =data.phone;
            $('#province1').empty();
            $('#district').empty();
            $('#commune').empty();
            $('#province1').append('<option value="' + data.provincestore + '">' + data.provincestore + '</option>');
            $('#district').append('<option value="' + data.districtstore + '">' + data.districtstore + '</option>');
            $('#commune').append('<option value="' + data.communestore + '">' + data.communestore + '</option>');

          

           
        },
        error: function(xhr, status, error){
            // Xử lý lỗi nếu có
            var errorMessage = xhr.responseJSON.message; // Lấy thông báo lỗi từ phản hồi JSON
            alert(errorMessage); // Hiển thị thông báo lỗi
        }
    });
}

    function get_token_user(){
        $.ajax({
            type: "get",
            url: "/get-user-token",
            success: function(response){
                    // Xử lý phản hồi JSON nếu cần
                    token =response['token']

                    get_user(token)
                },
                error: function(xhr, status, error){
                    // Xử lý lỗi nếu có
                    // xhr  đây là biến chwuas thông tin gửi về từ sever
                    // nhận tham số từ sever ví dụ như 500 200
                    // error nhận thông báo lỗi từ sever
                    //responseJSON xác định cấu trúc json
                    var errorMessage = xhr.responseJSON.message; // Lấy thông báo lỗi từ phản hồi JSON
                    alert('xin vui lòng đăng nhập mới dùng được tính năng này'); // Hiển thị thông báo lỗi
                }
        });

    }
    function get_address(){
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
    }
      $(document).ready(function() {
        
        document.getElementById('saveBtn').addEventListener('click', function() {
    var selectedOption = document.querySelector('input[name="option"]:checked');
    if (selectedOption) {
        console.log(selectedOption.value);
        if (selectedOption.value == 1){
            get_token_user();

        }else{
            get_address();

        }
    } else {
        console.log("Vui lòng chọn một tùy chọn.");
    }
});
        get_address();
        
    });
</script>
<script>
$(document).ready(function() {
    // Bắt sự kiện khi form được submit
    $('button[name="apply_coupon"]').click(function(event) {
        console.log('đã click');
        // Ngăn chặn hành động mặc định của form
        event.preventDefault();
        
        // Lấy mã giảm giá từ trường input
        var couponCode = $('#coupon_code').val();
        
        // Lấy tổng số tiền từ trường input ẩn
        var totalAmount = $('#subtotal_product_gg').val();
        
        // Gửi yêu cầu Ajax tới controller để kiểm tra mã giảm giá
        $.ajax({
            url: '/validate-coupon/' + couponCode,
            type: 'GET',
            success: function(response) {
                console.log(response);
                if (response.valid) {
                    // Mã giảm giá hợp lệ, gửi yêu cầu áp dụng mã giảm giá
                    applyCoupon(couponCode, totalAmount);
                } else {
                    // Mã giảm giá không hợp lệ, hiển thị thông báo lỗi
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error("XHR Status: " + status);
                console.error("Error: " + error);
                console.error("XHR Response Text: " + xhr.responseText);
            }
        });
    });
});


// Hàm để gửi yêu cầu áp dụng mã giảm giá
function applyCoupon(couponCode, totalAmount) {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(csrfToken);
    // Gửi yêu cầu Ajax tới controller để áp dụng mã giảm giá
    $.ajax({
        url: '/apply-coupon/' + couponCode,
        type: 'POST',
        data: {
            total_amount: totalAmount,
            _token: csrfToken
        },
        success: function(response) {
            if (response.success) {
                document.getElementById('gg_subtotal_product').innerText = parseFloat(response.total_amount_after_discount).toLocaleString('vi-VN', { style: 'currency', currency: 'VND'});

                // Áp dụng mã giảm giá thành công, cập nhật tổng số tiền sau khi giảm giá
                
                $('#totals_productkm').val(response.total_amount_after_discount);

                $('#subtotal_product_gg').val(response.total_amount_after_discount);
            } else {
                // Mã giảm giá không thể áp dụng, hiển thị thông báo lỗi
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
    // Log thông tin về lỗi vào console
    console.error("XHR Status: " + status);
    console.error("Error: " + error);
}

    });
}

</script>
<script src="{{ asset('client/thaotac/checkout.js') }}"></script>

@endsection