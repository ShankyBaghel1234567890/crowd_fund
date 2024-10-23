<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function donate(){
        return view("donate_now");
    }

    public function volunteers(){
        return view("volunteers");
    }

    public function volunteer_store(Request $request){
        $validator = Validator::make($request->all(),[
            
            'name' => 'required',
            'email' => 'required|unique',
            'id_type' => 'required',
            'uid' => 'required',
            'occupation' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' =>  'required',
            'zip' => 'required',
            'mother' => 'required',
            'father' => 'required'
        ]);

        if($validator->passes()){

            $campaigns = new Volunteer();
            $campaigns->name = $request->name;
            $campaigns->email = $request->email;
            $campaigns->id_type = $request->id_type;
            $campaigns->uid = $request->uid;
            $campaigns->phone = $request->phone;
            $campaigns->occupation = $request->occupation;
            $campaigns->address = $request->address;
            $campaigns->city = $request->city;
            $campaigns->state = $request->state;
            $campaigns->country = $request->country;
            $campaigns->zip = $request->zip;
            $campaigns->mother = $request->mother;
            $campaigns->father = $request->father;
            $campaigns->save();

            //save image here
            // if(!empty($request->image_id)){
            //     $tempImage = TempImage::find($request->image_id);
            //     $extArray = explode('.',$tempImage->name);
            //     $ext = last($extArray);

            //     $newImageName = $campaigns->id.'.'.$ext;
            //     $sPath = public_path().'/temp/'.$tempImage->name;
            //     $dPath = public_path().'/uploads/campaigns/'.$newImageName;
            //     File::copy($sPath,$dPath);

            // //     //Generate image thumbnail
            // //     // $dPath = public_path().'/uploads/category/thumb/'.$newImageName;
            // //     // $img = Image::make($sPath);
            // //     // $img->resize(450, 600);
            // //     // $img->save($dPath);

            //     $campaigns->image = $newImageName;
            //     $campaigns->save();
            // }


            $request->session()->flash('success','You are now a volunteer');

            return response()->json([
                'status' => true,
                'message' => 'Campaign created successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
