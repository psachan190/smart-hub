@extends("layout")
@section('content')
<div id="statusBox">
	<input type="hidden" name="dontgst" id="dontgst" value="<?php if(!empty($businessDetails->dontgst)) echo $businessDetails->dontgst; ?>" readonly="readonly" />
	<input type="hidden" name="adminbusinessStatus" id="adminbusinessStatus" value="<?php if(!empty($vendorData->adminStatus)) echo $vendorData->adminStatus; ?>" readonly="readonly" />
	<input type="hidden" name="vendorshopImageStatus" id="vendorshopImageStatus" value="<?php if(!empty($vendorData->cImageStatus)) echo $vendorData->cImageStatus; ?>" readonly="readonly" />
	<input type="hidden" name="adminshopImageStatus" id="adminshopImageStatus" value="<?php if(!empty($vendorData->imageStatus)) echo $vendorData->imageStatus; ?>" readonly="readonly" />
	<input type="hidden" name="paymentMode1" id="paymentModefirst" class="" value="<?php if(!empty($selectedPaymentMode->advanceforDelivery))echo $selectedPaymentMode->advanceforDelivery; ?>" />
	<input type="hidden" name="paymentMode2" id="paymentModesecond" class="" value="<?php if(!empty($selectedPaymentMode->advancedforPickup))echo $selectedPaymentMode->advancedforPickup; ?>" />
	<input type="hidden" name="paymentMode3" id="paymentModethird" class="" value="<?php if(!empty($selectedPaymentMode->payatDelivery))echo $selectedPaymentMode->payatDelivery; ?>" />
	<input type="hidden" name="paymentMode4" id="paymentModefourth" class="" value="<?php if(!empty($selectedPaymentMode->payatPickup))echo $selectedPaymentMode->payatPickup; ?>" />
	<script>
		var imageExtArr = ['jpg','jpeg','png','pdf'];
	</script>
</div>
<section class="breadcrumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="breadcrumb">
					<ul>
						<li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
						<li class="active"><a href="#">Welcome to Seller Hub!</a></li>
					</ul>
				</div>
				<h1 class="page-title">Welcome to Seller Hub!</h1>
			</div>
			<div class="col-md-4">
				<div class="breadcrumb">
					<div class="btn-group">
						<button class="btn btn-md disabled">
						<i class="fa fa-share-alt fa-lg sharesocial"></i></button>
						<a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>" class="btnsocialshare btn btn-md" target="_blank" title="On Facebook" href="#">
						<i class="fa fa-facebook fa-lg fb"></i>
						</a>
						<a href="https://plus.google.com/share?url=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>" class="btnsocialshare btn btn-md" target="_blank" title="On Google Plus" href="#">
						<i class="fa fa-google-plus fa-lg google"></i>
						</a>
						@if($device_type == "D")
						<a href="https://web.whatsapp.com/send?text=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>" class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp" href="#">
						<i class="fa fa-whatsapp fa-lg fb"></i>
						</a>
						@else
						<a href="whatsapp://send?text=<?php if(!empty($share_webshopurl))echo $share_webshopurl; ?>" class="btnsocialshare btn btn-md" target="_blank" title="On Whatsapp" href="#">
						<i class="fa fa-whatsapp fa-lg fb"></i>
						</a>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- end /.row -->
	</div>
	<!-- end /.container -->
