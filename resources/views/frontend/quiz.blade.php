@include('layouts.header')
<div id="sec1" style="display: none;">
    @include('layouts.header-quiz')
     <header class="single-header">
         <a href="/" class="site-logo">
            <img src="{{asset('images/evolving-love-logo.png')}}" alt="">
        </a>
     </header>
    <main class="content">
        <section class="quiz-screen quis" style="background-image: url('https://evolvinglove.customerdevsites.com/images/Relationship Dynamics Institute Background Image - Union 60_ Jennifer Russell Bryan Franklin-min.png');">
            <div class="container">
                <div class="inner">
                    <h3>Keep the following in mind as you take this quiz...</h3>
                    <h4 class="mb-1">
                        <strong>#1 Realize It’s Just For You</strong>
                    </h4>
                    <p>Be open and honest – it won’t be valuable otherwise.</p>
                    <h4 class="mb-1">
                        <strong>#2 Go With Your Initial Response</strong>
                    </h4>
                    <p>Do not over think each question. Go with your gut.</p>
                    <h4 class="mb-1">
                        <strong>#3 Ask Your Internal Judger to Go On A Break</strong>
                    </h4>
                    <p>There’s no way to ‘fail’ and there are no ‘wrong’ answers.</p>
                    <h4 class="mb-1">
                        <strong>#4 Use this report to understand yourself, not criticize your partner</strong>
                    </h4>
                    <p>Resist the urge to make your partner wrong and focus instead on how you can make things better together</p>
                    <a href="/questions" class="btn btn-white mt-3">Next</a>
                </div>
            </div>
        </section>
    </main>
</div>


