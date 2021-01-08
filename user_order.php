	<?php
	include('include/config.php');

		if(isset($_GET['delete']))
		{
			$data['o_id']=$_GET['delete'];
			$delete_table="c_temp_order";
			if($db->delete_query_where($delete_table,$data))
			{
				?>
				<script type="text/javascript">
					window.location="hotel_dashboard.php?rest_id=<?php echo $_SESSION['rest_id']; ?>";
				</script>

				<?php
			}
		}

		if(isset($_POST['dish_id']))
			{
				$table="rest_dishes";
				$where['d_id']=$_POST['dish_id'];
				$record=$db->select_query_where($table,$where);
				$data['dimage']=$record['dimage'];
				$data['dname']=$record['dname'];
				$data['dprice']=$record['dprice'];
				$data['dquantity']=$_POST['quanty'];
				$data['dsubtotal']= ($_POST['quanty']*$record['dprice']);
				$data['rest_id']=$_POST['rest_id'];
				$temp_table="c_temp_order";
				if($db->insert_query($temp_table,$data))
				{
					echo"<script> alert('added to cart'); </script>";
				}

			}

			?>

			<h2 class="text-center"><strong>Dish Cart</strong></h2>
		      			<table class="table">
		      				<thead>
		      				<tr class="">
		      				<th style="width:50%">Dish</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
		      				</tr>
		      				</thead>
		      				<tbody id="table_body">
			<?php
			if(!empty($_POST['rest_id']))
			{
				$cart_table="c_temp_order";
				$rest_id=$_POST['rest_id'];

				$sql="SELECT * FROM $cart_table WHERE rest_id='$rest_id'";
				if($rec=mysqli_query($link,$sql))
					{
						while($dish_record=mysqli_fetch_array($rec))
						{
							?>
		      					<tr>
			      				<td data-th="Product">
									<div class="row">
										<div class="col-sm-2 hidden-xs"><img src="food_item/<?php echo $dish_record['dimage']; ?>" height="40" width="40" /></div>
										<div class="col-sm-10">
											<h4 class="nomargin"><?php echo $dish_record['dname']; ?></h4>
										</div>
									</div>
								</td>
								<td data-th="Price">&#8377; <?php echo $dish_record['dprice']; ?></td>
								<td data-th="Quantity">
									<h4><?php echo $dish_record['dquantity'];?></h4>
								</td>
								<td data-th="Subtotal" class="text-center">&#8377; <?php echo $dish_record['dsubtotal'];?></td>
								<td class="actions" data-th="">
									<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
									<a href="user_order.php?delete=<?php echo $dish_record['o_id']; ?>" ><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>								
									</td>
		      					</tr>
							<?php
						}
					}

				$sql2="SELECT SUM(c_temp_order.dsubtotal) FROM $cart_table WHERE rest_id='$rest_id'";
				if($sum=mysqli_query($link,$sql2))
				{
					if($total=mysqli_fetch_row($sum))
					{
						?>
						</tbody>
		      				<tfoot>
		      					<tr>
			      					<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
									<td colspan="2" class="hidden-xs"></td>
									<td class="hidden-xs text-center"><strong>&#8377; <?php echo $total['0']; ?></strong></td>
									<td><a href="checkout_direct.php? total=<?php echo $total['0'];?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
		      					</tr>
		      				</tfoot>
		      			</table>

						<?php
					}
				}

		
			}
			?>	