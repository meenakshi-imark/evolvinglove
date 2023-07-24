@include('layouts.result-header')
<main class="content">
    <section class="front-dashboard">
        @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('{{ asset('images/shadow_banners/'.$relationship_lookup_text['banners_image'])}}');">
                <div class="sitemax-width">
                <h1 class="mb-0">SHADOW STANCE</h1>
                    <h3 class="mb-0">{{$relationship_lookup_text['lookuptext']}}</h3>
                    <figure><img src="{{ asset('images/shadow_icons/'.$relationship_lookup_text['icon_image'])}}" alt=""></figure>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="/primary-needs" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/most-triggered-by" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">BIGGEST DOUBTS & FEARS</h2>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="first-row">
                                @php
                                $firstLargestVal = $relationship_arr[0];
                                $secondLargestVal = $relationship_arr[1];
                                @endphp
                                @if($calculate_score['complaint'] == $firstLargestVal)
                                @php 
                                $complaint_class = "highlighted-purple-big purple-normal";
                                $complaint_img = "/relationship_wheel/possibility.png";
                                @endphp
                                @elseif($calculate_score['complaint'] == $secondLargestVal)
                                @php 
                                $complaint_class = "highlighted-blue-normal purple-normal";
                                $complaint_img = "/relationship_wheel/possibility.png";
                                @endphp
                                @else
                                @php  $complaint_class = ""; 
                                $complaint_img = "/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure  class="{{$complaint_class}}">
                                        <img src="{{ asset('images'.$complaint_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                        <figcaption><span>"I'll never feel<br> fully met"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="second-row">
                                    @if($calculate_score['avoidance'] == $firstLargestVal)
                                    @php 
                                    $avoidant_class = "highlighted-purple-big green-normal";
                                    $avoidant_img = "/relationship_wheel/freedom.png";
                                    @endphp
                                    @elseif($calculate_score['avoidance'] == $secondLargestVal)
                                    @php 
                                    $avoidant_class = "highlighted-blue-normal green-normal";
                                    $avoidant_img = "/relationship_wheel/freedom.png";
                                    @endphp
                                    @else
                                    @php  $avoidant_class = ""; 
                                    $avoidant_img = "/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$avoidant_class}}">
                                        <img src="{{ asset('images'.$avoidant_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption><span>"My partner's needs will get in the way of me having what I want."</span></figcaption>
                                    </figure>
                                    @if($calculate_score['collapse'] == $firstLargestVal)
                                    @php 
                                    $collapse_class = "highlighted-purple-big blue-color";
                                    $collapse_img = "/relationship_wheel/harmony.png";
                                    @endphp
                                    @elseif($calculate_score['collapse'] == $secondLargestVal)
                                    @php 
                                    $collapse_class = "highlighted-blue-normal blue-color";
                                    $collapse_img = "/relationship_wheel/harmony.png";
                                    @endphp
                                    @else
                                    @php  $collapse_class = ""; 
                                    $collapse_img = "/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$collapse_class}}">
                                        <img src="{{ asset('images'.$collapse_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                        <figcaption><span>No one will care about my feeling"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                    @if($calculate_score['addiction'] == $firstLargestVal)
                                    @php 
                                    $addiction_class = "highlighted-purple-big red-normal";
                                    $addiction_img = "/relationship_wheel/passion.png";
                                    @endphp
                                    @elseif($calculate_score['addiction'] == $secondLargestVal)
                                    @php 
                                    $addiction_class = "highlighted-blue-normal red-normal";
                                    $addiction_img = "/relationship_wheel/passion.png";
                                    @endphp
                                    @else
                                    @php  $addiction_class = ""; 
                                    $addiction_img = "/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$addiction_class}}">
                                        <img src="{{ asset('images'.$addiction_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption><span>"I'll be trapped in monotony and life will be boring."</span></figcaption>
                                    </figure>
                                    @if($calculate_score['dependence'] == $firstLargestVal)
                                    @php 
                                    $dependence_class = "highlighted-purple-big red-normal";
                                    $dependence_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @elseif($calculate_score['dependence'] == $secondLargestVal)
                                    @php 
                                    $dependence_class = "highlighted-blue-normal red-normal";
                                    $dependence_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @else
                                    @php  $dependence_class = ""; 
                                    $dependence_img = "/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$dependence_class}}">
                                        <img src="{{ asset('images'.$dependence_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption><span>"I'll be missed, lied to or betrayed"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                    @if($calculate_score['control'] == $firstLargestVal)
                                    @php 
                                    $control_class = "highlighted-purple-big blue-color";
                                    $control_img = "/relationship_wheel/truth.png";
                                    @endphp
                                    @elseif($calculate_score['control'] == $secondLargestVal)
                                    @php 
                                    $control_class = "highlighted-blue-normal blue-color";
                                    $control_img = "/relationship_wheel/truth.png";
                                    @endphp
                                    @else
                                    @php  $control_class = ""; 
                                    $control_img = "/Evolving Love Energy Icon - Truth Control (Grey Scale).png"; 
                                    @endphp
                                    @endif
                                    <figure class="{{$control_class}}">
                                            <img src="{{ asset('images'.$control_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption><span>"I'll never be able to rely on anyone but myself"</span></figcaption>
                                    </figure>
                                    @if($calculate_score['anxious'] == $firstLargestVal)
                                    @php 
                                    $anxious_class = "highlighted-purple-big green-normal";
                                    $anxious_img = "/relationship_wheel/devotion.png";
                                    @endphp
                                    @elseif($calculate_score['anxious'] == $secondLargestVal)
                                    @php 
                                    $anxious_class = "highlighted-blue-normal green-normal";
                                    $anxious_img = "/relationship_wheel/devotion.png";
                                    @endphp
                                    @else
                                    @php  $anxious_class = ""; 
                                    $anxious_img = "/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$anxious_class}}">
                                            <img src="{{ asset('images'.$anxious_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption><span>"I'll end up alone"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="last-row">
                                    @if($calculate_score['defense'] == $firstLargestVal)
                                    @php 
                                    $defense_class = "highlighted-purple-big purple-normal";
                                    $defense_img = "/relationship_wheel/appreciation.png";
                                    @endphp
                                    @elseif($calculate_score['defense'] == $secondLargestVal)
                                    @php 
                                    $defense_class = "highlighted-blue-normal purple-normal";
                                    $defense_img = "/relationship_wheel/appreciation.png";
                                    @endphp
                                    @else
                                    @php  $defense_class = ""; 
                                    $defense_img = "/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$defense_class}}">
                                        <img src="{{ asset('images'.$defense_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                        <figcaption><span>"I'll be unfairly judged or accused"</span></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Primary Doubts & Fears</h3>
                    <p>{{$primary_doubts->primary_doubts}}</p>
                    <h3>Secondary Doubts & Fears</h3>
                    <p>{{$secondary_doubts->secondary_doubts}}</p>
                    <div class="background-box my-6" style="background-image: url('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png');">
                        <img src="images/Evolving Love Icon - Thought Bubble.png" alt="">
                        <h3>RELATIONSHIP DYNAMICS PRACTICE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ol class="small-spacing">
                            <li>Describe step 1 of the practice here</li>
                            <li>Describe step 1 of the practice here</li>
                            <li>Describe step 1 of the practice here</li>
                        </ol>
                    </div>

                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <ul class="small-spacing">
                        <li>Bullet one about why the next section is awesome</li>
                        <li>Bullet two about why the next section is awesome</li>
                        <li>Bullet three about why the next section is awesome</li>
                    </ul>
                    @include('layouts.feedback-box')

                    <div class="text-center my-6">
                    <form method="post" action="/markcomplete">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page20','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                        @csrf
                        <input type="hidden" name="page" value="page20">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/primary-needs" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/most-triggered-by" class="btn btn-secondary next">
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