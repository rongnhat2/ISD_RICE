<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $id = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::table('user_classify')->insert([
                'user_id' => $id,
                'classify_id' => '1'
            ]);

            DB::commit();
            return redirect()->route('customer.login');
        } catch (\Exception $exception) {
			Session::flash('error', 'Email đã tồn tại');
            return redirect()->route('customer.register');
        }
    }

    public function postLogin(Request $request) {
	// Kiểm tra dữ liệu nhập vào
    	$rules = [
    		'email' =>'required|email',
    		'password' => 'required|min:8'
    	];
    	$messages = [
    		'email.required' => 'Email là trường bắt buộc',
    		'email.email' => 'Email không đúng định dạng',
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);
	
	
		if ($validator->fails()) {
			// Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
			return redirect()->route('customer.login')->withErrors($validator)->withInput();
		} else {
			// Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
			$email = $request->input('email');
			$password = $request->input('password');
	 
			if( Auth::attempt(['email' => $email, 'password' =>$password])) {
				// Kiểm tra đúng email và mật khẩu sẽ chuyển trang
	            return redirect()->route('customer.index');
			} else {
				// Kiểm tra không đúng sẽ hiển thị thông báo lỗi
				Session::flash('error', 'Email hoặc mật khẩu không đúng!');
	            return redirect()->route('customer.login');
			}
		}
	}

    public function postOrder(Request $request) {
    	if(Auth::check()){
    		dd('da dang nhap');
    	}else{
			Session::flash('error', 'Bạn Cần Đăng Nhập Để Đặt Hàng');
	        return redirect()->route('customer.login');
    	}
    }

}
