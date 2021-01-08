<?php
include('include/config.php');
?>
<div clas="page-header">
		<h3 class="text-center"><strong>Restaurant Menu</strong></h3>
	</div>
	<style>
		.dish{
			transition:  height 0.2s,width 0.2s ;
		}
		.dish:hover{
			animation-name: 
		}
		.dish-info{
			position: absolute;
			left:10%;
			top:80%;
		}
		.dish-info h3{
			color:white;
			text-shadow:2px 2px 4px #000000;
		}
		.dish-info h6{
			color:white;
			text-shadow:2px 2px 4px #000000;
		}


	</style>
	<div class="row">



		<?php
		$rest_id=$_POST['rest_id'];
		$sql="SELECT * FROM rest_dishes WHERE rest_id='".$rest_id."'";
		if($result=mysqli_query($link,$sql))
		{
			while($dish=mysqli_fetch_array($result))
			{
			?>
			<!-- modal start -->
		<div class="modal fade" id="myModal<?php echo $dish['d_id']; ?>" role="dialog">
    		<div class="modal-dialog modal-md">
      			<div class="modal-content">
      				<img src="food_item/<?php echo $dish['dimage']; ?>" alt="Random Name" height="500px" width="100%"  class="img-rounded">
      				<div class="dish-info">
      					<h3><strong> <?php echo $dish['dname']; ?></strong></h3>
      					<h6> <?php echo $dish['ddetails']; ?></h6>
      				</div>
      			</div>
			  </div>
		</div>
		<!-- modal end -->
		<div class="col-sm-3 thumbnail dish">
			
						 <a href="#" type="button" data-toggle="modal" data-target="#myModal<?php echo $dish['d_id']; ?>"><img src="food_item/<?php echo $dish['dimage']; ?>" alt="Random Name" height="130px" width="130px"/></a>
						
						<br>
						<h3 class="text-center"><?php echo $dish['dname']; ?></h3><p class="text-center">(<?php echo $dish['dtype']; ?>)</p>
						<p class="text-center"><strong> &#8377; <?php echo $dish['dprice']; ?> Off <?php echo $dish['ddiscount']; ?> </strong></p>
						<div class="col-sm-5">
						<input type="number" min="1" max="20" size="40" id="quantity<?php echo $dish['d_id'];?>" value="1" class="form-control quantity">
						</div>
						<button class="btn btn-danger" value="<?php echo $dish['d_id']; ?>" onclick="addCart(this.value)">Order Now</button>

						
		</div>

		<?php
			}
		}

		?>
	</div>
	<script type="text/javascript">
		function addCart(d_id)
		{	
			var r_id = "<?php echo $_POST['rest_id']; ?>";
			var quantity = document.getElementById('quantity'+d_id).value;
			$.post('user_order.php',{dish_id:d_id,quanty:quantity,rest_id:r_id},function(status,data){
				alert("dish is added");

			})
		}
	</script>