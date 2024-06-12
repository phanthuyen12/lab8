<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;

use App\Http\Controllers\PasswordChanged;

class UserController extends Controller
{
    //
    public function index(){
        return view("admin/create_user");
    }
    public function lock_user(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
    
        // Extract data from the request
        $id = $request->id;
    
        // Find the user by ID
        $user = User::where('user_id',$id)->first();
    
        if ($user) {
            // Toggle the user status
            $user->trangthai = $user->trangthai == 1 ? 0 : 1;
    
            // Save the updated user status
            $user->save();
    
            // Return success response
            return redirect()->back()->with('success', 'thành công');

        } else {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }    }
    public function update_user(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|integer',
            'Username' => 'required|string',
            'Email' => 'required|email',
            'Phone' => 'required|string',
            'provincestore' => 'required|string',
            'communestore' => 'required|string',
            'districtstore' => 'required|string',
        ]);

        // Extract data from the request
        $id = $request->id;
        $username = $request->Username;
        $email = $request->Email;
        $phone = $request->Phone;
        $provincestore = $request->provincestore;
        $communestore = $request->communestore;
        $districtstore = $request->districtstore;

        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Update user data
            $user->full_name = $username;
            $user->email = $email;
            $user->phone = $phone;
            $user->provincestore = $provincestore;
            $user->communestore = $communestore;
            $user->districtstore = $districtstore;

            // Save the updated user
            $user->save();
            return redirect()->back()->with('success', 'thành công');

        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }
    public function user_management(){
        $user_management = User::get();
        // print_r($user_management);
        return view("admin/user-management",["user"=>$user_management]);
    }
    public function create_user(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name'=>'required|string|max:255',
            'email' => 'required|string|email|unique:users', // Ensure unique email
            'phone' => 'required|string', // Adjust validation rules for phone number as needed
            'province' => 'required|string', // Adjust validation rules as needed
            'district' => 'required|string', // Adjust validation rules as needed
            'commune' => 'required|string', // Adjust validation rules as needed
            'password' => 'required|string|min:8', // Enforces password confirmation
        ]);
    
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
    
        $randomToken = Str::random(60); // Generate a random token with length 60
        // Ensure token is unique
        while(User::where('token', $randomToken)->exists()){
            $randomToken = Str::random(60);
        }
    
        $user = User::create([
            'full_name'=> $request->input('full_name'),
            'email' => $request->email,
            'phone' => $request->phone,
            'provincestore' => $request->province,
            'districtstore' => $request->district,
            'communestore' => $request->commune,
            'role' => '1',
            'password' => Hash::make($request->password),
            'token' => $randomToken
        ]);
    
        if(!$user){
            return response()->json(['message' => 'Không thể tạo người dùng'], 500);
        }
    
        return response()->json(['message' => 'Thành công', 'users' => $user]);
    }
    
    public function password_black(Request $request){
        $mail = $request->input('email');
        $user = User::where('email', $mail)->first();
    
        if ($user) {
            $name = 'Xin vui lòng bấm vào mail để lấy lại mật khẩu: http://127.0.0.1:8000/ForgotPasswordController?token='.$user->token.'&email='.$user->email;
            Mail::send('client/testmail', compact('name'), function($message) use ($user) {
                $message->to($user->email); // Sử dụng biến $user để lấy email
                $message->subject('lấy lại mật khẩu'); // Thêm chủ đề cho email
                
            });
            return response()->json(['trạng thái' => 'đã thành công'], 200);

    
            // Nếu bạn muốn hiển thị token của người dùng, đảm bảo bạn có thuộc tính token trong bảng users
            // echo $user->token;
        } else {
            // Xử lý trường hợp không tìm thấy người dùng
            return response()->json(['trạng thái' => 'không có mail trong cơ sở dữ liệu'], 404);
        }
    }
    
    public function test_mail(Request $request){
        $name = 'phan thuyen tesst';
        Mail::send('client/testmail', compact('name'), function($email){
            $email->to('thuyendi2004@gmail.com', 'tesst noi dung'); // Added semicolon here
            $email->subject('Đây là chủ đề của email'); // Thêm chủ đề cho email

        });
    }
    
    public function password_back(Request $request){
        return view('client/password_back');
    }
    public function get_login(Request $request){
        return view('admin/login');

    }public function login_admin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 2) {
                $user = Auth::user();
                $user_data = $user->toArray();
                session()->put('user', $user_data);
                return redirect()->intended('/admin/index');
            } else {
                return redirect()->back()->withErrors('Đăng nhập thất bại. Tài khoản của bạn không có quyền truy cập.');
            }
        } else {
            return redirect()->back()->withErrors('Email hoặc mật khẩu không chính xác');
        }
    }
    public function logout_admin(Request $request){
        $request->session()->forget('user');
        return redirect()->intended('/admin/login');



    }
    public function forgotPassword(Request $request){
        $token = $request->query('token'); // Lấy token từ URL
        $email = $request->query('email');
        
        $user = User::where('email', $email)
                    ->where('token', $token)
                    ->first();
        
        if ($user) {
            return view('client/new_password', compact('token','email'));
        } else {
            echo 'Không tìm thấy tài khoản với email và token tương ứng.';
        }
    }
    
    public function update(Request $request){

    }
    public function store(Request $request){ 

    }
    public function show(User $user){

    }
    public function edit(User $user){

    }
    public function updatePassword(Request $request){

    }
    public function destroy(User $user){

    }
    public function update_password(Request $request){
        $request->validate([
            'current_password' => ['required', 'string', 'min:8', 'max:255'],
            'new_password' => ['required', 'string', 'min:8', 'max:255'],
        ]);
    
        $usertoken = session('user')['token'] ?? null;
        if (!$usertoken) {
            return response()->json([
                'error' => true,
                'message' => 'Đăng nhập mới được đổi mật khẩu.'
            ]);
        }
    
        $user = User::where('token', $usertoken)->first();
    
        if (!$user) {
            return response()->json([
                'error' => true,
                'message' => 'không tìm thấy user'
            ]);
        }
    
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json([
                'error' => true,
                'message' => 'thất bại'
            ]);
        }
    
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
    
        return response()->json([
            'success' => true,
            'message' => 'thành công'
        ]);
    }
    
        public function user_login(Request $request){
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 1) {
                $user = Auth::user();
                $user_data = $user->toArray();
                session()->put('user', $user_data);
                return redirect()->intended('/');
            } else {
                return redirect()->back()->withErrors('Đăng nhập thất bại. Tài khoản của bạn không có quyền truy cập.');
            }
        } else {
            return redirect()->back()->withErrors('Email hoặc mật khẩu không chính xác');
        }
    }
    public function logout_user(Request $request){
        $request->session()->forget('user');
        return redirect()->intended('/login');



    }
    public function chane_password(Request $request){
        $request->validate([
            ' ' => ['required', 'string', 'min:8', 'max:255'],
        ]);
    
        $usert = $request->input('tokenpass');
        $email = $request->input('email');
        $passnew = $request->input('new_password');

        $user = User::where('token', $usert)->first();
        $randomToken = Str::random(60); // Tạo một token ngẫu nhiên với độ dài 60 ký tự

        // $user->token =  $randomToken;
        $user->password = Hash::make($passnew);
        $user->save(); // Save changes to database
    
    
        return response()->json([
            'message' => 'Password changed successfully!',
        ], 200); // Use HTTP status code 200 for success
    
        
    }
    function get_user_token(Request $request){
        try{
            $token = $request->input('token'); // Lấy token từ URL
        
            $user = User::where('token', $token)
                        ->first();
            return response()->json([
                'message' => $user,
            ], 200); // Use HTTP status code 200 for success
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 409); // Use HTTP status code 200 for success

        }
     
    }
}