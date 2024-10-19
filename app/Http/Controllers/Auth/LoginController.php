<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator){

            if(Auth::guard('auth')->attempt(['email' => $request->email,'password'=> 
            $request->password],$request->get('remember'))){

                $login = Auth::guard('auth')->user();

                if ($login->role == 2){
                    return redirect()->route('admin.dashboard');
                }
                else{
                    return redirect()->route('user.dashboard');
                }
            }
            
                return redirect()->route('auth.login')
                ->with('error','Either Email/Password is incorrect')
                ->withInput($request->only('email'));

        }
        else{
            return redirect()->route('auth.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }

    public function create(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' =>  'required',
            'email' =>  'required',
            'password' =>  'required'
        ]);

        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()){
            return redirect(route('auth.login'))->with('success', 'Registration Successfully');
        }
        return redirect(route('auth.register'))->with('error', 'Failedto create account');
    }
}
