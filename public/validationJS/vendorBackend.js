<!--manaage price range for products script start-->
$(document).ready(function(e) { 
 /*check products sales price is not greater than listing price script start*/
   $(document).on('keyup','#salePrice',function(){
     var pSalePrice = $('#salePrice').val();
	 var listPrice = $("#listprice").val();
	 if(parseInt(pSalePrice) > parseInt(listPrice)){
	    alert("products total price is not greater than products MRP. rate");
		$('#totalPrice').attr("readonly",true).val("");
	   }
	 else{
	     $('#totalPrice').val(pSalePrice);
	   }  
   });
  /*check products sales price is not greater than listing price script start*/
  /*check products sales price is not greater than listing price script start*/
   $(document).on('click','#withGstyes',function(){
    var salePrize = $('#salePrice').val();
	$('#totalPrice').val(salePrize);
   }); 
  /*check products sales price is not greater than listing price script start*/
  /*with GST no biutton on click Sscript start*/
  $(document).on('click','#withGstNo',function(){
    var salePrize = $('#salePrice').val();
	var gstPercentage = $('#gstRate').val();
	 if(gstPercentage != "hidden"){
		  var percentageValue = (salePrize*gstPercentage)/100;
		   var totalProductsPrice = parseInt(salePrize) + parseInt(percentageValue);
		   if(totalProductsPrice > $('#listprice').val()){
			   alert("products total price is not greater than products MRP. rate");
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
  /*with GST no biutton on click Sscript End*/
  
  /*--Products price calculate on gst percentage change start--*/
  $(document).on('change','#gstRate',function(){
      var salePrize = $('#salePrice').val(); 
      if($('#withGstyes').is(':checked')){
	     $('#totalPrice').val(salePrize);
	  }
	  else{
	    var gstRate = $('#gstRate').val(); //alert(gstRate);
		var percentageValue = (salePrize*gstRate)/100;
		 var totalProductsPrice = parseFloat(salePrize) + parseFloat(percentageValue); 
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
/*--Products price calculate on gst percentage change End--*/

});
<!--manaage price range for products script start-->


/*--Products Stock quantity mange start script--*/
$(document).ready(function(e) {
 $(document).on('keyup','#quantity',function(){
    $('#quantityErr').html(" ");
    var stockWarning = parseInt($('#stockWarning').val());
	var quantity = parseInt($('#quantity').val());
	if(quantity !=''){
        if(stockWarning >= quantity){
		     $('#quantityErr').html("<p style='color:red;'><strong>Stock Quantity also must be less then products Quantity .</strong></p>");
			$("#submit").attr('disabled',true);
		  } 
		else{
			 $('#quantityErr').html(" ");
			 $("#submit").attr('disabled',false);
		  }  
	  }
	else{
	    $('#quantityErr').html("<p style='color:red;'><strong> Please Enter the Products Stock Quantity .</strong></p>");
		  $("#submit").attr('disabled',true);	
	  }  
 });    
});

/*Products Stock quantity manage */
$(document).ready(function(e) {
 $(document).on('keyup','#stockWarning',function(){
    $('#stockwarningErr').html(" ");
    var stockWarning = parseInt($('#stockWarning').val());
	var quantity = parseInt($('#quantity').val());
	if(quantity !=''){
        if(stockWarning >= quantity){
		     $('#stockwarningErr').html("<p style='color:red;'><strong>Stock Quantity also must be less then products Quantity .</strong></p>");
			$("#submit").attr('disabled',true);
		  } 
		else{
			 $('#stockwarningErr').html(" ");
			 $("#submit").attr('disabled',false);
		  }  
	  }
	else{
	    $('#stockwarningErr').html("<p style='color:red;'><strong> Please Enter the Products Quantity</strong></p>");
		  $("#submit").attr('disabled',true);	
	  }  
 });    
});
/*--Products Stock quantity mange start End--*/





$(document).ready(function(e) {
<!----payment-modal script start----->
 $(document).on('click','.addAuthority',function(){
    $('#venderAddressone').modal('show'); 
 });
 $(document).on('click','.close',function(){
   $('#venderAddressone').modal('hide');
 });
<!--payment modal script End--->

<!--Paymrnt accepted form submit script start---->
  $(document).on('submit',"#settingForm",(function(e) {
	 $('#paymentModebtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	  e.preventDefault();
      $.ajax({
      url:base_url+'/vendorAgax/setPaymentMode',
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 $('#paymentModebtn').html('<i class="glyphicon glyphicon-plus"></i> Save').attr('disabled',false); 
		  $('#result').html("<p style='color:green;'><strong>" + data + "</strong></p>");
	   }	
     });
  }));
 <!--Paymrnt accepted form submit script start---->
 /*--selected script start--*/
    var firstpaymentMode = $("#paymentModefirst").val();
	var secondpaymentMode = $("#paymentModesecond").val();
	var thirdpaymentMode = $("#paymentModethird").val();
	var fourthpaymentMode = $("#paymentModefourth").val();
	//alert(fourthpaymentMode);
	if(firstpaymentMode != ""){ $("#paymentMode1").attr("checked",true); }
	 else{ $("#paymentMode1").attr("checked",false); } 
	if(secondpaymentMode != ""){ $("#paymentMode2").attr("checked",true); }
	 else{ $("#paymentMode2").attr("checked",false); } 
	if(thirdpaymentMode != ""){ $("#paymentMode3").attr("checked",true); }
	 else{ $("#paymentMode3").attr("checked",false); } 
	if(fourthpaymentMode != ""){ $("#paymentMode4").attr("checked",true); }
	else{ $("#paymentMode4").attr("checked",false); } 
 /*--selected script start--*/
 
 <!--Vendor Bank click button script start--->
  $(document).on('click','#bankDetails',function(){
    alert("this option is not Required");
  }); 
  $(document).on('click','.appOpen',function(){
    alert("Please Complete your Business Profile , Payment to Proceed. ");
  });  
 <!--Vendor Bank click button script End--->
 
 
 <!--Shop Banner Image script start--->
 $(document).on('submit',"#bannerImageForm",(function(e) {
	  $('#someDivToDisplayErrors').html("");
	  $('#uploadBannerImage').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	 e.preventDefault();
      $.ajax({
	  url:base_url+'/vendorAgax/shopBannerImage', 
	  //url:base_url+'/shopBannerImage', 	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#uploadBannerImage').html('<i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload').attr('disabled',false);
		var errorString = '';
		var successString = "";
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		  else if(parsedJson.vStatus==700){
		     $('#someDivToDisplayErrors').html(parsedJson.success);
			 $('#listGroup').load(document.URL + ' #listGroup');
		   } 
		  else if(parsedJson.vStatus==500){
		     $('#someDivToDisplayErrors').html(parsedJson.success);
		   } 
	   }	
     });
  }));
  <!--Shop Banner Image script End--->
  
  <!---Shop Profile Image Script start-->
  $(document).on('submit',"#fronShopimageform",(function(e) {
	$('#saveImage').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	 $('#uploadResult').html(" ");
	  e.preventDefault();
      $.ajax({
      url:base_url+'/vendorAgax/shoplogoImage',   
	  type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){
		 $('#saveImage').html('Save').attr('disabled',false);
		 $('#uploadResult').html("<p'>"+ data +"</p>");
		 $('#saveImage').attr('disabled',false);
		 $('#shopdes').load(document.URL + ' #shopdes');
		 $('#statusBox').load(document.URL + ' #statusBox');
		 $('#storeBlog').load(document.URL + ' #storeBlog');
	  }	
     });
  }));
 <!---Shop Profile Image Script End--> 
 
 <!--------business details form submit--start---->
 $(document).on('submit',"#businessDetailForms",(function(e) {
	$('#uploadBusinessResult').html("");
	$('#saveBusinessDetails').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	  e.preventDefault();
      $.ajax({
      url:base_url+'/vendorAgax/vBusinessDetails', 	
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){
		$('#saveBusinessDetails').html('<i class="glyphicon glyphicon-plus"></i>&nbsp;Save').attr('disabled',false);
		var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
              $('#uploadBusinessResult').html(errorString);
		   }
		 else if(parsedJson.vStatus==200){
			  $('#uploadBusinessResult').html(parsedJson.success);
		   }
		 else if(parsedJson.vStatus==300){
			  $('#uploadBusinessResult').html(parsedJson.fail);
		   } 
		 else if(parsedJson.vStatus==100){
			  $('#uploadBusinessResult').html(parsedJson.msg);
		   }   
		$('#statusBox').load(document.URL + ' #statusBox');
		$('#storeBlog').load(document.URL + ' #storeBlog');
	  }	
     });
  }));
 <!-------business- details Form Submit End----------> 
 
 <!--Gst Checkbox related script start-->
 $(".my-check").change(function() {
    var gstNumbersave = document.getElementById('gstNumber').value;
	var gstProvisionalIDsave = document.getElementById('gstProvisionalID').value;
	if ( $(this).is(':checked') ) {
        $(".my-box").slideUp();
		$("#gstNumber").val("");
		$("#gstProvisionalID").val("");
    } else {
        $(".my-box").slideDown();
    }
  });
 <!--Gst Checkbox related script End-->
   
   <!---Change Category add products time script start---->
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
                url:base_url+'/changeSubcategory', 	
				data:{categoryId:categoryId,shopID:vendordetails_id},
                success:function(res){
					//console.log(res);
				 $('#subCategory').html(res);
				}
          });
      $.ajax({
                type:'GET',
                url:base_url+'/getAttribue', 	
			    data:{categoryId:categoryId,shopID:vendordetails_id},
                success:function(res){
          //console.log(res);
         $('#attribute').html(res);
        }
          });
	  }   
  });  
   <!---Change Category add products time script End---->
   
});


