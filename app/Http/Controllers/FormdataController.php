<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormdataController extends Controller
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

        // return response($request->all())->header('Access-Control-Allow-Origin', '*')
        // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        // ->header('Access-Control-Allow-Headers',' Origin, Content-Type, Accept, Authorization, X-Request-With')
        // ->header('Access-Control-Allow-Credentials',' true');
        $data = json_encode($request->all());
        $insert =DB::table("formdata")->insert([
            'userid'=>1,
            'data'=>$data,   
            ]);
        if($insert){
           $msg ="data inserted"; 
        }
        else{
            $msg ="error"; 
        }
        return response($msg);
    
        
    }


}


