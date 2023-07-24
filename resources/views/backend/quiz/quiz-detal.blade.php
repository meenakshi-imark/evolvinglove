@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Submit Quiz Detail </h1>
        </div>
        <div class="white-box">
            @if($get_user == "No data found")
            <h5 style="text-align: center; margin-top: 100px;">No data found</h5>
            @else
            <div class="paymentDetail-content">

                <h5>User Basic Info</h5>
                
                <ul class="row row-cols-2 row-cols-md-5">
                    <li class="col">
                        <strong>First Name</strong>
                        <span>{{$get_user->name}}</span>
                    </li>
                    <li class="col">
                        <strong>Last Name</strong>
                        <span>{{$get_user->lastname}}</span>
                    </li>
                    <li class="col">
                        <strong>Email</strong>
                        <span>{{$get_user->email}}</span>
                    </li>
                    <li class="col">
                        <strong>Ontra ID</strong>
                        <span>{{$get_user->ontra_id}}</span>
                    </li>
                    <li class="col">
                        <strong>Billing City</strong>
                        <span>{{$get_user->name}}</span>
                    </li>
                    
                </ul>

                <hr class="divider">
                <h5>Quiz Score</h5>
                
                <ul class="row row-cols-2 row-cols-md-5">
                    <li class="col">
                        <strong>Possibility</strong>
                        <span>{{$get_quizdata->possibility}}%</span>
                    </li>
                    <li class="col">
                        <strong>Appreciation</strong>
                        <span>{{$get_quizdata->appreciation}}%</span>
                    </li>
                    <li class="col">
                        <strong>Truth</strong>
                        <span>{{$get_quizdata->truth}}%</span>
                    </li>
                    <li class="col">
                        <strong>Harmony</strong>
                        <span>{{$get_quizdata->harmony}}%</span>
                    </li>
                    <li class="col">
                        <strong>Freedom</strong>
                        <span>{{$get_quizdata->freedom}}%</span>
                    </li>


                    <li class="col">
                        <strong>Devotion</strong>
                        <span>{{$get_quizdata->devotion}}%</span>
                    </li>
                    <li class="col">
                        <strong>Passion</strong>
                        <span>{{$get_quizdata->passion}}%</span>
                    </li>
                    <li class="col">
                        <strong>Partnership</strong>
                        <span>{{$get_quizdata->partnership}}%</span>
                    </li>
                    <li class="col">
                        <strong>Internal</strong>
                        <span>{{$get_quizdata->internal}}%</span>
                    </li>
                    <li class="col">
                        <strong>External</strong>
                        <span>{{$get_quizdata->external}}%</span>
                    </li>
                    <li class="col">
                        <strong>Explicit</strong>
                        <span>{{$get_quizdata->explicit}}%</span>
                    </li>
                    <li class="col">
                        <strong>Implicit</strong>
                        <span>{{$get_quizdata->implicit}}%</span>
                    </li>
                    <li class="col">
                        <strong>Reactive</strong>
                        <span>{{$get_quizdata->reactive}}%</span>
                    </li>
                    <li class="col">
                        <strong>Repressive</strong>
                        <span>{{$get_quizdata->repressive}}%</span>
                    </li>
                    <li class="col">
                        <strong>Directive</strong>
                        <span>{{$get_quizdata->directive}}%</span>
                    </li>
                    <li class="col">
                        <strong>Collaborative</strong>
                        <span>{{$get_quizdata->collaborative}}%</span>
                    </li>

                    <li class="col">
                        <strong>Instinctive</strong>
                        <span>{{$get_quizdata->instinctive}}%</span>
                    </li>
                    <li class="col">
                        <strong>Considered</strong>
                        <span>{{$get_quizdata->considered}}%</span>
                    </li>
                    <li class="col">
                        <strong>Autonomous</strong>
                        <span>{{$get_quizdata->autonomous}}%</span>
                    </li>
                    <li class="col">
                        <strong>Engaged</strong>
                        <span>{{$get_quizdata->engaged}}%</span>
                    </li>
                    <li class="col">
                        <strong>Achievement</strong>
                        <span>{{$get_quizdata->achievement}}%</span>
                    </li>
                    <li class="col">
                        <strong>Acceptance</strong>
                        <span>{{$get_quizdata->acceptance}}%</span>
                    </li>
                    <li class="col">
                        <strong>Initiating</strong>
                        <span>{{$get_quizdata->initiating}}%</span>
                    </li>
                    <li class="col">
                        <strong>Reciprocating</strong>
                        <span>{{$get_quizdata->reciprocating}}%</span>
                    </li>
                    <li class="col">
                        <strong>Instinctive</strong>
                        <span>{{$get_quizdata->instinctive}}%</span>
                    </li>
                    <li class="col">
                        <strong>Planning</strong>
                        <span>{{$get_quizdata->planning}}%</span>
                    </li>
                    <li class="col">
                        <strong>Spontaneity</strong>
                        <span>{{$get_quizdata->spontaneity}}%</span>
                    </li>
                    <li class="col">
                        <strong>Variety</strong>
                        <span>{{$get_quizdata->variety}}%</span>
                    </li>
                    <li class="col">
                        <strong>Depth</strong>
                        <span>{{$get_quizdata->depth}}%</span>
                    </li>

                    
                </ul>
                
            </div>
            @endif
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')