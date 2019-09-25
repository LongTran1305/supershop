<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        request()->validate([

            'email' => 'required|email',
            'password' => 'required|min:6',              
            //'confirm_password' => 'required|min:6|max:20|same:password',

        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải trên 6 ký tự.'

        ]);

        if (\Auth::attempt($credentials)) {
            if(\Cart::count()>0){
                return redirect()->route('get.form.pay');
            }
            return redirect()->route('home');
        }

        return redirect()->back();
    } 

    public function getLogout(){
        \Auth::logout();
        return redirect()->route('home');
    }
}
