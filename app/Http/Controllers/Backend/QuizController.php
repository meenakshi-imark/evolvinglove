<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;

class QuizController extends Controller
{
    public function index(){
        $quiz_all = DB::table('welcome_screen')->where('id',1)->first();
        $started = DB::table('formdata')->get();
        $started_quiz = count($started);
        $completed = DB::table('payments')->get();
        $completed_quiz = count($completed);
        return view('backend.quiz.quiz-listing',compact('quiz_all','started_quiz','completed_quiz'));
    }

    public function welcome_screen(){
        $welcome_screen_data = DB::table('welcome_screen')->where('id',1)->first();
        return view('backend.quiz.welcome_screen',compact('welcome_screen_data'));
    }

    public function welcone_screen_add(Request $request){
        $welcome_screen_data = DB::table('welcome_screen')->where('id',1)->first();
        // if($request->hasfile('welcome_image')){
        //     $file = $request->file('welcome_image');
        //     $extension = $file->getClientOriginalName();
        //     $filename = time().'_'.$extension;
        //     $location = 'images/backend/quiz/';
        //     $file->move($location,$filename);
        //     $welcome_image = $filename; 
        // }
        // else{
        //     $welcome_screen = $welcome_screen_data->welcome_screen;
        // }

        if($welcome_screen_data == null){
            $welcome_screen_insert = DB::table('welcome_screen')->insert([
                'welcome_title'=>$request->welcome_title,
                'welcome_description'=>$request->welcome_description,
                'welcome_Button'=>$request->welcome_Button,
                'no1_text'=>$request->no1_text,
                'no2_text'=>$request->no2_text,
                // 'welcome_image'=>$welcome_image,
            ]);
        }else{
            $welcome_screen_insert = DB::table('welcome_screen')->where('id',1)->update([
                'welcome_title'=>$request->welcome_title,
                'welcome_description'=>$request->welcome_description,
                'welcome_Button'=>$request->welcome_Button,
                'no1_text'=>$request->no1_text,
                'no2_text'=>$request->no2_text,
                // 'welcome_image'=>$welcome_image,
            ]);
        } 
        return Redirect('admin/all-quiz')->with('welcome_screen', 'Content updated successfully');       
    }


    public function welcome_background_image(Request $request){
        //
    }

    public function welcome_background_image_link(Request $request){
        //
    }

    public function score_quiz($id){
        $question_by_id = DB::table('quiz_question')->where('id',$id)->first();        
        $question_option_decode = DB::table('quiz_question_options')->where('quiz_question_id',$id)->get();
        // echo "<pre>";
        // print_r($question_option_decode);exit;
        $all_type_que = DB::table('type_question')->get();
        return view('backend.quiz.score_quiz',compact('question_by_id','question_option_decode','all_type_que'));
    }

    public function edit_question($id){
        $question_by_id = DB::table('quiz_question')->where('id',$id)->first();        
        //$question_option_decode = json_decode($question_by_id->question_option,true);
        return view('backend.quiz.edit-question',compact('question_by_id'));
    }

    public function quiz_question_edit(Request $request, $id){
        $question_update = DB::table('quiz_question')->where('id',$id)->update([
            'question_type'=> $request->question_type_field,
            'question'=> $request->question,
            ]);
        
            return Redirect('admin/all-question')->with('update', 'Question update successfully');
       
    }

    public function score_quiz_all(){
        return view('backend.quiz.score-quize-all');
    }    

// Add question section

    public function question_multiple_choice(){
        return view('backend.quiz.add-question');
    }

    public function question_short_text(){
        return view('backend.quiz.add-question_short-text');
    }

    public function question_long_text(){
        return view('backend.quiz.add-question_long-text');
    }

    public function question_yes_no(){
        return view('backend.quiz.add-question_yes-no');
    }

    public function question_ranking(){
        return view('backend.quiz.add-question_ranking');
    }

    public function question_email(){
        return view('backend.quiz.add-question_email');
    }

    public function question_phone_number(){
        return view('backend.quiz.add-question_phone-number');
    }

    public function question_question_number(){
        return view('backend.quiz.add-question_number');
    }

    public function question_rating(){
        return view('backend.quiz.add-question_rating');
    }

    public function question_date(){
        return view('backend.quiz.add-question_date');
    }

    public function question_end_screen(){
        return view('backend.quiz.add-question_end-screen');
    }

