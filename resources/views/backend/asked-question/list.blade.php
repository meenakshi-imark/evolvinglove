@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>All FAQs</h1>
        </div>
        <div class="white-box px-0">
            
            <a href="{{url('admin/asked-question/add')}}" class="btn btn-primary" style="float:right; margin-right: 10px">Add</a>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="text-nowrap">Question</th> 
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_all_question as $get_all_question_value) 
                        <tr>
                            <td>{!!Str::limit(strip_tags($get_all_question_value->asked_question_title), $limit = 60, $end = '...')!!}</td>    

                            <td>
                                @if($get_all_question_value->asked_question_status == 0)
                                <span style="color:green">Active</span>
                                @else
                                <span style="color:red">In-active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('admin/asked-question/edit/'.$get_all_question_value->id)}}" class="btn btn-primary">Edit/View</a>
                                <a href="{{url('admin/asked-question/delete/'.$get_all_question_value->id)}}" class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')