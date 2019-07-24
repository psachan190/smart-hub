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
                  <th>Sn.</th>
                  <th>Vendor ID</th>
                  <th>Vendor Name</th>
                  <th>Complain</th>
                  <th>Date </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($vendorComplainList != FALSE)
                     @php $i=1; @endphp
					@foreach( $vendorComplainList as $data)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ "knprVendot100".$data->vendorID }}</td>
                          <td>{{ $data->vName }}</td>
                          <td>{{ $data->subject }}</td>
                         <td><?php if(!empty($data->created_at))echo date("d/M/y h:i:sA",$data->created_at); ?></td>
                          <td><a href="<?php $id = base64_encode($data->id); echo url("viewcomplainDetailsDetails/$id"); ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>
        </a></td>
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

<script>
$(document).ready(function(e) {
   $(document).on('click','#addMore',function(){
        $('#addCategoryForm').modal('show');
   });
});
</script>   
@endsection 