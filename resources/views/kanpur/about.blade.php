@extends("layout")
@section('content')
<section class="hero-area hero--1 bgimage">
        <div class="bg_image_holder">
            <img src="{{ asset('images/hero_area_bg.png') }}" alt="marketplace in kanpur">
        </div>
        <div class="hero-content content_above">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row online_shopping">
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <h1>
                                    <span class="light">Create Your Own</span>
                                    <span class="bold">Digital Marketplace</span>
                                </h1>
                                 <p class="tagline">With</p><h1 class="bold"> Kanpurize The Spirit of Kanpur</h1>
                            </div>
                            <div class="hero__btn-area">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="about_mission aboutcontent" id="about">
    <div class="content_block1">
        <div class="container">
            <div class="row">
                <div class="row">
                <div class="col-md-12 col-sm-12">
 <?php
if(isset($_GET['success'])){
    echo "<p style='color:green;'><strong>We are Contact Shortly .</strong></p>";
    }
if(isset($_GET['fails'])){
    echo "<p style='color:red;'><strong>We are Contact Shortly .</strong></p>";
 } 
?>  
                </div>
            </div>
                <div class="col-md-5 col-sm-6">
                    <div class="content_area">
                        <h1 class="content_area--title">About <span class="highlight">Us</span></h1>
                        <p>Kanpurize- The Spirit of Kanpur is a web portal designed with a vision to connect the whole Kanpur city socially, unify it Emotionally & Optimize Commercially. Kanpurize is <a class="kanpur_market_place2" title="web development in kanpur" href=" {{ url('web-development-in-kanpur') }}" >best website development company in kanpur</a>. Kanpurize is being developed as a one stop platform to cater the needs of everyone in Kanpur, for everything they want, in their everyday activity and give them the experience of lifestyle of metro cities. kanpurize is local online shopping. Kanpurize has something for everyone living, studying or working in Kanpur.
This is the Best Marketplace and Social Web in Kanpur.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_image bgimage">
            <a href="{{ url('kanpurize_home') }}" title="Business Promotion in kanpur"><div class="bg_image_holder">
                <img src="{{ asset('images/icon/about.jpg') }}" alt="Business Promotion in kanpur">
            </div></a>
        </div>
    </div>
