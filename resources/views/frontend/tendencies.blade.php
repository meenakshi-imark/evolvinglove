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
                        <a href="/reference" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Tendencies</li>
                        </ul>
                        <a href="/energetic-profile" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">TENDENCIES</h2>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div class="card zoomed-version" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="card-header">
                                        <p>TENDENCIES</p>
                                    </div>
                                    <div class="card-body">
                                        <table class="dot-slider">
                                            <tr>
                                                @if($possibility>$appreciation)
                                                @php 
                                                $tend_p1 = "Possibility";
                                                $tend_p2 = "Appreciation";
                                                @endphp
                                                <td><strong class="color_purple">Possibility</strong></td>
                                                @else
                                                @php 
                                                $tend_p1 = "Appreciation";
                                                $tend_p2 = "Possibility";
                                                @endphp
                                                <td><small>Possibility</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_purple" style="width: {{$total['possibility_app']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($appreciation>$possibility)
                                                <td><strong class="color_purple">Appreciation</strong></td>
                                                @else
                                                <td><small>Appreciation</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($freedom>$devotion)
                                                @php 
                                                $tend_d1 = "Freedom";
                                                $tend_d2 = "Devotion";
                                                @endphp
                                                <td><strong class="color_blue">Freedom</strong></td>
                                                @else
                                                @php 
                                                $tend_d1 = "Devotion";
                                                $tend_d2 = "Freedom";
                                                @endphp
                                                <td><small>Freedom</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_blue" style="width: {{$total['freedom_devotion']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($devotion>$freedom)
                                                <td><strong class="color_blue">Devotion</strong></td>
                                                @else
                                                <td><small>Devotion</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($truth>$harmony)
                                                @php 
                                                $tend_t1 = "Truth";
                                                $tend_t2 = "Harmony";
                                                @endphp
                                                <td><strong class="color_green">Truth</strong></td>
                                                @else
                                                @php 
                                                $tend_t1 = "Harmony";
                                                $tend_t2 = "Truth";
                                                @endphp
                                                <td><small>Truth</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_green" style="width: {{$total['truth_harmony']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($harmony>$truth)
                                                <td><strong class="color_green">Harmony</strong></td>
                                                @else
                                                <td><small>Harmony</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($passion>$partnership)
                                                @php 
                                                $tend_pp1 = "Passion";
                                                $tend_pp2 = "Partnership";
                                                @endphp
                                                <td><strong class="color_primary">Passion</strong></td>
                                                @else
                                                @php 
                                                $tend_pp1 = "Partnership";
                                                $tend_pp2 = "Passion";
                                                @endphp
                                                <td><small>Passion</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$total['passion_part']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($partnership>$passion)
                                                <td><strong class="color_primary">Passion</strong></td>
                                                @else
                                                <td><small>Partnership</small></td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Emphasizing [{{$tend_p1}}] Over [{{$tend_p2}}]</h3>
                    <p>{{$emphasizing1->emphasizing1}}</p>

                    <h3>Emphasizing [{{$tend_d1}}] Over [{{$tend_d2}}]</h3>
                    <p>{{$emphasizing3->emphasizing3}}</p>
                    

                    <h3>Emphasizing [{{$tend_t1}}] Over [{{$tend_t2}}]</h3>
                    <p>{{$emphasizing2->emphasizing2}}</p>

                    <h3>Emphasizing [{{$tend_pp1}}] Over [{{$tend_pp2}}]</h3>
                    <p>{{$emphasizing4->emphasizing4}}</p>
                    
                    <div class="background-box my-6" style="background-image: url('{{ asset('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png')}}');">
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
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page10','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page10">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/reference" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Tendencies</li>
                        </ul>
                        <a href="/energetic-profile" class="btn btn-secondary next">
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