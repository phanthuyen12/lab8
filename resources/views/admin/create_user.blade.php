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
                        <form id="registrationForm">
    <div class="form-group">
        <label for="simpleinput">Họ Và Tên</label>
        <input type="text" id="simpleinput" class="form-control" placeholder="Tên Cửa Hàng" name="full_name">
    </div>

    <div class="form-group">
        <label for="example-password">Email Liên Hệ</label>
        <input type="text" id="example-password" class="form-control" placeholder="Email Liên Hệ" name="email">
    </div>
                                                    
    <div class="form-group">
        <label for="exampleFormControlInput1">Số Điện Thoại</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Số Điện Thoại" name="phone">
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect1">Tỉnh Thành Phố</label>
        <select class="form-control" id="province" name="provincestore">
            <!-- Options -->
        </select>
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect2">Quận Huyện</label>
        <select class="form-control" id="district" name="districtstore">
            <option>Chọn Quận Huyện</option>
            <!-- Options -->
        </select>
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect2">Phường Xã</label>
        <select class="form-control" id="commune" name="communestore">
            <option>Chọn Phường Xã</option>
            <!-- Options -->
        </select>
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlInput1">Mật Khẩu</label>
        <input type="password" class="form-control" id="password" placeholder="Xin Vui Lòng Nhập Mật Khẩu" name="password">
    </div>
    
    <div class="form-group">
        <input type="button" class="btn btn-outline-info btn-lg btn-block" value="Đăng ký" onclick="submitForm()">
    </div>
</form>
                        <!-- end row-->

                    </div> <!-- container-fluid -->
                    </div> <!-- container-fluid -->
</div>
<script>
  function submitForm() {
        // Lấy giá trị của các trường input
        var fullName = document.getElementById('simpleinput').value;
        var email = document.getElementById('example-password').value;
        var phone = document.getElementById('exampleFormControlInput1').value;
        var password = document.getElementById('password').value;
        
        var provinceSelect = document.getElementById('province');
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
            console.log(data);
            $('#province').empty()
            $.each(data.data,function(index,item){
                $('#province').append('<option value="' + item.id + '">' + item._name + '</option>');

            })
            // Thực hiện xử lý dữ liệu ở đây nếu cần
        });
        $('#province').on('change',function(){
            var selectprovinceId = $(this).val();
            $.ajax({
                url: "http://127.0.0.1:8000/api/district/"+selectprovinceId,
                context:document.body
            }).done(function(data){
                console.log(data)
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