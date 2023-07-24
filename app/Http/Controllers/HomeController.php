<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\AboutMail;
use App\Mail\ContactMail;
use App\Models\Country;
class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    public function sales(){
        $create_page_data = DB::table('upsell_1_on_1')->where('id',1)->first();
        $testimonials = DB::table('testimonial_1on1')->where('testimonial_status_1on1',0)->get();
        $get_countries = Country::select('name')->orderBy('name','ASC')->get();
        return view('frontend.upsell-1-on-1-session', compact('create_page_data','testimonials','get_countries'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function workwithus(){
        return view('frontend.work-with-us');
    }

    public function contactus(){
        return view('frontend.contactus');
    }

    public function waitlist_submit(Request $request){
        $checkmail = DB::table('waitlist_submissions')->where('email',$request['email'])->first();
        $insert = DB::table('waitlist_submissions')->
        insertGetId([
        'firstname'			=>$request['firstname'],
        'lastname'			=>$request['lastname'],
        'email'			    =>$request['email'],
        'phone'			    =>$request['phone'],
        ]);
        
        if($checkmail){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'PUT',
              CURLOPT_POSTFIELDS => 'id='.$checkmail->ontraport_id.'&firstname='.$request['firstname'].'&lastname='.$request['lastname'].'&email='.$request['email'].'&cell_phone='.$request['phone'].'&contact_cat=*/*615*/*',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json',
                'Api-Appid: 2_6929_bCscgdVwQ',
                'Api-Key: CdLnV6OitztlmdU'
              ),
            ));
            $response1 = curl_exec($curl);
            curl_close($curl);
        }
        else{
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => 'firstname='.$request['firstname'].'&lastname='.$request['lastname'].'&email='.$request['email'].'&cell_phone='.$request['phone'].'&contact_cat=*/*615*/*',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json',
                'Api-Appid: 2_6929_bCscgdVwQ',
                'Api-Key: CdLnV6OitztlmdU'
              ),
            ));
            $response1 = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response1, true);
            $update_id = DB::table('waitlist_submissions')->where('id',$insert)->update([
                'ontraport_id'    =>$result['data']['id'],
            ]);
        }
        if($insert){
            $response['status'] = 1;
            $response['msg'] = 'Data submitted successfully.'; 
         }
         else{
           $response['status'] = 2;
           $response['msg'] = 'Something went wrong. Please try again later.';
         }
         echo json_encode($response); 

    }

    public function permanent_relationship_breakthrough(){
        $breakthrough = DB::table('permanent_breakthrough')->where('id',1)->first();
        $breakthrough_testimonial = DB::table('breakthrough_testimonial')->get();
        $breakthrough_sec3_ele = DB::table('page3_sec3_element')->get();
        $breakthrough_courses = DB::table('permanent_breakthrough_course')->get();
        $breakthrough_rightcourses = DB::table('permanent_breakthrough_rightcource')->get();
        $breakthrough_faq = DB::table('permanent_breakthrough_faq')->get();
        $get_countries = Country::select('name')->orderBy('name','ASC')->get();
        
      return view('frontend.permanent-relationship-breakthrough',compact('breakthrough','breakthrough_testimonial','breakthrough_sec3_ele','breakthrough_courses','breakthrough_rightcourses','breakthrough_faq','get_countries'));
    }

    public function aboutMessage(Request $request){
      
      $insert = DB::table('aboutus')->insert([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'subject' => $request->subject,
        'message' => $request->message,
       ]);
       if($insert){
        Mail::to("info@evolvinglove.us")->send(new AboutMail($request->all()));
        // Mail::to("reetu.dalia@imarkinfotech.com")->send(new AboutMail($request->all()));
        $response['status'] = 1;
        $response['msg'] = 'Data submitted successfully.'; 
        }
        else{
          $response['status'] = 2;
          $response['msg'] = 'Something went wrong. Please try again later.';
        }
     echo json_encode($response);

    }

    public function contactus_submission(Request $request){
      $insert = DB::table('contact_submissions')->
      insert([
      'firstname'			=>$request['firstname'],
      'lastname'			=>$request['lastname'],
      'email'			    =>$request['email'],
      'subject'			=>$request['subject'],
      'message'			=>$request['message'],
      ]);
      if($insert){
        Mail::to("info@evolvinglove.us")->send(new ContactMail($request->all()));
         $response['status'] = 1;
         $response['msg'] = 'Data submitted successfully.'; 
      }
      else{
        $response['status'] = 2;
        $response['msg'] = 'Something went wrong. Please try again later.';
      }
      echo json_encode($response);
  }


}

