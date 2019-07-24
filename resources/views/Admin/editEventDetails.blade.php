@extends("Admin.template.masterAdmin")
@section('content')
<script type="text/javascript" src="<?php echo url("ck/ckeditor/ckeditor.js"); ?>"></script>
<script type="text/javascript" src="<?php echo url("ck/ckfinder/ckfinder.js"); ?>"></script>
<section class="content-header sty-one">
      <h1>Dashboard > Add Event</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
         <li><i class="fa fa-angle-right"></i> Add Event Category</li>
      </ol>
</section>
<section class="content">
        <div class="info-box">
      	 <div class="col-sm-12">
            <div class="row">
               <a href="<?php echo url("kanpuradmineventList"); ?>" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>
&nbsp;Event List</a> 
             </div>
             <div class="row">
                  <ul>
				  <?php
                   if(isset($_GET['success']))
                   {
                      ?>
                      <div style="color:#0C3; margin-top:10px;"><label><strong>Record added Successfully !!!</strong></label>
                      <script>setTimeout("window.location.href='<?php echo url('addCategory'); ?>'",2000);</script>
                      </div> 
                      <?php   
                   }
                  ?>
             </div>
             <div class="row">      
                <div class="col-sm-12" style="">
                   <form id="editEventForm" class="form-group" name="editEventForm">
                      <?php echo csrf_field(); ?>
                     <div class="form-group">
                       <label>Category Name</label>
                       <div class="">
                         <select id="categoryName" name="categoryName" class="form-control">
                          <?php
                           if($eventCategory != FALSE){
							   foreach($eventCategory as $listArr){
								   ?>
								   <option value="<?php if(!empty($listArr->id))echo $listArr->id; ?>"><?php if(!empty($listArr->id))echo $listArr->categoryName; ?></option>
								   <?php
								 }
							 }
						  ?>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Event Title</label>
                       <div class="">
                         <input type="text" id="editID" name="editID" value="<?php if(!empty($eventDetails->id))echo $eventDetails->id ?>" class="form-control" placeholder="Event Title" />
                         <input type="text" id="title" name="title" value="<?php if(!empty($eventDetails->evntTitle))echo $eventDetails->evntTitle ?>" class="form-control" placeholder="Event Title" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Image</label>
                       <div class="">
                         <input type="file" id="image" name="image" class="form-control" placeholder="Event Location" />
                         <input type="hidden" name="imageCopy" id="imageCopy" value="<?php if(!empty($eventDetails->image)) echo $eventDetails->image; ?>" />
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-sm-6">
                         <div class="control-group form-group">
                <label class="control-label">Event Start Date</label>
                <div class="controls input-append date form_datetime" data-date="<?php echo date("Y"); ?>-<?php echo date("m"); ?>-<?php echo date("d"); ?>T05:25:07Z" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input1">
                    <input size="16" type="text" name="startDate" class="form-control" readonly="readonly" placeholder="Click for Select Date" value="<?php if(!empty($eventDetails->startdate)) echo date("d F Y h:i:sa",$eventDetails->startdate); ?>" />
                    <span class="add-on"><i class="icon-remove"></i></span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input1" value=""  /><br/>
            </div>
                       </div>
                       <div class="col-sm-6">
                         <div class="control-group form-group">
                <label class="control-label">Event End Date</label>
                <div class="controls input-append date form_datetime" data-date="<?php echo date("Y"); ?>-<?php echo date("m"); ?>-<?php echo date("d"); ?>T05:25:07Z" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input1">
                    <input size="16" type="text" name="endDate" class="form-control" readonly="readonly" placeholder="Click for Select Date" value="<?php if(!empty($eventDetails->endDate)) echo date("d F Y h:i:sa",$eventDetails->endDate); ?>">
                    <span class="add-on"><i class="icon-remove"></i></span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input1" value=""  /><br/>
            </div>
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Event Location</label>
                       <div class="">
                         <input type="text" id="eventLocation" name="eventLocation" value="<?php if(!empty($eventDetails->location)) echo $eventDetails->location; ?>" class="form-control" placeholder="Event Location" />
                       </div>
                     </div>
                     <div class="form-group">
                       <label>Description</label>
                       <div class="">
                         <textarea id="editor1" name="editorForm" rows="10" cols="80"><?php if(!empty($eventDetails->description)) echo $eventDetails->description; ?></textarea>
                       </div>
                     </div>
                     <div class="form-group" style="margin-top:15px;">
                       <div class="">
                         <button type="submit" name="submit" id="editEventsubmit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Edit </button>&nbsp;&nbsp; <button type="reset" name="reset" id="resetEvent" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Cancel </button>
                       </div>
                       <div id="response"></div>
                     </div>
                   </form>
                </div>
            </div>
         </div>
     </div>
      <!-- Main row --> 
    </section>
<!-- v4.0.0-alpha.6 --> 
<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo url("ck/ckfinder/ckfinder.html?type=Images")?>',
    filebrowserFlashBrowseUrl : '<?php echo url("ck/ckfinder/ckfinder.html?type=Flash")?>',
    filebrowserUploadUrl : '<?php echo url("ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")?>',
    filebrowserImageUploadUrl : '<?php echo url("ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")?>',
    filebrowserFlashUploadUrl : '<?php echo url("ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")?>'
});
CKFinder.setupCKEditor( editor, '../' );
</script>

@endsection 

