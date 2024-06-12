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
    
    <div class=" page-content container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Data Table</h4>
                            <p class="card-subtitle mb-4">
                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            </p>

                            <table id="basic-datatable" class="table  nowrap">
                                <thead>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Thời Gian Tạo</th>
                                        <th>Giá Sản Phẩm</th>
                                        <th>Danh Mục</th>
                                        <th>Ảnh</th>
                                        <th>Thao Tác</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product )
                                    <tr>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_created_at}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td><img src="{{ asset('images/' . $product->img_product) }}" alt="" width="100px"></td>
                                        <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Cập Nhật</button>
                                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title h4" id="myExtraLargeModalLabel">Cập Nhật</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form id="user_registration_form" method="post" action="{{ route('admin.update_product') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="simpleinput">Nhập Tên Sản Phẩm</label>
        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Tên Sản Phẩm" name="name_products" value="{{$product->product_name}}">
    </div>
    <div class="form-group">
        <label for="simpleinput">Nhập Giá Sản Phẩm</label>
        <input type="text" id="simpleinpu1t" class="form-control" placeholder="Nhập Giá Sản Phẩm" name="price_product" value="{{$product->price_product}}">
    </div>
    <div class="form-group">
        <label for="categorySelect">Chọn Danh Mục</label>
        <select class="form-select" id="categorySelect" aria-label="Chọn Danh Mục" name="id_category">
            <option selected disabled>Xin Vui Lòng Chọn Danh Mục</option>
            @foreach ($categorys as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name  }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="simpleinput">Nhập Số Lượng Sản Phẩm</label>
        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Số Lượng" name="stock_quantity"value="{{$product->stock_quantity}}">
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="{{$product->product_id}}">
        <label for="productDescription">Mô Tả Sản Phẩm</label>
        <textarea class="form-control" id="productDescription" rows="5" placeholder="Nhập mô tả sản phẩm" name="describe">{{$product->describe}}</textarea>
    </div>
    <div class="form-group">
        <label for="productImage">Chọn Hình Ảnh</label>
        <input type="file" class="form-control-file" id="productImage" name="img_product">
    </div>
    <input type="submit"class="btn btn-outline-info btn-lg btn-block"  value="cập nhật">
    <!-- <button type="submit"class="btn btn-outline-info btn-lg btn-block" onclick="update_item('{{$product->id}}')">Cập Nhật</button> -->
</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger" onclick="delete_product({{ $product->product_id }})">Xóa</button>
                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    <!-- Table data goes here -->
                                </tbody>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div><!-- end row-->
        </div>
    </div>
    <script>
                                        $(document).ready(function() {
    $('#basic-datatable').DataTable();
});

        function delete_product(id){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

// Hiển thị thông báo xác nhận xóa
if (confirm('Bạn có chắc chắn muốn xóa dữ liệu?')) {
    console.log(csrfToken);
    // Nếu người dùng đồng ý, gửi yêu cầu AJAX để xóa dữ liệu
    $.ajax({
        url: '/admin/product-delete',
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
            console.log(error);
        }
    });
}
        }
//         function update_item(id){
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');
//     console.log(csrfToken);
//     var formData = new FormData();
//     formData.append('id', id);
//     formData.append('_token', csrfToken);

//     formData.append('name_products', $('#simpleinput').val());
//     formData.append('price_product', $('#simpleinpu1t').val());
//     formData.append('id_category', $('#categorySelect').val());
//     formData.append('stock_quantity', $('#simpleinput').val()); // Đã sửa id của input
//     formData.append('describe', $('#productDescription').val());
//     formData.append('img_product', $('#productImage')[0].files[0]); // Lấy file hình ảnh

//     $.ajax({
//         url: '/admin/update-product',
//         type: 'post',
//         processData: false,
//         contentType: false,
//         data: formData,

//         success: function(res) {
//             alert('Cập nhật thành công');
//             // Nếu cần, thực hiện các hành động khác sau khi cập nhật thành công
//         },
//         error: function(xhr, status, error) {
//             alert('Cập nhật thất bại');
//             console.log(error);
//         }
//     });
// }

    </script>
@endsection