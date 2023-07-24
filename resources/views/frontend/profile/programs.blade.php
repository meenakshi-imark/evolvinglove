@include('layouts.header')

<style>
    .site-header nav .right>.btn,
    .site-header nav .left .site-hamburgur {
        display: none;
    }
</style>
<main class="content">
    <section class="page-innerTitle" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="content-box">
                <h1 class="mb-0">MY COURSES</h1>
            </div>
        </div>
    </section>
    <section class="chooseProfile-section">
    @include('frontend.profile.sidebar')
    <div class="chooseProfile-body">
            <div class="programs-section">
                <h3 class="fw-normal">{{auth()->user()->name}}’s PURCHASED COURSES</h3>
                <div class="purchased-list common_list">
                    <div class="row row-cols-1 row-cols-md-3 g-4">

                    @php 
                    $i=0;
                    @endphp
                    @foreach($get_survey as $get)
                        @php $i++;
                        $formval = DB::table('formdata')->where('id',$get->formid)->first();
                     
                        $a = json_decode($formval->data, true);
                        $date = date('d F, Y', strtotime($get->created_at));
                        $check_steps = DB::table('progress_steps')->where('formid',$get->formid)->first();
                        @endphp
                        @if($check_steps)
                        @php 
                        $total = round($check_steps->page1+$check_steps->page2+$check_steps->page3+$check_steps->page4+$check_steps->page5+$check_steps->page6+$check_steps->page7+$check_steps->page8+$check_steps->page9+
                        $check_steps->page10+$check_steps->page11+$check_steps->page12+$check_steps->page13+$check_steps->page14+$check_steps->page15+$check_steps->page16+$check_steps->page17+$check_steps->page18+
                        $check_steps->page19+$check_steps->page20+$check_steps->page21+$check_steps->page22+$check_steps->page23+$check_steps->page24);
                        $finaltotal = $total;
                        @endphp
                        @else
                        @php 
                        $finaltotal = 0;
                        @endphp
                        @endif
                        @php 
                        @endphp
                        @if($get->type == 0)
                            <div class="col">
                                <div class="single">
                                <a href="javascript:void(0);" onclick='redirect({{$get->formid}})'></a>
                                    <span class="badge">{{$finaltotal}}%</span>
                                    <figure><img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Pages (3).png')}}" alt=""></figure>
                                    <h4>Full 40 Page Relationship Stance Report + Step By Step Guide</h4>
                                    <p>(Profile #{{$i}})</p>
                                </div>
                            </div>
                        @elseif($get->type == 1)
                            <div class="col">
                                <div class="single">
                                <a href="javascript:void(0);" onclick='redirect({{$get->formid}})'></a>
                                    <span class="badge">{{$finaltotal}}%</span>
                                    <figure><img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Pages (3).png')}}" alt=""></figure>
                                    <h4>1:on:1 Master Your Relationship Stance Session (90 min)</h4>
                                    <p>(Profile #{{$i}})</p>
                                </div>
                            </div>
                        @elseif($get->type == 2)
                            <div class="col">
                                <div class="single">
                                <a href="javascript:void(0);" onclick='redirect({{$get->formid}})'></a>
                                    <span class="badge">{{$finaltotal}}%</span>
                                    <figure><img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Pages (3).png')}}" alt=""></figure>
                                    <h4>3 Seesion Package(90 min each)</h4>
                                    <p>(Profile #{{$i}})</p>
                                </div>
                            </div>
                        @else
                            <div class="col">
                                <div class="single">
                                    <a href="javascript:void(0);" onclick='redirect({{$get->formid}})'></a>
                                    <span class="badge">{{$finaltotal}}%</span>
                                    <figure><img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Pages (3).png')}}" alt=""></figure>
                                    <h4>Full 40 Page Relationship Stance Report + Step By Step Guide</h4>
                                    <p>(Profile #{{$i}})</p>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    </div>
                </div>
                <h3 class="fw-normal">FIND OUT ABOUT OUR OTHER COURSES</h3>
                <div class="row">
                    <div class="col-md-4">
                        <a href="#">
                            <figure><img src="{{ asset('images/Evolving Love Product Image - Permanent Relationship Breakthrough 8 Week Course.png')}}" alt=""></figure>
                            <figure style="max-width: 160px; margin: 20px auto 0;"><img src="{{ asset('images/Evolving Love Product Image - Zoom.png')}}" alt=""></figure>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="section-content">
                            <h3><em>Permanent Relationship Breakthrough Course <br><span>8-Week Live Online Course [Dates here]</span></em></h3>
                            <p>Join relationship experts Bryan Franklin and Jennifer Russell for an 8-week online event. We’ll take you on <strong>a journey of self-discovery</strong> and help you <strong>develop the 8 key skills</strong> that will transform your relationships and our unique 5-step conflict resolution process that will help you gracefully resolve conflicts permanently, even if your partner doesn’t want to do the course with you. You’ll uncover the root causes of your most persistent disagreements and develop the tools to address them effectively and harmoniously.</p>
                            <p>By participating in this course, you can expect to gain a deep understanding of yourself and your relationship patterns, as well as practical tools for improving your communication. This course is not just about learning new information - it's about actively applying these skills to your relationships and seeing tangible improvements in your connection with others. So, if you're ready to transform your relationships and build deeper connections, we invite you to join us for this transformative journey.</p>
                            <a href="{{route('permanent-relationship-breakthrough')}}" class="btn btn-primary br" target="_blank">ACCESS NOW</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="#">
                            <figure><img src="{{ asset('images/Evolving Love Product Image - 10 Day Breakthrough Ordinary Extraordinary.png')}}" alt=""></figure>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="section-content">
                            <h3 class="color_dark_blue">10-Day Challenge + Online Course: 10 Ways To Go From Ordinary To Extraordinary Love <br><em><span>10 Lesson Online Self Paced Course</span></em></h3>
                            <p>In this 10-Day self paced Online course taught by Jennifer & Bryan you'll learn the source code for how healthy, powerful, and passionate relationships work. Get a new, broader context for love, sex, intimacy as you work with Jennifer Russell and Bryan Franklin on your specific relationship patterns. In this course, you’ll get 10 key relationship breakthroughs that will help you uncover commonplace myths and help you to improve your relational skills. Participate in the 10-Day Challenge to permanently upgrade your relationship.</p>
                            <a href="{{route('permanent-relationship-breakthrough')}}" class="btn btn-primary br" target="_blank">ACCESS NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
function redirect(formid){
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $.ajax({
	  url: "/redirect",
         type: "POST",
         dataType: "json",
		 data: { id : formid },
		 success: function(data){
                if(data.status==1){
                    window.location.href = '/introduction';
                }

              },
          });	
}
</script>
@include('layouts.footer')