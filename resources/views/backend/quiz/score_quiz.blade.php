@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }
</style>

<main class="content">
    
   
    <section class="main-content">
        <div class="alert alert-success su" id="su" style="text-align: center; display: none;">
        
        </div>
        <div class="title-head">
            <h1>Quiz Scoring Overview</h1>
        </div>
        <div class="white-box scoring-section">
            <div class="single">
                <div class="heading_single">
                    <h6 id="que{{$question_by_id->id}}" rrr="{{$question_by_id->question}}"><strong>QUESTION #{{$question_by_id->question_no}}:</strong> {{$question_by_id->question}}</h6>
                    <input type="submit" class="updateque" name="" id="{{$question_by_id->id}}" value="Edit">
                </div>

                @if($question_by_id->variation == 2)
                <nav class="mb-3">
                    <ul>
                        <li class="for-quiz">
                            <a href="javascript:void(0)" attr="{{$question_by_id->id}}" id="{{$question_by_id->id}}a" class="btn btn-primary var_id">Variation 1</a>
                        </li>
                        <li class="for-quiz">
                            <a href="javascript:void(0)" attr="{{$question_by_id->id}}" id="{{$question_by_id->id}}b" class="btn btn-primary var_id">Variation 2</a>
                        </li>
                        
                    </ul>
                </nav>
                @endif
                

                <div class="table-responsive score-quiz">
                    @if($question_by_id->question_type == "multiple_choice_click")
                    <table class="scoring-table" id="table1">
                        <thead>
                            <tr>
                                <th>Answer</th>
                                @if($question_by_id->score_type == "yes")
                                <th>Rank 1st</th>
                                <th>Rank 2nd</th>
                                <th>Rank 3rd</th>
                                <th>Rank Last</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($question_option_decode as $question_option)
                            <?php
                            $get_option_value = DB::table('quiz_question_options')->where('quiz_question_id',$question_by_id->id)->get();
                            $ty = DB::table('quiz_question_options')->where('id',$question_option->id)->first();
                            ?>
                            <tr>
                                @if($question_by_id->score_type == "yes")
                                <td>{{$question_option->opton}}</td>
                                @else
                                <td class="scoring-table">
                                    <input class="col-md-10 mt-1" type="text" id="updateanswer{{$ty->id}}" value="{{$question_option->opton}}" readonly>
                                    <input class="col-md-2 btn btn-primary d-none d-md-inline-flex mt-1 updateans" id="{{$ty->id}}" type="submit" name="" value="Edit">
                                </td>                                
                                @endif

                                @if($question_by_id->score_type == "yes")
                                <td class="points" id="poi1">
                                    <!-- <input type="text" id="question_option_id" value="{{$question_option->id}}"> -->
                                    <a href="javascript:void(0)" class="form1" oo="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank1_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <a href="javascript:void(0)" class="form1" oo="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank1_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary">
                                            @if($question_by_id->type_question == 1)    
                                            <td id="refresh_tr{{$question_option->id}}"><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_1st}}</span></td></a>
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_1_2}}</span></td>
                                            @else($question_by_id->type_question == 2)
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_1_2}}</span></td>
                                            <td id="refresh_tr{{$question_option->id}}"><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_1st}}</span></td></a>
                                            @endif
                                        </tr>
                                    </table>
                                </td>                                
                                <td class="points">
                                    <a href="javascript:void(0)" class="form2" form2_attr="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank2_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            @if($question_by_id->type_question == 1)  
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_2nd}}</span></td>
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_2_2}}</span></td>
                                            @else($question_by_id->type_question == 2)
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_2_2}}</span></td>
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_2nd}}</span></td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" class="form3" form3_attr="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank3_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            @if($question_by_id->type_question == 1)   
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_3rd}}</span></td>
                                            @else($question_by_id->type_question == 2)
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_3_2}}</span></td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" class="form4" form4_attr="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank4_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            @if($question_by_id->type_question == 1)   
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_last}}</span></td>
                                            @else($question_by_id->type_question == 2)
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_4_2}}</span></td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                                @endif                     
                            </tr>

                            <!-- Media Gallery Modal -->
                            <div class="modal modal-scoring fade rr" id="scoring_modal_rank1_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank1_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid" value="{{$question_option->id}}">

                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type" id="select_1_{{$question_option->id}}">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}">{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select id="select1_{{$question_option->id}}" name="value">                                                               
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 scorefield" id="scorefield{{$question_option->id}}">
                                                            <input id="score_input{{$question_option->id}}" type="text" name="rank_1_number" value="{{$ty->rank_1st}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="control-group">
                                                    <p>REMOVE SCORE for the answer "<span class="title_name">Clear and discerning</span>"</p>
                                                    <div class="score-list">
                                                        <label>Truth - 2 <a href="javascript:void(0)"><i class="fas fa-times"></i></a></label>
                                                    </div>
                                                </div> -->
                                                <button id="button_1" type="submit" class="btn btn-primary mt-3 button_1">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-scoring fade" id="scoring_modal_rank2_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank2_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid_rank2" value="{{$question_option->id}}">
                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type" id="select_2_{{$question_option->id}}">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}">{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="value" id="select2_{{$question_option->id}}">                                                              
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 scorefield_2{{$question_option->id}}">

                                                            <input id="score_input_form2{{$question_option->id}}" type="text" name="rank_2_number" value="{{$ty->rank_2nd}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <button id="button_2" type="submit" class="btn btn-primary mt-3 button_2">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-scoring fade" id="scoring_modal_rank3_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank3_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid_rank3" value="{{$question_option->id}}">
                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type" name="type" id="select_3_{{$question_option->id}}">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}">{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="value" id="select3_{{$question_option->id}}">                                                              
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 scorefield_3{{$question_option->id}}">
                                                            <input id="score_input_form3{{$question_option->id}}" type="text" name="rank_3_number" value="{{$ty->rank_2nd}}">
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <button id="button_3" type="submit" class="btn btn-primary mt-3 button_3">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-scoring fade" id="scoring_modal_rank4_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank4_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid_rank4" value="{{$question_option->id}}">
                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type" name="type" id="select_4_{{$question_option->id}}">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}">{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="value" id="select4_{{$question_option->id}}">                                                              
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 scorefield_4{{$question_option->id}}">
                                                            <input id="score_input_form4{{$question_option->id}}" type="text" name="rank_4_number" value="{{$ty->rank_2nd}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="control-group">
                                                    <p>REMOVE SCORE for the answer "<span class="title_name">Clear and discerning</span>"</p>
                                                    <div class="score-list">
                                                        <label>Truth - 2 <a href="javascript:void(0)"><i class="fas fa-times"></i></a></label>
                                                    </div>
                                                </div> -->
                                                <button id="button_4" type="submit" class="btn btn-primary mt-3 button_4">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    @elseif($question_by_id->question_type == "short_text_click")
                    <input style="border-color:transparent transparent gray transparent; border-width: thin;  border-top-color:transparent;  margin-left:0px; " class="mt-3" type="text" name="" placeholder="Type your answer here" readonly>
                    @elseif($question_by_id->question_type == "yes_no_click")
                    <table class="scoring-table" id="table1">
                        <thead>
                            <tr>
                                <th>Answer</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($question_option_decode as $question_option)
                            <?php
                            $get_option_value = DB::table('quiz_question_options')->where('quiz_question_id',$question_by_id->id)->get();
                            $ty = DB::table('quiz_question_options')->where('id',$question_option->id)->first();
                            ?>
                            <tr>
                                <td>
                                    <input class="col-md-10 mt-1" type="text" id="updateanswer{{$ty->id}}" value="{{$question_option->opton}}">
                                    <input class="col-md-2 btn btn-primary d-none d-md-inline-flex mt-1 updateans" id="{{$ty->id}}" type="submit" name="" value="Update">
                                </td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                                
                    @endif
                </div>


                @if($question_by_id->variation == 2)
                <?php
                $variation2_que = DB::table('quiz_question_options')->where('quiz_question_no',$question_by_id->id.'b')->get();

                ?>
                <div class="table-responsive" style="display: none;" id="table2">
                   
                    <table class="scoring-table">
                        <thead>
                            <tr>
                                <th>Answer</th>
                                
                                <th>Rank 1st</th>
                                <th>Rank 2nd</th>
                                <th>Rank 3rd</th>
                                <th>Rank Last</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($variation2_que as $question_option)
                            <?php
                            $get_option_value = DB::table('quiz_question_options')->where('quiz_question_id',$question_by_id->id)->get();
                            $ty = DB::table('quiz_question_options')->where('id',$question_option->id)->first();
                            ?>
                            <tr>
                                <td>{{$question_option->opton}}</td>
                                @if($question_by_id->score_type == "yes")
                                <td class="points" id="poi1">
                                    <!-- <input type="text" id="question_option_id" value="{{$question_option->id}}"> -->
                                    <a href="javascript:void(0)" class="form1" oo="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank1_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <a href="javascript:void(0)" class="form1" oo="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank1_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary">
                                            <td id="refresh_tr{{$question_option->id}}"><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_1st}}</span></td></a>
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_1_2}}</span></td>
                                        </tr>
                                    </table>
                                </td>                                
                                <td class="points">
                                    <a href="javascript:void(0)" class="form2" form2_attr="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank2_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_2nd}}</span></td>
                                            <td><span class="btn background_purple color_black">{{$question_option->value_2}} +{{$question_option->rank_2_2}}</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" class="form3" form3_attr="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank3_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_3rd}}</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="points">
                                    <a href="javascript:void(0)" class="form4" form4_attr="{{$question_option->id}}" data-bs-toggle="modal" data-bs-target="#scoring_modal_rank4_{{$question_option->id}}" data-bs-whatever="Inspiring and evolutionary"></a>
                                    <table>
                                        <tr>
                                            <td><span class="btn background_purple color_white">{{$question_option->value}} +{{$question_option->rank_last}}</span></td>
                                        </tr>
                                    </table>
                                </td>
                                @endif                     
                            </tr>

                            <!-- Media Gallery Modal -->
                            <div class="modal modal-scoring fade rr" id="scoring_modal_rank1_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank1_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid" value="{{$question_option->id}}">

                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type" id="select_11_{{$question_option->id}}">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}" {{ ( $question_by_id->type_question == $type_value->value) ? 'selected' : '' }}>{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select id="select1_{{$question_option->id}}" name="value">                                                               
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="rank_1_number" value="{{$ty->rank_1st}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="control-group">
                                                    <p>REMOVE SCORE for the answer "<span class="title_name">Clear and discerning</span>"</p>
                                                    <div class="score-list">
                                                        <label>Truth - 2 <a href="javascript:void(0)"><i class="fas fa-times"></i></a></label>
                                                    </div>
                                                </div> -->
                                                <button type="submit" class="btn btn-primary mt-3">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-scoring fade" id="scoring_modal_rank2_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank2_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid_rank2" value="{{$question_option->id}}">
                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type" id="select_2_{{$question_option->id}}">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}" {{ ( $question_by_id->type_question == $type_value->value) ? 'selected' : '' }}>{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="value" id="select2_{{$question_option->id}}">                                                              
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="rank_2_number" value="{{$ty->rank_2nd}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary mt-3">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-scoring fade" id="scoring_modal_rank3_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank3_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid_rank3" value="{{$question_option->id}}">
                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}" {{ ( $question_by_id->type_question == $type_value->value) ? 'selected' : '' }}>{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="value">                                                              
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="rank_3_number" value="{{$ty->rank_2nd}}">
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <button type="submit" class="btn btn-primary mt-3">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal modal-scoring fade" id="scoring_modal_rank4_{{$question_option->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scoring_modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scoring_modalLabel">ADD SCORE for the answer "<span>Clear and discerning</span>"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" id="rank4_form{{$question_option->id}}">
                                                @csrf
                                                <input type="hidden" name="question_optionid_rank4" value="{{$question_option->id}}">
                                                <div class="control-group">
                                                    <div class="row gy-3">
                                                        <div class="col-md-5">
                                                            <select name="type">
                                                                @foreach($all_type_que as $type_value)
                                                                <option data-type="{{$type_value->value}}" {{ ( $question_by_id->type_question == $type_value->value) ? 'selected' : '' }}>{{$type_value->type_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="value">                                                              
                                                                <option data-value="{{$ty->value}}">{{$ty->value}}</option>                                                           
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="rank_4_number" value="{{$ty->rank_2nd}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="control-group">
                                                    <p>REMOVE SCORE for the answer "<span class="title_name">Clear and discerning</span>"</p>
                                                    <div class="score-list">
                                                        <label>Truth - 2 <a href="javascript:void(0)"><i class="fas fa-times"></i></a></label>
                                                    </div>
                                                </div> -->
                                                <button type="submit" class="btn btn-primary mt-3">Save Score</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                @endif
            </div>
        </div>
    </section>
    <aside class="ques-aside">
        <div class="single">
            @include('backend.quiz.all-quiz-question')
        </div>
    </aside>

    <div class="modal fade modal-password" id="get_support" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center mb-3">
                        <h3 class="mb-1 color_primary">Update question</h3>
                    </div>
                    <form class="form" action="">
                    
                        <div class="control-group">
                            <input type="text" placeholder="Name" id="updatequestion" name="updatequestion">
                            <input type="hidden" id="updatequestionid" name="updatequestionid">
                        </div>                    
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="update_question">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-password" id="popup_updateoption" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center mb-3">
                        <h3 class="mb-1 color_primary">Update options</h3>
                    </div>
                    <form class="form" action="">
                    
                        <div class="control-group">
                            <input type="text" placeholder="Name" id="updateoption" name="updateoption">
                            <input type="hidden" id="updateoptionid" name="updateoptionid">
                        </div>                    
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="update_opt">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



@include('layouts.dashboard.footer')

<script type="text/javascript">  
$(document).ready(function(){
    $('.form1').click(function(){
        var form1_id = $(this).attr('oo');
        func1(form1_id);
    });

    function func1(form1_id){
        $("#rank1_form"+form1_id).submit(function(e){
            e.preventDefault();
            var formData = $("#rank1_form"+form1_id).serialize();
            $.ajax({
                url: "/admin/rank1-submit",
                type: "POST",
                dataType: "json",
                data: formData,
                success: function(data){
                    if(data.status==1){
                        // $(".modal").hide();
                        // $('.modal-backdrop').remove();
                        $('.su').css('display', 'block');
                        $('.su').html('Data update succusfully ');
                        setTimeout(function () {
                            $('.su').fadeOut();
                        }, 2000);                        
                        $('.modal').modal('hide');
                        
                    }
                },
            });
        });

        $("#select_1_"+form1_id).change(function(){
            var select_1_value = $("#select_1_"+form1_id).find(":selected").val();
            var select_1_id = form1_id;
            //alert(select_1_value);
            $.ajax({
                url: "/admin/form1-select",
                type: "GET",
                data : { select_1_value : select_1_value, select_1_id : select_1_id},
                
                success: function(data){
                    //alert(data.ty_rank_value)
                    if(data.ty_value == "No Option"){
                        $('.scorefield').css('display','none');
                        $('.button_1').css('display','none');
                    }else {
                        $('.scorefield').css('display','');
                        $('.button_1').css('display','');
                    }
                    $("#select1_"+form1_id).html('<option data-value="'+data.ty_value+'">'+data.ty_value+'</option>');
                    //$("#scorefield"+form1_id).append('<input type="text" name="rank_1_number" value="{{'+data.ty_rank_value+'}}">');
                    $('#score_input'+form1_id).val(data.ty_rank_value)
                    
                },
            });
        });
    }
});

$(document).ready(function(){
    $('.form2').click(function(){
        var form2_id = $(this).attr('form2_attr');
        func2(form2_id);
    });

    function func2(form2_id){
        $("#rank2_form"+form2_id).submit(function(e){
            e.preventDefault();
            var formData = $("#rank2_form"+form2_id).serialize();
            $.ajax({
                url: "/admin/rank2-submit",
                type: "POST",
                dataType: "json",
                data: formData,
                success: function(data){
                    if(data.status==1){
                        $(".modal").hide();
                        $('.modal-backdrop').remove();
                        $('.su').css('display', 'block');
                        $('.su').html('Data update succusfully ');
                        setTimeout(function () {
                            $('.su').fadeOut();
                        }, 2000);
                        //$(".points").load(".points");
                        $('.modal').modal('hide');
                    }
                },
            });
        });

        $("#select_2_"+form2_id).change(function(){
            //alert("Hiiiiiiiiii")
            var select_2_value = $("#select_2_"+form2_id).find(":selected").val();
            //alert(select_2_value)
            var select_2_id = form2_id;
            //alert(conceptName);
            $.ajax({
                url: "/admin/form2-select",
                type: "GET",
                data : { select_2_value : select_2_value, select_2_id : select_2_id},
                
                success: function(data){
                    if(data.ty_value == "No Option"){
                        $('.scorefield_2').css('display','none');
                        $('.button_2').css('display','none');
                    }else {
                        $('.scorefield_2').css('display','');
                        $('.button_2').css('display','');
                    }
                    $("#select2_"+form2_id).html('<option data-value="'+data.ty_value+'">'+data.ty_value+'</option>');
                    //$("#scorefield_2"+form2_id).html('<input type="text" name="rank_1_number" value="{{'+data.ty_rank_value'}}">');
                    $('#score_input_form2'+form2_id).val(data.ty_rank_value);
                },
            });
        })
    }
});

$(document).ready(function(){
    $('.form3').click(function(){
        var form3_id = $(this).attr('form3_attr');
        func3(form3_id);
    });

    function func3(form3_id){
        $("#rank3_form"+form3_id).submit(function(e){
            e.preventDefault();
            var formData = $("#rank3_form"+form3_id).serialize();
            $.ajax({
                url: "/admin/rank3-submit",
                type: "POST",
                dataType: "json",
                data: formData,
                success: function(data){
                    if(data.status==1){
                        $(".modal").hide();
                        $('.modal-backdrop').remove();
                        $('.su').css('display', 'block');
                        $('.su').html('Data update succusfully ');
                        setTimeout(function () {
                            $('.su').fadeOut();
                        }, 2000);
                        //$(".points").load(".points");
                        $('.modal').modal('hide');
                    }
                },
            });
        });
        $("#select_3_"+form3_id).change(function(){
            //alert("Hiiiiiiiiii")
            var select_3_value = $("#select_3_"+form3_id).find(":selected").val();
            //alert(select_2_value)
            var select_3_id = form3_id;
            //alert(conceptName);
            $.ajax({
                url: "/admin/form3-select",
                type: "GET",
                data : { select_3_value : select_3_value, select_3_id : select_3_id},
                
                success: function(data){
                    if(data.ty_value == "No Option"){
                        $('.scorefield_3').css('display','none');
                        $('.button_3').css('display','none');
                    }else {
                        $('.scorefield_3').css('display','');
                        $('.button_3').css('display','');
                    }
                    $("#select3_"+form3_id).html('<option data-value="'+data.ty_value+'">'+data.ty_value+'</option>');
                    //$("#scorefield_3"+form3_id).html('<input type="text" name="rank_1_number" value="{{'+data.ty_rank_value'}}">');
                    $('#score_input_form3'+form2_id).val(data.ty_rank_value);
                },
            });
        })
    }
});

$(document).ready(function(){
    $('.form4').click(function(){
        var form4_id = $(this).attr('form4_attr');
        func4(form4_id);
    });

    function func4(form4_id){
        $("#rank4_form"+form4_id).submit(function(e){
            e.preventDefault();
            var formData = $("#rank4_form"+form4_id).serialize();
            $.ajax({
                url: "/admin/rank4-submit",
                type: "POST",
                dataType: "json",
                data: formData,
                success: function(data){
                    if(data.status==1){
                        $(".modal").hide();
                        $('.modal-backdrop').remove();
                        $('.su').css('display', 'block');
                        $('.su').html('Data update succusfully ');
                        setTimeout(function () {
                            $('.su').fadeOut();
                        }, 2000);
                        //$(".points").load(".points");
                        $('.modal').modal('hide');
                    }
                },
            });
        });
        $("#select_4_"+form4_id).change(function(){
            //alert("Hiiiiiiiiii")
            var select_4_value = $("#select_4_"+form4_id).find(":selected").val();
            //alert(select_2_value)
            var select_4_id = form4_id;
            //alert(conceptName);
            $.ajax({
                url: "/admin/form4-select",
                type: "GET",
                data : { select_4_value : select_4_value, select_4_id : select_4_id},
                
                success: function(data){
                    if(data.ty_value == "No Option"){
                        $('.scorefield_4').css('display','none');
                        $('.button_4').css('display','none');
                    }else {
                        $('.scorefield_4').css('display','');
                        $('.button_4').css('display','');
                    }
                    $("#select4_"+form4_id).html('<option data-value="'+data.ty_value+'">'+data.ty_value+'</option>');
                    $("#scorefield_4"+form4_id).html('<input type="text" name="rank_1_number" value="{{'+data.ty_rank_value'}}">');
                    $('#score_input_form4'+form2_id).val(data.ty_rank_value);
                },
            });
        })
    }
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.var_id').click(function(){
            var showhide_id = $(this).attr('id');
            var showhide_attr = $(this).attr('attr');
            //alert(showhide_id)

            if(showhide_id == showhide_attr+'a'){
                $('#table2').css('display','none')
                $('#table1').css('display','')
            } else {
                $('#table2').css('display','')
                $('#table1').css('display','none')
            }
        });
    })
</script>

<script type="text/javascript">
    $(".updateans").click(function(e){
        e.preventDefault();
        var updateid = $(this).attr('id');
        var updateanswer = $("#updateanswer"+updateid).val();
        // alert(updateanswer);
        $('#popup_updateoption').modal('show');
        $("#updateoption").val(updateanswer);
        $("#updateoptionid").val(updateid);
        
        
    });

    $("#update_opt").click(function(e){
        e.preventDefault();
        var updateanswer = $("#updateoption").val();
        var updateid = $("#updateoptionid").val();
        $.ajax({
            url: "/admin/update-answer",
            type: "GET",
            data: {"updateid":updateid,"updateanswer":updateanswer},
            success: function(data){
                if(data.status==1){
                   $('#popup_updateoption').modal('hide'); 
                   Swal.fire(
                  'Data Updated',
                  'Successfully!',
                  'success'
                )
                }
            },
        });
    })











    $('#openpopup').click(function(e){
        e.preventDefault();
    })

    $('.updateque').click(function(e){
        e.preventDefault();
        var qid = $(this).attr('id');
        var que = $("#que"+qid).attr('rrr')
        $('#get_support').modal('show');
        $("#updatequestion").val(que);
        $("#updatequestionid").val(qid);
       

       
    })

    $("#update_question").click(function(e){
        e.preventDefault();
        var ques = $("#updatequestion").val();
        var quesid = $("#updatequestionid").val();
    

        $.ajax({
            url: "/admin/update-que",
            type: "GET",
            data: {"ques":ques,"quesid":quesid},
            success: function(data){
                if(data.status==1){
                   $('#get_support').modal('hide'); 
                   Swal.fire(
                  'Question Updated',
                  'Successfully!',
                  'success'
                )
                }
            },
        });

    })



     


    
</script>

