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
                   <form name="" id="" class="form-group" action="{{ url('editanswer') }}" method="post">
                      <?php echo csrf_field(); ?>
                       <div class="form-group">
                       <div class="">
                          <input type="hidden" name="editid" value="@if(!empty($listAns->id)){{ $listAns->id}} @endif"/>
                       </div>
                      <div class="form-group">
                       <label>Question</label>
                       <div class="">
                          <select class="form-control" id="sel2" name="newquestion_id">
                            @foreach($question as $ques)
                                <option value="{{ $ques->id}}" @if($ques->id == $listAns->newquestion_id) {{ "selected"}} @endif>{{ $ques->question}}</option>
                            @endforeach
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Answer</label>
                       <div class="">
                         <textarea name="option1" id="question" class="form-control" rows="5"> @if(!empty($listAns->option1)){{ $listAns->option1}} @endif
                         </textarea>
                         <input type="hidden" name="option2" id="option2" value="" >
                          <input type="hidden" name="option3" id="option3" value="" >
                           <input type="hidden" name="option4" id="option4" value="" >
                       </div>
                     </div>
                    <!--  <div class="form-group">
                       <label>Answer Two</label>
                       <div class="">
                         <textarea name="option2" id="question" class="form-control" rows="5"> @if(!empty($listAns->option2)){{ $listAns->option2}} @endif
                         </textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Answer Third</label>
                       <div class="">
                         <textarea name="option3" id="question" class="form-control" rows="5"> @if(!empty($listAns->option3)){{ $listAns->option3}} @endif
                         </textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Answer Forth</label>
                       <div class="">
                         <textarea name="option4" id="question" class="form-control" rows="5"> @if(!empty($listAns->option4)){{ $listAns->option4}} @endif
                         </textarea>
                       </div>
                     </div> -->
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