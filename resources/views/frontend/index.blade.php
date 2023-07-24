@include('layouts.header')

<main class="content">
    <section class="login-section" style="background-image: url('{{asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="inner">
                <!-- <a href="javascript:void(0)" class="site-logo">
                    <img src="images/evolving-love-logo.png" alt="">
                </a> -->
                @if (!auth()->check())
                <div class="row row-cols-1 row-cols-md-2 align-items-center flex-row-reverse flex-grow-1">
                    <div class="col">
                        <div class="form login-form">
                            <h3 class="mb-1 color_primary">LOGIN TO EVOLVE LOVE</h3>
                            <p>Access your Evolving Love content and courses</p>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="control-group">
                                    <input type="email" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="control-group mb-4">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mb-2">LOGIN</button>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#forgotPassword">Forgot Password?</a>
                            </form>
                        </div>
                    </div>
                    @endif

                    <div class="col">
                        <div class="left">
                            <h3>Haven’t taken the Evolving Love Archetype Quiz?</h3>
                            <p>Unlock the key to understanding your greatest gifts and your deepest shadows as a romantic partner, family member, or friend. You’re about to see yourself and your partner in a whole new light.</p>
                            <a href="quiz" class="btn btn-white mt-2">TAKE MY FREE QUIZ NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade modal-password" id="forgotPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-3">
                        <h3 class="mb-1 color_primary">FORGOT YOUR PASSWORD?</h3>
                        <p>Enter the email associated with your Evolving Love account.</p>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="control-group mb-4">
                            <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                    <div class="text-center mb-3">
                        <h3 class="mb-1 color_primary">RESET PASSWORD</h3>
                        <p>Enter a new password to access your profile. Must be [requirements here]</p>
                    </div>
                    <form class="form" action="">
                        <div class="control-group">
                            <input type="password" placeholder="Password*" name="password">
                        </div>
                        <div class="control-group mb-4">
                            <input type="password" placeholder="Confirm Password*" name="confirm_password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
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
@include('layouts.footer')