<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){

        request()->validate([

            'name' => 'required|min:3|max:30',
            'phone' => 'required|numeric',     
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',              
            //'confirm_password' => 'required|min:6|max:20|same:password',

        ], [
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Chiều dài tên phải trên 3 ký tự.',
            'name.max' => 'Chiều dài tên phải dưới 30 ký tự.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.numeric' => 'Số điện thoại phải ở dạng chữ số.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải trên 6 ký tự.'

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        if($user){
            return redirect()->route('get.login');
        }

        return redirect()->back();
    }
}
