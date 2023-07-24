<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class RelationshipController extends Controller
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
        $data = session()->all();
        $get = DB::table('relationship_scores')->where('formid',$data['formid'])->first();
        $max_gift_score = 62;
        $min_gift_score = -12;
        $possibility = round($get->possibility/(abs($min_gift_score)+($max_gift_score))*100);
        $appreciation = round($get->appreciation/(abs($min_gift_score)+($max_gift_score))*100);
        $truth = round($get->truth/(abs($min_gift_score)+($max_gift_score))*100);
        $harmony = round($get->harmony/(abs($min_gift_score)+($max_gift_score))*100);
        $freedom = round($get->freedom/(abs($min_gift_score)+($max_gift_score))*100);
        $devotion = round($get->devotion/(abs($min_gift_score)+($max_gift_score))*100);
        $passion = round($get->passion/(abs($min_gift_score)+($max_gift_score))*100);
        $partnership = round($get->partnership/(abs($min_gift_score)+($max_gift_score))*100);
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        //  echo"<pre>";print_r($relationship_lookup_text);echo"</pre>";exit();
        return view('frontend.primary-gifts',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text'));
    }



    public function relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr){
        $sessiondata = session()->all();
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
        $lookuptext = DB::table('lookup_texts')->select($secondary)->where('archetype',$primary)->first();
        $primary_gifts =  DB::table('lookup_texts')->select('primary_gift')->where('archetype',$primary)->first();
        $secondary_gifts =  DB::table('lookup_texts')->select('secondary_gift')->where('archetype',$secondary)->first();
        $formdata = DB::table('formdata')->select('data')->where('id',$sessiondata['formid'])->first();
        $data = json_decode($formdata->data, TRUE);
        $gender = $data['question18']['gender'];
        $images = DB::table('images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $banners = DB::table('banners')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $videos = DB::table('lookup_texts')->select('video')->where('archetype',$primary)->first();
        $feedback_icons = DB::table('feedback_icons')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $promo_img = DB::table('promos')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();

        
        $icon_image = $images->{$secondary.'_'.$gender};
        $feedback_icon = $feedback_icons->{$secondary.'_'.$gender};
        $banners_image = $banners->{$secondary.'_'.$gender};
        $promo_image = $promo_img->{$secondary.'_'.$gender};
        return array('lookuptext'=>$lookuptext->$secondary,'primary_gifts'=>$primary_gifts,'secondary_gifts'=> $secondary_gifts,'icon'=>$icon_image,'banner'=>$banners_image,'videos'=>$videos,'feedback_icon'=>$feedback_icon,'primary'=>$primary,'secondary'=>$secondary,'gender'=>$gender,'promo_image'=>$promo_image);
    }

    public function relationship_qualities(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $primary_qualities =  DB::table('lookup_texts')->select('primary_qualities')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_qualities =  DB::table('lookup_texts')->select('secondary_qualities')->where('archetype',$relationship_lookup_text['secondary'])->first();
        $primary_images = DB::table('primary_quality_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $primary_image = $primary_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};
        $secondary_images = DB::table('secondary_quality_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['secondary'])->first();
        $secondary_image = $secondary_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};

        return view('frontend.relationship-qualities',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','primary_qualities','secondary_qualities','primary_image','secondary_image'));
    }

    public function calculate_score(){
        $data = session()->all();
        $get = DB::table('relationship_scores')->where('formid',$data['formid'])->first();
        $max_gift_score = 62;
        $min_gift_score = -12;
        $possibility = round($get->possibility/(abs($min_gift_score)+($max_gift_score))*100);
        $appreciation = round($get->appreciation/(abs($min_gift_score)+($max_gift_score))*100);
        $truth = round($get->truth/(abs($min_gift_score)+($max_gift_score))*100);
        $harmony = round($get->harmony/(abs($min_gift_score)+($max_gift_score))*100);
        $freedom = round($get->freedom/(abs($min_gift_score)+($max_gift_score))*100);
        $devotion = round($get->devotion/(abs($min_gift_score)+($max_gift_score))*100);
        $passion = round($get->passion/(abs($min_gift_score)+($max_gift_score))*100);
        $partnership = round($get->partnership/(abs($min_gift_score)+($max_gift_score))*100);
        $internal = $get->internal;
        $external = $get->external;
        if($get->implicit>$get->explicit){
            $implicit_explicit = "implicit";
        }
        else{
            $implicit_explicit = "explicit";
        }
        if($get->reactive>$get->repressive){
            $reactive_repressive = "reactive";
        }
        else{
            $reactive_repressive = "repressive";
        }
        $communication_profile = array(
            "implicit_explicit"=>$implicit_explicit,
            "reactive_repressive"=>$reactive_repressive,
        );

        if($get->instinctive>$get->considered){
            $impulsive_considered = "impulsive";
        }
        else{
            $impulsive_considered = "considered";
        }
        if($get->directive>$get->collaborative){
            $directive_collaborative = "directive";
        }
        else{
            $directive_collaborative = "collaborative";
        }
        $decision_making = array(
            "impulsive_considered"=>$impulsive_considered,
            "directive_collaborative"=>$directive_collaborative,
        );
       
        if($get->achievement>$get->acceptance){
            $achievement_acceptance = "achievement";
        }
        else{
            $achievement_acceptance = "acceptance";
        }
        if($get->autonomous>$get->engaged){
            $autonomous_engaged = "autonomous";
        }
        else{
            $autonomous_engaged = "engaged";
        }
        $parenting = array(
            "achievement_acceptance"=>$achievement_acceptance,
            "autonomous_engaged"=>$autonomous_engaged,
        );
        $erotic = array(
        'initiate' => $get->initiating,
        'reciprocating' => $get->reciprocating,
        'reciprocating' => $get->reciprocating,
        'spontaneity' => $get->spontaneity,
        'planning' => $get->planning,
        'depth' => $get->depth,
        'variety' => $get->variety,
        );
        $relationship_arr = array("possibility"=>$possibility,"appreciation"=>$appreciation,"truth"=>$truth,"harmony"=>$harmony,"freedom"=>$freedom,"devotion"=>$devotion,"passion"=>$passion,"partnership"=>$partnership,'internal'=>$internal,'external'=>$external,'communication_profile'=>$communication_profile,'decision_making'=>$decision_making,'parenting'=>$parenting,'erotic'=>$erotic,'get'=>$get);
        return $relationship_arr;
    }

    public function themes(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $primary_themes =  DB::table('lookup_texts')->select('primary_theme')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_themes =  DB::table('lookup_texts')->select('secondary_theme')->where('archetype',$relationship_lookup_text['secondary'])->first();
        return view('frontend.themes',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','primary_themes','secondary_themes'));
    }

    public function relationship_skills(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $natural_skills =  DB::table('lookup_texts')->select('relationship_skills_natural')->where('archetype',$relationship_lookup_text['primary'])->first();
        $develop_skills =  DB::table('lookup_texts')->select('relationship_skills_develop')->where('archetype',$relationship_lookup_text['primary'])->first();
        return view('frontend.relationship-skills',compact('relationship_lookup_text','natural_skills','develop_skills'));
    }

    public function reference(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        if($calculate_score['internal']>$calculate_score['external']){
            $refrence="internal";
        }
        else{
            $refrence="external";
        }
        $internal_external = round($calculate_score['external']/($calculate_score['internal']+$calculate_score['external'])*100);
        $content = DB::table('content_references')->where('type',$refrence)->first();
        return view('frontend.reference',compact('relationship_lookup_text','internal_external','refrence','content'));
    }

    public function tendencies(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $total = array(
        'possibility_app' => round($calculate_score['get']->appreciation/($calculate_score['get']->possibility+$calculate_score['get']->appreciation)*100),
        'freedom_devotion' => round($calculate_score['get']->devotion/($calculate_score['get']->freedom+$calculate_score['get']->devotion)*100),
        'truth_harmony' => round($calculate_score['get']->harmony/($calculate_score['get']->truth+$calculate_score['get']->harmony)*100),
        'passion_part' => round($calculate_score['get']->partnership/($calculate_score['get']->passion+$calculate_score['get']->partnership)*100),
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
        $emphasizing3 = DB::table('tendencies')->select('emphasizing3')->where('archetype',$tend2)->first();
        $emphasizing2 = DB::table('tendencies')->select('emphasizing2')->where('archetype',$tend3)->first();
        $emphasizing4 = DB::table('tendencies')->select('emphasizing4')->where('archetype',$tend4)->first();
        return view('frontend.tendencies',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','total','emphasizing1','emphasizing3','emphasizing2','emphasizing4'));
    }

    public function energetic_profile(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $energetic =  DB::table('lookup_texts')->select('energetic_profile','energetic_shadow','energetic_gifts')->where('archetype',$relationship_lookup_text['primary'])->first();
        return view('frontend.energetic-profile',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','energetic'));
    }

    public function communication_profile(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $profile_images = DB::table('communication_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $profile_image = $profile_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};

        $emp1 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$calculate_score['communication_profile']['implicit_explicit'])->first();
        $emp2 = DB::table('communication_emphasizing')->select('type','emphasizing')->where('type',$calculate_score['communication_profile']['reactive_repressive'])->first();
        $primary_communication =  DB::table('lookup_texts')->select('primary_communication')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_communication =  DB::table('lookup_texts')->select('secondary_communication')->where('archetype',$relationship_lookup_text['secondary'])->first();
        $primary_shadow_remedy =  DB::table('lookup_texts')->select('primary_shadow','primary_remedy')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_shadow_remedy = DB::table('lookup_texts')->select('secondary_shadow','secondary_remedy')->where('archetype',$relationship_lookup_text['secondary'])->first();
        return view('frontend.communication-profile',compact('relationship_lookup_text','profile_image','emp1','emp2','primary_communication','secondary_communication','primary_shadow_remedy','secondary_shadow_remedy'));
    }
    
    public function decision_making(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $profile_images = DB::table('communication_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $profile_image = $profile_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};
        $emp1 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$calculate_score['decision_making']['impulsive_considered'])->first();
        $emp2 = DB::table('decision_emphasizing')->select('type','emphasizing')->where('type',$calculate_score['decision_making']['directive_collaborative'])->first();
        $primary_decision =  DB::table('lookup_texts')->select('primary_decision')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_decision =  DB::table('lookup_texts')->select('secondary_decision')->where('archetype',$relationship_lookup_text['secondary'])->first();

        $primary_decision_shadow = DB::table('lookup_texts')->select('primary_decision_shadow')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_decision_shadow =  DB::table('lookup_texts')->select('secondary_decision_shadow')->where('archetype',$relationship_lookup_text['secondary'])->first();

        $primary_decision_remedy = DB::table('lookup_texts')->select('primary_decision_remedy')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_decision_remedy = DB::table('lookup_texts')->select('secondary_decision_remedy')->where('archetype',$relationship_lookup_text['secondary'])->first();
        return view('frontend.decision-making-profile',compact('relationship_lookup_text','profile_image','emp1','emp2','primary_decision','secondary_decision','primary_decision_shadow','secondary_decision_shadow'
        ,'primary_decision_remedy','secondary_decision_remedy'));

    }

    public function parenting_profile(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $profile_images = DB::table('communication_images')->select($relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender'])->where('archetype',$relationship_lookup_text['primary'])->first();
        $profile_image = $profile_images->{$relationship_lookup_text['secondary'].'_'.$relationship_lookup_text['gender']};
        $emp1 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$calculate_score['parenting']['achievement_acceptance'])->first();
        $emp2 = DB::table('parenting_emphasizing')->select('type','emphasizing')->where('type',$calculate_score['parenting']['autonomous_engaged'])->first();
        $primary_parenting =  DB::table('lookup_texts')->select('primary_parenting','primary_parenting_shadow','primary_parenting_remedy')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_parenting =  DB::table('lookup_texts')->select('secondary_parenting','secondary_parenting_shadow','secondary_parenting_remedy')->where('archetype',$relationship_lookup_text['secondary'])->first();

        return view('frontend.parenting-profile',compact('relationship_lookup_text','profile_image','emp1','emp2','primary_parenting','secondary_parenting'));

    }

    public function erotic_profile(){
        $calculate_score = $this->calculate_score();
        $possibility = $calculate_score['possibility'];
        $appreciation = $calculate_score['appreciation'];
        $truth = $calculate_score['truth'];
        $harmony = $calculate_score['harmony'];
        $freedom = $calculate_score['freedom'];
        $devotion = $calculate_score['devotion'];
        $passion = $calculate_score['passion'];
        $partnership = $calculate_score['partnership'];
        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        //echo"<pre>";print_r($calculate_score);echo"</pre>";exit();
        if($calculate_score['erotic']['initiate']>$calculate_score['erotic']['reciprocating']){
            $er1 ="initiating";
        }
        else{
            $er1 ="reciprocating";
        }
        if($calculate_score['erotic']['spontaneity']>$calculate_score['erotic']['planning']){
            $er2 ="spontaneity";
        }
        else{
            $er2 ="planning";
        }

        if($calculate_score['erotic']['variety']>$calculate_score['erotic']['depth']){
            $er3 ="variety";
        }
        else{
            $er3 ="depth";
        }
        $initiate = $calculate_score['erotic']['initiate'];
        $reciprocating = $calculate_score['erotic']['reciprocating'];
        $spontaneity = $calculate_score['erotic']['spontaneity'];
        $planning = $calculate_score['erotic']['planning'];
        $variety = $calculate_score['erotic']['variety'];
        $depth = $calculate_score['erotic']['depth'];
        $emphasizing1 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er1)->first();
        $emphasizing2 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er2)->first();
        $emphasizing3 = DB::table('erotic_emphasizing')->select('emphasizing')->where('type',$er3)->first();

        $initiate_re = round($calculate_score['erotic']['reciprocating']/($calculate_score['erotic']['initiate']+$calculate_score['erotic']['reciprocating'])*100);
        $plannning_spontaneity = round($calculate_score['erotic']['spontaneity']/($calculate_score['erotic']['planning']+$calculate_score['erotic']['spontaneity'])*100);
        $variety_depth = round($calculate_score['erotic']['depth']/($calculate_score['erotic']['variety']+$calculate_score['erotic']['depth'])*100);

        $primary_erotic =  DB::table('lookup_texts')->select('primary_erotic','primary_erotic_shadow','primary_erotic_remedy')->where('archetype',$relationship_lookup_text['primary'])->first();
        $secondary_erotic =  DB::table('lookup_texts')->select('secondary_erotic','secondary_erotic_shadow','secondary_erotic_remedy')->where('archetype',$relationship_lookup_text['secondary'])->first();
        
        return view('frontend.erotic-profile',compact('relationship_lookup_text','emphasizing1','emphasizing2','emphasizing3','initiate_re','plannning_spontaneity','variety_depth'
        ,'initiate','reciprocating','spontaneity','planning','variety','depth','primary_erotic','secondary_erotic'));
    }

    public function feedback_submit(){
        $formid = $_GET['formid'];
        $page = $_GET['page'];
        $star = $_GET['star'];
        $authid = $_GET['authid'];


    

        $formidtest = DB::table('feedback')->where('formid',$formid)->first();
        if($formidtest == ''){
            
            $create_auth = DB::table('feedback')->insert(['formid'=>$formid]);
        } 
       
        if($page == 'primary-gifts'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page1'=>$star,             
            ]);
        }elseif($page == 'relationship-qualities'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page2'=>$star,             
            ]);
        }elseif($page == 'themes'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page3'=>$star,             
            ]);
        }elseif($page == 'relationship-skills'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page4'=>$star,             
            ]);
        }elseif($page == 'reference'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page5'=>$star,             
            ]);
        }elseif($page == 'tendencies'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page6'=>$star,             
            ]);
        }elseif($page == 'energetic-profile'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page7'=>$star,             
            ]);
        }elseif($page == 'communication-profile'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page8'=>$star,             
            ]);
        }elseif($page == 'decision-making-profile'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page9'=>$star,             
            ]);
        }elseif($page == 'parenting-profile'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page10'=>$star,             
            ]);
        }elseif($page == 'erotic-profile'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page11'=>$star,             
            ]);
        }elseif($page == 'shadow-qualities'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page12'=>$star,             
            ]);
        }elseif($page == 'toxic-cycle'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page13'=>$star,             
            ]);
        }elseif($page == 'sensitivities'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page14'=>$star,             
            ]);
        }elseif($page == 'primary-needs'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page15'=>$star,             
            ]);
        }elseif($page == 'biggest-doubts-and-fears'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page16'=>$star,             
            ]);
        }elseif($page == 'most-triggered-by'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page17'=>$star,             
            ]);
        }elseif($page == 'conflict-profile'){
            $insert_feedback = DB::table('feedback')->where('formid',$formid)->update([
                'page18'=>$star,             
            ]);
        }
        
    }
}
