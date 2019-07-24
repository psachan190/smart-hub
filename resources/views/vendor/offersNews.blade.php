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
                            <li class="active"><a href="#">Offer and news</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Offer and news</h1>
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
              @if($offerNewsList != FALSE)
				   @foreach($offerNewsList as $list)
					  @php
                       $image = $list->image;
					   $urlTitle = str_replace(" ","_",$list->newsTitle);
					  @endphp
					  <li class="recent-post">
                    <a href='{{ url("vendor/$vendorData->username/EditofferNews/$list->id") }}'>
                        <div class="post-img">
                          @if($image != "default.jpg")
                           <img src='{{ url("uploadFiles/offersNews/$image") }}' class="img-responsive">
                          @endif
                        </div>
                        <h5><small>@if(!empty($list->newsTitle)) {{ $list->newsTitle }} @endif<small></h5>
                       <p><small><i class="fa fa-calendar" data-original-title="" title=""></i>&nbsp;
					      @php
                             $strDate = strtotime($list->created_at);
                          @endphp
                         {{ date("d-M-Y h:i:sa", $strDate) }}
                       </small></p>
                       </a>
                       <p><small>
                         <a href='{{ url("vendor/$vendorData->username/EditofferNews/$list->id") }}'><i class="fa fa-edit" data-original-title="" title=""></i></a>
                       </small></p>
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
           @if($offerNewsList != FALSE)
           {{ $offerNewsList->render() }}
           @endif
        </center></p> 
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9" style="margin-top:33px;">
     <div class="post">
        <div class="content">
          <h2 class="headingMain">Post Your Offers and News</h2>
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <div id="showAdsImg" style="display:none;">
             <img id="img-upload1" src="<?php echo url("uploadFiles/shopProfileImg/8594back.jpg"); ?>" class="img img-responsive" />
          </div> 
          <form id="offerNewsForm" name="offerNewsForm" autocomplete="off">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="vendordetails_id" value="@if(!empty($vendorData->id)){{ $vendorData->id }} @endif" readonly />
                <input type="hidden" name="users_id" value="@if(!empty($vendorData->users_id)){{ $vendorData->users_id }} @endif" readonly />
                <input type="hidden" name="imageCopy" id="" />
               <div class="form-group">
                                    <label>Select Image <span style="color:red
                                    ;">(dimension must be:- 400*200 px . ) ( optional )</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-md btn-file">
                                                Browse banner Image… <input type="file" id="imgInp1" name="newsofferImage" />
                                            </span>
                                        </span>
                                        <input type="text" class="uploader1" name="imageName" id="imageName" readonly>
                                    </div>
                             	</div>
               <div class="row form-group orderform">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Ads start date&nbsp;<span class="prafontanswerstar">*</span></strong>
                                            <input type="text" id="datepicker1" value="{{ old('startDate') }}" name="startDate" placeholder="dd/mm/yyyy" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Ads end date&nbsp;<span class="prafontanswerstar">*</span></strong>
                                            <input type="text" id="datepicker2" value="{{ old('endtDate') }}" name="endDate" placeholder="dd/mm/yyyy" />
                                        </div>
                                    </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                 <label>News &amp; Offers Title &nbsp;<span class="prafontanswerstar">*</span></label>
                 &nbsp;&nbsp;
                  <input type="text" name="newsTitle" id="newsTitle" placeholder="News &amp; Offers Title" value="{{ old('newsTitle') }}" />
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                                        <div class="col-md-6 col-xs-12">
                                            <label> Select Discount&nbsp;<span style="color:red
                                    ;">optional ( if you sale any products in offer)</span></span></label>
                                            <div class="select-wrap">
                                            <select class="form-control" name="discountMode" id="discountMode">
                                              <option value="0">Select Discount Mode</option>
                                              <option value="1">In Percentage</option>
                                              <option value="2">In Rate</option>
                                            </select>
                                              <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>Amount&nbsp;<span style="color:red
                                    ;"> ( optional ) </span></label>
                                            <div class="select-wrap">
                                            <input type="text" name="discountAmount" id="discountAmount" placeholder="Enter Amount of Discount" value="{{ old('discountAmount') }}" />
                                            </div>
                                        </div>
                                    </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                 <label>News &amp; Offers Description &nbsp;<span class="prafontanswerstar">*</span></label>
                 &nbsp;&nbsp;
                  <textarea cols="4" rows="4" name="newsDesc" id="newsDesc" placeholder="News &amp; Offers Description" maxlength="100" onkeyup="maxCharacterLenght(this.value,'Offer and News Description','offernewsErr',100)" >{{ old('newsDesc') }}</textarea>
                  <span id="offernewsErr"></span>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-12">
                <div class="form-group">
              <button type="submit" name="submit" id="saveNews" class="btn btn-md btn--icon btn--round"><i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Save News</button>  
              <button type="reset" name="reset" id="reset" class="btn btn-md btn--icon btn--round"><i style="color:#FFF;" class="fa fa-refresh"></i>&nbsp;reset</button>  
            </div>
           <span id="uploadResult"></span>
                </div>
              </div>                 
         </form>
         <div id="resultSuccess"></div>
         <div id="someDivToDisplayErrors"></div>
        </div>
     </div>
  </div>
 </div>
</div>
@stop
@section('footer')
 @parent
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src='{{ url("editor/editorBox.js") }}'></script>
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#offerNewsForm",(function(e) {
	$('#saveNews').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Please Wait...').attr('disabled',true);
	  e.preventDefault();
      $.ajax({
      url: "<?php echo url("vendorAgax/kanpurizeSaveNews"); ?>",
      type: "POST",        
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cach ed
      processData:false,        
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
			   $("#reset").click();
		   } 
		 if(parsedJson.vStatus==100){
			$('#someDivToDisplayErrors').html("<span style='color:red;'>" + parsedJson.error + "</span>");
			$('#sidebarRef').load(document.URL + ' #sidebarRef'); 
		  }  
	   }	
     });
  }));
});
</script>
@stop