@extends('layouts.app')	
@section('content')

<header id="header" class="site-header" style="background-image: url('{{asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
    <nav>
        <div class="left">
            <a href="javascript:void(0)" class="site-hamburgur d-lg-none">
                <i class="las la-bars"></i>
            </a>
            <a href="/" class="site-logo">
                <img src="{{asset('images/evolving-love-logo.png')}}" alt="">
            </a>
        </div>
        <div class="right">
            <a href="quiz" class="btn btn-white">Take my free quiz now</a>
        </div>
    </nav>
</header>

<div class="overlay-layer d-lg-none"></div>
@endsection