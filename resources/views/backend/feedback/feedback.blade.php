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
<main class="content">
    <section class="main-content">

        <div class="alert alert-success showbiasmsg" style="text-align: center; display:none">
            Data updated successfully
        </div>

        <div class="title-head">
            <h1>Feedback</h1>
        </div>
        <div class="white-box px-0">
            <div class="table-responsive">
                <table class="ansBias-table">
                    <thead>
                        <tr>
                        	<th class="text-nowrap">#</th>
                            <th class="text-nowrap">FormID</th>
                            <th class="text-nowrap">Submit by</th>
                            <th class="text-nowrap">Primary Gifts</th>
                            <th class="text-nowrap">Relationship qualities</th>
                            <th class="text-nowrap">Themes</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $count = 1; ?>
                    	@foreach($get_feedback as $get_feedback_value)
                    	@php
                    	$username = DB::table('users')->where('id',$get_feedback_value->userid)->select('name','lastname')->first();
                    	@endphp
                    	<tr>
                    		<td>{{$count}}</td>
                    		<td>{{$get_feedback_value->formid}}</td>
                            <td>{{$username->name}} {{$username->lastname}}</td>
                            <!-- <td>@php echo ($get_feedback_value->page1 != '') ? $get_feedback_value->page1."Star" : "...."; @endphp </td>
                            <td>@php echo ($get_feedback_value->page2 != '') ? $get_feedback_value->page1." Star" : "...."; @endphp </td>
                            <td>@php echo ($get_feedback_value->page3 != '') ? $get_feedback_value->page1." Star" : "...."; @endphp </td> -->
                            <td>
                             <div class="containet">
                                  <div class="rating">
                                    <input class="star active" type="radio" name="clr"/>
                                    <input class="star" type="radio" name="clr"/>
                                    <input class="star" type="radio" name="clr"/>
                                    <input class="star" type="radio" name="clr">
                                    <input type="radio" name="clr"/>
                                  </div>
                                </div>
                            </td>
                            <td>3</td>
                            <td>2</td>
                            <td>
                                
                               <!-- <input class="col-md-2 btn btn-primary d-none d-md-inline-flex mt-1 updateans" id="" type="submit" name="" value="View"> -->
                               <a href="{{url('/admin/feedback-detail/'.$get_feedback_value->id)}}" class="col-md-2 btn btn-primary d-none d-md-inline-flex mt-1 updateans" > View </a>
                            </td>
                        </tr>
                        <?php $count ++; ?>
                        @endforeach            
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')

