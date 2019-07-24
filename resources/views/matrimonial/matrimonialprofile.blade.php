@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/multiple_autofill.css') }}"/>
@stop
@section('content')
<div id="pageContentSection">
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
                <a style="cursor:pointer;" onclick='section_changeurl("matrimonial/photos/<?php echo $mat_profile_details->enctype_id ?>" , "pageContentSection" , "pageContentSection")' class="btn btn-md btn--icon btn--round">Upload</a>
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
					<h4>About</h4>
					<h5>Brief about me: 
                      @if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a id="matAboutBtn"><span class="lnr lnr-pencil merticonsize"></span></a>
                      @endif 
                    </h5>
                    <div id="matAboutFormDiv" style="display:none;">
                    	<div class="matri_form_color">
                   			 <form class="form-horizontal" id="aboutProfileForm" >
                          <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                           <div class="form-group">
                                	<div class="col-sm-12">
                             <textarea cols="30" rows="3" placeholder="About Yourself" name="about_profile" id="about_profile" />@if($mat_profile_details->about_profile){{ $mat_profile_details->about_profile }} @endif</textarea>
                             </div>
                             </div>
                           <div class="" align="right">
                            <div id="aboutResponse"></div>
                            <button type="button" name="submit" id="saveAbout_profidleBtn"  class="btn btn-sm btn--icon">Save</button>
                           </div>
                        </form>
                        </div>
                        <hr />
                    </div>
					<p id="matProfileaboutData">@if($mat_profile_details->about_profile){{ $mat_profile_details->about_profile }} @endif</p>
		        <div class="row" id="familyDetailsDiv">
                 <div id="Family-Details" class="fdtail">
					<h5>Family Details:&nbsp;@if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a id="matrifmilybtn"><span class="lnr lnr-pencil merticonsize"></span></a>
                      @endif  </h5>
                      <div id="matrifmilyformDiv" style="display:none;">
                      	<div class="matri_form_color">
                   		<form class="form-horizontal" id="familyDetailsForm">
                            <?php echo csrf_field(); ?>
                              <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                                <div class="form-group">
                                	<div class="col-sm-12">
                                    <label>Family type </label>
                            			<div class="select-wrap select-wraplog select-wrap2">
	                                <select name="family_type" id="family_type" class="default">
	                                      @if(!empty($mat_profile_details->family_type)){
											<option value="{{ $mat_profile_details->family_type }}">{{ $mat_profile_details->family_type }}</option>
										  @endif	
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
	                                      @if(!empty($mat_profile_details->fathers_occupation)){
											<option value="{{ $mat_profile_details->fathers_occupation }}">{{ $mat_profile_details->fathers_occupation }}</option>
										  @endif
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
	                                     @if(!empty($mat_profile_details->mothers_occupation)){
											<option value="{{ $mat_profile_details->mothers_occupation }}">{{ $mat_profile_details->mothers_occupation }}</option>
										  @endif
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
                                      @if(!empty($mat_profile_details->brothers)){
											<option value="{{ $mat_profile_details->brothers }}">{{ $mat_profile_details->brothers }}</option>
									  @endif
                                    	<option value="None">None</option>
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
                                        @if(!empty($mat_profile_details->brother_married)){
											<option value="{{ $mat_profile_details->brother_married }}">{{ $mat_profile_details->brother_married }}</option>
									  @endif
                                         <option value="None">None</option>
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
                                      @if(!empty($mat_profile_details->sister)){
											<option value="{{ $mat_profile_details->sister }}">{{ $mat_profile_details->sister }}</option>
									  @endif
                                    	 <option value="None">None</option>
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
                                      @if(!empty($mat_profile_details->sister)){
										<option value="{{ $mat_profile_details->siste_married }}">{{ $mat_profile_details->siste_married }}</option>
									  @endif
                                    	<option value="None">None</option>
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
	                                <input type="text" id="family_living" name="family_living" placeholder="Family Living In ? " value="@if(!empty($mat_profile_details->family_living)){{ $mat_profile_details->family_living }} @endif" />
                            	    </div>
                                    <div class="col-sm-6">
                                      <label>Native city </label>
	                                   <input type="text" id="native_city" name="native_city" placeholder="Native City "  value="@if(!empty($mat_profile_details->native_city)){{ $mat_profile_details->native_city }} @endif"/>
                                   </div> 
                             </div>
                                <div class="form-group">
                             <div class="col-sm-12">
                                    <label>Contact Address</label>
                            			<textarea name="contact_address" id="contact_address" cols="3" rows="3" placeholder="Contact Address">@if(!empty($mat_profile_details->contact_address)) {{  $mat_profile_details->contact_address }} @endif</textarea>
                                    </div>
                                    </div>
                             	<div class="form-group">
                                	<div class="col-sm-12">
                                    <label>About My Family</label>
                            			<textarea name="about_family" id="about_family" cols="3" rows="3" placeholder="About Family">@if (!empty($mat_profile_details->about_family)){{  $mat_profile_details->about_family }} @endif</textarea> 
                                    </div>
                             </div>
                           <div class="" align="right">
                            <div id="family_details_response"></div>
                            <button type="submit" id="family_details_btn" name="submit" class="btn btn-sm btn--icon">Save</button>
                           </div>
                        </form>
                        </div>
                        <hr />
                      </div>
					<div class="form_but1">
						<label class="col-sm-3 control-label1">Family Type : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->family_type) ?  $mat_profile_details->family_type : "Not Specified "  }}
						</div>
						<div class="clearfix"> </div>
					</div>
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
                    <div class="form_but1">
						<label class="col-sm-3 control-label1">About Family : </label>
						<div class="col-sm-9 w3_details">
							{{ !empty($mat_profile_details->about_family) ? $mat_profile_details->about_family : "Not Specified "  }}	
						</div>
						<div class="clearfix"> </div>
					</div>
                </div>
                </div>
                <div class="row" id="educationDetailsDiv">
                <div id="Education-Details" class="fdtail">
					<h5>Education Details:
                     @if($mat_profile_details->user_id == session()->get('knpuser'))
                      <a id="matriEdubtn"><span class="lnr lnr-pencil merticonsize"></span></a>
                     @endif
                    </h5>
                    <div id="matriEduformDiv" style="display:none;">
                    	<div class="matri_form_color">
                            <form class="form-horizontal" id="educationDetailsForm">
                            <?php echo csrf_field(); ?>
                              <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
                                <div class="form-group">
                                	<div class="col-sm-6">
                                     <label for="Degree">Highest Degree</label>
                                          <input type="text" id="Degree" name="highest_degree" list="languages" placeholder="Highest Degree" value="@if(!empty($mat_profile_details->qualification)){{ $mat_profile_details->qualification  }}@endif">
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
                                       @if(!empty($mat_profile_details->annual_income))
                                         <option value="{{ $mat_profile_details->annual_income }}">{{ $annual_income[$mat_profile_details->annual_income] }}</option>
                                       @endif
	                                     <option value="1">No Income </option>
                                         <option value="2">Rs. 0 - 1 Lakh </option>
                                         <option value="3">Rs. 1 - 3 Lakh  </option>
                                         <option value="4">Rs. 3 - 5 Lakh  </option>
                                         <option value="5">Rs. 5 - 7 Lakh  </option>
                                         <option value="6">Rs. 7 Lakh  to above </option>
	                                </select>
	                                <span class="lnr lnr-chevron-down"></span>
                            	</div>
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Occupation </label>
                            			 <input type="text" id="Occupation" name="occupation" placeholder="Occupation" value="@if(!empty($mat_profile_details->occupation)){{ $mat_profile_details->occupation }} @endif" />
                                    </div>
                             </div>
                                <div class="form-group">
                             <div class="col-sm-12">
                                    <label>Express Yourself! </label>
                            			<textarea name="express_yourself" id="express_yourself" cols="3" rows="3">{{   !empty($mat_profile_details->express_yourself) ? $mat_profile_details->express_yourself : " "  }}	</textarea>
                                    </div>
                                    </div>
                           <div class="" align="right">
                              <div id="educationDetailsResponse"></div>
                            <button type="submit" name="submit" id="educationSavebtn" class="btn btn-sm btn--icon"> Save</button>
                           </div>
                        </form>
                        </div>
                        <hr />
                    </div>
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
							{{ !empty($mat_profile_details->annual_income) ? $annual_income[$mat_profile_details->annual_income] : "Not Specified "  }}	
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
                      <a id="desired_partner_btn"><span class="lnr lnr-pencil merticonsize"></span></a>
                      @endif</h5>
                     <div id="desired_partner_formDiv" style="display:none;">
                         <div class="matri_form_color">
                            <form class="form-horizontal" id="desired_partner">
                                 <?php echo csrf_field(); ?>
                                  <input type="hidden" name="mat_id" id="mat_id" value="@if(!empty($mat_profile_details->id)){{ $mat_profile_details->id }} @endif" readonly="readonly"  />
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
                                    <div class="" align="right">
                                    <span id="personalResponse"></span>
                                <button name="submit" type="submit" id="personal_submit" class="btn btn-sm btn--icon"> Save</button>
                               </div>
                            </form>
                         </div>
                         <hr />
                     </div>
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
</div>
@stop
@section('footer')
   @parent
<script src="{{ url('validationJS/matrimonial.js') }}"></script>
<script>
$(document).ready(function(e) {
  <!--Print Image in popup modal code start-->	\
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
 $(document).on('click','#mat_upload_profile',function(){
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
         // alert(response);
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

});
</script>   
   <script src="{{ asset('cdn/js/multiple_autofill.js')}}"></script>
   <!--education detail-->
   <script>
        $(function() {
            var dataSource = [
                {id: 1, firstName: 'Awaiting Divorce'},
                {id: 2, firstName: 'Never Married'},
                {id: 3, firstName: 'Divorced'},
                {id: 4, firstName: 'Widowed'},
                {id: 5, firstName: 'Annuled'},
            ];
            $('#Marital').magicsearch({
                dataSource: dataSource,
                fields: ['firstName'],
                id: 'id',
                format: '%firstName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
        });
		
		 $(function() {
            var dataSource = [
                {id: 1, firstName: 'Brahmin'},
                {id: 2, firstName: 'Brahmin Kanyakunj'},
                {id: 3, firstName: 'Gnosticism'},
				{id: 4, firstName: 'Hinduism'},
                {id: 5, firstName: 'Buddhism'},
                {id: 6, firstName: 'Sikhism'},
				{id: 7, firstName: 'Judaism'},
                {id: 8, firstName: 'Parsi'},
                {id: 9, firstName: 'Other'},
            ];
            $('#caste').magicsearch({
                dataSource: dataSource,
                fields: ['firstName'],
                id: 'id',
                format: '%firstName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
        });
		
		 $(function() {
            var dataSource = [
                {id: 1, firstName: 'Manglik'},
                {id: 2, firstName: 'Non - Manglik'},
                {id: 3, firstName: 'Anshik-Manglik'},
            ];
            $('#desired_manglik').magicsearch({
                dataSource: dataSource,
                fields: ['firstName'],
                id: 'id',
                format: '%firstName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
        });
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
<script>
$(document).ready(function(e) {
  <!---Mat_Personal_prodfile_details_edit-script start-->
  $(document).on('submit',"#matPersonal_profile_form",(function(e) {
	 //$('#cartSubmit').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	$('#personalResponse').html(" ")
	 e.preventDefault();
      $.ajax({
      url: base_url+"/matrimonial/mat_personal_profile",	  
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		alert(data);
		//$('#personalResponse').html(data)
	   }	
     });
  }));
  <!---Mat_Personal_prodfile_details_edit-script End-->
  <!--Get_State_script_start--> 
   $(document).on('change','#country',function(){
	var country = $('#country').val();
	if(country != 0){
	   $.ajax({
	      url:"<?php echo url("matrimonialAjax/getState"); ?>",
		  type:"GET",
		  data:{country:country},
		  dataType:'json',
		  success: function(data){
			var html_code = ' ';
			   html_code += '<option value=0>--Select--State--</option>';
			   $.each(data, function (index, value) {
               	  html_code += '<option value="'+ value.id +"/"+ value.name +'">'+ value.name+'</option>';
                });
		      $("#state").html(html_code);
		  }
	   });
	 }
	else{
	   alert("Please Select Valid Country ! .")
	 }  
  });   
  <!--Get_State_script_End--> 
  <!--Get_getCity_script_start--> 
  $(document).on('change','#state',function(){
	var state = $('#state').val();
	if(state != 0){
	   $.ajax({
	      url:"<?php echo url("matrimonialAjax/getCity"); ?>",
		  type:"GET",
		  data:{state:state},
		  dataType:'json',
		  success: function(data){
			   var html_code = ' ';
			   html_code += '<option value=0>--Select--City--</option>';
			   $.each(data, function (index, value) {
               	 html_code += '<option value="'+ value.id +"/"+ value.name +'">'+ value.name+'</option>';
                });
		       $("#city").html(html_code);
		  }
	   });
	 }
	else{
	   alert("Please Select Valid State ! .")
	 }  
  });   
  <!--Get_getCity_script_End--> 
});
</script>
<script>
$(document).ready(function(e) {
  $(document).on('click','#matAboutBtn',function(){
    $('#matAboutFormDiv').slideToggle('fast');
  }); 
});
$(document).ready(function(e) {
  $(document).on('click','#matrifmilybtn',function(){
    $('#matrifmilyformDiv').slideToggle('fast');
  }); 
});
$(document).ready(function(e) {
  $(document).on('click','#matriEdubtn',function(){
    $('#matriEduformDiv').slideToggle('fast');
  }); 
});
$(document).ready(function(e) {
  $(document).on('click','#desired_partner_btn',function(){
    $('#desired_partner_formDiv').slideToggle('fast');
  }); 
});
</script>

@stop
