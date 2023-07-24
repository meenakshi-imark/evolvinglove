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
                        <a href="/parenting-profile" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Communication Profile</li>
                        </ul>
                        <a href="/shadow-qualities" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">EROTIC PROFILE</h2>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div class="card zoomed-version" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="card-header">
                                        <p>EROTIC PROFILE</p>
                                    </div>
                                    <div class="card-body">
                                        <table class="dot-slider">
                                            <tr>
                                                @if($initiate>$reciprocating)
                                                @php 
                                                $er1 = "Initiate";
                                                $er2 = "Reciprocating";
                                                @endphp
                                                <td><strong class="color_primary">Initiating</strong></td>
                                                @else
                                                <td><small>Initiating</small></td>
                                                @php 
                                                $er1 = "Initiate";
                                                $er2 = "Reciprocating";
                                                @endphp
                                                @endif
                                                
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$initiate_re}}%"></span>
                                                    </div>
                                                </td>
                                                @if($initiate<$reciprocating)
                                                <td><strong class="color_primary">Reciprocating</strong></td>
                                                @else
                                                <td><small>Reciprocating</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($planning>$spontaneity)
                                                @php 
                                                $er3 = "Planning";
                                                $er4 = "Spontaneity";
                                                @endphp
                                                <td><strong class="color_primary">Planning</strong></td>
                                                @else
                                                <td><small>Planning</small></td>
                                                @php 
                                                $er3 = "Spontaneity";
                                                $er4 = "Planning";
                                                @endphp
                                                @endif
                                                
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$plannning_spontaneity}}%"></span>
                                                    </div>
                                                </td>
                                                @if($planning<$spontaneity)
                                                <td><strong class="color_primary">Spontaneity</strong></td>
                                                @else
                                                <td><small>Spontaneity</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($variety>$depth)
                                                @php 
                                                $er5 = "Variety";
                                                $er6 = "Depth";
                                                @endphp
                                                <td><strong class="color_primary">Variety</strong></td>
                                                @else
                                                <td><small>Variety</small></td>
                                                @php 
                                                $er5 = "Depth";
                                                $er6 = "Variety";
                                                @endphp
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$variety_depth}}%"></span>
                                                    </div>
                                                </td>
                                                @if($variety<$depth)
                                                <td><strong class="color_primary">Depth</strong></td>
                                                @else
                                                <td><small>Depth</small></td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Emphasizing [{{$er1}}] over [{{$er2}}]</h3>
                    <p>{{$emphasizing1->emphasizing}}</p>

                    <h3>Emphasizing [{{$er3}}] over [{{$er4}}]</h3>
                    <p>{{$emphasizing2->emphasizing}}</p>

                    <h3>Emphasizing [{{$er5}}] over [{{$er6}}]</h3>
                    <p>{{$emphasizing3->emphasizing}}</p>

                    <h3>Erotic Style</h3>
                    <p>{{$primary_erotic->primary_erotic}}</p>
                    <p>{{$secondary_erotic->secondary_erotic}}</p>

                    <h3>Erotic Shadow</h3>
                    <p>{{$primary_erotic->primary_erotic_shadow}}</p>
                    <p>{{$secondary_erotic->secondary_erotic_shadow}}</p>
                    
                    <h3>Erotic Remedy</h3>
                    <p>{{$primary_erotic->primary_erotic_remedy}}</p>
                    <p>{{$secondary_erotic->secondary_erotic_remedy}}</p>

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
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page15','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page15">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/parenting-profile" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Communication Profile</li>
                        </ul>
                        <a href="/shadow-qualities" class="btn btn-secondary next">
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