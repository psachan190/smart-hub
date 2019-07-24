<script src="<?php //echo url("validationJS/vendorBackend.js"); ?>"></script>
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

<script src="<?php echo url("validationJS/browseFile.js"); ?>" type="text/javascript"></script>
<script src="<?php echo url("validationJS/formFieldValidation.js"); ?>" type="text/javascript"></script>
<script src="{{ asset('js/plugins.min.js') }}"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
<script src="{{ asset('js/multiple-select.js') }}"></script>
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>
 <script>
    $(function() {
        $('#ms1').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>
<script>
$(document).ready(function(e) { 
   $(document).on('keyup','#salePrice',function(){
     var pSalePrice = $('#salePrice').val();
	 var listPrice = $("#listprice").val();
	 if(parseFloat(pSalePrice) > parseFloat(listPrice)){
	    alert("producxts total price is not greater than products MRP. rate");
		$('#totalPrice').attr("readonly",true).val("");
	   }
	 else{
	     $('#totalPrice').val(pSalePrice);
	   }  
   }); 
});
</script>
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
$(document).ready(function(e) {
 $(document).on('click','#withGstyes',function(){
    var salePrize = $('#salePrice').val();
	$('#totalPrice').val(salePrize);
  }); 
});
</script>
<script>
$(document).ready(function(e) {
 $(document).on('click','#withGstNo',function(){
    var salePrize = $('#salePrice').val();
	var gstPercentage = $('#gstRate').val();
	 if(gstPercentage != "hidden"){
		  var percentageValue = (salePrize*gstPercentage)/100;
		   var totalProductsPrice = parseFloat(salePrize) + parseFloat(percentageValue);// alert(totalProductsPrice);
		   if(totalProductsPrice > $('#listprice').val()){
			   alert("producxts total price is not greater than products MRP. rate");
			   $('#totalPrice').attr("readonly",true).val("");
			 }
		    else{
			   $('#totalPrice').val(totalProductsPrice);
			}	 
		}
      else{
		$('#totalPrice').val("Products Total price");
		}		
	
  }); 
});
</script>
<script>
  <!---Gst Rate calculation in add products script start-->
 $(document).ready(function(e) { 
  $(document).on('change','#gstRate',function(){
      var salePrize = $('#salePrice').val(); 
      if($('#withGstyes').is(':checked')){
	     $('#totalPrice').val(salePrize);
	  }
	  else{
	    var gstRate = $('#gstRate').val(); //alert(gstRate);
		var percentageValue = (salePrize*gstRate)/100;
		//alert(percentageValue); 
		 var totalProductsPrice = parseFloat(salePrize) + parseFloat(percentageValue); //alert(totalProductsPrice);
		 if(totalProductsPrice > $('#listprice').val()){
			   alert("producxts total price is not greater than products MRP. rate");
			   $('#totalPrice').attr("readonly",true).val("");
			 }
		    else{
			    $('#totalPrice').val(totalProductsPrice);
		       $('#totalPrice').attr("readonly",true);
			}	 
		
	  }
  }); 
 }); 
 <!---Gst Rate calculation in add products script start-->	
</script>
<script>
$(document).ready(function(e) {
  $(document).on('change',"#category",function(){
    var categoryId = $('#category').val();
	var vendordetails_id = $('#vendordetails_id').val();
	 if(categoryId ==0){
	    alert("please Select valid Category Name...");
		 $('#subCategory').html("");
	   }
	 else{
		 $.ajax({
                type:'GET',
                url:'{{ url("changeSubcategory") }}',
                data:{categoryId:categoryId,shopID:vendordetails_id},
                success:function(res){
					//console.log(res);
				 $('#subCategory').html(res);
				}
          });
      $.ajax({
                type:'GET',
                url:'{{ url("getAttribue") }}',
                data:{categoryId:categoryId,shopID:vendordetails_id},
                success:function(res){
          //console.log(res);
         $('#attribute').html(res);
        }
          });

	  }   
  })  
});
</script>
<!----pancard number-----validation start---->
<script>
function checkPanCardNumber(pancardNumber){
   var pancardNumberNo = /^\d{10}$/;
  if(pancardNumber != ""){
	  if(pancardNumber.match(pancardNumberNo)) {
		 document.getElementById("pancardNumberErr").innerHTML = " ";
		 document.getElementById("saveBusinessDetails").disabled = false;
		 return true;
		}
	  else{
		 document.getElementById("pancardNumberErr").innerHTML = "<span style='color:red;'>Invalid Pan Card Number.</span>";;
	     document.getElementById("saveBusinessDetails").disabled = true;
		 return false;
	   }
  }
  else{
     document.getElementById("pancardNumberErr").innerHTML = "<span style='color:red;'>Pan Card Number is Reqired.</span>";
	 document.getElementById("saveBusinessDetails").disabled = true;
  }
 }
</script>
<!----pancard number-----validation start---->

<!--click on filteration code start -->
<script>
<!--filteration validate start-->
$(document).ready(function(e) {
$("#filtration").change(function() {
    var filtrationval = document.getElementById('filtration').value;
	//alert(filtrationval);
	if ( $(this).is(':checked') ) {
        $("#filtrationBlog").slideDown();
		$("#filtration").val("yes");
		$("#gstProvisionalID").val("");
    } else {
        $("#filtrationBlog").slideUp();
		$("#filtration").val("no");
    }
});    
});
<!--filteration validate End-->
</script>
<script>
$(document).ready(function(e) {
var dates = $("#datepicker1, #datepicker2, #datepicker3, #datepicker4, #datepicker5, #datepicker6, #datepicker7").datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'dd-MM-yy',
    numberOfMonths: 1,
    onSelect: function(date) {
        for(var i = 0; i < dates.length; ++i) {
            if(dates[i].id < this.id)
                $(dates[i]).datepicker('option', 'maxDate', date);
            else if(dates[i].id > this.id)
                $(dates[i]).datepicker('option', 'minDate', date);
        }
    } 
});

});
</script>
 <!--click on filteration code End--> 
</body>
</html>
