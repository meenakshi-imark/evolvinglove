<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Answers;
class QuestionController extends Controller
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
       session()->forget('form');
       session()->forget('formid');
       session()->forget('after4');
       session()->forget('after10');
       return view('frontend.questions');
    }

    public function formdata(Request $request){
      $arr = implode('|',$request['question19']);
        $a =
        array(  
       'question1' =>array ('answer1' =>$request->question1,), 
     
       'question2' =>array ('answer1' =>$request->question2,), 
     
       'question3' =>array ('answer1' =>$request->question3,), 
     
       'question4' =>array ('answer1' =>$request->question4,), 
     
     
       'question5' =>array ('answer' =>array ('first' => $request->question5[4],'second' => $request->question5[5], 'third'=>$request->question5[6], 'last'=> $request->question5[7]),), 
     
       'question6' =>array ('answer' =>array ('first' => $request->question6[4],'second' => $request->question6[5], 'third'=>$request->question6[6], 'last'=> $request->question6[7]),), 
     
       'question7' =>array ('answer' =>array ('first' => $request->question7[4],'second' => $request->question7[5], 'third'=>$request->question7[6], 'last'=> $request->question7[7]),), 
     
       'question8' =>array ('answer' =>array ('first' => $request->question8[4],'second' => $request->question8[5], 'third'=>$request->question8[6], 'last'=> $request->question8[7]),), 
     
       'question9' =>array ('answer' =>array ('first' => $request->question9[4],'second' => $request->question9[5], 'third'=>$request->question9[6], 'last'=> $request->question9[7]),), 
     
       'question10' =>array ('answer' =>array ('first' => $request->question10[4],'second' => $request->question10[5], 'third'=>$request->question10[6], 'last'=> $request->question10[7]),), 
     
     
       
     
       'question11' =>array ('answer' =>array ('first' => $request->question11[4],'second' => $request->question11[5], 'third'=>$request->question11[6], 'last'=> $request->question11[7]),), 
     
       'question12' =>array ('answer' =>array ('first' => $request->question12[4],'second' => $request->question12[5], 'third'=>$request->question12[6], 'last'=> $request->question12[7]),), 
     
       'question13' =>array ('answer' =>array ('first' => $request->question13[4],'second' => $request->question13[5], 'third'=>$request->question13[6], 'last'=> $request->question13[7]),), 
     
       'question14' =>array ('answer' =>array ('first' => $request->question14[4],'second' => $request->question14[5], 'third'=>$request->question14[6], 'last'=> $request->question14[7]),), 
     
       'question15' =>array ('answer' =>array ('first' => $request->question15[4],'second' => $request->question15[5], 'third'=>$request->question15[6], 'last'=> $request->question15[7]),), 
     
       'question16' =>array ('answer' =>array ('first' => $request->question16[4],'second' => $request->question16[5], 'third'=>$request->question16[6], 'last'=> $request->question16[7]),), 
     
       'question17' =>array ('answer' =>array ('first' => $request->question17[4],'second' => $request->question17[5], 'third'=>$request->question17[6], 'last'=> $request->question17[7]),), 

     
       'question18' =>array ('gender' =>$request->question18,), 
     
       'question19' =>array ('invested' =>$arr,), 
     
       'question20' =>array ('firstname' =>$request->question20,), 
     
       'question21' =>array ('lastname' =>$request->question21,), 
     
       'question22' =>array ('email' =>$request->question22,), 
     
       'question23' =>array ('email_consent' =>$request->question23,), 
     
       'question24' =>array ('countrycode' =>$request->countryCode,'phone'=>$request->number,), 
     
       'question25' =>array ('phone_consent' =>$request->question24,), 
     
      ); 
     

  
      if(Auth::check()){
        $userid = auth()->user()->id;
      }
      else{
        $userid = null;
      }
      $data = json_encode($a);
      $insert = DB::table('formdata')->insertGetId([
        'data'      =>$data,
        'userid'    =>$userid,
      ]);
      
      Session::put('formid', $insert);
      // if(auth()->user()->paid_user==0){
      //   return redirect('/free-report');
      // }
      // else{
      // return redirect('result-summary');
      // }

      $response['status'] = 1;
      $response['msg'] = 'Data submitted successfully.'; 
      echo json_encode($response);
    }

    public function question(){

      return view('frontend.question');
    }
    
    public function get_questions(Request $request){
      $get_question = Quiz::where('status','0')->first();
      $get_close = Quiz::select('id','question_no')->where('id','>',$get_question->id)->where('status','0')->first();
      $get_answers = Answers::where('quiz_question_id',$get_question->id)->get();
      $result ="";
      if($get_question->is_required=="1"){
        $astrick = "*";
        $class="required";
      }
      else{
      $astrick ="";
      $class="notrequired";
      }
      $result .="<div class='inner'>
                    <h3 class='quiz-question'>
                      <span><small>1)</small>".$get_question->question."".$astrick."</span>
                    </h3>
                    <div class='form type-checkbox w-100 mb-3'>";
                    
                    if($get_question->question_type=="multiple_choice_click"){
                      foreach($get_answers as $ans){
                      $result .='<label>
                                <input type="radio" class="question'.$get_question->id.' '.$class.'" name="question'.$get_question->question_no.'" value="'.$ans->opton.'">
                                <span>'.$ans->opton.'</span>
                              </label>';
                      }
                      $result .=' <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>';
                    }
                    $result .='</div>
                    <a href="javascript:void(0);" class="btn btn-white mt-3" id="next1" onClick="nextquestion('.$get_close->question_no.','."'$get_question->question_type'".');">Next</a>
                  </div>
                  <div class="bottom-links">
                  <a class="btn btn-green prev" href="javascript:void(0);" id="qstn1" onClick="nextquestion('.$get_close->question_no.','."'$get_question->question_type'".');"><i class="fas fa-angle-down"></i></a>
                  </div>';
          return Response($result);
         }

    public function add_session(Request $request){
      Session::put('after4','yes');
      $data = session()->all();     
      $request->merge(["question"=>$data['form']['question4']]); 
      return $this->get_next_questions($request);
    }

    public function add_shadow_session(Request $request){
      Session::put('after10','yes');
      $data = session()->all();      
      $request->merge(["question"=>$data['form']['question10']]); 
      return $this->get_next_questions($request);
    }

    public function get_next_questions(Request $request){
      $get_question = Quiz::where('question_no',$request['id'])->where('status','0')->first();
      $letter = 'A';
      if($request['ispre']){
        $iid = $get_question->question_no; 
      }
      else{
      $iid = $get_question->question_no-1;
      }
      $getid = $get_question->qustion_no-1;
      // echo $iid;
      Session::put('form.question'.$iid, $request['question']);
      $data = session()->all();
      if($request['ispre']){
        $get_pre_val = $data['form']['question'.$iid];
      }
     
      $get_close = Quiz::select('id','type_question','question_no')->where('question_no',$get_question->question_no+1)->where('status','0')->first();
      // echo'<pre>';print_r($get_close);echo'</pre>';
      $get_previous = Quiz::select('id','type_question','question_no','question_type')->where('question_no','<',$get_question->question_no)->where('status','0')->orderBy('question_no','DESC')->first();
      if($get_close){
      $pre = $get_question->question_no-1;
      $get_prev = Quiz::select('id','type_question')->where('question_no',$pre)->where('status','0')->first();
      if($get_question->variation =="2" && $data['form']['question3']!="Romantic partner"){
        $get_answers = Answers::where('quiz_question_id',$get_question->id.'_1')->get();
      }
      else{
        $get_answers = Answers::where('quiz_question_id',$get_question->id)->where('quiz_question_id','!=',$get_question->id.'_1')->get();
      }      
      }
      else{
        $get_answers = Answers::where('quiz_question_id',$get_question->id)->get();
      }
    
      $result ="";

     
     
        if($get_previous){
          $pid = $get_previous->question_no;
        }
      
        if($get_close){
        $qid = $get_close->question_no;
        }

        /*Question type for each question*/
        if($get_question->question_type=="multiple_choice_click" && $get_question->type_question!=null){
          $type = "swipe_question";
        }
        elseif($get_question->question_type=="multiple_choice_click" && $get_question->type_question==null){
          $type = "multiple_choice_click";
        }
        elseif($get_question->question_type=="yes_no_click"){
          $type = "yes_no_click";
        }
        elseif($get_question->question_type=="short_text_click"){
          $type = "short_text_click";
        }
        elseif($get_question->question_type=="email_click"){
          $type = "email_click";
        }
        elseif($get_question->question_type=="phone_click"){
          $type = "phone_click";
        }
        elseif($get_question->question_type=="multiple_choice"){
          $type = "multiple_choice";
        }
        elseif($get_question->question_type=="number_click"){
          $type = "number_click";
        }
        elseif($get_question->question_type=="long_text_click"){
          $type = "long_text_click";
        }
        elseif($get_question->question_type=="date_click"){
          $type = "date_click";
        }
      
        if(strpos($get_question->question, "[Selected partner]") !== false){ 
         $questions = str_replace("[Selected partner]", $data['form']['question3'], $get_question->question);
        } 
        elseif(strpos($get_question->question, "[Partner name]") !== false){
          $questions = str_replace("[Partner name]", $data['form']['question4'], $get_question->question);
        }
        else{
           $questions = $get_question->question;
        }
        if(isset($data['form']['question2'])){
        if($data['form']['question2']=="No" && $get_question->id=="4"){
         $astrick ="";
         $class="notrequired";
        }
        else{
          if($get_question->is_required=="1"){
            $astrick = "*";
            $class="required";
          }
          else{
          $astrick ="";
          $class="notrequired";
          }
          
        }
      }
      else{
        $astrick = "*";
        $class="required";
      }

      $maxchar = $get_question->is_maxchar!=null?'maxchar':'';

      
        // if(!isset($data['after4']) && $get_question->section_info=="yes"){
        //   $result .='<div class="inner">
        //               <div id="part1">
        //                 <div class="inner">
        //                     <h2>PART I: YOUR RELATIONSHIP QUALITIES & GIFTS</h2>
        //                     <p>There are 6 questions that each have 8 choices which you will put in <strong>Rank order</strong>. Rank 1st is what is most predominant and Ranked 8th (last) is what is least predominant.</p>
        //                     <a href="javascript:void(0);" class="btn btn-white mt-3" id="next1" onClick="session();">Next</a>
                            
        //                 </div>
        //             </div>
        //         </div>';
        //          session()->forget('after4');
        // }
      
     
        if(!isset($data['after10']) && $get_question->section_info=="1" && isset($data['after4'])){
          $result .= "<div class='inner'>
                        <h2>PART II: YOUR SHADOWS & PATTERNS</h2>
                        <p>There are 7 questions that each have 8 choices which you will put in <strong>Rank order</strong>. Rank 1st is what is most predominant and Ranked 8th (last) is what is least predominant.</p>
                        <p>TIP: It's often helpful to select an actual interaction that is a typical moment of trigger for you when answering the questions that follow so that you have a specific situation in mind.</p>
                        <a href='javascript:void(0);' class='btn btn-white mt-3' id='nextpart2' onClick='sessionadd(".$get_question->question_no.");'>Next</a>
                    </div>";
        }  
        
       else{
      
      $result .="<div class='inner'>
                    <h3 class='quiz-question'>";
                    if($get_question->question_type=="phone_click"){
                      $result .="<span><small>".$get_question->question_no.") </small>".$questions."</span>";
                    }
                    else{
                      $result .="<span><small>".$get_question->question_no.") </small>".$questions."".$astrick."</span>";
                    }
                      
                    $result .="</h3>";
                    if($get_question->description!=NULL){
                      $result .="<p>".$get_question->description."</p>";
                    }
                    if($get_question->question_type=="multiple_choice_click" && $get_question->type_question==null){                    
                      $result .="<div class='form type-checkbox mb-3'>";
                      foreach($get_answers as $ans){
                        if(strpos($get_question->question, "gender") !== false){
                          $value = $ans->value;
                        }
                        else{
                          $value = $ans->opton;
                        }
                       
                      if(isset($data['form']['question'.$get_question->question_no])){
                      $check =$data['form']['question'.$get_question->question_no]==$value ?'checked':'';
                      }
                      else{
                      $check ="";
                      }
                      $result .=
                              '<label>
                                <input type="radio" class="test '.$class.'" name="question'.$get_question->question_no.'" value="'.$value.'" '.$check.'>
                                <span>'.$ans->opton.'</span>
                              </label>';
                      }
                     
                      $result .='<label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>';
                      $result .="</div>";
                    }

                    elseif($get_question->question_type=="multiple_choice"){
                      $result .="<div class='form type-checkbox mb-3'>";
                      foreach($get_answers as $ans){
                        if(isset($data['form']['question'.$get_question->question_no])){
                          if(strpos($data['form']['question'.$get_question->question_no], $ans->opton) !== false){
                            $checkmulti ="checked";
                          }
                          else{
                            $checkmulti ="";
                          }
                         
                          }
                          else{
                          $checkmulti ="";
                          }
                          $result .=
                                  '<label>
                                    <input type="checkbox" class="test '.$class.'" name="question'.$get_question->question_no.'" value="'.$ans->opton.'" '.$checkmulti.'>
                                    <span>'.$ans->opton.'</span>
                                  </label>';
                          
                      }
                    $result .='<label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>';
                    $result .="</div>";
                    }

                    elseif($get_question->question_type=="yes_no_click"){
                      if(isset($data['form']['question'.$get_question->question_no])){
                        $yeschk = $data['form']['question'.$get_question->question_no]=="Yes" ?'checked':'';
                        $nochk = $data['form']['question'.$get_question->question_no]=="No" ?'checked':'';
                      }
                      else{
                        $yeschk = "";
                        $nochk ="";
                      }
                      $result .="<div class='form type-checkbox yes-no mb-3'>";
                        $result .='<label>
                        <input type="radio" class="'.$class.'" name="question'.$get_question->question_no.'" value="Yes" '.$yeschk.'>
                        <span>Yes</span>
                      </label>
                      <label>
                        <input type="radio" class="'.$class.'"name="question'.$get_question->question_no.'" value="No" '.$nochk.'>
                        <span>No</span>
                      </label>';
                      $result .='<label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>';
                      $result .="</div>";
                    }
                    /*Short text */
                    elseif($get_question->question_type=="short_text_click"){
                      if(isset($data['form']['question'.$get_question->question_no])){
                        $q_val = $data['form']['question'.$get_question->question_no];
                      }
                      else{
                        $q_val = "";
                      }
                      $result .='
                      <div class="form w-100 mb-3">
                            <input placeholder="Type your answere here..." name="question'.$get_question->question_no.'" type="text" value="'.$q_val.'" class="'.$class.' '.$maxchar.'" max="'.$get_question->is_maxchar.'">
                            <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label></div>';
                    }
                    
                    //Number
                    elseif($get_question->question_type=="number_click"){
                      if(isset($data['form']['question'.$get_question->question_no])){
                        $q_val_num = $data['form']['question'.$get_question->question_no];
                      }
                      else{
                        $q_val_num = "";
                      }
                      $result .='
                      <div class="form w-100 mb-3">
                            <input id="question'.$get_question->question_no.'" placeholder="Type your answere here..." name="question'.$get_question->question_no.'" type="number" value="'.$q_val_num.'" class="'.$class.' '.$maxchar.'" max="'.$get_question->is_maxchar.'">
                            <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label></div>';
                    }

                    /*Longtext*/
                    elseif($get_question->question_type=="long_text_click"){
                      if(isset($data['form']['question'.$get_question->question_no])){
                        $q_val_long = $data['form']['question'.$get_question->question_no];
                      }
                      else{
                        $q_val_long = "";
                      }
                      $result .='
                      <div class="form w-100 mb-3">
                      <textarea id="question'.$get_question->question_no.'" placeholder="Type your answere here..." name="question'.$get_question->question_no.'" class="'.$class.' '.$maxchar.'" max="'.$get_question->is_maxchar.'" style="background: none;color:#fff;">'.$q_val_long.'</textarea>
                      <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label></div>';
                    }

                    /*Date */
                    elseif($get_question->question_type=="date_click"){
                      if(isset($data['form']['question'.$get_question->question_no])){
                        $q_val_d = $data['form']['question'.$get_question->question_no];
                      }
                      else{
                        $q_val_d = "";
                      }
                      $result .='
                      <div class="form w-100 mb-3">
                            <input id="question'.$get_question->question_no.'" placeholder="Select Date" name="question'.$get_question->question_no.'" type="date" value="'.$q_val_d.'" class="'.$class.' '.$maxchar.'" max="'.$get_question->is_maxchar.'">
                            <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label></div>';
                    }

                    /*Drag and drop*/

                    elseif($get_question->question_type=="multiple_choice_click" && $get_question->type_question!=null){
                      $result .='<p><small>Drag and drop to rank your top 3 and bottom ranked choices</small></p>
                      <div class="form type-checkbox type-2 w-100 mb-3 '.$class.'" id="question'.$get_question->question_no.'">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="list-container">';
                                    
                                        $mr = 1;
                                        foreach($get_answers as $ans){
                                          if($get_question->type_question=="1"){
                                            $value_ans = $ans->value;
                                          }
                                          else{
                                            $value_ans = $ans->value_2;
                                          }
                                          if(isset($data['form']['question'.$get_question->question_no])){
                                            if($data['form']['question'.$get_question->question_no]['4']==$value_ans || $data['form']['question'.$get_question->question_no]['5']==$value_ans ||
                                            $data['form']['question'.$get_question->question_no]['6']==$value_ans || $data['form']['question'.$get_question->question_no]['7']==$value_ans){
                                              $result .='<div class="dragitem test" style="background-color:transparent;"></div>
                                              ';
                                            }
                                            else{
                                              $result .='<div class="dragitem test">
                                              <label>';                                            
                                              $result .='<input type="hidden" name="question'.$get_question->question_no.'[]" value="'.$value_ans.'">
                                                  <span><small>'.$letter.'</small>'.$ans->opton.'</span>
                                              </label>
                                             </div>';
                                            }
                                          }
                                          else{
                                            $result .='<div class="dragitem test question'.$ans->id.'"  data-id="question'.$ans->id.'" >
                                                <label data-in="'.$mr.'">';                                            
                                            $result .='<input type="hidden" class="'.$value_ans.'" name="question'.$get_question->question_no.'[]" value="'.$value_ans.'" id="question'.$ans->id.'">
                                                    <span><small>'.$letter.'</small>'.$ans->opton.'</span>
                                                </label>
                                            </div>';
                                          }
                                          $letterAscii = ord($letter);
                                          $letterAscii++;
                                          $letter = chr($letterAscii);
                                          $mr++;
                                        }
                                      
                                    $result .='</div>
                                </div>
                                <div class="col">
                                    <div class="rankOrder-container">
                                        <div class="rankOrder top_rank">
                                            <h4>Rank Top 3 Choices</h4>
                                            <ul>';
                                            if(isset($data['form']['question'.$get_question->question_no])){
                                              if($get_question->type_question=="1"){
                                                $value_d= "value";
                                              }
                                              else{
                                                $value_d= "value_2";
                                              }
                                              $get_drag_ans1 = DB::table('quiz_question_options')->select('opton')->where('quiz_question_id',$get_question->question_no)->where($value_d,$data['form']['question'.$get_question->question_no]['4'])->first();
                                              $get_drag_ans2 = DB::table('quiz_question_options')->select('opton')->where('quiz_question_id',$get_question->question_no)->where($value_d,$data['form']['question'.$get_question->question_no]['5'])->first();
                                              $get_drag_ans3 = DB::table('quiz_question_options')->select('opton')->where('quiz_question_id',$get_question->question_no)->where($value_d,$data['form']['question'.$get_question->question_no]['6'])->first();
                                              $get_drag_ans4 = DB::table('quiz_question_options')->select('opton')->where('quiz_question_id',$get_question->question_no)->where($value_d,$data['form']['question'.$get_question->question_no]['7'])->first();
                                              $get_drag_ans = DB::table('quiz_question_options')->select($value_d)->where('quiz_question_id',$get_question->question_no)->get();
                                              $alpha = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X ','Y','Z');
                                              for($i=0;$i<count($get_drag_ans);$i++){
                                                if($get_drag_ans[$i]->$value_d==$data['form']['question'.$get_question->question_no]['4']){
                                                  $drag1 = $alpha[$i];
                                                }
                                                if($get_drag_ans[$i]->$value_d==$data['form']['question'.$get_question->question_no]['5']){
                                                  $drag2 = $alpha[$i];
                                                }
                                                if($get_drag_ans[$i]->$value_d==$data['form']['question'.$get_question->question_no]['6']){
                                                  $drag3 = $alpha[$i];
                                                }
                                                if($get_drag_ans[$i]->$value_d==$data['form']['question'.$get_question->question_no]['7']){
                                                  $drag4 = $alpha[$i];
                                                }
                                              }
                                              $result .='<li class="draggedTop-value ui-droppable"><label class="ui-draggable ui-draggable-handle" style="left: 1px; top: 1px;"><input type="hidden" name="question'.$get_question->question_no.'[]" value="'.$data['form']['question'.$get_question->question_no]['4'].'">
                                              <span><small>'.$drag1.'</small>'.$get_drag_ans1->opton.'</span>
                                          </label></li>
                                          <li class="draggedTop-value ui-droppable"><label class="ui-draggable ui-draggable-handle" style="left: 1px; top: 1px;"><input type="hidden" name="question'.$get_question->question_no.'[]" value="'.$data['form']['question'.$get_question->question_no]['5'].'">
                                              <span><small>'.$drag2.'</small>'.$get_drag_ans2->opton.'</span>
                                          </label></li>
                                          <li class="draggedTop-value ui-droppable"><label class="ui-draggable ui-draggable-handle" style="left: 1px; top: 1px;"><input type="hidden" name="question'.$get_question->question_no.'[]" value="'.$data['form']['question'.$get_question->question_no]['6'].'">
                                              <span><small>'.$drag3.'</small>'.$get_drag_ans3->opton.'</span>
                                          </label></li>';
                                            }
                                            else{
                                            $result .='<li class="draggedTop-value li1"></li>
                                                <li class="draggedTop-value li2"></li>
                                                <li class="draggedTop-value li3"></li>';
                                            }
                                            $result .='</ul>
                                        </div>
                                        <div class="rankOrder last_rank">
                                            <h4>Rank Last Choice</h4>
                                            <ul>';
                                            if(isset($data['form']['question'.$get_question->question_no])){
                                              $result .='<li class="draggedLast-value ui-droppable"><label class="ui-draggable ui-draggable-handle" style="left: 1px; top: 1px;"><input type="hidden" name="question'.$get_question->question_no.'[]" value="'.$data['form']['question'.$get_question->question_no]['7'].'">
                                              <span><small>'.$drag4.'</small>'.$get_drag_ans3->opton.'</span>
                                            </label></li>';
                                            }
                                            else{
                                            $result .='<li class="draggedLast-value"></li>';
                                            }
                                        $result .='</ul>
                                        </div>
                                    </div>
                                </div>
                                <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>
                            </div>
                        </div>';
                        
                    }
                    elseif($get_question->question_type=="email_click"){
                      if(isset($data['form']['question'.$get_question->question_no])){
                        $mail_val = $data['form']['question'.$get_question->question_no];
                      }
                      else{
                        $mail_val ="";
                      }
                      $result .='<div class="form w-100">
                                <input placeholder="name@example.com" name="question'.$get_question->question_no.'" type="email" value="'.$mail_val.'" class="'.$class.'">
                                <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>
                                </div>
                                <h3 class="quiz-question mt-5">
                                    <span><small>'.$get_question->question_no.'.1) </small> I consent to receive occasional email communications from Relationship Dynamics Institute with announcements, additional resources, special discounts, and access to courses and events.</span>
                                </h3>
                                <div class="form type-checkbox yes-no_format-2 newclass">
                                    <label>
                                        <input type="checkbox" value="" name="email_concent" class="agree">
                                        <span>I agree</span>
                                    </label>
                                    <label style="border: none;"><span class="text-danger" id="question-email_concent"></span></label>
                                </div>';
                    }
                    elseif($get_question->question_type=="phone_click"){
                      $result .='<div class="form w-100">
                      <div class="flex-relative">
                          <select name="countryCode" id="" name="code">
                              <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                              <option data-countryCode="AD" value="376">Andorra (+376)</option>
                              <option data-countryCode="AO" value="244">Angola (+244)</option>
                              <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                              <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                              <option data-countryCode="AR" value="54">Argentina (+54)</option>
                              <option data-countryCode="AM" value="374">Armenia (+374)</option>
                              <option data-countryCode="AW" value="297">Aruba (+297)</option>
                              <option data-countryCode="AU" value="61">Australia (+61)</option>
                              <option data-countryCode="AT" value="43">Austria (+43)</option>
                              <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                              <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                              <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                              <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                              <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                              <option data-countryCode="BY" value="375">Belarus (+375)</option>
                              <option data-countryCode="BE" value="32">Belgium (+32)</option>
                              <option data-countryCode="BZ" value="501">Belize (+501)</option>
                              <option data-countryCode="BJ" value="229">Benin (+229)</option>
                              <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                              <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                              <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                              <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                              <option data-countryCode="BW" value="267">Botswana (+267)</option>
                              <option data-countryCode="BR" value="55">Brazil (+55)</option>
                              <option data-countryCode="BN" value="673">Brunei (+673)</option>
                              <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                              <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                              <option data-countryCode="BI" value="257">Burundi (+257)</option>
                              <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                              <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                              <option data-countryCode="CA" value="1">Canada (+1)</option>
                              <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                              <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                              <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                              <option data-countryCode="CL" value="56">Chile (+56)</option>
                              <option data-countryCode="CN" value="86">China (+86)</option>
                              <option data-countryCode="CO" value="57">Colombia (+57)</option>
                              <option data-countryCode="KM" value="269">Comoros (+269)</option>
                              <option data-countryCode="CG" value="242">Congo (+242)</option>
                              <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                              <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                              <option data-countryCode="HR" value="385">Croatia (+385)</option>
                              <option data-countryCode="CU" value="53">Cuba (+53)</option>
                              <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                              <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                              <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                              <option data-countryCode="DK" value="45">Denmark (+45)</option>
                              <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                              <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                              <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                              <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                              <option data-countryCode="EG" value="20">Egypt (+20)</option>
                              <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                              <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                              <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                              <option data-countryCode="EE" value="372">Estonia (+372)</option>
                              <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                              <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                              <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                              <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                              <option data-countryCode="FI" value="358">Finland (+358)</option>
                              <option data-countryCode="FR" value="33">France (+33)</option>
                              <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                              <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                              <option data-countryCode="GA" value="241">Gabon (+241)</option>
                              <option data-countryCode="GM" value="220">Gambia (+220)</option>
                              <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                              <option data-countryCode="DE" value="49">Germany (+49)</option>
                              <option data-countryCode="GH" value="233">Ghana (+233)</option>
                              <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                              <option data-countryCode="GR" value="30">Greece (+30)</option>
                              <option data-countryCode="GL" value="299">Greenland (+299)</option>
                              <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                              <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                              <option data-countryCode="GU" value="671">Guam (+671)</option>
                              <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                              <option data-countryCode="GN" value="224">Guinea (+224)</option>
                              <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                              <option data-countryCode="GY" value="592">Guyana (+592)</option>
                              <option data-countryCode="HT" value="509">Haiti (+509)</option>
                              <option data-countryCode="HN" value="504">Honduras (+504)</option>
                              <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                              <option data-countryCode="HU" value="36">Hungary (+36)</option>
                              <option data-countryCode="IS" value="354">Iceland (+354)</option>
                              <option data-countryCode="IN" value="91">India (+91)</option>
                              <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                              <option data-countryCode="IR" value="98">Iran (+98)</option>
                              <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                              <option data-countryCode="IE" value="353">Ireland (+353)</option>
                              <option data-countryCode="IL" value="972">Israel (+972)</option>
                              <option data-countryCode="IT" value="39">Italy (+39)</option>
                              <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                              <option data-countryCode="JP" value="81">Japan (+81)</option>
                              <option data-countryCode="JO" value="962">Jordan (+962)</option>
                              <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                              <option data-countryCode="KE" value="254">Kenya (+254)</option>
                              <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                              <option data-countryCode="KP" value="850">Korea North (+850)</option>
                              <option data-countryCode="KR" value="82">Korea South (+82)</option>
                              <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                              <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                              <option data-countryCode="LA" value="856">Laos (+856)</option>
                              <option data-countryCode="LV" value="371">Latvia (+371)</option>
                              <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                              <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                              <option data-countryCode="LR" value="231">Liberia (+231)</option>
                              <option data-countryCode="LY" value="218">Libya (+218)</option>
                              <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                              <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                              <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                              <option data-countryCode="MO" value="853">Macao (+853)</option>
                              <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                              <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                              <option data-countryCode="MW" value="265">Malawi (+265)</option>
                              <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                              <option data-countryCode="MV" value="960">Maldives (+960)</option>
                              <option data-countryCode="ML" value="223">Mali (+223)</option>
                              <option data-countryCode="MT" value="356">Malta (+356)</option>
                              <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                              <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                              <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                              <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                              <option data-countryCode="MX" value="52">Mexico (+52)</option>
                              <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                              <option data-countryCode="MD" value="373">Moldova (+373)</option>
                              <option data-countryCode="MC" value="377">Monaco (+377)</option>
                              <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                              <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                              <option data-countryCode="MA" value="212">Morocco (+212)</option>
                              <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                              <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                              <option data-countryCode="NA" value="264">Namibia (+264)</option>
                              <option data-countryCode="NR" value="674">Nauru (+674)</option>
                              <option data-countryCode="NP" value="977">Nepal (+977)</option>
                              <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                              <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                              <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                              <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                              <option data-countryCode="NE" value="227">Niger (+227)</option>
                              <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                              <option data-countryCode="NU" value="683">Niue (+683)</option>
                              <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                              <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                              <option data-countryCode="NO" value="47">Norway (+47)</option>
                              <option data-countryCode="OM" value="968">Oman (+968)</option>
                              <option data-countryCode="PW" value="680">Palau (+680)</option>
                              <option data-countryCode="PA" value="507">Panama (+507)</option>
                              <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                              <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                              <option data-countryCode="PE" value="51">Peru (+51)</option>
                              <option data-countryCode="PH" value="63">Philippines (+63)</option>
                              <option data-countryCode="PL" value="48">Poland (+48)</option>
                              <option data-countryCode="PT" value="351">Portugal (+351)</option>
                              <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                              <option data-countryCode="QA" value="974">Qatar (+974)</option>
                              <option data-countryCode="RE" value="262">Reunion (+262)</option>
                              <option data-countryCode="RO" value="40">Romania (+40)</option>
                              <option data-countryCode="RU" value="7">Russia (+7)</option>
                              <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                              <option data-countryCode="SM" value="378">San Marino (+378)</option>
                              <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                              <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                              <option data-countryCode="SN" value="221">Senegal (+221)</option>
                              <option data-countryCode="CS" value="381">Serbia (+381)</option>
                              <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                              <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                              <option data-countryCode="SG" value="65">Singapore (+65)</option>
                              <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                              <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                              <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                              <option data-countryCode="SO" value="252">Somalia (+252)</option>
                              <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                              <option data-countryCode="ES" value="34">Spain (+34)</option>
                              <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                              <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                              <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                              <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                              <option data-countryCode="SD" value="249">Sudan (+249)</option>
                              <option data-countryCode="SR" value="597">Suriname (+597)</option>
                              <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                              <option data-countryCode="SE" value="46">Sweden (+46)</option>
                              <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                              <option data-countryCode="SI" value="963">Syria (+963)</option>
                              <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                              <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                              <option data-countryCode="TH" value="66">Thailand (+66)</option>
                              <option data-countryCode="TG" value="228">Togo (+228)</option>
                              <option data-countryCode="TO" value="676">Tonga (+676)</option>
                              <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                              <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                              <option data-countryCode="TR" value="90">Turkey (+90)</option>
                              <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                              <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                              <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                              <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                              <option data-countryCode="UG" value="256">Uganda (+256)</option>
                              <option data-countryCode="GB" value="44">UK (+44)</option>
                              <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                              <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                              <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                              <option data-countryCode="US" value="1" selected>USA (+1)</option>
                              <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                              <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                              <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                              <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                              <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                              <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                              <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                              <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                              <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                              <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                              <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                              <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                          </select>
                          <input placeholder="(555) 555 - 5555" name="question'.$get_question->question_no.'" type="text" class="'.$class.'">
                         
                      </div>
                      <label style="border: none;"><span class="text-danger" id="question-error'.$get_question->question_no.'"></span></label>
                  </div>
                  <h3 class="quiz-question mt-5">
                      <span><small>'.$get_question->question_no.'.1) </small> I give my consent to Relationship Dynamics Institute to send occasional SMS text reminders. I can opt-out anytime. Standard text messaging rates may apply.</span>
                  </h3>
                  <div class="form type-checkbox yes-no_format-2 newclass">
                      <label>
                          <input type="checkbox" value="" class="agree">
                          <span>I agree</span>
                      </label>
                  </div>';
                    }
                    
                    if($get_close){
                    $result .='
                    <a href="javascript:void(0);" class="btn btn-white mt-3" id="next1" onClick="nextquestion('.$qid.','."'$type'".');">Next</a>
                   
                    <div class="bottom-links">';
                    if($get_previous){
                      if($get_question->question_type=="multiple_choice_click" && $get_question->type_question!=null){
                      if(is_array($data['form']['question'.$pid])){
                      $ans_val =$data['form']['question'.$pid]['0'].','.$data['form']['question'.$pid]['1'].','.$data['form']['question'.$pid]['2'].','.$data['form']['question'.$pid]['3'].','.
                      $data['form']['question'.$pid]['4'].','.$data['form']['question'.$pid]['5'].','.$data['form']['question'.$pid]['6'].','.$data['form']['question'.$pid]['7'];
                      $multi ="multi";
                      }
                      else{
                       $ans_val =$data['form']['question'.$pid];
                       $multi ="notmulti";
                      }
                      $result .='<a class="btn btn-green prev" href="javascript:void(0);" id="qstn1" onClick="prequestion('.$pid.','."'$type'".','."'$ans_val'".','."'$multi'".');"><i class="fas fa-angle-up"></i></a>';
                      }
                      else{
                      if(is_array($data['form']['question'.$pid]) && $get_question->question_type=="multiple_choice_click"){
                      $ans_val =$data['form']['question'.$pid]['0'].','.$data['form']['question'.$pid]['1'].','.$data['form']['question'.$pid]['2'].','.$data['form']['question'.$pid]['3'].','.
                      $data['form']['question'.$pid]['4'].','.$data['form']['question'.$pid]['5'].','.$data['form']['question'.$pid]['6'].','.$data['form']['question'.$pid]['7'];
                      $nomulti ="multi";
                      }
                      elseif(is_array($data['form']['question'.$pid]) && $get_question->question_type=="multiple_choice" &&  $get_previous->question_type=="multiple_choice_click"){
                      $ans_val =$data['form']['question'.$pid]['0'].','.$data['form']['question'.$pid]['1'].','.$data['form']['question'.$pid]['2'].','.$data['form']['question'.$pid]['3'].','.
                      $data['form']['question'.$pid]['4'].','.$data['form']['question'.$pid]['5'].','.$data['form']['question'.$pid]['6'].','.$data['form']['question'.$pid]['7'];
                      $nomulti ="multi";
                      }

                      elseif(is_array($data['form']['question'.$pid]) && $get_question->question_type=="short_text_click" && $get_previous->question_type=="multiple_choice"){
                        if(isset($data['form']['question'.$qid])){
                          if(is_array($data['form']['question'.$pid])){
                          $ans_val = implode("|",$data['form']['question'.$pid]);
                          $nomulti ="multiple_choice";
                          } 
                          else{                          
                          $ans_val =$data['form']['question'.$pid];
                          $nomulti ="notmulti";
                        }  
                        }
                        else{    
                          $ans_val = implode("|",$data['form']['question'.$pid]);
                          $nomulti ="multiple_choice";
                        }
                        
                      }
                      else{ 
                      $ans_val =$data['form']['question'.$pid];
                      $nomulti ="notmulti";
                      }
                      
                      $result .='<a class="btn btn-green prev" href="javascript:void(0);" id="qstn1" onClick="prequestion('.$pid.','."'$type'".','."'$ans_val'".','."'$nomulti'".');"><i class="fas fa-angle-up"></i></a>';
                      }
                    }
                    $result .='<a class="btn btn-green next" href="javascript:void(0);" id="qstn1" onClick="nextquestion('.$qid.','."'$type'".');"><i class="fas fa-angle-down "></i></a></div>
                    <script src="js/quiz.js"></script>
                    ';
                    }
                    else{
                      
                      $ans_val =$data['form']['question'.$pid];
                      $nomulti ="notmulti";
                      $result .='<button type="submit" class="btn btn-white mt-3 sub_btn" value="'.$get_question->question_no.'" name="sub_btn" id="'.$get_question->question_no.'" question="'.$type.'">Submit</button>
                      <div class="bottom-links">
                      <a class="btn btn-green prev testbtn" href="javascript:void(0);" id="qstn1"  onClick="prequestion('.$pid.','."'$type'".','."'$ans_val'".','."'$nomulti'".');"><i class="fas fa-angle-up"></i></a></div>
                      <script src="js/quiz.js"></script>';
                    }
                  
                    
        }
          
         
      return Response($result);
    }

}
