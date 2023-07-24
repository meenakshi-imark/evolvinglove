@include('layouts.header-quiz')

<main class="content">
    <section class="login-section" style="background-image: url('{{asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="inner">
                <a href="/" class="site-logo">
                    <img src="images/evolving-love-logo.png" alt="">
                </a>
                @if (!auth()->check())
                <div class="row row-cols-1 row-cols-md-2 align-items-center flex-row-reverse flex-grow-1">
                    <div class="col">
                        <div class="form login-form">
                            <h3 class="mb-1 color_primary">REGISTER TO EVOLVE LOVE</h3>
                            <p>Access your Evolving Love content and courses</p>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="control-group">
                                    <input id="name" type="text"placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="control-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="control-group">
                                <input id="password" type="password" placeholder="Password"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="control-group mb-4">
                                <input id="password-confirm" type="password" placeholder="Confirm Password"class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mb-2">{{ __('Register') }}</button>
                            </form>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

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