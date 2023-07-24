@include('layouts.result-header')
<main class="content">
    <section class="front-dashboard">
        @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('{{ asset('images/shadow_banners/'.$relationship_lookup_text['banners_image'])}}');">
                <div class="sitemax-width">
                    <h1 class="mb-0">SHADOW PATTERNS</h1>
                    <h3 class="mb-0">{{$relationship_lookup_text['lookuptext']}}</h3>
                    <figure><img src="{{ asset('images/shadow_icons/'.$relationship_lookup_text['icon_image'])}}" alt=""></figure>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="/most-triggered-by" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Archetype</li>
                            <li>Shadow Patterns</li>
                            <li>Conflict Profile</li>
                        </ul>
                        <a href="/how-to-partner-with-you" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>

                    <div class="text-center mb-5">
                        <h2 class="color_black mb-4">CONFLICT PROFILE</h2>
                        <figure class="maxWidth_400 mx-auto">
                            <img src="{{ asset('images/resolution/'.$re_image)}}" alt="">
                        </figure>
                    </div>

                    <h3>The 5 Stages of Resolution</h3>                    
                    <p>{{$resolution_stages->resolution_stages}}</p>

                    <h3>Conflict Strategy</h3>
                    <p>{{$primary_conflict->primary_conflict}}</p>
                    <p>{{$secondary_conflict->secondary_conflict}}</p>

                    <h3>Resolution Strategy</h3>
                    <figure class="float-start me-3 mb-3 maxWidth_330"><img src="images/Evolving Love - 5 0Rs of Resolution.png" alt="Evolving Love - 5 R's of Resolution"></figure>

                    <p>{{$primary_strategy->primary_strategy}}</p>
                    <p>{{$secondary_strategy->secondary_strategy}}</p>
                  
                    <div class="table-resposnive">
                        <table class="conflict-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Your Natural Preference</th>
                                    <th>Your Growth Edge</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <figure>
                                            <img src="images/Relationship Dynamics Conflict Strategy - Regulate-min.png" alt="Relationship Dynamics Conflict Strategy - Regulate">
                                        </figure>
                                    </td>
                                    <td>{{$resolution->regulate_preference}}</td>
                                    <td>{{$resolution->regulate_growth}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure>
                                            <img src="images/Relationship Dynamics Conflict Strategy - Restore-min.png" alt="Relationship Dynamics Conflict Strategy - Restore">
                                        </figure>
                                    </td>
                                    <td>{{$resolution->restore_preference}}</td>
                                    <td>{{$resolution->restore_growth}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure>
                                            <img src="images/Relationship Dynamics Conflict Strategy - Reinterpret.png-min.png" alt="Relationship Dynamics Conflict Strategy - Reinterpret">
                                        </figure>
                                    </td>
                                    <td>{{$resolution->reinterpret_preference}}</td>
                                    <td>{{$resolution->reinterpret_growth}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure>
                                            <img src="images/Relationship Dynamics Conflict Strategy - Restructure-min.png" alt="Relationship Dynamics Conflict Strategy - Restructure">
                                        </figure>
                                    </td>
                                    <td>{{$resolution->restructure_preference}}</td>
                                    <td>{{$resolution->restructure_growth}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

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
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page22','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                    <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page22">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>

                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/most-triggered-by" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Archetype</li>
                            <li>Shadow Patterns</li>
                            <li>Conflict Profile</li>
                        </ul>
                        <a href="/how-to-partner-with-you" class="btn btn-secondary next">
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