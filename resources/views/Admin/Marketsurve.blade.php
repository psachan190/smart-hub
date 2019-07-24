@extends("Admin.template.masterAdmin")
@section('content')
<section class="content-header sty-one">
      <h1>Dashboard > Add Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Category</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href='{{ url("newquestionList") }}' class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>

&nbsp;Question List</a> 
             </div>
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
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="">
                   <form name="" id="" class="form-group" action="{{ url('serveAction') }}" method="post">
                      <?php echo csrf_field(); ?>
                      <div class="form-group">
                       <label>Question Type</label>
                       <div class="">
                          <select class="form-control" id="sel2" name="questionType">
                                <option value="1">Option In Yes/No</option>
                                <option value="2">Other</option>
                                
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Order No</label>
                       <div class="">
                         <input type="text" name="Orderno" id="Orderno" class="form-control" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Question</label>
                       <div class="">
                         <textarea name="question" id="question" placeholder="Category Description" class="form-control" rows="5"></textarea>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="">
                         <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add </button>
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