<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class VolunteerController extends Controller
{
    public function index(Request $request){
        $volunteers = Volunteer::latest();

        if(!empty($request->get('keyword'))){
            $volunteers = $volunteers->where('name','like','%'.$request->get('keyword').'%');
        }
        $volunteers = $volunteers->paginate(10);

        return view('admin.volunteer.list',compact('volunteers'));
    }

    public function edit($volunteerId,Request $request){
        $volunteer = Volunteer::find($volunteerId);
        if(empty($volunteer)){
            return redirect()->route('volunteers.index');
           }
           
            return view('admin.volunteer.edit',compact('volunteer'));
    }

    public function update($volunteerId,Request $request){
        $volunteer = Volunteer::find($volunteerId);

        if(empty($volunteer)){
            $request->session()->flash('error','volunteer not found');
            return response()->json([
                'status' => false,
                'notfound' => true,
                'message' => 'volunteer not found'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:volunteers,email,' . $volunteerId,
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
            $oldImage = $volunteer->image;

            // save image here
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
                $image->cover(250,300);
                $image->save($dPath);

                $volunteer->image = $newImageName;
                $volunteer->save();
                File::delete(public_path().'uploads/volunteers/'.$oldImage);
                File::delete(public_path().'uploads/volunteers/thumb/'.$oldImage);
            }
  
            $request->session()->flash('success','volunteer updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'volunteer updated successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($volunteerId,Request $request){
        $volunteer = Volunteer::find($volunteerId);
        if(empty($volunteer)){
            $request->session()->flash('error','volunteer not found');
            return response()->json([
                'status' => true,
                'message' => 'volunteer not found'
            ]);
         //return redirect()->route('categories.index');
        }


        $volunteer->delete();

        $request->session()->flash('success','volunteer deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'volunteer deleted successfully'
        ]);
    }
}
