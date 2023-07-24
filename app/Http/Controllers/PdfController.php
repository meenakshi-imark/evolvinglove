<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use PDF;
use DB;
use Session;
class PdfController extends Controller
{
    public function index(){
        $datasession = session()->all();
        $formdata = DB::table('formdata')->select('data','created_at')->where('id',"228")->first();
        $data = json_decode($formdata->data, true);
        $user_details = array(
        'relation'=> $data['question4']['answer1'],
        'firstname'=> $data['question20']['firstname'],
        'lastname'=> $data['question21']['lastname'],
        'created_at'=> $formdata->created_at,
        'type'=> $data['question3']['answer1'],
         );
    $score = DB::table('relationship_scores')->leftJoin('shadow_scores', 'relationship_scores.user_id', '=', 'shadow_scores.user_id')->where('relationship_scores.formid',"228")->first();
    $max_gift_score = 62;
    $min_gift_score = -12;
    $possibility = round($score->possibility/(abs($min_gift_score)+($max_gift_score))*100);
    $appreciation = round($score->appreciation/(abs($min_gift_score)+($max_gift_score))*100);
    $truth = round($score->truth/(abs($min_gift_score)+($max_gift_score))*100);
    $harmony = round($score->harmony/(abs($min_gift_score)+($max_gift_score))*100);
    $freedom = round($score->freedom/(abs($min_gift_score)+($max_gift_score))*100);
    $devotion = round($score->devotion/(abs($min_gift_score)+($max_gift_score))*100);
    $passion = round($score->passion/(abs($min_gift_score)+($max_gift_score))*100);
    $partnership = round($score->partnership/(abs($min_gift_score)+($max_gift_score))*100);

    $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
    rsort($relationship_arr);
    $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);

    $implicit_explicit_per = round($score->implicit/($score->explicit+$score->implicit)*100);
    $reactive_repressive_per = round($score->repressive/($score->reactive+$score->repressive)*100);
    $autonomous_engaged_per = round($score->engaged/($score->autonomous+$score->engaged)*100);
    $structred_opened = round($score->acceptance/($score->achievement+$score->acceptance)*100);
    $internal_external = round($score->external/($score->internal+$score->external)*100);
    $directive_col = round($score->collaborative/($score->directive+$score->collaborative)*100);
    $intuitive_con = round($score->considered/($score->instinctive+$score->considered)*100);
    $initiate_re = round($score->reciprocating/($score->initiating+$score->reciprocating)*100); 
    $plannning_spontaneity = round($score->spontaneity/($score->planning+$score->spontaneity)*100); 
    $variety_depth = round($score->depth/($score->variety+$score->depth)*100);
   

    $shadow_arr = array($score->complaint,$score->defense,$score->avoidance,$score->anxious,$score->control,$score->collapse,$score->addiction,$score->co_dependence);
    rsort($shadow_arr);
    //  echo"<pre>";print_r($shadow_arr);echo"</pre>";exit();
    $shadow_lookup_text = $this->shadow_lookup_text($score->complaint,$score->defense,$score->avoidance,$score->anxious,$score->control,$score->collapse,$score->addiction,$score->co_dependence,$shadow_arr);
 
    /*Shadow score*/
    $max_shadow_score = 68;
    $min_shadow_score = -14;
    $complaint = round($score->complaint/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $defense = round($score->defense/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $avoidance = round($score->avoidance/(abs($min_shadow_score)+($max_shadow_score))*100); 
 
    $anxious = round($score->anxious/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $control = round($score->control/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $collapse = round($score->collapse/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $addiction = round($score->addiction/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $dependence = round($score->co_dependence/(abs($min_shadow_score)+($max_shadow_score))*100); 



    $arr_shadow = array($complaint,$defense,$avoidance,$anxious,$control,$collapse,$addiction,$dependence);
    rsort($arr_shadow);
    $shadowFirstVal = $arr_shadow[0];
    $shadowSecondVal = $arr_shadow[1];

    if($complaint == $shadowFirstVal){
        $remedy = "Complaint";
    }
    elseif($avoidance == $shadowFirstVal){
        $remedy = "Avoidance";
    }
    elseif($defense == $shadowFirstVal){
        $remedy = "Defense";
    }
    elseif($collapse == $shadowFirstVal){
        $remedy = "Collapse";
    }
    elseif($addiction == $shadowFirstVal){
        $remedy = "Addiction";
    }
    elseif($dependence == $shadowFirstVal){
        $remedy = "Co-dependence";
    }
    elseif($control == $shadowFirstVal){
        $remedy = "Control";
    }
    else{
        $remedy = "Anxious";
    }

    if($complaint == $shadowSecondVal){
        $remedy1 = "Complaint";
    }
    elseif($avoidance== $shadowSecondVal){
        $remedy1 = "Avoidance";
    }
    elseif($defense == $shadowSecondVal){
        $remedy1 = "Defense";
    }
    elseif($collapse == $shadowSecondVal){
        $remedy1 = "Collapse";
    }
    elseif($addiction == $shadowSecondVal){
        $remedy1 = "Addiction";
    }
    elseif($dependence == $shadowSecondVal){
        $remedy1 = "Co-dependence";
    }
    elseif($control == $shadowSecondVal){
        $remedy1 = "Control";
    }
    else{
        $remedy1 = "Anxious";
    }
    $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy)->first();
    $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy1)->first();
    $shadow_percentage = array(
        'app_possibility' => round($score->appreciation/($score->possibility+$score->appreciation)*100),
        'harmony_truth' => round($score->harmony/($score->truth+$score->harmony)*100),
        'devotion_freedom' => round($score->devotion/($score->freedom+$score->devotion)*100),
        'passion_part' => round($score->partnership/($score->passion+$score->partnership)*100),
    );

    $per_shadow = array(
        'defense_complaint'  => round($score->defense/($score->complaint+$score->defense)*100),
        'control_collapse'  => round($score->collapse/($score->control+$score->collapse)*100),
        'avoidance_anxious'  => round($score->anxious/($score->avoidance+$score->anxious)*100),
        'addiction_dependence'  => round($score->co_dependence/($score->addiction+$score->co_dependence)*100),
    );
    if($score->internal>$score->external){
        $refrence="internal";
    }
    else{
        $refrence="external";
    }
   
    $content = DB::table('content_references')->where('type',$refrence)->first();

    $tendencies = array(
        'possibility_app' => round($score->appreciation/($score->possibility+$score->appreciation)*100),
        'freedom_devotion' => round($score->devotion/($score->freedom+$score->devotion)*100),
        'truth_harmony' => round($score->harmony/($score->truth+$score->harmony)*100),
        'passion_part' => round($score->partnership/($score->passion+$score->partnership)*100),
    );

    if($possibility>$appreciation){
        $tend1 ="possibility";
    }
    else{
        $tend1 ="appreciation";
    }
    if($freedom>$devotion){
        $tend2 ="freedom";
    }
    else{
        $tend2 ="devotion";
    }

    if($truth>$harmony){
        $tend3 ="truth";
    }
    else{
        $tend3 ="harmony";
    }
    if($passion>$partnership){
        $tend4 ="passion";
    }
    else{
        $tend4 ="partnership";
    }
    $emphasizing1 = DB::table('tendencies')->select('emphasizing1')->where('archetype',$tend1)->first();
    $emphasizing2 = DB::table('tendencies')->select('emphasizing2')->where('archetype',$tend3)->first();
    $emphasizing3 = DB::table('tendencies')->select('emphasizing3')->where('archetype',$tend2)->first();
    $emphasizing4 = DB::table('tendencies')->select('emphasizing4')->where('archetype',$tend4)->first();

    if($score->implicit>$score->explicit){
        $implicit_explicit = "implicit";
    }
    else{
        $implicit_explicit = "explicit";
    }

    $emp1 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$implicit_explicit)->first();
    $emp2 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$implicit_explicit)->first();
    
    if($score->instinctive>$score->considered){
        $impulsive_considered = "impulsive";
    }
    else{
        $impulsive_considered = "considered";
    }
    $emp3 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$impulsive_considered)->first();
    $emp4 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$impulsive_considered)->first();


