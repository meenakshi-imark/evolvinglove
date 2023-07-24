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
                        <a href="/shadow-qualities" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/sensitivities" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black">TOXIC CYCLE</h2>
                    </div>

                    <div class="toxic-figures mb-4">
                        <figure>
                            
                            <img class="w-100" src="{{ asset('images/toxic_cycle/'.$toxic_image)}}" alt="">
                        </figure>
                    </div>

                    <div class="card">
                        <table class="card-table">
                            <thead>
                                <tr>
                                    <th>SHADOW PATTERNS</th>
                                    <th>SHADOW REMEDY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if($remedy=="Complaint" || $remedy=="Defense")
                                    @php $t_class ="color_purple"; @endphp
                                    @elseif($remedy=="Avoidance" || $remedy=="Anxious")
                                    @php $t_class ="color_green"; @endphp
                                    @elseif($remedy=="Control" || $remedy=="Collapse")
                                    @php $t_class ="color_blue"; @endphp
                                    @elseif($remedy=="Addiction" || $remedy=="Co-dependence")
                                    @php $t_class ="color_primary"; @endphp
                                    @endif

                                    <td>1<sup>st</sup> <strong class="{{$t_class}}">{{$remedy}}</strong></td>
                                    @if($secendory_shadow['first']->relationship_gift=="Appreciation" || $secendory_shadow['first']->relationship_gift=="Possibility")
                                    @php $s_class ="color_purple"; @endphp
                                    @elseif($secendory_shadow['first']->relationship_gift=="Devotion" || $secendory_shadow['first']->relationship_gift=="Freedom")
                                    @php $s_class ="color_green"; @endphp
                                    @elseif($secendory_shadow['first']->relationship_gift=="Harmony" || $secendory_shadow['first']->relationship_gift=="Truth")
                                    @php $s_class ="color_blue"; @endphp
                                    @elseif($secendory_shadow['first']->relationship_gift=="Partnership" || $secendory_shadow['first']->relationship_gift=="Passion")
                                    @php $s_class ="color_primary"; @endphp
                                    @endif
                                    <td><strong class="{{$s_class}}">{{$secendory_shadow['first']->relationship_gift}}</strong></td>
                                </tr>
                                <tr>
                                    @if($remedy1=="Complaint" || $remedy1=="Defense")
                                    @php $t_class1 ="color_purple"; @endphp
                                    @elseif($remedy1=="Avoidance" || $remedy1=="Anxious")
                                    @php $t_class1 ="color_green"; @endphp
                                    @elseif($remedy1=="Control" || $remedy1=="Collapse")
                                    @php $t_class1 ="color_blue"; @endphp
                                    @elseif($remedy1=="Addiction" || $remedy1=="Co-dependence")
                                    @php $t_class1 ="color_primary"; @endphp
                                    @endif
                                    <td>2<sup>nd</sup> <strong class="{{$t_class1}}">{{$remedy1}}</strong></td>
                                    @if($secendory_shadow['second']->relationship_gift=="Appreciation" || $secendory_shadow['second']->relationship_gift=="Possibility")
                                    @php $s_class1 ="color_purple"; @endphp
                                    @elseif($secendory_shadow['second']->relationship_gift=="Devotion" || $secendory_shadow['second']->relationship_gift=="Freedom")
                                    @php $s_class1 ="color_green"; @endphp
                                    @elseif($secendory_shadow['second']->relationship_gift=="Harmony" || $secendory_shadow['second']->relationship_gift=="Truth")
                                    @php $s_class1 ="color_blue"; @endphp
                                    @elseif($secendory_shadow['second']->relationship_gift=="Partnership" || $secendory_shadow['second']->relationship_gift=="Passion")
                                    @php $s_class1 ="color_primary"; @endphp
                                    @endif
                                    <td><strong class="{{$s_class1}}">{{$secendory_shadow['second']->relationship_gift}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3>What Is A Toxic Cycle?</h3>
                    <p>{{$toxic_content->toxic_cycle}}</p>
                    <h3>Toxic Cycle</h3>
                    <div class="row left-image-content pt-2">
                        <div class="col-12 col-md-4">
                            <figure>
                                <img src="{{ asset('images/toxic_cycle/'.$primary_toxic_image)}}" alt="">
                            </figure>
                        </div>
                        <div class="col-12 col-md-8">
                            <p>{{$toxic_content->primary_toxic_cycle}}</p>
                            
                        </div>
                    </div>
                    <div class="row left-image-content mt-5">
                        <div class="col-12 col-md-4">
                            <figure>
                                <img src="{{ asset('images/toxic_cycle/'.$secondary_toxic_image)}}" alt="">
                            </figure>
                        </div>
                        <div class="col-12 col-md-8">
                        <p>{{$secondary_content->secondary_toxic_cyle}}</p>
                            
                        </div>
                    </div>

                    <h3>Toxic Cycle Remedy</h3>
                    <p>{{$toxic_content->primay_toxic_remedy}}</p>
                    <p>{{$secondary_content->secondary_toxic_remedy}}</p>
                   

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
                    @include('layouts.feedback-box')

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page17','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page17">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/shadow-qualities" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/sensitivities" class="btn btn-secondary next">
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