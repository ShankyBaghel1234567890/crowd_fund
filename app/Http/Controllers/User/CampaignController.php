<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    public function  index(Request $request){
        $user = Auth::user();
        $campaigns = Campaign::where('user_id',$user->id)->orderBy('created_at','DESC')->get();
        $query = Campaign::query();

        if(!empty($request->get('keyword'))){
            $campaigns = $campaigns->where('name','like','%'.$request->get('keyword').'%');
        }
        $paginate = $query->paginate(10);
        $data['campaigns'] = $campaigns;
        $data['paginate'] = $paginate;

        return view('user.campaign.list',$data);
    }

    public   function create(){
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] =   $categories;
        return view('user.campaign.create',$data);
    }

    public   function store(Request $request){
        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'deadline' => 'required',
        ]);
        $user = Auth::user();
        if($validator->passes()){

            $campaigns = new Campaign();
            $campaigns->user_id = $user->id;
            $campaigns->category = $request->category;
            $campaigns->name = $request->name;
            $campaigns->description = $request->description;
            $campaigns->amount = $request->amount;
            $campaigns->deadline = $request->deadline;
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

            //     //Generate image thumbnail
            //     // $dPath = public_path().'/uploads/category/thumb/'.$newImageName;
            //     // $img = Image::make($sPath);
            //     // $img->resize(450, 600);
            //     // $img->save($dPath);

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
            return redirect()->route('campaign.index');
        }

        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] =   $categories;
        $data['campaign'] = $campaign;
        return view('user.campaign.edit',$data);
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
            //     // $dPath = public_path().'/uploads/category/thumb/'.$newImageName;
            //     // $img = Image::make($sPath);
            //     // $img->resize(450, 600);
            //     // $img->save($dPath);

                $campaigns->image = $newImageName;
                $campaigns->save();

                File::delete(public_path().'uploads/campaigns/'.$oldImage);
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
            $request->session()->flash('error','Campaign not found');
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

}