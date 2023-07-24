@include('layouts.result-header')

<main class="content">
    <section class="front-dashboard">
    @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('images/Evolving Love Profile Banner - Visionary Zen Master Blue Purple.jpg');">
                <div class="sitemax-width">
                    <h1 class="mb-0">HOW TO READ YOUR RESULTS</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="/ring-of-resolution" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>How To Read Your Results</li>
                        </ul>
                        <a href="/result-summary" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <h3 class="color_black"><em>You are not made of stone</em></h3>
                    <p>The results you receive are not intended to be used as a ‘Typing’ system. Many typing systems describe our identity in a more fixed and one dimensional way. It may be tempting to think of the results in this report as meaning something about you that is unchangeable.</p>
                    <p>We believe that the best way to enter into an evolutionary partnership is to realize that our identities and specifically our character strategies are actually much more moldable, flexible and able to evolve than it may appear. We also acknowledge that for many of us these strategies have been in place for decades and so some of the cycles and patterns we find ourselves in can feel pretty rutted and can seem difficult to change. However, fundamentally we believe that you can be any way that you choose to be.</p>
                    <p>This profile is meant to give you a window into how you are predominantly showing up in your relationships right now. It is a current snapshot of the most prevalent relational dynamics that are present. If you had taken this profile years ago you might score differently AND if you take this profile again in the future, again your results might change. Different relationships can bring up different sets of relational dynamics.</p>
                    <p>We hope this profile serves less as a fixed description and more like a map where you can find your way to developing all 8 of these values and learn to overcome all 8 of these shadow patterns.</p>

                    <h3>Warning Label: This information will point at your shadow.</h3>
                    <figure class="float-start me-3 mb-2 mb-md-3" style="max-width: 190px;">
                        <img src="images/Evolving Love How To Read Your Results - Warning Facing Shadow Couple.jpg" alt="" class="w-100">
                    </figure>
                    <p>While there’s a lot of great news in this report that your ego will enjoy, this profile would be less useful if it didn’t also highlight some of the shadow elements that are at the root of what might be creating conflict and strife in your relationships. We often call the patterned ways we respond that can be repeated enough that they form aspects of our personality a ‘Character Strategy’.</p>

                    <p>These character strategies describe how the body, beliefs, and behaviors adapt to the positive and negative forces in our environment to evolve and protect us.</p>
                    <p>These character strategies can be beautiful and virtuous and also unhealthy and full of shadow. We believe it is a deeply worthwhile process to uncover these character strategies and to see them with clear, honest, and understanding eyes.</p>
                    <p>Our goal in creating this body of work is to raise our collective ‘Relational Quotient’ (RQ) so that we are all more able to create and maintain conscious healthy relationships ongoingly.</p>

                    <h3>Our intentions for creating this profile</h3>
                    <p>Our intention in creating this profile is to help you pave the way to have more of these 3 experiences in your relationships. Our hope is...</p>
                    <ol>
                        <li>That you might have a new understanding of an aspect of yourself or an aspect of your partner and that that new understanding might allow you to rewrite the story on some of the automatic ways that you interact with the people that you love, and</li>
                        <li>You begin to recognize something that you haven't been able to appreciate about yourself, your partner or the people that you interact with most. We hope you’ll see something you haven't been able to appreciate in a new light and with that elevated appreciation, it might change your perspective of what's possible in your relationships.</li>
                        <li>You have more access to being who you want in all your relationships and a roadmap that helps you evolve and upgrade your relational quotient (RQ).</li>
                    </ol>
                    <p>The percentage associated with each relationship gift and shadow in your results reflects how much attention and focus you seem to have on that area. You can then use the Ring Of Resolution to see what kinds of gifts and conflicts might arise from your focus, and how to respond in a way that will lead you towards a fulfilling and ever evolving love relationship.</p>
                    <p>There could be many reasons for why you focus on one particular relationship gift over another. Most commonly it indicates that you haven’t chosen to develop that aspect of yourself compared with others. It could also mean that you are focused intently on one area because your natural gifts lie elsewhere and don’t need as much of your attention. It could also mean that your partner has a particular sensitivity and you are focused on that area because you know it is important to your partner.</p>
                    <p>We hope you enjoy learning about yourself through the lens of Evolving Love and that you use what you find in this report to be an even more extraordinary lover.</p>

                    <div class="background-box my-6" style="background-image: url('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png');">
                        <img src="images/Evolving Love Icon - Thought Bubble.png" alt="">
                        <h3>RELATIONSHIP DYNAMICS PRACTICE</h3>
                        <p><strong>Ask Your Internal Judger to Go On A Break</strong></p>
                        <p>Have the morality police go on coffee break. Rest assured they will be invited back later and are valued for the discernment they bring to your life but for now, for the next 15-20 minutes relax that part of you and be in a state of open inquiry</p>
                    </div>

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page3','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page3">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>


                    <div class="page-breadcrum mt-6">
                        <a href="/ring-of-resolution" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>How To Read Your Results</li>
                        </ul>
                        <a href="/result-summary" class="btn btn-secondary next">
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