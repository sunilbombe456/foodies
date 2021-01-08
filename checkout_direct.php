<?php 
include('include/config.php');
include('include/header.php');
if(!empty($_SESSION['user_id']))
{
$table="c_address";
$where['u_id']=$_SESSION['user_id'];
echo $where['u_id'];
$record=$db->select_query_where($table,$where);
echo $record;
 	if(isset($_POST['update']))
	{
	
				
				if(empty($record))
				{	
					$data['u_id']=$_SESSION['user_id'];
					$data['uname']=$_POST['username'];
					$data['uphone']=$_POST['uphone'];
					$data['uaddress']=$_POST['uaddress'];
					$data['upincode']=$_POST['upin'];
					$data['ulocality']=$_POST['ulocality'];
					$data['ucity']=$_POST['ucity'];

					if($db->insert_query($table,$data))
					{
					?>
					<script type="text/javascript">
						window.location="user_account.php";
					</script>
					<?php
					}
					else
					{
						echo"query is not run";
					}

				}
				else
				{	
					$user_name=$_POST['username'];
					$data['uphone']=$_POST['uphone'];
					$data['uaddress']=$_POST['uaddress'];
					$data['upincode']=$_POST['upin'];
					$data['ulocality']=$_POST['ulocality'];
					$data['ucity']=$_POST['ucity'];

					$wher_key = array_keys($where);
					$wher_val = array_values($where);
					$user_data="uname='".$user_name."'";
					foreach($data as $key=>$val)
					{
					$user_data .=", ".$key."='".$val."'";
					}

					$sql=" UPDATE $table SET $user_data WHERE u_id='".$_SESSION['user_id']."'";

					if(mysqli_query($link,$sql))
										{
										 ?>
										<script type="text/javascript">
											 window.location="checkout_direct.php";
										</script> 
										<?php
										}
										else
										{
											echo"$sql";
										}
				}
		}
?>
 <div class="row">
 	<style>
		.login{
			position: relative;
			top:16%;
			

		}
		.modal-content{
			padding-top:70px;
			padding-left: 70px;
		}
		.login-header{
			position: relative;
			height: 10%;
			width: 80%;
			top:0px;
			left: 10%;
			padding-left: 200px;
			padding-right: 220px;
			padding-top: 10px;
			padding-bottom: 10px;
			margin-bottom: 20px;			
			box-shadow: 1px 1px 1px gray;
		}
		.login-header h3{
			text-shadow: 1px 1px 1px gray;
		}
	</style>
 	<div class="modal-dialog modal-lg login">

		<div class="thumbnail" >
			<div class="modal-body">
				<div class="login-header btn-danger">
								<h3 class="text-centers"><strong>Checkout Address</strong></h3>
				</div>
			<form method="POST" action="checkout.php" >
			<div class="table">
			<table class="table-info">
			<tr>
				<td colspan="4">
					<div class="form-group">
						<div class="input-group">
							<label>Name</label>
							<input type="text" name="username" width="100%" class="form-control" value="<?php echo $record['uname']; ?>" required >
						</div>
					</div>
				</td>
				<td colspan="2"></td>
				<td colspan="4">
					<div class="form-group">
						<div class="input-group">
							<label>Phone No</label>
							<input type="text" name="uphone" id="uphone" value="<?php echo $record['uphone']; ?>" width="10em" class="form-control" required>
						</div>
					</div>
				</td>
			</tr>


			<tr rowspan="4">
				<td colspan="10">
					<div class="form-group">
						<div class="input-group">
							<label>Address</label>
							<textarea rows="3" name="uaddress" class="form-control"  width="100%" required>
								<?php echo $record['uaddress']; ?>
							</textarea>
							
						</div>
					</div>
				</td>
			</tr>

			<tr border="none">
				<td colspan="4">
					<div class="form-group">
						<div class="input-group">
							<label>Pin Code</label>
							<input type="text" name="upin" value="<?php echo $record['upincode']; ?>" width="10em" class="form-control" required>
						</div>
					</div>
				</td>
				<td colspan="2"></td>
				<td colspan="4">
					<div class="form-group">
						<div class="input-group">
							<label>locality</label>
							<input type="text" name="ulocality" value="<?php echo $record['ulocality']; ?>" width="10em" class="form-control" required>
						</div>
					</div>
				</td>
			</tr>


			<tr>
				<td colspan="4">
					<div class="form-group">
						<div class="input-group">
							<label>City/District/Town</label>
							<input type="text" name="ucity" value="<?php echo $record['ucity']; ?>" class="form-control" required>
						</div>
					</div>
				</td>
				<td colspan="2"></td>
				<td colspan="4">
				</td>
			</tr>


			<tr>
			<td colspan="10">
					<div class="form-group">
						<div class="input-group">
							<input type="submit" name="update" class="btn-lg btn btn-danger" value="save and deliver here" >
						</div>
					</div>
				</td>
			</tr>


			</table>
	
			</div>
		</form>
		</div>
	</div>
</div>


<div class="modal-dialog modal-lg login">

		<div class="thumbnail" >
			<div class="modal-body">
				<div class="login-header btn-danger">
								<h3 class="text-centers"><strong>Payment Method</strong></h3>
				</div>
				<form method="POST" action="confirm_order.php">
				<div class="form-group">
				<div class="input-group">
				<label>Total Cost</label>
				<input type="text" name="total_price" class="form-control" value="<?php echo $_GET['total']; ?>" >
				</div>
				</div>
				<div class="form-group">
					<div class="input-group">
				<input type="radio" id="cash_payment" name="deliver" value="cash"/><label>Cash On Delivery</label>
				<br>
				<input type="radio" id="card_payment" name="deliver" value="card" /><label>Card Payment</label>
				</div>
			</div>
							<!-- all payment detail is here -->
	<div class="row"  id="card_detail" style="display: none;">
	<div class="col-sm-7">
		<div class="modal-dialog">
			<div class="thumbnail">
				<div class="modal-body">			
						 <h3>Payment</h3>
					<div class="form-group">
						<div class="input-group">
		            		<label for="fname">Accepted Cards</label>
		            		<div class="icon-container ">
		             			 <i class="fa fa-cc-visa" style="color:navy; font-size: 35px;"></i>
		              			<i class="fa fa-cc-amex" style="color:blue; font-size: 35px;"></i>
		              			<i class="fa fa-cc-mastercard" style="color:red; font-size: 35px;"></i>
		             			 <i class="fa fa-cc-discover" style="color:orange; font-size: 35px;"></i>
		            		</div>
        				</div>
    				</div>
            		<div class="form-group">
            			<div class="input-group">
          					  <label for="cname">Name on Card</label>
          		 			 <input type="text" id="cname" name="cardname" class="form-control" placeholder="John More Doe">
        				</div>
    				</div>
					<div class="form-group">
            			<div class="input-group">
	           				 <label for="ccnum">Credit card number</label>
	           				 <input type="text" id="ccnum" name="cardnumber" class="form-control" placeholder="1111-2222-3333-4444">
	        			</div>
    				</div>
    				<div class="form-group">
            			<div class="input-group">
            				<label for="expmonth">Exp Month</label>
            				<input type="text" id="expmonth" name="expmonth" class="form-control" placeholder="September">
        				</div>
    				</div>
    				<div class="form-group">
           				 <div class="row">
            				  <div class="col-sm-6">
              	
                					<label for="expyear">Exp Year</label>
                					<input type="text" id="expyear" name="expyear" class="form-control" placeholder="2018">
            	
             				 </div>
             				 <div class="col-sm-6">
              	
            	    				<label for="cvv">CVV</label>
            	    				<input type="text" id="cvv" name="cvv" class="form-control" placeholder="352">
            	
            				  </div>
            			</div>
       			 </div>
        </div>
	    </div>
	</div>
	</div>
	</div>

							<!-- end here -->
				<div class="form-group">
					<div class="input-group">
					<input type="submit" class="btn btn-danger" name="confirm_order" value="Confirm Order" />
					</div>
				</div>
			</div>
		</form>
		</div>
</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#card_payment').click(function(){
				document.getElementById('card_detail').style.display='block';
			})
		})

		$(document).ready(function(){
			$('#cash_payment').click(function(){
				document.getElementById('card_detail').style.display='none';
			})
		})


		function validForm(tname,Errorname)
		{
			var msg;
			if(tname.value.length>0)
			{
				msg="";
				document.getElementById(Errorname).innerHTML = msg;

			}
			else
			{
				msg="* this filed is mandatory..!";
				document.getElementById(Errorname).innerHTML = msg;
			}	
		}
	</script>
</div>
<?php
}
else
{
	?>
	<script type="text/javascript">
		window.location="login.php";
	</script>
	<?php
}
include('include/footer.php');

?>