@include('layouts.shared-header')

<main class="content">
    <section class="front-dashboard shared-profile">
    @include('layouts.sharedProfile-sidebar')
        <div class="main-area">
            <div class="page-title" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}');">
                <div class="sitemax-width">
                    <h1 class="mb-0">RELATIONSHIP STANCE</h1>
                    <h3>RELATIOSHIP DYNAMICS PROFILE</h3>
                </div>
            </div>
            <?php 
            $date =  date("Month D, Yr");
            ?>
            @php 
            $re_url ="https://relationshipdynamics.com/upgrade-relationship-dynamics-profile-course-offer";
            @endphp 
            <div class="page-content">
                <div class="sitemax-width">
                    <div class="text-center mb-5">
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
                        <div class="col d-flex align-items-center">
                            <div class="small-graphic">
                                <div class="dynamic-graphic v_small" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="first-row">
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
                                        <figure class="{{$possibility_class}}">
                                            <img src="{{ asset('images'.$possibility_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Possibility</strong>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="second-row">
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
                                        <figure class="{{$freedom_class}}">
                                            <img src="{{ asset('images'.$freedom_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Freedom</strong>
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
                                                    <strong>Harmony</strong>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="mid-row">
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
                                        <figure class="{{$passion_class}}">
                                            <img src="{{ asset('images'.$passion_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Passion</strong>
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
                                                    <strong>Partnership</strong>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="secondLast-row">
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
                                        <figure class="{{$truth_class}}">
                                            <img src="{{ asset('images'.$truth_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                            <figcaption>
                                                <span>
                                                    <strong>Truth</strong>
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
                                                    <strong>Devotion</strong>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="last-row">
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
                                        <figure class="{{$appreciation_class}}">
                                            <img src="{{ asset('images'.$appreciation_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                            <figcaption>
                                                <span>
                                                    <strong>Appreciation</strong>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>COMMUNICATION STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>DECISION MAKING STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <p>PARENTING STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if($user_details['type']=="Romantic partner")
                            <div class="card">
                                <div class="card-header">
                                    <p>REFERENCE (Internal vs External)</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <div class="col">
                        @if($user_details['type']=="Romantic partner")
                            <div class="card h-100">
                                <div class="card-header">
                                    <p>EROTIC STYLE</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="card">
                                <div class="card-header">
                                    <p>REFERENCE (Internal vs External)</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
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
                        <div class="col d-flex align-items-center">
                            <div class="small-graphic">
                                <div class="dynamic-graphic v_small" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="first-row">
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
                                            <figcaption><span><strong>Defense</strong></span></figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>SHADOW PATTERNS</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>SHADOW REMEDIES</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>TENDENCIES</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <p>SENSITIVITIES</p>
                                </div>
                                <div class="card-body">
                                    <div class="h-100 d-flex align-items-center">
                                        <a href="{{$re_url}}" class="locked">
                                            <img src="{{ asset('images/Evolving Love Icon - Lock (Grey).png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-section">
                        <h3 id="primary-gifts" class="color_black mt-5">Primary Gift</h3>
                        <div class="text-center">
                            <div class="transform-graphic">
                                <div class="dynamic-graphic" data-aos="fade-up" data-aos-delay="300" data-aos-offset="100">
                                    <div class="first-row">
                                        <figure class="{{$possibility_class}}">
                                            <img src="{{ asset('images'.$possibility_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                            <figcaption><span><strong>Possibility</strong></span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="second-row">
                                        <figure class="{{$freedom_class}}">
                                            <img src="{{ asset('images'.$freedom_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                            <figcaption><span><strong>Freedom</strong></figcaption>
                                        </figure>
                                        <figure class="{{$harmony_class}}">
                                            <img src="{{ asset('images'.$harmony_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                            <figcaption><span><strong>Harmony</strong></figcaption>
                                        </figure>
                                    </div>
                                    <div class="mid-row">
                                        <figure class="{{$passion_class}}">
                                            <img src="{{ asset('images'.$passion_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                            <figcaption><span><strong>Passion</strong> </span></figcaption>
                                        </figure>
                                        <figure class="{{$partnership_class}}">
                                            <img src="{{ asset('images'.$partnership_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                            <figcaption><span><strong>Partnership</strong> </span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="secondLast-row">
                                        <figure class="{{$truth_class}}">
                                            <img src="{{ asset('images'.$truth_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                            <figcaption><span><strong>Truth</strong></span></figcaption>
                                        </figure>
                                        <figure class="{{$devotion_class}}">
                                            <img src="{{ asset('images'.$devotion_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                            <figcaption><span><strong>Devotion</strong></span></figcaption>
                                        </figure>
                                    </div>
                                    <div class="last-row">
                                        <figure class="{{$appreciation_class}}">
                                            <img src="{{ asset('images'.$appreciation_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                            <figcaption><span><strong>Appreciation</strong></span></figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Primary GIft</h4>
                        <p>{{$relationship_lookup_text['primary_gifts']->primary_gift}}</p>
                        <h4>Secondary Gift</h4>
                        <p>{{$relationship_lookup_text['secondary_gifts']->secondary_gift}}</p>
                    </div>

                    <div class="sub-section">
                        <h3 id="relationship-qualities" class="color_black mt-5">Relationship Qualities</h3>
                        <div class="text-center">
                            <p class="font_title">
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
                                <figure><img src="{{ asset('images/primary_quality_images/'.$relationship_lookup_text['primary_image'])}}" alt=""></figure>
                                <figure><img src="{{ asset('images/secondary_images/'.$relationship_lookup_text['secondary_image'])}}" alt=""></figure>
                            </div>
                            
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
                            <p class="font_title mt-3">
                                <strong class="{{$q_class1}}" style="text-transform: uppercase;">{{$secondary}}</strong>
                                <br>
                                <span class="color_black">SECONDARY QUALITIES</span>
                            </p>
                        </div>
                        <h4>Primary Qualities</h4>
                        <p>{{$relationship_lookup_text['primary_qualities']->primary_qualities}}</p>
                        <h4>Secondary Qualities</h4>
                        <p>{{$relationship_lookup_text['secondary_qualities']->secondary_qualities}}</p>
                    </div>

                    
                    <div class="sub-section">
                        <h3 id="shadow-qualities" class="color_black mt-5">Shadow Qualities</h3>
                        <div class="text-center">
                            <p class="font_title">
                                <span class="color_black">PRIMARY SHADOW QUALITIES</span>
                                <br>
                                @if($shadow_lookup_text['primary']=="complaint" || $shadow_lookup_text['primary']=="defense")
                                @php 
                                $s_class="color_purple";
                                @endphp
                                @elseif($shadow_lookup_text['primary']=="avoidance" || $shadow_lookup_text['primary']=="anxious")
                                @php 
                                $s_class="color_green";
                                @endphp

                                @elseif($shadow_lookup_text['primary']=="control" || $shadow_lookup_text['primary']=="collapse")
                                @php 
                                $s_class="color_blue";
                                @endphp

                                @else
                                @php 
                                $s_class="color_primary";
                                @endphp

                                @endif
                                
                                <strong class="{{$s_class}}" style="text-transform: uppercase;">{{$shadow_lookup_text['primary']}}</strong>
                            </p>
                            <div class="combine-figure">
                                <figure><img src="{{ asset('images/primary_shadow/'.$shadow_lookup_text['primary_shadow_images'])}}" alt=""></figure>
                                <figure><img src="{{ asset('images/secondary_shadow_img/'.$shadow_lookup_text['secondary_shadow_images'])}}" alt=""></figure>
                            </div>
                            <p class="font_title mt-3">
                                @if($shadow_lookup_text['secondary']=="complaint" || $shadow_lookup_text['secondary']=="defense")
                                @php 
                                $s_class1="color_purple";
                                @endphp
                                @elseif($shadow_lookup_text['secondary']=="avoidance" || $shadow_lookup_text['secondary']=="anxious")
                                @php 
                                $s_class1="color_green";
                                @endphp

                                @elseif($shadow_lookup_text['secondary']=="control" || $shadow_lookup_text['secondary']=="collapse")
                                @php 
                                $s_class1="color_blue";
                                @endphp

                                @else
                                @php 
                                $s_class1="color_primary";
                                @endphp

                                @endif
                                <strong class="{{$s_class1}}" style="text-transform: uppercase;">{{$shadow_lookup_text['secondary']}}</strong>
                                <br>
                                <span class="color_black">SECONDARY SHADOW QUALITIES:</span>
                            </p>
                        </div>
                        <h4>Primary Shadow Qualities</h4>
                        <p>{{$shadow_lookup_text['primary_qualities']->primary_qualities}}</p>
                        <h4>Secondary Shadow Qualities</h4>
                        <p>{{$shadow_lookup_text['secondary_qualities']->secondary_qualities}}</p>
                       
                    </div>

                    <div class="sub-section">
                        <h3 id="toxic-cycle" class="color_black mt-5">Toxic Cycles</h3>
                        <div class="toxic-figures pt-3 mb-4">
                            <figure>
                                <img class="w-100" src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['toxic_image'])}}" alt="">
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
                                        @if($shadow_lookup_text['remedy']=="Complaint" || $shadow_lookup_text['remedy']=="Defense")
                                        @php $t_class ="color_purple"; @endphp
                                        @elseif($shadow_lookup_text['remedy']=="Avoidance" || $shadow_lookup_text['remedy']=="Anxious")
                                        @php $t_class ="color_green"; @endphp
                                        @elseif($shadow_lookup_text['remedy']=="Control" || $shadow_lookup_text['remedy']=="Collapse")
                                        @php $t_class ="color_blue"; @endphp
                                        @elseif($shadow_lookup_text['remedy']=="Addiction" || $shadow_lookup_text['remedy']=="Co-dependence")
                                        @php $t_class ="color_primary"; @endphp
                                        @endif
                                        <td>1<sup>st</sup> <strong class="{{$t_class}}">{{$shadow_lookup_text['remedy']}}</strong></td>
                                        @if($shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Appreciation" || $shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Possibility")
                                        @php $s_class ="color_purple"; @endphp
                                        @elseif($shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Devotion" || $shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Freedom")
                                        @php $s_class ="color_green"; @endphp
                                        @elseif($shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Harmony" || $shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Truth")
                                        @php $s_class ="color_blue"; @endphp
                                        @elseif($shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Partnership" || $shadow_lookup_text['secendory_shadow']['first']->relationship_gift=="Passion")
                                        @php $s_class ="color_primary"; @endphp
                                        @endif
                                        <td><strong class="{{$s_class}}">{{$shadow_lookup_text['secendory_shadow']['first']->relationship_gift}}</strong></td>
                                    </tr>
                                    <tr>
                                        @if($shadow_lookup_text['remedy1']=="Complaint" || $shadow_lookup_text['remedy1']=="Defense")
                                        @php $t_class1 ="color_purple"; @endphp
                                        @elseif($shadow_lookup_text['remedy1']=="Avoidance" || $shadow_lookup_text['remedy1']=="Anxious")
                                        @php $t_class1 ="color_green"; @endphp
                                        @elseif($shadow_lookup_text['remedy1']=="Control" || $shadow_lookup_text['remedy1']=="Collapse")
                                        @php $t_class1 ="color_blue"; @endphp
                                        @elseif($shadow_lookup_text['remedy1']=="Addiction" || $shadow_lookup_text['remedy1']=="Co-dependence")
                                        @php $t_class1 ="color_primary"; @endphp
                                        @endif
                                        <td>2<sup>nd</sup> <strong class="{{$t_class1}}">{{$shadow_lookup_text['remedy1']}}</strong></td>
                                        @if($shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Appreciation" || $shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Possibility")
                                        @php $s_class1 ="color_purple"; @endphp
                                        @elseif($shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Devotion" || $shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Freedom")
                                        @php $s_class1 ="color_green"; @endphp
                                        @elseif($shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Harmony" || $shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Truth")
                                        @php $s_class1 ="color_blue"; @endphp
                                        @elseif($shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Partnership" || $shadow_lookup_text['secendory_shadow']['second']->relationship_gift=="Passion")
                                        @php $s_class1 ="color_primary"; @endphp
                                        @endif
                                        <td><strong class="{{$t_class1}}">{{$shadow_lookup_text['secendory_shadow']['second']->relationship_gift}}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4>What Is A Toxic Cycle?</h4>
                        <p>{{$shadow_lookup_text['toxic_content']->toxic_cycle}}</p>
                        <h4>Toxic Cycle</h4>
                        <div class="row left-image-content pt-3">
                            <div class="col-12 col-md-4">
                                <figure>
                                <img src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['primary_toxic_image'])}}" alt="">
                                </figure>
                            </div>
                            <div class="col-12 col-md-8">
                            <p>{{$shadow_lookup_text['toxic_content']->primary_toxic_cycle}}</p>
                            </div>
                        </div>
                        <div class="row left-image-content mt-5">
                            <div class="col-12 col-md-4">
                                <figure>
                                    <img src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['secondary_toxic_image'])}}" alt="">
                                </figure>
                            </div>
                            <div class="col-12 col-md-8">
                            <p>{{$shadow_lookup_text['secondary_content']->secondary_toxic_cyle}}</p>
                            </div>
                        </div>
                        <h4>Toxic Cycle Remedy</h4>
                        <p>{{$shadow_lookup_text['toxic_content']->primay_toxic_remedy}}</p>
                        <p>{{$shadow_lookup_text['secondary_content']->secondary_toxic_remedy}}</p>
                     </div>

                     <div class="locked-section">
                        <h3>Themes</h3>
                        <div class="overlay">
                            <div class="text-center mb-5">
                                <div class="transform-graphic">
                                    <div class="dynamic-graphic animated">
                                        <div class="first-row">
                                            <figure>
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                                <figcaption><span>Growth &amp; <br>Capability</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="second-row">
                                            <figure>
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                                <figcaption><span>Soverignty &amp; <br>Self Expression</span></figcaption>
                                            </figure>
                                            <figure class="">
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                                <figcaption><span>Curiosity &amp; <br>Compassion</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="mid-row">
                                            <figure>
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                                <figcaption><span>Creativity &amp; <br>Aliveness</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                                <figcaption><span>Justice &amp; <br>Balance</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="secondLast-row">
                                            <figure>
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Truth Control (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                                <figcaption><span>Truth &amp; <br>Integrity</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                                <figcaption><span>Communion &amp; <br>Commitment</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="last-row">
                                            <figure class="">
                                                <img src="{{ asset('images/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                                <figcaption><span>Presence &amp; <br>Acceptance</span></figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Primary Theme</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h4>Secondary Theme</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <ul class="small-spacing">
                                <li>Bullet one about why the next section is awesome</li>
                                <li>Bullet two about why the next section is awesome</li>
                                <li>Bullet three about why the next section is awesome</li>
                            </ul>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{ asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Relationship Skills</h3>
                        <div class="overlay">
                            <h4>Relational Skills That Come Naturally</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <ol class="small-spacing">
                                <li>Relationship Skill #1 - Description here of relationship skill #1</li>
                                <li>Relationship Skill #1 - Description here of relationship skill #1</li>
                                <li>Relationship Skill #1 - Description here of relationship skill #1</li>
                            </ol>
                            <h4>Relational Skills To Develop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <ol class="small-spacing">
                                <li>Relationship Skill #1 - Description here of relationship skill #1</li>
                                <li>Relationship Skill #1 - Description here of relationship skill #1</li>
                                <li>Relationship Skill #1 - Description here of relationship skill #1</li>
                            </ol>
                            <a href="/upgrade-profile" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Reference (Internal vs External)</h3>
                        <div class="overlay">
                            <div class="text-center mb-5 pt-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <div class="card zoomed-version animated">
                                            <div class="card-header">
                                                <p>REFERENCE</p>
                                            </div>
                                            <div class="card-body">
                                                <table class="dot-slider">
                                                    <tbody>
                                                        <tr>
                                                            <td>Internal</td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span style="width: 80%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td>External</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>About [External] Reference</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Feedback Motivations &amp; Desires</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Do You Focus On Similarities Or Differences?</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Areas of Growth</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Tendencies</h3>
                        <div class="overlay">
                            <div class="text-center mb-5 pt-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <div class="card zoomed-version animated">
                                            <div class="card-header">
                                                <p>TENDENCIES</p>
                                            </div>
                                            <div class="card-body">
                                                <table class="dot-slider">
                                                    <tbody>
                                                        <tr>
                                                            <td><small>Possibility</small></td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_purple" style="width: 55%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td>Appreciation</td>
                                                        </tr>
                                                        <tr>
                                                            <td><small>Freedom</small></td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_blue" style="width: 45%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td>Devotion</td>
                                                        </tr>
                                                        <tr>
                                                            <td><small>Truth</small></td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_green" style="width: 45%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td>Harmony</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Passion</td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_primary" style="width: 20%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td><small>Partnership</small></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Emphasizing [Appreciation] Over [Possibility]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Emphasizing [Devotion] Over [Freedom]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            <h4>Emphasizing [Harmony] Over [Truth]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Emphasizing [Partnership] Over [Passion]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Energetic Profile</h3>
                        <div class="overlay">
                            <div class="text-center mb-5">
                                <div class="transform-graphic">
                                    <div class="dynamic-graphic animated">
                                        <div class="first-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                                <figcaption><span>Up &amp; Out</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="second-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                                <figcaption><span>Away &amp; <br>Leaving</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Harmony Collapse (Grey Scale)">
                                                <figcaption><span>Out &amp; Down</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="mid-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                                <figcaption><span>Disconnected &amp; <br>Flowing</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                                <figcaption><span>Connected &amp; <br>Structured</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="secondLast-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Truth Control (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                                <figcaption><span>In &amp; <br>Constricted</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                                <figcaption><span>Towords<br> &amp; Merging</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="last-row">
                                            <figure class="">
                                                <img src="{{asset('images/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                                <figcaption><span>In &amp; Down</span></figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>What Is An Energetic Profile?</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Energetic Gifts</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Energetic Shadow</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Communication Profile</h3>
                        <div class="overlay">
                            <div class="text-center mb-5 pt-3">
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
                                                    <img class="w-100" src="{{asset('images/Evolving-Love-Punnet-Square---Purple-Communication-Decision-Making-Parenting---Purple-Visionary-Zen-Master.png')}}" alt="">
                                                    <!-- <img class="circle-icon" src="{{asset('images/Evolving Love Archetype - Male Zen Master (200px).png')}}" alt=""> -->
                                                </figure>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><span>IMPLICIT</span></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h4>Emphasizing [COMM1a] over [COMM1b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Emphasizing [COMM2a] over [COMM2b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Communication Style</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Communication Shadow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Communication Remedy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Decision-Making Profile</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <table class="cross-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Directive</th>
                                            <th>Collaborative</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><span>Intuitive</span></th>
                                            <td colspan="2" rowspan="2">
                                                <figure>
                                                    <img class="w-100" src="{{asset('images/Evolving-Love-Punnet-Square---Purple-Communication-Decision-Making-Parenting---Purple-Visionary-Zen-Master.png')}}" alt="">
                                                    <!-- <img class="circle-icon" src="{{asset('images/Evolving Love Archetype - Male Zen Master (200px).png')}}" alt=""> -->
                                                </figure>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><span>Considered</span></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h4>Emphasizing [DECISION1a] over [DECISION1b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Emphasizing [DECISION2a] over [DECISION2b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Decision Making Style</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Decision Making Shadow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Decision Making Remedy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Parenting Profile</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <table class="cross-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Autonomous</th>
                                            <th>Engaged</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><span>APPRECIATION</span></th>
                                            <td colspan="2" rowspan="2">
                                                <figure>
                                                    <img class="w-100" src="{{asset('images/Evolving-Love-Punnet-Square---Purple-Communication-Decision-Making-Parenting---Purple-Visionary-Zen-Master.png')}}" alt="">
                                                    <!-- <img class="circle-icon" src="{{asset('images/Evolving Love Archetype - Male Zen Master (200px).png')}}" alt=""> -->
                                                </figure>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><span>ACHIEVEMENT</span></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h4>Emphasizing [PARENT1a] over [PARENT1b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Emphasizing [PARENT2a] over [PARENT2b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Parenting Style</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Parenting Shadow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <h4>Parenting Remedy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    @if($user_details['type']=="Romantic partner")
                    <div class="locked-section">
                        <h3>Erotic Profile</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <div class="card zoomed-version animated">
                                            <div class="card-header">
                                                <p>EROTIC PROFILE</p>
                                            </div>
                                            <div class="card-body">
                                                <table class="dot-slider">
                                                    <tbody>
                                                        <tr>
                                                            <td><small>Initiating</small></td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_primary" style="width: 20%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td><small>Reciprocating</small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><small>Planning</small></td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_primary" style="width: 80%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td><small>Spontaneity</small></td>
                                                        </tr>
                                                        <tr>
                                                            <td><small>Variety</small></td>
                                                            <td>
                                                                <div class="dot-progress">
                                                                    <!-- <span class="background_primary" style="width: 45%"></span> -->
                                                                </div>
                                                            </td>
                                                            <td><small>Depth</small></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Emphasizing [EROTIC1a] over [EROTIC1b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Emphasizing [EROTIC2a] over [EROTIC2b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Emphasizing [EROTIC3a] over [EROTIC3b]</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <h4>Erotic Style</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Erotic Shadow</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <h4>Erotic Remedy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>
                    @endif

                    <div class="locked-section">
                        <h3>Sensitivities</h3>
                        <div class="overlay">
                            <div class="row justify-content-center pt-3 mb-5">
                                <div class="col-12 col-md-8">
                                    <div class="card zoomed-version animated">
                                        <div class="card-header">
                                            <p>SENSITIVITIES</p>
                                        </div>
                                        <div class="card-body">
                                            <table class="dot-slider">
                                                <tbody>
                                                    <tr>
                                                        <td><small>Complaint</small></td>
                                                        <td>
                                                            <div class="dot-progress">
                                                                <!-- <span class="background_purple" style="width: 55%"></span> -->
                                                            </div>
                                                        </td>
                                                        <td><small>Defense</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Control</small></td>
                                                        <td>
                                                            <div class="dot-progress">
                                                                <!-- <span class="background_blue" style="width: 45%"></span> -->
                                                            </div>
                                                        </td>
                                                        <td><small>Collapse</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Avoidance</small></td>
                                                        <td>
                                                            <div class="dot-progress">
                                                                <!-- <span class="background_green" style="width: 45%"></span> -->
                                                            </div>
                                                        </td>
                                                        <td><small>Anxious</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td><small>Addiction</small></td>
                                                        <td>
                                                            <div class="dot-progress">
                                                                <!-- <span class="background_primary" style="width: 20%"></span> -->
                                                            </div>
                                                        </td>
                                                        <td><small>Co-dependence</small></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Emphasizing Defense More Than Complaint</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Emphasizing Collapse More Than Control</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Emphasizing Anxious More Than Avoidant</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.at.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Emphasizing Addiction More Than Co-dependence</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.at.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Primary Needs</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <div class="transform-graphic">
                                    <div class="dynamic-graphic animated">
                                        <div class="first-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                                <figcaption><span>Acknowledgement</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="second-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                                <figcaption><span>Autonomy</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                                <figcaption><span>Kindness</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="mid-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                                <figcaption><span>Pleasure</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                                <figcaption><span>Respect</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="secondLast-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Truth Control (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                                <figcaption><span>Shared Reality</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                                <figcaption><span>Connection</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="last-row">
                                            <figure class="">
                                                <img src="{{asset('images/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                                <figcaption><span>Acceptance</span></figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Primary Need</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Secondary Need</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Biggest Doubts & Fears</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <div class="transform-graphic">
                                    <div class="dynamic-graphic animated">
                                        <div class="first-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                                <figcaption><span>"I'll never feel<br> fully met"</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="second-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                                <figcaption><span>"My partner's needs will get in the way of me having what I want."</span></figcaption>
                                            </figure>
                                            <figure class="">
                                                <img src="{{asset('images/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                                <figcaption><span>"No one will care about my feeling"</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="mid-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                                <figcaption><span>"I'll be trapped in monotony and life will be boring."</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                                <figcaption><span>"I'll be missed, lied to or betrayed"</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="secondLast-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Truth Control (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                                <figcaption><span>"I'll never be able to rely on anyone but myself"</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                                <figcaption><span>"I'll end up alone"</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="last-row">
                                            <figure class="">
                                                <img src="{{asset('images/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                                <figcaption><span>"I'll be unfairly judged or accused"</span></figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Primary Doubts & Fears</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <h4>Secondary Doubts & Fears</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Most Triggered By</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <div class="transform-graphic">
                                    <div class="dynamic-graphic animated">
                                        <div class="first-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                                <figcaption><span>Complacency, Defensiveness &amp; Dentail</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="second-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                                <figcaption><span>Insecurity, <br>Neediness &amp; <br>Desperation</span></figcaption>
                                            </figure>
                                            <figure class="">
                                                <img src="{{asset('images/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                                <figcaption><span>Righteousnesd,<br> Rigidity &amp; <br>Control</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="mid-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                                <figcaption><span>Dullness <br>Over processing <br>&amp; Pushy</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                                <figcaption><span>Lying, <br> Hiding &amp; <br> Betrayal</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="secondLast-row">
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Truth Control (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                                <figcaption><span>Dishonesty, Disempowerment <br>&amp; Collapse</span></figcaption>
                                            </figure>
                                            <figure>
                                                <img src="{{asset('images/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                                <figcaption><span>Selfishness, <br>Distance &amp; <br>Rejection</span></figcaption>
                                            </figure>
                                        </div>
                                        <div class="last-row">
                                            <figure class="">
                                                <img src="{{asset('images/Evolving Love Energy Icon - Appreciation Defense (Grey Scale).png')}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                                <figcaption><span>Superiority, <br>Criticism &amp; Blame</span></figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Primary Trigger</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Secondary Trigger</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Conflict Profile</h3>
                        <div class="overlay">
                            <div class="text-center pt-3 mb-5">
                                <figure class="maxWidth_400 mx-auto">
                                    <img src="{{ asset('images/unnamed (1).png')}}" alt="">
                                </figure>
                            </div>
                            <h4>The 5 Stages of Resolution</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>Conflict Strategy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <h4>Resolution Strategy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>How To Partner With You</h3>
                        <div class="overlay">
                            <h4>What Has The Compassionate Zen Master Feel Most Loved</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>How To Communicate With A Compassioante Zen Master</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>How To Romance A Compassionate Zen Master</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>How To Treat The Compassionate Zen Master When They Are Triggered</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <h4>How To Soothe The Compassionate Zen Master</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.eserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
                    </div>

                    <div class="locked-section">
                        <h3>Permanent Breakthrough</h3>
                        <div class="overlay">
                            <h4>Permanent Breakthrough</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="{{$re_url}}" class="btn btn-white-filled"><img src="{{asset('images/Evolving-Love-Icon---Lock-(White).png')}}" alt=""> UPGRADE TO UNLOCK</a>
                        </div>
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