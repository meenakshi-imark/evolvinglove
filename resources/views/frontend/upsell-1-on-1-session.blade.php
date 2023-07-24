@include('layouts.front-header')
<main class="content">
    <section class="upgrade-banner uSpace">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
                <hgroup class="text-center">
                    <h2>{{$create_page_data->sec_1_title}}</h2>
                    <h3 class="fw-normal">{{$create_page_data->sec_1_sub_title}}</h3>
                    <div class="clearfix text-start pt-2 mb-5">
                        <figure class="float-start me-3 mb-2 mb-md-3 maxWidth_300">
                            <img src="{{ asset('images/backend/pages_1_1/'.$create_page_data->sec_1_image)}}" alt="Evolving Love - Master Your Relationship Archetype Session" class="w-100">
                        </figure>

                        {!!$create_page_data->sec_1_description!!}
                        
                    </div>
                    <a href="#shopping_cart" class="btn btn-primary br">YES, GIVE ME SKILLS!</a>
                </hgroup>
            </div>
        </div>
    </section>

    <section class="cover-image version_02 background_light_grey uSpace" style="background-image: url('{{ asset('images/backend/pages_1_1/'.$create_page_data->sec_2_image_bg)}}');">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="color_white">{{$create_page_data->sec_2_title}}</h2>
                </div>
                <div class="row row-cols-1 row-cols-md-3 gy-5">
                    <div class="col">
                        <div class="single">
                            <figure><img src="{{asset('images/backend/pages_1_1/Evolving Love Icon - Relationship Skills Icon V2.png')}}" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                            <h3>{{$create_page_data->sec_2_col1_title}}</h3>
                            <p>{{$create_page_data->sec_2_col1_des}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single">
                            <figure><img src="{{asset('images/backend/pages_1_1/Evolving Love Icon - Experience Heart Cap and Gown.png')}}" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                            <h3>{{$create_page_data->sec_2_col2_title}}</h3>
                            <p>{{$create_page_data->sec_2_col2_des}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single">
                            <figure><img src="{{asset('images/backend/pages_1_1/Evolving Love Icon - Report Profile.png')}}" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                            <h3>{{$create_page_data->sec_2_col3_title}}</h3>
                            <p>{{$create_page_data->sec_2_col3_des}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="session-price-section uSpace">
        <div class="container">
            <div class="maxWidth_1000 mx-auto">
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col">
                        <div class="single">
                            <input type="hidden" id="col1_amount" value="{{$create_page_data->sec_3_col1_amount}}">
                            <h3>{{$create_page_data->sec_3_col1_title}}</h3>
                            <p>{{$create_page_data->sec_3_col1_des}}</p>
                            <h2>${{$create_page_data->sec_3_col1_amount}}</h2>
                            <a href="#shopping_cart" data-val="session1"class="btn btn-primary br shopping_cart"  onClick = "shopping_cart(1);">GET MY SESSION</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single">
                            <input type="hidden" id="col2_amount" value="{{$create_page_data->sec_3_col2_amount}}">
                            <h3>{{$create_page_data->sec_3_col2_title}}</h3>
                            <p>{{$create_page_data->sec_3_col2_des}}</p>
                            <h2><span>${{$create_page_data->sec_3_col2_amount}} <small>Save 20%</small></span></h2>
                            <a href="#shopping_cart" class="btn btn-primary br" onClick = "shopping_cart(3);">GET MY SESSION</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cover background_primary uSpace" style="background-image: url('{{ asset('images/backend/pages_1_1/'.$create_page_data->sec_4_image_bg)}}');">
        <div class="container">
            <hgroup class="text-center mb-5">
                <h2>{{$create_page_data->sec_4_title}}</h2>
                <h4>{{$create_page_data->sec_4_sub_title}}</h4>
            </hgroup>
            <div class="row maxWidth_1000 mx-md-auto">
                <div class="col-md-4">
                    <figure>
                        <img src="{{ asset('images/backend/pages_1_1/'.$create_page_data->sec_4_image)}}" alt="Hawaii-Bryan-and-Jennifer-BW" class="w-100">
                        <figcaption class="text-center mt-3"><strong>{{$create_page_data->sec_4_image_title}}</strong></figcaption>
                    </figure>
                </div>
                <div class="col-md-8">
                    {!!$create_page_data->sec_4_des!!}                    
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
                        <form class="form payment-form" method="post" action="/sales-payment">
                        @csrf
                            <div class="text-center mb-4 pb-1">
                                <h2 class="mb-2">PAYMENT FORM</h2>
                                <p>Your Mastering Your Relationship Dynamics 1:on:1 Sessions</p>
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

                            <input type="hidden" name="price" id="price" value="{{$create_page_data->sec_3_col1_amount}}">
                            <input type="hidden" name="formtype" id="formtype" >
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
                                            <td class="session-p">1:on:1 Master Your Relationship Dynamics Session (90 min)
                                            </td>
                                            <td>1</td>
                                            <td class="price">$495.00</td>
                                            <td class="price">$495.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">TOTAL</td>
                                            <td class="price">$495.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--div class="coupon">
                                <div class="d-flex">
                                    <p>APPLY COUPON</p>
                                    <input type="text" name="coupon">
                                </div>
                            </div-->
                            <div class="text-center mt-4 mt-md-5">
                                <button type="submit" class="btn btn-primary br">Purchase Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <aside class="box-aside">
                            @foreach($testimonials as $testimonials_value)
                            <div class="testi-single">
                                {!!$testimonials_value->testimonial_description_1on1!!}
                                <figure>
                                    <img src="{{ asset('images/backend/testimonial-1on1/'.$testimonials_value->testimonial_image_1on1)}}" alt="">
                                    <figcaption>{{$testimonials_value->testimonial_name_1on1}} <span>{{$testimonials_value->testimonial_designation_1on1}}</span></figcaption>
                                </figure>
                            </div>
                            @endforeach
                            
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

    <section class="bg-cover background_primary text-center uSpace" style="background-image: url('{{ asset('images/Evolving Love Sidebar & Practices Background - Red.png')}}');">
        <div class="container">
            <hgroup class="text-center mb-4 mb-md-5">
                <h2>STILL GOT QUESTIONS OR NEED SUPPORT?</h2>
                <h4 class="mb-0">If you’ve still got questions or need support click ‘GET SUPPORT’<br> to send us a message and someone from our team will get back to you soon.</h4>
            </hgroup>
            <a href="javascript:void(0)" class="btn btn-white br" data-bs-toggle="modal" data-bs-target="#get_support">GET SUPPORT</a>
            <!-- <a href="{{url('get-support')}}" class="btn btn-white br">GET SUPPORT</a> -->
        </div>
    </section>

    <div class="modal fade modal-password" id="get_support" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-3">
                        <h3 class="mb-1 color_primary">STILL GOT QUESTIONS OR NEED SUPPORT?</h3>
                        <p>Send us a message and someone from our team will get back to you soon.</p>
                    </div>
                    <form class="form" action="">
                    
                        <div class="control-group">
                            <input type="text" placeholder="Name" name="name">
                        </div>
                        <div class="control-group">
                            <input type="email" placeholder="Email" name="email">
                        </div>
                        <div class="control-group">
                            <input type="text" placeholder="Tel" name="tel">
                        </div>
                        <div class="control-group">
                            <select>
                                <option>Select subject</option>
                                <option>Evolving Love Quiz</option>
                                <option>Free Relationship Archetype Report</option>
                                <option>Full Profile + Step By Step Guide</option>
                                <option>1:on:1 Sessions with Bryan & Jennifer</option>
                                <option>Evolving Love Online Course</option>
                                <option>Evolving Love Immersion Retreat</option>
                                <option>Payment Questions</option>
                                <option>Technical Support</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="control-group mb-4">
                            <textarea type="text" placeholder="message" name="message"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
function shopping_cart(type){
   if(type=="3"){
    var col2_amount = $('#col2_amount').val();
    $('.session-p').html("3 Seesion Package(90 min each)");
    $('.price').html(col2_amount);
    $('#price').attr(col2_amount);
    $('#formtype').attr('value',"3_session");
   }
   else{
    var col1_amount = $('#col1_amount').val();
    $('.session-p').html("1:on:1 Master Your Relationship Archetype Session (90 min)");
    $('.price').html(col1_amount);
    $('#price').attr('value',col1_amount);
    $('#formtype').attr('value',"1_session");
   }
}

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