<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Mail;
use App\Mail\RevokeMail;
use App\Mail\PasswordMail;

class UserController extends Controller
{
    public function index($id){
        $user = DB::table('users')->where('id',$id)->first();
        if(!empty($user->ontra_id)){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.ontraport.com/1/Contact?id='.$user->ontra_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Api-Appid: 2_6929_bCscgdVwQ',
                'Api-Key: CdLnV6OitztlmdU'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $result = json_decode($response, true);
            $link = $result['data']['f2393'];

        }
        else{
            $link = ""; 
        }
        return view('backend.edit-user',compact('user','link'));
    }

    public function updateprofile(Request $request){
        if($request->type == 'User'){
            $role = 2;
        }else{
            $role = 1;
        }
        $insert = DB::table('users')->where('id',$request['id'])->update
        ([
        'name'	=>$request->name,
        'lastname'  =>$request->last_name,
        'email'	  =>$request->email,
        'phone'	=>$request->mobile,
        'role'	=>$role,
        'ontra_id'	=>$request->Ontraport_id,
        'password'	=>$request->password,
        ]);
        $response['status'] = 1;
        $response['msg'] = 'Data submitted successfully.'; 
        echo json_encode($response); 

    }

    public function sendemail(Request $request){
        $email = DB::table('users')->select('email','name')->where('id',$request['id'])->first();

        $password=$email->name.'@123';
        Mail::to($email->email)->send(new PasswordMail($password));
        $response['status'] = 1;
        $response['msg'] = 'Email send successfully.'; 
        echo json_encode($response); 
    }
    
    public function view($id){
        $user = DB::table('users')->where('id',$id)->first();
        if(!empty($user->ontra_id)){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.ontraport.com/1/Contact?id='.$user->ontra_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Api-Appid: 2_6929_bCscgdVwQ',
                'Api-Key: CdLnV6OitztlmdU'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $result = json_decode($response, true);
            $link = $result['data']['f2393'];

        }
        else{
            $link = ""; 
        }
        return view('backend.view-user',compact('user','link'));
    }


    public function revoke($id){
        if($id){
            $email = DB::table('users')->select('email','name')->where('id',$id)->first();
            $data=$email->name;
            Mail::to('reetu.dalia@imarkinfotech.com')->send(new RevokeMail($data));
        }
       DB::table('users')->where('id',$id)->Delete();
       return redirect()->back()->with('message','User revoked Successfully');
    }
}