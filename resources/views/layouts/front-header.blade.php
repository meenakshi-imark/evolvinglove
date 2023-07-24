@extends('layouts.app')	
@section('content')
<header id="header" class="site-header main term-header" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a href="/" class="site-logo">
            <img src="{{asset('images/logo-2.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
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
            
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="/quiz">FREE QUIZ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/work-with-us">WORK WITH US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact-us">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-transparent dropdown-toggle" type="button" id="menuDrop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="menuDrop" style="">
                <ul>
                @if(Auth::check())
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
                    @else
                    <li class="login">
                        <a href="/">
                        <span><i class="fas fa-sign-in-alt"></i>Login</span></a>
            
                    </li>
                    @endif
                    
                      
                    
                </ul>
            </div>
        </div>
      </div>
    </nav>
</header>

@endsection