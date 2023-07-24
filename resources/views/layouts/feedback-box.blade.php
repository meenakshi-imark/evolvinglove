<?php 
$datasession = session()->all(); 
$currenturl = url()->full();

if($currenturl == url('').'/primary-gifts'){
    $url = 'page1';
}elseif($currenturl == url('').'/relationship-qualities'){
    $url = 'page2';
}elseif($currenturl == url('').'/themes'){
    $url = 'page3';
}elseif($currenturl == url('').'/relationship-skills'){
    $url = 'page4';
}elseif($currenturl == url('').'/reference'){
    $url = 'page5';
}elseif($currenturl == url('').'/tendencies'){
    $url = 'page6';
}elseif($currenturl == url('').'/energetic-profile'){
    $url = 'page7';
}elseif($currenturl == url('').'/communication-profile'){
    $url = 'page8';
}elseif($currenturl == url('').'/decision-making-profile'){
    $url = 'page9';
}elseif($currenturl == url('').'/parenting-profile'){
    $url = 'page10';
}elseif($currenturl == url('').'/erotic-profile'){
    $url = 'page11';
}elseif($currenturl == url('').'/shadow-qualities'){
    $url = 'page12';
}elseif($currenturl == url('').'/toxic-cycle'){
    $url = 'page13';
}elseif($currenturl == url('').'/sensitivities'){
    $url = 'page14';
}elseif($currenturl == url('').'/primary-needs'){
    $url = 'page15';
}elseif($currenturl == url('').'/biggest-doubts-and-fears'){
    $url = 'page16';
}elseif($currenturl == url('').'/most-triggered-by'){
    $url = 'page17';
}elseif($currenturl == url('').'/conflict-profile'){
    $url = 'page18';
}

$get_feedback = DB::table('feedback')->where('formid',$datasession['formid'])->select($url)->first();



?>
<div class="feedback-box pt-3 my-6" id="refresh_feedback">
    <h3 class="color_black mb-2">Give Us Some Feedback</h3>
    <p>How well does this section of your Relationship Dynamics profile represent you?</p>
    <div class="pt-2 star-rating">
        <input class="ttt" type="hidden" name="authid" id="authid" value="<?php echo Auth::user()->id; ?>"> 
        <input class="ttt" type="hidden" name="formid" id="formid" value="<?php echo $datasession['formid'] ?>"> 
        @if($get_feedback)
        <input class="ttt" id="star1-5" type="radio" name="rating1" value="5" />
        <label for="star1-5" title="Loved it">
            <i class="las la-star" style="<?php if($get_feedback->$url >=5){?>color:#cea939 <?php } ?> "></i>
        </label>
        <input class="ttt" id="star1-4" type="radio" name="rating1" value="4" />
        <label for="star1-4" title="Liked it">
            <i class="las la-star" style="<?php if($get_feedback->$url >=4){?>color:#cea939 <?php } ?> "></i>
        </label>
        <input class="ttt" id="star1-3" type="radio" name="rating1" value="3" />
        <label for="star1-3" title="It was okay">
            <i class="las la-star" style="<?php if($get_feedback->$url >=3){?>color:#cea939 <?php } ?> "></i>
        </label>
        <input class="ttt" id="star1-2" type="radio" name="rating1" value="2"  />
        <label for="star1-2" title="Didn't like it">
            <i class="las la-star" style="<?php if($get_feedback->$url >=2){?>color:#cea939 <?php } ?> "></i>
        </label>
        <input class="ttt" id="star1-1" type="radio" name="rating1" value="1" />
        <label for="star1-1" title="Hated it">
            <i class="las la-star" style="<?php if($get_feedback->$url >=1){?>color:#cea939 <?php } ?> "></i>
        </label>

        @else
        <input class="ttt" id="star1-5" type="radio" name="rating1" value="5" />
        <label for="star1-5" title="Loved it">
            <i class="las la-star"></i>
        </label>
        <input class="ttt" id="star1-4" type="radio" name="rating1" value="4" />
        <label for="star1-4" title="Liked it">
            <i class="las la-star"></i>
        </label>
        <input class="ttt" id="star1-3" type="radio" name="rating1" value="3" />
        <label for="star1-3" title="It was okay">
            <i class="las la-star"></i>
        </label>
        <input class="ttt" id="star1-2" type="radio" name="rating1" value="2"  />
        <label for="star1-2" title="Didn't like it">
            <i class="las la-star"></i>
        </label>
        <input class="ttt" id="star1-1" type="radio" name="rating1" value="1" />
        <label for="star1-1" title="Hated it">
            <i class="las la-star"></i>
        </label>
        @endif

    </div>

    <figure class="overlay-position">
        <img src="{{ asset('images/feedback/'.$relationship_lookup_text['feedback_icon'])}}" alt="Evolving Love Feedback Background - Male Zen Master">
    </figure>
</div>