</section>
<section class="why_choose normal-padding-index bgcolor" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1><span class="highlighted">Services</span></h1>
                    <p>You may be a student, a Businessman, an Employee or a Housewife, Kanpurize has something for everyone in Kanpur. Just to highlight, some of our best services are</p>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-3 col-sm-6">
                <div class="feature servicebox">
                    <div class="feature__img">
                        <span class="lnr lnr-cart iconfirst"></span>
                    </div>
                    <div class="feature__title">
                        <h3>Dynamic Market Place</h3>
                    </div>
                    <div class="feature__desc">
                        <p class="kanpur">Kanpurize offers a versatile market place according to the requirements of both a seller & a buyer.</p>
                        <span><a data-toggle="modal" data-target="#Dynamic" class="btn btn--round btn--bordered btn-sm btn-secondary" title="Web development in kanpur">More Detail</a></span>
                    </div>
                </div>
            </div>
           <div class="col-md-3 col-sm-6">
                <div class="feature servicebox">
                    <div class="feature__img">
                        <span class="lnr lnr-users iconfirst"></span>
                    </div>
                    <div class="feature__title">
                        <h3>Customized Profile</h3><br />
                    </div>
                    <div class="feature__desc">
                        <p class="kanpur">Kanpurize social web offers you to create and customize your profile as per your personal & professional needs</p>
                         <span><a data-toggle="modal" data-target="#profile" class="btn btn--round btn--bordered btn-sm btn-secondary" title="Social web in kanpur">More Detail</a></span>
                    </div>
                </div>
            </div>
           <div class="col-md-3 col-sm-6">
                <div class="feature servicebox">
                    <div class="feature__img">
                        <span class="lnr lnr-magic-wand iconfirst"></span>
                    </div>
                    <div class="feature__title">
                        <h3>Business Consultancy</h3>
                    </div>
                    <div class="feature__desc">
                        <p class="kanpur">With its team of Expert Business & Marketing Professionals, who have adequate knowledge gained by in-depth</p>
                        <span><a data-toggle="modal" data-target="#Consultancy" class="btn btn--round btn--bordered btn-sm btn-secondary" title="Business promotion in kanpur">More Detail</a></span>
                    </div>
                </div>
            </div>
           <div class="col-md-3 col-sm-6">
                <div class="feature servicebox">
                    <div class="feature__img">
                        <span class="lnr lnr-bullhorn iconfirst"></span>
                    </div>
                    <div class="feature__title">
                        <h3>Advertisement</h3><br />
                    </div>
                    <div class="feature__desc">
                        <p class="kanpur">Kanpurize, with its targeted advertising platform, helps the Business Owners in <a class="kanpur_market_place2" href=" {{ url('web-development-in-kanpur#Advertisement') }}" target="_blank" title="Advertisement in kanpur" >advertising</a> their products</p>
                        <span><a data-toggle="modal" data-target="#Advertising" class="btn btn--round btn--bordered btn-sm btn-secondary" title="Advertisement in kanpur">More Detail</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why_choose normal-padding-index" id="whychoos">
    <div class="container">
         <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Why Choose <span class="highlighted">Us</span></h1>
                    <p>Answer to this question lies in the very root of Kanpurize. In today’s time of Fast moving life, we all need some free time for ourselves and our loved ones. Kanpurize among its best services offers you this luxury. Leave all the stress of online Shopping and Business for Kanpurize. Let’s see how the platform takes away your problems.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="feature2 whychoss">
                    <span class="feature2__count">01</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-license pcolor"></span>
                        <h3 class="feature2-title">Bridging The Gap</h3>
                        <p>The platform called ‘Kanpurize’ is developed after almost three years of Market Research & finding out the pain areas in the market.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature2 whychoss">
                    <span class="feature2__count">02</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-magic-wand scolor"></span>
                        <h3 class="feature2-title">A only Social Web</h3>
                        <p>Moving on our path to this solution, we realized that there is also a need of a new social Platform which makes the communication effective instead of Mere Time-waste & Sharing of Unreliable news & hoax. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature2 whychoss">
                    <span class="feature2__count">03</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-leaf mcolor1"></span>
                        <h3 class="feature2-title">You say, We listen</h3>
                        <p>This idea further made us think of having an active participation of every user, so we decided to make this platform dynamically live, which means; the Kanpurize will keep on adding & removing the features & services as per the demand from people of Kanpur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature2 whychoss">
                    <span class="feature2__count">04</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-tag scolor"></span>
                        <h3 class="feature2-title">Hassle free local shopping</h3>
                        <p>Kanpurize offer you the comfort of online shopping in your favorite local market and with your trusted local shop. You can now shop what you want from the online shop of your choice sitting at your home, at any time of your comfort. It is best online shopping in kanpur</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature2 whychoss">
                    <span class="feature2__count">05</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-laptop-phone mcolor1"></span>
                        <h3 class="feature2-title">Commercially Optimized Business</h3>
                        <p> you can commercially optimize your business. Find the best returns on your cost of <a class="kanpur_market_place2" href=" {{ url('web-development-in-kanpur#Advertisement') }}" target="_blank" >Advertisement in kanpur</a>. Get the true opinion about your products, services & Customer’s Experience from your regular as well as new buyers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature2 whychoss">
                    <span class="feature2__count">06</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-clock pcolor"></span>
                        <h3 class="feature2-title">Get Solution within 24 Hours</h3>
                        <p>We are dedicated to serve you the best. Any problem related to our platform that you bring in our notice, will be attended within 24 hours of your first intimation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="normal-padding-index bgcolor" id="testimonial">
        <div class="container">
        	<div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1><span class="highlighted">Testimonial</span></h1>
                    <p>Kanpurize- The Spirit of Kanpur is first of its kind online platform for Kanpurites to do everything they want from socializing to shopping.</p>
                </div>
            </div>
        </div>
            <div class="row">
                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
        <div class='carousel-inner '>
            <div class='item active'>
                 <div class="testimonial testibox">
                        <div class="testimonial__about">
                            <div class="avatar v_middle"><img src="{{ url('images/icon/1.png') }}" alt="web shop in kanpur"></div>
                            <div class="name-designation v_middle">
                                <h4 class="name">Avneet Gupta</h4>
                                <span class="desig">Student</span>
                            </div>
                            <span class="lnr lnr-bubble quote-icon"></span>
                        </div>
                        <div class="testimonial__text">
                            <p>It’s a very new and unique thing for Kanpur. Now we can get everything which belongs to Kanpur at our finger’s tips. Wishing all the very best for the future of this.</p>
                        </div>
                    </div>
            </div>
            <div class='item'>
                <div class="testimonial testibox">
                        <div class="testimonial__about">
                            <div class="avatar v_middle"><img src="{{ ('images/icon/1.png') }}" alt="local online shopping in kanpur"></div>
                            <div class="name-designation v_middle">
                                <h4 class="name">Kartikey Singh</h4>
                                <span class="desig">Business Man</span>
                            </div>
                            <span class="lnr lnr-bubble quote-icon"></span>
                        </div>
                        <div class="testimonial__text">
                            <p>The Kanpurize concept is very unique and new.  Congratulations and best wishes.</p>
                        </div>
                    </div>
            </div>
            <div class='item'>
                <div class="testimonial testibox">
                        <div class="testimonial__about">
                            <div class="avatar v_middle"><img src="{{ url('images/icon/1.png') }}" alt="web shop in kanpur"></div>
                            <div class="name-designation v_middle">
                                <h4 class="name">M.K. Singh</h4>
                                <span class="desig">Real Estate Agent</span>
                            </div>
                            <span class="lnr lnr-bubble quote-icon"></span>
                        </div>
                        <div class="testimonial__text">
                            <p>This is a great idea by which it will be possible to cater the need of Kanpur and its people very well. </p>
                        </div>
                    </div>
            </div>
            <div class='item'>
               <div class="testimonial testibox">
                        <div class="testimonial__about">
                            <div class="avatar v_middle"><img src="{{ url('images/icon/1.png') }}" alt="online platform in kanpur"></div>
                            <div class="name-designation v_middle">
                                <h4 class="name">Kusum Yadav</h4>
                                <span class="desig">Chartered Accountant</span>
                            </div>
                            <span class="lnr lnr-bubble quote-icon"></span>
                        </div>
                        <div class="testimonial__text">
                            <p>This is a very unique and new concept in our city. Something like that was never heard before. I wishes all the very best to Kanpurize and its whole team.</p>
                        </div>
                    </div>
            </div>
        </div>
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev' title="marketplace in kanpur">
            <span class='lnr lnr-chevron-left singlepror slick-arrow'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next' title="Advertisement in kanpur">
            <span class='lnr lnr-chevron-right singlepror slick-arrow'></span>
        </a>
    </div></div>
            </div>
        </div>
    </section>
