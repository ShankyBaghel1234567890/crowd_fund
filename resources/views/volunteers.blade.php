<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Crowd Funding</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('login-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('login-assets/css/adminlte.min.css')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

		<link rel="stylesheet" href="{{asset('login-assets/plugins/dropzone/min/dropzone.min.css')}}">
		

		<link rel="stylesheet" href="{{asset('login-assets/css/custom.css')}}">
		<meta name="csrf-token" content="{{csrf_token()}}">
        <style>
        
        .btn{
            align-items: center;
            background: #09cc7f;
            font-family: "Muli", sans-serif;
            text-transform: capitalize;
            padding: 27px 44px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-weight: 600;
            border-radius: 2px;
            line-height: 1;
            -moz-user-select: none;
            letter-spacing: 1px;
            line-height: 0;
            margin-bottom: 20px;
            margin: 10px;
            cursor: pointer;
            transition: color 0.4s linear;
            position: relative;
            z-index: 1;
            border: 0;
            overflow: hidden;
            margin-left: 485px;
        }
        .btn::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 101%;
            height: 101%;
            background: #24ac75;
            z-index: 1;
            border-radius: 5px;
            transition: transform 0.5s;
            transition-timing-function: ease;
            transform-origin: 0 0;
            transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
            transform: scaleX(0);
            border-radius: 0px;
        }
        .btn:hover::before {
            transform: scaleX(1);
            color: #fff !important;
            z-index: -1;
        }
        .btn:hover {
            background-position: right;
        }
    </style>
	</head>
    <body class="hold-transition sidebar-mini">
    <main>
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
    <div class=" d-flex align-items-center justify-content-center">
    <img src="{{asset('assets/img/logo/loder.png')}}" alt="">
    </div>
    
    <div class="container mt-5">
        <h2 class="text-center">Volunteer Registration Form</h2>
                <div class="container-fluid">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                        <form action="" method="post" id="volunteerform" name="volunteerform">
                            @csrf
                            <div class="card">
                                <div class="card-body">								
                                    <div class="row">
                                       
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="name"> Name</label>
                                                <input type="text"  name="name" id="name" class="form-control" placeholder=" Name" >
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="text"  name="email" id="email" class="form-control" placeholder="email" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="id_type">ID Type</label>
                                                <select class="form-control" id="id_type" name="id_type" >
                                                    <option value="">Select ID Type</option>
                                                    <option value="passport">Passport</option>
                                                    <option value="driver_license">Driver's License</option>
                                                    <option value="national_id">National ID</option>
                                                </select>
                                                <p></p>
                                            </div>
                                        </div>
                                        	
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="uid">UID</label>
                                                <input type="text"  name="uid" id="uid" class="form-control" placeholder="uid" >
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="phone">Phone</label>
                                                <input type="text"  name="phone" id="phone" class="form-control" placeholder="Campaign Name" >
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="occupation">Occupation</label>
                                                <input type="text"  name="occupation" id="occupation" class="form-control" placeholder="occupation" >
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="address">Address</label>
                                                <input type="text"  name="address" id="address" class="form-control" placeholder="address" >
                                                <p></p>	
                                            </div>
                                        </div>	
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="city">City</label>
                                                <input type="text"  name="city" id="city" class="form-control" placeholder="city" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state">State</label>
                                                <input type="text"  name="state" id="state" class="form-control" placeholder="ex. 20,000.00" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="country">Country</label>
                                                <input type="text"  name="country" id="country" class="form-control" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="zip_code">Zip Code</label>
                                                <input type="text"  name="zip_code" id="zip_code" class="form-control" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="mother">Mother Name</label>
                                                <input type="text"  name="mother" id="mother" class="form-control" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="father">Father Name</label>
                                                <input type="text"  name="father" id="father" class="form-control" >
                                                <p></p>	
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="hidden" id="image_id" name="image_id" value="">
                                                <label for="image">Image</label>
                                                <div id="image" class="dropzone dz-clickable">
                                                    <div class="dz-message needsclick">
                                                        <br>Drop files here or click to upload.<br><br>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                       									
                                    </div>
                                </div>							
                            </div>
                            <button type="submit" class="btn ">Submit</button>
                        </form>
                    </div>
        </div>
        </main>
        <footer class="main-footer">
				
				<strong>Copyright &copy; Crowd Funding All rights reserved.
		</footer>
        <script src="{{asset('login-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('login-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('login-assets/js/adminlte.min.js')}}"></script>
		<script src="{{asset('login-assets/js/demo.js')}}"></script>

		<script src="{{asset('login-assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset('login-assets/js/demo.js')}}"></script>
        <script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>

 
 <script>
 $("#volunteerform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("volunteer.store")}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response.status == true){

                    window.location.href="{{route('home.volunteer')}}";

                    

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#id_type").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#uid").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#phone").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#occupation").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");


                    $("#address").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#city").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#state").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#country").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#zip_code").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#mother").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#father").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                }
                else{

                    var errors =response['errors']

                if(errors['name']){
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['name']);
                }else{
                    $("#name").removeClass('is-invalid')
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

                if(errors['uid']){
                    $("#uid").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['uid']);
                }else{
                    $("#uid").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['email']){
                    $("#email").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['email']);
                }else{
                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['phone']){
                    $("#phone").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['phone']);
                }else{
                    $("#phone").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['occupation']){
                    $("#occupation").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['occupation']);
                }else{
                    $("#occupation").removeClass('is-invalid')
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

                if(errors['city']){
                    $("#city").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['city']);
                }else{
                    $("#city").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['state']){
                    $("#state").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['state']);
                }else{
                    $("#state").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['country']){
                    $("#country").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['country']);
                }else{
                    $("#country").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['zip_code']){
                    $("#zip_code").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['zip_code']);
                }else{
                    $("#zip_code").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['mother']){
                    $("#mother").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['mother']);
                }else{
                    $("#mother").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }

                if(errors['father']){
                    $("#father").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback').html(errors['father']);
                }else{
                    $("#father").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                }


            }
                
            }, error:function(jqXHR,exception){
                console.log("Something went wrong")
            }
        })
    });

    Dropzone.autoDiscover = false;    
    const dropzone = $("#image").dropzone({ 
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url:  "{{route('temp-images.create')}}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, success: function(file, response){
            $("#image_id").val(response.image_id);
            //console.log(response)
        }
    });
</script>

    </body>
   



 