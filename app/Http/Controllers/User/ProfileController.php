<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    public function index(){

        $user = Auth::user();
        $users = User::where('id',$user->id)->orderBy('created_at','DESC')->get();
        $data['users'] = $users;
        return view ('user.profile.show',$data);
    }

    public function edit($userId,Request $request){

        $users = User::find($userId);
        if(empty($users)){
            $request->session()->flash('error','Record not found');
            return redirect()->route('user.profile');
        }

        
        $data['users'] = $users;
        return view('user.profile.create',$data);
    
    }

    public function store($userId, Request $request){
        $users  = User::find($userId);

        if(empty($users)){
            $request->session()->flash('error','Record not found');
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'id_type' => 'required',
            'idno' =>  'required',
            'address' =>  'required',
        ]);

        if($validator->passes()){

            
            
            $users->name = $request->name;
            $users->gender = $request->gender;
            $users->dob = $request->dob;
            $users->phone = $request->phone;
            $users->id_type= $request->id_type;
            $users->idno = $request->idno;
            $users->address = $request->address;
            $users->save();

            //save image here
            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $users->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/users/'.$newImageName;
                File::copy($sPath,$dPath);

            //     //Generate image thumbnail
                $dPath = public_path().'/uploads/users/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(200,250);
                $image->save($dPath);

                $users->image = $newImageName;
                $users->save();

            }

            
        


            $request->session()->flash('success','User updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'User updated successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    
}
