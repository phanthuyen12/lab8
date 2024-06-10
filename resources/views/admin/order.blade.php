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
    <form id="update_order">
    @csrf

    <div class=" page-content container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Data Table</h4>
                            <p class="card-subtitle mb-4">
                                DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:
                                <code>$().DataTable();</code>.
                            </p>
                            <div class="table-responsive">
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID đơn hàng</th>
                                        <th>Người dùng</th>
                                        <th>Thời Gian</th>
                                        <th>Trạng Thái</th>
                                        <th>Chi Tiết Đơn Hàng</th>

                                        <th>Thao tác</th>
                                        <!-- <th>Thao Tác</th> -->
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_id}}</td>
                                    <td>
    @if (is_null($order->user_id))
        Khách hàng không đăng ký
    @else
        {{ $order->user_id }}
    @endif
</td>
                                    <td>{{ $order->order_date}}</td>
                                    <td>{{ $order->status}}</td>
                                    <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="order_details('{{ $order->order_id}}')">Chi Tiết Đơn Hàng</button>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="update_order('{{$order->order_id}}')">Xác Nhận Đơn Hàng</button>
</td>
                                </tr>
                                @endforeach
                                    
                                    <!-- Table data goes here -->
                                </tbody>
                            </table>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div><!-- end row-->
        </div>
    </div>
    </form>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title h4" id="myExtraLargeModalLabel">Chi Tiết Đơn Hàng</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="table-responsive">
                                                        
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Họ Tên Khách </th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">Địa Điểm</th>
                                                        <th scope="col">Tên Sản phẩm</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>

                                                        <td>@mdo</td>
                                                    </tr>
                                                        
                                                    </tbody>

                                                    </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="{{ asset('admin/thaotac/order.js') }}"></script>
@endsection