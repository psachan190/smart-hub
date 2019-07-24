@extends('newAdmin.template.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <hr />
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Add more sales category / subcategory</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-primary" id="addMore">
                    <i class="fa fa-plus"></i>&nbsp;Add Category
                  </a>
                </div>
              </div>
              <div class="row">
                 <div class="col-sm-12" style="margin-left:20px;">
                  <ul>
                 <?php 
				  foreach($errors->all() as $error){
					echo "<li class='' style='color:red;'>".$error."</li>";  
				  }
				  ?>
                 </ul> 
                 @if(session()->has('msg'))
                    <?php echo session()->get('msg') ?> 
                 @endif
                 </div>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>Sn.</th>
                  <th>Shop Name</th>
                  <th>shop Category</th>
                  <th>Category </th>
                  <th>Sub category</th>
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
                </tfoot>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<div class="modal" id="addCategoryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add More Category / Subcategory </h5>
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
@stop
@section('footer')
 @parent
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
                url:'<?php echo url("adminAgaxget/changeCategory"); ?>',
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
                url:'<?php echo url("adminAgaxget/changeSubCategory"); ?>',
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
   <!---vendor Add Services script End--->
  $(document).on('submit',"#authorityform",(function(e) {
	var vendor_id = $("#vendor_id").val();
	if(vendor_id != 0){ 
	 $(".resultData").html();
	 $('#addAuthority').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true); 
	  e.preventDefault();
      $.ajax({
	   url:"<?php echo url("adminAgaxpost/addMorecat_subcat")?>",	  
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
			  $('.card-body').load(document.URL + ' .card-body');
		   }
		 else if(parsedJson.vStatus==100){
		     $('.resultData').html("<span class='text-warning'>" + parsedJson.duplicate + "</span>");
		  }  						
	   }	
     });
	}
	else{
	  alert("Select Shop Name");
	}
  }));
  <!---vendor Add Services script End--->
     
 });
 </script>  
@stop 