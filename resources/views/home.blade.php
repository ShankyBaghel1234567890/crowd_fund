@extends('layouts.app')

@section('content')



<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="childb.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to Crowd Funded Organisation</h5>
                        <p>Effortlessly Have Your Own World Class Professional Fund Raising Platform</p>
                    </div>
                </div>
        
                <div class="carousel-item">
                    <img src="childd.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to Crowd Funded Organisation</h5>
                        <p>Effortlessly Have Your Own World Class Professional Fund Raising Platform</p>
                    </div>
                </div>
        
                <div class="carousel-item">
                    <img src="childf.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to Crowd Funded Organisation</h5>
                        <p>Effortlessly Have Your Own World Class Professional Fund Raising Platform</p>
                    </div>
                </div>
            </div>
        
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
        
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>

        <div class="slider-area">
            <div class="slider-active">
                <div class="single-slider d-flex align-items-center justify-content-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                                <div class="hero__caption text-center">
                                    <h1 data-animation="fadeInUp" data-delay=".6s">Our Helping to<br> the world.</h1>
                                    <p data-animation="fadeInUp" data-delay=".8s">It is a platform that enables individuals or groups to raise funds for specific projects, causes, or ventures by collecting small contributions from a large number of people.</p>
                                    <div class="hero__btn d-flex justify-content-center">
                                        <a href="" class="btn hero-btn mb-10" data-animation="fadeInLeft" data-delay=".8s">Donate</a>
                                        <a href="" class="cal-btn ml-15" data-animation="fadeInRight" data-delay="1.0s">
                                            <i class="flaticon-null"></i>
                                            <p>+91 9336568268</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
           
  
    <div class="service-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                  
                    <div class="section-tittle text-center mb-80">
                        <span>What we are doing</span>
                        <h2>We Are In A Mission To Help The Helpless</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-null-1"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Child Medical Fund</a></h5>
                            <p> Donate here, to save some little one's life who doesn't even live to this world </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat active text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-think"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Old People's Medical Fund</a></h5>
                            <p> Donate here, to save someone's Parent life.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-gear"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Start-up Fund Raising</a></h5>
                            <p> Donate here and support the youth for starting thier own start-ups and buisness.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        
                        <div class="section-tittle mb-35">
                            <span>About our foundation</span>
                            <h2>We Are In A Mission To  Help Helpless People</h2>
                        </div>
                        <p><strong>JOIN US</strong>.</p>
                        <p>Become a part of our mission today. Whether you're looking to start your own campaign or support an existing one, your involvement makes a difference. Together, we can create solutions to the world's most pressing challenges.</p>
                    </div>
                    <a href="about.html" class="btn">About US</a>
                </div>
                <div class="col-lg-6 col-md-12">
                  
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/img/gallery/childz.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="assets/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <div class="our-cases-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                   
                    <div class="section-tittle text-center mb-80">
                        <span>Our Cases you can see</span>
                        <h2>Explore our latest causes that we works </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cases mb-40">
                        <div class="cases-img">
                            <img src="childb.jpg" alt="">
                        </div>
                        <div class="cases-caption">
                            <h3><a href="#">Ensure Child Healthy Future</a></h3>
                           
                            <div class="single-skill mb-15">
                                <div class="bar-progress">
                                    <div id="bar1" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="70"></span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="prices d-flex justify-content-between">
                                <p>Raised:<span> 20,000 </span></p>
                                <p>Goal:<span> 50,000 </span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cases mb-40">
                        <div class="cases-img">
                            <img src="old.jpg" alt="">
                        </div>
                        <div class="cases-caption">
                            <h3><a href="#">Providing Old People a Healthy Future</a></h3>
                            
                            <div class="single-skill mb-15">
                                <div class="bar-progress">
                                    <div id="bar2" class="barfiller">
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                        <span class="fill" data-percentage="25"></span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="prices d-flex justify-content-between">
                                <p>Raised:<span> 50,000</span></p>
                                <p>Goal:<span> 97,000</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cases mb-40">
                        <div class="cases-img">
                            <img src="startup.jpg" alt="">
                        </div>
                        <div class="cases-caption">
                            <h3><a href="#">Invest in Young People Start-Ups</a></h3>
                           
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
                                <p>Goal:<span> 35,000 </span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="featured-job-area section-padding30 section-bg2" data-background="assets/img/gallery/section_bg03.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-10 col-sm-12">
                  
                    <div class="section-tittle text-center mb-80">
                        <span> What we are doing </span>
                        <h2> We arrange many social events for charity donations </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @if (getCampaigns()->isNotEmpty())
                @foreach (getCampaigns() as $campaign)
                
                
                
                <div class="col-lg-9 col-md-12">
                   
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                @if ($campaign->image !="")
                                <a href="#"><img src="{{asset('uploads/campaigns/'.$campaign->image)}}" alt=""></a>
                                @else
                                <a href="#"><img src="assets/img/gallery/socialEvents2.png" alt=""></a>
                                @endif
                                
                            </div>
                            <div class="job-tittle">
                                <a href="#"><h4> {{$campaign->name}} </h4></a>
                                <ul>
                                    <li><i class="far fa-clock"></i>{{$campaign->description}}</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- <div class="col-lg-9 col-md-12">
                   
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="#"><img src="assets/img/gallery/socialEvents2.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#"><h4>A hand for Old People</h4></a>
                                <ul>
                                    <li><i class="far fa-clock"></i>8:30 - 9:30am</li>
                                    <li><i class="fas fa-sort-amount-down"></i>18.01.2021</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                   
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="#"><img src="assets/img/gallery/socialEvents3.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#"><h4>Donation is Hope</h4></a>
                                <ul>
                                    <li><i class="far fa-clock"></i>8:30 - 9:30am</li>
                                    <li><i class="fas fa-sort-amount-down"></i>18.01.2021</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
  
    <div class="team-area pt-160 pb-160">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                   
                    <div class="section-tittle section-tittle2 text-center mb-70">
                        <span>What we are doing</span>
                        <h2>Our Expert Volunteer Always ready</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team1.png" alt="">
                           
                            
                        </div>
                        <div class="team-caption">
                            <h3><a href="instructor.html">Yogendra singh</a></h3>
                            <p>Volunteer leader</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team2.png" alt="">
                            
                            
                        </div>
                        <div class="team-caption">
                            <h3><a href="instructor.html">Shaily Martin</a></h3>
                            <p>Volunteer leader</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team3.png" alt="">
                           
                            
                        </div>
                        <div class="team-caption">
                            <h3><a href="instructor.html">Khushi Kundra</a></h3>
                            <p>Volunteer leader</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team4.png" alt="">
                            
                            
                        </div>
                        <div class="team-caption">
                            <h3><a href="instructor.html">Abhishek Srivastava</a></h3>
                            <p>Volunteer leader</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="wantToWork-area ">
        <div class="container">
            <div class="wants-wrapper w-padding2  section-bg" data-background="assets/img/gallery/section_bg01.png">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-9 col-md-8">
                        <div class="wantToWork-caption wantToWork-caption2">
                            <h2>Lets Chenge The World With Humanity</h2>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="btn white-btn f-right sm-left">Become A Volunteer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="testimonial-area testimonial-padding">
        <div class="container">
          
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="h1-testimonial-active dot-style">
                        <div class="testimonial-area testimonial-padding">
                            <div class="container">
                                <div class="row d-flex justify-content-center">
                                    <!-- First Testimonial -->
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single-testimonial text-center">
                                            <div class="testimonial-caption">
                                                <div class="testimonial-founder">
                                                    <div class="founder-img mb-40">
                                                        <img src="assets/img/gallery/Untitled design.png" alt="">
                                                        <span>Komal Singh</span>
                                                        <p>Creative Director</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Second Testimonial -->
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single-testimonial text-center">
                                            <div class="testimonial-caption">
                                                <div class="testimonial-founder">
                                                    <div class="founder-img mb-40">
                                                        <img src="assets/img/gallery/Untitled design (1).png" alt="">
                                                        <span>Shashank Singh</span>
                                                        <p>Creative Director</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Common Testimonial Text -->
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="testimonial-top-cap mt-40">
                                            <p>“We're here to Help Helpless.”</p>
                                            <p2>Our platform is built not just to facilitate funding but to create a space where dreams and aspirations can flourish through the support of compassionate individuals like you. We’ve designed every feature with transparency, trust, and ease of use in mind, ensuring that you can confidently contribute to causes that matter to you.</p2>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <section class="home-blog-area section-padding30">
        <div class="container">
         
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-90">
                        <span>Our recent blog</span>
                        <h2>Latest News from our recent blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="assets/img/gallery/home-blog1.png" alt="">
                                
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>Creative derector</p>
                                <h3><a href="blog_details.html">Footprints in Time is perfect House in Kurashiki</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="assets/img/gallery/home-blog2.png" alt="">
                               
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>Creative derector</p>
                                <h3><a href="blog_details.html">Footprints in Time is perfect House in Kurashiki</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
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
  
  
  
 @endsection