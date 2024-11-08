<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Volunteer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $volunteer = Volunteer::where('status','1')->count();
        $donor = Donation::count();
        $campaign = Campaign::where('status','1')->count();
        $user = User::where('role','1')->count();

        $data['campaign'] = $campaign;
        $data['volunteer'] = $volunteer;
        $data['donor'] = $donor;
        $data['user'] = $user;
        return view('admin.dashboard',$data);
        
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
