<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('user.dashboard');
        // $admin = Auth::guard('auth')->user();
        // echo 'Welcome admin'.$admin->name.'<a href="'.route('admin.logout').'">Logout</a>';
    }

    public function logout(){
        Auth::guard('auth')->logout();
        return redirect()->route('login');
    }
}
