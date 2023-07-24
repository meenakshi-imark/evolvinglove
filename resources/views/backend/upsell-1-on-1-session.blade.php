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
            <h1>Add Question</h1>
        </div>
        <div class="white-box">
            <form method="POST" action="{{url('admin/pages/create-page-1-1')}}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="title-head">
                    <h1>Section #1</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_1_title" id="sec_1_title" placeholder="Enter section title" value="{{$create_page_data->sec_1_title}}">
                </div>
                <div class="control-group">
                    <label>Sub-Title</label>
                    <input type="text" name="sec_1_sub_title" id="sec_1_sub_title" placeholder="Enter section sub-title" value="{{$create_page_data->sec_1_sub_title}}">
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea class="ckeditor" type="text" name="sec_1_description" placeholder="Write your description">{!!$create_page_data->sec_1_description!!}</textarea>
                </div>
                <div class="control-group">
                    <label>Image</label><br>
                    <img height="auto" width="60px" src="{{asset('images/backend/pages_1_1/'.$create_page_data->sec_1_image)}}">
                    <input class="mt-2" type="file" name="sec_1_image">
                </div>

                <div class="title-head">
                    <h1>Section #2</h1>
                </div>
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="sec_2_title" id="sec_2_title" placeholder="Enter section title" value="{{$create_page_data->sec_2_title}}">
                </div>
                <div class="control-group">
                    <label>Column 1 Title</label>
                    <input type="text" name="sec_2_col1_title" id="sec_2_title" placeholder="Enter section title" value="{{$create_page_data->sec_2_col1_title}}">
                </div>
                <div class="control-group">
                    <label>Column 1 Description</label>
                    <textarea type="text" name="sec_2_col1_des" placeholder="Write your description">{{$create_page_data->sec_2_col1_des}}</textarea>
                </div>

                <div class="control-group">
                    <label>Column 2 Title</label>
                    <input type="text" name="sec_2_col2_title" placeholder="Enter section title" value="{{$create_page_data->sec_2_col2_title}}">
                </div>
                <div class="control-group">
                    <label>Column 2 Description</label>
                    <textarea type="text" name="sec_2_col2_des" placeholder="Write your description">{{$create_page_data->sec_2_col2_des}}</textarea>
                </div>

                <div class="control-group">
                    <label>Column 3 Title</label>
                    <input type="text" name="sec_2_col3_title" placeholder="Enter section title" value="{{$create_page_data->sec_2_col3_title}}">
                </div>
                <div class="control-group">
                    <label>Column 3 Description</label>
                    <textarea type="text" name="sec_2_col3_des" placeholder="Write your description">{{$create_page_data->sec_2_col3_des}}</textarea>
                </div>
                <div class="control-group">
                    <label>Background Image</label><br>
                    <img height="auto" width="60px" src="{{asset('images/backend/pages_1_1//'.$create_page_data->sec_2_image_bg)}}">
                    <input type="file" name="sec_2_image_bg">
                </div>

                <div class="title-head">
                    <h1>Section #3</h1>
                </div>

                <div class="control-group">
                    <label>Column 1 Title</label>
                    <input type="text" name="sec_3_col1_title" placeholder="Enter section title" value="{{$create_page_data->sec_3_col1_title}}">
                </div>
                <div class="control-group">
                    <label>Column 1 Description</label>
                    <textarea type="text" name="sec_3_col1_des" placeholder="Write your description">{{$create_page_data->sec_3_col1_des}}</textarea>
                </div>
                <div class="control-group">
                    <label>Column 1 Amount</label>
                    <input type="text" name="sec_3_col1_amount" value="{{$create_page_data->sec_3_col1_amount}}">
                </div>

                <div class="control-group">
                    <label>Column 2 Title</label>
                    <input type="text" name="sec_3_col2_title" placeholder="Enter section title" value="{{$create_page_data->sec_3_col2_title}}">
                </div>
                <div class="control-group">
                    <label>Column 2 Description</label>
                    <textarea type="text" name="sec_3_col2_des" placeholder="Write your description">value="{{$create_page_data->sec_3_col2_des}}"</textarea>
                </div>
                <div class="control-group">
                    <label>Column 2 Amount</label>
                    <input type="text" name="sec_3_col2_amount" value="{{$create_page_data->sec_3_col2_amount}}">
                </div>

                <div class="title-head">
                    <h1>Section #4</h1>
                </div>
                <div class="control-group">
                    <label>Column 4 Title</label>
                    <input type="text" name="sec_4_title" placeholder="Enter section title" value="{{$create_page_data->sec_4_title}}">
                </div>
                <div class="control-group">
                    <label>Column 4 Sub-Title</label>
                    <input type="text" name="sec_4_sub_title" placeholder="Enter section title" value="{{$create_page_data->sec_4_sub_title}}">
                </div>
                <div class="control-group">
                    <label>Column 4 Description</label>
                    <textarea class="ckeditor" type="text" name="sec_4_des" placeholder="Write your description">{!!$create_page_data->sec_4_des!!}</textarea>
                </div>
                <div class="control-group">
                    <label>Column 4 Image</label><br>
                    <img height="auto" width="60px" src="{{asset('images/backend/pages_1_1/'.$create_page_data->sec_4_image)}}">
                    <input type="file" name="sec_4_image">
                </div>
                <div class="control-group">
                    <label>Column 4 Image-Title</label>
                    <input type="text" name="sec_4_image_title" value="{{$create_page_data->sec_4_image_title}}">
                </div>

                <div class="control-group">
                    <label>Background Image</label><br>
                    <img height="auto" width="60px" src="{{asset('images/backend/pages_1_1/'.$create_page_data->sec_4_image_bg)}}">
                    <input type="file" name="sec_4_image_bg">
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