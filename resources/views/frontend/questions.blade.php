@include('layouts.header-quiz')
<main class="content quiz-pages">
    <section class="quiz-screen" style="background-image: url('{{ asset('images/Relationship Dynamics Institute Background Image - Union 60_ Jennifer Russell Bryan Franklin-min.png')}}');">
    <a href="/" class="site-logo">
            <img src="{{ asset('images/evolving-love-logo.png')}}" alt="">
        </a>
        <div class="container">
            <form method="post" id="question-submit">
                @csrf
                <div id="question1">
                    <!--div class="inner">
                        <h3 class="quiz-question">
                            <span><small>1)</small> What is your current relationship status?*</span>
                        </h3>
                        <div class="form type-checkbox w-100 mb-3">
                            <label>
                                <input type="radio" name="question1" value="I'm currently single and happy to stay that way for now">
                                <span>I'm currently single and happy to stay that way for now</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm currently single and wanting to find a relationship">
                                <span>I'm currently single and wanting to find a relationship</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm in a relationship that's really on the rocks">
                                <span>I'm in a relationship that's really on the rocks</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm in a relationship that's good but it's got some challenges">
                                <span>I'm in a relationship that's good but it's got some challenges</span>
                            </label>
                            <label>
                                <input type="radio" name="question1" value="I'm in a relationship that's in bliss">
                                <span>I'm in a relationship that's in bliss</span>
                            </label>
                            <label style="border: none;"><span class="text-danger" id="question1-error"></span></label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-white mt-3" id="next1" onClick="question1();">Next</a>
                    </div-->
                </div>
            </form>
        </div>
        <div class="bottom-links">

        </div>
    </section>
</main>
<style>
.quiz-screen .form.type-checkbox.yes-no label input[type=checkbox]:after, .quiz-screen .form.type-checkbox.yes-no label input[type=radio]:after {
    content: "N";
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<?php 
$session = session()->all();
if(isset($session['form'])){
    $form= $session['form'];
}
else{
    $form="0";
}

?>
<style>
    .text-danger {
        color: #fff !important;
    }
</style>
<script>
    
$("#question-submit").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    e.preventDefault();
    var idd =  $('.sub_btn').attr('id');
    // if(question==""){
    //     $("#question-error"+idd).html('This field is required.');  
    //    return false;
    // }
    var type = $('.sub_btn').attr('question');
    var question=  $("input[name='question"+idd+"']").val();
    if(type=="phone_click"){
    var testphone = /^[0-9]+$/;
    if($("input[name='question"+idd+"']").hasClass('required')){
        $("#question-error"+idd).html('This field is required.');
        return false;
    }
    if(question !=""){
    if(!testphone.test($("input[name='question"+idd+"']").val())){
        $("#question-error"+idd).html('Enter numeric values only.');
        return false;
    }
    }
    }

    else if(type=="email_click"){
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if($("input[name='question"+idd+"']").hasClass('required')){
        if($("input[name='question"+idd+"']").val()==""){
            $("#question-error"+idd).html('This field is required.');  
            return false;
        }else if( !testEmail.test( $("input[name='question"+idd+"']").val() ) ) {
            $("#question-error"+idd).html('Please enter valid Email ID.');  
            return false;
        }
        }
        if($("input[name='question"+idd+"']").hasClass('required')){
        if ($("input[name='email_concent']:checked").length=="0") {
            $("#question-email_concent").html('This field is required.');  
            return false;            
        }
        }
       
      
    }
    else if(type=="short_text_click" || type=="phone_click"){
        if($("input[name='question"+idd+"']").hasClass('required')){
            if($("input[name='question"+idd+"']").val()==""){
            $("#question-error"+idd).html('This field is required.');  
            return false;
        }
        }
        
        if($("input[name='question"+idd+"']").hasClass('maxchar')){
            var max = $("input[name='question"+idd+"']").attr('max');
            var length_length = $("input[name='question"+idd+"']").val();
            if(length_length.length>max){
            $("#question-error"+idd).html('You have exceeded the maximum amount of characters.');  
            return false;
            }

        } 
    }

    else if(type=="swipe_question"){
        if($('#question'+idd).hasClass('required')){
        var numItems = $('#question'+idd+' ul li .ui-draggable-handle').length;
        if(numItems<4){
            $("#question-error"+idd).html('Please select four choices.');
            return false;
        }
        }
        
    }
    else if(type=="multiple_choice"){
        var values = [];
        $.each($("input[name='question"+idd+"']:checked"), function(){
        values.push($(this).val());
        }); 
        if($("input[name='question"+idd+"']").hasClass('required')){
        if(values==""){
            $("#question-error"+idd).html('This field is required.');
            return false;
        }
        }

    }
    else if(type=="multiple_choice_click" || type=="yes_no_click"){
    if($("input[name='question"+idd+"']").hasClass('required')){
    if (!$("input[name='question"+idd+"']:checked").val()) {
        $("#question-error"+idd).html('Please select atleast one option.');  
       return false;
    }
    }
    }

    else if(type=="number_click"){
        if($('#question'+idd).hasClass('required')){
            if($("input[name='question"+idd+"']").val()==""){
            $("#question-error"+idd).html('This field is required.');  
            return false;
        }
    }
    }

    else if(type=="long_text_click"){alert('test');
        if($('#question'+idd).hasClass('required')){alert('test1');
            if($("#question"+idd).val()==""){
            $("#question-error"+idd).html('This field is required.');  
            return false;
        }
        }
        if($("#question"+idd).hasClass('maxchar')){
            var max = $("#question"+idd).attr('max');
            var length_length = $("#question"+idd).val();
            if(length_length.length>max){
            $("#question-error"+idd).html('You have exceeded the maximum amount of characters.');  
            return false;
            }

        } 
    
    }

    else if(type =="date_click"){
        if($('#question'+idd).hasClass('required')){
            if($("#question"+idd).val()==""){
            $("#question-error"+idd).html('This field is required.');  
            return false;
        }
        }
    }

    // if ($("input[name='phone_concent']:checked").length=="0") {
    //         $("#question-phone_concent").html('This field is required.');  
    //         return false;
    // }
    
    $('.sub_btn').attr("disabled", true);
    $(".sub_btn").html('Submitting...')
    var formData = $("#question-submit").serialize();
    $.ajax({
      url: "/survey-form",
      type: "POST",
      dataType: "json",
      data: {id:idd,question:question },
      success: function (data) {
        if (data.status == 1) {
            window.location = "/thankyou";          
        }

      },
    });
});

