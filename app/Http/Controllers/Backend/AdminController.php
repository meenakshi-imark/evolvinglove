<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;


class AdminController extends Controller
{
    public function index(){
        $get_payments = DB::table('payments')->get();
        return view('backend.admin-dashboard',compact('get_payments'));
    }

    public function admin_payment(){
        $get_payments = DB::table('payments')->orderBy('id', 'DESC')->get();
        // return view('backend.admin-dashboard',compact('get_payments'));
        return view('backend.payment',compact('get_payments'));
    }

    public function payment_detail($id){
        $payment_byid = DB::table('payments')->where('id',$id)->first();
        return view('backend.payment-detail',compact('payment_byid')); 
    }  

    public function admin_user(){
        $get_users = DB::table('users')->where('role',2)->orderBy('id', 'DESC')->get();
        return view('backend.users-list',compact('get_users'));        
    }

    // For Testimonials
    public function list_testimonial(){
        $get_all_testimonial = DB::table('testimonial')->get();
        return view('backend.testimonial.list',compact('get_all_testimonial'));
    }

    public function add_testimonial(){
        return view('backend.testimonial.add');
    }

    public function insert_testimonial(Request $request){

        $validated = $request->validate([
            'testimonial_title' => 'required',
            'testimonial_description' => 'required',
            'testimonial_name' => 'required',
            'testimonial_designation' => 'required',

            
        ]);
        // dd($request);exit;
        if($request->hasfile('testimonial_image')){
            $file = $request->file('testimonial_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/testimonial/';
            $file->move($location,$filename);
            $testimonial_image = $filename; 
        }
        else{
            $testimonial_image = '';
        }
        $insert_testimonials = DB::table('testimonial')->insert([
            'testimonial_title'=>$request->testimonial_title,
            'testimonial_subtitle'=>$request->testimonial_subtitle,
            'testimonial_description'=>$request->testimonial_description,
            'testimonial_name'=>$request->testimonial_name,
            'testimonial_designation'=>$request->testimonial_designation,
            'testimonial_image'=>$testimonial_image,
            'testimonial_status'=>1,
        ]);
        return redirect('/admin/testimonial')->with('testimonialadd', 'Testimonial add successfully');
    }

    public function edit_testimonial($id){
        $get_by_id = DB::table('testimonial')->where('id',$id)->first();
        return view('backend.testimonial.edit',compact('get_by_id'));
    }

    public function update_testimonial(Request $request, $id){
        $get_by_id = DB::table('testimonial')->where('id',$id)->first();
        if($request->hasfile('testimonial_image')){
            $file = $request->file('testimonial_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/testimonial/';
            $file->move($location,$filename);
            $testimonial_image = $filename; 
        }
        else{
            $testimonial_image = $get_by_id->testimonial_image;
        }
        $insert_testimonials = DB::table('testimonial')->where('id',$id)->update([
            'testimonial_title'=>$request->testimonial_title,
            'testimonial_subtitle'=>$request->testimonial_subtitle,
            'testimonial_description'=>$request->testimonial_description,
            'testimonial_name'=>$request->testimonial_name,
            'testimonial_designation'=>$request->testimonial_designation,
            'testimonial_image'=>$testimonial_image,
        ]);
        return redirect('/admin/testimonial');
    }

    public function delete_testimonial($id){
        $delete_testimonial = DB::table('testimonial')->where('id',$id)->delete();
        return redirect('/admin/testimonial')->with('testimonialdelete', 'Testimonial deleted successfully');        
    }

    // For Plan
    public function list_plans(){
        $get_all_list_palns = DB::table('palns')->get();
        return view('backend.plans.list',compact('get_all_list_palns'));
    }

    public function add_plan(){
        return view('backend.plans.add');
    }

    public function insert_plan(Request $request){
        // dd($request);exit;
        if($request->hasfile('plan_image')){
            $file = $request->file('plan_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/plan/';
            $file->move($location,$filename);
            $plan_image = $filename; 
        }
        else{
            $plan_image = '';
        }
        $insert_plan = DB::table('palns')->insert([
            'plan_title'=>$request->plan_title,
            'plan_description'=>$request->plan_description,            
            'plan_image'=>$plan_image,
            'plan_status'=>1,
        ]);
        return redirect('/admin/plan');
    }

    public function edit_plan($id){
        $get_by_id = DB::table('palns')->where('id',$id)->first();
        return view('backend.plans.edit',compact('get_by_id'));
    }

    public function update_plan(Request $request, $id){
        $get_by_id = DB::table('palns')->where('id',$id)->first();
        if($request->hasfile('plan_image')){
            $file = $request->file('plan_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/plan/';
            $file->move($location,$filename);
            $plan_image = $filename; 
        }
        else{
            $plan_image = $get_by_id->plan_image;
        }
        $update_plan = DB::table('palns')->where('id',$id)->update([
            'plan_title'=>$request->plan_title,
            'plan_description'=>$request->plan_description,            
            'plan_image'=>$plan_image,
            'plan_status'=>1,
        ]);
        return redirect('/admin/plan');
    }

    public function delete_plan($id){
        $delete_plan = DB::table('palns')->where('id',$id)->delete();
        return redirect('/admin/plan');        
    }

    // For When Upgrade
    public function list_upgrade(){
        $get_all_upgrade = DB::table('upgrade')->get();
        return view('backend.upgrade.list',compact('get_all_upgrade'));
    }

    public function add_upgrade(){
        return view('backend.upgrade.add');
    }

    public function insert_upgrade(Request $request){
        // dd($request);exit;
        if($request->hasfile('upgrade_image')){
            $file = $request->file('upgrade_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/upgrade/';
            $file->move($location,$filename);
            $upgrade_image = $filename; 
        }
        else{
            $upgrade_image = '';
        }
        $insert_upgrade = DB::table('upgrade')->insert([
            'upgrade_title'=>$request->upgrade_title,
            'upgrade_description'=>$request->upgrade_description,            
            'upgrade_image'=>$upgrade_image,
            'upgrade_status'=>1,
        ]);
        return redirect('/admin/upgrade');
    }

    public function edit_upgrade($id){
        $get_by_id = DB::table('upgrade')->where('id',$id)->first();
        return view('backend.upgrade.edit',compact('get_by_id'));
    }

    public function update_upgrade(Request $request, $id){
        $get_by_id = DB::table('upgrade')->where('id',$id)->first();
        if($request->hasfile('upgrade_image')){
            $file = $request->file('upgrade_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/upgrade/';
            $file->move($location,$filename);
            $upgrade_image = $filename; 
        }
        else{
            $upgrade_image = $get_by_id->upgrade_image;
        }
        $update_upgrade = DB::table('upgrade')->where('id',$id)->update([
            'upgrade_title'=>$request->upgrade_title,
            'upgrade_description'=>$request->upgrade_description,            
            'upgrade_image'=>$upgrade_image,            
        ]);
        return redirect('/admin/upgrade');
    }

    public function delete_upgrade($id){
        $delete_upgrade = DB::table('upgrade')->where('id',$id)->delete();
        return redirect('/admin/upgrade');        
    }

    // For When Reasons
    public function list_reason(){
        $get_all_reason = DB::table('reason')->get();
        return view('backend.reason.list',compact('get_all_reason'));
    }

    public function add_reason(){
        return view('backend.reason.add');
    }

    public function insert_reason(Request $request){
        // dd($request);exit;
        
        $insert_reason = DB::table('reason')->insert([
            'reason_title'=>$request->reason_title,
            'reason_description'=>$request->reason_description,            
            'reason_status'=>1,
        ]);
        return redirect('/admin/reasons');
    }

    public function edit_reason($id){
        $get_by_id = DB::table('reason')->where('id',$id)->first();
        return view('backend.reason.edit',compact('get_by_id'));
    }

    public function update_reason(Request $request, $id){
        $update_reason = DB::table('reason')->where('id',$id)->update([
            'reason_title'=>$request->reason_title,
            'reason_description'=>$request->reason_description,
            'reason_status'=>$request->reason_status,              
        ]);
        return redirect('/admin/reasons');
    }

    public function delete_reason($id){
        $delete_reason = DB::table('reason')->where('id',$id)->delete();
        return redirect('/admin/reasons');        
    }

    // For Asked Question
    public function list_asked_question(){
        $get_all_question = DB::table('asked_question')->get();
        return view('backend.asked-question.list',compact('get_all_question'));
    }

    public function add_asked_question(){
        return view('backend.asked-question.add');
    }

    public function insert_asked_question(Request $request){
        // dd($request);exit;
        
        $insert_question = DB::table('asked_question')->insert([
            'asked_question_title'=>$request->asked_question_title,
            'asked_question_description'=>$request->asked_question_description,            
            'asked_question_status'=>1,
        ]);
        return redirect('/admin/asked-question');
    }

    public function edit_asked_question($id){
        $get_by_id = DB::table('asked_question')->where('id',$id)->first();
        return view('backend.asked-question.edit',compact('get_by_id'));
    }

    public function update_asked_question(Request $request, $id){
        $update_reason = DB::table('asked_question')->where('id',$id)->update([
            'asked_question_title'=>$request->asked_question_title,
            'asked_question_description'=>$request->asked_question_description,
            'asked_question_status'=>$request->asked_question_status,              
        ]);
        return redirect('/admin/asked-question');
    }

    public function delete_asked_question($id){
        $delete_reason = DB::table('asked_question')->where('id',$id)->delete();
        return redirect('/admin/asked-question');        
    }



    // For 1-on-1 Testimonials
    public function list_testimonial_1on1(){
        $get_all_testimonial = DB::table('testimonial_1on1')->get();
        return view('backend.testimonial-1on1.list',compact('get_all_testimonial'));
    }

    public function add_testimonial_1on1(){
        return view('backend.testimonial-1on1.add');
    }

    public function insert_testimonial_1on1(Request $request){
   
        if($request->hasfile('testimonial_image')){
            $file = $request->file('testimonial_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/testimonial-1on1/';
            $file->move($location,$filename);
            $testimonial_image = $filename; 
        }
        else{
            $testimonial_image = '';
        }
        $insert_testimonials = DB::table('testimonial_1on1')->insert([
            'testimonial_title_1on1'=>$request->testimonial_title,
            'testimonial_subtitle_1on1'=>$request->testimonial_subtitle,
            'testimonial_description_1on1'=>$request->testimonial_description,
            'testimonial_name_1on1'=>$request->testimonial_name,
            'testimonial_designation_1on1'=>$request->testimonial_designation,
            'testimonial_image_1on1'=>$testimonial_image,
            'testimonial_status_1on1'=>1,
        ]);
        return redirect('/admin/1-on-1-testimonial');
    }

    public function edit_testimonial_1on1($id){
        $get_by_id = DB::table('testimonial_1on1')->where('id',$id)->first();
        return view('backend.testimonial-1on1.edit',compact('get_by_id'));
    }

    public function update_testimonial_1on1(Request $request, $id){
        $get_by_id = DB::table('testimonial_1on1')->where('id',$id)->first();
        if($request->hasfile('testimonial_image')){
            $file = $request->file('testimonial_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/testimonial/';
            $file->move($location,$filename); 
            $testimonial_image = $filename; 
        }
        else{
            $testimonial_image = $get_by_id->testimonial_image_1on1;
        }
        $insert_testimonials = DB::table('testimonial_1on1')->where('id',$id)->update([
            'testimonial_title_1on1'=>$request->testimonial_title,
            'testimonial_subtitle_1on1'=>$request->testimonial_subtitle,
            'testimonial_description_1on1'=>$request->testimonial_description,
            'testimonial_name_1on1'=>$request->testimonial_name,
            'testimonial_designation_1on1'=>$request->testimonial_designation,
            'testimonial_image_1on1'=>$testimonial_image,
        ]);
        return redirect('/admin/1-on-1-testimonial');
    }

    public function delete_testimonial_1on1($id){
        $delete_testimonial = DB::table('testimonial_1on1')->where('id',$id)->delete();
        return redirect('/admin/1-on-1-testimonial');        
    }

    public function update_testimonial_status(Request $request){
        $insert = DB::table('testimonial_1on1')->where('id',$request['id'])->update
        ([
        'testimonial_status_1on1'	=>$request->value,
        ]);
        $response['status'] = 1;
        $response['msg'] = 'Data submitted successfully.'; 
        echo json_encode($response); 
    }

    
}