</section>
<div class="service">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 text-center">
				@if(isset($_GET['paysuccess']))
				<p style='color:green'><strong>Payment for Web Shop Complete</strong></style></p>
				@endif 
				@if(isset($_GET['failed']))
				<p style='color:red'><strong>Payment for your webshop failed . Please try again .</strong></style></p>
				@endif 
				<p>Complete your profile to start selling on Kanpurize</p>
			</div>
		</div>
		<div class="service-icon">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
				<div class="vendorbord">
					<div class="square-feature">
						<img class="deshicon" src="{{ asset('cdn/images/icon/business_detail.png') }}"  />
					</div>
					<h2 class="tib">Business Details</h2>
					<p>Please provide your GSTIN, PAN and other business information.</p>
					<hr>
					<a class="addlist" data-toggle="modal" data-target="#business" id="addBusinessDetails">Add Details</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
				<div class="vendorbord">
					<div class="square-feature">
						<img class="deshicon" src="{{ asset('cdn/images/icon/deshbank.png') }}"  />
					</div>
					<h2 class="tib">Bank Details</h2>
					<p>Please provide your bank account details and KYC documents for verification </p>
					<hr>
					<a id="bankDetails" class="addlist">Add Details</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
				<div class="vendorbord">
					<div class="square-feature text-center">
						<img class="deshicon" src="{{ asset('cdn/images/icon/deshstore.png') }}"  />
					</div>
					<h2 class="tib">Store Details</h2>
					<p>Please provide to update your display name and business description.<br></p>
					<hr>
					<a class="addlist" data-toggle="modal" data-target="#shop">Add Details</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row" style="margin-top:50px;">
		</div>
		<div class="service-icon">
			@if(empty($vendorData->paymentStatus) || $vendorData->paymentStatus != "Y")
			<div id="payForwebShop">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
					<div class="vendorbord">
						<div class="square-feature text-center">
							<img class="deshicon" src="{{ asset('cdn/images/icon/deshpay.png') }}"  />
						</div>
						<h2 class="tib">Payment For Registration</h2>
						<p>Please make your Payment for to open your Web Shop <br></p>
						<hr>
						<form action="<?php echo url("payforWebshop"); ?>" method="GET">
							<input type="hidden" value="<?php if(!empty($vendorData->vName)) echo $vendorData->vName; ?>" id="payshopname" name="payshopname" />
							<input type="hidden" value="<?php if(!empty($vendorData->id)) echo $vendorData->id; ?>" id="payshopnameID" name="payshopnameID" />
							<input type="hidden" value="<?php if(!empty($vendorData->vEmail)) echo $vendorData->vEmail; ?>" id="payshopEmail" name="payshopEmail" />
							<input type="hidden" value="<?php if(!empty($vendorData->vMobile)) echo $vendorData->vMobile; ?>" id="payshopMobile" name="payshopMobile" />
							<a href="#" id="paymentProceed" name="paymentProceed">Proceed</a>
							<!--
								<button class="addlist payaddbutton" type="submit" name="submit" id="submit">Proceed</button> -->
						</form>
					</div>
				</div>
			</div>
			@endif
			@if($vendorData->businesscategoryType != 2)
			<div id="paymentBlog">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
					<div class="vendorbord">
						<div class="square-feature text-center">
							<img class="deshicon" src="{{ asset('cdn/images/icon/paymode.png') }}"  />
						</div>
						<h2 class="tib">Payment Mode for Web Shop</h2>
						<p>Please Select the Payment Modes for your Web Shop.<br></p>
						<hr>
						<a class="addlist addAuthority" data-toggle="modal" data-target="#addAuthority">Add Payment Mode</a>
					</div>
				</div>
			</div>
			@endif
			<div id="storeBlog">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
					<div class="vendorbord">
						<div class="square-feature text-center">
							<img class="deshicon" src="{{ asset('cdn/images/icon/addlistdesh.png') }}"  />
						</div>
						<h2 class="tib">Add Listings</h2>
						<p>Please Add Minimum 1 listings to activate your account.<br></p>
						<hr>
						@if($vendorData->paymentStatus=="Y")
						@php
						$username = $vendorData->username;
						@endphp
						<a href='{{ url("vendor/$username/category_list") }}' class="addlist">Create your Shop</a>
						@else
						<a href='#' class="addlist appOpen">Create your Shop</a>
						@endif
					</div>
				</div>
			</div>
			@if($vendorData->coupon == 'Y')
			<div id="paymentBlog">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
					<div class="vendorbord">
						<div class="square-feature text-center">
							<img class="deshicon" src="{{ asset('cdn/images/icon/paymode.png') }}"  />
						</div>
						<h2 class="tib">Coupon Management</h2>
						<p>Daily offers, Coupons, Weakly Discount</p>
						<hr>
						<a class="addlist addAuthority" href="{{ url("vendor/$vendorData->username/coupons") }}">Manage Now</a>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
