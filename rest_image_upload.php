<?php
include('include/config.php');
?>
 <!-- file uploading -->
   <div class="container-fluid">
   	<h3 class="text-center">Add Your Restaurant Images</h3>
    <p class="text-center danger">Image Size Should be 1200 * 400 pxels</p>
    <form method="POST" enctype="multipart/form-data" action="hotel_operation.php">
      <div class="form-group">
       		 <div class="input-group">
          		<input type="file" name="myFile1" class="form-control" required>
     		 </div>
  		</div>
  		<div class="form-group">
        <div class="input-group">
          <input type="file" name="myFile2" class="form-control" required>
      	</div>
  		</div>
         <div class="form-group">
        <div class="input-group">
          <input type="file" name="myFile3" class="form-control" required>
      	</div>
  		</div>
       <div class="form-group">
        <div class="input-group">
          <input type="file" name="myFile4" class="form-control" required>
        </div>
      </div>
        <div class="form-group">
        <div class="input-group">
          <input type="submit" name="upload" value="upload" class="btn btn-lg btn-info">
        </div>
        </div>
    </form>
   </div> 
   <!-- end file uploading  -->