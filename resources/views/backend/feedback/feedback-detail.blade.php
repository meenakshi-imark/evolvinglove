@include('layouts.dashboard.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<style>
    /*.alert-success {
    animation: fadeOut 2s forwards;
    animation-delay: 3s;
  
    }

    @keyframes fadeOut {
        from {opacity: 1;}
        to {opacity: 0;}
    }*/


    .alert-success {
      animation: cssAnimation 0s 3s forwards;
      visibility: visible;
    }

    @keyframes cssAnimation {
      to   {visibility: hidden;}
    }

    .rating {
        position: relative;
        display: flex;
        justify-content: center;
    }
    .rating input {
        position: relative;
        cursor: pointer;
        border: none;
        padding: 0;
        border-radius: 0;
        background-color: transparent;
    }
    .rating input::before {
        content: '\f005';
        position: absolute;
        font-family: fontAwesome;
        font-size: 15px;
        color: #9b9b9b;
        transition: 0.5s;
    }
    .rating input[type=checkbox]:not(.switch-input):checked, .rating  input[type=radio]:checked {
        border: 1px solid transparent;
        background-color: transparent;
    }
    .rating input:focus, .rating select:focus, .rating textarea:focus {
        border-color: transparent !important;
    }
    .rating input.active::before {
      color: #ff9933;
    }

</style>
<?php 
$user = DB::table('users')->where('id',$feedback_id->userid)->select('name','lastname')->first();
?>
<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Feedback by {{$user->name}} {{$user->lastname}}</h1>
        </div>

        <div class="white-box px-0">
            <div class="table-responsive">
                <table class="ansBias-table">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Submit by</th>
                            <th class="text-nowrap">Primary Gifts</th>
                            <th class="text-nowrap">Relationship qualities</th>
                            <th class="text-nowrap">Themes</th>
                            <th class="text-nowrap">Relationship Skills</th>
                            <th class="text-nowrap">Reference</th>
                            <th class="text-nowrap">Tendencies</th>
                            <th class="text-nowrap">Energetic Profile</th>
                            <th class="text-nowrap">Communication Profile</th>
                            <th class="text-nowrap">Decision Making Profile</th>
                            <th class="text-nowrap">Parenting Profile</th>
                            <th class="text-nowrap">Erotic Profile</th>
                            <th class="text-nowrap">Shadow Qualities</th>
                            <th class="text-nowrap">Toxic Cycle</th>
                            <th class="text-nowrap">Sensitivities</th>
                            <th class="text-nowrap">Primary Needs</th>
                            <th class="text-nowrap">Biggest Doubts & Fears</th>
                            <th class="text-nowrap">Most Triggered By</th>
                            <th class="text-nowrap">Conflict Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$userdata->name}} </td>                            
                            <!-- <td>
                             <div class="containet">
                              <div class="rating">
                                <input class="active" type="radio" name="clr">
                                <input class="active" type="radio" name="clr">
                                <input class="active" type="radio" name="clr">
                                <input type="radio" name="clr">
                                <input type="radio" name="clr">
                              </div>
                            </div>
                            </td> -->
                            @for($i=1; $i<=18; $i++)
                            <td>
                            <div class="containet">
                              <div class="rating">
                                <input class="@if($feedback_id->{'page'.$i} >=1) active @endif" type="radio" name="clr">
                                <input class="@if($feedback_id->{'page'.$i} >=2) active @endif" type="radio" name="clr">
                                <input class="@if($feedback_id->{'page'.$i} >=3) active @endif" type="radio" name="clr">
                                <input class="@if($feedback_id->{'page'.$i} >=4) active @endif"type="radio" name="clr">
                                <input class="@if($feedback_id->{'page'.$i} >=5) active @endif"type="radio" name="clr">
                              </div>
                            </div>
                            </td>
                            @endfor
                        </tr>
                        
                                                     
                    </tbody>
                </table>
            </div>
        </div>
<!--         <div class="dashboard_wrap">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Submit By</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>{{$user->name}} {{$user->lastname}}</p>
                                    </div>
                                </div>                    
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Primary Gifts</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page1 != '') ? $feedback_id->page1." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Relationship qualities</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page2 != '') ? $feedback_id->page1." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Themes</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page3 != '') ? $feedback_id->page3." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Relationship Skills</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page4 != '') ? $feedback_id->page4." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Reference</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page5 != '') ? $feedback_id->page5." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Tendencies</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page6 != '') ? $feedback_id->page6." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Energetic Profile</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page7 != '') ? $feedback_id->page7." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Communication Profile</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page8 != '') ? $feedback_id->page8." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Decision Making Profile</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page9 != '') ? $feedback_id->page9." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Parenting Profile</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page10 != '') ? $feedback_id->page10." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Erotic Profile</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page11 != '') ? $feedback_id->page11." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Shadow Qualities</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page12 != '') ? $feedback_id->page12." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Toxic Cycle</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page13 != '') ? $feedback_id->page13." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Sensitivities</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page14 != '') ? $feedback_id->page14." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Primary Needs</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page15 != '') ? $feedback_id->page15." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Biggest Doubts & Fears</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                       <p>@php echo ($feedback_id->page16 != '') ? $feedback_id->page16." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Most Triggered By</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page17 != '') ? $feedback_id->page17." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="">
                                        <p>Conflict Profile</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <p>@php echo ($feedback_id->page18 != '') ? $feedback_id->page18." Star" : "...."; @endphp</p>
                                    </div>
                                </div>                                                 
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div> -->
    </section>
</main>

@include('layouts.dashboard.footer')

