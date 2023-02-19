<!-- Main Footer -->
<footer class="main-footer margin-top">
    <div class="icon-one" style="background-image: url(web/images/icons/icon-1.png)"></div>
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-bs-target="html"><span class="fa fa-angle-up"></span>
            </div>
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a class="footer-logo" href="#">
                                        <img src="{{ url('web/images/bsrs.png') }}">

                                    </a>
                                </div>
                                <div class="text">Established in 2010, Bhavsagar Residential Society is one of the best Residential society in Rohini. Our main goal is to foster a sense of community, well-being, and safety while also protecting ourselves from pollution and criminal activity.</div>
                                <!-- Social Nav -->
                                <ul class="social-nav">
                                    <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a>
                                    </li>
                                    <li class="facebook"><a href="#"><span class="fa fa-facebook-f"></span></a>
                                    </li>
                                    <li class="google"><a href="#"><span class="fa fa-google-plus"></span></a>
                                    </li>
                                    <li class="pinterest"><a href="#"><span class="fa fa-pinterest-p"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>Our Services</h4>
                                <ul class="footer-list">
                                    <li><a href="{{ url('about/') }}">About BSRS</a></li>
                                    <li><a href="{{ url('chairman-message/') }}">Chairman Message</a></li>
                                    <li><a href="{{ url('vision-mission/') }}">Vision & Mission</a></li>
                                    <li><a href="{{ url('our-team/') }}">Our Team</a></li>
                                    <li><a href="{{ url('events/') }}">Events</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4>For User</h4>
                                <ul class="footer-list">
                                    <li><a href="{{ url('/member-login') }}">Member Login</a></li>
                                    <li><a href="{{ url('/member-registration') }}">Join Members</a></li>
                                    <li><a href="{{ url('/default-member') }}">Defaulter Members</a></li>
                                    <!--<li><a href="#">Onliine Payment</a></li>-->
                                    <!--<li><a href="#">Complaints Form</a></li>-->
                                    <li><a href="{{ url('donate/') }}">Donate</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <h4>Subscribe</h4>
                                <div class="text">Get our newsletter for latest updates about
                                    viruses.</div>
                                <div class="newsletter-form">
                                    <form method="post" action = "{{ url('/savesubscriber') }}" enctype="multipart/form-data">
                                    @csrf
                                       <div class="form-group">
                                            <input type="email" id="email222" name="email" value="" placeholder="Your Email"
                                                >
                                            <div id="err"></div>
                                            <button type="submit" class="theme-btn submit-btn"  id ="SubscriberBtn">Subscribe</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="clearfix">

                <div class="pull-left">
                    <div class="copyright">Copyrights &copy; 2022 Bhavsagar Residential Society All Rights
                        Reserved.</div>
                </div>
                <div class="pull-right">
                    <ul class="footer-nav">
                        <li><a href="#">Powerd by :- </a></li>
                        <li><a href="https://indowebtech.com/">Indowebtech.com</a></li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

</div>
<div class="scroll-to-tops scroll-to-target" data-bs-target="html"><span class="fa fa-angle-up"></span></div>

<script src="{{ url('web/js/jquery.js') }}"></script>

<script src="{{ url('web/js/bootstrap.min.js') }}"></script>
<script src="{{ url('web/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ url('web/js/jquery.fancybox.js') }}"></script>
<script src="{{ url('web/js/jquery.fancybox.js') }}"></script>
<script src="{{ url('web/js/appear.js') }}"></script>
<script src="{{ url('web/js/nav-tool.js') }}"></script>
<script src="{{ url('web/js/mixitup.js') }}"></script>
<script src="{{ url('web/js/owl.js') }}"></script>
<script src="{{ url('web/js/wow.js') }}"></script>
<script src="{{ url('web/js/isotope.js') }}"></script>
<script src="{{ url('web/js/vivus.min.js') }}"></script>
<script src="{{ url('web/js/jquery-ui.js') }}"></script>
<script src="{{ url('web/js/script.js') }}"></script>
<script src="{{ url('web/js/color-settings.js') }}"></script>
<script src="{{ url('web/js/jquery.validate.min.js') }}"></script>

</body>

</html>
<script>
$(document).ready(function(){
    $("#formData").validate({
        rules: {
        name: "required",
        email: "required",
        phone: "required",
        mobile: "required",
        },
        submitHandler: function(form) {
        form.submit();
        }
    });

});
</script>