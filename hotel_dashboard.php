<?php
include('include/config.php');
include('include/header.php');
$table="rest_details";
$_SESSION['rest_id']=$_GET['rest_id'];
$where['rest_id']=$_GET['rest_id'];
$record=$db->select_query_where($table,$where);
?>
<div class="row slide-image">
	 <!-- crarosoul -->
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  <!-- indicator-->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
     <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
  </ol>

  <!--wrapper slide-->
  <div class="carousel-inner">
    <div class="item active">
      <img src="hotels/<?php echo $record['rest_image1']; ?>">
      <div class="carousel-caption">
        <h3><strong><?php echo $record['rest_discount']; ?></strong></h3>
      </div>
    </div>

    <div class="item">
      <img src="hotels/<?php echo $record['rest_image2']; ?>">
      <div class="carousel-caption">
        <h3><strong><?php echo $record['rest_featured']; ?></strong></h3>
      </div>
    </div>

    <div class="item">
     <img src="hotels/<?php echo $record['rest_image3']; ?>">
       <div class="carousel-caption">
        <h3><strong><?php echo $record['rest_promotion']; ?></strong></h3>
      </div>
    </div>

     <div class="item">
     <img src="hotels/<?php echo $record['rest_image4']; ?>">
       <div class="carousel-caption">
        <h3><strong><?php echo $record['rest_promotion']; ?></strong></h3>
      </div>
    </div>
  </div>

  <!--left and right control-->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">prev</span></a>

    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">next</span></a>


</div>
<style type="text/css">
	.hotel-detail{
		position: absolute;
		top:18%;
		left:30%;
		text-shadow:2px 2px 4px #000000;

	}
	.hotel-detail h1{
		color:white;
		font-size: 60px;

	}
	.slide-image{
		position: relative;
		top:0px;
	}
	.hotel-detail p{
		color:white;
		font-size: 30px;

	}
	.dish{
		margin-left: 20px;
		padding: 10px;
		height: 350px;
		width: 225px;

	}
</style>
<div class="hotel-detail">
	<?php
	unset($table);
	unset($where);
	$table="rest_user";
	$where['r_id']=$_GET['rest_id'];
	$rest_details=$db->select_query_where($table,$where);
	?>
	<h1 class="text-center"><strong><?php echo $rest_details['rname']; ?></strong></h1>
	<p><?php echo $record['rest_address']; ?></p>
	<p><strong><?php echo $record['rest_start_hour']; ?> to <?php echo $record['rest_close_hour']; ?></strong></p> 

</div>
<style type="text/css">
	.DishCart{
		position: absolute;
		top:10%;
		right: 5%;
	}
	.DishCart a i{
		font-size: 50px;
		color:white;
		text-shadow:2px 2px 4px #000000;
	}
</style>
<div class="DishCart">
	<a href="#" type="button" data-toggle="modal" id="cart_modal" data-target="#dishCart" onclick="display()"><i class="fas fa-shopping-cart "></i></a>
</div>


   <!-- carasoule -->
  
</div>

<div class="container " id="menu">
	
</div>
<script type="text/javascript">
	var rid=<?php echo $record['rest_id']; ?>;
	$(document).ready(function(){
		$.post('rest_menu.php',{ rest_id:rid },function(data,status){
			$('#menu').html(data);
		})
	})

	$(document).ready(function(){
		$('#cart_modal').click(function(){
			$.post('user_order.php',{rest_id:rid},function(data,status){
			$('#rest_cart').html(data);
		})
		})	
	})


</script>

			<!-- from rest menu -->
			
			<div class="modal fade" id="dishCart" role="dialog">
		    		<div class="modal-dialog modal-md">
		      			<div class="modal-content" id="rest_cart" >
		      			

		      			</div>
		      		</div>
      		</div>

<?php
include('include/footer.php');
?>