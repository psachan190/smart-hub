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
                            <li class="active"><a href="{{ url('kanpurize_users_wishList') }}">Your Wish List</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Your Wish List</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
   <!----breadcrum-End---->
    <!----section start----->
    <section class="cart_area normal-padding bgcolor">
        <div class="container-fluid">
            <div class="row" id="wishrowList">
              <div class="col-sm-12 padding_div">
              		<div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Wish List</h3>
                                    <p style="margin-top:15px;" id="wishlistRemoveMsg"></p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                        <tr>
                                            <th>Serial Number.</th>
                                            <th>Image</th>
                                            <th>Products Name</th>
                                            <th>Price </th>
                                             <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if($wishListProducts != FALSE)
                                          @php $i=1; @endphp
                                             @foreach($wishListProducts as $list)
                                              @php 
                                                 $value = 4455454; 
                                                 $urlpID = base64_encode($list->products_id + $value);
                                                $pName = str_replace(" ","_",$list->pName);
                                              @endphp
                                        <tr>
                                             <th style="display:none;"  class="ordertable"><input type="hidden" name="removieId" class="removieId" value="@if(!empty($list->id)){{ $list->id }}@endif" readonly="readonly" />
                                             &nbsp;
                                             <input type="hidden" name="productsID" class="productsID" value="@if(!empty($list->products_id)){{ $list->products_id }}@endif" readonly="readonly" />
                                             </th>
                                            <th class="ordertable">@if(!empty($i)){{ $i }}@endif</th>
											<?php
											  if(!empty($list->pImage)){
													  ?>
												<th><img src="<?php echo url("uploadFiles/thumbsImg/$list->pImage"); ?>" alt="<?php echo $list->pImage; ?>"></th>  
												  <?php
												  } 
											?>
                                            <th class="ordertable"><a href="<?php echo url("productsDetails/$urlpID/$pName"); ?>">@if(!empty($list->pName)){{ $list->pName }}@endif</a></th>
                                            <th class="ordertable">@if(!empty($list->productsAmount)){{ "Rs.". $list->productsAmount }}@endif</th>
                                             <th class="ordertable">&nbsp;<button type="button" name="wishlisttocart" class="btn btn-success wishlisttocart" id="wishlisttocart"><span class="lnr lnr-cart"></span></button>&nbsp;&nbsp;<button type="button" name="removeWishList" class="btn btn-danger removeWishList"><i class="lnr lnr-trash"></button></th>
                                        </tr>
                                        @php $i++; @endphp
                                     @endforeach
                                   @endif
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
              </div>
            </div>
        </div>
    </section>
    <!----section End----->
 @stop
@section('footer')
@parent 
 <script>
 $(document).ready(function(e) {
  	 var base_url = ' {{ url("") }}';
   $(document).on('click','.removeWishList',function(){
	    //var rowID =  $("tr").index(this); alert(rowID);
      //alert($("tr", $(this).closest("table")).index(this));
	  var removeID = $(this).parent().parent().find('.removieId').val();
	  var con = confirm("Are you sure want to remove from Wish list");
	  if(con == true){
	     $.ajax({
           url: base_url +"/removetoWishList",
           type:"GET",
           data:{removeID:removeID},
           success: function(data){
			  //alert(data); 
			  $('#wishrowList').load(document.URL + ' #wishrowList'); 
		   }
       });
	   }
   });   
 });
 </script>
@stop