    if($score->achievement>$score->acceptance){
        $achievement_acceptance = "achievement";
    }
    else{
        $achievement_acceptance = "acceptance";
    }
    if($score->autonomous>$score->engaged){
        $autonomous_engaged = "autonomous";
    }
    else{
        $autonomous_engaged = "engaged";
    }
    
    $emp5 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$achievement_acceptance)->first();
    $emp6 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$autonomous_engaged)->first();

    $erotic_profile = array(
        'initiate' =>$score->initiating,
        'reciprocating' =>$score->reciprocating,
        'spontaneity' =>$score->spontaneity,
        'planning' =>$score->planning,
        'variety' =>$score->variety,
        'depth' =>$score->depth,
        'initiate_re' =>round($score->reciprocating/($score->initiating+$score->reciprocating)*100),
        'plannning_spontaneity' =>round($score->spontaneity/($score->planning+$score->spontaneity)*100),
        'variety_depth' =>round($score->depth/($score->variety+$score->depth)*100),
    );

    if($score->initiating>$score->reciprocating){
        $er1 ="initiating";
    }
    else{
        $er1 ="reciprocating";
    }
    if($score->spontaneity>$score->planning){
        $er2 ="spontaneity";
    }
    else{
        $er2 ="planning";
    }

    if($score->variety>$score->depth){
        $er3 ="variety";
    }
    else{
        $er3 ="depth";
    }
    $emp7 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er1)->first();
    $emp8 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er2)->first();
    $emp9 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er3)->first();

    $shadowFirstVal = $shadow_arr[0];
    $shadowSecondVal = $shadow_arr[1];
    if($score->complaint == $shadowFirstVal){
        $shadow_remedy = "Complaint";
    }
    elseif($score->avoidance == $shadowFirstVal){
        $shadow_remedy = "Avoidance";
    }
    elseif($score->defense == $shadowFirstVal){
        $shadow_remedy = "Defense";
    }
    elseif($score->collapse == $shadowFirstVal){
        $shadow_remedy = "Collapse";
    }
    elseif($score->addiction == $shadowFirstVal){
        $shadow_remedy = "Addiction";
    }
    elseif($score->co_dependence == $shadowFirstVal){
        $shadow_remedy = "Co-dependence";
    }
    elseif($score->control == $shadowFirstVal){
        $shadow_remedy = "Control";
    }
    else{
        $shadow_remedy = "Anxious";
    }
    if($score->complaint == $shadowSecondVal){
        $shadow_remedy1 = "Complaint";
    }
    elseif($score->avoidance == $shadowSecondVal){
        $shadow_remedy1 = "Avoidance";
    }
    elseif($score->defense == $shadowSecondVal){
        $shadow_remedy1 = "Defense";
    }
    elseif($score->collapse == $shadowSecondVal){
        $shadow_remedy1 = "Collapse";
    }
    elseif($score->addiction == $shadowSecondVal){
        $shadow_remedy1 = "Addiction";
    }
    elseif($score->co_dependence == $shadowSecondVal){
        $shadow_remedy1 = "Co-dependence";
    }
    elseif($score->control == $shadowSecondVal){
        $shadow_remedy1 = "Control";
    }
    else{
        $shadow_remedy1 = "Anxious";
    }

    $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$shadow_remedy)->first();
    $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$shadow_remedy1)->first();

    
    $shadow_per = array(
        'defense_complaint'  => round($score->defense/($score->complaint+$score->defense)*100),
        'control_collapse'  => round($score->collapse/($score->control+$score->collapse)*100),
        'avoidance_anxious'  => round($score->anxious/($score->avoidance+$score->anxious)*100),
        'addiction_dependence'  => round($score->co_dependence/($score->addiction+$score->co_dependence)*100),
    );

    if($complaint>$defense){
        $sens1 ="complaint";
    }
    else{
        $sens1 ="defense";
    }
    if($control>$collapse){
        $sens2 ="control";
    }
    else{
        $sens2 ="collapse";
    }

    if($avoidance>$anxious){
        $sens3 ="avoidance";
    }
    else{
        $sens3 ="anxious";
    }

    if($addiction>$dependence){
        $sens4 ="addiction";
    }
    else{
        $sens4 ="dependence";
    }
    // echo'<pre>';print_r($shadow_lookup_text);echo'</pre>';exit();

    $emp10 = DB::table('sensitivities')->select('emphasizing1')->where('archetype',$sens1)->first();
    $emp11 = DB::table('sensitivities')->select('emphasizing2')->where('archetype',$sens2)->first();
    $emp12 = DB::table('sensitivities')->select('emphasizing3')->where('archetype',$sens3)->first();
    $emp13 = DB::table('sensitivities')->select('emphasizing4')->where('archetype',$sens4)->first();
    $dataa = array('user_details'=>$user_details,'possibility'=>$possibility,'appreciation'=>$appreciation,'truth'=>$truth,'harmony'=>$harmony,'freedom'=>$freedom,'devotion'=>$devotion,'passion'=>$passion,'partnership'=>$partnership,'relationship_lookup_text'=>$relationship_lookup_text,'implicit_explicit'=>$implicit_explicit_per,'reactive_repressive_per'=>$reactive_repressive_per
    ,'autonomous_engaged'=>$autonomous_engaged_per,'structred_opened'=>$structred_opened,'internal_external'=>$internal_external,'directive_col'=>$directive_col,'intuitive_con'=>$intuitive_con,'initiate_re'=>$initiate_re,'plannning_spontaneity'=>$plannning_spontaneity,'variety_depth'=>$variety_depth,'shadow_lookup_text'=>$shadow_lookup_text,'complaint'=>$complaint,'avoidance'=>$avoidance,
    'anxious'=>$anxious,'control'=>$control,'collapse'=>$collapse,'addiction'=>$addiction,'dependence'=>$dependence,'defense'=>$defense,'secendory_shadow'=>$secendory_shadow,'remedy'=>$remedy,'remedy1'=>$remedy1,'shadow_percentage'=>$shadow_percentage,'per_shadow'=>$per_shadow,'refrence'=>$refrence,'content'=>$content,'tendencies'=>$tendencies,'emphasizing1'=>$emphasizing1,'emphasizing2'=>$emphasizing2,
    'emphasizing3'=>$emphasizing3,'emphasizing4'=>$emphasizing4,'emp1'=>$emp1,'emp2'=>$emp2,'emp3'=>$emp3,'emp4'=>$emp4,'emp5'=>$emp5,'emp6'=>$emp6,'erotic_profile'=>$erotic_profile,'emp7'=>$emp7,'emp8'=>$emp8,'emp9'=>$emp9,'shadow_remedy'=>$shadow_remedy,'shadow_remedy1'=>$shadow_remedy1,'secendory_shadow'=>$secendory_shadow,'shadow_per'=>$shadow_per,'emp10'=>$emp10,'emp11'=>$emp11,
    'emp12'=>$emp12,'emp13'=>$emp13);

    
     $pdf = \PDF::loadView('frontend.email.free-report',$dataa)->setPaper('A4');
  


    $path = public_path('/files/pdf/');
    $pdf->save($path.'evolvinglove228.pdf');
    return $pdf->stream($path.'evolvinglove228.pdf');
    // Mail::send(['text'=>'frontend.email.pdf2'], $dataa, function($message) use ($dataa,$pdf) {
    //    $message->to("meenakshi.nanta@imarkinfotech.com")->subject
    //       ('Evolving Love');
    //    $message->from('info@imark.com','Evolving Love');
    //    $message->attachData($pdf->output(),'customer.pdf');
    // });
    
    // //return $pdf->stream($path.'evolvinglove'.''.$datasession['formid'].'.pdf');
    // //return redirect('/result-summary');


    // return view('frontend.email.pdf',compact('user_details','possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','implicit_explicit','reactive_repressive_per'
    // ,'autonomous_engaged','structred_opened','internal_external','directive_col','intuitive_con','initiate_re','plannning_spontaneity','variety_depth','shadow_lookup_text','complaint','avoidance',
    // 'anxious','control','collapse','addiction','dependence','defense','secendory_shadow','remedy','remedy1','shadow_percentage','per_shadow','refrence','content','tendencies','emphasizing1','emphasizing2',
    // 'emphasizing3','emphasizing4','emp1','emp2','emp3','emp4','emp5','emp6','erotic_profile','emp7','emp8','emp9','shadow_remedy','shadow_remedy1','secendory_shadow','shadow_per','emp10','emp11',
    // 'emp12','emp13'));

    }

    public function relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr){
        $datasession = session()->all();
        if($possibility==$relationship_arr[0]){
            $primary ="possibility";
        }
        elseif($appreciation==$relationship_arr[0]){
            $primary ="appreciation";
        }
        elseif($truth==$relationship_arr[0]){
            $primary ="truth";
        }
        elseif($harmony==$relationship_arr[0]){
            $primary ="harmony";
        }
        elseif($freedom==$relationship_arr[0]){
            $primary ="freedom";
        }
        elseif($devotion==$relationship_arr[0]){
            $primary ="devotion";
        }
        elseif($passion==$relationship_arr[0]){
            $primary ="passion";
        }
        else{
            $primary ="partnership";
        }      

        if($possibility==$relationship_arr[1]){
            $secondary ="possibility";
        }
        elseif($appreciation==$relationship_arr[1]){
            $secondary ="appreciation";
        }
        elseif($truth==$relationship_arr[1]){
            $secondary ="truth";
        }
        elseif($harmony==$relationship_arr[1]){
            $secondary ="harmony";
        }
        elseif($freedom==$relationship_arr[1]){
            $secondary ="freedom";
        }
        elseif($devotion==$relationship_arr[1]){
            $secondary ="devotion";
        }
        elseif($passion==$relationship_arr[1]){
            $secondary ="passion";
        }
        else{
            $secondary ="partnership";
        }
        $formdata = DB::table('formdata')->select('data')->where('id','228')->first();
        $data = json_decode($formdata->data, TRUE);
        $gender = $data['question18']['gender'];
        $promo_img = DB::table('promos')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $lookuptext = DB::table('lookup_texts')->select($secondary)->where('archetype',$primary)->first();
        $images = DB::table('images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $banners = DB::table('banners_pdf')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $promo_image = $promo_img->{$secondary.'_'.$gender};
        $icon_image = $images->{$secondary.'_'.$gender};
        $banners_image = $banners->{$secondary.'_'.$gender};   
        $primary_gifts =  DB::table('lookup_texts')->select('primary_gift')->where('archetype',$primary)->first();
        $secondary_gifts =  DB::table('lookup_texts')->select('secondary_gift')->where('archetype',$secondary)->first();

        $primary_images = DB::table('primary_quality_images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $primary_image = $primary_images->{$secondary.'_'.$gender};
        $secondary_images = DB::table('secondary_quality_images')->select($secondary.'_'.$gender)->where('archetype',$secondary)->first();
        $secondary_image = $secondary_images->{$secondary.'_'.$gender};
        $primary_qualities =  DB::table('lookup_texts')->select('primary_qualities')->where('archetype',$primary)->first();
        $secondary_qualities =  DB::table('lookup_texts')->select('secondary_qualities')->where('archetype',$secondary)->first();

        $primary_themes =  DB::table('lookup_texts')->select('primary_theme')->where('archetype',$primary)->first();
        $secondary_themes =  DB::table('lookup_texts')->select('secondary_theme')->where('archetype',$secondary)->first();

        $natural_skills =  DB::table('lookup_texts')->select('relationship_skills_natural')->where('archetype',$primary)->first();
        $develop_skills =  DB::table('lookup_texts')->select('relationship_skills_develop')->where('archetype',$primary)->first();


        $energetic =  DB::table('lookup_texts')->select('energetic_profile','energetic_shadow','energetic_gifts')->where('archetype',$primary)->first();

        $profile_images = DB::table('communication_images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $profile_image = $profile_images->{$secondary.'_'.$gender};

        $primary_communication =  DB::table('lookup_texts')->select('primary_communication')->where('archetype',$primary)->first();
        $secondary_communication =  DB::table('lookup_texts')->select('secondary_communication')->where('archetype',$secondary)->first();

        $primary_shadow_remedy =  DB::table('lookup_texts')->select('primary_shadow','primary_remedy','primary_decision_remedy')->where('archetype',$primary)->first();
        $secondary_shadow_remedy = DB::table('lookup_texts')->select('secondary_shadow','secondary_remedy')->where('archetype',$secondary)->first();

        $primary_decision =  DB::table('lookup_texts')->select('primary_decision','primary_decision_shadow','primary_decision_remedy')->where('archetype',$primary)->first();
        $secondary_decision =  DB::table('lookup_texts')->select('secondary_decision','secondary_decision_shadow','secondary_decision_remedy')->where('archetype',$secondary)->first();

        $primary_parenting =  DB::table('lookup_texts')->select('primary_parenting','primary_parenting_shadow','primary_parenting_remedy')->where('archetype',$primary)->first();
        $secondary_parenting =  DB::table('lookup_texts')->select('secondary_parenting','secondary_parenting_shadow','secondary_parenting_remedy')->where('archetype',$secondary)->first();

        $primary_erotic =  DB::table('lookup_texts')->select('primary_erotic','primary_erotic_shadow','primary_erotic_remedy')->where('archetype',$primary)->first();
        $secondary_erotic =  DB::table('lookup_texts')->select('secondary_erotic','secondary_erotic_shadow','secondary_erotic_remedy')->where('archetype',$secondary)->first();

        return array('lookuptext'=>$lookuptext->$secondary,'icon'=>$icon_image,'banner'=>$banners_image,'promo_image'=>$promo_image,'primary_gifts'=>$primary_gifts,'secondary_gifts'=>$secondary_gifts
        ,'primary_image'=>$primary_image,'secondary_image'=>$secondary_image,'primary_qualities'=>$primary_qualities,'secondary_qualities'=>$secondary_qualities,'primary_themes'=>$primary_themes,
        'secondary_themes'=>$secondary_themes,'natural_skills'=>$natural_skills,'develop_skills'=>$develop_skills,'energetic'=>$energetic,'profile_image'=>$profile_image,'primary_communication'=>
        $primary_communication,'secondary_communication'=>$secondary_communication,'primary_shadow_remedy'=>$primary_shadow_remedy,'secondary_shadow_remedy'=>$secondary_shadow_remedy,'primary_decision'=>
        $primary_decision,'secondary_decision'=>$secondary_decision,'primary_parenting'=>$primary_parenting,'secondary_parenting'=>$secondary_parenting,'primary_erotic'=>$primary_erotic,'secondary_erotic'
        =>$secondary_erotic);

    }

    public function shadow_lookup_text($complaint_txt, $defense_txt, $avoidance_txt, $anxious_txt, $control_txt, $collapse_txt, $addiction_txt, $dependence_txt,$shadow_arr){
        if($complaint_txt==$shadow_arr[0]){
            $primary_txt ="complaint";
        }
        elseif($defense_txt==$shadow_arr[0]){
            $primary_txt ="defense";
        }
        elseif($avoidance_txt==$shadow_arr[0]){
            $primary_txt ="avoidance";
        }
        elseif($anxious_txt==$shadow_arr[0]){
            $primary_txt ="anxious";
        }
        elseif($control_txt==$shadow_arr[0]){
            $primary_txt ="control";
        }
        elseif($collapse_txt==$shadow_arr[0]){
            $primary_txt ="collapse";
        }
        elseif($addiction_txt==$shadow_arr[0]){
            $primary_txt ="addiction";
        }
        else{
            $primary_txt ="co-dependence";
        }      


        if($complaint_txt==$shadow_arr[1]){
            $secondary_txt ="complaint";
        }
        elseif($defense_txt==$shadow_arr[1]){
            $secondary_txt ="defense";
        }
        elseif($avoidance_txt==$shadow_arr[1]){
            $secondary_txt ="avoidance";
        }
        elseif($anxious_txt==$shadow_arr[1]){
            $secondary_txt ="anxious";
        }
        elseif($control_txt==$shadow_arr[1]){
            $secondary_txt ="control";
        }
        elseif($collapse_txt==$shadow_arr[1]){
            $secondary_txt ="collapse";
        }
        elseif($addiction_txt==$shadow_arr[1]){
            $secondary_txt ="addiction";
        }
        else{
            $secondary_txt ="co_dependence";
        }
        $datasession = session()->all();
        $formdata = DB::table('formdata')->select('data')->where('id','228')->first();
        $data = json_decode($formdata->data, TRUE);
        $gender = $data['question18']['gender'];
        $shadow_icon = DB::table('shadow_icons')->select($secondary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $icon_image = $shadow_icon->{$secondary_txt.'_'.$gender};
        $shadowlookuptext = DB::table('shadow_lookup_texts')->select($secondary_txt)->where('archetype',$primary_txt)->first();
        $banners = DB::table('banners_shadow')->select($secondary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $banners_image = $banners->{$secondary_txt.'_'.$gender};
        $primary_images = DB::table('primary_shadow_qualities')->select($secondary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $secondary_images = DB::table('secondary_shadow_qualities')->select($secondary_txt.'_'.$gender)->where('archetype',$secondary_txt)->first();
        $primary_image = $primary_images->{$secondary_txt.'_'.$gender};
        $secondary_image = $secondary_images->{$secondary_txt.'_'.$gender};

        $primary_qualities =  DB::table('shadow_lookup_texts')->select('primary_qualities')->where('archetype',$primary_txt)->first();
        $secondary_qualities =  DB::table('shadow_lookup_texts')->select('secondary_qualities')->where('archetype',$secondary_txt)->first();

        $primary_toxic_images = DB::table('primary_toxic_images')->select($secondary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $primary_toxic_image = $primary_toxic_images->{$secondary_txt.'_'.$gender};
        $secondary_toxic_images = DB::table('secondary_toxic_images')->select($secondary_txt.'_'.$gender)->where('archetype',$secondary_txt)->first();
        $secondary_toxic_image = $secondary_toxic_images->{$secondary_txt.'_'.$gender};
        $toxic_content = DB::table('shadow_lookup_texts')->select('toxic_cycle','primary_toxic_cycle','primay_toxic_remedy')->where('archetype',$primary_txt)->first();
        $secondary_content = DB::table('shadow_lookup_texts')->select('secondary_toxic_cyle','secondary_toxic_remedy')->where('archetype',$secondary_txt)->first();
        
        $primary_needs = DB::table('shadow_lookup_texts')->select('primary_needs')->where('archetype',$primary_txt)->first();
        $secondary_needs = DB::table('shadow_lookup_texts')->select('secondary_needs')->where('archetype',$secondary_txt)->first();

        $primary_doubts = DB::table('shadow_lookup_texts')->select('primary_doubts')->where('archetype',$primary_txt)->first();
        $secondary_doubts = DB::table('shadow_lookup_texts')->select('secondary_doubts')->where('archetype',$secondary_txt)->first();

        $resolution_stages = DB::table('shadow_lookup_texts')->select('resolution_stages')->where('archetype',$secondary_txt)->first();
        $re_images =  DB::table('resolution')->select($primary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $re_image = $re_images->{$primary_txt.'_'.$gender};
        $primary_conflict = DB::table('shadow_lookup_texts')->select('primary_conflict')->where('archetype',$primary_txt)->first();
        $secondary_conflict = DB::table('shadow_lookup_texts')->select('secondary_conflict')->where('archetype',$secondary_txt)->first();

        $primary_strategy = DB::table('shadow_lookup_texts')->select('primary_strategy')->where('archetype',$primary_txt)->first();
        $secondary_strategy = DB::table('shadow_lookup_texts')->select('secondary_strategy')->where('archetype',$secondary_txt)->first();

        return array('shadowlookuptext'=>$shadowlookuptext->{$secondary_txt},'icon'=>$icon_image,'banners_image'=>$banners_image,'primary'=>$primary_txt,'secondary'=>$secondary_txt,'primary_image'=>$primary_image,
        'secondary_image'=>$secondary_image,'primary_qualities'=>$primary_qualities,'secondary_qualities'=>$secondary_qualities,'primary_toxic_image'=>$primary_toxic_image,'secondary_toxic_image'=>
        $secondary_toxic_image,'toxic_content'=>$toxic_content,'secondary_content'=>$secondary_content,'primary_needs'=>$primary_needs,'secondary_needs'=>$secondary_needs,'primary_doubts'=>$primary_doubts,
        'secondary_doubts'=>$secondary_doubts,'resolution_stages'=>$resolution_stages,'re_image'=>$re_image,'primary_conflict'=>$primary_conflict,'secondary_conflict'=>$secondary_conflict,
        'primary_strategy'=>$primary_strategy,'secondary_strategy'=>$secondary_strategy);
   
       
    }

    public function view(){
        $datasession = session()->all();
        $formdata = DB::table('formdata')->select('data','created_at')->where('id',$datasession['formid'])->first();
        $data = json_decode($formdata->data, true);
        $user_details = array(
        'relation'=> $data['question4']['answer1'],
        'firstname'=> $data['question20']['firstname'],
        'lastname'=> $data['question21']['lastname'],
        'created_at'=> $formdata->created_at,
         );


        
   
    


    $score = DB::table('relationship_scores')->leftJoin('shadow_scores', 'relationship_scores.user_id', '=', 'shadow_scores.user_id')->where('relationship_scores.id',1)->first();
    $max_gift_score = 62;
    $min_gift_score = -12;
    $possibility = round($score->possibility/(abs($min_gift_score)+($max_gift_score))*100);
    $appreciation = round($score->appreciation/(abs($min_gift_score)+($max_gift_score))*100);
    $truth = round($score->truth/(abs($min_gift_score)+($max_gift_score))*100);
    $harmony = round($score->harmony/(abs($min_gift_score)+($max_gift_score))*100);
    $freedom = round($score->freedom/(abs($min_gift_score)+($max_gift_score))*100);
    $devotion = round($score->devotion/(abs($min_gift_score)+($max_gift_score))*100);
    $passion = round($score->passion/(abs($min_gift_score)+($max_gift_score))*100);
    $partnership = round($score->partnership/(abs($min_gift_score)+($max_gift_score))*100);

    $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
    rsort($relationship_arr);
    $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);

    $implicit_explicit = round($score->implicit/($score->explicit+$score->implicit)*100);
    $reactive_repressive_per = round($score->repressive/($score->reactive+$score->repressive)*100);
    $autonomous_engaged = round($score->engaged/($score->autonomous+$score->engaged)*100);
    $structred_opened = round($score->acceptance/($score->achievement+$score->acceptance)*100);
    $internal_external = round($score->external/($score->internal+$score->external)*100);
    $directive_col = round($score->collaborative/($score->directive+$score->collaborative)*100);
    $intuitive_con = round($score->considered/($score->instinctive+$score->considered)*100);
    $initiate_re = round($score->reciprocating/($score->initiating+$score->reciprocating)*100); 
    $plannning_spontaneity = round($score->spontaneity/($score->planning+$score->spontaneity)*100); 
    $variety_depth = round($score->depth/($score->variety+$score->depth)*100);
   

    $shadow_arr = array($score->complaint,$score->defense,$score->avoidance,$score->anxious,$score->control,$score->collapse,$score->addiction,$score->co_dependence);
    rsort($shadow_arr);
    //  echo"<pre>";print_r($shadow_arr);echo"</pre>";exit();
    $shadow_lookup_text = $this->shadow_lookup_text($score->complaint,$score->defense,$score->avoidance,$score->anxious,$score->control,$score->collapse,$score->addiction,$score->co_dependence,$shadow_arr);
 
    /*Shadow score*/
    $max_shadow_score = 68;
    $min_shadow_score = -14;
    $complaint = round($score->complaint/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $defense = round($score->defense/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $avoidance = round($score->avoidance/(abs($min_shadow_score)+($max_shadow_score))*100); 
 
    $anxious = round($score->anxious/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $control = round($score->control/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $collapse = round($score->collapse/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $addiction = round($score->addiction/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $dependence = round($score->co_dependence/(abs($min_shadow_score)+($max_shadow_score))*100); 



    $arr_shadow = array($complaint,$defense,$avoidance,$anxious,$control,$collapse,$addiction,$dependence);
    rsort($arr_shadow);
    $shadowFirstVal = $arr_shadow[0];
    $shadowSecondVal = $arr_shadow[1];

    if($complaint == $shadowFirstVal){
        $remedy = "Complaint";
    }
    elseif($avoidance == $shadowFirstVal){
        $remedy = "Avoidance";
    }
    elseif($defense == $shadowFirstVal){
        $remedy = "Defense";
    }
    elseif($collapse == $shadowFirstVal){
        $remedy = "Collapse";
    }
    elseif($addiction == $shadowFirstVal){
        $remedy = "Addiction";
    }
    elseif($dependence == $shadowFirstVal){
        $remedy = "Co-dependence";
    }
    elseif($control == $shadowFirstVal){
        $remedy = "Control";
    }
    else{
        $remedy = "Anxious";
    }

    if($complaint == $shadowSecondVal){
        $remedy1 = "Complaint";
    }
    elseif($avoidance== $shadowSecondVal){
        $remedy1 = "Avoidance";
    }
    elseif($defense == $shadowSecondVal){
        $remedy1 = "Defense";
    }
    elseif($collapse == $shadowSecondVal){
        $remedy1 = "Collapse";
    }
    elseif($addiction == $shadowSecondVal){
        $remedy1 = "Addiction";
    }
    elseif($dependence == $shadowSecondVal){
        $remedy1 = "Co-dependence";
    }
    elseif($control == $shadowSecondVal){
        $remedy1 = "Control";
    }
    else{
        $remedy1 = "Anxious";
    }
    $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy)->first();
    $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy1)->first();
    $shadow_percentage = array(
        'app_possibility' => round($score->appreciation/($score->possibility+$score->appreciation)*100),
        'harmony_truth' => round($score->harmony/($score->truth+$score->harmony)*100),
        'devotion_freedom' => round($score->devotion/($score->freedom+$score->devotion)*100),
        'passion_part' => round($score->partnership/($score->passion+$score->partnership)*100),
    );

    $per_shadow = array(
        'defense_complaint'  => round($score->defense/($score->complaint+$score->defense)*100),
        'control_collapse'  => round($score->collapse/($score->control+$score->collapse)*100),
        'avoidance_anxious'  => round($score->anxious/($score->avoidance+$score->anxious)*100),
        'addiction_dependence'  => round($score->co_dependence/($score->addiction+$score->co_dependence)*100),
    );
    if($score->internal>$score->external){
        $refrence="internal";
    }
    else{
        $refrence="external";
    }
   
    $content = DB::table('content_references')->where('type',$refrence)->first();

    $tendencies = array(
        'possibility_app' => round($score->appreciation/($score->possibility+$score->appreciation)*100),
        'freedom_devotion' => round($score->devotion/($score->freedom+$score->devotion)*100),
        'truth_harmony' => round($score->harmony/($score->truth+$score->harmony)*100),
        'passion_part' => round($score->partnership/($score->passion+$score->partnership)*100),
    );

    if($possibility>$appreciation){
        $tend1 ="possibility";
    }
    else{
        $tend1 ="appreciation";
    }
    if($freedom>$devotion){
        $tend2 ="freedom";
    }
    else{
        $tend2 ="devotion";
    }

    if($truth>$harmony){
        $tend3 ="truth";
    }
    else{
        $tend3 ="harmony";
    }
    if($passion>$partnership){
        $tend4 ="passion";
    }
    else{
        $tend4 ="partnership";
    }
    $emphasizing1 = DB::table('tendencies')->select('emphasizing1')->where('archetype',$tend1)->first();
    $emphasizing2 = DB::table('tendencies')->select('emphasizing2')->where('archetype',$tend3)->first();
    $emphasizing3 = DB::table('tendencies')->select('emphasizing3')->where('archetype',$tend2)->first();
    $emphasizing4 = DB::table('tendencies')->select('emphasizing4')->where('archetype',$tend4)->first();

    if($score->implicit>$score->explicit){
        $implicit_explicit = "implicit";
    }
    else{
        $implicit_explicit = "explicit";
    }

    $emp1 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$implicit_explicit)->first();
    $emp2 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$implicit_explicit)->first();
    
    if($score->instinctive>$score->considered){
        $impulsive_considered = "impulsive";
    }
    else{
        $impulsive_considered = "considered";
    }
    $emp3 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$impulsive_considered)->first();
    $emp4 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$impulsive_considered)->first();


    if($score->achievement>$score->acceptance){
        $achievement_acceptance = "achievement";
    }
    else{
        $achievement_acceptance = "acceptance";
    }
    if($score->autonomous>$score->engaged){
        $autonomous_engaged = "autonomous";
    }
    else{
        $autonomous_engaged = "engaged";
    }
    
    $emp5 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$achievement_acceptance)->first();
    $emp6 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$autonomous_engaged)->first();

    $erotic_profile = array(
        'initiate' =>$score->initiating,
        'reciprocating' =>$score->reciprocating,
        'spontaneity' =>$score->spontaneity,
        'planning' =>$score->planning,
        'variety' =>$score->variety,
        'depth' =>$score->depth,
        'initiate_re' =>round($score->reciprocating/($score->initiating+$score->reciprocating)*100),
        'plannning_spontaneity' =>round($score->spontaneity/($score->planning+$score->spontaneity)*100),
        'variety_depth' =>round($score->depth/($score->variety+$score->depth)*100),
    );

    if($score->initiating>$score->reciprocating){
        $er1 ="initiating";
    }
    else{
        $er1 ="reciprocating";
    }
    if($score->spontaneity>$score->planning){
        $er2 ="spontaneity";
    }
    else{
        $er2 ="planning";
    }

    if($score->variety>$score->depth){
        $er3 ="variety";
    }
    else{
        $er3 ="depth";
    }
    $emp7 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er1)->first();
    $emp8 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er2)->first();
    $emp9 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er3)->first();

    $shadowFirstVal = $shadow_arr[0];
    $shadowSecondVal = $shadow_arr[1];
    if($score->complaint == $shadowFirstVal){
        $shadow_remedy = "Complaint";
    }
    elseif($score->avoidance == $shadowFirstVal){
        $shadow_remedy = "Avoidance";
    }
    elseif($score->defence == $shadowFirstVal){
        $shadow_remedy = "Defense";
    }
    elseif($score->collapse == $shadowFirstVal){
        $shadow_remedy = "Collapse";
    }
    elseif($score->addiction == $shadowFirstVal){
        $shadow_remedy = "Addiction";
    }
    elseif($score->co_dependence == $shadowFirstVal){
        $shadow_remedy = "Co-dependence";
    }
    elseif($score->control == $shadowFirstVal){
        $shadow_remedy = "Control";
    }
    else{
        $shadow_remedy = "Anxious";
    }
    if($score->complaint == $shadowSecondVal){
        $shadow_remedy1 = "Complaint";
    }
    elseif($score->avoidance == $shadowSecondVal){
        $shadow_remedy1 = "Avoidance";
    }
    elseif($score->defence == $shadowSecondVal){
        $shadow_remedy1 = "Defense";
    }
    elseif($score->collapse == $shadowSecondVal){
        $shadow_remedy1 = "Collapse";
    }
    elseif($score->addiction == $shadowSecondVal){
        $shadow_remedy1 = "Addiction";
    }
    elseif($score->co_dependence == $shadowSecondVal){
        $shadow_remedy1 = "Co-dependence";
    }
    elseif($score->control == $shadowSecondVal){
        $shadow_remedy1 = "Control";
    }
    else{
        $shadow_remedy1 = "Anxious";
    }

    $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$shadow_remedy)->first();
    $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$shadow_remedy1)->first();

    
    $shadow_per = array(
        'defense_complaint'  => round($score->defense/($score->complaint+$score->defense)*100),
        'control_collapse'  => round($score->collapse/($score->control+$score->collapse)*100),
        'avoidance_anxious'  => round($score->anxious/($score->avoidance+$score->anxious)*100),
        'addiction_dependence'  => round($score->co_dependence/($score->addiction+$score->co_dependence)*100),
    );

    if($complaint>$defense){
        $sens1 ="complaint";
    }
    else{
        $sens1 ="defense";
    }
    if($control>$collapse){
        $sens2 ="control";
    }
    else{
        $sens2 ="collapse";
    }

    if($avoidance>$anxious){
        $sens3 ="avoidance";
    }
    else{
        $sens3 ="anxious";
    }

    if($addiction>$dependence){
        $sens4 ="addiction";
    }
    else{
        $sens4 ="dependence";
    }

    $emp10 = DB::table('sensitivities')->select('emphasizing1')->where('archetype',$sens1)->first();
    $emp11 = DB::table('sensitivities')->select('emphasizing2')->where('archetype',$sens2)->first();
    $emp12 = DB::table('sensitivities')->select('emphasizing3')->where('archetype',$sens3)->first();
    $emp13 = DB::table('sensitivities')->select('emphasizing4')->where('archetype',$sens4)->first();

 
    


    return view('frontend.email.pdf',compact('user_details','possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','implicit_explicit','reactive_repressive_per'
    ,'autonomous_engaged','structred_opened','internal_external','directive_col','intuitive_con','initiate_re','plannning_spontaneity','variety_depth','shadow_lookup_text','complaint','avoidance',
    'anxious','control','collapse','addiction','dependence','defense','secendory_shadow','remedy','remedy1','shadow_percentage','per_shadow','refrence','content','tendencies','emphasizing1','emphasizing2',
    'emphasizing3','emphasizing4','emp1','emp2','emp3','emp4','emp5','emp6','erotic_profile','emp7','emp8','emp9','shadow_remedy','shadow_remedy1','secendory_shadow','shadow_per','emp10','emp11',
    'emp12','emp13'));

    }

    public function report(Request $request){
        $id = base64_decode($request['formid']);
		$cid= str_replace('formid', '', $id);
        $formdata = DB::table('formdata')->select('data','created_at')->where('id',$cid)->first();
        $data = json_decode($formdata->data, true);
        $user_details = array(
        'relation'=> $data['question4']['answer1'],
        'firstname'=> $data['question20']['firstname'],
        'lastname'=> $data['question21']['lastname'],
        'created_at'=> $formdata->created_at,
         );


        
   
    


    $score = DB::table('relationship_scores')->leftJoin('shadow_scores', 'relationship_scores.user_id', '=', 'shadow_scores.user_id')->where('relationship_scores.formid',$cid)->first();
    $max_gift_score = 62;
    $min_gift_score = -12;
    $possibility = round($score->possibility/(abs($min_gift_score)+($max_gift_score))*100);
    $appreciation = round($score->appreciation/(abs($min_gift_score)+($max_gift_score))*100);
    $truth = round($score->truth/(abs($min_gift_score)+($max_gift_score))*100);
    $harmony = round($score->harmony/(abs($min_gift_score)+($max_gift_score))*100);
    $freedom = round($score->freedom/(abs($min_gift_score)+($max_gift_score))*100);
    $devotion = round($score->devotion/(abs($min_gift_score)+($max_gift_score))*100);
    $passion = round($score->passion/(abs($min_gift_score)+($max_gift_score))*100);
    $partnership = round($score->partnership/(abs($min_gift_score)+($max_gift_score))*100);

    $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
    rsort($relationship_arr);
    $relationship_lookup_text = $this->relationship_lookuptext1($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);

    $implicit_explicit = round($score->implicit/($score->explicit+$score->implicit)*100);
    $reactive_repressive_per = round($score->repressive/($score->reactive+$score->repressive)*100);
    $autonomous_engaged = round($score->engaged/($score->autonomous+$score->engaged)*100);
    $structred_opened = round($score->acceptance/($score->achievement+$score->acceptance)*100);
    $internal_external = round($score->external/($score->internal+$score->external)*100);
    $directive_col = round($score->collaborative/($score->directive+$score->collaborative)*100);
    $intuitive_con = round($score->considered/($score->instinctive+$score->considered)*100);
    $initiate_re = round($score->reciprocating/($score->initiating+$score->reciprocating)*100); 
    $plannning_spontaneity = round($score->spontaneity/($score->planning+$score->spontaneity)*100); 
    $variety_depth = round($score->depth/($score->variety+$score->depth)*100);
   

    $shadow_arr = array($score->complaint,$score->defense,$score->avoidance,$score->anxious,$score->control,$score->collapse,$score->addiction,$score->co_dependence);
    rsort($shadow_arr);
    //  echo"<pre>";print_r($shadow_arr);echo"</pre>";exit();
    $shadow_lookup_text = $this->shadow_lookup_text1($score->complaint,$score->defense,$score->avoidance,$score->anxious,$score->control,$score->collapse,$score->addiction,$score->co_dependence,$shadow_arr);
 
    /*Shadow score*/
    $max_shadow_score = 68;
    $min_shadow_score = -14;
    $complaint = round($score->complaint/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $defense = round($score->defense/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $avoidance = round($score->avoidance/(abs($min_shadow_score)+($max_shadow_score))*100); 
 
    $anxious = round($score->anxious/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $control = round($score->control/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $collapse = round($score->collapse/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $addiction = round($score->addiction/(abs($min_shadow_score)+($max_shadow_score))*100); 
    $dependence = round($score->co_dependence/(abs($min_shadow_score)+($max_shadow_score))*100); 



    $arr_shadow = array($complaint,$defense,$avoidance,$anxious,$control,$collapse,$addiction,$dependence);
    rsort($arr_shadow);
    $shadowFirstVal = $arr_shadow[0];
    $shadowSecondVal = $arr_shadow[1];

    if($complaint == $shadowFirstVal){
        $remedy = "Complaint";
    }
    elseif($avoidance == $shadowFirstVal){
        $remedy = "Avoidance";
    }
    elseif($defense == $shadowFirstVal){
        $remedy = "Defense";
    }
    elseif($collapse == $shadowFirstVal){
        $remedy = "Collapse";
    }
    elseif($addiction == $shadowFirstVal){
        $remedy = "Addiction";
    }
    elseif($dependence == $shadowFirstVal){
        $remedy = "Co-dependence";
    }
    elseif($control == $shadowFirstVal){
        $remedy = "Control";
    }
    else{
        $remedy = "Anxious";
    }

    if($complaint == $shadowSecondVal){
        $remedy1 = "Complaint";
    }
    elseif($avoidance== $shadowSecondVal){
        $remedy1 = "Avoidance";
    }
    elseif($defense == $shadowSecondVal){
        $remedy1 = "Defense";
    }
    elseif($collapse == $shadowSecondVal){
        $remedy1 = "Collapse";
    }
    elseif($addiction == $shadowSecondVal){
        $remedy1 = "Addiction";
    }
    elseif($dependence == $shadowSecondVal){
        $remedy1 = "Co-dependence";
    }
    elseif($control == $shadowSecondVal){
        $remedy1 = "Control";
    }
    else{
        $remedy1 = "Anxious";
    }
    $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy)->first();
    $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy1)->first();
    $shadow_percentage = array(
        'app_possibility' => round($score->appreciation/($score->possibility+$score->appreciation)*100),
        'harmony_truth' => round($score->harmony/($score->truth+$score->harmony)*100),
        'devotion_freedom' => round($score->devotion/($score->freedom+$score->devotion)*100),
        'passion_part' => round($score->partnership/($score->passion+$score->partnership)*100),
    );

    $per_shadow = array(
        'defense_complaint'  => round($score->defense/($score->complaint+$score->defense)*100),
        'control_collapse'  => round($score->collapse/($score->control+$score->collapse)*100),
        'avoidance_anxious'  => round($score->anxious/($score->avoidance+$score->anxious)*100),
        'addiction_dependence'  => round($score->co_dependence/($score->addiction+$score->co_dependence)*100),
    );
    if($score->internal>$score->external){
        $refrence="internal";
    }
    else{
        $refrence="external";
    }
   
    $content = DB::table('content_references')->where('type',$refrence)->first();

    $tendencies = array(
        'possibility_app' => round($score->appreciation/($score->possibility+$score->appreciation)*100),
        'freedom_devotion' => round($score->devotion/($score->freedom+$score->devotion)*100),
        'truth_harmony' => round($score->harmony/($score->truth+$score->harmony)*100),
        'passion_part' => round($score->partnership/($score->passion+$score->partnership)*100),
    );

    if($possibility>$appreciation){
        $tend1 ="possibility";
    }
    else{
        $tend1 ="appreciation";
    }
    if($freedom>$devotion){
        $tend2 ="freedom";
    }
    else{
        $tend2 ="devotion";
    }

    if($truth>$harmony){
        $tend3 ="truth";
    }
    else{
        $tend3 ="harmony";
    }
    if($passion>$partnership){
        $tend4 ="passion";
    }
    else{
        $tend4 ="partnership";
    }
    $emphasizing1 = DB::table('tendencies')->select('emphasizing1')->where('archetype',$tend1)->first();
    $emphasizing2 = DB::table('tendencies')->select('emphasizing2')->where('archetype',$tend3)->first();
    $emphasizing3 = DB::table('tendencies')->select('emphasizing3')->where('archetype',$tend2)->first();
    $emphasizing4 = DB::table('tendencies')->select('emphasizing4')->where('archetype',$tend4)->first();

    if($score->implicit>$score->explicit){
        $implicit_explicit = "implicit";
    }
    else{
        $implicit_explicit = "explicit";
    }

    $emp1 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$implicit_explicit)->first();
    $emp2 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$implicit_explicit)->first();
    
    if($score->instinctive>$score->considered){
        $impulsive_considered = "impulsive";
    }
    else{
        $impulsive_considered = "considered";
    }
    $emp3 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$impulsive_considered)->first();
    $emp4 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$impulsive_considered)->first();


    if($score->achievement>$score->acceptance){
        $achievement_acceptance = "achievement";
    }
    else{
        $achievement_acceptance = "acceptance";
    }
    if($score->autonomous>$score->engaged){
        $autonomous_engaged = "autonomous";
    }
    else{
        $autonomous_engaged = "engaged";
    }
    
    $emp5 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$achievement_acceptance)->first();
    $emp6 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$autonomous_engaged)->first();

    $erotic_profile = array(
        'initiate' =>$score->initiating,
        'reciprocating' =>$score->reciprocating,
        'spontaneity' =>$score->spontaneity,
        'planning' =>$score->planning,
        'variety' =>$score->variety,
        'depth' =>$score->depth,
        'initiate_re' =>round($score->reciprocating/($score->initiating+$score->reciprocating)*100),
        'plannning_spontaneity' =>round($score->spontaneity/($score->planning+$score->spontaneity)*100),
        'variety_depth' =>round($score->depth/($score->variety+$score->depth)*100),
    );

    if($score->initiating>$score->reciprocating){
        $er1 ="initiating";
    }
    else{
        $er1 ="reciprocating";
    }
    if($score->spontaneity>$score->planning){
        $er2 ="spontaneity";
    }
    else{
        $er2 ="planning";
    }

    if($score->variety>$score->depth){
        $er3 ="variety";
    }
    else{
        $er3 ="depth";
    }
    $emp7 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er1)->first();
    $emp8 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er2)->first();
    $emp9 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er3)->first();

    $shadowFirstVal = $shadow_arr[0];
    $shadowSecondVal = $shadow_arr[1];
    if($score->complaint == $shadowFirstVal){
        $shadow_remedy = "Complaint";
    }
    elseif($score->avoidance == $shadowFirstVal){
        $shadow_remedy = "Avoidance";
    }
    elseif($score->defence == $shadowFirstVal){
        $shadow_remedy = "Defense";
    }
    elseif($score->collapse == $shadowFirstVal){
        $shadow_remedy = "Collapse";
    }
    elseif($score->addiction == $shadowFirstVal){
        $shadow_remedy = "Addiction";
    }
    elseif($score->co_dependence == $shadowFirstVal){
        $shadow_remedy = "Co-dependence";
    }
    elseif($score->control == $shadowFirstVal){
        $shadow_remedy = "Control";
    }
    else{
        $shadow_remedy = "Anxious";
    }
    if($score->complaint == $shadowSecondVal){
        $shadow_remedy1 = "Complaint";
    }
    elseif($score->avoidance == $shadowSecondVal){
        $shadow_remedy1 = "Avoidance";
    }
    elseif($score->defence == $shadowSecondVal){
        $shadow_remedy1 = "Defense";
    }
    elseif($score->collapse == $shadowSecondVal){
        $shadow_remedy1 = "Collapse";
    }
    elseif($score->addiction == $shadowSecondVal){
        $shadow_remedy1 = "Addiction";
    }
    elseif($score->co_dependence == $shadowSecondVal){
        $shadow_remedy1 = "Co-dependence";
    }
    elseif($score->control == $shadowSecondVal){
        $shadow_remedy1 = "Control";
    }
    else{
        $shadow_remedy1 = "Anxious";
    }

    $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$shadow_remedy)->first();
    $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$shadow_remedy1)->first();

    
    $shadow_per = array(
        'defense_complaint'  => round($score->defense/($score->complaint+$score->defense)*100),
        'control_collapse'  => round($score->collapse/($score->control+$score->collapse)*100),
        'avoidance_anxious'  => round($score->anxious/($score->avoidance+$score->anxious)*100),
        'addiction_dependence'  => round($score->co_dependence/($score->addiction+$score->co_dependence)*100),
    );

    if($complaint>$defense){
        $sens1 ="complaint";
    }
    else{
        $sens1 ="defense";
    }
    if($control>$collapse){
        $sens2 ="control";
    }
    else{
        $sens2 ="collapse";
    }

    if($avoidance>$anxious){
        $sens3 ="avoidance";
    }
    else{
        $sens3 ="anxious";
    }

    if($addiction>$dependence){
        $sens4 ="addiction";
    }
    else{
        $sens4 ="dependence";
    }

    $emp10 = DB::table('sensitivities')->select('emphasizing1')->where('archetype',$sens1)->first();
    $emp11 = DB::table('sensitivities')->select('emphasizing2')->where('archetype',$sens2)->first();
    $emp12 = DB::table('sensitivities')->select('emphasizing3')->where('archetype',$sens3)->first();
    $emp13 = DB::table('sensitivities')->select('emphasizing4')->where('archetype',$sens4)->first();

 
    


    return view('frontend.email.report',compact('user_details','possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','implicit_explicit','reactive_repressive_per'
    ,'autonomous_engaged','structred_opened','internal_external','directive_col','intuitive_con','initiate_re','plannning_spontaneity','variety_depth','shadow_lookup_text','complaint','avoidance',
    'anxious','control','collapse','addiction','dependence','defense','secendory_shadow','remedy','remedy1','shadow_percentage','per_shadow','refrence','content','tendencies','emphasizing1','emphasizing2',
    'emphasizing3','emphasizing4','emp1','emp2','emp3','emp4','emp5','emp6','erotic_profile','emp7','emp8','emp9','shadow_remedy','shadow_remedy1','secendory_shadow','shadow_per','emp10','emp11',
    'emp12','emp13'));
        
    }

 

}
