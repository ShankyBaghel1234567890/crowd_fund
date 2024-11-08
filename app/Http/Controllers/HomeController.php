<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\TempImage;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }
    public function program(){
        return view("program");
    }
    public function about(){
        return view("about");
    }
    public function blog(){
        return view("blog");
    }
    public function contact(){
        return view("contact");
    }
    public function blog_details(){
        return view("blog_details");
    }
    public function elements(){
        return view("elements");
    }
    public function events(){
        return view("events");
    }

    public function donate( $campaignId){
        
        $campaign = Campaign::findOrFail($campaignId);
        return view("donate_now",compact('campaign'));
    }

    public function donation_store(Request $request){

     
        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|exists:campaigns,id',
            'name' => 'required',
            'address' => 'required',
            'id_type' => 'required',
            'idno' => 'required',
            'contact' => 'required',
            'amount' => 'required|numeric|min:1',
            'transaction_id' => 'required',
        ]);

        
        if($validator->passes()){

            $donation = new Donation();
            $donation->campaign_id = $request->campaign_id;
            $donation->name = $request->name;
            $donation->address = $request->address;
            $donation->id_type = $request->id_type;
            $donation->idno = $request->idno;
            $donation->contact = $request->contact;
            $donation->amount = $request->amount;
            $donation->transaction_id = $request->transaction_id;
            $donation->save();

            Session::session()->flash('success', 'Your contribution can make people happy, Thanks for your contribution!');

            return response()->json([
                'status' => true,
                'message' => 'Donation successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function volunteers(){
        return view("volunteers");
    }

    public function volunteer_store(Request $request){
        $validator = Validator::make($request->all(),[
            
            'name' => 'required',
            'email' => 'required|email|unique:volunteers',
            'id_type' => 'required',
            'uid' => 'required',
            'occupation' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' =>  'required',
            'zip_code' => 'required',
            'mother' => 'required',
            'father' => 'required'
        ]);

        if($validator->passes()){

            $volunteer = new Volunteer();
            $volunteer->name = $request->name;
            $volunteer->email = $request->email;
            $volunteer->id_type = $request->id_type;
            $volunteer->uid = $request->uid;
            $volunteer->phone = $request->phone;
            $volunteer->occupation = $request->occupation;
            $volunteer->address = $request->address;
            $volunteer->city = $request->city;
            $volunteer->state = $request->state;
            $volunteer->country = $request->country;
            $volunteer->zip_code = $request->zip_code;
            $volunteer->mother = $request->mother;
            $volunteer->father = $request->father;
            $volunteer->save();

            //save image here
            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $volunteer->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/volunteers/'.$newImageName;
                File::copy($sPath,$dPath);

            //     //Generate image thumbnail
                $dPath = public_path().'/uploads/volunteers/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(200,250);
                $image->save($dPath);

                $volunteer->image = $newImageName;
                $volunteer->save();
            }


            $request->session()->flash('success','You are now a volunteer');

            return response()->json([
                'status' => true,
                'message' => 'Volunteer account created successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
