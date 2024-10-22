<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
        // $admin = Auth::guard('auth')->user();
        // echo 'Welcome admin'.$admin->name.'<a href="'.route('admin.logout').'">Logout</a>';
    }

    public function logout(){
        Auth::guard('auth')->logout();
        return redirect()->route('login');
    }
}
