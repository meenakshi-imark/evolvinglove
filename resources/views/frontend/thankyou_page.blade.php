@include('layouts.header-quiz')


<main class="content">
    <section class="quiz-screen" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="inner">
                <h2>Thank you for taking the time to fill out our Relationship Dynamics RQ Assessment. Your report will be in your inbox soon.</h2>
                <!-- <p>Check out your results here: <a href="https://evolvinglove.customerdevsites.com/result-summary">https://evolvinglove.customerdevsites.com/result-summary</a></p> -->
                <ul class="mb-3">
                    <li>
                        <a href="javascript:void(0)"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fab fa-twitter-square"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>
                <!-- <a href="/result-summary" class="btn btn-green mt-3">Full Report</a> -->
            </div>
        </div>
    </section>
</main>
@if (!auth()->check()) 
<div class="modal fade modal-password" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display:none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
               <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                <div class="text-center">
                    <h3>Login</h3>  
                </div>               
                @if(session('success'))
                <p class="alert" style="color: red;font-weight: 700;" >Please enter a valid login detail.</p>
                @endif
                <form method="POST" action ="/loginuser">
                @csrf
                <div class="control-group mb-4">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required autocomplete="email" autofocus value="{{$email}}" readonly>
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
                <input class="submit login-btn" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@if (!auth()->check()) 
<script>
$( document ).ready(function() {
    setTimeout(function() {
    //    window.location.href = "/result-summary"
        $("#login").show();
      }, 3000);
});
</script>
@else
<script>
$( document ).ready(function() {
    setTimeout(function() {
       window.location.href = "/result-summary"
      }, 3000);
});
</script>
@endif
<script>
$("#loginform").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    e.preventDefault();
    var formData = $("#loginform").serialize();
    $.ajax({
      url: "/loginuser",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (data) {
        if (data.status == 1) {
            window.location = "/upgrade-profile#shopping_cart";         
        }
        else{
          $('.alert').show();
        }

      },
    });
});
</script>
@include('layouts.footer')