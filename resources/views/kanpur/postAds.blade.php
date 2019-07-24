@extends("layout")
@section('content')
<section class="hero-area ">
    <!----slider start----->
    <div class="bgimage">
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:2000px;height:760px;overflow:hidden;visibility:hidden;background-color:#24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:100px;height:100px;" />
        </div>       
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:440px;width:1600px;height:760px;overflow:hidden;">
             @if(!empty($allAdsPostData))
                @foreach($allAdsPostData as $adsData) 
                  <div data-p="150.00">
                    <img data-u="image" src='@php $bimage = $adsData->image; @endphp {{url("uploadFiles/vendorAdspost/$bimage") }}' />
                    <img data-u="thumb" src='{{ url("uploadFiles/vthumbsAdspost/$bimage") }} ' />
                   </div>      
                @endforeach
            @endif
        </div> <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;top:0px;width:440px;height:760px;background-color:#000;" data-autocenter="2" data-scale-left="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:200px;height:100px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:460px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920"></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    </div>
    <!----slider start----->
 </section>
<!--================================
    END HERO AREA
=================================-->
<!--================================
    START FOLLOWERS FEED AREA
=================================-->
<div class="cart_area section--padding2 bgcolor">
        <div class="container">
             <div class="row orderrow">
              <div class="col-sm-12">
                     <meta name="csrf-token" content="{{ csrf_token() }}" />
                     <form id="advertisement_post" class="orderInform">
                    <?php echo csrf_field(); ?>
                        <div class="cardify login">
                           <input type="hidden" name="userID" id="userID"  value="<?php echo session()->get('knpuser'); ?>" readonly="readonly"  />
                           <input type="hidden" name="postType" id="postType"  value="1" readonly="readonly"  />
                           <input type="hidden" name="paidStatus" id="paidStatus"  value="unpaid" readonly="readonly"  />
                           <div class="login--form">
                                     @if(isset($_GET['paysuccess']))
                                       <script>alert("Payment For Advertisement Complete.")</script>
                                       <p style="color:green;"><strong>Payment For Advertisement Complete .</strong></p>
                                     @endif
                                      @if(isset($_GET['failed']))
                                        <script>alert("Payment For Advertisement Failed.")</script>
                                        <p style="color:green;"><strong>Payment For Advertisement Failed .</strong></p>
                                     @endif
                                     <h2 class="postadd">Post Your Advertisement</h2>
                                     <hr />
                                      <div class="form-group orderform">
                                     <div class="col-md-12 useradd"><strong>Ads Details</strong></div>
                                     <div class="form-group orderform" style="margin-top:20px;">
                                    	<div class="col-md-12 col-lg-12 col-xs-12">
                                    <label>Select Image <span style="color:red
                                    ;">(dimension must be:- 1800*600 px . )</span></label>
                                    <div class="input-group">
                                      <span class="input-group-btn">
                <span class="btn btn-md btn-file">
                    Browse… <input type="file" id="imgInp" name="postImage" />
                </span>
            </span>
                                      <input type="text" readonly>
                                    </div>
                                    <img id='img-upload'/>
                                    </div>
                             	</div>
                                     <div class="form-group orderform">
                                        <div class="col-md-6 col-xs-12">
                                          <strong>Ads start date&nbsp;<span class="prafontanswerstar">*</span>&nbsp;<span id="dateErr"></span></strong>
                                            <input type="text" id="datepicker1" value="{{ old('startDate') }}" name="startDate" placeholder="Click for select date" readonly="readonly" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                             <strong>Ads end date&nbsp;<span class="prafontanswerstar">*</span></strong>
                                            <input type="text" id="datepicker2" value="{{ old('endtDate') }}" name="endDate" placeholder="Click for select date" readonly="readonly" />
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                       <div class="custom_checkbox form-check">
                                          <input type="checkbox" name="filtration" id="filtration" value="1" />&nbsp;
                                         <label for="filtration">
                                           <span class="shadow_checkbox"></span>
                                           <span class="radio_title catnamebox">&nbsp;Apply Filters</span>
                                         </label>
                                      </div>
                                     </div>
                                     <div id="filtrationBlog" style="display:none;"> 
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
                                     <div class="form-group orderform">
                                        <div class="col-md-12 col-lg-12 col-xs-12">
                                            <strong>Description&nbsp;</strong>
                                           <textarea name="postDescription" id="postDescription" cols="5"></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group orderform">
                                        <div class="col-md-12 col-lg-12 col-xs-12">
                                         <div class="custom_checkbox form-check">
                            <input type="checkbox" name="termandcondition" id="termandcondition" value="1" />&nbsp;
                             <label for="termandcondition">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;I accept all term and condition</span>&nbsp;&nbsp;
                              <a href="{{ url('kanpurize_Advertisementpolicy') }}" target="_blank">Advertisement Policy</a>
                             </label>
                             
                          </div>  
                                    </div>
                                    <div id="resultCart"></div>
								    <div class="form-group orderform">
                                <button class="btn btn--md btn--round" type="submit" name="submit" id="postsubmit">Post</button>
                                <div id="postResult"></div>
								</div>
                            </div><!-- end .login--form -->
                        </div><!-- end .cardify -->
                               </div>
                            </div>     
                    </form>
              </div>
              </div>
        </div>
    </div>
