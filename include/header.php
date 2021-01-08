<!DOCTYPE html>
<html lang="en">
<head>
  <title>FoodHub.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="logo/favicon.png" type="image/x-icon">


  <link href="css/login.css" rel="stylesheet" type="text/css">
  <link href="css/header.css" rel="stylesheet" type="text/css">
  <link href="css/index.css" rel="stylesheet" type="text/css">
   <link href="css/footer.css" rel="stylesheet" type="text/css">

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 0px;
      border-radius: 0;
    
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
    ul li a{
      text-decoration: none;
      color:white;
    }
  </style>
</head>
<body>

<script type="text/javascript">
  $(document).scroll(function(e){
    var scrollTop = $(document).scrollTop();
    if(scrollTop > 0){
        console.log(scrollTop);
        $('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');
        
    }
});
</script>
<div class="row">
<nav class="menuBar navbar btn-danger">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><strong><span style="color:black">Food</span><span style="color:yellow;">Hub</span></strong></a>
    </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>

         <li><a href="hotels.php">Hotels<span class="caret"></span></a></li>

      </ul>


      <form class="navbar-form navbar-left" method="GET" action="hotel_search.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search for Restaurant.." name="rest_search">
      </div>
      <button type="submit" class="btn btn-success" >Search</button>
    </form>

      <ul class="nav navbar-nav navbar-right">
                               <!--start dropdowm-->
                            <?php
                           if(!empty($_SESSION['post']))
                              {
                                 ?>
                                 <li><a href="admin.php"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
                                 <?php
                              } 
                           if(!empty($_SESSION['user_id']))
                           {
                            ?>
                              <li><a href="user_account.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                              <?php
                              
                           }
                           ?>


                            <?php
                                if(empty($_SESSION['user_id']))
                           {
                           ?>
                             <li ><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                           <?php
                           }
                           else{
                            ?>
                             <li><a href="login.php?needAction=logout"><span class="glyphicon glyphicon-log-out" ></span> Logout</a></li>
                             <?php

                           }
                          ?>


      </ul>
  </div>
</nav>
</div>

