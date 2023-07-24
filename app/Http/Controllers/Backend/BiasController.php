<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;


class BiasController extends Controller
{
    public function adjust_answer_bias(){
        $get_all = DB::table('bias')->get();
        $get_score = DB::table('relationship_scores')->leftJoin('shadow_scores', 'relationship_scores.formid', '=', 'shadow_scores.formid')->get();
        $data = DB::table('relationship_scores')->select('possibility','appreciation','truth','harmony','freedom','devotion','passion','partnership')->get();
        $shadow_scores = DB::table('shadow_scores')->select('complaint','defense','control','collapse','avoidance','anxious','addiction','co_dependence')->get();
        $possibility_1 =0;
        $appreciation_1 =0;
        $truth_1 =0;
        $harmony_1 =0;
        $freedom_1 =0;
        $devotion_1 =0;
        $passion_1 =0;
        $partnership_1 =0;

        $complaint_1 =0;
        $defense_1 =0;
        $control_1 =0;
        $collapse_1 =0;
        $avoidance_1 =0;
        $anxious_1 =0;
        $addiction_1 =0;
        $co_dependence_1 =0;
        foreach($data as $d){
            $dd = (array)$d;
            $maxs = array_search(max($dd), $dd);
            $maxs=="possibility"?$possibility_1 ++ :0;
            $maxs=="appreciation"?$appreciation_1 ++ :0;
            $maxs=="truth"?$truth_1 ++ :0;
            $maxs=="harmony"?$harmony_1 ++ :0;
            $maxs=="freedom"?$freedom_1 ++ :0;
            $maxs=="devotion"?$devotion_1 ++ :0;
            $maxs=="passion"?$passion_1 ++ :0;
            $maxs=="partnership"?$partnership_1 ++ :0;
        }

        foreach($shadow_scores as $s){
            $ss = (array)$s;
            $max_s = array_search(max($ss), $ss);
            $max_s=="complaint"?$complaint_1 ++ :0;
            $max_s=="defense"?$defense_1 ++ :0;
            $max_s=="control"?$control_1 ++ :0;
            $max_s=="collapse"?$collapse_1 ++ :0;
            $max_s=="avoidance"?$avoidance_1 ++ :0;
            $max_s=="anxious"?$anxious_1 ++ :0;
            $max_s=="addiction"?$addiction_1 ++ :0;
            $max_s=="co_dependence"?$co_dependence_1 ++ :0;
        }

        $ranking = array(
            '0'=> round($possibility_1/count($get_score)*100),
            '1'=> round($appreciation_1/count($get_score)*100),
            '2'=> round($truth_1/count($get_score)*100),
            '3'=> round($harmony_1/count($get_score)*100),
            '4'=> round($freedom_1/count($get_score)*100),
            '5'=> round($devotion_1/count($get_score)*100),
            '6'=> round($passion_1/count($get_score)*100),
            '7'=> round($partnership_1/count($get_score)*100),
            '8'=> round($complaint_1/count($shadow_scores)*100),
            '9'=> round($defense_1/count($shadow_scores)*100),
            '10'=> round($control_1/count($shadow_scores)*100),
            '11'=> round($collapse_1/count($shadow_scores)*100),
            '12'=> round($avoidance_1/count($shadow_scores)*100),
            '13'=> round($anxious_1/count($shadow_scores)*100),
            '14'=> round($addiction_1/count($shadow_scores)*100),
            '15'=> round($co_dependence_1/count($shadow_scores)*100),
        );


        $temp = array();
       
        $possibility = 0;
        $appreciation = 0;
        $truth = 0;
        $harmony = 0;
        $freedom = 0;
        $devotion = 0;
        $passion = 0;
        $partnership = 0;
        $internal = 0;
        $external = 0;
        $explicit = 0;
        $implicit = 0;
        $reactive = 0;
        $repressive = 0;
        $directive = 0;
        $collaborative = 0;
        $instinctive = 0;
        $considered = 0;
        $autonomous = 0;
        $engaged = 0;
        $achievement = 0;
        $acceptance = 0;
        $initiating = 0;
        $reciprocating = 0;
        $planning = 0;
        $spontaneity = 0;
        $variety = 0;
        $depth = 0;
        $complaint = 0;
        $defense = 0;
        $control = 0;
        $collapse = 0;
        $avoidance = 0;
        $anxious = 0;
        $addiction = 0;
        $co_dependence = 0;
        


        foreach($get_score as $get_score_value){
            $possibility += $get_score_value->possibility;   
            $appreciation += $get_score_value->appreciation;   
            $truth += $get_score_value->truth;   
            $harmony += $get_score_value->harmony;   
            $freedom += $get_score_value->freedom;   
            $devotion += $get_score_value->devotion;           
            $passion += $get_score_value->passion;   
            $partnership += $get_score_value->partnership;   
            $internal += $get_score_value->internal;   
            $external += $get_score_value->external;   
            $explicit += $get_score_value->explicit;   
            $implicit += $get_score_value->implicit;   
            $reactive += $get_score_value->reactive;   
            $repressive += $get_score_value->repressive;   
            $directive += $get_score_value->directive;   
            $collaborative += $get_score_value->collaborative;   
            $instinctive += $get_score_value->instinctive;   
            $considered += $get_score_value->considered;   
            $autonomous += $get_score_value->autonomous; 
            $engaged += $get_score_value->engaged;   
            $achievement += $get_score_value->achievement;   
            $acceptance += $get_score_value->acceptance;   
            $initiating += $get_score_value->initiating;   
            $reciprocating += $get_score_value->reciprocating;   
            $planning += $get_score_value->planning;   
            $spontaneity += $get_score_value->spontaneity;   
            $variety += $get_score_value->variety;   
            $depth += $get_score_value->depth;   
            $complaint += $get_score_value->complaint;   
            $defense += $get_score_value->defense;   
            $control += $get_score_value->control;   
            $collapse += $get_score_value->collapse;   
            $avoidance += $get_score_value->avoidance;   
            $anxious += $get_score_value->anxious;   
            $addiction += $get_score_value->addiction;   
            $co_dependence += $get_score_value->co_dependence;   
        }
        $total = $possibility + $appreciation + $truth + $harmony + $freedom + $devotion + $passion + $partnership + $internal + $external + $explicit + $implicit + $reactive + $repressive + $directive + $collaborative + $instinctive + $considered + $autonomous + $engaged + $achievement + $acceptance + $initiating + $reciprocating + $planning + $spontaneity + $variety + $depth
        + $complaint + $defense + $control + $collapse + $avoidance + $anxious + $addiction + $co_dependence;

        $total_array = array(
            "0"=>($possibility/$total)*100,
            "1"=>($appreciation/$total)*100,
            "2"=>($truth/$total)*100,
            "3"=>($harmony/$total)*100,
            "4"=>($freedom/$total)*100,
            "5"=>($devotion/$total)*100,
            "6"=>($passion/$total)*100,
            "7"=>($partnership/$total)*100,
            "8"=>($complaint/$total)*100,
            "9"=>($defense/$total)*100,
            "10"=>($control/$total)*100,
            "11"=>($collapse/$total)*100,
            "12"=>($avoidance/$total)*100,
            "13"=>($anxious/$total)*100,
            "14"=>($addiction/$total)*100,
            "15"=>($co_dependence/$total)*100,
            );

        // echo "<pre>";
        // print_r($total_array);
        

        //echo $depth;exit;
        return view('backend.bias.adjust-answer-bias',compact('get_all','total','total_array','ranking'));
    }
    
    public function update_bias(Request $request){
        $save_click = $request->save_click;
        $input_value = $request->input_value;


        $update_bias = DB::table('bias')->where('id',$save_click)->update(['bias'=>$input_value]);
        

        if($update_bias){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);            
        } 
    }
}
