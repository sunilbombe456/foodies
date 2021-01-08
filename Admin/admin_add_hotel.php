<?php
include('include/config.php');

$rname="";
$errors= array();
if($_POST['register'])
{
	$rname = mysqli_real_escape_string($link,$_POST['rname']);
	$remail = mysqli_real_escape_string($link,$_POST['remail']);
	$rphone = mysqli_real_escape_string($link,$_POST['rphone']);
	$rcity = mysqli_real_escape_string($link,$_POST['rcity']);
	$rpwd = mysqli_real_escape_string($link,$_POST['rpwd']);
	if(empty($rname))
	{
		array_push($errors,"r name is empty");
	}
	if(empty($remail))
	{
		array_push($errors,"r email is empty");
	}
	if(empty($rphone))
	{
		array_push($errors,"r phone is empty");
	}
	if(empty($rcity))
	{
		array_push($errors,"r city is empty");
	}
	if(empty($rpwd))
	{
		array_push($errors,"r password is empty");
	}
	if(count($errors)==0)
	{
		$table="rest_user";
		$data['rname']=$rname;
		$data['remail']=$remail;
		$data['rphone']=$rphone;
		$data['rcity']=$rcity;
		$data['rpwd']= md5($rpwd);
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


}

?>
<h4 class="text-center" ><strong>Restaurant info</strong></h4>
			<div class="modal-dialog thumbnail rest">
				<center><form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
					<div class="form-group">
						<div class="input-group">
							<label>Restaurant Name:</label>
							<input type="text" name="rname" placeholder="Enter the Restaurant name..." class="form-control" required>
						</div>
					</div>


					<div class="form-group">
						<div class="input-group">
							<label>Email:</label>
							<input type="email" name="remail" placeholder="@gmail.com" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<label>phone:</label>
							<input type="text" name="rphone" placeholder="Enter the Restaurant phone no..." class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<label>City:</label>
							<input type="text" name="rcity" placeholder="Enter the City..." class="form-control" required>
						</div>
					</div>


					<div class="form-group">
						<div class="input-group">
							<label>Password</label>
							<input type="password" name="rpwd" placeholder="*****" class="form-control" required>
						</div>
					</div>

					<center>	
					<div class="form-group">
						<div class="input-group">
							<input type="submit" name="register" value="Add Restaurant" class="btn btn-danger btn-lg">
						</div>
					</div>
					</center>
				</form></center>
			</div>