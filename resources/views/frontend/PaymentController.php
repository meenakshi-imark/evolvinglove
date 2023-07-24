<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use Session;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\PasswordMail;


class PaymentController extends Controller
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
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }

    public function index(Request $request){ 
        $upgrade_pro_data = DB::table('upgrade_profile')->where('id',1)->first();
        $testimonial = DB::table('testimonial')->where('testimonial_status',0)->get();
        $all_plan = DB::table('palns')->where('plan_status',0)->get();
        $upgrade_plan = DB::table('upgrade')->where('upgrade_status',0)->get();
        $all_reason = DB::table('reason')->where('reason_status',0)->get();
        $all_asked_question = DB::table('asked_question')->where('asked_question_status',0)->get();
        $get_countries = Country::select('name')->orderBy('name','ASC')->get();
        return view('frontend.upgrade-profile',compact('upgrade_pro_data','testimonial','all_plan','upgrade_plan','all_reason','all_asked_question','get_countries'));
        
    }

    public function get_states(Request $request){
        $country = Country::select('id')->where('name',$request['country_id'])->first();
        $data['states'] = State::where("country_id",$country->id)->orderBy('name','ASC')->get(["name", "id"]);
        return response()->json($data);
    }

    public function payment(Request $request)
    {           
      echo'<pre>';print_r($request->all());echo'</pre>';exit();
        $datasession = session()->all();
        $data = $request->all();
        $checkuser = User::where('email',$request['email'])->count();
        if(!Auth::check() && $checkuser<1) {
        $check = $this->create($data);
        $credentials = array(
            'email'=>$request['email'],
            'password'=>$request['first_name'].'@123',
         );
        
        /*Mail function*/
        $password=$request['first_name'].'@123';
        Mail::to($request['email'])->send(new PasswordMail($password));

        if (Auth::attempt($credentials)) {
            $update = DB::table('formdata')->where('id',$datasession['formid'])->update([
                'userid'    =>auth()->user()->id,
              ]);
             $request->session()->flash('login_success', 'Logged in successfully.'); 
        }
        
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
          CURLOPT_POSTFIELDS => 'Username_258='.$request['first_name'].'&Password_259='.$password,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Api-Appid: 2_6929_bCscgdVwQ',
            'Api-Key: CdLnV6OitztlmdU'
          ),
        ));
        $response = curl_exec($curl);
        
        curl_close($curl);
        $result = json_decode($response, true);
        $update_id = DB::table('formdata')->where('id',$datasession['formid'])->update([
            'ontraport_id'    =>$result['data']['id'],
        ]);
        $update_ontra = DB::table('users')->where('email',$request['email'])->update([
            'ontra_id'    =>$result['data']['id'],
        ]);
        }
        
        elseif(!Auth::check()){
            // $credentials = array(
            //     'email'=>$request['email'],
            //     'password'=>$request['first_name'].'@123',
            //  );
            //  if(Auth::attempt($credentials))
            //     {
            //         $request->session()->flash('login_success', 'Logged in successfully.'); 
            //     }
            //     else{
            //         echo'test';exit();
            //     }
           
            return redirect('/upgrade-profile?login');

        }
       
        // else{
        //     $request->session()->flash('login_success', 'Logged in successfully.'); 
        // }
       
       
        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/upgrade-profile#shopping_cart');
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/upgrade-profile#shopping_cart');
        }
        $price = $request['ammount']*100;
        $charge = $this->createCharge($token['id'], $price);
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $insert = DB::table('payments')->insertGetId([
                'first_name'        =>$request['first_name'],
                'last_name'         =>$request['last_name'],
                'email'             =>$request['email'],
                'number'            =>$request['number'],
                'billing_address'   =>$request['billing_address'],
                'billing_city'      =>$request['billing_city'],
                'billing_state'     =>$request['billing_state'],
                'billing_country'   =>$request['billing_country'],
                'billing_zip'       =>$request['billing_zip'],
                'card_number'       =>$request['card_number'],
                'cvc'               =>$request['cvv'],
                'expiration_month'  =>$request['expiration-month'],
                'expiration_year'   =>$request['expiration-year'],
                'amount'            =>$price/100,
                'stripeid'          =>$token['id'],
                'status'            =>$charge['status'],
                'formid'            =>$datasession['formid'],

              ]);

            $gettotal = DB::table('payments')->select('amount')->where('email',$request['email'])->get();
            $get_ontraportid = DB::table('formdata')->select('ontraport_id')->where('id',$datasession['formid'])->first();
            $sum = 0;
            foreach($gettotal as $total){
            $sum+= $total->amount;
            }
            $curl1 = curl_init();
            curl_setopt_array($curl1, array(
              CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'PUT',
              CURLOPT_POSTFIELDS => 'id='.$get_ontraportid->ontraport_id.'&f2176='.$request['ammount'],
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json',
                'Api-Appid: 2_6929_bCscgdVwQ',
                'Api-Key: CdLnV6OitztlmdU'
              ),
            ));
            
            $response1 = curl_exec($curl1);
            curl_close($curl1);
            /*Purcahse API*/
            
            
            $date  = date('Y-m-d H:i:s');
        
            $timestamp = strtotime($date).'000';
            $curl2 = curl_init();

            curl_setopt_array($curl2, array(
            CURLOPT_URL => 'https://api.ontraport.com/1/transaction/processManual',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                    "contact_id": '.$get_ontraportid->ontraport_id.',
                    "chargeNow": "chargeNow",
                    "trans_date": '.$timestamp.',
                    "invoice_template": 1,
                    "gateway_id": 4,
                    "offer": {
                        "products": [
                        {
                            "quantity": 1,
                            "shipping": false,
                            "tax": false,
                            "price": [
                            {
                                "price": '.$request['ammount'].',
                                "payment_count": 0,
                                "unit": "month",
                                "id": 284
                            }
                            ],
                            "type": "One-time purchase",
                            "owner": 1,
                            "offer_to_affiliates": true,
                            "trial_period_unit": "day",
                            "trial_period_count": 0,
                            "setup_fee_when": "immediately",
                            "setup_fee_date": "string",
                            "delay_start": 0,
                            "taxable": false,
                            "id": 284
                        }
                        ]
                    },
                    "billing_address": {
                        "address": "'.$request['billing_address'].'",
                        "city": "'.$request['billing_city'].'",
                        "state": "'.$request['billing_state'].'",
                        "zip": "'.$request['billing_zip'].'",
                        "country": "'.$request['billing_country'].'"
                    }, 
                    "payer": {
                        "ccnumber": "'.$request['card_number'].'",
                        "code": "'.$request['cvv'].'",
                        "expire_month": '.$request['expiration-month'].',
                        "expire_year": '.$request['expiration-year'].'
                    }
                    }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Api-Key: CdLnV6OitztlmdU',
                'Api-Appid: 2_6929_bCscgdVwQ'
            ),
            ));

            $response2 = curl_exec($curl2);

            curl_close($curl2);
            
            $request->session()->flash('success', 'Payment completed.');
            

            return response()->redirectTo('/thank-you');
           
           // return response()->redirectTo('/pdf');
        //    $responses['status'] = 1;
        //    $responses['msg'] = 'Data submitted successfully.'; 
        //    echo json_encode($responses);

        } else {
            // $responses['status'] = "2";
            // echo json_encode($responses);
            // $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/upgrade-profile#shopping_cart');
        }
        
    }

    private function createToken($cardData)
    { 
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['card_number'],
                    'exp_month' => $cardData['expiration-month'],
                    'exp_year' => $cardData['expiration-year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'Evolving love payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }

    public function sales_payment(Request $request){
        
        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/upsell-1-on-1-session#shopping_cart');
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/upsell-1-on-1-session#shopping_cart');
        }
        $price = $request['price']*100;
        $charge = $this->createCharge($token['id'], $price);
        // echo "<pre>";
        // print_r($charge);exit;
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            if($request['formtype']=="1_session"){
                $type = "1";
            }
            elseif($request['formtype']=="3_session"){
                $type = "2";
            }
            else{
                $type = "3";
            }
            $insert = DB::table('payments')->insertGetId([
                'first_name'        =>$request['first_name'],
                'last_name'         =>$request['last_name'],
                'email'             =>$request['email'],
                'number'            =>$request['number'],
                'billing_address'   =>$request['billing_address'],
                'billing_city'      =>$request['billing_city'],
                'billing_state'     =>$request['billing_state'],
                'billing_country'   =>$request['billing_country'],
                'billing_zip'       =>$request['billing_zip'],
                'card_number'       =>$request['card_number'],
                'cvc'               =>$request['cvc'],
                'expiration_month'  =>$request['expiration-month'],
                'expiration_year'   =>$request['expiration-year'],
                'amount'            =>$price/100,
                'stripeid'          =>$token['id'],
                'status'            =>$charge['status'],
                'type'              =>$type,

              ]);
              $session = session()->all();
              // echo "<pre>";
              // print_r($session);exit;
              $get_ontraportid = DB::table('formdata')->select('ontraport_id')->where('id',$session['formid'])->first();
              // echo "<pre>";
              // print_r($get_ontraportid);exit;
              if($get_ontraportid){
              $single_price = DB::table('upgrade_profile')->select('sec_7_amount')->first();
              $total = $request['price']+$single_price->sec_7_amount;
            
    
              $curl1 = curl_init();
                  curl_setopt_array($curl1, array(
                    CURLOPT_URL => 'https://api.ontraport.com/1/Contacts',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'PUT',
                    CURLOPT_POSTFIELDS => 'id='.$get_ontraportid->ontraport_id.'&f2176='.$total,
                    CURLOPT_HTTPHEADER => array(
                      'Content-Type: application/x-www-form-urlencoded',
                      'Accept: application/json',
                      'Api-Appid: 2_6929_bCscgdVwQ',
                      'Api-Key: CdLnV6OitztlmdU'
                    ),
                  ));
                  
                  $response1 = curl_exec($curl1);
                  curl_close($curl1);
                
              }
            /*Purcahse API*/
            
            
            $date  = date('Y-m-d H:i:s');
        
            $timestamp = strtotime($date).'000';
            if($request['formtype']=="1_session"){
            $curl2 = curl_init();

            curl_setopt_array($curl2, array(
            CURLOPT_URL => 'https://api.ontraport.com/1/transaction/processManual',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                    "contact_id": '.$get_ontraportid->ontraport_id.',
                    "chargeNow": "chargeNow",
                    "trans_date": '.$timestamp.',
                    "invoice_template": 1,
                    "gateway_id": 4,
                    "offer": {
                        "products": [
                        {
                            "quantity": 1,
                            "shipping": false,
                            "tax": false,
                            "price": [
                            {
                                "price": '.$request['price'].',
                                "payment_count": 0,
                                "unit": "month",
                                "id": 285
                            }
                            ],
                            "type": "One-time purchase",
                            "owner": 1,
                            "offer_to_affiliates": true,
                            "trial_period_unit": "day",
                            "trial_period_count": 0,
                            "setup_fee_when": "immediately",
                            "setup_fee_date": "string",
                            "delay_start": 0,
                            "taxable": false,
                            "id": 285
                        }
                        ]
                    },
                    "billing_address": {
                        "address": "'.$request['billing_address'].'",
                        "city": "'.$request['billing_city'].'",
                        "state": "'.$request['billing_state'].'",
                        "zip": "'.$request['billing_zip'].'",
                        "country": "'.$request['billing_country'].'"
                    }, 
                    "payer": {
                        "ccnumber": "'.$request['card_number'].'",
                        "code": "'.$request['cvv'].'",
                        "expire_month": '.$request['expiration-month'].',
                        "expire_year": '.$request['expiration-year'].'
                    }
                    }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Api-Key: CdLnV6OitztlmdU',
                'Api-Appid: 2_6929_bCscgdVwQ'
            ),
            ));

            $response2 = curl_exec($curl2);

            curl_close($curl2);
            }
            else if($request['formtype']=="3_session"){
                $curl2 = curl_init();

                curl_setopt_array($curl2, array(
                CURLOPT_URL => 'https://api.ontraport.com/1/transaction/processManual',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                        "contact_id": '.$get_ontraportid->ontraport_id.',
                        "chargeNow": "chargeNow",
                        "trans_date": '.$timestamp.',
                        "invoice_template": 1,
                        "gateway_id": 4,
                        "offer": {
                            "products": [
                            {
                                "quantity": 1,
                                "shipping": false,
                                "tax": false,
                                "price": [
                                {
                                    "price": '.$request['price'].',
                                    "payment_count": 0,
                                    "unit": "month",
                                    "id": 286
                                }
                                ],
                                "type": "One-time purchase",
                                "owner": 1,
                                "offer_to_affiliates": true,
                                "trial_period_unit": "day",
                                "trial_period_count": 0,
                                "setup_fee_when": "immediately",
                                "setup_fee_date": "string",
                                "delay_start": 0,
                                "taxable": false,
                                "id": 286
                            }
                            ]
                        },
                        "billing_address": {
                            "address": "'.$request['billing_address'].'",
                            "city": "'.$request['billing_city'].'",
                            "state": "'.$request['billing_state'].'",
                            "zip": "'.$request['billing_zip'].'",
                            "country": "'.$request['billing_country'].'"
                        }, 
                        "payer": {
                            "ccnumber": "'.$request['card_number'].'",
                            "code": "'.$request['cvv'].'",
                            "expire_month": '.$request['expiration-month'].',
                            "expire_year": '.$request['expiration-year'].'
                        }
                        }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Api-Key: CdLnV6OitztlmdU',
                    'Api-Appid: 2_6929_bCscgdVwQ'
                ),
                ));
    
                $response2 = curl_exec($curl2);
    
                curl_close($curl2);
            }
            else{
                $curl2 = curl_init();

                curl_setopt_array($curl2, array(
                CURLOPT_URL => 'https://api.ontraport.com/1/transaction/processManual',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                        "contact_id": '.$get_ontraportid->ontraport_id.',
                        "chargeNow": "chargeNow",
                        "trans_date": '.$timestamp.',
                        "invoice_template": 1,
                        "gateway_id": 4,
                        "offer": {
                            "products": [
                            {
                                "quantity": 1,
                                "shipping": false,
                                "tax": false,
                                "price": [
                                {
                                    "price": '.$request['price'].',
                                    "payment_count": 0,
                                    "unit": "month",
                                    "id": 287
                                }
                                ],
                                "type": "One-time purchase",
                                "owner": 1,
                                "offer_to_affiliates": true,
                                "trial_period_unit": "day",
                                "trial_period_count": 0,
                                "setup_fee_when": "immediately",
                                "setup_fee_date": "string",
                                "delay_start": 0,
                                "taxable": false,
                                "id": 286
                            }
                            ]
                        },
                        "billing_address": {
                            "address": "'.$request['billing_address'].'",
                            "city": "'.$request['billing_city'].'",
                            "state": "'.$request['billing_state'].'",
                            "zip": "'.$request['billing_zip'].'",
                            "country": "'.$request['billing_country'].'"
                        }, 
                        "payer": {
                            "ccnumber": "'.$request['card_number'].'",
                            "code": "'.$request['cvv'].'",
                            "expire_month": '.$request['expiration-month'].',
                            "expire_year": '.$request['expiration-year'].'
                        }
                        }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Api-Key: CdLnV6OitztlmdU',
                    'Api-Appid: 2_6929_bCscgdVwQ'
                ),
                ));
    
                $response2 = curl_exec($curl2);
    
                curl_close($curl2);
            }
            return redirect('/thank-you');
            $request->session()->flash('success', 'Payment completed.');
            // return response()->redirectTo('/result-summary');

        } else {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/upsell-1-on-1-session#shopping_cart');
        }
    }

    public function thankyou(){
        return view('frontend.thankyou');
    }

    public function thankyou_page(){
        return view('frontend.thankyou_page');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['first_name'],
        'lastname' => $data['last_name'],
        'email' => $data['email'],
        'phone' => $data['number'],
        'role' => '2',
        'password' => Hash::make($data['first_name'].'@123')
      ]);
    }

    public function login_user(Request $request){
        
        // $request->validate([

        //     'email' => 'required',

        //     'password' => 'required',

        // ]);
        //  $credentials = $request->only('email', 'password');
        
        //  if (Auth::attempt($credentials)) {
        //    $response['status'] = 1;
        //    $response['msg'] = 'Login successfull'; 
        // }
        // else{
        //     $response['status'] = 2;
        //     $response['msg'] = 'Something went wrong'; 
        // }
        // echo json_encode($response);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $datasession = session()->all();
            if(isset($datasession['formid'])){
            $update = DB::table('formdata')->where('id',$datasession['formid'])->update([
                'userid'    =>auth()->user()->id,
            ]);
           }
            return redirect()->intended('upgrade-profile#shopping_cart')
                        ->withSuccess('Signed in');
        }
  
        return redirect("upgrade-profile#shopping_cart")->withSuccess('Login details are not valid');
       
        
    }


}


