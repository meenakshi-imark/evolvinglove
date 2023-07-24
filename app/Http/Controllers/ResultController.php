<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Answers;
use App\Models\Bias;
use App\Models\Quiz;
use Mail;
use PDF;

class ResultController extends Controller
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
        //Session::flush();
        // if($_GET['formid']){
        //     $id = base64_decode($_GET['formid']);
        //     $cid= str_replace('formid', '', $id);
        //     Session::put('formid', $cid);
        // }
        if(Session::has('formid')){
        $datasession = session()->all();
        $check_paid = DB::table('payments')->where('formid',$datasession['formid'])->count();
        // if($check_paid<1){
        //     return redirect('/upgrade-profile');
        // }
        $formval = DB::table('formdata')->where('id',$datasession['formid'])->first();
        $chk_phone = Quiz::select('question_no','id')->where('question_name','phone')->where('status','0')->first();
        $chk_invest = Quiz::select('question_no','id')->where('question_name','invested')->where('status','0')->first();
        $a = json_decode($formval->data, true);
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
            $ex_possibility_first = 0;
            $st_possibility_first = 0;
            $ini_possibility_first = 0;
            $sp_possibility_first = 0;
            foreach($arr['possibility_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_10','rank_1_10','value_7','rank_1_7','value_11','rank_1_11')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_first += $possibility_first_score->rank_1st;
                if($possibility_first_score->value_4=="explicit"){
                    $ex_possibility_first += $possibility_first_score->rank_1_4;
                }
                else{
                    $ex_possibility_first = 0;
                }
                if($possibility_first_score->value_10=="Achievement"){
                    $st_possibility_first += $possibility_first_score->rank_1_10;
                }
                else{
                    $st_possibility_first = 0;
                }
                if($possibility_first_score->value_7=="Initiation"){
                    $ini_possibility_first += $possibility_first_score->rank_1_7;
                }
                else{
                    $ini_possibility_first = 0;
                }
                if($possibility_first_score->value_11=="Spontaneity"){
                    $sp_possibility_first += $possibility_first_score->rank_1_11;
                }
                else{
                    $sp_possibility_first = 0;
                }
            }
        }
        else{
            $possibility_first = 0;
            $ex_possibility_first = 0;
            $st_possibility_first = 0;
            $ini_possibility_first = 0;
            $sp_possibility_first = 0;
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
            $ex_total_possibility = $ex_possibility_first;
            $st_total_possibility = $st_possibility_first;
            $ini_total_possibility = $ini_possibility_first;
            $sp_total_possibility = $sp_possibility_first;
        }
        else{
            $total_possibility = $possibility_first + 0;
            $ex_total_possibility = $ex_possibility_first;
            $st_total_possibility = $st_possibility_first;
            $ini_total_possibility = $ini_possibility_first;
            $sp_total_possibility = $sp_possibility_first;
        }
       
        if (array_key_exists("possibility_second",$arr)){
            $second = count($arr['possibility_second']);
            $possibility_second = 0;
            $ex_possibility_second = 0;
            $st_possibility_second = 0;
            $ini_possibility_second = 0;
            $sp_possibility_second = 0;
            foreach($arr['possibility_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_10','rank_2_10','value_7','rank_2_7','value_11','rank_2_11')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_second += $possibility_second_score->rank_2nd;
                if($possibility_second_score->value_4=="explicit"){
                    $ex_possibility_second += $possibility_second_score->rank_2_4;
                }
                else{
                    $ex_possibility_second = 0;
                }
                if($possibility_second_score->value_10=="Achievement"){
                    $st_possibility_second += $possibility_second_score->rank_2_10;
                }
                else{
                    $st_possibility_second = 0;
                }
                if($possibility_second_score->value_7=="Initiation"){
                    $ini_possibility_second += $possibility_second_score->rank_2_7;
                }
                else{
                    $ini_possibility_second = 0;
                }
                if($possibility_second_score->value_11=="Spontaneity"){
                    $sp_possibility_second += $possibility_second_score->rank_2_11;
                }
                else{
                    $sp_possibility_second = 0;
                }
            }
        }
        else{
            $possibility_second = 0;
            $ex_possibility_second = 0;
            $st_possibility_second = 0;
            $ini_possibility_second = 0;
            $sp_possibility_second = 0;
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
            $ex_total_possibility_second = $ex_possibility_second;
            $st_total_possibility_second = $st_possibility_second;
            $ini_total_possibility_second = $ini_possibility_second;
            $sp_total_possibility_second = $sp_possibility_second;
         }
        else{
            $total_possibility_second = $possibility_second + 0;
            $ex_total_possibility_second = $ex_possibility_second;
            $st_total_possibility_second = $st_possibility_second;
            $ini_total_possibility_second = $ini_possibility_second;
            $sp_total_possibility_second = $sp_possibility_second;
        }


        if (array_key_exists("possibility_third",$arr)){
            $third = count($arr['possibility_third']);
            $possibility_third = 0;
            $ex_possibility_third = 0;
            $st_possibility_third = 0;
            $ini_possibility_third = 0;
            $sp_possibility_third = 0;
            foreach($arr['possibility_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_10','rank_3_10','value_7','rank_3_7','value_11','rank_3_11')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_third += $possibility_third_score->rank_3rd;
                if($possibility_third_score->value_4=="explicit"){
                    $ex_possibility_third += $possibility_third_score->rank_3_4;
                }
                else{
                    $ex_possibility_third = 0;
                }
                if($possibility_third_score->value_10=="Achievement"){
                    $st_possibility_third += $possibility_third_score->rank_3_10;
                }
                else{
                    $st_possibility_third = 0;
                }
                if($possibility_third_score->value_7=="Initiation"){
                    $ini_possibility_third += $possibility_third_score->rank_3_7;
                }
                else{
                    $ini_possibility_third = 0;
                }
                if($possibility_third_score->value_11=="Spontaneity"){
                    $sp_possibility_third += $possibility_third_score->rank_3_11;
                }
                else{
                    $sp_possibility_third = 0;
                }
            }
        }
        else{
            $possibility_third = 0;
            $ex_possibility_third = 0;
            $st_possibility_third = 0;
            $ini_possibility_third = 0;
            $sp_possibility_third = 0;
        }

        if (array_key_exists("possibility_last",$arr)){
            $last = count($arr['possibility_last']);
            $possibility_last = 0;
            $ex_possibility_last = 0;
            $st_possibility_last = 0;
            $ini_possibility_last = 0;
            $sp_possibility_last = 0;
            foreach($arr['possibility_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $possibility_last_score = Answers::select('rank_last','value_4','rank_4_4','value_10','rank_4_10','value_7','rank_4_7','value_11','rank_4_11')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $possibility_last += $possibility_last_score->rank_last;
                if($possibility_last_score->value_4=="explicit"){
                    $ex_possibility_last += $possibility_last_score->rank_4_4;
                }
                else{
                    $ex_possibility_last = 0;
                }
                if($possibility_last_score->value_10=="Achievement"){
                    $st_possibility_last += $possibility_last_score->rank_4_10;
                }
                else{
                    $st_possibility_last = 0;
                }
                if($possibility_last_score->value_7=="Initiation"){
                    $ini_possibility_last += $possibility_last_score->rank_4_7;
                }
                else{
                    $ini_possibility_last = 0;
                }
                if($possibility_last_score->value_11=="Spontaneity"){
                    $sp_possibility_last += $possibility_last_score->rank_4_11;
                }
                else{
                    $sp_possibility_last = 0;
                }
            }
        }
        else{
            $possibility_last = 0;
            $ex_possibility_last = 0;
            $st_possibility_last = 0;
            $ini_possibility_last = 0;
            $sp_possibility_last = 0;
        }

        /* Possibility End */

        /* Appreciation Start */
        if (array_key_exists("appreciation_first",$arr_app)){
            $first = count($arr_app['appreciation_first']);
            $appreciation_first = 0;
            $im_appreciation_first = 0;
            $op_appreciation_first = 0;
            $re_appreciation_first = 0;
            $pl_appreciation_first = 0;
            foreach($arr_app['appreciation_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $appreciation_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_10','rank_1_10','value_7','rank_1_7','value_11','rank_1_11')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $appreciation_first += $appreciation_first_score->rank_1st;
                if($appreciation_first_score->value_4=="implicit"){
                    $im_appreciation_first += $appreciation_first_score->rank_1_4;
                }
                else{
                    $im_appreciation_first = 0;
                }
				if($appreciation_first_score->value_10=="Acceptance"){
                    $op_appreciation_first += $appreciation_first_score->rank_1_10;
                }
                else{
                    $op_appreciation_first = 0;
                }
                if($appreciation_first_score->value_7=="Reciprocating"){
                    $re_appreciation_first += $appreciation_first_score->rank_1_7;
                }
                else{
                    $re_appreciation_first = 0;
                }
                if($appreciation_first_score->value_11=="Planning"){
                    $pl_appreciation_first += $appreciation_first_score->rank_1_11;
                }
                else{
                    $pl_appreciation_first = 0;
                }
				
            }
        }
        else{
            $appreciation_first = 0;
            $im_appreciation_first = 0;
            $op_appreciation_first = 0;
            $re_appreciation_first = 0;
            $pl_appreciation_first = 0;
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
            $im_total_appreciation=$im_appreciation_first;
			$op_total_appreciation=$op_appreciation_first;
            $re_total_appreciation=$re_appreciation_first;
            $pl_total_appreciation=$pl_appreciation_first;
        }
        else{
            $total_appreciation=$appreciation_first + 0;
            $im_total_appreciation=$im_appreciation_first;
            $op_total_appreciation=$op_appreciation_first;
            $re_total_appreciation=$re_appreciation_first;
            $pl_total_appreciation=$pl_appreciation_first;
        }   

        if (array_key_exists("appreciation_second",$arr_app)){
            $second = count($arr_app['appreciation_second']);
            $appreciation_second = 0;
            $im_appreciation_second = 0;
            $op_appreciation_second = 0;
            $re_appreciation_second = 0;
            $pl_appreciation_second = 0;
            foreach($arr_app['appreciation_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $appreciation_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_10','rank_2_10','value_7','rank_2_7','value_11','rank_2_11')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $appreciation_second += $appreciation_second_score->rank_2nd;
                if($appreciation_second_score->value_4=="implicit"){
                    $im_appreciation_second += $appreciation_second_score->rank_2_4;
                }
                else{
                    $im_appreciation_second = 0;
                }
				if($appreciation_second_score->value_10=="Acceptance"){
                    $op_appreciation_second += $appreciation_second_score->rank_2_10;
                }
                else{
                    $op_appreciation_second = 0;
                }
                if($appreciation_second_score->value_7=="Reciprocating"){
                    $re_appreciation_second += $appreciation_second_score->rank_2_7;
                }
                else{
                    $re_appreciation_second = 0;
                }
                if($appreciation_second_score->value_11=="Planning"){
                    $pl_appreciation_second += $appreciation_second_score->rank_2_11;
                }
                else{
                    $pl_appreciation_second = 0;
                }
            }
        }
        else{
            $appreciation_second = 0;
            $im_appreciation_second = 0;
            $op_appreciation_second = 0;
            $re_appreciation_second = 0;
            $pl_appreciation_second = 0;
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
            $im_total_appreciation_second = $im_appreciation_second;
			$op_total_appreciation_second = $op_appreciation_second;
            $re_total_appreciation_second = $re_appreciation_second;
            $pl_total_appreciation_second = $pl_appreciation_second;
        }
        else{
            $total_appreciation_second = $appreciation_second + 0;
            $im_total_appreciation_second = $im_appreciation_second;
            $op_total_appreciation_second = $op_appreciation_second;
            $re_total_appreciation_second = $re_appreciation_second;
            $pl_total_appreciation_second = $pl_appreciation_second;
        }

        if (array_key_exists("appreciation_third",$arr_app)){
            $third = count($arr_app['appreciation_third']);
            $appreciation_third = 0;
            $im_appreciation_third = 0;
            $op_appreciation_third = 0;
            $re_appreciation_third = 0;
            $pl_appreciation_third = 0;
            foreach($arr_app['appreciation_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $appreciation_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_10','rank_3_10','value_7','rank_3_7','value_11','rank_3_11')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $appreciation_third += $appreciation_third_score->rank_3rd;
                if($appreciation_third_score->value_4=="implicit"){
                    $im_appreciation_third += $appreciation_third_score->rank_3_4;
                }
                else{
                    $im_appreciation_third = 0;
                }
				if($appreciation_third_score->value_10=="Acceptance"){
                    $op_appreciation_third += $appreciation_third_score->rank_3_10;
                }
                else{
                    $op_appreciation_third = 0;
                }
                if($appreciation_third_score->value_7=="Reciprocating"){
                    $re_appreciation_third += $appreciation_third_score->rank_3_7;
                }
                else{
                    $re_appreciation_third = 0;
                }
                if($appreciation_third_score->value_11=="Planning"){
                    $pl_appreciation_third += $appreciation_third_score->rank_3_11;
                }
                else{
                    $pl_appreciation_third = 0;
                }
            }
        }
        else{
            $appreciation_third = 0;
            $im_appreciation_third = 0;
            $op_appreciation_third = 0;
            $re_appreciation_third = 0;
            $pl_appreciation_third = 0;
        }
        

        if (array_key_exists("appreciation_last",$arr_app)){
        $last = count($arr_app['appreciation_last']);
        $appreciation_last = 0;
        $im_appreciation_last = 0;
        $op_appreciation_last = 0;
        $re_appreciation_last = 0;
        $pl_appreciation_last = 0;
        foreach($arr_app['appreciation_last'] as $ps){
            $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
            $appreciation_last_score = Answers::select('rank_last','value_4','rank_4_4','value_10','rank_4_10','value_7','rank_4_7','value_11','rank_4_11')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
            $appreciation_last += $appreciation_last_score->rank_last;
            if($appreciation_last_score->value_4=="implicit"){
                $im_appreciation_last += $appreciation_last_score->rank_4_4;
            }
            else{
                $im_appreciation_last = 0;
            }
			if($appreciation_last_score->value_10=="Acceptance"){
                $op_appreciation_last += $appreciation_last_score->rank_4_10;
            }
            else{
                $op_appreciation_last = 0;
            }
            if($appreciation_last_score->value_7=="Reciprocating"){
                $re_appreciation_last += $appreciation_last_score->rank_4_7;
            }
            else{
                $re_appreciation_last = 0;
            }
            if($appreciation_last_score->value_11=="Planning"){
                $pl_appreciation_last += $appreciation_last_score->rank_4_11;
            }
            else{
                $pl_appreciation_last = 0;
            }
        }
        }
        else{
            $appreciation_last = 0;
            $im_appreciation_last = 0;
            $op_appreciation_last = 0;
            $re_appreciation_last = 0;
            $pl_appreciation_last = 0;
        }
         /* Appreciation End */

        /* Truth Start */
        if (array_key_exists("truth_first",$arr_truth)){
            $first = count($arr_truth['truth_first']);
            $truth_first = 0;
            $ex_truth_first = 0;
            $pa_truth_first = 0;
            $st_truth_first = 0;
            $int_truth_first = 0;
            $di_truth_first = 0;
            $con_truth_first = 0;
            $ini_truth_first = 0;
            foreach($arr_truth['truth_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_6','rank_1_6','value_10','rank_1_10','value_3','rank_1_3','value_5','rank_1_5','value_9','rank_1_9',
                'value_7','rank_1_7')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_first += $truth_first_score->rank_1st;
                if($truth_first_score->value_4=="explicit"){
                    $ex_truth_first += $truth_first_score->rank_1_4;
                }
                else{
                    $ex_truth_first = 0;
                }
                if($truth_first_score->value_6=="Autonomous"){
                    $pa_truth_first += $truth_first_score->rank_1_6;
                }
                else{
                    $pa_truth_first = 0;
                }
                if($truth_first_score->value_10=="Achievement"){
                    $st_truth_first += $truth_first_score->rank_1_10;
                }
                else{
                    $st_truth_first = 0;
                }
				if($truth_first_score->value_3=="internal"){
                    $int_truth_first += $truth_first_score->rank_1_3;
                }
                else{
                    $int_truth_first = 0;
                }
				if($truth_first_score->value_5=="Directive"){
                    $di_truth_first += $truth_first_score->rank_1_5;
                }
                else{
                    $di_truth_first = 0;
                }
                if($truth_first_score->value_9=="Considered"){
                    $con_truth_first += $truth_first_score->rank_1_9;
                }
                else{
                    $con_truth_first = 0;
                }
                if($truth_first_score->value_7=="Initiation"){
                    $ini_truth_first += $truth_first_score->rank_1_7;
                }
                else{
                    $ini_truth_first = 0;
                }
                
            }
        }
        else{
            $truth_first = 0;
            $ex_truth_first = 0;
            $pa_truth_first = 0;
            $st_truth_first = 0;
            $int_truth_first = 0;
            $di_truth_first = 0;
            $con_truth_first = 0;
            $ini_truth_first = 0;
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
            $ex_total_truth = $ex_truth_first;
            $pa_total_truth = $pa_truth_first;
            $st_total_truth = $st_truth_first;
			$int_total_truth = $int_truth_first;
            $di_total_truth = $di_truth_first;
            $con_total_truth = $con_truth_first;
            $ini_total_truth = $ini_truth_first;
        }
        else{
            $total_truth = $truth_first + 0;
            $ex_total_truth = $ex_truth_first;
            $pa_total_truth = $pa_truth_first;
            $st_total_truth = $st_truth_first;
            $int_total_truth = $int_truth_first;
            $di_total_truth = $di_truth_first;
            $con_total_truth = $con_truth_first;
            $ini_total_truth = $ini_truth_first;
        } 
     

        if (array_key_exists("truth_second",$arr_truth)){
            $second = count($arr_truth['truth_second']);
            $truth_second = 0;
            $ex_truth_second = 0;
            $pa_truth_second = 0;
            $st_truth_second = 0;
            $int_truth_second = 0;
            $di_truth_second = 0;
            $con_truth_second = 0;
            $ini_truth_second = 0;
            foreach($arr_truth['truth_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_6','rank_2_6','value_10','rank_2_10','value_3','rank_2_3','value_5','rank_2_5','value_9','rank_2_9',
                'value_7','rank_2_7')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_second += $truth_second_score->rank_2nd;
                if($truth_second_score->value_4=="explicit"){
                    $ex_truth_second += $truth_second_score->rank_2_4;
                }
                else{
                    $ex_truth_second = 0;
                }
                if($truth_second_score->value_6=="Autonomous"){
                    $pa_truth_second += $truth_second_score->rank_2_6;
                }
                else{
                    $pa_truth_second = 0;
                }
                if($truth_second_score->value_10=="Achievement"){
                    $st_truth_second += $truth_second_score->rank_2_10;
                }
                else{
                    $st_truth_second = 0;
                }
				if($truth_second_score->value_3=="internal"){
                    $int_truth_second += $truth_second_score->rank_2_3;
                }
                else{
                    $int_truth_second = 0;
                }
				if($truth_second_score->value_5=="Directive"){
                    $di_truth_second += $truth_second_score->rank_2_5;
                }
                else{
                    $di_truth_second = 0;
                }
                if($truth_second_score->value_9=="Considered"){
                    $con_truth_second += $truth_second_score->rank_2_9;
                }
                else{
                    $con_truth_second = 0;
                }
                if($truth_second_score->value_7=="Initiation"){
                    $ini_truth_second += $truth_second_score->rank_2_7;
                }
                else{
                    $ini_truth_second = 0;
                }
            }
            }
        else{
            $truth_second = 0;
            $ex_truth_second = 0;
            $pa_truth_second = 0;
            $st_truth_second = 0;
            $int_truth_second = 0;
            $di_truth_second = 0;
            $con_truth_second = 0;
            $ini_truth_second = 0;
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
            $ex_total_truth_second = $ex_truth_second;
            $pa_total_truth_second = $pa_truth_second;
            $st_total_truth_second = $st_truth_second;
            $int_total_truth_second = $int_truth_second;
            $di_total_truth_second = $di_truth_second;
            $con_total_truth_second = $con_truth_second;
            $ini_total_truth_second = $ini_truth_second;
        }
        else{
            $total_truth_second = $truth_second + 0;
            $ex_total_truth_second = $ex_truth_second;
            $pa_total_truth_second = $pa_truth_second;
            $st_total_truth_second = $st_truth_second;
            $int_total_truth_second = $int_truth_second;
            $di_total_truth_second = $di_truth_second;
            $con_total_truth_second = $con_truth_second;
            $ini_total_truth_second = $ini_truth_second;
        }


        if (array_key_exists("truth_third",$arr_truth)){
            $third = count($arr_truth['truth_third']);
            $truth_third = 0;
            $ex_truth_third = 0;
            $pa_truth_third = 0;
            $st_truth_third = 0;
            $int_truth_third = 0;
            $di_truth_third = 0;
            $con_truth_third = 0;
            $ini_truth_third = 0;
            foreach($arr_truth['truth_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_6','rank_3_6','value_10','rank_3_10','value_3','rank_3_3','value_5','rank_3_5','value_9','rank_3_9',
                'value_7','rank_3_7')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_third += $truth_third_score->rank_3rd;
                if($truth_third_score->value_4=="explicit"){
                    $ex_truth_third += $truth_third_score->rank_3_4;
                }
                else{
                    $ex_truth_third = 0;
                }
                if($truth_third_score->value_6=="Autonomous"){
                    $pa_truth_third += $truth_third_score->rank_3_6;
                }
                else{
                    $pa_truth_third = 0;
                }
                if($truth_third_score->value_10=="Achievement"){
                    $st_truth_third += $truth_third_score->rank_3_10;
                }
                else{
                    $st_truth_third = 0;
                }
				if($truth_third_score->value_3=="internal"){
                    $int_truth_third += $truth_third_score->rank_3_3;
                }
                else{
                    $int_truth_third = 0;
                }
				if($truth_third_score->value_5=="Directive"){
                    $di_truth_third += $truth_third_score->rank_3_5;
                }
                else{
                    $di_truth_third = 0;
                }
                if($truth_third_score->value_9=="Considered"){
                    $con_truth_third += $truth_third_score->rank_3_9;
                }
                else{
                    $con_truth_third = 0;
                }
                if($truth_third_score->value_7=="Initiation"){
                    $ini_truth_third += $truth_third_score->rank_3_7;
                }
                else{
                    $ini_truth_third = 0;
                }
            }
        }
        else{
            $truth_third = 0;
            $ex_truth_third = 0;
            $pa_truth_third = 0;
            $st_truth_third = 0;
            $int_truth_third = 0;
            $di_truth_third = 0;
            $con_truth_third = 0;
            $ini_truth_third = 0;
        }


        if (array_key_exists("truth_last",$arr_truth)){
            $last = count($arr_truth['truth_last']);
            $truth_last = 0;
            $ex_truth_last = 0;
            $pa_truth_last = 0;
            $st_truth_last = 0;
            $int_truth_last = 0;
            $di_truth_last = 0;
            $con_truth_last = 0;
            $ini_truth_last = 0;
            foreach($arr_truth['truth_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $truth_last_score = Answers::select('rank_last','value_4','rank_4_4','value_6','rank_4_6','value_10','rank_4_10','value_3','rank_4_3','value_4','rank_1_5','value_9','rank_4_9',
                'value_7','rank_4_7')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $truth_last += $truth_last_score->rank_last;
                if($truth_last_score->value_4=="explicit"){
                    $ex_truth_last += $truth_last_score->rank_4_4;
                }
                else{
                    $ex_truth_last = 0;
                }
                if($truth_last_score->value_6=="Autonomous"){
                    $pa_truth_last += $truth_last_score->rank_4_6;
                }
                else{
                    $pa_truth_last = 0;
                }
                if($truth_last_score->value_10=="Achievement"){
                    $st_truth_last += $truth_last_score->rank_4_10;
                }
                else{
                    $st_truth_last = 0;
                }
				if($truth_last_score->value_3=="internal"){
                    $int_truth_last += $truth_last_score->rank_4_3;
                }
                else{
                    $int_truth_last = 0;
                }
				if($truth_last_score->value_5=="Directive"){
                    $di_truth_last += $truth_last_score->rank_4_5;
                }
                else{
                    $di_truth_last = 0;
                }
                if($truth_last_score->value_9=="Considered"){
                    $con_truth_last += $truth_last_score->rank_4_9;
                }
                else{
                    $con_truth_last = 0;
                }
                if($truth_last_score->value_7=="Initiation"){
                    $ini_truth_last += $truth_last_score->rank_4_7;
                }
                else{
                    $ini_truth_last = 0;
                }
            }
        }
        else{
            $truth_last = 0;
            $ex_truth_last = 0;
            $pa_truth_last = 0;
            $st_truth_last = 0;
            $int_truth_last = 0;
            $di_truth_last = 0;
            $con_truth_last = 0;
            $ini_truth_last = 0;
        }
        /* Truth End */


        /* Harmony Start */
        if (array_key_exists("harmony_first",$arr_harmony)){
            $first = count($arr_harmony['harmony_first']);
            $harmony_first = 0;
            $im_harmony_first = 0;
            $pa_harmony_first = 0;
            $op_first_harmony = 0; 
            $ext_harmony_first = 0; 
            $con_harmony_first = 0; 
            $col_harmony_first = 0; 
            $re_harmony_first = 0; 
            foreach($arr_harmony['harmony_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_6','rank_1_6','value_10','rank_1_10','value_3','rank_1_3','value_9','rank_1_9','value_5','rank_1_5',
                'value_7','rank_1_7')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_first += $harmony_first_score->rank_1st;
                if($harmony_first_score->value_4=="implicit"){
                    $im_harmony_first += $harmony_first_score->rank_1_4;
                }
                else{
                    $im_harmony_first = 0;
                }
                if($harmony_first_score->value_6=="Engaged"){
                    $pa_harmony_first += $harmony_first_score->rank_1_6;
                }
                else{
                    $pa_harmony_first = 0;
                }
				if($harmony_first_score->value_10=="Acceptance"){
                    $op_first_harmony += $harmony_first_score->rank_1_10;
                }
                else{
                    $op_first_harmony = 0;
                }
				if($harmony_first_score->value_3=="external"){
                    $ext_harmony_first += $harmony_first_score->rank_1_3;
                }
                else{
                    $ext_harmony_first = 0;
                }
                if($harmony_first_score->value_9=="Considered"){
                    $con_harmony_first += $harmony_first_score->rank_1_9;
                }
                else{
                    $con_harmony_first = 0;
                }
                if($harmony_first_score->value_5=="Collaborative"){
                    $col_harmony_first += $harmony_first_score->rank_1_5;
                }
                else{
                    $col_harmony_first = 0;
                }
                if($harmony_first_score->value_7=="Reciprocating"){
                    $re_harmony_first += $harmony_first_score->rank_1_7;
                }
                else{
                    $re_harmony_first = 0;
                }
            }
        }
        else{
            $harmony_first = 0;
            $im_harmony_first = 0;
            $pa_harmony_first = 0;
            $op_first_harmony = 0; 
            $ext_harmony_first = 0; 
            $con_harmony_first = 0; 
            $col_harmony_first = 0; 
            $re_harmony_first = 0; 
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
            $im_total_harmony = $im_harmony_first;
            $pa_total_harmony = $pa_harmony_first;
			$op_total_harmony = $op_first_harmony;
            $ext_total_harmony = $ext_harmony_first;
            $con_total_harmony = $con_harmony_first;
            $col_total_harmony = $col_harmony_first;
            $re_total_harmony = $re_harmony_first;
        }
        else{
            $total_harmony = $harmony_first + 0;
            $im_total_harmony = $im_harmony_first;
            $pa_total_harmony = $pa_harmony_first;
            $op_total_harmony = $op_first_harmony;
            $ext_total_harmony = $ext_harmony_first;
            $con_total_harmony = $con_harmony_first;
            $col_total_harmony = $col_harmony_first;
            $re_total_harmony = $re_harmony_first;
        }  

        if (array_key_exists("harmony_second",$arr_harmony)){
            $second = count($arr_harmony['harmony_second']);
            $harmony_second = 0;
            $im_harmony_second = 0;
            $pa_harmony_second = 0;
            $op_harmony_second = 0;
            $ext_harmony_second = 0;
            $con_harmony_second = 0;
            $col_harmony_second = 0;
            $re_harmony_second = 0;
            foreach($arr_harmony['harmony_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_6','rank_2_6','value_10','rank_2_10','value_3','rank_2_3','value_9','rank_2_9','value_5','rank_2_5',
                'value_7','rank_2_7')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_second += $harmony_second_score->rank_2nd;
                if($harmony_second_score->value_4=="implicit"){
                    $im_harmony_second += $harmony_second_score->rank_2_4;
                }
                else{
                    $im_harmony_second = 0;
                }
                if($harmony_second_score->value_6=="Engaged"){
                    $pa_harmony_second += $harmony_second_score->rank_2_6;
                }
                else{
                    $pa_harmony_second = 0;
                }
				if($harmony_second_score->value_10=="Acceptance"){
                    $op_harmony_second += $harmony_second_score->rank_2_10;
                }
                else{
                    $op_harmony_second = 0;
                }
				if($harmony_second_score->value_3=="external"){
                    $ext_harmony_second += $harmony_second_score->rank_2_3;
                }
                else{
                    $ext_harmony_second = 0;
                }
                if($harmony_second_score->value_9=="Considered"){
                    $con_harmony_second += $harmony_second_score->rank_2_9;
                }
                else{
                    $con_harmony_second = 0;
                }
                if($harmony_second_score->value_5=="Collaborative"){
                    $col_harmony_second += $harmony_second_score->rank_2_5;
                }
                else{
                    $col_harmony_second = 0;
                }
                if($harmony_second_score->value_7=="Reciprocating"){
                    $re_harmony_second += $harmony_second_score->rank_2_7;
                }
                else{
                    $re_harmony_second = 0;
                }
            }
        }
        else{
            $harmony_second = 0;
            $im_harmony_second = 0;
            $pa_harmony_second = 0;
            $op_harmony_second = 0;
            $ext_harmony_second = 0;
            $con_harmony_second = 0;
            $col_harmony_second = 0;
            $re_harmony_second = 0;
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
            $im_total_harmony_second = $im_harmony_second;
            $pa_total_harmony_second = $pa_harmony_second;
			$op_total_harmony_second = $op_harmony_second;
            $ext_total_harmony_second = $ext_harmony_second;
            $con_total_harmony_second = $con_harmony_second;
            $col_total_harmony_second = $col_harmony_second;
            $re_total_harmony_second = $re_harmony_second;
        }
        else{
            $total_harmony_second = $harmony_second + 0;
            $im_total_harmony_second = $im_harmony_second;
            $pa_total_harmony_second = $pa_harmony_second;
            $op_total_harmony_second = $op_harmony_second;
            $ext_total_harmony_second = $ext_harmony_second;
            $con_total_harmony_second = $con_harmony_second;
            $col_total_harmony_second = $col_harmony_second;
            $re_total_harmony_second = $re_harmony_second;
        }

            
        if (array_key_exists("harmony_third",$arr_harmony)){
            $third = count($arr_harmony['harmony_third']);
            $harmony_third = 0;
            $im_harmony_third = 0;
            $pa_harmony_third = 0;
            $op_harmony_third = 0;
            $ext_harmony_third = 0;
            $con_harmony_third = 0;
            $col_harmony_third = 0;
            $re_harmony_third = 0;
            foreach($arr_harmony['harmony_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_6','rank_3_6','value_10','rank_3_10','value_3','rank_3_3','value_9','rank_3_9','value_5','rank_3_5',
                'value_7','rank_3_7')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_third += $harmony_third_score->rank_3rd;
                if($harmony_third_score->value_4=="implicit"){
                    $im_harmony_third += $harmony_third_score->rank_3_4;
                }
                else{
                    $im_harmony_third = 0;
                }
                if($harmony_third_score->value_6=="Engaged"){
                    $pa_harmony_third += $harmony_third_score->rank_3_6;
                }
                else{
                    $pa_harmony_third = 0;
                }
				if($harmony_third_score->value_10=="Acceptance"){
                    $op_harmony_third += $harmony_third_score->rank_3_10;
                }
                else{
                    $op_harmony_third = 0;
                }
				if($harmony_third_score->value_3=="external"){
                    $ext_harmony_third += $harmony_third_score->rank_3_3;
                }
                else{
                    $ext_harmony_third = 0;
                }
                if($harmony_third_score->value_9=="Considered"){
                    $con_harmony_third += $harmony_third_score->rank_3_9;
                }
                else{
                    $con_harmony_third = 0;
                }
                if($harmony_third_score->value_5=="Collaborative"){
                    $col_harmony_third += $harmony_third_score->rank_3_5;
                }
                else{
                    $col_harmony_third = 0;
                }
                if($harmony_third_score->value_7=="Reciprocating"){
                    $re_harmony_third += $harmony_third_score->rank_3_7;
                }
                else{
                    $re_harmony_third = 0;
                }
            }
        }
        else{
            $harmony_third = 0;
            $im_harmony_third = 0;
            $pa_harmony_third = 0;
            $op_harmony_third = 0;
            $ext_harmony_third = 0;
            $con_harmony_third = 0;
            $col_harmony_third = 0;
            $re_harmony_third = 0;
        }
        
        if (array_key_exists("harmony_last",$arr_harmony)){
            $last = count($arr_harmony['harmony_last']);
            $harmony_last = 0;
            $im_harmony_last = 0;
            $pa_harmony_last = 0;
            $op_harmony_last = 0;
            $ext_harmony_last = 0;
            $con_harmony_last = 0;
            $col_harmony_last = 0;
            $re_harmony_last = 0;
            foreach($arr_harmony['harmony_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $harmony_last_score = Answers::select('rank_last','value_4','rank_4_4','value_6','rank_4_6','value_10','rank_4_10','value_3','rank_4_3','value_9','rank_4_9','value_5','rank_4_5',
                'value_7','rank_4_7')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $harmony_last += $harmony_last_score->rank_last;
                if($harmony_last_score->value_4=="implicit"){
                    $im_harmony_last += $harmony_last_score->rank_4_4;
                }
                else{
                    $im_harmony_last = 0;
                }
                if($harmony_last_score->value_6=="Engaged"){
                    $pa_harmony_last += $harmony_last_score->rank_4_6;
                }
                else{
                    $pa_harmony_last = 0;
                }
				if($harmony_last_score->value_10=="Acceptance"){
                    $op_harmony_last += $harmony_last_score->rank_4_10;
                }
                else{
                    $op_harmony_last = 0;
                }
				if($harmony_last_score->value_3=="external"){
                    $ext_harmony_last += $harmony_last_score->rank_4_3;
                }
                else{
                    $ext_harmony_last = 0;
                }
                if($harmony_last_score->value_9=="Considered"){
                    $con_harmony_last += $harmony_last_score->rank_4_9;
                }
                else{
                    $con_harmony_last = 0;
                }
                if($harmony_last_score->value_5=="Collaborative"){
                    $col_harmony_last += $harmony_last_score->rank_4_5;
                }
                else{
                    $col_harmony_last = 0;
                }
                if($harmony_last_score->value_7=="Reciprocating"){
                    $re_harmony_last += $harmony_last_score->rank_4_7;
                }
                else{
                    $re_harmony_last = 0;
                }
            }
        }
        else{
            $harmony_last = 0;
            $im_harmony_last = 0;
            $pa_harmony_last = 0;
            $op_harmony_last = 0;
            $ext_harmony_last = 0;
            $con_harmony_last = 0;
            $col_harmony_last = 0;
            $re_harmony_last = 0;
        }
      /* Harmony End */

        /* Freedom Start */
        if (array_key_exists("freedom_first",$arr_freedom)){
            $first = count($arr_freedom['freedom_first']);
            $freedom_first = 0;
            $pa_freedom_first = 0;
            $int_freedom_first = 0;
            $in_freedom_first = 0;
            $di_freedom_first = 0;
            $sp_freedom_first = 0;
            $va_freedom_first = 0;
            foreach($arr_freedom['freedom_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_first_score = Answers::select('rank_1st','value_6','rank_1_6','value_3','rank_1_3','value_5','rank_1_5','value_9','rank_1_9','value_11','rank_1_11','value_12','rank_1_12')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_first += $freedom_first_score->rank_1st;
                if($freedom_first_score->value_6=="Autonomous"){
                    $pa_freedom_first += $freedom_first_score->rank_1_6;
                }
                else{
                    $pa_freedom_first = 0;
                }
				if($freedom_first_score->value_3=="internal"){
                    $int_freedom_first += $freedom_first_score->rank_1_3;
                }
                else{
                    $int_freedom_first = 0;
                }
                if($freedom_first_score->value_5=="Directive"){
                    $di_freedom_first += $freedom_first_score->rank_1_5;
                }
                else{
                    $di_freedom_first = 0;
                }
                if($freedom_first_score->value_9=="Intuitive"){
                    $in_freedom_first += $freedom_first_score->rank_1_9;
                }
                else{
                    $in_freedom_first = 0;
                }
                if($freedom_first_score->value_11=="Spontaneity"){
                    $sp_freedom_first += $freedom_first_score->rank_1_11;
                }
                else{
                    $sp_freedom_first = 0;
                }
                if($freedom_first_score->value_12=="Variety"){
                    $va_freedom_first += $freedom_first_score->rank_1_12;
                }
                else{
                    $va_freedom_first = 0;
                }
            }
        }
        else{
            $freedom_first = 0;
            $pa_freedom_first = 0;
            $int_freedom_first = 0;
            $di_freedom_first = 0;
            $in_freedom_first = 0;
            $sp_freedom_first = 0;
            $va_freedom_first = 0;
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
            $pa_total_freedom = $pa_freedom_first;
            $int_total_freedom = $int_freedom_first;
            $di_total_freedom = $di_freedom_first;
            $in_total_freedom = $in_freedom_first;
            $sp_total_freedom = $sp_freedom_first;
            $va_total_freedom = $va_freedom_first;
        }
        else{
            $total_freedom = $freedom_first + 0;
            $pa_total_freedom = $pa_freedom_first;
            $int_total_freedom = $int_freedom_first;
            $di_total_freedom = $di_freedom_first;
            $in_total_freedom = $in_freedom_first;
            $sp_total_freedom = $sp_freedom_first;
            $va_total_freedom = $va_freedom_first;
        }  

        if (array_key_exists("freedom_second",$arr_freedom)){
            $second = count($arr_freedom['freedom_second']);
            $freedom_second = 0;
            $pa_freedom_second = 0;
            $int_freedom_second = 0;
            $di_freedom_second = 0;
            $in_freedom_second = 0;
            $sp_freedom_second = 0;
            $va_freedom_second = 0;
            foreach($arr_freedom['freedom_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_second_score = Answers::select('rank_2nd','value_6','rank_2_6','value_3','rank_2_3','value_5','rank_2_5','value_9','rank_2_9','value_11','rank_2_11','value_12','rank_2_12')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_second += $freedom_second_score->rank_2nd;
                if($freedom_second_score->value_6=="Autonomous"){
                    $pa_freedom_second += $freedom_second_score->rank_2_6;
                }
                else{
                    $pa_freedom_second = 0;
                }
				if($freedom_second_score->value_3=="internal"){
                    $int_freedom_second += $freedom_second_score->rank_2_3;
                }
                else{
                    $int_freedom_second = 0;
                }
                if($freedom_second_score->value_5=="Directive"){
                    $di_freedom_second += $freedom_second_score->rank_2_5;
                }
                else{
                    $di_freedom_second = 0;
                }
                if($freedom_second_score->value_9=="Intuitive"){
                    $in_freedom_second += $freedom_second_score->rank_2_9;
                }
                else{
                    $in_freedom_second = 0;
                }
                if($freedom_second_score->value_11=="Spontaneity"){
                    $sp_freedom_second += $freedom_second_score->rank_2_11;
                }
                else{
                    $sp_freedom_second = 0;
                }
                if($freedom_second_score->value_12=="Variety"){
                    $va_freedom_second += $freedom_second_score->rank_2_12;
                }
                else{
                    $va_freedom_second = 0;
                }
            }
        }
        else{
            $freedom_second = 0;
            $pa_freedom_second = 0;
            $int_freedom_second = 0;
            $di_freedom_second = 0;
            $in_freedom_second = 0;
            $sp_freedom_second = 0;
            $va_freedom_second = 0;
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
            $pa_total_freedom_second = $pa_freedom_second;
            $int_total_freedom_second = $int_freedom_second;
            $di_total_freedom_second = $di_freedom_second;
            $in_total_freedom_second = $in_freedom_second;
            $sp_total_freedom_second = $sp_freedom_second;
            $va_total_freedom_second = $va_freedom_second;
        }
        else{
            $total_freedom_second = $freedom_second + 0;
            $pa_total_freedom_second = $pa_freedom_second;
            $int_total_freedom_second = $int_freedom_second;
            $di_total_freedom_second = $di_freedom_second;
            $in_total_freedom_second = $in_freedom_second;
            $sp_total_freedom_second = $sp_freedom_second;
            $va_total_freedom_second = $va_freedom_second;
        }

        if (array_key_exists("freedom_third",$arr_freedom)){
            $third = count($arr_freedom['freedom_third']);
            $freedom_third = 0;
            $pa_freedom_third = 0;
            $int_freedom_third = 0;
            $di_freedom_third = 0;
            $in_freedom_third = 0;
            $sp_freedom_third = 0;
            $va_freedom_third = 0;
            foreach($arr_freedom['freedom_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_third_score = Answers::select('rank_3rd','value_6','rank_3_6','value_3','rank_3_3','value_5','rank_3_5','value_9','rank_3_9','value_11','rank_3_11','value_12','rank_3_12')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_third += $freedom_third_score->rank_3rd;
                if($freedom_third_score->value_6=="Autonomous"){
                    $pa_freedom_third += $freedom_third_score->rank_3_6;
                }
                else{
                    $pa_freedom_third = 0;
                }
				if($freedom_third_score->value_3=="internal"){
                    $int_freedom_third += $freedom_third_score->rank_3_3;
                }
                else{
                    $int_freedom_third = 0;
                }
                if($freedom_third_score->value_5=="Directive"){
                    $di_freedom_third += $freedom_third_score->rank_3_5;
                }
                else{
                    $di_freedom_third = 0;
                }
                if($freedom_third_score->value_9=="Intuitive"){
                    $in_freedom_third += $freedom_third_score->rank_3_9;
                }
                else{
                    $in_freedom_third = 0;
                }
                if($freedom_third_score->value_11=="Spontaneity"){
                    $sp_freedom_third += $freedom_third_score->rank_3_11;
                }
                else{
                    $sp_freedom_third = 0;
                }
                if($freedom_third_score->value_12=="Variety"){
                    $va_freedom_third += $freedom_third_score->rank_3_12;
                }
                else{
                    $va_freedom_third = 0;
                }
            }
        }
        else{
            $freedom_third = 0;
            $pa_freedom_third = 0;
            $int_freedom_third = 0;
            $di_freedom_third = 0;
            $in_freedom_third = 0;
            $sp_freedom_third = 0;
            $va_freedom_third = 0;
        }

        if (array_key_exists("freedom_last",$arr_freedom)){
            $last = count($arr_freedom['freedom_last']);
            $freedom_last = 0;
            $pa_freedom_last = 0;
            $int_freedom_last = 0;
            $di_freedom_last = 0;
            $in_freedom_last = 0;
            $sp_freedom_last = 0;
            $va_freedom_last = 0;
            foreach($arr_freedom['freedom_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $freedom_last_score = Answers::select('rank_last','value_6','rank_4_6','value_3','rank_4_3','value_5','rank_4_5','value_9','rank_4_9','value_11','rank_4_11','value_12','rank_4_12')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $freedom_last += $freedom_last_score->rank_last;
                if($freedom_last_score->value_6=="Autonomous"){
                    $pa_freedom_last += $freedom_last_score->rank_4_6;
                }
                else{
                    $pa_freedom_last = 0;
                }
				if($freedom_last_score->value_3=="internal"){
                    $int_freedom_last += $freedom_last_score->rank_4_3;
                }
                else{
                    $int_freedom_last = 0;
                }
                if($freedom_last_score->value_5=="Directive"){
                    $di_freedom_last += $freedom_last_score->rank_4_5;
                }
                else{
                    $di_freedom_last = 0;
                }
                if($freedom_last_score->value_9=="Intuitive"){
                    $in_freedom_last += $freedom_last_score->rank_4_9;
                }
                else{
                    $in_freedom_last = 0;
                }
                if($freedom_last_score->value_11=="Spontaneity"){
                    $sp_freedom_last += $freedom_last_score->rank_4_11;
                }
                else{
                    $sp_freedom_last = 0;
                }
                if($freedom_last_score->value_12=="Variety"){
                    $va_freedom_last += $freedom_last_score->rank_4_12;
                }
                else{
                    $va_freedom_last = 0;
                }
            }
        }
        else{
            $freedom_last = 0;
            $pa_freedom_last = 0;
            $int_freedom_last = 0;
            $di_freedom_last = 0;
            $in_freedom_last = 0;
            $sp_freedom_last = 0;
            $va_freedom_last = 0;
        }

      /* Freedom End */
       /* Devotion Start */

       if (array_key_exists("devotion_first",$arr_devotion)){
        $first = count($arr_devotion['devotion_first']);
        $devotion_first = 0;
        $pa_devotion_first = 0;
        $ext_devotion_first = 0;
        $col_devotion_first = 0;
        $in_devotion_first = 0;
        $pl_devotion_first = 0;
        $de_devotion_first = 0;
        foreach($arr_devotion['devotion_first'] as $ps){
            $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
            $devotion_first_score = Answers::select('rank_1st','value_6','rank_1_6','value_3','rank_1_3','value_5','rank_1_5','value_9','rank_1_9','value_11','rank_1_11','value_12','rank_1_12')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
            $devotion_first += $devotion_first_score->rank_1st;
            if($devotion_first_score->value_6=="Engaged"){
                $pa_devotion_first += $devotion_first_score->rank_1_6;
            }
            else{
                $pa_devotion_first = 0;
            }
			if($devotion_first_score->value_3=="external"){
                $ext_devotion_first += $devotion_first_score->rank_1_3;
            }
            else{
                $ext_devotion_first = 0;
            }
            if($devotion_first_score->value_5=="Collaborative"){
                $col_devotion_first += $devotion_first_score->rank_1_5;
            }
            else{
                $col_devotion_first = 0;
            }
            if($devotion_first_score->value_9=="Intuitive"){
                $in_devotion_first += $devotion_first_score->rank_1_9;
            }
            else{
                $in_devotion_first = 0;
            }
            if($devotion_first_score->value_11=="Planning"){
                $pl_devotion_first += $devotion_first_score->rank_1_11;
            }
            else{
                $pl_devotion_first = 0;
            }
            if($devotion_first_score->value_12=="Depth"){
                $de_devotion_first += $devotion_first_score->rank_1_12;
            }
            else{
                $de_devotion_first = 0;
            }
        }
        }
        else{
            $devotion_first = 0;
            $pa_devotion_first = 0;
            $ext_devotion_first = 0;
            $col_devotion_first = 0;
            $in_devotion_first = 0;
            $pl_devotion_first = 0;
            $de_devotion_first = 0;
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
            $pa_total_devotion = $pa_devotion_first;
            $ext_total_devotion = $ext_devotion_first;
            $col_total_devotion = $col_devotion_first;
            $in_total_devotion = $in_devotion_first;
            $pl_total_devotion = $pl_devotion_first;
            $de_total_devotion = $de_devotion_first;
        }
        else{
            $total_devotion = $devotion_first + 0;
            $pa_total_devotion = $pa_devotion_first;
            $ext_total_devotion = $ext_devotion_first;
            $col_total_devotion = $col_devotion_first;
            $in_total_devotion = $in_devotion_first;
            $pl_total_devotion = $pl_devotion_first;
            $de_total_devotion = $de_devotion_first;
        } 

        if (array_key_exists("devotion_second",$arr_devotion)){
            $second = count($arr_devotion['devotion_second']);
            $devotion_second = 0;
            $pa_devotion_second = 0;
            $ext_devotion_second = 0;
            $col_devotion_second = 0;
            $in_devotion_second = 0;
            $pl_devotion_second = 0;
            $de_devotion_second = 0;
            foreach($arr_devotion['devotion_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->first();
                $devotion_second_score = Answers::select('rank_2nd','value_6','rank_2_6','value_3','rank_2_3','value_5','rank_2_5','value_9','rank_2_9','value_11','rank_2_11','value_12','rank_2_12')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_second += $devotion_second_score->rank_2nd;
                if($devotion_second_score->value_6=="Engaged"){
                    $pa_devotion_second += $devotion_second_score->rank_2_6;
                }
                else{
                    $pa_devotion_second = 0;
                }
				if($devotion_second_score->value_3=="external"){
					$ext_devotion_second += $devotion_second_score->rank_2_3;
				}
				else{
					$ext_devotion_second = 0;
				}
                if($devotion_second_score->value_5=="Collaborative"){
                    $col_devotion_second += $devotion_second_score->rank_2_5;
                }
                else{
                    $col_devotion_second = 0;
                }
                if($devotion_second_score->value_9=="Intuitive"){
                    $in_devotion_second += $devotion_second_score->rank_2_9;
                }
                else{
                    $in_devotion_second = 0;
                }
                if($devotion_second_score->value_11=="Planning"){
                    $pl_devotion_second += $devotion_second_score->rank_2_11;
                }
                else{
                    $pl_devotion_second = 0;
                }
                if($devotion_second_score->value_12=="Depth"){
                    $de_devotion_second += $devotion_second_score->rank_2_12;
                }
                else{
                    $de_devotion_second = 0;
                }
            }
            }
        else{
            $devotion_second = 0;
            $pa_devotion_second = 0;
            $ext_devotion_second = 0;
            $col_devotion_second = 0;
            $in_devotion_second = 0;
            $pl_devotion_second = 0;
            $de_devotion_second = 0;
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
            $pa_total_devotion_second = $pa_devotion_second;
            $ext_total_devotion_second = $ext_devotion_second;
            $col_total_devotion_second = $col_devotion_second;
            $in_total_devotion_second = $in_devotion_second;
            $pl_total_devotion_second = $pl_devotion_second;
            $de_total_devotion_second = $de_devotion_second;
        }
        else{
            $total_devotion_second = $devotion_second + 0;
            $pa_total_devotion_second = $pa_devotion_second;
            $ext_total_devotion_second = $ext_devotion_second;
            $col_total_devotion_second = $col_devotion_second;
            $in_total_devotion_second = $in_devotion_second;
            $pl_total_devotion_second = $pl_devotion_second;
            $de_total_devotion_second = $de_devotion_second;
        }

        if (array_key_exists("devotion_third",$arr_devotion)){
            $third = count($arr_devotion['devotion_third']);
            $devotion_third = 0;
            $pa_devotion_third = 0;
            $ext_devotion_third = 0;
            $col_devotion_third = 0;
            $in_devotion_third = 0;
            $pl_devotion_third = 0;
            $de_devotion_third = 0;
            foreach($arr_devotion['devotion_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $devotion_third_score = Answers::select('rank_3rd','value_6','rank_3_6','value_3','rank_3_3','value_5','rank_3_5','value_9','rank_3_9','value_11','rank_3_11','value_12','rank_3_12')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_third += $devotion_third_score->rank_3rd;
                if($devotion_third_score->value_6=="Engaged"){
                    $pa_devotion_third += $devotion_third_score->rank_3_6;
                }
                else{
                    $pa_devotion_third = 0;
                }
				if($devotion_third_score->value_3=="external"){
					$ext_devotion_third += $devotion_third_score->rank_3_3;
				}
				else{
					$ext_devotion_third = 0;
				}
                if($devotion_third_score->value_5=="Collaborative"){
                    $col_devotion_third += $devotion_third_score->rank_3_5;
                }
                else{
                    $col_devotion_third = 0;
                }
                if($devotion_third_score->value_9=="Intuitive"){
                    $in_devotion_third += $devotion_third_score->rank_3_9;
                }
                else{
                    $in_devotion_third = 0;
                }
                if($devotion_third_score->value_11=="Planning"){
                    $pl_devotion_third += $devotion_third_score->rank_3_11;
                }
                else{
                    $pl_devotion_third = 0;
                }
                if($devotion_third_score->value_12=="Depth"){
                    $de_devotion_third += $devotion_third_score->rank_3_12;
                }
                else{
                    $de_devotion_third = 0;
                }
            }
        }
        else{
            $devotion_third = 0;
            $pa_devotion_third = 0;
            $ext_devotion_third = 0;
            $col_devotion_third = 0;
            $in_devotion_third = 0;
            $pl_devotion_third = 0;
            $de_devotion_third = 0;
        }

        if (array_key_exists("devotion_last",$arr_devotion)){
            $last = count($arr_devotion['devotion_last']);
            $devotion_last = 0;
            $pa_devotion_last = 0;
            $ext_devotion_last = 0;
            $col_devotion_last = 0;
            $in_devotion_last = 0;
            $pl_devotion_last = 0;
            $de_devotion_last = 0;
            foreach($arr_devotion['devotion_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $devotion_last_score = Answers::select('rank_last','value_6','rank_4_6','value_3','rank_4_3','value_5','rank_4_5','value_9','rank_4_9','value_11','rank_4_11','value_12','rank_4_12')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_last += $devotion_last_score->rank_last;
                if($devotion_last_score->value_6=="Engaged"){
                    $pa_devotion_last += $devotion_last_score->rank_4_6;
                }
                else{
                    $pa_devotion_last = 0;
                }
				if($devotion_last_score->value_3=="external"){
					$ext_devotion_last += $devotion_last_score->rank_4_3;
				}
				else{
					$ext_devotion_last = 0;
				}
                if($devotion_last_score->value_5=="Collaborative"){
                    $col_devotion_last += $devotion_last_score->rank_4_5;
                }
                else{
                    $col_devotion_last = 0;
                }
                if($devotion_last_score->value_9=="Intuitive"){
                    $in_devotion_last += $devotion_last_score->rank_4_9;
                }
                else{
                    $in_devotion_last = 0;
                }
                if($devotion_last_score->value_11=="Planning"){
                    $pl_devotion_last += $devotion_last_score->rank_4_11;
                }
                else{
                    $pl_devotion_last = 0;
                }
                if($devotion_last_score->value_12=="Depth"){
                    $de_devotion_last += $devotion_last_score->rank_4_12;
                }
                else{
                    $de_devotion_last = 0;
                }
            }
        }
        else{
            $devotion_last = 0;
            $pa_devotion_last = 0;
            $ext_devotion_last = 0;
            $col_devotion_last = 0;
            $in_devotion_last = 0;
            $pl_devotion_last = 0;
            $de_devotion_last = 0;
        }
    
        /* Devotion End */
        
        /* Passion Start */
        if (array_key_exists("passion_first",$arr_passion)){
            $first = count($arr_passion['passion_first']);
            $passion_first = 0;
            $im_passion_first = 0;
            $pa_passion_first = 0;
            $int_passion_first = 0;
            $di_passion_first = 0;
            $in_passion_first = 0;
            $ini_passion_first = 0;
            $sp_passion_first = 0;
            $va_passion_first = 0;
            foreach($arr_passion['passion_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_6','rank_1_6','value_3','rank_1_3','value_5','rank_1_5','value_9','rank_1_9','value_7','rank_1_7',
                'value_11','rank_1_11','value_12','rank_1_12')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $passion_first += $passion_first_score->rank_1st;
                if($passion_first_score->value_4=="implicit"){
                    $im_passion_first += $passion_first_score->rank_1_4;
                }
                else{
                    $im_passion_first = 0;
                }
                if($passion_first_score->value_6=="Autonomous"){
                    $pa_passion_first += $passion_first_score->rank_1_6;
                }
                else{
                    $pa_passion_first = 0;
                }
				if($passion_first_score->value_3=="internal"){
                    $int_passion_first += $passion_first_score->rank_1_3;
                }
                else{
                    $int_passion_first = 0;
                }
                if($passion_first_score->value_5=="Directive"){
                    $di_passion_first += $passion_first_score->rank_1_5;
                }
                else{
                    $di_passion_first = 0;
                }
                if($passion_first_score->value_9=="Intuitive"){
                    $in_passion_first += $passion_first_score->rank_1_9;
                }
                else{
                    $in_passion_first = 0;
                }
                if($passion_first_score->value_7=="Initiation"){
                    $ini_passion_first += $passion_first_score->rank_1_7;
                }
                else{
                    $ini_passion_first = 0;
                }
                if($passion_first_score->value_11=="Spontaneity"){
                    $sp_passion_first += $passion_first_score->rank_1_11;
                }
                else{
                    $sp_passion_first = 0;
                }
                if($passion_first_score->value_12=="Variety"){
                    $va_passion_first += $passion_first_score->rank_1_12;
                }
                else{
                    $va_passion_first = 0;
                }
                
            }
        }
        else{
            $passion_first = 0;
            $im_passion_first = 0;
            $pa_passion_first = 0;
            $int_passion_first = 0;
            $di_passion_first = 0;
            $in_passion_first = 0;
            $ini_passion_first = 0;
            $sp_passion_first = 0;
            $va_passion_first = 0;
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
            $im_total_passion = $im_passion_first;
            $pa_total_passion = $pa_passion_first;
            $int_total_passion = $int_passion_first;
            $di_total_passion = $di_passion_first;
            $in_total_passion = $in_passion_first;
            $ini_total_passion = $ini_passion_first;
            $sp_total_passion = $sp_passion_first;
            $va_total_passion = $va_passion_first;
        }
        else{
            $total_passion = $passion_first + 0;
            $im_total_passion = $im_passion_first;
            $pa_total_passion = $pa_passion_first;
            $int_total_passion = $int_passion_first;
            $di_total_passion = $di_passion_first;
            $in_total_passion = $in_passion_first;
            $ini_total_passion = $ini_passion_first;
            $sp_total_passion = $sp_passion_first;
            $va_total_passion = $va_passion_first;
        }   
        
        if (array_key_exists("passion_second",$arr_passion)){
            $second = count($arr_passion['passion_second']);
            $passion_second = 0;
            $im_passion_second = 0;
            $pa_passion_second = 0;
            $int_passion_second = 0;
            $di_passion_second = 0;
            $in_passion_second = 0;
            $ini_passion_second = 0;
            $sp_passion_second = 0;
            $va_passion_second = 0;
            foreach($arr_passion['passion_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_6','rank_2_6','value_3','rank_2_3','value_5','rank_2_5','value_9','rank_2_9','value_7','rank_2_7',
                'value_11','rank_2_11','value_12','rank_2_12')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $devotion_second += $passion_second_score->rank_2nd;
                if($passion_second_score->value_4=="implicit"){
                    $im_passion_second += $passion_second_score->rank_2_4;
                }
                else{
                    $im_passion_second = 0;
                }
                if($passion_second_score->value_6=="Autonomous"){
                    $pa_passion_second += $passion_second_score->rank_2_6;
                }
                else{
                    $pa_passion_second = 0;
                }
				if($passion_second_score->value_3=="internal"){
                    $int_passion_second += $passion_second_score->rank_2_3;
                }
                else{
                    $int_passion_second = 0;
                }
                if($passion_second_score->value_5=="Directive"){
                    $di_passion_second += $passion_second_score->rank_2_5;
                }
                else{
                    $di_passion_second = 0;
                }
                if($passion_second_score->value_9=="Intuitive"){
                    $in_passion_second += $passion_second_score->rank_2_9;
                }
                else{
                    $in_passion_second = 0;
                }
                if($passion_second_score->value_7=="Initiation"){
                    $ini_passion_second += $passion_second_score->rank_2_7;
                }
                else{
                    $ini_passion_second = 0;
                }
                if($passion_second_score->value_11=="Spontaneity"){
                    $sp_passion_second += $passion_second_score->rank_2_11;
                }
                else{
                    $sp_passion_second = 0;
                }
                if($passion_second_score->value_12=="Variety"){
                    $va_passion_second += $passion_second_score->rank_2_12;
                }
                else{
                    $va_passion_second = 0;
                }
            }
        }
        else{
            $passion_second = 0;          
            $im_passion_second = 0;          
            $pa_passion_second = 0;          
            $int_passion_second = 0;          
            $di_passion_second = 0;          
            $in_passion_second = 0;          
            $ini_passion_second = 0;          
            $sp_passion_second = 0;          
            $va_passion_second = 0;          
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
            $im_total_passion_second = $im_passion_second;
            $pa_total_passion_second = $pa_passion_second;
            $int_total_passion_second = $int_passion_second;
            $di_total_passion_second = $di_passion_second;
            $in_total_passion_second = $in_passion_second;
            $ini_total_passion_second = $ini_passion_second;
            $sp_total_passion_second = $sp_passion_second;
            $va_total_passion_second = $va_passion_second;
        }
        else{
            $total_passion_second = $passion_second + 0;
            $im_total_passion_second = $im_passion_second;
            $pa_total_passion_second = $pa_passion_second;
            $int_total_passion_second = $int_passion_second;
            $di_total_passion_second = $di_passion_second;
            $in_total_passion_second = $in_passion_second;
            $ini_total_passion_second = $ini_passion_second;
            $sp_total_passion_second = $sp_passion_second;
            $va_total_passion_second = $va_passion_second;
        }
        
        if (array_key_exists("passion_third",$arr_passion)){
            $third = count($arr_passion['passion_third']);
            $passion_third = 0;
            $im_passion_third = 0;
            $pa_passion_third = 0;
            $int_passion_third = 0;
            $di_passion_third = 0;
            $in_passion_third = 0;
            $ini_passion_third = 0;
            $sp_passion_third = 0;
            $va_passion_third = 0;
            foreach($arr_passion['passion_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_6','rank_3_6','value_3','rank_3_3','value_5','rank_3_5','value_9','rank_3_9','value_7','rank_3_7',
                'value_11','rank_3_11','value_12','rank_3_12')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $passion_third += $passion_third_score->rank_3rd;
                if($passion_third_score->value_4=="implicit"){
                    $im_passion_third += $passion_third_score->rank_3_4;
                }
                else{
                    $im_passion_third = 0;
                }
                if($passion_third_score->value_6=="Autonomous"){
                    $pa_passion_third += $passion_third_score->rank_3_6;
                }
                else{
                    $pa_passion_third = 0;
                }
				if($passion_third_score->value_3=="internal"){
                    $int_passion_third += $passion_third_score->rank_3_3;
                }
                else{
                    $int_passion_third = 0;
                }
                if($passion_third_score->value_5=="Directive"){
                    $di_passion_third += $passion_third_score->rank_3_5;
                }
                else{
                    $di_passion_third = 0;
                }
                if($passion_third_score->value_9=="Intuitive"){
                    $in_passion_third += $passion_third_score->rank_3_9;
                }
                else{
                    $in_passion_third = 0;
                }
                if($passion_third_score->value_7=="Initiation"){
                    $ini_passion_third += $passion_third_score->rank_3_7;
                }
                else{
                    $ini_passion_third = 0;
                }
                if($passion_third_score->value_11=="Spontaneity"){
                    $sp_passion_third += $passion_third_score->rank_3_11;
                }
                else{
                    $sp_passion_third = 0;
                }
                if($passion_third_score->value_12=="Variety"){
                    $va_passion_third += $passion_third_score->rank_3_12;
                }
                else{
                    $va_passion_third = 0;
                }
            }
        }
        else{
            $passion_third = 0;
            $im_passion_third = 0;
            $pa_passion_third = 0;
            $int_passion_third = 0;
            $di_passion_third = 0;
            $in_passion_third = 0;
            $ini_passion_third = 0;
            $sp_passion_third = 0;
            $va_passion_third = 0;
        }
    
        if (array_key_exists("passion_last",$arr_passion)){
            $last = count($arr_passion['passion_last']);
            $passion_last = 0;
            $im_passion_last = 0;
            $pa_passion_last = 0;
            $int_passion_last = 0;
            $di_passion_last = 0;
            $in_passion_last = 0;
            $ini_passion_last = 0;
            $sp_passion_last = 0;
            $va_passion_last = 0;
            foreach($arr_passion['passion_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $passion_last_score = Answers::select('rank_last','value_4','rank_4_4','value_6','rank_4_6','value_3','rank_4_3','value_5','rank_4_5','value_9','rank_4_9','value_7','rank_4_7',
                'value_11','rank_4_11','value_12','rank_4_12')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $passion_last += $passion_last_score->rank_last;
                if($passion_last_score->value_4=="implicit"){
                    $im_passion_last += $passion_last_score->rank_4_4;
                }
                else{
                    $im_passion_last = 0;
                }
                if($passion_last_score->value_6=="Autonomous"){
                    $pa_passion_last += $passion_last_score->rank_4_6;
                }
                else{
                    $pa_passion_last = 0;
                }
				if($passion_last_score->value_3=="internal"){
                    $int_passion_last += $passion_last_score->rank_4_3;
                }
                else{
                    $int_passion_last = 0;
                }
                if($passion_last_score->value_5=="Directive"){
                    $di_passion_last += $passion_last_score->rank_4_5;
                }
                else{
                    $di_passion_last = 0;
                }
                if($passion_last_score->value_9=="Intuitive"){
                    $in_passion_last += $passion_last_score->rank_4_9;
                }
                else{
                    $in_passion_last = 0;
                }
                if($passion_last_score->value_7=="Initiation"){
                    $ini_passion_last += $passion_last_score->rank_4_7;
                }
                else{
                    $ini_passion_last = 0;
                }
                if($passion_last_score->value_11=="Spontaneity"){
                    $sp_passion_last += $passion_last_score->rank_4_11;
                }
                else{
                    $sp_passion_last = 0;
                }
                if($passion_last_score->value_12=="Variety"){
                    $va_passion_last += $passion_last_score->rank_4_12;
                }
                else{
                    $va_passion_last = 0;
                }
            }
        }
        else{
            $passion_last = 0;
            $im_passion_last = 0;
            $pa_passion_last = 0;
            $int_passion_last = 0;
            $di_passion_last = 0;
            $in_passion_last = 0;
            $ini_passion_last = 0;
            $sp_passion_last = 0;
            $va_passion_last = 0;
        } 
        /* Passion End */
        
        /* Partnership Start */
        if (array_key_exists("partnership_first",$arr_partnership)){
            $first = count($arr_partnership['partnership_first']);
            $partnership_first = 0;
            $ex_partnership_first = 0;
            $pa_partnership_first = 0;
            $ext_partnership_first = 0;
            $con_partnership_first = 0;
            $col_partnership_first = 0;
            $re_partnership_first = 0;
            $pl_partnership_first = 0;
            $de_partnership_first = 0;
            foreach($arr_partnership['partnership_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_6','rank_1_6','value_3','rank_1_3','value_9','rank_1_9','value_5','rank_1_5','value_7','rank_1_7',
                'value_11','rank_1_11','value_12','rank_1_12')->where('value',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_first += $partnership_first_score->rank_1st;
                if($partnership_first_score->value_4=="explicit"){
                    $ex_partnership_first += $partnership_first_score->rank_1_4;
                }
                else{
                    $ex_partnership_first = 0;
                }
                if($partnership_first_score->value_6=="Engaged"){
                    $pa_partnership_first += $partnership_first_score->rank_1_6;
                }
                else{
                    $pa_partnership_first = 0;
                }
				if($partnership_first_score->value_3=="external"){
                    $ext_partnership_first += $partnership_first_score->rank_1_3;
                }
                else{
                    $ext_partnership_first = 0;
                }
                if($partnership_first_score->value_9=="Considered"){
                    $con_partnership_first += $partnership_first_score->rank_1_9;
                }
                else{
                    $con_partnership_first = 0;
                }
                if($partnership_first_score->value_5=="Collaborative"){
                    $col_partnership_first += $partnership_first_score->rank_1_5;
                }
                else{
                    $col_partnership_first = 0;
                }
                if($partnership_first_score->value_7=="Reciprocating"){
                    $re_partnership_first += $partnership_first_score->rank_1_7;
                }
                else{
                    $re_partnership_first = 0;
                }
                if($partnership_first_score->value_11=="Planning"){
                    $pl_partnership_first += $partnership_first_score->rank_1_11;
                }
                else{
                    $pl_partnership_first = 0;
                }
                if($partnership_first_score->value_12=="Depth"){
                    $de_partnership_first += $partnership_first_score->rank_value_12;
                }
                else{
                    $de_partnership_first = 0;
                }
            }
        }
        else{
            $partnership_first = 0;
            $ex_partnership_first = 0;
            $pa_partnership_first = 0;
            $ext_partnership_first = 0;
            $con_partnership_first = 0;
            $col_partnership_first = 0;
            $re_partnership_first = 0;
            $pl_partnership_first = 0;
            $de_partnership_first = 0;
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
            $ex_total_partnership = $ex_partnership_first;
            $pa_total_partnership = $pa_partnership_first;
            $ext_total_partnership = $ext_partnership_first;
            $con_total_partnership = $con_partnership_first;
            $col_total_partnership = $col_partnership_first;
            $re_total_partnership = $re_partnership_first;
            $pl_total_partnership = $pl_partnership_first;
            $de_total_partnership = $de_partnership_first;
        }
        else{
            $total_partnership = $partnership_first + 0;
            $ex_total_partnership = $ex_partnership_first;
            $pa_total_partnership = $pa_partnership_first;
            $ext_total_partnership = $ext_partnership_first;
            $con_total_partnership = $con_partnership_first;
            $col_total_partnership = $col_partnership_first;
            $re_total_partnership = $re_partnership_first;
            $pl_total_partnership = $pl_partnership_first;
            $de_total_partnership = $de_partnership_first;
        } 
        
        if (array_key_exists("partnership_second",$arr_partnership)){
            $second = count($arr_partnership['partnership_second']);
            $partnership_second = 0;
            $ex_partnership_second = 0;
            $pa_partnership_second = 0;
            $ext_partnership_second = 0;
            $con_partnership_second = 0;
            $col_partnership_second = 0;
            $re_partnership_second = 0;
            $pl_partnership_second = 0;
            $de_partnership_second = 0;
            foreach($arr_partnership['partnership_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_6','rank_2_6','value_3','rank_2_3','value_9','rank_2_9','value_5','rank_2_5','value_7','rank_2_7',
                'value_11','rank_2_11','value_12','rank_2_12')->where('value',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_second += $partnership_second_score->rank_2nd;
                if($partnership_second_score->value_4=="explicit"){
                    $ex_partnership_second += $partnership_second_score->rank_2_4;
                }
                else{
                    $ex_partnership_second = 0;
                }
                if($partnership_second_score->value_6=="Engaged"){
                    $pa_partnership_second += $partnership_second_score->rank_2_6;
                }
                else{
                    $pa_partnership_second = 0;
                }
				if($partnership_second_score->value_3=="external"){
                    $ext_partnership_second += $partnership_second_score->rank_2_3;
                }
                else{
                    $ext_partnership_second = 0;
                }
                if($partnership_second_score->value_9=="Considered"){
                    $con_partnership_second += $partnership_second_score->rank_2_9;
                }
                else{
                    $con_partnership_second = 0;
                }
                if($partnership_second_score->value_5=="Collaborative"){
                    $col_partnership_second += $partnership_second_score->rank_2_5;
                }
                else{
                    $col_partnership_second = 0;
                }
                if($partnership_second_score->value_7=="Reciprocating"){
                    $re_partnership_second += $partnership_second_score->rank_2_7;
                }
                else{
                    $re_partnership_second = 0;
                }
                if($partnership_second_score->value_11=="Planning"){
                    $pl_partnership_second += $partnership_second_score->rank_2_11;
                }
                else{
                    $pl_partnership_second = 0;
                }
                if($partnership_second_score->value_12=="Depth"){
                    $de_partnership_second += $partnership_second_score->rank_2_12;
                }
                else{
                    $de_partnership_second = 0;
                }
            }
            }
        else{
            $partnership_second = 0;
            $ex_partnership_second = 0;
            $pa_partnership_second = 0;
            $ext_partnership_second = 0;
            $con_partnership_second = 0;
            $col_partnership_second = 0;
            $re_partnership_second = 0;
            $pl_partnership_second = 0;
            $de_partnership_second = 0;
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
            $ex_total_partnership_second = $ex_partnership_second;
            $pa_total_partnership_second = $pa_partnership_second;
            $ext_total_partnership_second = $ext_partnership_second;
            $con_total_partnership_second = $con_partnership_second;
            $col_total_partnership_second = $col_partnership_second;
            $re_total_partnership_second = $re_partnership_second;
            $pl_total_partnership_second = $pl_partnership_second;
            $de_total_partnership_second = $de_partnership_second;
            }
        else{
            $total_partnership_second = $partnership_second + 0;
            $ex_total_partnership_second = $ex_partnership_second;
            $pa_total_partnership_second = $pa_partnership_second;
            $ext_total_partnership_second = $ext_partnership_second;
            $con_total_partnership_second = $con_partnership_second;
            $col_total_partnership_second = $col_partnership_second;
            $re_total_partnership_second = $re_partnership_second;
            $pl_total_partnership_second = $pl_partnership_second;
            $de_total_partnership_second = $de_partnership_second;
        }
        
        
        if (array_key_exists("partnership_third",$arr_partnership)){
            $third = count($arr_partnership['partnership_third']);
            $partnership_third = 0;
            $ex_partnership_third = 0;
            $pa_partnership_third = 0;
            $ext_partnership_third = 0;
            $con_partnership_third = 0;
            $col_partnership_third = 0;
            $re_partnership_third = 0;
            $pl_partnership_third = 0;
            $de_partnership_third = 0;
            foreach($arr_partnership['partnership_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_6','rank_3_6','value_3','rank_3_3','value_9','rank_3_9','value_5','rank_3_5','value_7','rank_3_7',
                'value_11','rank_3_11','value_12','rank_3_12')->where('value',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_third += $partnership_third_score->rank_3rd;
                if($partnership_third_score->value_4=="explicit"){
                    $ex_partnership_third += $partnership_third_score->rank_3_4;
                }
                else{
                    $ex_partnership_third = 0;
                }
                if($partnership_third_score->value_6=="Engaged"){
                    $pa_partnership_third += $partnership_third_score->rank_3_6;
                }
                else{
                    $pa_partnership_third = 0;
                }
				if($partnership_third_score->value_3=="external"){
                    $ext_partnership_third += $partnership_third_score->rank_3_3;
                }
                else{
                    $ext_partnership_third = 0;
                }
                if($partnership_third_score->value_9=="Considered"){
                    $con_partnership_third += $partnership_third_score->rank_3_9;
                }
                else{
                    $con_partnership_third = 0;
                }
                if($partnership_third_score->value_5=="Collaborative"){
                    $col_partnership_third += $partnership_third_score->rank_3_5;
                }
                else{
                    $col_partnership_third = 0;
                }
                if($partnership_third_score->value_7=="Reciprocating"){
                    $re_partnership_third += $partnership_third_score->rank_3_7;
                }
                else{
                    $re_partnership_third = 0;
                }
                if($partnership_third_score->value_11=="Planning"){
                    $pl_partnership_third += $partnership_third_score->rank_3_11;
                }
                else{
                    $pl_partnership_third = 0;
                }
                if($partnership_third_score->value_12=="Depth"){
                    $de_partnership_third += $partnership_third_score->rank_3_12;
                }
                else{
                    $de_partnership_third = 0;
                }
            }
        }
        else{
            $partnership_third = 0;
            $ex_partnership_third = 0;
            $pa_partnership_third = 0;
            $ext_partnership_third = 0;
            $con_partnership_third = 0;
            $col_partnership_third = 0;
            $re_partnership_third = 0;
            $pl_partnership_third = 0;
            $de_partnership_third = 0;
        }
        
        if (array_key_exists("partnership_last",$arr_partnership)){
            $last = count($arr_partnership['partnership_last']);
            $partnership_last = 0;
            $ex_partnership_last = 0;
            $pa_partnership_last = 0;
            $ext_partnership_last = 0;
            $con_partnership_last = 0;
            $col_partnership_last = 0;
            $re_partnership_last = 0;
            $pl_partnership_last = 0;
            $de_partnership_last = 0;
            foreach($arr_partnership['partnership_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $partnership_last_score = Answers::select('rank_last','value_4','rank_4_4','value_6','rank_4_6','value_3','rank_4_3','value_9','rank_4_9','value_5','rank_4_5','value_7','rank_4_7',
                'value_11','rank_4_11','value_12','rank_4_12')->where('value',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $partnership_last += $partnership_last_score->rank_last;
                if($partnership_last_score->value_4=="explicit"){
                    $ex_partnership_last += $partnership_last_score->rank_4_4;
                }
                else{
                    $ex_partnership_last = 0;
                }
                if($partnership_last_score->value_6=="Engaged"){
                    $pa_partnership_last += $partnership_last_score->rank_4_6;
                }
                else{
                    $pa_partnership_last = 0;
                }
				if($partnership_last_score->value_3=="external"){
                    $ext_partnership_last += $partnership_last_score->rank_4_3;
                }
                else{
                    $ext_partnership_last = 0;
                }
                if($partnership_last_score->value_9=="Considered"){
                    $con_partnership_last += $partnership_last_score->rank_4_9;
                }
                else{
                    $con_partnership_last = 0;
                }
                if($partnership_last_score->value_5=="Collaborative"){
                    $col_partnership_last += $partnership_last_score->rank_4_5;
                }
                else{
                    $col_partnership_last = 0;
                }
                if($partnership_last_score->value_7=="Reciprocating"){
                    $re_partnership_last += $partnership_last_score->rank_4_7;
                }
                else{
                    $re_partnership_last = 0;
                }
                if($partnership_last_score->value_11=="Planning"){
                    $pl_partnership_last += $partnership_last_score->rank_4_11;
                }
                else{
                    $pl_partnership_last = 0;
                }
                if($partnership_last_score->value_12=="Depth"){
                    $de_partnership_last += $partnership_last_score->rank_4_12;
                }
                else{
                    $de_partnership_last = 0;
                }
            }
        }
        else{
            $partnership_last = 0;
            $ex_partnership_last = 0;
            $pa_partnership_last = 0;
            $ext_partnership_last = 0;
            $con_partnership_last = 0;
            $col_partnership_last = 0;
            $re_partnership_last = 0;
            $pl_partnership_last = 0;
            $de_partnership_last = 0;
        }

    /* Partnership Start */

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
    //    echo $partnership_total;exit();
        
        /* Shadow Percentage Start*/
        if($appreciation_total==0 && $possibility_total==0){
            $p_total_var = 1;
        }
        else{
            $p_total_var = $possibility_total;
        }
        if($harmony_total==0 && $truth_total==0){
            $truth_total_var = 1;
        }
        else{
            $truth_total_var = $truth_total;
        }
        if($devotion_total==0 && $freedom_total==0){
            $free_total_var = 1;
        }
        else{
            $free_total_var = $freedom_total;
        }
        if($partnership_total==0 && $passion_total==0){
            $pass_total_var = 1;
        }
        else{
            $pass_total_var = $passion_total;
        }
        $shadow_percentage = array(
        'app_possibility' => round($appreciation_total/($p_total_var+$appreciation_total)*100),
        'harmony_truth' => round($harmony_total/($truth_total_var+$harmony_total)*100),
        'devotion_freedom' => round($devotion_total/($free_total_var+$devotion_total)*100),
        'passion_part' => round($partnership_total/($pass_total_var+$partnership_total)*100),
        );
        /* Shadow Percentage End*/

        $relationship_arr = array($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership);
        rsort($relationship_arr);
        $secondary_val = $relationship_arr[1];
        $primary_val = $relationship_arr[0];
        if($possibility==$secondary_val){
            $val_secondary = "1655";
            $sec_archetype = "Possibility";
        }
        elseif($appreciation==$secondary_val)
        {
            $val_secondary = "1654";
            $sec_archetype = "Appreciation";
        }
        elseif($truth==$secondary_val)
        {
            $val_secondary = "1651";
            $sec_archetype = "Truth";
        }
        elseif($harmony==$secondary_val)
        {
            $val_secondary = "1650";
            $sec_archetype = "Harmony";
        }
        elseif($freedom==$secondary_val)
        {
            $val_secondary = "1653";
            $sec_archetype = "Freedom";
        }
        elseif($devotion==$secondary_val)
        {
            $val_secondary = "1652";
            $sec_archetype = "Devotion";
        }
        elseif($passion==$secondary_val)
        {
            $val_secondary = "1649";
            $sec_archetype = "Passion";
        }
        else
        {
            $val_secondary = "1648";
            $sec_archetype = "Passion";
        }
        if($possibility==$primary_val){
            $val_primary = "1647";
            $rel_archetype = "Partnership";
        }
        elseif($appreciation==$primary_val)
        {
            $val_primary = "1646";
            $rel_archetype = "Appreciation";
        }
        elseif($truth==$primary_val)
        {
            $val_primary = "1643";
            $rel_archetype = "Truth";
        }
        elseif($harmony==$primary_val)
        {
            $val_primary = "1642";
            $rel_archetype = "Harmony";
        }
        elseif($freedom==$primary_val)
        {
            $val_primary = "1645";
            $rel_archetype = "Freedom";
        }
        elseif($devotion==$primary_val)
        {
            $val_primary = "1644";
            $rel_archetype = "Devotion";
        }
        elseif($passion==$primary_val)
        {
            $val_primary = "1641";
            $rel_archetype = "Passion";
        }
        else
        {
            $val_primary = "1640";
            $rel_archetype = "Partnership";
        }

        $shadow = $this->shadow_calculation($a);
        $relationship_lookup_text = $this->relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr);
        $shadow_arr = array($shadow['complaint'],$shadow['defense'],$shadow['avoidance'],$shadow['anxious'],$shadow['control'],$shadow['collapse'],$shadow['addiction'],$shadow['dependence']);
        rsort($shadow_arr);
        $shadow_lookup_text = $this->shadow_lookup_text($shadow['complaint'],$shadow['defense'],$shadow['avoidance'],$shadow['anxious'],$shadow['control'],$shadow['collapse'],$shadow['addiction'],$shadow['dependence'],$shadow_arr);
        
        $primary_shadow_val = $shadow_arr[0];
        $secondary_shadow_val = $shadow_arr[1];
        if($shadow['complaint']==$primary_shadow_val){
            $val_primary_shadow = "1679";
            $sh_archetype = "Complaint";
        }
        elseif($shadow['defense']==$primary_shadow_val){
            $val_primary_shadow = "1678";
            $sh_archetype = "Defense";
        }
        elseif($shadow['control']==$primary_shadow_val){
            $val_primary_shadow = "1675";
            $sh_archetype = "Control";
        }
        elseif($shadow['collapse']==$primary_shadow_val){
            $val_primary_shadow = "1674";
            $sh_archetype = "Collapse";
        }
        elseif($shadow['avoidance']==$primary_shadow_val){
            $val_primary_shadow = "1677";
            $sh_archetype = "Avoidance";
        }
        elseif($shadow['anxious']==$primary_shadow_val){
            $val_primary_shadow = "1676";
            $sh_archetype = "Anxious";
        }
        elseif($shadow['addiction']==$primary_shadow_val){
            $val_primary_shadow = "1673";
            $sh_archetype = "Addiction";
        }
        else{
            $val_primary_shadow = "1672";
            $sh_archetype = "Co-dependence";
        }

        if($shadow['complaint']==$secondary_shadow_val){
            $val_sec_shadow = "1663";
            $sh_sec_archetype = "Complaint";
        }
        elseif($shadow['defense']==$secondary_shadow_val){
            $val_sec_shadow = "1662";
            $sh_sec_archetype = "Defense";
        }
        elseif($shadow['control']==$secondary_shadow_val){
            $val_sec_shadow = "1659";
            $sh_sec_archetype = "Control";
        }
        elseif($shadow['collapse']==$secondary_shadow_val){
            $val_sec_shadow = "1658";
            $sh_sec_archetype = "Collapse";
        }
        elseif($shadow['avoidance']==$secondary_shadow_val){
            $val_sec_shadow = "1661";
            $sh_sec_archetype = "Avoidance";
        }
        elseif($shadow['anxious']==$secondary_shadow_val){
            $val_sec_shadow = "1661";
            $sh_sec_archetype = "Anxious";
        }
        elseif($shadow['addiction']==$secondary_shadow_val){
            $val_sec_shadow = "1657";
            $sh_sec_archetype = "Addiction";
        }
        else{
            $val_sec_shadow = "1656";
            $sh_sec_archetype = "Co-dependence";
        }
        if($a['question3']['answer1']=="Romantic partner"){
            $type="1726";
        }
        elseif($a['question3']['answer1']=="Business colleague"){
            $type="1725";
        }
        elseif($a['question3']['answer1']=="Family member"){
            $type="1724";
        }
        else{
            $type="1723";
        }
        // echo "<pre>";
        // print_r($a);exit;
        $phone = $a['question'.$chk_phone->question_no]['countrycode'].''.$a['question'.$chk_phone->question_no]['phone'];
        $current_url = url('/');
        $form_id = base64_encode("formid".$datasession['formid']);
        $shared_url = $current_url."/shared-profile?formid=".$form_id;
        $free_url = $current_url."/free-summary?formid=".$form_id;
        // echo'<pre>';print_r($a['question'.$chk_invest->id]);echo'</pre>';exit();

        $chk_email = Quiz::select('question_no','id')->where('question_name','email')->where('status','0')->first();
        $chk_firstname1 = Quiz::select('question_no','id')->where('question_name','firstname')->where('status','0')->first();
        $chk_lastname1 = Quiz::select('question_no','id')->where('question_name','lastname')->where('status','0')->first();
        if(!$chk_email){
            $user_email = "";
        }
        else{
            $user_email= $a['question'.$chk_email->question_no]['email'];
        }
        if(!$chk_firstname1){
            $user_firstname = "";
        }
        else{
            $user_firstname= $a['question'.$chk_firstname1->question_no]['firstname'];
        }
        if(!$chk_lastname1){
            $user_lastname = "";
        }
        else{
            $user_lastname= $a['question'.$chk_lastname1->question_no]['lastname'];
        }
     
       
        // foreach($a['question'.$chk_invest->question_no]['invested'] as $invest){

        
        // if(strpos($invest, "I read or listen to books, articles, podcasts or videos on the topic of relationship") !== false){
        //     $f1602="1";
        //   }
        //   else{
        //     $f1602="0";
        // }
        // if(strpos($invest,"I follow one or more relationship experts") !== false){
        //     $f1603="1";
        //   }
        //   else{
        //     $f1603="0";
        // }
        // if(strpos($invest, "I have participated in live or online events, courses, workshops, or retreats") !== false){
        //     $f1604="1";
        //   }
        //   else{
        //     $f1604="0";
        // }
        // if(strpos($invest, "I have seen a counselor, therapist or coach who has helped me with my relationships") !== false){
        //     $f1605="1";
        //   }
        //   else{
        //     $f1605="0";
        // }
        // if(strpos($invest, "I don't tend to invest in outside help in my relationships") !== false){
        //     $f1601="1";
        //   }
        //   else{
        //     $f1601="0";
        // }
        //  }
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'PUT',
        //     CURLOPT_POSTFIELDS => 'id='.auth()->user()->ontra_id.'&f2319='.$type.'&f2320='.$a['question4']['answer1'].'&f2180='.$val_secondary.'&cell_phone='.$phone.'&f2182='.$val_primary_shadow.'&f2179='.$val_primary.'&f2181='.$val_sec_shadow.'&use_utm_names=false&firstname='.$user_firstname.'&lastname='.$user_lastname.'&email='.$user_email.'&f2318='.$free_url.'&f2392='.$shared_url.'&f2321=0&f2185='.$relationship_lookup_text['lookuptext'].'&f2317='.$shadow_lookup_text['shadowlookuptext'].'&f2184='.time().'&f1602='.$f1602.'&f1601=
        //                           '.$f1601.'&f1603='.$f1603.'&f1604='.$f1604.'&f1605='.$f1605.'&f1603=1&f2177=1&f2178=1&contact_cat=*/*22255*/*22256*/*',
        //     CURLOPT_HTTPHEADER => array(
        //       'Content-Type: application/x-www-form-urlencoded',
        //       'Accept: application/json',
        //       'Api-Appid: 2_6929_bCscgdVwQ',
        //       'Api-Key: CdLnV6OitztlmdU'
        //     ),
        // ));
        // $response = curl_exec($curl);
        
        // curl_close($curl);
        // $result = json_decode($response, true);
        // echo $shadow_lookup_text['shadowlookuptext'];exit();
        $getval = DB::table('formdata')->select('is_transfer','id')->where('userid',auth()->user()->id)->latest('id')->first();
        if($getval->is_transfer!="1"){
        $token = DB::table('api_token')->select('token')->first();
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://rest.gohighlevel.com/v1/contacts/'.$formval->gid,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS =>'{
            "customField": {
                "ohxK865IlxfI8jsIx9cB": "'.trim(preg_replace('/\s+/', ' ', $relationship_lookup_text['lookuptext'])).'",
                "YUX3pQ8dtnXHkQuCBdCZ": "'.$rel_archetype.'",
                "2gHh9vNgv9WUjUzRjh74": "'.$sec_archetype.'",
                "67h50m7FFCBKOkhSmntZ": "'.trim(preg_replace('/\s+/', ' ', $shadow_lookup_text['shadowlookuptext'])).'",
                "yWhkDB6XYgPr02Cv4idT": "'.$sh_archetype.'",
                "Mhzno65Ov0bqsY9glRD7": "'.$sh_sec_archetype.'"
                
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token->token
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $updateval = DB::table('formdata')->where('id',$getval->id)->update([
            'is_transfer'    =>"1",
            ]);
        }
        /*Explicit Start*/
        $ex_partnership = $ex_total_partnership + $ex_total_partnership_second + $ex_partnership_third - $ex_partnership_last;
        $ex_truth = $ex_total_truth + $ex_total_truth_second + $ex_truth_third - $ex_truth_last;
        $ex_possibility = $ex_total_possibility + $ex_total_possibility_second + $ex_possibility_third - $ex_possibility_last;
        $explicit = $ex_partnership + $ex_possibility +$ex_truth + $shadow['shadow_explicit'];
        /*Explicit End*/

        /*Implicit Start*/
        $im_appreciation =  $im_total_appreciation + $im_total_appreciation_second + $im_appreciation_third - $im_appreciation_last;
        $im_harmony = $im_total_harmony + $im_total_harmony_second + $im_harmony_third - $im_harmony_last;
        $im_passion = $im_total_passion + $im_total_passion_second + $im_passion_third - $im_passion_last;
        $implicit = $im_appreciation + $im_harmony + $im_passion + $shadow['shadow_implicit'];
        if($explicit > $implicit){
            $c_profile = "explicit";
        }
        else{
            $c_profile = "implicit";
        }
        $implicit_explicit = round($implicit/($explicit+$implicit)*100);
        /*Implicit End*/
        $reactive_repressive_per = round($shadow['reactive_repressive']['repressive']/($shadow['reactive_repressive']['reactive']+$shadow['reactive_repressive']['repressive'])*100);

        /* Parenting Autonomous Start*/
        $auto_truth= $pa_total_truth + $pa_total_truth_second + $pa_truth_third - $pa_truth_last;
        $auto_freedom = $pa_total_freedom + $pa_total_freedom_second + $pa_freedom_third - $pa_freedom_last;
        $auto_passion = $pa_total_passion + $pa_total_passion_second + $pa_passion_third - $pa_passion_last;
        $autonomous = $auto_truth + $auto_freedom + $auto_passion + $shadow['shadow_autonomous'];
        /* Parenting Autonomous End*/

        /* Parenting Engaged Start*/
        $eng_harmony = $pa_total_harmony + $pa_total_harmony_second + $pa_harmony_third - $pa_harmony_last;
        $eng_partnership = $pa_total_partnership + $pa_total_partnership_second + $pa_partnership_third - $pa_partnership_last;
        $eng_devotion = $pa_total_devotion + $pa_total_devotion_second + $pa_devotion_third - $pa_devotion_last;
        $engaged = $eng_harmony + $eng_partnership + $eng_devotion + $shadow['shadow_engaged'];
        $autonomous_engaged = round($engaged/($autonomous+$engaged)*100);
        /* Parenting Engaged End*/
        
        /* Parenting Structured Start */
        $st_possibility = $st_total_possibility + $st_total_possibility_second + $st_possibility_third - $st_possibility_last;
        $st_truth= $st_total_truth + $st_total_truth_second + $st_truth_third - $st_truth_last;
        $structured = $st_possibility + $st_truth + $shadow['shadow_structred'];
        /* Parenting Structured End */
        
       
        /* Parenting Opened Start */
        $op_appreciation =  $op_total_appreciation + $op_total_appreciation_second + $op_appreciation_third - $op_appreciation_last;
        $op_harmony = $op_total_harmony + $op_total_harmony_second + $op_harmony_third - $op_harmony_last;
        $opened  = $op_appreciation + $op_harmony + $shadow['shadow_opened'];
        $structred_opened = round($opened/($structured+$opened)*100);
        /* Parenting Opened End */
        /*Internal Start */
        $internal_truth= $int_total_truth + $int_total_truth_second + $int_truth_third - $int_truth_last;
        $internal_freedom = $int_total_freedom + $int_total_freedom_second + $int_freedom_third - $int_freedom_last;
        $internal_passion = $int_total_passion + $int_total_passion_second + $int_passion_third - $int_passion_last;
        $internal = $internal_truth + $internal_freedom + $internal_passion + $shadow['shadow_internal'];
        /*Internal End */
        /*External Start */
        $external_harmony = $ext_total_harmony + $ext_total_harmony_second + $ext_harmony_third - $ext_harmony_last;
        $external_partnership = $ext_total_partnership + $ext_total_partnership_second + $ext_partnership_third - $ext_partnership_last;
        $external_devotion = $ext_total_devotion + $ext_total_devotion_second + $ext_devotion_third - $ext_devotion_last;
        $external = $external_harmony + $external_partnership + $external_devotion + $shadow['shadow_external'];
        $internal_external = round($external/($internal+$external)*100);
        /*External End */

        /*Directive Start */
        $directive_truth= $di_total_truth + $di_total_truth_second + $di_truth_third - $di_truth_last;
        $directive_freedom = $di_total_freedom + $di_total_freedom_second + $di_freedom_third - $di_freedom_last;
        $directive_passion = $di_total_passion + $di_total_passion_second + $di_passion_third - $di_passion_last;
        $directive = $directive_truth + $directive_freedom + $directive_passion + $shadow['shadow_directive'];
        /*Directive End */

        /*Collaborative Start*/
        $col_harmony = $col_total_harmony + $col_total_harmony_second + $col_harmony_third - $col_harmony_last;
        $col_partnership = $col_total_partnership + $col_total_partnership_second + $col_partnership_third - $col_partnership_last;
        $col_devotion = $col_total_devotion + $col_total_devotion_second + $col_devotion_third - $col_devotion_last;
        $collaborative = $col_harmony + $col_partnership + $col_devotion + $shadow['shadow_col'];
        $directive_col = round($collaborative/($directive+$collaborative)*100);
        /*Collaborative End*/

        /*Intuitive Start */
        $in_freedom = $in_total_freedom + $in_total_freedom_second + $in_freedom_third - $in_freedom_last;
        $in_passion = $in_total_passion + $in_total_passion_second + $in_passion_third - $in_passion_last;
        $in_devotion = $in_total_devotion + $in_total_devotion_second + $in_devotion_third - $in_devotion_last;
        $intuitive = $in_freedom + $in_passion + $in_devotion + $shadow['shadow_in'];
        /*Intuitive End */
        
        /*Considered Start */
        $con_harmony = $con_total_harmony + $con_total_harmony_second + $con_harmony_third - $con_harmony_last;
        $con_partnership = $con_total_partnership + $con_total_partnership_second + $con_partnership_third - $con_partnership_last;
        $con_truth= $con_total_truth + $con_total_truth_second + $con_truth_third - $con_truth_last;
        $con = $con_harmony + $con_partnership + $con_truth + $shadow['shadow_con'];
        $intuitive_con = round($con/($intuitive+$con)*100);
        /*Considered End */

        /*Initiating Start */
        $initiate_possibility = $ini_total_possibility + $ini_total_possibility_second + $ini_possibility_third - $ini_possibility_last;
        $initiate_truth= $ini_total_truth + $ini_total_truth_second + $ini_truth_third - $ini_truth_last;
        $initiate_passion = $ini_total_passion + $ini_total_passion_second + $ini_passion_third - $ini_passion_last;
        $initiate = $initiate_possibility + $initiate_truth + $initiate_passion + $shadow['shadow_initiate'];
        /*Initiating End */

        /*Reciprocating Start */
        $re_appreciation =  $re_total_appreciation + $re_total_appreciation_second + $re_appreciation_third - $re_appreciation_last;
        $re_partnership = $re_total_partnership + $re_total_partnership_second + $re_partnership_third - $re_partnership_last;
        $re_harmony = $re_total_harmony + $re_total_harmony_second + $re_harmony_third - $re_harmony_last;
        $re = $re_appreciation + $re_partnership + $re_harmony + $shadow['shadow_re']; 
        $initiate_re = round($re/($initiate+$re)*100);
        /*Reciprocating End */

        /*Planning Start*/
        $pl_appreciation =  $pl_total_appreciation + $pl_total_appreciation_second + $pl_appreciation_third - $pl_appreciation_last;
        $pl_partnership = $pl_total_partnership + $pl_total_partnership_second + $pl_partnership_third - $pl_partnership_last;
        $pl_devotion = $pl_total_devotion + $pl_total_devotion_second + $pl_devotion_third - $pl_devotion_last;
        $planning = $pl_appreciation + $pl_partnership + $pl_devotion + $shadow['shadow_planning'];
        /*Planning End*/
        /*Spontaneity Start*/
        $sp_possibility = $sp_total_possibility + $sp_total_possibility_second + $sp_possibility_third - $sp_possibility_last;
        $sp_passion = $sp_total_passion + $sp_total_passion_second + $sp_passion_third - $sp_passion_last;
        $sp_freedom = $sp_total_freedom + $sp_total_freedom_second + $sp_freedom_third - $sp_freedom_last;
        $spontaneity = $sp_possibility + $sp_passion + $sp_freedom + $shadow['shadow_spontaneity'];
        $plannning_spontaneity = round($spontaneity/($planning+$spontaneity)*100);
        /*Spontaneity End*/
        /*Variety Start*/
        $var_passion = $va_total_passion + $va_total_passion_second + $va_passion_third - $va_passion_last;
        $var_freedom = $va_total_freedom + $va_total_freedom_second + $va_freedom_third - $va_freedom_last;
        $varity = $var_passion + $var_freedom + $shadow['shadow_var'];
        /*Variety End*/
        /*Depth Start */
        $dep_partnership = $de_total_partnership + $de_total_partnership_second + $de_partnership_third - $de_partnership_last;
        $dep_devotion = $de_total_devotion + $de_total_devotion_second + $de_devotion_third - $de_devotion_last;
        $depth = $dep_partnership + $dep_devotion + $shadow['shadow_depth'];
        $variety_depth = round($depth/($varity+$depth)*100);
        /*Depth End */
        /*Insert Start*/
        $getformid = DB::table('relationship_scores')->where('formid',$datasession['formid'])->count();
        if($getformid<1){
        $insert = DB::table('relationship_scores')->insert([
         'user_id'       => auth()->user()->id, 
         'formid'        => $datasession['formid'], 
         'possibility'   => $possibility_total, 
         'appreciation'  => $appreciation_total, 
         'truth'         => $truth_total, 
         'harmony'       => $harmony_total, 
         'freedom'       => $freedom_total, 
         'devotion'      => $devotion_total, 
         'passion'       => $passion_total, 
         'partnership'   => $partnership_total, 
         'internal'      => $internal, 
         'external'      => $external, 
         'implicit'      => $implicit, 
         'explicit'      => $explicit, 
         'reactive'      => $shadow['reactive_repressive']['reactive'], 
         'repressive'    => $shadow['reactive_repressive']['repressive'], 
         'directive'     => $directive, 
         'collaborative' => $collaborative, 
         'instinctive'   => $intuitive, 
         'considered'    => $con, 
         'autonomous'    => $autonomous, 
         'engaged'       => $engaged, 
         'achievement'   => $structured, 
         'acceptance'    => $opened, 
         'initiating'    => $initiate, 
         'reciprocating' => $re, 
         'planning'      => $planning, 
         'spontaneity'   => $spontaneity, 
         'variety'       => $varity, 
         'depth'         => $depth, 
        ]);
        $insert = DB::table('shadow_scores')->insert([
        'user_id'       => auth()->user()->id, 
        'formid'        => $datasession['formid'], 
        'complaint'     => $shadow['complaint'], 
        'defense'       => $shadow['defense'], 
        'control'       => $shadow['control'], 
        'collapse'      => $shadow['collapse'], 
        'avoidance'     => $shadow['avoidance'], 
        'anxious'       => $shadow['anxious'], 
        'addiction'     => $shadow['addiction'], 
        'co_dependence' => $shadow['dependence'], 
        ]);
        $currenturl = url('/');
        $pdf_url = $currenturl."/files/pdf/evolvinglove".$datasession['formid'].'.pdf';
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'PUT',
        //   CURLOPT_POSTFIELDS => 'id='.$formval->ontraport_id.'&use_utm_names=false&contact_cat=*/*22255*/*22256*/*22257*/*&f2321=0&f2393='.$pdf_url.'',
        //   CURLOPT_HTTPHEADER => array(
        //     'Content-Type: application/x-www-form-urlencoded',
        //     'Accept: application/json',
        //     'Api-Appid: 2_6929_bCscgdVwQ',
        //     'Api-Key: CdLnV6OitztlmdU'
        //   ),
        // ));
        
        // $response = curl_exec($curl);
        // curl_close($curl);

        }
     /*Insert End*/
        $per_shadow = $shadow['shadow_per'];

        unset($shadow['shadow_explicit']);
        unset($shadow['shadow_implicit']);
        unset($shadow['reactive_repressive']);
        unset($shadow['shadow_autonomous']);
        unset($shadow['shadow_engaged']);
        unset($shadow['shadow_opened']);
        unset($shadow['shadow_structred']);
        unset($shadow['shadow_internal']);
        unset($shadow['shadow_external']);
        unset($shadow['shadow_directive']);
        unset($shadow['shadow_col']);
        unset($shadow['shadow_in']);
        unset($shadow['shadow_con']);
        unset($shadow['shadow_initiate']);
        unset($shadow['shadow_re']);
        unset($shadow['shadow_spontaneity']);
        unset($shadow['shadow_planning']);
        unset($shadow['shadow_var']);
        unset($shadow['shadow_depth']);
        unset($shadow['shadow_per']);
    //   echo"<pre>";print_r($shadow);echo"</pre>";exit();
        $shadowFirstVal = $shadow_arr[0];
        $shadowSecondVal = $shadow_arr[1];
        if($shadow['complaint'] == $shadowFirstVal){
            $remedy = "Complaint";
        }
        elseif($shadow['avoidance'] == $shadowFirstVal){
            $remedy = "Avoidance";
        }
        elseif($shadow['defense'] == $shadowFirstVal){
            $remedy = "Defense";
        }
        elseif($shadow['collapse'] == $shadowFirstVal){
            $remedy = "Collapse";
        }
        elseif($shadow['addiction'] == $shadowFirstVal){
            $remedy = "Addiction";
        }
        elseif($shadow['dependence'] == $shadowFirstVal){
            $remedy = "Co-dependence";
        }
        elseif($shadow['control'] == $shadowFirstVal){
            $remedy = "Control";
        }
        else{
            $remedy = "Anxious";
        }

        if($shadow['complaint'] == $shadowSecondVal){
            $remedy1 = "Complaint";
        }
        elseif($shadow['avoidance'] == $shadowSecondVal){
            $remedy1 = "Avoidance";
        }
        elseif($shadow['defense'] == $shadowSecondVal){
            $remedy1 = "Defense";
        }
        elseif($shadow['collapse'] == $shadowSecondVal){
            $remedy1 = "Collapse";
        }
        elseif($shadow['addiction'] == $shadowSecondVal){
            $remedy1 = "Addiction";
        }
        elseif($shadow['dependence'] == $shadowSecondVal){
            $remedy1 = "Co-dependence";
        }
        elseif($shadow['control'] == $shadowSecondVal){
            $remedy1 = "Control";
        }
        else{
            $remedy1 = "Anxious";
        }

        $secendory_shadow['first']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy)->first();
        $secendory_shadow['second']= DB::table('shadow_remedies')->select('relationship_gift')->where('shadow_remedy',$remedy1)->first();
        $chk_firstname = Quiz::select('question_no')->where('question_name','firstname')->where('status','0')->first();
        $chk_lastname = Quiz::select('question_no')->where('question_name','lastname')->where('status','0')->first();
        $user_details = array(
            'relation'=> $a['question4']['answer1'],
            'firstname'=> $a['question'.$chk_firstname->question_no]['firstname'],
            'lastname'=> $a['question'.$chk_lastname->question_no]['lastname'],
            'type'=> $a['question3']['answer1'],
        );
        // $checkpdf = DB::table('formdata')->select('pdf_mail')->where('id',$datasession['formid'])->first();
        // if($checkpdf->pdf_mail==0){
        // $this->pdf();
        // }
        return view('frontend.result-summary',compact('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership','shadow','relationship_lookup_text','implicit_explicit','reactive_repressive_per','autonomous_engaged','internal_external','directive_col','intuitive_con','initiate_re','structred_opened','plannning_spontaneity','variety_depth','shadow_lookup_text','secendory_shadow','remedy','remedy1','shadow_percentage','per_shadow','user_details'));
      }
      else{
        return redirect('/');
      }
    }



    public function relationship_lookuptext($possibility,$appreciation,$truth,$harmony,$freedom,$devotion,$passion,$partnership,$relationship_arr){
        
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
        $datasession = session()->all();
        $formdata = DB::table('formdata')->select('data')->where('id',$datasession['formid'])->first();
        $data = json_decode($formdata->data, TRUE);
        for($cc=1;$cc<=count($data);$cc++){
            if (array_key_exists("gender",$data['question'.$cc])){
               $val_arr2 = $cc;
            }
        }
        $gender = $data['question'.$val_arr2]['gender'];
        // $gender = $data['question18']['gender'];
        $promo_img = DB::table('promos')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $lookuptext = DB::table('lookup_texts')->select($secondary)->where('archetype',$primary)->first();
        $images = DB::table('images')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $banners = DB::table('banners')->select($secondary.'_'.$gender)->where('archetype',$primary)->first();
        $promo_image = $promo_img->{$secondary.'_'.$gender};
        $icon_image = $images->{$secondary.'_'.$gender};
        $banners_image = $banners->{$secondary.'_'.$gender};
        return array('lookuptext'=>$lookuptext->$secondary,'icon'=>$icon_image,'banner'=>$banners_image,'promo_image'=>$promo_image);

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
            $primary_txt ="dependence";
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
            $secondary_txt ="dependence";
        }
        $datasession = session()->all();
        $formdata = DB::table('formdata')->select('data')->where('id',$datasession['formid'])->first();
        $data = json_decode($formdata->data, TRUE);
        for($dd=1;$dd<=count($data);$dd++){
            if (array_key_exists("gender",$data['question'.$dd])){
               $val_arr3 = $dd;
            }
        }
        $gender = $data['question'.$val_arr3]['gender'];
        // $gender = $data['question18']['gender'];
        $shadow_icon = DB::table('shadow_icons')->select($secondary_txt.'_'.$gender)->where('archetype',$primary_txt)->first();
        $icon_image = $shadow_icon->{$secondary_txt.'_'.$gender};
        $shadowlookuptext = DB::table('shadow_lookup_texts')->select($secondary_txt)->where('archetype',$primary_txt)->first();
        return array('shadowlookuptext'=>$shadowlookuptext->{$secondary_txt},'icon'=>$icon_image);
   
       
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
            if($a['question'.$j]['answer']['third']=='complaint'){
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
            $re_complaint_first = 0;
            $st_complaint_first = 0;
            $in_complaint_first = 0;
            $sp_complaint_first = 0;
            foreach($arr_comp1['complaint_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_first_score = Answers::select('rank_1st','rank_1_4','value_4','value_8','rank_1_8','value_10','rank_1_10','value_7','rank_1_7','value_11','rank_1_11')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                if($complaint_first_score->value_4=="explicit"){
                    $ex_complaint_first += $complaint_first_score->rank_1_4;
                }
                else{
                    $ex_complaint_first = 0;
                }
                if($complaint_first_score->value_8=="Reactive"){
                    $re_complaint_first += $complaint_first_score->rank_1_8;
                }
                else{
                    $re_complaint_first = 0;
                }
                $complaint_first += $complaint_first_score->rank_1st;
                if($complaint_first_score->value_10=="Achievement"){
                    $st_complaint_first += $complaint_first_score->rank_1_10;
                }
                else{
                    $st_complaint_first = 0;
                }
                if($complaint_first_score->value_7=="Initiation"){
                    $in_complaint_first += $complaint_first_score->rank_1_7;
                }
                else{
                    $in_complaint_first = 0;
                }
                if($complaint_first_score->value_11=="Spontaneity"){
                    $sp_complaint_first += $complaint_first_score->rank_1_11;
                }
                else{
                    $sp_complaint_first = 0;
                }
            }
           
        }
        else{
            $complaint_first = 0;
            $re_complaint_first = 0;
            $ex_complaint_first = 0;
            $st_complaint_first = 0;
            $in_complaint_first = 0;
            $sp_complaint_first = 0;
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
            $re_total_complaint = $re_complaint_first;
            $st_total_complaint = $st_complaint_first;
            $in_total_complaint = $in_complaint_first;
            $sp_total_complaint = $sp_complaint_first;
        }
        else{
            $total_complaint = $complaint_first + 0;
            $ex_total_complaint = $ex_complaint_first;
            $re_total_complaint = $re_complaint_first;
            $st_total_complaint = $st_complaint_first;
            $in_total_complaint = $in_complaint_first;
            $sp_total_complaint = $sp_complaint_first;
        }

        if (array_key_exists("complaint_second",$arr_comp1)){
            $second = count($arr_comp1['complaint_second']);
            $complaint_second = 0;
            $ex_complaint_second = 0;
            $re_complaint_second = 0;
            $st_complaint_second = 0;
            $in_complaint_second = 0;
            $sp_complaint_second = 0;
            foreach($arr_comp1['complaint_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_second_score = Answers::select('rank_2nd','rank_2_4','value_4','value_8','rank_2_8','value_10','rank_2_10','value_7','rank_2_7','value_11','rank_2_11')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $complaint_second += $complaint_second_score->rank_2nd;
                if($complaint_second_score->value_4=="explicit"){
                    $ex_complaint_second += $complaint_second_score->rank_2_4;
                }
                else{
                    $ex_complaint_second = 0;
                }
                if($complaint_second_score->value_8=="Reactive"){
                    $re_complaint_second += $complaint_second_score->rank_2_8;
                }
                else{
                    $re_complaint_second = 0;
                }
                if($complaint_first_score->value_10=="Achievement"){
                    $st_complaint_second += $complaint_second_score->rank_2_10;
                }
                else{
                    $st_complaint_second = 0;
                }
                if($complaint_second_score->value_7=="Initiation"){
                    $in_complaint_second += $complaint_second_score->rank_2_7;
                }
                else{
                    $in_complaint_second = 0;
                }
                if($complaint_second_score->value_11=="Spontaneity"){
                    $sp_complaint_second += $complaint_second_score->rank_2_11;
                }
                else{
                    $sp_complaint_second = 0;
                }
            }
        }
        else{
            $complaint_second = 0;
            $ex_complaint_second = 0;
            $re_complaint_second = 0;
            $st_complaint_second = 0;
            $in_complaint_second = 0;
            $sp_complaint_second = 0;
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
            $re_total_complaint_second = $re_complaint_second;
            $st_total_complaint_second = $st_complaint_second;
            $in_total_complaint_second = $in_complaint_second;
            $sp_total_complaint_second = $sp_complaint_second;
        }
        else{
            $total_complaint_second = $complaint_second + 0;
            $ex_total_complaint_second = $ex_complaint_second;
            $re_total_complaint_second = $re_complaint_second;
            $st_total_complaint_second = $st_complaint_second;
            $in_total_complaint_second = $in_complaint_second;
            $sp_total_complaint_second = $sp_complaint_second;
        }
      
        if (array_key_exists("complaint_third",$arr_comp1)){
            $third = count($arr_comp1['complaint_third']);
            $complaint_third = 0;
            $ex_complaint_third = 0;
            $re_complaint_third = 0;
            $st_complaint_third = 0;
            $in_complaint_third = 0;
            $sp_complaint_third = 0;
            foreach($arr_comp1['complaint_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_8','rank_3_8','value_10','rank_3_10','value_7','rank_3_7','value_11','rank_3_11')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $complaint_third += $complaint_third_score->rank_3rd;
                if($complaint_third_score->value_4=="explicit"){
                    $ex_complaint_third += $complaint_third_score->rank_3_4;
                }
                else{
                    $ex_complaint_third = 0;
                }
                if($complaint_third_score->value_8=="Reactive"){
                    $re_complaint_third += $complaint_third_score->rank_3_8;
                }
                else{
                    $re_complaint_third = 0;
                }
                if($complaint_third_score->value_10=="Achievement"){
                    $st_complaint_third += $complaint_third_score->rank_3_10;
                }
                else{
                    $st_complaint_third = 0;
                }
                if($complaint_third_score->value_7=="Initiation"){
                    $in_complaint_third += $complaint_third_score->rank_3_7;
                }
                else{
                    $in_complaint_third = 0;
                }
                if($complaint_third_score->value_11=="Spontaneity"){
                    $sp_complaint_third += $complaint_third_score->rank_3_11;
                }
                else{
                    $sp_complaint_third = 0;
                }
                
            }
        }
        else{
            $complaint_third = 0;
            $ex_complaint_third = 0;
            $re_complaint_third = 0;
            $st_complaint_third = 0;
            $in_complaint_third = 0;
            $sp_complaint_third = 0;
        }

     
        if (array_key_exists("complaint_last",$arr_comp1)){
            $last = count($arr_comp1['complaint_last']);
            $complaint_last = 0;
            $ex_complaint_last = 0;
            $re_complaint_last = 0;
            $st_complaint_last = 0;
            $in_complaint_last = 0;
            $sp_complaint_last = 0;
            foreach($arr_comp1['complaint_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $complaint_last_score = Answers::select('rank_last','value_4','rank_4_4','value_8','rank_4_8','value_10','rank_4_10','value_7','rank_4_7','value_11','rank_4_11')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $complaint_last += $complaint_last_score->rank_last;
                if($complaint_last_score->value_4=="explicit"){
                    $ex_complaint_last += $complaint_last_score->rank_4_4;
                }
                else{
                    $ex_complaint_last = 0;
                }
                if($complaint_last_score->value_8=="Reactive"){
                    $re_complaint_last += $complaint_last_score->rank_4_8;
                }
                else{
                    $re_complaint_last = 0;
                }
                if($complaint_last_score->value_10=="Achievement"){
                    $st_complaint_last += $complaint_last_score->rank_4_10;
                }
                else{
                    $st_complaint_last = 0;
                }
                if($complaint_last_score->value_7=="Initiation"){
                    $in_complaint_last += $complaint_last_score->rank_4_7;
                }
                else{
                    $in_complaint_last = 0;
                }
                if($complaint_last_score->value_11=="Spontaneity"){
                    $sp_complaint_last += $complaint_last_score->rank_4_11;
                }
                else{
                    $sp_complaint_last = 0;
                }
            }
            }
        else{
            $complaint_last = 0;
            $ex_complaint_last = 0;
            $re_complaint_last = 0;
            $st_complaint_last = 0;
            $in_complaint_last = 0;
            $sp_complaint_last = 0;
        }
        /* Complaint Start */ 
        /* Appriciation Start */
        if (array_key_exists("defense_first",$arr_defense1)){
            $first = count($arr_defense1['defense_first']);
            $defense_first = 0;
            $im_defense_first = 0;
            $re_defense_first = 0;
            $op_defense_first = 0;
            $rec_defense_first = 0;
            $pl_defense_first = 0;
            foreach($arr_defense1['defense_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_8','rank_1_8','value_10','rank_1_10','value_7','rank_1_7','value_11','rank_1_11')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_first += $defense_first_score->rank_1st;
                if($defense_first_score->value_4=="implicit"){
                    $im_defense_first += $defense_first_score->rank_1_4;
                }
                else{
                    $im_defense_first = 0;
                }
                if($defense_first_score->value_8=="Repressive"){
                    $re_defense_first += $defense_first_score->rank_1_8;
                }
                else{
                    $re_defense_first = 0;
                }
                if($defense_first_score->value_10=="Acceptance"){
                    $op_defense_first += $defense_first_score->rank_1_10;
                }
                else{
                    $op_defense_first = 0;
                }
                if($defense_first_score->value_7=="Reciprocating"){
                    $rec_defense_first += $defense_first_score->rank_1_7;
                }
                else{
                    $rec_defense_first = 0;
                }
                if($defense_first_score->value_11=="Planning"){
                    $pl_defense_first += $defense_first_score->rank_1_11;
                }
                else{
                    $pl_defense_first = 0;
                }
            }
            
        }
        else{
            $defense_first = 0;
            $im_defense_first = 0;
            $re_defense_first = 0;
            $op_defense_first = 0;
            $rec_defense_first = 0;
            $pl_defense_first = 0;
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
            $re_total_defense = $re_defense_first;
            $op_total_defense = $op_defense_first;
            $rec_total_defense = $rec_defense_first;
            $pl_total_defense = $pl_defense_first;
        }
        else{
            $total_defense = $defense_first + 0;
            $im_total_defense = $im_defense_first;
            $re_total_defense = $re_defense_first;
            $op_total_defense = $op_defense_first;
            $rec_total_defense = $rec_defense_first;
            $pl_total_defense = $pl_defense_first;
        } 

        if (array_key_exists("defense_second",$arr_defense1)){
            $second = count($arr_defense1['defense_second']);
            $defense_second = 0;
            $im_defense_second = 0;
            $re_defense_second = 0;
            $op_defense_second = 0;
            $rec_defense_second = 0;
            $pl_defense_second = 0;
            foreach($arr_defense1['defense_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_8','rank_2_8','value_10','rank_2_10','value_7','rank_2_7','value_11','rank_2_11')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_second += $defense_second_score->rank_2nd;
                if($defense_second_score->value_4=="implicit"){
                    $im_defense_second += $defense_second_score->rank_2_4;
                }
                else{
                    $im_defense_second = 0;
                }
                if($defense_second_score->value_8=="Repressive"){
                    $re_defense_second += $defense_second_score->rank_2_8;
                }
                else{
                    $re_defense_second = 0;
                }
                if($defense_second_score->value_10=="Acceptance"){
                    $op_defense_second += $defense_second_score->rank_2_10;
                }
                else{
                    $op_defense_second = 0;
                }
                if($defense_second_score->value_7=="Reciprocating"){
                    $rec_defense_second += $defense_second_score->rank_2_7;
                }
                else{
                    $rec_defense_second = 0;
                }
                if($defense_second_score->value_11=="Planning"){
                    $pl_defense_second += $defense_second_score->rank_2_11;
                }
                else{
                    $pl_defense_second = 0;
                }
                
            }
        }
        else{
            $defense_second = 0;
            $im_defense_second = 0;
            $re_defense_second = 0;
            $op_defense_second = 0;
            $rec_defense_second = 0;
            $pl_defense_second = 0;
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
            $re_total_defense_second = $re_defense_second;
            $op_total_defense_second = $op_defense_second;
            $rec_total_defense_second = $rec_defense_second;
            $pl_total_defense_second = $pl_defense_second;
        }
        else{
            $total_defense_second = $defense_second + 0;
            $im_total_defense_second = $im_defense_second;
            $re_total_defense_second = $re_defense_second;
            $op_total_defense_second = $op_defense_second;
            $rec_total_defense_second = $rec_defense_second;
            $pl_total_defense_second = $pl_defense_second;
        }

        if (array_key_exists("defense_third",$arr_defense1)){
            $third = count($arr_defense1['defense_third']);
            $defense_third = 0;
            $im_defense_third = 0;
            $re_defense_third = 0;
            $op_defense_third = 0;
            $rec_defense_third = 0;
            $pl_defense_third = 0;
            foreach($arr_defense1['defense_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_8','rank_3_8','value_10','rank_3_10','value_7','rank_3_7','value_11','rank_3_11')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_third += $defense_third_score->rank_3rd;
                if($defense_third_score->value_4=="implicit"){
                    $im_defense_third += $defense_third_score->rank_3_4;
                }
                else{
                    $im_defense_third = 0;
                }
                if($defense_third_score->value_8=="Repressive"){
                    $re_defense_third += $defense_third_score->rank_3_8;
                }
                else{
                    $re_defense_third = 0;
                }
                if($defense_third_score->value_10=="Acceptance"){
                    $op_defense_third += $defense_third_score->rank_3_10;
                }
                else{
                    $op_defense_third = 0;
                }
                if($defense_third_score->value_7=="Reciprocating"){
                    $rec_defense_third += $defense_third_score->rank_3_7;
                }
                else{
                    $rec_defense_third = 0;
                }
                if($defense_third_score->value_11=="Planning"){
                    $pl_defense_third += $defense_third_score->rank_3_11;
                }
                else{
                    $pl_defense_third = 0;
                }
            }
        }
        else{
            $defense_third = 0;
            $im_defense_third = 0;
            $re_defense_third = 0;
            $op_defense_third = 0;
            $rec_defense_third = 0;
            $pl_defense_third = 0;
        }
        
        if (array_key_exists("defense_last",$arr_defense1)){
            $last = count($arr_defense1['defense_last']);
            $defense_last = 0;
            $im_defense_last = 0;
            $re_defense_last = 0;
            $op_defense_last = 0;
            $rec_defense_last = 0;
            $pl_defense_last = 0;
            foreach($arr_defense1['defense_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $defense_last_score = Answers::select('rank_last','value_4','rank_4_4','value_8','rank_4_8','value_10','rank_4_10','value_7','rank_4_7','value_11','rank_4_11')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $defense_last += $defense_last_score->rank_last;
                if($defense_last_score->rank_3_4=="implicit"){
                    $im_defense_last += $defense_last_score->rank_4_4;
                }
                else{
                    $im_defense_last = 0;
                }
                if($defense_last_score->value_8=="Repressive"){
                    $re_defense_last += $defense_last_score->rank_4_8;
                }
                else{
                    $re_defense_last = 0;
                }
                if($defense_last_score->value_10=="Acceptance"){
                    $op_defense_last += $defense_last_score->rank_4_10;
                }
                else{
                    $op_defense_last = 0;
                }
                if($defense_last_score->value_7=="Reciprocating"){
                    $rec_defense_last += $defense_last_score->rank_4_7;
                }
                else{
                    $rec_defense_last = 0;
                }
                if($defense_last_score->value_11=="Planning"){
                    $pl_defense_last += $defense_last_score->rank_4_11;
                }
                else{
                    $pl_defense_last = 0;
                }
            }
         }
        else{
            $defense_last = 0;
            $im_defense_last = 0;
            $re_defense_last = 0;
            $op_defense_last = 0;
            $rec_defense_last = 0;
            $pl_defense_last = 0;
        }
        /* Appriciation End */

        /* Avoidance Start */
        if (array_key_exists("avoidance_first",$arr_avoidance1)){
            $first = count($arr_avoidance1['avoidance_first']);
            $avoidance_first = 0;
            $p_avoidance_first = 0;
            $pa_avoidance_first = 0;
            $di_avoidance_first = 0;
            $it_avoidance_first = 0;
            $sp_avoidance_first = 0;
            $v_avoidance_first = 0;
            foreach($arr_avoidance1['avoidance_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_first_score = Answers::select('rank_1st','value_3','rank_1_3','value_6','rank_1_6','value_5','rank_1_5','value_9','rank_1_9','value_11','rank_1_11','value_11','rank_1_12')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_first += $avoidance_first_score->rank_1st;
                if($avoidance_first_score->value_3=="internal"){
                    $p_avoidance_first += $avoidance_first_score->rank_1_3;
                }
                else{
                    $p_avoidance_first = 0;
                }
                if($avoidance_first_score->value_6=="Autonomous"){
                    $pa_avoidance_first += $avoidance_first_score->rank_1_6;
                }
                else{
                    $pa_avoidance_first = 0;
                }
                if($avoidance_first_score->value_5=="Directive"){
                    $di_avoidance_first += $avoidance_first_score->rank_1_5;
                }
                else{
                    $di_avoidance_first = 0;
                }
                if($avoidance_first_score->value_9=="Intuitive"){
                    $it_avoidance_first += $avoidance_first_score->rank_1_9;
                }
                else{
                    $it_avoidance_first = 0;
                }
                if($avoidance_first_score->value_11=="Spontaneity"){
                    $sp_avoidance_first += $avoidance_first_score->rank_1_11;
                }
                else{
                    $sp_avoidance_first = 0;
                }
                if($avoidance_first_score->value_12=="Variety"){
                    $v_avoidance_first += $avoidance_first_score->rank_1_12;
                }
                else{
                    $v_avoidance_first = 0;
                }
            }
        }
        else{
            $avoidance_first = 0;
            $p_avoidance_first = 0;
            $pa_avoidance_first = 0;
            $di_avoidance_first = 0;
            $it_avoidance_first = 0;
            $sp_avoidance_first = 0;
            $v_avoidance_first = 0;
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
            $pa_total_avoidance = $pa_avoidance_first;
            $di_total_avoidance = $di_avoidance_first;
            $it_total_avoidance = $it_avoidance_first;
            $sp_total_avoidance = $sp_avoidance_first;
            $v_total_avoidance = $v_avoidance_first;
        }
        else{
            $total_avoidance = $avoidance_first + 0;
            $p_total_avoidance = $p_avoidance_first;
            $pa_total_avoidance = $pa_avoidance_first;
            $di_total_avoidance = $di_avoidance_first;
            $it_total_avoidance = $it_avoidance_first;
            $sp_total_avoidance = $sp_avoidance_first;
            $v_total_avoidance = $v_avoidance_first;
        }
       
        if (array_key_exists("avoidance_second",$arr_avoidance1)){
            $second = count($arr_avoidance1['avoidance_second']);
            $avoidance_second = 0;
            $p_avoidance_second = 0;
            $pa_avoidance_second = 0;
            $di_avoidance_second = 0;
            $it_avoidance_second = 0;
            $sp_avoidance_second = 0;
            $v_avoidance_second = 0;
            foreach($arr_avoidance1['avoidance_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_second_score = Answers::select('rank_2nd','value_3','rank_2_3','value_6','rank_2_6','value_5','rank_2_5','value_9','rank_2_9','value_11','rank_2_11','value_12','rank_2_12')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_second += $avoidance_second_score->rank_2nd;
                if($avoidance_second_score->value_3=="internal"){
                    $p_avoidance_second += $avoidance_second_score->rank_2_3;
                }
                else{
                    $p_avoidance_second = 0;
                }
                if($avoidance_second_score->value_6=="Autonomous"){
                    $pa_avoidance_second += $avoidance_second_score->rank_2_6;
                }
                else{
                    $pa_avoidance_second = 0;
                }
                if($avoidance_second_score->value_5=="Directive"){
                    $di_avoidance_second += $avoidance_second_score->rank_2_5;
                }
                else{
                    $di_avoidance_second = 0;
                }
                if($avoidance_second_score->value_9=="Intuitive"){
                    $it_avoidance_second += $avoidance_second_score->rank_2_9;
                }
                else{
                    $it_avoidance_second = 0;
                }
                if($avoidance_second_score->value_11=="Spontaneity"){
                    $sp_avoidance_second += $avoidance_second_score->rank_2_11;
                }
                else{
                    $sp_avoidance_second = 0;
                }
                if($avoidance_second_score->value_12=="Variety"){
                    $v_avoidance_second += $avoidance_second_score->rank_2_12;
                }
                else{
                    $v_avoidance_second = 0;
                }
            }
        }
        else{
            $avoidance_second = 0;
            $p_avoidance_second = 0;
            $pa_avoidance_second = 0;
            $di_avoidance_second = 0;
            $it_avoidance_second = 0;
            $sp_avoidance_second = 0;
            $v_avoidance_second = 0;
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
            $pa_total_avoidance_second = $pa_avoidance_second;
            $di_total_avoidance_second = $di_avoidance_second;
            $it_total_avoidance_second = $it_avoidance_second;
            $sp_total_avoidance_second = $sp_avoidance_second;
            $v_total_avoidance_second = $v_avoidance_second;
        }

        else{
            $total_avoidance_second = $avoidance_second + 0;
            $p_total_avoidance_second = $p_avoidance_second;
            $pa_total_avoidance_second = $pa_avoidance_second;
            $di_total_avoidance_second = $di_avoidance_second;
            $it_total_avoidance_second = $it_avoidance_second;
            $sp_total_avoidance_second = $sp_avoidance_second;
            $v_total_avoidance_second = $v_avoidance_second;
        }

        if (array_key_exists("avoidance_third",$arr_avoidance1)){
            $third = count($arr_avoidance1['avoidance_third']);
            $avoidance_third = 0;
            $p_avoidance_third = 0;
            $pa_avoidance_third = 0;
            $di_avoidance_third = 0;
            $it_avoidance_third = 0;
            $sp_avoidance_third = 0;
            $v_avoidance_third = 0;
            foreach($arr_avoidance1['avoidance_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_third_score = Answers::select('rank_3rd','value_3','rank_3_3','value_6','rank_3_6','value_5','rank_3_5','value_9','rank_3_9','value_11','rank_3_11','value_11','rank_3_12')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_third += $avoidance_third_score->rank_3rd;
                if($avoidance_third_score->value_3=="internal"){
                    $p_avoidance_third += $avoidance_third_score->rank_3_3;
                }
                else{
                    $p_avoidance_third = 0;
                }
                if($avoidance_third_score->value_6=="Autonomous"){
                    $pa_avoidance_third += $avoidance_third_score->rank_3_6;
                }
                else{
                    $pa_avoidance_third = 0;
                }
                if($avoidance_third_score->value_5=="Directive"){
                    $di_avoidance_third += $avoidance_third_score->rank_3_5;
                }
                else{
                    $di_avoidance_third = 0;
                }
                if($avoidance_third_score->value_9=="Intuitive"){
                    $it_avoidance_third += $avoidance_third_score->rank_3_9;
                }
                else{
                    $it_avoidance_third = 0;
                }
                if($avoidance_third_score->value_11=="Spontaneity"){
                    $sp_avoidance_third += $avoidance_third_score->rank_3_11;
                }
                else{
                    $sp_avoidance_third = 0;
                }
                if($avoidance_third_score->value_12=="Variety"){
                    $v_avoidance_third += $avoidance_third_score->rank_3_12;
                }
                else{
                    $v_avoidance_third = 0;
                }
            }
        }
        else{
            $avoidance_third = 0;
            $p_avoidance_third = 0;
            $pa_avoidance_third = 0;
            $di_avoidance_third = 0;
            $it_avoidance_third = 0;
            $sp_avoidance_third = 0;
            $v_avoidance_third = 0;
        }

        if (array_key_exists("avoidance_last",$arr_avoidance1)){
            $last = count($arr_avoidance1['avoidance_last']);
            $avoidance_last = 0;
            $p_avoidance_last = 0;
            $pa_avoidance_last = 0;
            $di_avoidance_last = 0;
            $it_avoidance_last = 0;
            $sp_avoidance_last = 0;
            $v_avoidance_last = 0;
            foreach($arr_avoidance1['avoidance_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $avoidance_last_score = Answers::select('rank_last','value_3','rank_4_3','value_6','rank_4_6','value_5','rank_4_5','value_9','rank_4_9','value_11','rank_4_11','value_11','rank_4_12')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $avoidance_last += $avoidance_last_score->rank_last;
                if($avoidance_last_score->value_3=="internal"){
                    $p_avoidance_last += $avoidance_last_score->rank_4_3;
                }
                else{
                    $p_avoidance_last = 0;
                }
                if($avoidance_last_score->value_6=="Autonomous"){
                    $pa_avoidance_last += $avoidance_last_score->rank_4_6;
                }
                else{
                    $pa_avoidance_last = 0;
                }
                if($avoidance_last_score->value_5=="Directive"){
                    $di_avoidance_last += $avoidance_last_score->rank_4_5;
                }
                else{
                    $di_avoidance_last = 0;
                }
                if($avoidance_last_score->value_9=="Intuitive"){
                    $it_avoidance_last += $avoidance_last_score->rank_4_9;
                }
                else{
                    $it_avoidance_last = 0;
                }
                if($avoidance_last_score->value_11=="Spontaneity"){
                    $sp_avoidance_last += $avoidance_last_score->rank_4_11;
                }
                else{
                    $sp_avoidance_last = 0;
                }
                if($avoidance_last_score->value_12=="Variety"){
                    $v_avoidance_last += $avoidance_last_score->rank_4_12;
                }
                else{
                    $v_avoidance_last = 0;
                }
            }
         }
        else{
            $avoidance_last = 0;
            $p_avoidance_last = 0;
            $pa_avoidance_last = 0;
            $di_avoidance_last = 0;
            $it_avoidance_last = 0;
            $sp_avoidance_last = 0;
            $v_avoidance_last = 0;
        }

        /* Avoidance End */

        /*Anxious Start*/
        if (array_key_exists("anxious_first",$arr_anxious1)){
            $first = count($arr_anxious1['anxious_first']);
            $anxious_first = 0;
            $eng_anxious_first = 0;
            $pe_anxious_first = 0;
            $co_anxious_first = 0;
            $it_anxious_first = 0;
            $pl_anxious_first = 0;
            $de_anxious_first = 0;
            foreach($arr_anxious1['anxious_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_first_score = Answers::select('rank_1st','value_3','rank_1_3','value_6','rank_1_6','value_5','rank_1_5','value_9','rank_1_9','value_11','rank_1_11','value_12','rank_1_12')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_first += $anxious_first_score->rank_1st;
                if($anxious_first_score->value_3=="explicit"){
                    $eng_anxious_first += $anxious_first_score->rank_1_3;
                }
                else{
                    $eng_anxious_first = 0;
                }
                if($anxious_first_score->value_6=="Engaged"){
                    $pe_anxious_first += $anxious_first_score->rank_1_6;
                }
                else{
                    $pe_anxious_first = 0;
                }
                if($anxious_first_score->value_5=="Collaborative"){
                    $co_anxious_first += $anxious_first_score->rank_1_5;
                }
                else{
                    $co_anxious_first = 0;
                }
                if($anxious_first_score->value_9=="Intuitive"){
                    $it_anxious_first += $anxious_first_score->rank_1_9;
                }
                else{
                    $it_anxious_first = 0;
                }
                if($anxious_first_score->value_11=="Planning"){
                    $pl_anxious_first += $anxious_first_score->rank_1_11;
                }
                else{
                    $pl_anxious_first = 0;
                }
                if($anxious_first_score->value_12=="Depth"){
                    $de_anxious_first += $anxious_first_score->rank_1_12;
                }
                else{
                    $de_anxious_first = 0;
                }
            }
        }
        else{
            $anxious_first = 0;
            $eng_anxious_first = 0;
            $pe_anxious_first = 0;
            $co_anxious_first = 0;
            $it_anxious_first = 0;
            $pl_anxious_first = 0;
            $de_anxious_first = 0;
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
            $pe_total_anxious = $pe_anxious_first;
            $co_total_anxious = $co_anxious_first;
            $it_total_anxious = $it_anxious_first;
            $pl_total_anxious = $pl_anxious_first;
            $de_total_anxious = $de_anxious_first;
        }
        else{
            $total_anxious = $anxious_first + 0;
            $eng_total_anxious = $eng_anxious_first;
            $pe_total_anxious = $pe_anxious_first;
            $co_total_anxious = $co_anxious_first;
            $it_total_anxious = $it_anxious_first;
            $pl_total_anxious = $pl_anxious_first;
            $de_total_anxious = $de_anxious_first;
        }

        if (array_key_exists("anxious_second",$arr_anxious1)){
            $second = count($arr_anxious1['anxious_second']);
            $anxious_second = 0;
            $eng_anxious_second = 0;
            $pe_anxious_second = 0;
            $co_anxious_second = 0;
            $it_anxious_second = 0;
            $pl_anxious_second = 0;
            $de_anxious_second = 0;
            foreach($arr_anxious1['anxious_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_second_score = Answers::select('rank_2nd','value_3','rank_2_3','value_6','rank_2_6','value_5','rank_2_5','value_9','rank_2_9','value_11','rank_2_11','value_12','rank_2_12')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_second += $anxious_second_score->rank_2nd;
                if($anxious_second_score->value_3=="external"){
                    $eng_anxious_second += $anxious_second_score->rank_2_3;
                }
                else{
                    $eng_anxious_second = 0;
                }
                if($anxious_second_score->value_6=="Engaged"){
                    $pe_anxious_second += $anxious_second_score->rank_2_6;
                }
                else{
                    $pe_anxious_second = 0;
                }
                if($anxious_second_score->value_5=="Collaborative"){
                    $co_anxious_second += $anxious_second_score->rank_2_5;
                }
                else{
                    $co_anxious_second = 0;
                }
                if($anxious_second_score->value_9=="Intuitive"){
                    $it_anxious_second += $anxious_second_score->rank_2_9;
                }
                else{
                    $it_anxious_second = 0;
                }
                if($anxious_second_score->value_11=="Planning"){
                    $pl_anxious_second += $anxious_second_score->rank_2_11;
                }
                else{
                    $pl_anxious_second = 0;
                }
                if($anxious_second_score->value_12=="Depth"){
                    $de_anxious_second += $anxious_second_score->rank_2_12;
                }
                else{
                    $de_anxious_second = 0;
                }
            }
        }
        else{
            $anxious_second = 0;
            $eng_anxious_second = 0;
            $pe_anxious_second = 0;
            $co_anxious_second = 0;
            $it_anxious_second = 0;
            $pl_anxious_second = 0;
            $de_anxious_second = 0;
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
            $pe_total_anxious_second = $pe_anxious_second;
            $co_total_anxious_second = $co_anxious_second;
            $it_total_anxious_second = $it_anxious_second;
            $pl_total_anxious_second = $pl_anxious_second;
            $de_total_anxious_second = $de_anxious_second;
        }
        else{
            $total_anxious_second = $anxious_second + 0;
            $eng_total_anxious_second = $eng_anxious_second;
            $pe_total_anxious_second = $pe_anxious_second;
            $co_total_anxious_second = $co_anxious_second;
            $it_total_anxious_second = $it_anxious_second;
            $pl_total_anxious_second = $pl_anxious_second;
            $de_total_anxious_second = $de_anxious_second;
        }
        if (array_key_exists("anxious_third",$arr_anxious1)){
            $third = count($arr_anxious1['anxious_third']);
            $anxious_third = 0;
            $eng_anxious_third = 0;
            $pe_anxious_third = 0;
            $co_anxious_third = 0;
            $it_anxious_third = 0;
            $pl_anxious_third = 0;
            $de_anxious_third = 0;
            foreach($arr_anxious1['anxious_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_third_score = Answers::select('rank_3rd','value_3','rank_3_3','value_6','rank_3_6','value_5','rank_3_5','value_9','rank_3_9','value_11','rank_3_11','value_12','rank_3_12')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_third += $anxious_third_score->rank_3rd;
                if($anxious_third_score->value_3=="external"){
                    $eng_anxious_third += $anxious_third_score->rank_3_3;
                }
                else{
                    $eng_anxious_third = 0;
                }
                if($anxious_third_score->value_6=="Engaged"){
                    $pe_anxious_third += $anxious_third_score->rank_3_6;
                }
                else{
                    $pe_anxious_third = 0;
                }
                if($anxious_third_score->value_5=="Collaborative"){
                    $co_anxious_third += $anxious_third_score->rank_3_5;
                }
                else{
                    $co_anxious_third = 0;
                }
                if($anxious_third_score->value_9=="Intuitive"){
                    $it_anxious_third += $anxious_third_score->rank_3_9;
                }
                else{
                    $it_anxious_third = 0;
                }
                if($anxious_third_score->value_11=="Planning"){
                    $pl_anxious_third += $anxious_third_score->rank_3_11;
                }
                else{
                    $pl_anxious_third = 0;
                }
                if($anxious_third_score->value_12=="Depth"){
                    $de_anxious_third += $anxious_third_score->rank_3_12;
                }
                else{
                    $de_anxious_third = 0;
                }
            }
        }
        else{
            $anxious_third = 0;
            $eng_anxious_third = 0;
            $pe_anxious_third = 0;
            $co_anxious_third = 0;
            $it_anxious_third = 0;
            $pl_anxious_third = 0;
            $de_anxious_third = 0;
        }

        if (array_key_exists("anxious_last",$arr_anxious1)){
            $last = count($arr_anxious1['anxious_last']);
            $anxious_last = 0;
            $eng_anxious_last = 0;
            $pe_anxious_last = 0;
            $co_anxious_last = 0;
            $it_anxious_last = 0;
            $pl_anxious_last = 0;
            $de_anxious_last = 0;
            foreach($arr_anxious1['anxious_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $anxious_last_score = Answers::select('rank_last','value_3','rank_4_3','value_6','rank_4_6','value_5','rank_4_5','value_9','rank_4_9','value_11','rank_4_11','value_12','rank_4_12')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $anxious_last += $anxious_last_score->rank_last;
                if($anxious_last_score->value_3=="external"){
                    $eng_anxious_last += $anxious_last_score->rank_4_3;
                }
                else{
                    $eng_anxious_last = 0;
                }
                if($anxious_last_score->value_6=="Engaged"){
                    $pe_anxious_last += $anxious_last_score->rank_4_6;
                }
                else{
                    $pe_anxious_last = 0;
                }
                if($anxious_last_score->value_5=="Collaborative"){
                    $co_anxious_last += $anxious_last_score->rank_4_5;
                }
                else{
                    $co_anxious_last = 0;
                }
                if($anxious_last_score->value_9=="Intuitive"){
                    $it_anxious_last += $anxious_last_score->rank_4_9;
                }
                else{
                    $it_anxious_last = 0;
                }
                if($anxious_last_score->value_11=="Planning"){
                    $pl_anxious_last += $anxious_last_score->rank_4_11;
                }
                else{
                    $pl_anxious_last = 0;
                }
                if($anxious_last_score->value_12=="Depth"){
                    $de_anxious_last += $anxious_last_score->rank_4_12;
                }
                else{
                    $de_anxious_last = 0;
                }
            }
         }
        else{
            $anxious_last = 0;
            $eng_anxious_last = 0;
            $pe_anxious_last = 0;
            $co_anxious_last = 0;
            $it_anxious_last = 0;
            $pl_anxious_last = 0;
            $de_anxious_last = 0;
        }
        /*Anxious End*/

        /*Control Start */
        if (array_key_exists("control_first",$arr_control1)){
            $first = count($arr_control1['control_first']);
            $control_first = 0;
            $ex_control_first = 0;
            $int_control_first = 0;
            $re_control_first = 0;
            $pa_control_first = 0;
            $st_control_first = 0;
            $di_control_first = 0;
            $in_control_first = 0;
            $con_control_first = 0;
            foreach($arr_control1['control_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_3','rank_1_3','value_8','rank_1_8','value_6','rank_1_6','value_10','rank_1_10','value_5','rank_1_5',
                'value_7','rank_1_7','value_9','rank_1_9')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $control_first += $control_first_score->rank_1st;
                if($control_first_score->value_4=="explicit"){
                    $ex_control_first += $control_first_score->rank_1_4;
                }
                else{
                    $ex_control_first = 0;
                }
                if($control_first_score->value_3=="internal"){
                    $int_control_first += $control_first_score->rank_1_3;
                }
                else{
                    $int_control_first = 0;
                }
                if($control_first_score->value_8=="Reactive"){
                    $re_control_first += $control_first_score->rank_1_8;
                }
                else{
                    $re_control_first = 0;
                }
                if($control_first_score->value_6=="Autonomous"){
                    $pa_control_first += $control_first_score->rank_1_6;
                }
                else{
                    $pa_control_first = 0;
                }
                if($control_first_score->value_10=="Achievement"){
                    $st_control_first += $control_first_score->rank_1_10;
                }
                else{
                    $st_control_first = 0;
                }
                if($control_first_score->value_5=="Directive"){
                    $di_control_first += $control_first_score->rank_1_5;
                }
                else{
                    $di_control_first = 0;
                }
                if($control_first_score->value_7=="Initiation"){
                    $in_control_first += $control_first_score->rank_1_7;
                }
                else{
                    $in_control_first = 0;
                }
                if($control_first_score->value_9=="Considered"){
                    $con_control_first += $control_first_score->rank_1_9;
                }
                else{
                    $con_control_first = 0;
                }
            }
            
        }
        else{
            $control_first = 0;
            $ex_control_first = 0;
            $int_control_first = 0;
            $re_control_first = 0;
            $pa_control_first = 0;
            $st_control_first = 0;
            $di_control_first = 0;
            $in_control_first = 0;
            $con_control_first = 0;
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
            $int_total_control = $int_control_first;
            $re_total_control = $re_control_first;
            $pa_total_control = $pa_control_first;
            $st_total_control = $st_control_first;
            $di_total_control = $di_control_first;
            $in_total_control = $in_control_first;
            $con_total_control = $con_control_first;
        }
        else{
            $total_control = $control_first + 0;
            $ex_total_control = $ex_control_first + 0;
            $int_total_control = $int_control_first;
            $re_total_control = $re_control_first;
            $pa_total_control = $pa_control_first;
            $st_total_control = $st_control_first;
            $di_total_control = $di_control_first;
            $in_total_control = $in_control_first;
            $con_total_control = $con_control_first;
        }

        if (array_key_exists("control_second",$arr_control1)){
            $second = count($arr_control1['control_second']);
            $control_second = 0;
            $ex_control_second = 0;
            $int_control_second = 0;
            $re_control_second = 0;
            $pa_control_second = 0;
            $st_control_second = 0;
            $di_control_second = 0;
            $in_control_second = 0;
            $con_control_second = 0;
            foreach($arr_control1['control_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_3','rank_2_3','value_8','rank_2_8','value_6','rank_2_6','value_10','rank_2_10','value_5','rank_2_5',
                'value_7','rank_2_7','value_9','rank_2_9')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $control_second += $control_second_score->rank_2nd;
                if($control_second_score->value_4=="explicit"){
                    $ex_control_second += $control_second_score->rank_2_4;
                }
                else{
                    $ex_control_second = 0;
                }
                if($control_second_score->value_3=="internal"){ 
                    $int_control_second += $control_second_score->rank_2_3;
                }
                else{
                    $int_control_second = 0;
                }
                if($control_second_score->value_8=="Reactive"){
                    $re_control_second += $control_second_score->rank_2_8;
                }
                else{
                    $re_control_second = 0;
                }
                if($control_second_score->value_6=="Autonomous"){
                    $pa_control_second += $control_second_score->rank_2_6;
                }
                else{
                    $pa_control_second = 0;
                }
                if($control_second_score->value_10=="Achievement"){
                    $st_control_second += $control_second_score->rank_2_10;
                }
                else{
                    $st_control_second = 0;
                }
                if($control_second_score->value_5=="Directive"){
                    $di_control_second += $control_second_score->rank_2_5;
                }
                else{
                    $di_control_second = 0;
                }
                if($control_second_score->value_7=="Initiation"){
                    $in_control_second += $control_second_score->rank_2_7;
                }
                else{
                    $in_control_second = 0;
                }
                if($control_second_score->value_9=="Considered"){
                    $con_control_second += $control_second_score->rank_2_9;
                }
                else{
                    $con_control_second = 0;
                }
                
            }
        }
        else{
            $control_second = 0;
            $ex_control_second = 0;
            $int_control_second = 0;
            $re_control_second = 0;
            $pa_control_second = 0;
            $st_control_second = 0;
            $di_control_second = 0;
            $in_control_second = 0;
            $con_control_second = 0;
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
            $int_total_control_second = $int_control_second ;
            $re_total_control_second = $re_control_second ;
            $pa_total_control_second = $pa_control_second ;
            $st_total_control_second = $st_control_second ;
            $di_total_control_second = $di_control_second ;
            $in_total_control_second = $in_control_second ;
            $con_total_control_second = $con_control_second ;
        }
        else{
            $total_control_second = $control_second + 0;
            $ex_total_control_second = $ex_control_second ;
            $int_total_control_second = $int_control_second ;
            $re_total_control_second = $re_control_second ;
            $pa_total_control_second = $pa_control_second ;
            $st_total_control_second = $st_control_second ;
            $di_total_control_second = $di_control_second ;
            $in_total_control_second = $in_control_second ;
            $con_total_control_second = $con_control_second ;
        }

        if (array_key_exists("control_third",$arr_control1)){
            $third = count($arr_control1['control_third']);
            $control_third = 0;
            $ex_control_third = 0;
            $int_control_third = 0;
            $re_control_third = 0;
            $pa_control_third = 0;
            $st_control_third = 0;
            $di_control_third = 0;
            $in_control_third = 0;
            $con_control_third = 0;
            foreach($arr_control1['control_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_3','rank_3_3','value_8','rank_3_8','value_6','rank_3_6','value_10','rank_3_10','value_5','rank_3_5',
                'value_7','rank_3_7','value_9','rank_3_9')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $control_third += $control_third_score->rank_3rd;
                if($control_third_score->value_4=="explicit"){
                    $ex_control_third += $control_third_score->rank_3_4;
                }
                else{
                    $ex_control_third = 0;
                }
                if($control_third_score->value_3=="internal"){
                    $int_control_third += $control_third_score->rank_3_3;
                }
                else{
                    $int_control_third = 0;
                }
                if($control_third_score->value_8=="Reactive"){
                    $re_control_third += $control_third_score->rank_3_8;
                }
                else{
                    $re_control_third = 0;
                }
                if($control_third_score->value_6=="Autonomous"){
                    $pa_control_third += $control_third_score->rank_3_6;
                }
                else{
                    $pa_control_third = 0;
                }
                if($control_third_score->value_10=="Achievement"){
                    $st_control_third += $control_third_score->rank_3_10;
                }
                else{
                    $st_control_third = 0;
                }
                if($control_third_score->value_5=="Directive"){
                    $di_control_third += $control_third_score->rank_3_5;
                }
                else{
                    $di_control_third = 0;
                }
                if($control_third_score->value_7=="Initiation"){
                    $in_control_third += $control_third_score->rank_3_7;
                }
                else{
                    $in_control_third = 0;
                }
                if($control_third_score->value_9=="Considered"){
                    $con_control_third += $control_third_score->rank_3_9;
                }
                else{
                    $con_control_third = 0;
                }
            }
        }
        else{
            $control_third = 0;
            $ex_control_third = 0;
            $int_control_third = 0;
            $re_control_third = 0;
            $pa_control_third = 0;
            $st_control_third = 0;
            $di_control_third = 0;
            $in_control_third = 0;
            $con_control_third = 0;
        }

        if (array_key_exists("control_last",$arr_control1)){
            $last = count($arr_control1['control_last']);
            $control_last = 0;
            $ex_control_last = 0;
            $int_control_last = 0;
            $re_control_last = 0;
            $pa_control_last = 0;
            $st_control_last = 0;
            $di_control_last = 0;
            $in_control_last = 0;
            $con_control_last = 0;
            foreach($arr_control1['control_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $control_last_score = Answers::select('rank_last','value_4','rank_4_4','value_3','rank_4_3','value_8','rank_4_8','value_6','rank_4_6','value_10','rank_4_10','value_5','rank_4_5',
                'value_7','rank_4_7','value_9','rank_4_9')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $control_last += $control_last_score->rank_last;
                if($control_last_score->value_4=="explicit"){
                    $ex_control_last += $control_last_score->rank_4_4;
                }
                else{
                    $ex_control_last = 0;
                }
                if($control_last_score->value_3=="internal"){
                    $int_control_last += $control_last_score->rank_4_3;
                }
                else{
                    $int_control_last = 0;
                }
                if($control_last_score->value_8=="Reactive"){
                    $re_control_second += $control_last_score->rank_2_8;
                }
                else{
                    $re_control_second = 0;
                }
                if($control_last_score->value_8=="Reactive"){
                    $re_control_last += $control_last_score->rank_4_8;
                }
                else{
                    $re_control_last = 0;
                }
                if($control_last_score->value_6=="Autonomous"){
                    $pa_control_last += $control_last_score->rank_4_6;
                }
                else{
                    $pa_control_last = 0;
                }
                if($control_last_score->value_10=="Achievement"){
                    $st_control_last += $control_last_score->rank_4_10;
                }
                else{
                    $st_control_last = 0;
                }
                if($control_last_score->value_5=="Directive"){
                    $di_control_last += $control_last_score->rank_4_5;
                }
                else{
                    $di_control_last = 0;
                }
                if($control_last_score->value_7=="Initiation"){
                    $in_control_last += $control_last_score->rank_4_7;
                }
                else{
                    $in_control_last = 0;
                }
                if($control_last_score->value_9=="Considered"){
                    $con_control_last += $control_last_score->rank_4_9;
                }
                else{
                    $con_control_last = 0;
                }
            }
         }
        else{
            $control_last = 0;
            $ex_control_last = 0;
            $int_control_last = 0;
            $re_control_last = 0;
            $pa_control_last = 0;
            $st_control_last = 0;
            $di_control_last = 0;
            $in_control_last = 0;
            $con_control_last = 0;
        }
        /*Control End */
        /*Collapse Start*/
        if (array_key_exists("collapse_first",$arr_collapse1)){
            $first = count($arr_collapse1['collapse_first']);
            $collapse_first = 0;
            $im_collapse_first = 0;
            $ext_collapse_first = 0;
            $re_collapse_first = 0;
            $pe_collapse_first = 0;
            $op_collapse_first = 0;
            $co_collapse_first = 0;
            $rec_collapse_first = 0;
            $con_collapse_first = 0;
            foreach($arr_collapse1['collapse_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_3','rank_1_3','value_8','rank_1_8','value_6','rank_1_6','value_10','rank_1_10','value_5','rank_1_5',
                'value_7','rank_1_7','value_9','rank_1_9')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_first += $collapse_first_score->rank_1st;
                if($collapse_first_score->value_4=="implicit"){
                    $im_collapse_first += $collapse_first_score->rank_1_4;
                }
                else{
                    $im_collapse_first = 0;
                }
                if($collapse_first_score->value_3=="external"){
                    $ext_collapse_first += $collapse_first_score->rank_1_3;
                }
                else{
                    $ext_collapse_first = 0;
                }
                if($collapse_first_score->value_8=="Repressive"){
                    $re_collapse_first += $collapse_first_score->rank_1_8;
                }
                else{
                    $re_collapse_first = 0;
                }
                if($collapse_first_score->value_6=="Engaged"){
                    $pe_collapse_first += $collapse_first_score->rank_1_6;
                }
                else{
                    $pe_collapse_first = 0;
                }
                if($collapse_first_score->value_10=="Acceptance"){
                    $op_collapse_first += $collapse_first_score->rank_1_10;
                }
                else{
                    $op_collapse_first = 0;
                }
                if($collapse_first_score->value_5=="Collaborative"){
                    $co_collapse_first += $collapse_first_score->rank_1_5;
                }
                else{
                    $co_collapse_first = 0;
                }
                if($collapse_first_score->value_7=="Reciprocating"){
                    $rec_collapse_first += $collapse_first_score->rank_1_7;
                }
                else{
                    $rec_collapse_first = 0;
                }
                if($collapse_first_score->value_9=="Considered"){
                    $con_collapse_first += $collapse_first_score->rank_1_9;
                }
                else{
                    $con_collapse_first = 0;
                }
            }
        }
        else{
            $collapse_first = 0;
            $im_collapse_first = 0;
            $ext_collapse_first = 0;
            $re_collapse_first = 0;
            $pe_collapse_first = 0;
            $op_collapse_first = 0;
            $co_collapse_first = 0;
            $rec_collapse_first = 0;
            $con_collapse_first = 0;
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
            $ext_total_collapse = $ext_collapse_first;
            $re_total_collapse = $re_collapse_first;
            $pe_total_collapse = $pe_collapse_first;
            $op_total_collapse = $op_collapse_first;
            $co_total_collapse = $co_collapse_first;
            $rec_total_collapse = $rec_collapse_first;
            $con_total_collapse = $con_collapse_first;
        }
        else{
            $total_collapse = $collapse_first + 0;
            $im_total_collapse = $im_collapse_first;
            $ext_total_collapse = $ext_collapse_first;
            $re_total_collapse = $re_collapse_first;
            $pe_total_collapse = $pe_collapse_first;
            $op_total_collapse = $op_collapse_first;
            $co_total_collapse = $co_collapse_first;
            $rec_total_collapse = $rec_collapse_first;
            $con_total_collapse = $con_collapse_first;
        }

        if (array_key_exists("collapse_second",$arr_collapse1)){
            $second = count($arr_collapse1['collapse_second']);
            $collapse_second = 0;
            $im_collapse_second = 0;
            $ext_collapse_second = 0;
            $re_collapse_second = 0;
            $pe_collapse_second = 0;
            $op_collapse_second = 0;
            $co_collapse_second = 0;
            $rec_collapse_second = 0;
            $con_collapse_second = 0;
            foreach($arr_collapse1['collapse_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_3','rank_2_3','value_8','rank_2_8','value_6','rank_2_6','value_10','rank_2_10','value_5','rank_2_5',
                'value_7','rank_2_7','value_9','rank_2_9')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_second += $collapse_second_score->rank_2nd;
                if($collapse_second_score->value_4=="implicit"){
                    $im_collapse_second += $collapse_second_score->rank_2_4;
                }
                else{
                    $im_collapse_second = 0;
                }
                if($collapse_second_score->value_3=="external"){
                    $ext_collapse_second += $collapse_second_score->rank_2_3;
                }
                else{
                    $ext_collapse_second = 0;
                }
                if($collapse_second_score->value_8=="Repressive"){
                    $re_collapse_second += $collapse_second_score->rank_2_8;
                }
                else{
                    $re_collapse_second = 0;
                }
                if($collapse_second_score->value_6=="Engaged"){
                    $pe_collapse_second += $collapse_second_score->rank_2_6;
                }
                else{
                    $pe_collapse_second = 0;
                }
                if($collapse_second_score->value_10=="Acceptance"){
                    $op_collapse_second += $collapse_second_score->rank_2_10;
                }
                else{
                    $op_collapse_second = 0;
                }
                if($collapse_second_score->value_5=="Collaborative"){
                    $co_collapse_second += $collapse_second_score->rank_2_5;
                }
                else{
                    $co_collapse_second = 0;
                }
                if($collapse_second_score->value_7=="Reciprocating"){
                    $rec_collapse_second += $collapse_second_score->rank_2_7;
                }
                else{
                    $rec_collapse_second = 0;
                }
                if($collapse_second_score->value_9=="Considered"){
                    $con_collapse_second += $collapse_second_score->rank_2_9;
                }
                else{
                    $con_collapse_second = 0;
                }
            }
        }
        else{
            $collapse_second = 0;
            $im_collapse_second = 0;
            $ext_collapse_second = 0;
            $re_collapse_second = 0;
            $pe_collapse_second = 0;
            $op_collapse_second = 0;
            $co_collapse_second = 0;
            $rec_collapse_second = 0;
            $con_collapse_second = 0;
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
            $ext_total_collapse_second = $ext_collapse_second;
            $re_total_collapse_second = $re_collapse_second;
            $pe_total_collapse_second = $pe_collapse_second;
            $op_total_collapse_second = $op_collapse_second;
            $co_total_collapse_second = $co_collapse_second;
            $rec_total_collapse_second = $rec_collapse_second;
            $con_total_collapse_second = $con_collapse_second;
        }
        else{
            $total_collapse_second = $collapse_second + 0;
            $im_total_collapse_second = $im_collapse_second;
            $ext_total_collapse_second = $ext_collapse_second;
            $re_total_collapse_second = $re_collapse_second;
            $pe_total_collapse_second = $pe_collapse_second;
            $op_total_collapse_second = $op_collapse_second;
            $co_total_collapse_second = $co_collapse_second;
            $rec_total_collapse_second = $rec_collapse_second;
            $con_total_collapse_second = $con_collapse_second;
        }


       if (array_key_exists("collapse_third",$arr_collapse1)){
            $third = count($arr_collapse1['collapse_third']);
            $collapse_third = 0;
            $im_collapse_third = 0;
            $ext_collapse_third = 0;
            $re_collapse_third = 0;
            $pe_collapse_third = 0;
            $op_collapse_third = 0;
            $co_collapse_third = 0;
            $rec_collapse_third = 0;
            $con_collapse_third = 0;
            foreach($arr_collapse1['collapse_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_3','rank_3_3','value_8','rank_3_8','value_6','rank_3_6','value_10','rank_3_10','value_5','rank_3_5',
                'value_7','rank_3_7','value_9','rank_3_9')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_third += $collapse_third_score->rank_3rd;
                if($collapse_third_score->value_4=="implicit"){
                    $im_collapse_third += $collapse_third_score->rank_3_4;
                }
                else{
                    $im_collapse_third = 0;
                }
                if($collapse_third_score->value_3=="external"){
                    $ext_collapse_third += $collapse_third_score->rank_3_3;
                }
                else{
                    $ext_collapse_third = 0;
                }
                if($collapse_third_score->value_8=="Repressive"){
                    $re_collapse_third += $collapse_third_score->rank_3_8;
                }
                else{
                    $re_collapse_third = 0;
                }
                if($collapse_third_score->value_6=="Engaged"){
                    $pe_collapse_third += $collapse_third_score->rank_3_6;
                }
                else{
                    $pe_collapse_third = 0;
                }
                if($collapse_third_score->value_10=="Acceptance"){
                    $op_collapse_third += $collapse_third_score->rank_3_10;
                }
                else{
                    $op_collapse_third = 0;
                }
                if($collapse_third_score->value_5=="Collaborative"){
                    $co_collapse_third += $collapse_third_score->rank_3_5;
                }
                else{
                    $co_collapse_third = 0;
                }
                if($collapse_third_score->value_7=="Reciprocating"){
                    $rec_collapse_third += $collapse_third_score->rank_3_7;
                }
                else{
                    $rec_collapse_third = 0;
                }
                if($collapse_third_score->value_9=="Considered"){
                    $con_collapse_third += $collapse_third_score->rank_3_9;
                }
                else{
                    $con_collapse_third = 0;
                }
            }
        }
        else{
            $collapse_third = 0;
            $im_collapse_third = 0;
            $ext_collapse_third = 0;
            $re_collapse_third = 0;
            $pe_collapse_third = 0;
            $op_collapse_third = 0;
            $co_collapse_third = 0;
            $rec_collapse_third = 0;
            $con_collapse_third = 0;
        }

        if (array_key_exists("collapse_last",$arr_collapse1)){
            $last = count($arr_collapse1['collapse_last']);
            $collapse_last = 0;
            $im_collapse_last = 0;
            $ext_collapse_last = 0;
            $re_collapse_last = 0;
            $pe_collapse_last = 0;
            $op_collapse_last = 0;
            $co_collapse_last = 0;
            $rec_collapse_last = 0;
            $con_collapse_last = 0;
            foreach($arr_collapse1['collapse_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $collapse_last_score = Answers::select('rank_last','value_4','rank_4_4','value_3','rank_4_3','value_8','rank_4_8','value_6','rank_4_6','value_10','rank_4_10','value_5','rank_4_5',
                'value_7','rank_4_7','value_9','rank_4_9')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $collapse_last += $collapse_last_score->rank_last;
                if($collapse_last_score->value_4=="implicit"){
                    $im_collapse_last += $collapse_last_score->rank_4_4;
                }
                else{
                    $im_collapse_last = 0;
                }
                if($collapse_last_score->value_3=="external"){
                    $ext_collapse_last += $collapse_last_score->rank_4_3;
                }
                else{
                    $ext_collapse_last = 0;
                }
                if($collapse_last_score->value_8=="Repressive"){
                    $re_collapse_last += $collapse_last_score->rank_4_8;
                }
                else{
                    $re_collapse_last = 0;
                }
                if($collapse_last_score->value_6=="Engaged"){
                    $pe_collapse_last += $collapse_last_score->rank_4_6;
                }
                else{
                    $pe_collapse_last = 0;
                }
                if($collapse_last_score->value_10=="Acceptance"){
                    $op_collapse_last += $collapse_last_score->rank_4_10;
                }
                else{
                    $op_collapse_last = 0;
                }
                if($collapse_last_score->value_5=="Collaborative"){
                    $co_collapse_last += $collapse_last_score->rank_4_5;
                }
                else{
                    $co_collapse_last = 0;
                }
                if($collapse_last_score->value_7=="Reciprocating"){
                    $rec_collapse_last += $collapse_last_score->rank_4_7;
                }
                else{
                    $rec_collapse_last = 0;
                }
                if($collapse_last_score->value_9=="Considered"){
                    $con_collapse_last += $collapse_last_score->rank_4_9;
                }
                else{
                    $con_collapse_last = 0;
                }
            }
         }
        else{
            $collapse_last = 0;
            $im_collapse_last = 0;
            $ext_collapse_last = 0;
            $re_collapse_last = 0;
            $pe_collapse_last = 0;
            $op_collapse_last = 0;
            $co_collapse_last = 0;
            $rec_collapse_last = 0;
            $con_collapse_last = 0;
        }

      
        /*Collapse End*/

      
        /*Addiction Start*/
        if (array_key_exists("addiction_first",$arr_addiction1)){
            $first = count($arr_addiction1['addiction_first']);
            $addiction_first = 0;
            $im_addiction_first = 0;
            $int_addiction_first = 0;
            $re_addiction_first = 0;
            $pa_addiction_first = 0;
            $di_addiction_first = 0;
            $in_addiction_first = 0;
            $it_addiction_first = 0;
            $sp_addiction_first = 0;
            $v_addiction_first = 0;
            foreach($arr_addiction1['addiction_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_3','rank_1_3','value_8','rank_1_8','value_6','rank_1_6','value_5','rank_1_5','value_7','rank_1_7',
                'value_9','rank_1_9','value_11','rank_1_11','value_12','rank_1_12')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_first += $addiction_first_score->rank_1st;
                if($addiction_first_score->value_4=="implicit"){
                    $im_addiction_first += $addiction_first_score->rank_1_4;
                }
                else{
                    $im_addiction_first = 0;
                }
                if($addiction_first_score->value_3=="internal"){
                    $int_addiction_first += $addiction_first_score->rank_1_3;
                }
                else{
                    $int_addiction_first = 0;
                }
                if($addiction_first_score->value_8=="Reactive"){
                    $re_addiction_first += $addiction_first_score->rank_1_8;
                }
                else{
                    $re_addiction_first = 0;
                }
                if($addiction_first_score->value_6=="Autonomous"){
                    $pa_addiction_first += $addiction_first_score->rank_1_6;
                }
                else{
                    $pa_addiction_first = 0;
                }
                if($addiction_first_score->value_5=="Directive"){
                    $di_addiction_first += $addiction_first_score->rank_1_5;
                }
                else{
                    $di_addiction_first = 0;
                }
                if($addiction_first_score->value_7=="Initiation"){
                    $in_addiction_first += $addiction_first_score->rank_1_7;
                }
                else{
                    $in_addiction_first = 0;
                }
                if($addiction_first_score->value_9=="Intuitive"){
                    $it_addiction_first += $addiction_first_score->rank_1_9;
                }
                else{
                    $it_addiction_first = 0;
                }
                if($addiction_first_score->value_11=="Spontaneity"){
                    $sp_addiction_first += $addiction_first_score->rank_1_11;
                }
                else{
                    $sp_addiction_first = 0;
                }
                if($addiction_first_score->value_12=="Variety"){
                    $v_addiction_first += $addiction_first_score->rank_1_12;
                }
                else{
                    $v_addiction_first = 0;
                }
            }
        }
        else{
            $addiction_first = 0;
            $im_addiction_first = 0;
            $int_addiction_first = 0;
            $re_addiction_first = 0;
            $pa_addiction_first = 0;
            $di_addiction_first = 0;
            $in_addiction_first = 0;
            $it_addiction_first = 0;
            $sp_addiction_first = 0;
            $v_addiction_first = 0;
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
            $int_total_addiction = $int_addiction_first;
            $re_total_addiction = $re_addiction_first;
            $pa_total_addiction = $pa_addiction_first;
            $di_total_addiction = $di_addiction_first;
            $in_total_addiction = $in_addiction_first;
            $it_total_addiction = $it_addiction_first;
            $sp_total_addiction = $sp_addiction_first;
            $v_total_addiction = $v_addiction_first;
        }
        else{
            $total_addiction = $addiction_first + 0;
            $im_total_addiction = $im_addiction_first;
            $int_total_addiction = $int_addiction_first;
            $re_total_addiction = $re_addiction_first;
            $pa_total_addiction = $pa_addiction_first;
            $di_total_addiction = $di_addiction_first;
            $in_total_addiction = $in_addiction_first;
            $it_total_addiction = $it_addiction_first;
            $sp_total_addiction = $sp_addiction_first;
            $v_total_addiction = $v_addiction_first;
        } 
        if (array_key_exists("addiction_second",$arr_addiction1)){
            $second = count($arr_addiction1['addiction_second']);
            $addiction_second = 0;
            $im_addiction_second = 0;
            $int_addiction_second = 0;
            $re_addiction_second = 0;
            $pa_addiction_second = 0;
            $di_addiction_second = 0;
            $in_addiction_second = 0;
            $it_addiction_second = 0;
            $sp_addiction_second = 0;
            $v_addiction_second = 0;
            foreach($arr_addiction1['addiction_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_3','rank_2_3','value_8','rank_2_8','value_6','rank_2_6','value_5','rank_2_5','value_7','rank_2_7',
                'value_9','rank_2_9','value_11','rank_2_11','value_12','rank_2_12')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_second += $addiction_second_score->rank_2nd;
                if($addiction_second_score->value_4=="implicit"){
                    $im_addiction_second += $addiction_second_score->rank_2_4;
                }
                else{
                    $im_addiction_second = 0;
                }
                if($addiction_second_score->value_3=="internal"){
                    $int_addiction_second += $addiction_second_score->rank_2_3;
                }
                else{
                    $int_addiction_second = 0;
                }
                if($addiction_second_score->value_8=="Reactive"){
                    $re_addiction_second += $addiction_second_score->rank_2_8;
                }
                else{
                    $re_addiction_second = 0;
                }
                if($addiction_second_score->value_6=="Autonomous"){
                    $pa_addiction_second += $addiction_second_score->rank_2_6;
                }
                else{
                    $pa_addiction_second = 0;
                }
                if($addiction_second_score->value_5=="Directive"){
                    $di_addiction_second += $addiction_second_score->rank_2_5;
                }
                else{
                    $di_addiction_second = 0;
                }
                if($addiction_second_score->value_7=="Initiation"){
                    $in_addiction_second += $addiction_second_score->rank_2_7;
                }
                else{
                    $in_addiction_second = 0;
                }
                if($addiction_second_score->value_9=="Intuitive"){
                    $it_addiction_second += $addiction_second_score->rank_2_9;
                }
                else{
                    $it_addiction_second = 0;
                }
                if($addiction_second_score->value_11=="Spontaneity"){
                    $sp_addiction_second += $addiction_second_score->rank_2_11;
                }
                else{
                    $sp_addiction_second = 0;
                }
                if($addiction_second_score->value_12=="Variety"){
                    $v_addiction_second += $addiction_second_score->rank_2_12;
                }
                else{
                    $v_addiction_second = 0;
                }
            }
        }
        else{
            $addiction_second = 0;
            $im_addiction_second = 0;
            $int_addiction_second = 0;
            $re_addiction_second = 0;
            $pa_addiction_second = 0;
            $di_addiction_second = 0;
            $in_addiction_second = 0;
            $it_addiction_second = 0;
            $sp_addiction_second = 0;
            $v_addiction_second = 0;
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
            $int_total_addiction_second = $int_addiction_second;
            $re_total_addiction_second = $re_addiction_second;
            $pa_total_addiction_second = $pa_addiction_second;
            $di_total_addiction_second = $di_addiction_second;
            $in_total_addiction_second = $in_addiction_second;
            $it_total_addiction_second = $it_addiction_second;
            $sp_total_addiction_second = $sp_addiction_second;
            $v_total_addiction_second = $v_addiction_second;
        }
        else{
            $total_addiction_second = $addiction_second + 0;
            $im_total_addiction_second = $im_addiction_second;
            $int_total_addiction_second = $int_addiction_second;
            $re_total_addiction_second = $re_addiction_second;
            $pa_total_addiction_second = $pa_addiction_second;
            $di_total_addiction_second = $di_addiction_second;
            $in_total_addiction_second = $in_addiction_second;
            $it_total_addiction_second = $it_addiction_second;
            $sp_total_addiction_second = $sp_addiction_second;
            $v_total_addiction_second = $v_addiction_second;
        }

        if (array_key_exists("addiction_third",$arr_addiction1)){
            $third = count($arr_addiction1['addiction_third']);
            $addiction_third = 0;
            $im_addiction_third = 0;
            $int_addiction_third = 0;
            $re_addiction_third = 0;
            $pa_addiction_third = 0;
            $di_addiction_third = 0;
            $in_addiction_third = 0;
            $it_addiction_third = 0;
            $sp_addiction_third = 0;
            $v_addiction_third = 0;
            foreach($arr_addiction1['addiction_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_3','rank_3_3','value_8','rank_3_8','value_6','rank_3_6','value_5','rank_3_5','value_7','rank_3_7',
                'value_9','rank_3_9','value_11','rank_3_11','value_12','rank_3_12')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_third += $addiction_third_score->rank_3rd;
                if($addiction_third_score->value_4=="implicit"){
                    $im_addiction_third += $addiction_third_score->rank_3_4;
                }
                else{
                    $im_addiction_third = 0;
                }
                if($addiction_third_score->value_3=="internal"){
                    $int_addiction_third += $addiction_third_score->rank_3_3;
                }
                else{
                    $int_addiction_third = 0;
                }
                if($addiction_third_score->value_8=="Reactive"){
                    $re_addiction_third += $addiction_third_score->rank_3_8;
                }
                else{
                    $re_addiction_third = 0;
                }
                if($addiction_third_score->value_6=="Autonomous"){
                    $pa_addiction_third += $addiction_third_score->rank_3_6;
                }
                else{
                    $pa_addiction_third = 0;
                }
                if($addiction_third_score->value_5=="Directive"){
                    $di_addiction_third += $addiction_third_score->rank_3_5;
                }
                else{
                    $di_addiction_third = 0;
                }
                if($addiction_third_score->value_7=="Initiation"){
                    $in_addiction_third += $addiction_third_score->rank_3_7;
                }
                else{
                    $in_addiction_third = 0;
                }
                if($addiction_third_score->value_9=="Intuitive"){
                    $it_addiction_third += $addiction_third_score->rank_3_9;
                }
                else{
                    $it_addiction_third = 0;
                }
                if($addiction_third_score->value_11=="Spontaneity"){
                    $sp_addiction_third += $addiction_third_score->rank_3_11;
                }
                else{
                    $sp_addiction_third = 0;
                }
                if($addiction_third_score->value_12=="Variety"){
                    $v_addiction_third += $addiction_third_score->rank_3_12;
                }
                else{
                    $v_addiction_third = 0;
                }
            }
        }
        else{
            $addiction_third = 0;
            $im_addiction_third = 0;
            $int_addiction_third = 0;
            $re_addiction_third = 0;
            $pa_addiction_third = 0;
            $di_addiction_third = 0;
            $in_addiction_third = 0;
            $it_addiction_third = 0;
            $sp_addiction_third = 0;
            $v_addiction_third = 0;
        }
 
        if (array_key_exists("addiction_last",$arr_addiction1)){
            $last = count($arr_addiction1['addiction_last']);
            $addiction_last = 0;
            $im_addiction_last = 0;
            $int_addiction_last = 0;
            $re_addiction_last = 0;
            $pa_addiction_last = 0;
            $di_addiction_last = 0;
            $in_addiction_last = 0;
            $it_addiction_last = 0;
            $sp_addiction_last = 0;
            $v_addiction_last = 0;
            foreach($arr_addiction1['addiction_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $addiction_last_score = Answers::select('rank_last','value_4','rank_4_4','value_3','rank_4_3','value_8','rank_4_8','value_6','rank_4_6','value_5','rank_4_5','value_7','rank_4_7',
                'value_9','rank_4_9','value_11','rank_4_11','value_12','rank_4_12')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $addiction_last += $addiction_last_score->rank_last;
                if($addiction_last_score->value_4=="implicit"){
                    $im_addiction_last += $addiction_last_score->rank_4_4;
                }
                else{
                    $im_addiction_last = 0;
                }
                if($addiction_last_score->value_3=="internal"){ 
                    $int_addiction_last += $addiction_last_score->rank_4_3;
                }
                else{
                    $int_addiction_last = 0;
                }
                if($addiction_last_score->value_8=="Reactive"){
                    $re_addiction_last += $addiction_last_score->rank_4_8;
                }
                else{
                    $re_addiction_last = 0;
                }
                if($addiction_last_score->value_6=="Autonomous"){
                    $pa_addiction_last += $addiction_last_score->rank_4_6;
                }
                else{
                    $pa_addiction_last = 0;
                }
                if($addiction_last_score->value_5=="Directive"){
                    $di_addiction_last += $addiction_last_score->rank_4_5;
                }
                else{
                    $di_addiction_last = 0;
                }
                if($addiction_last_score->value_7=="Initiation"){
                    $in_addiction_last += $addiction_last_score->rank_4_7;
                }
                else{
                    $in_addiction_last = 0;
                }
                if($addiction_last_score->value_9=="Intuitive"){
                    $it_addiction_last += $addiction_last_score->rank_4_9;
                }
                else{
                    $it_addiction_last = 0;
                }
                if($addiction_last_score->value_11=="Spontaneity"){
                    $sp_addiction_last += $addiction_last_score->rank_4_11;
                }
                else{
                    $sp_addiction_last = 0;
                }
                if($addiction_last_score->value_12=="Variety"){
                    $v_addiction_last += $addiction_last_score->rank_4_12;
                }
                else{
                    $v_addiction_last = 0;
                }
            }
         }
        else{
            $addiction_last = 0;
            $im_addiction_last = 0;
            $int_addiction_last = 0;
            $re_addiction_last = 0;
            $pa_addiction_last = 0;
            $di_addiction_last = 0;
            $in_addiction_last = 0;
            $it_addiction_last = 0;
            $sp_addiction_last = 0;
            $v_addiction_last = 0;
        } 
        /*Co-Dependence Start*/
        if (array_key_exists("dependence_first",$arr_dependence1)){
            $first = count($arr_dependence1['dependence_first']);
            $dependence_first = 0;
            $ex_dependence_first = 0;
            $ext_dependence_first = 0;
            $re_dependence_first = 0;
            $pe_dependence_first = 0;
            $co_dependence_first = 0;
            $rec_dependence_first = 0;
            $con_dependence_first = 0;
            $pl_dependence_first = 0;
            $de_dependence_first = 0;
            foreach($arr_dependence1['dependence_first'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_first_score = Answers::select('rank_1st','value_4','rank_1_4','value_3','rank_1_3','value_8','rank_1_8','value_6','rank_1_6','value_5','rank_1_5','value_7','rank_1_7',
                'value_9','rank_1_9','value_11','rank_1_11','value_12','rank_1_12')->where('value_2',$ps['answer']['first'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_first += $dependence_first_score->rank_1st;
                if($dependence_first_score->value_4=="explicit"){
                    $ex_dependence_first += $dependence_first_score->rank_1_4;
                }
                else{
                    $ex_dependence_first = 0;
                }
                if($dependence_first_score->value_3=="external"){
                    $ext_dependence_first += $dependence_first_score->rank_1_3;
                }
                else{
                    $ext_dependence_first = 0;
                }
                if($dependence_first_score->value_8=="Repressive"){
                    $re_dependence_first += $dependence_first_score->rank_1_8;
                }
                else{
                    $re_dependence_first = 0;
                }
                if($dependence_first_score->value_6=="Engaged"){
                    $pe_dependence_first += $dependence_first_score->rank_1_6;
                }
                else{
                    $pe_dependence_first = 0;
                }
                if($dependence_first_score->value_5=="Collaborative"){
                    $co_dependence_first += $dependence_first_score->rank_1_5;
                }
                else{
                    $co_dependence_first = 0;
                }
                if($dependence_first_score->value_7=="Reciprocating"){
                    $rec_dependence_first += $dependence_first_score->rank_1_7;
                }
                else{
                    $rec_dependence_first = 0;
                }
                if($dependence_first_score->value_9=="Considered"){
                    $con_dependence_first += $dependence_first_score->rank_1_9;
                }
                else{
                    $con_dependence_first = 0;
                }
                if($dependence_first_score->value_11=="Planning"){
                    $pl_dependence_first += $dependence_first_score->rank_1_11;
                }
                else{
                    $pl_dependence_first = 0;
                }
                if($dependence_first_score->value_12=="Depth"){
                    $de_dependence_first += $dependence_first_score->rank_1_12;
                }
                else{
                    $de_dependence_first = 0;
                }
            }
        }
        else{
            $dependence_first = 0;
            $ex_dependence_first = 0;
            $ext_dependence_first = 0;
            $re_dependence_first = 0;
            $pe_dependence_first = 0;
            $co_dependence_first = 0;
            $rec_dependence_first = 0;
            $con_dependence_first = 0;
            $pl_dependence_first = 0;
            $de_dependence_first = 0;
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
            $ext_total_dependence = $ext_dependence_first;
            $ex_total_dependence = $ex_dependence_first;
            $re_total_dependence = $re_dependence_first;
            $pe_total_dependence = $pe_dependence_first;
            $co_total_dependence = $co_dependence_first;
            $rec_total_dependence = $rec_dependence_first;
            $con_total_dependence = $con_dependence_first;
            $pl_total_dependence = $pl_dependence_first;
            $de_total_dependence = $de_dependence_first;
        }
        else{
            $total_dependence = $dependence_first + 0;
            $ex_total_dependence = $ex_dependence_first;
            $ext_total_dependence = $ext_dependence_first;
            $re_total_dependence = $re_dependence_first;
            $pe_total_dependence = $pe_dependence_first;
            $co_total_dependence = $co_dependence_first;
            $rec_total_dependence = $rec_dependence_first;
            $con_total_dependence = $con_dependence_first;
            $pl_total_dependence = $pl_dependence_first;
            $de_total_dependence = $de_dependence_first;
        }

        if (array_key_exists("dependence_second",$arr_dependence1)){
            $second = count($arr_dependence1['dependence_second']);
            $dependence_second = 0;
            $ex_dependence_second = 0;
            $ext_dependence_second = 0;
            $re_dependence_second = 0;
            $pe_dependence_second = 0;
            $co_dependence_second = 0;
            $rec_dependence_second = 0;
            $con_dependence_second = 0;
            $pl_dependence_second = 0;
            $de_dependence_second = 0;
            foreach($arr_dependence1['dependence_second'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_second_score = Answers::select('rank_2nd','value_4','rank_2_4','value_3','rank_2_3','value_8','rank_2_8','value_6','rank_2_6','value_5','rank_2_5','value_7','rank_2_7',
                'value_9','rank_2_9','value_11','rank_2_11','value_12','rank_2_12')->where('value_2',$ps['answer']['second'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_second += $dependence_second_score->rank_2nd;
                if($dependence_second_score->value_4=="explicit"){
                    $ex_dependence_second += $dependence_second_score->rank_2_4;
                }
                else{
                    $ex_dependence_second = 0;
                }
                if($dependence_second_score->value_3=="external"){
                    $ext_dependence_second += $dependence_second_score->rank_2_3;
                }
                else{
                    $ext_dependence_second = 0;
                }
                if($dependence_second_score->value_8=="Repressive"){
                    $re_dependence_second += $dependence_second_score->rank_2_8;
                }
                else{
                    $re_dependence_second = 0;
                }
                if($dependence_second_score->value_6=="Engaged"){
                    $pe_dependence_second += $dependence_second_score->rank_2_6;
                }
                else{
                    $pe_dependence_second = 0;
                }
                if($dependence_second_score->value_5=="Collaborative"){
                    $co_dependence_second += $dependence_second_score->rank_2_5;
                }
                else{
                    $co_dependence_second = 0;
                }
                if($dependence_second_score->value_7=="Reciprocating"){
                    $rec_dependence_second += $dependence_second_score->rank_2_7;
                }
                else{
                    $rec_dependence_second = 0;
                }
                if($dependence_second_score->value_9=="Considered"){
                    $con_dependence_second += $dependence_second_score->rank_2_9;
                }
                else{
                    $con_dependence_second = 0;
                }
                if($dependence_second_score->value_11=="Planning"){
                    $pl_dependence_second += $dependence_second_score->rank_2_11;
                }
                else{
                    $pl_dependence_second = 0;
                }
                if($dependence_second_score->value_12=="Depth"){
                    $de_dependence_second += $dependence_second_score->rank_2_12;
                }
                else{
                    $de_dependence_second = 0;
                }
            }
            
        }
        else{
            $dependence_second = 0;
            $ex_dependence_second = 0;
            $ext_dependence_second = 0;
            $re_dependence_second = 0;
            $pe_dependence_second = 0;
            $co_dependence_second = 0;
            $rec_dependence_second = 0;
            $con_dependence_second = 0;
            $pl_dependence_second = 0;
            $de_dependence_second = 0;
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
            $ext_total_dependence_second = $ext_dependence_second;
            $re_total_dependence_second = $re_dependence_second;
            $pe_total_dependence_second = $pe_dependence_second;
            $co_total_dependence_second = $co_dependence_second;
            $rec_total_dependence_second = $rec_dependence_second;
            $con_total_dependence_second = $con_dependence_second;
            $pl_total_dependence_second = $pl_dependence_second;
            $de_total_dependence_second = $de_dependence_second;
        }
        else{
            $total_dependence_second = $dependence_second + 0;
            $ex_total_dependence_second = $ex_dependence_second;
            $ext_total_dependence_second = $ext_dependence_second;
            $re_total_dependence_second = $re_dependence_second;
            $pe_total_dependence_second = $pe_dependence_second;
            $co_total_dependence_second = $co_dependence_second;
            $rec_total_dependence_second = $rec_dependence_second;
            $con_total_dependence_second = $con_dependence_second;
            $pl_total_dependence_second = $pl_dependence_second;
            $de_total_dependence_second = $de_dependence_second;
        }
        if (array_key_exists("dependence_third",$arr_dependence1)){
            $third = count($arr_dependence1['dependence_third']);
            $dependence_third = 0;
            $ex_dependence_third = 0;
            $ext_dependence_third = 0;
            $re_dependence_third = 0;
            $pe_dependence_third = 0;
            $co_dependence_third = 0;
            $rec_dependence_third = 0;
            $con_dependence_third = 0;
            $pl_dependence_third = 0;
            $de_dependence_third = 0;
            foreach($arr_dependence1['dependence_third'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_third_score = Answers::select('rank_3rd','value_4','rank_3_4','value_3','rank_3_3','value_8','rank_3_8','value_6','rank_3_6','value_5','rank_3_5','value_7','rank_3_7',
                'value_9','rank_3_9','value_11','rank_3_11','value_12','rank_3_12')->where('value_2',$ps['answer']['third'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_third += $dependence_third_score->rank_3rd;
                if($dependence_third_score->value_4=="explicit"){
                    $ex_dependence_third += $dependence_third_score->rank_3rd;
                }
                else{
                    $ex_dependence_third = 0;
                }
                if($dependence_third_score->value_3=="external"){
                    $ext_dependence_third += $dependence_third_score->rank_3_3;
                }
                else{
                    $ext_dependence_third = 0;
                }
                if($dependence_third_score->value_8=="Repressive"){
                    $re_dependence_third += $dependence_third_score->rank_3_8;
                }
                else{
                    $re_dependence_third = 0;
                }
                if($dependence_third_score->value_6=="Engaged"){
                    $pe_dependence_third += $dependence_third_score->rank_3_6;
                }
                else{
                    $pe_dependence_third = 0;
                }
                if($dependence_third_score->value_5=="Collaborative"){
                    $co_dependence_third += $dependence_third_score->rank_3_5;
                }
                else{
                    $co_dependence_third = 0;
                }
                if($dependence_third_score->value_7=="Reciprocating"){
                    $rec_dependence_third += $dependence_third_score->rank_3_7;
                }
                else{
                    $rec_dependence_third = 0;
                }
                if($dependence_third_score->value_9=="Considered"){
                    $con_dependence_third += $dependence_third_score->rank_3_9;
                }
                else{
                    $con_dependence_third = 0;
                }
                if($dependence_third_score->value_11=="Planning"){
                    $pl_dependence_third += $dependence_third_score->rank_3_11;
                }
                else{
                    $pl_dependence_third = 0;
                }
                if($dependence_third_score->value_12=="Depth"){
                    $de_dependence_third += $dependence_third_score->rank_3_12;
                }
                else{
                    $de_dependence_third = 0;
                }
                
            }
        }
        else{
            $dependence_third = 0;
            $ex_dependence_third = 0;
            $ext_dependence_third = 0;
            $re_dependence_third = 0;
            $pe_dependence_third = 0;
            $co_dependence_third = 0;
            $rec_dependence_third = 0;
            $con_dependence_third = 0;
            $pl_dependence_third = 0;
            $de_dependence_third = 0;
        }

        if (array_key_exists("dependence_last",$arr_dependence1)){
            $last = count($arr_dependence1['dependence_last']);
            $dependence_last = 0;
            $ex_dependence_last = 0;
            $ext_dependence_last = 0;
            $re_dependence_last = 0;
            $pe_dependence_last = 0;
            $co_dependence_last = 0;
            $rec_dependence_last = 0;
            $con_dependence_last = 0;
            $pl_dependence_last = 0;
            $de_dependence_last = 0;
            foreach($arr_dependence1['dependence_last'] as $ps){
                $get_qid = Quiz::select('id')->where('question_no',$ps['answer'][0])->where('status','0')->first();
                $dependence_last_score = Answers::select('rank_last','value_4','rank_4_4','value_3','rank_4_3','value_8','rank_4_8','value_6','rank_4_6','value_5','rank_4_5','value_7','rank_4_7',
                'value_9','rank_4_9','value_11','rank_4_11','value_12','rank_4_12')->where('value_2',$ps['answer']['last'])->where('quiz_question_id',$get_qid->id)->first();
                $dependence_last += $dependence_last_score->rank_last;
                if($dependence_last_score->value_4=="explicit"){
                    $ex_dependence_last += $dependence_last_score->rank_4_4;
                }
                else{
                    $ex_dependence_last = 0;
                }
                if($dependence_last_score->value_3=="external"){
                    $ext_dependence_last += $dependence_last_score->rank_4_3;
                }
                else{
                    $ext_dependence_last = 0;
                }
                if($dependence_last_score->value_8=="Repressive"){
                    $re_dependence_last += $dependence_last_score->rank_4_8;
                }
                else{
                    $re_dependence_last = 0;
                }
                if($dependence_last_score->value_6=="Engaged"){
                    $pe_dependence_last += $dependence_last_score->rank_4_6;
                }
                else{
                    $pe_dependence_last = 0;
                }
                if($dependence_last_score->value_5=="Collaborative"){
                    $co_dependence_last += $dependence_last_score->rank_4_5;
                }
                else{
                    $co_dependence_last = 0;
                }
                if($dependence_last_score->value_7=="Reciprocating"){
                    $rec_dependence_last += $dependence_last_score->rank_4_7;
                }
                else{
                    $rec_dependence_last = 0;
                }
                if($dependence_last_score->value_9=="Considered"){
                    $con_dependence_last += $dependence_last_score->rank_4_9;
                }
                else{
                    $con_dependence_last = 0;
                }
                if($dependence_last_score->value_11=="Planning"){
                    $pl_dependence_last += $dependence_last_score->rank_4_11;
                }
                else{
                    $pl_dependence_last = 0;
                }
                if($dependence_last_score->value_12=="Depth"){
                    $de_dependence_last += $dependence_last_score->rank_4_12;
                }
                else{
                    $de_dependence_last = 0;
                }
            }
           
         }
        else{
            $dependence_last = 0;
            $ex_dependence_last = 0;
            $ext_dependence_last = 0;
            $re_dependence_last = 0;
            $pe_dependence_last = 0;
            $co_dependence_last = 0;
            $rec_dependence_last = 0;
            $con_dependence_last = 0;
            $pl_dependence_last = 0;
            $de_dependence_last = 0;
        } 
        /*Co-Dependence End*/
        /*Explicit Start*/
        $ex_dependence = $ex_total_dependence + $ex_total_dependence_second + $dependence_third - $dependence_last;
        $ex_control = $ex_total_control + $ex_total_control_second + $control_third - $control_last;
        $ex_complaint = $ex_total_complaint + $ex_total_complaint_second + $complaint_third - $complaint_last;
        $shadow_explicit = $ex_dependence + $ex_control+ $ex_complaint;
       
        /*Explicit End*/
        /*Implicit Start*/
        $im_defense = $im_total_defense + $im_total_defense_second + $defense_third - $defense_last;
        $im_collapse = $im_total_collapse + $im_total_collapse_second + $collapse_third - $collapse_last;
        $im_addiction = $im_total_addiction + $im_total_addiction_second + $addiction_third - $addiction_last;
        $shadow_implicit = $im_defense + $im_collapse + $im_addiction;
        /*Implicit End*/
        $complaint_total = $total_complaint+$total_complaint_second+$complaint_third-$complaint_last-2;
        $defense_total = $total_defense + $total_defense_second + $defense_third - $defense_last;
        $avoidance_total = $total_avoidance + $total_avoidance_second + $avoidance_third - $avoidance_last;
        $anxious_total = $total_anxious + $total_anxious_second + $anxious_third - $anxious_last;
        $control_total = $total_control + $total_control_second + $control_third - $control_last -2;
        $collapse_total = $total_collapse + $total_collapse_second + $collapse_third - $collapse_last;
        $addiction_total = $total_addiction + $total_addiction_second + $addiction_third - $addiction_last+2;
        $dependence_total = $total_dependence + $total_dependence_second + $dependence_third - $dependence_last;
      
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

       /* Shadow Percentage Start*/
       $shadow_per = array(
        'defense_complaint'  => round($defense_total/($complaint_total+$defense_total)*100),
        'control_collapse'  => round($collapse_total/($control_total+$collapse_total)*100),
        'avoidance_anxious'  => round($anxious_total/($avoidance_total+$anxious_total)*100),
        'addiction_dependence'  => round($dependence_total/($addiction_total+$dependence_total)*100),
       );
       /* Shadow Percentage End*/
       
       /* Reactive Start*/
        $complaint_reactive = $re_total_complaint+$re_total_complaint_second+$re_complaint_third-$re_complaint_last;
        $control_reactive = $re_total_control + $re_total_control_second + $re_control_third - $re_control_last;
        $addiction_reactive = $re_total_addiction + $re_total_addiction_second + $re_addiction_third - $re_addiction_last;
        $reactive = $complaint_reactive + $control_reactive + $addiction_reactive;
       /* Reactive End*/

       /*Repressive Start */
       $defense_repressive = $re_total_defense + $re_total_defense_second + $re_defense_third - $re_defense_last;
       $collapse_repressive = $re_total_collapse + $re_total_collapse_second + $re_collapse_third - $re_collapse_last;
       $dependence_repressive = $re_total_dependence + $re_dependence_third + $re_dependence_third- $re_dependence_last;
       $repressive = $defense_repressive + $collapse_repressive + $dependence_repressive;
       /*Repressive End */
      $reactive_repressive = array('reactive'=>$reactive,'repressive'=>$repressive);

      /*Parenting Autonomous Start*/
      $auto_control = $pa_total_control + $pa_total_control_second + $pa_control_third - $pa_control_last;
      $auto_avoidance = $pa_total_avoidance + $pa_total_avoidance_second + $pa_avoidance_third - $pa_avoidance_last;
      $auto_addiction = $pa_total_addiction +  $pa_total_addiction_second + $pa_addiction_third - $pa_addiction_last;
      $shadow_autonomous = $auto_control + $auto_avoidance + $auto_addiction;
      /*Parenting Autonomous End*/

      /*Parenting Engaged Start*/
      $eng_collapse = $pe_total_collapse + $pe_total_collapse_second + $pe_collapse_third - $pe_collapse_last;
      $eng_anxious = $pe_total_anxious + $pe_total_anxious_second + $pe_anxious_third - $pe_anxious_last;
      $eng_dependence = $pe_total_dependence + $pe_total_dependence_second + $pe_dependence_third - $pe_dependence_last;
      $shadow_engaged = $eng_collapse + $eng_anxious + $eng_dependence;
      /*Parenting Engaged End*/

      /*Parenting Structured Start Achievement*/
      $st_complaint = $st_total_complaint + $st_total_complaint_second + $st_complaint_third - $st_complaint_last;
      $st_control = $st_total_control + $st_total_control_second + $st_control_third - $st_control_last;
      $shadow_structred = $st_complaint + $st_control;
    //   print_r($shadow_structred);exit();
      /*Parenting Structured End*/

      /*Parenting Opened Start Acceptance*/
      $op_collapse = $op_total_collapse + $op_total_collapse_second + $op_collapse_third - $op_collapse_last;
      $op_defense = $im_total_defense + $im_total_defense_second + $defense_third - $defense_last;
      $shadow_opened = $op_collapse + $op_defense;
      /*Parenting Opened End*/

      /*Internal Start */
      $internal_control = $int_total_control + $int_total_control_second + $int_control_third - $int_control_last;
      $internal_avoidance = $p_total_avoidance + $p_total_avoidance_second + $p_avoidance_third - $p_avoidance_last;
      $internal_addiction = $int_total_addiction +  $int_total_addiction_second + $int_addiction_third - $int_addiction_last;
      $shadow_internal = $internal_control + $internal_avoidance + $internal_addiction;
      /*Internal End */

      /*External Start */
      $external_collapse = $ext_total_collapse + $ext_total_collapse_second + $ext_collapse_third - $ext_collapse_last;
      $external_dependence = $ext_total_dependence + $ext_total_dependence_second + $ext_dependence_third - $ext_dependence_last;
      $external_anxious = $eng_total_anxious + $eng_total_anxious_second + $eng_anxious_third - $eng_anxious_last;
      $shadow_external = $external_collapse + $external_dependence + $external_anxious;
      /*External End */
      
      /*Directive Start */
      $directive_control = $di_total_control + $di_total_control_second + $di_control_third - $di_control_last;
      $directive_avoidance = $di_total_avoidance + $di_total_avoidance_second + $di_avoidance_third - $di_avoidance_last;
      $directive_addiction = $di_total_addiction +  $di_total_addiction_second + $di_addiction_third - $di_addiction_last;
      $shadow_directive = $directive_control + $directive_avoidance + $directive_addiction;
      /*Directive End */

      /*Collaborative Start */
      $col_collapse = $co_total_collapse + $co_total_collapse_second + $co_collapse_third - $co_collapse_last;
      $col_dependence = $co_total_dependence + $co_total_dependence_second + $co_dependence_third - $co_dependence_last;
      $col_anxious = $co_total_anxious + $co_total_anxious_second + $co_anxious_third - $co_anxious_last;
      $shadow_col = $col_collapse + $col_dependence + $col_anxious;
      /*Collaborative End */
      /*Intuitive Start */
      $in_avoidance = $it_total_avoidance + $it_total_avoidance_second + $it_avoidance_third - $it_avoidance_last;
      $in_addiction = $it_total_addiction +  $it_total_addiction_second + $it_addiction_third - $it_addiction_last;
      $in_anxious = $it_total_anxious + $it_total_anxious_second + $it_anxious_third - $it_anxious_last;
      $shadow_in = $in_avoidance + $in_addiction + $in_anxious;
      /*Intuitive End */
      /*Considered Start */
      $con_collapse = $con_total_collapse + $con_total_collapse_second + $con_collapse_third - $con_collapse_last;
      $con_dependence = $con_total_dependence + $con_total_dependence_second + $con_dependence_third - $con_dependence_last;
      $con_control = $con_total_control + $con_total_control_second + $con_control_third - $con_control_last;
      $shadow_con = $con_collapse + $con_dependence + $con_control;
      /*Considered End */
      /*Initiate Start */
      $initiate_complaint = $in_total_complaint + $in_total_complaint_second + $in_complaint_third - $in_complaint_last;
      $initiate_control = $in_total_control + $in_total_control_second + $in_control_third - $in_control_last;
      $initiate_addiction = $in_total_addiction +  $in_total_addiction_second + $in_addiction_third - $in_addiction_last;
      $shadow_initiate = $initiate_complaint + $initiate_control + $initiate_addiction;
      /*Initiate End */
      /*Reciprocating Start */
      $re_collapse = $rec_total_collapse + $rec_total_collapse_second + $rec_collapse_third - $rec_collapse_last;
      $re_dependence = $rec_total_dependence + $rec_total_dependence_second + $rec_dependence_third - $rec_dependence_last;
      $re_defense = $rec_total_defense + $rec_total_defense_second + $rec_defense_third - $rec_defense_last;
      $shadow_re = $re_collapse + $re_dependence + $re_defense;
      /*Reciprocating End */
      /*Planning Start*/
      $pl_dependence = $pl_total_dependence + $pl_total_dependence_second + $pl_dependence_third - $pl_dependence_last;
      $pl_defense = $pl_total_defense + $pl_total_defense_second + $pl_defense_third - $pl_defense_last;
      $pl_anxious = $pl_total_anxious + $pl_total_anxious_second + $pl_anxious_third - $pl_anxious_last;
      $shadow_planning = $pl_dependence + $pl_defense + $pl_anxious;
      /*Planning End*/
      /*Spontaneity Start */
      $sp_complaint = $sp_total_complaint + $sp_total_complaint_second + $sp_complaint_third - $sp_complaint_last;
      $sp_addiction = $sp_total_addiction +  $sp_total_addiction_second + $sp_addiction_third - $sp_addiction_last;
      $sp_avoidance = $sp_total_avoidance + $sp_total_avoidance_second + $sp_avoidance_third - $sp_avoidance_last;
      $shadow_spontaneity = $sp_complaint + $sp_addiction + $sp_avoidance;
      /*Spontaneity End */

      /*Variety Start */
      $var_addiction = $v_total_addiction +  $v_total_addiction_second + $v_addiction_third - $v_addiction_last;
      $var_avoidance = $v_total_avoidance + $v_total_avoidance_second + $v_avoidance_third - $v_avoidance_last;
      $shadow_var = $var_addiction + $var_avoidance;
      /*Variety End */

      /*Depth Start*/
      $dep_dependence = $de_total_dependence + $de_total_dependence_second + $de_dependence_third - $de_dependence_last;
      $dep_anxious = $de_total_anxious + $de_total_anxious_second + $de_anxious_third - $de_anxious_last;
      $shadow_depth = $dep_dependence + $dep_anxious;
      /*Depth End*/
         /*Insert Start*/
        // $insert = DB::table('shadow_scores')->insert([
        //     'user_id'       => '1', 
        //     'complaint'     => $complaint, 
        //     'defense'       => $defense, 
        //     'avoidance'     => $avoidance, 
        //     'anxious'       => $anxious, 
        //     'control'       => $control, 
        //     'collapse'      => $collapse, 
        //     'dependence'    => $dependence, 
        //     'addiction'     => $passion_total, 
        //     
        // ]);
        /*Insert End*/
        return  array('complaint'=>$complaint,'defense'=>$defense,'avoidance'=>$avoidance,'anxious'=>$anxious,'control'=>$control,'collapse'=>$collapse,'addiction'=>$addiction,'dependence'=>$dependence,'shadow_explicit'=>$shadow_explicit,'shadow_implicit'=>$shadow_implicit,'reactive_repressive'=>$reactive_repressive,'shadow_autonomous'=>$shadow_autonomous,'shadow_engaged'=>$shadow_engaged,'shadow_structred'=>$shadow_structred,'shadow_opened'=>$shadow_opened,'shadow_internal'=>$shadow_internal,'shadow_external'=>$shadow_external,'shadow_directive' => $shadow_directive,'shadow_col'=>$shadow_col,'shadow_in'=>$shadow_in,'shadow_con'=>$shadow_con,'shadow_initiate'=>$shadow_initiate,'shadow_re'=>$shadow_re,'shadow_planning'=>$shadow_planning,'shadow_spontaneity'=>$shadow_spontaneity,'shadow_var'=>$shadow_var,'shadow_depth'=>$shadow_depth,'shadow_per'=>$shadow_per);
 
        

    }


 
}


