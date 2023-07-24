@include('layouts.dashboard.header')
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }

    .alert-success {
      animation: cssAnimation 0s 3s forwards;
      visibility: visible;
    }

    @keyframes cssAnimation {
      to   {visibility: hidden;}
    }
</style>

<main class="content">
    
    <section class="main-content">
        <div class="alert alert-success showbiasmsg" style="text-align: center; display:none;">
            Data updated successfully
        </div>
       
        <div class="title-head">
            <h1>Permanent Break Through</h1>
        </div>
        <div class="white-box">


            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Break Through</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#menu1" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Testimonials</button>
                <button class="nav-link" id="nav-you_get" data-bs-toggle="tab" data-bs-target="#you_get" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">You’ll Get</button>
                <button class="nav-link" id="nav-you_learn" data-bs-toggle="tab" data-bs-target="#you_learn" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">You’ll Learn</button>
                <button class="nav-link" id="nav-welcome_msg" data-bs-toggle="tab" data-bs-target="#welcome_msg" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Welcome Message</button>
                <button class="nav-link" id="nav-register_now" data-bs-toggle="tab" data-bs-target="#register_now" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Register Now</button>
                <button class="nav-link" id="nav-course_curriculum" data-bs-toggle="tab" data-bs-target="#course_curriculum" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Course Curriculum</button>
                <button class="nav-link" id="nav-facilitators" data-bs-toggle="tab" data-bs-target="#facilitators" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Facilitators</button>
                <button class="nav-link" id="nav-dearest_message" data-bs-toggle="tab" data-bs-target="#dearest_message" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Dearest Message</button>
                <button class="nav-link" id="nav-right_course" data-bs-toggle="tab" data-bs-target="#right_course" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Right Course</button>
                <button class="nav-link" id="nav-course_notfor" data-bs-toggle="tab" data-bs-target="#course_notfor" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Course Not For</button>
                <button class="nav-link" id="nav-dearest_men" data-bs-toggle="tab" data-bs-target="#dearest_men" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Dearest Men</button>
                <button class="nav-link" id="nav-payment_form" data-bs-toggle="tab" data-bs-target="#payment_form" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Payment Form</button>
                <button class="nav-link" id="nav-faq" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">FAQ</button>
              </div>
            </nav>



     
           


            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form id="sec_1_submit_3" class="form mt-5" enctype="multipart/form-data">
                        @csrf
                        <div class="title-head">
                            <h3>PERMANENT RELATIONSHIP BREAK THROUGH</h3>
                        </div>
                        <div class="control-group">
                            <label>Title</label>
                            <input type="text" name="sec_1_title" id="sec_1_title" value="{{$get_sellpage3->sec_1_title}}" placeholder="Enter section title">
                        </div>
                        <div class="control-group">
                            <label>Sub-Title</label>
                            <input type="text" name="sec_1_sub_title" id="sec_1_sub_title" value="{{$get_sellpage3->sec_1_sub_title}}" placeholder="Enter section sub-title">
                        </div>

                        <div class="control-group">
                            <label>Image</label><br>
                            <img height="auto" width="60px" src="">
                            <input class="mt-2" type="file" id="sec_1_image" name="sec_1_image">
                        </div>
                        <div class="control-group">
                            <label>Description</label>
                            <input type="text" name="sec_1_des" id="sec_1_des" value="{{$get_sellpage3->sec_1_des}}" placeholder="Enter section sub-title">
                        </div>
                        <div class="control-group">
                            <label>Description Bellow</label>
                            <input type="text" name="sec_1_des_bellow" id="sec_1_des_bellow" value="{{$get_sellpage3->sec_1_des_bellow}}" placeholder="Enter section sub-title">
                        </div>
                        <div class="control-group">
                            <label>Link</label>
                            <input type="text" name="sec_1_link" id="sec_1_link" placeholder="Enter section sub-title" value="{{$get_sellpage3->sec_1_link}}">
                        </div>
                        <div class="control-group">
                            <label>Bellow Link</label>
                            <input type="text" name="sec_1_link_bellow" id="sec_1_link_bellow" placeholder="Enter section sub-title" value="{{$get_sellpage3->sec_1_link_bellow}}">
                        </div>

                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="menu1" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!-- <a href="{{url('admin/1-on-1-testimonial/add')}}" class="btn btn-primary" style="float:right; margin-right: 10px">Add New</a> -->
                    <div class="table-responsive mt-5 mb-3">
                        <a href="javascript:void(0)" onclick="showtes_form()" class="btn btn-primary" style="float:right; margin-right: 10px">Add New</a>
                    </div>
                    <div class="table-responsive" id="test_list">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Title</th>
                                    <th class="text-nowrap">Name</th>                                    
                                    <th class="text-nowrap">Image</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($get_testimonials as $get_testimonials_value)
                                <tr>
                                    <td>{{$get_testimonials_value->testimonial_title_3}}</td>
                                    <td>{{$get_testimonials_value->testimonial_name_3}}</td>
                                    
                                    <td><img width="25px" height="auto" src="{{asset('images/backend/pages_3/'.$get_testimonials_value->testimonial_image_3)}}" alt=""></td>
                                    <!-- @if($get_testimonials_value->testimonial_status_3 == 0)
                                    <td><span style="color:green">Active</span></td>
                                    @else
                                    <td><span style="color:red">Inactive</span></td>
                                    @endif -->
                                    <td>
                                        <a href="" id="" class="btn btn-primary edit_testi" value="{{$get_testimonials_value->id}}">Edit</a>
                                        <a href="" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive" id="test_form" style="display:none">
                        <form id="break_thr_form" class="form" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="control-group">
                                <label>Title</label>
                                <input type="text" name="testimonial_title" placeholder="Enter section title" value="">
                            </div>
                            <div class="control-group">
                                <label>Sub-Title</label>
                                <input type="text" name="testimonial_subtitle" id="sec_1_sub_title" placeholder="Enter section sub-title" value="">
                            </div>
                            <div class="control-group">
                                <label>Description</label>
                                <textarea type="text" name="testimonial_description" placeholder="Write your description"></textarea>
                            </div>
                            <div class="control-group">
                                <label>Name</label>
                                <input type="text" name="testimonial_name" placeholder="Enter name" value="">
                            </div>
                            <div class="control-group">
                                <label>Designation</label>
                                <input type="text" name="testimonial_designation" placeholder="Enter designation" value="">
                            </div>
                            <div class="control-group">
                                <label>Image</label>
                                <input type="file" name="testimonial_image" id="testimonial_image_3">
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive" id="edit_test_form" style="display:none">
                        <form id="edit_testi_form" class="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_testimonial_id" id="edit_testimonial_id">
                            <div class="control-group">
                                <label>Title</label>
                                <input type="text" name="edit_testimonial_title" id="edit_testimonial_title" placeholder="Enter section title" value="">
                            </div>
                            <div class="control-group">
                                <label>Sub-Title</label>
                                <input type="text" name="edit_testimonial_subtitle" id="edit_testimonial_subtitle" placeholder="Enter section sub-title" value="">
                            </div>
                            <div class="control-group">
                                <label>Description</label>
                                <textarea type="text" name="edit_testimonial_description" id="edit_testimonial_description"></textarea>
                            </div>
                            <div class="control-group">
                                <label>Name</label>
                                <input type="text" name="edit_testimonial_name" id="edit_testimonial_name">
                            </div>
                            <div class="control-group">
                                <label>Designation</label>
                                <input type="text" name="edit_testimonial_designation" id="edit_testimonial_designation">
                            </div>
                            <div class="control-group">
                                <label>Image</label>
                                <input type="file" name="edit_testimonial_image_3" id="edit_testimonial_image_3">
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                 
                </div>

                <div class="tab-pane fade show" id="you_get" role="tabpanel" aria-labelledby="nav-you_get">
                    <div class="table-responsive mt-5 mb-3" id="add_ele_you_get">
                        <a href="javascript:void(0)" onclick="show_add_element()" class="btn btn-primary" style="float:right; margin-right: 10px">Add Elements</a>
                    </div>
                    <div class="table-responsive" id="sec3-element-list">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap">Elements Title</th>
                                    <th class="text-nowrap">Elements Image</th>                                 
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                 @foreach($get_sec3_element as $get_sec3_element_value)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$get_sec3_element_value->sec_3_element_title}}</td>                                   
                                    <td><img height="40px" width="auto" src="{{asset('images/backend/pages_3/'.$get_sec3_element_value->sec_3_element_img)}}"></td>
                                    <td>
                                        <a href="" class="btn btn-primary">Edit</a>
                                        <!-- <a href="" class="btn btn-primary">Delete</a> -->
                                        <!-- <input type="submit" class="btn btn-primary click-delete" id="{{$get_sec3_element_value->id}}" value="Delete"> -->
                                        <a href="javascript:void(0)" onclick="click_delete({{$get_sec3_element_value->id}})" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr>
                                <?php $count ++ ;?>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="tab-pane fade active show">
                        @foreach($get_sec3_element as $get_sec3_element_value)
                        <div class="col-md-2" style="float: left;">
                            <img src="{{asset('images/backend/pages_3/'.$get_sec3_element_value->sec_3_element_img)}}"><br><label class="mt-2" style="text-align:center;">{{$get_sec3_element_value->sec_3_element_title}}</label><br>
                        </div>
                        @endforeach
                    </div> -->
                   

                    <div class="table-responsive mt-5" id="main_you_get">
                       
                        <form id="sec_3_submit_3" class="form mt-5" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="control-group">
                                <label>Section Title</label>
                                <input type="text" name="sec_3_title" id="sec_3_title" value="{{$get_sellpage3->sec_3_title}}" placeholder="Enter section title">
                            </div>
                            <div class="control-group">
                                <label>Section Sub-Title</label>
                                <input type="text" name="sec_3_sub_title" id="sec_3_sub_title" value="" placeholder="Enter section sub-title">
                            </div>
                            <div class="control-group">
                                <label>Background Image</label>
                                <input type="file" name="sec_3_img" id="sec_3_img" placeholder="Enter section sub-title">
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-7" id="element_you_get" style="display:none">
                        <form id="sec_3_submit_3_element" class="form" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="control-group">
                                <label>Element Title</label>
                                <input type="text" name="sec_3_element_title" placeholder="Enter section title" value="">
                            </div>
                            
                            <div class="control-group">
                                <label>Element Image</label>
                                <input type="file" name="sec_3_element_img" id="sec_3_element_img">
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>


                </div>





                <div class="tab-pane fade show" id="you_learn" role="tabpanel" aria-labelledby="nav-you_learn">
                    
                        <div class="title-head mt-5">
                            <h3>WHAT TO YOU’LL LEARN</h3>
                        </div>
                        <form id="sec_4_submit_3" class="form mt-2" enctype="multipart/form-data">
                            @csrf
                            <div class="control-group">
                                <label>Title</label>
                                <input type="text" name="sec_4_title" id="sec_4_title" value="{{$get_sellpage3->sec_4_title}}" placeholder="Enter section title">
                            </div>
                            <div class="control-group">
                                <label>Sub-Title</label>
                                <input type="text" name="sec_4_sub_title" id="sec_4_sub_title" value="{{$get_sellpage3->sec_4_sub_title}}" placeholder="Enter section sub-title">
                            </div>

                     
                            <div class="control-group">
                                <label>Description</label>
                                <textarea class="ckeditor" type="text" name="sec_4_content" id="sec_4_content">{{$get_sellpage3->sec_4_content}}</textarea>
                            </div>
                         

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="welcome_msg" role="tabpanel" aria-labelledby="nav-welcome_msg">
                    
                        <div class="title-head mt-5">
                            <h3>WHAT TO YOU’LL LEARN</h3>
                        </div>
                        <form id="sec_5_submit_3" class="form mt-2" enctype="multipart/form-data">
                            @csrf
                             <div class="control-group">
                                <label>Upload Image</label>
                                <input type="file" name="sec_5_img" id="sec_5_img">
                            </div>                           

                     
                            <div class="control-group">
                                <label>Description</label>
                                <textarea class="ckeditor" type="text" name="sec_5_content" id="sec_5_content">{{$get_sellpage3->sec_5_content}}</textarea>
                            </div>
                         

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

                <div class="tab-pane fade show " id="register_now" role="tabpanel" aria-labelledby="nav-register_now">
                    
                    <form id="sec_6_submit_3" class="form mt-5" enctype="multipart/form-data">
                        @csrf
                        <div class="title-head">
                            <h3>PERMANENT RELATIONSHIP BREAKTHROUGH</h3>
                        </div>

                        <div class="control-group">
                            <label>Image</label><br>
                            
                            <input class="mt-2" type="file" id="sec_6_image" name="sec_6_image">
                        </div>


                        <div class="control-group">
                            <label>Title</label>
                            <input type="text" name="sec_6_title" id="sec_6_title" value="{{$get_sellpage3->sec_6_title}}" placeholder="Enter section title">
                        </div>
                        <div class="control-group">
                            <label>Sub-Title</label>
                            <input type="text" name="sec_6_sub_title" id="sec_6_sub_title" value="{{$get_sellpage3->sec_6_sub_title}}" placeholder="Enter section sub-title">
                        </div>                        
                        
                        <div class="control-group">
                            <label>Link</label>
                            <input type="text" name="sec_6_link" id="sec_6_link" placeholder="Enter section sub-title" value="{{$get_sellpage3->sec_6_link}}">
                        </div>
                        <div class="control-group">
                            <label>Bellow Link</label>
                            <input type="text" name="sec_6_link_bellow" id="sec_6_link_bellow" placeholder="Enter section sub-title" value="{{$get_sellpage3->sec_6_link_bellow}}">
                        </div>

                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="course_curriculum" role="tabpanel" aria-labelledby="nav-course_curriculum">
                    <div class="table-responsive mt-5 mb-3">
                        <a href="javascript:void(0)" onclick="show_add_element_sec7()" class="btn btn-primary" style="float:right; margin-right: 10px">Add Elements</a>
                    </div>
                    <div class="table-responsive" id="sec7-element-list">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Elements Title</th>
                                    <th class="text-nowrap">Elements Image</th>                                 
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($get_sec7_element as $get_sec7_element_value)
                                <tr>
                                    <td>{{$get_sec7_element_value->element_title}}</td>                                   
                                    <td><img height="40px" width="auto" src="{{asset('images/backend/pages_3/'.$get_sec7_element_value->element_img)}}"></td>
                                    <td>
                                        <a href="" class="btn btn-primary edit_course_curriculum" id="{{$get_sec7_element_value->id}}">Edit</a>
                                        <a href="" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>                 
                   

                    <div class="table-responsive mt-5" id="main_course_curriculum">
                       
                        <form id="sec_7_form_3" class="form mt-5" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="control-group">
                                <label>Section Title</label>
                                <input type="text" name="sec_7_title" id="sec_7_title" value="{{$get_sellpage3->sec_7_title}}" placeholder="Enter section title">
                            </div>
                            <div class="control-group">
                                <label>Section Sub-Title</label>
                                <input type="text" name="sec_7_sub_title" id="sec_7_sub_title" value="{{$get_sellpage3->sec_7_sub_title}}" placeholder="Enter section sub-title">
                            </div>
                            <div class="control-group">
                                <label>Section Description</label>

                                <textarea class="ckeditor" type="text" name="sec_7_content" id="sec_7_content">{{$get_sellpage3->sec_7_content}}</textarea>
                                
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-7" id="element_course_curriculum" style="display:none">
                        <form id="sec_7_submit_3_element" class="form" enctype="multipart/form-data">
                            @csrf

                            <div class="control-group">
                                <label>Element Image</label>
                                <input type="file" name="sec_7_element_img" id="sec_7_element_img" required>
                                <span style="color:red; display:none" id="sapn_sec_7_image">Please select image</span>
                            </div>
                    
                            <div class="control-group">
                                <label>Element Title</label>
                                <input type="text" name="sec_7_element_title" id="sec_7_element_title" placeholder="Enter section title" value="">
                                <span style="color:red; display:none" id="sapn_sec_7_title">Please insert section title</span>
                            </div>

                            <div class="control-group">
                                <label>Element Description</label>
                                <textarea class="ckeditor" type="text" name="sec_7_element_content" id="sec_7_element_content"></textarea>
                                <span style="color:red; display:none" id="sapn_sec_7_content">Please select image</span>
                            </div>
                            
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-7" id="edit_course" style="display:none">
                        <form id="edit_sec_7_submit_3_element" class="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_course_id" id="edit_course_id">
                            <div class="control-group">
                                <label>Element Image</label>
                                <input type="file" name="edit_sec_7_element_img" id="edit_sec_7_element_img">
                            </div>
                    
                            <div class="control-group">
                                <label>Element Title</label>
                                <input type="text" name="edit_sec_7_element_title" id="edit_sec_7_element_title" placeholder="Enter section title" value="">
                            </div>

                            <div class="control-group">
                                <label>Element Description</label>
                                <textarea class="ckeditor" type="text" name="edit_sec_7_element_content" id="edit_sec_7_element_content"></textarea>
                            </div>
                            
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade show " id="facilitators" role="tabpanel" aria-labelledby="nav-facilitators">
                    
                    <form id="sec_8_form_3" class="form mt-5" enctype="multipart/form-data">
                        @csrf
                        <div class="title-head">
                            <h3>MEET YOUR FACILITATORS BRYAN FRANKLIN & JENNIFER RUSSELL</h3>
                        </div>

                        <div class="control-group">
                            <label>Background Image</label><br> 
                            <img width="30" height="auto" src="{{asset('images/backend/pages_3/'.$get_sellpage3->sec_8_bgimage)}}">
                            <input class="mt-2" type="file" id="sec_8_bgimage" name="sec_8_bgimage">
                        </div>


                        <div class="control-group">
                            <label>Title</label>
                            <input type="text" name="sec_8_title" id="sec_6_title" value="{{$get_sellpage3->sec_8_title}}" placeholder="Enter section title">
                        </div>
                        <div class="control-group">
                            <label>Sub-Title</label>
                            <input type="text" name="sec_8_sub_title" id="sec_8_sub_title" value="{{$get_sellpage3->sec_8_sub_title}}" placeholder="Enter section sub-title">
                        </div>                        
                        
                        <div class="control-group">
                            <label>Description</label>
                            <textarea class="ckeditor" type="text" name="sec_8_content" id="sec_8_content">{{$get_sellpage3->sec_8_content}}</textarea>
                        </div>
                        <div class="control-group">
                            <label>Image</label><br> 
                            <img width="30" height="auto" src="{{asset('images/backend/pages_3/'.$get_sellpage3->sec_8_image)}}">
                            <input class="mt-2" type="file" id="sec_8_image" name="sec_8_image">
                        </div>

                        <div class="control-group">
                            <label>Image Name</label>
                            <input type="text" name="sec_8_imgname" id="sec_8_imgname" value="{{$get_sellpage3->sec_8_imgname}}" placeholder="Enter section title">
                        </div>

                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="dearest_message" role="tabpanel" aria-labelledby="nav-dearest_message">
                    
                        <div class="title-head">
                            <h3>Message 2</h3>
                        </div>
                        <form id="sec_9_form_3" class="form mt-5" enctype="multipart/form-data">
                            @csrf
                             <div class="control-group">
                                <label>Upload Image</label>
                                <input type="file" name="sec_9_img" id="sec_9_img">
                            </div>                           

                     
                            <div class="control-group">
                                <label>Description</label>
                                <textarea class="ckeditor" type="text" name="sec_9_content" id="sec_9_content">{{$get_sellpage3->sec_9_content}}</textarea>
                            </div>
                         

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="right_course" role="tabpanel" aria-labelledby="nav-right_course">
                    <div class="table-responsive mt-5 mb-3" id="rightcourse_add_element">
                        <a href="javascript:void(0)" onclick="show_add_element_sec10()" class="btn btn-primary" style="float:right; margin-right: 10px">Add Elements</a>
                    </div>
                    <div class="table-responsive" id="sec10-element-list">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Elements Title</th>
                                    <th class="text-nowrap">Elements Image</th>                                 
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($get_sec10_element as $get_sec10_element_value)
                                <tr>
                                    <td>{{$get_sec10_element_value->element_title}}</td>                                   
                                    <td><img height="40px" width="auto" src="{{asset('images/backend/pages_3/'.$get_sec10_element_value->element_img)}}"></td>
                                    <td>
                                        <a href="" class="btn btn-primary edit_right_course" id="{{$get_sec10_element_value->id}}">Edit</a>
                                        <a href="" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>                    
             

                    <div class="table-responsive mt-5" id="main_rightcourse">
                           
                        <form id="sec_10_form_3" class="form mt-5" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="control-group">
                                <label>Section Title</label>
                                <input type="text" name="sec_10_title" id="sec_10_title" value="{{$get_sellpage3->sec_10_title}}" placeholder="Enter section title">
                            </div>
                            <div class="control-group">
                                <label>Section Sub-Title</label>
                                <input type="text" name="sec_10_sub_title" id="sec_10_sub_title" value="{{$get_sellpage3->sec_10_sub_title}}" placeholder="Enter section sub-title">
                            </div>
                          
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-7" id="element_rightcourse" style="display:none">
                        <form id="sec_10_form_3_element" class="form" enctype="multipart/form-data">
                            @csrf

                            <div class="control-group">
                                <label>Element Image</label>
                                <input type="file" name="sec_10_element_img" id="sec_10_element_img">
                            </div>
                    
                            <div class="control-group">
                                <label>Element Title</label>
                                <input type="text" name="sec_10_element_title" id="sec_10_element_title" placeholder="Enter section title" value="">
                            </div>

                            <div class="control-group">
                                <label>Element Description</label>
                                <textarea class="ckeditor" type="text" name="sec_10_element_content" id="sec_10_element_content"></textarea>
                            </div>
                            
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-5" id="edit_element_rightcourse" style="display:none">
                        <form id="edit_sec_10_form_3_element" class="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_sec_10_element_id" id="edit_sec_10_element_id">
                            <div class="control-group">
                                <label>Element Image</label><br>
                                <input type="file" name="edit_sec_10_element_img" id="edit_sec_10_element_img">
                            </div>
                    
                            <div class="control-group">
                                <label>Element Title</label>
                                <input type="text" name="edit_sec_10_element_title" id="edit_sec_10_element_title" placeholder="Enter section title" value="">
                            </div>

                            <div class="control-group">
                                <label>Element Description</label>
                                <textarea class="ckeditor" type="text" name="edit_sec_10_element_content" id="edit_sec_10_element_content"></textarea>
                            </div>
                            
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade show" id="course_notfor" role="tabpanel" aria-labelledby="nav-course_notfor">
                    
                        <div class="title-head mt-5">
                            <h3>WHAT TO YOU’LL LEARN</h3>
                        </div>
                        <form id="sec_11_submit_3" class="form mt-5" enctype="multipart/form-data">
                            @csrf
                             <div class="control-group">
                                <label>Title</label>
                                <input type="test" name="sec_11_title" id="sec_11_title" value="{{$get_sellpage3->sec_11_title}}">
                            </div>                           

                     
                            <div class="control-group">
                                <label>Description</label>
                                <textarea class="ckeditor" type="text" name="sec_11_content" id="sec_11_content">{{$get_sellpage3->sec_11_content}}</textarea>
                            </div>
                         

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="dearest_men" role="tabpanel" aria-labelledby="nav-dearest_men">
                    
                        <div class="title-head mt-5">
                            <h3>Message 3</h3>
                        </div>
                        <form id="sec_12_form_3" class="form mt-2" enctype="multipart/form-data">
                            @csrf
                             <div class="control-group">
                                <label>Upload Image</label>
                                <input type="file" name="sec_12_img" id="sec_12_img">
                            </div>                           

                     
                            <div class="control-group">
                                <label>Description</label>
                                <textarea class="ckeditor" type="text" name="sec_12_content" id="sec_12_content">{{$get_sellpage3->sec_12_content}}</textarea>
                            </div>
                         

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="payment_form" role="tabpanel" aria-labelledby="nav-payment_form">
                    
                        <div class="title-head mt-5">
                            <h3>Payment Form</h3>
                        </div>
                        <form id="sec_13_form_3" class="form mt-2" enctype="multipart/form-data">
                            @csrf
                             <div class="control-group">
                                <label>Set Amount</label>
                               <input type="text" name="sec_13_amount" id="sec_13_amount" value="{{$get_sellpage3->sec_13_amount}}">
                            </div>

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>


                <div class="tab-pane fade show" id="faq" role="tabpanel" aria-labelledby="nav-faq">
                    <div class="table-responsive mt-5 mb-3" id="faqaddelement">
                        <a href="javascript:void(0)" onclick="show_add_element_sec14()" class="btn btn-primary" style="float:right; margin-right: 10px">Add Question</a>
                    </div>
                    <div class="table-responsive" id="sec14-element-list">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Question</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody id="refresh_faq">
                                 @foreach($get_sec14_element as $get_sec14_element_value)
                                <tr>
                                    <td>{{$get_sec14_element_value->question}}</td>                                   
                                   
                                    <td>
                                        <a href="" class="btn btn-primary editfaq" id="{{$get_sec14_element_value->id}}">Edit</a>
                                        <!-- <a href="" class="btn btn-primary deletefaq" id="{{$get_sec14_element_value->id}}">Delete</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="deletefaq({{$get_sec14_element_value->id}})">Delete</a>
                                    </td>
                                </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive mt-5" id="main_faq">
                       
                        <form id="sec_14_form_3" class="form mt-5" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="control-group">
                                <label>Section Title</label>
                                <input type="text" name="sec_14_title" id="sec_14_title" value="{{$get_sellpage3->sec_14_title}}" placeholder="Enter section title">
                            </div>
                            <div class="control-group">
                                <label>Section Sub-Title</label>
                                <input type="text" name="sec_14_sub_title" id="sec_14_sub_title" value="{{$get_sellpage3->sec_14_sub_title}}" placeholder="Enter section sub-title">
                            </div>
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-7" id="element_faq" style="display:none">
                        <form id="sec_14_submit_3_element" class="form" enctype="multipart/form-data">
                            @csrf

                            
                    
                            <div class="control-group">
                                <label>Question</label>
                                <input type="text" name="sec_14_element_qus">
                            </div>

                            <div class="control-group">
                                <label>Answer</label>
                                <textarea class="ckeditor" type="text" name="sec_14_element_ans" id="sec_14_element_ans"></textarea>
                            </div>
                            
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                   

                    <div class="table-responsive mt-7" id="edit_element_faq" style="display:none">
                        <form id="edit_sec_14_submit_3_element" class="form" enctype="multipart/form-data">
                            @csrf                            
                            <input type="hidden" name="edit_faq_id" id="edit_faq_id">
                            <div class="control-group">
                                <label>Question</label>
                                <input type="text" name="edit_sec_14_element_qus" id="edit_sec_14_element_qus" placeholder="Enter section title">
                            </div>

                            <div class="control-group">
                                <label>Answer</label>
                                <textarea class="ckeditor" type="text" name="edit_sec_14_element_ans" id="edit_sec_14_element_ans"></textarea>
                            </div>
                            
                            
                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade show" id="payment_form" role="tabpanel" aria-labelledby="nav-payment_form">
                    
                        <div class="title-head mt-5">
                            <h3>Payment Form</h3>
                        </div>
                        <form id="sec_13_form_3" class="form mt-2" enctype="multipart/form-data">
                            @csrf
                             <div class="control-group">
                                <label>Set Amount</label>
                               <input type="text" name="sec_13_amount" id="sec_13_amount" value="{{$get_sellpage3->sec_13_amount}}">
                            </div>

                            <div class="form-btn">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>

                <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> -->
            </div>

