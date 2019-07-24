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

<!--cart update script start-->
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
		  var rowID = $("#quantityUpdate"+quantity[1]).data("rowid").valueOf();  
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

<!--products add in wish list script start-->
$(document).on('click','.wishList',function(){
    var productId = $(this).parent().parent().parent('.productBox').find('.productsdetailsId').val();
	   //alert(productId);
	   //var wishListbtn = $(this).html();
	    $(this).html("<i style='color:red;' class='fa fa-heart'></i>");
	  if(productId != " "){
	      $.ajax({
          url: base_url +"/addtoWishList",
          type:"GET",
          data:{productId:productId},
          success: function(data){
            alert(data);
		   }
       });
	   }
	 else{
	     alert("unexpected , try again..");
	   }  
  });  
<!--products add in wish list script End-->

<!--products add in cart script start--->
 $(document).on('click','.cart',function(){
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

<!-----Confirm Address Script Start------------->	
  $(document).on('submit',"#userCartaddressForm",(function(e) {
	 $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 e.preventDefault();
      $.ajax({
	  url: base_url+"/userCartaddressForm",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Save').attr('disabled',false); 
		 var errorString = '';
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function(key,value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#addressResult').html(errorString);
		   }
		  else if(parsedJson.vStatus==700){
			  $('#addressResult').html(parsedJson.success);
			   $('#addressBlog').load(document.URL + ' #addressBlog'); 
		    } 
		  else{
		     $('#addressResult').html(parsedJson.failed); 
		  }
	   }	
     });
 <!-----Confirm Address Script End------------->
 }));
