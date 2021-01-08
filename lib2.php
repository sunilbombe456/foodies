<div clas="page-header">
		<h3 class="text-center"><strong>Restaurant Menu</strong></h3>
	</div>
	<div class="row">
		<?php
		$sql="SELECT * FROM rest_dishes WHERE rest_id='".$_GET['rest_id']."'";
		if($result=mysqli_query($link,$sql))
		{
			while($dish=mysqli_fetch_array($result))
			{
			?>
		<div class="col-sm-3 thumbnail dish">
			
						<img src="food_item/<?php echo $dish['dimage']; ?>" alt="Random Name" height="180px" width="180px"   />
						
						<br>
						<h3 class="text-center"><?php echo $dish['dname']; ?></h3>
						<p class="text-center"><strong> &#8377; <?php echo $dish['dprice']; ?> Off <?php echo $dish['ddiscount']; ?> </strong></p>
						<p class="text-center"><?php echo $dish['dtype']; ?>  <?php echo $dish['ddetails']; ?></p>
						
		</div>

		<?php
			}
		}

		?>
	</div>




	<!-- order -->
	if(!empty($_SESSION['user_id']))
		{

			if(!empty($_GET['pid']))
			{	
				$table="product";
				$where['pid']=$_GET['pid'];
				if($addProduct=$db->select_query_where($table,$where))
				{

					$product['uid']=$_SESSION['user_id'];
					$product['pid']=$_GET['pid'];
					$product['price']=$addProduct['price'];
					$product['cdate']=date("y/m/d");
					$product['image']=$addProduct['image'];
					$product['pname']=$addProduct['pName'];
					$product['type']=$addProduct['type'];
					$product['detail']=$addProduct['pDetails'];

					$table="cart";
					if($db->insert_query($table,$product))
					{
						?>
							<script>
								alert('product added');
							</script>
						<?php

					}
					else
					{
						echo'product adding query fails';
					}

				}
			}
		}



	?>



	<div class="container">
			<div class="page-header"><h2>Your Order</h2></div>
			<!-- CART BODY-->
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script>
		function pageback(){
			history.back();
		}
	</script>
	<div class="container">
	<div class="table-responsive">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($_SESSION['user_id']))
						{	
						$productCart="SELECT * FROM cart WHERE uid=".$_SESSION['user_id']."";
						if($prDet=mysqli_query($link,$productCart))
						{
							while($record=mysqli_fetch_array($prDet))
							{

						?>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="product/<?php echo $record['image'];?>" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?php echo $record['pname']; ?></h4>
										<p><?php echo $record['detail']?></p>
									</div>
								</div>
							</td>
							<td data-th="Price">&#8377; <?php echo $record['price'];?></td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center" value="1">
								</td>
							<td data-th="Subtotal" class="text-center">&#8377; <?php echo $record['price'];?></td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<a href="cart.php? delete=<?php echo $record['cid'];?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>								
							</td>
						</tr>
						<?php
							}
						}
						$total="SELECT SUM(cart.price) FROM cart WHERE uid=".$_SESSION['user_id']."";
						if($totalPrice=mysqli_query($link,$total))
						{
							$priceTotal=mysqli_fetch_row($totalPrice);

						?>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>&#8377; <?php echo $priceTotal['0'];?></strong></td>
						</tr>
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>&#8377; <?php echo $priceTotal['0'];?></strong></td>
							<td><a href="checkout.php? total=<?php echo $priceTotal['0'];?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
					<?php
					}
				}
					?>
				</table>
			</div>
		</div>
			<!--body end-->
		</div>