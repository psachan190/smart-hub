@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<div class="container-fluid normal-padding">
 <div class="row">
   <div class="col-sm-12 col-md-6 col-lg-3">
      @if($serviceShop != FALSE)
        <div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Services &nbsp;</a></li>
           @if(!empty($serviceShop))
			  @php $i=1; @endphp
		      @foreach($serviceShop as $shoplist)
                <li><a href='{{ url("vendor/$vendorData->username/add_services_list/$shoplist->cid") }}'><i class="fa fa-angle-double-right"></i>{{ $shoplist->cname }}</a></li>
              @php $i++; @endphp
			 @endforeach
		   @endif
			<li><a href="#"><i class="fa fa-chain"></i>  </a></li>
        </ul>
        </div>
	  @endif	
   </div>
   <div class="col-sm-12 col-md-6 col-lg-9">
     <div class="post">
        <div class="content">
		  <style>
          .headingMain{ font-size:20px; color:#F00; font-weight:700; }
          </style>
          <h2 class="headingMain">Add {{ $shopDetails->cname }} Services Details</h2>
        <meta name="csrf-token" content="{{ csrf_token() }}" />   
          <form class="" name="addserviceForm" id="addserviceForm">
             <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="row">
                <input type="hidden" name="shopID" value="@if(!empty($shopDetails)){{ $shopDetails->cid }} @endif" readonly />
                <input type="hidden" name="vendorID" value="@if(!empty($vendorData)){{ $vendorData->id }} @endif" readonly />
                <input type="hidden" name="userID" value="@if(!empty($vendorData->users_id)){{ $vendorData->users_id }} @endif" readonly />
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                  <div class="form-group">
                   <label>Service Description&nbsp;<span class="prafontanswerstar">*</span></label>
                   <textarea name="myTextarea" id="myTextarea">{{ old('myTextarea') }}</textarea>
                   <span id="firtsErr"></span>
                   </div>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Our Prime Services&nbsp;<span class="prafontanswerstar">*</span></label>
                  <textarea name="myTextarea1" id="myTextarea1">{{ old('myTextarea1') }}</textarea>
                   <span id="secondErr"></span>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Our Services&nbsp;<span class="prafontanswerstar"><small>( Optional )</small></span></label>
                  <textarea name="myTextarea2" id="myTextarea2">{{ old('myTextarea2') }}</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Contact Address&nbsp;<span class="prafontanswerstar">*</span></label>
                  <textarea name="myTextarea3" id="myTextarea3">{{ old('cAddress') }}</textarea>
                  <span id="contactAddressErr"></span>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Contact Number&nbsp;<span class="prafontanswerstar">*</span></label>
                 <input type="text" name="infoMobile" id="infoMobile" placeholder="Contact Mobile Number" value="<?php if(!empty($vendorData->vMobile))echo $vendorData->vMobile; ?>"  />
                  <span id="contactnumberErr"></span>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Contact info Email&nbsp;<span class="prafontanswerstar">*</span></label>
                 <input type="text" name="infoEmail" id="infoEmail" placeholder="Info Email" value="<?php if(!empty($vendorData->vEmail))echo $vendorData->vEmail; ?>" />
                  <span id="contactemailErr"></span>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Timing&nbsp;<span class="prafontanswerstar">*</span></label>
                 <input type="text" name="timing" id="timing" placeholder="Shop Shedule" value="{{ old('timing') }}" />
                 <span id="timimgErr"></span>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>weekly Off&nbsp;</label>
                 <input type="text" name="wealyOFF" id="wealyOFF" placeholder="Weekly Off" value="{{ old('wealyOFF') }}" />
                 <span id="weaklyErr"></span>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Meta Keywords</label>
                 <span style="float:right;"><a data-toggle="modal" data-target="#servicehints" class="btn btn--icon btn-sm btn-warning"><span class="lnr lnr-magic-wand"></span>Hints</a></span>
                  <textarea name="myTextarea4">{{ old('myTextarea4') }}</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
              
                  <div class="resultData"></div>
                </div>
                <div class="col-sm-12">
                 <button type="submit" id="submitServices" class="btn btn-md btn--round"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Services</button> &nbsp;<button type="reset" id="reset"  class="btn btn-md btn--round btn-danger"><i class="glyphicon glyphicon-refresh"></i>&nbsp;Reset</button>
                </div>
              </div>
          </form>
        </div>
     </div>
  </div>
 </div>
</div>
<!--popup-->
<div class="modal" id="servicehints" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title1" id="myModalLabel"><i class="text-muted lnr lnr-magic-wand"></i> Services Meta Key Words Hints </h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        	<p>Services in kanpur, top Services in kanpur, best webshop kanpur, best Services in kanpur, top Services mobile in kanpur </p>
                        	
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
<!--popup end-->
@stop
@section('footer')
 @parent
 <script>
 $(document).ready(function(e) {
   <!---vendor Add Services script End--->
  $(document).on('submit',"#addserviceForm",(function(e) {
	  $("#firtsErr").html(" ");
	  $("#secondErr").html(" ");
	  $("#contactAddressErr").html(" ");
	  $("#contactemailErr").html();
	  $("#contactnumberErr").html();
	  $('#timimgErr').html(" ");
	  $('#weaklyErr').html(" ");
	  $(".resultData").html(" ");
	 //var btnContent = $('#submitServices').html();
	 $('#submitServices').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 e.preventDefault();
      $.ajax({
	   url: base_url+"/vendorAgax/addServicesaction",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 $('#submitServices').html('<i class="glyphicon glyphicon-plus"></i> Add Services').attr('disabled',false); 
		  if(data=="yes"){
		     $('.resultData').html("<p style='color:red;'>Services Add successfully...</p>");
			 $('#reset').click();
			}
		  else{
			  $('.resultData').html(data);
			}							
	   }	
     });
  }));
  <!---vendor Add Services script End--->
     
 });
 </script>
<script src='{{ asset("validationJS/vendorBackend.js") }}'></script>
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ url('editor/editorBox.js') }} "></script>
@stop 