<div class="cart_area section bgcolor">
        <div class="container">
            <div class="row orderrow1">
              <div class="col-sm-12">
                  <div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                     <h2 class="postadd">Your Advertisement List</h2>
                                     <hr />
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                        <tr>
                                            <th>Sn.</th>
                                            <th>Banner Image</th>
                                            <th>start Date</th>
                                            <th>End Date</th>
                                            <th>Pay status </th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         @if($getUserAds != FALSE)
                                           @php $i=1 ; @endphp
                                            @foreach($getUserAds as $dataArr)
                                              @php $id = base64_encode($dataArr->id) @endphp
                                             <tr>
                                            <th>{{ $i }}</th>
                                            <th><img style="height:50px; width:50px;" src='{{ url("uploadFiles/vthumbsAdspost/$dataArr->image") }}' alt=""></th>
                                            <th>@if(!empty($dataArr->startDate)){{ date('d-M-Y' , $dataArr->startDate) }}@endif</th>
                                            <th>@if(!empty($dataArr->endDate)){{ date('d-M-Y' , $dataArr->endDate) }}@endif</th>
                                            <th>@if(!empty($dataArr->paidStatus)){{ $dataArr->paidStatus }} @endif</th>
                                            <th>@if($dataArr->adminStatus=="Y"){{ "Approve" }} @else {{ "pending" }} @endif</th>
                                            <th><a href='{{ url("EditAdvertisement/$id") }}'>Details</a></th>
                                             </tr>
                                            @php $i++ @endphp 
                                           @endforeach
                                         @endif
                                         <tr>
                                            <th>
                                            <p><center>
                                                @if($getUserAds != FALSE)
                                                {{ $getUserAds->render() }}
                                                @endif
                                            </center></p> 
                                            </th>
                                             </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
              </div>
            </div>
         </div>
    </div>    
 <form action="<?php echo url("paymentFormsingleadvertisement"); ?>" method="post" style="display:none;">
  <?php echo csrf_field(); ?>
  <input type="text" name="lastuserID" id="lastuserID" value="" readonly="readonly" />
  <button type="submit" name="submit" id="submit">submit</button>
 </form>   
<!--================================
    END FOLLOWERS FEED AREA
=================================-->
@stop
@section('footer')
@parent
<script src="{{ asset('cdn/js/multiple-select.js') }}"></script>
<script type="text/javascript">jssor_1_slider_init();</script>
<script>
<!--Single Advertisement post script start-->
 $(document).ready(function(e) {
  $(document).on('submit',"#advertisement_post",(function(e) {
	 $('#postResult').html(" ");
	 $('#postsubmit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#lastuserID").val(" ");
	 e.preventDefault();
      $.ajax({
	  url: "<?php echo url("actionAjaxPost/adsPosthome"); ?>",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  $('#postResult').html(data); 
		  $('#postsubmit').html('&nbsp;Post').attr('disabled',false); 
		 var errorString = '';
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus == 400){
			  $.each(parsedJson.error, function(key , value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#postResult').html(errorString);
		   }
		  else if(parsedJson.vStatus == 500){
			  $('#postResult').html(parsedJson.success);
			  $("#lastuserID").val(parsedJson.lastID);
			  //$("#submit").click();
			   alert("We will Contact you Shortly .");
		    } 
		  else if(parsedJson.vStatus == 100){
		     $('#postResult').html(parsedJson.msg); 
		  }
	   }	
     });
  }));  
});
<!--Single Advertisement post script End-->
</script>
@stop
