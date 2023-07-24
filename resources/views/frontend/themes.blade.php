@include('layouts.result-header')
<main class="content">
    <section class="front-dashboard">
    @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}');">
                <div class="sitemax-width">
                    <h1 class="mb-0">RELATIONSHIP STANCE</h1>
                    <h3 class="mb-0">{{$relationship_lookup_text['lookuptext']}}</h3>
                    <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="/relationship-qualities" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Themes</li>
                        </ul>
                        <a href="/relationship-skills" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">THEMES</h2>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="first-row">
                                @php
                                $arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
                                rsort($arr);
                                $firstLargestVal = $arr[0];
                                $secondLargestVal = $arr[1];
                                @endphp
                                

                                @if($possibility == $firstLargestVal)
                                @php 
                                $possibility_class = "highlighted-purple-big purple-normal";
                                $possibility_img = "/relationship_wheel/possibility.png";
                                @endphp
                                @elseif($possibility == $secondLargestVal)
                                @php 
                                $possibility_class = "highlighted-blue-normal purple-normal";
                                $possibility_img = "/relationship_wheel/possibility.png";
                                @endphp
                                @else
                                @php  $possibility_class = ""; 
                                $possibility_img = "/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$possibility_class}}">
                                        <img src="{{ asset('images'.$possibility_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                        <figcaption><span>Growth & <br>Capability</span></figcaption>
                                    </figure>
                                </div>
                                <div class="second-row">
                                    @if($freedom == $firstLargestVal)
                                    @php 
                                    $freedom_class = "highlighted-purple-big green-normal";
                                    $freedom_img = "/relationship_wheel/freedom.png";
                                    @endphp
                                    @elseif($freedom == $secondLargestVal)
                                    @php 
                                    $freedom_class = "highlighted-blue-normal green-normal";
                                    $freedom_img = "/relationship_wheel/freedom.png";
                                    @endphp
                                    @else
                                    @php  $freedom_class = ""; 
                                    $freedom_img = "/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$freedom_class}}">
                                        <img src="{{ asset('images'.$freedom_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption><span>Soverignty & <br>Self Expression</span></figcaption>
                                    </figure>
                                    @if($harmony == $firstLargestVal)
                                    @php 
                                    $harmony_class = "highlighted-purple-big blue-color";
                                    $harmony_img = "/relationship_wheel/harmony.png";
                                    @endphp
                                    @elseif($harmony == $secondLargestVal)
                                    @php 
                                    $harmony_class = "highlighted-blue-normal blue-color";
                                    $harmony_img = "/relationship_wheel/harmony.png";
                                    @endphp
                                    @else
                                    @php  $harmony_class = "";
                                    $harmony_img = "/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$harmony_class}}">
                                        <img src="{{ asset('images'.$harmony_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                        <figcaption><span>Curiosity & Compassion</span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                    @if($passion == $firstLargestVal)
                                    @php 
                                    $passion_class = "highlighted-purple-big red-normal";
                                    $passion_img = "/relationship_wheel/passion.png";
                                    @endphp
                                    @elseif($passion == $secondLargestVal)
                                    @php 
                                    $passion_class = "highlighted-blue-normal red-normal";
                                    $passion_img = "/relationship_wheel/passion.png";
                                    @endphp
                                    @else
                                    @php  $passion_class = "";
                                    $passion_img = "/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$passion_class}}">
                                        <img src="{{ asset('images'.$passion_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption><span>Creativity & <br>Aliveness</span></figcaption>
                                    </figure>
                                    @if($partnership == $firstLargestVal)
                                    @php 
                                    $partnership_class = "highlighted-purple-big red-normal";
                                    $partnership_img = "/relationship_wheel/partnership.png red-normal";
                                    @endphp
                                    @elseif($partnership == $secondLargestVal)
                                    @php 
                                    $partnership_class = "highlighted-blue-normal";
                                    $partnership_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @else
                                    @php  $partnership_class = ""; 
                                    $partnership_img = "/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$partnership_class}}">
                                        <img src="{{ asset('images'.$partnership_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption><span>Justice & <br>Balance</span></figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                    @if($truth == $firstLargestVal)
                                    @php 
                                    $truth_class = "highlighted-purple-big blue-color";
                                    $truth_img = "/relationship_wheel/truth.png";
                                    @endphp
                                    @elseif($truth == $secondLargestVal)
                                    @php 
                                    $truth_class = "highlighted-blue-normal blue-color";
                                    $truth_img = "/relationship_wheel/truth.png";
                                    @endphp
                                    @else
                                    @php  $truth_class = ""; 
                                    $truth_img = "/Evolving Love Energy Icon - Truth Control (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$truth_class}}">
                                        <img src="{{ asset('images'.$truth_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption><span>Truth & <br>Integrity</span></figcaption>
                                    </figure>
                                    @if($devotion == $firstLargestVal)
                                    @php 
                                    $devotion_class = "highlighted-purple-big green-normal";
                                    $devotion_img = "/relationship_wheel/devotion.png";
                                    @endphp
                                    @elseif($devotion == $secondLargestVal)
                                    @php 
                                    $devotion_class = "highlighted-blue-normal green-normal";
                                    $devotion_img = "/relationship_wheel/devotion.png";
                                    @endphp
                                    @else
                                    @php  $devotion_class = ""; 
                                    $devotion_img = "/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$devotion_class}}">
                                        <img src="{{ asset('images'.$devotion_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption><span>Communion & <br>Commitment</span></figcaption>
                                    </figure>
                                </div>
                                <div class="last-row">
                                    @if($appreciation == $firstLargestVal)
                                    @php 
                                    $appreciation_class = "highlighted-purple-big purple-normal";
                                    $appreciation_img = "/relationship_wheel/appreciation.png";
                                    @endphp
                                    @elseif($appreciation == $secondLargestVal)
                                    @php 
                                    $appreciation_class = "highlighted-blue-normal purple-normal";
                                    $appreciation_img = "/relationship_wheel/appreciation.png";
                                    @endphp
                                    @else
                                    @php  $appreciation_class = ""; 
                                    $appreciation_img = "/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png";
                                    @endphp
                                    @endif
                                    <figure class="{{$appreciation_class}}">
                                        <img src="{{ asset('images'.$appreciation_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                        <figcaption><span>Presence & Acceptance</span></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Primary Theme</h3>
                    <p>{{$primary_themes->primary_theme}}</p>

                    <h3>Secondary Theme</h3>
                    <p>{{$secondary_themes->secondary_theme}}</p>

                    <!--p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <ul class="small-spacing">
                        <li>Bullet one about why the next section is awesome</li>
                        <li>Bullet two about why the next section is awesome</li>
                        <li>Bullet three about why the next section is awesome</li>
                    </ul-->

                    @include('layouts.feedback-box')

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page7','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page7">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/relationship-qualities" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Themes</li>
                        </ul>
                        <a href="/relationship-skills" class="btn btn-secondary next">
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