@include('layouts.header')

<style>
    .site-header nav .right>.btn,
    .site-header nav .left .site-hamburgur {
        display: none;
    }
</style>

<main class="content">
<section class="page-innerTitle" style="background-image: url('{{asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="content-box">
                <h1 class="mb-0">My Account</h1>
            </div>
        </div>
    </section>
    <section class="chooseProfile-section">
    @include('frontend.profile.sidebar')
    <div class="account_wrap">
          <h5>ACCOUNT INFORMATION</h5>
          <p>You can view and update your account information by clicking below</p>
          <div class="row">
              <div class="col-sm-4 col-md-4 col-lg-3 col-xl-3 col-12">
                <form id="profile-image-form" enctype="multipart/form-data" action="javascript:void(0)">
           
                  <div class="left-content">
                      <h6>{{$user->name}} {{$user->lastname}}</h6>
              
                      @if($user->image != '')
                      <figure><img src="/profile/{{$user->image}}" id="output" class="output_image">
                      @else
                      <figure><img src="https://evolvinglove.customerdevsites.com/dashboard/images/dummy-profile-pic.jpg" id="output" class="output_image">
                      @endif
                      <!-- <input class="form-control" type="file" name="profile_image_hidden" id="profile_image_hidden" > -->
                      <input type="file" name="profile_image_hidden" id="profile_image_hidden" style="display: none;" />
                    </figure>
                      <!-- <figure><img  id="output"></figure> -->
                      <div class="update">
                        <label>UPDATE IMAGE</label>
                        <!-- <input class="form-control" type="file" id="profile_image" onchange="loadFile(event)"> -->
                        <input class="form-control" type="submit" id="profile_image">
                      </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-8 col-md-8 col-lg-9 col-xl-9 col-12">
                  <div class="right-content">
                      <div class="accordion" id="accordionOne">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  UPDATE CONTACT INFORMATION
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                              <div class="accordion-body">
                                <form id="contact-information">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-label">First Name:</label>
                                            <input class="form-control" name="name" value="{{$user->name}}" >
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="form-label">Last Name:</label>
                                            <input class="form-control" name="lastname" value="{{$user->lastname}}" >
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group email">
                                            <label class="form-label">Email:</label>
                                            <input class="form-control" name="email" value="{{$user->email}}" readonly>
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group cell">
                                            <label class="form-label">Cell Number / SMS #  (for texting)</label>
                                            <input class="form-control" name="mobile" value="{{$user->phone}}" >
                                          </div>
                                      </div>
                                  </div>
                                  <input class="submit" type="submit" value="SAVE MY CHANGES">
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  UPDATE PASSWORD
                              </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                              <div class="accordion-body">
                                <form id="update_password">
                                  <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="form-label">PASSWORD:</label>
                                                <input class="form-control" type="password" name="password" required>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="form-label">CONFIRM PASSWORD:</label>
                                                <input class="form-control" type="password" name="confirm_password" required>
                                              </div>
                                          </div>
                                    </div>
                                    <input class="submit" type="submit" value="SAVE">
                                  </form>
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 BILLING ADDRESS
                              </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionThree">
                              <div class="accordion-body">
                                <p>Address : Select...</p>
                                <p>State 1,test </p>
                                <p>test,12121</p>
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  PAYMENT Details
                              </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFour">
                              <div class="accordion-body">
                                 <p>Card Number : 4242424242424242 </p>
                                 <p> Expiry Date : 12/ 2028</p>
                                
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                   PAYMENT HISTORY
                              </button>
                            </h2>
                           
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFive">
                              <div class="accordion-body">
                                <div class="table-wrap">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col" class="text-nowrap">Course Name</th>
                                        <th scope="col" class="text-nowrap">Amount</th>
                                        <th scope="col" class="text-nowrap">Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($get_survey as $get)
                            <tr>
                                <td>
                                  @if($get->type = 0)
                                  <h4>Full 40 Page Relationship Archetype Report + Step By Step Guide</h4>
                                  @elseif($get->type = 1)
                                  <h4>1:on:1 Master Your Relationship Archetype Session (90 min)</h4>
                                  @elseif($get->type = 2)
                                  <h4>3 Seesion Package(90 min each)</h4>
                                  @else
                                  <h4>Full 40 Page Relationship Archetype Report + Step By Step Guide</h4>
                                  @endif
                                </td>
                                <td>${{$get->amount}}</td>
                                @php 
                                $date =  date('d/m/Y', strtotime($get->created_at))
                                @endphp
                                <td>{{$get->created_at}}</td>
                                <!-- <td>18/05/2023</td> -->
                            </tr>
                            @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
</main>
<style>
.divError {
  color: red;
}
</style>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script>  
$(".output_image").click(function() {
   $("input[id='profile_image_hidden']").click();
});
$(document).ready(function (e) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#profile_image_hidden').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => { 
    $('#output').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
    });
    $('#profile-image-form').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{url('/profile-image-upload') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
            success:function(response){
                    //  console.log(response);
                    if(response.status == "1"){
                        Swal.fire(
                            'Image Updated',
                            'Successfully!',
                            'success'
                          )
                    }
                  }
        });
    });
});

      
      $("#contact-information").submit(function(e){
        e.preventDefault();
    var data = $('#contact-information').serialize();
    $.ajax({
           type:'POST',
           url:"{{url('/update-contact-information') }}",
           dataType: "json",
           data: data,
           success:function(response){
             console.log(response);
             if(response.status == "1"){
                Swal.fire(
                     'Contact information updated',
                     'Successfully!',
                     'success'
                   )
             }
           }
        });
    });

    $('#update_password').submit(function(e){
      e.preventDefault();
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var data = $('#update_password').serialize();
      $.ajax({
           type:'POST',
           url:"{{url('/update-password') }}",
           dataType: "json",
           data: data,
           success:function(response){
             console.log(response);
             if(response.status == "0"){
                Swal.fire(
                     'Password ans Confirm Password are not matched',
                     'error!',
                     'error'
                   )
             }
             if(response.status == "1"){
                Swal.fire(
                     'Password updated',
                     'Successfully!',
                     'success'
                   )
             }
           }
        });
    });
</script>
@include('layouts.footer')