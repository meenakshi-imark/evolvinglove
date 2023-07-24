@include('layouts.header')
<style>
    .ctnt span{
      font-family: "Bilbo Swash Caps",cursive;
    font-size: 52px;
    font-weight: 600;
    color: #cea939;
    margin: 8px 0;
    }
</style>
<header id="header" class="site-header" style="background-image: url('{{asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
    <nav>
        <a href="javascript:void(0)" class="site-logo">
            <img src="{{asset('images/evolving-love-logo.png')}}" alt="">
        </a>
        <div class="right">
            <a href="#shopping_cart" class="btn btn-white upgrade-btn">REGISTER NOW</a>
        </div>
    </nav>
</header>
<main class="content">
    <section class="upgrade-banner uSpace permanent-section">
        <div class="container">
            <hgroup class="text-center">
                <h2>{{$breakthrough->sec_1_title}}</h2>
                <h3 class="fw-normal">{{$breakthrough->sec_1_sub_title}}</h3>
                <figure>
                    <img src="{{asset('dashboard/images/sell-page-3/'.$breakthrough->sec_1_image)}}" alt="">
                </figure>
                <h3>{{$breakthrough->sec_1_des}}</h3>
                <h3 class="fw-normal">{{$breakthrough->sec_1_des_bellow}}</h3>
                <a href="#shopping_cart" class="btn btn-primary br">REGISTER NOW</a>
                <h4>{{$breakthrough->sec_1_link_bellow}}</h4>
            </hgroup>
        </div>
    </section>

    <section class="uSpace background_primary">
        <div class="container">
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    @foreach($breakthrough_testimonial as $testimonial_value)
                    <div class="swiper-slide">
                        <div class="single">
                            <figure>
                                <img src="{{asset('images/backend/pages_3/'.$testimonial_value->testimonial_image_3)}}" alt="">
                                <figcaption>{{$testimonial_value->testimonial_name_3}}</figcaption>
                            </figure>
                            <div class="text-content">
                                <p>{{$testimonial_value->testimonial_description_3}}</p>
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

    <section class="cover-image background_light_grey uSpace col_wrap">
        <figure class="bg-image"><img src="{{asset('images/Evolving Love Background - Android Jones Hope Street Night Machine.jpg')}}" alt=""></figure>
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="ctnt">
                <h2>{{$breakthrough->sec_3_title}}</h2>
                <h4>{{$breakthrough->sec_3_sub_title}}</h4>
            </div>
            <div class="row row-cols-1 row-cols-md-3 gy-5">

                @foreach($breakthrough_sec3_ele as $breakthrough_sec3_value)
                <div class="col">
                    <div class="single">
                        <figure><img src="{{asset('images/backend/pages_3/'.$breakthrough_sec3_value->sec_3_element_img)}}" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                        <h3>{{$breakthrough_sec3_value->sec_3_element_title}}</h3>
                    </div>
                </div>
                @endforeach
                
            </div>
            </div>
        </div>
    </section>

    <section class="uSpace background_light_grey learn_section">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
            <hgroup class="text-center mb-4 mb-md-5">
                <h2>{{$breakthrough->sec_4_title}}</h2>
                <h4 class="mb-0">{{$breakthrough->sec_4_sub_title}}</h4>
                <ul class="dots">
                    {!! $breakthrough->sec_4_content !!}
                </ul>
            </hgroup>
        </div>
        </div>
        <div class="relation_section" style="background-image:url('{{asset('images/backend/pages_3/'.$breakthrough->sec_5_img)}}')">
                <div class="container">
                    <div class="ctnt">
                    {!! $breakthrough->sec_5_content !!}
                    </div>
                </div>
            </div>
    </section>

    <section class="permanent_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="area_img">
                        <img src="{{asset('images/permanent-images/permanent_bnr.png')}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="ctnt text-center">
                        <h2>{{$breakthrough->sec_6_title}}:</h2>
                        <h3>{{$breakthrough->sec_6_sub_title}}</h3>
                        <div class="text-center">
                            <a href="#shopping_cart" class="btn btn-green br h-55">REGISTER NOW</a>
                        </div>
                        <p>{{$breakthrough->sec_6_link_bellow}}</p>
                    </div>
                </div>
            </div>
        </div>                                                                                                                         
    </section>
    <section class="uSpace learn_section course_curriculum">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
            <hgroup class="text-center mb-4 mb-md-5">
                <h2>{{$breakthrough->sec_7_title}}</h2>
                <h4>{{$breakthrough->sec_7_sub_title}}</h4>
                <p>{!!$breakthrough->sec_7_content!!}</p>
            </hgroup>
            <div class="upgrade-list pt-3">
                @foreach($breakthrough_courses as $breakthrough_courses_value)
                <div class="row align-items-center gx-md-5">
                    <div class="col-md-4">
                        <figure>
                            <img src="{{asset('images/backend/pages_3/'.$breakthrough_courses_value->element_img)}}" alt="">
                        </figure>
                    </div>
                    <div class="col-md-8">
                        <h3>{{$breakthrough_courses_value->element_title}}</h3>
                        {!!$breakthrough_courses_value->element_content!!}
                    </div>
                </div>
                @endforeach
                
            </div>
            </div>
        </div>
    </section>

    <section class="bg-cover meet_your background_primary uSpace" style="background-image: url('{{asset('images/backend/pages_3/'.$breakthrough->sec_8_bgimage)}}');">
        <div class="container">
            <hgroup class="text-center mb-5">
                <h2>{{$breakthrough->sec_8_title}}</h2>
                <h4>{{$breakthrough->sec_8_sub_title}}</h4>
            </hgroup>
            <div class="row mx-md-auto">
                <div class="col-md-4">
                    <figure>
                        <img src="{{asset('images/backend/pages_3/'.$breakthrough->sec_8_image)}}" alt="Hawaii-Bryan-and-Jennifer-BW" class="w-100">
                        <figcaption class="text-center mt-3"><strong>{{$breakthrough->sec_8_imgname}}</strong></figcaption>
                    </figure>
                </div>
                <div class="col-md-8">
                    {!!$breakthrough->sec_8_content!!}
                </div>
            </div>
        </div>
    </section>

    <div class="relation_section" style="background-image:url('{{asset('images/backend/pages_3/'.$breakthrough->sec_9_img)}}')">
        <div class="container">
            <div class="ctnt">
            {!!$breakthrough->sec_9_content!!}
            </div>
        </div>
    </div>
    <section class="uSpace learn_section course_curriculum background_light_grey product_list">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
            <hgroup class="text-center mb-4 mb-md-5">
                <h2>{{$breakthrough->sec_10_title}}</h2>
                <h4>{{$breakthrough->sec_10_sub_title}}</h4>
            </hgroup>
            @foreach($breakthrough_rightcourses as $breakthrough_rightcourses_value)
            <div class="row">
                <div class="col-md-4">
                    <div class="product_img">
                        <img src="{{asset('images/backend/pages_3/'.$breakthrough_rightcourses_value->element_img)}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="ctnt">
                        {!!$breakthrough_rightcourses_value->element_content!!}
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="who_area">
                <h2>{{$breakthrough->sec_11_title}}</h2>
                {!!$breakthrough->sec_11_content!!}
            </div>
            </div>
        </div>
    </section>
    <section class="permanent_area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="area_img">
                        <img src="{{asset('images/permanent-images/permanent_bnr.png')}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="ctnt text-center">
                        <h2>PERMANENT RELATIONSHIP BREAKTHROUGH: </h2>
                        <h3>8-Week Live Online Course [Date Here] 2023</h3>
                        <div class="text-center">
                            <a href="#shopping_cart" class="btn btn-green br h-55">REGISTER NOW</a>
                        </div>
                        <p>Attend from anywhere - No hotels, flights, or sitters!</p>
                    </div>
                </div>
            </div>
        </div>                                                                                                                         
    </section>
    <div class="relation_section" style="background-image:url('{{asset('images/permanent-images/bnr_bottom.png')}}')">
        <div class="container">
            <div class="ctnt">
            {!!$breakthrough->sec_12_content!!}
            </div>
        </div>
    </div>
    <section id="shopping_cart" class="uSpace">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
            <div class="row">
                <div class="col-md-9">
                    <form class="form payment-form" method="post" action="/sales-payment">
                        @csrf
                        <div class="text-center mb-4 pb-1">
                            <h2 class="mb-2">PAYMENT FORM</h2>
                            <p>Mastering Your Relationship Dynamics 1:on:1 Sessions</p>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="First Name" name="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Last Name" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Cell Number (For Texting)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Number" name="number">
                                </div>
                            </div>
                        </div>
                        <div class="control-group pt-2">
                            <div class="row align-items-center">
                                <div class="col-md-8 offset-md-4">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="{{url('terms-and-condition')}}">Terms and Conditions</a> of this course
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
                                    <input type="text" placeholder="Billing Address" name="billing_address">
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
                                    <select name="billing_state" id="state">
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
                                    <input type="text" placeholder="Billing City" name="billing_city">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Billing Zip</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Billing Zip" name="billing_zip">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <input type="hidden" name="price" value="{{$breakthrough->sec_13_amount}}">
                        <input type="hidden" name="formtype" id="formtype" value="4_session">
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
                                    <input type="number" placeholder="Card Number" name="card_number"  min="-9999999999999999" max="9999999999999999" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label>Payment Code (CVC)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" placeholder="CVC" name="cvc" min="-999" max="999"required>
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
                                        <td>Mastering Your Relationship Dynamics 1:on:1 Session (90 min)</td>
                                        <td>1</td>
                                        <td>${{$breakthrough->sec_13_amount}}</td>
                                        <td>${{$breakthrough->sec_13_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">TOTAL</td>
                                        <td>${{$breakthrough->sec_13_amount}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-4 mt-md-5">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary br">Purchase Now</a> -->
                            <button class="btn btn-primary br" type="submit"> Purchase Now </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <aside class="box-aside">
                        @foreach($breakthrough_testimonial as $testimonial_value)
                        <div class="testi-single">
                            <p>{{$testimonial_value->testimonial_description_3}}</p>
                            <figure>
                                <img src="{{asset('images/backend/pages_3/'.$testimonial_value->testimonial_image_3)}}" alt="">
                                <figcaption>{{$testimonial_value->testimonial_name_3}} <span>{{$testimonial_value->testimonial_designation_3}}</span></figcaption>
                            </figure>
                        </div>
                        @endforeach
                        
                                                
                        <div class="certified-box">
                            <figure>
                                <img src="https://evolvinglove.customerdevsites.com/images/secure-icon.png" alt="">
                            </figure>
                            <div>
                                <p><strong>128 BIT SSL</strong> SECURE SITE</p>
                                <p><small>100% Safe &amp; Secure Processing</small></p>
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
                <h2>{{$breakthrough->sec_14_title}}</h2>
                <h4>{{$breakthrough->sec_14_sub_title}}</h4>
            </hgroup>
            <div class="accordion">
                @foreach($breakthrough_faq as $breakthrough_faq_value)
                <div class="accordion-item">
                    <a href="javascript:void(0)" class="title">{{$breakthrough_faq_value->question}}</a>
                    <div class="accordion-content" style="display: none;">
                        {!!$breakthrough_faq_value->answer!!}
                    </div>
                </div>
                @endforeach
                

                
              
              
            </div>
        </div>
    </section>

    <section class="bg-cover background_primary text-center uSpace" style="background-image: url('{{asset('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png')}}');">
        <div class="container">
            <hgroup class="text-center mb-4 mb-md-5">
                <h2>STILL GOT QUESTIONS OR NEED SUPPORT?</h2>
                <h4 class="mb-0">If you’ve still got questions or need support click ‘GET SUPPORT’</h4>
                <h4 class="mb-0">Below and someone from our team will get back to you soon.</h4>
            </hgroup>
            <!-- <a href="javascript:void(0)" class="btn btn-white br">GET SUPPORT</a> -->
            <a href="{{url('get-support')}}" class="btn btn-white br">GET SUPPORT</a>
        </div>
    </section>
</main>
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