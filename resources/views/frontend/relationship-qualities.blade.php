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
                        <a href="/primary-gifts" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Qualities & Gifts</li>
                        </ul>
                        <a href="/themes" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">RELATIONSHIP QUALITIES</h2>
                        <p class="font_title">
                        @php
                        $arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
                        rsort($arr);
                        $firstLargestVal = $arr[0];
                        $secondLargestVal = $arr[1];
                        @endphp
                        @if($possibility == $firstLargestVal)
                        @php $primary="POSSIBILITY"; 
                        $q_class ="color_purple";
                        @endphp

                        @elseif($appreciation == $firstLargestVal)
                        @php $primary="APPRECIATION";
                        $q_class ="color_purple";
                        @endphp

                        @elseif($truth == $firstLargestVal)
                        @php $primary="TRUTH"; 
                        $q_class ="color_blue";
                        @endphp
                        @elseif($harmony == $firstLargestVal)
                        @php $primary="HARMONY"; 
                        $q_class ="color_blue";
                        @endphp
                        @elseif($freedom == $firstLargestVal)
                        @php $primary="FREEDOM"; 
                        $q_class ="color_green";
                        @endphp
                        @elseif($devotion == $firstLargestVal)
                        @php $primary="DEVOTION";
                        $q_class ="color_green";
                        @endphp
                        @elseif($passion == $firstLargestVal)
                        @php $primary="PASSION"; 
                        $q_class ="color_primary";
                        @endphp
                        @else
                        @php $primary="PARTNERSHIP"; 
                        $q_class ="color_primary";
                        @endphp
                        @endif
                            <span class="color_black">PRIMARY QUALITIES:</span>
                            <br>
                            <strong class="{{$q_class}}" style="text-transform: uppercase;">{{$primary}}</strong>
                        </p>
                        <div class="combine-figure">
                            <figure><img src="{{ asset('images/primary_quality_images/'.$primary_image)}}" alt=""></figure>
                            <figure><img src="{{ asset('images/secondary_images/'.$secondary_image)}}" alt=""></figure>
                        </div>
                        <p class="font_title mt-3">
                        @if($possibility == $secondLargestVal)
                        @php $secondary="POSSIBILITY"; 
                        $q_class1 ="color_purple";
                        @endphp
                        @elseif($appreciation == $secondLargestVal)
                        @php $secondary="APPRECIATION"; 
                        $q_class1 ="color_purple";
                        @endphp

                        @elseif($truth == $secondLargestVal)
                        @php $secondary="TRUTH"; 
                        $q_class1 ="color_blue";
                        @endphp
                        @elseif($harmony == $secondLargestVal)
                        @php $secondary="HARMONY";
                        $q_class1 ="color_blue";
                        @endphp

                        @elseif($freedom == $secondLargestVal)
                        @php $secondary="FREEDOM"; 
                        $q_class1 ="color_green";
                        @endphp
                        @elseif($devotion == $secondLargestVal)
                        @php $secondary="DEVOTION"; 
                        $q_class1 ="color_green";
                        @endphp

                        @elseif($passion == $secondLargestVal)
                        @php $secondary="PASSION"; 
                        $q_class1 ="color_primary";
                        @endphp
                        @else
                        @php $secondary="PARTNERSHIP"; 
                        $q_class1 ="color_primary";
                        @endphp
                        @endif
                            <strong class="{{$q_class1}}" style="text-transform: uppercase;">{{$secondary}}</strong>
                            <br>
                            <span class="color_black">SECONDARY QUALITIES</span>
                        </p>
                    </div>
                    <h3>Primary Qualities</h3>
                    <p>{{$primary_qualities->primary_qualities}}</p>

                    <h3>Secondary Qualities</h3>
                    <p>{{$secondary_qualities->secondary_qualities}}</p>

                    <div class="background-box my-6" style="background-image: url('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png');">
                        <img src="images/Evolving Love Icon - Thought Bubble.png" alt="">
                        <h3>RELATIONSHIP DYNAMICS PRACTICE</h3>
                        <p>Which of the qualities and gifts do you recognize most in yourself? How has that impacted the way you love and who you are in relationship?</p>
                        <ol class="small-spacing">
                            <li>Pick the top 3 qualities and gifts you demonstrate most often</li>
                            <li>How do those qualities impact yourself and others?</li>
                            <li>Share your answers in the Relationship Dynamics Community</li>
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
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page6','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page6">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/primary-gifts" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Qualities & Gifts</li>
                        </ul>
                        <a href="/themes" class="btn btn-secondary next">
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