<?php
include('include/config.php');
include('include/header.php');
?>
<?php
if(isset($_POST['confirm_order']))
{
	$rest_id=$_SESSION['rest_id'];

	$rest_dish_details="<ul>";
	$sql="SELECT * FROM c_temp_order WHERE rest_id='$rest_id'";
	if($rec=mysqli_query($link,$sql))
	{
		while($dish_detail= mysqli_fetch_array($rec))
		{
			$rest_dish_details .="<li> dish:".$dish_detail['dname']." (".$dish_detail['dquantity'].")</li>";
		}
	}

	$rest_dish_details .="</ul>";

	// getting restaurant name

	$table5="rest_user";
	$where5['r_id']=$_SESSION['rest_id'];
	$rest_det=$db->select_query_where($table5,$where5);
	$rest_name=$rest_det['rname'];




	// getting user_address
	$user_address="<ul>";

	$user_id=$_SESSION['user_id'];

	$sql2="SELECT * FROM c_address WHERE u_id='$user_id'";
	if($rec_addr=mysqli_query($link,$sql2))
	{
		$address=mysqli_fetch_array($rec_addr);

		$user_address .="<li>Name:".$address['uname']."</li>";
		$user_address .="<li>Phone:".$address['uphone']."</li>";
		$user_address .="<li>Address:".$address['uaddress']."</li>";
		$user_address .="<li>PinCode:".$address['upincode']."</li>";
		$user_address .="<li>Locality:".$address['ulocality']."</li>";
		$user_address .="<li>City:".$address['ucity']."</li>";
	}
	$user_address .="</ul>";

	// order date()

	$today=date("y/m/d");

	//total price
	$sql3="SELECT SUM(c_temp_order.dsubtotal) FROM c_temp_order WHERE rest_id='$rest_id'";
				if($sum=mysqli_query($link,$sql3))
				{
					if($total=mysqli_fetch_row($sum))
					{
						$total_cost=$total['0'];
					}
				}

	//payment status

	$payment_details="";
	$payment_status="";
	if($_POST['deliver']=="cash")
	{
		 $payment_status="incomplete";

	}
	else
	{
		 $payment_status="complete";
		 $payment_details .=", card name:".$_POST['cardname']." ";
		 $payment_details .=", card number:".$_POST['cardnumber']." ";
		 $payment_details .=", Exp Month:".$_POST['expmonth']." ";
		 $payment_details .=", Exp Year:".$_POST['expyear']." ";
		 $payment_details .=", CVV:".$_POST['cvv']." ";
	}

	$table="c_confirm_order";
	$data['user_id']=$user_id;
	$data['rest_id']=$rest_id;
	$data['rest_name']=$rest_name;
	$data['odate']=$today;
	$data['odish_name_quantity']=$rest_dish_details;
	$data['o_total_price']=$total_cost;
	$data['card_details']=$payment_details;
	$data['odelivery_address']=$user_address;
	$data['payment_status']=$payment_status;
	$data['d_boy_id']="";
	$data['delivery_status']="";

	if($db->insert_query($table,$data))
	{
	
		$where['rest_id']=$rest_id;
		$table2="c_temp_order";
		if($db->delete_query_where($table2,$where))
		{
		?>
		<script type="text/javascript">
			alert("your order is confirm");
		</script>
		<div class="comtainer">
			<div class="page-header">
				<h1 class="text-center"><strong>Order Status</strong></h1>
			</div>
		<div class="container-float">
			<div class="row">
				<div class="col-sm-3">
					
				</div>
				<div class="col-sm-9">
			<div class="row"><div class="col-sm-8 btn btn-success"><h2>Your Order is Successfull</h2></div></div>
			<br><br>
			<div class="row"><div class="col-sm-8 btn btn-danger"><a href="hotel_dashboard.php?rest_id=<?php echo $_SESSION['rest_id']; ?>"><h2>Continous</h2></a></div>
			</div>
		</div>
		</div>
		</div>
		<br>
		<br>
		<br>
		<?php
		}
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("your order is not confirm");
		</script>
		<?php
	}





}
?>
<?php
include('include/footer.php');
?>