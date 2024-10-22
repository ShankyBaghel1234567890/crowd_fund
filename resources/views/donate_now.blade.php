<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page</title>
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
    <style>
        body {
            background-color: #f8f9fa;
        }
        .donation-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .submit-btn{
            margin: 2% auto;
            margin-left: 33%;
        }
        .form-group{
            max-width: 500px;
            margin-left: 5% ;
        }
    </style>
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

<div class="donation-form">
    <h2 class="text-center">Donate to Our Campaign</h2>
    <form>
        <div class="form-group">
            <label for="campaign">Campaign Name</label>
            <input readonly type="text" class="form-control" id="campaign" placeholder="Campaign" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter your address" required>
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-control" id="paymentMethod" required>
                <option value="">Select ID</option>
                <option value="creditCard">Aadhaar </option>
                <option value="paypal">Pan</option>
                <option value="bankTransfer">Driving License</option>
            </select>
        </div>
        <div class="form-group">
                <input type="text" class="form-control" id="id" placeholder="Enter your ID " required>
            </div>
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="tel" class="form-control" id="contact" placeholder="Enter your contact number" required>
        </div>
        <div class="form-group">
            <label for="amount">Donation Amount</label>
            <input type="number" class="form-control" id="amount" placeholder="Enter donation amount" required>
        </div>
        <div class="form-group">
            <label  for="paymentMethod">Payment Method</label>
            <select class="form-control" id="paymentMethod" required>
                <option value="">Select payment method</option>
                <option value="creditCard">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bankTransfer">Bank Transfer</option>
            </select>
        </div>
        <button type="submit" class="btn submit-btn">Donate Now</button>
    </form>
</div>



 
 <script src="{{asset('./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
 
 <script src="{{asset('./assets/js/bootstrap.min.js')}}"></script>
 

 <script src="{{asset('./assets/js/main.js')}}"></script>
 
</body>
</html>