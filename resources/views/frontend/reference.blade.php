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
                        <a href="/relationship-skills" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Reference</li>
                        </ul>
                        <a href="/tendencies" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">REFERENCE (Internal vs External)</h2>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div class="card zoomed-version" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="card-header">
                                        <p>REFERENCE</p>
                                    </div>
                                    <div class="card-body">
                                        <table class="dot-slider">
                                            <tr>
                                                @if($refrence=="internal")
                                                <td><strong class="color_primary">Internal</strong></td>
                                                @else
                                                <td>Internal</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$internal_external}}%"></span>
                                                    </div>
                                                </td>
                                                @if($refrence=="external")
                                                <td><strong class="color_primary">External</strong></td>
                                                @else
                                                <td>External</td>
                                                @endif

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>About [{{$refrence}}] Reference</h3>
                    <p>{{$content->about}}</p>
                    <h3>Feedback Motivations & Desires</h3>
                    <p>{{$content->feedback}}</p>
                    

                    <h3>Do You Focus On Similarities Or Differences?</h3>
                    <p>{{$content->focus}}</p>

                    <h3>Areas of Growth</h3>
                    <p>{{$content->growth}}</p>
                    
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
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page9','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page9">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/relationship-skills" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Reference</li>
                        </ul>
                        <a href="/tendencies" class="btn btn-secondary next">
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