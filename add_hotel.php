<?php
include('include/config.php');
if(empty($_SESSION['rest_rid']))
{
$rname="";
$errors= array();

if(isset($_POST['login']))
{
	$remail = mysqli_real_escape_string($link,$_POST['remail']);
	$rpwd = md5(mysqli_real_escape_string($link,$_POST['rpwd']));
	if(empty($remail))
	{
		array_push($errors,"email is empty");
	}
	if(empty($rpwd))
	{
		array_push($errors,"password is empty");
	}
	if(count($errors) == 0)
	{
		$table="rest_user";
		$where1['remail']=$remail;
		$where2['rpwd']=$rpwd;
		if($record=$db->select_query_where_two($table,$where1,$where2))
		{
			$_SESSION['rest_rid']=$record['r_id'];
			$_SESSION['rest_name']=$record['rname'];
			if(!empty($_SESSION['rest_rid']))
			{
				?>
				<script type="text/javascript">
					window.location="restaurant_user.php";
				</script>
				<?php
			}
		}
	}
}



include('include/header.php');
?>
<style>
	.rest{
		padding: 20px;
	}
	body{
	}
</style>
<div class="row">
	<div class="">
		<h2 class="text-center" ><strong>Add a Restaurant</strong></h2>
	</div>
	<div class="row">
		<div class="col-sm-12">

			<div class="modal-dialog">
				<div class="modal-header">
					<h3 class="text-center" ><strong>Restaurant Login</strong></h3>
				</div>
				<div class="modal-body thumbnail">
				<center><form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<div class="input-group">
							<label>Restaurant Email</label>
							<input type="email" name="remail" placeholder="....@gmail.com" class="form-control" required value=<?php echo $_POST['remail']; ?> >
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
							<input type="submit" name="login" class="btn btn-lg btn-danger" value="Login">
						</div>
					</div>
					</center>

				</form></center>
				</div>
			</div>
			
		</div>
		
	</div>
</div>
<?php
}
else
{
	?>
	<script type="text/javascript">
		window.location="restaurant_user.php";
	</script>
	<?php
}
include('include/footer.php');
?>