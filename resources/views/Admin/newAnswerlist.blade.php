@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Answer List</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Answer List</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
               <div class="row">
                   <div class="col-sm-3"></div>
                   <div class="col-sm-6">
                     {!! Session::has('msg') ? Session::get("msg") : '' !!}
                      @foreach($errors->all() as $error)
                       <li class='' style='color:red;'>{{ $error }}</li>
                      @endforeach  
                   </div>
                   <div class="col-sm-3"></div> 
                  
             </div>
             <div class="row">      
                <div class="col-sm-12">
                  <form id="newanswerlist" name="newanswerlist" method="POST">
                     {{ csrf_field() }}
                	<table class="table table-bordered"  id="userTbl">
                <thead>
                <tr class="info">
                  <td>Sn.</td>
                  <td>Question</td>
                  <td>Option</td>
                  
                  <td>Next Question</td>
                  <td>Answer Count</td>
                  <td>action</td>
                </tr>
                </thead>
                <tbody>
              @if($listAns != false)
              <?php $i=1; foreach( $listAns as $data ): ?>
              @php $id = $data->id;
              @endphp
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data->newquestion->question; ?></td>
                  <td><?php echo $data->option1; ?></td><!-- whereNotin -->
                  <td>
                    <select class="form-control" name="nexquestion[{{ $data->id}}]" id="nexquestion[{{ $data->id}}]">
                      <option value="">No More Question/End</option>
                      @foreach($questionList->where('id','>',$data->newquestion->id) as $qs)
                        <option value="{{ $qs->id}}" @if($qs->id == $data->nexquestion) {{ 'selected' }}@endif> {{ $qs->question}}</option> 
                      @endforeach
                  </select>
                </td>
                <td>{{ count($data->quizanalysis) }}</td>
                 
                  <td colspan="3"><a href='{{ url("admin_editanswer/$id") }}' class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>&nbsp;<a id="{{ $data->id }}" class="deleteanswer btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
                <?php $i++; endforeach; ?>
              @endif  
              <tr><td colspan="5"><input type="submit" name="submit" id="submit" value="Update Next Question List"></td></tr>
                </tbody>
              </table>

            </form>
                </div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
    <script>
$(document).ready(function(e) {
	//alert("fdsdfgfdg");
    $(document).on('click','.deleteanswer',function(){
	  var con = confirm("Are you Sure want to Delete this Address");
	  if(con == true){
	  var id = this.id;
	  //alert(id);
	  $.ajax({
      url: "<?php echo url("deleteanswer"); ?>",
      type: "GET",        
      data: {id:id},
      success: function(data){
		 window.location.reload();
 	   }	
     });
	 }
	});   			
});
</script>
@endsection 
