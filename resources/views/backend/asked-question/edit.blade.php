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
            <h1>Edit FAQs</h1>
        </div>
        <div class="white-box">
            <form method="POST" action="{{url('admin/asked-question/update/'.$get_by_id->id)}}" class="form" enctype="multipart/form-data">
                @csrf
                
                <div class="control-group">
                    <label>Question</label>
                    <input type="text" name="asked_question_title" placeholder="Enter section title" value="{{$get_by_id->asked_question_title}}">
                </div>
                
                <div class="control-group">
                    <label>Answer</label>
                    <textarea class="ckeditor" type="text" name="asked_question_description" placeholder="Write your description">{!!$get_by_id->asked_question_description!!}</textarea>
                </div>
                
                <div class="control-group">
                    <label>Change Status</label>
                    <select name="asked_question_status">
                        <option disabled>Select</option>
                        <option value="0" {{ $get_by_id->asked_question_status == 0 ? 'selected':''  }}>Active</option>
                        <option value="1"{{ ($get_by_id->asked_question_status == 1) ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                
                
                <div class="form-btn">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </section>
    
</main>


@include('layouts.dashboard.footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>