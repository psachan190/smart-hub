@extends("layout")
@section('content')
<section class="cart_area section--padding2 bgcolor">
        <div class="container">
            <div class="row orderrow cardify login">
              <div class="col-sm-12">
              <h2 class="headingMain">Edit Your Post Ads <strong><small>(Post Date :- @php $timestamp = strtotime($resultAdsData->created_at); $dateTime = date('d-M-Y , h:i:s a', $timestamp); @endphp {{ $dateTime }} )</small></strong></h2>
              <meta name="csrf-token" content="{{ csrf_token() }}" />
              <div id="showAdsImg">
             <img id="img-upload1" src="<?php $image = $resultAdsData->image; echo url("uploadFiles/vendorAdspost/$image"); ?>" class="img img-responsive" />
          </div> 
              <form id="editSingleAdvertisement_form" name="editSingleAdsimageform">
            <?php echo csrf_field(); ?>
               <input type="hidden" name="editID" value="<?php if(!empty($resultAdsData->id))echo $resultAdsData->id; ?>" readonly />
                  <input type="hidden" name="postType" id="postType" value="2" readonly />
                <input type="hidden" name="filtrationCopy" id="filtrationCopy" value="<?php if(!empty($resultAdsData->applyFilteration))echo $resultAdsData->applyFilteration; ?>" readonly="readonly" />
                <input type="hidden" class="" name="imageNameCopy" id="imageNameCopy" value="<?php echo $image; ?>" readonly>
                <input type="hidden" class="" name="genderCopy" id="genderCopy" value="<?php if(!empty($resultAdsData->gender))echo $resultAdsData->gender; ?>" readonly="readonly">
               <div class="form-group">
                                    <label>Upload banner Image <span style="color:red
                                    ;">(dimension must be:- 1800*600 px . )</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-md btn-file">
                                                Browse banner Image… <input  type="file" id="imgInp1" name="postImage" />
                                            </span>
                                        </span>
                                        <input type="text" class="uploader1" name="imageName" id="imageName" value="<?php echo $image; ?>" readonly>
                                    </div>
                             	</div>
               <div class="row" style="margin-top:25px;">
                <div class="col-sm-6 ">
                <label>Start Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="lnr lnr-calendar-full"></i>
                        <input type="text" name="startDate" id="datepicker1"  placeholder="Click for select date" value="<?php if(!empty($resultAdsData->startDate))echo date('d-M-Y' , $resultAdsData->startDate); ?>" readonly="readonly" />
               </div>
                </div>
                <div class="col-sm-6 ">
                <label>Last Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="lnr lnr-calendar-full"></i>
                        <input type="text" name="endDate" id="datepicker2" placeholder="Click for select date" value="<?php if(!empty($resultAdsData->endDate))echo date('d-M-Y' , $resultAdsData->endDate); ?>" readonly="readonly" />
               </div>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                 <div class="col-md-12">
                                       <div class="custom_checkbox form-check">
                                          <input type="checkbox" name="filtration" id="filtration" value="1" />&nbsp;
                                         <label for="filtration">
                                           <span class="shadow_checkbox"></span>
                                           <span class="radio_title catnamebox">&nbsp;Apply Filters</span>
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
                             <?php if(!empty($resultAdsData->ageFrom)){ ?>
							  <option value="<?php if(!empty($resultAdsData->ageFrom))echo $resultAdsData->ageFrom; ?>"><?php if(!empty($resultAdsData->ageFrom))echo $resultAdsData->ageFrom; ?></option>
							 <?php }
							  ?>
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
                              <?php if(!empty($resultAdsData->ageTo)){ ?>
							  <option value="<?php if(!empty($resultAdsData->ageTo))echo $resultAdsData->ageTo; ?>"><?php if(!empty($resultAdsData->ageTo))echo $resultAdsData->ageTo; ?></option>
							 <?php }
							  ?>
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
                               <input type="radio" id="1" class="addresType" name="gender" value="1" >
                               <label for="1"><span class="circle"></span>Male</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" id="2" class="addresType" name="gender" value="2" />
                                <label for="2"><span class="circle"></span>Female</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" id="3" class="addresType" name="gender" value="3" />
                                <label for="3"><span class="circle"></span>Both</label>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-12 col-xs-12">
                                      <strong>Profession</strong>
                                        <div class="row">
                                   <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="student" id="first" value="1" <?php if(!empty($resultAdsData->student)) { echo 'checked="checked"'; }?> />&nbsp;
                                     <label for="first">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Student </span>
                                     </label>
                                  </div>
                                </div>
                                                  <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="business" id="second" value="3"  <?php if(!empty($resultAdsData->business)) { echo 'checked="checked"'; }?>  />&nbsp;
                                     <label for="second">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Business Man</span>
                                     </label>
                                  </div>
                                </div>
                                                  <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="salaried" id="third" value="3" <?php if(!empty($resultAdsData->salaried)) { echo 'checked="checked"'; }?>  />&nbsp;
                                     <label for="third">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;Salaried </span>
                                     </label>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="housewife" id="fourth" value="4" <?php if(!empty($resultAdsData->housewife)) { echo 'checked="checked"'; }?>  />&nbsp;
                                     <label for="fourth">
                                       <span class="shadow_checkbox"></span>
                                       <span class="radio_title catnamebox">&nbsp;House Wife</span>
                                     </label>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="custom_checkbox form-check">
                                    <input type="checkbox" name="looking_opp" id="fifth" value="5" <?php if(!empty($resultAdsData->looking_opportunity)) { echo 'checked="checked"'; }?>  />&nbsp;
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
                  <textarea name="postDescription" id="myTextarea1"><?php if(!empty($resultAdsData->description)) echo $resultAdsData->description; ?></textarea>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                <div id="postResult"></div>
                <div id="someDivToDisplayErrors"></div>
                <div class="col-sm-12">
                <div class="form-group">
              <button type="submit" name="submit" id="savePost" class="btn btn--md btn--round"><i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit Post Ads</button>  
            </div>
                </div>
              </div>                 
         </form>
              </div>
            </div>
    </section>     
