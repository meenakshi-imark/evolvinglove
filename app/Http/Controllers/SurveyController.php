<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\Question;
use App\Models\Answers;
use App\Models\Quiz;
class SurveyController extends Controller
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
    
    

    public function index(Request $request){
      // echo'<pre>';print_r($request->all());echo'</pre>';exit();
      Session::put('form.question'.$request['id'], $request['question']);
      $data = session()->all();
      // $arr = implode('|',$request['question19']);
      for($i=1;$i<=count($data['form']);$i++){
        $gettype =Quiz::select('type_question','question_name','question_no','id')->where('question_no',$i)->first();
     
        if($gettype->type_question==null && $gettype->question_name==null){ 
          $q1 =array('question'.$i =>array ('answer1' =>$data['form']['question'.$i],),);
        }
       
        elseif($gettype->type_question=="1"){
          $q1 =array('question'.$i =>array ('answer' =>array ('first' => $data['form']['question'.$i][4],'second' => $data['form']['question'.$i][5], 'third'=>$data['form']['question'.$i][6], 'last'=> $data['form']['question'.$i][7]),),);
     
        }
        elseif($gettype->type_question=="2"){
          $q1 =array('question'.$i =>array ('answer' =>array ('first' => $data['form']['question'.$i][4],'second' => $data['form']['question'.$i][5], 'third'=>$data['form']['question'.$i][6], 'last'=> $data['form']['question'.$i][7]),),);
     
        }
        elseif($gettype->type_question==null && $gettype->question_name!=null){
          if($gettype->question_name=="gender"){
            $q1 =array('question'.$i =>array ('gender' =>$data['form']['question'.$gettype->question_no],),);
          }

          if($gettype->question_name=="invested"){
            $q1 =array('question'.$i =>array ('invested' =>$data['form']['question'.$gettype->question_no],),);
          }

          if($gettype->question_name=="firstname"){
            $q1 =array(
              'question'.$i =>array ('firstname' =>$data['form']['question'.$gettype->question_no],),
            );
          }

          if($gettype->question_name=="lastname"){
            $q1 =array(
              'question'.$i =>array ('lastname' =>$data['form']['question'.$gettype->question_no],),
            );
          }

          if($gettype->question_name=="email"){
            $q1 =array(
              'question'.$i =>array ('email' =>$data['form']['question'.$gettype->question_no],),
            );
          }

          if($gettype->question_name=="phone"){
            $q1 =array('question'.$i =>array ('countrycode'=>"+1",'phone' =>$data['form']['question'.$gettype->question_no],),);
          }
          
      }

      $a[]=$q1;

    }

    
    $k =1;
    $q= array();
    foreach($a as $v){
      $q['question'.$k] = $v['question'.$k];
      
     
    $k++;
    }
   

      if(Auth::check()){
        $userid = auth()->user()->id;
      }
      else{
        $userid = null;
      }
      $dataa = json_encode($q);
 
      $insert = DB::table('formdata')->insertGetId([
        'data'      =>$dataa,
        'userid'    =>$userid,
      ]);
      
      Session::put('formid', $insert);
      // if(auth()->user()->paid_user==0){
      //   return redirect('/free-report');
      // }
      // else{
      // return redirect('result-summary');
      // }
      $chk_firstname = Quiz::select('question_no')->where('question_name','firstname')->where('status','0')->first();
      $chk_lastname = Quiz::select('question_no')->where('question_name','lastname')->where('status','0')->first();
      $chk_email = Quiz::select('question_no')->where('question_name','email')->where('status','0')->first();
      $chk_phone = Quiz::select('question_no')->where('question_name','phone')->where('status','0')->first();
      $chk_invest = Quiz::select('question_no')->where('question_name','invested')->where('status','0')->first();
      $token = DB::table('api_token')->select('token')->first();
      $currenturl = url('/');
      $form_id = base64_encode("formid".$insert);
      $shared_url = $currenturl."/shared-profile?formid=".$form_id;
      $free_url = $currenturl."/free-summary?formid=".$form_id;
      $full_url = $currenturl."/full-report?formid=".$form_id;
      $pdf_url = $currenturl."/files/summary/pdf/evolvinglove".$insert.'.pdf';
      $invest = json_encode($q['question'.$chk_invest->question_no]['invested']);


      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://rest.gohighlevel.com/v1/contacts/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "email": "'.$q['question'.$chk_email->question_no]['email'].'",
          "phone": "+1'.$q['question'.$chk_phone->question_no]['phone'].'",
          "firstName": "'.$q['question'.$chk_firstname->question_no]['firstname'].'",
          "lastName": "'.$q['question'.$chk_lastname->question_no]['lastname'].'",
          "name": "'.$q['question'.$chk_firstname->question_no]['firstname'].' '.$q['question'.$chk_lastname->question_no]['lastname'].'",
          "source": "Imark",
          "tags": [
            "submitted relationship dynamics quiz"
         ],
          "customField": {
              "8n7CxZ8vsFyeoDAGe39Q": "'.date('Y-m-d').'",
              "pKREXyVWRvcaOT3ZtOwz": "'.$free_url.'",
              "mOJdtd5fy5x1hmAEPwKj": "'.$shared_url.'",
              "Vz4TKe4GVEwz2n5DYvnp": "'.$full_url.'",
              "15rfOExkpTXUzIflpteR": "'.strtolower($q['question3']['answer1']).'",
              "JPWcFXZXnVMtL9KSDywD": "'.$q['question4']['answer1'].'",
              "enJFQGR6jWvaJKkuJS5f": '.$invest.',
              "NjONbsDOnDxKAgsJ8ItH": "I agree",
              "67ps9gFjDkqTf0Utnyvu": "I agree",
              "rTF9Y6KHpIxEyCoh6b6q": 0,
              "IGUQf9tbx42gEQt7R76B": "no",
              "rdrJgcOUsbFTpADswqvs": "'.$form_id.'",
              "ouO8iDIUIrOpHXmRhhd9": "'.$pdf_url.'"
          }
      }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.$token->token
        ),
      ));

      $result = curl_exec($curl);

      curl_close($curl);

      $res_decode = json_decode($result,true);
      $update = DB::table('formdata')->where('id',$insert)->update([
        'is_free' =>'1',
        'gid'    =>$res_decode['contact']['id'],
      ]);
      
    
      $response['status'] = 1;
      $response['msg'] = 'Data submitted successfully.'; 
      echo json_encode($response);
    }

    



}
