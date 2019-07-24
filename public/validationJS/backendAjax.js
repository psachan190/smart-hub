/*count and load wish list number Wish list start */
$(document).ready(function(e) {
    var status = "y";
	if(status !=" "){
	   $.ajax({
		  url: base_url +"/actionAjaxGet/getCountWishList",
		  type:"GET",
		  data:{status:status},
		  success: function(data){
			$('#countWishList').html(data)
		  }
	   });
	 }
	else{
	   alert("unexpected Try again...")
	 }   
});
/*count and load wish list number Wish list start */

/*Password matching script start*/
$(document).ready(function(e) {
  $(document).on('blur','#password',function(){
    var conPwd = $("#confirmPassword").val();
	if(conPwd != ""){
         var password = $(this).val();
	     if(password == conPwd){
		      $("#confirmPwdError").html("<span style='color:green;'>Password match.</span>");
			  $("#submit").attr('disabled' , false);
		   }
		 else{
		     $("#confirmPwdError").html("<span style='color:red;'>Password does not match .</span>");
			 $("#submit").attr('disabled' , true);
		   }   
	   }
  }); 

/*Sign up code script start*/
 $(document).on('submit',"#users_signUpForm",(function(e) {
  	 $('#submit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#signupResultResponse").html(" ");
	 e.preventDefault();
      $.ajax({
      url: base_url+"/signupAction",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){	
         $('#submit').html('Register Now').attr('disabled',false); 
		  var errorString = '';
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus == 11){
			 $("#signupResultResponse").html(parsedJson.msg);
			 setTimeout(function(){ window.location.href = base_url +"/userverify/"+parsedJson.username;
 }, 1000);
			}
		  else if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function(key,value) {
                              errorString += "<p style='color:red;'>" + value + "</p>";
                          });
			  $('#signupResultResponse').html(errorString);
		   }
		  else if(parsedJson.vStatus==1){
		     $('#signupResultResponse').html(parsedJson.msg);
		   }  
	   }	
     });
  }));
/*Sign up code script start*/

/*get Category based Products start*/
$(document).on('click','.subCatproducts_products',function(){
    var id = this.id;
	var shopID = $('#shopID').val();
	if(id !=" "){
	   $.ajax({
	      url: base_url +"/actionAjaxGet/getsubCatWiseProducts",
		  type:"GET",
		  data:{subCatid:id,shopID:shopID},
		  success: function(data){
		    $('#shopProductsList').html(data)
		  }
	   });
	 }
	else{
	   alert("unexpected Try again...")
	 }  
  });
