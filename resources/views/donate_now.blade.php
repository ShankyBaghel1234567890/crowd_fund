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
    <h2 class="text-center">Donate to Our Campaign</h2>
    <form>
        <div class="form-group">
            <label for="campaign">Campaign Name</label>
            <input readonly type="text" class="form-control" id="campaign" name="campaign" value="{{($campaign->name)}}" >
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" >
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" >
        </div>
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-control" id="id_type" name="id_type" >
                <option value="">Select ID</option>
                <option value="aadhar">Aadhaar </option>
                <option value="pan">Pan</option>
                <option value="license">Driving License</option>
            </select>
        </div>
        <div class="form-group">
                <input type="text" class="form-control" id="idno" name="idno" placeholder="Enter your ID " >
            </div>
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" >
        </div>
        <div class="form-group">
            <label for="amount">Donation Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter donation amount" >
        </div>
        <div class="form-group">
            <label  for="qr">Scan and Pay</label>
            <img src="{{asset('assets/img/QR.jpeg')}}" alt="">
        </div>
        <div class="form-group">
        <label  for="transaction_id">Transaction ID</label>
        <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction ID" >
        </div>
        <button type="submit" class="btn submit-btn">Donate Now</button>
    </form>
    </div>

    <script>
        $("#donationform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("donation.store",$campaign->id)}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('home')}}";

                    

                    $("#campaign").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#address").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#id_type").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#idno").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#contact").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#amount").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#transaction_id").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                }
                else{

                    var errors =response['errors']
                    
                    if(errors['campaign']){
                    $("#campaign").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['campaign']);
                }else{
                    $("#campaign").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['name']){
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['name']);
                }else{
                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['address']){
                    $("#address").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['address']);
                }else{
                    $("#address").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['id_type']){
                    $("#id_type").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['id_type']);
                }else{
                    $("#id_type").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['idno']){
                    $("#idno").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['idno']);
                }else{
                    $("#idno").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['contact']){
                    $("#contact").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['contact']);
                }else{
                    $("#contact").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['amount']){
                    $("#amount").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['amount']);
                }else{
                    $("#amount").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['transaction_id']){
                    $("#transaction_id").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['transaction_id']);
                }else{
                    $("#transaction_id").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                

                }
                
            }, error:function(jqXHR,exception){
                console.log("Something went wrong")
            }
        })
    });
    </script>

 

 
</body>
</html>