<section class="call-to-action videokz bgimage">
    <div class="bg_image_holder">
        <img src="{{ asset('images/calltobg.jpg') }}" alt="Online Shoping in kanpur">
    </div>
    <div class="container content_above">
    <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1><span class="color_white_code highlighted">Our Video</span></h1>
                    <p class="color_white_code">Kanpurize- The Spirit of Kanpur is first of its kind online platform for Kanpurites to do everything they want from socializing to shopping.</p>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-3"></div>
            <div class="col-md-6">
                    <div class="testimonial_video">
                        <figure>
                            <img src="{{ asset('images/icon/kz.png') }}" alt="marketplace in kanpur">

                            <figcaption class="video_play">
                                <button data-toggle="modal" data-target="#myModal"><img src="{{ asset('images/vpla.png') }}" alt="online shopping in kanpur"></button>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
<div class="modal fade testimonial_vid" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <iframe height="600" src="https://www.youtube.com/embed/mkstd-YiKcs" allowfullscreen></iframe>
           </div>
        </div>
    </div>
<section class="why_choose normal-padding-index" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="normal-padding section-title">
                    <h1><span class="highlighted">SEND YOUR MESSAGE</span></h1>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-6 col-sm-6">
           			<div class="contact_form--wrapper">
    				<div class="row">
                    	<div class="col-md-6 col-sm-6">
                        	<p class="addresscall"><span class="iconclorsize lnr lnr-apartment"></span> 109/336,<br /> Ram Krishna Nagar,<br /> Jawahar Nagar, Kanpur,<br /> Uttar Pradesh 208012.</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                        	<p class="addresscall"><span class="iconclorsize fa fa-phone"></span> +91-7706040151
                            </p>
                            <p class="addresscall"><span class="iconclorsize fa fa-envelope"></span> info@kanpurize.com
                            </p>
                        </div>
    				</div>
                 </div>
            </div>
            <div class="col-md-6 col-sm-6">
    			<div class="contact_form--wrapper border_left_color">
                <p><strong><span class="iconclorsize lnr lnr-tag"></span></strong> Your suggestions, feedbacks and complaints are always welcomed by us. It helps us understand what you expect from us. You can send us your message below and we promise to return to you as soon as possible.</p> 
                </div>    
        </div>
    </div>
        <div class="row">
           <div class="col-md-6 col-sm-6">
           	<blockquote>
                        <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.6574629592906!2d80.31847721492478!3d26.466768183321623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c47801a97178b%3A0x24ff91e88d019cf1!2sKanpurize!5e0!3m2!1sen!2sin!4v1510121782983" width="500" height="300"  allowfullscreen></iframe></div>
                    </blockquote>
            </div>
            <div class="col-md-6 col-sm-6">
                    <div class="contact_form--wrapper">
                                            @foreach($errors->all() as $error)
			                              <li class='' style='color:red;'>{{ $error }}</li>
		                                 @endforeach  
                                          @if(Session::has('msg'))
                                          	@if(Session::get('status') == 'error')
                                        		<div class="alert alert-danger" role="alert">
                                        	@else
                                        		<div class="alert alert-success" role="alert">
                                        	@endif
                                                <span class="alert_icon lnr lnr-checkmark-circle"></span> 
                                        	@if(Session::get('status') == 'error')
                                        		<strong>Oops!</strong> 
                                        	@else
                                        		<strong>Well done!</strong> 
                                        	@endif
                                        		{{Session::get('msg')}}
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span class="lnr lnr-cross" aria-hidden="true"></span>
                                                   </button>
                                          </div>
                                          @endif
                                         <form action="{{url("action/contact-us")}}" method="post">
                                            <?php echo csrf_field(); ?>
                                           
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Name" name="name" required="required" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Email" name="email" id="email" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Mobile No" name="mobile" id="mobile" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group select-wrap select-wrap2">
                                                           <select name="type" id="type" class="text_field">
                                                              <option value="Suggetion">Suggestion</option>
                                                              <option value="Feedback">Feedback</option>
                                                              <option value="Business Enquiry">Business Enquiry</option>
                                                          </select>
                                                           <span class="lnr lnr-chevron-down"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <textarea cols="30" rows="4" placeholder="Yout text here" name="comment" ></textarea>

                                                <div class="sub_btn">
                                                    <button type="submit" class="btn btn--round btn--default">Send Request</button>
                                                </div>
                                            </form>
                                        </div>
            </div>
        </div>
    </div>
