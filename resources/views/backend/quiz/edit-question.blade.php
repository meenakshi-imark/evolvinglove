@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }
</style>


<main class="content">
    @if(session()->has('add'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('add') }}
    </div>
    @endif
    <section class="main-content">
        <div class="title-head">
            <h1>Edit Question</h1>
        </div>
        <div class="white-box">
            <form action="{{url('admin/quiz-question-edit/'.$question_by_id->id)}}" method="post" class="form">
                @csrf
                <input type="hidden" name="question_type" value="multiple-question">
                <input type="hidden" name="edit_type" id="edit_type" value="{{$question_by_id->question_type}}">
                <input type="hidden" name="question_type_field" id="question_type_field" value="{{$question_by_id->question_type}}">

                <div class="control-group">
                    <label>Question Type</label>
                    <div class="dropdown look-like-select">
                        <button class="dropdown-toggle text-start" type="button" id="question_type_button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="icon"><img src="images/tick-icon.png" alt=""></span> Multiple Choice
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="question_type_button">
                            <li>
                                <a href="javascript:void(0)" id="multiple_choice_click" class="active clicllink">
                                    <span class="icon">
                                        <img src="images/tick-icon.png" alt="">
                                    </span> Multiple Choice
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="short_text_click" class="clicllink">
                                    <span class="icon">
                                        <img src="images/short-text-icon.png" alt="">
                                    </span> Short Text
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="long_text_click" class="clicllink">
                                    <span class="icon">
                                        <img src="images/long-text-icon.png" alt="">
                                    </span> Long Text
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="yes_no_click"  class="clicllink">
                                    <span class="icon">
                                        <img src="images/yes-no-icon.png" alt="">
                                    </span> Yes/No
                                </a>
                            </li>
                            <li>
                               <a href="javascript:void(0)" id="ranking_click"  class="clicllink">
                                    <span class="icon">
                                        <img src="images/ranking-icon.png" alt="">
                                    </span> Ranking
                                </a>
                            </li>
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
                                        <img src="images/phone-icon.png" alt="">
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
                            <li>
                                <a href="javascript:void(0)" id="rating_click" class="clicllink">
                                    <span class="icon">
                                        <img src="images/rating-icon.png" alt="">
                                    </span> Rating
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="date_click" class="clicllink">
                                    <span class="icon">
                                        <img src="images/date-icon.png" alt="">
                                    </span> Date
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="end_screen_click" class="clicllink">
                                    <span class="icon">
                                        <img src="images/end-screen-icon.png" alt="">
                                    </span> End Screen
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="control-group">
                    <label>Question</label>
                    <textarea type="text" name="question" placeholder="Write your question">{{$question_by_id->question}}</textarea>
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea type="text" name="description" placeholder="Write your question"></textarea>
                </div>
                <!-- <div class="control-group">
                    <label>Question Number</label>
                    <input type="text" name="question_no">
                </div> -->
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
                <div class="control-group" id="chanhetext">
                    <label>Options</label>
                    <ul id="sortable_options" class="options-list">
                        <li class="ui-state-default">
                            <input type="text" name="question_option[]" placeholder="Write your option">
                        </li>
                    </ul>
                    <a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a>
                </div>
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
    $(document).on("click", '#add_more_option', function () {
       
        $('.options-list').append('<li class="ui-state-default"><input type="text" name="question_option[]" placeholder="Write your option"><a href="javascript:void(0)" class="remove-option"><i class="las la-times"></i></a></li>');
    });
</script>

