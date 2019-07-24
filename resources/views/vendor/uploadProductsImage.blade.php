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
                            <li><a href="#">Upload Product Image</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Upload Product Image</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<div class="container-fluid">
 <div class="row normal-padding">
   <div class="col-sm-12 col-md-6 col-lg-2">
     
   </div>
   <div class="col-sm-12 col-md-6 col-lg-10">
     <div class="post">
                 <ul>
                  @foreach($errors->all() as $error)
					<li class='' style='color:red;'>{{ $error }}</li>  
				  @endforeach
                 </ul>
                  {!! Session::has('msg') ? Session::get("msg") : '' !!}
        <div class="row">
          <div class="col-sm-12" style="padding:30px;">
            <form name="pImageform" id="pImageform" method="post" enctype="multipart/form-data" action="<?php echo url("vendor/uploadproductsImage"); ?>" />
           <?php echo csrf_field(); ?>
           <input type="hidden" name="shopID" value="@if(!empty($vendorData->id)){{ $vendorData->id }} @endif" id="shopID">
           <input type="hidden" name="productsID" value="@if(!empty($productsData->id)){{ $productsData->id }} @endif" id="productsID" >
           <input type="hidden" name="knpUser_id" value="@if(!empty($vendorData->users_id)){{ $vendorData->users_id }} @endif" id="" >
           <div class="row imagefileOriginalCount" id="imagefileOriginal">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Products Image </label>
                   <input type="file" name="proImage[]" id="proImage" class="form-control" />
                   </div>
                </div>
                <div class="col-sm-2" style="margin-top:25px;">
                  <div class="form-group">
                   <label>&nbsp;&nbsp; </label>
                    <button type="button" name="addMore" id="addMore" class="btn btn-md btn--round"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add More</button>
                  </div>
                </div>
              </div>
           <div class="row imagefileCopyCount" id="imagefileCopy" style="display:none;">
                <div class="col-sm-6">
                  <div class="form-group">
                   <label>Select Products Image  </label>
                   <input type="file" name="proImage[]" id="proImage" class="form-control" />
                   </div>
                </div>
                <div class="col-sm-2" style="margin-top:25px;">
                  <div class="form-group">
                   <label>&nbsp;&nbsp; </label>
                    <button type="button" name="remove" id="remove" class="btn btn-md btn--round btn-danger"><i class="lnr lnr-cross"></i>&nbsp;Remove</button>
                  </div>
                </div>
              </div>
           <div class="row" id="imagefileCopy">
                <div class="col-sm-6">
                  <div class="form-group">
                    <button type="submit" name="submit" id="upload" class="btn btn-md btn--round btn-success"><i class="lnr lnr-upload"></i>&nbsp;Upload</button> 
                  </div>
                </div>
              </div>      
        </form>
          </div>
        </div>
        <div class="row" id="productsImageList">
          <div class="container-fluid">
          @if(!empty($productsImage))
			 @foreach($productsImage as $image)
			   <div class="col-sm-3 imagesvendor" style="padding:5px;">
                     <input type="hidden" id="pImageDetails" name="pImageDetails" class="pImageDetails" value='{{ $image->id }}' >
                       <input type="hidden" id="pimgName" name="pimgName" class="pimgName" value='{{ $image->image }}' >
                      <div id="pImageName" class="pImageName">
                       <img src='{{ asset("uploadFiles/productsImg/FrontImg/$image->image") }}' class="img img-responsive image img-thumbnail" />
                      </div>
                      <h3 class="middle">
                      <a id="pImageEditbtn"><span class="textimage">Edit</span></a>
  </h3>
                     <h3 class="middle1">
                       <a data-toggle="modal" data-target="#myModal3" id="pImageDelte"><span class="textimage1">Delete</span></a>
                     </h3>
                    </div>
             @endforeach     
          @endif
        </div>
       </div>
     </div>
  </div>
 </div>
</div>
<div class="modal" id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-edit"></i>&nbsp; Edit Products Image</h4>
                  </div>
                  <div class="modal-body">
                             <meta name="csrf-token" content="{{ csrf_token() }}" />
                               <form id="productsImageEditForm" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="" id="editID" name="editID" />
                                <input type="hidden" value="" id="imgnameCopy" name="imgnameCopy" />
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-md btn-file">
                                                Browse… <input class="" type="file" id="imgInp1" name="imgInp1" />
                                            </span>
                                        </span>
                                        <input type="text" class="uploader1" name="imageName" id="imageName" readonly>
                                    </div>
                             	</div>
                                <div class="form-group">
                                  <button type="submit" name="submit" id="editImaegeButton" class="btn btn-md btn-success"> <i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit</button>  
                             	</div>
                               </form> 
                               <span id="uploadResult"></span>
                  </div>
                  <div class="modal-footer">       
                    <span id="editResult"></span> 
                </div>
              </div>
            </div>
            </div>
@stop
@section('footer')
  @parent            
