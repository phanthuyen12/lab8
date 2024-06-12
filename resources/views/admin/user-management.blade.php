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

                                    <table id="basic-datatable" class="table nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Trạng Thái</th>
                                                <th>Phone</th>
                                                <th>Địa Chỉ</th>
                                                <th>Created</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                        @foreach ($user as $u)
<tr>
    <td>{{ $u->full_name }}</td>
    <td>{{ $u->email }}</td>
    <td>{{ $u->trangthai == 1 ? "Khóa tài khoản" : "Tài khoản bình thường" }}</td>
    <td>{{ $u->phone }}</td>
    <td>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewModal{{ $u->user_id }}">Xem Chi tiết</button>
    </td>

    <!-- Modal for viewing details -->
    <div class="modal fade" id="viewModal{{ $u->user_id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $u->user_id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel{{ $u->user_id }}">Địa Chỉ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Thành Phố</label>
                        <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" value="{{ $u->provincestore }}">
                    </div>
                    <div class="form-group">
                        <label>Quận Huyện</label>
                        <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" value="{{ $u->communestore }}">
                    </div>
                    <div class="form-group">
                        <label>Xã , Thị Trấn</label>
                        <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" value="{{ $u->districtstore }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <td>{{ $u->created_at }}</td>
    <td>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModal{{ $u->user_id }}">Cập Nhật</button>

        <!-- Modal for updating user -->
        <div class="modal fade" id="updateModal{{ $u->user_id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $u->user_id }}" aria-hidden="true">
            <form action="{{ route('admin.update-user') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $u->user_id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel{{ $u->user_id }}">Cập Nhật User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" class="form-control" maxlength="25" name="Username" id="Username" value="{{ $u->full_name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" maxlength="25" name="Email" id="Email" value="{{ $u->email }}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" maxlength="25" name="Phone" id="Phone" value="{{ $u->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Thành Phố</label>
                                <input type="text" class="form-control" maxlength="25" name="provincestore" id="provincestore" value="{{ $u->provincestore }}">
                            </div>
                            <div class="form-group">
                                <label>Quận Huyện</label>
                                <input type="text" class="form-control" maxlength="25" name="communestore" id="communestore" value="{{ $u->communestore }}">
                            </div>
                            <div class="form-group">
                                <label>Xã , Thị Trấn</label>
                                <input type="text" class="form-control" maxlength="25" name="districtstore" id="districtstore" value="{{ $u->districtstore }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Cập Nhật">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Form for locking user -->
        <form action="{{ route('admin.lock-user') }}" method="post">
            @csrf <!-- Include CSRF token -->
            <input type="hidden" name="id" value="{{ $u->user_id }}">
            <button type="submit" class="btn btn-danger btn-sm">Lock</button>
        </form>
    </td>
</tr>
@endforeach

                                         
                                          
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->



                 


                


                 

                   
                                       

                </div> <!-- container-fluid -->
            </div>

            <script>
                                        $(document).ready(function() {
    $('#basic-datatable').DataTable();
});

                                    </script>
@endsection