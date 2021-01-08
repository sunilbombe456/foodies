<?php
include('include/config.php');
if(isset($_GET['r_id']))
{
	$table="rest_user";
	$where['r_id']=$_GET['r_id'];
	if($db->delete_query_where($table,$where))
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
		<div class="modal-body">
			<h3 class="text-center"><strong>Hotel </strong></h3>
			<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:10%">No</th>
							<th style="width:50%">Hotel Name</th>
							<th style="width:30%">Phone</th>
							<th style="width:10%"">City</th>
							<th style="width:10%""></th>

						</tr>
					</thead>
					<tbody>
<?php
$where=$_SESSION['admin_id'];
$sql="SELECT * FROM rest_user WHERE admin_id='$where'";
$i=0;
if($result=mysqli_query($link,$sql))
{
while($record=mysqli_fetch_array($result))
{
	$i++;
	?><tr>

		<th style="width:10%"><?php echo $i; ?></th>
		<th style="width:50%"><?php echo $record['rname']; ?></th>
		<th style="width:30%"><?php echo $record['rphone']; ?></th>
		<th style="width:10%" class="text-center"><?php echo $record['rcity']; ?></th>
		<th style="width:10%"><a href="admin_remove_hotel.php?r_id=<?php echo $record['r_id'];?>"><button class="btn btn-danger">Remove</button></a></th>
		
	</tr>
	<?php
}
}
?>
	</tbody>
	</table>
	</div>
	</div>
</div>