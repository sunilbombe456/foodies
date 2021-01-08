<?php
include('include/config.php');
 
 if(isset($_POST['save']))
 {
 	$table="delivery_boy";
 	$data['dname']=$_POST['dname'];
 	$data['dphone']=$_POST['dphone'];
 	$data['dcity']=$_POST['dcity'];
 	$data['dpwd']=md5($_POST['dpassword']);
 	$data['admin_id']=$_SESSION['admin_id'];

 	if($db->insert_query($table,$data))
 	{
 		?>
 		<script type="text/javascript">
 			window.location="index.php";
 		</script>
 		<?php
 	}
 }

?>
<div class="modal-dialog">
	<div class="thumbnail">
		<div class="modal-header">
			<h2 class="text-center">Register Delivery Boy</h2>
		</div>
		<div class="modal-body">
			<center><form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<div class="input-group">
						<label> Name</label>
						<input type="text" name="dname" class="form-control" required>
					</div>
				</div>
			

				<div class="form-group">
					<div class="input-group">
						<label>Phone</label>
						<input type="text" name="dphone" class="form-control"  required>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<label>City</label>
						<input type="text" name="dcity" class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<label>Password</label>
						<input type="Password" name="dpassword" class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<input type="submit" name="save" class="btn btn-danger" value="save">
					</div>
				</div>

				
			</form> 
		</center>
		</div>
	</div>
</div>