$(document).ready(function(e) {
   <!---Auto comlete-text box script start-->
   src = base_url+'/searchajax'; 	
     $("#search_text").autocomplete({
        source: function(request, response) {
		    $.ajax({
                url: src,
                dataType:"json",
                data: { term:request.term },
                success: function(data) {
                   response(data);
                }
            });
        },
        minLength: 3,
    });
  <!---Auto comlete-text box script start-->
});

$(document).ready(function() {
 
  <!---Gst Rate calculation in add products script start-->
  $(document).on('change','#gstRate',function(){
	  var salePrize = $('#salePrice').val(); //alert(salePrize);
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
 <!---Gst Rate calculation in add products script start-->
  
  <!---vendor Post Ads Script start-->
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
  <!---vendor Post Ads Script End-->

 <!-- date validate start-vendor post Ads->
 $(document).on('change','#endDate',function(){
	$("#dateErr").html(" ");
	$("#savePost").attr('disabled',true);
    var startDate =  new Date($('#startDate').val());
	var endDate = new Date($("#endDate").val());
	if(endDate > startDate){
	    $("#dateErr").html(" ");
	    $("#savePost").attr('disabled',false);
	 }
	else{
	   $("#dateErr").html("<span style='color:red;'><strong>Please Select coming soon date .</strong></span>");
	   $("#postsubmit").attr('disabled',true);
	 }  
 });    
<!-- date validate End-->

<!-- Age validate Start-->
$(document).on('change','#ageTo',function(){
	alert("yes");
	$("#ageErr").html(" ");
	$("#savePost").attr('disabled',true);
   var ageTo = parseInt($('#ageTo').val());
   var ageFrom = parseInt($("#ageFrom").val());
   if(ageTo <= ageFrom){
	   $("#ageErr").html("<span style='color:red;'><strong>Please Select Valid age</strong></span>");
	   $("#savePost").attr('disabled',true);
	 } 
   else{
	   $("#ageErr").html(" ");
	   $("#savePost").attr('disabled',false); 
	 }	 
});
<!-- Age validate End-->
  
  <!--Add vendor Advertisement post Ads Script start--->
  $(document).on('submit',"#adsfronShopimageform",(function(e) {
	  $('#postResult').html(" ");
	  $('#savePost').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	  e.preventDefault();
      $.ajax({
	  url: base_url+"/adsPostVendor",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  //alert(data);
		 $('#postResult').html(data);
		 $('#savePost').html('&nbsp;Post').attr('disabled',false); 
		 var errorString = '';
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function(key,value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#postResult').html(errorString);
		   }
		  else if(parsedJson.vStatus==500){
			  $('#postResult').html(parsedJson.success);
			  location.reload();
		    } 
		  else{
		     $('#postResult').html(parsedJson.error); 
		  } 
	   }	
     });
  }));
 <!--Add vendor post Ads Script End--->
 
 <!---Edit vendor page script start->
   <!---Check filterartion is active or not script start-->
    var filterationCopy = $("#filtrationCopy").val();
		 if(filterationCopy=="yes"){
			 $("#filtration").attr('checked',true);
			 $("#filtrationBlog").show();
		   } 
		<!--gender checked in edit post data start-->
		var filterationCopy = $("#genderCopy").val();
		$("#"+ filterationCopy).attr('checked',true);
   <!---Check filterartion is active or not script End-->
   
   
 <!--gender checked in edit post data End-->
 
 <!----Offer and news insert Script start--->
  $(document).on('submit',"#offerNewsForm",(function(e) {
	$('#saveNews').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      //url: "<?php echo url("kanpurizeSaveNews"); ?>",
      url: base_url+"/kanpurizeSaveNews",	  
	  type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
	    $('#someDivToDisplayErrors').html(data);
		$('#saveNews').html('<i style="color:#FFF;" class="fa fa-plus"></i> Save News').attr('disabled',false);
	    var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		 if(parsedJson.vStatus==500){
			  $('#someDivToDisplayErrors').html("<span style='color:red;'>" + parsedJson.success + "</span>");
			   $('#sidebarRef').load(document.URL + ' #sidebarRef');
		   } 
	   }	
     });
  }));
   <!----Offer and news insert Script start--->
});

