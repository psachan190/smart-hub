<?php
$dayArr = array(1=>"Sunday",2=>"Monday",3=>"Tuesday",4=>"Wednesday",5=>"Thursday",6=>"Friday",7=>"Saturday");
$timeArr = array(1=>"08::00 AM - 10:00 AM",2=>"10::00 AM - 12:00 AM",3=>"12::00 AM - 02:00 PM",4=>"02::00 PM - 04:00 PM",5=>"04::00 PM - 06:00 PM",6=>"06::00 PM - 08:00 PM",7=>"08::00 PM - 10:00 PM");
?>
@extends("layout")
@section('content')
@include('vendor.template.marketPlacenavigation')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href='{{ url("vendorBackup/$vendorData->id/firstDashborad") }}'>Welcome</a></li>
                            <li><a href="#">Delivery Schedule</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Delivery Schedule</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="service">
	<div class="container-fluid">
      <div class="row normal-padding">
        <div class="col-sm-12 col-md-6 col-lg-3">
     @include("vendor.template.vendorProfileSidebar")	
   </div>
        <div class="col-sm-12 col-md-6 col-lg-9">
            <div class="post">
              <div class="content">
		  <div class="col-md-9">
           <style>
    .list-group span{ float:right; margin-top:-2px;}
	.list-group .socialLink{ text-decoration:none;}
	.modal-title{ font-size:16px; }
    </style>
           <div id="resultRecord"></div>
           <div id="listGroup"> 
            <ul class="list-group" id="">
              <li class="list-group-item">
                <style>
                #addAdress{ text-decoration:none;}
                </style>
                <a href="#" id="addAdress"><strong><i style="color:#237E94;" class="fa fa-plus"></i>&nbsp;Add Delivery Schedule</strong></a>
              </li>
               @if($timeResult != FALSE)
                @php $i=1; @endphp
               @foreach($timeResult as $list)
                 <li class="list-group-item">
                  <input type="hidden" name="deliveryDay" id="deliveryDay" class="deliveryDay" value="{{ $list->id }}" readonly="readonly" / >
                <strong>{{ $i }}.</strong>
                <br />
                <br />
                @if(!empty($list->id))
				  {{ "=>&nbsp;".$dayArr[$list->dayOfweek] }}
                  <br />
                  <?php 
				   if(!empty($list->timingOfday)){
					  $resultTimeArr = explode("@",$list->timingOfday);
					  //print_r($resultTimeArr);
					  $k=1;
					  $arr = array();
					  foreach($resultTimeArr as $dataArr){
						  $arr[$k] = $timeArr[$dataArr];
						 $k++;
						 }
					  }
					  //print_r($arr);
					  print_r(implode(" , ",$arr));
					  //print_r($timeArr[$arr]);
				  ?>
                  <span>&nbsp;<button id="" class="deleteDaySchedule label label-danger"><strong><i style="color:#FFF;" class="fa fa-remove"></i></strong></button></span>
                @else
				   <a href="#">blank... </a>
                @endif
               </li>  
                @php $i++; @endphp
               @endforeach
              @endif
            </ul>
           </div>
        </div>
        </div>
           </div>
       </div>
     </div>             
   </div>
