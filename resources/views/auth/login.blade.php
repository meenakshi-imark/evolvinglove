<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Relationship Dynamics | Dashboard Login</title>
    <meta name="title" content="Relationship Dynamics">
    <meta name="description" content="Relationship Dynamics">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.png" sizes="32x32" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-login.css')}}">
</head>

<body>

    <main class="login-content">
        <div class="box">
            <figure class="site-logo"><img src="{{ asset('images/NEW Evolving Love Logo - Purple Red.png')}}" alt="Evolving Love"></figure>
            <p>Admin login with email and password</p>
            <form method="POST" action="{{ route('login') }}" class="form">
            @csrf
                <div class="control-group">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required autocomplete="email" autofocus value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>
                <div class="control-group mb-4">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password"name="password"  required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                <p class="mt-4">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#forgotPassword">Forgot Password?</a>
                </p>
                <p class="mt-2">
                    <a href="/"><i class="fas fa-long-arrow-alt-left me-1"></i> Go to Relationship Dynamics Site</a>
                </p>
            </form>
        </div>

        <div class="modal fade modal-password" id="forgotPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3>FORGOT YOUR PASSWORD?</h3>
                            <p>Enter the email associated with your Relationship Dynamics account.</p>
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="control-group mb-4">
                            <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Forgot Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-password" id="resetPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3>RESET PASSWORD</h3>
                            <p>Enter a new password to access your profile. Must be [requirements here]</p>
                        </div>
                        <form class="form" action="">
                            <div class="control-group">
                                <input class="form-control" type="password" placeholder="Password*" name="password">
                            </div>
                            <div class="control-group mb-4">
                                <input class="form-control" type="password" placeholder="Confirm Password*" name="confirm_password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    
@if (session('status'))
<div class="alert alert-success alert_msg" role="alert">
{{ session('status') }}
</div>
@endif
<script>
  setTimeout(function () {
    $('.alert_msg').fadeOut();
  }, 2000);
  
 </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>