<script>
     $(document).ready(function() {


        $('.clicllink').click(function() {
            var click_value = $(this).attr('id');
            if(click_value == "multiple_choice_click"){
                $("#question_type_button").text("Multiple Choice");
                $("#chanhetext").html('<label>Options</label><ul id="sortable_options" class="options-list"><li class="ui-state-default"><input type="text" name="question_option[]" placeholder="Write your option"></li></ul><a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a>')
            }else if(click_value == "short_text_click"){
                $("#question_type_button").text("Short Text");
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" value="Write your answers">')
            }else if(click_value == "long_text_click"){
                $("#question_type_button").text("Long Text");
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" value="Write your answers" readonly>')
            }else if(click_value == "yes_no_click"){
                $("#question_type_button").text("Yes/No");
                $("#chanhetext").html('<label>Yer or No</label><div class="row"><div class="col-md-3"><input class="mb-3" type="text" value="Yes" name="yes" readonly><input type="text" value="No" name="no" readonly></div></div>')
            }else if(click_value == "ranking_click"){
                $("#question_type_button").text("Ranking");
                $("#chanhetext").html('<div class="row flex-md-row-reverse"><div class="col-md-4"><div class="row row-cols-2 row-cols-md-1"><div class="col"><div class="control-group"><label>How many top rankings?</label><select name="top-ranking"> <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option></select></div></div><div class="col"><div class="control-group mb-0"><label>Rank least option?</label><select name="least-ranking"><option value="yes">Yes</option><option value="no">No</option></select></div></div></div></div><div class="col-md-8"><label>Drag and drop to rank options</label><ul id="sortable_options" class="options-list right-space"><li class="ui-state-default"><input type="text" placeholder="Write your option"></li></ul><a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a></div></div>')
            }else if(click_value == "email_click"){
                $("#question_type_button").text("Email");
                $("#chanhetext").html('<label>Email</label><input type="text" name="email" value="Write your email" readonly>')
            }else if(click_value == "phone_click"){
                $("#question_type_button").text("Phone Number");
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label><div class="extra-field look-like-select"><select class="countrypicker" name="country"></select></div></div></div>')
            }else if(click_value == "number_click"){
                $("#question_type_button").text("Number");
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" value="Write your answers" readonly>')
            }else if(click_value == "rating_click"){
                $("#question_type_button").text("Rating");
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label><div class="rating-options look-like-select"><select name="rating-count" class="small-select"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05" selected>5</option></select><select name="icon" class="select2-icon"><option value="fa-star" data-icon="fa-star" selected>Stars</option><option value="fa-heart" data-icon="fa-heart">Hearts</option><option value="fa-user" data-icon="fa-user">User</option><option value="fa-thumbs-up" data-icon="fa-thumbs-up">Thumbs Up</option><option value="fa-crown" data-icon="fa-crown">Crown</option><option value="fa-cat" data-icon="fa-cat">Cats</option><option value="fa-dog" data-icon="fa-dog">Dogs</option><option value="fa-circle" data-icon="fa-circle">Circles</option><option value="fa-flag" data-icon="fa-flag">Flags</option><option value="fa-tint" data-icon="fa-tint">Droplets</option><option value="fa-check" data-icon="fa-check">Ticks</option><option value="fa-lightbulb" data-icon="fa-lightbulb">Lightbulbs</option><option value="fa-cloud" data-icon="fa-cloud">Clouds</option><option value="fa-bolt" data-icon="fa-bolt">Thunderbolts</option><option value="fa-pencil-alt" data-icon="fa-pencil-alt">Pencils</option><option value="fa-skull" data-icon="fa-skull">Skulls</option></select></div></div></div>')
            }else if(click_value == "date_click"){
                $("#question_type_button").text("Date");
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label></div><div class="date-options equal_gutter"><label>Date format</label><select name="date-format" class="mb-3"><option value="MMDDYYYY">MMDDYYYY</option><option value="DDMMYYYY">DDMMYYYY</option><option value="YYYYMMDD">YYYYMMDD</option></select><select name="date-separator"><option value="01">/</option><option value="02">-</option><option value="03">.</option></select></div></div>')
            }else if(click_value == "end_screen_click"){
                $("#question_type_button").text("End Screen");
                $("#chanhetext").html('<label>Email</label><input type="text" name="email" value="Write your email" readonly>')
            }
        });
        
     });
</script>

