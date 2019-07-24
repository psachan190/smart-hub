@extends("layout")
@section('content')
<!--================================
    START HERO AREA
=================================-->
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('kanpurizeMarketplace') }}">Home</a></li>
                            <li class="active"><a href="{{ url('kanpurize_Advertisementpolicy') }}">Recomended</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Recomended</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
    
<section class="contact-area webshopback section--padding">
        <div class="container">
            <div class="row recompage">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">{{ session()->get('status') }}</div>
            @endif
            <form id="recommendshop" method="POST" role="form">
               {{ csrf_field() }}
            <div class="row">
               <div class="col-md-4">
                           <div class="form-group">
                                    <label>Category</label>
                                   <div class="filter__option filter--select">
                                <div class="select-wrap">
                                    <select name="shopcategory_id" id="shopcategory_id">
                                        @foreach($shopcategory as $shop)
                                        <option value="{{ $shop->cid}}">{{ $shop->cname}}</option>
                                        @endforeach
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                            </div>
                                      <span id="nameErr"></span>
                                </div>
                        </div>
               <div class="col-md-4">
                            <div class="form-group">
                                    <label>Your Name</label>
                                    <input name="shopname" id="shopname" type="text" class="text_field textName" value="" placeholder="Enter your Name" required="required" />
                                </div>
                        </div>
               <div class="col-md-4">
                           <div class="form-group">
                                    <label>Location</label>
                                    <textarea name="location" id="location" rows="1" type="text" class="text_field textName"  required="required"></textarea> 
                                </div>              
                         </div>
            </div>
            <div class="row">
            	<div class="col-sm-12">
                	<div class="form-group recomended" style="text-align:center;">
                                    <button class="btn btn--md btn--round register_btn" type="submit" name="submit" id="submit">Submit</button>
                                </div>
                </div>
            </div>
              </form>
            </div>
        </div>
</section>

@stop 