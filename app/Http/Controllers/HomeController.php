<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Order;

class HomeController extends Controller
{
    //
    public function index(){
        $user = User::count();
        $donhang = Order::count();
        $donhangchuaxl = Order::where('status','đang phê duyệt')->count();
        $donhangdaxl = Order::where('status','xác nhận đơn hàng')->count();

        return view("admin/index",compact('user','donhang','donhangchuaxl','donhangdaxl'));
    }
    public function view_category(){
        return view("admin/create_category");
    }
    public function create_category(Request $request){  }
    public function update_category(Request $request){  }
    public function delete_category(Request $request){ }
}
