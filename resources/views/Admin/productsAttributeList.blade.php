@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Quiz List</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6">
                 <a href="<?php echo url("productsAttribute"); ?>" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
              &nbsp; Add Products Attribute</a> 
                 </div>
              <div class="col-sm-6">
                   <div class="form-group pull-right">
                     <input type="text" class="search form-control col-sm-12" placeholder="What you looking for?">
                   </div> 
                 </div>
            </div>
            <div class="row">
                   <div class="col-sm-3"></div>
                   <div class="col-sm-6">
                     <div id="resultRecord"></div>
                   </div>
                   <div class="col-sm-3"></div> 
             </div>
           <div id="listGroup"> 
            <div class="row" style="margin-top:30px;">
               <table class="table table-bordered"  id="userTbl">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Sub category <strong>>></strong> Attribute</td>
                  <td>value</td>
                  <td>crDate</td>
                  <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @if($attributeList != FALSE)
                  @php $i=1; @endphp
				  @foreach($attributeList as $list )
                     @php $id = $list->id @endphp
                   <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $list->subCatname."<strong>>></strong>".$list->name ?></td>
                 <td><?php echo $list->value; ?></td>
                  <td><?php echo $list->created_at; ?></td>
                  <td colspan="3"><a href='{{ url("editAttribute/$id") }}' class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a class="deleteAttribute btn btn-danger" href="#" id="<?php if(!empty($list->id))echo $list->id; ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                  @php $i=1; @endphp
                  @endforeach
                @else
                 <tr>
                  <td>No Records founds...</td>
                </tr> 
                @endif
                
                </tbody>
              </table>   
              </div>
           </div>   
         </div>
     </div>
      <!-- Main row --> 
    </section>
<style>
.signupbtn{ background-color:#06F; padding:7px; font-size:18px; border:none !important; color:#FFF !important; }
.form-control{ border-radius:0px !important; }
input{ color:#000 !important; }
</style>
<script>
$(document).ready(function(e) {
    $(document).on('click','.deleteAttribute',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id;
	  $.ajax({
      url: "<?php echo url("deleteAttribute"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
        $('#resultRecord').html(data);
		$('#listGroup').load(document.URL + ' #listGroup');  
 	   }	
     });
	 }
	});   			
});
</script>
@endsection 