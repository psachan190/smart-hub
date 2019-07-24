$(document).ready(function(e) {
<!--Education_Details_add_script start--> 
    $(document).on('submit',"#educationDetailsForm",(function(e) {
	 $("#educationDetailsResponse").html(" ");
	 $('#educationSavebtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $('#educationResponse').html(" ")
	 e.preventDefault();
      $.ajax({
      url: base_url+"/matrimonial/educationDetails",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#educationSavebtn').html('Save').attr('disabled',false); 
		$("#educationDetailsResponse").html(data);
		setTimeout(function(){ $('#educationDetailsDiv').load(document.URL + ' #educationDetailsDiv'); } , 1000);
		//alert(data);
		//$('#personalResponse').html(data)
	   }	
     });
  }));
  <!--Education_Details_add_script End--> 
<!---Mat_Personal_prodfile_details_edit-script start-->
  $(document).on('submit',"#matPersonal_profile_form",(function(e) {
	$('#personalDetails_submit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	$('#personalDetailsResponse').html(" ")
	 e.preventDefault();
      $.ajax({
      url: base_url+"/matrimonial/mat_personal_profile",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#personalDetails_submit').html('Save').attr('disabled',false);   
		$('#personalDetailsResponse').html(data)
	   }	
     });
  }));
  <!---Mat_Personal_prodfile_details_edit-script End-->
  
	/*Get cast ny religion name script start*/
	$(document).on('change','#religion',function(){
		var religion = $("#religion").val();
		  $.ajax({
		  url: base_url +"/matrimonialAjax/getCast",
		  type:"GET",
		  data:{religion:religion},
		  success: function(data){
			var parseJson = jQuery.parseJSON(data);
			var html_code = '';
			if(parseJson.status == 200){
			    $("#religion_caste").html( '<option value="0">Cast Not found</option>'); 
			  }
			if(parseJson.status == 100){
				$.each(parseJson.cast, function (index, value) {
				   html_code += '<option value=" ' + value.id + '/'+ value.cast +'">'+ value.cast +'</option>';
				});
				$("#religion_caste").html(html_code); 
			  }
		  }
		 });
	});
	
	/*Get cast ny religion name script End*/
	/*--Select Matrimonial Profile Religion script Start--*/
	var status = "Y";
	 $.ajax({
	  url: base_url +"/adminAgaxget/getReligion",
	  type:"GET",
	  data:{status:status},
	  dataType:'json',
	  success: function(data){
		var html_code = '';
		html_code  += '<option hidden="hidden">--Select--Religion--Name--</option>';
		   $.each(data, function (index, value) {
			  html_code += '<option value=" ' + value.id + '/'+ value.religion +'">'+ value.religion +'</option>';
			});
	   $("#religion").html(html_code); 
	  }
   });
   	/*--Select Matrimonial Profile Religion script End--*/
	/*Select -- Creat for and select gender in script start*/
  function selectGender(createFor){
		  if(createFor == 1 || createFor==6 ){
		      $("#male").attr('checked',false);
			   $("#female").attr('checked',false); 
			  $("#genderBlock").show();
			}
		 else if(createFor==3 || createFor==5){
			 $("#genderBlock").hide();
			 $("#female").attr('checked',true);
			 $("#male").attr('checked',false);
			}
	      else if(createFor==2 || createFor==4){
			   $("#genderBlock").hide();
			   $("#male").attr('checked',true);
			   $("#female").attr('checked',false); 
			 }
		}
$(document).on('change','#createForprofile',function(){
		var createFor = $("#createForprofile").val();
		if(createFor == 1){
			selectGender(createFor);	
				$.ajax({
				url: base_url +"/matrimonialAjax/getUserDetails",
				type:"GET",
				data:{createFor:createFor},
				  success: function(data){
					var parseJson = jQuery.parseJSON(data);  
					$("#profileName").val(parseJson.name + " "+ parseJson.lname );
					$("#DateofBirth").val(parseJson.birthday);	
					if(parseJson.sex == "M"){
					    $("#male").click();
					  }			
					if(parseJson.sex == "F"){
					     $("#female").click();
					  }
				  }
			   });  
			 }
			else{
				$("#profileName").val(" ");
				$("#DateofBirth").val(" ");	
				selectGender(createFor);	
			} 		
	   })
	 /*Select -- Creat for and select gender in script End*/
 
 <!--Mat_about_profile_script start-->	
  $(document).on('click','#saveAbout_profidleBtn',function(){
    $('#aboutResponse').html(" ")
	$('#saveAbout_profidleBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);	   
	var mat_id = $('#mat_id').val();
	var aboutProfle = $('#about_profile').val();
	if(mat_id != " "){
	   $.ajax({
	      url: base_url+"/matrimonialAjax/about_mat_profile",
		  type:"GET",
		  data:{mat_id:mat_id,aboutProfle:aboutProfle},
		  success: function(data){
		   $('#saveAbout_profidleBtn').html('Save').attr('disabled',false);	  
		   $('#aboutResponse').html(data)
		   $("#matProfileaboutData").html(aboutProfle);
		  }
	   });
	 }
	else{
	   alert("unexpected Try again...")
	 }  
  });
  <!--Mat_about_profile_script End-->
   <!--Mat_family_profileScript start--> 
    $(document).on('submit',"#familyDetailsForm",(function(e) {
	$('#family_details_btn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);	    $('#family_details_response').html(" ")
	 e.preventDefault();
      $.ajax({
      url: base_url+"/matrimonial/family_details",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
	    $('#family_details_btn').html('Save').attr('disabled',false);	
		$("#family_details_response").html(data);
		setTimeout(function(){ $('#familyDetailsDiv').load(document.URL + ' #familyDetailsDiv'); } , 1000);
		//$('#personalResponse').html(data)
	   }	
     });
  }));
  <!--Mat_family_profileScript start-->
});

$(document).ready(function(e) {
<!--Get state Api script start-->	
var status = "Y";		
$.ajax({
	  url:base_url +"/knpApi/country",
	  type:"GET",
	  data:{status:status},
	  dataType:'json',
	  success: function(data){
		var html_code = ' ';
		   html_code += '<option value=0>--Select--Country--</option>';
		   $.each(data, function (index, value) {
			  html_code += '<option value="'+ value.id +"/"+ value.name +'">'+ value.name+'</option>';
			});
		 $("#country").html(html_code);
	  }
   });
 <!--Get state Api script End-->   
 <!--Get_getCity_script_start--> 
  $(document).on('change','#state',function(){
	var state = $('#state').val();
	if(state != 0){
	   $.ajax({
	      url: base_url +"/matrimonialAjax/getCity",	  
		  type:"GET",
		  data:{state:state},
		  dataType:'json',
		  success: function(data){
			   var html_code = ' ';
			   html_code += '<option value=0>--Select--City--</option>';
			   $.each(data, function (index, value) {
               	 html_code += '<option value="'+ value.id +"/"+ value.name +'">'+ value.name+'</option>';
                });
		       $("#city").html(html_code);
		  }
	   });
	 }
	else{
	   alert("Please Select Valid State ! .")
	 }  
  });   
  <!--Get_getCity_script_End--> 
   <!--Get_State_script_start--> 
   $(document).on('change','#country',function(){
	var country = $('#country').val();
	if(country != 0){
	   $.ajax({
		  url: base_url +"/matrimonialAjax/getState",	   
		  type:"GET",
		  data:{country:country},
		  dataType:'json',
		  success: function(data){
			var html_code = ' ';
			   html_code += '<option value=0>--Select--State--</option>';
			   $.each(data, function (index, value) {
               	  html_code += '<option value="'+ value.id +"/"+ value.name +'">'+ value.name+'</option>';
                });
		      $("#state").html(html_code);
		  }
	   });
	 }
	else{
	   alert("Please Select Valid Country ! .")
	 }  
  });   
  <!--Get_State_script_End-->    
});

