<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page</title>
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

	
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	
	<link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
	<meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .donationform {
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
                    <img src="{{asset('assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

<div class="donationform">
            @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
    <h2 class="text-center">Donate to Our Campaign</h2>
    <form action="{{route("donation.store")}}" method="POST" id="donationform" name="donationform">
        @csrf
        <div class="form-group">
            <label for="campaign">Campaign Name</label>
            <input readonly type="text" class="form-control" id="campaign" name="campaign" value="{{($campaign->name)}}" >
            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-control" id="id_type" name="id_type" required>
                <option value="">Select ID</option>
                <option value="aadhar">Aadhaar </option>
                <option value="pan">Pan</option>
                <option value="license">Driving License</option>
            </select>
        </div>
        <div class="form-group">
                <input type="text" class="form-control" id="idno" name="idno" placeholder="Enter your ID " required>
            </div>
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" required>
        </div>
        <div class="form-group">
            <label for="amount">Donation Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter donation amount" required>
        </div>
        <div class="form-group">
            <label  for="qr">Scan and Pay</label>
            <img src="{{asset('assets/img/QR.jpeg')}}" alt="">
        </div>
        <div class="form-group">
        <label  for="transaction_id">Transaction ID</label>
        <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction ID" required>
        </div>
        <button type="submit" class="btn submit-btn">Donate Now</button>
    </form>
    </div>

    <script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>



 

 
</body>
</html>