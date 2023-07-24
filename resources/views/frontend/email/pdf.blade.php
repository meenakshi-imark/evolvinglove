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

<body class="profile-pdf" style="font-family: Open Sans Light;">
    <!-- Page 1 -->
    <div class="single breakAfter">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="pdf-body welcome-body">
            <div class="inner text-center">
                <div class="overlay" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union hires.jpeg')}}');"></div>
                <h1 class="color_white"><strong style="font-size: 30px;">RELATIONSHIP DYNAMICS PROFILE</strong></h1>
                <figure class="mb-5" style="padding: 100px 0;">
                    <img src="{{ asset('images/Relationship Dynamics PDF Cover - Polarity Wheel Icons-min.png')}}" alt="Evolving Love PDF Cover - Polarity Wheel Icons">
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
	        <div class="site-logo" style="margin-top: -85px;">
                <img src="{{asset('images/pdf_banners/red-logo.png')}}">
            </div>
	    </div>
	</div>
    <!-- Page 2 -->
    <div class="single">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{asset('images/evolving-love-logo.png')}}" alt="">
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
                        <span>RELATIONSHIP STANCE</span>
                        <span>[#]</span>
                    </li>
                        <ul style="padding-left: 30px;">
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
                                <span>Reference (Internal vs External)</span>
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
                        <span>SHADOW STANCE</span>
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
                        <span>HOW TO PARTNER WITH THE [USER RELATIONSHIP STANCE]</span>
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
            <div class="inner" style="background-image: url('{{ asset('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png')}}');">
                <div class="site-logo">
                    <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="sidebar-img" style="">
            <figure>
              <img src="{{asset('images/pdf_banners/sidebar.png')}}">
            </figure>
        </div>
        <div class="pdf-body" style="margin-top: -1200px;">
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
                            <!--<figure>
                                <img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt="Evolving Love Archetype - Male Zen Master (200px)">
                            </figure>-->
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
                                            <td>Reative</td>
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
                                            <td>Impulsive</td>
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
                        @if($user_details['type']=="Romantic partner")
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
                        @endif
                    </div>
                    <div class="col">
                    @if($user_details['type']=="Romantic partner")
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
                        @else
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
                        @endif
                    </div>
                </div>

                <div class="row column-2">
                    <div class="col">
                        <div class="card" style="margin-top: -30px;">
                            <div class="card-header">
                                <h5>REFERENCE</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tbody>
                                        <tr>
                                            <td>Self</td>
                                            <td>
                                                <div class="dot-progress">
                                                    <span style="width: {{$internal_external}}%"></span>
                                                </div>
                                            </td>
                                            <td>Other</td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    @if($user_details['type']=="Romantic partner")
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
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 4 -->
    <div class="single breakBefore">
        <div class="pdf-head">
            <div class="inner" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
                <div class="site-logo">
                    <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="sidebar-img">
            <figure>
              <img src="{{asset('images/pdf_banners/sidebar.png')}}">
            </figure>
        </div>
        <div class="pdf-body"  style="margin-top: -1100px;">
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
                                        <td>Control</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_blue" role="progressbar" style="width:{{$control}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Collapse</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_blue" role="progressbar" style="width: {{$collapse}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Anxious</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_green" role="progressbar" style="width:{{$anxious}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Avoidant</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar background_green" role="progressbar" style="width: {{$avoidance}}%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
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

                                        @elseif($remedy=="Addiction" || $remedy=="Co-dependence")
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

                                        @elseif($remedy1=="Addiction" || $remedy1=="Co-dependence")
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

                                        @elseif($secendory_shadow['second']->relationship_gift=="Passion" || $secendory_shadow['second']->relationship_gift=="Partnership")
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
                                        @if($control<$collapse)
                                        <td><strong class="color_blue">Collapse</strong></td>
                                        @else
                                        <td>Collapse</td>
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
                    <figure>
                    <img src="{{ asset('images/Evolving Love Ring of Resolution - 4 Toxic Cycles.png')}}" alt="">
                    </figure>
                    <ul>
                        <li>The toxic cycle of Complaint and Defense</li>
                        <li>The toxic cycle of the Anxious and the Avoidant</li>
                        <li>The toxic cycle of Control and Collapse</li>
                        <li>The toxic cycle of Addiction and Codependency</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}');"></div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h4 class="color_black font_text">
                        <strong>Remedies & Gifts</strong>
                    </h4>
                    <p>We discovered that the underlying motivation driving each partner’s behavior in the toxic cycle also contains the key to permanently resolving the conflict.</p>
                    <p>Rather than the pattern being a result of a character flaw or incompatibility, we found that each partner caught in the cycle was standing for an important value that is actually necessary for an extraordinary love relationship to flourish.</p>
                    <figure class="float-end background_light_grey" style="max-width: 190px;">
                        <img src="{{ asset('images/Evolving Love Ring of Resolution - Remedy Chart Vertical.png')}}" class="w-100" alt="">
                    </figure>
                    <p class="mb-1">Behind every <strong>Complaint</strong> is our value of <strong>Possibility…</strong><br> Believing in a better vision for the future.</p>
                    <p class="mb-1">Behind every <strong>Defense</strong> is our value of <br><strong>Appreciation…</strong> Seeing the perfection of the present moment.</p>
                    <p class="mb-1">Behind our pattern of <strong>Control</strong> is our value of <strong>Truth…<br></strong> Seeking candor, clarity & integrity in our interactions</p>
                    <p class="mb-1">Behind our pattern of <strong>Collapse</strong> is our value of <strong>Harmony…<br></strong> Attuning with empathy and compassion</p>
                    <p class="mb-1">Behind our <strong>Anxious</strong> behavior is our value of <strong>Devotion…<br></strong> Being fully committed and available for connection</p>
                    <p class="mb-1">Behind our <strong>Avoidant</strong> behavior is our value of <strong>Freedom…<br></strong> Being sovereign & authentically self expressed </p>
                    <p class="mb-1">Behind <strong>Addiction</strong> is our value of Passion…<br> Embodying our desire to joyfully keep the spark alive</p>
                    <p class="mb-1">Behind <strong>Codependency</strong> is our value of <strong>Partnership…<br></strong> Relating with respect and collaborating to create a win-win</p>
                    <div>
		                <p>In our <a href="#">online courses</a>, <a href="#">workshops</a>, <a href="#">retreats</a>, and <a href="#">1:1 Sessions</a>, we’ve seen these patterns play out again and again, and we’ve learned to recognize and understand how each person in the partnership plays a role in continuing and repeating the cycle.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}');"></div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div>
		                <p>A relationship that has sufficient possibility, appreciation, freedom, devotion, truth, harmony, passion, and partnership will be an Evolving Love relationship that continues to thrive. The way to permanently resolve a Toxic Cycle is to make sure that both relationship gifts are expressed fully for both partners.</p>
		                <p>A relationship that has sufficient possibility, appreciation, freedom, devotion, truth, harmony, passion, and partnership will be an Evolving Love relationship that continues to thrive. The way to permanently resolve a Toxic Cycle is to make sure that both giftss are expressed fully for both partners. You can see the 8 relationship gifts here, along with their corresponding shadows arranged in pairs:</p>
		                <p>If you find yourself on one side or the other of a toxic cycle, then usually the path towards resolution for you will be to invest more in the opposite relationship gift.</p>
		                <p>For example…<br> If your partner feels you are too avoidant, they may be asking for you to adopt the gift of  devotion.</p>
		                <p>If your partner feels you are too controlling, they may be asking for you to value more harmony. </p>
		                <p>If your partner feels you are being too defensive or resistant, they may be asking you to bring more possibility.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 6 | END --><!-- Page 7 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}');">
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
                </div>
            </div>
        </div>
    </div>
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{asset('images/banners/'.$relationship_lookup_text['banner'])}}');"></div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
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
                </div>
            </div>
        </div>
    </div>
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/banners/'.$relationship_lookup_text['banner'])}}'); "></div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <p>There could be many reasons for why you focus on one particular relationship gift over another. Most commonly it indicates that you haven’t chosen to develop that aspect of yourself compared with others. It could also mean that you are focused intently on one area because your natural gifts lie elsewhere and don’t need as much of your attention. It could also mean that your partner has a particular sensitivity and you are focused on that area because you know it is important to your partner.</p>

                    <p>We hope you enjoy learning about yourself and that you use what you find in this report to be an even more extraordinary lover.</p>
                </div>
                <div class="promo-section" style="background-image: url('https://evolvinglove.customerdevsites.com/images/promo_2.png');background-size: cover; background-repeat: no-repeat; padding: 0;">
                        <div class="sitemax-width">
                            <div class="inner" style="width: 73%; margin: 0 auto; display: block;">
                                <h3 style="margin-bottom: 2px; margin-left: -30px; font-size: 17px; color: #ffffff; font-weight: bold">PERMANENT RELATIONSHIP BREAKTHROUGH</h3>
                                <div class="left clearfix" style="position: relative; height: 162px;">
                                    <div class="ctnt" style="display: block; width: 80%; position: absolute; height: auto; left: -30px; top: 0;">
                                        <p style="font-size: 16px; font-weight: 400; margin-bottom: 10px; margin-top: 5px;">8-Week Online Course with Jennifer &amp; Bryan</p>
                                        <p style="font-size: 13px; font-weight: 400; margin-bottom: 15px;">Join relationship experts Bryan Franklin and Jennifer Russell for an 8-week online event.  We’ll take you on a journey of self-discovery and help you develop 8 key skills that will transform your relationships.</p>
                                        <div class="text-center">
                                            <a href="javascript:void(0)" class="btn btn-white br" style="background-color: transparent; border: 2px solid #ffffff; color: #ffffff;">TELL ME MORE</a>
                                        </div>
                                    </div>
                                    <div class="promo_img" style="display: block; width: 20%; height: auto; position: absolute; top: 5px; right: 0;">
                                        <figure style="width: 120px;  margin-bottom: 10px;"><img src="https://evolvinglove.customerdevsites.com/images/breakthrough.png" alt=""></figure>  
                                    </div>
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
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
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
                </div><!-- 
                <figure><img style="width: 100%; height: 100px; margin-left: -15px;" src="https://evolvinglove.customerdevsites.com/images/mark.png" alt=""></figure> 
 -->            </div>
        </div>
    </div>
    <!-- Page 8 | END -->

       <!-- Page 9 -->
       <div class="single breakBefore">
        <div class="page-title">
         <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
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
                            <strong class="{{$q_class1}}" style="text-transform: uppercase;">{{$secondary}}</strong>
                            <br>
                            <span class="color_black">SECONDARY RELATIONSHIP QUALITIES</span>
                        </p>

                    </div>
                   
