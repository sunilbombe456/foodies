<?php
include('include/config.php');
include('include/header.php');
?>
<div class="row">
	<div class="page-header">
		<h3 class="text-center">Restaurant in Pune Matching <strong><?php echo $_GET['rest_search']; ?></strong></h3>
	</div>

	<style type="text/css">
		.description{
			position: absolute;
			top:50%;
			text-align: center;
			padding-left:10%;
			padding-right: 10%;
		
		}
		.description h2{
			
			font-weight: bold;
			color:white;
			text-shadow: :2px 2px 4px #000000;
		}
		.description p{

			color:white;
			font-size: 15px;
		}

		}
	</style>
	<div class="row" style="margin-left:22px;">
	<div class="col-sm-2 thumbnail">
		<!--left menu-->
		<!-- first block -->
		<img src="images/pexels-photo-541216.jpeg">
		<br>
		<img src="images/pexels-photo-1246956.jpeg">


	</div>
	<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-8">

					<!--first block start-->
					<?php
					$search_str = $_GET['rest_search'];
					$sql="SELECT * FROM rest_user WHERE rcity like '%".$search_str."%' OR rname like '%".$search_str."%'";
					if($rest=mysqli_query($link,$sql))
					{
						while($record=mysqli_fetch_array($rest))
						{
							$table="rest_details";
							$where['rest_id']=$record['r_id'];
							if($rest_details=$db->select_query_where($table,$where))
							{

						?>

						<div class="col-sm-12 thumbnail hotelBox">
						<div class="row">
							<a href="hotel_dashboard.php?rest_id=<?php echo $record['r_id']; ?>"><div class="col-sm-12">
								<!--put hotel image here-->
								<img src="hotels/<?php echo $rest_details['rest_image4']; ?>" width="100%">
									<div class="description">
									<h2 class="text-center"><?php echo $record['rname'];?></h2>
									<p class="text-center"><?php echo $rest_details['rest_address']; ?></P>
									</div>
							</div>
						</a>

						</div>
						<hr>
						<div class="row">
							<div class="col-sm-4">
								<p>CUISINES:</p>
								<p>HOURS:</p>
								<p>FEATURED IN:</p>
								<p>DISCOUNT:</p>
								<p>PROMOTIONS:</p>

							</div>
							<div class="col-sm-8">
								<p><?php echo $rest_details['rest_causines']; ?></p>
								<p><?php echo $rest_details['rest_start_hour']; ?> to  <?php  echo $rest_details['rest_close_hour'];?></p>
								<p><?php echo $rest_details['rest_featured']; ?></p>
								<p><?php echo $rest_details['rest_discount']; ?></p>
								<p><?php echo $rest_details['rest_promotion']; ?> </p>
							</div>
						</div>
						<hr>
						<div class="row" style="margin: 10px;">
							<!--FOR BUTTON-->
							<div class="col-sm-4 btn btn-default">
								<h4><span class="glyphicon glyphicon-earphone"></span> Call</h4>
							</div>
							<div class="col-sm-4 btn  btn-default">
								<h4><span class="glyphicon glyphicon-list"></span> View menu</h4>
							</div>
							<a href="hotel_dashboard.php?rest_id=<?php echo $record['r_id']; ?>">
							<div class="col-sm-4 btn btn-success">
								<h4><span class="glyphicon glyphicon-shopping-cart"></span> Order Now</h4>
							</div>
							</a>
						</div>
					</div>
						<?php
							}
						}
					}

					?>
					<!-- first block end-->
					<!-- second start-->
					
					<!-- second end-->	


				</div>
				<div class="col-sm-4 thumbnail">
					<h3 class="text-center">Mostly Liked</h3>
					
					<div class="row">
					<?php
							$table="rest_dishes";
							if($rest_image=$db->select_query($table))
							{
								while($dish=mysqli_fetch_array($rest_image))
								{
							?>
								<div class="col-sm-5" style="margin: 10px;">
								<img src="food_item/<?php echo $dish['dimage']; ?>" width="100%" >
								</div>
							<?php
							}
						}
							?>
					</div>
			
				</div>
			</div>
	</div>
</div>
</div>
<?php
include('include/footer.php');
?>