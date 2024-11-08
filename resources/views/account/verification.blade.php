<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
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
			<a href="/" class="fas fa-sign-out-alt"></a>
			  	<div class="card-header text-center">
					<a href="#" class="h3">Verify Email</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					<form method="post" id="verificationForm">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="number" name="otp" placeholder="Enter OTP" required>
                        <br><br>
                        <input type="submit" value="Verify">

                    </form>
                        <p class="time"></p>

                        <button id="resendOtpVerification">Resend Verification OTP</button>			
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>

            $(document).ready(function(){
                $('#verificationForm').submit(function(e){
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url:"{{ route('verifiedOtp') }}",
                        type:"POST",
                        data: formData,
                        success:function(res){
                            if(res.success){
                                alert(res.msg);
                                window.open("/","_self");
                            }
                            else{
                                $('#message_error').text(res.msg);
                                setTimeout(() => {
                                    $('#message_error').text('');
                                }, 3000);
                            }
                        }
                    });

                });

                $('#resendOtpVerification').click(function(){
                    $(this).text('Wait...');
                    var userMail = @json($email);

                    $.ajax({
                        url:"{{ route('resendOtp') }}",
                        type:"GET",
                        data: {email:userMail },
                        success:function(res){
                            $('#resendOtpVerification').text('Resend Verification OTP');
                            if(res.success){
                                timer();
                                $('#message_success').text(res.msg);
                                setTimeout(() => {
                                    $('#message_success').text('');
                                }, 3000);
                            }
                            else{
                                $('#message_error').text(res.msg);
                                setTimeout(() => {
                                    $('#message_error').text('');
                                }, 3000);
                            }
                        }
                    });

                });
            });

            function timer()
            {
                var seconds = 30;
                var minutes = 1;

                var timer = setInterval(() => {

                    if(minutes < 0){
                        $('.time').text('');
                        clearInterval(timer);
                    }
                    else{
                        let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                        let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

                        $('.time').text(tempMinutes+':'+tempSeconds);
                    }

                    if(seconds <= 0){
                        minutes--;
                        seconds = 59;
                    }

                    seconds--;

                }, 1000);
            }

            timer();

        </script>
	</body>
</html>