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
        <div class="d-flex align-items-center">
            
            <button type="button" class="btn btn-primary d-none d-lg-block ml-2">
                <i class="mdi mdi-pencil-outline mr-1"></i> Create Reports
            </button>

            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge badge-danger badge-pill">6</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset">
                            <div class="media py-2 px-3">
                                <img src="assets/images/users/avatar-2.jpg"
                                    class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                    <p class="font-size-12 mb-1">You have new follower on Instagram</p>
                                    <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset">
                            <div class="media py-2 px-3">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-cloud-download-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Download Available !</h6>
                                    <p class="font-size-12 mb-1">Latest version of admin is now available. Please download here.</p>
                                    <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 4 hours ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset">
                            <div class="media py-2 px-3">
                                <img src="assets/images/users/avatar-3.jpg"
                                    class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                                    <p class="font-size-12 mb-1">Just upgraded to premium account.</p>
                                    <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                        alt="Header Avatar"> -->
                    <span class="d-none d-sm-inline-block ml-1">Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" >
    @csrf
    <!-- Nút để gửi form -->
    <button class="dropdown-item d-flex align-items-center justify-content-between"  type="submit">Logout</button>
</form>

                 
                </div>
            </div>
            
        </div>
    </div>
</header>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase font-size-12 text-muted mb-3">TỔng User</h6>
                                <span class="h3 mb-0">{{$user}} </span>
                            </div>
                          
                        </div> <!-- end row -->

                        <div id="sparkline1" class="mt-3"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            
            <div class="col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Tổng Đơn Hàng</h6>
                                <span class="h3 mb-0"> {{$donhang}}</span>
                            </div>
                            
                        </div> <!-- end row -->

                        <div id="sparkline2" class="mt-3"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Đơn hàng chưa xử lý</h6>
                                <span class="h3 mb-0"> {{$donhangchuaxl}} </span>
                            </div>
                         
                        </div> <!-- end row -->

                        <div id="sparkline3" class="mt-3"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase font-size-12 text-muted mb-3">Đơn Hàng Thành Côngs</h6>
                                <span class="h3 mb-0"> {{$donhangchuaxl}} </span>
                            </div>
                           
                        </div> <!-- end row -->

                        <div id="sparkline4" class="mt-3"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->

     
        <!-- end row-->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
        
                        <h4 class="card-title">Đơn Hàng</h4>
                        <p class="card-subtitle mb-4">Thông Tin Đơn Hàng</p>
                        
                        <div class="table-responsive">
                            <table class="table table-centered table-striped table-nowrap">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Create Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-5.jpg" alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">Zara Raws</a>
                                        </td>
                                        <td>
                                            (02) 75 150 655
                                        </td>
                                        <td>
                                            austin@dayrep.com
                                        </td>
                                        <td>
                                            Germany
                                        </td>
                                        <td>
                                            07/15/2018
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
            
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
        
                        <h4 class="card-title">Thanh Toán</h4>
                        <p class="card-subtitle mb-4">Những Đơn Hàng Đã Được Thanh Toán</p>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">4257 **** **** 7852</h5>
                                            <span class="text-muted font-size-12">11 April 2019</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">$79.49</h5>
                                            <span class="text-muted font-size-12">Amount</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-17 mb-1 font-weight-normal"><i class="fab fa-cc-visa"></i></h5>
                                            <span class="text-muted font-size-12">Card</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">Helen Warren</h5>
                                            <span class="text-muted font-size-12">Pay</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">4265 **** **** 0025</h5>
                                            <span class="text-muted font-size-12">28 Jan 2019</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">$1254.00</h5>
                                            <span class="text-muted font-size-12">Amount</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-17 mb-1 font-weight-normal"><i class="fab fa-cc-stripe"></i></h5>
                                            <span class="text-muted font-size-12">Card</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">Kayla Lambie</h5>
                                            <span class="text-muted font-size-12">Pay</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">5570 **** **** 8547</h5>
                                            <span class="text-muted font-size-12">08 Dec 2018</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">$784.25</h5>
                                            <span class="text-muted font-size-12">Amount</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-17 mb-1 font-weight-normal"><i class="fab fa-cc-amazon-pay"></i></h5>
                                            <span class="text-muted font-size-12">Card</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">Hugo Lavarack</h5>
                                            <span class="text-muted font-size-12">Pay</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">7845 **** **** 5214</h5>
                                            <span class="text-muted font-size-12">03 Dec 2018</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">$485.24</h5>
                                            <span class="text-muted font-size-12">Amount</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-17 mb-1 font-weight-normal"><i class="fab fa-cc-visa"></i></h5>
                                            <span class="text-muted font-size-12">Card</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">Amber Scurry</h5>
                                            <span class="text-muted font-size-12">Pay</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">4257 **** **** 7852</h5>
                                            <span class="text-muted font-size-12">12 Nov 2018</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">$8964.04</h5>
                                            <span class="text-muted font-size-12">Amount</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-17 mb-1 font-weight-normal"><i class="fab fa-cc-visa"></i></h5>
                                            <span class="text-muted font-size-12">Card</span>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-1 font-weight-normal">Caitlyn Gibney</h5>
                                            <span class="text-muted font-size-12">Pay</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

</div>
@endsection