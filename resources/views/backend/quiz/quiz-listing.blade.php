@include('layouts.dashboard.header')

<style>
    .alert-success {
    animation: fadeOut 2s forwards;
    animation-delay: 3s;
  
    }

    @keyframes fadeOut {
        from {opacity: 1;}
        to {opacity: 0;}
    }
</style>

<main class="content">

    <section class="main-content">
        @if(session()->has('welcome_screen'))
        <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('welcome_screen') }}
        </div>
        @endif
        <div class="title-head">
            <h1>Quizes</h1>
        </div>
        <div class="white-box">
            <div class="row row-cols-md-4 g-4">
                <div class="col">
                    <div class="card-quizBox">
                        <figure>
                            <img src="{{asset('dashboard/welcomescreen/'.$quiz_all->welcome_upload_image)}}" alt="">
                            <figcaption>{{$quiz_all->welcome_title}}</figcaption>
                            <ul class="overlay">
                                <li>
                                    <span>Creation Date</span>
                                    <strong>{{date('d M Y', strtotime($quiz_all->create_at))}}</strong>
                                </li>
                                <li>
                                    <span>Last Updated on Date</span>
                                    <strong>{{date('d M Y', strtotime($quiz_all->updated_at))}}</strong>
                                </li>
                            </ul>
                        </figure>
                        <div class="card-quizBox-body">
                            <ul>
                                <li>
                                    <span>{{$quiz_all->no1_text}}</span>
                                    <strong>{{$started_quiz}}</strong>
                                </li>
                                <li>
                                    <span>{{$quiz_all->no2_text}}</span>
                                    <strong>{{$completed_quiz}}</strong>
                                </li>
                            </ul>
                            <a href="{{url('admin/welcome-screen')}}" class="btn btn-primary sm w-100">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>