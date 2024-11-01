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
    $user = Auth::user();

    // Fetch donations belonging to the user's campaigns with keyword filtering
    $donations = Donation::whereHas('campaign', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->when($request->filled('keyword'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->get('keyword') . '%');
        })
        ->paginate(10); // Apply pagination directly here

    return view('user.donation.list', ['donations' => $donations]);
}

    public function view(User $user, Donation $donation) {
        return $user->id === $donation->campaign->user_id;
    }
}
