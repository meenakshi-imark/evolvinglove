@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        @if(session()->has('testimonialadd'))
        <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('testimonialadd') }}
        </div>
        @endif

        @if(session()->has('testimonialdelete'))
        <div class="alert alert-success" style="text-align: center;">
            {{ session()->get('testimonialdelete') }}
        </div>
        @endif

        
        <div class="title-head">
            <h1>All Testimonial</h1>
        </div>
        <div class="white-box px-0">
            
            <a href="{{url('admin/testimonial/add')}}" class="btn btn-primary" style="float:right; margin-right: 10px">Add</a>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="text-nowrap">Title</th>
                            <th class="text-nowrap">Name</th>
                            
                            <th class="text-nowrap">Image</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_all_testimonial as $get_all_testimonial_value) 
                        <tr>
                            <td>{{ucfirst($get_all_testimonial_value->testimonial_title)}}</td>
                            <td>{{ucfirst($get_all_testimonial_value->testimonial_name)}}</td>
                            
                            <td><img width="25px" height="auto" src="{{ asset('images/backend/testimonial/'.$get_all_testimonial_value->testimonial_image)}}" alt=""></td>
                            @if($get_all_testimonial_value->testimonial_status == 0)
                            <td><span style="color: green; font-weight: bold;">Active</span></td>
                            @else
                            <td><span style="color: red; font-weight: bold;">In-active</span></td>
                            @endif
                            <td>
                                <a href="{{url('admin/testimonial/edit/'.$get_all_testimonial_value->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/testimonial/delete/'.$get_all_testimonial_value->id)}}" class="btn btn-primary">Delete</a>
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