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
            <h1>Add Upgrade</h1>
        </div>
        <div class="white-box">
            <form method="POST" action="{{url('admin/upgrade/create')}}" class="form" enctype="multipart/form-data">
                @csrf
                
                <div class="control-group">
                    <label>Title</label>
                    <input type="text" name="upgrade_title" placeholder="Enter section title" value="">
                </div>
               
                <div class="control-group">
                    <label>Description</label>
                    <textarea class="ckeditor" type="text" name="upgrade_description" placeholder="Write your description"></textarea>
                </div>               
                
                <div class="control-group">
                    <label>Image</label>
                    <input type="file" name="upgrade_image">
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