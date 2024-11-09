<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();
        $campaign = Campaign::where('user_id',$user->id)->count();
        $campaigns = Campaign::where('user_id',$user->id)->pluck('id')->toArray();
        $donation = Donation::whereIn('campaign_id', $campaigns)->count();
        $data['campaign'] = $campaign;
        $data['donation'] = $donation;
        return view('user.dashboard',$data);
        // $admin = Auth::guard('auth')->user();
        // echo 'Welcome admin'.$admin->name.'<a href="'.route('admin.logout').'">Logout</a>';
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
