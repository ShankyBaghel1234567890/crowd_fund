<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }
    public function program(){
        return view("program");
    }
    public function about(){
        return view("about");
    }
    public function blog(){
        return view("blog");
    }
    public function contact(){
        return view("contact");
    }
    public function blog_details(){
        return view("blog_details");
    }
    public function elements(){
        return view("elements");
    }
    public function events(){
        return view("events");
    }

    public function donate(){
        return view("donate_now");
    }
}
