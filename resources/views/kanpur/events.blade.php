@extends("layout")
@section('content')
<style>.navevent {
    text-align: center;
    margin-top: 10px;
    padding: 16px;
    border: 1px #5155ce solid;
    background: #eef1f3;
}
    .navevent .navbar-toggle{ float:none !important;}</style>
<section class="event_area evetsection">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-3 padding_div">
            <div class="row">
               <div class="col-sm-12">
                      <div class="navbar-header navevent">
                    				<a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false"> --- Select Category --- &nbsp;</a></div>
                      <div class="collapse navbar-collapse padding_div0" id="bs-example-navbar-collapse-3">
                  <ul class="mdn-accordion sideeventmenu">
                     <li class="subtop"><a href="#" class="catgoryevent"><i class="fa fa-random"></i> Category &nbsp;</a></li>
                     <li class="sub-level">
                        <input class="accordion-toggle" type="checkbox" name ="group-1" id="group-1">
                        <label class="accordion-title according-title2" for="group-1"> <i class="fa fa-tags"></i>Entertainment &nbsp;</label>
                        <ul>
                           <li class="sub-level">
                              <input class="accordion-toggle" type="checkbox" name ="sub-group-1" id="sub-group-1">
                              <label class="accordion-title according-title2" for="sub-group-1">Bollywood</label>  
                              <ul>
                                 <li><a class="subCatproducts"><i class="fa fa-angle-double-right"></i>Dance</a></li>
                                 <li><a class="subCatproducts"><i class="fa fa-angle-double-right"></i>Comedy</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="sub-level">
                        <a><i class="fa fa-tags"></i>Cricket &nbsp;</a>
                     </li>
                     <li class="sub-level">
                        <a><i class="fa fa-tags"></i>Food & Drinks &nbsp;</a>
                     </li>
                     <li class="sub-level">
                        <a><i class="fa fa-tags"></i>Adventures &nbsp;</a>
                     </li>
                     <li class="sub-level">
                        <a><i class="fa fa-tags"></i>Business &nbsp;</a>
                     </li>
                     <li class="sub-level">
                        <a><i class="fa fa-tags"></i>Wellness &nbsp;</a>
                     </li>
                     <li class="sub-level">
                        <a><i class="fa fa-tags"></i>Festivals &nbsp;</a>
                     </li>
                  </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="product shopofferstab1">
                     <h2 class=""><a href="#" class="catgoryevent"><i class="fa fa-random"></i> Popular Events</a></h2>
                     <div class="sidebar--blog">
                        <div id="demo4" class="sidebar-card sidebar--post card--blog_sidebar">
                           <ul class="post-list">
                          	<?php $i = 0; ?>
                           	@foreach ($events as $row) <?php if ($i == 10) break; else $i++; ?> 
                              <li>
                                 <div class="thumbnail_img thumbnail_imgevent">
                                    <img src="{{ asset('storage/'.$row->image) }}" alt="live event in kanpur">
                                 </div>
                                 <div class="title_area title_areaevent">
                                    <a href="{{ url('event/'.$row->url)}}" target="_blank">
                                       <h4>{{substr($row->title, 0, 50)}} ...</h4>
                                    </a>
                                    <div class="date_time">
                                       <span class="lnr lnr-clock"></span>
                                       <p>{{date_format(date_create($row->from_date),'d M, Y h:i A')}}</p>
                                    </div>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-9 padding_div">
            <div class="row">
               <div class="col-sm-12">
                  <div id="carousel-example-generic" class="carousel slide slidea" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="item active">
                           <img src="{{ asset('cdn/images/3.jpg') }}" class="img-responsive" alt="live event in kanpur">
                           <div class="carousel-caption eventhead">
                              <h3>Kanpurize The Spirit of kanpur</h3>
                              <p>Welcome the biggest Change in Kanpur with Ms. UP & Ms. Central India </p>
                           </div>
                        </div>
                        <div class="item">
                           <img src="{{ asset('cdn/images/2.jpg') }}" alt="live event in kanpur" class="img-responsive">
                           <div class="carousel-caption eventhead">
                              <h3>Golden FACE of UP</h3>
                              <p>A full day programme in which each brand / designers participant will be given a chance to promote their dresses and also the winners of contest " Golden face of UP" will be awarded by the title Mr./Ms. Golden face of UP Etc.</p>
                           </div>
                        </div>
                        <div class="item">
                           <img src="{{ asset('cdn/images/1.jpg') }}" class="img-responsive" alt="online event in kanpur">
                           <div class="carousel-caption eventhead">
                              <h3>Udyog Samvaad</h3>
                              <p>Micro, Small and Medium Enterprises (MSMEs) play an important role in developed economies around the world with 90% of industrial output contributed by them...</p>
                           </div>
                        </div>
                        <div class="item">
                           <img src="{{ asset('cdn/images/4.jpg') }}" alt="social event in kanpur" class="img-responsive">
                           <div class="carousel-caption eventhead">
                              <h3>U.P. RMI Music Championship 2018 Quarter Final</h3>
                              <p>Classical katthak & Musical Band also applies 
                                 For more information & Whatsapp No. 8193081307
                              </p>
                           </div>
                        </div>
                        <div class="item">
                           <img src="{{ asset('cdn/images/5.jpg') }}" alt="latest event in kanpur" class="img-responsive">
                           <div class="carousel-caption eventhead">
                              <h3>Kanpurize</h3>
                              <p></p>
                           </div>
                        </div>
                     </div>
                     <a class="left carousel-control controlarrow" href="#carousel-example-generic" data-slide="prev">
                     <span class="lnr lnr-arrow-left-circle"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="right carousel-control controlarrow" href="#carousel-example-generic" data-slide="next">
                     <span class="lnr lnr-arrow-right-circle"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-8">
                  <div class="eventrowline">
                     <h3 class="headcenter">Upcoming Event</h3>
                  </div>
               </div>
               <!--div class="col-sm-4">
                  <form>
                     <div class="form-group">
                        <div class="col-sm-5">
                           <label class="" style=" font-size:11px; float:right;">Select Date:</label>
                        </div>
                        <div class="col-sm-7">
                           <input class="datfont" type="text" id="datepicker1" value="{{ old('startDate') }}" name="datepicker1" placeholder="dd/mm/yyyy" />
                        </div>
                     </div>
                  </form>
               </div -->
            </div>
            <!--div class="ae-embed-plugin" data-type="city" data-cityname="kanpur" data-height="" data-width="" data-transparency="true" data-header="0" data-border="0"></div-->
            <div class="row">
            	@foreach ($events as $row)
               <div class="col-lg-4 col-md-6 col-sm-6">
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
               </div>
               @endforeach
            </div>
            {{$events->links()}}
         </div>
      </div>
   </div>
