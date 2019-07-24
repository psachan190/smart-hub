/* profile upload matrimonial */
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
/* profile upload matrimonial */


// Mobile Navigation
$('.mobile-toggle').click(function() {
    if ($('.main_nav').hasClass('open-nav')) {
        $('.main_nav').removeClass('open-nav');
    } else {
        $('.main_nav').addClass('open-nav');
    }
});

$('.main_nav li a').click(function() {
    if ($('.main_nav').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('.main_nav').removeClass('open-nav');
    }
});


/*----------------------------------------------------*/
/* Smooth Scrolling
------------------------------------------------------ */

jQuery(document).ready(function($) {

   $('.smoothscroll').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 800, 'swing', function () {
	        window.location.hash = target;
	    });
	});
  
});

$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});

$(document).ready(function(){
	  $(document).on('click','#show',function(){
	    var showValue = $(this).data('price');
		if(showValue==1){
		   $("#show").data('price',2);
		   $("#ms-menu").show();
		 }
		else{
		    $("#ms-menu").hide();
			  $("#show").data('price',1);
		 } 
	  });     
	});
	
	$(document).ready(function(){
	  $(document).on('click','#showtimelineBtn',function(){
	    var showValue = $(this).data('price'); //alert(showValue);
		if(showValue==1){
		   $("#showtimelineBtn").data('price',2);
		   $("div #timelineListMenu").removeClass('hidden-xs');
		   $("#timelineListMenu").show();
		 }
		else{
		    $("#timelineListMenu").hide();
			$("#showtimelineBtn").data('price',1);
		 } 
	  });     
	});
	
	jQuery(document).ready(function($) {
"use strict";
$('#webshop').owlCarousel( {
		loop: true,
		items: 5,
		margin:0,
		autoplay: true,
		dots:true,
    nav:true,
		autoplayTimeout: 8500,
		smartSpeed: 750,
  	navText: ['<i class="lnr lnr-chevron-left leftarrowcolor"></i>','<i class="lnr lnr-chevron-right leftarrowcolor"></i>'],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},
			1170: {
				items: 4
			},
			1440: {
				items: 5
			}
		}
	});
});


jQuery(document).ready(function($) {
"use strict";
$('#slideroffers').owlCarousel( {
		loop: true,
		center: true,
		items: 4,
		margin:0,
		autoplay: true,
		dots:true,
    nav:true,
		autoplayTimeout: 8500,
		smartSpeed: 450,
  	navText: ['<i class="lnr lnr-chevron-left leftarrowcolor"></i>','<i class="lnr lnr-chevron-right leftarrowcolor"></i>'],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},
			1170: {
				items: 4
			},
			1440: {
				items: 5
			}
		}
	});
});

jQuery(document).ready(function($) {
"use strict";
$('#slidercoupon').owlCarousel( {
		loop: true,
		center: true,
		items: 4,
		margin:0,
		autoplay: true,
		dots:true,
    nav:true,
		autoplayTimeout: 8500,
		smartSpeed: 1000,
  	navText: ['<i class="lnr lnr-chevron-left leftarrowcolor"></i>','<i class="lnr lnr-chevron-right leftarrowcolor"></i>'],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 3
			},
			1170: {
				items: 4
			},
			1440: {
				items: 5
			}
		}
	});
});

jQuery(document).ready(function($) {
"use strict";
$('#slidercoupon').owlCarousel( {
		loop: true,
		center: true,
		items: 4,
		margin:0,
		autoplay: true,
		dots:true,
    nav:true,
		autoplayTimeout: 8500,
		smartSpeed: 450,
  	navText: ['<i class="lnr lnr-chevron-left leftarrowcolor"></i>','<i class="lnr lnr-chevron-right leftarrowcolor"></i>'],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			1024: {
				items: 3
			},
			1440: {
				items: 4
			},
			
		}
	});
});