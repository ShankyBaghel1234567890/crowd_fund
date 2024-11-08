<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('account.login');
    }

    public function authenticate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator){

            if(Auth::guard('web')->attempt(['email' => $request->email,'password'=> 
            $request->password],$request->get('remember'))){

                $login = Auth::guard('web')->user();

                if ($login->role == 1){
                    return redirect()->route('user.dashboard');
                }
                else{
                    return redirect()->route('login')
                    ->with('error','You are not authorized for user login')
                    ->withInput($request->only('email'));
                }
            }
            
                return redirect()->route('login')
                ->with('error','Either Email/Password is incorrect')
                ->withInput($request->only('email'));

        }
        else{
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }

    public function create(){
        return view('account.register');
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' =>  'required|min:3',
            'email' =>  'required|email|unique:users',
            'password' =>  'required|min:8|confirmed'
        ]);
        if($validator->passes()){
            
            $user = new User();
            $user->name  = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            request()->session()->flash('success', 'You are registered successfully');
            return redirect()->route('login');
             
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Account created successfully'
            // ]);
            
            
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }



}