<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getView(){
        return view('login');
    }

    public function postLogin(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        Log::info($username);
        $user = DB::select('SELECT * FROM account WHERE username = ? AND password = ?', [$username, $password]);

        if($user) {
            Session::put('islogin', true);
            return redirect()->action('App\Http\Controllers\DashboardController@getView');
        } else {
            return redirect()
                ->action('App\Http\Controllers\LoginController@getView');
        }
    }
}
