<?php 
include('include/config.php');
?>

<?php
if(empty($_SESSION['user_id']))
{
//username and password and error
				$username = "";
				$password = "";
				$errors = array();
if(empty($_SESSION['user_id']))
{
	if(isset($_POST['register']))
		{
			$username = mysqli_real_escape_string($link,$_POST['uname']);
			$phone = mysqli_real_escape_string($link,$_POST['uphone']);
			$email = mysqli_real_escape_string($link,$_POST['uemail']);
			$password_1  = mysqli_real_escape_string($link,$_POST['password1']);
			$password_2 = mysqli_real_escape_string($link,$_POST['password2']);


			if(empty($username))
			{
					array_push($errors,"Username is required");
			}
			if(empty($email))
			{
				array_push($errors,"Email is required and enter valid Email");
			}
			if(empty($phone))
			{
				array_push($errors,"Mobile number is required");
			}
			if(empty($password_1))
			{
				array_push($errors,"Passord is required");
			}
			if($password_1 != $password_2)
			{
				array_push($errors,"two password are not same");
			}

			if(count($errors) == 0)
			{
				$password = md5($password_1);
				$data['uname']= $username;
				$data['uphone'] =$phone;
				$data['uemail'] =$email;
				$data['upwd'] =$password;

				$table="c_user";

				if($db->insert_query($table,$data))
				{	
					$where['uname']=$username;
					if($result = $db->select_query_where($table,$where))
					{
						$_SESSION['user_id'] = $result['u_id'];
						$_SESSION['user_name'] = $result['uname'];
					    header('location:index.php');
					}
				}

			}
		}
	}


?>


<?php
include('include/header.php');
?>
<script>
 function updateWidth(textbox) {
         $(textbox).parent().css("width",(textbox.value.length + 2) + "em");
 }

 </script>

 <div class="row">
 	<style>
		.login{
			position: absolute;
			top:12%;
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
 	<img src="images/pexels-photo-64208.jpeg">

 	<div class="modal-dialog login">

		<div class="modal-content" >
			<div class="modal-body">
				<div class="login-header btn-danger">
								<h3 class="text-centers">Sign Up</h3>
				</div>
			<form method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?> >
				<label>User Name</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
							</span>
							<input type="text" name="uname" width="100%" placeholder="username" class="form-control" required value="<?php echo $username; ?>" >
						</div>
					</div>
						<label>Phone No</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-earphone"></span></span>
							<input type="text"  name="uphone" class="form-control" placeholder="mobile no" width="10em"  required value="<?php echo $phone; ?>" >
						</div>
					</div>
					<label>Email</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span></span>
							<input type="email" name="uemail"  class="form-control" placeholder="@gmail.com"  required value="<?php echo $email; ?>">
						</div>
					</div>
					<label>Password</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
								</span>
							<input type="password" name="password1" class="form-control" placeholder="*****" required>
							
						</div>
					</div>
					<label>Confirm Password</label>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
								</span>
							<input type="password" name="password2" class="form-control" placeholder="*****" required>
							
						</div>
					</div>
					<center>
					<div class="form-group">
						<div class="input-group">
							<input type="submit" name="register" class="btn btn-danger btn-lg" value="register">  
							<input type="reset" name="" class="btn btn-danger btn-lg"  value="Cancel">
						</div>
					</div>
				</center>
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
	<script type="text/javascript">
		window.location="index.php";
	</script>
	<?php
}
include('include/footer.php');
?>