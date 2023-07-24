<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminPageController extends Controller
{
    public function pages_1_on_1(){
        $create_page_data = DB::table('upsell_1_on_1')->first();
        return view('backend.upsell-1-on-1-session',compact('create_page_data'));
    }

    public function create_page_1_1(Request $request){
        $create_page = DB::table('upsell_1_on_1')->where('id',1)->first();
        if($request->hasfile('sec_1_image')){
            $file = $request->file('sec_1_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_1_1/';
            $file->move($location,$filename);
            $sec_1_image = $filename; 
        }
        else{
            $sec_1_image = $create_page->sec_1_image;
        }

        if($request->hasfile('sec_4_image')){
            $file = $request->file('sec_4_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_1_1/';
            $file->move($location,$filename);
            $sec_4_image = $filename; 
        }
        else{
            $sec_4_image = $create_page->sec_4_image;
        }

        if($request->hasfile('sec_2_image_bg')){
            $file = $request->file('sec_2_image_bg');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_1_1/';
            $file->move($location,$filename);
            $sec_2_image_bg = $filename; 
        }
        else{
            $sec_2_image_bg = $create_page->sec_2_image_bg;
        }

        if($request->hasfile('sec_4_image_bg')){
            $file = $request->file('sec_4_image_bg');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_1_1/';
            $file->move($location,$filename);
            $sec_4_image_bg = $filename; 
        }
        else{
            $sec_4_image_bg = $create_page->sec_4_image_bg;
        }

        
        if($create_page == null){
            $insert = DB::table('upsell_1_on_1')->insert([
                'sec_1_title'=>$request->sec_1_title,
                'sec_1_sub_title'=>$request->sec_1_sub_title,
                'sec_1_description'=>$request->sec_1_description,
                'sec_1_image'=>$sec_1_image,
                'sec_2_title'=>$request->sec_2_title,
                'sec_2_col1_title'=>$request->sec_2_col1_title,
                'sec_2_col1_des'=>$request->sec_2_col1_des,
                'sec_2_col2_title'=>$request->sec_2_col2_title,
                'sec_2_col2_des'=>$request->sec_2_col2_des,
                'sec_2_col3_title'=>$request->sec_2_col3_title,
                'sec_2_col3_des'=>$request->sec_2_col3_des,
                'sec_3_col1_title'=>$request->sec_3_col1_title,
                'sec_3_col1_des'=>$request->sec_3_col1_des,
                'sec_3_col1_amount'=>$request->sec_3_col1_amount,
                'sec_3_col2_title'=>$request->sec_3_col2_title,
                'sec_3_col2_des'=>$request->sec_3_col2_des,
                'sec_3_col2_amount'=>$request->sec_3_col2_amount,
                'sec_4_title'=>$request->sec_4_title,
                'sec_4_sub_title'=>$request->sec_4_sub_title,
                'sec_4_des'=>$request->sec_4_des,
                'sec_4_image'=>$sec_4_image,
                'sec_4_image_title'=>$request->sec_4_image_title,

            ]);
        }else{
            $update = DB::table('upsell_1_on_1')->where('id',1)->update([
                'sec_1_title'=>$request->sec_1_title,
                'sec_1_sub_title'=>$request->sec_1_sub_title,
                'sec_1_description'=>$request->sec_1_description,
                'sec_1_image'=>$sec_1_image,
                'sec_2_title'=>$request->sec_2_title,
                'sec_2_col1_title'=>$request->sec_2_col1_title,
                'sec_2_col1_des'=>$request->sec_2_col1_des,
                'sec_2_col2_title'=>$request->sec_2_col2_title,
                'sec_2_col2_des'=>$request->sec_2_col2_des,
                'sec_2_col3_title'=>$request->sec_2_col3_title,
                'sec_2_col3_des'=>$request->sec_2_col3_des,
                'sec_3_col1_title'=>$request->sec_3_col1_title,
                'sec_3_col1_des'=>$request->sec_3_col1_des,
                'sec_3_col1_amount'=>$request->sec_3_col1_amount,
                'sec_3_col2_title'=>$request->sec_3_col2_title,
                'sec_3_col2_des'=>$request->sec_3_col2_des,
                'sec_3_col2_amount'=>$request->sec_3_col2_amount,
                'sec_4_title'=>$request->sec_4_title,
                'sec_4_sub_title'=>$request->sec_4_sub_title,
                'sec_4_des'=>$request->sec_4_des,
                'sec_4_image'=>$sec_4_image,
                'sec_4_image_title'=>$request->sec_4_image_title,
                'sec_2_image_bg'=>$sec_2_image_bg,
                'sec_4_image_bg'=>$sec_4_image_bg,

            ]);
        }
        return Redirect('admin/pages/upsell-1-on-1-session')->with('create_page11', 'Page updated successfully');

     }

     public function upgrade_profile(){
        $upgrade_pro_data = DB::table('upgrade_profile')->where('id',1)->first();
        return view('backend.upgrade-profile',compact('upgrade_pro_data'));
     }

     public function create_upgrade_profile(Request $request){
        $create_page_upgrade_profile = DB::table('upgrade_profile')->where('id',1)->first();
        if($request->hasfile('sec_1_image_1')){
            $file = $request->file('sec_1_image_1');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/upgrade_profile/';
            $file->move($location,$filename);
            $sec_1_image_1 = $filename; 
        }
        else{
            $sec_1_image_1 = $create_page_upgrade_profile->sec_1_image_1;
        }

        if($request->hasfile('sec_1_image_2')){
            $file = $request->file('sec_1_image_2');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/upgrade_profile/';
            $file->move($location,$filename);
            $sec_1_image_2 = $filename; 
        }
        else{
            $sec_1_image_2 = $create_page_upgrade_profile->sec_1_image_2;
        }

        if($request->hasfile('sec_6_image')){
            $file = $request->file('sec_6_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/upgrade_profile/';
            $file->move($location,$filename);
            $sec_6_image = $filename; 
        }
        else{
            $sec_6_image = $create_page_upgrade_profile->sec_6_image;
        }

        if($request->hasfile('sec_6_backgroundimage')){
            $file = $request->file('sec_6_backgroundimage');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/upgrade_profile/';
            $file->move($location,$filename);
            $sec_6_backgroundimage = $filename; 
        }
        else{
            $sec_6_backgroundimage = $create_page_upgrade_profile->sec_6_backgroundimage;
        }
        if($create_page_upgrade_profile == null){
            $insert = DB::table('upgrade_profile')->insert([
                'sec_1_title'=>$request->sec_1_title,
                'sec_1_sub_title'=>$request->sec_1_sub_title,
                'sec_1_image_1'=>$sec_1_image_1,
                'sec_1_image_2'=>$sec_1_image_2,
                'sec_4_title'=>$request->sec_4_title,
                'sec_4_sub_title'=>$request->sec_4_sub_title,
                'sec_5_title'=>$request->sec_5_title,                
                'sec_6_title'=>$request->sec_6_title,
                'sec_6_sub_title'=>$request->sec_6_sub_title,
                'sec_6_description'=>$request->sec_6_description,
                'sec_6_image'=>$sec_6_image,
                'sec_6_backgroundimage'=>$sec_6_backgroundimage,
                'sec_7_amount'=>$request->sec_7_amount,
                'sec_8_title'=>$request->sec_8_title,
                'sec_8_sub_title'=>$request->sec_8_sub_title,
                'sec_9_title'=>$request->sec_9_title,                
                'sec_9_sub_title'=>$request->sec_9_sub_title,
            ]);
        }else{
            $update = DB::table('upgrade_profile')->where('id',1)->update([
                'sec_1_title'=>$request->sec_1_title,
                'sec_1_sub_title'=>$request->sec_1_sub_title,
                'sec_1_image_1'=>$sec_1_image_1,
                'sec_1_image_2'=>$sec_1_image_2,
                'sec_4_title'=>$request->sec_4_title,
                'sec_4_sub_title'=>$request->sec_4_sub_title,
                'sec_5_title'=>$request->sec_5_title,
                'sec_6_title'=>$request->sec_6_title,
                'sec_6_sub_title'=>$request->sec_6_sub_title,
                'sec_6_description'=>$request->sec_6_description,
                'sec_6_image'=>$sec_6_image,
                'sec_6_backgroundimage'=>$sec_6_backgroundimage,
                'sec_7_amount'=>$request->sec_7_amount,
                'sec_8_title'=>$request->sec_8_title,
                'sec_8_sub_title'=>$request->sec_8_sub_title,
                'sec_9_title'=>$request->sec_9_title,                
                'sec_9_sub_title'=>$request->sec_9_sub_title,
            ]);
        }
        return Redirect('admin/pages/upgrade-profile')->with('create_page11', 'Page updated successfully');
    }


    public function permanent_breakthrough(){
        $get_sellpage3 = DB::table('permanent_breakthrough')->where('id',1)->first();
        $get_testimonials = DB::table('breakthrough_testimonial')->where('testimonial_status_3',1)->get();
        $get_sec3_element = DB::table('page3_sec3_element')->get();
        $get_sec7_element = DB::table('permanent_breakthrough_course')->get();
        $get_sec10_element = DB::table('permanent_breakthrough_rightcource')->get();
        $get_sec14_element = DB::table('permanent_breakthrough_faq')->get();
        return view('backend.permanent-breakthrough', compact('get_sellpage3','get_testimonials','get_sec3_element','get_sec7_element','get_sec10_element','get_sec14_element'));
    }

    public function sec_1_submit_3con(Request $request){

        $sec1_data = DB::table('permanent_breakthrough')->where('id',1)->select('sec_1_image')->first();
        
        $response = array();
        if($request->file('sec_1_image')){
            $file = $request->file('sec_1_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = public_path(). '/dashboard/images/sell-page-3';
            $file->move($location,$filename);
            $sec_1_image = $filename;
        }else{
            $sec_1_image = $sec1_data->sec_1_image;
        }
        $update_sec1_3 = DB::table('permanent_breakthrough')->where('id',1)->update([
            'sec_1_title'=>$request->sec_1_title,
            'sec_1_sub_title'=>$request->sec_1_sub_title,
            'sec_1_image'=>$sec_1_image,
            'sec_1_des'=>$request->sec_1_des,
            'sec_1_des_bellow'=>$request->sec_1_des_bellow,
            'sec_1_link'=>$request->sec_1_link,
            'sec_1_link_bellow'=>$request->sec_1_link_bellow,          

        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);





        // $update_sec1_3 = DB::table('permanent_breakthrough')->where('id',1)->update([
        //     'sec_1_title'=>$request->sec_1_title,
        //     'sec_1_sub_title'=>$request->sec_1_sub_title,
        //     'sec_1_image'=>$request->sec_1_image,
        //     'sec_1_des'=>$request->sec_1_des,
        //     'sec_1_des_bellow'=>$request->sec_1_des_bellow,
        //     'sec_1_link'=>$request->sec_1_link,
        //     'sec_1_link_bellow'=>$request->sec_1_link_bellow,          

        // ]);
    }


    public function page3_testimonial(Request $request){

        if($request->hasfile('testimonial_image')){
            $file = $request->file('testimonial_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $testimonial_image = $filename; 
        }


        $testimonial_3_insert = DB::table('breakthrough_testimonial')->insert([
            'testimonial_title_3'=>$request->testimonial_title,
            'testimonial_subtitle_3'=>$request->testimonial_subtitle,
            'testimonial_description_3'=>$request->testimonial_description,
            'testimonial_name_3'=>$request->testimonial_name,
            'testimonial_designation_3'=>$request->testimonial_designation,          
            'testimonial_image_3'=>$testimonial_image,
            'testimonial_status_3'=>1,            

        ]);
    }


    public function sec_3_submit_3con(Request $request){
        $response = array();
        if($request->hasfile('sec_3_img')){
            $file = $request->file('sec_3_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_3_img = $filename; 
        }
        $update_sec3_3 = DB::table('permanent_breakthrough')->where('id',1)->update([
            'sec_3_title'=>$request->sec_3_title,
            'sec_3_sub_title'=>$request->sec_3_sub_title,
            'sec_3_img'=>$sec_3_img,
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_3_element_submit_3con(Request $request){

        if($request->hasfile('sec_3_element_img')){
            $file = $request->file('sec_3_element_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_3_element_img = $filename; 
        }
        $sec_3_element = DB::table('page3_sec3_element')->insert([
            'sec_3_element_title'=>$request->sec_3_element_title,
            'sec_3_element_img'=> $sec_3_element_img
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_4_element_submit_3con(Request $request){

         $update_sec4_3 = DB::table('permanent_breakthrough')->where('id',1)->update([
            'sec_4_title'=>$request->sec_4_title,
            'sec_4_sub_title'=>$request->sec_4_sub_title,
            'sec_4_content'=>$request->sec_4_content,

        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_5_element_submit_3con(Request $request){

        // echo "<pre>";
        // print_r($request->all());exit;

        if($request->hasfile('sec_5_img')){
            $file = $request->file('sec_5_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_5_img = $filename; 
        }
        $sec_3_element = DB::table('permanent_breakthrough')->where('id',1)->update([
            
            'sec_5_img'=> $sec_5_img,
            'sec_5_content'=>$request->sec_5_content
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }


    public function sec_6_element_submit_3con(Request $request){

        // echo "<pre>";
        // print_r($request->all());exit;

        if($request->hasfile('sec_6_image')){
            $file = $request->file('sec_6_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_6_image = $filename; 
        }
        $sec_3_element = DB::table('permanent_breakthrough')->where('id',1)->update([
            
            'sec_6_image'=> $sec_6_image,
            'sec_6_title'=>$request->sec_6_title,
            'sec_6_sub_title'=>$request->sec_6_sub_title,
            'sec_6_link'=>$request->sec_6_link,
           
            'sec_6_link_bellow'=>$request->sec_6_link_bellow            
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }


    public function sec_7_submit_3con(Request $request){

        // echo "<pre>";
        // print_r($request->all());exit;

        
        $sec_7_insert = DB::table('permanent_breakthrough')->where('id',1)->update([
            
            'sec_7_title'=> $request->sec_7_title,
            'sec_7_sub_title'=>$request->sec_7_sub_title,
            'sec_7_content'=>$request->art_body,
                     
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }


    public function sec_7_element_submit_3con(Request $request){


        if($request->hasfile('sec_7_element_img')){
            $file = $request->file('sec_7_element_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_7_element_img = $filename; 
        }
        $sec_3_element = DB::table('permanent_breakthrough_course')->insert([
            
            'element_img'=> $sec_7_element_img,
            'element_title'=>$request->sec_7_element_title,
            'element_content'=>$request->art_body
               
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }



    public function sec_8_submit_3con(Request $request){

        $get_data = DB::table('permanent_breakthrough')->where('id',1)->select('sec_8_bgimage','sec_8_image')->first();
        if($request->hasfile('sec_8_bgimage')){
            $file = $request->file('sec_8_bgimage');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_8_bgimage = $filename; 
        }else{
            $sec_8_bgimage = $get_data->sec_8_bgimage;
        }
        if($request->hasfile('sec_8_image')){
            $file = $request->file('sec_8_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_8_image = $filename; 
        }else{
            $sec_8_image = $get_data->sec_8_image;
        }
        $sec_3_element = DB::table('permanent_breakthrough')->where('id',1)->update([
            
            'sec_8_bgimage'=> $sec_8_bgimage,
            'sec_8_title'=>$request->sec_8_title,
            'sec_8_sub_title'=>$request->sec_8_sub_title,
            'sec_8_content'=>$request->art_body,
            'sec_8_image'=>$sec_8_image,
            'sec_8_imgname'=>$request->sec_8_imgname           
               
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_9_submit_3con(Request $request){
        
        if($request->hasfile('sec_9_img')){
            $file = $request->file('sec_9_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_9_img = $filename; 
        }
        $sec_3_element = DB::table('permanent_breakthrough')->where('id',1)->update([
            
            'sec_9_img'=> $sec_9_img,            
            'sec_9_content'=>$request->art_body, 
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_10_submit_3con(Request $request){
        
        
        $sec_10_submit = DB::table('permanent_breakthrough')->where('id',1)->update([
            
            'sec_10_title'=> $request->sec_10_title, 
            'sec_10_sub_title'=> $request->sec_10_sub_title,            
            // 'sec_10_content'=>$request->art_body, 
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_10_element_submit_3con(Request $request){

        if($request->hasfile('sec_10_element_img')){
            $file = $request->file('sec_10_element_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_10_element_img = $filename; 
        }

        $sec_10_submit = DB::table('permanent_breakthrough_rightcource')->insert([
            
            'element_img'=> $sec_10_element_img, 
            'element_title'=> $request->sec_10_element_title,            
            'element_content'=>$request->art_body, 
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_11_submit_3con(Request $request){
        $sec_11_submit = DB::table('permanent_breakthrough')->where('id',1)->update([            
            'sec_11_title'=> $request->sec_11_title, 
            'sec_11_content'=> $request->art_body,        
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_12_submit_3con(Request $request){
        $get_data = DB::table('permanent_breakthrough')->where('id',1)->select('sec_12_img')->first();

        if($request->hasfile('sec_12_img')){
            $file = $request->file('sec_12_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $sec_12_img = $filename; 
        }else{
            $sec_12_img = $get_data->sec_12_img; 
        }

        $sec_12_submit = DB::table('permanent_breakthrough')->where('id',1)->update([            
            'sec_12_img'=> $sec_12_img, 
            'sec_12_content'=> $request->art_body,        
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_13_submit_3con(Request $request){
        $sec_13_submit = DB::table('permanent_breakthrough')->where('id',1)->update([            
            'sec_13_amount'=> $request->sec_13_amount,            
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }


    public function sec_14_submit_3con(Request $request){
        $sec_13_submit = DB::table('permanent_breakthrough')->where('id',1)->update([            
            'sec_14_title'=> $request->sec_14_title,
            'sec_14_sub_title'=> $request->sec_14_sub_title,             
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }

    public function sec_14_element_submit_3con(Request $request){
        $sec_14_submit_element = DB::table('permanent_breakthrough_faq')->insert([
            
            'question'=> $request->sec_14_element_qus, 
            'answer'=>$request->art_body, 
        ]);

        $response['status'] = 1;
        $response['msg'] = 'Changes saved';
        echo json_encode($response);
    }   

    public function edit_testimonial_3(){
        $id = $_GET['testimonial_id'];
       $get_testimonials = DB::table('breakthrough_testimonial')->where('id',$id)->first();
       $response['status'] = 1;
       $response['data'] = $get_testimonials;
       //echo json_encode($response);
       return response($response);
    }

    public function update_breakthro_testimonial(Request $request){
        $id = $request->edit_testimonial_id;
        $getimage = DB::table('breakthrough_testimonial')->where('id',$id)->select('testimonial_image_3')->first();
        
      
        if($request->hasfile('edit_testimonial_image_3')){
            $file = $request->file('edit_testimonial_image_3');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $edit_testimonial_image_3 = $filename; 
        }else{
            $edit_testimonial_image_3 = $getimage->testimonial_image_3;
        }
        $update_testimonial = DB::table('breakthrough_testimonial')->where('id',$id)->update([
            'testimonial_title_3'=>$request->edit_testimonial_title,
            'testimonial_subtitle_3'=>$request->edit_testimonial_subtitle,
            'testimonial_description_3'=>$request->edit_testimonial_description,
            'testimonial_name_3'=>$request->edit_testimonial_name,
            'testimonial_designation_3'=>$request->edit_testimonial_designation,
            'testimonial_image_3'=>$edit_testimonial_image_3,
        ]);
        if($update_testimonial){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            //echo json_encode($response);
            return response($response);
        }else{
            $response['status'] = 2;
            $response['msg'] = 'Data not updated successfully';
            //echo json_encode($response);
            return response($response);
        }
    }

    public function edit_course_curriculum_3(){
        $id = $_GET['course_curriculum_id'];

        $get_course_curriculum = DB::table('permanent_breakthrough_course')->where('id',$id)->first();

        $response['status'] = 1;
        $response['data'] = $get_course_curriculum;
        //echo json_encode($response);
        return response($response);
    }

    public function update_course_element_3(Request $request){
        $id = $request->edit_course_id;
        $getimage = DB::table('permanent_breakthrough_course')->where('id',$id)->select('element_img')->first();
        
      
        if($request->hasfile('edit_sec_7_element_img')){
            $file = $request->file('edit_sec_7_element_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $edit_sec_7_element_img = $filename; 
        }else{
            $edit_sec_7_element_img = $getimage->element_img;
        }
        $update_course = DB::table('permanent_breakthrough_course')->where('id',$id)->update([
            'element_img'=>$edit_sec_7_element_img,
            'element_title'=>$request->edit_sec_7_element_title,
            'element_content'=>$request->art_body,
            
        ]);
        if($update_course){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            //echo json_encode($response);
            return response($response);
        }else{
            $response['status'] = 2;
            $response['msg'] = 'Data not updated successfully';
            //echo json_encode($response);
            return response($response);
        }
    }

    public function edit_right_course_3(){
        $id = $_GET['right-course-id'];

        $get_right_course = DB::table('permanent_breakthrough_rightcource')->where('id',$id)->first();

        $response['status'] = 1;
        $response['data'] = $get_right_course;
        //echo json_encode($response);
        return response($response);
    }

    public function update_right_course_3(Request $request){
        $id = $request->edit_sec_10_element_id;
        $getimage = DB::table('permanent_breakthrough_rightcource')->where('id',$id)->select('element_img')->first();
        
      
        if($request->hasfile('edit_sec_10_element_img')){
            $file = $request->file('edit_sec_10_element_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'images/backend/pages_3/';
            $file->move($location,$filename);
            $edit_sec_10_element_img = $filename; 
        }else{
            $edit_sec_10_element_img = $getimage->element_img;
        }
        $update_course = DB::table('permanent_breakthrough_rightcource')->where('id',$id)->update([
            'element_img'=>$edit_sec_10_element_img,
            'element_title'=>$request->edit_sec_10_element_title,
            'element_content'=>$request->art_body,
            
        ]);
        if($update_course){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            //echo json_encode($response);
            return response($response);
        }else{
            $response['status'] = 2;
            $response['msg'] = 'Data not updated successfully';
            //echo json_encode($response);
            return response($response);
        }
    }

    public function edit_faq_3(){
        $id = $_GET['editfaq-id'];

        $get_faq = DB::table('permanent_breakthrough_faq')->where('id',$id)->first();

        $response['status'] = 1;
        $response['data'] = $get_faq;
        //echo json_encode($response);
        return response($response);
    }

    public function delete_faq_3(){
        $id = $_GET['deletefaq_id'];

        $delete_faq = DB::table('permanent_breakthrough_faq')->where('id',$id)->delete();

        $response['status'] = 1;
        return response($response);
    }

    public function update_faq_3(Request $request){
        $id = $request->edit_faq_id;

        $update_faq = DB::table('permanent_breakthrough_faq')->where('id',$id)->update([
            'question'=>$request->edit_sec_14_element_qus,
            'answer'=>$request->art_body,
            
        ]);
        if($update_faq){
            $response['status'] = 1;
            $response['msg'] = 'Data updated successfully';
            //echo json_encode($response);
            return response($response);
        }else{
            $response['status'] = 2;
            $response['msg'] = 'Data not updated successfully';
            //echo json_encode($response);
            return response($response);
        }
    }

    public function delete_you_get(){
        $id = $_GET['you_get_delete'];

        $delete_faq = DB::table('page3_sec3_element')->where('id',$id)->delete();

        $response['status'] = 1;
        return response($response);
    }


    
}
    