<script>
    $(document).ready(function() {
        var edit_type_value = $("#edit_type").val();
        $("#question_type_field").val(edit_type_value);
        if(edit_type_value == "multiple_choice_click"){
            $("#question_type_button").text("Multiple Choice");
            $("#chanhetext").html('<label>Options</label><ul id="sortable_options" class="options-list"><li class="ui-state-default"><input type="text" name="question_option[]" placeholder="Write your option"></li></ul><a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a>')
        }else if(edit_type_value == "short_text_click"){
            $("#question_type_button").text("Short Text");
            $("#chanhetext").html('<label>Answers</label><input type="text" name="description" value="Write your answers">')
        }else if(edit_type_value == "long_text_click"){
            $("#question_type_button").text("Long Text");
            $("#chanhetext").html('<label>Answers</label><input type="text" name="description" value="Write your answers" readonly>')
        }else if(edit_type_value == "yes_no_click"){
            $("#question_type_button").text("Yes/No");
            $("#chanhetext").html('<label>Yer or No</label><div class="row"><div class="col-md-3"><input class="mb-3" type="text" value="Yes" name="yes" readonly><input type="text" value="No" name="no" readonly></div></div>')
        }else if(edit_type_value == "ranking_click"){
                $("#question_type_button").text("Ranking");
                $("#chanhetext").html('<div class="row flex-md-row-reverse"><div class="col-md-4"><div class="row row-cols-2 row-cols-md-1"><div class="col"><div class="control-group"><label>How many top rankings?</label><select name="top-ranking"> <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option></select></div></div><div class="col"><div class="control-group mb-0"><label>Rank least option?</label><select name="least-ranking"><option value="yes">Yes</option><option value="no">No</option></select></div></div></div></div><div class="col-md-8"><label>Drag and drop to rank options</label><ul id="sortable_options" class="options-list right-space"><li class="ui-state-default"><input type="text" placeholder="Write your option"></li></ul><a id="add_more_option" href="javascript:void(0)" class="add-btn">Add choice</a></div></div>')
            }else if(edit_type_value == "email_click"){
                $("#question_type_button").text("Email");
                $("#chanhetext").html('<label>Email</label><input type="text" name="email" value="Write your email" readonly>')
            }else if(edit_type_value == "phone_click"){
                $("#question_type_button").text("Phone Number");
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label><div class="extra-field look-like-select"><select class="countrypicker" name="country"></select></div></div></div>')
            }else if(edit_type_value == "number_click"){
                $("#question_type_button").text("Number");
                $("#chanhetext").html('<label>Answers</label><input type="text" name="description" value="Write your answers" readonly>')
            }else if(edit_type_value == "rating_click"){
                $("#question_type_button").text("Rating");
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label><div class="rating-options look-like-select"><select name="rating-count" class="small-select"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05" selected>5</option></select><select name="icon" class="select2-icon"><option value="fa-star" data-icon="fa-star" selected>Stars</option><option value="fa-heart" data-icon="fa-heart">Hearts</option><option value="fa-user" data-icon="fa-user">User</option><option value="fa-thumbs-up" data-icon="fa-thumbs-up">Thumbs Up</option><option value="fa-crown" data-icon="fa-crown">Crown</option><option value="fa-cat" data-icon="fa-cat">Cats</option><option value="fa-dog" data-icon="fa-dog">Dogs</option><option value="fa-circle" data-icon="fa-circle">Circles</option><option value="fa-flag" data-icon="fa-flag">Flags</option><option value="fa-tint" data-icon="fa-tint">Droplets</option><option value="fa-check" data-icon="fa-check">Ticks</option><option value="fa-lightbulb" data-icon="fa-lightbulb">Lightbulbs</option><option value="fa-cloud" data-icon="fa-cloud">Clouds</option><option value="fa-bolt" data-icon="fa-bolt">Thunderbolts</option><option value="fa-pencil-alt" data-icon="fa-pencil-alt">Pencils</option><option value="fa-skull" data-icon="fa-skull">Skulls</option></select></div></div></div>')
            }else if(edit_type_value == "date_click"){
                $("#question_type_button").text("Date");
                $("#chanhetext").html('<label>Setting</label><div class="ques-setting"><div class="switch-input-list"><label><span>Required</span><input class="switch-input" type="checkbox"></label></div><div class="date-options equal_gutter"><label>Date format</label><select name="date-format" class="mb-3"><option value="MMDDYYYY">MMDDYYYY</option><option value="DDMMYYYY">DDMMYYYY</option><option value="YYYYMMDD">YYYYMMDD</option></select><select name="date-separator"><option value="01">/</option><option value="02">-</option><option value="03">.</option></select></div></div>')
            }else if(edit_type_value == "end_screen_click"){
                $("#question_type_button").text("End Screen");
                $("#chanhetext").html('<label>Email</label><input type="text" name="email" value="Write your email" readonly>')
            }           

    })
</script>