    public function multiple_question(Request $request){
        
        if(isset($request->is_required)){
            $is_required = $request->is_required;
        }else{
            $is_required = 0;
        }

        if(isset($request->is_multipleselection)){
            $is_multipleselection = $request->is_multipleselection;
        }else{
            $is_multipleselection = 0;
        }

        if(isset($request->is_maxchar)){
            $is_maxchar = $request->is_maxchar_no;
        }else{
            $is_maxchar = 0;
        }

        

        

        

        // echo $type_q_no;exit;
        $get_lastid = DB::table('quiz_question')->max('question_no');
        
        
        if($request->question_type == "multiple_choice_click"){

            if($request->is_score_que == 1){
               
                if($request->question_type == 'multiple_choice_click'){
                    $score_type = "yes";
                }
                if($request->variation == 1){
                    $variation = 2;
                }else{
                    $variation = 1;
                }
                if(isset($request->is_multipleselection)){
                    $question_type = "multiple_choice";
                }else{
                    $question_type = $request->question_type;
                }
                $insert_question = DB::table('quiz_question')->insertGetId([
                    'question_type'=>$question_type,
                    'type_question'=>$request->type_question,
                    'score_type'=>$score_type,
                    'variation'=>$variation,
                    'question'=>$request->question,
                    'description'=>$request->description,        
                    'question_no'=>$get_lastid+1,
                    'is_required'=> $is_required,
                    'is_multipleselection'=>$is_multipleselection

                ]);
                $lastid = $insert_question;

                if( ($request['question_option'][0] && $request['question_option'][1] && $request['question_option'][2] && $request['question_option'][3] && $request['question_option'][4] && $request['question_option'][5] && $request['question_option'][6] && $request['question_option'][7]) != '' ){

                    for($i=0; $i<=7; $i++){
                        $insert_option = DB::table('quiz_question_options')->insert([
                            'quiz_question_id'=>$lastid,
                            'quiz_question_no'=>$lastid.'a',
                            'opton'=>$request['question_option'][$i],
                            'value'=>$request['value'][$i],
                            'value_2'=>$request['value_2'][$i],
                            'value_3'=>$request['value_3'][$i],
                            'value_4'=>$request['value_4'][$i],
                            'value_5'=>$request['value_5'][$i],
                            'value_6'=>$request['value_6'][$i],
                            'value_7'=>$request['value_7'][$i]          

                        ]);
                    }
                }

                if( ($request['question_option_2'][0] && $request['question_option_2'][1] && $request['question_option_2'][2] && $request['question_option_2'][3] && $request['question_option_2'][4] && $request['question_option_2'][5] && $request['question_option_2'][6] && $request['question_option_2'][7]) != '' ){
                    for($i=0; $i<=7; $i++){
                        $insert_option = DB::table('quiz_question_options')->insert([
                            'quiz_question_id'=>$lastid.'_1',
                            'quiz_question_no'=>$lastid.'b',
                            'opton'=>$request['question_option_2'][$i],
                            'value'=>$request['value_2'][$i],
                            'value_2'=>$request['value_2_2'][$i],
                            'value_3'=>$request['value_3_2'][$i],
                            'value_4'=>$request['value_4_2'][$i],
                            'value_5'=>$request['value_5_2'][$i],
                            'value_6'=>$request['value_6_2'][$i],
                            'value_7'=>$request['value_7_2'][$i]          

                        ]);
                    }
                }

            }
            else{
                $count_simple_option = count($request->simple_option);            
                // $question_number = $request->question_no;
                // $question_no = DB::table('quiz_question')->get();
                // $get = array();
                // foreach($question_no as $question_no_value){
                //     if($question_no_value->question_no >= $question_number){
                //         $get[] = $question_no_value->id;
                //     }
                // }        

                // foreach($get as $get_value){
                    
                //     $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                //     $updatevalue = $getvalue_byid->question_no+1;
                //     $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
                // }
                $score_type = '';
                $variation = '';
                $type_question = null;
                if(isset($request->is_multipleselection)){
                    $question_type = "multiple_choice";
                }else{
                    $question_type = $request->question_type;
                }
                $insert_question = DB::table('quiz_question')->insertGetId([
                    'question_type'=>$question_type,
                    'type_question'=>$type_question,
                    'score_type'=>$score_type,
                    'variation'=>$variation,
                    'question'=>$request->question,
                    'description'=>$request->description,        
                    'question_no'=>$get_lastid+1,
                    'is_required'=> $is_required,
                    'is_multipleselection'=>$is_multipleselection
                ]);
                $lastid = $insert_question;
                for($i=0; $i<=$count_simple_option-1; $i++){
                    $insert_option = DB::table('quiz_question_options')->insert([
                        'quiz_question_id'=>$lastid,
                        'opton'=>$request['simple_option'][$i],
                        

                    ]);
                }
            }
        }else{
            //echo "Hello";exit;
            $question_number = $get_lastid+1;
            // $question_no = DB::table('quiz_question')->get();
            // $get = array();
            // foreach($question_no as $question_no_value){
            //     if($question_no_value->question_no >= $question_number){
            //         $get[] = $question_no_value->id;
            //     }
            // }        

            // foreach($get as $get_value){
                
            //     $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
            //     $updatevalue = $getvalue_byid->question_no+1;
            //     $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
            // }
            $score_type = '';
            $variation = '';
                
            $insert_question = DB::table('quiz_question')->insert([
                'question_type'=>$request->question_type,
                'type_question'=>null,
                'score_type'=>$score_type,
                'variation'=>$variation,
                'question'=>$request->question,
                'description'=>$request->description,        
                'question_no'=>$question_number,
                'is_required'=> $is_required,
                'is_multipleselection'=>$is_multipleselection,
                'is_maxchar'=>$is_maxchar
            ]);
        }




        


        

        
        if($insert_question){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);            
        } 