<!-- Tabs content -->
           
        </div>
<!-- Tabs content -->
        </div>
    </section>
   
</main>


@include('layouts.dashboard.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $('#nav-course_curriculum').click(function(){
        $('#edit_course').css('display','none');
        $('#sec7-element-list').css('display','');
        $('#main_course_curriculum').css('display','');
        $('#element_course_curriculum').css('display','none');
    })

    $('#nav-right_course').click(function(){
        $('#edit_element_faq').css('display','none');
       $('#rightcourse_add_element').css('display','none');
       $('#sec10-element-list').css('display','');
       $('#main_rightcourse').css('display','');
       $('#element_rightcourse').css('display','none');
    })

    $('#nav-faq').click(function(){
        $('#edit_element_rightcourse').css('display','none');
       $('#rightcourse_add_element').css('display','');
       $('#sec14-element-list').css('display','');
       $('#main_faq').css('display','');
       $('#element_faq').css('display','none');
    })

    

    
    $("#sec_1_submit_3").submit(function(e){
        e.preventDefault();

        var sec_1_image = $('#sec_1_image').prop('files')[0]; 
        var formData = new FormData(this);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-1-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#home").load(location.href + " #home");
                }
            },
        });
    });
</script>


<!-- For tab 2nd -->

<script>
    function showtes_form(){
        $('#test_form').css('display','');
        $('#test_list').css('display','none');
    }

    $('document').ready(function(){
        $('#nav-profile-tab').click(function(){
            $('#test_form').css('display','none')
            $('#test_list').css('display','');
        })
        $("#break_thr_form").submit(function(e){
        e.preventDefault();

        var testimonial_image = $('#testimonial_image_3').prop('files')[0]; 
        var formData = new FormData(this);

            $.ajax({
                enctype: 'multipart/form-data',
                url: "/page3-testimonial",
                type: "POST",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.status==1){
                       alert('Done')
                    }
                },
            });
        });
    })
