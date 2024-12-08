<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CampaignController extends Controller
{
    public function  index(Request $request){
        $campaigns = Campaign::all();
        $query = Campaign::query();

        if(!empty($request->get('keyword'))){
            $campaigns = $campaigns->where('name','like','%'.$request->get('keyword').'%');
        }
        $campaigns = $query->paginate(10);

        return view('admin.campaign.list',compact('campaigns'));
    }

    public   function create(){
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] =   $categories;
        return view('admin.campaign.create',$data);
    }

    public   function store(Request $request){
        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'deadline' => 'required',
            'status' =>  'required',
        ]);

        if($validator->passes()){

            $campaigns = new Campaign();
            $campaigns->category = $request->category;
            $campaigns->name = $request->name;
            $campaigns->description = $request->description;
            $campaigns->amount = $request->amount;
            $campaigns->deadline = $request->deadline;
            $campaigns->status = $request->status;
            $campaigns->save();

            //save image here
            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $campaigns->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/campaigns/'.$newImageName;
                File::copy($sPath,$dPath);

                //Generate image thumbnail
                $dPath = public_path().'/uploads/campaigns/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,275);
                $image->save($dPath);

                $campaigns->image = $newImageName;
                $campaigns->save();
            }


            $request->session()->flash('success','Campaign created successfully');

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

    public function edit($campaignId, Request $request){

        $campaign = Campaign::find($campaignId);
        if(empty($campaign)){
            $request->session()->flash('error','Record not found');
            return redirect()->route('campaigns.index');
        }

        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] =   $categories;
        $data['campaign'] = $campaign;
        return view('admin.campaign.edit',$data);
    }

    public function update($campaignId, Request $request){

        $campaigns  = Campaign::find($campaignId);

        if(empty($campaigns)){
            $request->session()->flash('error','Record not found');
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'deadline' => 'required',
            'status' =>  'required',
        ]);

        if($validator->passes()){

            
            $campaigns->category = $request->category;
            $campaigns->name = $request->name;
            $campaigns->description = $request->description;
            $campaigns->amount = $request->amount;
            $campaigns->deadline = $request->deadline;
            $campaigns->status = $request->status;
            $campaigns->save();
            $oldImage = $campaigns->image;

            //save image here
            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $campaigns->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/campaigns/'.$newImageName;
                File::copy($sPath,$dPath);

            //     //Generate image thumbnail
                $dPath = public_path().'/uploads/campaigns/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,275);
                $image->save($dPath);

                $campaigns->image = $newImageName;
                $campaigns->save();

                File::delete(public_path().'uploads/campaigns/'.$oldImage);
                File::delete(public_path().'uploads/campaigns/thumb/'.$oldImage);
            }

            
        


            $request->session()->flash('success','Campaign updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'Campaign updated successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($campaignId, Request $request){

        $campaign = Campaign::find($campaignId);
        if(empty($campaign)){
            $request->session()->flash('error','Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Campaign not found'
            ]);
            
        }


        $campaign->delete();

        $request->session()->flash('success','Campaign deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Campaign deleted successfully'
        ]);
    }

    public function approve($id){

        $campaign = Campaign::findOrFail($id);
        $campaign->status = 1;
        $campaign->save();

        return redirect()->route('campaigns.index')->with('success', 'Campaign approved.');
    }

}

