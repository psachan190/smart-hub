@extends('layout')
@section('title', $title)
@section('content')
<section>
	<div class="container-fluid">
   <div class="row" id="metrimonialimg">
         <div class="col-md-7">
         </div>
         <div class="col-md-5">
            <div class="information_module metrimonialdiv">
               <a class="toggle_title">
                <h4>Metrimonial</h4>
               </a>
               @if(session()->has('success'))
                 <div class="alert alert-success" role="alert">
                   <span class="alert_icon lnr lnr-checkmark-circle"></span>{{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="lnr lnr-cross" aria-hidden="true"></span>
                        </button>
                    </div>
               @endif
               
               @if (session('msg'))
                 <div class="">
                    <?php echo session('msg'); ?>
                 </div>
                 @endif
               <form id="profileManagement" name="profileManagement" method="post" action="<?php echo url("matrimonial/create_matrimonial_profile") ?>" autocomplete="off">
                <?php echo csrf_field(); ?>
                  <div class="information__set toggle_module collapse in" id="collapse2" aria-expanded="true">
                     <div class="information_wrapper form--fields">
                     	<div class="col-sm-6">
                        <div class="form-group">
                           <label for="country">Profile For:<sup>*</sup></label>
                           <div class="select-wrap select-wrap2">
                              <select name="createForprofile" id="createForprofile">
                                  <option value="1">Self</option>
                                  <option value="2">Son</option>
                                  <option value="3">Daughter</option>
                                  <option value="4">Brother</option>
                                  <option value="5">Sister</option>
                                  <option value="6">Other</option>
                              </select>
                               <span class="lnr lnr-chevron-down"></span>
                           </div>
                           <small class="text-danger">{{ $errors->first('createForprofile') }}</small>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                           <label for="acname">Name:<sup>*</sup></label>
                           <input type="text" id="profileName" name="profileName" placeholder="Profile Name" />
                            <small class="text-danger">{{ $errors->first('profileName') }}</small>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group" id="genderBlock">
                                <label for="gender">Gender</label>
                               <div class="custom-radio"> 
                                <input type="radio" id="male" name="gender" value="M" />                                <label for="male"><span class="circle"></span>Male</label>&nbsp;&nbsp;
                                 <input type="radio" id="female" name="gender" value="F" />
                                 <label for="female"><span class="circle"></span>Female &nbsp;</label> 
                                 <small class="text-danger">{{ $errors->first('gender') }}</small>
                                </div>
                                </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
   
    
     <label>Date of Birth </label>
											<input type="text" id="DateofBirth" placeholder="Date Of Birth" name="DateofBirth">
                                             <small class="text-danger">{{ $errors->first('DateofBirth') }}</small>
  </div>
                        </div>
                         <div class="col-sm-12">
                        <div class="form-group">
                                <label for="aboutProfile">About Profile</label>
                                <textarea name="aboutProfile" id="aboutProfile" cols="2" rows="2"></textarea> 
                                 <small class="text-danger">{{ $errors->first('aboutProfile') }}</small>
                                
  </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="custom_checkbox form-check">
                                 <input type="checkbox" name="termandcondition" id="Activeprofile" value="1">
                                 <label for="Activeprofile">
                                 <span class="shadow_checkbox"></span>
                                 <span class="radio_title catnamebox">&nbsp; I have read & agree to the </span>&nbsp;&nbsp;
                                 <a href="#" target="_blank"> Terms and Conditions</a>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <button class="btn btn--icon btn-default btn--round btn-secondary" type="submit" name="submit" id="submit">Save</button>
                           </div>
                        </div>
                     </div>
                     <!-- end /.information_wrapper -->
                  </div>
               </form>
            </div>
            <!-- end /.information_wrapper -->
         </div>
         
      <!-- end /.information_module -->
   </div>
   <div class="row" id="femaleimage">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="metriborder">
                  <h2>Bride</h2>
                  <hr>
               </div>
            </div>
         </div>
         <div class="row offerfirstpage">
            <div class="col-sm-12 padding_div">
               <div id="customers-testimonialsowl2" class="owl-carousel owl-carousel-metri">
                  <!--TESTIMONIAL 1 -->
                  @if($all_matrimonialProfile != FALSE)
                  @foreach($all_matrimonialProfile as $mat_arr)
                    <div class="itemimages">
                     <div class="shadow-effect profile-image">
                        <img class="img-responsive" src=' {{ asset("storage/") }}' alt="" />
                        <div class="item-details">
                           <h5>Jean Grey</h5>
                        </div>
                        <div class="agile-overlay">
                           <h4>Profile ID: 458645</h4>
                           <ul>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Age / Height :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Age :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->dob) ? $mat_arr->dob : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                             <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Religion :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Caste :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Sirname :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->sirname) ? $mat_arr->sirname : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Profession :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row" id="maleimage">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="metriborder">
                  <h2>Groom</h2>
                  <hr>
               </div>
            </div>
         </div>
         <div class="row offerfirstpage">
            <div class="col-sm-12 padding_div">
               <div id="customers-testimonialsowl" class="owl-carousel owl-carousel-metri">
                 @if($all_matrimonialProfile != FALSE)
                  @foreach($all_matrimonialProfile as $mat_arr)
                    <div class="itemimages">
                     <div class="shadow-effect profile-image">
                        <img class="img-responsive" src=' {{ asset("") }}' alt="" />
                        <div class="item-details">
                           <h5>Steve Rogers</h5>
                        </div>
                        <div class="agile-overlay">
                           <h4>Profile ID: 458645</h4>
                          <ul>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Age / Height :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Age :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->dob) ? $mat_arr->dob : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                             <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Religion :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Caste :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Sirname :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->sirname) ? $mat_arr->sirname : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                              <li class="nbs-flexisel-item">
                              <div class="row">
                              	<div class="col-sm-5">
                                	<span>Profession :</span>
                                </div>
                                <div class="col-sm-7">
                                	<span>{{ !empty($mat_arr->height) ? $mat_arr->height : " Not Mentioned" }}</span>
                                </div>
                              </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--<div class="row" id="postbackimage">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="metriborder">
                  <h2>Matrimonial blog</h2>
                  <hr>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3 col-sm-6">
                    <div class="single_blog metrimonial_blog blog--card">
                        <figure>
                            <img src="{{ asset('cdn/images/metrimonial/blog1.jpg') }}" alt="Blog image">

                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title"><h4>Shailesh kumar weds Saguna</h4></a>
                                    <p>We were on different parts of the city, completely unknown to each other and one day get to know her on Kanpurize matrimonial and started chatting with each others and now living a great happily married life. Thanks Kanpurize</p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>24 Feb 2017</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment"><a href="{{ url('Matrimonial-blog-story') }}">read more</a></p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            <div class="col-md-3 col-sm-6">
                    <div class="single_blog metrimonial_blog blog--card">
                        <figure>
                             <img src="{{ asset('cdn/images/metrimonial/blog2.jpg') }}" alt="Blog image">

                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title"><h4>Aman Shukla weds Sonam</h4></a>
                                    <p>We were on different parts of the city, completely unknown to each other and one day get to know her on Kanpurize matrimonial and started chatting with each others and now living a great happily married life. Thanks Kanpurize</p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>24 Feb 2017</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment"><a href="{{ url('Matrimonial-blog-story') }}">read more</a></p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            <div class="col-md-3 col-sm-6">
                    <div class="single_blog metrimonial_blog blog--card">
                        <figure>
                             <img src="{{ asset('cdn/images/metrimonial/blog3.jpg') }}" alt="Blog image">
                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title"><h4>Amit Shukla weds Rima</h4></a>
                                    <p>We were on different parts of the city, completely unknown to each other and one day get to know her on Kanpurize matrimonial and started chatting with each others and now living a great happily married life. Thanks Kanpurize</p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>24 Feb 2017</p>
                                    </div>
                                    <div class="comment_view">
                                       <p class="comment"><a href="{{ url('Matrimonial-blog-story') }}">read more</a></p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
             <div class="col-md-3 col-sm-6">
                    <div class="single_blog metrimonial_blog blog--card">
                        <figure>
                            <img src="{{ asset('cdn/images/metrimonial/blog1.jpg') }}" alt="Blog image">

                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title"><h4>Shailesh kumar weds Saguna</h4></a>
                                    <p>We were on different parts of the city, completely unknown to each other and one day get to know her on Kanpurize matrimonial and started chatting with each others and now living a great happily married life. Thanks Kanpurize</p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>24 Feb 2017</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment"><a href="{{ url('Matrimonial-blog-story') }}">read more</a></p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>  
            </div>
         </div>
      </div>-->
   </div>   
</section>

@stop
@section('footer')
@parent
<script src="{{ asset('cdn/js/matrimonial.js')}}"></script>
<script>$(function() {
        $( "#DateofBirth" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
</script>
<script>
$(document).ready(function(e) {
$(document).on('change','#createForprofile',function(){
		 var createFor = $("#createForprofile").val();
		 if(createFor == 1 || createFor==6 ){
		      $("#male").attr('checked',false);
			   $("#female").attr('checked',false); 
			  $("#genderBlock").show();
			}
		 else if(createFor==3 || createFor==5){
			 $("#genderBlock").hide();
			 $("#female").attr('checked',true);
			 $("#male").attr('checked',false);
			}
	      else if(createFor==2 || createFor==4){
			   $("#genderBlock").hide();
			   $("#male").attr('checked',true);
			   $("#female").attr('checked',false); 
			 }			
	   });
});
</script>

@stop