</section>
@stop
@section('footer')
@parent 
<script>
;(function ( $, window, document, undefined ) {
    var name = "easyTicker",
        defaults = {
			direction: 'up',
			easing: 'swing',
			speed: 'slow',
			interval: 3000,
			height: 'auto',
			visible: 0,
			mousePause: 1,
			controls: {
				up: '',
				down: '',
				toggle: '',
				playText: 'Play',
				stopText: 'Stop'
			}
        };

    // Constructor
    function EasyTicker( el, options ) {
		
		var s = this;
		
        s.opts = $.extend( {}, defaults, options );
        s.elem = $(el);
		s.targ = $(el).children(':first-child');
		s.timer = 0;
		s.mHover = 0;
		s.winFocus = 1;
		
		init();
		start();
		
		$([window, document]).off('focus.jqet').on('focus.jqet', function(){
			s.winFocus = 1;
		}).off('blur.jqet').on('blur.jqet', function(){
			s.winFocus = 0;
		});
		
		if( s.opts.mousePause == 1 ){
			s.elem.mouseenter(function(){
				s.timerTemp = s.timer;
				stop();
			}).mouseleave(function(){
				if( s.timerTemp !== 0 )
					start();
			});
		}
		
		$(s.opts.controls.up).on('click', function(e){
			e.preventDefault();
			moveDir('up');
		});
		
		$(s.opts.controls.down).on('click', function(e){
			e.preventDefault();
			moveDir('down');
		});
		
		$(s.opts.controls.toggle).on('click', function(e){
			e.preventDefault();
			if( s.timer == 0 ) start();
			else stop();
		});
		
		function init(){
			
			s.elem.children().css('margin', 0).children().css('margin', 0);
			
			s.elem.css({
				position : 'relative',
				height: s.opts.height,
				overflow : 'hidden'
			});
			
			s.targ.css({
				'position' : 'absolute',
				'margin' : 0
			});
			
			setInterval( function(){
				adjHeight();
			}, 100);
			
		} // Init Method
		
		function start(){
			s.timer = setInterval(function(){
				if( s.winFocus == 1 ){
					move( s.opts.direction );
				}
			}, s.opts.interval);

			$(s.opts.controls.toggle).addClass('et-run').html(s.opts.controls.stopText);
			
		} // Start method
		
		
		function stop(){
			clearInterval( s.timer );
			s.timer = 0;
			$(s.opts.controls.toggle).removeClass('et-run').html(s.opts.controls.playText);
		}// Stop
		
		
		function move( dir ){
			var sel, eq, appType;
			
			if( !s.elem.is(':visible') ) return;

			if( dir == 'up' ){
				sel = ':first-child';
				eq = '-=';
				appType = 'appendTo';
			}else{
				sel = ':last-child';
				eq = '+=';
				appType = 'prependTo';
			}
		
			var selChild = s.targ.children(sel);
			var height = selChild.outerHeight();
			
			s.targ.stop(true, true).animate({
				'top': eq + height + "px"
			}, s.opts.speed, s.opts.easing, function(){
				
				selChild.hide()[appType]( s.targ ).fadeIn();
				s.targ.css('top', 0);
				
				adjHeight();
				
			});
		}// Move
		
		function moveDir( dir ){
			stop();
			if( dir == 'up' ) move('up'); else move('down'); 
			// start();
		}
		
		function fullHeight(){
			var height = 0;
			var tempDisp = s.elem.css('display'); // Get the current el display value
			
			s.elem.css('display', 'block');
					
			s.targ.children().each(function(){
				height += $(this).outerHeight();
			});
		
			s.elem.css({
				'display' : tempDisp,
				'height' : height
			});
		}
		
		function visHeight( anim ){
			var wrapHeight = 0;
			s.targ.children(':lt(' + s.opts.visible + ')').each(function(){
				wrapHeight += $(this).outerHeight();
			});
			
			if( anim == 1 ){
				s.elem.stop(true, true).animate({height: wrapHeight}, s.opts.speed);
			}else{
				s.elem.css( 'height', wrapHeight);
			}
		}
		
		function adjHeight(){
			if( s.opts.height == 'auto' && s.opts.visible != 0 ){
				anim = arguments.callee.caller.name == 'init' ? 0 : 1;
				visHeight( anim );
			}else if( s.opts.height == 'auto' ){
				fullHeight();
			}
		}
		
		return {
			up: function(){ moveDir('up'); },
			down: function(){ moveDir('down'); },
			start: start,
			stop: stop,
			options: s.opts
		};
    }

    $.fn[name] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, name)) {
                $.data(this, name, new EasyTicker( this, options ));
            }
        });
    };
})( jQuery, window, document );
</script>
<script src="https://allevents.in/scripts/public/ae-plugin-embed-lib.js"></script>
<script>
$(function(){
	$('#demo4').easyTicker({
		direction: 'up',
		easing: 'swing'
	});
});
</script>
<script>
var dates = $("#datepicker1, #datepicker2, #datepicker3, #datepicker4, #datepicker5, #datepicker6, #datepicker7").datepicker({
    minDate: "0",
    maxDate: "+2Y",
    defaultDate: "+1w",
    dateFormat: 'mm/dd/yy',
    numberOfMonths: 1,
    onSelect: function(date) {
        for(var i = 0; i < dates.length; ++i) {
            if(dates[i].id < this.id)
                $(dates[i]).datepicker('option', 'maxDate', date);
            else if(dates[i].id > this.id)
                $(dates[i]).datepicker('option', 'minDate', date);
        }
    } 
});
</script>
@stop