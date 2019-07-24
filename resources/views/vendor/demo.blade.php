@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/multiple_autofill.css') }}"/>
@stop
@section('content')
<section class="bgimage">
	<div class="bg_image_holder">
		<img src="{{ asset('cdn/images/indexback.png') }}" alt="marketplace in kanpur">
	</div>
	<div class="hero-content hero-content1 content_above">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<form action="" method="POST" autocomplete="off">
					<div class="cardify login minummargin">
						<div class="login--header">
							<h3>Create your Shop on Kanpurize</h3>
						</div>
						<!--<div class="modules__contentalert">
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							        <span class="lnr lnr-cross" aria-hidden="true"></span>
							    </button>
							    <span class="alert_icon lnr lnr-checkmark-circle"></span> <strong>Your account has been created successfully. Please login here</strong>
							</div>
							</div>-->
						<div class="login--form">
							<div class="form-group">
								<label for="user_name"> Shop Name </label>
								<input type="text" name="username" value="" id="user" class="" placeholder="Enter your Email id" required autofocus>
							</div>
							<div class="form-group">
								<label for="mob"> Mobile Number </label>
								<input type="number" name="Mobile" id="pwd" placeholder="Enter your Mobile Number...">
							</div>
							<div class="widgetngo__heading">
								<h4 class="widgetngo__title">Select Your  <span class="base-color">Business Type</span></h4>
							</div>
							<div class="row" style="margin-bottom: 20px;">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<img src="{{ asset('cdn/images/icon/goods.png') }}" class="img-responsive caticon">
									<div class="custom-radio radioright_cat">
										<input type="radio" id="opt1" class="" name="radio1" value="1" checked="checked">
										<label class="good_service_cat" for="opt1"><span class="circle"></span>Goods</label>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<img src="{{ asset('cdn/images/icon/service.png') }}" class="img-responsive caticon">
									<div class="custom-radio radioright_cat">
										<input type="radio" id="opt2" class="" name="radio1" value="1" checked="checked">
										<label class="good_service_cat" for="opt2"><span class="circle"></span>Services</label>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<img src="{{ asset('cdn/images/icon/both.png') }}" class="img-responsive caticon">
									<div class="custom-radio radioright_cat">
										<input type="radio" id="opt3" class="" name="radio1" value="1" checked="checked">
										<label class="good_service_cat" for="opt3"><span class="circle"></span>both</label>
									</div>
								</div>
							</div>
                            <div class="widgetngo__heading">
								<h4 class="widgetngo__title">Select Your  <span class="base-color"> Selling Primary Category</span></h4>
							</div>
                            <div class="row margin_div">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="tooltip_cat custom_checkbox form-check">
                                            <input type="checkbox" name="shopCat[]" id="6" value="6">
                                            <label class="good_service_cat" for="6">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title catnamebox">Garments</span>
                                            </label>
												   <img src="{{asset('cdn/images/icon/category/1395garment-craft-tailor_5-512.png') }}" class="img-responsive float_right" />
                                                   
                                                    <span class="tooltiptext">
                                                        <ul>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                       </ul>
                                                   </span>
                                                    
												
                                                                                       
                                        </div>
                                   </div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="tooltip_cat custom_checkbox form-check">
                                <input type="checkbox" name="shopCat[]" id="7" value="7">
                                <label for="7">
                                <span class="shadow_checkbox"></span>
                                <span class="radio_title catnamebox">Electronics &amp; Electrical</span>
                                </label>
                                 <img src="{{asset('cdn/images/icon/category/1705extension-lead-cable-power-supply-electricity-cord-electric-plug-outlet-socket-36ffa90b4893be48-512x512.png') }}" class="img-responsive float_right" />
                                 <span class="tooltiptext">
                                                        <ul>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                       </ul>
                                                   </span>
                                                           
                                </div>
						</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="tooltip_cat custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="8" value="8">
<label for="8">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">APPLIANCES</span>
</label>
 <img src="{{asset('cdn/images/icon/category/1018Devices-512.png') }}" class="img-responsive float_right" />
 <span class="tooltiptext">
                                                        <ul>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                        <li>Tooltip text</li>
                                                       </ul>
                                                   </span>
                           
</div>
</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="9" value="9">
<label for="9">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">TOOLS</span>
</label>
<img src="{{asset('cdn/images/icon/category/4312tools-512.png') }}" class="img-responsive float_right" />
                           
</div>
</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="10" value="10">
<label for="10">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">MOBILES</span>
</label>
<img src="{{asset('cdn/images/icon/category/2707mobiles-3318a431bff3c135-512x512.png') }}" class="img-responsive float_right" />
                           
