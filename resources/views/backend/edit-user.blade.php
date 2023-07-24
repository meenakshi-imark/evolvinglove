@include('layouts.dashboard.header')
<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Edit User </h1>
        </div>
        <div class="white-box">
     
        <div id='divSuccess' class="divSuccess"></div>
            <form method="POST" id="update-profile"class="form">
                @csrf
                <!--div class="basic_info">
                    <h4>Basic Info</h4>
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"><i class="fal fa-pencil"></i></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('https://html.customerdevsites.com/Evolving-love/Dashboard/images/Evolving%20Love%20Background%20Image%20-%20Android%20Jones%20Union%20(hires).jpeg');">
                            </div>
                        </div>
                    </div>
                    <div class="progress_bar">
                        <span>74% Completed</span>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar w-75"></div>
                        </div>
                        <ul>
                            <li><strong>Date Created</strong>12 May 2022</li>
                            <li><strong>Last Login</strong>12 May 2022</li>
                        </ul>
                    </div>
                </div-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$user->name}}" required>
                            <input type="hidden" name="id" value="{{$user->id}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Last Name</label>
                            <input type="text" name="last name" value="{{$user->lastname}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Mobile</label>
                            <input type="number" name="mobile" value="{{$user->phone}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{$user->email}}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="date-options equal_gutter">
                            <label>Role</label>
                            @if($user->role=="1")
                            @php $type ="Admin"; @endphp
                            @else
                            @php $type ="User"; @endphp
                            @endif
                            <input type="text" name="type" value="{{$type}}" readonly="">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Ontraport ID</label>
                            <input type="text" name="Ontraport_id" value="{{$user->ontra_id}}" readonly="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Full Profile URL</label>
                            <input type="text" name="link" value="{{$link}}" readonly="">
                        </div>
                    </div>
                    <!--div class="col-md-4">
                        <div class="control-group">
                            <label>User Name</label>
                            <input type="text" name="email" value="William_smith" readonly="">
                        </div>
                    </div-->
                    <div class="col-md-4">
                        <div class="control-group">
                            <label>Password</label>
                            <input type="text" name="password" value="***********" readonly="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-grey">Cancel</button>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-btn">
                            <a class="btn btn-primary send" data-id="{{$user->id}}">Resend Username & Password </a>
                            <!--button type="submit" class="btn btn-grey">Reset Username & password</button-->
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
    
$("#update-profile").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    e.preventDefault();
    var formData = $("#update-profile").serialize();

    $.ajax({
      url: "/update-profile",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (data) {
        if (data.status == 1) {
            $("#divSuccess").html("Details has been updated successfully.");
            // $("#update-profile")[0].reset();
            setTimeout(function () {
            $('#divSuccess').fadeOut();
        }, 2000);           
        }

      },
    });
});

$(".send").click(function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
      url: "/send-email",
      type: "GET",
      dataType: "json",
      data: {id:id},
      success: function (data) {
        if (data.status == 1) {
            $("#divSuccess").html("Email send successfully.");
            $("#update-profile")[0].reset()
            setTimeout(function () {
            $('#divSuccess').fadeOut();
        }, 2000);           
        }

      },
    });
});
</script>
@include('layouts.dashboard.footer')