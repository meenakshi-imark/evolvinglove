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
            <h1>Add Testimonial For 1:on:1 Page</h1>
        </div>
        <div class="white-box">
            <form method="POST" action="{{url('admin/1-on-1-testimonial/create')}}" class="form" enctype="multipart/form-data">
                @csrf
                
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="testimonial_title" placeholder="Enter section title" value="" required>
                </div>
                <div class="control-group">
                    <label>Sub-Title</label>
                    <input type="text" name="testimonial_subtitle" id="sec_1_sub_title" placeholder="Enter section sub-title" value="" required>
                </div>
                <div class="control-group">
                    <label>Description</label>
                    <textarea class="ckeditor" type="text" name="testimonial_description" placeholder="Write your description" required></textarea>
                </div>
                <div class="control-group">
                    <label>Name</label>
                    <input type="text" name="testimonial_name" placeholder="Enter name" value="" required>
                </div>
                <div class="control-group">
                    <label>Designation</label>
                    <input type="text" name="testimonial_designation" placeholder="Enter designation" value="" required>
                </div>
                <div class="control-group">
                    <label>Image</label>
                    <input type="file" name="testimonial_image" required>
                </div>
                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </section>
    
</main>


@include('layouts.dashboard.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>