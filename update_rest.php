<?php
include('include/config.php');
$table="rest_details";
$where['rest_id']=$_SESSION['rest_rid'];
$record=$db->select_query_where($table,$where);
if(isset($_POST['update']))
{
	
	
	if(empty($record))
	{	
		$data['rest_address']=$_POST['rest_addr'];
		$data['rest_causines']=$_POST['causines'];
		$data['rest_start_hour']=$_POST['start_time'];
		$data['rest_close_hour']=$_POST['close_time'];
		$data['rest_featured']=$_POST['feature'];
		$data['rest_discount']=$_POST['discount'];
		$data['rest_promotion']=$_POST['promotion'];
		$data['rest_id']=$_SESSION['rest_id'];
		$data['rest_image1']="";
		$data['rest_image2']="";
		$data['rest_image3']="";
		$data['rest_image4']="";

		$db->insert_query($table,$data);
		?>
		<script type="text/javascript">
			window.location="restaurant_user.php";
		</script>
		<?php

	}
	else
	{	
		$rest_addr=$_POST['rest_addr'];
		$data['rest_causines']=$_POST['causines'];
		$data['rest_start_hour']=$_POST['start_time'];
		$data['rest_close_hour']=$_POST['close_time'];
		$data['rest_featured']=$_POST['feature'];
		$data['rest_discount']=$_POST['discount'];
		$data['rest_promotion']=$_POST['promotion'];

		$wher_key = array_keys($where);
		$wher_val = array_values($where);
		$user_data="rest_address='".$rest_addr."'";
		foreach($data as $key=>$val)
		{
		$user_data .=", ".$key."='".$val."'";
		}

		$sql=" UPDATE $table SET $user_data WHERE rest_id='".$_SESSION['rest_rid']."'";

		if(mysqli_query($link,$sql))
							{
							 ?>
							<script type="text/javascript">
								window.location="restaurant_user.php";
							</script>
							<?php
							}
							else
							{
								echo"$sql";
							}
	}
}
?>
<div class="row">
	<div class="page-header"><h3 class="text-center">Update Restaurant info</h3></div>
	<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="row">
			<div class="col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<label>Restaurant Address</label>
								<textarea row=3 col=25 class="form-control" name="rest_addr">
									<?php echo $record['rest_address']; ?>
								</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<label>Causines</label>
								<input type="text" name="causines" value="<?php echo $record['rest_causines']; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<label>Restaurant Start Time</label>
								<input type="text" name="start_time"  value="<?php echo $record['rest_start_hour']; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<label>Restaurant Close Time</label>
								<input type="text" name="close_time"  value="<?php echo $record['rest_close_hour']; ?>" class="form-control">
							</div>
						</div>
			</div>
			<div class="col-sm-6">

						<div class="form-group">
							<div class="input-group">
								<label>Restaurant Feature</label>
								<input type="text" name="feature"  value="<?php echo $record['rest_featured']; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<label>Restaurant Discount</label>
								<input type="text" name="discount"  value="<?php echo $record['rest_discount']; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<label>Restaurant Promotion</label>
								<input type="text" name="promotion"  value="<?php echo $record['rest_promotion']; ?>" class="form-control">
							</div>
						</div>
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<input type="submit" name="update" class="btn btn-lg btn-info" value="Update Restaurant">
			</div>
		</div>
	</form>
</div>