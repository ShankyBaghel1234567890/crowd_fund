<?php

use App\Models\Campaign;

function getCampaigns(){
    return Campaign::orderBy('name','ASC')->where('status','1')->get();
}
?>