</script>



<!-- You get -->


<script>
    function show_add_element(){
        $('#element_you_get').css('display','');
        $('#main_you_get').css('display','none');
        $('#sec3-element-list').css('display','none');
    }


    $('document').ready(function(){
        $('#nav-profile-tab').click(function(){
            $('#test_form').css('display','none')
            $('#test_list').css('display','');
        })

        // $('#nav-you_get').click(function(){
        //     $('#element_you_get').css('display','none')
        //     $('#sec_3_submit_3').css('display','');
        // })

        

        $("#break_thr_form").submit(function(e){
        e.preventDefault();

        var testimonial_image = $('#testimonial_image_3').prop('files')[0]; 
        var formData = new FormData(this);

            $.ajax({
                enctype: 'multipart/form-data',
                url: "/page3-testimonial",
                type: "POST",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.status==1){
                       $("#menu1").load(location.href + " #menu1");
                    }
                },
            });
        });
    })
</script>

<script type="text/javascript">
    $("#sec_3_submit_3").submit(function(e){
        e.preventDefault();
        var sec_3_img = $('#sec_3_img').prop('files')[0]; 
        
        var formData = new FormData(this);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-3-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });
</script>

<script type="text/javascript">
    $("#sec_3_submit_3_element").submit(function(e){
        e.preventDefault();

        var sec_3_element_img = $('#sec_3_element_img').prop('files')[0]; 
        var formData = new FormData(this);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-3-element-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                    $("#element_you_get").css("display","none")
                    $("#add_ele_you_get").css("display","")
                    $("#sec3-element-list").css("display","")
                    $("#main_you_get").css("display","")    
                    $("#rsec3-element-list").load(" #sec3-element-list");
                    Swal.fire(
                      'Element add',
                      'Successfully!',
                      'success'
                    )

                }
            },
        });
    });

    $("#sec_4_submit_3").submit(function(e){
        e.preventDefault();

        var sec_3_element_img = $('#sec_3_element_img').prop('files')[0]; 
        var formData = new FormData(this);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-4-element-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


    $("#sec_5_submit_3").submit(function(e){
        e.preventDefault();

        var sec_5_img = $('#sec_5_img').prop('files')[0]; 
        var formData = new FormData(this);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-5-element-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                )
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


    $("#sec_6_submit_3").submit(function(e){
        e.preventDefault();

        var sec_6_image = $('#sec_6_image').prop('files')[0]; 
        var formData = new FormData(this);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-6-element-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                )
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


    function show_add_element_sec7(){
        $('#main_course_curriculum').css('display','none');
        $('#sec7-element-list').css('display','none');
        $('#element_course_curriculum').css('display','');
    }


    $("#sec_7_form_3").submit(function(e){
        e.preventDefault();
        var art_body = CKEDITOR.instances.sec_7_content.getData(); 
        //var sec_6_image = $('#sec_6_image').prop('files')[0]; 
        var formData = new FormData(this);
        formData.append('art_body', art_body);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-7-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                )
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


    $("#sec_7_submit_3_element").submit(function(e){
        e.preventDefault();
        var sec_7_element_title = $("#sec_7_element_title").val();
        if(sec_7_element_title.length <=0){
            $("#sapn_sec_7_title").css("display","");
            return false;
        }
        else{
            $("#sapn_sec_7_title").css("display","none");
            return true;
        }

       

        

        
        var art_body_element = CKEDITOR.instances.sec_7_element_content.getData();
        
        var sec_7_element_img = $('#sec_7_element_img').prop('files')[0]; 
        
     
        var formData = new FormData(this);
        formData.append('art_body', art_body_element);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-7-element-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                ) 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });



    $("#sec_8_form_3").submit(function(e){
        e.preventDefault();

        var sec_8_content = CKEDITOR.instances.sec_8_content.getData();
        var sec_8_bgimage = $('#sec_8_bgimage').prop('files')[0]; 
        var sec_8_image = $('#sec_8_image').prop('files')[0]; 
     
        var formData = new FormData(this);
        formData.append('art_body', sec_8_content);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-8-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                )
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


    $("#sec_9_form_3").submit(function(e){
        e.preventDefault();

        var sec_9_content = CKEDITOR.instances.sec_9_content.getData();
        var sec_9_img = $('#sec_9_img').prop('files')[0]; 
        
     
        var formData = new FormData(this);
        formData.append('art_body', sec_9_content);

        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-9-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


    $("#sec_10_form_3").submit(function(e){
        e.preventDefault();     
        var formData = new FormData(this);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-10-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                  ) 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });

    function show_add_element_sec10(){
        $('#element_rightcourse').css('display','');
        $('#main_rightcourse').css('display','none');
        $('#sec10-element-list').css('display','none');
    }

    $("#sec_10_form_3_element").submit(function(e){
        e.preventDefault();  

        var sec_10_element_content = CKEDITOR.instances.sec_10_element_content.getData();
        var sec_10_element_img = $('#sec_10_element_img').prop('files')[0]; 
           
        var formData = new FormData(this);
        formData.append('art_body', sec_10_element_content);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-10-submit-3_elemrnt",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                ) 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });

$("#sec_11_submit_3").submit(function(e){
        e.preventDefault();   
        var sec_11_content = CKEDITOR.instances.sec_11_content.getData();  
        var formData = new FormData(this);
        formData.append('art_body', sec_11_content);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-11-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });


$("#sec_12_form_3").submit(function(e){
        e.preventDefault();   
        var sec_12_content = CKEDITOR.instances.sec_12_content.getData();  
        var formData = new FormData(this);
        formData.append('art_body', sec_12_content);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-12-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                ) 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });

$("#sec_13_form_3").submit(function(e){
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-13-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });




function show_add_element_sec14(){
        $('#element_faq').css('display','');
        $('#main_faq').css('display','none');
        $('#sec14-element-list').css('display','none');
    }

    $("#sec_14_form_3").submit(function(e){
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-14-submit-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }
            },
        });
    });

    $("#sec_14_submit_3_element").submit(function(e){
        e.preventDefault();  

        var sec_14_element_ans = CKEDITOR.instances.sec_14_element_ans.getData();
        var formData = new FormData(this);
        formData.append('art_body', sec_14_element_ans);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/sec-14-submit-3_elemrnt",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                    Swal.fire(
                      'New Question added',
                      'Successfully!',
                      'success'
                    ) 
                    $('#sec_14_submit_3_element')[0].reset();
                    
                    $('#sec14-element-list').css("display","")
                    $('#main_faq').css("display","")
                    $('#element_faq').css("display","none")   
                    $("#faq").load(" #faq"); 
                                  
                }
            },
        });
    });

    // Edit Testimonials

    $('.edit_testi').click(function(e){
        e.preventDefault(); 
        var edit_testi_id = $(this).attr('value');
        $.ajax({
            url: "/edit-testimonial-3",
            type: "GET",            
            data: {"testimonial_id":edit_testi_id},
            
            success: function(data){
                if(data.status==1){
                   $('#edit_test_form').css('display','');
                   $('#test_form').css('display','none');
                   $('#test_list').css('display','none');
                   $('#edit_testimonial_id').val(data.data.id);
                   $('#edit_testimonial_title').val(data.data.testimonial_title_3);
                   $('#edit_testimonial_subtitle').val(data.data.testimonial_subtitle_3);
                   $('#edit_testimonial_description').val(data.data.testimonial_description_3);
                   $('#edit_testimonial_name').val(data.data.testimonial_name_3);
                   $('#edit_testimonial_designation').val(data.data.testimonial_designation_3);
                

                }
            },
        });
    })
    

    $("#edit_testi_form").submit(function(e){
        e.preventDefault();  

        //var edit_testimonial_description = CKEDITOR.instances.edit_testimonial_description.getData();
        var edit_testimonial_image_3 = $('#edit_testimonial_image_3').prop('files')[0]; 
           
        var formData = new FormData(this);
        //formData.append('art_body', edit_testimonial_description);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/update-breakthro-testimonial",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                ) 
                   $("#menu1").load(location.href + " #menu1");
                }else{
                    alert('Not Done');               
                }
            },
        });
    });

    // Edit Course Curriculum

    $('.edit_course_curriculum').click(function(e){
        e.preventDefault(); 
        var edit_course_id = $(this).attr('id');
        $.ajax({

            url: "/edit-course-curriculum-3",
            type: "GET",            
            data: {"course_curriculum_id":edit_course_id},
            
            success: function(data){
                if(data.status==1){
                   $('#edit_course').css('display','');
                   $('#sec7-element-list').css('display','none');
                   $('#main_course_curriculum').css('display','none');
                   $('#element_course_curriculum').css('display','none');
                   $('#edit_course_id').val(data.data.id);
                   $('#edit_sec_7_element_title').val(data.data.element_title);                  
                   CKEDITOR.instances['edit_sec_7_element_content'].insertHtml(data.data.element_content);
                }
            },
        });
    })
    

    $("#edit_sec_7_submit_3_element").submit(function(e){
        e.preventDefault();  

        var edit_sec_7_element_content = CKEDITOR.instances.edit_sec_7_element_content.getData();
        var edit_sec_7_element_img = $('#edit_sec_7_element_img').prop('files')[0]; 
           
        var formData = new FormData(this);
        formData.append('art_body', edit_sec_7_element_content);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/update-course-element-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#tttttttt").load(" #tttttttt");
                }else{
                    alert('Not Done');               
                }
            },
        });
    });


    // Edit Right Course

    $('.edit_right_course').click(function(e){
        e.preventDefault(); 
        var edit_right_course_id = $(this).attr('id');
        $.ajax({

            url: "/edit-right-course-3",
            type: "GET",            
            data: {"right-course-id":edit_right_course_id},
            
            success: function(data){
                if(data.status==1){
                    
                   $('#edit_element_rightcourse').css('display','');
                   $('#rightcourse_add_element').css('display','none');
                   $('#sec10-element-list').css('display','none');
                   $('#main_rightcourse').css('display','none');
                   $('#element_rightcourse').css('display','none');
                   $('#edit_sec_10_element_id').val(data.data.id);
                   $('#edit_sec_10_element_title').val(data.data.element_title);                  
                   CKEDITOR.instances['edit_sec_10_element_content'].insertHtml(data.data.element_content);
                }
            },
        });
    })
    

    $("#edit_sec_10_form_3_element").submit(function(e){
        e.preventDefault();  

        var edit_sec_10_element_content = CKEDITOR.instances.edit_sec_10_element_content.getData();
        var edit_sec_10_element_img = $('#edit_sec_10_element_img').prop('files')[0]; 
           
        var formData = new FormData(this);
        formData.append('art_body', edit_sec_10_element_content);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/update-right-course-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Update!',
                  'Successfully!',
                  'success'
                ) 
                   $("#right_course").load(location.href + " #right_course");
                }else{
                    alert('Not Done');               
                }
            },
        });
    });


    // Edit FAQ

    $('.editfaq').click(function(e){
        e.preventDefault(); 
        var editfaq_id = $(this).attr('id');
        $.ajax({

            url: "/edit-faq-3",
            type: "GET",            
            data: {"editfaq-id":editfaq_id},
            
            success: function(data){
                if(data.status==1){
                   $('#edit_element_faq').css('display',''); 
                   $('#faqaddelement').css('display','none');                  
                   $('#sec14-element-list').css('display','none');
                   $('#main_faq').css('display','none');
                   $('#element_faq').css('display','none');
                   $('#edit_faq_id').val(data.data.id);
                   $('#edit_sec_14_element_qus').val(data.data.question);                  
                   CKEDITOR.instances['edit_sec_14_element_ans'].insertHtml(data.data.answer);
                }
            },
        });
    })
    
    // Delete FAQ

    // $('.deletefaq').click(function(e){
    //     e.preventDefault(); 
    //     var deletefaq_id = $(this).attr('id');
    //     $.ajax({

    //         url: "/delete-faq-3",
    //         type: "GET",            
    //         data: {"deletefaq_id":deletefaq_id},
            
    //         success: function(data){
    //             if(data.status==1){
    //                 Swal.fire(
    //                     'Question Delete',
    //                     'Successfully!',
    //                     'success'
    //                 )
    //                 //$("#refresh_faq").load(" #refresh_faq");
    //                 $("#faq").load(location.href + " #faq");
                    
    //             }
    //         },
    //     });
    // })

    function deletefaq(id){
        
        var deletefaq_id = id
        $.ajax({

            url: "/delete-faq-3",
            type: "GET",            
            data: {"deletefaq_id":deletefaq_id},
            
            success: function(data){
                if(data.status==1){
                    Swal.fire(
                        'Question Delete',
                        'Successfully!',
                        'success'
                    )
                    //$("#refresh_faq").load(" #refresh_faq");
                    $("#faq").load(location.href + " #faq");
                    
                }
            },
        });
    }





    

    $("#edit_sec_14_submit_3_element").submit(function(e){
        e.preventDefault();  

        var edit_sec_14_element_ans = CKEDITOR.instances.edit_sec_14_element_ans.getData();        
           
        var formData = new FormData(this);
        formData.append('art_body', edit_sec_14_element_ans);
        $.ajax({
            enctype: 'multipart/form-data',
            url: "/update-faq-3",
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Updated',
                  'Successfully!',
                  'success'
                )
                $("#refresh_faq").load(" #refresh_faq");
                $('#sec14-element-list').css("display","")
                $('#main_faq').css("display","")
                $('#edit_element_faq').css("display","none")
                
                }else{
                    alert('Not Done');               
                }
            },
        });
    });


    

    //Delete you'll get
    function click_delete(id){
    var you_get_delete = id;
        $.ajax({
            url: "/delete-you-get",
            type: "GET",
            data: {"you_get_delete":you_get_delete},
            success: function(data){
                if(data.status==1){
                   Swal.fire(
                  'Data Deleted',
                  'Successfully!',
                  'success'
                )
                $("#sec3-element-list").load(" #sec3-element-list");
                
                
                }else{
                    alert('Not Done');               
                }
            },
        });

        
    };


</script>






















