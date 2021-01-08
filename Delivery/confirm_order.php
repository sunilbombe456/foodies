<?php
include('include/config.php');
if(isset($_GET['delete_id']))
{
	$table="c_confirm_order";
	$where['co_id']=$_GET['delete_id'];
	$data['d_boy_id']="";
	if($db->update_query_where($table,$data,$where))
	{
		?>
		<script type="text/javascript">
			window.location="index.php";
		</script>
		<?php
	}

}

if(isset($_GET['co_id']))
{
	$table="c_confirm_order";
	$where2['co_id']=$_GET['co_id'];
	$data2['delivery_status']="Success";
	if($db->update_query_where($table,$data2,$where2))
	{
		?>
		<script type="text/javascript">
			window.location="index.php";
		</script>
		<?php
	}

}
?>

<div class="modal-dialog modal-lg thumbnail">
	<div class="">
		<div class="modal-body">
			<h3 class="text-center"><strong>Hotel </strong></h3>
			<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:10%">No</th>
							<th style="width:30%">Hotel Name</th>
							<th style="width:50%">Dish</th>
							<th style="width:50%">Delivery Address</th>
							<th style="width:10%"">Payment Status</th>
							<th style="width:10%"">Total</th>
							<th style="width:10%""></th>
							<th style="width:10%""></th>

						</tr>
					</thead>
					<tbody>
<?php
$sql="SELECT * FROM c_confirm_order WHERE d_boy_id='".$_SESSION['d_id']."' AND delivery_status=''";
$i=0;
if($result=mysqli_query($link,$sql))
{
while($record=mysqli_fetch_array($result))
{	

	$i++;
	?><tr>

		<th style="width:10%"><?php echo $i; ?></th>
		<th style="width:30%"><?php echo $record['rest_name']; ?></th>
		<th style="width:50%"><?php echo $record['odish_name_quantity'];?></th>
		<th style="width:50%"><?php echo $record['odelivery_address'];?></th>
		<th style="width:10%""><?php echo $record['payment_status'];?></th>
		<th style="width:10%""><?php echo $record['o_total_price'];?></th>
		<th style="width:10%"><a href="confirm_order.php?co_id=<?php echo $record['co_id'];?>"><button class="btn btn-danger">Order Success</button></a></th>
		<th style="width:10%"><a href="confirm_order.php?delete_id=<?php echo $record['co_id'];?>"><button class="btn btn-danger">Order Cancel</button></a></th>

		
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