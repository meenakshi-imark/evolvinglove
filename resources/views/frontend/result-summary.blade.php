@include('layouts.result-header')
@php $route = Route::current()->getName(); @endphp
<main class="content">
    <section class="front-dashboard">
    @include('layouts.sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}');">
                <div class="sitemax-width">
                    <h1 class="mb-0">RESULTS SUMMARY</h1>
                </div>
            </div>
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="page-breadcrum mb-6">
                        <a href="/how-to-read-your-results" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Results Summary</li>
                        </ul>
                        <a href="/primary-gifts" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                    <?php 
                     $date =  date("Month D, Yr");
                 
                    ?>
                    <div class="text-center mb-5">
                        <figure class="maxWidth_100 mx-auto"><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="Evolving Love Archetype - Male Zen Master (200px)"></figure>
                        <h2 class="color_black mb-1 mt-4">{{$relationship_lookup_text['lookuptext']}}</h2>
                        <p class="mb-1">Results Summary for <strong>{{$user_details['firstname']}} {{$user_details['lastname']}}</strong> in relationship to <strong>{{$user_details['relation']}}</strong></p>
                        <p>Submitted on <span class="color_black"><strong>{{date("l");}}, {{date('F d, Y');}}</strong></span></p>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>RELATIONSHIP GIFTS</p>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>Possibility</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_purple" role="progressbar" style="width: {{$possibility}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Appreciation</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_purple" role="progressbar" style="width: {{$appreciation}}%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Truth</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_blue" role="progressbar" style="width: {{$truth}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harmony</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_blue" role="progressbar" style="width: {{$harmony}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Freedom</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_green" role="progressbar" style="width: {{$freedom}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Devotion</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_green" role="progressbar" style="width: {{$devotion}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Passion</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_primary" role="progressbar" style="width: {{$passion}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Partnership</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_primary" role="progressbar" style="width: {{$partnership}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                        
                        <div class="col d-flex align-items-center">
                            <div class="small-graphic">
                                <div class="dynamic-graphic v_small" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="first-row">
                                        <figure class="{{$possibility_class}}">
                                            <img src="{{ asset('images'.$possibility_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Possibility</strong> <br>Complaint
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
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
                                    <div class="second-row">
                                        <figure class="{{$freedom_class}}">
                                            <img src="{{ asset('images'.$freedom_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Freedom</strong> <br>Avoidant
                                                </span>
                                            </figcaption>
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
                                            <figcaption>
                                                <span>
                                                    <strong>Harmony</strong> <br>Collapse
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
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
                                    <div class="mid-row">
                                        <figure class="{{$passion_class}}">
                                            <img src="{{ asset('images'.$passion_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Passion</strong> <br>Addiction
                                                </span>
                                            </figcaption>
                                        </figure>
                                    @if($partnership == $firstLargestVal)
                                    @php 
                                    $partnership_class = "highlighted-purple-big red-normal";
                                    $partnership_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @elseif($partnership == $secondLargestVal)
                                    @php 
                                    $partnership_class = "highlighted-blue-normal red-normal";
                                    $partnership_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @else
                                    @php  $partnership_class = ""; 
                                    $partnership_img = "/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$partnership_class}}">
                                            <img src="{{ asset('images'.$partnership_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Partnership</strong> <br>Co-Dependence
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
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
                                    <div class="secondLast-row">
                                        <figure class="{{$truth_class}}">
                                            <img src="{{ asset('images'.$truth_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Truth</strong> <br>Control
                                                </span>
                                            </figcaption>
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
                                            <figcaption>
                                                <span>
                                                    <strong>Devotion</strong> <br>Anxious
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
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
                                    <div class="last-row">
                                        <figure class="{{$appreciation_class}}">
                                            <img src="{{ asset('images'.$appreciation_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                            <figcaption>
                                                <span>
                                                    <strong>Appreciation</strong> <br>Defense
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>COMMUNICATION STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                <td>Explicit</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$implicit_explicit}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Implicit</td>
                                            </tr>
                                            <tr>
                                                <td>Reactive</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$reactive_repressive_per}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Repressive</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>DECISION MAKING STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                <td>Directive</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$directive_col}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Collaborative</td>
                                            </tr>
                                            <tr>
                                                <td>Intuitive</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$intuitive_con}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Considered</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>PARENTING STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                <td>Autonomous</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$autonomous_engaged}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Engaged</td>
                                            </tr>
                                            <tr>
                                                <td>Structured</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$structred_opened}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Open</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if($user_details['type']=="Romantic partner")
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>REFERENCE (Internal vs External)</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                <td>Internal</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$internal_external}}%"></span>
                                                    </div>
                                                </td>
                                                <td>External</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        
                        <div class="col">
                        @if($user_details['type']=="Romantic partner")
                            <div class="card h-100" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>EROTIC STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                <td>Initiating</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$initiate_re}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Reciprocating</td>
                                            </tr>
                                            <tr>
                                                <td>Spontaneity</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$plannning_spontaneity}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Planning</td>
                                            </tr>
                                            <tr>
                                                <td>Variety</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$variety_depth}}%"></span>
                                                    </div>
                                                </td>
                                                <td>Depth</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>REFERENCE (Internal vs External)</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                <td>Internal</td>
                                                <td>
                                                    <div class="dot-progress">
                                                        <span style="width: {{$internal_external}}%"></span>
                                                    </div>
                                                </td>
                                                <td>External</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr><tr>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                           
                        </div> 
                        
                       



                    </div>

                    <div class="text-center mt-6 mb-5">
                        <figure class="maxWidth_100 mx-auto"><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
                        <h2 class="color_black mb-0 mt-4">{{$shadow_lookup_text['shadowlookuptext']}}</h2>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>SHADOW PATTERNS</p>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>Complaint</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_purple" role="progressbar" style="width: {{$shadow['complaint']}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Defense</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_purple" role="progressbar" style="width: {{$shadow['defense']}}%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Avoidant</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_green" role="progressbar" style="width: {{$shadow['avoidance']}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Anxious</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_green" role="progressbar" style="width: {{$shadow['anxious']}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Control</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_blue" role="progressbar" style="width: {{$shadow['control']}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Collapse</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_blue" role="progressbar" style="width: {{$shadow['collapse']}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Addiction</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_primary" role="progressbar" style="width: {{$shadow['addiction']}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Co-Dependence</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar background_primary" role="progressbar" style="width: {{$shadow['dependence']}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                                
                        
                        @php 
                        $shadow_arr = $shadow;
                        rsort($shadow_arr); 
                        $shadowFirstVal = $shadow_arr[0];
                        $shadowSecondVal = $shadow_arr[1];
                        @endphp
                        @if($shadow['complaint'] == $shadowFirstVal)
                        @php 
                        $complaint_class = "highlighted-purple-big purple-normal";
                        $complaint_img = "/relationship_wheel/possibility.png";
                        @endphp
                        @elseif($shadow['complaint'] == $shadowSecondVal)
                        @php 
                        $complaint_class = "highlighted-blue-normal purple-normal";
                        $complaint_img = "/relationship_wheel/possibility.png";
                        @endphp
                        @else
                        @php  $complaint_class = ""; 
                        $complaint_img = "/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png";
                        @endphp
                        @endif
                       
                        <div class="col d-flex align-items-center">
                            <div class="small-graphic">
                                <div class="dynamic-graphic v_small" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="first-row">
                                        <figure class="{{$complaint_class}}">
                                            <img src="{{ asset('images'.$complaint_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                            <figcaption><span>Complaint</span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="second-row">
                                    @if($shadow['avoidance'] == $shadowFirstVal)
                                    @php 
                                    $avoidant_class = "highlighted-purple-big green-normal";
                                    $avoidant_img = "/relationship_wheel/freedom.png";
                                    @endphp
                                    @elseif($shadow['avoidance'] == $shadowSecondVal)
                                    @php 
                                    $avoidant_class = "highlighted-blue-normal green-normal";
                                    $avoidant_img = "/relationship_wheel/freedom.png";
                                    @endphp
                                    @else
                                    @php  $avoidant_class = ""; 
                                    $avoidant_img = "/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$avoidant_class}}">
                                            <img src="{{ asset('images'.$avoidant_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                            <figcaption><span>Avoidant</span></figcaption>
                                        </figure>
                                    @if($shadow['collapse'] == $shadowFirstVal)
                                    @php 
                                    $collapse_class = "highlighted-purple-big blue-color";
                                    $collapse_img = "/relationship_wheel/harmony.png";
                                    @endphp
                                    @elseif($shadow['collapse'] == $shadowSecondVal)
                                    @php 
                                    $collapse_class = "highlighted-blue-normal blue-color";
                                    $collapse_img = "/relationship_wheel/harmony.png";
                                    @endphp
                                    @else
                                    @php  $collapse_class = ""; 
                                    $collapse_img = "/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$collapse_class}}">
                                            <img src="{{ asset('images'.$collapse_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                            <figcaption><span>Collapse</span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="mid-row">
                                    @if($shadow['addiction'] == $shadowFirstVal)
                                    @php 
                                    $addiction_class = "highlighted-purple-big red-normal";
                                    $addiction_img = "/relationship_wheel/passion.png";
                                    @endphp
                                    @elseif($shadow['addiction'] == $shadowSecondVal)
                                    @php 
                                    $addiction_class = "highlighted-blue-normal red-normal";
                                    $addiction_img = "/relationship_wheel/passion.png";
                                    @endphp
                                    @else
                                    @php  $addiction_class = ""; 
                                    $addiction_img = "/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$addiction_class}}">
                                            <img src="{{ asset('images'.$addiction_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                            <figcaption><span>Addiction</span></figcaption>
                                        </figure>
                                    @if($shadow['dependence'] == $shadowFirstVal)
                                    @php 
                                    $dependence_class = "highlighted-purple-big red-normal";
                                    $dependence_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @elseif($shadow['dependence'] == $shadowSecondVal)
                                    @php 
                                    $dependence_class = "highlighted-blue-normal red-normal";
                                    $dependence_img = "/relationship_wheel/partnership.png";
                                    @endphp
                                    @else
                                    @php  $dependence_class = ""; 
                                    $dependence_img = "/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$dependence_class}}">
                                            <img src="{{ asset('images'.$dependence_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                            <figcaption><span>Co-dependance</span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="secondLast-row">
                                    @if($shadow['control'] == $shadowFirstVal)
                                    @php 
                                    $control_class = "highlighted-purple-big blue-color";
                                    $control_img = "/relationship_wheel/truth.png";
                                    @endphp
                                    @elseif($shadow['control'] == $shadowSecondVal)
                                    @php 
                                    $control_class = "highlighted-blue-normal blue-color";
                                    $control_img = "/relationship_wheel/truth.png";
                                    @endphp
                                    @else
                                    @php  $control_class = ""; 
                                    $control_img = "/Evolving Love Energy Icon - Truth Control (Grey Scale).png"; 
                                    @endphp
                                    @endif
                                        <figure class="{{$control_class}}">
                                            <img src="{{ asset('images'.$control_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                            <figcaption><span>Control</span></figcaption>
                                        </figure>
                                    @if($shadow['anxious'] == $shadowFirstVal)
                                    @php 
                                    $anxious_class = "highlighted-purple-big green-normal";
                                    $anxious_img = "/relationship_wheel/devotion.png";
                                    @endphp
                                    @elseif($shadow['anxious'] == $shadowSecondVal)
                                    @php 
                                    $anxious_class = "highlighted-blue-normal green-normal";
                                    $anxious_img = "/relationship_wheel/devotion.png";
                                    @endphp
                                    @else
                                    @php  $anxious_class = ""; 
                                    $anxious_img = "/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$anxious_class}}">
                                            <img src="{{ asset('images'.$anxious_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                            <figcaption><span>Anxious</span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="last-row">
                                    @if($shadow['defense'] == $shadowFirstVal)
                                    @php 
                                    $defense_class = "highlighted-purple-big purple-normal";
                                    $defense_img = "/relationship_wheel/appreciation.png";
                                    @endphp
                                    @elseif($shadow['defense'] == $shadowSecondVal)
                                    @php 
                                    $defense_class = "highlighted-blue-normal purple-normal";
                                    $defense_img = "/relationship_wheel/appreciation.png";
                                    @endphp
                                    @else
                                    @php  $defense_class = ""; 
                                    $defense_img = "/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png";
                                    @endphp
                                    @endif
                                        <figure class="{{$defense_class}}">
                                            <img src="{{ asset('images'.$defense_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                            <figcaption><span>Defense</span></figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>SHADOW PATTERNS</p>
                                </div>                               
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table>
                                            <tr>
                                                @if($remedy=="Complaint" || $remedy=="Defense")
                                                @php
                                                $remedy_color = "color_purple";
                                                @endphp

                                                @elseif($remedy=="Avoidance" || $remedy=="Anxious")
                                                @php
                                                $remedy_color = "color_green";
                                                @endphp

                                                @elseif($remedy=="Control" || $remedy=="Collapse")
                                                @php
                                                $remedy_color = "color_blue";
                                                @endphp

                                                @else
                                                @php
                                                $remedy_color = "color_primary";
                                                @endphp
                                                @endif


                                                @if($remedy1=="Complaint" || $remedy1=="Defense")
                                                @php
                                                $remedy_color1 = "color_purple";
                                                @endphp

                                                @elseif($remedy1=="Avoidance" || $remedy1=="Anxious")
                                                @php
                                                $remedy_color1 = "color_green";
                                                @endphp

                                                @elseif($remedy1=="Control" || $remedy1=="Collapse")
                                                @php
                                                $remedy_color1 = "color_blue";
                                                @endphp

                                                @else
                                                @php
                                                $remedy_color1 = "color_primary";
                                                @endphp
                                                @endif


                                                <td class="text-center">1<sup>st</sup> <strong class="{{$remedy_color}}">{{$remedy}}</strong></td>
                                                <td class="text-center">2<sup>nd</sup> <strong class="{{$remedy_color1}}">{{$remedy1}}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>SHADOW REMEDIES</p>
                                </div>
                                
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table>
                                            <tr>
                                                @if($secendory_shadow['first']->relationship_gift=="Appreciation" || $secendory_shadow['first']->relationship_gift=="Possibility")
                                                @php
                                                $shadow_color = "color_purple";
                                                @endphp

                                                @elseif($secendory_shadow['first']->relationship_gift=="Devotion" || $secendory_shadow['first']->relationship_gift=="Freedom")
                                                @php
                                                $shadow_color = "color_green";
                                                @endphp

                                                @elseif($secendory_shadow['first']->relationship_gift=="Harmony" || $secendory_shadow['first']->relationship_gift=="Truth")
                                                @php
                                                $shadow_color = "color_blue";
                                                @endphp

                                                @elseif($secendory_shadow['first']->relationship_gift=="Passion" || $secendory_shadow['first']->relationship_gift=="Partnership")
                                                @php
                                                $shadow_color = "color_primary";
                                                @endphp
                                                @endif

                                                @if($secendory_shadow['second']->relationship_gift=="Appreciation" || $secendory_shadow['second']->relationship_gift=="Possibility")
                                                @php
                                                $shadow_color1 = "color_purple";
                                                @endphp

                                                @elseif($secendory_shadow['second']->relationship_gift=="Devotion" || $secendory_shadow['second']->relationship_gift=="Freedom")
                                                @php
                                                $shadow_color1 = "color_green";
                                                @endphp

                                                @elseif($secendory_shadow['second']->relationship_gift=="Harmony" || $secendory_shadow['second']->relationship_gift=="Truth")
                                                @php
                                                $shadow_color1 = "color_blue";
                                                @endphp

                                                @else
                                                @php
                                                $shadow_color1 = "color_primary";
                                                @endphp
                                                @endif
                                                <td class="text-center">1<sup>st</sup> <strong class="{{$shadow_color}}">{{$secendory_shadow['first']->relationship_gift}}</strong></td>
                                                <td class="text-center">2<sup>nd</sup> <strong class="{{$shadow_color1}}">{{$secendory_shadow['second']->relationship_gift}}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>TENDENCIES</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                @if($possibility>$appreciation)
                                                <td><strong class="color_purple">Possibility</strong></td>
                                                @else
                                                <td>Possibility</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_purple" style="width: {{$shadow_percentage['app_possibility']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($appreciation>$possibility)
                                                <td><strong class="color_purple">Appreciation</strong></td>
                                                @else
                                                <td>Appreciation</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($truth>$harmony)
                                                <td><strong class="color_blue">Truth</strong></td>
                                                @else
                                                <td>Truth</td>
                                                @endif

                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_blue" style="width: {{$shadow_percentage['harmony_truth']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($harmony>$truth)
                                                <td><strong class="color_blue">Harmony</strong></td>
                                                @else
                                                <td>Harmony</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($freedom>$devotion)
                                                <td><strong class="color_green">Freedom</strong></td>
                                                @else
                                                <td>Freedom</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_green" style="width: {{$shadow_percentage['devotion_freedom']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($freedom<$devotion)
                                                <td><strong class="color_green">Devotion</strong></td>
                                                @else
                                                <td>Devotion</td>
                                                @endif
                                            </tr>

                                            <tr>
                                                @if($passion>$partnership)
                                                <td><strong class="color_primary">Passion</strong></td>
                                                @else
                                                <td>Passion</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$shadow_percentage['passion_part']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($passion<$partnership)
                                                <td><strong class="color_primary">Partnership</strong></td>
                                                @else
                                                <td>Partnership</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                <div class="card-header">
                                    <p>SENSITIVITIES</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <table class="dot-slider">
                                            <tr>
                                                @if($shadow['complaint']>$shadow['defense'])
                                                <td><strong class="color_purple">Complaint</strong></td>
                                                @else
                                                <td>Complaint</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_purple" style="width: {{$per_shadow['defense_complaint']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($shadow['complaint']<$shadow['defense'])
                                                <td><strong class="color_purple">Defense</strong></td>
                                                @else
                                                <td>Defense</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($shadow['control']>$shadow['collapse'])
                                                <td><strong class="color_blue">Control</strong></td>
                                                @else
                                                <td>Control</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_blue" style="width: {{$per_shadow['control_collapse']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($shadow['control']<$shadow['collapse'])
                                                <td><strong class="color_blue">Collapse</strong></td>
                                                @else
                                                <td>Collapse</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($shadow['avoidance']>$shadow['anxious'])
                                                <td><strong class="color_green">Avoidant</strong></td>
                                                @else
                                                <td>Avoidant</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_green" style="width: {{$per_shadow['avoidance_anxious']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($shadow['avoidance']<$shadow['anxious'])
                                                <td><strong class="color_green">Anxious</strong></td>
                                                @else
                                                <td>Anxious</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($shadow['addiction']>$shadow['dependence'])
                                                <td><strong class="color_primary">Addiction</strong></td>
                                                @else
                                                <td>Addiction</td>
                                                @endif
                                                <td>
                                                    <div class="dot-progress">
                                                        <span class="background_primary" style="width: {{$per_shadow['addiction_dependence']}}%"></span>
                                                    </div>
                                                </td>
                                                @if($shadow['addiction']<$shadow['dependence'])
                                                <td><strong class="color_primary">Co-Dependence</strong></td>
                                                @else
                                                <td>Co-Dependence</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="background-box my-6" style="background-image: url('{{ asset('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png')}}');">
                        <img src="{{ asset('images/Evolving Love Icon - Thought Bubble.png')}}" alt="">
                        <h3>EVOLVING LOVE PRACTICE</h3>
                        <p>Share these results with the people in your life who are most important to you, and who might have insights into how you might evolve the way you love.</p>
                        <p>You might share them with your romantic partner, family members, friends, or colleagues.</p>
                        <div class="text-start">
                            <a href="javascript:void(0)">Share your results now</a>
                        </div>
                    </div>

                    <div class="text-center my-6">
                    @php 
                    $datasession = session()->all();
                    $check_page = DB::table('progress_steps')->where('formid',$datasession['formid'])->where('page4','!=',NULL)->first();
                    @endphp
                    @if($check_page)
                    <button tyoe="submit" class="btn btn-primary br h-55" disabled style="border: 2px solid #008000;color: green;">Completed</button>
                    @else
                        <form method="post" action="/markcomplete">
                        @csrf
                        <input type="hidden" name="page" value="page4">
                        <button tyoe="submit" class="btn btn-primary br h-55">Mark Complete</button>
                        <form>
                    @endif
                    </div>

                    <div class="page-breadcrum mt-6">
                        <a href="/how-to-read-your-results" class="btn btn-secondary prev">
                            <i class="fas fa-caret-left"></i> Prev
                        </a>
                        <ul>
                            <li>Mastering Your Relationship Dynamics</li>
                            <li>Results Summary</li>
                        </ul>
                        <a href="/primary-gifts" class="btn btn-secondary next">
                            Next <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @include('layouts.promo-section')
        </div>
    </section>
</main>
<style>
body .background_blue {
    background-color: #0668A8!important;
}
</style>
@include('layouts.footer')