<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index(Request $request){

        $categories = Category::latest();

        if(!empty($request->get('keyword'))){
            $categories = $categories->where('name','like','%'.$request->get('keyword').'%');
        }
        $categories = $categories->paginate(10);

        return view('admin.category.list',compact('categories'));

    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
        ]);

        if($validator->passes()){

            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();

             //save image here
             if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $category->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/categories/'.$newImageName;
                File::copy($sPath,$dPath);

                //Generate image thumbnail
                $dPath = public_path().'/uploads/categories/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,275);
                $image->save($dPath);

                $category->image = $newImageName;
                $category->save();
            }

            $request->session()->flash('success','Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category  created successfully'
            ]);

            }else{
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()
                ]);
            }

    }

    public function edit($categoryId,Request $request){
        
        $category = Category::find($categoryId);
        if(empty($category)){
            return redirect()->route('categories.index');
           }
           
            return view('admin.category.edit',compact('category'));
    }

    public function update($categoryId, Request $request){
        
        $category = Category::find($categoryId);

        if(empty($category)){
            $request->session()->flash('error','Category not found');
            return response()->json([
                'status' => false,
                'notfound' => true,
                'message' => 'Category not found'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->passes()){

            
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = $request->status;
            $category->save();

            $oldImage = $category->image;

            //save image here
            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $category->id.'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/categories/'.$newImageName;
                File::copy($sPath,$dPath);

            //     //Generate image thumbnail
                $dPath = public_path().'/uploads/categories/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,275);
                $image->save($dPath);

                $category->image = $newImageName;
                $category->save();

                File::delete(public_path().'uploads/categories/'.$oldImage);
                File::delete(public_path().'uploads/categories/thumb/'.$oldImage);
            }
  
            $request->session()->flash('success','Category updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully'
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($categoryId,Request $request){
        
        $category = Category::find($categoryId);
        if(empty($category)){
            $request->session()->flash('error','Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Category not found'
            ]);
         //return redirect()->route('categories.index');
        }


        $category->delete();

        $request->session()->flash('success','Category deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
}
