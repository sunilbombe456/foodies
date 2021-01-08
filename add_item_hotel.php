<?php
include('include/config.php');
?>
<section class="main-box">
		<div class="productNumber">
			
				<div class="form-group">
				<div class="input-group">
				<label>Enter the Number of Product you want to Enter</label>
				<input type="text" class="form-control" id="item" name="quantity">
				</div>
				</div>
				<div class="form-group">
				<div class="input-group">
						<input type="button" class="btn btn-info" onclick="getTable()" name="number" value="Add Product">
				</div>
				</div>
			
		</div>
		<p>Image Size Should be 500 * 500 pxels</p>
		<div class="product">
			<form method="POST" enctype="multipart/form-data" action="hotel_operation.php">
			<table class="table table-hover table-bordered">
				<thead>
				<tr>
					<th>Dish Name</th>
					<th>type</th>
					<th>Price</th>
					<th>discount</th>
					<th>Image</th>
					<th>Details</th>
				</tr>
				</thead>
				<tbody id="loadtable">
	
				</tbody>
				
				<tfooter>
			<tr>
				<td colspan="6"><input type="submit" class="btn btn-info" name="Add" value="submit"></td>
			</tr>
			</tfooter>
			</table>
			
		</form>
		</div>
	
		
		<script type="text/javascript">

			function getTable(){
			var itemNumber = document.getElementById('item').value;
			 document.cookie="number="+ itemNumber;

			var itemtable ="";
			var i;
			for(i=0; i<itemNumber; i++)
			{
				itemtable += "<tr><td><input type=text name=Name"+i+" class=form-control ></td><td><input type=text name=type"+i+" class=form-control ></td><td><input type=text name=price"+i+" class=form-control ></td><td><input type=text name=stock"+i+" class=form-control ></td><td><input type=file name=myFile"+i+" class=form-control ></td><td><input type=text name=pDet"+i+" class=form-control ></td></tr>";
							}
							document.getElementById('loadtable').innerHTML = itemtable;
						}

		</script>
	</section>