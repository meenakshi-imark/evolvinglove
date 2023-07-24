<?php
$draft = DB::table('quiz_question')->where('status',1)->get();
$count_draft = count($draft);

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Evolving Love | Dashboard</title>
    <meta name="title" content="Evolving Love">
    <meta name="description" content="Evolving Love">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" sizes="32x32" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('dashboard/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> 
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>

<body>

    <header id="header" class="site-header">
        <div class="site-logo">
            <a href="javascript:void(0)" class="site-hamburgur btn btn-grey btn-icon d-xl-none">
                <i class="las la-bars"></i>
            </a>
            <a href="{{url('admin/dashboard')}}">
                <img src="{{asset('dashboard/images/logodashboard.avif')}}" alt="Evolving Love">
            </a>
        </div>
        <nav>
            <ul>
                <!-- <li class="for-quiz">
                    <a href="javascript:void(0)" class="btn btn-grey btn-icon">
                        <img src="{{('dashboard/images/eye-icon.png')}}" alt="">
                    </a>
                </li> -->
                <li class="for-quiz counting">
                    <!-- <a href="javascript:void(0)" onclick="publishdata()" class="btn btn-primary">Publish - {{$count_draft}}</a> -->
                     <a href="javascript:void(0)" onclick="publishdata()" class="btn btn-primary">Publish 
                        <span>1</span>
                     </a>
                </li>
                <li class="for-quiz">
                    <a href="{{url('admin/add-question')}}" class="btn btn-primary d-none d-md-inline-flex">
                        <i class="las la-plus"></i> Add Question
                    </a>
                    <a href="add-question_multiple-choice.php" class="btn btn-primary btn-icon d-md-none">
                        <i class="las la-plus"></i>
                    </a>
                </li>
                <li class="admin-avatar">
                    <div class="">
     <!--                    <button class="btn" type="button" id="userDrop" data-bs-toggle="dropdown" aria-expanded="false">
                            <figure style="background-image: url({{asset('dashboard/images/dummy-profile-pic.jpg')}});"></figure>
                            <span>{{Auth::user()->name}}</span>
                        </button> -->
                        <div class="dropdown">
                          <button class="btn" type="button" id="userDrop" data-bs-toggle="dropdown" aria-expanded="false">
                            <figure style="background-image: url({{asset('dashboard/images/dummy-profile-pic.jpg')}});"></figure>
                            <span>{{Auth::user()->name}}</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="userDrop">
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                          </div>
                        </div>                       

                        <!-- <div class="dropdown-menu" aria-labelledby="userDrop">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="images/profile-icon.png" alt="">
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="las la-lock"></i>
                                        <span>Change Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span>Log Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="layer"></div>

    <aside class="site-sidebar">
        <ul>
            <li>
                <a href="{{url('admin/dashboard')}}">
                    <img src="{{asset('dashboard/images/dashboard-icon.png')}}" alt="">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/user')}}">
                    <img src="{{asset('dashboard/images/user-icon.png')}}" alt="">
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/all-submit-quiz')}}">
                    <img src="{{asset('dashboard/images/user-icon.png')}}" alt="">
                    <span>Quiz Responses</span>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/payment')}}">
                    <img src="{{asset('dashboard/images/payment-icon.png')}}" alt="">
                    <span>Payments</span>
                </a>
            </li>
            <!-- <li class="dropdown">
                <a href="javascript:void(0)">
                    <img src="{{asset('dashboard/images/quiz-icon.png')}}" alt="">
                    <span>Media</span>
                </a>
                <ul style="display: none;">
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <img src="{{asset('dashboard/images/quiz-icon.png')}}" alt="">
                            <span>1:on:1 Page</span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a href="{{asset('admin/pages/upsell-1-on-1-session')}}">
                                    <span>Update</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{url('/admin/1-on-1-testimonial')}}">
                                    <span>Testimonials</span>
                                </a>
                            </li>
                            
                        </ul>
                        <a href="{{asset('admin/pages/upsell-1-on-1-session')}}">
                            <span>1:on:1 Page</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <img src="{{asset('dashboard/images/quiz-icon.png')}}" alt="">
                            <span>Upgrade Profile</span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a href="{{asset('admin/pages/upgrade-profile')}}">
                                    <span>Upgrade Profile</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{url('/admin/plan')}}">
                                    <span>Features</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/upgrade')}}">
                                    <span>Promotions</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/testimonial')}}">
                                    <span>Testimonials</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/reasons')}}">
                                    <span>Reasons</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/asked-question')}}">
                                    <span>FAQs</span>
                                </a>
                            </li>
                            
                        </ul>
                        <a href="{{asset('admin/pages/upsell-1-on-1-session')}}">
                            <span>1:on:1 Page</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('admin/pages/permanent-breakthrough')}}">
                            <span>Permanent Breakthrough</span>
                        </a>
                    </li>
                    
                </ul>
            </li> -->
            
            
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <img src="{{asset('dashboard/images/quiz-icon.png')}}" alt="">
                    <span>Quiz</span>
                </a>
                <ul style="display: none;">
                    <!-- <li>
                        <a href="{{url('admin/all-quiz')}}">
                            <span>Relationship Dynamics Quiz</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/score-quiz/1')}}">
                            <span>Scoring</span>
                        </a>
                    </li> -->
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <span>Relationship Dynamics Quiz</span>
                        </a>
                        <ul style="display: none;">
                            <li>
                            <a href="{{url('admin/score-quiz/1')}}">
                            <span>Scoring</span>
                            </a>
                            </li>
                            
                            <li>
                            <a href="{{url('admin/adjust-answer-bias')}}">
                                    <span>Bias</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="{{url('admin/score-quiz-all')}}">
                            <span>Score quiz <small>Assign points to answers</small></span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="{{url('admin/score-quiz-question')}}">
                            <span>Score Quiz Question <small>Assign points to answers</small></span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="{{url('admin/adjust-answer-bias')}}">
                            <span>Bias</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li>
                <a href="{{url('admin/integration')}}">
                    <img src="{{asset('dashboard/images/user-icon.png')}}" alt="">
                    <span>Integration</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/content-upload')}}">
                    <img src="{{asset('dashboard/images/quiz-icon.png')}}" alt="">
                    <span>Spreadsheet publishing</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/feedback')}}">
                    <img src="{{asset('dashboard/images/quiz-icon.png')}}" alt="">
                    <span>Feedback</span>
                </a>
            </li>

            <!-- <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span>Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
            </li> -->
            
        </ul>
    </aside>