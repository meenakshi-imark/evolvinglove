@include('layouts.dashboard.header')

<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }
    .dataTables_wrapper {
    position: relative;
    clear: both;
    padding-left: 10px!important;
    padding-right: 10px!important;
}
</style>


<main class="content">
    @if(session()->has('add'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('add') }}
    </div>
    @endif
    <section class="main-content">
        @if(session()->has('update'))
        <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('update') }}
        </div>
        @endif
        <div class="title-head">
            <h1>All Quiz Question</h1>
            
        </div>
        <div class="white-box px-0">
            <div class="table-responsive">
                <table id="datatableid">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Question No</th>
                            <th class="text-nowrap">Question</th>                        
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_question as $all_question_value)
                        <tr>
                            <td>{{ $all_question_value->id }}</td>
                            <td>{{ucfirst(Str::limit($all_question_value->question, $limit = 150, $end = '...'))}}</td>
                            <td>
                                <a href="{{url('admin/edit-question/'.$all_question_value->id)}}" class="btn btn-primary">Edit</a>
                                <!-- <a href="javascript:void(0)" class="btn btn-primary br">Delete</a> -->
                            </td>
                        </tr>
                        @endforeach

                      
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
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

@include('layouts.dashboard.footer')

<script>
    $(document).on("click", '#add_more_option', function () {
       
        $('.options-list').append('<li class="ui-state-default"><input type="text" name="question_option[]" placeholder="Write your option"><a href="javascript:void(0)" class="remove-option"><i class="las la-times"></i></a></li>');
    });
</script>

