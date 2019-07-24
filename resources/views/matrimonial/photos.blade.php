@extends('layout')
<div id="pageContentSection">
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/multiple_autofill.css') }}"/>
@stop
@section('content')
<input type="hidden" name="mat_profile_id" id="mat_profile_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
<section class="bgmetro normal-padding">
<div class="container-fluid">
	<div class="row">
    	<div class="col-md-1 padding_div"></div>
		<div class="col-md-7 profiles-list-agileits padding_div">
			<div class="single_w3_profile">
				<div class="agileits_profile_image">
                 <div class="project-hover">
               @if(!empty($mat_profile_details->image))
                 <img src='{{ asset("storage/$mat_profile_details->image") }}' class="transition" alt="profile image">
               @else
                 <img src="{{ asset('cdn/images/metrimonial/6.jpg') }}" class="transition" alt="profile image">
               @endif
                 @if($mat_profile_details->user_id == session()->get('knpuser'))
                  <div class="btn-view transition text-center">
                <a style="cursor:pointer;" class="btn btn-md btn--icon btn--round">Upload</a>
              </div>
                 @endif
            </div>
					
				</div>
				<div class="w3layouts_details ">
					<h4 class="profilebtnsize">@if(!empty($mat_profile_details->name)){{ $mat_profile_details->name }} @endif : 
                    @if($mat_profile_details->user_id == session()->get('knpuser'))
                    <a href="#" data-toggle="modal" data-target="#profiledetails"><span class="lnr lnr-pencil merticonsize"></span></a>
                    @endif
                    </h4>
					<p>@if(!empty($mat_profile_details->height)){{ $mat_profile_details->height }} @endif ,  @if(!empty($mat_profile_details->gender)){{ $mat_profile_details->gender }} @endif , @if(!empty($mat_profile_details->religion)){{ $mat_profile_details->religion }} @endif, @if(!empty($mat_profile_details->sirname)){{ $mat_profile_details->sirname }} @endif,  @if(!empty($mat_profile_details->country)){{ $mat_profile_details->country }} @endif.</p>
					<a class="smoothscroll" href="#Family-Details">Family Details</a>
					<a class="smoothscroll" href="#Education-Details">Education Details</a>
					<a class="smoothscroll" href="#Lifestyle">Lifestyle </a>
					<a class="smoothscroll" href="#Desired-Partner">Desired Partner</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="profile_w3layouts_details">
				<div class="agileits_aboutme">
					<h4>Photos</h4>
					<h5>Brief about me: 
                      @if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a href="#" data-toggle="modal" data-target="#matriabout" class=""><span class="lnr lnr-pencil merticonsize"></span></a>
                      @endif 
                    </h5>
					<p>@if($mat_profile_details->about_profile){{ $mat_profile_details->about_profile }} @endif</p>
		        <div class="row">
                <div id="Family-Details" class="fdtail">
					<h5>Family Details:&nbsp;@if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a href="#" data-toggle="modal" data-target="#matrifmilydetail" class=""><span class="lnr lnr-pencil merticonsize"></span></a>
                      @endif  </h5>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Father's Occupation : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->fathers_occupation) ?  $mat_profile_details->fathers_occupation : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
                    <div class="form_but1">
						<label class="col-sm-3 control-label1">Mother's Occupation : </label>
						<div class="col-sm-9 w3_details">
						  {{ !empty($mat_profile_details->mothers_occupation) ?  $mat_profile_details->mothers_occupation : "Not Specified "  }}
                        </div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Sister's : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->sister) ?  $mat_profile_details->sister : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
                    <div class="form_but1">
						<label class="col-sm-3 control-label1">Sister's are married : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->siste_married) ?  $mat_profile_details->siste_married : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Brother's : </label>
						<div class="col-sm-9 w3_details">
                           {{ !empty($mat_profile_details->brothers) ?  $mat_profile_details->brothers : "Not Specified "  }}						</div>
						<div class="clearfix"> </div>
					</div>
                    <div class="form_but1">
						<label class="col-sm-3 control-label1">Brother's are married :</label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->brother_married	) ?  $mat_profile_details->brother_married : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Family Vanue : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->family_living) ? $mat_profile_details->family_living : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
                    <div class="form_but1">
						<label class="col-sm-3 control-label1">Native City : </label>
						<div class="col-sm-9 w3_details">
						 {{ !empty($mat_profile_details->native_city) ? $mat_profile_details->native_city : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
                </div>
                </div>
                <div class="row">
                <div id="Education-Details" class="fdtail">
					<h5>Education Details:
                     @if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a href="#" data-toggle="modal" data-target="#matriedudetail" class=""><span class="lnr lnr-pencil merticonsize"></span></a>
                     @endif
                    </h5>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Highest Education : </label>
						<div class="col-sm-9 w3_details">
							 {{ !empty($mat_profile_details->qualification) ? $mat_profile_details->qualification : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Collage Name : </label>
						<div class="col-sm-9 w3_details">
						 {{ !empty($mat_profile_details->collage_name) ? $mat_profile_details->collage_name : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Occupation : </label>
						<div class="col-sm-9 w3_details">
                         {{ !empty($mat_profile_details->occupation) ? $mat_profile_details->occupation : "Not Specified "  }}						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Annual Income : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->annual_income) ? $mat_profile_details->annual_income : "Not Specified "  }}	
						</div>
						<div class="clearfix"> </div>
					</div>
                    <div class="form_but1">
						<label class="col-sm-3 control-label1">Express Yourself : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->express_yourself) ? $mat_profile_details->express_yourself : "Not Specified "  }}	
						</div>
						<div class="clearfix"> </div>
					</div>
                 </div>
                 </div>
                <div class="row">
                <div id="Desired-Partner" class="fdtail">
					<h5>Desired Partner: @if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a href="#" data-toggle="modal" data-target="#desired_partner" class=""><span class="lnr lnr-pencil merticonsize"></span></a>
                      @endif</h5>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Age : </label>
						<div class="col-sm-9 w3_details">
							25 - 27 Years
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Height : </label>
						<div class="col-sm-9 w3_details">
							 5' 6" to 6' 0"
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Marital Status : </label>
						<div class="col-sm-9 w3_details">
							Never Married
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Religion : </label>
						<div class="col-sm-9 w3_details">
							Doesn't Matter
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Caste : </label>
						<div class="col-sm-9 w3_details">
							Doesn't Matter
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Education : </label>
						<div class="col-sm-9 w3_details">
							Lorem ipsum dolor sit amet
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Occupation : </label>
						<div class="col-sm-9 w3_details">
							IT Software
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Income : </label>
						<div class="col-sm-9 w3_details">
							$80,000 to 150,000
						</div>
						<div class="clearfix"> </div>
					</div>
                 </div>
                 </div> 
				</div>
			</div>
		</div>
		<div class="col-md-3 w3ls-aside padding_div">
        	<div id="sticky-anchor"></div>
			<div class="view_profile">
        	<h3>Similar Profiles</h3>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="{{ asset('cdn/images/metrimonial/5.jpg') }}" class="img-responsive" alt="">
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h6>ID : 2458741</h6>
        	   	  <p>29 Yrs, 5Ft 5in Christian
				  MBA/PGDM,
				  Rs 10 - 15 lac Mark...</p>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="{{ asset('cdn/images/metrimonial/6.jpg') }}" class="img-responsive" alt="">
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h6>ID : 2458741</h6>
        	   	  <p>29 Yrs, 5Ft 5in Christian
				  MBA/PGDM,
				  Rs 10 - 15 lac Mark...</p>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="{{ asset('cdn/images/metrimonial/5.jpg') }}" class="img-responsive" alt="">
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h6>ID : 2458741</h6>
        	   	  <p>29 Yrs, 5Ft 5in Christian
				  MBA/PGDM,
				  Rs 10 - 15 lac Mark...</p>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="{{ asset('cdn/images/metrimonial/6.jpg') }}" class="img-responsive" alt="">
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h6>ID : 2458741</h6>
        	   	  <p>29 Yrs, 5Ft 5in Christian
				  MBA/PGDM,
				  Rs 10 - 15 lac Mark...</p>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>

           </ul>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="{{ asset('cdn/images/metrimonial/5.jpg') }}" class="img-responsive" alt="">
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h6>ID : 2458741</h6>
        	   	  <p>29 Yrs, 5Ft 5in Christian
				  MBA/PGDM,
				  Rs 10 - 15 lac Mark...</p>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
              <a href="#">
               <li class="profile_item-img">
                  <img src="{{ asset('cdn/images/metrimonial/6.jpg') }}" class="img-responsive" alt="">
               </li>
               <li class="profile_item-desc">
                  <h6>ID : 2458741</h6>
                  <p>29 Yrs, 5Ft 5in Christian
                  MBA/PGDM,
                  Rs 10 - 15 lac Mark...</p>
               </li>
               <div class="clearfix"> </div>
              </a>
           </ul>
           <ul class="profile_item">
              <a href="#">
               <li class="profile_item-img">
                  <img src="{{ asset('cdn/images/metrimonial/5.jpg') }}" class="img-responsive" alt="">
               </li>
               <li class="profile_item-desc">
                  <h6>ID : 2458741</h6>
                  <p>29 Yrs, 5Ft 5in Christian
                  MBA/PGDM,
                  Rs 10 - 15 lac Mark...</p>
               </li>
               <div class="clearfix"> </div>
              </a>
           </ul>
           <ul class="profile_item">
              <a href="#">
               <li class="profile_item-img">
                  <img src="{{ asset('cdn/images/metrimonial/6.jpg') }}" class="img-responsive" alt="">
               </li>
               <li class="profile_item-desc">
                  <h6>ID : 2458741</h6>
                  <p>29 Yrs, 5Ft 5in Christian
                  MBA/PGDM,
                  Rs 10 - 15 lac Mark...</p>
               </li>
               <div class="clearfix"> </div>
              </a>
           </ul>
       </div>
		</div>
        <div class="col-md-1 padding_div"></div>
        </div>
	<div class="clearfix"></div>
	</div>   
