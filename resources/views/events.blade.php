@extends('layouts.app')

@section('content')
    
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-20 text-center">
                            <h2>social events </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <div class="our-cases-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                   
                    <div class="section-tittle text-center mb-80">
                        <span>What we are doing</span>
                        <h2>Our runnning  events for charity donations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @if (getCampaigns()->isNotEmpty())
                    @foreach (getCampaigns() as $campaign)
                        <div class="col-lg-3 col-md-4 col-sm-4">
                            <a href="{{route('donate',$campaign->id)}}">
                            <div class="single-cases mb-40">
                                <div class="cases-img">
                                @if ($campaign->image !="")
                                    <a href="{{route('donate',$campaign->id)}}"><img src="{{asset('uploads/campaigns/thumb/'.$campaign->image)}}" alt=""></a>
                                    @else
                                @endif
                                </div>
                                <div class="cases-caption">
                                    <h3><a href="{{route('donate',$campaign->id)}}">{{$campaign->name}}</a></h3>
                                    <div class="single-skill mb-15">
                                        <div class="bar-progress">
                                            <div id="bar3" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="50"></span>
                                            </div>
                                        </div>
                                    </div>
                           
                                    <div class="prices d-flex justify-content-between">
                                        <p>Raised:<span> 5,000 </span></p>
                                        <p>Goal:<span> {{$campaign->amount}}</span></p>
                                    </div>
                                    
                                </div>
                            </div></a>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
    <div class="count-down-area pt-25 section-bg" data-background="assets/img/gallery/section_bg02.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="count-down-wrapper" >
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               
                                <div class="single-counter text-center">
                                    <span class="counter color-green">6,200</span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Donation</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               
                                <div class="single-counter text-center">
                                    <span class="counter color-green">80</span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Fund Raised</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               
                                <div class="single-counter text-center">
                                    <span class="counter color-green">256</span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Donation</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                               
                                <div class="single-counter text-center">
                                    <span class="counter color-green">256</span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Donation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured_job_end -->

 @endsection