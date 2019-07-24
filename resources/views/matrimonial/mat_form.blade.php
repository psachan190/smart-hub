<!-- matri about-->
<style>
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
</style>
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="matriabout" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body pupopzoom">
                     <div class="boxed-body signin-area">
                        <form class="form-horizontal" id="aboutProfileForm" >
                          <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Brief <span class="base-color">about me</span></h4>
                           </div>
                           <div class="form-group">
                                	<div class="col-sm-12">
                             <textarea cols="30" rows="3" placeholder="About Yourself" name="about_profile" id="about_profile">@if($mat_profile_details->about_profile){{ $mat_profile_details->about_profile }} @endif</textarea>
                             </div>
                             </div>
                           <div class="" align="center">
                            <div id="aboutResponse"></div>
                            <button type="button" name="submit" id="about_profidleBtn"  class="btn btn-sm btn--icon btn--round">About Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--upload image-->
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="uploadimages_upload" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body pupopzoom">
                     <div class="boxed-body signin-area">
                     		<div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Upload <span class="base-color">Image</span></h4>
                           </div>
                          <div class="row"> 
                          	<div class="col-sm-12">
                               <form id="mat_profile_image">
                                 <?php echo csrf_field(); ?>
                                <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                                <input type="hidden" name="user_id" id="user_id" value="@if(!empty($mat_profile_details->user_id)){{ $mat_profile_details->user_id }} @endif" readonly="readonly"  />
                                <div class="normal-padding">
                                <label class="newbtn"> <span class="textprsocial"><span class="lnr lnr-camera buttondefault"></span>
                                <input name="mat_profileImage" onchange="readURL(this);" id="mat_profileImage" type="file" /></span></label>
                                 <button type="submit" name="mat_profile_btnUpload" id="mat_profile_btnUpload" class="btn btn-sm btn--icon btn--round" style="float:right;"><span class="lnr lnr-upload"></span> Upload</button>
                               </div>
                               </form>
                               </div>
                          </div> 
                          <div class="row" style="margin-top:20px;">
		                     <div class='list-group gallery'>
                              <div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
                                <div id="image_upload_response"></div>
                              </div> 
                             </div> 
	                        </div>
                          <div class="row" style="margin-top:20px;">
		                     <div class='list-group'>
                              <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                <a class="fancybox thumbnail" rel="ligthbox" href="#">
                    <img id="blah" class="imgmatricover" alt="" src="http://placehold.it/320x320" />
                </a>
            </div> 
                             </div>
                          </div>
                          <div class="row" style="margin-top:20px;" id="profile_gallery">
		                     
                          </div> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--upload image-->