@stop
      
@section("footer")  
 @parent
<script>
$(document).ready(function(e) {
 var filterationCopy = $("#filtrationCopy").val();
 if(filterationCopy == 1){
     $("#filtration").attr('checked',true);
	 $("#filtrationBlog").show();
   } 
<!--gender checked in edit post data start-->
var genderCopy = $("#genderCopy").val();
$("#"+genderCopy).attr('checked',true);
 <!--gender checked in edit post data End-->
});
<!------>
<!--Edit single AdsPAckage form script start-->
$(document).ready(function(e) {
	//editSingleAdsimageform
 $(document).on('submit',"#editSingleAdvertisement_form",(function(e) {
	 $('#postResult').html(" ");
	 $('#savePost').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 $("#lastuserID").val(" ");
	 //alert("yes");
	 e.preventDefault();
      $.ajax({
	  url: "<?php echo url("actionAjaxPost/editkanpurizeUserAdsPost"); ?>",
	  //url: base_url+"/editkanpurizeUserAdsPost",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  $('#postResult').html(data); 
		  $('#savePost').html('&nbsp;Edit Post Ads`').attr('disabled',false); 
		 var errorString = '';
		  var parsedJson = jQuery.parseJSON(data);
		  if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function(key,value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
			  $('#postResult').html(errorString);
		   }
		  else if(parsedJson.vStatus==100){
			  $('#postResult').html(parsedJson.msg);
			  //$("#lastuserID").val(parsedJson.lastID);
			  //$("#submit").click();
			   alert("Advertisement Update Successfully , We will Contact you Shortly .");
		    } 
		  else{
		     $('#postResult').html(parsedJson.error); 
		    
		  }
	   }	
     });
  }));
});
<!--Edit single AdsPAckage form script End-->

</script>
@stop