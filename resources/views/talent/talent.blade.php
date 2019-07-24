@extends('layout')
@section('head')
@parent
<link rel="stylesheet" href="{{ asset('cdn/css/talent.css') }}"/>
@stop
@section('content')
<div class="container-fluid">
	<div class="row">
		<div id="talent-carousel" class="carousel slide carousel-fade" data-ride="carousel" >
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1" class=""></li>
				<li data-target="#carousel" data-slide-to="2" class=""></li>
				<li data-target="#carousel" data-slide-to="3" class=""></li>
			</ol>
			<div class="carousel-inner carousel-zoom">
				<div class="item active"><img class="img-responsive" src=" {{ asset('cdn/images/talent/slider4.png') }}" alt="">
				  <div class="carousel-caption">
					<h1  data-animation="animated zoomInLeft" class="cap-txt "></h1>
					<p data-animation="animated bounceInDown"></p>
				  </div>
				</div>
			    <div class="item"><img class="img-responsive" src=" {{ asset('cdn/images/talent/Slider1.png') }}" alt="">
				  <div class="carousel-caption">
					<h1 data-animation="animated zoomInLeft" class="cap-txt"></h1>
					<p data-animation="animated bounceInDown"></p>
				  </div>
				</div>
				<div class="item"><img class="img-responsive" src=" {{ asset('cdn/images/talent/slider2.png') }}" alt="">
				  <div class="carousel-caption animated slideInLeft">
					<h1 data-animation="animated zoomInLeft" class="cap-txt"></h1>
					<p data-animation="animated bounceInDown"></p>
				  </div>
				</div>
                <div class="item"><img class="img-responsive" src=" {{ asset('cdn/images/talent/slider3.png') }}" alt="">
				  <div class="carousel-caption animated slideInLeft">
					<h1 data-animation="animated zoomInLeft" class="cap-txt"></h1>
					<p data-animation="animated bounceInDown"></p>
					
				  </div>
				</div>
			<a class="carousel-control left" href="#talent-carousel" data-slide="prev">‹</a>
			<a class="carousel-control right" href="#talent-carousel" data-slide="next">›</a>
		</div> 
	</div>
