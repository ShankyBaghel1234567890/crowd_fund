<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login with OTP & Password</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('login-assets/img/favicon.ico')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('login-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('login-assets/css/adminlte.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('login-assets/css/custom.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @include('account.message')

        <div class="card card-outline card-primary">
            <a href="/" class="fas fa-sign-out-alt"></a>
            <div class="card-header text-center">
                <a href="#" class="h3">Login with OTP & Password</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Enter your email, password & OTP</p>

                <!-- Email Input -->
                <div class="input-group mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- Send OTP Button (Initially Disabled) -->
                <div class="row">
                    <div class="col-12">
                        <button id="sendOtpBtn" class="btn btn-primary btn-block" disabled>Send OTP</button>
                    </div>
                </div>

                <!-- OTP Input Section (Hidden Initially) -->
                <div id="otpSection" style="display: none; margin-top: 15px;">
                    <div class="input-group mb-3">
                        <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Verify OTP Button -->
                    <div class="row">
                        <div class="col-12">
                            <button id="verifyOtpBtn" class="btn btn-success btn-block">Verify OTP & Login</button>
                        </div>
                    </div>
                </div>

                <!-- Message Display -->
                <p id="message" class="mt-3"></p>

                <p class="mb-1 mt-3">
                    <a href="#">I forgot my password</a>
                </p>
                <p class="mb-1 mt-3">
                    <a href="/register">Don't have an account? Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('login-assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('login-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Enable Send OTP Button only if password is correct
            $('#password').on('keyup', function() {
                let email = $('#email').val();
                let password = $('#password').val();

                $.post('/check-password', { email: email, password: password }, function(response) {
                    if (response.valid) {
                        $('#sendOtpBtn').prop('disabled', false);
                    } else {
                        $('#sendOtpBtn').prop('disabled', true);
                        $('#message').text('Incorrect password. OTP cannot be sent.').css("color", "red");
                    }
                }).fail(function() {
                    $('#sendOtpBtn').prop('disabled', true);
                    $('#message').text('Error verifying password.').css("color", "red");
                });
            });

            // Send OTP
            $('#sendOtpBtn').click(function() {
                let email = $('#email').val();
                $.post('/send-otp', { email: email }, function(response) {
                    $('#message').text(response.message).css("color", "green");

                    // Show OTP Section After Sending OTP
                    $('#otpSection').show();
                }).fail(function(response) {
                    $('#message').text(response.responseJSON.error).css("color", "red");
                });
            });

            // Verify OTP & Login
            $('#verifyOtpBtn').click(function() {
                let email = $('#email').val();
                let otp = $('#otp').val();

                $.post('/verify-otp', { email: email, otp: otp }, function(response) {
                    $('#message').text(response.message).css("color", "green");

                    // Redirect to Dashboard After Successful Login
                    setTimeout(function() {
                        window.location.href = "/dashboard";
                    }, 1000);
                }).fail(function(response) {
                    $('#message').text(response.responseJSON.error).css("color", "red");
                });
            });
        });
    </script>
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
</body>
</html>
