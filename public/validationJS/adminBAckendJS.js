$(document).ready(function(e) {
/*get Religion and add cast script start */	
	 var status = "Y";
	 $.ajax({
	  url: agax_url +"/adminAgaxget/getReligion",
	  type:"GET",
	  data:{status:status},
	  dataType:'json',
	  success: function(data){		
		var html_code = '';
		html_code  += '<option hidden="hidden">--Select--Religion--Name--</option>';
		   $.each(data, function (index, value) {
			  html_code += '<option value=" ' + value.id + '">'+ value.religion +'</option>';
			});
	   $("#religion").html(html_code); 
	  }
   });
   /*get Religion and add cast script End*/	
}); 
<!---Get user by Dates script start-->
$(document).ready(function(e){
  $(document).on('click','#fetchUser',function(){
    var firstDate = $(".firstDate").val();
	var lastDate = $(".lastDate").val();
	$.ajax({
	  url: agax_url+"/adminAgaxget/fetchUserbyDate",
	  data:{firstdate:firstDate,lastDate:lastDate},
	  type:"GET",
	  success:function(response){
		  //alert(response);
	     $(".loadUserData").html(response);
	  }
	});
  });
});
<!---Get user by Dates script End-->

<!---Get Mail Details script start-->
 $(document).ready(function(e) {
   $(document).on('click','.mailDetails',function(){
    var userEnquiryID = $(this).parent().parent().find(".usermailID").val();
	 $.ajax({
	    url: base_url+"/getUserEnquiry",
		type:"GET",
		data:{userEnquiryID:userEnquiryID},
		success: function(data){
		  $("#response").html(data);	
		  $("#userEnquiryModal").modal('show');
		}
	 });
   });
});
<!---Get Mail Details script End-->

<!---Delete Event Category Script start--->
$(document).ready(function(e) {
    $(document).on('click','.deleteEventCat',function(){
	  var con = confirm("Are you Sure want to Delete this Event Category");
	  if(con == true){
	  var id = this.id;
	  $.ajax({
      url: base_url+"/deleteEventCategry",
      type: "GET",        
      data: {delid:id},
      success: function(data){
		  $("#response").html(data);
 	   }	
     });
	 }
	});   			
});
<!---Delete Event Category Script start--->

<!---Add Event Category Script start--->
$(document).ready(function(e) {
 $(document).on('submit',"#addEventForm",(function(e) {
	 $('#addEventsubmit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#response").html(" ");
	 var form_data = new FormData(this);
	 e.preventDefault();
      $.ajax({
      url: base_url+"/addEventData",	  
      type: "POST",        
      data: form_data,
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
	   $('#addEventsubmit').html('Add').attr('disabled',false);      
	    var parsedJson = jQuery.parseJSON(data);
	    if(parsedJson.vStatus ==400){
		   $.each(parsedJson.error, function(key,value) {
           errorString += "<p style='color:red;'>" + value + "</p>";
          });
		   $('#response').html(errorString);
		 }
		else if(data==1){
		   $("#response").html("<p style='color:green'><strong>Event Add Successfully .</strong></p>.");
		   $("#resetEvent").click();
		 } 
		 else{
		    $("#response").html(data);
		 }
	   }	
     });
  }));
});

<!---Add Event Category Script End--->

<!--Edit Event script start-->
$(document).ready(function(e) {
  $(document).on('submit',"#editEventForm",(function(e) {
	 //$('#editEventsubmit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#response").html(" ");
	 e.preventDefault();
      $.ajax({
      url: base_url+"/editEventData",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  alert(data);
	   //$('#editEventsubmit').html('Add').attr('disabled',false);      
	    var parsedJson = jQuery.parseJSON(data);
	    if(parsedJson.vStatus ==400){
		   $.each(parsedJson.error, function(key,value) {
           errorString += "<p style='color:red;'>" + value + "</p>";
          });
		   $('#response').html(errorString);
		 }
		else if(data==1){
		   $("#response").html("<p style='color:green'><strong>Event Add Successfully .</strong></p>.");
		   $("#resetEvent").click();
		 } 
		 else{
		    $("#response").html(data);
		 }
	   }	
     });
  }));    
});
<!--Edit Event script End-->
