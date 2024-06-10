@extends('admin/layout')
@section('content')
<style>
    .form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-select {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-select:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.form-select option {
    padding: 8px;
}

</style>
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
            <form id="user_registration_form" action="{{ route('admin.create-product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="simpleinput">Nhập Tên Sản Phẩm</label>
        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Tên Sản Phẩm" name="name_products">
    </div>
    <div class="form-group">
        <label for="simpleinput">Nhập Giá Sản Phẩm</label>
        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Giá Sản Phẩm" name="price_product">
    </div>
    <div class="form-group">
        <label for="categorySelect">Chọn Danh Mục</label>
        <select class="form-select" id="categorySelect" aria-label="Chọn Danh Mục" name="id_category">
            <option selected disabled>Xin Vui Lòng Chọn Danh Mục</option>
            @foreach ($categorys as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="simpleinput">Nhập Số Lượng Sản Phẩm</label>
        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Số Lượng" name="stock_quantity">
    </div>
    <div class="form-group">
        <label for="productDescription">Mô Tả Sản Phẩm</label>
        <textarea class="form-control" id="productDescription" rows="5" placeholder="Nhập mô tả sản phẩm" name="describe"></textarea>
    </div>
    <div class="form-group">
        <label for="productImage">Chọn Hình Ảnh</label>
        <input type="file" class="form-control-file" id="productImage" name="img_product">
    </div>
    <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Tạo Sản Phẩm">
</form>

            </div>
        </div>


    </div>
</div>
<div>

</div>
@endsection