        // return redirect('admin/add-question_multiple-choice')->with('question_added','Question add successfully');
    }

    // public function all_submit_quiz(){
    //     $all_submit_quiz = DB::table('formdata')->orderBy('formdata.id', 'desc')
    //     ->join('users','formdata.userid','=','users.id')->select(
            
    //         'users.name as username',
    //         'users.email as useremail',
    //         'formdata.ontraport_id as formdataontraport_id',)->get();
    //     // echo "<pre>";
    //     // print_r($all_submit_quiz);exit;
        
    //     return view('backend.all-submit-quiz',compact('all_submit_quiz'));
    // }

    public function all_submit_quiz(){
        $all_submit_quiz = DB::table('formdata')->orderBy('id', 'desc')->get();
        // echo "<pre>";
        // print_r($all_submit_quiz);exit;
        
        return view('backend.all-submit-quiz',compact('all_submit_quiz'));
    }

    public function all_question(){
        $all_question = DB::table('quiz_question')->orderBy('id', 'desc')->get();
        return view('backend.quiz.all-questions',compact('all_question'));
    }

    public function score_quiz_question(){
        $all_question = DB::table('quiz_question')->orderBy('id', 'asc')->where('score_type',"yes")->get();
        // echo "<pre>";
        // print_r($all_question);exit;
        return view('backend.quiz.all-score-question',compact('all_question'));
    }

    public function rank1_submit(Request $request){
        // echo "<pre>";
        // print_r($request->all());exit;
        if($request->type == "Primary Gift"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1st' => $request->rank_1_number        
            ]);
            
        }elseif($request->type == "Primary Shadow"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_2' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Reference"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_3' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Communication Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_4' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Decision-Making Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_5' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Parenting Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_6' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Erotic Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_7' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Communication Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_8' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Decision-Making Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_9' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Parenting Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_10' => $request->rank_1_number        
            ]);            
        }elseif($request->type == "Erotic Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_11' => $request->rank_1_number        
            ]);            
        }
        elseif($request->type == "Erotic Style 3"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid'])->update([
                'rank_1_12' => $request->rank_1_number        
            ]);            
        }
        if($update){
            //echo "hello";exit;
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);
            
        }
        
    }

    public function rank2_submit(Request $request){

        if($request->type == "Primary Gift"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2nd' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Primary Shadow"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_2' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Reference"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_3' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Communication Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_4' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Decision-Making Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_5' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Parenting Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_6' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Erotic Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_7' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Communication Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_8' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Decision-Making Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_9' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Parenting Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_10' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Erotic Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_11' => $request->rank_2_number        
            ]);
        }elseif($request->type == "Erotic Style 3"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank2'])->update([
                'rank_2_12' => $request->rank_2_number        
            ]);
        }
        if($update){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);            
        }        
    }

    public function rank3_submit(Request $request){

        if($request->type == "Primary Gift"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3rd' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Primary Shadow"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_2' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Reference"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_3' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Communication Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_4' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Decision-Making Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_5' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Parenting Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_6' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Erotic Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_7' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Communication Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_8' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Decision-Making Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_9' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Parenting Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_10' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Erotic Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_11' => $request->rank_3_number        
            ]);
        }elseif($request->type == "Erotic Style 3"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
                'rank_3_12' => $request->rank_3_number        
            ]);
        }
        // $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank3'])->update([
        //         'rank_3rd' => $request->rank_3_number        
        //     ]);
       
        if($update){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);            
        }        
    }

    public function rank4_submit(Request $request){
        if($request->type == "Primary Gift"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_last' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Primary Shadow"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_2' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Reference"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_3' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Communication Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_4' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Decision-Making Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_5' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Parenting Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_6' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Erotic Style"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_7' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Communication Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_8' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Decision-Making Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_9' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Parenting Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_10' => $request->rank_4_number        
            ]);
        }elseif($request->type == "Erotic Style 2"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_11' => $request->rank_4_number        
            ]);
        }
        elseif($request->type == "Erotic Style 3"){
            $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
                'rank_4_12' => $request->rank_4_number        
            ]);
        }
        // $update = DB::table('quiz_question_options')->where('id',$request['question_optionid_rank4'])->update([
        //     'rank_last' => $request->rank_4_number        
        // ]);
        if($update){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);            
        }        
    }

    public function form1_select(Request $request){
        if($request->select_1_value == "Primary Gift"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value','rank_1st')->first();
            $ty_value = $ty->value;
            $ty_rank_value = $ty->rank_1st;

        }elseif($request->select_1_value == "Primary Shadow"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_2','rank_1_2')->first();
            $ty_value = $ty->value_2;
            $ty_rank_value = $ty->rank_1_2;
        }elseif($request->select_1_value == "Reference"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_3','rank_1_3')->first();
            $ty_value = $ty->value_3;
            $ty_rank_value = $ty->rank_1_3;
        }elseif($request->select_1_value == "Communication Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_4','rank_1_4')->first();
            //$ty = $ty->value_4;
            $ty_value = $ty->value_4;
            $ty_rank_value = $ty->rank_1_4;
        }elseif($request->select_1_value == "Decision-Making Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_5','rank_1_5')->first();
            //$ty = $ty->value_5;
            $ty_value = $ty->value_5;
            $ty_rank_value = $ty->rank_1_5;
        }elseif($request->select_1_value == "Parenting Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_6','rank_1_6')->first();
            //$ty = $ty->value_6;
            $ty_value = $ty->value_6;
            $ty_rank_value = $ty->rank_1_6;
        }elseif($request->select_1_value == "Erotic Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_7','rank_1_7')->first();
            //$ty = $ty->value_7;
            $ty_value = $ty->value_7;
            $ty_rank_value = $ty->rank_1_7;
        }elseif($request->select_1_value == "Communication Style 2"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_8','rank_1_8')->first();
            //$ty = $ty->value_7;
            $ty_value = $ty->value_8;
            $ty_rank_value = $ty->rank_1_8;
        }elseif($request->select_1_value == "Decision-Making Style 2"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_9','rank_1_9')->first();
            //$ty = $ty->value_7;
            $ty_value = $ty->value_9;
            $ty_rank_value = $ty->rank_1_9;
        }elseif($request->select_1_value == "Parenting Style 2"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_10','rank_1_10')->first();
            //$ty = $ty->value_7;
            $ty_value = $ty->value_10;
            $ty_rank_value = $ty->rank_1_10;
        }elseif($request->select_1_value == "Erotic Style 2"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_11','rank_1_11')->first();
            //$ty = $ty->value_7;
            $ty_value = $ty->value_11;
            $ty_rank_value = $ty->rank_1_11;
        }elseif($request->select_1_value == "Erotic Style 3"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_1_id)->select('value_12','rank_1_12')->first();
            //$ty = $ty->value_7;
            $ty_value = $ty->value_12;
            $ty_rank_value = $ty->rank_1_12;
        }
        
        
        //$response = $ty;
        //return json_encode(['ty_value'=>$ty_value,'ty_rank_value'=>$ty_rank_value]); 
        return response(['ty_value'=>$ty_value,'ty_rank_value'=>$ty_rank_value]); 
    }

    public function form2_select(Request $request){
        
        if($request->select_2_value == "Primary Gift"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value','rank_2nd')->first();
            $ty_value = $ty->value;
            $ty_rank_value = $ty->rank_2nd;
        }elseif($request->select_2_value == "Primary Shadow"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value_2','rank_2_2')->first();
            $ty_value = $ty->value_2;
            $ty_rank_value = $ty->rank_2_2;
        }elseif($request->select_2_value == "Reference"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value_3','rank_2_3')->first();
            $ty_value = $ty->value_3;
            $ty_rank_value = $ty->rank_2_3;
        }elseif($request->select_2_value == "Communication Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value_4','rank_2_4')->first();
            $ty_value = $ty->value_4;
            $ty_rank_value = $ty->rank_2_4;
        }elseif($request->select_2_value == "Decision-Making Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value_5','rank_2_5')->first();
            $ty_value = $ty->value_5;
            $ty_rank_value = $ty->rank_2_5;
        }elseif($request->select_2_value == "Parenting Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value_6','rank_2_6')->first();
            $ty_value = $ty->value_6;
            $ty_rank_value = $ty->rank_2_6;
        }elseif($request->select_2_value == "Erotic Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_2_id)->select('value_7','rank_2_7')->first();
            $ty_value = $ty->value_7;
            $ty_rank_value = $ty->rank_2_7;
        }

        return response(['ty_value'=>$ty_value,'ty_rank_value'=>$ty_rank_value]); 
        
    }

    public function form3_select(Request $request){
        
        if($request->select_3_value == "Primary Gift"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value','rank_3rd')->first();
            $ty_value = $ty->value;
            $ty_rank_value = $ty->rank_3rd;
        }elseif($request->select_3_value == "Primary Shadow"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value_2','rank_3_2')->first();
            $ty_value = $ty->value_2;
            $ty_rank_value = $ty->rank_3_2;
        }elseif($request->select_3_value == "Reference"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value_3','rank_3_3')->first();
            $ty_value = $ty->value_3;
            $ty_rank_value = $ty->rank_3_3;
        }elseif($request->select_3_value == "Communication Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value_4','rank_3_4')->first();
            $ty_value = $ty->value_4;
            $ty_rank_value = $ty->rank_3_4;
        }elseif($request->select_3_value == "Decision-Making Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value_5','rank_3_5')->first();
            $ty_value = $ty->value_5;
            $ty_rank_value = $ty->rank_3_5;
        }elseif($request->select_3_value == "Parenting Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value_6','rank_3_6')->first();
            $ty_value = $ty->value_6;
            $ty_rank_value = $ty->rank_3_6;
        }elseif($request->select_3_value == "Erotic Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_3_id)->select('value_7','rank_3_7')->first();
            $ty_value = $ty->value_7;
            $ty_rank_value = $ty->rank_3_7;
        }
        return response(['ty_value'=>$ty_value,'ty_rank_value'=>$ty_rank_value]); 
    }

    public function form4_select(Request $request){
        
        if($request->select_4_value == "Primary Gift"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value','rank_last')->first();
            $ty_value = $ty->value;
            $ty_rank_value = $ty->rank_last;
        }elseif($request->select_4_value == "Primary Shadow"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value_2','rank_4_2')->first();
            $ty_value = $ty->value_2;
            $ty_rank_value = $ty->rank_4_2;
        }elseif($request->select_4_value == "Reference"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value_3','rank_4_3')->first();
            $ty_value = $ty->value_3;
            $ty_rank_value = $ty->rank_4_3;
        }elseif($request->select_4_value == "Communication Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value_4','rank_4_4')->first();
            $ty_value = $ty->value_4;
            $ty_rank_value = $ty->rank_4_4;
        }elseif($request->select_4_value == "Decision-Making Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value_5','rank_4_5')->first();
            $ty_value = $ty->value_5;
            $ty_rank_value = $ty->rank_4_5;
        }elseif($request->select_4_value == "Parenting Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value_6','rank_4_6')->first();
            $ty_value = $ty->value_6;
            $ty_rank_value = $ty->rank_4_6;
        }elseif($request->select_4_value == "Erotic Style"){
            $ty = DB::table('quiz_question_options')->where('id',$request->select_4_id)->select('value_7','rank_4_7')->first();
            $ty_value = $ty->value_7;
            $ty_rank_value = $ty->rank_4_7;
        }
        return response(['ty_value'=>$ty_value,'ty_rank_value'=>$ty_rank_value]); 
    }


    public function welcome_form_submit(Request $request){
        $response = array();
        if($request->file('welcome_image_upload')){
            $file = $request->file('welcome_image_upload');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = public_path(). '/dashboard/welcomescreen';
            $file->move($location,$filename);
            $welcome_image_upload = $filename;
        }
        $update = DB::table('welcome_screen')->where('id',1)->update([
          'welcome_upload_image' => $welcome_image_upload,
        ]);


        if($update){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            echo json_encode($response);            
        } 
       
    }


    public function delete_question(){
        $deleteid = $_GET['delete_id'];

        $get_deleteid = DB::table('quiz_question')->where('id',$deleteid)->select('question_no')->first();
        
   
        $delete = DB::table('quiz_question')->where('id',$deleteid)->delete();
        $delete_options = DB::table('quiz_question_options')->where('quiz_question_id',$deleteid)->delete();

        if($delete){
            // echo "<pre>";
            // print_r($get_deleteid->question_no);exit;
            $question_no = DB::table('quiz_question')->select('question_no','id')->get();
            $get = array();
            foreach($question_no as $question_no_value){
                if($question_no_value->question_no >= $get_deleteid->question_no){
                    $get[] = $question_no_value->id;
                }
            }  

            // echo "<pre>";
            // print_r($get);exit;      

            foreach($get as $get_value){
                
                $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                $updatevalue = $getvalue_byid->question_no-1;
                $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no-1]);
            }

            $response['status'] = 1;
        $response['msg'] = 'Data updated successfully';
        return response($response);
        }



    }

     public function quizdetail($id){
        $get_quizdata = DB::table('relationship_scores')->where('formid',$id)->first();
        if(isset($get_quizdata)){

            $get_user = DB::table('users')->where('id',$get_quizdata->user_id)->first();
        }else{
            $get_user = "No data found";
        }
      
        return view('backend.quiz.quiz-detal',compact('get_quizdata','get_user'));


     }

     public function update_answer(){
        $updateid = $_GET['updateid'];
       
        $update = DB::table('quiz_question_options')->where('id',$updateid)->update([
            'opton'=>$_GET['updateanswer']]);
        if($update){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            return response($response);
        }
     }

     public function update_que()
     {
        $ques = $_GET['ques'];
        $quesid = $_GET['quesid'];
        $update = DB::table('quiz_question')->where('id',$quesid)->update(["question"=>$ques]);
        if($update){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            return response($response);
        }
     }

     public function adminfeedback(){
        $get_feedback = DB::table('feedback')->join("formdata","feedback.formid","=","formdata.id")->get();
        return view('backend.feedback.feedback',compact('get_feedback'));
     }

     public function feedback_detail($id){
        $feedback_id = DB::table('feedback')->where('feedback.formid',$id)->join("formdata","feedback.formid","=","formdata.id")->first();
        // echo "<pre>";
        // print_r($feedback_id);exit;
         $userdata = DB::table('users')->where('id',$feedback_id->userid)->first();
      
        return view('backend.feedback.feedback-detail',compact('feedback_id','userdata'));
     }

     public function pubdata(){
        $draf_data = DB::table('quiz_question')->where('status',1)->get();
        

        foreach($draf_data as $draf_value){
            if($draf_value->type_question == 1){
                $type_q_no  = DB::table('quiz_question')->where('type_question',1)->where('status',0)->max('question_no');
                $question_number = $type_q_no + 1;
                $question_no = DB::table('quiz_question')->get();
                $get = array();
                foreach($question_no as $question_no_value){
                    if($question_no_value->question_no >= $question_number){
                        $get[] = $question_no_value->id;
                    }
                }        

                foreach($get as $get_value){
                    
                    $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                    $updatevalue = $getvalue_byid->question_no+1;
                    $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
                }

                $update_status = DB::table('quiz_question')->where('id',$draf_value->id)->update(['status'=>0,'question_no'=>$question_number]);
            }elseif($draf_value->type_question == 2){
                $type_q_no  = DB::table('quiz_question')->where('type_question',2)->where('status',0)->max('question_no');
                $question_number = $type_q_no + 1;
                $question_no = DB::table('quiz_question')->get();
                $get = array();
                foreach($question_no as $question_no_value){
                    if($question_no_value->question_no >= $question_number){
                        $get[] = $question_no_value->id;
                    }
                }        

                foreach($get as $get_value){
                    
                    $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                    $updatevalue = $getvalue_byid->question_no+1;
                    $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
                }

                $update_status = DB::table('quiz_question')->where('id',$draf_value->id)->update(['status'=>0,'question_no'=>$question_number]);
            }else{
                $type_q_no  = DB::table('quiz_question')->where('status',0)->max('question_no');
                $question_number = $type_q_no + 1;
                $question_no = DB::table('quiz_question')->get();
                $get = array();
                foreach($question_no as $question_no_value){
                    if($question_no_value->question_no >= $question_number){
                        $get[] = $question_no_value->id;
                    }
                }        

                foreach($get as $get_value){
                    
                    $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                    $updatevalue = $getvalue_byid->question_no+1;
                    $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
                }

                $update_status = DB::table('quiz_question')->where('id',$draf_value->id)->update(['status'=>0,'question_no'=>$question_number]);
            }
            // $option_to_edit = DB::table('quiz_question_options')
            // $update_option = DB::table('quiz_question_options')->where('quiz_question_id',$draf_value->id)
        }


        if($update_status){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            return response($response);
        }
     }


    public function publish_qus(){
        $pub_id = $_GET['publish_id'];
        $pub_data = DB::table('quiz_question')->where('id',$pub_id)->first();


        if($pub_data->type_question == 1){
            $type_q_no  = DB::table('quiz_question')->where('type_question',1)->where('status',0)->max('question_no');
            $question_number = $type_q_no + 1;
            $question_no = DB::table('quiz_question')->get();
            $get = array();
            foreach($question_no as $question_no_value){
                if($question_no_value->question_no >= $question_number){
                    $get[] = $question_no_value->id;
                }
            }        

            foreach($get as $get_value){
                
                $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                $updatevalue = $getvalue_byid->question_no+1;
                $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
            }
            $update_status = DB::table('quiz_question')->where('id',$pub_data->id)->update(['status'=>0,'question_no'=>$question_number]);
        }elseif($pub_data->type_question == 2){
            $type_q_no  = DB::table('quiz_question')->where('type_question',2)->where('status',0)->max('question_no');
            $question_number = $type_q_no + 1;
            $question_no = DB::table('quiz_question')->get();
            $get = array();
            foreach($question_no as $question_no_value){
                if($question_no_value->question_no >= $question_number){
                    $get[] = $question_no_value->id;
                }
            }        

            foreach($get as $get_value){
                
                $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                $updatevalue = $getvalue_byid->question_no+1;
                $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
            }
            $update_status = DB::table('quiz_question')->where('id',$pub_data->id)->update(['status'=>0,'question_no'=>$question_number]);
        }else{
            $type_q_no  = DB::table('quiz_question')->where('status',0)->max('question_no');

            $question_number = $type_q_no + 1;
            $question_no = DB::table('quiz_question')->get();
            $get = array();
            foreach($question_no as $question_no_value){
                if($question_no_value->question_no >= $question_number){
                    $get[] = $question_no_value->id;
                }
            }        

            foreach($get as $get_value){
                
                $getvalue_byid = DB::table('quiz_question')->where('id',$get_value)->select('question_no')->first();
                $updatevalue = $getvalue_byid->question_no+1;
                $update = DB::table('quiz_question')->where('id',$get_value)->update(['question_no'=>$getvalue_byid->question_no+1]);
            }

            $update_status = DB::table('quiz_question')->where('id',$pub_data->id)->update(['status'=>0,'question_no'=>$question_number]);
        }


        $dec_data = DB::table('quiz_question')->where('id', '>', $pub_id)->where('status',1)->get();
      
      
        foreach($dec_data as $dec_data_value){
                
            $getvalue_byid = DB::table('quiz_question')->where('id',$dec_data_value->id)->select('question_no')->first();
            // echo "<pre>";
            // print_r($getvalue_byid->question_no);exit;
            $updatevalue = $getvalue_byid->question_no-1;
            $update = DB::table('quiz_question')->where('id',$dec_data_value->id)->update(['question_no'=>$updatevalue]);
        }

        if($update_status){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            return response($response);
        }


    }

     




}