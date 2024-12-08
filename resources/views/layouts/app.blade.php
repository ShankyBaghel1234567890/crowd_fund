<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Crowd Funding </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated-headline.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/volunteer.css')}}">
</head>
<body>
    
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <header>
        
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <ul>     
                                        <li>Phone: +91 9336568268</li>
                                        <li>Email: komals93365@gmail.com</li>
                                        
                                    </ul>
                                    <div class="header-social">    
                                        <ul>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a  href="https://www.facebook.com/profile.php?id=100081532707547"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="header-info-right d-flex align-items-center">
                                    <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">English</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">     
                                        <li><a href="#">contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li><a href="/">Home</a></li>
                                                <li><a href="/about">About</a></li>
                                                
                                                <li><a href="/events">social events </a>
                                                   
                                                    <ul class="submenu">
                                                            <li><a href="/events">events</a></li>
                                                            <li><a href="/login">Start Fundraising</a></li>
                                                            <li><a href="/program">Support Campaign</a></li>
                                                        
                                                    </ul>
                                                </li>
                                                
                                                </li>
                                                <li><a href="/contact">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        <a href="/login" class="btn header-btn">Login</a>
                                    </div>
                                </div>
                            </div> 
                           
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </header>
   
    <main>
       @yield('content')
    </main>
    <footer>
    @include('layouts.footer')
    </footer>

   
    <div id="back-top" >
        <a title="Go to Top" href="/"> <i class="fas fa-level-up-alt"></i></a>
    </div>

 

    <script src="{{asset('./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
 
    <script src="{{asset('./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('./assets/js/popper.min.js')}}"></script>
    <script src="{{asset('./assets/js/bootstrap.min.js')}}"></script>
    
    <script src="{{asset('./assets/js/jquery.slicknav.min.js')}}"></script>

 
    <script src="{{asset('./assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('./assets/js/slick.min.js')}}"></script>

    <script src="{{asset('./assets/js/wow.min.js')}}"></script>
    <script src="{{asset('./assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.magnific-popup.js')}}"></script>

    
    <script src="{{asset('./assets/js/gijgo.min.js')}}"></script>
   
    <script src="{{asset('./assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.sticky.js')}}"></script>
   
    <script src="{{asset('./assets/js/jquery.barfiller.js')}}"></script>
    
  
    <script src="{{asset('./assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('./assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('./assets/js/hover-direction-snake.min.js')}}"></script>

    
    <script src="{{asset('./assets/js/contact.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('./assets/js/mail-script.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
   	
    <script src="{{asset('./assets/js/plugins.js')}}"></script>
    <script src="{{asset('./assets/js/main.js')}}"></script>
    <script src="{{asset('./assets/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('./assets/js/one-page-nav-min.js')}}"></script>
    <script src="{{asset('./assets/js/price-range.js')}}"></script>
    <script src="{{asset('./assets/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>