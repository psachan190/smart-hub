@include("kanpur.layout.header")
<section class="cart_area section--padding2 bgcolor">
        <div class="container">
            <div class="row orderrow cardify login">
              <div class="col-sm-12">
              <h2 class="headingMain">Edit Your Post Ads <strong><small>(Post Date :- @php $timestamp = strtotime($resultAdsData->created_at); $dateTime = date('d-M-Y , h:i:s a', $timestamp); @endphp {{ $dateTime }} )</small></strong></h2>
              <meta name="csrf-token" content="{{ csrf_token() }}" />
              <div id="showAdsImg">
             <img id="img-upload1" src="<?php $image = $resultAdsData->image; echo url("uploadFiles/vendorAdspost/$image"); ?>" class="img img-responsive" />
          </div> 
              <form id="editSingleAdsimageform" name="editSingleAdsimageform">
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
                                                Browse banner Image… <input  type="file" id="imgInp1" name="adsImage" />
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
                        <input type="text" name="startDate" id="datepicker1"  placeholder="Click for select date" value="<?php if(!empty($resultAdsData->startDate))echo $resultAdsData->startDate; ?>" readonly="readonly" />
               </div>
                </div>
                <div class="col-sm-6 ">
                <label>Last Date&nbsp;<span class="prafontanswerstar">*</span></label>
                <div class="left-inner-addon">
                           <i class="lnr lnr-calendar-full"></i>
                        <input type="text" name="endDate" id="datepicker2" placeholder="Click for select date" value="<?php if(!empty($resultAdsData->startDate))echo $resultAdsData->startDate; ?>" readonly="readonly" />
               </div>
                </div>
              </div>
               <div class="row" style="margin-top:25px;">
                 <div class="col-md-12">
                                       <div class="custom_checkbox form-check">
                                          <input type="checkbox" name="filtration" id="filtration" value="no" />&nbsp;
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
                               <input type="radio" id="1" class="addresType" name="gender" value="1" >
                               <label for="1"><span class="circle"></span>Male</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" id="2" class="addresType" name="gender" value="2" />
                                <label for="2"><span class="circle"></span>Female</label>
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
                            <input type="checkbox" name="profession[]" id="first" value="1" />&nbsp;
                             <label for="first">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;STUDENT</span>
                             </label>
                          </div>
                        </div>
                                         <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="second" value="2" />&nbsp;
                             <label for="second">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;BUSINESS MAN</span>
                             </label>
                          </div>
                        </div>
                                         <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="third" value="3" />&nbsp;
                             <label for="third">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;SALARIED</span>
                             </label>
                          </div>
                        </div>
                                         <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="fourth" value="4" />&nbsp;
                             <label for="fourth">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;HOUSE WIFE</span>
                             </label>
                          </div>
                        </div>
                                         <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="profession[]" id="fifth" value="5" />&nbsp;
                             <label for="fifth">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;LOOKING FOR OPPORTUNITY</span>
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
                <div class="col-sm-12">
                <div class="form-group">
              <button type="submit" name="submit" id="savePost" class="btn btn--md btn--round"><i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit Post Ads</button>  
            </div>
                </div>
              </div>                 
         </form>
              </div>
            </div>
          <div id="postResult"></div>
         <div id="someDivToDisplayErrors"></div>
    </section>       
@include("kanpur.layout.footer")  
<script src="{{ asset('js/multiple-select.js') }}"></script>
<script src="{{ url('editor/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ url('editor/editorBox.js') }} "></script>
<script>
$(document).ready(function(e) {
 var filterationCopy = $("#filtrationCopy").val();
 if(filterationCopy=="yes"){
     $("#filtration").attr('checked',true);
	 $("#filtrationBlog").show();
   } 
<!--gender checked in edit post data start-->
var filterationCopy = $("#genderCopy").val();
$("#"+ filterationCopy).attr('checked',true);
 <!--gender checked in edit post data End-->
});
<!------>
</script>