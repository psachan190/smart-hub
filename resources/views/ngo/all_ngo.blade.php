@extends('layout')
@section('title', $title)
@section('content')
<section class="event_area evetsection">
	            <div class="row">
                	<div class="col-sm-12 padding_div">
           		<div id="carousel-example-generic" class="carousel slide slidea" data-ride="carousel">
           			<ol class="carousel-indicators">
           				<?php $i = 1; ?>
           				@foreach ($ngos as $row)
           				<?php if ($i == 4) break; ?>
			  		<li data-target="#carousel-example-generic" data-slide-to="{{$i}}" @if($i==1) class="active" @endif></li>
			  		<?php $i++; ?>
			  		@endforeach
				</ol>
			       	<div class="carousel-inner">
	                                <?php $i = 1; ?>
           				@foreach ($ngos as $row)
           				<?php if ($i == 4) break; ?>
           				<div class="item @if($i==1) active @endif">
	                                    <img src="{{ asset('storage/'.$row->image) }}" class="img-responsive" style="width:100%; max-height: 468px;">
	                                    <div class="carousel-caption eventhead1">
	                                      <h3>Kanpurize The Spirit of kanpur</h3>
	                                   </div>
	                                </div>
	                                <?php $i++; ?>
			  		@endforeach
                                </div>
                                <a class="left carousel-control controlarrow1" href="#carousel-example-generic" data-slide="prev">
				    <span class="lnr lnr-arrow-left-circle"></span>
				    <span class="sr-only">Previous</span>
				</a>
			  	<a class="right carousel-control controlarrow1" href="#carousel-example-generic" data-slide="next">
			    		<span class="lnr lnr-arrow-right-circle"></span>
			    		<span class="sr-only">Next</span>
			  	</a>
			  </div>
		</div> 
	            </div>
            	<div class="main-content normal-padding">
		        <div class="container-fluid">
		            <div class="row margin_div">
		                <div class="col-md-9">
		                    <div class="row">
		                    	@foreach($ngos as $row)
		                        <div class="col-sm-4 col-xs-12">
		                            <div class="our-causes">
		                                <div class="our-causes__image-wrap pr">
		                                	<img class="our-causes__image lazy" alt="{{$row->ngo_name}}" src="{{ asset('storage/'.$row->image) }}">
		                                </div>
		                                <div class="our-causes__text-content">
		                                    <h4 class="text-uppercase our-causes__title"><a href="{{url('ngo/'.$row->user_name)}}">{{$row->ngo_name}}</a></h4>
		                                    <div class="ngobtn"><a href="{{url('ngo/'.$row->user_name)}}" class="btn btn--round btn--bordered btn-md">Read More</a></div>
		                                </div>
		                            </div>
		                        </div>
		                        @endforeach
		                    </div>
		                    <div class="pagination-area">
		                        <nav class="navigation pagination" role="navigation">
		                            <div class="nav-links">
		                            	{{ $ngos->links() }}
		                            </div>
		                        </nav>
		                    </div>
		                </div>
		                <div class="col-md-3">
		                    <aside class="sidebar">
		                    	<div class="widgetngo">
		                        	<div class="createon">
		                               <a href="{{url('ngo/create')}}"> Create Your Own</a>
		                            </div>
		                        </div>
		                        <div class="widgetngo">
		                            <div class="widgetngo__heading">
		                                <h4 class="widgetngo__title">UPCOMING <span class="base-color">EVENTS</span></h4>
		                            </div>
		                            <div class="widgetngo__text-content" style="margin:20px;">
		                                <div id="testimonialsmobile">
		                            		<div class="testimonialsmobile-list">
			                            	@foreach($events as $row)  
			                                  <div class="card_style1">
					                     <figure class="card_style1__info card_style1__info1">
					                        <div class="cours2" style="overflow:hidden;">
					                           <img class="hoverimgevent img-responsive" src="{{ asset('storage/'.$row->image) }}" alt="online event in kanpur">
					                           <div class="cours4 text-center">
					                              <a href="{{url('event/'.$row->url)}}" target="_blank" class="cou btn btn-md btn--round" >View More</a>
					                           </div>
					                        </div>
					                        <figcaption class="upeventtop">
					                           <a href="{{url('event/'.$row->url)}}" target="_blank">
					                              <h3 class="upevent">{{substr($row->title, 0, 50)}} ...</h3>
					                           </a>
					                           <ul class="date_place">
					                              <li>
					                                 <span class="lnr lnr-calendar-full"></span>
					                                 <p>{{date_format(date_create($row->from_date),'d M, Y h:i A')}}</p>
					                              </li>
					                              <li>
					                                 <span class="lnr lnr-map-marker"></span>
					                                 <a href="{{url('event/'.$row->url)}}" target="_blank">Get details</a>
					                              </li>
					                           </ul>
					                        </figcaption>
					                     </figure>
					                  </div>
			                                @endforeach 
			                                
			                            </div>
			                        </div>
		                            </div>
		                        </div>
		                        <div class="widgetngo">
		                            <div class="widgetngo__heading">
		                                <h4 class="widgetngo__title">LATEST <span class="base-color">CAUSES</span></h4>
		                            </div>
		                            <div class="widgetngo__text-content">
		                                @foreach($causes as $row)  
		                                <div class="widgetngo-latest-causes">
		                                    <div class="widgetngo-latest-causes__image-wrap">
		                                        <a href="{{url('cause/'.$row->url)}}"><img class="widgetngo-latest-causes__thubnail lazy" alt="" src="{{ url('storage/'.$row->image) }}" style="display: inline;"></a>
		
		                                    </div>
		                                    <div class="widgetngo-latest-causes__text-content">
		                                        <h4 class="widgetngo-latest-causes__title"><a href="{{url('cause/'.$row->url)}}">{{substr($row->title, 0, 25)}} ...</a></h4>
		                                        <div class="widgetngo-latest-causes__admin small-text">
		                                            <i class="base-color fa fa-user widgetngo-latest-causes__admin-icon"></i>
		                                            by <a href="#"></a>
		                                        </div>
		                                        <div class="widgetngo-latest-causes__time text-mute">
		                                            {{date_format(date_create($row->created_at),"d M, Y")}}
		                                        </div>
		                                    </div>
		                                </div>
		                                @endforeach
		                            </div>
		                        </div>
		                    </aside>
		                </div>
                       </div>
		        </div>
		    </div>
      
</section>

@stop
@section('footer')
@parent
<script src="{{ asset('cdn/js/socialmobileslider.js')}}"></script>

@stop