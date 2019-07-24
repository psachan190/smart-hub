<!------footer section start------->
<footer class="footer-area">
    <div class="footer-big section--padding">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
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
                                <span class="locationicon1 lnr lnr-map-marker info-icon"></span>
                                <span class="info">109/336,<br /> Ram Krishna Nagar,<br /> Kanpur 208012 </span>
                            </li>
                        </ul>
                    </div><!-- end /.info-footer -->
                </div><!-- end /.col-md-3 -->

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Our Company</h4>
                        <ul>
                            <li><a href="{{ url('Kanpurize_index#about') }}" target="_blank">About Us</a></li>
                            <li><a href="{{ url('Kanpurize_index#contact') }}" target="_blank">Contact Us</a></li>
                            <li><a href="{{ url('Kanpurize_index#testimonial') }}" target="_blank">Testimonials</a></li>
                            <li><a href="{{ url('Kanpurize_index#services') }}" target="_blank">Services</a></li>
                            <li><a href="{{ url('Kanpurize_index#whychoos') }}" target="_blank">Why Choose Us</a></li>
                             <li><a href="{{ url('kanpurize_Career') }}">Career</a></li>
                               <li><a href="{{ url('kanpurize_sellerpolicy') }}">Seller Policy</a></li>
                               <li><a target="_blank" href="{{ url('kanpurizeblog') }}" title="Kanpurize Blog">Our Blog</a></li>
                        </ul>
                    </div><!-- end /.footer-menu -->
                </div><!-- end /.col-md-5 -->
                <div class="col-md-3 col-sm-6">
                	<div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                        <ul>
                            <li><a href="{{ ('kanpurize_Faqs') }}">FAQs </a></li>
                            <li><a href="{{ url('kanpurize_Recomended') }}">Recomend Seller</a></li>
                          
                            <li><a href="{{ url('kanpurize_Advertisementpolicy') }}">Advertisement Policy</a></li>
                             <li><a href="{{ url('kanpurize_Restricted') }}">Restricted products or services for Sell</a></li>
                            <li><a href="{{ url('Restricted_Advertisement') }}">Restricted products for Advertisement</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12">
                    <div class="newsletter">
                        <h4 class="footer-widget-title text--white">Newsletter</h4>
                        <p>Subscribe to get the latest news, update and offer information.</p>
                          <p id="thank_you"></p>
                        <div class="newsletter__form">
                            <form action="#">
                                <div class="field-wrapper">
                                      <input class="relative-field rounded" name="email_newsletter" id="email_newsletter" type="text" placeholder="Enter email">
                                    <button class="btn btn--round" type="button" onclick="newsletter();" >Submit</button>
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

<!-----END FOOTER AREA----->
<!-- inject:js -->
<script src="{{ asset('js/footer.js') }}"></script>


<script>
$(document).ready(function(e) {
<!----Offers Products In cart--start---->
/* 
 $(document).on('click','.offersProductsCart',function(){
	var productsid = $(this).parent().parent().find('.productsdetailsId').val();
	var shopID = $(this).parent().parent().find('.shopID').val();
	var offerID = $("#offerID").val();
	$(this).html("Added in Cart");
    if(productsid !=" "){
         $.ajax({
          url: base_url +"/addCartInOffers",
          type:"GET",
          data:{productsid:productsid,shopID:shopID,offersID:offerID},
          success: function(data){
               alert(data);
			   $("#response").html(data);
             if(data=="error"){
                  alert("you are not purchase products in multiple shop at a time. You add this item in wish list and after some time you get purchase this item .");
                }
             else{
                $('.qtycartCount').html(data);
                $("#dataResult").html(data);
				 $('#headerCartDiv').load(document.URL + ' #headerCartDiv');
                $('#cartRow').load(document.URL + ' #cartRow'); 
                $('#cartListingItem').load(document.URL + ' #cartListingItem');
                 $('#completeCart').load(document.URL + ' #completeCart');
                }   
           }
       });
      } 
  });  
<!----Offers Products In cart--End---->
 */
</script>
<script>
$(document).ready(function(e) {
function newsletter(){
  $.ajax({
          url: '{{ url("newsletter") }}',
          type:"GET",
          data:{ 'email' :$('#email_newsletter').val()},
          success: function(data){
            if(data == '1')
            {
                $('#thank_you').html('Thank you for subscription.');
            }
            else
            {
                $('#thank_you').html('Try Again.');
            }
          }
       });
}
</script>
<!--------get Products on products sub category script End---------->
 <script src="<?php //echo url("validationJS/formFieldValidation.js"); ?>" type="text/javascript"></script>
 <script src="<?php //echo url("validationJS/browseFile.js"); ?>" type="text/javascript"></script>
<script src="<?php //echo url("validationJS/backendAjax.js"); ?>"></script>
<script>
$(document).ready(function(e) {
  $("#usersprofileListName").load("<?php echo url("getProfileList"); ?>"); 
});
</script>
</body>
</html>
<!------footer section start------->
