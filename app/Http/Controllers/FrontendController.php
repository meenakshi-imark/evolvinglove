<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Validator;
use Hash;
use File;

class FrontendController extends Controller
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
    

    public function introduction(){    
        return view('frontend.introduction');
    }

    public function resolution(){   
        return view('frontend.ring-of-resolution');
    }

    public function read_result(){   
        return view('frontend.how-to-read-your-results');
    }

    public function partner(){   
        return view('frontend.how-to-partner-with-you');
    }

    public function breakthrough(){   
        $breakthrough = DB::table('permanent_breakthrough')->where('id',1)->first();
        return view('frontend.permanent-breakthrough',compact('breakthrough'));
    }

    public function terms(){
        return view('frontend.terms');
    }

    public function privacy(){
      return view('frontend.privacy');
  }

    public function markcomplete(Request $request){
        $datasession = session()->all();
        $formval = DB::table('formdata')->where('id',$datasession['formid'])->first();
        $steps = DB::table('progress_steps')->where('formid',$datasession['formid'])->first();
        // $curl = curl_init();

        //   curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.ontraport.com/1/Contacts?ids=80024&range=50',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'GET',
        //     CURLOPT_HTTPHEADER => array(
        //       'Accept: application/json',
        //       'Api-Appid: 2_6929_bCscgdVwQ',
        //       'Api-Key: CdLnV6OitztlmdU'
        //     ),
        //   ));

        //   $response = curl_exec($curl);

        //   curl_close($curl);
        //   $result = json_decode($response, true);
        //   if(strpos($result['data'][0]['contact_cat'], "*/*22255*/*22256*/*") !== false){
        //     $p_tag = "*/*22255*/*22256";
        //   }
        //   elseif(strpos($result['data'][0]['contact_cat'], "*/*22257*/*") !== false){
        //     $p_tag = "*/*22257";
        //   }
        //   else{
        //     $p_tag = "";
        //   }
        $token = DB::table('api_token')->select('token')->first();
        $check_steps = DB::table('progress_steps')->where('formid',$datasession['formid'])->count();
        if($check_steps<1){
            
        if($request['page']=="page1"){
          $insert = DB::table('progress_steps')->insert([
            'page1' =>"4.2",
            'formid' =>$datasession['formid'],
        ]);
          $tagid = "profile-l01";
       }

      if($request['page']=="page2"){
        $insert = DB::table('progress_steps')->insert([
          'page2' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l02";
      }

      if($request['page']=="page3"){
        $insert = DB::table('progress_steps')->insert([
          'page3' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l03";
      }

      if($request['page']=="page4"){
        $insert = DB::table('progress_steps')->insert([
          'page4' =>"4.2",
          'formid' =>$datasession['formid'],
        ]);
        $tagid = "profile-l04";
      }

      if($request['page']=="page5"){
        $insert = DB::table('progress_steps')->insert([
          'page5' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l05";
      }

      if($request['page']=="page6"){
        $insert = DB::table('progress_steps')->insert([
          'page6' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l06";
      }

      if($request['page']=="page7"){
        $insert = DB::table('progress_steps')->insert([
          'page7' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l07";
      }

      if($request['page']=="page8"){
        $insert = DB::table('progress_steps')->insert([
          'page8' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l08";
      }

      if($request['page']=="page9"){
        $insert = DB::table('progress_steps')->insert([
          'page9' =>"4.2",
          'formid' =>$datasession['formid'],
      ]);
        $tagid = "profile-l09";
      }

      if($request['page']=="page10"){
          $insert = DB::table('progress_steps')->insert([
            'page10' =>"4.2",
            'formid' =>$datasession['formid'],
        ]);
          $tagid = "profile-l10";
      }
      if($request['page']=="page11"){
          $insert = DB::table('progress_steps')->insert([
              'page11' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l11";
      }
        if($request['page']=="page12"){
            $insert = DB::table('progress_steps')->insert([
              'page12' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l12";
        }
        if($request['page']=="page13"){
            $insert = DB::table('progress_steps')->insert([
              'page13' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l13";
        }
        if($request['page']=="page14"){
            $insert = DB::table('progress_steps')->insert([
              'page14' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l14";
        }
        if($request['page']=="page15"){
            $insert = DB::table('progress_steps')->insert([
              'page15' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l15";
        }
        if($request['page']=="page16"){
            $insert = DB::table('progress_steps')->insert([
              'page16' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l16";
        }

        if($request['page']=="page17"){
          $insert = DB::table('progress_steps')->insert([
            'page17' =>"4.2",
            'formid' =>$datasession['formid'],
        ]);
        $tagid = "profile-l17";
       }

        if($request['page']=="page18"){
            $insert = DB::table('progress_steps')->insert([
              'page18' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l18";
        }
        if($request['page']=="page19"){
            $insert = DB::table('progress_steps')->insert([
              'page19' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l19";
        }
        if($request['page']=="page20"){
            $insert = DB::table('progress_steps')->insert([
              'page20' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l20";
        }
        if($request['page']=="page21"){
            $insert = DB::table('progress_steps')->insert([
              'page21' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l21";
        }
        if($request['page']=="page22"){
            $insert = DB::table('progress_steps')->insert([
              'page22' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l22";
        }
        if($request['page']=="page23"){
            $insert = DB::table('progress_steps')->insert([
              'page23' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l23";
        }
        if($request['page']=="page24"){
            $insert = DB::table('progress_steps')->insert([
              'page24' =>"4.2",
              'formid' =>$datasession['formid'],
          ]);
          $tagid = "profile-l24";
        }

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
            "tags": [
              "course: '.$tagid.'"
            ],
            "customField": {
              "rTF9Y6KHpIxEyCoh6b6q": 4.2
          }
         }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $token->token
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // $tagg = $p_tag.''.$tagid;
        }
        else{
            if($request['page']=="page4"){
                $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                  'page4' =>"4.2",
              ]);
              $tagid = "profile-l04";
          }
          if($request['page']=="page1"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page1' =>"4.2",
            ]);
            $tagid = "profile-l01";
          }
          if($request['page']=="page2"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page2' =>"4.2",
            ]);
            $tagid = "profile-l02";
          }
          if($request['page']=="page3"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page3' =>"4.2",
            ]);
            $tagid = "profile-l03";
          }
          if($request['page']=="page5"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page5' =>"4.2",
            ]);
            $tagid = "profile-l05";
          }
          if($request['page']=="page6"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page6' =>"4.2",
            ]);
            $tagid = "profile-l06";
          }
          if($request['page']=="page7"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page7' =>"4.2",
            ]);
            $tagid = "profile-l07";
          }
          if($request['page']=="page8"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page8' =>"4.2",
            ]);
            $tagid = "profile-l08";
          }
          if($request['page']=="page9"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page9' =>"4.2",
            ]);
            $tagid = "profile-l09";
          }
          if($request['page']=="page10"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page10' =>"4.2",
            ]);
            $tagid = "profile-l10";
          }
          if($request['page']=="page11"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page11' =>"4.2",
            ]);
            $tagid = "profile-l11";
          }
          if($request['page']=="page12"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page12' =>"4.2",
            ]);
            $tagid = "profile-l12";
          }
          if($request['page']=="page13"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page13' =>"4.2",
            ]);
            $tagid = "profile-l13";
          }
          if($request['page']=="page14"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page14' =>"4.2",
            ]);
            $tagid = "profile-l14";
          }
          if($request['page']=="page15"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page15' =>"4.2",
            ]);
            $tagid = "profile-l15";
          }
          if($request['page']=="page16"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page16' =>"4.2",
            ]);
            $tagid = "profile-l16";
          }
          if($request['page']=="page17"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page17' =>"4.2",
            ]);
            $tagid = "*profile-l17";
          }
          if($request['page']=="page18"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page18' =>"4.2",
            ]);
            $tagid = "profile-l18";
          }
          if($request['page']=="page19"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page19' =>"4.2",
            ]);
            $tagid = "profile-l19";
          }
          if($request['page']=="page20"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page20' =>"4.2",
            ]);
            $tagid = "profile-l20";
          }
          if($request['page']=="page21"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page21' =>"4.2",
            ]);
            $tagid = "profile-l21";
          }
          if($request['page']=="page22"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page22' =>"4.2",
            ]);
            $tagid = "profile-l22";
          }
          if($request['page']=="page23"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page23' =>"4.2",
            ]);
            $tagid = "profile-l23";
          }
          if($request['page']=="page24"){
            $update = DB::table('progress_steps')->where('formid',$datasession['formid'])->update([
                'page24' =>"4.2",
            ]);
            $tagid = "profile-l24";
          }
          // $tagg = $p_tag.''.$tagid;
          $total = $steps->page1+$steps->page2+$steps->page3+$steps->page4+$steps->page5+$steps->page6+$steps->page7+$steps->page8+$steps->page9+
          $steps->page10+$steps->page11+$steps->page12+$steps->page13+$steps->page14+$steps->page15+$steps->page16+$steps->page17+$steps->page18+
          $steps->page19+$steps->page20+$steps->page21+$steps->page22+$steps->page23+$steps->page24;
          
          $subtotal = 4.2+$total;
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
              "tags": [
                "course: '.$tagid.'"
              ],
              "customField": {
                "rTF9Y6KHpIxEyCoh6b6q":'.$subtotal.'
            }
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Bearer '. $token->token
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
        }
        return redirect()->back();
    }


    public function contactInformation(Request $request){ 
  
      $id = auth()->user()->id;
      $check_gid = DB::table('formdata')->select('gid')->where('userid',auth()->user()->id)->latest('id')->first();
      $update = DB::table('users')->where('id',$id)->update([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'phone' => $request->mobile
      ]);
      if($update){
            $token = DB::table('api_token')->select('token')->first();
          

            $curl1 = curl_init();

            curl_setopt_array($curl1, array(
            CURLOPT_URL => 'https://rest.gohighlevel.com/v1/contacts/'.$check_gid->gid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>'{
              "firstName": "'.$request->name.'",
              "lastName": "'.$request->lastname.'",
              "name": "'.$request->name.' '.$request->lastname.'",
              "phone": "'.$request->mobile.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token->token
            ),
            ));

            $result = curl_exec($curl1);
            curl_close($curl1);
            return response(['status'=>'1']);
      }
    }

    public function updatePassword(Request $request){
      $id = auth()->user()->id;
      $check_gid = DB::table('formdata')->select('gid')->where('userid',auth()->user()->id)->latest('id')->first();
       $validator = Validator::make($request->all(), [ 
        'password' => 'required',
        'confirm_password' => 'same:password',
        ]);
        if ($validator->fails()) {
          return response(['status'=>'0']);;
        }else{
        $password = Hash::make($request->password);
        $update = DB::table('users')->where('id',$id)->update(['password' => $password]);
        if($update){
          $token = DB::table('api_token')->select('token')->first();
          

            $curl1 = curl_init();

            curl_setopt_array($curl1, array(
            CURLOPT_URL => 'https://rest.gohighlevel.com/v1/contacts/'.$check_gid->gid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>'{
              "customField": {
                "YtwwM5Dd4CVWX5OWxIGp": "'.$request->password.'"
              }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$token->token
            ),
            ));

            $result = curl_exec($curl1);
            curl_close($curl1);
          return response(['status'=>'1']);
        }
      }
    }

    public function profileImage(Request $request){

      $id = auth()->user()->id;
      if($request->hasFile('profile_image_hidden')){
        $image = $request->file('profile_image_hidden');
        $path = public_path(). '/profile';
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
      }else{
        $filename = 'no';
      }
      $data = DB::table('users')->where('id',$id)->update(['image' => $filename]);
      if($data){
        return response(['status'=>'1']);
      }
    }
}


