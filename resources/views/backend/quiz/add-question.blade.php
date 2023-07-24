@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }

    .alert-success {
      animation: cssAnimation 0s 3s forwards;
      visibility: visible;
    }

    @keyframes cssAnimation {
      to   { visibility: hidden;}
    }
</style>


<main class="content">
 

    <section class="main-content">
        <div class="alert alert-success showbiasmsg" style="text-align: center; display:none">
            Data updated successfully
        </div>
        <div class="title-head">
            <h1>Add Question </h1>
        </div>
        <div class="white-box">
            <form id="submit_add_que" class="form">
                @csrf
                <input id="quetype" type="hidden" name="question_type" value="multiple_choice_click">
                <div class="control-group">
                    <label>Question Field Type</label>
                    <div class="dropdown look-like-select">
                        <button class="dropdown-toggle text-start" type="button" id="question_type_button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="icon"><img src="{{asset('images/add-question-icon/tick-icon.png')}}" alt=""></span> Multiple Choice
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="question_type_button">
                            <li>
                                <a href="javascript:void(0)" id="multiple_choice_click" class="active clicllink">
                                    <span class="icon ">
                                        <img src="{{asset('images/add-question-icon/tick-icon.png')}}" alt="">
                                    </span> Multiple Choice
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="short_text_click" class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/short-text-icon.png')}}" alt="">
                                    </span> Short Text
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="long_text_click" class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/long-text-icon.png')}}" alt="">
                                    </span> Long Text
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="yes_no_click"  class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/yes-no-icon.png')}}" alt="">
                                    </span> Yes/No
                                </a>
                            </li>
                            <!-- <li>
                               <a href="javascript:void(0)" id="ranking_click"  class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/ranking-icon.png')}}" alt="">
                                    </span> Ranking
                                </a>
                            </li> -->
                            <li>
                                <a href="javascript:void(0)" id="email_click"  class="clicllink">
                                    <span class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </span> Email
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="phone_click" class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/phone-icon.png')}}" alt="">
                                    </span> Phone Number
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="number_click" class="clicllink">
                                    <span class="icon">
                                        <i class="fas fa-list-ol"></i>
                                    </span> Number
                                </a>
                            </li>
                            <!-- <li>
                                <a href="javascript:void(0)" id="rating_click" class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/rating-icon.png')}}" alt="">
                                    </span> Rating
                                </a>
                            </li> -->
                            <li>
                                <a href="javascript:void(0)" id="date_click" class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/date-icon.png')}}" alt="">
                                    </span> Date
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="end_screen_click" class="clicllink">
                                    <span class="icon">
                                        <img src="{{asset('images/add-question-icon/end-screen-icon.png')}}" alt="">
                                    </span> End Screen
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="control-group">
                    <label>Question</label>
                    <textarea type="text" name="question" placeholder="Write your question"></textarea>
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea type="text" name="description" placeholder="Write your question"></textarea>
                </div>
                <div class="control-group">
                    <label>Setting</label>
                    <div class="ques-setting">
                        <div class="switch-input-list"  id="addsetting">
                            <label>
                                <span>Required</span>
                                <input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0">
                            </label>
                            <label id="multiselection" class="multiselection_shohide">
                                <span>Multiple selection</span>
                                <input class="switch-input" type="checkbox" name="is_multipleselection" id="is_multipleselection" value="0">
                            </label>
                            
                        </div>
                    </div>
                </div>

                
                <div class="control-group">
                    <div class="ques-setting" id="scoretype">
                        <label>
                            <span>Is this score question</span>
                            <input  type="checkbox" class="switch-input" name="is_score_que" id="is_score_que" value="">
                        </label>
                    </div>
                </div>

                <div class="control-group" id="que_type" style="display:none">
                    <label>Scoring Type</label>
                    <select name="type_question">
                        <option value="1">Primary Gift</option>
                        <option value="2">Primary Shadow</option>
                    </select>
                </div>

                <div class="control-group" id="do_variation" style="display:none">
                    <label>Do You Need Variation</label>
                    <input  type="checkbox" class="switch-input" name="variation" id="do_variation_click" value="">
                </div>

                <div class="control-group" id="chanhetext">
                    <label>Options</label>
                    <ul id="sortable_options" class="options-list-simple">
                        <li class="ui-state-default">
                            <input type="text" placeholder="Write your option" id="simpleoption" name="simple_option[]" required>
                        </li>
                    </ul>
                    <a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a>
                </div>







                <div class="control-group" id="simple_multi_qus" style="display:none">
                    <label>Options - <span style="color:#8A2F35">Variation 1</span></label>
                    <ul id="sortable_options" class="options-list">
                        <li class="ui-state-default">
                            <input type="text" placeholder="Write your option">
                        </li>
                    </ul>
                    <a id="addmore_option1" href="javascript:void(0)" class="add-btn">Add choice</a>
                </div>

                <div class="control-group" id="simple_multi_qus2" style="display:none">
                    <label>Options - <span style="color:#8A2F35">variation 2</span></label>
                    <ul id="sortable_options" class="options-list">
                        <li class="ui-state-default">
                            <input type="text" placeholder="Write your option">
                        </li>
                    </ul>
                    <a id="addmore_option2" href="javascript:void(0)" class="add-btn">Add choice</a>
                </div>



                <div id="showupformulti">

                    <div class="control-group" id="add_more_choice1" style="display: none;">
                        <label>Options - <span style="color:#8A2F35">Variation 1</span></label>
                        <ul id="sortable_options" class="options-list">
                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Passion">                            
                                <input type="hidden" name="value_2[]" value="Addiction">
                                <input type="hidden" name="value_3[]" value="Internal">
                                <input type="hidden" name="value_4[]" value="Implicit">
                                <input type="hidden" name="value_5[]" value="Directive">
                                <input type="hidden" name="value_6[]" value="Autonomous">
                                <input type="hidden" name="value_7[]" value="Initiation">

                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Devotion">                            
                                <input type="hidden" name="value_2[]" value="Anxious">
                                <input type="hidden" name="value_3[]" value="External">
                                <input type="hidden" name="value_4[]" value="No Option">
                                <input type="hidden" name="value_5[]" value="Collaborative">
                                <input type="hidden" name="value_6[]" value="Engaged">
                                <input type="hidden" name="value_7[]" value="No option">


                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Truth">                            
                                <input type="hidden" name="value_2[]" value="Control">
                                <input type="hidden" name="value_3[]" value="Internal">
                                <input type="hidden" name="value_4[]" value="Explicit">
                                <input type="hidden" name="value_5[]" value="Directive">
                                <input type="hidden" name="value_6[]" value="Autonomous">
                                <input type="hidden" name="value_7[]" value="Initiation">


                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Harmony">                            
                                <input type="hidden" name="value_2[]" value="Collapse">
                                <input type="hidden" name="value_3[]" value="External">
                                <input type="hidden" name="value_4[]" value="Implicit">
                                <input type="hidden" name="value_5[]" value="Collaborative">
                                <input type="hidden" name="value_6[]" value="Engaged">
                                <input type="hidden" name="value_7[]" value="Reciprocating">


                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Possibility">                            
                                <input type="hidden" name="value_2[]" value="Complaint">
                                <input type="hidden" name="value_3[]" value="No Option">
                                <input type="hidden" name="value_4[]" value="Explicit">
                                <input type="hidden" name="value_5[]" value="No Option">
                                <input type="hidden" name="value_6[]" value="No Option">
                                <input type="hidden" name="value_7[]" value="Initiation">


                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Freedom">                            
                                <input type="hidden" name="value_2[]" value="Avoidance">
                                <input type="hidden" name="value_3[]" value="Internal">
                                <input type="hidden" name="value_4[]" value="No Option">
                                <input type="hidden" name="value_5[]" value="Directive">
                                <input type="hidden" name="value_6[]" value="Autonomous">
                                <input type="hidden" name="value_7[]" value="No option">


                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Partnership">                            
                                <input type="hidden" name="value_2[]" value="Addiction">
                                <input type="hidden" name="value_3[]" value="External">
                                <input type="hidden" name="value_4[]" value="Explicit">
                                <input type="hidden" name="value_5[]" value="Collaborative">
                                <input type="hidden" name="value_6[]" value="Engaged">
                                <input type="hidden" name="value_7[]" value="Reciprocating">


                            <li class="ui-state-default">
                                <input type="text" name="question_option[]" placeholder="Write your option" class="option1required">
                            </li>

                                <input type="hidden" name="value[]" value="Appreciation">                            
                                <input type="hidden" name="value_2[]" value="Defense">
                                <input type="hidden" name="value_3[]" value="No Option">
                                <input type="hidden" name="value_4[]" value="Implicit">
                                <input type="hidden" name="value_5[]" value="No Option">
                                <input type="hidden" name="value_6[]" value="No Option">
                                <input type="hidden" name="value_7[]" value="Reciprocating">
                            </li>
                        </ul>
                        
                    </div>




                   

                    <div class="control-group" id="add_more_choice2" style="display: none;">
                        <label>Options - <span style="color:#8A2F35">Variation 2</span></label>
                        <ul id="sortable_options" class="options-list">
                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Passion">                            
                                <input type="hidden" name="value_2_2[]" value="Addiction">
                                <input type="hidden" name="value_3_2[]" value="Internal">
                                <input type="hidden" name="value_4_2[]" value="Implicit">
                                <input type="hidden" name="value_5_2[]" value="Directive">
                                <input type="hidden" name="value_6_2[]" value="Autonomous">
                                <input type="hidden" name="value_7_2[]" value="Initiation">

                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Devotion">                            
                                <input type="hidden" name="value_2_2[]" value="Anxious">
                                <input type="hidden" name="value_3_2[]" value="External">
                                <input type="hidden" name="value_4_2[]" value="No Option">
                                <input type="hidden" name="value_5_2[]" value="Collaborative">
                                <input type="hidden" name="value_6_2[]" value="Engaged">
                                <input type="hidden" name="value_7_2[]" value="No option">


                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Truth">                            
                                <input type="hidden" name="value_2_2[]" value="Control">
                                <input type="hidden" name="value_3_2[]" value="Internal">
                                <input type="hidden" name="value_4_2[]" value="Explicit">
                                <input type="hidden" name="value_5_2[]" value="Directive">
                                <input type="hidden" name="value_6_2[]" value="Autonomous">
                                <input type="hidden" name="value_7_2[]" value="Initiation">


                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value[]_2" value="Harmony">                            
                                <input type="hidden" name="value_2_2[]" value="Collapse">
                                <input type="hidden" name="value_3_2[]" value="External">
                                <input type="hidden" name="value_4_2[]" value="Implicit">
                                <input type="hidden" name="value_5_2[]" value="Collaborative">
                                <input type="hidden" name="value_6_2[]" value="Engaged">
                                <input type="hidden" name="value_7_2[]" value="Reciprocating">


                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Possibility">                            
                                <input type="hidden" name="value_2_2[]" value="Complaint">
                                <input type="hidden" name="value_3_2[]" value="No Option">
                                <input type="hidden" name="value_4_2[]" value="Explicit">
                                <input type="hidden" name="value_5_2[]" value="No Option">
                                <input type="hidden" name="value_6_2[]" value="No Option">
                                <input type="hidden" name="value_7_2[]" value="Initiation">


                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Freedom">                            
                                <input type="hidden" name="value_2_2[]" value="Avoidance">
                                <input type="hidden" name="value_3_2[]" value="Internal">
                                <input type="hidden" name="value_4_2[]" value="No Option">
                                <input type="hidden" name="value_5_2[]" value="Directive">
                                <input type="hidden" name="value_6_2[]" value="Autonomous">
                                <input type="hidden" name="value_7_2[]" value="No option">


                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Partnership">                            
                                <input type="hidden" name="value_2_2[]" value="Addiction">
                                <input type="hidden" name="value_3_2[]" value="External">
                                <input type="hidden" name="value_4_2[]" value="Explicit">
                                <input type="hidden" name="value_5_2[]" value="Collaborative">
                                <input type="hidden" name="value_6_2[]" value="Engaged">
                                <input type="hidden" name="value_7_2[]" value="Reciprocating">


                            <li class="ui-state-default">
                                <input type="text" name="question_option_2[]" placeholder="Write your option" class="option2required">
                            </li>

                                <input type="hidden" name="value_2[]" value="Appreciation">                            
                                <input type="hidden" name="value_2_2[]" value="Defense">
                                <input type="hidden" name="value_3_2[]" value="No Option">
                                <input type="hidden" name="value_4_2[]" value="Implicit">
                                <input type="hidden" name="value_5_2[]" value="No Option">
                                <input type="hidden" name="value_6_2[]" value="No Option">
                                <input type="hidden" name="value_7_2[]" value="Reciprocating">
                            </li>
                        </ul>
                        
                    </div>
                </div>


                
                <!-- <div class="control-group">
                    <label>Setting</label>
                    <div class="ques-setting">
                        <div class="switch-input-list">
                            <label>
                                <span>Required</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                            <label>
                                <span>Multiple selection</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                            <label>
                                <span>Randomize</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                            <label>
                                <span>"Other" option</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                        </div>
                    </div>
                </div> -->
              

                


                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </section>
    <aside class="ques-aside">
        <div class="single">
            <div class="d-flex align-items justify-content-between equal_gutter">
                <label class="mb-0">Add background image</label>
                <button href="javascript:void(0)" class="btn btn-grey sm upload-btn">
                    Add <input type="file" id="background_image_upload" accept=".png, .jpg, .jpeg">
                </button>
                <div id="background_image_preview" class="upload-preview" style="display: none;">
                    <figure></figure>
                </div>
            </div>
        </div>
        <div class="single">
            @include('backend.quiz.all-quiz-question')
        </div>
    </aside>
