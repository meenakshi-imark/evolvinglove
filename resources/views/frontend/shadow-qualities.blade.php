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
                        <a href="/erotic-profile" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/toxic-cycle" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">SHADOW QUALITIES</h2>
                        <p class="font_title">
                            <span class="color_black">PRIMARY SHADOW QUALITIES</span>
                            <br>
                            @if($relationship_lookup_text['primary']=="complaint" || $relationship_lookup_text['primary']=="defense")
                            @php 
                            $q_class="color_purple";
                            @endphp

                            @elseif($relationship_lookup_text['primary']=="avoidance" || $relationship_lookup_text['primary']=="anxious")
                            @php 
                            $q_class="color_green";
                            @endphp

                            @elseif($relationship_lookup_text['primary']=="control" || $relationship_lookup_text['primary']=="collapse")
                            @php 
                            $q_class="color_blue";
                            @endphp

                            @else
                            @php 
                            $q_class="color_primary";
                            @endphp

                            @endif
                            <strong class="{{$q_class}}" style="text-transform: uppercase;">{{$relationship_lookup_text['primary']}}</strong>
                        </p>
                        <div class="combine-figure">
                            <figure><img src="{{ asset('images/primary_shadow/'.$relationship_lookup_text['primary_image'])}}" alt=""></figure>
                            <figure><img src="{{ asset('images/secondary_shadow_img/'.$relationship_lookup_text['secondary_image'])}}" alt=""></figure>
                        </div>
                        <p class="font_title mt-3">
                            @if($relationship_lookup_text['secondary']=="complaint" || $relationship_lookup_text['secondary']=="defense")
                            @php 
                            $q_class1="color_purple";
                            @endphp

                            @elseif($relationship_lookup_text['secondary']=="avoidance" || $relationship_lookup_text['secondary']=="anxious")
                            @php 
                            $q_class1="color_green";
                            @endphp

                            @elseif($relationship_lookup_text['secondary']=="control" || $relationship_lookup_text['secondary']=="collapse")
                            @php 
                            $q_class1="color_blue";
                            @endphp

                            @else
                            @php 
                            $q_class1="color_primary";
                            @endphp

                            @endif
                            <strong class="{{$q_class1}}" style="text-transform: uppercase;">{{$relationship_lookup_text['secondary']}}</strong>
                            <br>
                            <span class="color_black">SECONDARY SHADOW QUALITIES:</span>
                        </p>
                    </div>
                    <h3>RELATIONSHIP DYNAMICS PRACTICE</h3>
                    <p>{{$primary_qualities->primary_qualities}}</p>

                    <h3>Secondary Shadow Qualities</h3>
                    <p>{{$secondary_qualities->secondary_qualities}}</p>

                    <div class="background-box my-6" style="background-image: url('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png');">
                        <img src="images/Evolving Love Icon - Thought Bubble.png" alt="">
                        <h3>EVOLVING LOVE PRACTICE</h3>
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
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page16','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page16">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/erotic-profile" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/toxic-cycle" class="btn btn-secondary next">
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