<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use App\Mail\PasswordMail;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = DB::table('users')->where('role',2)->latest()->take(3)->get();
        $payments =DB::table('payments')->latest()->take(3)->get();

        // paid user percentage
        $total_user = DB::table('users')->where('role',2)->count();
        $paid_user = DB::table('users')->where('role',2)->where('paid_user',1)->count();
        $total_paid_user = $paid_user/$total_user*100;
        // current month paid user
        $month_paid_user = DB::table('users')->where('role',2)->where('paid_user',1)->whereMonth('created_at', Carbon::now()->month)->count();
        //quiz
        $quiz_all = DB::table('welcome_screen')->where('id',1)->first();
        $started = DB::table('formdata')->get();
        $started_quiz = count($started);
        $completed = DB::table('payments')->get();
        $completed_quiz = count($completed);
        $started_quiz_month = DB::table('formdata')->whereMonth('created_at', Carbon::now()->month)->count();
        $completed_quiz_month = DB::table('payments')->whereMonth('created_at', Carbon::now()->month)->count();
        //sales
        $total_sales = DB::table('payments')->count();
        $month_total_sales = DB::table('payments')->whereMonth('created_at', Carbon::now()->month)->count();
        $total_sum = DB::table('payments')->sum('amount');
        $month_total_sum = DB::table('payments')->whereMonth('created_at', Carbon::now()->month)->sum('amount');
        return view('backend.dashboard.admin-dashboard',compact('user','payments','quiz_all','started_quiz','completed_quiz','total_paid_user','month_paid_user','started_quiz_month','completed_quiz_month','total_sales','month_total_sales','total_sum','month_total_sum'));
    }

    public function addUser(){
       return view('backend.dashboard.add-new-user');
    }

    public function createUser(Request $request){
   
        if(DB::table('users')->where('email',$request->email)->exists()){
            return 'emailexist';
        }

       $user_id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'lastname' => $request->last_name,
            'phone' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if($user_id != ''){
            $data = DB::table('users')->select('email','name')->where('id',$user_id)->first();
            $password= $data->name.'@123';
            Mail::to($data->email)->send(new PasswordMail($password));
            return 'success';
        }else{
           return '0';
        }
    }

    public function csv(){
      
        $parsedUrl = parse_url(url()->previous());

        $payments = DB::table('payments')->select('first_name','last_name','email','type','created_at')->orderBy('id','DESC')->get();
    
        $fileName = 'payment.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('No', 'First Name', 'Last Name', 'Email', 'Product Purchased', 'Date Purchased');

        $callback = function() use($payments, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
                $i=0;
                $product = '';
                foreach ($payments as $payment) {
                $i++;
                    if($payment->type == 0){
                        $product = '24 LESSONS + 21 EVOLVING LOVE PRACTICES';
                    }elseif($payment->type == 1){
                        $product = 'Your Private 1:on:1 Evolving Love Archetype Sessions';
                    }else{
                        $product = 'Upgrade To Receive Your Full Report + 24 Lesson Guide';
                    }
                $row['No']  = $i;
                $row['first name']  = $payment->first_name;
                $row['last name']  = $payment->last_name;
                $row['email']  = $payment->email;
                $row['product purchased']  = $product;
                $row['date'] = date('d M Y',strtotime($payment->created_at));  
                fputcsv($file, array($row['No'], $row['first name'], $row['last name'], $row['email'], $row['product purchased'], $row['date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
