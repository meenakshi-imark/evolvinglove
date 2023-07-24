@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>All testimonial for 1:on:1 page</h1>
            <a href="{{url('admin/1-on-1-testimonial/add')}}" class="btn btn-primary" style="float:right; margin-right: 10px">Add</a>
            
        </div>
        
        <div id='divSuccess' class="divSuccess pb-3"></div>
        <div class="white-box px-0">

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
                            <td>{{ucfirst($get_all_testimonial_value->testimonial_title_1on1)}}</td>
                            <td>{{ucfirst($get_all_testimonial_value->testimonial_name_1on1)}}</td>
                            
                            <td><img width="25px" height="auto" src="{{ asset('images/backend/testimonial-1on1/'.$get_all_testimonial_value->testimonial_image_1on1)}}" alt=""></td>
                            <!-- <td>
                                @if($get_all_testimonial_value->testimonial_status_1on1 == 1)
                                <span>Inactive</span>
                                @else
                                Active
                                @endif
                            </td> -->
                            <td>
                                <div class="dropdown">		
                                    <input type="hidden" value="{{$get_all_testimonial_value->id}}" id="testimonial_value">								
									<select class="form-select testimonial" aria-label="Default select example" style="border: none;background: transparent;margin-top: 15px;">
									<option value="1" {{$get_all_testimonial_value->testimonial_status_1on1 == 1?'selected':''}}>Inactive</option>
									<option value="0" {{$get_all_testimonial_value->testimonial_status_1on1 != 1?'selected':''}}>Active</option>
									</select>
                                 </div>
                            </td>
                            <td>
                                <a href="{{url('admin/1-on-1-testimonial/edit/'.$get_all_testimonial_value->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/1-on-1-testimonial/delete/'.$get_all_testimonial_value->id)}}" class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<style>

#divSuccess{
    text-align: left;
    font-weight: 700;
    color: green;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script >
$(document).ready(function() {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$('.testimonial').on('change', function (e) {
    e.preventDefault();
  var optionSelected = $(this).val();
  var id = $("#testimonial_value").val();
  $.ajax({
      url: "/admin/update-testimonial-status",
      type: "POST",
      dataType: "json",
      data: {value: optionSelected,id:id},
      success: function (data) {
        if (data.status == 1) {
            $("#divSuccess").html("Status updated successfully.");
            setTimeout(function () {
            $('#divSuccess').fadeOut();
        }, 2000);           
        }

      },
    });
});

});


</script>
@include('layouts.dashboard.footer')