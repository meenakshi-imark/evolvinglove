@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }
</style>

<main class="content">
    
    <section class="main-content">
        @if(session()->has('create_page11'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('create_page11') }}
    </div>
    @endif
        <div class="title-head">
            <h1>Upgrade Profile</h1>
        </div>
        <div class="white-box">
            <form method="POST" action="{{url('admin/pages/create-upgrade-profile')}}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="title-head">
                    <h1>Section #1</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_1_title" id="sec_1_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_1_title}}">
                </div>
                <div class="control-group">
                    <label>Sub-Title</label>
                    <input type="text" name="sec_1_sub_title" id="sec_1_sub_title" placeholder="Enter section sub-title" value="{{$upgrade_pro_data->sec_1_sub_title}}">
                </div>
                <div class="control-group">
                    <label>Image 1st</label></br>
                    <img height="auto" width="60px" src="{{asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_1_image_1)}}">
                    <input type="file" name="sec_1_image_1">
                </div>
                <div class="control-group">
                    <label>Image 2nd</label></br>
                     <img height="auto" width="60px" src="{{asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_1_image_2)}}">
                    <input type="file" name="sec_1_image_2">
                </div>

                <div class="title-head">
                    <h1>Section #4</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_4_title" id="sec_4_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_4_title}}">
                </div>
                <div class="control-group">
                    <label>Sub Title</label>
                    <input type="text" name="sec_4_sub_title" id="sec_4_sub_title" placeholder="Enter section sub title" value="{{$upgrade_pro_data->sec_4_sub_title}}">
                </div>

                <div class="title-head">
                    <h1>Section #5</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_5_title" id="sec_5_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_5_title}}">
                </div>

                


                <div class="title-head">
                    <h1>Section #6</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_6_title" id="sec_6_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_6_title}}">
                </div>
                <div class="control-group">
                    <label>Sub Title</label>
                    <input type="text" name="sec_6_sub_title" id="sec_6_sub_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_6_sub_title}}">
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea class="ckeditor" type="text" name="sec_6_description" placeholder="Write your description">{!!$upgrade_pro_data->sec_6_description!!}</textarea>
                </div>
                <div class="control-group">
                    <label>Image</label></br>
                    <img height="auto" width="60px" src="{{asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_6_image)}}">
                    <input type="file" name="sec_6_image">
                </div>
                <div class="control-group">
                    <label>Background Image</label><br>
                    <img height="auto" width="60px" src="{{asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_6_backgroundimage)}}">
                    <input type="file" name="sec_6_backgroundimage">
                </div>

                <div class="title-head">
                    <h1>Section #7</h1>
                </div>
                <div class="control-group">
                    <label>Sale amount</label>
                    <input type="text" name="sec_7_amount" id="sec_7_amount" placeholder="Enter sale amount" value="{{$upgrade_pro_data->sec_7_amount}}">
                </div>








                <div class="title-head">
                    <h1>Section #8</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_8_title" id="sec_8_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_8_title}}">
                </div>
                <div class="control-group">
                    <label>Sub Title</label>
                    <input type="text" name="sec_8_sub_title" id="sec_8_sub_title" placeholder="Enter section sub title" value="{{$upgrade_pro_data->sec_8_sub_title}}">
                </div>

                <div class="title-head">
                    <h1>Section #9</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_9_title" id="sec_9_title" placeholder="Enter section title" value="{{$upgrade_pro_data->sec_9_title}}">
                </div>
                <div class="control-group">
                    <label>Sub Title</label>
                    <input type="text" name="sec_9_sub_title" id="sec_9_sub_title" placeholder="Enter section sub title" value="{{$upgrade_pro_data->sec_9_sub_title}}">
                </div>

                
                

                
                
                

                
                

                


























                <!-- <div class="control-group">
                    <label>Question</label>
                    <textarea type="text" name="question" placeholder="Write your question"></textarea>
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea type="text" name="description" placeholder="Write your description"></textarea>
                </div>
                <div class="control-group">
                    <label>Email</label>
                    <input type="text" name="email" value="Write your email" readonly>
                </div>
                <div class="control-group">
                    <label>Setting</label>
                    <div class="ques-setting">
                        <div class="switch-input-list">
                            <label>
                                <span>Required</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                        </div>
                    </div>
                </div> -->
                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </section>
    <!-- <aside class="ques-aside">
        <div class="single">
        </div>
        <div class="single">
            <div class="d-flex align-items justify-content-between equal_gutter">
                <label class="mb-0">Add background image</label>
                <button href="javascript:void(0)" class="btn btn-grey sm upload-btn">
                    Add <input type="file" id="background_image_upload" accept=".png, .jpg, .jpeg">
                </button>
                <div id="background_image_preview" class="upload-preview" style="display: none;">
                    <figure></figure>
                </div>
            </div>
        </div>
        <div class="single">
           
        </div>
    </aside> -->
</main>


@include('layouts.dashboard.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>