<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidationRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function show_login_view()
    {
        return view('admin.auth.login');
    }

    public function login(LoginValidationRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
