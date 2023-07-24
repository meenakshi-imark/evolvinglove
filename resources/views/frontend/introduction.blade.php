@include('layouts.result-header')

<main class="content">
    <section class="front-dashboard">
        @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('images/Evolving Love Profile Banner - Introduction.jpg');">
                <div class="sitemax-width">
                    <h1 class="mb-0">Introduction</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="javascript:void(0)" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Introduction</li>
                        </ul>
                        <a href="/ring-of-resolution" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <h3 class="color_black">Congratulations</h3>
                    <p>You’ve taken the next step in a journey of discovery for the purpose of creating an extraordinary love story for yourself. We believe that an evolving love story is a rich and fulfilling one and that the key to evolving the way we love one another begins with an honest and rigorous self-exploration that has us both appreciating more fully our relationshgip gifts while also being willing to continue to become better versions of ourselves.</p>
                    <p>Use this profile to look at the way you relate to your partner with fresh eyes. This profile will highlight some of the gifts you bring to your relationships that help them thrive. Understanding these gifts can help you bring them even more fully into your relationships.</p>
                    <p>You can also use this profile to shed light on the unhealthy patterns that you tend to get caught in from time to time and how those patterns might polarize your partner in predictable ways, contributing to dynamics of conflict and strife.</p>
                    <p>You can take this profile together with someone important (your romantic partner, your business partner, your family members, and friends) to better understand each other and all the relational dynamics that might persist and learn how to exit those patterns so that each person knows how best to offer love, support, and deeper understanding.</p>

                    <div class="background-box my-6" style="background-image: url('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png');">
                        <img src="images/Evolving Love Icon - Thought Bubble.png" alt="">
                        <h3>RELATIONSHIP DYNAMICS PRACTICE</h3>
                        <p>Take a moment to reflect on how you would like to use this profile. What had you decide to take the Relationship Dynamics Quiz? </p>
                        <p>Introduce yourself to the community and share your answer!</p>
                        <!-- <div class="text-center">
                            <a href="javascript:void(0)">Share Your Answer</a>
                        </div> -->
                    </div>

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page1','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page1">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                    <form>
                    @endif
                   
                    
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="javascript:void(0)" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Introduction</li>
                        </ul>
                        <a href="/ring-of-resolution" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            @include('layouts.promo-section')
        </div>
    </section>
</main>

@include('layouts.footer')