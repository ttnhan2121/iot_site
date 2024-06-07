<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getView(){
        return view('login');
    }

    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        Log::info($username);
//        $user = DB::select('SELECT * FROM account WHERE username = ? AND password = ?', [$username, $password]);
        $user = DB::table('account')->where('username', $username)->where('password', $password)->first();

        if($user) {
            Session::put('islogin', true);
            Session::put('user', $username); // Lưu thông tin người dùng nếu cần
            return redirect()->action('App\Http\Controllers\DashboardController@getView');

        } else {
            return redirect()->action('App\Http\Controllers\LoginController@getView')->with("msg", "Đăng nhập thất bại !!!");

        }
    }


}