<script>
$(document).ready(function(e) {
  $(document).on('click','#pImageEditbtn',function(){
     $('#editImageModal').modal('show').fadeIn('slow');
	  	 var editID = $(this).parent().parent().find('.pImageDetails').val();
	     var oldimageName = $(this).parent().parent().find('.pimgName').val();
	     $('#editID').attr('value',editID);
	     $('#imgnameCopy').attr('value',oldimageName);
  });
});
</script>
<script>
$(document).ready(function(e) {
 $.ajaxSetup({
      headers:{
        'X-XSRF-Token':$('meta[name="csrf-token"]').attr('content')
      }
    });
  $(document).on('submit',"#productsImageEditForm",(function(e) {
	$('#editImaegeButton').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> please wait...').attr('disabled',true);
	 $('#editResult').html("");
	 e.preventDefault();
      $.ajax({
      url: "<?php echo url("editImageProductsAction"); ?>",
      type: "POST",        
      data: new FormData(this),
      contentType: false,
	  cache: false,
      processData:false,  
      success: function(data){
		 if(data==1){
			$('#productsImageList').load(document.URL + ' #productsImageList');
		    $('#editImaegeButton').html('<i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit').attr('disabled',false);
			$('#myModalLabel').html("<span style='color:green;'><i class='fa fa-check'></i>&nbsp;Products Image Edit successfully</span>");
			 setTimeout(function(){ 
						$('#myModalLabel').html("<i class='text-muted fa fa-edit'></i>&nbsp; Edit Products Image");
						   $('.close').click();
					 },1000);
		  }
		 else if(data==2){
		    $('#editResult').html("unexpected try again...");
		  }
		 else{
		     $('#editResult').html(data);
			 $('#editImaegeButton').html('<i style="color:#FFF;" class="fa fa-edit"></i>&nbsp;Edit').attr('disabled',false);
		  }  
		   
 	   }	
     });
  }));
});
</script>
<script>
$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});</script>
<style>
p.info{font-size:16px; color:#ffffff; background-color:#078bc4; padding:5px;}
p.success{ font-size:16px; color:#ffffff; padding:5px; }
p.warning{  font-size:16px; color:#ffffff; padding:5px;  }
</style>  
<div id="deleteModal">          
  <div class="modal" id="myModal3" data-easein="expandIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                    <h4 class="modal-title" id="alertmsg"><i class="text-muted lnr lnr-trash"></i>&nbsp;Delete product Image </h4>
                  </div>
                  <div class="model-body">
                  	<div class="row" style=" padding:20px;">
                    	<div class="col-sm-12">
                        	<div class="" align="center">
                                <div id="copyImage" style="margin-bottom:15px;"></div>
                                <div class="form-group">
                                  <input type="hidden" name="deleteID" id="deleteID" value="" /> 
                                  <input type="hidden" name="imagenameCopy" id="imagenameCopy" />
                                  <button type="button" name="deleteButton" id="deleteButton" class="btn btn-md btn-success"><i class="lnr lnr-trash"></i>&nbsp;Yes</button>
                                  <button type="reset" name="reset" class="btn btn-md btn-danger"><i class="lnr lnr-cross"></i>&nbsp;No</button>  
                             	</div>		
                            </div>
                        </div>
                     </div>
                  </div>
                 <div class="modal-footer">       
                </div>
              </div>
            </div>
            </div>
 </div>           
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.ui.min.js'></script>
<!----Edit Image script start--->
<!----Edit Image script start--->

<!--Image Delete script-Start---->
<script>
$(document).ready(function(e) {
  $(document).on('click','#pImageDelte',function(){
	 var imageID = $(this).parent().parent().find('.pImageDetails').val();
	 var image = $(this).parent().parent().find('.pImageName').html();
	 var imageName = $(this).parent().parent().find('.pimgName').val();
	 $('#deleteID').attr('value',imageID);
	 $('#imagenameCopy').attr('value',imageName);
	 $('#copyImage').html(image);
  });  
});
</script>
<script>
$(document).ready(function(e) {
  $('#alertmsg').addClass('info'); 	
  $(document).on('click','#deleteButton',function(){
	  var button_content = $('#deleteButton').html();
	$('#deleteButton').html('<i style="color:#FFF;" class="fa fa-circle-o-notch fa-spin"></i> Yes...').attr('disabled',true);
	   var deleteID = $('#deleteID').val();
	   var imageCopyName = $('#imagenameCopy').val();
	   $.ajax({
                type:'GET',
                url:'<?php echo url("deleteImageAction"); ?>',
                data:{deleteID:deleteID,imageCopyName:imageCopyName},
                success:function(res){ //alert(res);
				  if(res==1){
				     $('#alertmsg').removeClass('info');
	                 $('#alertmsg').addClass('success').fadeIn(1000);
	                 $('#alertmsg').html("<span style='color:green;'><i class='fa fa-check'></i> Image Delete Successfully..</span>"); 
					 $('#deleteButton').html(button_content).attr('disabled',false);
					 $('#productsImageList').load(document.URL + ' #productsImageList');
					 setTimeout(function(){ 
					       $('#alertmsg').removeClass('success');
						    $('#alertmsg').html("<span style='color:'><i class='fa fa-warning'></i> Delete product Image</span>"); 
					      $('#alertmsg').addClass('info').fadeIn(1000);
						   $('.close').click();
						  //aria-hidden="true"
						  //$('#myModal3').hide();
					 },2000);
				   }
				  else{
					    $('#alertmsg').addClass('warning').fadeIn(1000);
                        $('#alertmsg').html("<i class='text-muted glyphicon glyphicon-trash'></i> Unexpected try again....");
						$('#deleteButton').html(button_content).attr('disabled',false);    
				   } 	 
				}
            }); 
  });    
});
</script>
<!---Image Delere Script End------>
            
<script type="text/javascript">
$(document).ready(function(){
  var maxGroup = 5;
  $("#addMore").click(function(){
	if($('body').find('.imagefileCopyCount').length < maxGroup){
       var fieldHTML = '<div class="row imagefileCopyCount" id="imagefileOriginal">'+$("#imagefileCopy").html()+'</div>';
       $('body').find('#imagefileOriginal:last').after(fieldHTML);
	  }
	 else{					
	   alert('Maximum '+ maxGroup +' groups are allowed.');
	  }
});
		//remove fields group
		$("body").on("click","#remove",function(){ 
				$(this).parents("#imagefileOriginal").remove();
		});
});
</script>
@stop