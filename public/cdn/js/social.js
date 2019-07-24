$(document).on('change',"#thumbnail",(function(e) {
    	$("#coverImageForm").submit();
}));
$(document).on('change',"#profile",(function(e) {
	$("#profileImageForm").submit();
}));
$(document).on('submit',"#coverImageForm",(function(e) {
      	e.preventDefault();
      	$('.lds-ring').css({"display":"block"});
      	$.ajax({
      	url: "https://www.kanpurize.com/social/action/cover_image",	  
      	type: "POST",        
      	data: new FormData(this),
      	contentType: false,
      	cache: false,
      	processData:false,  
      	success: function(data){
	   	$('#cover_image').attr('src', "https://www.kanpurize.com/public/storage/" + data);
	   	$('.lds-ring').css({"display":"none"});
	  }	
     	});
}));
$(document).on('submit',"#profileImageForm",(function(e) {
      	e.preventDefault();
      	$('.lds-ring').css({"display":"block"});
      	$.ajax({
	      	url: "https://www.kanpurize.com/social/action/profile_image",	  
	      	type: "POST",        
	      	data: new FormData(this),
	      	contentType: false,
	      	cache: false,
	      	processData:false,  
	      	success: function(data){
		   	$('#profile_image').attr('src', "https://www.kanpurize.com/public/storage/" + data);
		   	$('.lds-ring').css({"display":"none"});
		  }
     	});
}));
/* Profile page tabs */
$('.prof-tab').click(function (e) { 
	e.preventDefault();
	$('.tab-content').load($(this).attr('href'));
});
/* Profile page tabs End */
/* New post */
$('.content-raw').keyup(function () {
	var content = $(this).val().replace(/\n/g, "<br/>");
	$('.contentor').val(content);
});
$(document).on('submit',".new-post",(function(e) {
      	e.preventDefault();
      	$('.lds-ring').css({"display":"block"});
      	$.ajax({
      	url: "https://www.kanpurize.com/social/action/new_post",	  
      	type: "POST",        
      	data: new FormData(this),
      	contentType: false,
      	cache: false,
      	processData:false,  
      	success: function(data){
      		$('textarea').val('');
      		$('input').val('');
		$('#posts').load("https://www.kanpurize.com/social/profile #posts");
	   	$('.lds-ring').css({"display":"none"});
	}	
     });
}));
/* New post End*/
/*Delete post*/
$(document).on('click',".delete-post",(function(e) {
      	e.preventDefault();
      	$('.lds-ring').css({"display":"block"});
      	$('#delete-post-now').attr("href",$(this).attr("data-delete"));
      	$('.lds-ring').css({"display":"none"});
}));
$(document).on('click',"#delete-post-now",(function(e) {
      	e.preventDefault();
      	$('.lds-ring').css({"display":"block"});
      	$.get($(this).attr("href"), function(data) {
      		if (data == '1') {
      			$("#delete-post-now").parent().html("<p>This post has been removed from your timeline.</p>");
      			location.reload(true);
      		}
      	});
      	$('.lds-ring').css({"display":"none"});
}));
/*Delete post End*/
$(document).on('submit',".comment",(function(e) {
      	e.preventDefault();
      	$.ajax({
	      	url: "https://www.kanpurize.com/social/action/comment",	  
	      	type: "POST",        
	      	data: new FormData(this),
	      	contentType: false,
	      	cache: false,
	      	processData:false,  
      		success: function(data){
      			$('.comment').val('');
		}	
	});
}));
window.setInterval(function(){
  	$.ajax({
	      	url: "https://www.kanpurize.com/social/action/comments/" + $('.box-comments').find('.comment-date').val(),	  
	      	type: "get",        
	      	data: 'comment=' + $('.box-body').find('.post-id').val(), 
	      	success: function(data) {
			$('.comment-section').prepend(data);
		}	
     	});
}, 3000);
$(document).on('click',".like",(function(e) {
      	e.preventDefault();
      	var link = $(this).attr("href");
      	var cls = $(this).children('span').attr("class");
      	if (cls == 'fa like-btn-emo fa-thumbs-o-up' ) {
      		$(this).children('span').attr('class', 'fa like-btn-emo-blue fa-thumbs-o-up');
      		$(this).next().html(parseInt($(this).next().html()) + 1 );
      	} else {
      		$(this).children('span').attr('class', 'fa like-btn-emo fa-thumbs-o-up');
      		$(this).next().html(parseInt($(this).next().html()) - 1 );
      	}
      	$.ajax({
	      	url: link,	  
	      	type: "GET",        
	      	data: '',
	      	contentType: false,
	      	cache: false,
	      	processData:false,  
	      	success: function(data){
	      		
		}	
	});
}));
$('.liked-by').click( function (e) {
	e.preventDefault();
	var href = $(this).attr('href');
	$('#likefriendlist').load(href);
});

<!--rating social-->
$(document).ready(function(){
	  $(".reaction").on("click",function(){ 
	  	var data_reaction = $(this).attr("data-reaction");
		var value_reaction = $(this).attr("data-reactionValue");
		var old_val = $(this).attr("old-val");
		$(this).parent().find('li').attr("old-val", value_reaction);
		var data_post = $(this).attr("data-post");
		var data_points = $(this).attr("data-points");
		$(this).parent().parent().find(".like-btn-emo").removeClass().addClass('like-btn-emo').addClass('like-btn-'+data_reaction.toLowerCase());
		$(this).parent().parent().find(".like-btn-text").text(value_reaction).removeClass().addClass('like-btn-text').addClass('like-btn-text-'+data_reaction.toLowerCase()).addClass("active");
		var new_val = parseInt(data_points)+parseInt(value_reaction)-parseInt(old_val);
		$(this).parent().parent().find(".like-btn-text").text(new_val);
		$(this).parent().parent().find(".like-emo").html('<span class="like-btn-like"></span><span class="like-btn-'+data_reaction.toLowerCase()+'"></span>');
		$(this).parent().find('li').attr("data-points", new_val);
		if (old_val == 0) {
			var x = $(this).parent().parent().parent().next().next().find('.likes').html();
			$(this).parent().parent().parent().next().next().find('.likes').html(parseInt(x) + 1 );
		}
	  	$.ajax({
		      	url: "https://www.kanpurize.com/social/action/like",	  
		      	type: "GET",
		      	data: 'post=' + data_post + '&value=' + value_reaction,
		      	contentType: false,
		      	cache: false,
		      	processData:false,  
		      	success: function(data){
		      		
			}	
		});
	});
});

<!--rating social-->

 $(window).scroll(function(){
	    $(".theFixed").css("top",Math.max(70,162-$(this).scrollTop()));
	});
 <!--online user-->

	$(document).ready(function(){
		$("#showfriend").click(function(){
	        $("#focusfriend").show();
			//alert("#focusfriend");
	    });
	    $("#hidefriend").click(function(){
	        $("#focusfriend").hide();
	    });
	});
<!--online user-->

	$(function(){
	$("#addClass").click(function () {
	          $('#qnimate').addClass('popup-box-on');
	            });
	          
	            $("#removeClass").click(function () {
	          $('#qnimate').removeClass('popup-box-on');
	            });
	  });
<!--post preview-->
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pic1image').attr('src', e.target.result);
                $( "#pic1image" ).show( "slow" );

				//alert('#pic1image');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#pic1").change(function(){
        readURL(this);
    });
	$(document).ready(function()
	{
		$(".posthideimage").click(function()
		{
			$("#pic1image").hide();
		});
	});
<!--post preview end -->
	