<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ShadowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    public function index(){   
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);

        $primary_qualities =  DB::table('shadow_lookup_texts')->select('primary_qualities')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_qualities =  DB::table('shadow_lookup_texts')->select('secondary_qualities')->where('archetype',$relationship_lookup_text['secondary'])->first();

        return view('frontend.shadow-qualities',compact('relationship_lookup_text',"primary_qualities",'secondary_qualities'));
    }

    public function calculate_score(){
        $sessiondata = session()->all();
        $get = DB::table('shadow_scores')->where('formid',$sessiondata['formid'])->first();
        $max_shadow_score = 68;
        $min_shadow_score = -14;

        $complaint = round($get->complaint/(abs($min_shadow_score)+($max_shadow_score))*100);
        $defense = round($get->defense/(abs($min_shadow_score)+($max_shadow_score))*100);
        $avoidance = round($get->avoidance/(abs($min_shadow_score)+($max_shadow_score))*100);
        $anxious = round($get->anxious/(abs($min_shadow_score)+($max_shadow_score))*100);
        $control = round($get->control/(abs($min_shadow_score)+($max_shadow_score))*100);
        $collapse = round($get->collapse/(abs($min_shadow_score)+($max_shadow_score))*100);
        $addiction = round($get->addiction/(abs($min_shadow_score)+($max_shadow_score))*100);
        $dependence = round($get->co_dependence/(abs($min_shadow_score)+($max_shadow_score))*100);

        $shadow_per = array(
            'defense_complaint'  => round($get->defense/($get->complaint+$get->defense)*100),
            'control_collapse'  => round($get->collapse/($get->control+$get->collapse)*100),
            'avoidance_anxious'  => round($get->anxious/($get->avoidance+$get->anxious)*100),
            'addiction_dependence'  => round($get->co_dependence/($get->addiction+$get->co_dependence)*100),
        );

        $relationship_arr = array("complaint"=>$complaint,"defense"=>$defense,"avoidance"=>$avoidance,"anxious"=>$anxious,"control"=>$control,"collapse"=>$collapse,"addiction"=>$addiction,"dependence"=>$dependence,'shadow_per'=>$shadow_per);
        return $relationship_arr;
    }

    public function relationship_lookuptext($complaint,$defense,$avoidance,$anxious,$control,$collapse,$addiction,$dependence,$relationship_arr){
        
        if($complaint==$relationship_arr[0]){
            $primary ="complaint";
            $primary1 ="possibility";
        }
        elseif($defense==$relationship_arr[0]){
            $primary ="defence";
            $primary1 ="appreciation";
        }
        elseif($avoidance==$relationship_arr[0]){
            $primary ="avoidance";
            $primary1 ="freedom";
        }
        elseif($anxious==$relationship_arr[0]){
            $primary ="anxious";
            $primary1 ="devotion";
        }
        elseif($control==$relationship_arr[0]){
            $primary ="control";
            $primary1 ="truth";
        }
        elseif($collapse==$relationship_arr[0]){
            $primary ="collapse";
            $primary1 ="harmony";
        }
        elseif($addiction==$relationship_arr[0]){
            $primary ="addiction";
            $primary1 ="passion";
        }
        else{
            $primary ="dependence";
            $primary1 ="partnership";
        }  
       
        if($complaint==$relationship_arr[1]){
            $secondary ="complaint";
            $secondary1 ="possibility";
        }
        elseif($defense==$relationship_arr[1]){
            $secondary ="defense";
            $secondary1 ="appreciation";
        }
        elseif($avoidance==$relationship_arr[1]){
            $secondary ="avoidance";
            $secondary1 ="freedom";
        }
        elseif($anxious==$relationship_arr[1]){
            $secondary ="anxious";
            $secondary1 ="devotion";
        }
        elseif($control==$relationship_arr[1]){
            $secondary ="control";
            $secondary1 ="truth";
        }
        elseif($collapse==$relationship_arr[1]){
            $secondary ="collapse";
            $secondary1 ="harmony";
        }
        elseif($addiction==$relationship_arr[1]){
            $secondary ="addiction";
            $secondary1 ="passion";
        }
        else{
            $secondary ="dependence";
            $secondary1 ="partnership";
        }
        $sessiondata = session()->all();
        $formdata = DB::table('formdata')->select('data')->where('id',$sessiondata['formid'])->first();
        $data = json_decode($formdata->data, TRUE);
        $gender = $data['question18']['gender'];
        $feedback_icons = DB::table('shadow_feedback_icons')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $banners = DB::table('banners_shadow')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $promo_img = DB::table('promos')->select($secondary1.'_'.$gender)->where('archetype',$primary1)->first();
        $lookuptext = DB::table('shadow_lookup_texts')->select($secondary)->where('archetype',$primary)->first();
        $primary_images = DB::table('primary_shadow_qualities')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $secondary_images = DB::table('secondary_shadow_qualities')->select($secondary.'_'.$gender)->where('archetype',$secondary)->first();
        
        $images = DB::table('shadow_icons')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $primary_image = $primary_images->{$secondary.'_'.$gender};
        $secondary_image = $secondary_images->{$secondary.'_'.$gender};
        
        $icon_image = $images->{$secondary.'_'.$gender};
        $feedback_icon = $feedback_icons->{$secondary.'_'.$gender};
        $banners_image = $banners->{$secondary.'_'.$gender};
        $promo_image = $promo_img->{$secondary1.'_'.$gender};;
        return array('feedback_icon'=>$feedback_icon,'promo_image'=>$promo_image,'banners_image'=>$banners_image,'lookuptext'=>$lookuptext->$secondary,'primary'=>$primary,'secondary'=>$secondary,'primary_image'=>$primary_image,'secondary_image'=>$secondary_image,'icon_image'=>$icon_image,'gender'=>$gender);
    }

    public function toxic_cycle(){
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);
        $toxic_cycle =  DB::table('toxic_cycle_images')->select($relationship_lookup_text['primary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $toxic_image = $toxic_cycle->{$relationship_lookup_text['primary'].'_'.$relationship_lookup_text['gender']};
        $shadowFirstVal = $relationship_arr[0];
        $shadowSecondVal = $relationship_arr[1];
        if($calculate_score['complaint'] == $shadowFirstVal){
            $remedy = "Complaint";
        }
        elseif($calculate_score['avoidance'] == $shadowFirstVal){
            $remedy = "Avoidance";
        }
        elseif($calculate_score['defense'] == $shadowFirstVal){
            $remedy = "Defense";
        }
        elseif($calculate_score['collapse'] == $shadowFirstVal){
            $remedy = "Collapse";
        }
        elseif($calculate_score['addiction'] == $shadowFirstVal){
            $remedy = "Addiction";
        }
        elseif($calculate_score['dependence'] == $shadowFirstVal){
            $remedy = "Co-dependence";
        }
        elseif($calculate_score['control'] == $shadowFirstVal){
            $remedy = "Control";
        }
        else{
            $remedy = "Anxious";
        }

        if($calculate_score['complaint'] == $shadowSecondVal){
            $remedy1 = "Complaint";
        }
        elseif($calculate_score['avoidance'] == $shadowSecondVal){
            $remedy1 = "Avoidance";
        }
        elseif($calculate_score['defense'] == $shadowSecondVal){
            $remedy1 = "Defense";
        }
        elseif($calculate_score['collapse'] == $shadowSecondVal){
            $remedy1 = "Collapse";
        }
        elseif($calculate_score['addiction'] == $shadowSecondVal){
            $remedy1 = "Addiction";
        }
        elseif($calculate_score['dependence'] == $shadowSecondVal){
            $remedy1 = "Co-dependence";
        }
        elseif($calculate_score['control'] == $shadowSecondVal){
            $remedy1 = "Control";
        }
        else{
            $remedy1 = "Anxious";
        }
        $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy)->first();
        $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy1)->first();
        $toxic_content = DB::table('shadow_lookup_texts')->select('toxic_cycle','primary_toxic_cycle','primay_toxic_remedy')->where('archetype',$relationship_lookup_text['primary'])->first();
        $primary_toxic_images = DB::table('primary_toxic_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $primary_toxic_image = $primary_toxic_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};
        $secondary_toxic_images = DB::table('secondary_toxic_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['secondary'])->first();
        $secondary_toxic_image = $secondary_toxic_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};
        $secondary_content = DB::table('shadow_lookup_texts')->select('secondary_toxic_cyle','secondary_toxic_remedy')->where('archetype',$relationship_lookup_text['secondary'])->first();
      
        return view('frontend.toxic-cycle',compact('relationship_lookup_text','toxic_image','remedy','remedy1','secendory_shadow','toxic_content','primary_toxic_image','secondary_content','secondary_toxic_image'));
    }

    public function sensitivities(){
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);
        if($calculate_score['complaint']>$calculate_score['defense']){
            $sens1 ="complaint";
        }
        else{
            $sens1 ="defense";
        }
        if($calculate_score['control']>$calculate_score['collapse']){
            $sens2 ="control";
        }
        else{
            $sens2 ="collapse";
        }

        if($calculate_score['avoidance']>$calculate_score['anxious']){
            $sens3 ="avoidance";
        }
        else{
            $sens3 ="anxious";
        }

        if($calculate_score['addiction']>$calculate_score['dependence']){
            $sens4 ="addiction";
        }
        else{
            $sens4 ="dependence";
        }
        $emphasizing1 = DB::table('sensitivities')->select('emphasizing1')->where('archetype',$sens1)->first();
        $emphasizing2 = DB::table('sensitivities')->select('emphasizing2')->where('archetype',$sens2)->first();
        $emphasizing3 = DB::table('sensitivities')->select('emphasizing3')->where('archetype',$sens3)->first();
        $emphasizing4 = DB::table('sensitivities')->select('emphasizing4')->where('archetype',$sens4)->first();
        return view('frontend.sensitivities',compact('relationship_lookup_text','calculate_score','emphasizing1','emphasizing3','emphasizing2','emphasizing4'));

    }

    public function primary_needs(){
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);
        $primary_needs = DB::table('shadow_lookup_texts')->select('primary_needs')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_needs = DB::table('shadow_lookup_texts')->select('secondary_needs')->where('archetype',$relationship_lookup_text['secondary'])->first();
     
        return view('frontend.primary-needs',compact('relationship_lookup_text','relationship_arr','calculate_score','primary_needs','secondary_needs'));

    }
    
    public function biggest_doubts(){
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);
        $primary_doubts = DB::table('shadow_lookup_texts')->select('primary_doubts')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_doubts = DB::table('shadow_lookup_texts')->select('secondary_doubts')->where('archetype',$relationship_lookup_text['secondary'])->first();
     
        return view('frontend.biggest-doubts-and-fears',compact('relationship_lookup_text','relationship_arr','calculate_score','primary_doubts','secondary_doubts'));
    }

    public function triggered_by(){
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);
        $primary_trigger = DB::table('shadow_lookup_texts')->select('primary_trigger')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_trigger = DB::table('shadow_lookup_texts')->select('secondary_trigger')->where('archetype',$relationship_lookup_text['secondary'])->first();
     
        return view('frontend.most-triggered-by',compact('relationship_lookup_text','relationship_arr','calculate_score','primary_trigger','secondary_trigger'));
    }

    public function conflict_profile(){
        $calculate_score = $this->calculate_score();
        $relationship_arr = array($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence']);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($calculate_score['complaint'],$calculate_score['defense'],$calculate_score['avoidance'],$calculate_score['anxious'],$calculate_score['control'],$calculate_score['collapse'],
        $calculate_score['addiction'],$calculate_score['dependence'],$relationship_arr);
        $re_images =  DB::table('resolution')->select($relationship_lookup_text['primary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $re_image = $re_images->{$relationship_lookup_text['primary'].'_'.$relationship_lookup_text['gender']};
        $primary_conflict = DB::table('shadow_lookup_texts')->select('primary_conflict')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_conflict = DB::table('shadow_lookup_texts')->select('secondary_conflict')->where('archetype',$relationship_lookup_text['secondary'])->first();
        $resolution_stages = DB::table('shadow_lookup_texts')->select('resolution_stages')->where('archetype',$relationship_lookup_text['secondary'])->first();
        $primary_strategy = DB::table('shadow_lookup_texts')->select('primary_strategy')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_strategy = DB::table('shadow_lookup_texts')->select('secondary_strategy')->where('archetype',$relationship_lookup_text['secondary'])->first();
        $resolution =  DB::table('shadow_lookup_texts')->select('regulate_preference','restore_preference','reinterpret_preference','restructure_preference','release_preference'
        ,'regulate_growth','restore_growth','reinterpret_growth','restructure_growth','release_growth')->where('archetype',$relationship_lookup_text['primary'])->first();

        return view('frontend.conflict-profile',compact('relationship_lookup_text','re_image','primary_conflict','secondary_conflict','resolution_stages','primary_strategy','secondary_strategy','resolution'));
    }
    



}