$( document ).ready(function() {
    $.ajax({
      url: "/get-questions",
      type: "GET",
      success:function(data){
			 $('#question1').html(data);
		}
    }); 
});

function nextquestion(id, type){

    var cid = id-1;

    if(type=="multiple_choice_click" || type=="yes_no_click"){
    if($("input[name='question"+cid+"']").hasClass('required')){
    if (!$("input[name='question"+cid+"']:checked").val()) {
        $("#question-error"+cid).html('Please select atleast one option.');  
       return false;
    }
    }
    }

    else if(type=="email_click"){
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if($("input[name='question"+cid+"']").hasClass('required')){
        if($("input[name='question"+cid+"']").val()==""){
            $("#question-error"+cid).html('This field is required.');  
            return false;
        }else if( !testEmail.test( $("input[name='question"+cid+"']").val() ) ) {
            $("#question-error"+cid).html('Please enter valid Email ID.');  
            return false;
        }
        }
        if($("input[name='question"+cid+"']").hasClass('required')){
        if ($("input[name='email_concent']:checked").length=="0") {
            $("#question-email_concent").html('This field is required.');  
            return false;            
        }
        }
       
      
    }

    else if(type=="phone_click"){
        var testphone = /^[0-9]+$/;
        if($("input[name='question"+cid+"']").hasClass('required')){
        if($("input[name='question"+cid+"']").val()==""){
            $("#question-error"+cid).html('This field is required.');  
            return false;
        }
        }
        if($("input[name='question"+cid+"']").val()!=""){
        if(!testphone.test($("input[name='question"+cid+"']").val())) {
            $("#question-error"+cid).html('Enter numeric values only.');
            return false;
        }
        }
        // if ($("input[name='phone_concent']:checked").length=="0") {
        //     $("#question-phone_concent").html('This field is required.');  
        //     return false;
        // }
      
    }



    else if(type=="short_text_click" || type=="phone_click"){
        if($("input[name='question"+cid+"']").hasClass('required')){
            if($("input[name='question"+cid+"']").val()==""){
            $("#question-error"+cid).html('This field is required.');  
            return false;
        }
        
        }
        if($("input[name='question"+cid+"']").hasClass('maxchar')){
            var max = $("input[name='question"+cid+"']").attr('max');
            var length_length = $("input[name='question"+cid+"']").val();
            if(length_length.length>max){
            $("#question-error"+cid).html('You have exceeded the maximum amount of characters.');  
            return false;
            }

        }
        
      
    }
    else if(type=="swipe_question"){
        if($('#question'+cid).hasClass('required')){
        var numItems = $('#question'+cid+' ul li .ui-draggable-handle').length;
        if(numItems<4){
            $("#question-error"+cid).html('Please select four choices.');
            return false;
        }
        }
        
    }
    else if(type=="multiple_choice"){
        var values = [];
        $.each($("input[name='question"+cid+"']:checked"), function(){
        values.push($(this).val());
        }); 
        if($("input[name='question"+cid+"']").hasClass('required')){
        if(values==""){
            $("#question-error"+cid).html('This field is required.');
            return false;
        }
        }

    }

    else if(type=="number_click"){
        if($('#question'+cid).hasClass('required')){
            if($("input[name='question"+cid+"']").val()==""){
            $("#question-error"+cid).html('This field is required.');  
            return false;
        }
       }
    }
    
    else if(type=="long_text_click"){
        if($('#question'+cid).hasClass('required')){
            if($("#question"+cid).val()==""){
            $("#question-error"+cid).html('This field is required.');  
            return false;
        }
        if($("#question"+cid).hasClass('maxchar')){
            var max = $("#question"+cid).attr('max');
            var length_length = $("#question"+cid).val();
            if(length_length.length>max){
            $("#question-error"+cid).html('You have exceeded the maximum amount of characters.');  
            return false;
            }

        } 
    }
    }

    else if(type=="date_click"){
        if($('#question'+cid).hasClass('required')){
            if($("#question"+cid).val()==""){
            $("#question-error"+cid).html('This field is required.');  
            return false;
        }
    }
    }


    ajax(id, type);
        
  
}

