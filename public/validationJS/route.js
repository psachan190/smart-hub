function section_changeurl(url , getUrlSourceID , receiverPoint){
   var new_url = base_url +"/" + url;
   //alert(new_url);
   window.history.pushState("data" ,"Title", new_url);
   $("#"+receiverPoint).load(new_url+" #"+receiverPoint);
    /*$("#"+receiverPoint).load("http://127.0.0.1:8000/talent/upcoming_talent #loadTalentSection", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            alert(responseTxt);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
});  */
 }

$(document).ready(function(e) {
  /*Current talent section load in talent Page script start*/ 
  $("#loadTalentSection").load(base_url+"/talent/current_talent #loadTalentSection", function(responseTxt, statusTxt, xhr){
	    if(statusTxt == "success")
			//alert("External content loaded successfully!");
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    }); 
 /*Current talent section load in talent Page script End*/
});