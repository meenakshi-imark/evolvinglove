// For Developer Use
function question1(){
    $('input[name="question1"]:checked').each(function() {
        $("#question2").show();
        $("#question1").hide();
        $("#next1").hide();
        $("#qstn1").show();
        $("#nextqstn2").show();
        $("#nextqstn1").hide();
    });
    if($(this).prop('checked') != true){
    $("#question1-error").html('Please select atleast one option.');
    }
}

function question2(){

    $('input[name="question2"]:checked').each(function() {
    $("#question1").hide();
    $("#question3").show();
    $("#question2").hide();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").show();

    $("#qstn1").hide();
    $("#qstn2").show();
    });
    if($(this).prop('checked') != true){
        $("#question2-error").html('Please select atleast one option.');
    }
}

function question3(){
    $('input[name="question3"]:checked').each(function() {
    $('[name="question3"]').each( function (){
        if($(this).prop('checked') == true){
            var value =$(this).val();
            // $('.replace').html($('.replace').html().replace('Which type of relationship would you like to profile today?',value));
            //  $('#question6').html($('#question6').html().replace('Which type of relationship would you like to profile today?',value));
            //  $('#question8').html($('#question8').html().replace('Which type of relationship would you like to profile today?',value));
            // $('#question9').html($('#question9').html().replace('Which type of relationship would you like to profile today?',value));
            // $('#question10').html($('#question10').html().replace('Which type of relationship would you like to profile today?',value));
            $('#question4').html($('#question4').html().replace('Which type of relationship would you like to profile today?',value));
            $(".replace6 span").text($(".replace6 span").text().replace("Which type of relationship would you like to profile today?", value));
            $(".replace8 span").text($(".replace8 span").text().replace("Which type of relationship would you like to profile today?", value));
            $(".replace9 span").text($(".replace9 span").text().replace("Which type of relationship would you like to profile today?", value));
            $(".replace10 span").text($(".replace10 span").text().replace("Which type of relationship would you like to profile today?", value));
            if(value!="romantic partner"){
                $("#answer6-1 span").html($("#answer6-1 span").html().replace("Being sensual and making things exciting and fun between us", 'Being passionate and bringing excitement and enthusiasm to what we are doing'));
                $("#answer6-2 span").html($("#answer6-2 span").html().replace("Being committed and staying connected so that my partner knows that they are loved", 'Making our relationship a high priority'));
                $("#answer6-6 span").html($("#answer6-6 span").html().replace("Being encouraging about us each exploring our individual interest and desires", 'Being encouraging about us each pursuing our individual interests'));
                $("#answer8-7 span").html($("#answer8-7 span").html().replace("Being complimentary and letting them know what I love about them", 'Making myself available to them so that they feel supported'));
               
                $("#answer9-1 span").html($("#answer9-1 span").html().replace("De-escalate and help to restore positive feelings between us", 'De-escalate and help to create more positive interactions between us'));
                $("#answer9-3 span").html($("#answer9-3 span").html().replace("Make sure we each get all our needs met", 'Support more of their freedom and agency in the situation'));
                $("#answer9-5 span").html($("#answer9-5 span").html().replace("Be aware of everyone's positive intentions even if I'm hurt", "Be aware of everyone's positive intentions knowing we are all doing the best we can"));
                $("#answer9-7 span").html($("#answer9-7 span").html().replace("Reaffirming my love and commitment even when it's hard", 'Restore trust by affirming my commitment to our relationship'));
                $("#answer9-8 span").html($("#answer9-8 span").html().replace("Help us get out of our heads and into our bodies to help change our state", 'Try to break the tension and encourage us to lighten up'));
          
                $("#answer10-1 span").html($("#answer10-1 span").html().replace("Living my values and creating an inspiring vision for our relationship", 'Living my values and creating an inspiring vision for the future'));
                $("#answer10-4 span").html($("#answer10-4 span").html().replace("Tracking what has my partner feel the most loved and adored", 'Tracking what has them feel the most supported'));
                $("#answer10-7 span").html($("#answer10-7 span").html().replace("Keeping the spark alive and my attraction for my partner high", 'Keeping us energized and inspiring fresh creativity'));

                $("#answer14-7 span").html($("#answer14-7 span").html().replace("Pleasure", 'Fun'));

                $("#answer16-1 span").html($("#answer16-1 span").html().replace("I'll be misled lied to or betrayed by my partner", "I'll be misled lied to or betrayed"));
                $("#answer16-2 span").html($("#answer16-2 span").html().replace("My partner's needs will get in the way of me having what I want", "Other's needs will get in the way of me having what I want"));
                $("#answer16-3 span").html($("#answer16-3 span").html().replace("I'll end up alone. My partner will leave me", "I'll end up excluded.  I'm afraid they aren't as committed to me"));
           
            }

        }
    });
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").show();
    });
    if($(this).prop('checked') != true){
        $("#question3-error").html('Please select atleast one option.');
    }
}

