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
            <form id="user_registration_form" action="{{ route('admin.create_discount') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="simpleinput">Code mã giảm giá</label>
                        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Tên Danh Mục" name="code">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">Mứt Giảm Giá %</label>
                        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Tên Danh Mục" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">Ngày Hết Hạn</label>
                        <input type="date" id="simpleinput" class="form-control" placeholder="Nhập Tên Danh Mục" name="expiration_date">
                    </div>
                    <div class="form-group">
                        <label for="simpleinput">Số Lượng Dùng</label>
                        <input type="text" id="simpleinput" class="form-control" placeholder="Nhập Tên Danh Mục" name="usage_limit">
                    </div>
                  
                    <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Tạo Mã Giảm Giá">
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
                                        <th>Codes</th>
                                        <th>Mức Giá</th>
                                        <th>Thời Gian Hết Hạn</th>
                                        <th>Số Lượng</th>
                                        <th>Số Lượng Đã Dùng</th>
                                        <th>Thời Gian Tạo</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id = "list_data">
                                @foreach ($discount as $item)
                                    <tr>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->discount}}</td>
                                        <td>{{$item->expiration_date}}</td>
                                        <td>{{$item->usage_limit}}</td>
                                        <td>{{$item->times_used}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-toggle-status" data-id="{{ $item->id }}">
                                                {{ $item->status ? 'Mở' : 'Dừng' }}
                                            </button>
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
</div>
<script>
                                        $(document).ready(function() {
    $('.btn-toggle-status').click(function() {
        const discountId = $(this).data('id');
        console.log(discountId);
        const button = $(this);

        $.ajax({
            url: '{{ route("update-status") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: discountId
            },
            success: function(response) {
                if (response.status !== undefined) {
                    button.text(response.status ? 'Mở' : 'Dừng');
                } else {
                    alert('Cập nhật trạng thái thất bại.');
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr);
            }
        });
    });
});
                                    </script>
                                    

@endsection