/*get Category based Products start*/ 
/*Give rating start Rating start */
 $(document).on('click','#ratingreview',function(){
	 $('#drop3rating').modal('show');
  });
 $(document).on('click','#ratingBtn',function(){
	$('#ratingBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
    var comment = $('#comment').val();
	var rating = $('#ratingBox').val();
	var shopID = $("#shopID").val()
	  $.ajax({
			url: base_url +"/actionAjaxGet/rating",
			type:"GET",
			data:{comment:comment,rating:rating,shopID:shopID},
			success: function(data){
			 $('#ratingBtn').html('Submit').attr('disabled',false);
			 if(data == "loginfirst"){
			   window.location.href = base_url +"/login?loginfirst";
			   }
			 else if(data == 1){
			  $("#rating_response").html('"<small style="color:green;"><strong>Rating post successfully .</strong></small>"');
			      location.reload();
			    }
			 else{
			    $("#rating_response").html(data);
			  }  
			}
		 });
 });
/*Give rating start Rating start */
/*Wish list add in products start*/
$(document).on('click','.addtowishList',function(){
    var wish_btnID = this.id;
	var productId = $(this).parent().parent().parent('.productBox').find('.productsdetailsId').val();
	 alert(productId);
	  if(productId != " "){
	      $.ajax({
          url: base_url +"/actionAjaxGet/addtoWishList",
          type:"GET",
          data:{productId:productId},
          success: function(data){
			if(data == "loginfirst"){
			   window.location.href = base_url +"/login?loginfirst";
			  }
			else{
			    $("#"+wish_btnID).html("<i style='color:red;' class='fa fa-heart'></i>"); 
			    alert(data);
			  }  
		   }
       });
	   }
	 else{ alert("unexpected , try again. ");  }  
  });
  
 /*Add in wish list in Products Details page start*/
 $(document).on('click','.userwishList',function(){
    var wish_btnID = this.id;
	var productId = $(this).parent().parent().find('.productsdetailsId').val();
	  if(productId != " "){
	      $.ajax({
          url: base_url +"/actionAjaxGet/addtoWishList",
          type:"GET",
          data:{productId:productId},
          success: function(data){
			if(data == "loginfirst"){
			   window.location.href = base_url +"/login?loginfirst";
			  }
			else{
			    $("#"+wish_btnID).html("<i style='color:red;' class='fa fa-heart'></i>&nbsp;Added in Wishlist").attr('disabled' , true); 
			    alert(data);
			  }  
		   }
       });
	   }
	 else{ alert("unexpected , try again. ");  }  
  });
  
/*add To cart process script start*/
$(document).on('click','.addtocart',function(){
	var productsid = $(this).parent().parent().find('.productsdetailsId').val();
    var shopID = $('#shopID').val();// alert(productsid);
	var cart_btn_id = this.id;	
    if(productsid !=" "){
         $.ajax({
          url: base_url +"/addtoCart",
          type:"GET",
          data:{productsid:productsid,shopID:shopID},
          success: function(data){  
                    
             if(data == "loginfirst"){
			     window.location.href = base_url +"/login?loginfirst";
			   }
			 else if(data=="error"){
                alert("you are not purchase products in multiple shop at a time. You add this item in wish list and after some time you get purchase this item");
                }
             else{
                $("#"+cart_btn_id).html("Added in Cart");
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
/*add To cart process script End*/   
});
/*Password matching script start*/
$(document).ready(function(e) {
  <!---Remove cart in wish list--->
  $(document).on('click','.removeCart',function(){
    var removeid = this.id;
    if(removeid !=" "){
         $.ajax({
          url: base_url +"/removeCart",
          type:"GET",
          data:{removeid:removeid},
          success: function(data){
           $('.qtycartCount').html(data);
		   $('#headerCartDiv').load(document.URL + ' #headerCartDiv');
           $('#cartRow').load(document.URL + ' #cartRow');
           $('#cartListingItem').load(document.URL + ' #cartListingItem');
           $('#completeCart').load(document.URL + ' #completeCart');
          }
       });
      }  
  });
  <!---Remove cart in wish list--->
  
  <!--sub category products By start-->
   $(document).on('click','.subCatproducts',function(){
    var id = this.id;
	var shopID = $('#shopID').val();
	if(id !=" "){
	   $.ajax({
	      url: base_url +"/getsubCatWiseProducts",
		  type:"GET",
		  data:{subCatid:id,shopID:shopID},
		  success: function(data){
		    $('#shopProductsList').html(data)
		  }
	   });
	 }
	else{
	   alert("unexpected Try again...")
	 }  
  });
  <!--sub category products By End-->  
});

<!---Sort products by asending and desending Products price--start--->
$(document).ready(function(e) {
  $(document).on('change','#filterproductsPrice',function(){
     var filterType = $(this).val();
	 if(filterType=="12h"){
	     sortProductsPriceAscending();
	   }
	 if(filterType=="h21"){
	     sortProductsPriceDescending(); 
	   }  
  });
});
function sortProductsPriceAscending(){
	var products = $('.productsDiv');
    products.sort(function(a, b){ 
	  var first = parseInt($(a).data("price"));
	  var second = parseInt($(b).data("price"));
	  return first - second ;
	});
    $(".productsGrid").html(products);
}

function sortProductsPriceDescending(){
    var products = $('.productsDiv');
    products.sort(function(a, b){
      var first = parseInt($(a).data("price"));
	  var second = parseInt($(b).data("price"));
	  return second - first ;
	});
    $(".productsGrid").html(products);
}
<!---Sort products by asending and desending Products price--End--->

<!---increment & dcrement js button---->
function updateCartItem(obj,id){
	$.get(base_url +"/cartUpdate",
	{id:id, qty:obj.value},
	function(data){
	    var parsedJson = jQuery.parseJSON(data);
		if(parsedJson.status=="ok"){
			 $('.qtycartCount').html(parsedJson.qty);
			 $('#cartRow').load(document.URL + ' #cartRow');
		     $('#cartListingItem').load(document.URL + ' #cartListingItem');
		     $('#completeCart').load(document.URL + ' #completeCart');
		   }
	   else{
		  alert("fail");
		}	
		 //$('#cartCount').load(document.URL + ' #cartCount');
	});
}

function updateqty(rowID,realQauntity){
	  $.get(base_url +"/cartUpdate",
		{id:rowID, qty:realQauntity},
		function(data){
		   var parsedJson = jQuery.parseJSON(data);
			 if(parsedJson.status=="ok"){
				 $('.qtycartCount').html(parsedJson.qty);
				 $('#cartRow').load(document.URL + ' #cartRow');
				 $('#cartListingItem').load(document.URL + ' #cartListingItem');
				 $('#completeCart').load(document.URL + ' #completeCart');
			   }
		  else{
			  alert("fail");
			}	
		});
}

$(document).ready(function(){
   var quantitiy=0;
   $(document).on('click','.quantity-right-plus',function(){
		var maxID = this.id;
        var quantity = maxID.split('-');
		 var  realQauntity = parseInt($("#quantityUpdate"+quantity[1]).val()) +1;
		  var rowID = $("#quantityUp"+quantity[1]).data("rowid").valueOf();  
		   /*-----cart update system----*/
		   updateqty(rowID,realQauntity);
		   /*-----cart update system----*/	
		 $("#quantityUpdate"+quantity[1]).val(realQauntity);
    });
      $(document).on('click','.quantity-left-minus',function(){
		  var minID =  this.id;
		  var quantity = minID.split('-');
		    var  realQauntity = parseInt($("#quantityUpdate"+quantity[1]).val()) -1;
		    if(realQauntity > 0){
            $("#quantityUpdate"+quantity[1]).val(realQauntity);
            var rowID = $("#quantityUpdate"+quantity[1]).data("rowid").valueOf();   
			 /*-----cart update system----*/
				updateqty(rowID,realQauntity);
		     /*-----cart update system----*/	
			}
    });    
});

<!---increment & dcrement js button end---->
<!--cart update script End-->

<!----->
<!----Search products add in cart  script start -->
$(document).on('click','.cartSearchProducts',function(){
	var productsid = $(this).parent().parent().find('.productsdetailsId').val();
	var shopID = $(this).parent().parent().find('.shopID').val();
    //var shopID = $('.shopID').val();// alert(productsid);
	//alert(shopID);
	$(this).html("Added in Cart");
    //alert('123');
    if(productsid !=" "){
         $.ajax({
          url: base_url +"/addCart",
          type:"GET",
          data:{productsid:productsid,shopID:shopID},
          success: function(data){
               //$("#cartResult").html(data);
             if(data=="error"){
                  alert("you are not purchase products in multiple shop at a time...");
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
<!----Search products add in cart  script start -->
<!--products add in cart script start--->
//not working
 $(document).on('click','.cart',function(){
	alert("yes");
	var productsid = $(this).parent().parent().find('.productsdetailsId').val();
    var shopID = $('#shopID').val();// alert(productsid);
	$(this).html("Added in Cart");
    //alert('123');
    if(productsid !=" "){
         $.ajax({
          url: base_url +"/addCart",
          type:"GET",
          data:{productsid:productsid,shopID:shopID},
          success: function(data){
               //$("#cartResult").html(data);
             if(data=="error"){
                  alert("you are not purchase products in multiple shop at a time. You add this item in wish list and after some time you get purchase this item");
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
<!--products add in cart script End--->


<!--products Filteration by price range script start-->
function showProducts(minPrice, maxPrice) {
  $(".productsDiv").hide().filter(function() {
    var price = parseInt($(this).data("price"));
	return price >= minPrice && price <= maxPrice;
  }).show();
}

$(document).ready(function(e) {
    var $priceFrom = $('.price-ranges .from'),
		$priceTo = $('.price-ranges .to');
	$( ".price-range" ).slider({
		range: true,
		min: 0,
		max: 3000,
		values: [ 30, 300 ],
		slide: function( event, ui ) {
			$priceFrom.text( "Rs. " + ui.values[ 0 ] );
			$priceTo.text("Rs. " + ui.values[ 1 ] );
			showProducts(ui.values[0], ui.values[1]);
		}
	});
});
<!--products Filteration by price range script End-->


<!---Wish list to cart Script start--->
$(document).on('click','.wishlisttocart',function(){
     var productsid = $(this).parent().parent().find('.productsID').val();
	 var removieId = $(this).parent().parent().find('.removieId').val();
	 if(productsid !="" || removieId != ""){
	      $.ajax({
			    url:"wishlisttocart",
				type:"GET",
				data:{productsid:productsid,removieId:removieId},
				success:function(data){
                   if(data=="error"){
                     alert("you are not purchase products in multiple shop at a time...");
                    }
                  else{
					  var parsedJson = jQuery.parseJSON(data);
					   if(parsedJson.vStatus==100){
						     $('.qtycartCount').html(parsedJson.cartCount);
							 $("#wishlistRemoveMsg").html(parsedJson.sucess);
							 $('#headerCartDiv').load(document.URL + ' #headerCartDiv');
							 $('#cartRow').load(document.URL + ' #cartRow'); 
							 $('#cartListingItem').load(document.URL + ' #cartListingItem');
							 $('#completeCart').load(document.URL + ' #completeCart');
							 $("#wishrowList").load(document.URL + ' #wishrowList');
						 }
				    }   				 
			    }
			  }); 
	   }
	 else{
	    alert("please try again.");
	  }  
  });  
<!---Wish list to cart Script End--->

<!--cart Address Modal show start--->
$(document).ready(function(e) {
   $(document).on('click','#addAddress',function(){
    $('#userCartAddress').modal('show'); 
   }); 
});
<!--cart Address Modal show End--->

<!-----Confirm Order Script Start------------->
$(document).on('submit',"#orderInform",(function(e) {
	 $('#cartSubmit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#resultCart").html(" ");
	 e.preventDefault();
      $.ajax({
      url: base_url+"/manageCartOrder",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  //$("#resultCart").html(data);
			//alert(data);
		 $('#cartSubmit').html('Place Order').attr('disabled',false);  
	      var errorString  = '';
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus ==700){
		     $('#lastOrederID').val(parsedJson.orderID);
			   $('#orderIDsubmit').click();
			 }
		  else if(parsedJson.vStatus ==400){
			 $.each(parsedJson.error, function(key,value) {
               errorString += "<p style='color:red;'>" + value + "</p>";
              });
			  $('#resultCart').html(errorString);
			}
		  else if(parsedJson.vStatus ==500){
			  $("#resultCart").html("unexpected , try again...");  
			}
		   else if(parsedJson.vStatus ==800){
			 $("#resultCart").html(parsedJson.addressFailed);  
		 }		
	   }	
     });
  }));
<!----Conforim- order Script- End-------> 

<!--User profile otp verify script start-->
$(document).ready(function(e) {
 $(document).on('submit',"#veryfyotp",(function(e) {
	 $('#userotpVerify').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#response").html(" ");
	 e.preventDefault();
      $.ajax({
      url: base_url+"/completeOtpVerify",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  $("userotpVerify").html("Verify").attr('disabled',false);
		  if(data==1){
			 $("#response").html("<p style='color:green;'><strong>Account Verify Successfully .</strong> </p>");
			 setTimeout(function(){ window.location.href="https://kanpurize.com/login" },2000);
			}
		   else{
			 $("#response").html(data);
			}	
		  
	   }	
     });
  }));
});


<!--User profile otp verify script End-->


<!---kanpurizeProfile Profile image save script start--->
$(document).ready(function(e) {
  $(document).on('change','#imageProfile',function(){
    $('#saveimageform').submit();
  });
  
  $(document).on('submit',"#saveimageform",(function(e) {
	  $('#response').html("");
	 e.preventDefault();
      $.ajax({
	  url:base_url+'/saveProfileImage', 	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
	    if(data==1){
		   location.reload();
		  }
		else{
		    alert("Unexpected try again .");
		  }  
		//location.reload();
	   }	
     });
  }));
});

<!---profile upload post script start-->
$(document).ready(function(e) {
 $(document).on('submit',"#profilepostForm",(function(e) {
	 $('#profilepostBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#response").html(" ");
	 var htmlPostcon = $("#profilepostBox").html();
	 var form_data = new FormData(this);
	 form_data.append('htmlPostcon',htmlPostcon);
	 e.preventDefault();
      $.ajax({
      url: base_url+"/profilePostupload",	  
      type: "POST",        
      data: form_data,
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#profilepostBtn').html('Post').attr('disabled',false); 
		$("#response").html(data);
		location.reload()
		//$('#postprofileFetchBox').load(document.URL + ' #postprofileFetchBox'); 
	   }	
     });
  }));
});
<!---pro[file upload post script End-->


<!--Edit -profile upload post script start-->
$(document).ready(function(e) {
 $(document).on('submit',"#editprofilepostForm",(function(e) {
	 $('#editprofilepostBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#imgresponse").html(" ");
	 var htmlPostcon = $("#editprofilepostBox").html();
	 var form_data = new FormData(this);
	 form_data.append('htmlPostcon',htmlPostcon);
	 e.preventDefault();
      $.ajax({
      url: base_url+"/editprofilePostupload",	  
      type: "POST",        
      data: form_data,
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		//alert(data);
		$('#editprofilepostBtn').html('Post').attr('disabled',false); 
		$("#imgresponse").html(data);
		//location.reload()
		//$('#postprofileFetchBox').load(document.URL + ' #postprofileFetchBox'); 
	   }	
     });
  }));
});
<!---pro[file upload post script End-->


<!---kanpurizeProfile Profile image save script End--->

<!---Kanpurize create Profile script start-->
$(document).ready(function(e) {
  <!---Get profile category  script start-->
	 $(document).on('change','#profileType',function(){
	 var profileType = $("#profileType").val();
	 if(profileType == "VIPs"){
	     alert("this profile is not for general users .");
	   }
	 else if(profileType ==" " || profileType == 0) {
	   alert("Please select any one category");
	   $("#profileCategory").html("<option value=''>First You Select Profile Type</option>");
	   $("#pricePlanTextBox").html(" ");
	  }  
	 else{
	      $.ajax({
			    url: base_url+"/getProfileCat",	

				type:"GET",
				data:{profileType:profileType},
				success:function(data){
                  $("#profileCategory").html(data);	
				   $("#pricePlanTextBox").html(" ");	 
			    }
			  }); 
	   }
     });  

   <!---Get profile category  script End-->
   $(document).on('change','#profileCategory',function(){
	 var profileCatType = $("#profileCategory").val(); //alert(profileCatType);
	 if(profileType ==" " || profileType==0) {
	    alert("Please select any one valid category");
	  }  
	 else{
	      $.ajax({
			    url: base_url+"/getProfileCatPrice",	
				type:"GET",
				data:{profileCatType:profileCatType},
				success:function(res){
                  //alert(res);
				  $("#pricePlanTextBox").html(res);		 
			    }
			  }); 
	   }
     });    
});

<!--Single Advertisement Post in Market place Shop -->

<!--Filter Apply Script start-->
 <!--Filtration Slide up and Down Script start-->
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
 <!--Filtration Slide up and Down Script End-->
 
<!-- date validate start-->
 $(document).on('change','#endDate',function(){
	$("#dateErr").html(" ");
	$("#postsubmit").attr('disabled',true);
    var startDate =  new Date($('#startDate').val());
	var endDate = new Date($("#endDate").val());
	if(endDate > startDate){
	    $("#dateErr").html(" ");
	    $("#postsubmit").attr('disabled',false);
	 }
	else{
	   $("#dateErr").html("<span style='color:red;'><strong>Please Select coming soon date .</strong></span>");
	   $("#postsubmit").attr('disabled',true);
	 }  
 });    
<!-- date validate End-->


<!--Single Advertisement Post in Market place Shop -->