</section>
<!--popup-->
<div class="modal" id="Dynamic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title1 servicehead" id="myModalLabel"> Dynamic Market Place </h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        <img src="{{ asset('images/dynamic.jpg') }}" alt="marketplace in kanpur"  />
                         <div class="underline"></div>
                         <div class="onlineshop">
                        	<p>Kanpurize offers a versatile market place according to the requirements of both a seller & a buyer.  </p>
                            <p>We offer Web-shops and Targeted Advertising which helps both the Buyers and Sellers. Kanpurize fills the gap between a Buyer’s Genuine demand and a Seller’s true Business Potential by connecting them locally in an online world. kanpurize is <a title="Web Development in Kanpur" class="kanpur_market_place2" href=" {{ url('web-development-in-kanpur#Development') }}" target="_blank" >best web design and web development in kanpur.</a></p>
                            <p>For Buyers:- Online Buyers can find the Local stores nearby for their needs, rate these shops as per their experience & help them grow their business by recommending them to their contacts. You can also compare the price of one item across multiple local shops in Kanpur on your fingertips and save your time and Fuel.</p>
                            <p>For Sellers:-Kanpurize is a platform which makes a Local Businessman (Shop Owner or Service provider) reach directly to potential online local customers nearby. The Businessmen can receive the enquiriesfrom their local customers and stay updated about their Customer’s requirement & feedback by live user inputs.</p>
                            <p> It also enables a Business owner to place very specifically targeted ads to the appropriate customer segment & reduce the over-all cost on <a title="Advertisement in kanpur" class="kanpur_market_place2" href=" {{ url('web-development-in-kanpur#Advertisement') }}" >Advertisement in kanpur</a>.
