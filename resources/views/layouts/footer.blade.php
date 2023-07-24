<footer id="footer" class="site-footer background_primary">
    <div class="container">
        <div class="footer-inner">
            <div>
                <div class="left">
                    <ul>
                        <li>
                            <a href="/quiz">FREE QUIZ</a>
                        </li>
                        <li>
                            <a href="/about">About</a>
                        </li>
                        <li>
                            <a href="/work-with-us">WORK WITH US</a>
                        </li>
                        <li>
                            <a href="/contact-us">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <div class="right-ques">
                        <!-- <p><a href="/questions">QUESTION</a></p> -->
                        <a href=""><figure><img src="https://evolvinglove.customerdevsites.com/images/backend/pages_3/SMS.png" alt=""></figure></a>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p>Relationship Dynamics Institute © <span>All Rights Reserved</span> <a href="/terms-and-condition">Terms of Use</a> <a href="/privacy-policy">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</footer>
<!--script type="text/javascript"> (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.defer=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 'https://imark.ladesk.com/scripts/track.js', function(e){ LiveAgent.createButton('w4dcq13i', e); }); </script-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset('js/bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/developer.js') }}"></script>

</body>

</html>


<script type="text/javascript">
    $(document).ready(function(){
        $(".ttt").click(function(e){
            e.preventDefault();

            var star = $(this).val();   

            var url = $(location).attr('href');
            var array = url.split('/');
            var page = array[array.length-1];

            var authid = $("#authid").val();
            var formid = $("#formid").val();  
            

            
            $.ajax({
              url: "/feedback-submit",
              type: "GET",
              data: {"page":page,"authid":authid,"star":star,"formid":formid},
              success: function (data) {
              
                $("#refresh_feedback").load(location.href + " #refresh_feedback");

              },
            });
        })                                                                                                                                                                                               
    })
</script>                                                                                                                                                           