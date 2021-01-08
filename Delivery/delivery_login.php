<?php 
include('include/config.php');

//<!--log out script-->
	
	if($_GET['needAction']=="logout")
	{    


		session_destroy();
		?>
		<script>

			alert("you are logout");
			window.location="index.php";
			
		</script>
		<?php
		
	}
if(empty($_SESSION['d_id']))
{

$username = "";
	$password = "";
	$errors = array();

	if(isset($_POST['login']))
{
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$password = mysqli_real_escape_string($link,$_POST['password']);

	if(empty($username))
	{
		array_push($errors,"username is required ");
	}
	if(empty($password))
	{
		array_push($errors,"password is required");
	}
	if(count($errors)==0)
	{	
		$mainPassword=md5($password);
		$login="SELECT * FROM delivery_boy WHERE dphone='$username' AND dpwd='$mainPassword' ";
		if($user = mysqli_query($link,$login))
		{
			$userinfo = mysqli_fetch_array($user);
			$_SESSION['d_id']=$userinfo['d_id'];
			$_SESSION['dname']=$userinfo['dname'];
			if(!empty($_SESSION['d_id']))
			{
			?>
			<script type="text/javascript">
				window.location="index.php";
			</script>
			<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					alert('check username and Password');
				</script>
				<?php
				
			}

		}
		else{
			array_push($errors,"plz Check username and Password");
		}
	}
}
include('include/header.php');
?>
<div class="row">
	<img src="images/pexels-photo-64208.jpeg" width="100%">
	<style>
		.login{
			position: relative;
			

		}
		.modal-content{
			padding-top:70px;
		}
		.login-header{
			position: absolute;
			top:-95px;
			left: 7%;
			padding-left: 200px;
			padding-right: 220px;			
			box-shadow: 1px 1px 1px gray;
		}
	</style>
	<div class="modal-dialog  login">
		<div class="modal-content">
			<div class="modal-body">
				<div class="login-header btn-danger">
								<h4 class="text-centers"><strong>Delivery Login</strong></h4>
				</div>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
							<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
							</span>
							<input type="text" name="username" class="form-control" placeholder="mobile no" class="form-control" value="<?php echo $username;?>" autofocus required >
							</div>
							</div>
							
								
								<div class="form-group ">
								<div class="input-group">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
								</span>
							<input type="password" class="form-control" placeholder="******" name="password" required>
								</div>
								</div>
							
									<center><div class="form-group">
								<div class="input-group">
								<button type="submit" name="login" class="btn btn-danger btn-lg">Login</button>
							</div>
							</div>
							</center>
							<p> Not yet a member ?.</p><a href="register.php">Sign Up</a>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
}
else
{
	?>
	<script> 
		window.location="index.php";
	</script>
	<?php
}
include('include/footer.php');
?>