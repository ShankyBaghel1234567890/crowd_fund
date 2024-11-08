<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function index(Request $request)
{
    //SELECT * FROM `donations` WHERE campaign_id IN (SELECT id FROM `campaigns` WHERE user_id = 4);
        $user = Auth::user();
        $campaigns = Campaign::where('user_id',$user->id)->pluck('id')->toArray();
        // $donations = Donation::where('campaign_id',$campaigns)->orderBy('created_at','DESC')->get();
        $query = Donation::whereIn('campaign_id', $campaigns)
                     ->orderBy('created_at', 'DESC');

        if($request->has('keyword') && !empty($request->get('keyword'))){
            $query->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
        $donations = $query->get();
        // $donations = $query->paginate(10);
        // $data['donations'] = $donations;
        // $data['paginate'] = $donations;

    return view('user.donation.list', compact('donations'));
}

    // public function view(User $user, Donation $donation) {
    //     return $user->id === $donation->campaign->user_id;
    // }
}
