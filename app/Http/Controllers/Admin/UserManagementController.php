<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function  index(Request $request){
        $users = User::all();
        $query = User::query();

        if(!empty($request->get('keyword'))){
            $users = $users->where('name','like','%'.$request->get('keyword').'%');
        }
        $users = $query->paginate(5);

        return view('admin.users.list',compact('users'));
    }

    public function destroy($userId, Request $request){
        $users = User::find($userId);
        if(empty($users)){
            $request->session()->flash('error','Image not found');
            return response()->json([
                'status' => true,
                'message' => 'Image not found'
            ]);
            
        }


        $users->delete();

        $request->session()->flash('success','Account  deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'image deleted successfully'
        ]);
    }
}

