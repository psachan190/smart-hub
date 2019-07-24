<footer class="footer-area" style="margin-top:50px;">
    <div class="footer-big section--padding">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <div class="info-footer">
                        <h4 class="footer-widget-title text--white">Kanpurize</h4>
                        <ul class="info-contact">
                            <li>
                                <span class="lnr lnr-smartphone info-icon"></span>
                                <span class="info">+91-7706040151</span>
                            </li>
                            <li>
                                <span class="lnr lnr-envelope info-icon"></span>
                                <span class="info">info@kanpurize.com</span>
                            </li>
                            <li>
                                <span class="locationicon lnr lnr-map-marker info-icon"></span>
                                <span class="info">109/336,<br /> Ram Krishna Nagar,<br /> Kanpur 208012 </span>
                            </li>
                        </ul>
                    </div><!-- end /.info-footer -->
                </div><!-- end /.col-md-3 -->

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Our Company</h4>
                        <ul>
                            <li><a href="{{ url('kanpur_market_shop#about') }}">About Us</a></li>
                            <li><a href="{{ url('kanpur_market_shop#contact') }}">Contact Us</a></li>
                            <li><a href="{{ url('kanpur_market_shop#testimonial') }}">Testimonials</a></li>
                            <li><a href="{{ url('kanpur_market_shop#services') }}">Services</a></li>
                            <li><a href="{{ url('kanpur_market_shop#whychoos') }}">Why Choose Us</a></li>
                             <li><a href="{{ url('kanpurize_Career') }}">Career</a></li>
                             <li><a href="{{ url('kanpurize_sellerpolicy') }}">Seller Policy</a></li>
                        </ul>
                    </div><!-- end /.footer-menu -->

                </div><!-- end /.col-md-5 -->
                <div class="col-md-3 col-sm-6">
                	<div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                        <ul>
                        	<li><a href="{{ url('kanpurize_Help_WriteUS') }}">Write Us</a></li>
                           <li><a href="{{ ('kanpurize_Faqs') }}">FAQs </a></li>
                            <li><a href="{{ url('kanpurize_Recomended') }}">Recomended Seller</a></li>
                          
                            <li><a href="{{ url('kanpurize_Advertisementpolicy') }}">Advertisement Policy</a></li>
                             <li><a href="{{ url('kanpurize_Restricted') }}">Restricted products or services for Sell</a></li>
                            <li><a href="{{ url('Restricted_Advertisement') }}">Restricted products for Advertisement</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="newsletter">
                        <h4 class="footer-widget-title text--white">Newsletter</h4>
                        <p>Subscribe to get the latest news, update and offer information.</p>
                        <div class="newsletter__form">
                            <form action="#">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Enter email">
                                    <button class="btn btn--round" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- start .social -->
                        <div class="social social--color--filled">
                            <ul>
                                <li><a href="https://www.facebook.com/kanpurize/"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="https://twitter.com/kanpurize"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="https://plus.google.com/u/0/110561505744471170049"><span class="fa fa-google-plus"></span></a></li>
                                <li><a href="https://www.linkedin.com/in/kanpurize-the-spirit-of-kanpur-938b58155/"><span class="fa fa-linkedin"></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UC9rFsHN1ynWZ3bfEAI9JiiQ?view_as=subscriber"><span class="fa fa-youtube"></span></a></li>
                            </ul>
                        </div>
                        <!-- end /.social -->
                    </div><!-- end /.newsletter -->
                </div><!-- end /.col-md-4 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </div><!-- end /.footer-big -->

    <div class="mini-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>&copy; 2018 <a href="#">Kanpurize</a>. All rights reserved. Created by <a href="#">Kanpurize</a></p>
                    </div>
						<a id="back-to-top" href="#" class="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">&nbsp;<span class="lnr lnr-chevron-up"></span></a>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- inject:js -->
<script src="{{ asset('js/plugins.min.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
<script>
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});</script>
<script>
$(document).ready(function(){
    $('.searchProducts').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#productsTableList tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>

</body>
</html>

