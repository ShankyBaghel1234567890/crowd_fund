<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Gallery;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GalleryController extends Controller
{
    public function index(Request $request){
        $galleries = Gallery::all();
        $query = Gallery::query();

        if(!empty($request->get('keyword'))){
            $gallery = $galleries->where('campaign','like','%'.$request->get('keyword').'%');
        }
        $galleries = $query->paginate(10);

        return view('admin.gallery.list',compact('galleries'));
    }

    public function create(){
        
        $campaigns = Campaign::orderBy('name','ASC')->get();
        $data['campaigns'] =   $campaigns;
        return view('admin.gallery.create',$data);
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'campaign' => 'required',
            'description' => 'required'
        ]);

        if($validator->passes()){

            $galleries = new Gallery();
            $galleries->campaign = $request->campaign;
            $galleries->description = $request->description;
            
            $galleries->save();

            //save image here
            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $galleries->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/gallery/'.$newImageName;
                File::copy($sPath,$dPath);

            //     //Generate image thumbnail
                $dPath = public_path().'/uploads/gallery/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,275);
                $image->save($dPath);

                $galleries->name = $newImageName;
                $galleries->save();
            }


            $request->session()->flash('success','Image added in Gallery successfully');

            return response()->json([
                'status' => true,
                'message' => 'Image added in Gallery successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($galleryid, Request $request){
        
        $gallery = Gallery::find($galleryid);
        if(empty($gallery)){
            $request->session()->flash('error','Record not found');
            return redirect()->route('galleries.index');
        }

        $campaigns = Campaign::orderBy('name','ASC')->get();
        $data['campaigns'] = $campaigns;
        $data['gallery'] = $gallery;
        return view('admin.gallery.edit',$data);
    }

    

    public function update($galleryid, Request $request){
        
        $galleries  = Gallery::find($galleryid);

        if(empty($galleries)){
            $request->session()->flash('error','Record not found');
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(),[
            
            'campaign' => 'required',
            'description' => 'required',
        ]);

        if($validator->passes()){

            
            
            $galleries->campaign = $request->campaign;
            $galleries->description = $request->description;
            $galleries->save();
            $oldImage = $galleries->image;

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $galleries->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/gallery/'.$newImageName;
                File::copy($sPath,$dPath);

            //     //Generate image thumbnail
                $dPath = public_path().'/uploads/gallery/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,275);
                $image->save($dPath);

                $galleries->image = $newImageName;
                $galleries->save();

                File::delete(public_path().'uploads/gallery/'.$oldImage);
                File::delete(public_path().'uploads/gallery/thumb/'.$oldImage);
            }


            $request->session()->flash('success','Gallery updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'Gallery updated successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function destroy($galleryid, Request $request){
        $gallery = Gallery::find($galleryid);
        if(empty($gallery)){
            $request->session()->flash('error','Image not found');
            return response()->json([
                'status' => true,
                'message' => 'Image not found'
            ]);
            
        }


        $gallery->delete();

        $request->session()->flash('success','Image  deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'image deleted successfully'
        ]);
    }
}