<div id="sec2">
<main class="content visionary main">
    <section class="login-section quiz" style="background-image: url('https://evolvinglove.customerdevsites.com/images/Relationship Dynamics Institute Background Image - Union 60_ Jennifer Russell Bryan Franklin-min.png');">
        <div class="container">
            <div class="inner">
                <figure class="mb-4"><img src="https://evolvinglove.customerdevsites.com/images/Evolving Love Polarity Wheel Updated (white lines).png" alt=""></figure>
                <div class="inner-content">
                    <div class="being-wrap">
                        <div>
                          <h2>Are you being a
                            <span class='random-word'></span><br>
                            or an
                            <span id="fruits"></span>
                          </h2>
                        </div>
                    </div>
                    <span>Which of the 64 Relationship Stances do you<br> tend to bring to your relationships?</span>
                    <p>Take this FREE Relationship Dynamics Quiz to unlock the key to understanding your greatest gifts and your deepest shadows as a romantic partner, family member, or friend. You’re about to see yourself and your partner in a whole new light.. Plus find out how you can access your personalized 40 page Relationship Dynamics profile to help you build stronger, healthier, more lasting love.</p>
                    <!-- <a href="/statement" class="btn btn-white mt-3">START QUIZ <img src="images/right.png" alt=""></a> -->
                    <a href="javascript:void(0)" onclick="show_statment()" class="btn btn-white mt-3">START QUIZ</a>
                </div>
            </div>
        </div>
    </section>

    <section class="uSpace background_primary">
        <div class="container">
            <div class="swiper testimonial-swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" style="cursor: grab; transform: translate3d(-523px, 0px, 0px); transition-duration: 0ms;" id="swiper-wrapper-34cc6dbefc436a32" aria-live="off">
                    <div class="swiper-slide swiper-slide-prev" style="width: 493px; margin-right: 30px;" role="group" aria-label="1 / 3">
                        <div class="single">
                            <figure>
                                <img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/1683273595_Evolving Love Testimonial - Kane &amp; Alessia.png" alt="">
                                <figcaption>Annie Lalla & <br>Eben Pagan</figcaption>
                            </figure>
                            <div class="text-content">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" style="width: 493px; margin-right: 30px;" role="group" aria-label="2 / 3">
                        <div class="single">
                            <figure>
                                <img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/unnamed2.png" alt="">
                                <figcaption>Kane Minkus & <br>Alessia Minkus</figcaption>
                            </figure>
                            <div class="text-content">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" style="width: 493px; margin-right: 30px;" role="group" aria-label="3 / 3">
                        <div class="single">
                            <figure>
                                <img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/1683273595_Evolving Love Testimonial - Kane &amp; Alessia.png" alt="">
                                <figcaption>Annie Lalla & <br>Eben Pagan</figcaption>
                            </figure>
                            <div class="text-content">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-prev" style="width: 493px; margin-right: 30px;" role="group" aria-label="1 / 3">
                        <div class="single">
                            <figure>
                                <img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/unnamed2.png" alt="">
                                <figcaption>Kane Minkus & <br>Alessia Minkus</figcaption>
                            </figure>
                            <div class="text-content">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" style="width: 493px; margin-right: 30px;" role="group" aria-label="2 / 3">
                        <div class="single">
                            <figure>
                                <img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/1683273595_Evolving Love Testimonial - Kane &amp; Alessia.png" alt="">
                                <figcaption>Annie Lalla & <br>Eben Pagan</figcaption>
                            </figure>
                            <div class="text-content">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-34cc6dbefc436a32" aria-disabled="false"></div>
                <div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-34cc6dbefc436a32" aria-disabled="true"></div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </section>

    <section class="cover-image background_light_grey uSpace col_wrap">
        <figure class="bg-image"><img src="https://evolvinglove.customerdevsites.com/images/Evolving Love Background - Android Jones Hope Street Night Machine.jpg" alt=""></figure>
        <div class="container">
        <div class="maxWidth_1000 mx-auto">
            <div class="row row-cols-1 row-cols-md-3 gy-5">
                <div class="col">
                    <div class="single">
                        <figure><img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/unnamed.png" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                        <h3>Take it together<br> or alone</h3>
                        <p>Take it on your own and  learn about yourself  OR take it with a romantic partner, business colleague, family member, or friend to  understand the relationship dynamics between you. You can retake this quiz anytime.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="single">
                        <figure><img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/1683174716_live-5.png" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                        <h3>Discover your unique<br> gifts & patterns</h3>
                        <p>Gain personalized insights into your relationship strengths and gifts while uncovering which of the 8 toxic cycles you get caught in most to help you understand yourself and the people you interact with most.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="single">
                        <figure><img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/unnamed3.png" alt="Evolving Love Icon - Personalized Plan (Puzzle Piece)"></figure>
                        <h3>Learn skills to improve your relationship</h3>
                        <p>Gain practical relationship skills for building stronger, healthier, and more fulfilling relationships. This  Relationship Dynamics Quiz analyzes 20 key areas, 8 gifts, and 8 shadow patterns  to help you learn how to be a better partner.</p>
                    </div>
                </div>         
            </div>
            </div>
        </div>
    </section>

    <section class="quiz-wrap">
    	<div class="container">
    		<h2>WHO SHOULD TAKE THIS QUIZ?</h2>
    		<div class="row">
    			<div class="col-md-12">
                    <div class="box">
        				<figure><img src="https://evolvinglove.customerdevsites.com/images/single1.png" alt=""></figure>
                        <div class="content">
                            <p>As someone who is single right now, come to prepare yourself for a thriving relationship.  Learn the skills and proven strategies to better understand both yourself and others so you can build  a healthy relationship from the start.</p>
                            <ul>
                                <li>Unearth the blind spots that might be  in the way of finding true love</li>
                                <li>Learn how to reverse toxic cycles and stop repetitive relationship patterns</li>
                                <li>Learn how to teach your partners to love you best</li>
                            </ul>
                        </div>
                    </div>
    			</div>
    			<div class="col-md-12">
                    <div class="box">
        				<figure><img src="https://evolvinglove.customerdevsites.com/images/single2.png" alt=""></figure>
                        <div class="content">
                            <p>If you are in a relationship that ever faces challenges, come to this online event to identify and rise above the specific patterns that you get caught in most and learn personalized strategies that will support you to permanently resolve conflicts when they arise.</p>
                            <ul>
                                <li>Unearth the blind spots that might be  in the way of finding true love</li>
                                <li>Learn how to reverse toxic cycles and stop repetitive relationship patterns</li>
                                <li>Learn how to teach your partners to love you best</li>
                            </ul>
                        </div>
                    </div>
    			</div>
    			<div class="col-md-12">
                    <div class="box">
        				<figure><img src="https://evolvinglove.customerdevsites.com/images/single3.png" alt=""></figure>
                        <div class="content">
                            <p>If you are a couple in bliss, you are already committed to having the best relationship possible. Come to create lasting change and healthy longevity that strengthens your relationship and evolves the way you love each other.</p>
                            <ul>
                                <li>Unearth the blind spots that might be  in the way of finding true love</li>
                                <li>Learn how to reverse toxic cycles and stop repetitive relationship patterns</li>
                                <li>Learn how to teach your partners to love you best</li>
                            </ul>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="waiting-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <figure><img src="https://evolvinglove.customerdevsites.com/images/unnamedd.png" alt=""></figure>
                </div>
                <div class="col-md-9">
                	<h2 class="text-center">WHAT ARE YOU WAITING FOR?</h2>
                    <p>Take your Free Relationship Dynamics Quiz now to get your Personalized Relationship Dynamics Summary and find out how to access your full 40+page profile. Click the button  below to get started.</p>
                    <a href="/statement" class="btn btn-white mt-3">START QUIZ<strong>»</strong></a>
                </div>
            </div>
        </div>
    </section>

    <section class="about-wrap bg-cover" style="background-image: url('https://evolvinglove.customerdevsites.com/images/backend/pages_3/1683189076_Evolving Love Sidebar &amp; Practices Background - Red.png');">
        <div class="container">
            <h2>ABOUT THE CREATORS OF THE RELATIONSHIP DYNAMICS QUIZ</h2>
            <p>JENNIFER RUSSELL & BRYAN FRANKLIN, CO-FOUNDERS THE RELATIONSHIP DYNAMICS INSTITUTE</p>
            <div class="row">
                <div class="col-md-3">
                    <figure><img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/unnamed5.png" alt=""></figure>
                </div>
                <div class="col-md-9">
                    <h6>Over 30,000 paid coaching sessions and hundreds of <br>transformational workshops over the last 22 years</h6>
                    <p class="paragraph">Together Jennifer Russell and Bryan Franklin have led 20+ years of impactful transformational courses, retreats, and programs  incorporating  the best of Neurolinguistic Programming (NLP), the human potential movement, family systems, attachment theory, parts work, collaborative systems, evolutionary psychology, spiral dynamics,, spiritual practices, and sacred theater. They’ve analyzed 1000s of relationship fights to find the right questions to get to the heart of the matter and permanently resolve conflicts with those you love.</p>
                </div>
            </div>
        </div>
    </section>



