<?php 
include('include/config.php');
include('include/header.php');
?>
<style type="text/css">
	body{
			background:  #f2f2f2;
	}
</style>
<div class="row">
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
            	<div class="form-group">
            		<div class="input-group">
            			<input type="submit" class="btn btn-info" value="confirm payment">
            		</div>
            	</div>
        </div>
    </div>
</div>
</div>
</div>



	
<?php
include('include/footer.php');
?>