<!----payment mode modal popup start------->
<div class="modal" id="venderAddressone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="margin-top:100px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
				<p class="modal-title" id="myModalLabel"><i style="color:#59b2e5;" class="fa fa-map-marker"></i><strong>&nbsp;Select Payment Mode</strong></p>
			</div>
			<div class="modal-body">
				<div>
					<meta name="csrf-token" content="{{ csrf_token() }}" />
					<form id="settingForm" name="settingForm" style="margin-top:10px;">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="vendordetails_id" id="vendordetails_id" value="@if(!empty($vendorData->id)){{ $vendorData->id }} @endif" readonly />
						<div class="form-group">
							<label>Please Select The Way (S) In Which You Will Like To Receive Payment From The Buyer</label>
						</div>
						<div class="form-group">
							<label>Online Transaction Option </label>
							<div class="custom_checkbox form-check">
								<input type="checkbox" name="paymentMode1" id="paymentMode1" value="1">
								<label for="paymentMode1">
								<span class="shadow_checkbox"></span>
								<span class="radio_title catnamebox">&nbsp;Advance For Delivery  </span>
								</label>
							</div>
							<div class="custom_checkbox form-check">
								<input type="checkbox" name="paymentMode2" id="paymentMode2" value="2">
								<label for="paymentMode2">
								<span class="shadow_checkbox"></span>
								<span class="radio_title catnamebox">&nbsp;Advance For Pick Up </span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label>Cash On Delivery Option</label>
							<div class="custom_checkbox form-check">
								<input type="checkbox" name="paymentMode3" id="paymentMode3" value="3">
								<label for="paymentMode3">
								<span class="shadow_checkbox"></span>
								<span class="radio_title catnamebox">&nbsp;Pay At Delivery  </span>
								</label>
							</div>
							<div class="custom_checkbox form-check">
								<input type="checkbox" name="paymentMode4" id="paymentMode4" value="4">
								<label for="paymentMode4">
								<span class="shadow_checkbox"></span>
								<span class="radio_title catnamebox">&nbsp;Pay At Pick Up </span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" name="paymentModebtn" id="paymentModebtn" class="btn btn--icon btn-md btn--round btn-info"><i class="glyphicon glyphicon-plus"></i>&nbsp;Save</button> 
						</div>
					</form>
					<div id="result"></div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="text-right pull-right col-md-3">
				</div>
			</div>
		</div>
	</div>