function question4(){
    $('input[name="question2"]:checked').each(function() {
        chkId = $(this).val();
    });
    if(chkId=="Yes"){
        var val = $("input[name=question4]"). val()
        if(val !=""){
            $("#question1").hide();
            $("#question2").hide();
            $("#question3").hide();
            $("#question4").hide();
            $("#part1").show();
            $("#nextqstn1").hide();
            $("#nextqstn2").hide();
            $("#nextqstn3").hide();
            $("#nextqstn4").hide();
            $("#nextqstn5").show();
    
            $("#qstn1").hide();
            $("#qstn2").hide();
            $("#qstn3").hide();
            $("#qstn4").show();
        }
        else{
            $("#question4-error").html('Please select atleast one option.');
        }
    }
    else{
        var val = $("input[name=question4]"). val()
        
            $("#question1").hide();
            $("#question2").hide();
            $("#question3").hide();
            $("#question4").hide();
            $("#part1").show();
            $("#nextqstn1").hide();
            $("#nextqstn2").hide();
            $("#nextqstn3").hide();
            $("#nextqstn4").hide();
            $("#nextqstn5").show();
    
            $("#qstn1").hide();
            $("#qstn2").hide();
            $("#qstn3").hide();
            $("#qstn4").show();
        
    }
       
 
    
}

function part1(){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").show();
}

function question5(){
    // $('input[name="question3"]:checked').each(function() {
    //     var value =$(this).val();
    //     $('#question8').html($('#question8').html().replace('Which type of relationship would you like to profile today?',value));
    // });
    var count = $('#question5 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").show();
    }
    else{
        $("#question5-error").html('Please select four choices.');
    }
}

function question6(){
    var count = $('#question6 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").show();
    }
    else{
        $("#question6-error").html('Please select four choices.');
    }
}


function question7(){
    var count = $('#question7 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").show();
    }
    else{
        $("#question7-error").html('Please select four choices.');
    }
}

function question8(){
    var count = $('#question8 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").show();
    }
    else{
        $("#question8-error").html('Please select four choices.');
    }
}

function question9(){
    var count = $('#question9 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").show();
    }
    else{
        $("#question9-error").html('Please select four choices.');
    }
}

function question10(){
    var count = $('#question10 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").show();
    }
    else{
        $("#question10-error").html('Please select four choices.');
    }
}
function part2(){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").show();

}
function question11(){
    var count = $('#question11 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").show();
}
    else{
        $("#question11-error").html('Please select four choices.');
    }
}

function question12(){
    var count = $('#question12 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").show();
    }
    else{
        $("#question12-error").html('Please select four choices.');
    }
}

function question13(){
    var count = $('#question13 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").show();
    }
    else{
        $("#question13-error").html('Please select four choices.');
    }
}

function question14(){
    var count = $('#question14 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").show();
    }
    else{
        $("#question14-error").html('Please select four choices.');
    }
}

function question15(){
    var count = $('#question15 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").show();
    }
    else{
        $("#question15-error").html('Please select four choices.');
    }
    
}

function question16(){
    var count = $('#question16 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").show();
    }
    else{
        $("#question16-error").html('Please select four choices.');
    }
}