</div>
</div>
<div class="serv_bottom">
			<div class="container">
				<div class="row normal-padding">
					<div class="col-lg-8">
						<h4 class="agile-ser_bot text-light text-capitalize">Vote for Your Favourite Ganpati Pandal .</h4>
						<p class="text-secondary agile-ser_botp">Vote for Your Favorite Ganpati Pandal to make it "The Best Ganpati Pandal 2018" winner. </p>
					</div>
					<div class="col-lg-4 my-lg-auto mt-3 text-lg-right">
                    	<a href="https://www.kanpurize.com/talent/participants/e1acd74041e7651498776ea2b8aca5aa" class="btn btn--lg btn--round btn--white">Vote Now</a>
					</div>
				</div>
			</div>
		</div>
  <div class="dashboard_menu_area">
            <div class="container-fluid">
                <div class="row">
                	<div class="col-md-1"></div>
                    <div class="col-md-10">
                    	<div class="talent_nav tab tab2">
                                <div class="item-navigation">
                                    <ul class="nav talent_tabs nav-tabs nav--tabs2">
                                        <li role="presentation">
                                            <a href="#Upcomming" aria-controls="product-details1" role="tab" data-toggle="tab" aria-expanded="true"><span class="lnr lnr-calendar-full"></span> Upcoming Event</a>
                                        </li>
                                         <li role="presentation" class="active">
                                            <a href="#Recent" aria-controls="Recent" role="tab" data-toggle="tab" aria-expanded="false"><span class="lnr lnr-calendar-full"></span> Current Event </a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#Close_event" aria-controls="Close_event" role="tab" data-toggle="tab" aria-expanded="false"><span class="lnr lnr-calendar-full"></span> Closed Event </a>
                                        </li>
                                    </ul>
                                </div><!-- end /.item-navigation -->
                                <div class="tab-content">
                                    <div class="tab-pane product-tab active" id="Recent">
                                    	 @if($recent_talent != FALSE)
         @php $i=1; @endphp
         @foreach($recent_talent as $listArr)
            @if($i % 2 != 0)
            <div class="how_it_works">
            <div class="how_it_works_module">
                <div class="row">
                    <div class="col-md-4 col-sm-6 padding_div v_middle">
                        <div class="area_image">
                           <img class="img-responsive imgtalent" src="<?php if(!empty($listArr->image)) echo $listArr->image_path; ?>" alt="">
                        </div>
                    </div><!-- end /.col-md-12 -->

                    <div class="col-md-8 col-sm-6 padding_div v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($listArr->title)) echo $listArr->title; ?></h2>
                            <p><?php if(!empty($listArr->description)) echo substr(strip_tags($listArr->description) , 0 ,400); ?> </p>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/talent/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">More Details</a>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/participants/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">Participants</a>
                        </div>
                    </div><!-- end /.col-md-12 -->
                </div>
            </div>
            </div>
            @else
            <div class="how_it_works">
            <div class="how_it_works_module">
                <div class="row">
                    <div class="col-md-8  col-sm-6 padding_div v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($listArr->title)) echo $listArr->title; ?></h2>
                            <p><?php if(!empty($listArr->description)) echo substr(strip_tags($listArr->description) , 0 ,400); ?>  </p>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/talent/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">More Details</a>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/participants/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">Participants</a>
                        </div>
                    </div><!-- end /.col-md-12 -->

                    <div class="col-md-4 col-sm-6 padding_div v_middle ">
                        <div class="area_image">
                             <img class="img-responsive" src="<?php if(!empty($listArr->image)) echo $listArr->image_path; ?>" alt="">
                        </div>
                    </div><!-- end /.col-md-12 -->
                </div>
            </div>
            </div>
            @endif
            @php $i++; @endphp
         @endforeach
       @endif 
                                        
                                    </div>
                                    <div class="tab-pane product-tab" id="Upcomming">
                                       @if($upcoming_talent != FALSE)
         @php $i=1; @endphp
         @foreach($upcoming_talent as $listArr)
            @if($i % 2 != 0)
            <div class="how_it_works">
            <div class="how_it_works_module">
                <div class="row">
                    <div class="col-md-4 col-sm-6 padding_div v_middle">
                        <div class="area_image">
                           <img class="img-responsive imgtalent" src="<?php if(!empty($listArr->image)) echo $listArr->image_path; ?>" alt="">
                        </div>
                    </div><!-- end /.col-md-12 -->

                    <div class="col-md-8 col-sm-6 padding_div v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($listArr->title)) echo $listArr->title; ?></h2>
                            <p><?php if(!empty($listArr->description)) echo substr(strip_tags($listArr->description) , 0 ,400); ?> </p>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/talent/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">More Details</a>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/participants/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">Participants</a>
                        </div>
                    </div><!-- end /.col-md-12 -->
                </div>
            </div>
            </div>
            @else
            <div class="how_it_works">
            <div class="how_it_works_module">
                <div class="row">
                    <div class="col-md-8  col-sm-6 padding_div v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($listArr->title)) echo $listArr->title; ?></h2>
                            <p><?php if(!empty($listArr->description)) echo substr(strip_tags($listArr->description) , 0 ,400); ?>  </p>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/talent/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">More Details</a>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/participants/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">Participants</a>
                        </div>
                    </div><!-- end /.col-md-12 -->

                    <div class="col-md-4 col-sm-6 padding_div v_middle ">
                        <div class="area_image">
                             <img class="img-responsive" src="<?php if(!empty($listArr->image)) echo $listArr->image_path; ?>" alt="">
                        </div>
                    </div><!-- end /.col-md-12 -->
                </div>
            </div>
            </div>
            @endif
            @php $i++; @endphp
         @endforeach
       @endif 
                                    </div><!-- end /.product-comment -->
                                    <!-- end /.tab-content -->
									<div class="tab-pane product-tab" id="Close_event">
                                        @if($closed_talent != FALSE)
         @php $i=1; @endphp
         @foreach($closed_talent as $listArr)
            @if($i % 2 != 0)
            <div class="how_it_works">
            <div class="how_it_works_module">
                <div class="row">
                    <div class="col-md-4 col-sm-6 padding_div v_middle">
                        <div class="area_image">
                           <img class="img-responsive imgtalent" src="<?php if(!empty($listArr->image)) echo $listArr->image_path; ?>" alt="">
                        </div>
                    </div><!-- end /.col-md-12 -->

                    <div class="col-md-8 col-sm-6 padding_div v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($listArr->title)) echo $listArr->title; ?></h2>
                            <p><?php if(!empty($listArr->description)) echo substr(strip_tags($listArr->description) , 0 ,400); ?> </p>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/talent/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">More Details</a>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/participants/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">Participants</a>
                        </div>
                    </div><!-- end /.col-md-12 -->
                </div>
            </div>
            </div>
            @else
            <div class="how_it_works">
            <div class="how_it_works_module">
                <div class="row">
                    <div class="col-md-8  col-sm-6 padding_div v_middle">
                        <div class="area_content">
                            <h2><?php if(!empty($listArr->title)) echo $listArr->title; ?></h2>
                            <p><?php if(!empty($listArr->description)) echo substr(strip_tags($listArr->description) , 0 ,400); ?>  </p>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/talent/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">More Details</a>
                            <a href="<?php if(!empty($listArr->encrypt_id))echo url("talent/participants/$listArr->encrypt_id"); ?>" class="btn btn-md btn--white">Participants</a>
                        </div>
                    </div><!-- end /.col-md-12 -->

                    <div class="col-md-4 col-sm-6 padding_div v_middle ">
                        <div class="area_image">
                             <img class="img-responsive" src="<?php if(!empty($listArr->image)) echo $listArr->image_path; ?>" alt="">
                        </div>
                    </div><!-- end /.col-md-12 -->
                </div>
            </div>
            </div>
            @endif
            @php $i++; @endphp
         @endforeach
       @endif 
                                    </div><!-- end /.product-comment -->
                                </div><!-- end /.tab-content -->
                            </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
@stop
@section('footer')
@parent
<script>(function( $ ) {

    //Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#talent-carousel'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
   
	
})(jQuery);	</script>
@stop