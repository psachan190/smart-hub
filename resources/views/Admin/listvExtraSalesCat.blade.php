@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> List Extra Sales Category</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                 <a style="color:#FFF; float:left;" id="addMore" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
&nbsp;Add Extra Sales Category</a> 
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div> 
             </div>
             <div class="row">      
              <div class="col-sm-12">
              <section class="content">
        <div class="info-box" id="tabData">
      	 <div class="col-sm-12">
            <div class="row" style="margin-top:30px;">
                <table class="table table-bordered"  id="userTbl">
                <thead>
                <tr class="danger">
                  <td>Sn.</td>
                  <td>Shop Name</td>
                  <td>shop Category</td>
                  <td>Category </td>
                  <td>Sub category</td>
                </tr>
                </thead>
                <tbody>
                @if($allcatAuthority != FALSE)
                     @php $i=1; @endphp
					@foreach( $allcatAuthority as $data)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $data->vName }}</td>
                          <td>{{ $data->cname }}</td>
                          <td>{{ $data->csname }}</td>
                          <td>{{ $data->subCatname }}</td>
                        </tr>
                       @php $i++; @endphp
                    @endforeach
                @else
				  <tr>
                  <td colspan="6">No Record Founds...</td>
                </tr>
				@endif  
			    </tbody>
              </table> 
              </div>
         </div>
        </div>
      <!-- Main row --> 
    </section>
              </div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
<div class="modal" id="addCategoryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Vendor Category Authority</h4>
                  </div>
                  <div class="modal-body">
                  <meta name="csrf-token" content="{{ csrf_token() }}" />  
                    <form id="authorityform" name="authorityform">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div class="form-group">
                       <label>Select Vendor</label>
                       <select class="form-control" name="vendordetails_id" id="vendor_id">
                         <option value="0">--select--vendor--</option>
                          @if(!empty($allVendor))
                            @foreach($allVendor as $vendor)
                              <option value="{{ $vendor->id }}">{{ $vendor->vName }}</option>
                            @endforeach
                          @endif
                       </select>
                      </div>
                      <div class="form-group">
                       <label>Select Shop Category</label>
                       <select class="form-control" name="knp_shopcategory_id" id="knp_shopCat">
                         <option>--select--shop--category--</option>
                         @if(!empty($knp_shopCat))
                            @foreach($knp_shopCat as $shopCat)
                              <option value="{{ $shopCat->cid }}">{{ $shopCat->cname }}</option>
                            @endforeach
                          @endif
                       </select>
                      </div>
                      <div class="form-group">
                       <label>Select category</label>
                       <select class="form-control" name="category_id" id="category_id">
                         <option value="undefined">--select--shop--Category--first--</option>
                       </select>
                      </div>
                      <div class="form-group">
                       <label>Select Sub Category</label>
                       <select class="form-control" name="subcategory_id" id="subcategory_id">
                         <option>--select--Category--first--</option>
                       </select>
                      </div>
                      <div class="form-group">
                       <label>Select Sub Category</label>
                       <select class="form-control" name="status" id="status">
                         <option value="Y">publish</option>
                          <option value="N">Save In Draft</option>
                       </select>
                      </div>
                  </div>
                  <div class="modal-footer">       
                     <p class="resultData"></p> 
                    <div class="text-right pull-right col-md-3">
                      <button type="submit" name="submit" id="addAuthority" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Save</button>
                    </span> 
                    </div> 
                    <div class="text-right pull-right col-md-3">
                       <button type="button" name="" id="" class="btn btn-danger"><i class="fa fa-remove"></i>&nbsp;cancel</button> 
                    </div>
                   </form> 
                </div>
              </div>
            </div>
            </div>
<script>
$(document).ready(function(e) {
   $(document).on('click','#addMore',function(){
        $('#addCategoryForm').modal('show');
   });
});
</script>   
<script>
 $(document).ready(function(e) {
  <!----get category--script start--->
  $(document).on('change','#knp_shopCat',function(){
	 var shopCatID = $('#knp_shopCat').val(); 
	   if(shopCatID == 0){
		  alert('Please Select The valid Category Name');
		}
	    else{
		   $.ajax({
                type:'GET',
                url:'<?php echo url("changeCategory"); ?>',
                data:'shopCatID='+shopCatID,
                success:function(res){
				 $('#category_id').html(res);
				}
           });
		}	
	});
  <!----get category--script start--->
  <!----get sub category--script start--->
  $(document).on('change','#category_id',function(){
    var category_id = $('#category_id').val();
	 if(category_id=="undefined"){
	   alert("please Select valid category");
	   }
	 else{
	      $.ajax({
                type:'GET',
                url:'<?php echo url("changeSubCategory"); ?>',
                data:'category_id='+category_id,
                success:function(res){
				 //alert(res);
				 $('#subcategory_id').html(res);
				}
           });
	   }  
  });
  <!----get sub category--script start--->	
});
</script> 
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#authorityform",(function(e) {
	 if($('#vendor_id').val() ==0){ 
	 alert("select any one vendor id"); 
	 }
	 else{
		 
	 var btnContent = $('#addAuthority').html();
	 $('#addAuthority').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	 e.preventDefault();
      $.ajax({
      url: "<?php echo url("addCategoryAuthority"); ?>",
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		$('#addAuthority').html('<i class="fa fa-plus"></i>&nbsp;Save').attr('disabled',false); 
		var parsedJson = jQuery.parseJSON(data);
		var errorString = '';
		var successString = "";
		 if(parsedJson.vStatus==400){
			  $.each(parsedJson.error, function( key, value) {
                errorString += "<p style='color:red;'>" + value + "</p>";
               });
              $('.resultData').html(errorString);
		   }
		 else if(parsedJson.vStatus==700){
			  $('.resultData').html("<span style='color:green;'>" + parsedJson.success + "</span>");
			  $('#tabData').load(document.URL + ' #tabData');
		   }
		 else if(parsedJson.vStatus==100){
		     $('.resultData').html("<span class='text-warning'>" + parsedJson.duplicate + "</span>");
		  }  
	   }	
     });
	 }
  }));
});
</script>  
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>         
@endsection 