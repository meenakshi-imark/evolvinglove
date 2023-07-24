@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }
</style>

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Welcome Screen</h1>
        </div>
        <div class="white-box">
            <form class="form"  action="{{url('admin/welcome-screen-add')}}" method="post">
                @csrf
                
                <div class="control-group">
                    <label>Title</label>
                    <textarea type="text" name="welcome_title" placeholder="Write your title">@if(isset($welcome_screen_data)){{$welcome_screen_data->welcome_title}}@endif</textarea>
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea type="text" name="welcome_description" placeholder="Write your description">@if(isset($welcome_screen_data)){{$welcome_screen_data->welcome_description}}@endif</textarea>
                </div>
                <div class="control-group">
                    <label>Button</label>
                    <div class="maxlenght-count">
                        <p><span id="maxlenght_count">0</span> / 24</p>
                    </div>
                    <input id="maxlenght" class="word_count" type="text" name="welcome_Button" placeholder="Write your button text" maxlength="24" value="@if(isset($welcome_screen_data)){{$welcome_screen_data->welcome_Button}}@endif"></textarea>
                </div>
                <div class="control-group">
                    <label class="mb-0">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#media_gallery_moda">
                            <i class="fas fa-plus"></i> Add image
                        </a>
                    </label>
                </div>
                <div class="control-group">
                    <label>No-1 Text </label>                    
                    <input type="text" name="no1_text" placeholder="Write your description" value="@if(isset($welcome_screen_data)){{$welcome_screen_data->no1_text}}@endif">
                </div>
                <div class="control-group">
                    <label>No-2 Text </label>
                    <input type="text" name="no2_text" placeholder="Write your description" value="@if(isset($welcome_screen_data)){{$welcome_screen_data->no2_text}}@endif">
                </div>
                <!-- <div class="control-group">
                    <label>Setting</label>
                    <div class="ques-setting">
                        <div class="switch-input-list">
                            <label>
                                <span>Time to complete (?)</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                            <label>
                                <span>Number of submissions (?)</span>
                                <input class="switch-input" type="checkbox">
                            </label>
                        </div>
                    </div>
                </div> -->
                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </section>
    <aside class="ques-aside">
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
            @include('backend.quiz.all-quiz-question')
        </div>
    </aside>
</main>


<!-- Media Gallery Modal -->
<div class="modal modal-media fade" id="media_gallery_moda" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="media_gallery_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="media_gallery_modalLabel">Media Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
            </div>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="btn active" id="nav-Image-tab" data-bs-toggle="tab" data-bs-target="#nav-Image" type="button" role="tab" aria-controls="nav-Image" aria-selected="true">Upload Image</button>
                <!-- <button class="btn" id="nav-Video-tab" data-bs-toggle="tab" data-bs-target="#nav-Video" type="button" role="tab" aria-controls="nav-Video" aria-selected="false">Upload Video</button> -->
            </div>
            <div class="modal-body">
                <div class="tab-content w-100" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-Image" role="tabpanel" aria-labelledby="nav-Image-tab">
                        <form id="welcome_form" enctype="multipart/form-data">
                            @csrf 
                                <div class="control-group text-center mb-0">
                                <label class="upload-btn mb-0">
                                    <div id="welcome_image_preview" class="upload-preview" style="display: none;">
                                        <figure></figure>
                                    </div>
                                    <div class="right">
                                        <i class="fas fa-images"></i>
                                        <span>Drag & Drop <br>or <font class="color_primary">Browse</font></span>
                                        <input type="file" id="welcome_image_upload" accept=".png, .jpg, .jpeg" name="welcome_image_upload">
                                    </div>
                                </label>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Media Gallery Modal | END -->

@include('layouts.dashboard.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>

<script>
// Add welcome screen BG image
// $("#welcome_form").submit(function(e){
//      e.preventDefault();
//      var formData = $("#welcome_form").serialize();
//          $.ajax({
//           url: "/welcome-form",
//           type: "POST",
//           dataType: "json",
//           data: formData,
//           success: function(data){
//             if(data.status==1){
//                Swal.fire('Data updated succesfully!');
//                $('#welcome_form')[0].reset();
//                   }
//           },
//       });
//   })


$("#welcome_form").submit(function(e){
  e.preventDefault();
  var welcome_image_upload = $('#welcome_image_upload').prop('files')[0]; 
  var formData = new FormData(this);
  $.ajax({
    enctype: 'multipart/form-data',
    url: "/welcome-form",
    type: "POST",
    dataType: "json",

    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data){
    if(data.status==1){
       Swal.fire('Data updated succesfully!');
       $('#welcome_form')[0].reset();
       $('#media_gallery_moda').modal('hide');
          }
  },
  });
});
</script>






