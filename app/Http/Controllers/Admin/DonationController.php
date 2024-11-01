<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request){

        $donations = Donation::all();
        $query = Donation::query();

        if(!empty($request->get('keyword'))){
            $donations = $donations->where('name','like','%'.$request->get('keyword').'%');
        }
        $donations = $query->paginate(10);
        return view('admin.donation',compact('donations'));
    }

    public function destroy($donationId, Request $request){

        $donation = Donation::find($donationId);
        if(empty($donation)){
            $request->session()->flash('error','Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Campaign not found'
            ]);
            
        }


        $donation->delete();

        $request->session()->flash('success','Campaign deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Campaign deleted successfully'
        ]);
    }
}