</div>
</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="11" value="11">
<label for="11">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">COMPUTER AND LAPTOPS</span>
</label>
<img src="{{asset('cdn/images/icon/category/1967601822-laptop_notebook-512.png') }}" class="img-responsive float_right" />
                           
</div>
</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="12" value="12">
<label for="12">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">FASHIONS ACCESSORIES</span>
</label>
<img src="{{asset('cdn/images/icon/category/898accessory_A-512.png') }}" class="img-responsive float_right" />
                           
</div>
</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="13" value="13">
<label for="13">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">FOOTWEARS</span>
</label>
<img src="{{asset('cdn/images/icon/category/534Clothing_Icon_Footwear.png') }}" class="img-responsive float_right" />
                           
</div>
</div>
                           <div class="col-md-4 col-sm-6 col-xs-12">
<div class="custom_checkbox form-check">
<input type="checkbox" name="shopCat[]" id="14" value="14">
<label for="14">
<span class="shadow_checkbox"></span>
<span class="radio_title catnamebox">PERSONAL CARE</span>
</label>
<img src="{{asset('cdn/images/icon/category/803597-512.png') }}" class="img-responsive float_right" />
                           
</div>
</div>
                            </div>
                            <div class="form-group btnmargin">
								<a href="#" data-toggle="modal" data-target="#" title="sell on kanpurize" class="author-area__seller-btn inline">Continue</a>
							</div>
						</div>
                        
					</div>
				</form>
			</div>
			<div class="col-md-1">
			</div>
		</div>
	</div>
</section>
<!--seller otp-->
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="box formseller">
			<div class="modal modalngo fade" id="seller_otp" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsizeseller">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body pupopzoom">
							<div class="boxed-body signin-area">
								<form class="form-horizontal" id="" method="POST" >
									<div class="widgetngo__heading">
										<h4 class="widgetngo__title">OTP sent to <span class="base-color">Mobile</span></h4>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input id="type" type="hidden" name="type" value="" required> 
											<input id="val" type="hidden" name="val" value="" required> 
											<input id="val" type="text" name="otp" placeholder="OTP" required> 
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="pull-right">
												<a href="#" data-toggle="modal" data-target="#list_itom" title="sell on kanpurize" class="author-area__seller-btn inline">Submit</a>
											</div>
										</div>
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
<!--seller otp-->
<!--list itom-->
<div class="gal-container nopadding">
	<div class="col-md-12 col-sm-12 co-xs-12">
		<div class="boximg formseller">
			<div class="modal modalngo fade" id="list_itom" tabindex="-1" role="dialog">
				<div class="modal-dialog mobilengo" role="document">
					<div class="modal-content popupsizeseller">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<div class="modal-body pupopzoom">
							<div class="boxed-body signin-area">
								<form class="form-horizontal" id="" method="POST" >
									<div class="widgetngo__heading">
										<h4 class="widgetngo__title">Select Your Selling <span class="base-color">Primary Category</span></h4>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="custom_checkbox form-check">
												<input type="checkbox" name="shopCat[]" id="6" value="6">
												<label for="6">
												<span class="shadow_checkbox"></span>
												<span class="radio_title catnamebox">Garments</span>
												</label>
												<img src="https://kanpurize.com/uploadFiles/shopCategoryIcon/1395garment-craft-tailor_5-512.png" class="img-responsive caticon">
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="custom_checkbox form-check">
												<input type="checkbox" name="shopCat[]" id="7" value="7">
												<label for="7">
												<span class="shadow_checkbox"></span>
												<span class="radio_title catnamebox">Electronics &amp; Electrical</span>
												</label>
												<img src="https://kanpurize.com/uploadFiles/shopCategoryIcon/1705extension-lead-cable-power-supply-electricity-cord-electric-plug-outlet-socket-36ffa90b4893be48-512x512.png" class="img-responsive caticon">
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="custom_checkbox form-check">
												<input type="checkbox" name="shopCat[]" id="8" value="8">
												<label for="8">
												<span class="shadow_checkbox"></span>
												<span class="radio_title catnamebox">APPLIANCES</span>
												</label>
												<img src="https://kanpurize.com/uploadFiles/shopCategoryIcon/1018Devices-512.png" class="img-responsive caticon">
											</div>
										</div>
									</div>
									<div class="btnmargin" align="center">
										<button type="submit" name="submit" id="submit" class="btn btn-md btn--icon btn--round">Continue</button>
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
<style>

.tooltip_cat .tooltiptext {
    visibility: hidden;
    width: 130px;
    background-color: #1a4e87;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
}

.tooltip_cat:hover .tooltiptext {
    visibility: visible;
}
</style>
@stop
