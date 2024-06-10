@extends('client/layout/layout')
@section('content')
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
                                            <label>Họ Và Tên <span class="required">*</span></label>
                                            <input type="text" placeholder="xin vui lòng điền họ tên" value="{{ isset($user->full_name) ? $user->full_name : '' }}" name = "full_name">
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ isset($user['user_id']) ? $user['user_id'] : null }}" name="user_id">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email</label>
                                            <input type="text" placeholder="Xin Vui Lòng Nhập" value="{{ isset($user->email) ? $user->email : '' }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" placeholder="Xin Vui Lòng Nhập Số Điện Thoại" value="{{ isset($user->phone) ? $user->phone : '' }}" name = "phone">
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
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="accordion" id="checkoutAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="checkoutOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                            Direct Bank Transfer
                                            </button>
                                        </h2>
                                        <div id="bankOne" class="accordion-collapse collapse show" aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                             <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="paymentTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                                            Cheque Payment
                                            </button>
                                        </h2>
                                        <div id="payment" class="accordion-collapse collapse" aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="paypalThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                            PayPal
                                            </button>
                                        </h2>
                                        <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
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
<script src="{{ asset('client/thaotac/checkout.js') }}"></script>

@endsection