<!--upload gallery image script start-->
$(document).ready(function(e) {
   $(document).on('click','#addGallery',function(){
    $('#addGalleryImage').modal('show'); 
   }); 
});
$(document).ready(function(e) {
  $(document).on('submit',"#uploadImage",(function(e) {
	$("#resultDeclare").html("");
	$("#uploadResult").html(""); 
	$('#savePost').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	e.preventDefault();
      $.ajax({
      url: base_url+"/uploadGalleryImage",	  
	  type: "POST",        
      data: new FormData(this),
      contentType: false,      
      cache: false,            
      processData:false,       
      success: function(data){ 
	   $('#savePost').html('<i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload Image ').attr('disabled',false);
	   $("#resultDeclare").html(data);
	   location.reload();
	  }	
     });
  }));
});

<!--upload gallery image script start-->

<!--Pick up and Delivery timing script start -->
$(document).ready(function(e) {
  $(document).on('submit',"#deliveryAndPickupForm",(function(e) {
	  $('#someDivToDisplayErrors').html("");
	  $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	 //$('#adrsresult').html("");
	  e.preventDefault();
      $.ajax({
      url: base_url+"/deliveryAndPickupPost",	
	  //url: "<?php echo url("deliveryAndPickupPost"); ?>",
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Save').attr('disabled',false);
		  if(data=="success"){
			  $("#someDivToDisplayErrors").html("<span style='color:green;'><strong>Record Add Successfully</strong></span>");
		      location.reload();
			}
		  else if(data=="failes"){
			   $("#someDivToDisplayErrors").html("<span style='color:red;'><strong>Unexpected try again .</strong></span>");
			}	
		  else{
			 $("#someDivToDisplayErrors").html("<span style='color:red;'><strong>"+ data +"</strong></span>");
			}	
 	   }	
     });
  }));
});
<!--Pick up and Delivery timing script End -->
<!--Delivery and pick date timing Delete script start-->
$(document).ready(function(e) {
    $(document).on('click','.deleteDaySchedule',function(){
	  var con = confirm("Are you Sure want to remove this Schedule");
	  if(con == true){
	  var id = $(this).parent().parent().find(".deliveryDay").val();
	  $.ajax({
      url: base_url+"/deleteTimeSchedule",	
	  //url: "<?php echo url("deleteTimeSchedule"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
         alert(data);
		 location.reload();
 	   }	
     });
	 }
	});   			
});
<!--Delivery and pick date timing Delete script End-->

<!--Mannage--Products price special Chaarcter tables-->
 
<!--Mannage--Products price special Chaarcter tables-->






