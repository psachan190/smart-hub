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
                            <li class="active"><a href="#"> Edit Services</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title"> Edit Services</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-3">
      @if($editServiceList != FALSE)
        <div>
         <ul class="mdn-accordion">
           <li class="subtop"><a href="#"><i class="fa fa-random"></i>Edit Services &nbsp;</a></li>
           @if(!empty($editServiceList))
		      @foreach($editServiceList as $shoplist)
			    <li><a href='{{ url("vendor/$vendorData->username/edit_service_list/$shoplist->id") }}'><i class="fa fa-angle-double-right"></i>{{ $shoplist->cname }}</a></li>
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
          <h2 class="headingMain">Edit {{ $serviceDetails->cname }} Services Details</h2>
        <meta name="csrf-token" content="{{ csrf_token() }}" />   
          <form class="" name="editserviceForm" id="editserviceForm">
             <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="row">
                <input type="hidden" name="shopID" value="@if(!empty($serviceDetails)){{ $serviceDetails->knp_shopcategory_id }} @endif" readonly />
                 <input type="hidden" name="editId" value="@if(!empty($serviceDetails)){{ $serviceDetails->id }} @endif" readonly />
                <input type="hidden" name="userID" value="@if(!empty($serviceDetails)){{ $serviceDetails->user_id }} @endif" readonly />
                <input type="hidden" name="vendorID" value="@if(!empty($serviceDetails)){{ $serviceDetails->vendordetails_id }} @endif" readonly />
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                  <div class="form-group">
                   <label>Service Description&nbsp;&nbsp;</label>
                   <textarea name="myTextarea" id="myTextarea">@if(!empty($serviceDetails->serviceDescription)){{ $serviceDetails->serviceDescription }} @endif</textarea>
                   </div>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Our Prime Services</label>
                 &nbsp;&nbsp;
                  <textarea name="myTextarea1" id="myTextarea1">@if(!empty($serviceDetails->primeServices)){{ $serviceDetails->primeServices }} @endif</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Our Services</label>
                  <textarea name="myTextarea2" id="myTextarea2">@if(!empty($serviceDetails->ourServices)){{ $serviceDetails->ourServices }} @endif</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;" >
                <div class="col-sm-12">
                 <label>Contact Address</label>
                  <textarea name="myTextarea3" id="myTextarea3">@if(!empty($serviceDetails->address)){{ $serviceDetails->address }} @endif</textarea>
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Contact Number</label>
                 <input type="text" name="infoMobile" id="infoMobile" placeholder="Contact Mobile Number" value="@if(!empty($serviceDetails->infoMobile)) {{ $serviceDetails->infoMobile }} @endif"  />
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Contact info Email</label>
                 <input type="text" name="infoEmail" id="infoEmail" placeholder="Imfo Email" value="@if(!empty($serviceDetails->infoEmail)){{ $serviceDetails->infoEmail }} @endif" />
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Timing</label>
                 <input type="text" name="timing" id="timing" placeholder="Shop Shedule" value="@if(!empty($serviceDetails->timming)){{ $serviceDetails->timming }} @endif" />
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>weakly Off</label>
                 <input type="text" name="wealyOFF" id="wealyOFF" placeholder="Weakly Off" value="@if(!empty($serviceDetails->weaklyOff)){{ $serviceDetails->weaklyOff }} @endif" />
                </div>
              </div>
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                 <label>Meta Keywords</label>
                  <textarea name="myTextarea4" cols="5" rows="5" id="metakeyword">@if(!empty($serviceDetails->metaKeywords)){{ $serviceDetails->metaKeywords }} @endif</textarea>
                </div>
              </div>
              
              <div class="row" style="margin-top:15px;">
                <div class="col-sm-12">
                  <div class="resultData"></div>
                </div>
                <div class="col-sm-12">
                 <button type="submit" id="submit" class="btn btn-md btn--round">Edit Services</button> &nbsp;<button type="reset"  class="btn btn-md btn--round btn-danger">Reset</button>
                </div>
              </div>
          </form>
        </div>
     </div>
  </div>
 </div>
</div>
@stop
@section('footer')
 @parent
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ url('editor/editorBox.js') }} "></script>
<script>
$(document).ready(function(e) {
  $(document).on('submit',"#editserviceForm",(function(e) {
	$('#submit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	e.preventDefault();
      $.ajax({
      url: base_url+"/vendorAgax/editServicesaction",	 
	  type: "POST",        
      data: new FormData(this), 
      contentType: false,       
      cache: false,          
      processData:false,      
      success: function(data){
		  $('#submit').html('<i class="glyphicon glyphicon-edit"></i> Edit Services').attr('disabled',false); 
	     $('.resultData').html("<p style='color:red;'>"+ data +"</p>");
	   }	
     });
  }));
});
</script>
@stop 