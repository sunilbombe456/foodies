<!DOCTYPE html>
<html lang="en">
<head>
  <title>FoodHub.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<nav class="navbar menuBar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><strong><span style="color:black">Food</span><span style="color:yellow;">Hub</span></strong></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
         <li><a href="Add_item.php">Add menu<span class="caret"></span></a></li>
         <li>Add Pictures</li>
         <li>View Order</li>
      </ul>


      <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search for Restorent..">
      </div>
      <button type="submit" class="btn btn-danger">Search</button>
    </form>

      <ul class="nav navbar-nav navbar-right">
                               <!--start dropdowm-->
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="contactus.php">Contacts</a></li>
                                  <li><a href="review.php">Review</a></li>
                                  <li><a href="report.php">Feedback</a></li>
                                  <li><a href="about.php">About</a></li>
                                </ul>
                           </li>
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
                              <li><a href="accountinfo.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                              <?php
                              
                           }
                           ?>


                            <?php
                                if(empty($_SESSION['user_id']))
                           {
                           ?>
                             <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
  </div>
</nav>
</div>
