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
}
