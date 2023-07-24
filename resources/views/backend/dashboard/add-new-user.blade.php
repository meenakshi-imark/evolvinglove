@include('layouts.dashboard.header')
<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Add New User</h1>
        </div>
        <div id='divSuccess' class="divSuccess"></div>
        <div class="white-box">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
     
      
            <!-- <form method="POST" id="update-profile" class="form"  action="{{url('/admin/create-user')}}"> -->
            <form method="" id="update-profile" class="form"  action="">
          
                <div class="row">
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" id="last_name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Mobile</label>
                            <input type="number" name="mobile" id="mobile" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" required>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="date-options equal_gutter">
                            <label>Role</label>
                     
                            <input type="text" name="email" id="" required>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Ontraport ID</label>
                            <input type="text" name="email" id="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Full Profile URL</label>
                            <input type="text" name="email" id="" required>
                        </div>
                    </div> -->
                    <!--div class="col-md-4">
                        <div class="control-group">
                            <label>User Name</label>
                            <input type="text" name="email" id="William_smith" required>
                        </div>
                    </div-->
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-btn">
                            <button type="submit send" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-grey">Cancel</button>
                            
                        </div>
                    </div>
                </div>
            </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
 
    $(document).ready(function() {
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
   $('#update-profile').submit( function(e) {
    e.preventDefault();
    var formet = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
     var name = $('#name').val();
     var last_name = $('#last_name').val();
     var mobile = $('#mobile').val();
     var email = $('#email').val();
     var password = $('#password').val();
     if(!email.match(formet)){
        $('.divSuccess').html('<div class="alert alert-danger">Invalid email ID</div>');
       return false;
     }else{
        $.ajax({
             url: "/admin/create-user",
             type: "POST",
             data: {
                 _token: $("#csrf").val(),
                 name: name,
                 last_name: last_name,
                 mobile: mobile,
                 email: email,
                 password: password
             },
             cache: false,
             success: function(response){
                 if(response == 'success'){
                     Swal.fire(
                      'User Added',
                      'Successfully!',
                      'success'
                    )
                     $('#update-profile')[0].reset();
                     $('#divSuccess').css("display","none")
                 }
                 if(response == 'emailexist'){
                     $('.divSuccess').html('<div class="alert alert-danger">Email already Exist</div>');
                 }
                 if(response == false){
                     $('.divSuccess').html('<div class="alert alert-danger">Invalid email ID</div>');
                 }
             }
         });
     }

         
     
    
 });
});
</script>
@include('layouts.dashboard.footer')