$(document).ready(function(e) {
	
	 /*Embeded code Start*/
	$(document).on('change','.fileUploadForm',function(){
	   var file = $(this).val();
	   var fileExt =  file.split('.').pop();
	   var imgArr = ["jpeg" , "JPEG" , "PNG" , "png" , "jpg" , "JPG"];
	   var fileUploadFormDivCount = $('.mainDivBox').length;
	   if(fileUploadFormDivCount < 5){
		   if( jQuery.inArray(fileExt , imgArr) != "-1" ){
			   $("#uploadPhotobtn").attr("disabled" , false); 	 
			   $(this).next('.extErrResponse').html(" ");
			   
			   var html_content = '<div class="mainDivBox col-sm-4 padding_div">' +
									'<div class="bbxshasdow">'+ 
										'<h2><button type="button" class="crossbutton close" data-dismiss="modal" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button></h2>'+
												'<div class="form-group">'+
													'<div class="col-sm-12">'+
														'<img class="imgup1" src="http://goo.gl/pB9rpQ"/><input type="file" name="work_image[]" class="form-control fileUploadForm" />' +
													 '<span class="extErrResponse"></span>'+	
													'</div> '+
											   '</div> '+
											   '<div class="form-group">'+
													'<div class="col-sm-12">'+
														'<textarea class="characterCountBox form-control" id="photo_title" name="about_photo[]" placeholder="Say Some things to about this photo ?"  data-lenght="100" ></textarea> ' +
													'</div> '+
											   '</div> '+
											'</div>'+
								  '</div> ';
							  
			  $("#workUploadSection").append(html_content);  
			 }
		  else{
			 $(this).next('.extErrResponse').html("<span style='color:red;'>image format is not correct .</span>");
			 $("#uploadPhotobtn").attr("disabled" , true); 
			}
		 }
		else{
		  $("#msgLoad").html('<div class="notice notice-warning"><strong> Note , </strong> You Can Select Maximum 5 Image at a Time. </div>');	
	      $("#vote_talent").modal('show');
	   } 
	 }); 
	 /*Embeded code end*/
	/*Count Character start*/
	$(document).on('keyup','.characterCountBox',function(){
	var character = $(this).val().length;
	var maxLenght = $(this).data('lenght');
    if(character >= maxLenght){
	    $(this).attr('maxlength' , maxLenght);
		alert(maxLenght + " Character is limit .");  
	  }
    }); 
	/*Count Character End*/
	
	/*Character count in textarea start*/
	$(document).on('keyup','.textCount',function(){
     var descriptionCount = $.trim($(".textCount").val()). split(" ");
     var wordCount = descriptionCount.length;
	 var leftWordCount = 100 - wordCount;
	 if(leftWordCount <= 1){
		 $("#responseCount").html("<span style='color:red;'> 100 Character Word sufficient to description .</span>");
	     var characterCount = $('.textCount').val().length;
		 $(".textCount").attr('maxlength' , characterCount );
	   }  
     });
	/*Character count in textarea End*/
	/*--Document Talent Registration success fully start .--*/	
   $(document).on('submit',"#talent_editregisterForm",(function(e) {
	$('#edit_talent').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	$("#editResponse").html(" ");
	e.preventDefault();
      $.ajax({
      url: base_url+"/talent/editRegister_talent",	  
	  type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
		$('#edit_talent').html('<i style="color:#FFF;" class="fa fa-plus"></i> Save').attr('disabled',false);
		var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus == 400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<div class='notice notice-danger'><strong>Wrong , </strong> "+ value + " . </div></p>";
               });
			  $('#editResponse').html(errorString);
		   }
		 if(parsedJson.vStatus == 100){
			 $('#editResponse').html(parsedJson.msg);
			 if(parsedJson.success == 1){
			    $('#editResponse').html(parsedJson.msg);
			   }
		   } 
	   }	
     });
  }));  
 /*--Document Talent Registration success fully End .--*/	

   function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

      var blob = new Blob(byteArrays, {type: contentType});
      return blob;
}
  
  
	/*--Document Talent Registration success fully start .--*/	
   $(document).on('submit',"#talent_registerForm",(function(e) {	
	$('#save_talent').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	$("#someDivToDisplayErrors").html();
	  //var profileImage = $("#profilePic").attr('src');
	  // Split the base64 string in data and contentType
      //var block = profileImage.split(";");
	  // Get the content type of the image
      //var contentType = block[0].split(":")[1];// In this case "image/gif"
      // get the real base64 content of the file
      //var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
	  //var blob = b64toBlob(realData, contentType);
       var formdata = new FormData(this);
	 // formdata.append("profileImage", blob);
	   // formdata.append("talent_profileImage", b64toBlob(profileImage));
	  e.preventDefault();
      $.ajax({
      url: base_url+"/talent/register_talent",	  
	  type: "POST",        
      data: formdata, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data){ 
		//$('#someDivToDisplayErrors').html(data);
		//alert(data);
		$('#save_talent').html('<i style="color:#FFF;" class="fa fa-plus"></i> Save').attr('disabled',false);
		var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus == 400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<div class='notice notice-danger'><strong>Wrong , </strong> "+ value + " . </div></p>";
               });
			  $('#someDivToDisplayErrors').html(errorString);
		   }
		 if(parsedJson.vStatus == 100){
			 $('#someDivToDisplayErrors').html(parsedJson.msg);
			 if(parsedJson.success == 1){
				$("#reset_talent").click();
				setTimeout(function(){ window.location.href = base_url +"/talent/upload_talent_work/"+ parsedJson.inserted_id; }, 500);
				//alert(parsedJson.inserted_id);
				//setTimeOut(function(){ window.location.href = base_url+"/talent/upload_data/"+ parsedJson.inserted_id; } , 500);
			   }
		   } 
	   }	
     });
  }));  
 /*--Document Talent Registration success fully End .--*/	

	/*vote now script start*/
    $(document).on('click','.voteNowBtn',function(){
	 var participantID = this.id;
	 var con  = confirm("Are you sure want to vote");
	 if(con == true){
		 if(participantID != " "){
			 $.ajax({
				url: base_url+"/talentGetAgax/voteForParticipant",
				type:"GET",
				data:{participantID:participantID},
				success: function(data){
				 if(data == "loginfirst"){
					  window.location.href = base_url +"/login?loginfirst";
				   }
				 var parseJson = jQuery.parseJSON(data);
				   if(parseJson.status == 100){
					   $("#msgLoad").html(parseJson.msg);
					   $("#vote_talent").modal('show'); 
					   setTimeout(function(){ location.reload(); }, 2000); 
					 }  
				}
			});
		   }
		 else{
			alert("Some thing Wrong Please try again .")
		   }
	  }
  });  
  /*vote now script End*/
  /*--Document Talent Registration success fully start--*/	
	   $(document).on('submit',"#upload_work",(function(e){
	     $('#uploadPhotobtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
		 $("#photoResponse").html(" ");
		 e.preventDefault();
		 $.ajax({
		   url: base_url+"/talent/upload_photo",
		   type: "POST", 
		   data: new FormData(this),
		   contentType: false ,
		   cache: false,             
	           processData:false,
		   success: function(data){
		     $('#uploadPhotobtn').html('<span class="lnr lnr-upload"></span> Upload').attr('disabled',false);
			 var parseJson = jQuery.parseJSON(data);
			 if(parseJson.vStatus == 100){
			     if(parseJson.success == 1){
				     $('#reset').click();
					 setTimeout(function(){ location.reload() }, 2000)
					 //location.reload();
				   }
				  $("#photoResponse").html(parseJson.msg);
			   }
		   }  	  
		 });
	   })); 
	/*--Document Talent Registration success fully End--*/	
	/*--Document Talent Registration success fully start .--*/	
	   $(document).on('submit',"#youtubeVideoLink",(function(e){
	    $('#uploadVideoLink').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
		 $("#videoResponse").html(" ");
		 e.preventDefault();
		 $.ajax({
		   url: base_url+"/talent/youtubeVideoLink",
		   type: "POST", 
		   data: new FormData(this),
		   contentType: false ,
		   cache: false,             
	       processData:false,
		   success: function(data){
			$('#uploadVideoLink').html('<span class="lnr lnr-upload"></span> Upload').attr('disabled',false);
			 var parseJson = jQuery.parseJSON(data);
			 if(parseJson.vStatus == 200){
			     if(parseJson.success == 1){
				     $('#youtubeReset').click();
					 setTimeout(function(){ $('#ytvideo').load(document.URL + ' #ytvideo'); },500)
					 location.reload();
				   }
				  $("#videoResponse").html(parseJson.msg);
			   }			 
		   }  	  
		 });
	   })); 
	 	/*--Document Talent Registration success fully End .--*/	
		
		
	 /*Remove Embede Code start*/
	  $(document).on('click','.crossbutton',function(e){
		if( $(".crossbutton").length > 1){
			 $(this).parent().parent().remove();
		  } 
	  }); 
     /*Remove Embede Code start*/
	   
	 /*Remove participant  data  script start*/
	 $(document).on('click','.buttondefault',function(){
	 var con = confirm("Are you sure want to Remove");
	 if( con == true){
	 var deleteID = $(this).parent().find('.deleteParticipantData').val();
	 $.ajax({
			url: base_url+"/talentGetAgax/deleteParticipantdata",
			type:"GET",
			data:{deleteID:deleteID},
			success: function(data){
			 if(data == "loginfirst"){
			      window.location.href = base_url +"/login?loginfirst";
			   }
			 var parseJson = jQuery.parseJSON(data);
			   if(parseJson.status == 100){
			       $("#msgLoad").html(parseJson.msg);
			       $("#vote_talent").modal('show'); 
				   if(parseJson.success == 1){
					 setTimeout(function(){ location.reload(); }, 2000); 
					 }
			     }  
			}
	    });
	   }
   }); 
   /*Remove participant  data  Script End*/  
});