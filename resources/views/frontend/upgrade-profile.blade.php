@include('layouts.front-header')
<main class="content">
    <section class="upgrade-banner uSpace">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
                <hgroup class="text-center">
                    <h2>{{$upgrade_pro_data->sec_1_title}}</h2>
                    <h3 class="fw-normal">{{$upgrade_pro_data->sec_1_sub_title}}</h3>
                    <div class="row row-cols-2 maxWidth_850 my-5 gx-md-5 mx-auto">
                        <div class="col">
                            <figure>
                                <img src="{{ asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_1_image_1)}}" alt="">
                            </figure>
                        </div>
                        <div class="col">
                            <figure>
                                <img src="{{ asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_1_image_2)}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <a href="#shopping_cart" class="btn btn-primary br">Upgrade My Profile</a>
                </hgroup>
            </div>
        </div>
    </section>

    <section class="uSpace background_primary">
        <div class="container">
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    @foreach($testimonial as $testimonial_value)
                    <div class="swiper-slide">
                        <div class="single">
                            <figure>
                                <img src="{{ asset('images/backend/testimonial/'.$testimonial_value->testimonial_image)}}" alt="">
                                <figcaption>{{$testimonial_value->testimonial_name}}</figcaption>
                            </figure>
                            <div class="text-content">
                                {!! $testimonial_value->testimonial_description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="cover-image background_light_grey uSpace">
        <figure class="bg-image"><img src="{{ asset('images/Evolving Love Background - Android Jones Hope Street Night Machine.jpg')}}" alt=""></figure>
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="row row-cols-1 row-cols-md-3 gy-5">
                @foreach($all_plan as $all_plan_value)
                <div class="col">
                    <div class="single">
                        <figure><img src="{{ asset('images/backend/plan/'.$all_plan_value->plan_image)}}" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                        <h3>{{$all_plan_value->plan_title}}</h3>
                        {!!$all_plan_value->plan_description!!}
                    </div>
                </div>
               @endforeach
            </div>
        </div>
        </div>
    </section>

    <section class="uSpace background_light_grey">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
                <hgroup class="text-center mb-4 mb-md-5">
                    <h2>{{$upgrade_pro_data->sec_4_title}}</h2>
                    <h4 class="mb-0">{{$upgrade_pro_data->sec_4_sub_title}}</h4>
                </hgroup>
                <div class="upgrade-list pt-3">
                    @foreach($upgrade_plan as $upgrade_plan_value)
                    <div class="row align-items-center gx-md-5">
                        <div class="col-md-4">
                            <figure>
                                <img src="{{ asset('images/backend/upgrade/'.$upgrade_plan_value->upgrade_image)}}" alt="">
                            </figure>
                        </div>
                        <div class="col-md-8">
                            <h3>{{$upgrade_plan_value->upgrade_title}}</h3>
                            {!! $upgrade_plan_value->upgrade_description !!}
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="text-center mt-5">
                    <a href="#shopping_cart" class="btn btn-primary br">Upgrade My Profile</a>
                </div>
            </div>
        </div>
    </section>

    <section class="reasonsCover-image uSpace" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <div class="container">
            <div class="text-center mb-5">
                <h2>{{$upgrade_pro_data->sec_5_title}}</h2>
            </div>
            <ul>
                @foreach($all_reason as $all_reason_value)
                {!! $all_reason_value->reason_description !!}
                @endforeach
            </ul>
        </div>
    </section>

    <section class="bg-cover background_primary uSpace" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
        <div class="container">
            <hgroup class="text-center mb-5">
                <h2>{{$upgrade_pro_data->sec_6_title}}</h2>
                <h4>{{$upgrade_pro_data->sec_6_sub_title}}</h4>
            </hgroup>
            <div class="row maxWidth_950 mx-md-auto">
                <div class="col-md-4">
                    <figure>
                        <img src="{{ asset('images/backend/upgrade_profile/'.$upgrade_pro_data->sec_6_image)}}" alt="Hawaii-Bryan-and-Jennifer-BW" class="w-100">
                        <figcaption class="text-center mt-3"><strong>Jennifer Russell & Bryan Franklin</strong></figcaption>
                    </figure>
                </div>
                <div class="col-md-8">
                    {!! $upgrade_pro_data->sec_6_description !!}
                </div>
            </div>
        </div>
    </section>
    <section class="relationship_section uSpace">
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="heading_list">
                <h3>DISCOVER YOUR RELATIONSHIP STANCE</h3>
                <p>FIND OUT WHICH VIRTUES & GIFTSN YOU  BRING TO YOUR RELATIONSHIPS?</p>
            </div>
            <div class="relation_img">
                <img src="{{ asset('images/table-1.jpg')}}" alt="table-1">
            </div>
        </div>
        </div>
    </section>
    <section class="relationship_section">
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="heading_list">
                <h3>EXPLORE YOUR SHADOW STANCE</h3>
                <p>FIND OUT WHICH VCES & SHADOW PATTERNS SHOW UP MOST OFTEN?</p>
            </div>
            <div class="relation_img">
                <img src="{{ asset('images/table_2.jpg')}}" alt="table-2">
            </div>
        </div>
        </div>
    </section>
    <section class="quality_section uSpace" style="background-image: url('{{ asset('images/Evolving Love Background - Android Jones Hope Street Night Machine.jpg')}}');">
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="quote">
                <h4>“The quality of our conflict resolution determines the quality of our relationships. <br>The quality of our relationships determines the  quality of our lives” </h4>
                <small>- Jennifer Russell & Bryan Franklin</small>
            </div>
            </div>
        </div>
    </section>
    <section id="shopping_cart" class="uSpace">
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="row">
                <div class="col-md-9">
                @if (\Session::has('danger'))
                <div class="alert alert-danger" id="success">
                    <ul>
                        <li>{!! \Session::get('danger') !!}</li>
                    </ul>
                </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                    <form class="form payment-form" method="POST" action="/payment">
                        @csrf
                        <input type="hidden" name="ammount" value="{{$upgrade_pro_data->sec_7_amount}}">
                        <div class="text-center mb-4 pb-1">
                            <h2 class="mb-2">PAYMENT FORM</h2>
                            <p>Upgrade To Receive Your Full Report + 24 Lesson Guide</p>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="First Name" name="first_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Last Name" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" placeholder="Email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Cell Number (For Texting)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Number" name="number" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group pt-2">
                            <div class="row align-items-center">
                                <div class="col-md-8 offset-md-4">
                                    <label>
                                        <input type="checkbox" required> I agree to the <a href="/terms-and-condition">Terms and Conditions</a> of this course
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Billing Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Billing Address" name="billing_address" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Billing Country</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="billing_country" id="country"required>
                                        <option>Select...</option>
                                        @foreach($get_countries as $country)
                                        <option value="{{$country->name}}" data-id="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Billing State</label>
                                </div>
                                <div class="col-md-8">
		                            <select name="billing_state" id="state" required>
		                                <option>Select...</option>
		                            </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Billing City</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Billing City" name="billing_city" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Billing Zip</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Billing Zip" name="billing_zip" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h3>ENTER PAYMENT INFORMATION</h3>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="icon-container">
                                        <i class="fab fa-cc-visa" style="color:navy;"></i>
                                        <i class="fab fa-cc-amex" style="color:blue;"></i>
                                        <i class="fab fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fab fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Card Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" placeholder="Card Number" name="card_number" min="-9999999999999999" max="9999999999999999" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Payment Code (CVC)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" placeholder="CVC" name="cvv"  min="-999" max="999"required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Expiration Month</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="expiration-month" required>
                                        <option>Select...</option>
                                        <option value="01">01 - January</option>
                                        <option value="02">02 - February</option>
                                        <option value="03">03 - March</option>
                                        <option value="04">04 - April</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - June</option>
                                        <option value="07">07 - July</option>
                                        <option value="08">08 - August</option>
                                        <option value="09">09 - September</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Expiration Year</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="expiration-year" required>
                                        <option>Select...</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                        <option value="2039">2039</option>
                                        <option value="2040">2040</option>
                                        <option value="2041">2041</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h3>SHOPPING CART</h3>

                        <div class="table-responsive">
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <th>DESCRIPTION</th>
                                        <th>QTY</th>
                                        <th>PRICE</th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Full 40 Page Relationship Archetype Report
                                            + Step By Step Guide
                                        </td>
                                        <td>1</td>
                                        <td>${{$upgrade_pro_data->sec_7_amount}}</td>
                                        <td>${{$upgrade_pro_data->sec_7_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">TOTAL</td>
                                        <td>${{$upgrade_pro_data->sec_7_amount}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-4 mt-md-5">
                        <button class="btn btn-primary br purchase-btn" type="submit" id="purchase-btn"> Purchase Now </button>
                        <button class="btn btn-primary br purchase-btn buttonload" style="display:none;">
                        <i class="fa fa-spinner fa-spin"></i>Loading
                        </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <aside class="box-aside">
                        <div class="single">
                            <figure>
                                <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Full Profile + Course.png')}}" alt="">
                                <figcaption>STEP BY STEP <br>GUIDE TO YOUR PROFILE</figcaption>
                            </figure>
                        </div>
                        <div class="single">
                            <figure>
                                <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Downloadable Profile.png')}}" alt="">
                                <figcaption>FULL 40 PAGE REPORT</figcaption>
                            </figure>
                        </div>
                        <div class="single">
                            <figure>
                                <div class="stack">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Toxic Cycle Pages.png')}}" alt="">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Toxic Cycle Pages.png')}}" alt="">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Toxic Cycle Pages.png')}}" alt="">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Toxic Cycle Pages.png')}}" alt="">
                                </div>
                                <figcaption>24 LESSONS</figcaption>
                            </figure>
                        </div>
                        <div class="single">
                            <figure>
                                <div class="stack">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Practices.png')}}" alt="">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Practices.png')}}" alt="">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Practices.png')}}" alt="">
                                    <img src="{{ asset('images/Evolving Love Product Image - Relationship Archetype Course Practices.png')}}" alt="">
                                </div>
                                <figcaption>21 RELATIONSHIP PRACTICES</figcaption>
                            </figure>
                        </div>
                        <div class="single">
                            <figure>
                                <!-- <img src="images/upgrade-attachment-08.png" alt=""> -->
                                <figcaption>RELATIONSHIP DYNAMICS COMMUNITY</figcaption>
                            </figure>
                        </div>
                        <div class="certified-box">
                            <figure>
                                <img src="{{ asset('images/secure-icon.png')}}" alt="">
                            </figure>
                            <div>
                                <p><strong>128 BIT SSL</strong> SECURE SITE</p>
                                <p><small>100% Safe & Secure Processing</small></p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="uSpace background_light_grey">
        <div class="container">
            <hgroup class="text-center mb-5">
                <h2>{{$upgrade_pro_data->sec_8_title}}</h2>
                <h4>{{$upgrade_pro_data->sec_8_sub_title}}</h4>
            </hgroup>
            <div class="accordion">
                
                @foreach($all_asked_question as $asked_question_value)
                <div class="accordion-item">
                    <a href="javascript:void(0)" class="title">{{$asked_question_value->asked_question_title}}</a>
                    <div class="accordion-content" style="display: none;">
                        {!! $asked_question_value->asked_question_description !!}
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>

    <section class="bg-cover background_primary text-center uSpace" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
        <div class="container">
            <hgroup class="text-center mb-4 mb-md-5">
                <h2>{{$upgrade_pro_data->sec_9_title}}</h2>
                <h4 class="mb-0">{{ $upgrade_pro_data->sec_9_sub_title }}</h4>
                
            </hgroup>
            <!-- <a href="javascript:void(0)" class="btn btn-white br">GET SUPPORT</a> -->
            <a href="{{url('get-support')}}" class="btn btn-white br">GET SUPPORT</a>
        </div>
    </section>