<!--                     <h6 class="color_black"><strong>Primary Qualities</strong></h6>
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
                    </div> -->
                </div>
            </div>
            <!-- <figure><img style="width: 100%; height: 100px; margin-left: -15px;" src="https://evolvinglove.customerdevsites.com/images/mark.png" alt=""></figure>  -->
        </div>
    </div>
    <!-- Page 9 | END -->
      <!-- Page 10 -->
      <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
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
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
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
                    <!--<ul>
                    	<li style="list-style: none; margin-left: -25px;">1. Relationship Skill #1 - Description of this relationship skill here that explains it</li>
                    	<li style="list-style: none; margin-left: -25px;">2. Relationship Skill #2 - Description of this relationship skill here that explains it</li>
                    	<li style="list-style: none; margin-left: -25px;">3. Relationship Skill #3 - Description of this relationship skill here that explains it</li>
                    </ul>-->

                    <h6 class="color_black"><strong>Relational Skills To Develop</strong></h6>
                    <p>{{$relationship_lookup_text['develop_skills']->relationship_skills_develop}}</p>
                    <!--<ul>
                    	<li style="list-style: none; margin-left: -25px;">4. Relationship Skill #1 - Description of this relationship skill here that explains it</li>
                    	<li style="list-style: none; margin-left: -25px;">5. Relationship Skill #2 - Description of this relationship skill here that explains it</li>
                    	<li style="list-style: none; margin-left: -25px;">6. Relationship Skill #3 - Description of this relationship skill here that explains it</li>
                    </ul>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Page 11 | END -->

    <!-- Page 12 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/archetype_icon/'.$relationship_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>REFERENCE (Self vs Other)</strong></h5>
                        <div class="card maxWidth_300">
                            <div class="card-header">
                                <h5>REFERENCE</h5>
                            </div>
                            <div class="card-body">
                                <table class="dot-slider">
                                    <tr>
                                        @if($refrence=="internal")
                                        <td><strong class="color_primary">Self</strong></td>
                                        @else
                                        <td>Self</td>
                                        @endif
                                        <td>
                                            <div class="dot-progress">
                                                <span style="width: {{$internal_external}}%"></span>
                                            </div>
                                        </td>
                                        @if($refrence=="external")
                                        <td><strong class="color_primary">Other</strong></td>
                                        @else
                                        <td>Other</td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if($refrence=="internal")
                    @php $refrencename="Self" @endphp
                    @else
                    @php $refrencename="Other" @endphp
                    @endif
                    <h6 class="color_black"><strong>Reference:</strong> {{$refrencename}}</h6>
                    <p>{{$content->about}}</p>

                    <p>{{$content->focus}}</p>

                    <p>{{$content->growth}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 12 | END -->
    <!-- Page 13 -->
    <!--  <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}} </small></h2>
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
                    <p>{{$emphasizing1->emphasizing1}}</p>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Page 13 | END -->

    <!-- Page 14 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
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
                    <h6 class="color_black"><strong>What Is An Energetic Profile?</strong></h6>
                    <p>{{$emphasizing1->emphasizing1}}</p>
                    <p>{{$emphasizing2->emphasizing2}}</p>
                    <p>{{$emphasizing3->emphasizing3}}</p>
                    <p>{{$emphasizing4->emphasizing4}}</p>


                    </div>
            </div>
        </div>
    </div>
    <!-- Page 14 | END -->
    <!-- Page 15 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">RELATIONSHIP STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
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
                                    <th>REPRESSED</th>
                                    <th>EXPRESSED</th>
                                </tr>
                                <tr>
                                    <th><span>DIRECT</span></th>
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
                                    <th><span>INDIRECT</span></th>
                                </tr>
	                        </table>
	                    </div>
                    </div>
                    <h6 class="color_black"><strong>Communication Style</strong></h6>
                    <p>{{$relationship_lookup_text['primary_communication']->primary_communication}}</p>
                    <p>{{$relationship_lookup_text['secondary_communication']->secondary_communication}}</p>

                    <h6 class="color_black"><strong>Communication Shadow</strong></h6>
                    <p>{{$relationship_lookup_text['primary_shadow_remedy']->primary_shadow}}</p>
                    <p>{{$relationship_lookup_text['secondary_shadow_remedy']->secondary_shadow}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 15 | END -->

    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">SHADOW STANCE <br> <small>{{$shadow_lookup_text['shadowlookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>SHADOW PATTERNS</strong></h5>
                        <div class="row column-2">
		                    <div class="col">
		                        <div class="card">
		                            <div class="card-header">
		                                <h5>SHADOWS</h5>
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

		                                        @elseif($secendory_shadow['second']->relationship_gift=="Partnership" || $secendory_shadow['second']->relationship_gift=="Partnership")
		                                        @php
		                                        $shadow_color1 = "color_primary";
		                                        @endphp
		                                        @endif
		                                        
		                                    
		                                        <td class="text-center">1<sup>st</sup> <strong class="{{$shadow_color}}">{{$secendory_shadow['first']->relationship_gift}} </strong></td>
                                                <td class="text-center">2<sup>nd</sup> <strong class="{{$shadow_color1}}">{{$secendory_shadow['second']->relationship_gift}}</strong></td>
		                                    </tr>
		                                </table>
		                            </div>
		                        </div>
		                    </div>
                        </div>
                        <div class="row column-2">
                        	<div class="col">
                        		<figure><img src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['primary_toxic_image'])}}" style="width: 150px;" alt=""></figure>
                        	</div>
                        	<div class="col">
                        		<figure><img src="{{ asset('images/toxic_cycle/'.$shadow_lookup_text['secondary_toxic_image'])}}"  style="width: 150px;" alt=""></figure>
                        	</div>
                        </div>
                    </div>
                    <h6 class="color_black"><strong>Primary Shadow</strong></h6>
                    <p>{{$shadow_lookup_text['primary_qualities']->primary_qualities}}</p>

                    <h6 class="color_black"><strong>Secondary Shadow</strong></h6>
                    <p>{{$shadow_lookup_text['secondary_qualities']->secondary_qualities}}</p>    
                </div>
            </div>
        </div>
    </div>
    <!-- Page 16 | END -->
    <!-- Page 17 -->
      <!-- Page 17 -->
      <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/pdf_banners/'.$relationship_lookup_text['banner'])}}');">
                <h2 class="mb-0 color_white">SHADOW STANCE: <br> <small>{{$relationship_lookup_text['lookuptext']}}</small></h2>
                <figure><img src="{{ asset('images/shadow_icons/'.$shadow_lookup_text['icon'])}}" alt=""></figure>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <div class="text-center">
                        <h5 class="color_black"><strong>QUALITIES & GIFTS</strong></h5>
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
                        <p>PRIMARY SHADOW <br><strong class="{{$q_class}}" style="text-transform: uppercase;">{{$shadow_lookup_text['primary']}}</strong></p>

                        <figure style="z-index: 1; position: relative;"><img src="{{ asset('images/primary_shadow/'.$shadow_lookup_text['primary_image'])}}" style="width: 550px;" alt=""></figure>
                        <figure style="margin-top: -35px;"><img src="{{ asset('images/secondary_shadow_img/'.$shadow_lookup_text['secondary_image'])}}" style="width: 550px;" alt=""></figure>
                        
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
                        <p style="margin-top: 20px;"><strong  class="{{$q_class1}}"  style="text-transform: uppercase;">{{$shadow_lookup_text['secondary']}} <br></strong>SECONDARY SHADOW</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page 17 | END -->
     <!-- Page 18 -->
     @if($user_details['type']=="Romantic partner")
    <div class="single breakBefore">
        <div class="page-title">
        <div class="inner" style="background-image: url('{{ asset('images/banner3.png')}}');">
                <h2 class="mb-0 color_white">HOW TO PARTNER WITH YOU </h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h6 class="color_black"><strong>Partnering With The Compassionate Zen Master</strong></h6>
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
    @endif
    <!-- Page 18 | END -->

    <!-- Page 19 -->
    <div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/banner3.png')}}');">
                <h2 class="mb-0 color_white">HOW TO PARTNER WITH YOU <br></h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h6 class="color_black"><strong>Partnering With The Compassionate Zen Master</strong></h6>
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
    <!-- Page 19 | END -->
<!-- Page 20 -->
<div class="single breakBefore">
        <div class="page-title">
            <div class="inner" style="background-image: url('{{ asset('images/banner4.png')}}');">
                <h2 class="mb-0 color_white">PERMANENT RELATIONSHIP BREAKTHROUGH</h2>
            </div>
        </div>
        <div class="pdf-body">
            <div class="inner no_space">
                <div class="text-body">
                    <h6 class="color_black"><strong>The Evolving Love Immersion Retreat</strong></h6>
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
</body>
<style>
body .background_blue {
    background-color: #0668A8!important;
}
</style>
</html>



