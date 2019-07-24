@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="{{ url('newAnswerlist') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Answer List</a> 
             </div>
             <div class="row" style="margin-top:10px;">
                   <div class="col-sm-12">
                     {!! Session::has('msg') ? Session::get("msg") : '' !!}
                      @foreach($errors->all() as $error)
                       <li class='' style='color:red;'>{{ $error }}</li>
                      @endforeach  
                   </div>
               <form class="col-sm-12" style="margin-top:30px;" action="{{ url('NewanswerAction') }}" method="post">
               <?php echo csrf_field(); ?>
                 <div class="row">
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                       <label>Question Type</label>
                       <div class="">
                             <select class="form-control" id="sel2" name="question">
                               @if($listArr != false)
							                  @foreach( $listArr as $data )
                                <option value="{{ $data->id }}">{{ $data->question }}</option>
                                @endforeach
                              @endif 
                         </select>
                       </div>
                     </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Answer</strong></label>
                            <input type="text" name="first" id="first" class="form-control" placeholder="Answer" value="" />
                            <input type="hidden" name="second" id="second" class="form-control" placeholder="Second Answer"  />
                            <input type="hidden" name="third" id="third" class="form-control" placeholder="Third Answer" />
                            <input type="hidden" name="fourth" id="fourth" class="form-control" placeholder="Fourth Answer" />
                            <input type="hidden" name="correctAnswer" id="correctAnswer" class="form-control" placeholder="Fourth Answer" />

                          </div>
                    </div>
                    <!--<div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Second Answer</strong></label>
                            <input type="hidden" name="second" id="second" class="form-control" placeholder="Second Answer"  />
                          </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Third Answer</strong></label>
                            <input type="hidden" name="third" id="third" class="form-control" placeholder="Third Answer" />
                          </div>
                    </div>
         <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Fourth Answer</strong></label>
                            <input type="hidden" name="fourth" id="fourth" class="form-control" placeholder="Fourth Answer" />
                          </div>
                    </div>           
                    
                    <div class="col-sm-12 col-md-12">
                    	 <div class="form-group">
                           <label><strong>Correct Answer</strong></label>
                           <div>
                            <input type="radio" name="correctAnswer" id="a" value="A" checked="checked" />&nbsp;A&nbsp;<input type="radio" name="correctAnswer" id="b" value="B" />&nbsp;B&nbsp;<input type="radio" name="correctAnswer" id="c" value="C" />&nbsp;C&nbsp;<input type="radio" name="correctAnswer" id="d" value="D" />&nbsp;D
                           <div> 
                          </div>-->
                    </div>
                 </div>
                 <div class="row">
                 	<div class="col-sm-12 col-md-6">
                    	 <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Submit</button>
                          </div>
                    </div>
                 </div>
               </form>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
@endsection 