@include('layouts.header')
<style>
    .site-header nav .right>.btn,
    .site-header nav .left .site-hamburgur {
        display: none;
    }
</style>
<main class="content">
    <section class="page-innerTitle" style="background-image: url('images/Evolving Love Background Image - Android Jones Union (hires).jpeg');">
        <div class="container">
            <div class="content-box">
                <h1 class="mb-0">CONTACT US</h1>
                <h3 class="mb-0">We’re here for you!</h3>
            </div>
        </div>
    </section>
    <section class="chooseProfile-section">
        <!-- <aside>
            <ul>
                <li>
                    <a href="choose-my-profile.php">
                        <img src="images/Evolving Love Icon - My Profile.png" alt="Evolving Love Icon - My Profile">
                        My Profiles
                    </a>
                </li>
                <li>
                    <a href="my-courses.php">
                        <img src="images/Evolving Love Icon - My Products.png" alt="Evolving Love Icon - My Products">
                        My Courses
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="images/Evolving Love Icon - Community.png" alt="Evolving Love Icon - Community">
                        Community
                    </a>
                </li>
                <li>
                    <a href="get-support.php" class="active">
                        <img src="images/Evolving Love Icon - Get Support.png" alt="Evolving Love Icon - Get Support">
                        Get Support
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <img src="images/Evolving Love Icon - Logout (Grey).png" alt="Evolving Love Icon - Logout (Grey) - My Profile">
                        Log out
                    </a>
                </li>
            </ul>
        </aside> -->
        <div class="chooseProfile-body re__ctnt">
            <div class="get-support-section">
                <figure class="mb-5"><img src="{{asset('images/Evolving-Love-Header-Purple-Support-Cropped-1024x512.png')}}" alt=""></figure>
                <p>Hello Dear One,</p>
                <p>We see you. We see the weight you carry, the burdens you bear, and the struggles you face. We see the depth of your heart, the passion in your soul, and the potential within you. You are not broken. You are simply human, with all the messy complexities and contradictions that come with that. And it is precisely those complexities that make you beautiful, that make you worthy of evolutionary love.</p>
                <p>We’re here to dive into the depths of your relationship. This is where your deepest desires meet your most profound fears. It’s where many of us either meet the edge of our limitations or a doorway into the becoming the version of ourselves we’ve most dreamed of being.</p>
                <p>We are here for you. We are here for your love story too. It’s our mission to bring our culture out of the relational dark ages and heal the divide that often exists between us when we relate. We’ve been on that mission for decades and with men and women in over 30,000 sessions. If we can help you to build relationships that are grounded in love and trust, reach out to us here. It is our joy to support you.</p>
                <div class="row row-cols-1 row-cols-md-2 signature pt-4">
                    <div class="col">
                        <figure class="signature-01"><img src="{{asset('images/Evolving Love - Signature Jennifer.png')}}" alt=""></figure>
                    </div>
                    <div class="col">
                        <figure class="signature-02"><img src="{{asset('images/Relationship Dynamics Signature - Bryan Franklin-min.png')}}" alt=""></figure>
                    </div>
                </div>
                <div class="colored-boxes mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="single background_blue">
                                <a href="mailto:info@relationshipdynamics.com"></a>
                                <figure><img src="{{asset('images/Evolving Love Icon - Email Support.png')}}" alt=""></figure>
                                <p>Email us directly at <br> info@relationshipdynamics.com</p>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{route('upsell-1-on-1-session')}}">
                            <div class="single background_primary">
                             
                                <figure><img src="{{asset('images/Evolving Love Icon - Session Support.png')}}" alt=""></figure>
                                <p>Get A Private Session <br> with Bryan & Jennifer </p>
                            </div>
                        </a>
                        </div>
                        <div class="col">
                            <div class="single background_purple">
                           
                                <figure><img src="{{asset('images/Evolving Love Icon - Skool Community.png')}}" alt=""></figure>
                                <p>Post In Our Online <br> Skool Community</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form-section">
                <h2 class="fw-normal mb-2">CONTACT US</h2>
                <p>Got a burning question? Need support? Want to work with us? Send a message to our team</p>
                <div id='divSuccess' class="divSuccess pb-3"></div>
                <form method="POST" id="contactform"class="form">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <div class="control-group">
                            <input type="text" placeholder="First Name" name="firstname" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="control-group">
                            <input type="text" placeholder="Last Name" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                    <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="control-group">
                    <input type="text" placeholder="Subject" name="subject" required>
                    </div>
                    <div class="control-group mb-4">
                    <textarea placeholder="Enter your message here..." name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-green w-auto">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>
<style>
.divError {
  color: red;
}
#divSuccess{
    text-align: left;
    font-weight: 700;
    color: green;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    
$("#contactform").submit(function (e) {
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    e.preventDefault();
    var formData = $("#contactform").serialize();
    $.ajax({
      url: "/contact-submit",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (data) {
        if (data.status == 1) {
            $("#divSuccess").html("Thankyou! Will get back to you soon.");
            $("#contactform")[0].reset()
            setTimeout(function () {
            $('#divSuccess').fadeOut();
        }, 3000);           
        }

      },
    });
});
</script>
@include('layouts.footer')