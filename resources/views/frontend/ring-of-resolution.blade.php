@include('layouts.result-header')

<main class="content">
    <section class="front-dashboard">
    @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('images/Evolving Love Profile Banner - Ring Of Resolution.jpg');">
                <div class="sitemax-width">
                    <h1 class="mb-0">RING OF RESOLUTION</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="/introduction" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Stance</li>
                            <li>Ring Of Resolution</li>
                        </ul>
                        <a href="/how-to-read-your-results" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <h3 class="color_black">What are we really fighting about?</h3>
                    <p>People in loving relationships can find ways of fighting about the least consequential things. There are fights about how the dishes should get put away, who’s the better driver, and how much you are spending. It’s common knowledge that the source of conflict in love relationships is rarely the “surface issue,” but what are we really fighting about?</p>
                    <p>After studying thousands of relationships we discovered that, at the deepest level, there are only a finite number of fights we are having. Even though we are each complex and unique, the underlying dynamics that tend to keep us locked in conflict with one another can be categorized into 4 toxic cycles.</p>
                    <p>We call these conflicts ‘<strong>Toxic Cycles</strong>’ because when each partner’s behavior is in one of these positions, their partner tends to polarize into a predictable and directly oppositional position, unconsciously inviting their partner to continue the cycle rather than resolve it. Just like positively and negatively charged magnets, the presence of a strong charge on one side will attract and amplify a strong charge on the opposite side.</p>
                    <p>We’ve identified the 4 Toxic Cycles that are at the heart of nearly every conflict:</p>
                    <figure class="mb-4">
                        <img src="images/Relationship Dynamics Ring of Resolution - 4 Toxic Cycles-min.png" alt="">
                    </figure>
                    <ul>
                        <li>The toxic cycle of Complaint and Defense</li>
                        <li>The toxic cycle of the Anxious and the Avoidant</li>
                        <li>The toxic cycle of Control and Collapse</li>
                        <li>The toxic cycle of Addiction and Codependency</li>
                    </ul>

                    <h3>Remedies & Gifts</h3>
                    <p>We discovered that the underlying motivation driving each partner’s behavior in the toxic cycle also contains the key to permanently resolving the conflict. Rather than the pattern being a result of a character flaw or incompatibility, we found that each partner caught in the cycle was standing for an important value, relationship gift, that is actually necessary for an extraordinary love relationship to flourish.</p>

                    <figure class="float-md-end background_light_grey p-3 mb-3 ms-md-3" style="max-width: 265px;">
                        <img src="images/Evolving Love Ring of Resolution - Remedy Chart Vertical.png" class="w-100" alt="">
                    </figure>
                    <p class="mb-1">Behind every <strong>Complaint</strong> is our value of <strong>Possibility</strong>…</p>
                    <p>Believing in a better vision for the future.</p>
                    <p class="mb-1">Behind every <strong>Defense</strong> is our value of <strong>Appreciation</strong>…</p>
                    <p>Seeing the perfection of the present moment.</p>
                    <p class="mb-1">Behind our pattern of <strong>Control</strong> is our value of <strong>Truth</strong>…</p>
                    <p>Seeking candor, clarity & integrity in our interactions</p>
                    <p class="mb-1">Behind our pattern of <strong>Collapse</strong> is our value of <strong>Harmony</strong>…</p>
                    <p>Attuning with empathy and compassion</p>
                    <p class="mb-1">Behind our <strong>Anxious</strong> behavior is our value of <strong>Devotion</strong>…</p>
                    <p>Being fully committed and available for connection</p>
                    <p class="mb-1">Behind our <strong>Avoidant</strong> behavior is our value of <strong>Freedom</strong>…</p>
                    <p>Being sovereign & authentically self expressed</p>
                    <p class="mb-1">Behind <strong>Addiction</strong> is our value of <strong>Passion</strong>…</p>
                    <p>Embodying our desire to joyfully keep the spark alive</p>
                    <p class="mb-1">Behind <strong>Codependency</strong> is our value of <strong>Partnership</strong>…</p>
                    <p>Relating with respect & collaborating to create a win-win</p>

                    <p>In our <mark>online courses, workshops, retreats, and 1:1 coaching sessions</mark>, we’ve seen these patterns play out again and again, and we’ve learned to recognize and understand how each person in the partnership plays a role in continuing and repeating the cycle.</p>
                    <p>A relationship that has sufficient possibility, appreciation, freedom, devotion, truth, harmony, passion, and partnership will be an evolving love relationship that continues to thrive. The way to permanently resolve a Toxic Cycle is to make sure that both relationship gifts are expressed fully for both partners.</p>
                    If you find yourself on one side or the other of a toxic cycle, then usually the path towards resolution for you will be to invest more in the opposite relationship gift. For example…</p>
                    <p>If your partner feels you are being superior or critical - bring Appreciation to end the cycle of complaint-defense.</p>
                    <p>If your partner feels you are too avoidant, they may be asking for you to embody more devotion to end the anxious-avoidant cycle.</p>
                    <p>If your partner feels you are too rigid or controlling, they may be asking for you to value more harmony to help end the control-collapse cycle…</p>

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page2','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page2">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/introduction" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Ring Of Resolution</li>
                        </ul>
                        <a href="/how-to-read-your-results" class="btn btn-secondary next">
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