function session(){
    var id = "5";
    $.ajax({
      url: "/add-session",
      type: "GET",
      data: { id : id },
      success:function(data){
			 $('#question1').html(data);
		}
    }); 
}

function sessionadd(id){
    // var id = "12";
    $.ajax({
      url: "/add-shadow-session",
      type: "GET",
      data: { id : id },
      success:function(data){
			 $('#question1').html(data);
		}
    }); 
}

function prequestion(id, type, value,ismutli){
    if(ismutli=="multi"){
        var result = String(value);
        var question = result.split(',');
    }
    else if(ismutli=="multi_check"){
        var result = String(value);
        var question = result.split('|');
    }
    else{
        var question= value;
    }
    $.ajax({
      url: "/get-next-questions",
      type: "GET",
      data: { id : id, question:question, ispre:id },
      success:function(data){
			 $('#question1').html(data);
		}
    }); 

    // ajax(id, type);
}

function ajax(id, type){
   var cid = id-1;
   if(type=="multiple_choice_click" || type=="yes_no_click"){
   var question = $("input[name='question"+cid+"']:checked").val();
   }
  else if(type=="swipe_question"){
    var question=  $("input[name='question"+cid+"[]']").map(function () {
    return this.value; // $(this).val()
    }).get();
   }
   else if(type=="short_text_click" || type=="email_click" || type=="phone_click"){
    var question=  $("input[name='question"+cid+"']").val();
   }
   else if(type=="multiple_choice"){
    var values = [];
    $.each($("input[name='question"+cid+"']:checked"), function(){
        values.push($(this).val());
    });
    // for (var i = 0; i < values.length; i++) {
    //     values[i] = values[i]+"|";
  
    // }
   var question = values;
   
    // var question=  $("input[name='question"+cid+"']").val();
  
   }

    $.ajax({
      url: "/get-next-questions",
      type: "GET",
      data: { id : id, question:question },
      success:function(data){
			 $('#question1').html(data);
		}
    }); 
}


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

