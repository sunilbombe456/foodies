<?php
include('include/config.php');
include('include/header.php');
?>

<?php
$table="c_user";
$where['u_id']=$_SESSION['user_id'];
$record=$db->select_query_where($table,$where);

?>
<style type="text/css">
.userProfile i{
  font-size: 80px;
  color:red;
  text-shadow: :2px 2px 4px #000000;

}
.userProfile{
  background: rgba(0,0,0,0.5);
  color:white;

}
</style>

<div class="container">
	<div class="page-header" style="background: gray"><h1 class="text-center" style="color:white;text-shadow:2px 2px 4px #000000;"><strong>Profile</strong></h1>
  </div>
  <div class="row">
    <div class="col-sm-2">
        <div class="panel-group">
        <div class="panel panel-default">
        <div class="panel-heading">Your Profile</div>
        <div class="panel-body"><a href="user_account.php"><button type="button" class="btn btn-danger">Your Profile</button></a></div>
        <div class="panel-body"><button type="button" id="order" class="btn btn-danger">Your Orders</button></div>
        <div class="panel-body"><a href="#"><button type="button" id="address" class="btn btn-danger">Delivery Address</button></a></div>

        <div class="panel-body"><a href="#"><button type="button" id="success_order" class="btn btn-danger">Success Orders</button></a></div>
        </div>
        </div>
  </div>
  <div class="col-sm-10" id="dashboard">

   <div class="modal-dialog">
       <div class="modal-body thumbnail userProfile">
        <center> <i class="fas fa-user-circle"></i></center>
        <h2 class="text-center"style="text-shadow: :2px 2px 4px #000000;" ><strong><?php echo $record['uname']; ?></strong></h2>
        <p class="text-center" ><?php echo $record['uphone']; ?></p>
       <h4 class="text-center"><?php echo $record['uemail']; ?></h4>

       </div>
   </div>
   
  </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#address').click(function(){
			$.get('checkout.php',function(data,status){
				$('#dashboard').html(data);
			})
		})
	})


  $(document).ready(function(){
    $('#order').click(function(){
      $.get('c_user_order.php',function(data,status){
        $('#dashboard').html(data);
      })
    })
  })
	
  $(document).ready(function(){
    $('#success_order').click(function(){
      $.get('completed_order.php',function(data,status){
        $('#dashboard').html(data);
      })
    })
  })
  
</script>
<?php
include('include/footer.php');
?>