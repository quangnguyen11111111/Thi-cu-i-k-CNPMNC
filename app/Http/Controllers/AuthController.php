<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        if ($request->input('username') == '0313767' && $request->input('password') == '0313767') {
            session(['is_logged_in' => true]);

            return redirect('/')->with('success', 'Đăng nhập thành công!');
        } else {

            return redirect('/auth/login')->with('error', 'Sai tên đăng nhập hoặc mật khẩu!');
        }
    }
}
