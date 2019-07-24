<footer class="footer-area">
    <div class="footer-big section--padding">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="info-footer">
                        <h5 class="footer-widget-title text--white" title="Marketplace in Kanpur">Our Company in kanpur</h5>
                        <ul class="info-contact">
                            <li>
                                <span class="lnr lnr-smartphone info-icon"></span>
                                <span class="info">+91-7706040151</span>
                            </li>
                            <li>
                                <span class="lnr lnr-envelope info-icon"></span>
                                <span class="info">info@kanpurize.com</span>
                            </li>
                            <li>
                                <span class="lnr lnr-map-marker info-icon locationicon1"></span>
                                <span class="info">109/336,<br /> Ram Krishna Nagar,<br /> Kanpur 208012 </span>
                            </li>
                        </ul>
                    </div><!-- end /.info-footer -->
                </div><!-- end /.col-md-3 -->

                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h5 class="footer-widget-title text--white" title="Online Market in Kanpur">Kanpurize Marketplace</h5>
                        <ul>
                            <li><a href="{{ url('Marketplace-in-kanpur#about') }}" title="Online Shopping in Kanpur">About Us</a></li>
                            <li><a href="{{ url('Marketplace-in-kanpur#contact') }}" title="local online shopping in kanpur">Contact Us</a></li>
                            <li><a href="{{ url('Marketplace-in-kanpur#testimonial') }}" title="Social web of kanpur">Testimonials</a></li>
                            <li><a href="{{ url('Marketplace-in-kanpur#services') }}" title="Webshop in Kanpur">Services</a></li>
                            <li><a href="{{ url('Marketplace-in-kanpur#whychoos') }}" title=" Live Event in Kanpur">Why Choose Us</a></li>
                            <li><a target="_blank" href="{{ url('kanpurizeblog') }}" title=" Live Event in Kanpur">Our Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="newsletter">
                        <h5 class="footer-widget-title text--white" title="best online shopping in kanpur">Newsletter</h5>
                        <p>Subscribe to get the latest online shopping news, update and offer information.</p>
                        <p id="thank_you"></p>
                        <div class="newsletter__form">
                            <form action="#">
                                <div class="field-wrapper">
                                     <input class="relative-field rounded" name="email_newsletter" id="email_newsletter" type="text" placeholder="Enter email">
                                    <button class="btn btn--round" type="button" onclick="newsletter();" >Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- start .social -->
                        <div class="social social--color--filled">
                            <ul>
                                <li><a href="https://www.facebook.com/kanpurize/" title="Social Web in Kanpur"><span class="fa fa-facebook" title="Share the store location on Facebook"></span></a></li>
                                <li><a href="https://twitter.com/kanpurize" title="Online Shopping in Kanpur"><span class="fa fa-twitter" title="Share the store location on twitter"></span></a></li>
                                <li><a href="https://plus.google.com/u/0/110561505744471170049" title="Live Event in Kanpur"><span class="fa fa-google-plus" title="Share the store location on google plus"></span></a></li>
                                <li><a href="https://www.linkedin.com/in/kanpurize-the-spirit-of-kanpur-938b58155/" title="Business software in kanpur"><span class="fa fa-linkedin" title="Share the store location on linkedin"></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UC9rFsHN1ynWZ3bfEAI9JiiQ?view_as=subscriber" title="Online Market in Kanpur"><span class="fa fa-youtube" title="Share the store location on Youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mini-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <h6 class="copyrighttext">&copy; 2018 <a href="{{ url('#') }}">Kanpurize</a>. All rights reserved. Created by <a href="#">Kanpurize</a></h6>
                    </div>
						<a id="back-to-top" class="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">&nbsp;<span class="lnr lnr-chevron-up"></span></a>

                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/indexfooter.js') }}"></script>
<script>
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };
    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
    function open_quiz()
    {
// quizajax
         $.ajax({
            type : 'GET',
            url : "{{ url('kanpurize_quiz')}}",
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
            data:{'d1' : '11'},
                  success:function(response){
                   $('#quizajax').html(response);
                }

        });
    }
    function submit_quiz(){
    $.ajax({
      type:'POST',
      url: "{{ url('kanpurize_quiz') }}",
      data:new FormData($("#block_form_or")[0]),
      async:false,
      processData: false,
      contentType: false,
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      success:function(data){
        //alert(response);
            $('#quizajax').html(data);
      }
    });
  }
</script>
<script>

    function newsletter()
{
    
  $.ajax({
          url: '{{ url("newsletter") }}',
          type:"GET",
          data:{ 'email' :$('#email_newsletter').val()},
          success: function(data){
            if(data == '1')
            {
                $('#thank_you').html('Thank you for subscription.');
            }
            else
            {
                $('#thank_you').html('Try Again.');
            }
          }
       });
}
    /*----------------------------------------------------*/
/* Quote Loop
------------------------------------------------------ */

function fade($ele) {
    $ele.fadeIn(1000).delay(3000).fadeOut(1000, function() {
        var $next = $(this).next('.quote');
        fade($next.length > 0 ? $next : $(this).parent().children().first());
   });
}
fade($('.quoteLoop > .quote').first());


/*----------------------------------------------------*/
/* Navigation
------------------------------------------------------ */

$(window).scroll(function() {

    if ($(window).scrollTop() > 300) {
        $('.main_nav').addClass('sticky');
    } else {
        $('.main_nav').removeClass('sticky');
    }
});

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

</script>
<script>
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

});</script>
<script src="<?php echo url("validationJS/formFieldValidation.js"); ?>"></script>
<script src="<?php echo url("validationJS/backendAjax.js"); ?>"></script>

</body>

</html>
