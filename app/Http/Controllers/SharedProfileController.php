<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Answers;
use App\Models\Bias;
use App\Models\Quiz;

class SharedProfileController extends Controller
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
        $id = base64_decode($_GET['formid']);
		$cid= str_replace('formid', '', $id);
        $formval = DB::table('formdata')->where('id',$cid)->first();
        
      
        
        $a = json_decode($formval->data, true);
        $chk_phone = Quiz::select('question_no')->where('question_name','phone')->where('status','0')->first();
        $chk_invest = Quiz::select('question_no')->where('question_name','invested')->where('status','0')->first();
        $count_qstn_last = Quiz::select('question_no')->where('type_question','1')->where('status','0')->orderBy('question_no','ASC')->first();
        $count_qstn_first = Quiz::select('question_no')->where('type_question','1')->where('status','0')->orderBy('question_no','DESC')->first();
        $count_last = Quiz::select('question_no')->where('type_question','2')->where('status','0')->orderBy('question_no','ASC')->first();
        $count_first = Quiz::select('question_no')->where('type_question','2')->where('status','0')->orderBy('question_no','DESC')->first();
        $pos_1=0;
        $pos_2=0;
        $pos_3=0;
        $pos_4=0;
        $app_1=0;
        $app_2=0;
        $app_3=0;
        $app_4=0;
        $tru_1=0;
        $tru_2=0;
        $tru_3=0;
        $tru_4=0;
        $har_1=0;
        $har_2=0;
        $har_3=0;
        $har_4=0;
        $fre_1=0;
        $fre_2=0;
        $fre_3=0;
        $fre_4=0;
        $dev_1=0;
        $dev_2=0;
        $dev_3=0;
        $dev_4=0;
        $pas_1=0;
        $pas_2=0;
        $pas_3=0;
        $pas_4=0;
        $par_1=0;
        $par_2=0;
        $par_3=0;
        $par_4=0;

   
        


        for($i=$count_qstn_last->question_no;$i<=$count_qstn_first->question_no;$i++){
            /* Possibility Start */
            if($a['question'.$i]['answer']['first']=='possibility'){
                $arr['possibility_first'][] =  $a['question'.$i];   
                array_push($arr['possibility_first'][$pos_1]['answer'],$i);
                $pos_1++;
            }
           else{
                $arr['first'] =  array();
           }           
           if($a['question'.$i]['answer']['second']=='possibility'){
            $arr['possibility_second'][] =  $a['question'.$i];   
            array_push($arr['possibility_second'][$pos_2]['answer'],$i);
            $pos_2++;
            }else{ 
                $arr['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='possibility'){
                $arr['possibility_third'][] =  $a['question'.$i]; 
                array_push($arr['possibility_third'][$pos_3]['answer'],$i);
                $pos_3++;
            }else{ 
                $arr['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='possibility')            
            {
            $arr['possibility_last'][] =  $a['question'.$i]; 
            array_push($arr['possibility_last'][$pos_4]['answer'],$i);
            $pos_4++;
            }else{ 
                $arr['last'] =  array();
            }
            /* Possibility End */

            /* Appreciation Start */
            if($a['question'.$i]['answer']['first']=='appreciation'){
                $arr_app['appreciation_first'][] =  $a['question'.$i];    
                array_push($arr_app['appreciation_first'][$app_1]['answer'],$i);
                $app_1++;           
             }else{ 
                $arr_app['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='appreciation'){
                $arr_app['appreciation_second'][] =  $a['question'.$i];   
                array_push($arr_app['appreciation_second'][$app_2]['answer'],$i);
                $app_2++;           
            }else{ 
                $arr_app['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='appreciation'){
                $arr_app['appreciation_third'][] =  $a['question'.$i];  
                array_push($arr_app['appreciation_third'][$app_3]['answer'],$i);
                $app_3++;            
            }else{ 
                $arr_app['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='appreciation'){
                $arr_app['appreciation_last'][] =  $a['question'.$i];   
                array_push($arr_app['appreciation_last'][$app_4]['answer'],$i);
                $app_4++;           
            }else{ 
                $arr_app['last'] =  array();
            }
             /* Appreciation End */
             /* Truth Start */
            if($a['question'.$i]['answer']['first']=='truth'){
                $arr_truth['truth_first'][] =  $a['question'.$i];    
                array_push($arr_truth['truth_first'][$tru_1]['answer'],$i);
                $tru_1++;            
            }else{ 
                $arr_truth['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='truth'){
                $arr_truth['truth_second'][] =  $a['question'.$i];    
                array_push($arr_truth['truth_second'][$tru_2]['answer'],$i);
                $tru_2++; 
            }else{ 
                $arr_truth['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='truth'){
                $arr_truth['truth_third'][] =  $a['question'.$i];   
                array_push($arr_truth['truth_third'][$tru_3]['answer'],$i);
                $tru_3++;  
            }else{ 
                $arr_truth['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='truth'){
                $arr_truth['truth_last'][] =  $a['question'.$i];   
                array_push($arr_truth['truth_last'][$tru_4]['answer'],$i);
                $tru_4++;  
            }else{ 
                $arr_truth['last'] =  array();
            }
            /*Truth End*/

            /* Harmony Start */
            if($a['question'.$i]['answer']['first']=='harmony'){
                $arr_harmony['harmony_first'][] =  $a['question'.$i];   
                array_push($arr_harmony['harmony_first'][$har_1]['answer'],$i);
                $har_1++;              
            }else{ 
                $arr_harmony['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='harmony'){
                $arr_harmony['harmony_second'][] =  $a['question'.$i];    
                array_push($arr_harmony['harmony_second'][$har_2]['answer'],$i);
                $har_2++;            
            }else{ 
                $arr_harmony['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='harmony'){
                $arr_harmony['harmony_third'][] =  $a['question'.$i];       
                array_push($arr_harmony['harmony_third'][$har_3]['answer'],$i);
                $har_3++;   
            }else{ 
                $arr_harmony['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='harmony'){
                $arr_harmony['harmony_last'][] =  $a['question'.$i];       
                array_push($arr_harmony['harmony_last'][$har_4]['answer'],$i);
                $har_4++;   
            }else{ 
                $arr_harmony['last'] =  array();
            }
            /* Harmony End */
            /* Freedom Start */
            if($a['question'.$i]['answer']['first']=='freedom'){
                $arr_freedom['freedom_first'][] =  $a['question'.$i];      
                array_push($arr_freedom['freedom_first'][$fre_1]['answer'],$i);
                $fre_1++;             
            }else{ 
                $arr_freedom['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='freedom'){
                $arr_freedom['freedom_second'][] =  $a['question'.$i];       
                array_push($arr_freedom['freedom_second'][$fre_2]['answer'],$i);
                $fre_2++;  
            }else{ 
                $arr_freedom['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='freedom'){
                $arr_freedom['freedom_third'][] =  $a['question'.$i];       
                array_push($arr_freedom['freedom_third'][$fre_3]['answer'],$i);
                $fre_3++;  
            }else{ 
                $arr_freedom['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='freedom'){
                $arr_freedom['freedom_last'][] =  $a['question'.$i];       
                array_push($arr_freedom['freedom_last'][$fre_4]['answer'],$i);
                $fre_4++;  
            }else{ 
                $arr_freedom['last'] =  array();
            }
            /* Freedom End */

            /* Devotion Start */
            if($a['question'.$i]['answer']['first']=='devotion'){
                $arr_devotion['devotion_first'][] =  $a['question'.$i];        
                array_push($arr_devotion['devotion_first'][$dev_1]['answer'],$i);
                $dev_1++;            
            }else{ 
                $arr_devotion['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='devotion'){
                $arr_devotion['devotion_second'][] =  $a['question'.$i];          
                array_push($arr_devotion['devotion_second'][$dev_2]['answer'],$i);
                $dev_2++;    
            }else{ 
                $arr_devotion['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='devotion'){
                $arr_devotion['devotion_third'][] =  $a['question'.$i];         
                array_push($arr_devotion['devotion_third'][$dev_3]['answer'],$i);
                $dev_3++;     
            }else{ 
                $arr_devotion['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='devotion'){
                $arr_devotion['devotion_last'][] =  $a['question'.$i];          
                array_push($arr_devotion['devotion_last'][$dev_4]['answer'],$i);
                $dev_4++;    
            }else{ 
                $arr_devotion['last'] =  array();
            }
            /* Devotion End */
           
            /* Passion Start */           
            if($a['question'.$i]['answer']['first']=='passion'){
                $arr_passion['passion_first'][] =  $a['question'.$i];         
                array_push($arr_passion['passion_first'][$pas_1]['answer'],$i);
                $pas_1++;               
            }else{ 
                $arr_passion['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='passion'){
                $arr_passion['passion_second'][] =  $a['question'.$i];   
                array_push($arr_passion['passion_second'][$pas_2]['answer'],$i);
                $pas_2++;       
            }else{ 
                $arr_passion['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='passion'){
                $arr_passion['passion_third'][] =  $a['question'.$i];      
                array_push($arr_passion['passion_third'][$pas_3]['answer'],$i);
                $pas_3++;       
            }else{ 
                $arr_passion['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='passion'){
                $arr_passion['passion_last'][] =  $a['question'.$i];       
                array_push($arr_passion['passion_last'][$pas_4]['answer'],$i);
                $pas_4++;       
            }else{ 
                $arr_passion['last'] =  array();
            }
            /* Passion End */


            /* Partnership Start */           
            if($a['question'.$i]['answer']['first']=='partnership'){
                $arr_partnership['partnership_first'][] =  $a['question'.$i];         
                array_push($arr_partnership['partnership_first'][$par_1]['answer'],$i);
                $par_1++;               
            }else{ 
                $arr_partnership['first'] =  array();
            }
            if($a['question'.$i]['answer']['second']=='partnership'){
                $arr_partnership['partnership_second'][] =  $a['question'.$i];   
                array_push($arr_partnership['partnership_second'][$par_2]['answer'],$i);
                $par_2++;        
            }else{ 
                $arr_partnership['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='partnership'){
                $arr_partnership['partnership_third'][] =  $a['question'.$i];  
                array_push($arr_partnership['partnership_third'][$par_3]['answer'],$i);
                $par_3++;         
            }else{ 
                $arr_partnership['third'] =  array();
            }
            if($a['question'.$i]['answer']['last']=='partnership'){
                $arr_partnership['partnership_last'][] =  $a['question'.$i];  
                array_push($arr_partnership['partnership_last'][$par_4]['answer'],$i);
                $par_4++;         
            }else{ 
                $arr_partnership['last'] =  array();
            }
            /* Partnership End */
        }

        $pos1=0;
        $pos2=0;
        $app1=0;
        $app2=0;
        $tru1=0;
        $tru2=0;
        $har1=0;
        $har2=0;
        $fre1=0;
        $fre2=0;
        $dev1=0;
        $dev2=0;
        $pas1=0;
        $pas2=0;
        $par1=0;
        $par2=0;

        for($j=$count_last->question_no;$j<=$count_first->question_no;$j++){
            /* Possibility Start */
             if($a['question'.$j]['answer']['first']=='complaint'){ 
                 $arr1['possibility_first'][] =  $a['question'.$j];   
                 array_push($arr1['possibility_first'][$pos1]['answer'],$j);
                 $pos1++;   
             }
             else{$arr1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='complaint'){ 
                 $arr1['possibility_second'][] =  $a['question'.$j]; 
                 array_push($arr1['possibility_second'][$pos2]['answer'],$j);
                 $pos2++;    
             }
             else{$arr1['second'][] = array();}
             /* Possibility End */

             /* Appreciation Start */
             if($a['question'.$j]['answer']['first']=='defense'){ 
                 $arr_app1['appreciation_first'][] =  $a['question'.$j];   
                 array_push($arr_app1['appreciation_first'][$app1]['answer'],$j);
                 $app1++;
             }
             else{$arr_app1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='defense'){ 
                 $arr_app1['appreciation_second'][] =  $a['question'.$j];    
                 array_push($arr_app1['appreciation_second'][$app2]['answer'],$j);
                 $app2++;
             }
             else{$arr_app1['second'][] = array();}
             /* Appreciation End */

             /* Truth Start */
             if($a['question'.$j]['answer']['first']=='control'){ 
                 $arr_truth1['truth_first'][] =  $a['question'.$j];     
                 array_push($arr_truth1['truth_first'][$tru1]['answer'],$j);
                 $tru1++;
             }
             else{$arr_truth1['first'][] = array();}
             if($a['question'.$j]['answer']['second']=='control'){ 
                 $arr_truth1['truth_second'][] =  $a['question'.$j];   
                 array_push($arr_truth1['truth_second'][$tru2]['answer'],$j);
                 $tru2++;  
             }
             else{$arr_truth1['second'][] = array();}
             /*Truth End*/

             /* Harmony Start */
             if($a['question'.$j]['answer']['first']=='collapse'){ 
                 $arr_harmony1['harmony_first'][] =  $a['question'.$j]; 
                 array_push($arr_harmony1['harmony_first'][$har1]['answer'],$j);
                 $har1++;     
             }else{
                 $arr_harmony1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='collapse'){ 
                 $arr_harmony1['harmony_second'][] =  $a['question'.$j];  
                 array_push($arr_harmony1['harmony_second'][$har2]['answer'],$j);
                 $har2++;    
             }else{
                 $arr_harmony1['second'][] = array();}
             /* Harmony End */
             
             /* Freedom Start */
             if($a['question'.$j]['answer']['first']=='avoidance'){ 
                 $arr_freedom1['freedom_first'][] =  $a['question'.$j];  
                 array_push($arr_freedom1['freedom_first'][$fre1]['answer'],$j);
                 $fre1++;  
             }else{
                 $arr_freedom1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='avoidance'){ 
                 $arr_freedom1['freedom_second'][] =  $a['question'.$j];  
                 array_push($arr_freedom1['freedom_second'][$fre2]['answer'],$j);
                 $fre2++;   
             }else{
             $arr_freedom1['second'][] = array();}
               /* Freedom End */

             /* Devotion Start */
             if($a['question'.$j]['answer']['first']=='anxious'){ 
                 $arr_devotion1['devotion_first'][] =  $a['question'.$j];  
                 array_push($arr_devotion1['devotion_first'][$dev1]['answer'],$j);
                 $dev1++;    
             }else{
                 $arr_devotion1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='anxious'){ 
                 $arr_devotion1['devotion_second'][] =  $a['question'.$j];   
                 array_push($arr_devotion1['devotion_second'][$dev2]['answer'],$j);
                 $dev2++;   
             }else{
                 $arr_devotion1['second'][] = array();}
             /* Devotion End */

             /* Passion Start */
             if($a['question'.$j]['answer']['first']=='addiction'){ 
                 $arr_passion1['passion_first'][] =  $a['question'.$j];    
                 array_push($arr_passion1['passion_first'][$pas1]['answer'],$j);
                 $pas1++;  
             }else{
                 $arr_passion1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='addiction'){ 
                 $arr_passion1['passion_second'][] =  $a['question'.$j];    
                 array_push($arr_passion1['passion_second'][$pas2]['answer'],$j);
                 $pas2++;  
             }else{
                 $arr_passion1['second'][] = array();}
             /* Passion End */

             /* Partnership Start */
             if($a['question'.$j]['answer']['first']=='co-dependence'){ 
                 $arr_partnership1['partnership_first'][] =  $a['question'.$j];   
                 array_push($arr_partnership1['partnership_first'][$par1]['answer'],$j);
                 $par1++;  
             }else{
                 $arr_partnership1['first'][] = array();}

             if($a['question'.$j]['answer']['second']=='co-dependence'){ 
                 $arr_partnership1['partnership_second'][] =  $a['question'.$j];    
                 array_push($arr_partnership1['partnership_second'][$par2]['answer'],$j);
                 $par2++; 
             }else{
                 $arr_partnership1['second'][] = array();}
             /* Partnership End */
             }
       
        
        /* Possibility Start */
        if (array_key_exists("possibility_first",$arr)){
            $first = count($arr['possibility_first']);
            $possibility_first = 0;
            foreach($arr['possibility_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_first += $possibility_first_score->rank_1st;
            }
        }
        else{
            $possibility_first = 0;
        }
        if (array_key_exists("possibility_first",$arr1)){
            $first = count($arr1['possibility_first']);
            $first_possibility = 0; 
            foreach($arr1['possibility_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_possibility_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_first += $first_possibility_score->rank_1_2;
            }
            $total_possibility = $possibility_first + $first_possibility;
        }
        else{
            $total_possibility = $possibility_first + 0;
        }
  
   

        if (array_key_exists("possibility_second",$arr)){
            $second = count($arr['possibility_second']);
            $possibility_second = 0;
            foreach($arr['possibility_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_second += $possibility_second_score->rank_2nd;
            }
        }
        else{
            $possibility_second = 0;
        }
        if (array_key_exists("possibility_second",$arr1)){
            $second = count($arr1['possibility_second']);
            $second_possibility = 0; 
            foreach($arr1['possibility_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_possibility_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_possibility += $second_possibility_score->rank_2_2;
            }
            $total_possibility_second = $possibility_second + $second_possibility;
         }
        else{
            $total_possibility_second = $possibility_second + 0;
        }

        if (array_key_exists("possibility_third",$arr)){
            $third = count($arr['possibility_third']);
            $possibility_third = 0;
            foreach($arr['possibility_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_third += $possibility_third_score->rank_3rd;
            }
        }
        else{
            $possibility_third = 0;
        }

        if (array_key_exists("possibility_last",$arr)){
            $last = count($arr['possibility_last']);
            $possibility_last = 0;
            foreach($arr['possibility_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_last += $possibility_last_score->rank_last;
            }
        }
        else{
            $possibility_last = 0;
        }
        /* Possibility End */

        /* Appreciation Start */
        if (array_key_exists("appreciation_first",$arr_app)){
            $first = count($arr_app['appreciation_first']);
            $appreciation_first = 0;
            foreach($arr_app['appreciation_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $appreciation_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $appreciation_first += $appreciation_first_score->rank_1st;
            }
        }
        else{
            $appreciation_first = 0;
        }
        if (array_key_exists("appreciation_first",$arr_app1)){
            $first = count($arr_app1['appreciation_first']);
            $first_appreciation = 0;
            foreach($arr_app1['appreciation_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_appreciation_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_appreciation += $first_appreciation_score->rank_1_2;
            }
            $total_appreciation = $appreciation_first + $first_appreciation; 
        }
        else{
            $total_appreciation=$appreciation_first + 0;
        }   

        if (array_key_exists("appreciation_second",$arr_app)){
            $second = count($arr_app['appreciation_second']);
            $appreciation_second = 0;
            foreach($arr_app['appreciation_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $appreciation_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $appreciation_second += $appreciation_second_score->rank_2nd;
            }
        }
        else{
            $appreciation_second = 0;
        }
        if (array_key_exists("appreciation_second",$arr_app1)){
            $second = count($arr_app1['appreciation_second']);
            $second_appreciation = 0;
            foreach($arr_app1['appreciation_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_appreciation_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_appreciation += $second_appreciation_score->rank_2_2;
            }
            $total_appreciation_second = $appreciation_second + $second_appreciation;
        }
        else{
            $total_appreciation_second = $appreciation_second + 0;
        }

        if (array_key_exists("appreciation_third",$arr_app)){
            $third = count($arr_app['appreciation_third']);
            $appreciation_third = 0;
            foreach($arr_app['appreciation_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $appreciation_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $appreciation_third += $appreciation_third_score->rank_3rd;
            }
        }
        else{
            $appreciation_third = 0;
        }
        

        if (array_key_exists("appreciation_last",$arr_app)){
        $last = count($arr_app['appreciation_last']);
        $appreciation_last = 0;
        foreach($arr_app['appreciation_last'] as $ps){
            $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
            $appreciation_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
            $appreciation_last += $appreciation_last_score->rank_last;
        }
        }
        else{
            $appreciation_last = 0;
        }
        /* Appreciation End */

        /* Truth Start */
        if (array_key_exists("truth_first",$arr_truth)){
            $first = count($arr_truth['truth_first']);
            $truth_first = 0;
            foreach($arr_truth['truth_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_first += $truth_first_score->rank_1st;
            }
        }
        else{
            $truth_first = 0;
        }  
    
        if (array_key_exists("truth_first",$arr_truth1)){
            $first = count($arr_truth1['truth_first']);
            $first_truth = 0; 
            foreach($arr_truth1['truth_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_truth_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_truth += $first_truth_score->rank_1_2;
            }
            $total_truth = $truth_first + $first_truth;
        }
        else{
            $total_truth = $truth_first + 0;
        } 
     

        if (array_key_exists("truth_second",$arr_truth)){
            $second = count($arr_truth['truth_second']);
            $truth_second = 0;
            foreach($arr_truth['truth_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_second += $truth_second_score->rank_2nd;
            }
            }
        else{
            $truth_second = 0;
        }
        if (array_key_exists("truth_second",$arr_truth1)){
            $second = count($arr_truth1['truth_second']);
            $second_truth = 0; 
            foreach($arr_truth1['truth_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_truth_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_truth += $second_truth_score->rank_2_2;
            }
            $total_truth_second = $truth_second + $second_truth;
        }
        else{
            $total_truth_second = $truth_second + 0;
        }


        if (array_key_exists("truth_third",$arr_truth)){
            $third = count($arr_truth['truth_third']);
            $truth_third = 0;
            foreach($arr_truth['truth_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_third += $truth_third_score->rank_3rd;
            }
        }
        else{
            $truth_third = 0;
        }


        if (array_key_exists("truth_last",$arr_truth)){
            $last = count($arr_truth['truth_last']);
            $truth_last = 0;
            foreach($arr_truth['truth_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_last += $truth_last_score->rank_last;
            }
        }
        else{
            $truth_last = 0;
        }
       
        /* Truth End */


        /* Harmony Start */
     
        if (array_key_exists("harmony_first",$arr_harmony)){
            $first = count($arr_harmony['harmony_first']);
            $harmony_first = 0;
            foreach($arr_harmony['harmony_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_first += $harmony_first_score->rank_1st;
            }
        }
        else{
            $harmony_first = 0;
        }
        if (array_key_exists("harmony_first",$arr_harmony1)){
            $first = count($arr_harmony1['harmony_first']);
            $first_harmony = 0; 
            foreach($arr_harmony1['harmony_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_harmony_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_harmony += $first_harmony_score->rank_1_2;
            }
            $total_harmony = $harmony_first + $first_harmony;
        }
        else{
            $total_harmony = $harmony_first + 0;
        }  

        if (array_key_exists("harmony_second",$arr_harmony)){
            $second = count($arr_harmony['harmony_second']);
            $harmony_second = 0;
            foreach($arr_harmony['harmony_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_second += $harmony_second_score->rank_2nd;
            }
        }
        else{
            $harmony_second = 0;
        }
     
        if (array_key_exists("harmony_second",$arr_harmony1)){
            $second = count($arr_harmony1['harmony_second']);
            $second_harmony = 0; 
            foreach($arr_harmony1['harmony_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_harmony_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_harmony += $second_harmony_score->rank_2_2;
            }
            $total_harmony_second = $harmony_second + $second_harmony;
        }
        else{
            $total_harmony_second = $harmony_second + 0;
        }

            
        if (array_key_exists("harmony_third",$arr_harmony)){
            $third = count($arr_harmony['harmony_third']);
            $harmony_third = 0;
            foreach($arr_harmony['harmony_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_third += $harmony_third_score->rank_3rd;
            }
        }
        else{
            $harmony_third = 0;
        }
        
        if (array_key_exists("harmony_last",$arr_harmony)){
            $last = count($arr_harmony['harmony_last']);
            $harmony_last = 0;
            foreach($arr_harmony['harmony_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_last += $harmony_last_score->rank_last;
            }
        }
        else{
            $harmony_last = 0;
        }
        /* Harmony End */

        /* Freedom Start */
        if (array_key_exists("freedom_first",$arr_freedom)){
            $first = count($arr_freedom['freedom_first']);
            $freedom_first = 0;
            foreach($arr_freedom['freedom_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_first += $freedom_first_score->rank_1st;
            }
        }
        else{
            $freedom_first = 0;
        }
       
        if (array_key_exists("freedom_first",$arr_freedom1)){
            $first = count($arr_freedom1['freedom_first']);
            $first_freedom = 0; 
            foreach($arr_freedom1['freedom_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_freedom_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_freedom += $first_freedom_score->rank_1_2;
            }
            $total_freedom = $freedom_first + $first_freedom;
        }
        else{
            $total_freedom = $freedom_first + 0;
        }  

        if (array_key_exists("freedom_second",$arr_freedom)){
            $second = count($arr_freedom['freedom_second']);
            $freedom_second = 0;
            foreach($arr_freedom['freedom_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_second += $freedom_second_score->rank_2nd;
            }
        }
        else{
            $freedom_second = 0;
        }
        
        if (array_key_exists("freedom_second",$arr_freedom1)){
            $second = count($arr_freedom1['freedom_second']);
            $second_freedom = 0; 
            foreach($arr_freedom1['freedom_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_freedom_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_freedom += $second_freedom_score->rank_2_2;
            }
            $total_freedom_second = $freedom_second + $second_freedom;
        }
        else{
            $total_freedom_second = $freedom_second + 0;
        }

        if (array_key_exists("freedom_third",$arr_freedom)){
            $third = count($arr_freedom['freedom_third']);
            $freedom_third = 0;
            foreach($arr_freedom['freedom_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_third += $freedom_third_score->rank_3rd;
            }
        }
        else{
            $freedom_third = 0;
        }

        if (array_key_exists("freedom_last",$arr_freedom)){
            $last = count($arr_freedom['freedom_last']);
            $freedom_last = 0;
            foreach($arr_freedom['freedom_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_last += $freedom_last_score->rank_last;
            }
        }
        else{
            $freedom_last = 0;
        }
    
        /* Freedom End */
        /* Devotion Start */
        if (array_key_exists("devotion_first",$arr_devotion)){
            $first = count($arr_devotion['devotion_first']);
            $devotion_first = 0;
            foreach($arr_devotion['devotion_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $devotion_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_first += $devotion_first_score->rank_1st;
            }
        }
        else{
            $devotion_first = 0;
        }
        if (array_key_exists("devotion_first",$arr_devotion1)){
            $first = count($arr_devotion1['devotion_first']);
            $first_devotion = 0; 
            foreach($arr_devotion1['devotion_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_devotion_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_devotion += $first_devotion_score->rank_1_2;
            }
            $total_devotion = $devotion_first + $first_devotion;
        }
        else{
            $total_devotion = $devotion_first + 0;
        } 

        if (array_key_exists("devotion_second",$arr_devotion)){
            $second = count($arr_devotion['devotion_second']);
            $devotion_second = 0;
            foreach($arr_devotion['devotion_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $devotion_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_second += $devotion_second_score->rank_2nd;
            }
            }
        else{
            $devotion_second = 0;
        }

        if (array_key_exists("devotion_second",$arr_devotion1)){
            $second = count($arr_devotion1['devotion_second']);
            $second_devotion = 0; 
            foreach($arr_devotion1['devotion_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_devotion_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_devotion += $second_devotion_score->rank_2_2;
            }
            $total_devotion_second = $devotion_second + $second_devotion;
        }
        else{
            $total_devotion_second = $devotion_second + 0;
        }

        if (array_key_exists("devotion_third",$arr_devotion)){
            $third = count($arr_devotion['devotion_third']);
            $devotion_third = 0;
            foreach($arr_devotion['devotion_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $devotion_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_third += $devotion_third_score->rank_3rd;
            }
        }
        else{
            $devotion_third = 0;
        }

        if (array_key_exists("devotion_last",$arr_devotion)){
            $last = count($arr_devotion['devotion_last']);
            $devotion_last = 0;
            foreach($arr_devotion['devotion_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $devotion_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_last += $devotion_last_score->rank_last;
            }
        }
        else{
            $devotion_last = 0;
        }

        /* Devotion End */

        /* Passion Start */
        if (array_key_exists("passion_first",$arr_passion)){
            $first = count($arr_passion['passion_first']);
            $passion_first = 0;
            foreach($arr_passion['passion_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $passion_first += $passion_first_score->rank_1st;
            }
        }
        else{
            $passion_first = 0;
        }  
        
        if (array_key_exists("passion_first",$arr_passion1)){
            $first = count($arr_passion1['passion_first']);
            $first_passion = 0; 
            foreach($arr_passion1['passion_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_passion_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_passion += $first_passion_score->rank_1_2;
            }
            $total_passion = $passion_first + $first_passion;
        }
        else{
            $total_passion = $passion_first + 0;
        }   
        
        if (array_key_exists("passion_second",$arr_passion)){
            $second = count($arr_passion['passion_second']);
            $passion_second = 0;
            foreach($arr_passion['passion_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_second += $passion_second_score->rank_2nd;
            }
        }
        else{
            $passion_second = 0;          
        }
        
        if (array_key_exists("passion_second",$arr_passion1)){
            $second = count($arr_passion1['passion_second']);
            $second_passion = 0; 
            foreach($arr_passion1['passion_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_passion_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_passion += $second_passion_score->rank_2_2;
            }
            $total_passion_second = $passion_second + $second_passion;
        }
        else{
            $total_passion_second = $passion_second + 0;
        }
        
        if (array_key_exists("passion_third",$arr_passion)){
            $third = count($arr_passion['passion_third']);
            $passion_third = 0;
            foreach($arr_passion['passion_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $passion_third += $passion_third_score->rank_3rd;
            }
        }
        else{
            $passion_third = 0;
        }
       
        if (array_key_exists("passion_last",$arr_passion)){
            $last = count($arr_passion['passion_last']);
            $passion_last = 0;
            foreach($arr_passion['passion_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $passion_last += $passion_last_score->rank_last;
            }
        }
        else{
            $passion_last = 0;
        } 


        /* Passion End */

        /* Partnership Start */
        if (array_key_exists("partnership_first",$arr_partnership)){
            $first = count($arr_partnership['partnership_first']);
            $partnership_first = 0;
            foreach($arr_partnership['partnership_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_first_score = Answers::select('rank_1st')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_first += $partnership_first_score->rank_1st;
            }
        }
        else{
            $partnership_first = 0;
        }  
        
        if (array_key_exists("partnership_first",$arr_partnership1)){
            $first = count($arr_partnership1['partnership_first']);
            $first_partnership = 0; 
            foreach($arr_partnership1['partnership_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_partnership_score = Answers::select('rank_1_2')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_partnership += $first_partnership_score->rank_1_2;
            }
            $total_partnership = $partnership_first + $first_partnership;
        }
        else{
            $total_partnership = $partnership_first + 0;
        } 
        
        if (array_key_exists("partnership_second",$arr_partnership)){
            $second = count($arr_partnership['partnership_second']);
            $partnership_second = 0;
            foreach($arr_partnership['partnership_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_second_score = Answers::select('rank_2nd')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_second += $partnership_second_score->rank_2nd;
            }
            }
        else{
            $partnership_second = 0;
        }
        
        if (array_key_exists("partnership_second",$arr_partnership1)){
            $second = count($arr_partnership1['partnership_second']);
            $second_partnership = 0; 
            foreach($arr_partnership1['partnership_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_partnership_score = Answers::select('rank_2_2')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_partnership += $second_partnership_score->rank_2_2;
            }
            $total_partnership_second = $partnership_second + $second_partnership;
            }
        else{
            $total_partnership_second = $partnership_second + 0;
        }
        
        
        if (array_key_exists("partnership_third",$arr_partnership)){
            $third = count($arr_partnership['partnership_third']);
            $partnership_third = 0;
            foreach($arr_partnership['partnership_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_third_score = Answers::select('rank_3rd')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_third += $partnership_third_score->rank_3rd;
            }
        }
        else{
            $partnership_third = 0;
        }
        
        if (array_key_exists("partnership_last",$arr_partnership)){
            $last = count($arr_partnership['partnership_last']);
            $partnership_last = 0;
            foreach($arr_partnership['partnership_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_last_score = Answers::select('rank_last')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_last += $partnership_last_score->rank_last;
            }
        }
        else{
            $partnership_last = 0;
        }
  

        $bias = Bias::select('bias')->get();
        
        $possibility_total = $total_possibility+$total_possibility_second+$possibility_third-$possibility_last+($bias[0]['bias']);
        $appreciation_total = $total_appreciation + $total_appreciation_second + $appreciation_third - $appreciation_last+($bias[1]['bias']);
        $truth_total = $total_truth + $total_truth_second + $truth_third - $truth_last+($bias[2]['bias']);
        $harmony_total = $total_harmony + $total_harmony_second + $harmony_third - $harmony_last+($bias[3]['bias']);
        $freedom_total = $total_freedom + $total_freedom_second + $freedom_third - $freedom_last+($bias[4]['bias']);
        $devotion_total = $total_devotion + $total_devotion_second + $devotion_third - $devotion_last+($bias[5]['bias']);
        $passion_total = $total_passion + $total_passion_second + $passion_third - $passion_last+($bias[6]['bias']);
        $partnership_total = $total_partnership + $total_partnership_second + $partnership_third - $partnership_last+($bias[7]['bias']);
        
        

        /* Percentage */
        $max_gift_score = 62;
        $min_gift_score = -12;
        $possibility = round($possibility_total/(abs($min_gift_score)+($max_gift_score))*100);
        $appreciation = round($appreciation_total/(abs($min_gift_score)+($max_gift_score))*100);
        $truth = round($truth_total/(abs($min_gift_score)+($max_gift_score))*100);
        $harmony = round($harmony_total/(abs($min_gift_score)+($max_gift_score))*100);
        $freedom = round($freedom_total/(abs($min_gift_score)+($max_gift_score))*100);
        $devotion = round($devotion_total/(abs($min_gift_score)+($max_gift_score))*100);
        $passion = round($passion_total/(abs($min_gift_score)+($max_gift_score))*100);
        $partnership = round($partnership_total/(abs($min_gift_score)+($max_gift_score))*100);

        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $secondary_val = $relationship_arr[1];
        $primary_val = $relationship_arr[0];
      
        if($possibility==$primary_val){
            $rel_archetype = "Possibility";
        }
        elseif($appreciation==$primary_val)
        {
            $rel_archetype = "Appreciation";
        }
        elseif($truth==$primary_val)
        {
            $rel_archetype = "Truth";
        }
        elseif($harmony==$primary_val)
        {
            $rel_archetype = "Harmony";
        }
        elseif($freedom==$primary_val)
        {
            $rel_archetype = "Freedom";
        }
        elseif($devotion==$primary_val)
        {
            $rel_archetype = "Devotion";
        }
        elseif($passion==$primary_val)
        {
            $rel_archetype = "Passion";
        }
        else
        {
            $rel_archetype = "Partnership";
        }

        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $chk_firstname = Quiz::select('question_no')->where('question_name','firstname')->where('status','0')->first();
        $chk_lastname = Quiz::select('question_no')->where('question_name','lastname')->where('status','0')->first();
        $user_details = array(
            'relation'=> $a['question4']['answer1'],
            'firstname'=> $a['question'.$chk_firstname->question_no]['firstname'],
            'lastname'=> $a['question'.$chk_lastname->question_no]['lastname'],
            'type'=> $a['question3']['answer1'],
        );
        $shadow = $this->shadow_calculation($a);
        $shadow_arr = array($shadow['complaint'],$shadow['defense'],$shadow['avoidance'],$shadow['anxious'],$shadow['control'],$shadow['collapse'],$shadow['addiction'],$shadow['dependence']);
        rsort($shadow_arr);
        $shadow_lookup_text = $this->shadow_lookup_text($shadow['complaint'],$shadow['defense'],$shadow['avoidance'],$shadow['anxious'],$shadow['control'],$shadow['collapse'],$shadow['addiction'],$shadow['dependence'],$shadow_arr);
        // echo"<pre>";print_r($shadow_lookup_text);echo"</pre>";exit();
        $primary_shadow_val = $shadow_arr[0];
        $secondary_shadow_val = $shadow_arr[1];
        if($shadow['complaint']==$primary_shadow_val){
            $sh_archetype = "Complaint";
        }
        elseif($shadow['defense']==$primary_shadow_val){
            $sh_archetype = "Defense";
        }
        elseif($shadow['control']==$primary_shadow_val){
            $sh_archetype = "Control";
        }
        elseif($shadow['collapse']==$primary_shadow_val){
            $sh_archetype = "Collapse";
        }
        elseif($shadow['avoidance']==$primary_shadow_val){
            $sh_archetype = "Avoidance";
        }
        elseif($shadow['anxious']==$primary_shadow_val){
            $sh_archetype = "Anxious";
        }
        elseif($shadow['addiction']==$primary_shadow_val){
            $val_primary_shadow = "1673";
            $sh_archetype = "Addiction";
        }
        else{
            $sh_archetype = "Co-dependence";
        }



 


        return view('frontend.shared-profile.index',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','relationship_lookup_text','user_details','shadow','shadow_lookup_text'));
       

    }

    public function relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr){
        $id = base64_decode($_GET['formid']);
		$cid= str_replace('formid', '', $id);
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
        
        $formdata = DB::table('formdata')->where('id',$cid)->first();
        $data = json_decode($formdata->data, TRUE);
        for($bb=1;$bb<=count($data);$bb++){
            if (array_key_exists("gender",$data['question'.$bb])){
               $val_arr1 = $bb;
            }
        }
        $gender = $data['question'.$val_arr1]['gender'];
        // $gender = $data['question18']['gender'];
        $promo_img = DB::table('promos')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $lookuptext = DB::table('lookup_texts')->select($secondary)->where('archetype',$primary)->first();
        $images = DB::table('images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $banners = DB::table('banners')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $promo_image = $promo_img->{$secondary.'_'.$gender};
        $icon_image = $images->{$secondary.'_'.$gender};
        $banners_image = $banners->{$secondary.'_'.$gender};

        $primary_gifts =  DB::table('lookup_texts')->select('primary_gift')->where('archetype',$primary)->first();
        $secondary_gifts =  DB::table('lookup_texts')->select('secondary_gift')->where('archetype',$secondary)->first();

        $primary_qualities =  DB::table('lookup_texts')->select('primary_qualities')->where('archetype',$primary)->first();
        $secondary_qualities =  DB::table('lookup_texts')->select('secondary_qualities')->where('archetype',$secondary)->first();
        $primary_images = DB::table('primary_quality_images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $primary_image = $primary_images->{$secondary.'_'.$gender};
        $secondary_images = DB::table('secondary_quality_images')->select($secondary.'_'.$gender)->where('archetype',$secondary)->first();
        $secondary_image = $secondary_images->{$secondary.'_'.$gender};
        return array('lookuptext'=>$lookuptext->$secondary,'icon'=>$icon_image,'banner'=>$banners_image,'promo_image'=>$promo_image,'primary_gifts'=>$primary_gifts,'secondary_gifts'=>$secondary_gifts
        ,'primary_qualities'=>$primary_qualities,'secondary_qualities'=>$secondary_qualities,'primary_image'=>$primary_image,'secondary_image'=>$secondary_image);

    }

    public function shadow_calculation($a){
        $count_qstn_last1 = Quiz::select('question_no')->where('type_question','1')->where('status','0')->orderBy('question_no','ASC')->first();
        $count_qstn_first1 = Quiz::select('question_no')->where('type_question','1')->where('status','0')->orderBy('question_no','DESC')->first();
        $count_last1 = Quiz::select('question_no')->where('type_question','2')->where('status','0')->orderBy('question_no','ASC')->first();
        $count_first1 = Quiz::select('question_no')->where('type_question','2')->where('status','0')->orderBy('question_no','DESC')->first();
        $pos_1=0;
        $pos_2=0;
        $app_1=0;
        $app_2=0;
        $tru_1=0;
        $tru_2=0;
        $har_1=0;
        $har_2=0;
        $fre_1=0;
        $fre_2=0;
        $dev_1=0;
        $dev_2=0;
        $pas_1=0;
        $pas_2=0;
        $par_1=0;
        $par_2=0;
        for($i=$count_qstn_last1->question_no;$i<=$count_qstn_first1->question_no;$i++){
            /* Complaint Start */
           if($a['question'.$i]['answer']['first']=='possibility'){ 
               $arr_comp['complaint_first'][] =  $a['question'.$i];    
               array_push($arr_comp['complaint_first'][$pos_1]['answer'],$i);
               $pos_1++;
           }
           else{$arr_comp['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='possibility'){ 
               $arr_comp['complaint_second'][] =  $a['question'.$i];  
               array_push($arr_comp['complaint_second'][$pos_2]['answer'],$i);
               $pos_2++;  
           }
           else{$arr_comp['second'][] = array();}
           /* Complaint End */

           /* Defense Start */
           if($a['question'.$i]['answer']['first']=='appreciation'){ 
               $arr_defense['defense_first'][] =  $a['question'.$i]; 
               array_push($arr_defense['defense_first'][$app_1]['answer'],$i);
               $app_1++;       
           }
           else{$arr_defense['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='appreciation'){ 
               $arr_defense['defense_second'][] =  $a['question'.$i];
               array_push($arr_defense['defense_second'][$app_2]['answer'],$i);
               $app_2++;    
           }
           else{$arr_defense['second'][] = array();}
           /* Defense End */

            /* Avoidance Start */
            if($a['question'.$i]['answer']['first']=='freedom'){ 
               $arr_avoidance['avoidance_first'][] =  $a['question'.$i];  
               array_push($arr_avoidance['avoidance_first'][$fre_1]['answer'],$i);
               $fre_1++;   
           }
           else{$arr_avoidance['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='freedom'){ 
               $arr_avoidance['avoidance_second'][] =  $a['question'.$i];   
               array_push($arr_avoidance['avoidance_second'][$fre_2]['answer'],$i);
               $fre_2++;   
           }
           else{$arr_avoidance['second'][] = array();}
           /* Avoidance End */

           /*Anxious Start*/
           if($a['question'.$i]['answer']['first']=='devotion'){ 
               $arr_anxious['anxious_first'][] =  $a['question'.$i];  
               array_push($arr_anxious['anxious_first'][$dev_1]['answer'],$i);
               $dev_1++;  
           }
           else{$arr_anxious['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='devotion'){ 
               $arr_anxious['anxious_second'][] =  $a['question'.$i]; 
               array_push($arr_anxious['anxious_second'][$dev_2]['answer'],$i);
               $dev_2++;   
           }
           else{$arr_anxious['second'][] = array();}
           /*Anxious End*/

           /*Control Start */
           if($a['question'.$i]['answer']['first']=='truth'){ 
               $arr_control['control_first'][] =  $a['question'.$i];  
               array_push($arr_control['control_first'][$tru_1]['answer'],$i);
               $tru_1++;  
           }
           else{$arr_control['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='truth'){ 
               $arr_control['control_second'][] =  $a['question'.$i];  
               array_push($arr_control['control_second'][$tru_2]['answer'],$i);
               $tru_2++;   
           }
           else{$arr_control['second'][] = array();}
           /*Control End*/

           /*Collapse Start*/
           if($a['question'.$i]['answer']['first']=='harmony'){ 
               $arr_collapse['collapse_first'][] =  $a['question'.$i];   
               array_push($arr_collapse['collapse_first'][$har_1]['answer'],$i);
               $har_1++;  
           }
           else{$arr_collapse['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='harmony'){ 
               $arr_collapse['collapse_second'][] =  $a['question'.$i];    
               array_push($arr_collapse['collapse_second'][$har_2]['answer'],$i);
               $har_2++;  
           }
           else{$arr_collapse['second'][] = array();}
           /*Collapse End*/

           /*Addiction Start*/
           if($a['question'.$i]['answer']['first']=='passion'){ 
               $arr_addiction['addiction_first'][] =  $a['question'.$i];   
               array_push($arr_addiction['addiction_first'][$pas_1]['answer'],$i);
               $pas_1++; 
           }
           else{$arr_addiction['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='passion'){ 
               $arr_addiction['addiction_second'][] =  $a['question'.$i];   
               array_push($arr_addiction['addiction_second'][$pas_2]['answer'],$i);
               $pas_2++;   
           }
           else{$arr_addiction['second'][] = array();}
           /*Addiction End*/

           /*Co-Dependence Start*/
           if($a['question'.$i]['answer']['first']=='partnership'){ 
               $arr_dependence['dependence_first'][] =  $a['question'.$i];  
               array_push($arr_dependence['dependence_first'][$par_1]['answer'],$i);
               $par_1++;   
           }
           else{$arr_dependence['first'][] = array();}

           if($a['question'.$i]['answer']['second']=='partnership'){ 
               $arr_dependence['dependence_second'][] =  $a['question'.$i]; 
               array_push($arr_dependence['dependence_second'][$par_2]['answer'],$i);
               $par_2++;    
           }
           else{$arr_dependence['second'][] = array();}
           /*Co-Dependence End*/
       }
       $pos1=0;
        $pos2=0;
        $pos3=0;
        $pos4=0;
        $app1=0;
        $app2=0;
        $app3=0;
        $app4=0;
        $tru1=0;
        $tru2=0;
        $tru3=0;
        $tru4=0;
        $har1=0;
        $har2=0;
        $har3=0;
        $har4=0;
        $fre1=0;
        $fre2=0;
        $fre3=0;
        $fre4=0;
        $dev1=0;
        $dev2=0;
        $dev3=0;
        $dev4=0;
        $pas1=0;
        $pas2=0;
        $pas3=0;
        $pas4=0;
        $par1=0;
        $par2=0;
        $par3=0;
        $par4=0;

        for($j=$count_last1->question_no;$j<=$count_first1->question_no;$j++){
            /* Complaint Start */ 
            if($a['question'.$j]['answer']['first']=='complaint'){
                $arr_comp1['complaint_first'][] =  $a['question'.$j];
                array_push($arr_comp1['complaint_first'][$pos1]['answer'],$j);
                $pos1++;                
            }else{ 
                $arr_comp1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='complaint'){
                $arr_comp1['complaint_second'][] =  $a['question'.$j];  
                array_push($arr_comp1['complaint_second'][$pos2]['answer'],$j);
                $pos2++;    
            }else{ 
                $arr_comp1['second'] =  array();
            }
            if($a['question'.$i]['answer']['third']=='complaint'){
                $arr_comp1['complaint_third'][] =  $a['question'.$j]; 
                array_push($arr_comp1['complaint_third'][$pos3]['answer'],$j);
                $pos3++;
            }else{ 
                $arr_comp1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='complaint'){
                $arr_comp1['complaint_last'][] =  $a['question'.$j]; 
                array_push($arr_comp1['complaint_last'][$pos4]['answer'],$j);
                $pos4++;
            }else{ 
                $arr_comp1['last'] =  array();
            }
            /* Complaint End */

            /* Appriciation Start */
            if($a['question'.$j]['answer']['first']=='defense'){
                $arr_defense1['defense_first'][] =  $a['question'.$j];  
                array_push($arr_defense1['defense_first'][$app1]['answer'],$j);
                $app1++;             
            }else{ 
                $arr_defense1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='defense'){
                $arr_defense1['defense_second'][] =  $a['question'.$j]; 
                array_push($arr_defense1['defense_second'][$app2]['answer'],$j);
                $app2++;  
            }else{ 
                $arr_defense1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='defense'){
                $arr_defense1['defense_third'][] =  $a['question'.$j]; 
                array_push($arr_defense1['defense_third'][$app3]['answer'],$j);
                $app3++;
            }else{ 
                $arr_defense1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='defense'){
                $arr_defense1['defense_last'][] =  $a['question'.$j]; 
                array_push($arr_defense1['defense_last'][$app4]['answer'],$j);
                $app4++;
            }else{ 
                $arr_defense1['last'] =  array();
            }
            /* Appriciation End */
            /* Avoidance Start */
            if($a['question'.$j]['answer']['first']=='avoidance'){
                $arr_avoidance1['avoidance_first'][] =  $a['question'.$j];    
                array_push($arr_avoidance1['avoidance_first'][$fre1]['answer'],$j);
                $fre1++;           
            }else{ 
                $arr_avoidance1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='avoidance'){
                $arr_avoidance1['avoidance_second'][] =  $a['question'.$j];   
                array_push($arr_avoidance1['avoidance_second'][$fre2]['answer'],$j);
                $fre2++;
            }else{ 
                $arr_avoidance1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='avoidance'){
                $arr_avoidance1['avoidance_third'][] =  $a['question'.$j]; 
                array_push($arr_avoidance1['avoidance_third'][$fre3]['answer'],$j);
                $fre3++;
            }else{ 
                $arr_avoidance1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='avoidance')   { 
                $arr_avoidance1['avoidance_last'][] =  $a['question'.$j]; 
                array_push($arr_avoidance1['avoidance_last'][$fre4]['answer'],$j);
                $fre4++;
            }else{ 
                $arr_avoidance1['last'] =  array();
            }

            /* Avoidance End */

            /*Anxious Start*/
            if($a['question'.$j]['answer']['first']=='anxious'){
                $arr_anxious1['anxious_first'][] =  $a['question'.$j]; 
                array_push($arr_anxious1['anxious_first'][$dev1]['answer'],$j);
                $dev1++;              
            }else{ 
                $arr_anxious1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='anxious'){
                $arr_anxious1['anxious_second'][] =  $a['question'.$j];  
                array_push($arr_anxious1['anxious_second'][$dev2]['answer'],$j);
                $dev2++; 
            }else{ 
                $arr_anxious1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='anxious'){
                $arr_anxious1['anxious_third'][] =  $a['question'.$j]; 
                array_push($arr_anxious1['anxious_third'][$dev3]['answer'],$j);
                $dev3++;
            }else{ 
                $arr_anxious1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='anxious')            
            {
                $arr_anxious1['anxious_last'][] =  $a['question'.$j]; 
                array_push($arr_anxious1['anxious_last'][$dev4]['answer'],$j);
                $dev4++;
            }else{ 
                $arr_anxious1['last'] =  array();
            }
            /*Anxious End*/

            /*Control Start */
            if($a['question'.$j]['answer']['first']=='control'){
                $arr_control1['control_first'][] =  $a['question'.$j];      
                array_push($arr_control1['control_first'][$tru1]['answer'],$j);
                $tru1++;         
            }else{ 
                $arr_control1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='control'){
                $arr_control1['control_second'][] =  $a['question'.$j];
                array_push($arr_control1['control_second'][$tru2]['answer'],$j);
                $tru2++;    
            }else{ 
                $arr_control1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='control'){
                $arr_control1['control_third'][] =  $a['question'.$j]; 
                array_push($arr_control1['control_third'][$tru3]['answer'],$j);
                $tru3++;
            }else{ 
                $arr_control1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='control')            
            {
                $arr_control1['control_last'][] =  $a['question'.$j]; 
                array_push($arr_control1['control_last'][$tru4]['answer'],$j);
                $tru4++;
            }else{ 
                $arr_control1['last'] =  array();
            }
            /*Control End */

             /*Collapse Start*/
            if($a['question'.$j]['answer']['first']=='collapse'){
                $arr_collapse1['collapse_first'][] =  $a['question'.$j];  
                array_push($arr_collapse1['collapse_first'][$har1]['answer'],$j);
                $har1++;             
            }else{ 
                $arr_collapse1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='collapse'){
                $arr_collapse1['collapse_second'][] =  $a['question'.$j];  
                array_push($arr_collapse1['collapse_second'][$har2]['answer'],$j);
                $har2++;   
            }else{ 
                $arr_collapse1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='collapse'){
                $arr_collapse1['collapse_third'][] =  $a['question'.$j]; 
                array_push($arr_collapse1['collapse_third'][$har3]['answer'],$j);
                $har3++;
            }else{ 
                $arr_collapse1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='collapse')            
            {
                $arr_collapse1['collapse_last'][] =  $a['question'.$j]; 
                array_push($arr_collapse1['collapse_last'][$har4]['answer'],$j);
                $har4++;
            }else{ 
                $arr_collapse1['last'] =  array();
            }
            /*Collapse End*/

            /*Addiction Start*/
            if($a['question'.$j]['answer']['first']=='addiction'){
                $arr_addiction1['addiction_first'][] =  $a['question'.$j]; 
                array_push($arr_addiction1['addiction_first'][$pas1]['answer'],$j);
                $pas1++;              
            }else{ 
                $arr_addiction1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='addiction'){
                $arr_addiction1['addiction_second'][] =  $a['question'.$j];   
                array_push($arr_addiction1['addiction_second'][$pas2]['answer'],$j);
                $pas2++; 
            }else{ 
                $arr_addiction1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='addiction'){
                $arr_addiction1['addiction_third'][] =  $a['question'.$j]; 
                array_push($arr_addiction1['addiction_third'][$pas3]['answer'],$j);
                $pas3++;
            }else{ 
                $arr_addiction1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='addiction')            
            {
                $arr_addiction1['addiction_last'][] =  $a['question'.$j]; 
                array_push($arr_addiction1['addiction_last'][$pas4]['answer'],$j);
                $pas4++;
            }else{ 
                $arr_addiction1['last'] =  array();
            }
            /*Addiction End*/

            /*Co-Dependence Start*/
            if($a['question'.$j]['answer']['first']=='co-dependence'){
                $arr_dependence1['dependence_first'][] =  $a['question'.$j];    
                array_push($arr_dependence1['dependence_first'][$par1]['answer'],$j);
                $par1++;           
            }else{ 
                $arr_dependence1['first'] =  array();
            }
            if($a['question'.$j]['answer']['second']=='co-dependence'){
                $arr_dependence1['dependence_second'][] =  $a['question'.$j];   
                array_push($arr_dependence1['dependence_second'][$par2]['answer'],$j);
                $par2++; 
            }else{ 
                $arr_dependence1['second'] =  array();
            }
            if($a['question'.$j]['answer']['third']=='co-dependence'){
                $arr_dependence1['dependence_third'][] =  $a['question'.$j]; 
                array_push($arr_dependence1['dependence_third'][$par3]['answer'],$j);
                $par3++; 
            }else{ 
                $arr_dependence1['third'] =  array();
            }
            if($a['question'.$j]['answer']['last']=='co-dependence')            
            {
                $arr_dependence1['dependence_last'][] =  $a['question'.$j]; 
                array_push($arr_dependence1['dependence_last'][$par4]['answer'],$j);
                $par4++; 
            }else{ 
                $arr_dependence1['last'] =  array();
            }
            /*Co-Dependence End*/
        }

         /* Complaint Start */ 
         if (array_key_exists("complaint_first",$arr_comp1)){
            $first = count($arr_comp1['complaint_first']);
            $complaint_first = 0;
            $ex_complaint_first = 0;
            foreach($arr_comp1['complaint_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_first_score = Answers::select('rank_1st','rank_1_4','value_4')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                if($complaint_first_score->value_4=="explicit"){
                    $ex_complaint_first += $complaint_first_score->rank_1_4;
                }
                else{
                    $ex_complaint_first = 0;
                }
                $complaint_first += $complaint_first_score->rank_1st;
            }
           
        }
        else{
            $complaint_first = 0;
            $ex_complaint_first = 0;
        }
        
        if (array_key_exists("complaint_first",$arr_comp)){
            $first = count($arr_comp['complaint_first']);
            $first_complaint = 0; 
            foreach($arr_comp['complaint_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_complaint_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_complaint += $first_complaint_score->rank_1_2;
            }
            $total_complaint = $complaint_first + $first_complaint;
            $ex_total_complaint = $ex_complaint_first;
        }
        else{
            $total_complaint = $complaint_first + 0;
            $ex_total_complaint = $ex_complaint_first;
        }

        if (array_key_exists("complaint_second",$arr_comp1)){
            $second = count($arr_comp1['complaint_second']);
            $complaint_second = 0;
            $ex_complaint_second = 0;
            foreach($arr_comp1['complaint_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_second_score = Answers::select('rank_2nd','rank_2_4','value_4')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $complaint_second += $complaint_second_score->rank_2nd;
                if($complaint_second_score->value_4=="explicit"){
                    $ex_complaint_second += $complaint_second_score->rank_2_4;
                }
                else{
                    $ex_complaint_second = 0;
                }
            }
        }
        else{
            $complaint_second = 0;
            $ex_complaint_second = 0;
        }
        if (array_key_exists("complaint_second",$arr_comp)){
            $second = count($arr_comp['complaint_second']);
            $second_complaint = 0; 
            foreach($arr_comp['complaint_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_complaint_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_complaint += $second_complaint_score->rank_2_2;
            }
            $total_complaint_second = $complaint_second + $second_complaint;
            $ex_total_complaint_second = $ex_complaint_second;
        }
        else{
            $total_complaint_second = $complaint_second + 0;
            $ex_total_complaint_second = $ex_complaint_second;
        }

        if (array_key_exists("complaint_third",$arr_comp1)){
            $third = count($arr_comp1['complaint_third']);
            $complaint_third = 0;
            $ex_complaint_third = 0;
            foreach($arr_comp1['complaint_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_third_score = Answers::select('rank_3rd','value_4','rank_3_4')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $complaint_third += $complaint_third_score->rank_3rd;
                if($complaint_third_score->value_4=="explicit"){
                    $ex_complaint_third += $complaint_third_score->rank_3_4;
                }
                else{
                    $ex_complaint_third = 0;
                }
            }
        }
        else{
            $complaint_third = 0;
            $ex_complaint_third = 0;
        }

        if (array_key_exists("complaint_last",$arr_comp1)){
            $last = count($arr_comp1['complaint_last']);
            $complaint_last = 0;
            $ex_complaint_last = 0;
            foreach($arr_comp1['complaint_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_last_score = Answers::select('rank_last','value_4','rank_4_4')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $complaint_last += $complaint_last_score->rank_last;
                if($complaint_last_score->value_4=="explicit"){
                    $ex_complaint_last += $complaint_last_score->rank_4_4;
                }
                else{
                    $ex_complaint_last = 0;
                }
            }
            }
        else{
            $complaint_last = 0;
            $ex_complaint_last = 0;
        }
         /* Complaint End */

        /* Appriciation Start */
        if (array_key_exists("defense_first",$arr_defense1)){
            $first = count($arr_defense1['defense_first']);
            $defense_first = 0;
            $im_defense_first = 0;
            foreach($arr_defense1['defense_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_first_score = Answers::select('rank_1st','value_4','rank_1_4')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_first += $defense_first_score->rank_1st;
                if($defense_first_score->value_4=="implicit"){
                    $im_defense_first += $defense_first_score->rank_1_4;
                }
                else{
                    $im_defense_first = 0;
                }
            }
            
        }
        else{
            $defense_first = 0;
            $im_defense_first = 0;
        }    

        if (array_key_exists("defense_first",$arr_defense)){
            $first = count($arr_defense['defense_first']);
            $first_defense = 0; 
            foreach($arr_defense['defense_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_defense_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_defense += $first_defense_score->rank_1_2;
            }
            $total_defense = $defense_first + $first_defense;
            $im_total_defense = $im_defense_first;
        }
        else{
            $total_defense = $defense_first + 0;
            $im_total_defense = $im_defense_first;
        } 

        if (array_key_exists("defense_second",$arr_defense1)){
            $second = count($arr_defense1['defense_second']);
            $defense_second = 0;
            $im_defense_second = 0;
            foreach($arr_defense1['defense_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_second_score = Answers::select('rank_2nd','value_4','rank_2_4')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_second += $defense_second_score->rank_2nd;
                if($defense_second_score->value_4=="implicit"){
                    $im_defense_second += $defense_second_score->rank_2_4;
                }
                else{
                    $im_defense_second = 0;
                }
            }
        }
        else{
            $defense_second = 0;
            $im_defense_second = 0;
        }
        if (array_key_exists("defense_second",$arr_defense)){
            $second = count($arr_defense['defense_second']);
            $second_defense = 0; 
            foreach($arr_defense['defense_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_defense_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_defense += $second_defense_score->rank_2_2;
            }
            $total_defense_second = $defense_second + $second_defense;
            $im_total_defense_second = $im_defense_second;
        }
        else{
            $total_defense_second = $defense_second + 0;
            $im_total_defense_second = $im_defense_second;
        }

        if (array_key_exists("defense_third",$arr_defense1)){
            $third = count($arr_defense1['defense_third']);
            $defense_third = 0;
            $im_defense_third = 0;
            foreach($arr_defense1['defense_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_third_score = Answers::select('rank_3rd','value_4','rank_3_4')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_third += $defense_third_score->rank_3rd;
                if($defense_third_score->value_4=="implicit"){
                    $im_defense_third += $defense_third_score->rank_3_4;
                }
                else{
                    $im_defense_third = 0;
                }
            }
        }
        else{
            $defense_third = 0;
            $im_defense_third = 0;
        }
        
        if (array_key_exists("defense_last",$arr_defense1)){
            $last = count($arr_defense1['defense_last']);
            $defense_last = 0;
            $im_defense_last = 0;
            foreach($arr_defense1['defense_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_last_score = Answers::select('rank_last','value_4','rank_4_4')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_last += $defense_last_score->rank_last;
                if($defense_last_score->rank_3_4=="implicit"){
                    $im_defense_last += $defense_last_score->rank_4_4;
                }
                else{
                    $im_defense_last = 0;
                }
            }
         }
        else{
            $defense_last = 0;
            $im_defense_last = 0;
        }
        
        /* Appriciation End */

        /* Avoidance Start */
        if (array_key_exists("avoidance_first",$arr_avoidance1)){
            $first = count($arr_avoidance1['avoidance_first']);
            $avoidance_first = 0;
            $p_avoidance_first = 0;
            foreach($arr_avoidance1['avoidance_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_first_score = Answers::select('rank_1st','value_3','rank_1_3')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_first += $avoidance_first_score->rank_1st;
                if($avoidance_first_score->value_3=="internal"){
                    $p_avoidance_first += $avoidance_first_score->rank_1_3;
                }
                else{
                    $p_avoidance_first = 0;
                }
            }
        }
        else{
            $avoidance_first = 0;
            $p_avoidance_first = 0;
        }  
        if (array_key_exists("avoidance_first",$arr_avoidance)){
            $first = count($arr_avoidance['avoidance_first']);
            $first_avoidance = 0;
            foreach($arr_avoidance['avoidance_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_avoidance_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_avoidance += $first_avoidance_score->rank_1_2;
            }
            $total_avoidance = $avoidance_first + $first_avoidance;
            $p_total_avoidance = $p_avoidance_first;
        }
        else{
            $total_avoidance = $avoidance_first + 0;
            $p_total_avoidance = $p_avoidance_first;
        }
       
        if (array_key_exists("avoidance_second",$arr_avoidance1)){
            $second = count($arr_avoidance1['avoidance_second']);
            $avoidance_second = 0;
            $p_avoidance_second = 0;
            foreach($arr_avoidance1['avoidance_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_second_score = Answers::select('rank_2nd','value_3','rank_2_3')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_second += $avoidance_second_score->rank_2nd;
                if($avoidance_second_score->value_3=="internal"){
                    $p_avoidance_second += $avoidance_second_score->rank_2_3;
                }
                else{
                    $p_avoidance_second = 0;
                }
            }
        }
        else{
            $avoidance_second = 0;
            $p_avoidance_second = 0;
        }
        if (array_key_exists("avoidance_second",$arr_avoidance)){
            $second = count($arr_avoidance['avoidance_second']);
            $second_avoidance = 0; 
            foreach($arr_avoidance['avoidance_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_avoidance_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_avoidance += $second_avoidance_score->rank_2_2;
            }
            $total_avoidance_second = $avoidance_second + $second_avoidance;
            $p_total_avoidance_second = $p_avoidance_second;
        }

        else{
            $total_avoidance_second = $avoidance_second + 0;
            $p_total_avoidance_second = $p_avoidance_second;
        }

        if (array_key_exists("avoidance_third",$arr_avoidance1)){
            $third = count($arr_avoidance1['avoidance_third']);
            $avoidance_third = 0;
            foreach($arr_avoidance1['avoidance_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_third_score = Answers::select('rank_3rd')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_third += $avoidance_third_score->rank_3rd;
            }
        }
        else{
            $avoidance_third = 0;
        }

        if (array_key_exists("avoidance_last",$arr_avoidance1)){
            $last = count($arr_avoidance1['avoidance_last']);
            $avoidance_last = 0;
            foreach($arr_avoidance1['avoidance_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_last_score = Answers::select('rank_last')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_last += $avoidance_last_score->rank_last;
            }
         }
        else{
            $avoidance_last = 0;
        }
        /* Avoidance End */

        /*Anxious Start*/
        if (array_key_exists("anxious_first",$arr_anxious1)){
            $first = count($arr_anxious1['anxious_first']);
            $anxious_first = 0;
            foreach($arr_anxious1['anxious_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_first_score = Answers::select('rank_1st')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_first += $anxious_first_score->rank_1st;
            }
            $eng_anxious_first = 10*$first;
        }
        else{
            $anxious_first = 0;
            $eng_anxious_first = 0;
        }  
        if (array_key_exists("anxious_first",$arr_anxious)){
            $first = count($arr_anxious['anxious_first']);
            $first_anxious = 0; 
            foreach($arr_anxious['anxious_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_anxious_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_anxious += $first_anxious_score->rank_1_2;
            }
            $total_anxious = $anxious_first + $first_anxious;
            $eng_total_anxious = $eng_anxious_first;
        }
        else{
            $total_anxious = $anxious_first + 0;
            $eng_total_anxious = $eng_anxious_first;
        }

        if (array_key_exists("anxious_second",$arr_anxious1)){
            $second = count($arr_anxious1['anxious_second']);
            $anxious_second = 0;
            foreach($arr_anxious1['anxious_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_second_score = Answers::select('rank_2nd')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_second += $anxious_second_score->rank_2nd;
            }
            $eng_anxious_second = 8*$second;
        }
        else{
            $anxious_second = 0;
            $eng_anxious_second = 0;
        }

        if (array_key_exists("anxious_second",$arr_anxious)){
            $second = count($arr_anxious['anxious_second']);
            $second_anxious = 0; 
            foreach($arr_anxious['anxious_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_anxious_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_anxious += $second_anxious_score->rank_2_2;
            }
            $total_anxious_second = $anxious_second + $second_anxious;
            $eng_total_anxious_second = $eng_anxious_second;
        }
        else{
            $total_anxious_second = $anxious_second + 0;
            $eng_total_anxious_second = $eng_anxious_second;
        }
        if (array_key_exists("anxious_third",$arr_anxious1)){
            $third = count($arr_anxious1['anxious_third']);
            $anxious_third = 0;
            foreach($arr_anxious1['anxious_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_third_score = Answers::select('rank_3rd')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_third += $anxious_third_score->rank_3rd;
            }
        }
        else{
            $anxious_third = 0;
        }

        if (array_key_exists("anxious_last",$arr_anxious1)){
            $last = count($arr_anxious1['anxious_last']);
            $anxious_last = 0;
            foreach($arr_anxious1['anxious_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_last_score = Answers::select('rank_last')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_last += $anxious_last_score->rank_last;
            }
         }
        else{
            $anxious_last = 0;
        }
        /*Anxious End*/

        /*Control Start */
        if (array_key_exists("control_first",$arr_control1)){
            $first = count($arr_control1['control_first']);
            $control_first = 0;
            $ex_control_first = 0;
            foreach($arr_control1['control_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_first_score = Answers::select('rank_1st','value_4','rank_1_4')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $control_first += $control_first_score->rank_1st;
                if($control_first_score->value_4=="explicit"){
                    $ex_control_first += $control_first_score->rank_1_4;
                }
                else{
                    $ex_control_first = 0;
                }
            }
            
        }
        else{
            $control_first = 0;
            $ex_control_first = 0;
        }  

        if (array_key_exists("control_first",$arr_control)){
            $first = count($arr_control['control_first']);
            $first_control = 0; 
            foreach($arr_control['control_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_control_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_control += $first_control_score->rank_1_2;
            }
            $total_control = $control_first + $first_control;
            $ex_total_control = $ex_control_first;
        }
        else{
            $total_control = $control_first + 0;
            $ex_total_control = $ex_control_first + 0;
        }

        if (array_key_exists("control_second",$arr_control1)){
            $second = count($arr_control1['control_second']);
            $control_second = 0;
            $ex_control_second = 0;
            foreach($arr_control1['control_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_second_score = Answers::select('rank_2nd','value_4','rank_2_4')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $control_second += $control_second_score->rank_2nd;
                if($control_second_score->value_4=="explicit"){
                    $ex_control_second += $control_second_score->rank_2_4;
                }
                else{
                    $ex_control_second = 0;
                }
                
            }
        }
        else{
            $control_second = 0;
            $ex_control_second = 0;
        }

        if (array_key_exists("control_second",$arr_control)){
            $second = count($arr_control['control_second']);
            $second_control = 0; 
            foreach($arr_control['control_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_control_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_control += $second_control_score->rank_2_2;
            }
            $total_control_second = $control_second + $second_control;
            $ex_total_control_second = $ex_control_second;
        }
        else{
            $total_control_second = $control_second + 0;
            $ex_total_control_second = $ex_control_second ;
        }

        if (array_key_exists("control_third",$arr_control1)){
            $third = count($arr_control1['control_third']);
            $control_third = 0;
            $ex_control_third = 0;
            foreach($arr_control1['control_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_third_score = Answers::select('rank_3rd','value_4','rank_3_4')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $control_third += $control_third_score->rank_3rd;
                if($control_third_score->value_4=="explicit"){
                    $ex_control_third += $control_third_score->rank_3_4;
                }
                else{
                    $ex_control_third = 0;
                }
            }
        }
        else{
            $control_third = 0;
            $ex_control_third = 0;
        }

        if (array_key_exists("control_last",$arr_control1)){
            $last = count($arr_control1['control_last']);
            $control_last = 0;
            $ex_control_last = 0;
            foreach($arr_control1['control_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_last_score = Answers::select('rank_last','value_4','rank_4_4')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $control_last += $control_last_score->rank_last;
                if($control_last_score->value_4=="explicit"){
                    $ex_control_last += $control_last_score->rank_4_4;
                }
                else{
                    $ex_control_last = 0;
                }
            }
         }
        else{
            $control_last = 0;
            $ex_control_last = 0;
        }
        /*Control End */
       
        /*Collapse Start*/
        if (array_key_exists("collapse_first",$arr_collapse1)){
            $first = count($arr_collapse1['collapse_first']);
            $collapse_first = 0;
            $im_collapse_first = 0;
            foreach($arr_collapse1['collapse_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_first_score = Answers::select('rank_1st','value_4','rank_1_4')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_first += $collapse_first_score->rank_1st;
                if($collapse_first_score->value_4=="implicit"){
                    $im_collapse_first += $collapse_first_score->rank_1_4;
                }
                else{
                    $im_collapse_first = 0;
                }
            }
        }
        else{
            $collapse_first = 0;
            $im_collapse_first = 0;
        }  
        if (array_key_exists("collapse_first",$arr_collapse)){
            $first = count($arr_collapse['collapse_first']);
            $first_collapse = 0; 
            foreach($arr_collapse['collapse_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_collapse_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_collapse += $first_collapse_score->rank_1_2;
            }
            $total_collapse = $collapse_first + $first_collapse;
            $im_total_collapse = $im_collapse_first;
        }
        else{
            $total_collapse = $collapse_first + 0;
            $im_total_collapse = $im_collapse_first;
        }

        if (array_key_exists("collapse_second",$arr_collapse1)){
            $second = count($arr_collapse1['collapse_second']);
            $collapse_second = 0;
            $im_collapse_second = 0;
            foreach($arr_collapse1['collapse_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_second_score = Answers::select('rank_2nd','value_4','rank_2_4')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_second += $collapse_second_score->rank_2nd;
                if($collapse_second_score->value_4=="implicit"){
                    $im_collapse_second += $collapse_second_score->rank_2_4;
                }
                else{
                    $im_collapse_second = 0;
                }
            }
        }
        else{
            $collapse_second = 0;
            $im_collapse_second = 0;
        }
        if (array_key_exists("collapse_second",$arr_collapse)){
            $second = count($arr_collapse['collapse_second']);
            $second_collapse = 0; 
            foreach($arr_collapse['collapse_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_collapse_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_collapse += $second_collapse_score->rank_2_2;
            }
            $total_collapse_second = $collapse_second + $second_collapse;
            $im_total_collapse_second = $im_collapse_second;
        }
        else{
            $total_collapse_second = $collapse_second + 0;
            $im_total_collapse_second = $im_collapse_second;
        }


       if (array_key_exists("collapse_third",$arr_collapse1)){
            $third = count($arr_collapse1['collapse_third']);
            $collapse_third = 0;
            $im_collapse_third = 0;
            foreach($arr_collapse1['collapse_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_third_score = Answers::select('rank_3rd','value_4','rank_3_4')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_third += $collapse_third_score->rank_3rd;
                if($collapse_third_score->value_4=="implicit"){
                    $im_collapse_third += $collapse_third_score->rank_3_4;
                }
                else{
                    $im_collapse_third = 0;
                }
            }
        }
        else{
            $collapse_third = 0;
            $im_collapse_third = 0;
        }

        if (array_key_exists("collapse_last",$arr_collapse1)){
            $last = count($arr_collapse1['collapse_last']);
            $collapse_last = 0;
            $im_collapse_last = 0;
            foreach($arr_collapse1['collapse_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_last_score = Answers::select('rank_last','value_4','rank_4_4')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_last += $collapse_last_score->rank_last;
                if($collapse_last_score->value_4=="implicit"){
                    $im_collapse_last += $collapse_last_score->rank_4_4;
                }
                else{
                    $im_collapse_last = 0;
                }
            }
         }
        else{
            $collapse_last = 0;
            $im_collapse_last = 0;
        }
      
        /*Collapse End*/

        /*Addiction Start*/
        if (array_key_exists("addiction_first",$arr_addiction1)){
            $first = count($arr_addiction1['addiction_first']);
            $addiction_first = 0;
            $im_addiction_first = 0;
            foreach($arr_addiction1['addiction_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_first_score = Answers::select('rank_1st','value_4','rank_1_4')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_first += $addiction_first_score->rank_1st;
                if($addiction_first_score->value_4=="implicit"){
                    $im_addiction_first += $addiction_first_score->rank_1_4;
                }
                else{
                    $im_addiction_first = 0;
                }
            }
        }
        else{
            $addiction_first = 0;
            $im_addiction_first = 0;
        }  
        if (array_key_exists("addiction_first",$arr_addiction)){
            $first = count($arr_addiction['addiction_first']);
            $first_addiction = 0; 
            foreach($arr_addiction['addiction_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_addiction_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_addiction += $first_addiction_score->rank_1_2;
            }
            $total_addiction = $addiction_first + $first_addiction;
            $im_total_addiction = $im_addiction_first;
        }
        else{
            $total_addiction = $addiction_first + 0;
            $im_total_addiction = $im_addiction_first;
        }
        if (array_key_exists("addiction_second",$arr_addiction1)){
            $second = count($arr_addiction1['addiction_second']);
            $addiction_second = 0;
            $im_addiction_second = 0;
            foreach($arr_addiction1['addiction_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_second_score = Answers::select('rank_2nd','value_4','rank_2_4')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_second += $addiction_second_score->rank_2nd;
                if($addiction_second_score->value_4=="implicit"){
                    $im_addiction_second += $addiction_second_score->rank_2_4;
                }
                else{
                    $im_addiction_second = 0;
                }
            }
        }
        else{
            $addiction_second = 0;
            $im_addiction_second = 0;
        }
        if (array_key_exists("addiction_second",$arr_addiction)){
            $second = count($arr_addiction['addiction_second']);
            $second_addiction = 0; 
            foreach($arr_addiction['addiction_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $second_addiction_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $second_addiction += $second_addiction_score->rank_2_2;
            }
            $total_addiction_second = $addiction_second + $second_addiction;
            $im_total_addiction_second = $im_addiction_second;
        }
        else{
            $total_addiction_second = $addiction_second + 0;
            $im_total_addiction_second = $im_addiction_second;
        }

        if (array_key_exists("addiction_third",$arr_addiction1)){
            $third = count($arr_addiction1['addiction_third']);
            $addiction_third = 0;
            $im_addiction_third = 0;
            foreach($arr_addiction1['addiction_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_third_score = Answers::select('rank_3rd','value_4','rank_3_4')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_third += $addiction_third_score->rank_3rd;
                if($addiction_third_score->value_4=="implicit"){
                    $im_addiction_third += $addiction_third_score->rank_3_4;
                }
                else{
                    $im_addiction_third = 0;
                }
            }
        }
        else{
            $addiction_third = 0;
            $im_addiction_third = 0;
        }
 
        if (array_key_exists("addiction_last",$arr_addiction1)){
            $last = count($arr_addiction1['addiction_last']);
            $addiction_last = 0;
            $im_addiction_last = 0;
            foreach($arr_addiction1['addiction_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_last_score = Answers::select('rank_last','value_4','rank_4_4')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_last += $addiction_last_score->rank_last;
                if($addiction_last_score->value_4=="implicit"){
                    $im_addiction_last += $addiction_last_score->rank_4_4;
                }
                else{
                    $im_addiction_last = 0;
                }
            }
         }
        else{
            $addiction_last = 0;
            $im_addiction_last = 0;
        } 
        /*Addiction End*/
 
        /*Co-Dependence Start*/
        if (array_key_exists("dependence_first",$arr_dependence1)){
            $first = count($arr_dependence1['dependence_first']);
            $dependence_first = 0;
            $ex_dependence_first = 0;
            foreach($arr_dependence1['dependence_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_first_score = Answers::select('rank_1st','value_4','rank_1_4')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_first += $dependence_first_score->rank_1st;
                if($dependence_first_score->value_4=="explicit"){
                    $ex_dependence_first += $dependence_first_score->rank_1_4;
                }
                else{
                    $ex_dependence_first = 0;
                }
            }
        }
        else{
            $dependence_first = 0;
            $ex_dependence_first = 0;
        }  
        if (array_key_exists("dependence_first",$arr_dependence)){
            $first = count($arr_dependence['dependence_first']);
            $first_dependence = 0; 
            foreach($arr_dependence['dependence_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $first_dependence_score = Answers::select('rank_1_2')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $first_dependence += $first_dependence_score->rank_1_2;
            }
            $total_dependence = $dependence_first + $first_dependence;
            $ex_total_dependence = $ex_dependence_first;
        }
        else{
            $total_dependence = $dependence_first + 0;
            $ex_total_dependence = $ex_dependence_first;
        }

        if (array_key_exists("dependence_second",$arr_dependence1)){
            $second = count($arr_dependence1['dependence_second']);
            $dependence_second = 0;
            $ex_dependence_second = 0;
            foreach($arr_dependence1['dependence_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_second_score = Answers::select('rank_2nd','value_4','rank_2_4')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_second += $dependence_second_score->rank_2nd;
                if($dependence_second_score->value_4=="explicit"){
                    $ex_dependence_second += $dependence_second_score->rank_2_4;
                }
                else{
                    $ex_dependence_second = 0;
                }
            }
            
        }
        else{
            $dependence_second = 0;
            $ex_dependence_second = 0;
        }
        if (array_key_exists("dependence_second",$arr_dependence)){
            $second = count($arr_dependence['dependence_second']);
            $dependence_second = 0; 
            foreach($arr_dependence['dependence_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_second_score = Answers::select('rank_2_2')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_second += $dependence_second_score->rank_2_2;
            }
            $total_dependence_second = $dependence_second + $dependence_second;
            $ex_total_dependence_second = $ex_dependence_second;
        }
        else{
            $total_dependence_second = $dependence_second + 0;
            $ex_total_dependence_second = $ex_dependence_second;
        }
        if (array_key_exists("dependence_third",$arr_dependence1)){
            $third = count($arr_dependence1['dependence_third']);
            $dependence_third = 0;
            $ex_dependence_third = 0;
            foreach($arr_dependence1['dependence_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_third_score = Answers::select('rank_3rd','value_4','rank_3_4')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_third += $dependence_third_score->rank_3rd;
                if($dependence_third_score->value_4=="explicit"){
                    $ex_dependence_third += $dependence_third_score->rank_3rd;
                }
                else{
                    $ex_dependence_third = 0;
                }
            }
        }
        else{
            $dependence_third = 0;
            $ex_dependence_third = 0;
        }

        if (array_key_exists("dependence_last",$arr_dependence1)){
            $last = count($arr_dependence1['dependence_last']);
            $dependence_last = 0;
            $ex_dependence_last = 0;
            foreach($arr_dependence1['dependence_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_last_score = Answers::select('rank_last','value_4','rank_4_4')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_last += $dependence_last_score->rank_last;
                if($dependence_last_score->value_4=="explicit"){
                    $ex_dependence_last += $dependence_last_score->rank_4_4;
                }
                else{
                    $ex_dependence_last = 0;
                }
            }
           
         }
        else{
            $dependence_last = 0;
            $ex_dependence_last = 0;
        } 
  
        /*Co-Dependence End*/
        /*Explicit Start*/
        $ex_dependence = $ex_total_dependence + $ex_total_dependence_second + $ex_dependence_third - $ex_dependence_last;
        $ex_control = $ex_total_control + $ex_total_control_second + $ex_control_third - $ex_control_last;
        $ex_complaint = $ex_total_complaint + $ex_total_complaint_second + $ex_complaint_third - $ex_complaint_last;
        $shadow_explicit = $ex_dependence + $ex_control+ $ex_complaint;

       
        /*Explicit End*/
        /*Implicit Start*/
        $im_defense = $im_total_defense + $im_total_defense_second + $im_defense_third - $im_defense_last;
        $im_collapse = $im_total_collapse + $im_total_collapse_second + $im_collapse_third - $im_collapse_last;
        $im_addiction = $im_total_addiction + $im_total_addiction_second + $im_addiction_third - $im_addiction_last;
        $shadow_implicit = $im_defense + $im_collapse + $im_addiction;
        // print_r($im_defense);exit();
        /*Implicit End*/
        $shadow_bias = Bias::select('bias')->get();
        $complaint_total = $total_complaint+$total_complaint_second+$complaint_third-$complaint_last+($shadow_bias[8]['bias']);
        $defense_total = $total_defense + $total_defense_second + $defense_third - $defense_last+($shadow_bias[9]['bias']);
        $avoidance_total = $total_avoidance + $total_avoidance_second + $avoidance_third - $avoidance_last+($shadow_bias[12]['bias']);
        $anxious_total = $total_anxious + $total_anxious_second + $anxious_third - $anxious_last+($shadow_bias[13]['bias']);
        $control_total = $total_control + $total_control_second + $control_third - $control_last+($shadow_bias[10]['bias']);
        $collapse_total = $total_collapse + $total_collapse_second + $collapse_third - $collapse_last+($shadow_bias[11]['bias']);
        $addiction_total = $total_addiction + $total_addiction_second + $addiction_third - $addiction_last+($shadow_bias[14]['bias']);
        $dependence_total = $total_dependence + $total_dependence_second + $dependence_third - $dependence_last+($shadow_bias[15]['bias']);
      
        $max_shadow_score = 68;
        $min_shadow_score = -14;
        $complaint = round($complaint_total/(abs($min_shadow_score)+($max_shadow_score))*100); 
        $defense = round($defense_total/(abs($min_shadow_score)+($max_shadow_score))*100);
        $avoidance = round($avoidance_total/(abs($min_shadow_score)+($max_shadow_score))*100);
        $anxious = round($anxious_total/(abs($min_shadow_score)+($max_shadow_score))*100);
        $control = round($control_total/(abs($min_shadow_score)+($max_shadow_score))*100);
        $collapse = round($collapse_total/(abs($min_shadow_score)+($max_shadow_score))*100);
        $addiction = round($addiction_total/(abs($min_shadow_score)+($max_shadow_score))*100);
        $dependence = round($dependence_total/(abs($min_shadow_score)+($max_shadow_score))*100);


        return  array('complaint'=>$complaint,'defense'=>$defense,'avoidance'=>$avoidance,'anxious'=>$anxious,'control'=>$control,'collapse'=>$collapse,'addiction'=>$addiction,'dependence'=>$dependence);
    }


    public function shadow_lookup_text($complaint_txt, $defense_txt, $avoidance_txt, $anxious_txt, $control_txt, $collapse_txt, $addiction_txt, $dependence_txt,$shadow_arr){
        if($complaint_txt==$shadow_arr[0]){
            $primary_txt ="complaint";
            $remedy = "Complaint";
        }
        elseif($defense_txt==$shadow_arr[0]){
            $primary_txt ="defense";
            $remedy = "Defense";
        }
        elseif($avoidance_txt==$shadow_arr[0]){
            $primary_txt ="avoidance";
            $remedy = "Avoidance";
        }
        elseif($anxious_txt==$shadow_arr[0]){
            $primary_txt ="anxious";
            $remedy = "Anxious";
        }
        elseif($control_txt==$shadow_arr[0]){
            $primary_txt ="control";
            $remedy = "Control";
        }
        elseif($collapse_txt==$shadow_arr[0]){
            $primary_txt ="collapse";
            $remedy = "Collapse";
        }
        elseif($addiction_txt==$shadow_arr[0]){
            $primary_txt ="addiction";
            $remedy = "Addiction";
        }
        else{
            $primary_txt ="dependence";
            $remedy = "Co-dependence";
        }      


        if($complaint_txt==$shadow_arr[1]){
            $secondary_txt ="complaint";
            $remedy1 = "Complaint";
        }
        elseif($defense_txt==$shadow_arr[1]){
            $secondary_txt ="defense";
            $remedy1 = "Defense";
        }
        elseif($avoidance_txt==$shadow_arr[1]){
            $secondary_txt ="avoidance";
            $remedy1 = "Avoidance";
        }
        elseif($anxious_txt==$shadow_arr[1]){
            $secondary_txt ="anxious";
            $remedy1 = "Anxious";
        }
        elseif($control_txt==$shadow_arr[1]){
            $secondary_txt ="control";
            $remedy1 = "Control";
        }
        elseif($collapse_txt==$shadow_arr[1]){
            $secondary_txt ="collapse";
            $remedy1 = "Collapse";
        }
        elseif($addiction_txt==$shadow_arr[1]){
            $secondary_txt ="addiction";
            $remedy1 = "Addiction";
        }
        else{
            $secondary_txt ="dependence";
            $remedy1 = "Co-dependence";
        }
        $primary_qualities =  DB::table('shadow_lookup_texts')->select('primary_qualities')->where('archetype',$primary_txt)->first();
        $secondary_qualities =  DB::table('shadow_lookup_texts')->select('secondary_qualities')->where('archetype',$secondary_txt)->first();
        $id = base64_decode($_GET['formid']);
		$cid= str_replace('formid', '', $id);
        $formdata = DB::table('formdata')->select('data')->where('id',$cid)->first();
        $data = json_decode($formdata->data, TRUE);
        for($aa=1;$aa<=count($data);$aa++){
            if (array_key_exists("gender",$data['question'.$aa])){
               $val_arr = $aa;
            }
        }
        $gender = $data['question'.$val_arr]['gender'];
        // $gender = $data['question18']['gender'];
        $primary_shadow_images = DB::table('primary_shadow_qualities')->select($primary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $secondary_shadow_images = DB::table('secondary_shadow_qualities')->select($secondary_txt.'_'.$gender)->where('archetype',$secondary_txt)->first();
        $primary_shadow_image = $primary_shadow_images->{$primary_txt.'_'.$gender};
        $secondary_shadow_image = $secondary_shadow_images->{$secondary_txt.'_'.$gender};
        $toxic_cycle =  DB::table('toxic_cycle_images')->select($primary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $toxic_image = $toxic_cycle->{$primary_txt.'_'.$gender};

        $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy)->first();
        $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy1)->first();

        $toxic_content = DB::table('shadow_lookup_texts')->select('toxic_cycle','primary_toxic_cycle','primay_toxic_remedy')->where('archetype',$primary_txt)->first();
        $primary_toxic_images = DB::table('primary_toxic_images')->select($secondary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $primary_toxic_image = $primary_toxic_images->{$secondary_txt.'_'.$gender};
        $secondary_toxic_images = DB::table('secondary_toxic_images')->select($secondary_txt.'_'.$gender)->where('archetype',$secondary_txt)->first();
        $secondary_toxic_image = $secondary_toxic_images->{$secondary_txt.'_'.$gender};
        $secondary_content = DB::table('shadow_lookup_texts')->select('secondary_toxic_cyle','secondary_toxic_remedy')->where('archetype',$secondary_txt)->first();

        $shadowlookuptext = DB::table('shadow_lookup_texts')->select($secondary_txt)->where('archetype',$primary_txt)->first();
        return array('primary_qualities'=>$primary_qualities,'secondary_qualities'=>$secondary_qualities,'primary'=>$primary_txt,'secondary'=>$secondary_txt,'primary_shadow_images'=>$primary_shadow_image,
        'secondary_shadow_images'=>$secondary_shadow_image,'toxic_image'=>$toxic_image,'secendory_shadow'=>$secendory_shadow,'remedy'=>$remedy,'remedy1'=>$remedy1,'toxic_content'=>$toxic_content,
        'primary_toxic_image'=>$primary_toxic_image,'secondary_toxic_image'=>$secondary_toxic_image,'secondary_content'=>$secondary_content,'shadowlookuptext'=>$shadowlookuptext->{$secondary_txt});
   
       
    }
 
}


