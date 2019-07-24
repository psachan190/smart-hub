@include("kanpur.layout.header")
<section class="contact-area webshopback section--padding">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                            <div class="contact_form cardify opcityform">
                                <div class="contact_form__title">
                                    <h3>Select Your Selling Primary Category</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact_form--wrapper">
                                         {!! Session::has('msg') ? Session::get("msg") : '' !!}
                                            <form name="categoryForm" action="<?php echo url("selecthopcatAction"); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                     <input type="hidden" name="id" id="id" value="@if(!empty(session()->get('lastVendorID'))) {{ session()->get('lastVendorID') }}@endif" /> 
                    @if(isset($resultData))
                    	@if(count($resultData) > 0)
                        	@foreach($resultData as $data)
                            	<div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="custom_checkbox form-check">
                                            <input type="checkbox" name="shopCat[]" id="{{ $data->cid }}" value="{{  $data->cid }}">
                                            <label for="{{ $data->cid }}">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title catnamebox">{{ $data->cname }}</span>
                                            </label>
                                            <?php 
						 if(!empty($data->icon)){
							   $icon = $data->icon;
						      ?>
							   <img src="<?php echo url("uploadFiles/shopCategoryIcon/$icon"); ?>" class="img-responsive caticon" />
							  <?php
						   }
						?>
                                           
                                        </div>
                                   </div>
                            @endforeach
                         @else<h2>No Record Founds...</h2>
                        @endif
                    @endif
                  </div>
												@if(count($resultData) > 0)
                                                <div class="sub_btn">
                                                    <button type="submit" name="submit" id="submit" class="btn btn--round btn--default">Continue</button>
                                                </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div><!-- end /.col-md-8 -->
                                </div><!-- end /.row -->
                            </div><!-- end /.contact_form -->
                        </div>
            </div>
        </div>
</section>




<!--================================
    END FOLLOWERS FEED AREA
=================================-->
           @include("kanpur.layout.footer") 
           