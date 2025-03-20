<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $userId = Auth::user();
        $campaign = Campaign::where('user_id',$userId->id)->count();
        $campaigns = Campaign::where('user_id',$userId->id)->pluck('id')->toArray();
        $donation = Donation::whereIn('campaign_id', $campaigns)->count();
        $data['campaign'] = $campaign;
        $data['donation'] = $donation;

        
        // Fetch donation stats
        $donations = Donation::whereIn('campaign_id', $campaigns)
            ->select(
                DB::raw('SUM(amount) as total'),
                DB::raw('DATE(created_at) as date')
            )
            ->groupBy('date')
            ->get();
        
        // Prepare structured data for charting
        $donationStats = [
            'daily' => Donation::whereIn('campaign_id', $campaigns)
                ->whereDate('created_at', Carbon::today())
                ->sum('amount'),
            
            'weekly' => Donation::whereIn('campaign_id', $campaigns)
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->sum('amount'),
            
            'monthly' => Donation::whereIn('campaign_id', $campaigns)
                ->whereMonth('created_at', Carbon::now()->month)
                ->sum('amount'),
            
            'yearly' => Donation::whereIn('campaign_id', $campaigns)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('amount'),
        ];
        $data['donationStats'] = $donationStats;
        $data['donations'] = $donations;
        return view('user.dashboard',$data);
        // $admin = Auth::guard('auth')->user();
        // echo 'Welcome admin'.$admin->name.'<a href="'.route('admin.logout').'">Logout</a>';
    }



    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