</main>
</div>
@if (session('status'))
<div class="alert alert-success alert_msg" role="alert">
{{ session('status') }}
</div>
@endif
<script>
(function() {
  
  var root = this;
  
  root.fruits = [ 'INTOLERANT TYRANT', 'ENTITLED VICTIM', 'SELF SACRIFICING BEGGAR', 'AVOIDANT PLEASER', 'INSECURE NARCISSIST', 'RIGHTEOUS MARTYR', 'SELF ABSORBED ADDICT', 'BLAME SHIFTING PROSECUTOR?'];
  root.index = 1;
  root.container = document.getElementById('fruits');
  
  root.next = function() {
    if( root.index < root.fruits.length) {
      root.index++;
    }
    
    if( root.index == root.fruits.length) {
      root.index = 0;
    } 
    
    root.changeContainerText();
    
  }
  
  
  root.changeContainerText = function() {
    $(root.container).fadeOut(1000, function() {
      root.container.innerHTML = root.fruits[root.index];  
    })
    .fadeIn(1000);
  }
  
  root.interval = setInterval(function() {
    root.next();
  },3000);
  
  
}());
</script>

<script>
    let i = 0;

    const randomizeText = () => {
      const phrase = document.querySelector('.random-word');
      const compStyles = window.getComputedStyle(phrase);
      const animation = compStyles.getPropertyValue('animation');
      const animationTime = parseFloat(animation.match(/\d*[.]?\d+/)) * 2000;
      
      const phrases = ['PASSIONATE VISIONARY', 'RESPECTFUL ZEN MASTER', 'CHAMPIONING GUARDIAN', 'LOVING EMPATH', 'CREATIVE FREE SPIRIT', 'GROUNDED DEVOTEE', 'ROMATIC PROVOCATEUR', 'RECEPTIVE COLLABORATOR'];
      
      i = randomNum(i, phrases.length);
      const newPhrase = phrases[i];
      
      setTimeout(() => {
        phrase.textContent = newPhrase;
      }, 400); // time to allow opacity to hit 0 before changing word
    }

    const randomNum = (num, max) => {
      let j = Math.floor(Math.random() * max);
      
      // ensure diff num every time
      if (num === j) {
        return randomNum(i, max);
      } else {
        return j;
      }
    }

    const getAnimationTime = () => {
      const phrase = document.querySelector('.random-word');
      const compStyles = window.getComputedStyle(phrase);
      let animation = compStyles.getPropertyValue('animation');
      
      // firefox support for non-shorthand property
      animation != "" ? animation : animation = compStyles.getPropertyValue('-moz-animation-duration');
      
        // webkit support for non-shorthand property
      animation != "" ? animation : animation = compStyles.getPropertyValue('-webkit-animation-duration');
      
      
      const animationTime = parseFloat(animation.match(/\d*[.]?\d+/)) * 1000;
      return animationTime;
    }

    randomizeText();
    setInterval(randomizeText, getAnimationTime());

</script>
<script>
  setTimeout(function () {
    $('.alert_msg').fadeOut();
  }, 2000);
  
 </script>
@include('layouts.footer')
</div>

<script type="text/javascript">
    function show_statment(){
        $("#sec1").css("display","");
        $("#sec2").css("display","none");
        $(".site-header").css("display","none");
    }
</script>