</div>
<!----payment mode modal popup start-->
<!------business-Modal start-->
<div class="modal" id="businessDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
				<h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-edit" style="font-size:18px;"></i> Business Details </h4>
			</div>
			<div class="model-body">
				<div class="row" style=" padding:20px;">
					<div class="col-sm-12">
						<form role="form" id="businessDetailForms" name="businessDetails" style="margin: 0 auto;">
							<?php echo csrf_field(); ?>
							<input type="hidden" name="shop_username" id="shop_username" value="<?php if(!empty($vendorData->username)) echo $vendorData->username; ?>" required="required" />
							<input type="hidden" name="business_id" id="shop_username" value="<?php if(!empty($businessDetails->id)) echo $businessDetails->id; ?>" required="required" />
							<div class="form-group row">
								<div class="col-sm-4"><label>Owner Name <span class="prafontanswerstar">*</span> :</label></div>
								<div class="col-sm-8">
									<span id="ownernameErr"></span>
									<input type="text" placeholder="Business Owner Name" class="forbusiness" name="bownerName" id="bownerName" value="@if(!empty($businessDetails->ownerName)){{ $businessDetails->ownerName }} @endif" required="required" onkeyup="checkCharacter()" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4"><label> About Business <span class="prafontanswerstar">*</span> :</label></div>
								<div class="col-sm-8">
									<span id="aboutErr"></span>
									<input type="text" placeholder="About Business" name="aboutBusiness" id="aboutBusiness" class="forbusiness" value="@if(!empty($businessDetails->aboutBusiness)){{ $businessDetails->aboutBusiness }} @endif" required="required" onkeyup="checkCharacterLimit(this.value,'About Us','aboutErr','100')"  maxlength="100" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label> Business Name <span class="prafontanswerstar">*</span> :</label>
								</div>
								<div class="col-sm-8">
									<input type="text" placeholder="Business Name" name="bName" id="bName" class="forbusiness" value="@if(!empty($vendorData->vName)){{ $vendorData->vName }} @endif" readonly="readonly" required="required" />
								</div>
							</div>
							<div id="" class="my-box">
								<div class="form-group row">
									<div class="col-sm-4">
										<label> GSTIN Number :</label>
									</div>
									<div class="col-sm-8">
										<div class="">
											<span id="gstNumberErr"></span>
											<input type="text" placeholder="15-character alphanumeric (Eg. 22AXXXA0000A1ZM)" class="forbusiness" name="gstNumber" id="gstNumber" value="@if(!empty($businessDetails->gstNumber)){{ $businessDetails->gstNumber }} @endif" maxlength="15" onkeyup="checkAlphaNumeric(this.value,'GST IN Number ','gstNumberErr','saveBusinessDetails','15')" />
											<div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="">
										<p style="text-align:center; color:#F00;"><strong>OR</strong></p>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4">
										<label> GST Provisional Id  :</label>
									</div>
									<div class="col-sm-8">
										<input type="text" class="forbusiness" name="gstProvisionalID"  id="gstProvisionalID" value="<?php if(!empty($businessDetails->gstProvisionalID))echo $businessDetails->gstProvisionalID; ?>" maxlength="15" placeholder="GST Provisional ID" onkeyup="checkAlphaNumeric(this.value,'GST Provisional Id','gstProvisionalErr','saveBusinessDetails','15')"  />
										<span id="gstProvisionalErr"></span>
										<div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4">
										<label>Attach GST File</label>
									</div>
									<div class="col-sm-8">
										<div class="">
											<input type="hidden" name="gstfileCopy" id="gstfileCopy" value="<?php if(!empty($businessDetails->gstFile))echo $businessDetails->gstFile; ?>" />
											<span id="gstFileErr"></span>
											<input type="file" name="gstFile" id="gstFile" onchange="imageExtValidation(this.value,'GST file ',imageExtArr,'saveBusinessDetails','gstFileErr')" />
											<div>
												<span id="gstimg" class="imges1" style="margin-top:40px;">Accepted file formats: png, jpg & pdf</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label></label>
								</div>
								<div class="col-sm-8">
									<div class="custom_checkbox">
										<input class="my-check" type="checkbox" name="dontGst" id="dontGst" value="N">
										<label for="dontGst"><span class="shadow_checkbox"></span> I don`t have GSTIN</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label>PAN Number <span class="prafontanswerstar">*</span> :</label>
								</div>
								<div class="col-sm-8">
									<div>
										<input type="text" placeholder="Pan card Number" class="forbusiness checkNumber" name="panNumber" id="panNumber" value="@if(!empty($businessDetails->panCardNumber)){{ $businessDetails->panCardNumber }} @endif" maxlength="10" onkeyup="pancardValidate(this.value,'PAN Number','pannumberErr','saveBusinessDetails')" />
										<span id="pannumberErr"></span>
										<div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<h4 class="modal-title" align="center">BUSINESS ADDRESS</h4>
								<br>
								<div class="col-sm-4">
									<label> Address 1 <span class="prafontanswerstar">*</span> :</label>
								</div>
								<div class="col-sm-8">
									<input type="text"  class="forbusiness" name="address1" id="address1" value="@if(!empty($businessDetails->address1)){{ $businessDetails->address1 }} @endif" required="required" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label> Address 2  <span class="prafontanswerstar"></span> :</label>
								</div>
								<div class="col-sm-8">
									<input type="text"  class="forbusiness" name="address2" id="address2" value="@if(!empty($businessDetails->address2)){{ $businessDetails->address2 }} @endif"  required="required" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label> Address 3  <span class="prafontanswerstar"></span> :</label>
								</div>
								<div class="col-sm-8">
									<input type="text"  class="forbusiness" name="address3" id="address3" value="@if(!empty($businessDetails->address3)){{ $businessDetails->address3 }} @endif"  required="required" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label> Pincode <span class="prafontanswerstar">*</span> :</label>
									<div id="pinCodeErr"></div>
								</div>
								<div class="col-sm-8">
									<input type="text"  class="forbusiness" name="pincode" id="pincode" value="@if(!empty($businessDetails->pinCode)){{ $businessDetails->pinCode }} @endif" required="required" onblur="pincodeValidateBackend(this.value,'Pin Code Number','pincodeErr','saveBusinessDetails')" maxlength="6" />
									<div id="pincodeErr"></div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label> City <span class="prafontanswerstar">*</span> :</label>
								</div>
								<div class="col-sm-8">
									<input type="text" class="forbusiness" name="city" id="city" value="Kanpur" readonly="readonly"  required="required" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label> State <span class="prafontanswerstar">*</span> :</label>
								</div>
								<div class="col-sm-8">
									<input type="text" class="forbusiness" name="state" id="state" value="U.P." required="required" readonly="readonly"  />
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<span id="uploadBusinessResult"></span>
			<button type="reset" class="btn btn-md btn--round btn-danger">Cancel</button>      
			<button  type="submit" name="submit" id="saveBusinessDetails" class="btn btn-md btn--round">Save</button>
			</form>
			</div>
		</div>
	</div>
</div>
<!--business-Modal End-->
<!--store Details Start-->
<div class="modal" id="shop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
				<h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-camera"></i> Store Details </h4>
			</div>
			<div class="model-body">
				<div class="row" style=" padding:20px;">
					<div class="col-sm-6">
						<div class="shopdes">
							<?php
								if(!empty($vendorData->imageLogo)){
								$profileImage = $vendorData->imageLogo;
								?>
							<img id='img-upload1' src="<?php echo url("uploadFiles/shopProfileImg/$profileImage"); ?>" class="img-responsive" />
							<?php
								}
								else{
								?>
							<img id='img-upload1' src="<?php echo url("uploadFiles/shopProfileImg/marketPlace.jpg")?>" class="img-responsive" width="450" height="500">
							<?php
								} 
								?>
							<h4 class="shopdes1 text-center"><?php if(!empty($vendorData->vName)) echo $vendorData->vName; ?></h4>
							<p class="shopdes2 text-center">@if(!empty($vendorData->aboutBusiness)){{ $vendorData->aboutBusiness }} @endif </p>
							<h4 class="nametittle">@if(!empty($vendorData->ownerName)){{ $vendorData->ownerName }} @endif </h4>
						</div>
					</div>
					<div class="col-sm-6">
						<meta name="csrf-token" content="{{ csrf_token() }}" />
						<form id="fronShopimageform" name="fronShopimageform" class="uploader">
							<?php echo csrf_field(); ?>
							<div class="form-group">
								<label>Upload Image</label>
								<input type="hidden" value="<?php if(!empty($vendorData->id)) echo $vendorData->id; ?>" id="shopID" name="shopID"  readonly="readonly" required="required" />
								<span id="storeImageErr"></span>
								<div class="input-group">
									<span class="input-group-btn">
									<span class="btn btn-default btn-file">
									Browse… <input class="form-control" type="file" id="imgInp1" name="frontImage" onchange="imageExtValidation(this.value,'Shop front Image',imageExtArr,'saveImage','uploadResult')" />
									</span>
									</span>
									<input type="text" class="uploader1 form-control" name="imageName" id="imageName" readonly>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" id="saveImage" class="btn btn-success">Save</button>  
							</div>
							<img id="uploadGif" src="<?php echo url("kanpurizeTheme/uploading.gif"); ?>" style="display:none;" />
							<span id="uploadResult"></span>
						</form>
						<div class="product-descpreviw">
							<a class="product_title">
								<h4>Preview Image</h4>
							</a>
							<img src="{{ asset('cdn/images/icon/webshop.jpg') }}" class="img-responsive webshoppriev"  />
						</div>
					</div>
				</div>
				<hr />
				<div class="row" style="padding:20px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
						@if(!empty($vendorData->bannerImage))
						@php $bannerImage = $vendorData->bannerImage; @endphp
						<h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-camera"></i>&nbsp;Edit banner image </h4>
						@else
						<h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-camera"></i>&nbsp;Add banner image </h4>
						@endif
					</div>
					<div class="col-sm-12">
						<div class="shopdes">
							@if(!empty($vendorData->bannerImage))
							@php $bannerImage = $vendorData->bannerImage; @endphp
							<img id='defaultBannerImage' src="<?php echo url("uploadFiles/shopBannerImage/$bannerImage"); ?>" class="img-responsive defaultBannerImage" />
							@else
							<img id='defaultBannerImage' src="<?php echo url("uploadFiles/shopBannerImage/marketPlace.jpg")?>" class="img-responsive defaultBannerImage" width="450" height="500">
							@endif
						</div>
					</div>
					<div class="col-sm-12">
						<meta name="csrf-token" content="{{ csrf_token() }}" />
						<form id="bannerImageForm" name="bannerImageForm" style="margin-top:10px;">
							<?php echo csrf_field(); ?>
							<input type="hidden" value="<?php if(!empty($vendorData->id)) echo $vendorData->id; ?>" id="shopID" name="shopID"  readonly="readonly" required="required" />
							<div class="form-group">
								<label>Upload banner Image <span style="color:red;">(dimension must be:- 1800*600 px .)</span></label>
								<div class="input-group">
									<span class="input-group-btn">
									<span class="btn btn-md btn-file">
									Browse banner Image… <input type="file" id="bannerImageFields" class="bannerImage" name="bannerImage" onchange="imageExtValidation(this.value,'Banner Image',imageExtArr,'uploadBannerImage','bannerImageExtErr')" />
									</span>
									</span>
									<input type="text" class="uploader1" name="bannerimageName" id="bannerimageName" readonly>
								</div>
							</div>
							<span id="bannerImageExtErr"></span>
							<div class="row" style="margin-top:25px;">
								<div class="col-sm-12">
									<div class="form-group">
										<button type="submit" name="submit" id="uploadBannerImage" class="btn btn-md btn--round btn-success"><i style="color:#FFF;" class="fa fa-upload"></i>&nbsp;Upload</button>            
									</div>
								</div>
							</div>
						</form>
						<span id="someDivToDisplayErrors"></span> 
					</div>
				</div>
			</div>
			<div class="modal-footer">       
			</div>
		</div>
	</div>
</div>
<!-----store Details End---->
<!-------Image Extension Validation start------->
@stop
@section('footer')
@parent
<script>
	$(document).ready(function(e) {
	  $(document).on('click','#addBusinessDetails',function(event){
	    event.preventDefault();
	       $('#businessDetails').modal('show');
	  }); 
	});
</script>
<script src='{{ asset("validationJS/vendorBackend.js") }}'></script>
<!--payment- modal script start------->
<script>
	$(document).ready(function(e) {
	<!-----modal script start----->
	 $(document).on('click','.addAuthority',function(){
	    $('#venderAddressone').modal('show'); 
	 });
	 $(document).on('click','.close',function(){
	   $('#venderAddressone').modal('hide');
	 });
	 /*--selected script start--*/
	    var firstpaymentMode = $("#paymentModefirst").val();
		var secondpaymentMode = $("#paymentModesecond").val();
		var thirdpaymentMode = $("#paymentModethird").val();
		var fourthpaymentMode = $("#paymentModefourth").val();
		//alert(fourthpaymentMode);
		if(firstpaymentMode != ""){ $("#paymentMode1").attr("checked",true); }
		 else{ $("#paymentMode1").attr("checked",false); } 
		if(secondpaymentMode != ""){ $("#paymentMode2").attr("checked",true); }
		 else{ $("#paymentMode2").attr("checked",false); } 
		if(thirdpaymentMode != ""){ $("#paymentMode3").attr("checked",true); }
		 else{ $("#paymentMode3").attr("checked",false); } 
		if(fourthpaymentMode != ""){ $("#paymentMode4").attr("checked",true); }
		else{ $("#paymentMode4").attr("checked",false); } 
		 
	 /*--selected script start--*/
	});
</script>
<script>
	$(document).ready(function(e) {
	 $(document).on('click','#paymentProceed',function(){
	     alert("We will contact you shortly , till then please complete your shop profile.");
	  });  
	});
</script>
<!--payment- modal script End------->
<!-------scriipt-Start---->
<script>
	$(document).ready(function(e) {
	  $(document).on('change','#upload-file-selector1',function(){
	     var file = $("#upload-file-selector1").val();
		 var filename = file.substr(12);
		 //alert(filename);
		 $("#cinImg").html(filename);
	  }); 
	  $(document).on('change','#upload-file-selector',function(){
	     var file = $("#upload-file-selector").val();
		 var filename = file.substr(12);
		 //alert(filename);
		 $("#tanimg").html(filename);
	  });
	  $(document).on('change','#upload-file-selector2',function(){
	     var file = $("#upload-file-selector2").val();
		 var filename = file.substr(12);
		 //alert(filename);
		 $("#gstimg").html(filename);
	  });    
	});
</script>
<!-------scriipt-End---->
<script>
	$(document).ready(function(e) {
	  $(document).on('click','#bankDetails',function(){
	    alert("this option is not Required");
	  }); 
	  $(document).on('click','.appOpen',function(){
	    alert("Please Complete your Business Profile , Payment to Proceed. ");
	  }); 
	});
</script>    
<!---Image Extension Validation Start---->
<script>
	function pancardValidate(panVal,elementname,errMsgElement,disableElement){
	   var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
	   document.getElementById(errMsgElement).innerHTML = " ";
	   if(panVal != ''){
		   if(regpan.test(panVal)){
	           document.getElementById(disableElement).disabled = false;
	       } else {
			 document.getElementById(errMsgElement).innerHTML =  "<span style='color:red;'>Invalid "+ elementname +" , this Format is invalid !!.</span>";
		     document.getElementById(disableElement).disabled = true;
	       }
		 }
	   else{
		  document.getElementById(errMsgElement).innerHTML =  "<span style='color:red;'>"+ elementname +" is Required .</span>";
		  document.getElementById(disableElement).disabled = true;
		 }	 
	  }
</script>
<!-------Image Extension Validation End------->
@stop