function question17(){
    var count = $('#question17 ul li .ui-draggable-handle').length
    if(count==4){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqpart3").hide();
    $("#question18").show();
    $("#nextqstn19").show();
    $("#nextqstn18").hide();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").show();
    }
    else{
        $("#question17-error").html('Please select four choices.');
    }
}

function part3(){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#question18").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").show();


}

function question18(){
$('input[name="question18"]:checked').each(function() {
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#question18").hide();
    $("#question19").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").hide();
    $("#nextqstn20").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").show();
    });
    if($(this).prop('checked') != true){
    $("#question18-error").html('Please select atleast one option.');
    }

}

function question19(){
    var itemForm = document.getElementById('question19'); // getting the parent container of all the checkbox inputs
    var checkBoxes = itemForm.querySelectorAll('input[type="checkbox"]'); // get all the check box
    document.getElementById('next19').addEventListener('click', getData); //add a click event to the save button
    let selectedItems = [];
    function getData() { 
        checkBoxes.forEach(item => {
            if (item.checked) { 
                selectedItems.push(item);
            }
            
        });
        
        if (selectedItems.length < 1) {
            $("#question19-error").html('Please select atleast one option. test');
        }
        else {
            $("#question1").hide();
            $("#question2").hide();
            $("#question3").hide();
            $("#question4").hide();
            $("#part1").hide();
            $("#question5").hide();
            $("#question6").hide();
            $("#question7").hide();
            $("#question8").hide();
            $("#question9").hide();
            $("#question10").hide();
            $("#part2").hide();
            $("#question11").hide();
            $("#question12").hide();
            $("#question13").hide();
            $("#question14").hide();
            $("#question15").hide();
            $("#question16").hide();
            $("#question17").hide();
            $("#part3").hide();
            $("#question18").hide();
            $("#question19").hide();
            $("#question20").show();
        
            $("#nextqstn1").hide();
            $("#nextqstn2").hide();
            $("#nextqstn3").hide();
            $("#nextqstn4").hide();
            $("#nextqstn5").hide();
            $("#nextqstn6").hide();
            $("#nextqstn7").hide();
            $("#nextqstn8").hide();
            $("#nextqstn9").hide();
            $("#nextqstn10").hide();
            $("#nextqstn11").hide();
            $("#nextqpart2").hide();
            $("#nextqstn12").hide();
            $("#nextqstn13").hide();
            $("#nextqstn14").hide();
            $("#nextqstn15").hide();
            $("#nextqstn16").hide();
            $("#nextqstn17").hide();
            $("#nextqstn18").hide();
            $("#nextqpart3").hide();
            $("#nextqstn19").hide();
            $("#nextqstn20").hide();
            $("#nextqstn21").show();
        
            $("#qstn1").hide();
            $("#qstn2").hide();
            $("#qstn3").hide();
            $("#qstn4").hide();
            $("#qstn5").hide();
            $("#qstn6").hide();
            $("#qstn7").hide();
            $("#qstn8").hide();
            $("#qstn9").hide();
            $("#qstn10").hide();
            $("#qstn11").hide();
            $("#qstn12").hide();
            $("#qstn13").hide();
            $("#qstn14").hide();
            $("#qstn15").hide();
            $("#qstn16").hide();
            $("#qstn17").hide();
            $("#qstn18").hide();
            $("#qstn19").hide();
            $("#qstn20").hide();
            $("#qstn21").show();
        }
    }



    // $('input[name="question19"]:checked').each(function() {
    
    // });
    // if($(this).prop('checked') != true){
    // $("#question19-error").html('Please select atleast one option.');
    // }
}

function question20(){
    var val = $("input[name=question20]"). val()
    if(val !=""){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#question18").hide();
    $("#question19").hide();
    $("#question20").hide();
    $("#question21").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").hide();
    $("#nextqstn22").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").hide();
    $("#qstn21").hide();
    $("#qstn22").show();
    }
    else{
        $("#question20-error").html('Please insert first name.');
    }
}

