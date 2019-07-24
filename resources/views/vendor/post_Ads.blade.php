@extends("layout")
@section('content')
 @include('vendor.template.marketPlacenavigation')
 <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li class="active"><a href="#">Post Ads</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Post Ads</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
 <div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="widget-sidebar" id="sidebarRef">
        <h2 class="title-widget-sidebar">RECENT POST</h2>
           <div class="content-widget-sidebar back">
            <ul>
              @if($vAdsPostList != FALSE)
				   @foreach($vAdsPostList as $list)
					  @php
                       $image = $list->image;
					  @endphp
					  <li class="recent-post">
                        <a href='{{ url("vendor/$vendorData->username/editPost_Ads/$list->id") }}'>
                        <div class="post-img">
                        <img src='{{ url("uploadFiles/vthumbsAdspost/$image") }}' class="img-responsive" alt="<?php if(!empty($$list->description))echo $list->description; ?>">
                        </div>
                        <h5><small><?php if(strlen($list->description) < 25){ echo $list->description; }else{ echo substr($list->description,0,70)."..."; } ?></small></h5>
                       <p><small><i class="fa fa-calendar" data-original-title=""></i>&nbsp;
					    {{ date('d-M-Y H:i:s A',strtotime($list->created_at)) }}</small></p>
                       </a>
                     </li>
                       <hr>
				   @endforeach
			  @else
				<li class="recent-post">
                <div class="post-img">
                  No Ads Post Available
                 </div>
                </li>
                <hr>
           	  @endif
            </ul>
           </div>
        <p><center>
        @if($vAdsPostList != FALSE)
        {{ $vAdsPostList->render() }}
        @endif
        
        </center></p> 
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9" style="margin-top:33px;">
     <div class="post">
        <div class="content">
          <?php
            if(!empty($vAdsRecord->totalAds) && $vAdsRecord->totalAds >0){
			   ?>
			    <h2 class="headingMain">Post Your Ads</h2>
                 <hr />
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <div id="showAdsImg" style="display:none;">
                     <img id="img-upload1" src="<?php echo url("uploadFiles/shopProfileImg/8594back.jpg"); ?>" class="img img-responsive" />
                  </div> 
                  <form id="vendorPost_adsForm" name="vendorPost_adsForm">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="userID" id="userID"  value="<?php echo session()->get('knpUser_id'); ?>"  />
                        <input type="hidden" name="vendordetails_id" value="@if(!empty($vendorData)){{ $vendorData->id }} @endif" readonly />
                        <input type="hidden" name="postType" id="postType" value="2" readonly />
                        <input type="hidden" name="paidStatus" id="v"  value="paid"  />
                        <input type="hidden" class="" name="imageNameCopy" id="imageNameCopy" value="" readonly>
                
                       <div class="form-group">
                                            <label>Upload Image <span style="color:red
                                            ;">(dimension must be:- 1800*600 px . )</span><span class="prafontanswerstar">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-md btn-file">
                                                        Browse Image… <input  type="file" id="imgInp1" name="postImage" />
                                                    </span>
                                                </span>
                                                <input type="text" class="uploader1" name="imageName" id="imageName" readonly>
                                            </div>
                                        </div>
                       <div class="row" style="margin-top:25px;">
                        <div class="col-sm-6 ">
                        <label>Start Date&nbsp;<span class="prafontanswerstar">*</span></label>
                        <div class="left-inner-addon">
                                   <i class="lnr lnr-calendar-full"></i>
                                <input type="text" name="startDate" id="datepicker1"  placeholder="Click for select date" readonly="readonly" />
                       </div>
                        </div>
                        <div class="col-sm-6 ">
                        <label>Last Date&nbsp;<span class="prafontanswerstar">*</span></label>
                        <div class="left-inner-addon">
                                    <i class="lnr lnr-calendar-full"></i>
                                <input type="text" name="endDate" id="datepicker2" placeholder="Click for select date" readonly="readonly" />
                       </div>
                        </div>
                      </div>
                       
                       <div class="row" style="margin-top:25px;">
                         <div class="col-md-12">
                                               <div class="custom_checkbox form-check">
                                                  <input type="checkbox" name="filtration" id="filtration" value="no" />&nbsp;
                                                 <label for="filtration">
                                                   <span class="shadow_checkbox"></span>
                                                   <span class="radio_title catnamebox">&nbsp;Apply Filteration</span>
                                                 </label>
                                              </div>
                                             </div>
                       </div> 
                       <div id="filtrationBlog" style="display:none;"> 
                         <div class="row" style="margin-top:25px;">
                             <div class="col-md-12"><strong>Select Age</strong></div>
                              <div class="form-group orderform">
                                <div class="col-md-6 col-xs-12">
                                    <strong>From&nbsp;</strong>
                                    <div class="select-wrap">
                                <select name="ageFrom" id="ageFrom" class="period_selector">
                                    <option value="0">--Select--Age--From--</option>
                                    <?php 
                                         for($i=1; $i <= 100; $i++){
                                           ?>
                                           <option value="{{ $i }}">{{ $i }}</option>
                                           <?php
                                         }
                                       ?>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                 <strong>To&nbsp;<span class="prafontanswerstar">*</span>&nbsp;<span id="ageErr"></span></strong>
                                    <div class="select-wrap">
                                     <select name="ageTo" id="ageTo" class="period_selector">
                                      <option value="0">--Select--Age--To--</option>
                                       <?php 
                                         for($i=1; $i <= 100; $i++){
                                           ?>
                                           <option value="{{ $i }}">{{ $i }}</option>
                                           <?php
                                         }
                                       ?>
                                     </select> 
                                      <span class="lnr lnr-chevron-down"></span>
                                </div>
                            </div>
                               </div>
                              <div class="form-group orderform">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <strong>Gender&nbsp;</strong>
                                    <div class="custom-radio">
                                       <input type="radio" id="2" class="addresType" name="gender" value="1" >
                                       <label for="2"><span class="circle"></span>Male</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="1" class="addresType" name="gender" value="2" />
                                        <label for="1"><span class="circle"></span>Female</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="3" class="addresType" name="gender" value="3" checked="checked" />
                                        <label for="3"><span class="circle"></span>Both</label>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-12 col-xs-12">
                              <strong>Profession</strong>
                                 <div class="row">
                                                  <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="student" id="first" value="1" />&nbsp;
                                     <label for="first">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Student </span>
                                     </label>
                                  </div>
                                </div>
                                                  <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="business" id="second" value="3" />&nbsp;
                                     <label for="second">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Business Man</span>
                                     </label>
                                  </div>
                                </div>
                                                  <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="salaried" id="third" value="3" />&nbsp;
                                     <label for="third">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Salaried </span>
                                     </label>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="housewife" id="fourth" value="4" />&nbsp;
                                     <label for="fourth">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;House Wife</span>
                                     </label>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="looking_opp" id="fifth" value="5" />&nbsp;
                                     <label for="fifth">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Looking for opportunity</span>
                                     </label>
                                  </div>
                                </div>
                                </div>
                          </div>
                             </div>
                       </div>                    
                       <div class="row" style="margin-top:25px;">
                        <div class="col-sm-12">
                         <label>Ads Details&nbsp;<span class="prafontanswerstar">*</span></label>
                         &nbsp;&nbsp;
                          <textarea name="postDescription" id="myTextarea1">{{ old('myTextarea1') }}</textarea>
                        </div>
                      </div>
                       <div class="row" style="margin-top:25px;">
                        <div class="col-sm-12">
                        <div class="form-group">
                      <button type="submit" name="submit" id="savePost" class="btn btn-md btn--round"><i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Post Ads</button>  
                    </div>
                   <span id="postResult"></span>
                        </div>
                      </div>                 
                 </form>
                 <div id="resultSuccess"></div>
                 <div id="someDivToDisplayErrors"></div>
			   <?php
			 }
			else{
			   ?>
                @if(isset($_GET['failed']))
                 <p class="alert alert-danger">Your transaction was not Completed . Please Try again .</p>
                @endif
			     <h2 class="headingMain">Upgrade Your Advertisement Package</h2>
                 <hr />
                 <div class="row" style="margin-top:25px;">
                         @if($advertisementPackage != FALSE)
                           @php $k=1; @endphp
                           @foreach($advertisementPackage as $listArr)
                             <div class="col-md-12">
                                <p>{{ $k }} .</p>
                                <p>@if($listArr->description){{ $listArr->description }} @endif</p>&nbsp;&nbsp;
                                </div>
                              @php $k++; @endphp   
                           @endforeach
                         @endif
                       </div>
                 <hr />
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <form id="packageForm" action="<?php echo url("vpurchaseAdsPack"); ?>" name="packageForm" method="post">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="vendorDetailsID" id="vendorDetailsID" value="@if(!empty($vresultData)){{ $vresultData->id }} @endif" readonly />
                         <input type="hidden" name="vendorName" id="vendorName" value="@if(!empty($vresultData)){{ $vresultData->vName }} @endif" readonly />
                          <input type="hidden" name="vendorMobile" id="vendorMobile" value="@if(!empty($vresultData)){{ $vresultData->vMobile }} @endif" readonly />
                          <input type="hidden" name="vendoremail" id="vendoremail" value="@if(!empty($vresultData)){{ $vresultData->vEmail }} @endif" readonly />
                       <div class="row" style="margin-top:25px;">
                         @if($advertisementPackage != FALSE)
                           @foreach($advertisementPackage as $listArr)
                             <div class="col-md-12">
                                <div class="custom-radio">
                                  <input type="radio" id="adsPackage<?php if(!empty($listArr->id))echo $listArr->id; ?>" class="addressType" name="adsPackage" value="@if(!empty($listArr->id)){{ $listArr->id }}@endif" />
                                         <label for="adsPackage<?php if(!empty($listArr->id))echo $listArr->id; ?>"><span class="circle"></span>@if($listArr->title){{ $listArr->title }} @endif</label>&nbsp;&nbsp;
                                </div>
                                </div>
                           @endforeach
                         @endif
                       </div> 
                       <div class="row" style="margin-top:25px;">
                        <div class="col-sm-12">
                        <div class="form-group">
                      <button type="submit" name="submit" id="savePost" class="btn btn-md btn--round"><i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Purchase </button>  
                    </div>
                   <span id="postResult"></span>
                        </div>
                      </div>                 
                 </form>
                 <div id="resultSuccess"></div>
                 <div id="someDivToDisplayErrors"></div>
			   <?php
			 } 
		  ?> 
        </div>
     </div>
  </div>
 </div>
</div>
@stop
@section('footer')
 @parent
<script>
$(document).ready(function(e) {
	$(document).on('submit',"#vendorPost_adsForm",(function(e) {
	$('#postResult').html(" ");
	$('#savePost').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 e.preventDefault();
      $.ajax({
	  url: base_url+"/vendorAgax/vendorPost_ads",	  
	  type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 $('#savePost').html('&nbsp;Post').attr('disabled',false); 
		   $('#postResult').html(" ");
		var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
              $('#postResult').html(errorString);
		   }
		 if(parsedJson.vStatus==500){
			  $('#postResult').html(parsedJson.msg);
			  $('#refSidebar').load(document.URL + ' #refSidebar');
			  location.reload();
		   } 
		 if(parsedJson.vStatus==300){
		       $('#postResult').html(parsedJson.msg);
		   }  
	   }	
     });
  }));
});
</script>
<script src='{{ asset("validationJS/vendorBackend.js") }}'></script>
@stop        