<?php
include('include/config.php');
if(isset($_GET['d_id']))
{
	$table="delivery_boy";
	$where['d_id']=$_GET['d_id'];
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
			<h3 class="text-center"><strong>Delivery Boy</strong></h3>
			<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:10%">No</th>
							<th style="width:50%">Name</th>
							<th style="width:30%">Phone</th>
							<th style="width:10%"">City</th>
							<th style="width:10%""></th>

						</tr>
					</thead>
					<tbody>
<?php
$where=$_SESSION['admin_id'];
$sql="SELECT * FROM delivery_boy WHERE admin_id='$where'";
$i=0;
if($result=mysqli_query($link,$sql))
{
while($record=mysqli_fetch_array($result))
{
	$i++;
	?><tr>

		<th style="width:10%"><?php echo $i; ?></th>
		<th style="width:50%"><?php echo $record['dname']; ?></th>
		<th style="width:30%"><?php echo $record['dphone']; ?></th>
		<th style="width:10%" class="text-center"><?php echo $record['dcity']; ?></th>
		<th style="width:10%"><a href="remove_delivery_boy.php?d_id=<?php echo $record['d_id'];?>"><button class="btn btn-danger">Remove</button></a></th>
		
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