<!--Desired partner details form-->
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="desired_partner" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body pupopzoom">
                     <div class="boxed-body signin-area">
                        <form class="form-horizontal" id="desired_partner">
                             <?php echo csrf_field(); ?>
                              <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                                <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Desired Partner Profile <span class="base-color">Details</span></h4>
                           </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Religion  </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="desired_religion" id="desired_religion" class="default">
	                                    <option value="Hinduism">Hinduism </option>
                                        <option value="Islam">Islam</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Gnosticism">Gnosticism</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Buddhism">Buddhism</option>
                                        <option value="Sikhism">Sikhism</option>
                                        <option value="Judaism">Judaism</option>
                                        <option value="Parsi">Parsi</option>
                                        <option value="9">Other</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Caste</label>
                                    <input name="desired_manglik" class="magicsearch" id="caste" placeholder="search Caste...">
                                    </div>
                               </div>
                             	
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Subname/Sirname </label>
                            			 <input type="text" id="desired_subname" name="desired_subname" placeholder="Subname/Sirname" />
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Manglik ? </label>
                                    <input name="desired_manglik" class="magicsearch" id="desired_manglik" placeholder="search Manglik Status...">
                                    </div>
                             </div>
                                <div class="form-group">
                                  <div class="col-sm-6">
                                    <label>Marital Status </label>
                            			<input class="magicsearch" id="Marital" placeholder="search Marital Status...">
                                    </div>
                                  <div class="col-sm-6">
                                    <label>Height </label>
                                    <div class="select-wrap select-wraplog select-wrap2">
                            		<select name="desired_height" id="desired_height" class="default">
	                                      <option value="1">5.5</option>
                                          <option value="2">6.5</option>
                                          <option value="3">7.5</option>
	                                </select>
                                    <span class="lnr lnr-chevron-down"></span>
                            	   </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-6">
                                    <label>Age </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="desired_age" id="desired_age" class="default">
                                       <?php 
									    for($i=18; $i < 50; $i++){
										     ?>
											 <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
											 <?php
										   }
									   ?>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                  <div class="col-sm-6">
                                    <label>Education</label>
                                 	 <input type="text" id="desired_education" name="desired_education" placeholder="Income" />
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <label>Income </label>
                            		  <input type="text" id="desired_income" name="desired_income" placeholder="Income" />
	                            </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <label>Occupation</label>
                                     <input type="text" id="desired_occupation" name="desired_occupation" placeholder="Occupation" />
                                </div>
                                </div>
                                <div class="" align="center">
                                <span id="personalResponse"></span>
                            <button name="submit" type="submit" id="personal_submit" class="btn btn-sm btn--icon btn--round"> Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
<!--Desired partner details End-->
<!--profile details-->
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="profiledetails" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body pupopzoom">
                     <div class="boxed-body signin-area">
                        <form class="form-horizontal" id="matPersonal_profile_form">
                             <?php echo csrf_field(); ?>
                              <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                                <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Profile <span class="base-color">Details</span></h4>
                           </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Religion  </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="religion" id="religion" class="default">
	                                    <option value="1">Hinduism </option>
                                        <option value="2">Islam</option>
                                        <option value="3">Christianity</option>
                                        <option value="4">Gnosticism</option>
                                        <option value="5">Hinduism</option>
                                        <option value="6">Buddhism</option>
                                        <option value="7">Sikhism</option>
                                        <option value="8">Judaism</option>
                                        <option value="8">Parsi</option>
                                        <option value="9">Other</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Caste</label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="caste" id="caste" class="default">
	                                     <option value="1">Aggarwal </option>
                                        <option value="2">Brahmin</option>
                                        <option value="3">Brahmin Kanyakunj</option>
                                        <option value="4">Gnosticism</option>
                                        <option value="5">Hinduism</option>
                                        <option value="6">Buddhism</option>
                                        <option value="7">Sikhism</option>
                                        <option value="8">Judaism</option>
                                        <option value="8">Parsi</option>
                                        <option value="9">Other</option>
	                               </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                               </div>
                             	
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Subname/Sirname </label>
                            			 <input type="text" id="subname" name="subname" placeholder="Subname/Sirname" />
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Are u manglik ? </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="manglik" id="manglik" class="default">
	                                      <option value="1">Manglik</option>
                                          <option value="2">Non - Manglik</option>
                                          <option value="3">Anshik-Manglik</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                             </div>
                                <div class="form-group">
                                  <div class="col-sm-6">
                                    <label>Marital Status </label>
                                      <input class="magicsearch" id="Marital" placeholder="search names...">
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="married_status" id="married_status" class="default">
                                        <option value="Never Married">Never Married </option>
                                        <option value="Awaiting Divorce">Awaiting Divorce</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Annuled">Annuled</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                  <div class="col-sm-6">
                                    <label>Horoscope Match ? </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="horoscope_match" id="horoscope_match" class="default">
	                                    <option value="Yes">Yes</option>
                                        <option value="No">No</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Height </label>
                                    <div class="select-wrap select-wraplog select-wrap2">
                            		<select name="height" id="height" class="default">
	                                      <option value="1">5.5</option>
                                          <option value="2">6.5</option>
                                          <option value="3">7.5</option>
	                                </select>
                                    <span class="lnr lnr-chevron-down"></span>
                            	   </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Country</label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="country" id="country" class="default">
	                                  <option value=0>--Select--Country--</option>
                                     @if($country != FALSE)
                                       @foreach($country as $countryArr)
                                         <option value="@if(!empty($countryArr->id)) {{ $countryArr->id .'/'.$countryArr->name }} @endif">@if(!empty($countryArr->id)) {{ $countryArr->name }} @endif</option>
                                       @endforeach
                                     @endif
                                    </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                             </div>
                                <div class="form-group">
                                  <div class="col-sm-6">
                                    <label>State</label>
                            		  <div class="select-wrap select-wraplog select-wrap2">
	                                <select name="state" id="state" class="default">
	                                  <option value=0>--First--Select--Country--</option>
                                    </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                  <div class="col-sm-6">
                                    <label>City</label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="city" id="city" class="default">
	                                       <option value=0>--First--Select--State--</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <label>Pincode</label>
                            	    <input type="text" id="pincode" name="pincode" placeholder="Pincode " value="  @if($mat_profile_details->pincode){{ $mat_profile_details->pincode  }} @endif" />
                            	</div>
                                    </div>
                                </div>
                                <div class="" align="center">
                                <span id="personalResponse"></span>
                            <button name="submit" type="submit" id="personal_submit" class="btn btn-sm btn--icon btn--round"> Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<!--profile details-->
