@include('layouts.header-quiz')

<main class="content">
    <section class="quiz-screen thank_page" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="inner">
                <!-- <h2>Your Relationship Archetype Profile <br> Will Be Ready Soon…</h2>
                <div class="progress__bar">
                    <h6>Please wait...
                        <img src="{{ asset('images/loader.png')}}" alt="loader">
                    </h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100" style="width:52%">
                        <span class="sr-only">52% Complete</span>
                        </div>
                    </div>
                </div> -->
                
                <div class="video__frame wrap">
                    <h3>Watch this video while we prepare your quiz results</h3>
                    <div class="video_frame">
                        <div class="text-video" id="showMe">
                            <h4>Your results are in! </h4>
                            <a href="{{route('free-report')}}" id="skip-btn" class="btn btn-white now" target="_blank">Get Quiz Results Now</a>
                        </div>
                        <iframe src="https://www.youtube.com/embed/2Urjy5HzvzU?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen allow="autoplay"></iframe>
                    </div>
                </div>
                <div class="skip">
                    <a href="{{route('free-report')}}"  id="skip-btn" class="btn btn-primary br" target="_blank">Skip</a>
                    <!-- <a href="{{route('free-report')}}" target="_blank" class="btn btn-primary br">Skip</a> -->
                </div>
                <!-- <ul class="mb-3">
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
                <a href="/my-account" class="btn btn-green mt-3">Profile</a> -->
            </div>
        </div>
    </section>
</main>
    <!-- Modal -->
    <!-- <div class="modal thank_pop fade" id="thanku_page" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <h3>Skip this video?</h3>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <a href="{{route('free-report')}}"  class="btn btn-primary">Yes</a>
        </div>
        </div>
    </div>
    </div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // $(document).ready(function(){
    //     $('#thanku_page').modal('show');
    // }); 
    // $(document).ready(function(){  
    //     setTimeout(function() {
    //     $('#thanku_page').modal('show');
    // }, 3000);
    // }); 
 
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $("#skip-btn").click(function(){
        $("#showMe").addClass("intro");
      });
    });
</script>
<!-- <script>
$( document ).ready(function() {
    setTimeout(function() {
       window.location.href = "/free-report"
      }, 3000);
});
</script> -->
@include('layouts.footer')