</p></div>
                        	
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
<!--popup end-->
<!--popup-->
<div class="modal" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title1 servicehead"> Customized Profile</h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        <img src="{{ asset('images/guest_bg.jpg') }}" alt="Online shop in kanpur" />
                         <div class="underline"></div>
                         <div class="onlineshop">
                        	<p>Kanpurize <a title="social web in kanpur" class="kanpur_market_place2" href="{{ url('kanpurizeMarketplace') }}">social web offers you to create</a> and customize your profile as per your personal & professional needs. The different type of profile options available are:-</p>
                            <div class="registerseller prcustom">
                        <div class="regfeature lifontanswer">
                            <ul>
                                <li>Standard</li>
                                <li>Business Owner</li>
                                <li>Business Enterprise</li>
                                <li>Political/Social Person</li>
                                <li>Political/Social Organization & NGO</li>
                                <li>VIP</li>
                            </ul>
                        </div>
                    </div>
                       <p>With so many options available for the Customization of Individual & Organizational Profiles, there is very little left to think. </p>
                            <p>We expect to fulfill all the potential needs of a Businessman, a Political Figure, a Social Person, A Student, An Employee and everyone else. You can socialize, increase your reach to local people of Kanpur in a better way, share opinions, discuss the live topics, increase your knowledge, find new career options etc. However, if you feel you need more features, further customization can be provided as per the user’s requirement.</p>
                           </div>
                        	
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
<!--popup end-->
<!--popup-->
<div class="modal" id="Consultancy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title1 servicehead">Efficient Business Consultancy</h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        <img src="{{ asset('images/business.jpg') }}" alt="Business promotion in kanpur"  />
                         <div class="underline"></div>
                         <div class="onlineshop">
                        	<p>With its team of Expert Business & Marketing Professionals, who have adequate knowledge gained by in-depth study of Kanpur market, Kanpurize offers efficient business consultancy to micro and small businesses about <a class="kanpur_market_place2" href=" {{ url('web-development-in-kanpur#Advertisement') }}" >Advertisiment, Business Planning, bussiness promotion, Sales Skills & Strategy, Cost Optimization etc.</a> </p>
                            <p>With this effort, Kanpurize is trying to help New & Small business to grow efficiently in such a competitive market & among cut-throat competition</p>
                            <p>Kanpurize also offers co-working spaces in association with our partners to grow the environment of Entrepreneurship, locally in Kanpur.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
<!--popup end-->
<!--popup-->
<div class="modal" id="Advertising" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title1 servicehead">Optimized Advertising</h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        <img src="{{ asset('images/advertisement.jpg') }}" alt="Advertisement in kanpur" />
                         <div class="underline"></div>
                         <div class="onlineshop">
                        	<p>Kanpurize, with its targeted advertising on its platform, helps the Business Owners in advertising their products and services in a very smart way. It helps them to target the <a class="kanpur_market_place2" href=" {{ url('web-development-in-kanpur') }}" >potential market in an efficient way and reduce their cost of advertisement </a>considerably.</p>
                            <p>Being the part of a Civil & Responsible Society, Kanpurize has taken an initiative to make the Businesses & Markets go Greener & more Eco-friendly. We request all the Sincere & Responsible Citizens of Kanpur to help us in this initiative to make the Advertisements go paperless by eliminating the need of Banners, Brochures, Hoardings, Pamphlets etc. & promote digital way of Marketing & Advertisement by our platform.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
@stop
