<?php
include("include/config.php");
$itemNumber=$_COOKIE['number'];

		if(isset($_POST['Add']))
		{	
			for($number=0; $number<$itemNumber; $number++)
			{
					
					$product['dname']=$_POST['Name'.$number];
					$product['dtype']=$_POST['type'.$number];
					$product['dprice']=$_POST['price'.$number];
					$product['ddiscount']=$_POST['stock'.$number];
					$product['dimage']=addslashes($_FILES['myFile'.$number]['name']);
					$product['ddetails']=$_POST['pDet'.$number];
					$product['rest_id']=$_SESSION['rest_rid'];

						$fileName= addslashes($_FILES['myFile'.$number]['name']);
						 $fileTmp=$_FILES['myFile'.$number]['tmp_name'];
						$targetPath="food_item/";
						$targetPath=$targetPath.basename($fileName);
						if(move_uploaded_file($_FILES['myFile'.$number]['tmp_name'],$targetPath))
						{
							$table="rest_dishes";
							if($db->insert_query($table,$product))
							{
								?>
								<script type="text/javascript">
									alert('item successfully added');
									window.location="restaurant_user.php";
								</script>
								<?php
							}
							
						}
						else
						{
								?>
									<script type="text/javascript">
										alert("error in moving file");
									</script>
								<?php
						}
		}
	}
	
  // script for uploading images of http_negotiate_language

	if(isset($_POST['upload']))
{
  $table="rest_details";
  $where['rest_id']=$_SESSION['rest_rid'];
  for($i=1; $i<5; $i++)
  {
    $data['rest_image'.$i] =addslashes($_FILES['myFile'.$i]['name']);
    $fileName=addslashes($_FILES['myFile'.$i]['name']);
    $fileTmp =$_FILES['myFile'.$i]['tmp_name'];
    $targetPath="hotels/";
            $targetPath=$targetPath.basename($fileName);
            if(move_uploaded_file($_FILES['myFile'.$i]['tmp_name'],$targetPath))
            {
              $where['rest_id']=$_SESSION['rest_rid'];
              if($db->update_query_where($table,$data,$where))
              {
              // message will print on success
              }
            }

            unset($data);
            
   
  }
  ?>
  <script type="text/javascript">
    window.location="restaurant_user.php";
   </script>
  <?php
}
  // end of uploading images script
		?>