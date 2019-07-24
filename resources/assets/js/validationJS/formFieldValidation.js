<!--Validation start--->

/*----NAME  VALIDATE-start---*/
  function checkCharacter(value,elementName,errMsgElement,disableElement){
	  document.getElementById(errMsgElement).innerHTML = " "; 
	  var nameFix = /^[A-z ]+$/;
	  if(value != ""){
		  if(value.match(nameFix)) {
		     document.getElementById(errMsgElement).innerHTML = " ";
			 document.getElementById(disableElement).disabled = false;
		     return true;
		    }
		  else{
			 document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'>"+ elementName +" field is contain only Character .</span>";;
			 document.getElementById(disableElement).disabled = true;
			 return false;
		   } 
		}
	  else{
		  document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'>"+ elementName +" field is Required</span>"; 
		   document.getElementById(disableElement).disabled = true;
		  return false;
		} 	
	}
/*----NAME  VALIDATE-- End--*/

<!--Mobile number checker and Validate start-->	
function mobileNumberValidate(value,elementName,errMsgElement,disableElement){
	//alert(value);
  document.getElementById(errMsgElement).innerHTML = " ";
  var phoneno = /^\d{10}$/;
  if(value != ""){
	  if(value.match(phoneno)) {
		 document.getElementById(errMsgElement).innerHTML = " ";
		 document.getElementById(disableElement).disabled = false;
		 return true;
		}
	  else{
		 document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'>Invalid "+ elementName +" Number.</span>";;
	     document.getElementById(disableElement).disabled = true;
		 return false;
	   }
  }
  else{
     document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'>"+ elementName +" Number is required.</span>";
     document.getElementById(disableElement).disabled = true;
	 return false;
  }
}
<!--Mobile number checker and Validate End-->	
<!--Email   number checker and Validate start-->	
function emailValidate(value,elementName,errMsgElement,disableElement){
   document.getElementById(errMsgElement).innerHTML = " ";
   var emailFix = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(value != ""){
		  if(emailFix.test(value)) {
		     document.getElementById(errMsgElement).innerHTML = " ";
		     document.getElementById(disableElement).disabled = false;
		     return true; 
			}
		  else{
			 document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'>You have entered an invalid "+ elementName +" address.</span>";
			 document.getElementById(disableElement).disabled = true;
			 return false;
		   } 
		}
	  else{
		  document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'>"+ elementName +" field is Required</span>"; 
		  document.getElementById(disableElement).disabled = true;
		  return false;
		} 	 
 }
<!--Email   number checker and Validate End-->
<!--validation End--->

<!---pincode validation from all website in --start--->
 function pincodeValidateBackend(pincodevalue,elementName,errMsgElement,disableElement){
   document.getElementById(errMsgElement).innerHTML = " ";
    var pinCodeNo = /^\d{6}$/;
	 if(pincodevalue != ""){
		if(pincodevalue.match(pinCodeNo)) {
		   $.ajax({
	         url:base_url+'/checkpinCodeValidation',
		     type:"GET",
		     data:{pincodevalue:pincodevalue},
		     success: function(data){
			    if(data==1){
				    document.getElementById(errMsgElement).innerHTML = " ";
					document.getElementById(disableElement).disabled = false;
				  }
				else{
				    document.getElementById(errMsgElement).innerHTML = data;
					document.getElementById(disableElement).disabled = true;
				  }   
		     }
	        });
		   document.getElementById(errMsgElement).innerHTML = " ";
		   document.getElementById(disableElement).disabled = false;
		 }
		else{
		  document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong>Invalid Pin Code Number.</strong></span>";
			 document.getElementById(disableElement).disabled = true;
		   }
	  }
	  else{
		 document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong>Pin Code Number is Reqired.</strong></span>";
		 document.getElementById(disableElement).disabled = true;
	  }
 }
<!---pincode validation from all website in --End--->

<!--validate maximum caharacter lenght validation start---->
function maxCharacterLenght(value,elementName,errMsgElement,maxtextLenght){
    var textLenght = value.length;
	var saveCharcterlenght = maxtextLenght - textLenght;
	 if(saveCharcterlenght < 1){
		document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong>" + elementName +" maximum 100 Character  .</strong></span>";
	  }
	 else{
        document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong> "+ saveCharcterlenght +" Character Remaining .</strong></span>";
	 }
 }
<!--validate maximum caharacter lenght validation End---->

<!--check alpha numeric value validation start-->
function checkAlphaNumeric(value,elementName,errMsgElement,hideElement,textlenght){
     regexp = /^[A-Za-z0-9]+$/;
     if(value != ""){
	   if(regexp.test(value)){
		  if(value.length < textlenght){
			   document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong> " + elementName  +" at teast "+ textlenght + " .</strong></span>";
	           document.getElementById(hideElement).disabled = true;
			}
		   else{
			  document.getElementById(errMsgElement).innerHTML = " ";
			}	 
         }
       else{
         document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong> " + elementName  +" only contain alpha numeric value  .</strong></span>";
	     document.getElementById(hideElement).disabled = true;
         }
	  }
   else{
	   document.getElementById(errMsgElement).innerHTML = "<span style='color:red;'><strong> " + elementName  +" field is required . .</strong></span>";
	   document.getElementById(hideElement).disabled = true;
	  }	 
}
<!--check alpha numeric value validation End-->

function imageExtValidation(fileValue,fieldName,extArr,hideElement,msgErrelement){
   var file = fileValue.toLowerCase();
   var extension = file.substring(file.lastIndexOf('.') + 1); //alert(extArr);
    if($.inArray(extension, extArr) > -1) {
          document.getElementById(msgErrelement).innerHTML = " ";  
		  document.getElementById(hideElement).disabled = false;
       }
    else{
       document.getElementById(msgErrelement).innerHTML = "<span style='color:red;'><strong> " + fieldName  +" only support png , jpeg , jpg extension format .</strong></span>";  
		  document.getElementById(hideElement).disabled = true;
     }
}


<!--Date time Calender add script start-->
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
<!--Date time Calender add script start-->

<!---Select payment type calendor start-->
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
<!---Select payment type calendor End-->


<!--About business Character limitation start-->
 function checkCharacterLimit(textValue,fieldName,msgErrelement,maxlenght){
	 var textLenght = textValue.length;
	  var saveCharcterlenght = maxlenght - textLenght;
		if(saveCharcterlenght < 1){
		  document.getElementById(msgErrelement).innerHTML = "<span style='color:red;'>" + fieldName  +" maximum "+ maxlenght +" Character .</span>";  
		}
		else{
		   document.getElementById(msgErrelement).innerHTML = "<span style='color:red;'> " + saveCharcterlenght  +" Character Remaining .</span>";
		}
 
 }
<!--About business Character limitation start-->	 
	 
	 
	 