<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
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
			 @include('account.message')
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="#" class="h3">Register</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign up to start your session</p>
					<form action="{{route('register.store')}}" method="post"  name="registrationform" id="registrationform">
						@csrf
				  		<div class="input-group mb-3">
							<input type="text" value="{{old('text')}}" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" placeholder="Name">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
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
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
							<p></p>
				  		</div>
						<div class="input-group mb-3">
							<input type="password" name="password" id="password" class="form-control @error ('password') is-invalid @enderror" placeholder="Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
							<pp>
				  		</div>
						  <div class="input-group mb-3">
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
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

		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('login-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('login-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('login-assets/js/script.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		{{--<script src="js/demo.js"></script>--}}

		<script type="text/javascript">

			$("#registrationform").submit(function(){
				event.preventDefault();
				$.ajax({
					url: '{{route("register.store")}}',
					type: 'post',
					data: $(this).serializeArray(),
					dataType: 'json',
					success: function(response){
						
						var errors =response.errors;
						
						if(response.status == false){
							if(errors.name){
								$("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
								$("#name").addClass('is-invalid');
							}
							else{
								$("#name").siblings("p").removeClass('invalid-feedback').html('');
								$("#name").removeClass('is-invalid');
							}

							if(errors.name){
								$("#email").siblings("p").addClass('invalid-feedback').html(errors.name);
								$("#email").addClass('is-invalid');
							}
							else{
								$("#email").siblings("p").removeClass('invalid-feedback').html('');
								$("#email").removeClass('is-invalid');
							}

							if(errors.name){
								$("#password").siblings("p").addClass('invalid-feedback').html(errors.name);
								$("#password").addClass('is-invalid');
							}
							else{
								$("#password").siblings("p").removeClass('invalid-feedback').html('');
								$("#password").removeClass('is-invalid');
							}
						} else{
							

							$("#name").siblings("p").removeClass('invalid-feedback').html('');
							$("#name").removeClass('is-invalid');

							$("#email").siblings("p").addClass('invalid-feedback').html(errors.name);
							$("#email").addClass('is-invalid');

							$("#password").siblings("p").removeClass('invalid-feedback').html('');
							$("#password").removeClass('is-invalid');

							window.location.href="{{route('login')}}";
						}
						
					},
					error: function(jQXHR, exceptionr){
						console.log("Something went wrong");
					}
					});
				});

		</script>

	</body>
</html>