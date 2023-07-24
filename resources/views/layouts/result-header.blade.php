@extends('layouts.app')	
@section('content')
 <header id="header" class="site-header result-header" style="background-image: url('{{ asset('images/Relationship Dynamics Background Image - Nav Red Stripe-min.png')}}');">
    <nav>
        <div class="left">
            <a href="javascript:void(0)" class="site-hamburgur d-lg-none">
                <i class="las la-bars"></i>
            </a>
            <a href="/" class="site-logo">
                <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
            </a>
        </div>
        <div class="right">
 
            @php 
            $datasession = session()->all();
            $url = url('/');
            @endphp

            @if(session()->has('formid'))
            @php
            $id = base64_encode("formid".$datasession['formid']);
            $share_url = $url.'/shared-profile?formid='.$id;
            @endphp
            @else
            @php
            $id = "";
            $share_url = "";
            @endphp
            @endif
            <!-- <a href="{{$share_url}}"  class="btn btn-white">SHARE YOUR PROFILE <img src="{{ asset('images/Evolving Love Icon - Share (White).png')}}" alt="" ></a> -->
            @php $route = Route::current()->getName(); @endphp
            <div class="animate slide-in-down notification-button">
                <i class="fa fa-files-o"></i> Link Copied to Clipboard
            </div>
           
            <div class="container">
                <div class="share-container">
                    <div class="share-btn" onclick="myFunction()">SHARE YOUR PROFILE </div>
                    <div contenteditable="true" class="share-url" value="{{$share_url}}"></div>
                </div>
            </div>

            @php $route = Route::current()->getName(); @endphp
            @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-transparent dropdown-toggle" type="button" id="menuDrop" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="menuDrop">
                <ul>
                        <li>
                            <a href="{{url('my-profiles') }}">
                              <span><i class="fas fa-user-circle"></i>MY PROFILES</span> 
                            </a>
                        </li>
                        <li>
                            <a href="{{url('my-courses') }}">
                              <span><i class="fas fa-clipboard-list"></i>MY COURSES</span> 
                            </a>
                        </li>
                        <li>
                            <a href="{{url('my-account') }}">
                              <span><i class="fas fa-user"></i>MY ACCOUNT</span> 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                              <span><i class="fas fa-users"></i>COMMUNITY</span> 
                            </a>
                        </li>
                        <li>
                            <a href="{{url('get-support') }}">
                              <span><i class="fas fa-headset"></i>GET SUPPORT</span> 
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span><i class="fas fa-sign-out-alt"></i>Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="dropdown">
                <button class="btn btn-transparent dropdown-toggle" type="button" id="menuDrop" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="menuDrop">
                    <ul>
                        <li><a href="/">Login <i class="fas fa-user"></i></a></li>
                    </ul>
                </div>
            </div>
            @endif

        </div>
    </nav>
</header> 

<div class="overlay-layer d-lg-none"></div>

@endsection

