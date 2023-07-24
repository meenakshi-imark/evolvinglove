
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
                        <a href="/energetic-profile" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Communication Profile</li>
                        </ul>
                        <a href="/decision-making-profile" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                    
                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">COMMUNICATION PROFILE</h2>
                        <table class="cross-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>REACTIVE</th>
                                    <th>REPRESSIVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><span>EXPICIT</span></th>
                                    <td colspan="2" rowspan="2">
                                        <figure>
                                            <img class="w-100" src="{{ asset('images/communication_images/'.$profile_image)}}" alt="">
                                            <img class="circle-icon" src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="">
                                        </figure>
                                    </td>
                                </tr>
                                <tr>
                                    <th><span>IMPLICIT</span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if($emp1->type=="implicit")
                    @php
                    $COMM1a = "Implicit";
                    $COMM1b = "Explicit";
                    @endphp
                    @else
                    @php
                    $COMM1a = "Explicit";
                    $COMM1b = "Implicit";
                    @endphp
                    @endif
                    <h3>Emphasizing [{{$COMM1a}}] over [{{$COMM1b}}]</h3>
                    <p>{{$emp1->emphasizing}}</p>

                    @if($emp2->type=="reactive")
                    @php
                    $COMM2a = "Reactive";
                    $COMM2b = "Repressive";
                    @endphp
                    @else
                    @php
                    $COMM2a = "Repressive";
                    $COMM2b = "Reactive";
                    @endphp
                    @endif
                    <h3>Emphasizing [{{$COMM2a}}] over [{{$COMM2b}}]</h3>
                    <p>{{$emp2->emphasizing}}</p>

                    <h3>Communication Style</h3>
                    <p>{{$primary_communication->primary_communication}}</p>
                    <p>{{$secondary_communication->secondary_communication}}</p>

                    <h3>Communication Shadow</h3>
                    <p>{{$primary_shadow_remedy->primary_shadow}}</p>
                    <p>{{$secondary_shadow_remedy->secondary_shadow}}</p>

                    <h3>Communication Remedy</h3>
                    <p>{{$primary_shadow_remedy->primary_remedy}}</p>
                    <p>{{$secondary_shadow_remedy->secondary_remedy}}</p>

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
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page12','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page12">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/energetic-profile" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Relationship Stance</li>
                            <li>Communication Profile</li>
                        </ul>
                        <a href="/decision-making-profile" class="btn btn-secondary next">
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