</section>
@stop
@section('footer')
   @parent
   <script src="{{ url('validationJS/matrimonial.js') }}"></script>
   <script src="{{ asset('cdn/js/multiple_autofill.js')}}"></script>
   <!--education detail-->
   <script>
    <!--Print Image in popup modal code start-->	
    function print_profileImage(data){
	   var image_url = base_url +"/uploadFiles/matrimonial_image/";
	   var html_gallery = '';
	   $.each(data, function (index, value) {
		  html_gallery += '<div class="list-group">' +
							 '<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3"> ' +
							   '<a class="fancybox thumbnail" rel="ligthbox" href="#"> ' +
								'<img id="blah" class="imgmatricover" alt="" src="'+ image_url + value.image +'" /> '+
							   '</a> '+
							 '</div> ' +
						  '</div>';
		});
	  $("#profile_gallery").html(html_gallery);
	}
   <!--Print Image in popup modal code start-->	
<!--Open profile POPUP modal and get image Code End-->	
 $(window).on('load',function(){
   var profile_id = $("#mat_profile_id").val();
   if( profile_id != ' '){
	    $.ajax({
		  url: base_url +"/matrimonialAjax/getPhotos",	
		  type:"GET",
		  data:{profile_id:profile_id},
		  dataType:'json',
		  success: function(data){
		   print_profileImage(data);  
		   $("#uploadimages_upload").modal('show');
		  }
	   });
	 }
 });
