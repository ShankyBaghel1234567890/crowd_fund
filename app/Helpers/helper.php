<?php

use App\Models\Campaign;
use App\Models\Category;
use App\Models\Volunteer;

function getCampaigns(){
    return Campaign::orderBy('name','ASC')->where('status','1')->get();
}

function getVolunteers(){
    return Volunteer::orderBy('name','ASC')->where('status','1')->get();
}

function getCategory(){
    return Category::orderBy('name','ASC')->where('status','1')->get();
}
?>