<!-- matri about-->
<!--family detail-->
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="matrifmilydetail" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body pupopzoom">
                     <div class="boxed-body signin-area">
                        <form class="form-horizontal" id="familyDetailsForm">
                            <?php echo csrf_field(); ?>
                              <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Family <span class="base-color">Details</span></h4>
                           </div>
                                <div class="form-group">
                                	<div class="col-sm-12">
                                    <label>Family type </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="family_type" id="family_type" class="default">
	                                    <option value="Join Family">Join Family</option>
                                        <option value="Nuclear Family">Nuclear Family </option>
                                        <option value="Others">Others</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Father's Occupation </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                  <select name="fathers_occupation" id="fathers_occupation" class="default">
	                                     <option value="Business / Entrepereneur">Business / Entrepereneur</option>
                                         <option value="Service Private">Service Private</option>
                                         <option value="Service / Goverment / PSU">Service / Goverment / PSU</option>
                                         <option value="Army  / Armed Force">Army  / Armed Force</option>
                                         <option value="Service / Goverment / PSU">Service / Goverment / PSU</option>
	                                  </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Mother's Occupation </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="mothers_occupation" id="mothers_occupation" class="default">
	                                    <option value="House Wife">House Wife</option>
                                         <option value="Business / Entrepereneur">Business / Entrepereneur</option>
                                         <option value="Service Private">Service Private</option>
                                         <option value="Service / Goverment / PSU">Service / Goverment / PSU</option>
                                         <option value="Army  / Armed Force">Army  / Armed Force</option>
                                         <option value="Service / Goverment / PSU">Service / Goverment / PSU</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                </div>
                             	<div class="form-group">
                                    <div class="col-sm-6">
                                    <label>Brother </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="brotehrs" id="brotehrs" class="default">
                                    	<option value="0">0</option>
	                                     <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="more than 4">Above more than 4</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>How Many Brother's Married ?</label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="brotehrs_married" id="brotehrs_married" class="default">
                                         <option value="0">0</option>
	                                     <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="more than 4">Above more than 4</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                             </div>
                             	<div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Sister </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="sister" id="sister" class="default">
                                    	 <option value="0">0</option>
	                                     <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="more than 4">Above more than 4</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                	<div class="col-sm-6">
                                    <label>How Many Sister's Married ?</label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select id="sister_married" name="sister_married" class="default">
                                    	<option value="0">0</option>
	                                     <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="more than 4">Above more than 4</option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                             </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Family Living in </label>
	                                <input type="text" id="family_living" name="family_living" placeholder="Family Living In ? " />
                            	    </div>
                                    <div class="col-sm-6">
                                      <label>Native city </label>
	                                   <input type="text" id="native_city" name="native_city" placeholder="Native City " />
                                   </div> 
                             </div>
                                <div class="form-group">
                             <div class="col-sm-12">
                                    <label>Contact Address</label>
                            			<textarea name="contact_address" id="contact_address" cols="3" rows="3"></textarea>
                                    </div>
                                    </div>
                             	<div class="form-group">
                                	<div class="col-sm-12">
                                    <label>About My Family</label>
                            			<textarea name="about_family" id="about_family" cols="3" rows="3"></textarea> 
                                    </div>
                             </div>
                           <div class="" align="center">
                            <button type="submit" id="about_family" name="about_family" class="btn btn-sm btn--icon btn--round"> Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--family detail-->