<!--Open profile POPUP modal and get image Code End--> 

<!--Profile image upload code start--> 
  $(document).on('submit',"#mat_profile_image",(function(e) {
	 $('#mat_profile_btnUpload').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $('#image_upload_response').html(" ")
	 //$("#profile_gallery").html(" ");
	 e.preventDefault();
      $.ajax({
      url: base_url+"/matAgaxPost/upload_profile",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(response){
		$('#mat_profile_btnUpload').html('<span class="lnr lnr-upload"></span> Upload').attr('disabled',false);   
		var parsedJson = jQuery.parseJSON(response);
		if(parsedJson.status == 1){
		    $('#image_upload_response').html('<div class="notice notice-success"><strong>Yes , </strong> Image Upload Successful.</div>') 
		    print_profileImage(parsedJson.getPhoto);  
		  }
		else{
		   $('#image_upload_response').html(response.msg)
		 }  
	   }	
     });
  }));
<!--Profile image upload code End--> 
   </script>
<script>
 $(document).ready(function(e) {
  <!--Education_Details_add_script start--> 
   <!--Education_Details_add_script End--> 
   <!--Desired partner script  start--> 
    $(document).on('submit',"#desired_partner",(function(e) {
	 //$('#cartSubmit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 //$('#educationResponse').html(" ")
	 e.preventDefault();
      $.ajax({
      url: base_url+"/matrimonial/desired_partner",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(desired_partner_res){
		alert(desired_partner_res);
		//$('#personalResponse').html(data)
	   }	
     });
  }));
 <!--Desired partner script  start--> 
 });
</script>
</div>
@stop
