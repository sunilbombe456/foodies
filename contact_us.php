<?php
include('include/config.php');
include('include/header.php');
?>
<style type="text/css">

	.login{
			position: absolute;
			top:23%;
			left:25%;

		}
	.modal-content{
			padding-top:70px;
		}
	.login-header{
			position: absolute;
			top:-95px;
			left: 10%;
			padding-left: 200px;
			padding-right: 220px;			
			box-shadow: 1px 1px 1px gray;
		}
</style>
<div class="row">
	<img src="images/pexels-photo-64208.jpeg">

	<div class="modal-dialog login">
		
   		 <div class="modal-content">
        
            	<div class="modal-body">
            	<div class="login-header btn-info">
								<h3 class="text-centers">Contact With Us</h3>
				</div>
               		 <form>
		                    <div class="input-group">
		                    <div class="form-group">
		                     <label>Name:</label>
		                     <input type="text" class="form-control" placeholder="Name">
		                 	</div>
		                 	</div>

		                 	<div class="input-group">
		                    <div class="form-group">
		                    <label>Email:</label>
		                     <input type="text" class="form-control" placeholder="Email">
		                 	</div>
		                 	</div>

		                    <div class="input-group">
		                    <div class="form-group">
		                     <label>Mobile:</label>
		                     <input type="password" class="form-control" >
		                 	</div>
		                 	</div>

		                 	<div class="input-group">
		                    <div class="form-group">
		                    <label> Message:</label> <textarea cols="40" rows="6" class="form-control"></textarea>
		                	</div>
		                	</div>
		                	<br>
		                	<center>
		                	<div class="input-group">
		                    <div class="form-group">
		                    <button type="submit" class="btn btn-info btn-lg btn-block" >Contact us</button>
		                	</div>
		                	</div>
		                	</center>
               		</form>
            	</div>  
   		 </div>
		
		</div>
</div>
<?php
include('include/footer.php');
?>