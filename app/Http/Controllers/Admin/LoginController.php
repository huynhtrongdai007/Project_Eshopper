<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index() {

    	return view('admin.login');
    }

     public function progressLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');	

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.slider.index');
        } else {
        	return redirect()->route('admin.login');
        }
    }
}
