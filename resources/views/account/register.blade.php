<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('login-assets/img/favicon.ico')}}">
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		 <link rel="stylesheet" href="{{asset('login-assets/plugins/fontawesome-free/css/all.min.css')}}">
		 <!--Theme style -->
		<link rel="stylesheet" href="{{asset('login-assets/css/adminlte.min.css')}}"> 
		<link rel="stylesheet" href="{{asset('login-assets/css/custom.css')}}">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<!-- /.login-logo -->
			@if (Session::has('success'))
			 	<div class="alert alert-success">
					{{Session::get('success')}}
				</div>
			 @endif
			 
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="/register" class="h3">Register</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign up to start your session</p>
					<form action="{{route('register.store')}}" method="post"  name="registrationform" id="registrationform">
						@csrf
				  		<div class="input-group mb-3">
							<input type="text" value="{{old('text')}}" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" placeholder="Name">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-user"></span>
					  			</div>
							</div>
							<p></p>
				  		</div>
                        <div class="input-group mb-3">
							<input type="email" value="{{old('email')}}" name="email" id="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
							<p></p>
				  		</div>
						  <div class="input-group mb-3">
							<input type="number" value="{{old('number')}}" name="phone" id="phone" class="form-control @error ('phone') is-invalid @enderror" placeholder="Phone No.">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-phone"></span>
					  			</div>
							</div>
							<p></p>
				  		</div>
						<div class="input-group mb-3">
							<input type="password" name="password" id="password" class="form-control @error ('password') is-invalid @enderror" placeholder="Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-key"></span>
					  			</div>
							</div>
							<pp>
				  		</div>
						  <div class="input-group mb-3">
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-key"></span>
					  			</div>
							</div>
							<p></p>
				  		</div>
						<div class="row">
							<div class="col-8">
								<div class="icheck-primary">
									<input type="checkbox" id="agreeTerms" name="terms" value="agree">
									<label for="agreeTerms">
										I agree to the <a href="#">CrowdFunding</a> terms and condition.
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							
							<!-- /.col -->
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
							</div>
							<!-- /.col -->
				  		</div>
						  </form>
						<p class="mb-1 mt-3">
							<a href="/login">Already have an account signin?</a>
						</p>
						  </div>
                          
				  		
                          
				  		
										
			  	</div>
			  	<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<script>
			$("#registrationform").submit(function(event){
        event.preventDefault();
        var element = $(this)
        $("button[type=submit]").prop('disable',true);
        $.ajax({
            url: '{{route("register.store")}}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success:function(response){
                $("button[type=submit]").prop('disable',false);

                if(response['status'] == true){

                    window.location.href="{{route('login')}}";

                    

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#phone").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    
                }
                // else{

                // //     var errors =response['errors']
                

                // // if(errors['name']){
                // //     $("#name").addClass('is-invalid')
                // //     .siblings('p')
                // //     .addClass('invalid-feedback').html(errors['name']);
                // // }else{
                // //     $("#name").removeClass('is-invalid')
                // //     .siblings('p')
                // //     .removeClass('invalid-feedback').html("");
                // // }

                // // if(errors['email']){
                // //     $("#email").addClass('is-invalid')
                // //     .siblings('p')
                // //     .addClass('invalid-feedback').html(errors['email']);
                // // }else{
                // //     $("#email").removeClass('is-invalid')
                // //     .siblings('p')
                // //     .removeClass('invalid-feedback').html("");
                // // }

                // // if(errors['phone']){
                // //     $("#phone").addClass('is-invalid')
                // //     .siblings('p')
                // //     .addClass('invalid-feedback').html(errors['phone']);
                // // }else{
                // //     $("#phone").removeClass('is-invalid')
                // //     .siblings('p')
                // //     .removeClass('invalid-feedback').html("");
                // // }

                // // if(errors['password']){
                // //     $("#password").addClass('is-invalid')
                // //     .siblings('p')
                // //     .addClass('invalid-feedback').html(errors['password']);
                // // }else{
                // //     $("#password").removeClass('is-invalid')
                // //     .siblings('p')
                // //     .removeClass('invalid-feedback').html("");
                // // }

                // }
                
            }, error:function(jqXHR,exception){
                console.log("Something went wrong")
            }
        })
    });
		</script>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('login-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('login-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('login-assets/js/script.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		{{--<script src="js/demo.js"></script>--}}

		

	</body>
</html>