function question21(){
    var val = $("input[name=question21]"). val()
    if(val !=""){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#question18").hide();
    $("#question19").hide();
    $("#question20").hide();
    $("#question21").hide();
    $("#question22").show();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").hide();
    $("#nextqstn22").hide();
    $("#nextqstn23").show();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").hide();
    $("#qstn21").hide();
    $("#qstn22").hide();
    $("#qstn23").show();
}
else{
    $("#question21-error").html('Please insert last name.');
}
}

function question22(){
    var val = $("input[name=question22]"). val()
    if(val !=""){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
    if(!emailReg.test(val)) {  
    $("#question22-error").html('Please enter a valid email id.');
    }   
    else{
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#question18").hide();
    $("#question19").hide();
    $("#question20").hide();
    $("#question21").hide();
    $("#question22").hide();
    $("#question23").show();

    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").hide();
    $("#nextqstn22").hide();
    $("#nextqstn23").hide();

    $("#qstn1").hide();
    $("#qstn2").hide();
    $("#qstn3").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").hide();
    $("#qstn21").hide();
    $("#qstn22").hide();
    $("#qstn23").hide();
    $("#qstn24").show();
    }
}
else{
    $("#question22-error").html('Please insert email address.');
}
}

function question23(){
    var val = $("input[name=question23]"). val()
    if(val !=""){
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question4").hide();
    $("#part1").hide();
    $("#question5").hide();
    $("#question6").hide();
    $("#question7").hide();
    $("#question8").hide();
    $("#question9").hide();
    $("#question10").hide();
    $("#part2").hide();
    $("#question11").hide();
    $("#question12").hide();
    $("#question13").hide();
    $("#question14").hide();
    $("#question15").hide();
    $("#question16").hide();
    $("#question17").hide();
    $("#part3").hide();
    $("#question18").hide();
    $("#question19").hide();
    $("#question20").hide();
    $("#question21").hide();
    $("#question22").hide();
    $("#question23").hide();
    $("#nextqstn1").hide();
    $("#nextqstn2").hide();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn10").hide();
    $("#nextqstn11").hide();
    $("#nextqpart2").hide();
    $("#nextqstn12").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").hide();
    $("#nextqstn22").hide();
    $("#nextqstn23").hide();
}
else{
    $("#question23-error").html('Please insert phone number.');
}
}

function prequestion1(){
    $("#question1").show();
    $("#nextqstn1").show();
    $("#next1").show();
    $("#question2").hide();
    $(".text-danger").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#qstn1").hide();
    $("#qstn2").hide();
}

function prequestion2(){
    $("#question2").show();
    $("#next1").hide();
    $("#nextqstn2").show();
    $("#nextqstn3").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#question1").hide();
    $("#question3").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").show();

}

function prequestion3(){
    $("#question3").show();
    $("#next1").hide();
    $("#nextqstn3").show();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#question1").hide();
    $("#question2").hide();
    $("#question4").hide();
    $("#nextqstn5").hide();
    $(".text-danger").hide();
    $("#qstn2").show();
    $("#qstn1").hide();
    $("#qstn3").hide();

}


function prequestion4(){
    $("#question4").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").show();
    $("#nextqstn5").hide();
    $("#nextqstn6").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn3").show();

}

function prequestion5(){
    $("#part1").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").show();
    $("#nextqstn6").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question5").hide();
    $("#question6").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").show();
    $("#qstn3").hide();
    $("#qstn5").hide();

}

function prequestion6(){
    $("#question5").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn6").show();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question6").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").show();
    $("#qstn3").hide();
    $("#qstn6").hide();

}

function prequestion7(){
    $("#question7").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").show();
    $("#nextqstn9").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question8").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").show();
    $("#qstn7").hide();

}

function prequestion8(){
    $("#question8").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").show();
    $("#nextqstn10").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question9").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").show();
    $("#qstn8").hide();

}

function prequestion9(){
    $("#question9").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqstn11").hide();
    $("#nextqstn10").show();
    $("#part2").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question10").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn8").show();
    $("#qstn9").hide();

}

