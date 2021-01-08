<?php
include('include/config.php');
include('include/header.php');
?>

<?php
if(empty($_SESSION['admin_id']))
{
  ?>
<script type="text/javascript">
  window.location="admin_login.php";
</script>
<?php
}
$table="rest_admin";
$where['a_id']=$_SESSION['admin_id'];
$record=$db->select_query_where($table,$where);

?>
<style type="text/css">
.userProfile i{
  font-size: 80px;
  color:red;
  text-shadow: :2px 2px 4px #000000;

}
.userProfile{

  color:gray;

}
</style>

<div class="container">
	<div class="page-header"><h1 class="text-center" style="color:gray;text-shadow:2px 2px 4px #000000;"><strong>System Admin</strong></h1>
  </div>
  <div class="row">
    <div class="col-sm-2">
        <div class="panel-group">
        <div class="panel panel-default">
        <div class="panel-heading">Your Profile</div>
        <div class="panel-body"><a href="index.php"><button type="button" class="btn btn-danger">Your Profile</button></a></div>
         <div class="panel-body"><a href="#"><button type="button" id="deliver" class="btn btn-danger">Add Delivery Boy</button></a></div>
         <div class="panel-body"><a href="#"><button type="button" id="remove_deliver" class="btn btn-danger">Remove Delivery Boy</button></a></div>
         <div class="panel-body"><a href="#"><button type="button" id="add_hotel" class="btn btn-danger">Add Hotel</button></a></div>
          <div class="panel-body"><a href="#"><button type="button" id="remove_hotel" class="btn btn-danger">Remove Hotel</button></a></div>
       
       
        </div>
        </div>
  </div>
  <div class="col-sm-10" id="dashboard">

   <div class="modal-dialog">
       <div class="modal-body thumbnail userProfile">
        <center> <i class="fas fa-user-circle"></i></center>
        <h2 class="text-center"style="text-shadow: :2px 2px 4px #000000;" ><strong><?php echo $record['aname']; ?></strong></h2>
        <p class="text-center" ><?php echo $record['acity']; ?></p>
       <h4 class="text-center"><?php echo $record['aemail']; ?></h4>

       </div>
   </div>
   
  </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#deliver').click(function(){
			$.get('delivery_boy_register.php',function(data,status){
				$('#dashboard').html(data);
			})
		})
	})


  $(document).ready(function(){
    $('#remove_deliver').click(function(){
      $.get('remove_delivery_boy.php',function(data,status){
        $('#dashboard').html(data);
      })
    })
  })
	

  $(document).ready(function(){
    $('#add_hotel').click(function(){
      $.get('admin_add_hotel.php',function(data,status){
        $('#dashboard').html(data);
      })
    })
  })

  $(document).ready(function(){
    $('#remove_hotel').click(function(){
      $.get('admin_remove_hotel.php',function(data,status){
        $('#dashboard').html(data);
      })
    })
  })
</script>
<?php
include('include/footer.php');
?>