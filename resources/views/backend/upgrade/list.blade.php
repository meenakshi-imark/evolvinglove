@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>All promotions</h1>
        </div>
        <div class="white-box px-0">
            
            <a href="{{url('admin/upgrade/add')}}" class="btn btn-primary" style="float:right; margin-right: 10px">Add</a>
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
                        @foreach($get_all_upgrade as $get_all_upgrade_value) 
                        <tr>
                            <td>{{ucfirst($get_all_upgrade_value->upgrade_title)}}</td>
                            <td><img width="25px" height="auto" src="{{ asset('images/backend/upgrade/'.$get_all_upgrade_value->upgrade_image)}}" alt=""></td>
                            <td>
                                @if($get_all_upgrade_value->upgrade_status == 0)
                                <span style="color:green">Active</span>
                                @else
                                <span style="color:red">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('admin/upgrade/edit/'.$get_all_upgrade_value->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/upgrade/delete/'.$get_all_upgrade_value->id)}}" class="btn btn-primary">Delete</a>
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