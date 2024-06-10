@extends('admin/layout')
@section('content')
<div class="main-content">
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm mr-2 d-lg-none header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="header-breadcumb">
                <h6 class="header-pretitle d-none d-md-block">Pages <i class="dripicons-arrow-thin-right"></i> Dashboard</h6>
                <h2 class="header-title">Overview</h2>
            </div>
        </div>
       
        
    </div>

</header>
<div class="page-content">
                    <div class="container-fluid">

                        <div class="row-12">
                        <form id="user_registration_form" action="{{ route('admin.create-user') }}" method="post">
    @csrf
                                            <div class="form-group">
                                                <label for="simpleinput">Họ Và Tên</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Tên Cửa Hàng" name ="full_name">
                                            </div>

                                            <div class="form-group">
                                                <label for="example-password">Email Liên Hệ</label>
                                                <input type="text" id="example-password" class="form-control" placeholder="Email Liên Hệ"name ="email">
                                            </div>
                                                    
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Số Điện Thoại</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Số Điện Thoại" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Tỉnh Thành Phố</label>
                                                <select class="form-control" id="province" name ="provincestore">
                                                <option>Chọn Thành Phố</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Quận Huyện</label>
                                                <select class="form-control" id="district" name= "districtstore">
                                                <option>Chọn Quận Huyện</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Phường Xã</label>
                                                <select class="form-control" id="commune" name= "communestore">
                                                    <option>Chọn Phường Xã</option>
                                                    
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Mật Khẩu</label>
                                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Xin Vui Lòng Nhập Mật Khẩu" name="password">
                                            </div>
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Đăng ký">
                                            </div>
                                           
                                            
                                            
                                            
                                        </form>
                        <!-- end row-->

                    </div> <!-- container-fluid -->
                    </div> <!-- container-fluid -->
</div>
<script>
    $(document).ready(function() {
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
            $('#province').empty()
            $.each(data,function(index,item){
                $('#province').append('<option value="' + item.idProvince + '">' + item.name + '</option>');
            })
            // Thực hiện xử lý dữ liệu ở đây nếu cần
        });
        $('#province').on('change',function(){
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