function prequestion10(){
    $("#question10").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#part2").hide();
    $("#nextqstn10").show();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").show();
    $("#qstn10").hide();

}

function prequestion11(){
    $("#part2").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").show();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question11").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").show();
    $("#qstn11").hide();

}

function prequestion12(){
    $("#question11").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").show();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question12").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").show();
    $("#qstn12").hide();

}


function prequestion13(){
    $("#question12").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").show();
    $("#nextqstn14").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question13").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").show();
    $("#qstn13").hide();

}

function prequestion14(){
    $("#question13").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").show();
    $("#nextqstn15").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question14").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").show();
    $("#qstn14").hide();

}

function prequestion15(){
    $("#question14").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").show();
    $("#nextqstn16").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question15").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").show();
    $("#qstn15").hide();

}

function prequestion16(){
    $("#question15").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").show();
    $("#nextqstn17").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question16").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").show();
    $("#qstn16").hide();

}

function prequestion17(){
    $("#question16").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").show();
    $("#nextqstn18").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question17").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").show();
    $("#qstn17").hide();

}

function prequestion18(){
    $("#question17").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").show();
    $("#nextqpart3").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#part3").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").show();
    $("#qstn18").hide();

}

function prequestion19(){
    $("#question17").show();
    $("#part3").hide();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqpart3").hide();
    $("#nextqstn19").hide();
    $("#nextqstn20").hide();
    $("#nextqstn18").show();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question18").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn17").show();

}

function prequestion20(){
    $("#question18").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn20").show();
    $("#nextqstn19").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question19").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").show();
    $("#qstn20").hide();

}

function prequestion21(){
    $("#question19").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn20").show();
    $("#nextqstn21").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question20").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").show();
    $("#qstn21").hide();

}

function prequestion22(){
    $("#question20").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").show();
    $("#nextqstn22").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question21").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").hide();
    $("#qstn21").show();
    $("#qstn22").hide();

}

function prequestion23(){
    $("#question21").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").hide();
    $("#nextqstn22").show();
    $("#nextqstn23").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question22").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").hide();
    $("#qstn21").hide();
    $("#qstn22").show();
    $("#qstn23").hide();

}

function prequestion24(){
    $("#question22").show();
    $("#next1").hide();
    $("#nextqstn3").hide();
    $("#nextqstn2").hide();
    $("#nextqstn4").hide();
    $("#nextqstn5").hide();
    $("#nextqstn7").hide();
    $("#nextqstn8").hide();
    $("#nextqstn9").hide();
    $("#nextqpart2").hide();
    $("#nextqstn10").hide();
    $("#nextqstn12").hide();
    $("#nextqpart2").hide();
    $("#nextqstn13").hide();
    $("#nextqstn14").hide();
    $("#nextqstn15").hide();
    $("#nextqstn16").hide();
    $("#nextqstn17").hide();
    $("#nextqstn18").hide();
    $("#nextqpart3").hide();
    $("#nextqstn20").hide();
    $("#nextqstn21").hide();
    $("#nextqstn22").hide();
    $("#nextqstn23").show();
    $("#nextqstn24").hide();

    $("#question1").hide();
    $("#question2").hide();
    $("#question3").hide();
    $("#question7").hide();
    $("#question23").hide();
    $("#part1").hide();
    $(".text-danger").hide();
    $("#qstn2").hide();
    $("#qstn1").hide();
    $("#qstn4").hide();
    $("#qstn5").hide();
    $("#qstn3").hide();
    $("#qstn6").hide();
    $("#qstn7").hide();
    $("#qstn9").hide();
    $("#qstn10").hide();
    $("#qstn11").hide();
    $("#qstn12").hide();
    $("#qstn13").hide();
    $("#qstn14").hide();
    $("#qstn15").hide();
    $("#qstn16").hide();
    $("#qstn17").hide();
    $("#qstn18").hide();
    $("#qstn19").hide();
    $("#qstn20").hide();
    $("#qstn21").hide();
    $("#qstn22").hide();
    $("#qstn23").show();
    $("#qstn24").hide();

}