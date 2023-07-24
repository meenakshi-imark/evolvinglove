@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>All features</h1>

            <a href="{{url('admin/plan/add')}}" class="btn btn-primary" style="float:right; margin-right: 10px">Add</a>
        </div>
        <div class="white-box px-0">
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="text-nowrap">Title</th>
                            <th class="text-nowrap">Image</th>                           
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_all_list_palns as $get_all_palns_value) 
                        <tr>
                            <td>{{ucfirst($get_all_palns_value->plan_title)}}</td>
                            <td><img width="25px" height="auto" src="{{ asset('images/backend/plan/'.$get_all_palns_value->plan_image)}}" alt=""></td>
                            <td>
                                @if($get_all_palns_value->plan_status == 0)
                                <span>Active</span>
                                @else
                                <span>In-active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('admin/plan/edit/'.$get_all_palns_value->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/plan/delete/'.$get_all_palns_value->id)}}" class="btn btn-primary">Delete</a>
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