</main>

@include('layouts.dashboard.footer')
<script>
    $(document).ready(function () {

      $('#is_score_que').click(function () {

       if ($(this).prop('checked')) {
            $('#is_score_que').val(1)
            $('#chanhetext').css('display','none');
            $('#simple_multi_qus').css('display','');
            $('#do_variation').css('display',''); 
            $('#que_type').css('display',''); 
            $('#simpleoption').prop('required',false);
            $('.option1required').prop('required',true); 
            $('.multiselection_shohide').css("display","none")
           
       }
        else {
           $('#is_score_que').val(0)
           $('#chanhetext').css('display','');
           $('#simple_multi_qus').css('display','none');
           $('#do_variation').css('display','none'); 
           $('#simple_multi_qus2').css('display','none') 
           $('#que_type').css('display','none'); 
           $('#simpleoption').prop('required',true); 
           $('.option1required').prop('required',false); 
           $('.multiselection_shohide').css("display","")
           
       }
     });
    // Code for Required option  
    $('#addsetting').on('click', '.is_required', function() {
    // $('.is_required').click(function () {
        if ($(this).prop('checked')) {
            $('.is_required').val(1)            
       }
        else {
           $('.is_required').val(0)           
       }
     });
    // Code for Required option  
    $('#is_multipleselection').click(function () {
       if ($(this).prop('checked')) {
            $('#is_multipleselection').val(1)  
            $('#scoretype').css("display","none")          
       }
        else {
           $('#is_multipleselection').val(0)    
           $('#scoretype').css("display","")        
       }
     });

    // Code for Required option  
    $('#addsetting').on('click', '.is_maxchar', function() {
    // $('.is_required').click(function () {
        if ($(this).prop('checked')) {
            $('.is_maxchar').val(1)            
       }
        else {
           $('.is_maxchar').val(0)           
       }
     });

    

    


      $('#addmore_option1').click(function () {
        $('#add_more_choice1').css('display','')
        $('#simple_multi_qus').css('display','none')          
      });

      $('#do_variation_click').click(function () {

       if ($(this).prop('checked')) {
            $('#do_variation_click').val(1)
            $('#simple_multi_qus2').css('display','')   
            $('.option2required').prop('required',true); 
            $('.option1required').prop('required',true);     
                
       }else {
           $('#is_score_que').val(0)
           $('#simple_multi_qus2').css('display','none')
            $('.option2required').prop('required',false); 
            $('.option1required').prop('required',false);   
       }
     });

      $('#addmore_option2').click(function () {
        $('#add_more_choice2').css('display','')
        $('#simple_multi_qus2').css('display','none')          
      });


  

  });
