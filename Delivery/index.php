<?php
include('include/config.php');
include('include/header.php');

if(empty($_SESSION['d_id']))
{
  ?>
  <script type="text/javascript">
    alert("login first");
    window.location="delivery_login.php";
  </script>
  <?php
}

$table="delivery_boy";
$where['d_id']=$_SESSION['d_id'];
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
	<div class="page-header"><h1 class="text-center" style="color:orange;text-shadow:2px 2px 4px #000000;"><strong>Delivery Boy</strong></h1>
  </div>
  <div class="row">
    <div class="col-sm-2">
        <div class="panel-group">
        <div class="panel panel-default">
        <div class="panel-heading">Your Profile</div>
        <div class="panel-body"><a href="index.php"><button type="button" class="btn btn-danger">Your Profile</button></a></div>
         <div class="panel-body"><a href="#"><button type="button" id="see_order" class="btn btn-danger">All Order</button></a></div>
         <div class="panel-body"><a href="#"><button type="button" id="confirm_order" class="btn btn-danger">Confirm Order</button></a></div>
       
       
        </div>
        </div>
  </div>
  <div class="col-sm-10" id="dashboard">

   <div class="modal-dialog">
       <div class="modal-body thumbnail userProfile">
        <center> <i class="fas fa-user-circle"></i></center>
        <h2 class="text-center"style="text-shadow: :2px 2px 4px #000000;" ><strong><?php echo $record['dname']; ?></strong></h2>
        <p class="text-center" ><?php echo $record['dcity']; ?></p>
       <h4 class="text-center"><?php echo $record['dphone']; ?></h4>

       </div>
   </div>
   
  </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#see_order').click(function(){
			$.get('all_order.php',function(data,status){
				$('#dashboard').html(data);
			})
		})
	})


  $(document).ready(function(){
    $('#confirm_order').click(function(){
      $.get('confirm_order.php',function(data,status){
        $('#dashboard').html(data);
      })
    })
  })
	
</script>
<?php
include('../include/footer.php');
?>