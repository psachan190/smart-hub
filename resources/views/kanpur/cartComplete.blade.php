@extends("layout")
@section('content')
 <!----breadcrum-start---->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="#">Shopping Cart</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Shopping Cart</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <!----breadcrum-End---->
    <!----section start----->
    <section class="cart_area section--padding2 bgcolor">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Cart Complete Success</div>
                         <div id="resultCart"></div>
                        <div class="panel-body">
                           <h4 style="line-height:30px;">Your Order completed Successfully </h4>
                          <h5 style="line-height:30px;">Thank you for Shopping In kanpurize </h5>  
                          <a href="<?php echo url("kanpurizeMarketplace"); ?>" class="btn btn--md btn--round register_btn">Back</a>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                </div>
              </div>
            </div>
        </div>
    </section>
@stop

