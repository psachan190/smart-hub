@extends('layout')
@section('content')
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
                                            <form name="categoryForm" action="<?php echo url("vendor/selecthopcatAction"); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                                             <input type="hidden" name="shop_username" id="shop_username" value="@if(!empty($vendorData->username)) {{ $vendorData->username }} @endif" /> 
                    	@if($shop_category_list != FALSE)
                        	@foreach($shop_category_list as $dataArr)
                             @if($dataArr->bType==1)
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="custom_checkbox form-check">
                                            <input type="checkbox" name="shopCat[]" id="{{ $dataArr->cid }}" value="{{  $dataArr->cid }}">
                                            <label for="{{ $dataArr->cid }}">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title catnamebox">{{ $dataArr->cname }}</span>
                                            </label>
                                            <?php 
						 if(!empty($data->icon)){
							   $icon = $data->icon;
						      ?>
							   <img src='<?php echo url("uploadFiles/shopCategoryIcon/$icon"); ?>' class="img-responsive caticon" />
							  <?php
						   }
						?>
                                           
                                        </div>
                                   </div>
                             @endif 
                            @endforeach
                        @endif
                  </div>
                                        </div>
                                    </div><!-- end /.col-md-8 -->
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact_form--wrapper">
                                                <div class="row">
                    @if($shop_category_list != FALSE)
                        	@foreach($shop_category_list as $dataArr)
                               @if($dataArr->bType==2)	
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="custom_checkbox form-check">
                                            <input type="checkbox" name="shopCat[]" id="{{ $dataArr->cid }}" value="{{  $dataArr->cid }}">
                                            <label for="{{ $dataArr->cid }}">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title catnamebox">{{ $dataArr->cname }}</span>
                                            </label>
                                            <?php 
						 if(!empty($dataArr->icon)){
							   $icon = $dataArr->icon;
						      ?>
							   <img src='<?php echo url("uploadFiles/shopCategoryIcon/$icon"); ?>' class="img-responsive caticon" />
							  <?php
						   }
						?>
                                           
                                        </div>
                                   </div>
                               @endif    
                            @endforeach
                    @endif
                  </div>
												@if($shop_category_list != FALSE )
                                                <div class="sub_btn">
                                                    <button type="submit" name="submit" id="submit" class="btn btn--round btn--default">Continue</button>
                                                </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div><!-- end /.col-md-8 -->
                                </div>
                            </div>
                        </div>
            </div>
        </div>
</section>
@stop

