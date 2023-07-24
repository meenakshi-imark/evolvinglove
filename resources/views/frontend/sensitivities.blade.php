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
                        <a href="/toxic-cycle" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Conflict Profile</li>
                        </ul>
                        <a href="/primary-needs" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black">SENSITIVITIES</h2>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <div class="card zoomed-version" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>SENSITIVITIES</p>
                                </div>
                                <div class="card-body">
                                    <table class="dot-slider">
                                        <tbody>
                                            <tr>
                                                @if($calculate_score['complaint']>$calculate_score['defense'])
                                                @php 
                                                $sens_d1 = "Complaint";
                                                $sens_d2 = "Defense";
                                                @endphp
                                                <td><strong class="color_purple">Complaint</strong></td>
                                                @else
                                                @php 
                                                $sens_d1 = "Defense";
                                                $sens_d2 = "Complaint";
                                                @endphp
                                                <td><small>Complaint</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_purple" style="width: {{$calculate_score['shadow_per']['defense_complaint']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($calculate_score['defense']>$calculate_score['complaint'])
                                                <td><strong class="color_purple">Defense</strong></td>
                                                @else
                                                <td><small>Defense</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($calculate_score['control']>$calculate_score['collapse'])
                                                @php 
                                                $sens_c1 = "Control";
                                                $sens_c2 = "Collapse";
                                                @endphp
                                                <td><strong class="color_blue">Control</strong></td>
                                                @else
                                                @php 
                                                $sens_c1 = "Collapse";
                                                $sens_c2 = "Control";
                                                @endphp
                                                <td><small>Control</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_blue" style="width: {{$calculate_score['shadow_per']['control_collapse']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($calculate_score['collapse']>$calculate_score['control'])
                                                <td><strong class="color_blue">Collapse</strong></td>
                                                @else
                                                <td><small>Collapse</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($calculate_score['avoidance']>$calculate_score['anxious'])
                                                @php 
                                                $sens_a1 = "Avoidance";
                                                $sens_a2 = "Anxious";
                                                @endphp
                                                <td><strong class="color_green">Avoidance</strong></td>
                                                @else
                                                @php 
                                                $sens_a1 = "Anxious";
                                                $sens_a2 = "Avoidance";
                                                @endphp
                                                <td><small>Avoidance</small></td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_green" style="width: {{$calculate_score['shadow_per']['avoidance_anxious']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($calculate_score['anxious']>$calculate_score['avoidance'])
                                                <td><strong class="color_green">Anxious</strong></td>
                                                @else
                                                <td><small>Anxious</small></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($calculate_score['addiction']>$calculate_score['dependence'])
                                                @php 
                                                $sens_aa1 = "Addiction";
                                                $sens_aa2 = "Co-dependence";
                                                @endphp
                                                <td><strong class="color_primary">Addiction</strong></td>
                                                @else
                                                @php 
                                                $sens_aa1 = "Co-dependence";
                                                $sens_aa2 = "Addiction";
                                                @endphp
                                                <td><small>Addiction</small></td>
                                                @endif
                                                
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$calculate_score['shadow_per']['addiction_dependence']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($calculate_score['dependence']>$calculate_score['addiction'])
                                                <td><strong class="color_primary">Co-dependence</strong></td>
                                                @else
                                                <td><small>Co-dependence</small></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h3>Emphasizing {{$sens_d1}} More Than {{$sens_d2}}</h3>
                    <p>{{$emphasizing1->emphasizing1}}</p>

                    <h3>Emphasizing {{$sens_c1}} More Than {{$sens_c2}}</h3>
                    <p>{{$emphasizing2->emphasizing2}}</p>

                    <h3>Emphasizing {{$sens_a1}} More Than {{$sens_a2}}</h3>
                    <p>{{$emphasizing3->emphasizing3}}</p>

                    <h3>Emphasizing {{$sens_aa1}} More Than {{$sens_aa2}}</h3>
                    <p>{{$emphasizing4->emphasizing4}}</p>

                    <div class="background-box my-6" style="background-image: url('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png');">
                        <img src="images/Evolving Love Icon - Thought Bubble.png" alt="">
                        <h3>RELATIONSHIP DYNAMICS PRACTICE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>

                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    @include('layouts.feedback-box')

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page18','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page18">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/toxic-cycle" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                        <li>Mastering Your Relationship Dynamics</li>
                            <li>Shadow Stance</li>
                            <li>Shadow Qualities</li>
                        </ul>
                        <a href="/primary-needs" class="btn btn-secondary next">
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