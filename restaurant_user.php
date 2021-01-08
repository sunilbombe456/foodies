<?php
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FoodHub.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/footer.css" rel="stylesheet" type="text/css">
  <link href="css/header.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
      background:#294C82;
    
      display: block;
      border:none;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>


<nav class="navbar navbar-inverse" style="background: #294C82;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><strong><span style="color:white">Food</span><span style="color:yellow;">Hub</span></strong></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="restaurant_user.php">Restaurant</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
                               <!--start dropdowm-->
                           <?php
                                if(!empty($_SESSION['rest_rid']))
                                {
                            ?>
                             <li><a href="login.php?needAction=logout"><span class="glyphicon glyphicon-log-out" ></span> Logout</a></li>
                             <?php

                               }
                          ?>


      </ul>
    </div>
  </div>
</nav>

<?php
$table="rest_details";
$where['rest_id']=$_SESSION['rest_rid'];
$record=$db->select_query_where($table,$where);

?>
<!-- body start here -->
<div class="container">
  <div class="page-header" style="background: gray"><h1 class="text-center" style="color:white;text-shadow:2px 2px 4px #000000;"><strong><?php echo $_SESSION['rest_name']; ?></strong></h1>
<p class="text-center" style="color:white"><?php echo $record['rest_address']; ?></p>
<h4 style="color:white" class="text-center"><?php echo $record['rest_causines']; ?></h4>

  </div>
  <div class="row">
    <div class="col-sm-2">
        <div class="panel-group">
        <div class="panel panel-default">
        <div class="panel-heading"><a href="restaurant_user.php">Hotel Menu</a></div>
        <div class="panel-body"><button type="button" id="fill_details" class="btn btn-info">Fill Details</button></div>
        <div class="panel-body"><button type="button" id="add_product" class="btn btn-info">ADD ITEMS</button></div>
        <div class="panel-body"><a href="#"><button type="button" id="order" class="btn btn-info">YOUR ORDER</button></a></div>
        <div class="panel-body"><button tyep="button" id="img_upload" class="btn btn-info">Upload Images</button></div>
        </div>
        </div>
  </div>
  <div class="col-sm-10" id="dashboard">
   <!-- crarosoul -->
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  <!-- indicator-->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
  </ol>

  <!--wrapper slide-->
  <div class="carousel-inner">
    <div class="item active">
      <img src="hotels/<?php echo $record['rest_image1']; ?>">
      <div class="carousel-caption">
        <h3><?php echo $record['rest_discount']; ?></h3>
      </div>
    </div>

    <div class="item">
      <img src="hotels/<?php echo $record['rest_image2']; ?>">
      <div class="carousel-caption">
        <h3><?php echo $record['rest_featured']; ?></h3>
      </div>
    </div>

    <div class="item">
     <img src="hotels/<?php echo $record['rest_image3']; ?>">
       <div class="carousel-caption">
        <h3><?php echo $record['rest_promotion']; ?></h3>
      </div>
    </div>
  </div>

  <!--left and right control-->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">prev</span></a>

    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">next</span></a>


</div>


   <!-- carasoule -->
  
  </div>
  </div>
</div>
<script>
    $(document).ready(function(){
      $('#add_product').click(function(){
         $.get('add_item_hotel.php',function(data,status)
                    {
                        $('#dashboard').html(data);
                        alert("add product in table");
                    })
      })
    })

    $(document).ready(function(){
      $('#fill_details').click(function(){
        $.get('update_rest.php',function(data,status){
          $('#dashboard').html(data);
          alert('update details');
        })
      })
    })

    $(document).ready(function(){
      $('#img_upload').click(function(){
        $.get('rest_image_upload.php',function(data,status){
          $('#dashboard').html(data);
          alert('upload images');
        })
      })
    })


    $(document).ready(function(){
      $('#order').click(function(){
        $.get('rest_order.php',function(data,status){
          $('#dashboard').html(data);
          alert('your orders');
        })
      })
    })
  
</script>

<!-- body end here -->


<?php
include('include/footer.php');

?>