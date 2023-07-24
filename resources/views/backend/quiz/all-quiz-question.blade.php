<?php 
$all_question = DB:: table('quiz_question')->orderBy('question_no', 'ASC')->get();
// echo "<pre>";
// print_r($all_question);exit;
?>
<style>
    ques-aside .ques-list>li .num-box:after {
    counter-increment: none!important;
    content: transparent!important;}
</style>
<ul id="sortable_questions" class="ques-list equal_y_gutter">
    @foreach($all_question as $all_question_value)
    <li class="ui-state-default">
        <div class="num-box">
        </div>
       
        <span style="<?php if($all_question_value->status == 1){echo "color:red";} ?>">{{mb_strimwidth($all_question_value->question, 0, 35, '...')}}</span>
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" id="quiz_action_button" data-bs-toggle="dropdown" aria-expanded="false"><i class="las la-ellipsis-v"></i></button>
            <ul class="dropdown-menu" aria-labelledby="quiz_action_button">
                <li>
                    <a href="javascript:void(0)" class="delete_question" id="{{$all_question_value->id}}">Delete</a>
                </li>
                <!-- <li>
                    <a href="javascript:void(0)">Duplicate</a>
                </li> -->
                <li>
                    <a href="{{url('admin/score-quiz/'.$all_question_value->id)}}">Edit</a>
                </li>
                @if($all_question_value->status == 1)
                <li>
                    <a href="javascript:void(0)" onclick="publish_qus({{$all_question_value->id}})">Publish</a>
                </li>
                @endif
                <!-- <li>
                    <a href="{{url('admin/edit-question/'.$all_question_value->id)}}">Edit</a>
                </li> -->
            </ul>
        </div>
    </li>

    @endforeach
    
</ul> 



