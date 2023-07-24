<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Evolving Love PDF Profile Template</title>
    <meta name="title" content="Evolving Love">
    <meta name="description" content="Evolving Love">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.png" sizes="32x32" type="image/x-icon">

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/developer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pdf.css')}}">
</head>

<body class="profile-pdf">

    <!-- Page 1 -->
    <div class="single breakAfter">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="pdf-body welcome-body">
            <div class="inner text-center">
                <div class="overlay" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union hires.jpeg')}}');"></div>
                <h1 class="color_white"><strong>RELATIONSHIP ARCHETYPE</strong></h1>
                <figure class="mb-4">
                    <img src="{{ asset('images/Evolving Love Polarity Wheel Updated (white lines).png')}}" alt="Evolving Love PDF Cover - Polarity Wheel Icons">
                </figure>
                
                <h3 class="color_white mb-0">Results for <strong><?php echo $user_details['firstname']?> <?php echo $user_details['lastname'] ?></strong> <br>in relationship to <?php echo $user_details['relation'] ?></h3>
            </div>
        </div>
        @php 
        $date = date("l jS \of F Y h:i A",strtotime($user_details['created_at'] ));
        @endphp
        <div class="welcome-foot background_primary text-center">
            <div class="inner">
                <p class="color_white"><strong>Submitted on:</strong> {{$date}}</p>
            </div>
        </div>
    </div>
    <!-- Page 1 | END -->

	<div class="footer pdf-foot">
	    <div class="inner">
	        <p></p>
	        <div class="site-logo">
	            <img src="{{ asset('images/evolving-love-colored-logo.png')}}" alt="">
	        </div>
	    </div>
	</div>

    <!-- Page 2 -->
    <div class="single">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="pdf-body toc">
            <div class="inner align-items-center justify-content-center">
                <figure class="overlay">
                    <img src="{{ asset('images/Evolving Love PDF Cover - Polarity Wheel Icons-02.png')}}" alt="Evolving Love PDF Cover - Polarity Wheel Icons">
                </figure>
                <h2 class="color_black">TABLE OF CONTENTS</h2>
                <ul>
                    <li>
                        <span>RESULTS SUMMARY</span>
                        <span>[#]</span>
                    </li>
                    <li>
                        <span>INTRODUCTION</span>
                        <span>[#]</span>
                    </li>
                    <li>
                        <span>THE RING OF RESOLUTION</span>
                        <span>[#]</span>
                    </li>
                    <li>
                        <span>HOW TO READ YOUR RESULTS</span>
                        <span>[#]</span>
                    </li>
                    <li>
                        <span>RELATIONSHIP ARCHETYPE</span>
                        <span>[#]</span>
                        <ul>
                            <li>
                                <span>Primary Gifts</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Relationship Qualities</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Themes</span>
                                <span>[#]</span>
                            <li>
                                <span>Relationship Skills</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Reference (Self vs Other)</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Tendencies</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Energetic Profile</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Communication Profile</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Decision Making Profile</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Parenting Profile</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Erotic Profile</span>
                                <span>[#]</span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>SHADOW ARCHETYPE</span>
                        <span>[#]</span>
                        <ul>
                            <li>
                                <span>Shadow Qualities</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Toxic Cycle</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Sensitivities</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Primary Needs</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Biggest Fears & Doubts</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Most Triggered by</span>
                                <span>[#]</span>
                            </li>
                            <li>
                                <span>Conflict Profile</span>
                                <span>[#]</span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>HOW TO PARTNER WITH THE [ARCHETYPE]</span>
                        <span>[#]</span>
                    </li>
                    <li>
                        <span>PERMANENT RELATIONSHIP BREAKTHROUGH</span>
                        <span>[#]</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page 2 | END -->

    <!-- Page 3 -->
    <div class="single breakBefore">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner">
                <div class="result-head text-center">
                    <figure>
                        <img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="Evolving Love Archetype - Male Zen Master (200px)">
                    </figure>
                    <h2 class="color_black">
                        <strong>{{$relationship_lookup_text['lookuptext']}}</strong>
                    </h2>
                    <h5 class="mb-0">
                        Results Summary for <strong>{{$user_details['firstname']}} {{$user_details['lastname']}}</strong> and <strong>{{$user_details['relation']}}</strong>
                        <br>
                        {{$date}}
                    </h5>
                </div>
                <div class="row column-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>RELATIONSHIP GIFTS</h5>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="small-graphic">
                            <div class="dynamic-graphic animated v_small">
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
                                                <strong>Possibility</strong> <br>Complaint
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
                                <div class="last-row">
                                @if($appreciation == $firstLargestVal)
                                @php 
                                $appreciation_class = "highlighted-purple-big purple-normal";
                                $appreciation_img = "/relationship_wheel/appreciation.png";
                                @endphp
                                @elseif($appreciation == $secondLargestVal)
                                @php 
                                $appreciation_class = "highlighted-blue-normal purple-normal";
                                $appreciation_img = "/Evolving Love Energy Icon - Appreciation Defense (Grey Scale)";
                                @endphp
                                @else
                                @php  $appreciation_class = ""; 
                                $appreciation_img = "/relationship_wheel/devotion.png";
                                @endphp
                                @endif
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
                </div>
                <div class="row column-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>COMMUNICATION STYLE</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>DECISION MAKING STYLE</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row column-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>PARENTING STYLE</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
                                        <tr>
                                            <td>Autonomous</td>
                                            <td>
                                                <div class="dot-progress">
                                                    <span style="width:{{$autonomous_engaged}}%"></span>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>REFERENCE (Internal vs External)</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
                                        <tr>
                                            <td>Internal</td>
                                            <td>
                                                <div class="dot-progress">
                                                    <span style="width: {{$internal_external}}%"></span>
                                                </div>
                                            </td>
                                            <td>External</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>EROTIC STYLE</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 3 | END -->

    <!-- Page 4 -->
    <div class="single breakBefore">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner">
                <div class="result-head text-center">
                    <figure>
                        <img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt="Evolving Love Shadow Archetype - Male Victim (200px)">
                    </figure>
                    <h2 class="color_black">
                        <strong>{{$shadow_lookup_text['shadowlookuptext']}}</strong>
                    </h2>
                    <h5 class="mb-0">
                        Results Summary for <strong>{{$user_details['firstname']}} {{$user_details['lastname']}}</strong> and <strong>{{$user_details['relation']}}</strong>
                        <br>
                        {{$date}}
                    </h5>
                </div>
                <div class="row column-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>RELATIONSHIP SHADOWS</h5>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Complaint</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_purple" role="progressbar" style="width: {{$complaint}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Defense</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_purple" role="progressbar" style="width: {{$defense}}%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Avoidant</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_blue" role="progressbar" style="width: {{$avoidance}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Anxious</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_blue" role="progressbar" style="width:{{$anxious}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Control</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_green" role="progressbar" style="width:{{$control}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Collapse</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_green" role="progressbar" style="width: {{$collapse}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Addiction</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_primary" role="progressbar" style="width: {{$addiction}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Co-Dependence</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_primary" role="progressbar" style="width: {{$dependence}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="small-graphic">
                            <div class="dynamic-graphic animated v_small">
                                <div class="first-row">
                                @php 
                                $shadow_arr =  array($complaint,$defense,$avoidance,$anxious,$control,$collapse,$addiction,$dependence);
                                rsort($shadow_arr); 
                                $shadowFirstVal = $shadow_arr[0];
                                $shadowSecondVal = $shadow_arr[1];
                                @endphp
                                @if($complaint == $shadowFirstVal)
                                @php 
                                $complaint_class = "highlighted-purple-big purple-normal";
                                $complaint_img = "/relationship_wheel/possibility.png";
                                @endphp
                                @elseif($complaint == $shadowSecondVal)
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
                                @if($avoidance == $shadowFirstVal)
                                @php 
                                $avoidant_class = "highlighted-purple-big green-normal";
                                $avoidant_img = "/relationship_wheel/freedom.png";
                                @endphp
                                @elseif($avoidance == $shadowSecondVal)
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
                                @if($collapse == $shadowFirstVal)
                                @php 
                                $collapse_class = "highlighted-purple-big blue-color";
                                $collapse_img = "/relationship_wheel/harmony.png";
                                @endphp
                                @elseif($collapse == $shadowSecondVal)
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
                                        <figcaption><span><strong>Collapse</strong></span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                @if($addiction == $shadowFirstVal)
                                @php 
                                $addiction_class = "highlighted-purple-big red-normal";
                                $addiction_img = "/relationship_wheel/passion.png";
                                @endphp
                                @elseif($addiction == $shadowSecondVal)
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
                                @if($dependence == $shadowFirstVal)
                                @php 
                                $dependence_class = "highlighted-purple-big red-normal";
                                $dependence_img = "/relationship_wheel/partnership.png";
                                @endphp
                                @elseif($dependence == $shadowSecondVal)
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
                                @if($control == $shadowFirstVal)
                                @php 
                                $control_class = "highlighted-purple-big blue-color";
                                $control_img = "/relationship_wheel/truth.png";
                                @endphp
                                @elseif($control == $shadowSecondVal)
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
                                @if($anxious == $shadowFirstVal)
                                @php 
                                $anxious_class = "highlighted-purple-big green-normal";
                                $anxious_img = "/relationship_wheel/devotion.png";
                                @endphp
                                @elseif($anxious == $shadowSecondVal)
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
                                @if($defense == $shadowFirstVal)
                                @php 
                                $defense_class = "highlighted-purple-big purple-normal";
                                $defense_img = "/relationship_wheel/appreciation.png";
                                @endphp
                                @elseif($defense == $shadowSecondVal)
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
                </div>
                <div class="row column-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>SHADOW PATTERNS</h5>
                            </div>
                            <div class="card-body">
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

                                        @elseif($remedy=="Addiction" || $remedy=="Co-Dependence")
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

                                        @elseif($remedy1=="Addiction" || $remedy1=="Co-Dependence")
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>SHADOW REMEDIES</h5>
                            </div>
                            <div class="card-body">
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

                                        @elseif($secendory_shadow['first']->relationship_gift=="Partnership" || $secendory_shadow['first']->relationship_gift=="Partnership")
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

                                        @elseif($secendory_shadow['second']->relationship_gift=="Partnership" || $secendory_shadow['second']->relationship_gift=="Partnership")
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
                <div class="row column-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>TENDENCIES</h5>
                            </div>
                            <div class="card-body">
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>SENSITIVITIES</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tr>
                                        @if($complaint>$defense)
                                        <td><strong class="color_purple">Complaint</strong></td>
                                        @else
                                        <td>Complaint</td>
                                        @endif
                                        <td>
                                            <div class="dot-progress">
                                                <span class="background_purple" style="width: {{$per_shadow['defense_complaint']}}%"></span>
                                            </div>
                                        </td>
                                        @if($complaint<$defense)
                                        <td><strong class="color_purple">Defense</strong></td>
                                        @else
                                        <td>Defense</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if($control>$collapse)
                                        <td><strong class="color_blue">Control</strong></td>
                                        @else
                                        <td>Control</td>
                                        @endif
                                        <td>
                                            <div class="dot-progress">
                                                <span class="background_blue" style="width: {{$per_shadow['control_collapse']}}%"></span>
                                            </div>
                                        </td>
                                        @if($control<$collapse)
                                        <td><strong class="color_blue">Collapse</strong></td>
                                        @else
                                        <td>Collapse</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if($avoidance>$anxious)
                                        <td><strong class="color_green">Avoidant</strong></td>
                                        @else
                                        <td>Avoidant</td>
                                        @endif
                                        <td>
                                            <div class="dot-progress">
                                                <span class="background_green" style="width: {{$per_shadow['avoidance_anxious']}}%"></span>
                                            </div>
                                        </td>
                                        @if($avoidance<$anxious)
                                        <td><strong class="color_green">Anxious</strong></td>
                                        @else
                                        <td>Anxious</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @if($addiction>$dependence)
                                        <td><strong class="color_primary">Addiction</strong></td>
                                        @else
                                        <td>Addiction</td>
                                        @endif
                                        <td>
                                            <div class="dot-progress">
                                                <span class="background_primary" style="width: {{$per_shadow['addiction_dependence']}}%"></span>
                                            </div>
                                        </td>
                                        @if($addiction<$dependence)
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
        </div>
    </div>
    <!-- Page 4 | END -->

    <!-- Page 5 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love PDF Banner - Introduction.jpg')}}');">
                <h2 class="mb-0 color_white">Introduction</h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h4 class="color_black font_text">
                        <strong><em>Congratulations!</em></strong>
                    </h4>
                    <p>You’ve taken the next step in a journey of discovery for the purpose of creating an extraordinary love story for yourself. We believe that an evolving love story is a rich and fulfilling one and that the key to evolving the way we love one another begins with an honest and rigorous self-exploration that has us both appreciating more fully our relational relationship gifs while also being willing to continue to become better versions of ourselves.</p>
                    <p>You can use this profile to look at the way you relate to your partner with fresh eyes. This profile will highlight some of the gifts you bring to your relationships and how those gifts are the very ingredients that can help relationships thrive. Understanding these gifts can help you bring them even more fully into your relationships.</p>
                    <p>You can use this profile to shed light on the unhealthy patterns that you tend to get caught in from time to time and how those very patterns might be polarizing your partner in predictable ways which often create the kinds of interactions that create conflict and strife in our relationships.</p>
                    <p>You can also use this profile with two or more people who take it together (your romantic partner, your business partner, your family members, and friends) to better understand each other and all the relational dynamics that you might predictable get caught in along with what you can do to exit those patterns so that you all know how best to offer love, support, and deeper understanding.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 5 | END -->

    <!-- Page 6 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love PDF Banner - Ring Of Resolution.jpg')}}');">
                <h2 class="mb-0 color_white">THE RING OF RESOLUTION</h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h4 class="color_black font_text">
                        <strong>What are we really fighting about?</strong>
                    </h4>
                    <p>People in loving relationships can find ways of fighting about the least consequential things. There are fights about how the dishes should get put away, who’s the better driver, and how much you are spending. It’s common knowledge that the source of conflict in love relationships is rarely the “surface issue,” but what are we really fighting about?</p>
                    <p>After studying thousands of relationships we discovered that, at the deepest level, there are only a finite number of fights we are having. Even though we are each complex and unique, the underlying dynamics that tend to keep us locked in conflict with one another can be categorized into 4 toxic cycles.</p>
                    <p>We call these conflicts ‘<strong>Toxic Cycles</strong>’ because when each partner’s behavior is in one of these positions, their partner tends to polarize into a predictable and directly oppositional position, unconsciously inviting their partner to continue the cycle rather than resolve it. Just like positively and negatively charged magnets, the presence of a strong charge on one side will attract and amplify a strong charge on the opposite side.</p>
                    <p>We’ve identified the 4 Toxic Cycles that are at the heart of nearly every conflict:</p>
                    <figure class="mt-2 mb-2">
                        <img src="{{ asset('images/Evolving Love Ring of Resolution - 4 Toxic Cycles.png')}}" alt="">
                    </figure>
                    <ul>
                        <li>The toxic cycle of Complaint and Defense</li>
                        <li>The toxic cycle of the Anxious and the Avoidant</li>
                        <li>The toxic cycle of Control and Collapse</li>
                        <li>The toxic cycle of Addiction and Codependency</li>
                    </ul>

                    <h4 class="color_black font_text">
                        <strong>Remedies & Gifts</strong>
                    </h4>
                    <p>We discovered that the underlying motivation driving each partner’s behavior in the toxic cycle also contains the key to permanently resolving the conflict. Rather than the pattern being a result of a character flaw or incompatibility, we found that each partner caught in the cycle was standing for an important value, relationship gift, that is actually necessary for an extraordinary love relationship to flourish.</p>
                    <figure class="float-end background_light_grey" style="max-width: 230px;">
                        <img src="{{ asset('images/Evolving Love Ring of Resolution - Remedy Chart Vertical.png')}}" class="w-100" alt="">
                    </figure>
                    <p class="mb-1">Behind every <strong>Complaint</strong> is our value of <strong>Possibility</strong>…</p>
                    <p>Believing in a better vision for the future.</p>
                    <p class="mb-1">Behind every <strong>Defense</strong> is our value of <strong>Appreciation</strong>…</p>
                    <p>Seeing the perfection of the present moment.</p>
                    <p class="mb-1">Behind our pattern of <strong>Control</strong> is our value of <strong>Truth</strong>…</p>
                    <p>Seeking candor, clarity &amp; integrity in our interactions</p>
                    <p class="mb-1">Behind our pattern of <strong>Collapse</strong> is our value of <strong>Harmony</strong>…</p>
                    <p>Attuning with empathy and compassion</p>
                    <p class="mb-1">Behind our <strong>Anxious</strong> behavior is our value of <strong>Devotion</strong>…</p>
                    <p>Being fully committed and available for connection</p>
                    <p class="mb-1">Behind our <strong>Avoidant</strong> behavior is our value of <strong>Freedom</strong>…</p>
                    <p>Being sovereign &amp; authentically self expressed</p>
                    <p class="mb-1">Behind <strong>Addiction</strong> is our value of <strong>Passion</strong>…</p>
                    <p>Embodying our desire to joyfully keep the spark alive</p>
                    <p class="mb-1">Behind <strong>Codependency</strong> is our value of <strong>Partnership</strong>…</p>
                    <p>Relating with respect &amp; collaborating to create a win-win</p>

                    <p>In our <a href="#">online courses</a>, <a href="#">workshops</a>, <a href="#">retreats</a>, and <a href="#">1:1 Sessions</a>, we’ve seen these patterns play out again and again, and we’ve learned to recognize and understand how each person in the partnership plays a role in continuing and repeating the cycle.</p>
                    <p>A relationship that has sufficient possibility, appreciation, freedom, devotion, truth, harmony, passion, and partnership will be an Evolving Love relationship that continues to thrive. The way to permanently resolve a Toxic Cycle is to make sure that both relationship gifts are expressed fully for both partners.</p>
                    <p>If you find yourself on one side or the other of a toxic cycle, then usually the path towards resolution for you will be to invest more in the opposite relationship gift. For example…</p>
                    <p>If your partner feels you are being superior or critical - bring Appreciation to end the cycle of complaint-defense.</p>
                    <p>If your partner feels you are too avoidant, they may be asking for you to embody more devotion to end the anxious-avoidant cycle.</p>
                    <p>If your partner feels you are too rigid or controlling, they may be asking for you to value more harmony to help end the control-collapse cycle…</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 6 | END -->

    <!-- Page 7 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Profile Banner - Visionary Zen Master Blue Purple.jpg')}}');">
                <h2 class="mb-0 color_white">HOW TO READ YOUR RESULTS</h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h4 class="color_black font_text">
                        <strong><em>You are not made of stone</em></strong>
                    </h4>
                    <p>The results you receive are not intended to be used as a ‘Typing’ system. Many typing systems describe our identity in a more fixed and one dimensional way. It may be tempting to think of the results in this report as meaning something about you that is unchangeable.</p>
                    <p>We believe that the best way to enter into an evolutionary partnership is to realize that our identities and specifically our character strategies are actually much more moldable, flexible and able to evolve than it may appear. We also acknowledge that for many of us these strategies have been in place for decades and so some of the cycles and patterns we find ourselves in can feel pretty rutted and can seem difficult to change. However, fundamentally we believe that you can be any way that you choose to be.</p>
                    <p>This assessment is meant to give you a window into how you predominantly are showing up in your relationships right now. It is a current snapshot of the most prevalent relational dynamics that are present. If you had taken this assessment years ago you might score differently AND if you take this assessment again in the future, again your results might change. Different relationships can bring forth different sets of relational dynamics.</p>
                    <p>We hope this assessment serves less as a fixed description and more like a map where you can find your way to developing all 8 of these values and learn to overcome all 8 of these shadow patterns.</p>

                    <h4 class="color_black font_text">
                        <strong><em>Warning: This information will point at your shadow.</em></strong>
                    </h4>
                    <figure class="float-start me-2" style="max-width: 150px;">
                        <img src="{{ asset('images/Evolving Love How To Read Your Results - Warning Facing Shadow Couple.jpg')}}" alt="" class="w-100">
                    </figure>
                    <p>While there’s a lot of great news in this report that your ego will enjoy, this assessment would be less useful if it didn’t also highlight some of the shadow elements that are at the root of what might be creating conflict and strive in your relationships. We often call the patterned ways we respond that can be repeated enough that they form aspects of our personality a <strong>‘Character Strategy’</strong>.</p>
                    <p>These character strategies describe how the body, beliefs, and behaviors adapt over time to the positive and negative forces in the environment to evolve and protect us.</p>
                    <p>These character strategies can be beautiful and virtuous and also unhealthy and full of shadow. We believe it is a deeply worthwhile process to uncover these character strategies and to see them with clear, honest, and understanding eyes.</p>
                    <p>Our goal in creating this body of work is to raise our collective ‘Relational Quotient’ (RQ) so that we are all more able to create and maintain conscious healthy relationships ongoing.</p>

                    <h4 class="color_black font_text">
                        <strong><em>Our intentions for creating this assessment</em></strong>
                    </h4>
                    <p>Our intention in creating this assessment is to help you pave the way to have more of these 3 experiences in your relationships. Our hope is…</p>
                    <ol>
                        <li>That you might have a new understanding of an aspect of yourself or an aspect of your partner and that that new understanding might allow you to rewrite the story on some of the automatic ways that you interact with the people that you love, and</li>
                        <li>You begin to recognize something that you haven't been able to appreciate about yourself, your partner or the people that you interact with most. We hope you’ll see something you haven't been able to appreciate in a new light and with that elevated appreciation, it might change your perspective of what's possible in your relationships.</li>
                        <li>You have more access to being who you want in all your relationships and a roadmap that helps you evolve and upgrade your relational quotient (RQ).</li>
                    </ol>
                    <p>The percentage associated with each relationship gift and shadow in your results reflects how much attention and focus you seem to have on that area. You can then use the Ring Of Resolution to see what kinds of gifts and conflicts might arise from your focus, and how to respond in a way that will lead you towards a fulfilling and ever evolving love relationship.</p>
                    <p>There could be many reasons for why you focus on one particular relationship gift over another. Most commonly it indicates that you haven’t chosen to develop that aspect of yourself compared with others. It could also mean that you are focused intently on one area because your natural gifts lie elsewhere and don’t need as much of your attention. It could also mean that your partner has a particular sensitivity and you are focused on that area because you know it is important to your partner.</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/Evolving Love Promo Background - Visionary Zen Master Blue Purple.jpg')}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 7 | END -->

    <!-- Page 8 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>PRIMARY GIFTS</strong></h5>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic animated">
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
                                <div class="second-row">
                                    <figure class="{{$freedom_class}}">
                                        <img src="{{ asset('images'.$freedom_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption>
                                            <span>
                                                <strong>Freedom</strong> <br>Avoidant
                                            </span>
                                        </figcaption>
                                    </figure>
                                    <figure class="{{$harmony_class}}">
                                        <img src="{{ asset('images'.$harmony_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                        <figcaption>
                                            <span>
                                                <strong>Harmony</strong> <br>Collapse
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                    <figure class="{{$passion_class}}">
                                        <img src="{{ asset('images'.$passion_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption>
                                            <span>
                                                <strong>Passion</strong> <br>Addiction
                                            </span>
                                        </figcaption>
                                    </figure>
                                    <figure class="{{$partnership_class}}">
                                        <img src="{{ asset('images'.$partnership_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption>
                                            <span>
                                                <strong>Partnership</strong> <br>Co-Dependence
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                    <figure class="{{$truth_class}}">
                                        <img src="{{ asset('images'.$truth_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption>
                                            <span>
                                                <strong>Truth</strong> <br>Control
                                            </span>
                                        </figcaption>
                                    </figure>
                                
                                    <figure class="{{$devotion_class}}">
                                        <img src="{{ asset('images'.$devotion_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption>
                                            <span>
                                                <strong>Devotion</strong> <br>Anxious
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
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
                    <h6 class="color_black"><strong>Primary Gift</strong></h6>
                    <p>{{$relationship_lookup_text['primary_gifts']->primary_gift}}</p>

                    <h6 class="color_black"><strong>Secondary Gift</strong></h6>
                    <p>{{$relationship_lookup_text['secondary_gifts']->secondary_gift}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 8 | END -->

    <!-- Page 9 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>RELATIONSHIP QUALITIES</strong></h5>
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
                        $q_class ="color_green";
                        @endphp
                        @elseif($harmony == $firstLargestVal)
                        @php $primary="HARMONY"; 
                        $q_class ="color_green";
                        @endphp
                        @elseif($freedom == $firstLargestVal)
                        @php $primary="FREEDOM"; 
                        $q_class ="color_blue";
                        @endphp
                        @elseif($devotion == $firstLargestVal)
                        @php $primary="DEVOTION";
                        $q_class ="color_blue";
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
                            <span class="color_black">PRIMARY RELATIONSHIP QUALITIES</span>
                            <br>
                            <strong class="{{$q_class}}" style="text-transform: uppercase;">{{$primary}}</strong>
                        </p>
                        <div class="combine-figure">
                            <figure><img src="{{ asset('images/primary_quality_images/'.$relationship_lookup_text['primary_image'])}}" alt=""></figure>
                            <figure><img src="{{ asset('images/secondary_images/'.$relationship_lookup_text['secondary_image'])}}" alt=""></figure>
                        </div>
                        <p class="font_title mt-15">
                        @if($possibility == $secondLargestVal)
                        @php $secondary="POSSIBILITY"; 
                        $q_class1 ="color_green";
                        @endphp
                        @elseif($appreciation == $secondLargestVal)
                        @php $secondary="APPRECIATION"; 
                        $q_class1 ="color_green";
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
                            <span class="color_black">SECONDARY RELATIONSHIP QUALITIES</span>
                        </p>
                    </div>
                    <h6 class="color_black"><strong>Primary Qualities</strong></h6>
                    <p>{{$relationship_lookup_text['primary_qualities']->primary_qualities}}</p>

                    <h6 class="color_black"><strong>Secondary Qualities</strong></h6>
                    <p>{{$relationship_lookup_text['secondary_qualities']->secondary_qualities}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 9 | END -->

    <!-- Page 10 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>THEMES</strong></h5>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic animated">
                                <div class="first-row">
                                    <figure class="{{$possibility_class}}">
                                        <img src="{{ asset('images'.$possibility_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                        <figcaption><span>Growth & <br>Capability</span></figcaption>
                                    </figure>
                                </div>
                                <div class="second-row">
                                    <figure class="{{$freedom_class}}">
                                        <img src="{{ asset('images'.$freedom_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption><span>Soverignty & <br>Self Expression</span></figcaption>
                                    </figure>
                                    <figure class="{{$harmony_class}}">
                                        <img src="{{ asset('images'.$harmony_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                        <figcaption><span>Curiosity & <br>Compassion</span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                    <figure class="{{$passion_class}}"> 
                                        <img src="{{ asset('images'.$passion_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption><span>Creativity & <br>Aliveness</span></figcaption>
                                    </figure>
                                    <figure class="{{$partnership_class}}">
                                        <img src="{{ asset('images'.$partnership_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption><span>Justice & <br>Balance</span></figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                    <figure class="{{$truth_class}}">
                                        <img src="{{ asset('images'.$truth_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption><span>Truth & <br>Integrity</span></figcaption>
                                    </figure>
                                    <figure class="{{$devotion_class}}">
                                        <img src="{{ asset('images'.$devotion_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption><span>Communion & <br>Commitment</span></figcaption>
                                    </figure>
                                </div>
                                <div class="last-row">
                                    <figure class="{{$appreciation_class}}">
                                        <img src="{{ asset('images'.$appreciation_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                        <figcaption><span>Presence & <br>Acceptance</span></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>Primary Theme</strong></h6>
                    <p>{{$relationship_lookup_text['primary_themes']->primary_theme}}</p>

                    <h6 class="color_black"><strong>Secondary Theme</strong></h6>
                    <p>{{$relationship_lookup_text['secondary_themes']->secondary_theme}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 10 | END -->

    <!-- Page 11 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>RELATIONSHIP SKILLS</strong></h5>
                    </div>
                    <h6 class="color_black"><strong>Relational Skills That Come Naturally</strong></h6>
                    <p>{{$relationship_lookup_text['natural_skills']->relationship_skills_natural}}</p>

                    <h6 class="color_black"><strong>Relational Skills To Develop</strong></h6>
                    <p>{{$relationship_lookup_text['develop_skills']->relationship_skills_develop}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/Evolving Love Promo Background - Visionary Zen Master Blue Purple.jpg')}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 11 | END -->

    <!-- Page 12 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>REFERENCE (Internal vs External)</strong></h5>
                        <div class="card maxWidth_300">
                            <div class="card-header">
                                <h5>REFERENCE</h5>
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
                    <h6 class="color_black"><strong>Reference:</strong> {{$refrence}}</h6>
                    <h6 class="color_black"><strong>About [{{$refrence}}] Reference</strong></h6>
                    <p>{{$content->about}}</p>

                    <h6 class="color_black"><strong>Do You Focus On Similarities Or Differences?</strong></h6>
                    <p>{{$content->focus}}</p>

                    <h6 class="color_black"><strong>Areas of Growth</strong></h6>
                    <p>{{$content->growth}}</p>
                </div>

                <div class="promo-section v2" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                    <div class="row column-2 vertical-middle mt-0">
                    	<div class="col">
                            <div class="left">
                                <h4 class="color_white mb-2">
                                    <strong>Permanent Breakthrough:</strong>
                                    <br>
                                    Evolving Love Immersion Retreat
                                </h4>
                                <a href="javascript:void(0)" class="btn btn-large btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    	<div class="col">
                            <figure class="ms-auto" style="max-width: 180px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 12 | END -->

    <!-- Page 13 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>TENDENCIES</strong></h5>
                        <div class="card maxWidth_300">
                            <div class="card-header">
                                <h5>TENDENCIES</h5>
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
                                                <span class="background_purple" style="width: {{$tendencies['possibility_app']}}%"></span>
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
                                                <span class="background_blue" style="width: {{$tendencies['freedom_devotion']}}%"></span>
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
                                                <span class="background_green" style="width: {{$tendencies['truth_harmony']}}%"></span>
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
                                                <span class="background_primary" style="width: {{$tendencies['passion_part']}}%"></span>
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
                    <h6 class="color_black"><strong>Emphasizing [{{$tend_p1}}] Over [{{$tend_p2}}]</strong></h6>
                    <p>{{$emphasizing1->emphasizing1}}</p>

                    <h6 class="color_black"><strong>Emphasizing [{{$tend_d1}}] Over [{{$tend_d2}}]</strong></h6>
                    <p>{{$emphasizing2->emphasizing2}}</p>

                    <h6 class="color_black"><strong>Emphasizing [{{$tend_t1}}] Over [{{$tend_t2}}]</strong></h6>
                    <p>{{$emphasizing3->emphasizing3}}</p>

                    <h6 class="color_black"><strong>Emphasizing [{{$tend_pp1}}] Over [{{$tend_pp2}}]</strong></h6>
                    <p>{{$emphasizing4->emphasizing4}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/Evolving Love Promo Background - Visionary Zen Master Blue Purple.jpg')}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 13 | END -->

    <!-- Page 14 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>ENERGETIC PROFILE</strong></h5>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic animated">
                                <div class="first-row">
                                @if($possibility == $firstLargestVal)
                                @php 
                                $possibility_class1 = "highlighted-purple-big purple-normal";
                                $possibility_img1 = "/relationship_wheel/possibility.png";
                                @endphp
                                @else
                                @php  $possibility_class1 = ""; 
                                $possibility_img1 = "/Evolving Love Energy Icon - Possibility Complaint (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$possibility_class1}}">
                                        <img src="{{ asset('images'.$possibility_img1)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                        <figcaption><span>Up & Out</span></figcaption>
                                    </figure>
                                </div>
                                <div class="second-row">
                                @if($freedom == $firstLargestVal)
                                @php 
                                $freedom_class1 = "highlighted-purple-big green-normal";
                                $freedom_img1 = "/relationship_wheel/freedom.png";
                                @endphp
                                @else
                                @php  $freedom_class1 = ""; 
                                $freedom_img1 = "/Evolving Love Energy Icon - Freedom Avoidant (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$freedom_class1}}">
                                        <img src="{{ asset('images'.$freedom_img1)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption><span>Away & <br>Leaving</span></figcaption>
                                    </figure>
                                @if($harmony == $firstLargestVal)
                                @php 
                                $harmony_class1 = "highlighted-purple-big blue-color";
                                $harmony_img1 = "/relationship_wheel/harmony.png";
                                @endphp
                                @else
                                @php  $harmony_class1 = "";
                                $harmony_img1 = "/Evolving Love Energy Icon - Harmony Collapse (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$harmony_class1}}">
                                        <img src="{{ asset('images'.$harmony_img1)}}" alt="Evolving Love Energy Icon - Harmony Collapse (Grey Scale)">
                                        <figcaption><span>Out & Down</span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                @if($passion == $firstLargestVal)
                                @php 
                                $passion_class1 = "highlighted-purple-big red-normal";
                                $passion_img1 = "/relationship_wheel/passion.png";
                                @endphp
                                @else
                                @php  $passion_class1 = "";
                                $passion_img1 = "/Evolving Love Energy Icon - Passion Addiction (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$passion_class1}}">
                                        <img src="{{ asset('images'.$passion_img1)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption><span>Disconnected & <br>Flowing</span></figcaption>
                                    </figure>
                                @if($partnership == $firstLargestVal)
                                @php 
                                $partnership_class1 = "highlighted-purple-big red-normal";
                                $partnership_img1 = "/relationship_wheel/partnership.png";
                                @endphp
                                @else
                                @php  $partnership_class1 = ""; 
                                $partnership_img1 = "/Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$partnership_class1}}">
                                        <img src="{{ asset('images'.$partnership_img1)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption><span>Connected & <br>Structured</span></figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                @if($truth == $firstLargestVal)
                                @php 
                                $truth_class1 = "highlighted-purple-big blue-color";
                                $truth_img1 = "/relationship_wheel/truth.png";
                                @endphp
                                @else
                                @php  $truth_class1 = ""; 
                                $truth_img1 = "/Evolving Love Energy Icon - Truth Control (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$truth_class1}}">
                                        <img src="{{ asset('images'.$truth_img1)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption><span>In & <br>Constricted</span></figcaption>
                                    </figure>
                                @if($devotion == $firstLargestVal)
                                @php 
                                $devotion_class1 = "highlighted-purple-big green-normal";
                                $devotion_img1 = "/relationship_wheel/devotion.png";
                                @endphp
                                @else
                                @php  $devotion_class1 = ""; 
                                $devotion_img1 = "/Evolving Love Energy Icon - Devotion Anxious (Grey Scale).png";
                                @endphp
                                @endif
                                    <figure class="{{$devotion_class1}}">
                                        <img src="{{ asset('images'.$devotion_img1)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption><span>Towords<br> & Merging</span></figcaption>
                                    </figure>
                                </div>
                                <div class="last-row">
                                @if($appreciation == $firstLargestVal)
                                @php 
                                $appreciation_class1 = "highlighted-purple-big purple-normal";
                                $appreciation_img1 = "/relationship_wheel/appreciation.png";
                                @endphp
                                @else
                                @php  $appreciation_img1 = ""; 
                                $appreciation_class1 ="";
                                $appreciation_img1 = "/relationship_wheel/devotion.png";
                                @endphp
                                @endif
                                	<figure class="{{$appreciation_class1}}">
                                        <img src="{{ asset('images'.$appreciation_img1)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                        <figcaption><span><strong>In & Down</strong></span></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>What Is An Energetic Profile?</strong></h6>
                    <p>{{$relationship_lookup_text['energetic']->energetic_profile}}</p>
                    
                    <h6 class="color_black"><strong>Energetic Gifts</strong></h6>
                    <p>{{$relationship_lookup_text['energetic']->energetic_gifts}}</p>

                    <h6 class="color_black"><strong>Energetic Shadow</strong></h6>
                    <p>{{$relationship_lookup_text['energetic']->energetic_shadow}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 14 | END -->

    <!-- Page 15 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>COMMUNICATION PROFILE</strong></h5>
                        <div class="maxWidth_350">
	                        <table class="cross-table">
                                <tr>
                                    <th></th>
                                    <th>REACTIVE</th>
                                    <th>REPRESSIVE</th>
                                </tr>
                                <tr>
                                    <th><span>EXPICIT</span></th>
                                    <td colspan="2" rowspan="2">
                                    	<div class="figure">
	                                        <figure>
	                                            <img class="w-100" src="{{ asset('images/communication_images/'.$relationship_lookup_text['profile_image'])}}" alt="">
	                                            <img class="circle-icon" src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="">
	                                        </figure>
	                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><span>IMPLICIT</span></th>
                                </tr>
	                        </table>
	                    </div>
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
                    <h6 class="color_black"><strong>Emphasizing [{{$COMM1a}}] over [{{$COMM1b}}]</strong></h6>
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
                    <h6 class="color_black"><strong>Emphasizing [{{$COMM2a}}] over [{{$COMM2b}}]</strong></h6>
                    <p>{{$emp2->emphasizing}}</p>
                    
                   
                    <h6 class="color_black"><strong>Communication Style</strong></h6>
                    <p>{{$relationship_lookup_text['primary_communication']->primary_communication}}</p>
                    <p>{{$relationship_lookup_text['secondary_communication']->secondary_communication}}</p>

                    <h6 class="color_black"><strong>Communication Shadow</strong></h6>
                    <p>{{$relationship_lookup_text['primary_shadow_remedy']->primary_shadow}}</p>
                    <p>{{$relationship_lookup_text['secondary_shadow_remedy']->secondary_shadow}}</p>


                    <h6 class="color_black"><strong>Communication Remedy</strong></h6>
                    <p>{{$relationship_lookup_text['primary_shadow_remedy']->primary_remedy}}</p>
                    <p>{{$relationship_lookup_text['secondary_shadow_remedy']->secondary_remedy}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 15 | END -->

    <!-- Page 16 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>DECISION MAKING PROFILE</strong></h5>
                        <div class="maxWidth_350">
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
	                                    	<div class="figure">
		                                        <figure>
		                                            <img class="w-100" src="{{ asset('images/communication_images/'.$relationship_lookup_text['profile_image'])}}" alt="">
		                                            <img class="circle-icon" src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="">
		                                        </figure>
		                                    </div>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <th><span>Considered</span></th>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
                    </div>
                    @if($emp3->type=="impulsive")
                    @php
                    $DIS1 = "Instinctive";
                    $DIS2 = "Considered";
                    @endphp
                    @else
                    @php
                    $DIS1 = "Considered";
                    $DIS2 = "Instinctive";
                    @endphp
                    @endif
                    <h6 class="color_black"><strong>Emphasizing [{{$DIS1}}] over [{{$DIS2}}]</strong></h6>
                    <p>{{$emp3->emphasizing}}</p>

                    @if($emp4->type=="directive")
                    @php
                    $DIS1A = "Directive";
                    $DIS1B = "Collaborative";
                    @endphp
                    @else
                    @php
                    $DIS1A = "Directive";
                    $DIS1B = "Collaborative";
                    @endphp
                    @endif
                    <h6 class="color_black"><strong>Emphasizing [{{$DIS1A}}] over [{{$DIS1B}}]</strong></h6>
                    <p>{{$emp4->emphasizing}}</p>

                    <h6 class="color_black"><strong>Decision Making Style</strong></h6>
                    <p>{{$relationship_lookup_text['primary_decision']->primary_decision}}</p>
                    <p>{{$relationship_lookup_text['secondary_decision']->secondary_decision}}</p>

                    <h6 class="color_black"><strong>Decision Making Shadow</strong></h6>
                    <p>{{$relationship_lookup_text['primary_decision']->primary_decision_shadow}}</p>
                    <p>{{$relationship_lookup_text['secondary_decision']->secondary_decision_shadow}}</p>

                    <h6 class="color_black"><strong>Decision Making Remedy</strong></h6>
                    <p>{{$relationship_lookup_text['primary_decision']->primary_decision_remedy}}</p>
                    <p>{{$relationship_lookup_text['secondary_decision']->secondary_decision_remedy}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 16 | END -->

    <!-- Page 17 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>PARENTING PROFILE</strong></h5>
                        <div class="maxWidth_350">
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
	                                    	<div class="figure">
		                                        <figure>
		                                            <img class="w-100" src="{{ asset('images/communication_images/'.$relationship_lookup_text['profile_image'])}}" alt="">
		                                            <img class="circle-icon" src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="">
		                                        </figure>
		                                    </div>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <th><span>ACHIEVEMENT</span></th>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
                    </div>
                    @if($emp5->type=="achievement")
                    @php
                    $PARENT1a = "Achievement";
                    $PARENT1b = "Acceptance";
                    @endphp
                    @else
                    @php
                    $PARENT1a = "Acceptance";
                    $PARENT1b = "Achievement";
                    @endphp
                    @endif
                    <h6 class="color_black"><strong>Emphasizing [{{$PARENT1a}}] over [{{$PARENT1b}}]</strong></h6>
                    <p>{{$emp5->emphasizing}}</p>

                    @if($emp6->type=="autonomous")
                    @php
                    $PARENT2a = "Autonomous";
                    $PARENT2b = "Engaged";
                    @endphp
                    @else
                    @php
                    $PARENT2a = "Repressive";
                    $PARENT2b = "Engaged";
                    @endphp
                    @endif
                    <h6 class="color_black"><strong>Emphasizing [{{$PARENT2a}}] over [{{$PARENT2b}}]</strong></h6>
                    <p>{{$emp6->emphasizing}}</p>

                    <h6 class="color_black"><strong>Parenting Style</strong></h6>
                    <p>{{$relationship_lookup_text['primary_parenting']->primary_parenting}}</p>
                    <p>{{$relationship_lookup_text['secondary_parenting']->secondary_parenting}}</p>

                    <h6 class="color_black"><strong>Parenting Shadow</strong></h6>
                    <p>{{$relationship_lookup_text['primary_parenting']->primary_parenting_shadow}}</p>
                    <p>{{$relationship_lookup_text['secondary_parenting']->secondary_parenting_shadow}}</p>

                    <h6 class="color_black"><strong>Parenting Remedy</strong></h6>
                    <p>{{$relationship_lookup_text['primary_parenting']->primary_parenting_remedy}}</p>
                    <p>{{$relationship_lookup_text['secondary_parenting']->secondary_parenting_remedy}}</p>
                    
                    <div class="promo-section" style="background-image: url('{{ asset('images/Evolving Love Promo Background - Visionary Zen Master Blue Purple.jpg')}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 17 | END -->

    <!-- Page 18 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP ARCHETYPE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>EROTIC PROFILE</strong></h5>
                        <div class="card maxWidth_300">
                            <div class="card-header">
                                <p>EROTIC PROFILE</p>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
                                        <tr>
                                            @if($erotic_profile['initiate']>$erotic_profile['reciprocating'])
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
                                                    <span class="background_primary" style="width: {{$erotic_profile['initiate_re']}}%"></span>
                                                </div>
                                            </td>
                                            @if($erotic_profile['initiate']<$erotic_profile['reciprocating'])
                                            <td><strong class="color_primary">Reciprocating</strong></td>
                                            @else
                                            <td><small>Reciprocating</small></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if($erotic_profile['planning']>$erotic_profile['spontaneity'])
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
                                                    <span class="background_primary" style="width: {{$erotic_profile['plannning_spontaneity']}}%"></span>
                                                </div>
                                            </td>
                                            @if($erotic_profile['planning']<$erotic_profile['spontaneity'])
                                            <td><strong class="color_primary">Spontaneity</strong></td>
                                            @else
                                            <td><small>Spontaneity</small></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            
                                            @if($erotic_profile['variety']>$erotic_profile['depth'])
                                            @php 
                                            $er5 = "Variety";
                                            $er6 = "Depth";
                                            @endphp
                                            <td><strong class="color_primary">Variety</strong></td>
                                            @else
                                            <td><small>Variety</small></td>
                                            @php 
                                            $er5 = "Depth";
                                            $er5 = "Variety";
                                            @endphp
                                            @endif
                                            <td>
                                                <div class="dot-progress">
                                                    <span class="background_primary" style="width: {{$erotic_profile['variety_depth']}}%"></span>
                                                </div>
                                            </td>
                                            @if($erotic_profile['variety']<$erotic_profile['depth'])
                                            <td><strong class="color_primary">Depth</strong></td>
                                            @else
                                            <td><small>Depth</small></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>Emphasizing [{{$er1}}] over [{{$er2}}]</strong></h6>
                    <p>{{$emp7->emphasizing}}</p>

                    <h6 class="color_black"><strong>Emphasizing [{{$er3}}] over [{{$er4}}]</strong></h6>
                    <p>{{$emp8->emphasizing}}</p>

                    <h6 class="color_black"><strong>Emphasizing [{{$er5}}] over [{{$er6}}]</strong></h6>
                    <p>{{$emp9->emphasizing}}</p>

                    <h6 class="color_black"><strong>Erotic Style</strong></h6>
                    <p>{{$relationship_lookup_text['primary_erotic']->primary_erotic}}</p>
                    <p>{{$relationship_lookup_text['secondary_erotic']->secondary_erotic}}</p>

                    <h6 class="color_black"><strong>Erotic Shadow</strong></h6>
                    <p>{{$relationship_lookup_text['primary_erotic']->primary_erotic_shadow}}</p>
                    <p>{{$relationship_lookup_text['secondary_erotic']->secondary_erotic_shadow}}</p>

                    <h6 class="color_black"><strong>Erotic Remedy</strong></h6>
                    <p>{{$relationship_lookup_text['primary_erotic']->primary_erotic_remedy}}</p>
                    <p>{{$relationship_lookup_text['secondary_erotic']->secondary_erotic_remedy}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 18 | END -->

    <!-- Page 19 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/shadow_banners/'.$shadow_lookup_text['banners_image'])}}');">
                <h2 class="mb-0 color_white">SHADOW ARCHETYPE:<br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center mb-5">
                        <h5 class="color_black"><strong>SHADOW QUALITIES</strong></h5>
                        <p class="font_title">
                            <span class="color_black">PRIMARY SHADOW QUALITIES</span>
                            <br>
                            @if($shadow_lookup_text['primary']=="complaint" || $shadow_lookup_text['primary']=="defense")
                            @php 
                            $q_class="color_purple";
                            @endphp

                            @elseif($shadow_lookup_text['primary']=="avoidance" || $shadow_lookup_text['primary']=="anxious")
                            @php 
                            $q_class="color_green";
                            @endphp

                            @elseif($shadow_lookup_text['primary']=="control" || $shadow_lookup_text['primary']=="collapse")
                            @php 
                            $q_class="color_blue";
                            @endphp

                            @elseif($shadow_lookup_text['primary']=="addiction" || $shadow_lookup_text['primary']=="co_dependence")
                            @php 
                            $q_class="color_primary";
                            @endphp
                            @endif
                            <strong class="{{$q_class}}" style="text-transform: uppercase;">{{$shadow_lookup_text['primary']}}</strong>
                        </p>
                        <div class="combine-figure">
                            <figure><img src="{{ asset('images/primary_shadow/'.$shadow_lookup_text['primary_image'])}}" alt=""></figure>
                            <figure><img src="{{ asset('images/secondary_shadow_img/'.$shadow_lookup_text['secondary_image'])}}" alt=""></figure>
                        </div>
                        <p class="font_title mt-2">
                            @if($shadow_lookup_text['secondary']=="complaint" || $shadow_lookup_text['secondary']=="defense")
                            @php 
                            $q_class1="color_purple";
                            @endphp

                            @elseif($shadow_lookup_text['secondary']=="avoidance" || $shadow_lookup_text['secondary']=="anxious")
                            @php 
                            $q_class1="color_green";
                            @endphp

                            @elseif($shadow_lookup_text['secondary']=="control" || $shadow_lookup_text['secondary']=="collapse")
                            @php 
                            $q_class1="color_blue";
                            @endphp

                            @elseif($shadow_lookup_text['secondary']=="addiction" || $shadow_lookup_text['secondary']=="co_dependence")
                            @php 
                            $q_class1="color_primary";
                            @endphp

                            @endif
                            <strong class="{{$q_class1}}" style="text-transform: uppercase;">{{$shadow_lookup_text['secondary']}}</strong>
                            <br>
                            <span class="color_black">SECONDARY SHADOW QUALITIES:</span>
                        </p>
                    </div>
                    <h6 class="color_black"><strong>Primary Shadow Qualities</strong></h6>
                    <p>{{$shadow_lookup_text['primary_qualities']->primary_qualities}}</p>

                    <h6 class="color_black"><strong>Secondary Shadow Qualities</strong></h6>
                    <p>{{$shadow_lookup_text['secondary_qualities']->secondary_qualities}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 19 | END -->

    <!-- Page 20 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/shadow_banners/'.$shadow_lookup_text['banners_image'])}}');">
                <h2 class="mb-0 color_white">SHADOW ARCHETYPE:<br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center mb-5">
                        <h5 class="color_black"><strong>TOXIC CYCLE</strong></h5>
                    </div>
                    <div class="row column-2">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5>SHADOWS</h5>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                @if($shadow_remedy=="Complaint" || $shadow_remedy=="Defense")
                                                @php $t_class ="color_purple"; @endphp
                                                @elseif($shadow_remedy=="Avoidance" || $shadow_remedy=="Anxious")
                                                @php $t_class ="color_green"; @endphp
                                                @elseif($shadow_remedy=="Control" || $shadow_remedy=="Collapse")
                                                @php $t_class ="color_blue"; @endphp
                                                @elseif($shadow_remedy=="Addiction" || $shadow_remedy=="Co-dependence")
                                                @php $t_class ="color_primary"; @endphp
                                                @endif
                                                <td class="text-center size-big">1<sup>st</sup> <strong class="{{$t_class}}">{{$shadow_remedy}}</strong></td>
                                                @if($shadow_remedy1=="Complaint" || $shadow_remedy1=="Defense")
                                                @php $t_class1 ="color_purple"; @endphp
                                                @elseif($shadow_remedy1=="Avoidance" || $shadow_remedy1=="Anxious")
                                                @php $t_class1 ="color_green"; @endphp
                                                @elseif($shadow_remedy1=="Control" || $shadow_remedy1=="Collapse")
                                                @php $t_class1 ="color_blue"; @endphp
                                                @elseif($shadow_remedy1=="Addiction" || $shadow_remedy1=="Co-dependence")
                                                @php $t_class1 ="color_primary"; @endphp
                                                @endif  
                                                <td class="text-center size-big">2<sup>nd</sup> <strong class="{{$t_class1}}">{{$shadow_remedy1}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <figure class="shadow-result-img">
                                <img src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['primary_toxic_image'])}}" alt="Evolving Love Shadow Pattern & Remedy - Defense">
                            </figure>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5>SHADOW REMEDIES</h5>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                @if($secendory_shadow['first']->relationship_gift=="Appreciation" || $secendory_shadow['first']->relationship_gift=="Possibility")
                                                @php $s_class ="color_purple"; @endphp
                                                @elseif($secendory_shadow['first']->relationship_gift=="Devotion" || $secendory_shadow['first']->relationship_gift=="Freedom")
                                                @php $s_class ="color_green"; @endphp
                                                @elseif($secendory_shadow['first']->relationship_gift=="Harmony" || $secendory_shadow['first']->relationship_gift=="Truth")
                                                @php $s_class ="color_blue"; @endphp
                                                @elseif($secendory_shadow['first']->relationship_gift=="Partnership" || $secendory_shadow['first']->relationship_gift=="Passion")
                                                @php $s_class ="color_primary"; @endphp
                                                @endif
                                                <td class="text-center size-big">1<sup>st</sup> <strong class="{{$s_class}}">{{$secendory_shadow['first']->relationship_gift}}</strong></td>
                                                @if($secendory_shadow['second']->relationship_gift=="Appreciation" || $secendory_shadow['second']->relationship_gift=="Possibility")
                                                @php $s_class1 ="color_purple"; @endphp
                                                @elseif($secendory_shadow['second']->relationship_gift=="Devotion" || $secendory_shadow['second']->relationship_gift=="Freedom")
                                                @php $s_class1 ="color_green"; @endphp
                                                @elseif($secendory_shadow['second']->relationship_gift=="Harmony" || $secendory_shadow['second']->relationship_gift=="Truth")
                                                @php $s_class1 ="color_blue"; @endphp
                                                @elseif($secendory_shadow['second']->relationship_gift=="Partnership" || $secendory_shadow['second']->relationship_gift=="Passion")
                                                @php $s_class1 ="color_primary"; @endphp
                                                @endif
                                                <td class="text-center size-big">2<sup>nd</sup> <strong class="{{$s_class1}}">{{$secendory_shadow['second']->relationship_gift}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <figure class="shadow-result-img">
                                <img src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['secondary_toxic_image'])}}" alt="Evolving Love Shadow Pattern & Remedy - Collapse">
                            </figure>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>What Is A Toxic Cycle?</strong></h6>
                    <p>{{$shadow_lookup_text['toxic_content']->toxic_cycle}}</p>
                  
                    <h6 class="color_black"><strong>Toxic Cycle Remedy</strong></h6>
                    <p>{{$shadow_lookup_text['toxic_content']->primay_toxic_remedy}}</p>
                    <p>{{$shadow_lookup_text['secondary_content']->secondary_toxic_cyle}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 20 | END -->

    <!-- Page 21 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/shadow_banners/'.$shadow_lookup_text['banners_image'])}}');">
                <h2 class="mb-0 color_white">SHADOW ARCHETYPE:<br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center mb-5">
                        <h5 class="color_black"><strong>SENSITIVITIES</strong></h5>
                        <div class="card maxWidth_300">
                            <div class="card-header">
                                <h5>SENSITIVITIES</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
                                        <tr>
                                            @if($complaint>$defense)
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
                                                    <span class="background_purple" style="width: {{$shadow_per['defense_complaint']}}%"></span>
                                                </div>
                                            </td>
                                            @if($complaint<$defense)
                                            <td><strong class="color_purple">Defense</strong></td>
                                            @else
                                            <td><small>Defense</small></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if($control>$collapse)
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
                                                    <span class="background_blue" style="width: {{$shadow_per['control_collapse']}}%"></span>
                                                </div>
                                            </td>
                                            @if($control<$collapse)
                                            <td><strong class="color_blue">Collapse</strong></td>
                                            @else
                                            <td><small>Collapse</small></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if($avoidance>$anxious)
                                            @php 
                                            $sens_a1 = "Avoidance";
                                            $sens_a2 = "Anxious";
                                            @endphp
                                            <td><strong class="color_green">Avoidance</strong></td>
                                            @else
                                            @php 
                                            $sens_a1 = "Anxious";
                                            $sens_a1 = "Avoidance";
                                            @endphp
                                            <td><small>Avoidance</small></td>
                                            @endif
                                            <td>
                                                <div class="dot-progress">
                                                    <span class="background_green" style="width: {{$shadow_per['avoidance_anxious']}}%"></span>
                                                </div>
                                            </td>
                                            @if($avoidance<$anxious)
                                            <td><strong class="color_green">Anxious</strong></td>
                                            @else
                                            <td><small>Anxious</small></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if($addiction>$dependence)
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
                                                    <span class="background_primary" style="width: {{$shadow_per['addiction_dependence']}}%"></span>
                                                </div>
                                            </td>
                                            @if($addiction<$dependence)
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
                    <h6 class="color_black"><strong>Emphasizing {{$sens_d1}} More Than {{$sens_d2}}</strong></h6>
                    <p>{{$emp10->emphasizing1}}</p>

                    <h6 class="color_black"><strong>Emphasizing {{$sens_c1}} More Than {{$sens_c2}}</strong></h6>
                    <p>{{$emp11->emphasizing2}}</p>

                    <h6 class="color_black"><strong>Emphasizing {{$sens_a1}} More Than {{$sens_a2}}</strong></h6>
                    <p>{{$emp12->emphasizing3}}</p>

                    <h6 class="color_black"><strong>Emphasizing {{$sens_aa1}} More Than {{$sens_aa2}}</strong></h6>
                    <p>{{$emp13->emphasizing4}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/promos/'.$relationship_lookup_text['promo_image'])}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 21 | END -->

    <!-- Page 22 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/shadow_banners/'.$shadow_lookup_text['banners_image'])}}');">
                <h2 class="mb-0 color_white">SHADOW ARCHETYPE:<br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center mb-5">
                        <h5 class="color_black"><strong>PRIMARY NEEDS</strong></h5>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic animated">
                                <div class="first-row">
                                    <figure class="{{$complaint_class}}">
                                        <img src="{{ asset('images'.$complaint_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                        <figcaption><span>Acknowledgement</span></figcaption>
                                    </figure>
                                </div>
                                <div class="second-row">
                                    <figure class="{{$avoidant_class}}">
                                        <img src="{{ asset('images'.$avoidant_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption><span>Autonomy</span></figcaption>
                                    </figure>
                                    <figure class="{{$collapse_class}}">
                                        <img src="{{ asset('images'.$collapse_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                        <figcaption><span><strong>Kindness</strong></span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                    <figure class="{{$addiction_class}}">
                                        <img src="{{ asset('images'.$addiction_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption><span>Pleasure</span></figcaption>
                                    </figure>
                                    <figure class="{{$dependence_class}}">
                                        <img src="{{ asset('images'.$dependence_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption><span>Respect</span></figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                    <figure class="{{$control_class}}">
                                        <img src="{{ asset('images'.$control_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption><span>Shared Reality</span></figcaption>
                                    </figure>
                                    <figure class="{{$anxious_class}}">
                                        <img src="{{ asset('images'.$anxious_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption><span>Connection</span></figcaption>
                                    </figure>
                                </div>
                                <div class="last-row">
                                    <figure class="{{$defense_class}}">
                                        <img src="{{ asset('images'.$defense_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                        <figcaption><span><strong>Acceptance</strong></span></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>Primary Need</strong></h6>
                    <p>{{$shadow_lookup_text['primary_needs']->primary_needs}}</p>
                    <h6 class="color_black"><strong>Secondary Need</strong></h6>
                    <p>{{$shadow_lookup_text['secondary_needs']->secondary_needs}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 22 | END -->

    <!-- Page 23 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/shadow_banners/'.$shadow_lookup_text['banners_image'])}}');">
                <h2 class="mb-0 color_white">SHADOW ARCHETYPE:<br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center mb-5">
                        <h5 class="color_black"><strong>BIGGEST DOUBTS & FEARS</strong></h5>
                        <div class="transform-graphic">
                            <div class="dynamic-graphic animated">
                                <div class="first-row">
                                    <figure class="{{$complaint_class}}">
                                        <img src="{{ asset('images'.$complaint_img)}}" alt="Evolving Love Energy Icon - Possibility Complaint (Grey Scale)">
                                        <figcaption><span>"I'll never feel<br> fully met"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="second-row">
                                    <figure class="{{$avoidant_class}}">
                                        <img src="{{ asset('images'.$avoidant_img)}}" alt="Evolving Love Energy Icon - Freedom Avoidant (Grey Scale)">
                                        <figcaption><span>"My partner's needs will get in the way of me having what I want."</span></figcaption>
                                    </figure>
                                    <figure class="{{$collapse_class}}">
                                        <img src="{{ asset('images'.$collapse_img)}}" alt="Evolving Love Energy Icon - Harmony _ Collapse">
                                        <figcaption><span><strong>"No one will care about my feeling"</strong></span></figcaption>
                                    </figure>
                                </div>
                                <div class="mid-row">
                                    <figure class="{{$addiction_class}}">
                                        <img src="{{ asset('images'.$addiction_img)}}" alt="Evolving Love Energy Icon - Passion Addiction (Grey Scale)">
                                        <figcaption><span>"I'll be trapped in monotony and life will be boring."</span></figcaption>
                                    </figure>
                                    <figure class="{{$dependence_class}}">
                                        <img src="{{ asset('images'.$dependence_img)}}" alt="Evolving Love Energy Icon - Partnership Co-dependence (Grey Scale)">
                                        <figcaption><span>"I'll be missed, lied to or betrayed"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="secondLast-row">
                                    <figure class="{{$control_class}}">
                                        <img src="{{ asset('images'.$control_img)}}" alt="Evolving Love Energy Icon - Truth Control (Grey Scale)">
                                        <figcaption><span>"I'll never be able to rely on anyone but myself"</span></figcaption>
                                    </figure>
                                    <figure class="{{$anxious_class}}">
                                        <img src="{{ asset('images'.$anxious_img)}}" alt="Evolving Love Energy Icon - Devotion Anxious (Grey Scale)">
                                        <figcaption><span>"I'll end up alone"</span></figcaption>
                                    </figure>
                                </div>
                                <div class="last-row">
                                    <figure class="{{$defense_class}}">
                                        <img src="{{ asset('images'.$defense_img)}}" alt="Evolving Love Energy Icon - Appreciation _ Defense">
                                        <figcaption><span><strong>"I'll be unfairly judged or accused"</strong></span></figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>Primary Doubts & Fears</strong></h6>
                    <p>{{$shadow_lookup_text['primary_doubts']->primary_doubts}}</p>

                    <h6 class="color_black"><strong>Secondary Doubts & Fears</strong></h6>
                    <p>{{$shadow_lookup_text['secondary_doubts']->secondary_doubts}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 23 | END -->

    <!-- Page 24 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/shadow_banners/'.$shadow_lookup_text['banners_image'])}}');">
                <h2 class="mb-0 color_white">SHADOW ARCHETYPE:<br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center mb-5">
                        <h5 class="color_black"><strong>CONFLICT PROFILE</strong></h5>
                        <figure class="maxWidth_300 mx-auto">
                            <img src="{{ asset('images/resolution/'.$shadow_lookup_text['re_image'])}}" alt="">
                        </figure>
                    </div>
                    <h6 class="color_black"><strong>The 5 Stages of Resolution</strong></h6>
                    <p>{{$shadow_lookup_text['resolution_stages']->resolution_stages}}</p>

                    <h6 class="color_black"><strong>Conflict Strategy</strong></h6>
                    <p>{{$shadow_lookup_text['primary_conflict']->primary_conflict}}</p>
                    <p>{{$shadow_lookup_text['secondary_conflict']->secondary_conflict}}</p>

                    <h6 class="color_black"><strong>Resolution Strategy</strong></h6>
                    <figure class="float-start me-2" style="max-width: 250px;">
                        <img src="{{ asset('images/Evolving Love - 5 0Rs of Resolution.png')}}" alt="Evolving Love - 5 R's of Resolution">
                    </figure>
                    <p>{{$shadow_lookup_text['primary_strategy']->primary_strategy}}</p>
                    <p>{{$shadow_lookup_text['secondary_strategy']->secondary_strategy}}</p>

                    <div class="promo-section" style="background-image: url('{{ asset('images/Evolving Love Promo Background - Visionary Zen Master Blue Purple.jpg')}}');">
                        <h5><strong>Permanent Breakthrough: 3-Day Evolving Love Immersion</strong></h5>
                        <div class="left clearfix">
                            <figure class="float-end ms-2" style="max-width: 200px;">
                                <img src="{{ asset('images/Evolving Love Promo Graphic - Retreat-Center-with-Pool.jpeg')}}" alt="">
                            </figure>
                            <p>Join relationship experts Bryan Franklin & Jennifer Russell for a romantic getaway in a 12,000 sqft. mansion in Lake Tahoe, CC tucked away on acres of private land - where luxury and fun meet permanent breakthroughs in your relationship.</p>
                            <div class="text-center">
                                <a href="javascript:void(0)" class="btn btn-green">TELL ME MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 24 | END -->

    <!-- Page 25 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love PDF Banner - How To Partner With You.jpg')}}')">
                <h2 class="mb-0 color_white">HOW TO PARTNER WITH YOU</h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h6 class="color_black mt-0">
                        <strong><em>Partnering With The Compassionate Zen Master</em></strong>
                    </h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 25 | END -->

    <!-- Page 26 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love PDF Banner - Permanent Breakthrough Retreat.jpg')}}');">
                <h3 class="mb-0 color_white">PERMANENT RELATIONSHIP BREAKTHROUGH</h3>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h6 class="color_black mt-0"><strong>The Evolving Love Immersion Retreat</strong></h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 26 | END -->

</body>

</html>