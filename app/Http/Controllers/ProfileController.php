<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index(){   
        $get_survey = DB::table('payments')->leftJoin('formdata', 'payments.formid', '=', 'formdata.id')
        ->where('formdata.userid',auth()->user()->id)->orderBy('payments.id','DESC')->get();
        return view('frontend.profile.index',compact('get_survey'));
    }

    public function redirect (Request $request){
        Session::put('formid', $request['id']);
        $response['status'] = 1;
        echo json_encode($response);
    }


    public function myAccount(){
        $id = auth()->user()->id;
        $email = auth()->user()->email;
        $user = DB::table('users')->where('id',$id)->first();
        $payment = DB::table('payments')->where('id',$id)->first();
        // $get_survey = DB::table('payments')->where('id',$id)->orderBy('payments.id','DESC')->get();
        $get_survey = DB::table('payments')->leftJoin('formdata', 'payments.formid', '=', 'formdata.id')
        ->where('formdata.userid',auth()->user()->id)->orderBy('payments.id','DESC')->get();
        return view('frontend.profile.my-account',compact('user','payment','get_survey'));
      }


    public function programs(){

        $get_survey = DB::table('payments')->leftJoin('formdata', 'payments.formid', '=', 'formdata.id')
        ->where('userid',auth()->user()->id)->orderBy('payments.id','DESC')->get();
        return view('frontend.profile.programs',compact('get_survey'));
      }

    public function getsupport(){
        return view('frontend.profile.getsupport');
    }



 
}