</main>


@if (!auth()->check()) 
<div class="modal fade modal-password" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
               <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                <div class="text-center">
                    <h3>Login</h3>  
                </div>               
                @if(session('success'))
                <p class="alert" style="color: red;font-weight: 700;" >Please enter a valid login detail.</p>
                @endif
                <form method="POST" action ="/loginuser">
                @csrf
                <div class="control-group mb-4">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required autocomplete="email" autofocus value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="control-group mb-4">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password"name="password"  required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <input class="submit login-btn" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endif
<style>
.buttonload {
  background-color: #04AA6D; /* Green background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 24px; /* Some padding */
  font-size: 16px; /* Set a font-size */
}

/* Add a right margin to each icon */
.fa {
  margin-left: -12px;
  margin-right: 8px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    
$("#paymentForm").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    e.preventDefault();
    var formData = $("#paymentForm").serialize();
    $.ajax({
      url: "/payment",
      type: "POST",
      dataType: "json",
      data: formData,
      beforeSend: function() {
         $('.buttonload').show();
         $("#purchase-btn").hide();
      },
      success: function (data) {
        if (data.status == 1) {
            window.location = "/thank-you";          
        }
        else{
            window.location = "/upgrade-profile#shopping_cart";   
        }

      },
    });
});

$("#loginform").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    e.preventDefault();
    var formData = $("#loginform").serialize();
    $.ajax({
      url: "/loginuser",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (data) {
        if (data.status == 1) {
            window.location = "/upgrade-profile#shopping_cart";         
        }
        else{
          $('.alert').show();
        }

      },
    });
});

$("#country").change(function(){

var values=$(this).val();
$.ajax({
      url: "/fetch-states",
      type: "POST",
      dataType: "json",
      data: {country_id: values,_token: '{{csrf_token()}}'},
      success: function (result) {
        $('#state').html('<option value="">Select State</option>');
            $.each(result.states, function (key, value) {
            $("#state").append('<option value="' + value.name + '">' + value.name + '</option>');
         });

      },
    });
});
</script>

@include('layouts.footer')
