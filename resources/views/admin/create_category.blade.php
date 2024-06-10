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
            <form id="user_registration_form" action="{{ route('admin.create-category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="simpleinput">Nhập Tên Danh Mục</label>
                        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Tên Danh Mục" name="category_name">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">Chọn File Ánh</label>
                        <input type="file" id="simpleinput" class="form-control"  name="category_img">
                    </div>
                    <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Tạo Danh Mục">
                </form>
            </div>
        </div>
        <div class=" page-content container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Data Table</h4>
                            <p class="card-subtitle mb-4">
                            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Tên Danh Mục</th>
                                        <th>Hình Ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng sản phẩm con</th>
                                        <th>Thời Gian Tạo</th>
                                        <th>Thao Tác</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id = "list_data">
                                 
                                    
                                    <!-- Table data goes here -->
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div><!-- end row-->
        </div>
    </div>
</div>

<script src="{{ asset('admin/thaotac/category.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded',function(){
    select_data();
})

function delete_item(id) {
    // Lấy giá trị CSRF token từ thẻ meta
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Hiển thị thông báo xác nhận xóa
    if (confirm('Bạn có chắc chắn muốn xóa dữ liệu?')) {
        console.log(csrfToken);
        // Nếu người dùng đồng ý, gửi yêu cầu AJAX để xóa dữ liệu
        $.ajax({
            url: '/admin/delete_category',
            type: 'post',
            data: { 
                _token: csrfToken, // Thêm token CSRF vào dữ liệu của yêu cầu
                id: id // Thêm ID cần xóa
            },
            success: function(res) {
                alert('Xóa thành công');
                select_data();

                // Nếu cần, thực hiện các hành động khác sau khi xóa thành công
            },
            error: function(xhr, status, error) {
                alert('Xóa thất bại');
                console.log(xhr.responseJSON.message);
            }
        });
    }
}
// function update_item(id) {
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');

//     // Lấy dữ liệu từ các trường input
//     var name_category = $('#name_category').val();
//     var category_img = $('#category_img').prop('files')[0]; // Lấy tệp hình ảnh

//     // Tạo một FormData object để gửi dữ liệu form và tệp hình ảnh
//     var formData = new FormData();
//     formData.append('_token', csrfToken);
//     formData.append('id', id);
//     formData.append('name_category', name_category);
//     formData.append('category_img', category_img);

//     // Gửi yêu cầu AJAX
//     $.ajax({
//         url: '/admin/update_category',
//         type: 'post',
//         data: formData, // Sử dụng FormData object
//         contentType: false,
//         processData: false,
//         success: function(res) {
//             alert('Cập nhật thành công');
//             select_data(); // Gọi lại hàm select_data để tải lại danh sách dữ liệu

//             // Nếu cần, thực hiện các hành động khác sau khi cập nhật thành công
//         },
//         error: function(xhr, status, error) {
//             alert('Cập nhật thất bại');
//             console.log(error);
//         }
//     });
// }
function update_trangthai(id){
    // alert('giá trị click vào'+ id)
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('id', id);
        $.ajax({
        url: '/admin/update_trangthai',
        type: 'post',
        data: formData, // Sử dụng FormData object
        contentType: false,
        processData: false,
        success: function(res) {
            alert('Cập nhật thành công');
            select_data(); // Gọi lại hàm select_data để tải lại danh sách dữ liệu

            // Nếu cần, thực hiện các hành động khác sau khi cập nhật thành công
        },
        error: function(xhr, status, error) {
            alert('Cập nhật thất bại');
            console.log(error);
        }
    });

}   

function select_data(){
    $('#list_data').empty();
    
    $.ajax({
        url:'/admin/data_category',
        type: 'get',
        success:function(res){
            console.log(res)
            $('#list_data').html('');
            res.forEach(item => {
    $('#list_data').append(`
        <tr>
            <td>${item.category_name}</td>
            <td>    
                <img src="/images/${item.images}" alt="" style="width: 100px;"> 
            </td>
<td>${item.trangthai == 1 ? 'Hiện' : 'Ẩn'}</td>
            <td>${item.created_at}</td>
            <td>${item.products_count}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_${item.category_id}" onclick="get_item_id(${item.category_id})">Cập Nhật</button>
                <div class="modal fade" id="modal_${item.category_id}" tabindex="-1" role="dialog" aria-labelledby="modal_${item.category_id}_title" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_${item.category_id}_title" >Cập nhật</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="user_registration_form_${item.category_id}" action="/admin/update_category" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name_category_${item.category_id}">Tên Danh Mục</label>
                                        <input type="text" class="form-control" id="name_category_${item.category_id}" name="name_category" aria-describedby="emailHelp" placeholder="${item.category_name}" value="${item.category_name}">
                                        <input type="hidden" name="id" id="id_${item.category_id}" value="${item.category_id}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_img_${item.category_id}">Hình</label>
                                        <input type="file" class="form-control" id="category_img_${item.category_id}" name="category_img" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" onclick="update_trangthai(${item.category_id})">Cập Nhật Trạng Thái</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="delete_item(${item.category_id})">Xóa</button>
            </td>
        </tr>
    `);


            });
            
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi ở đây
            console.log(error);
        }


    });
}

function creat_item(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var category_img = $('#categoryImage').prop('files')[0];
    var category_name = $('#categoryName').val();
    var formData = new FormData();
    formData.append('category_img', category_img);
    formData.append('category_name', category_name);
    formData.append('_token', csrfToken);
    $.ajax({
        url: '{{ route('admin.create-category') }}',
        type: 'post',
        processData: false,
        contentType: false,
        data: formData,
        success: function(res) {
            alert('Tạo thành công');
            // Nếu cần, thực hiện các hành động khác sau khi tạo thành công
        },
        error: function(xhr, status, error) {
            alert('Tạo thất bại');
            console.log(error);
        }
    });
}
</script>
@endsection