</div>
<!------vendor Address -Modal start---->
  <div class="modal" id="venderAddressone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="margin-top:100px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <p class="modal-title" id="myModalLabel"><i style="color:#59b2e5;" class="fa fa-map-marker"></i><strong>&nbsp;Select Delivery / Pick-up Schedule</strong></p>
                  </div>
                  <div class="modal-body">
                   <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <form id="deliveryAndPickupForm">
                    <?php echo csrf_field(); ?>
                     <input type="hidden" name="userID" id="userID" value="@if(!empty($vendorData->users_id)) {{ $vendorData->users_id }} @endif" readonly="readonly" / />
                     <input type="hidden" name="vendorID" id="vendorID" value="@if(!empty($vendorData->id)){{ $vendorData->id }} @endif" readonly="readonly" />
                      <div class="row">
                        <div class="col-sm-12">
                         <label>Select Day</label>
                         <div class="select-wrap">
                           <select id="deleveryDay" name="deleveryDay" class="" required="required">
                            <option value="hidden">--Select--Day--</option>
						    <option value="1">Sunday</option>
                            <option value="2">Monday</option>
                            <option value="3">Tuesday</option>
                            <option value="4">Wednesday</option>
                            <option value="5">Thursday</option>
                            <option value="6">Friday</option>
                            <option value="7">Saturday</option>
                           </select> 
                        </div>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-12">
                         <label>Select Timing</label>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="firsttime" value="1" placeholder="Address One" />&nbsp;
                             <label for="firsttime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;08::00 AM - 10:00 AM</span>
                             </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="secondtime" value="2" placeholder="Address One" />&nbsp;
                             <label for="secondtime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;10::00 AM - 12:00 AM</span>
                             </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="thirdtime" value="3" />&nbsp;
                             <label for="thirdtime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;12::00 AM - 02:00 PM</span>
                             </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="fourthtime" value="4" />&nbsp;
                             <label for="fourthtime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;02::00 PM - 04:00 PM</span>
                             </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="fifthtime" value="5" />&nbsp;
                             <label for="fifthtime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;04::00 PM - 06:00 PM</span>
                             </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="sixtime" value="6" />&nbsp;
                             <label for="sixtime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;06::00 PM - 08:00 PM</span>
                             </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="custom_checkbox form-check">
                            <input type="checkbox" name="deleveryTime[]" id="seventime" value="7" />&nbsp;
                             <label for="seventime">
                               <span class="shadow_checkbox"></span>
                               <span class="radio_title catnamebox">&nbsp;08::00 PM - 10:00 PM</span>
                             </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <p id="adrsresult"></p>
                        <button type="submit"  name="addressBtn" id="addressBtn" class="btn btn-md btn--round"><i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Save</button>
                        <div id="someDivToDisplayErrors"></div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">       
                    <div class="text-right pull-right col-md-3">
                    </div> 
                </div>
              </div>
            </div>
            </div>
@stop            
@section('footer')
  @parent
  <script>
$(document).ready(function(e) {
<!-----modal script start----->
 $(document).on('click','#addAdress',function(){
    $('#venderAddressone').modal('show'); 
 });
 $(document).on('click','.close',function(){
   $('#venderAddressone').modal('hide');
 });
<!-----modal script start----->
<!---address add script start------>
$(document).ready(function(e) {
  $(document).on('submit',"#deliveryAndPickupForm",(function(e) {
	  $('#someDivToDisplayErrors').html("");
	  $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	  $('#adrsresult').html("");
	 e.preventDefault();
      $.ajax({
      url: "<?php echo url("vendorAgax/deliveryAndPickupPost"); ?>",
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		  $('#addressBtn').html('<i style="color:#FFF;" class="fa fa-plus"></i>&nbsp;Save').attr('disabled',false);
		  if(data=="success"){
			  $("#someDivToDisplayErrors").html("<span style='color:green;'><strong>Record Add Successfully</strong></span>");
		      location.reload();
			}
		  else if(data=="failes"){
			   $("#someDivToDisplayErrors").html("<span style='color:red;'><strong>Unexpected try again .</strong></span>");
			}	
		  else{
			 $("#someDivToDisplayErrors").html("<span style='color:red;'><strong>"+ data +"</strong></span>");
			}	
 	   }	
     });
  }));
});
<!---address add script start------>
});
</script>
<!---Delete time script start--->
  <script>
$(document).ready(function(e) {
    $(document).on('click','.deleteDaySchedule',function(){
	  var con = confirm("Are you Sure want to remove this Schedule");
	  if(con == true){
	  var id = $(this).parent().parent().find(".deliveryDay").val();
	  var vendor_id = $("#vendorID").val();
	  $.ajax({
      url: "<?php echo url("vendorAgax/deleteTimeSchedule"); ?>",
      type: "GET",        
      data: {id:id , vendor_id:vendor_id},
      success: function(data){
         alert(data);
		 location.reload();
 	   }	
     });
	 }
	});   			
  });
</script> 
<!---Delete time script End--->
@stop 