<?php
include('include/config.php');

if(isset($_GET['order_id']))
{
	$table="c_confirm_order";
	$where['co_id']=$_GET['order_id'];
	if($db->delete_query_where($table,$where))
	{
		?>
		<script type="text/javascript">
			window.location="user_account.php";
		</script>
		<?php
	}
}
?>

<div class="modal-dialog">
	<div class="thumbnail">
		<div class="modal-body">
			<h3 class="text-center"><strong>Your Order</strong></h3>
			<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:10%">Order No</th>
							<th style="width:50%">Dishes</th>
							<th style="width:8%">Order Date</th>
							<th style="width:20%" class="text-center">total</th>
							<th style="width:30%">Hotel Name</th>
							<th style="width:10%">payment Status</th>
							<th style="width:10%""></th>
						</tr>
					</thead>
					<tbody>
<?php
$where=$_SESSION['user_id'];
$sql="SELECT * FROM c_confirm_order WHERE user_id='$where' AND delivery_status='' ";
$i=0;
if($result=mysqli_query($link,$sql))
{
while($record=mysqli_fetch_array($result))
{
	$i++;
	?><tr>

		<th style="width:10%"><?php echo $i; ?></th>
		<th style="width:50%"><?php echo $record['odish_name_quantity']; ?></th>
		<th style="width:8%"><?php echo $record['odate']; ?></th>
		<th style="width:20%" class="text-center">&#8377;<?php echo $record['o_total_price']; ?></th>
		<th style="width:30%"><?php echo $record['rest_name']; ?></th>
		<th style="width:10%"><?php echo $record['payment_status']; ?></th>
		<th style="width:10%"><a href="c_user_order.php?order_id=<?php echo $record['co_id'];?>"><button class="btn btn-danger">Cancel</button></a></th>
		
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