<!--education detail-->
<div class="gal-container nopadding">
   <div class="col-md-12 col-sm-12 co-xs-12">
      <div class="boximg formseller">
         <div class="modal modalngo fade" id="matriedudetail" tabindex="-1" role="dialog">
            <div class="modal-dialog mobilengo" role="document">
               <div class="modal-content popupsize1">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="modal-body pupopzoom">
                     <div class="boxed-body signin-area">
                        <form class="form-horizontal" id="educationDetailsForm">
                            <?php echo csrf_field(); ?>
                              <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                           <div class="widgetngo__heading">
                              <h4 class="widgetngo__title">Education <span class="base-color">Details</span></h4>
                           </div>
                                <div class="form-group">
                                	<div class="col-sm-6">
                                     <label for="Degree">Highest Degree</label>
                                          <input type="text" id="Degree" list="languages" placeholder="Highest Degree">
                                          
                                          <datalist id="languages">
                                            <option value="MBA">
                                            <option value="MCA">
                                            <option value="BCA">
                                            <option value="BBA">
                                            <option value="BA">
                                            <option value="MA">
                                            <option value="MBA">
                                            <option value="B.Tech">
                                            <option value="M.Tech">
                                            <option value="B.Sc">
                                            <option value="M.Sc">
                                            <option value="B.Pharma">
                                            <option value="B.Ed">
                                          </datalist>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>College Name </label>
                            			<input type="text" id="college_name" name="college_name" placeholder="College Name" value="{{   !empty($mat_profile_details->collage_name) ? $mat_profile_details->collage_name : " "  }}" />
                                    </div>
                             </div>
                             	<div class="form-group">
                                	<div class="col-sm-6">
                                    <label>Annual Income </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="annual_income" id="annual_income" class="default">
	                                     <option value="No Income">No Income </option>
                                         <option value="Rs. 0 - 1 Lakh ">Rs. 0 - 1 Lakh  </option>
                                         <option value="Rs. 1 - 2 Lakh">Rs. 1 - 2 Lakh  </option>
                                         <option value="Rs. 2 - 3 Lakh ">Rs. 2 - 3 Lakh  </option>
                                         <option value="Rs. 3 - 4 Lakh ">Rs. 3 - 4 Lakh  </option>
                                         <option value="Rs. 4 Lakh  to above">Rs. 4 Lakh  to above </option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Occupation </label>
                            			 <input type="text" id="Occupation" name="occupation" placeholder="Occupation" />
                                    </div>
                             </div>
                                <div class="form-group">
                             <div class="col-sm-12">
                                    <label>Express Yourself! </label>
                            			<textarea name="express_yourself" id="express_yourself" cols="3" rows="3">{{   !empty($mat_profile_details->express_yourself) ? $mat_profile_details->express_yourself : " "  }}	</textarea>
                                    </div>
                                    </div>
                           <div class="" align="center">
                            <button type="submit" name="submit" id="submit" class="btn btn-sm btn--icon btn--round"> Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
