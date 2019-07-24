@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Edit Question</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Edit Question</li>
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
                      <ul>
                   </div>
                   <div class="col-sm-3"></div> 
                  
             </div>
             <div class="row">      
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="{{ url('editquestion') }}" method="post">
                      <?php echo csrf_field(); ?>
                       <div class="form-group">
                       <div class="">
                          <input type="hidden" name="editid" value="@if(!empty($listArr->id)){{ $listArr->id}} @endif"/>
                       </div>
                      <div class="form-group">
                       <label>Question Type</label>
                       <div class="">
                          <select class="form-control" id="sel2" name="questionType">
                                <option value="1" @if($listArr->question_type == '1'){{ 'selected'}} @endif>Option In Yes/No</option>
                                <option value="2" @if($listArr->question_type == '2'){{ 'selected'}} @endif>Other</option>
                                <!-- <option value="3" @if($listArr->question_type == '3'){{ 'selected'}} @endif>3</option> -->
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Question</label>
                       <div class="">
                         <textarea name="question" id="question" class="form-control" rows="5"> @if(!empty($listArr->question)){{ $listArr->question}} @endif
                         </textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Edit </button>
                       </div>
                     </div>
                   </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
@endsection 