</script>

<script>
     $(document).ready(function(){

        $('.clicllink').click(function(){
            
            var click_value = $(this).attr('id');
            // alert(click_value);
            if(click_value == "multiple_choice_click"){
                $('#quetype').val('multiple_choice_click')
                $('#do_variation').show();
                $('#scoretype').show();
                $('#showupformulti').css('display','');
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/tick-icon.png")}}" alt=""></span>Multiple Choice'); 
                $("#addsetting").html('<label class="multiselection_shohide"><span>Multiple selection</span><input class="switch-input" type="checkbox" name="is_multipleselection" id="is_multipleselection" value="0"></label>')
                $('#do_variation').css('display','none');           
            }else if(click_value == "short_text_click"){
                $('#quetype').val('short_text_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $('#showupformulti').css('display','none');
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/short-text-icon.png")}}" alt=""></span>Short Text');
                $("#multiple_choice_click").removeClass("active");
                $("#short_text_click").addClass("active");
                // $('#short_text_click').css("background-color", "rgba(138,47,53,0.1)");                
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" placeholder="Write your answers" readonly>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label><label><span>Max characters</span><input class="switch-input is_maxchar" type="checkbox" name="is_maxchar" id="is_maxchar" value="0"><input type="number" placeholder="1-999999999" style="display: none;" name="is_maxchar_no" id="is_maxchar_no"></label>')
                
            }else if(click_value == "long_text_click"){
                $('#quetype').val('long_text_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#long_text_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/long-text-icon.png")}}" alt=""></span>Long Text');
                // $('#long_text_click').css("background-color", "rgba(138,47,53,0.1)");
                
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" placeholder="Write your answers" readonly>')
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label><label><span>Max characters</span><input class="switch-input is_maxchar" type="checkbox" name="is_maxchar" id="is_maxchar" value="0"><input type="number" placeholder="1-999999999" style="display: none;" name="is_maxchar_no" id="is_maxchar_no"></label>')
            }else if(click_value == "yes_no_click"){
                $('#quetype').val('yes_no_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#yes_no_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/yes-no-icon.png")}}" alt=""></span>Yes/No');
                $("#chanhetext").html('<label>Yer or No</label><div class="row"><div class="col-md-3"><input class="mb-3" type="text" placeholder="Yes" name="yes" readonly><input type="text" placeholder="No" name="no" readonly></div></div>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "ranking_click"){
                $('#quetype').val('ranking_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#ranking_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/ranking-icon.png")}}" alt=""></span>Ranking');                
                $("#chanhetext").html('<div class="row flex-md-row-reverse"><div class="col-md-4"><div class="row row-cols-2 row-cols-md-1"><div class="col"><div class="control-group"><label>How many top rankings?</label><select name="top-ranking"> <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option></select></div></div><div class="col"><div class="control-group mb-0"><label>Rank least option?</label><select name="least-ranking"><option value="yes">Yes</option><option value="no">No</option></select></div></div></div></div><div class="col-md-8"><label>Drag and drop to rank options</label><ul id="sortable_options" class="options-list-simple right-space"><li class="ui-state-default"><input type="text" placeholder="Write your option"></li></ul><a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a></div></div>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "email_click"){
                $('#quetype').val('email_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#email_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><i class="fas fa-list-ol"></i></span>Email');                
                $("#chanhetext").html('<label>Email</label><input type="text" name="email" placeholder="Write your email" readonly>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "phone_click"){
                $('#quetype').val('phone_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#phone_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/phone-icon.png")}}" alt=""></span>Phone Number');
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" placeholder="Write your answers" readonly>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "number_click"){
                $('#quetype').val('number_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#number_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><i class="fas fa-list-ol"></i></span>Number');                
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" placeholder="Write your answers" readonly>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input is_required" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "rating_click"){
                $('#quetype').val('rating_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#rating_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/rating-icon.png")}}" alt=""></span>Rating');                
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label><div class="rating-options look-like-select"><select name="rating-count" class="small-select"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05" selected>5</option></select><select name="icon" class="select2-icon"><option value="fa-star" data-icon="fa-star" selected>Stars</option><option value="fa-heart" data-icon="fa-heart">Hearts</option><option value="fa-user" data-icon="fa-user">User</option><option value="fa-thumbs-up" data-icon="fa-thumbs-up">Thumbs Up</option><option value="fa-crown" data-icon="fa-crown">Crown</option><option value="fa-cat" data-icon="fa-cat">Cats</option><option value="fa-dog" data-icon="fa-dog">Dogs</option><option value="fa-circle" data-icon="fa-circle">Circles</option><option value="fa-flag" data-icon="fa-flag">Flags</option><option value="fa-tint" data-icon="fa-tint">Droplets</option><option value="fa-check" data-icon="fa-check">Ticks</option><option value="fa-lightbulb" data-icon="fa-lightbulb">Lightbulbs</option><option value="fa-cloud" data-icon="fa-cloud">Clouds</option><option value="fa-bolt" data-icon="fa-bolt">Thunderbolts</option><option value="fa-pencil-alt" data-icon="fa-pencil-alt">Pencils</option><option value="fa-skull" data-icon="fa-skull">Skulls</option></select></div></div></div>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "date_click"){
                $('#quetype').val('date_click')
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#date_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/date-icon.png")}}" alt=""></span>Date');                
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label></div><div class="date-options equal_gutter"><label>Date format</label><select name="date-format" class="mb-3"><option value="MMDDYYYY">MMDDYYYY</option><option value="DDMMYYYY">DDMMYYYY</option><option value="YYYYMMDD">YYYYMMDD</option></select><select name="date-separator"><option value="01">/</option><option value="02">-</option><option value="03">.</option></select></div></div>');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }else if(click_value == "end_screen_click"){
                $('#quetype').val('end_screen_click');
                $('#do_variation').hide();
                $('#scoretype').hide();
                $('#simple_multi_qus').hide();
                $('#simple_multi_qus2').hide();
                $('#add_more_choice1').hide();
                $('#add_more_choice2').hide();
                $(".clicllink").removeClass("active");
                $("#end_screen_click").addClass("active");
                $("#question_type_button").html('<span class="icon"><img src="{{asset("images/add-question-icon/end-screen-icon.png")}}" alt=""></span>End Screen');          
                $("#chanhetext").html('<label>Email</label><input type="text" name="email" placeholder="Write your email">');
                $('#multiselection').css('display','none');
                $("#addsetting").html('<label><span>Required</span><input class="switch-input" type="checkbox" name="is_required" id="is_required" value="0"></label>')
            }
        });
        
     });


// Add question
$("#submit_add_que").submit(function(e){
     e.preventDefault();
     var formData = $("#submit_add_que").serialize();
         $.ajax({
          url: "/multiple-question",
          type: "POST",
          dataType: "json",
          data: formData,
          success: function(data){
            if(data.status==1){
                // $( "#queque" ).load(window.location.href + " #queque" ); 
                
                
                Swal.fire(
                  'New question added in draft!',
                  'Successfully!',
                  'success'
                )
                $('#submit_add_que')[0].reset();
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 2000);
                //$(".content").load(location.href + " .content>*", "");

            }
          }
      });
  })


$(document).on("click", '#add_more_option', function () {
    $('.options-list-simple').append('<li class="ui-state-default"><input type="text" name="simple_option[]" placeholder="Write your option" required><a href="javascript:void(0)" class="remove-option"><i class="las la-times"></i></a></li>');
});
$(document).on("click", '.remove-option', function () {
    $(this).parent().remove();
});

// Script for delete
// $(".delete_question").click(function(){
//     var delete_id = $(this).attr('id');  
//     alert(delete_id)
//      $.ajax({
//           url: "/delete-question_id",
//           type: "GET",
//           data: {"delete_id": delete_id},
          
//           success: function(data){
//             if(data.status==1){
//                 Swal.fire(
//                   'Question Deleted!',
//                   'Successfully!',
//                   'success'
//                 )
//                 setTimeout(function(){// wait for 5 secs(2)
//                     location.reload(); // then reload the page.(3)
//                 }, 2000);
//             }
//           }
//       });

// });

// function delete_questions(id){
// var delete_id = id;
// $.ajax({
//       url: "/delete-question_id",
//       type: "GET",
//       data: {"delete_id": delete_id},
      
//       success: function(data){
//         if(data.status==1){
//             Swal.fire(
//               'Question Deleted!',
//               'Successfully!',
//               'success'
//             )
//             setTimeout(function(){// wait for 5 secs(2)
//                 location.reload(); // then reload the page.(3)
//             }, 2000);
//         }
//       }
//   });
// }

</script>