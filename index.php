<?php
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>FoodHub.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- favicon icon code -->
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
    .nav li a{
      text-decoration: none;
      color:white;
    }
     .website-logo img{
      margin-top:30px;
      margin-left:25%;
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
<nav class="menuBar btn-danger">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><strong><span style="color:black">Food</span><span style="color:yellow;">Hub</span></strong></a>
    </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>

         <li><a href="hotels.php">Hotels<span class="caret"></span></a></li>


      </ul>
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

      </ul>
  </div>
</nav>
</div>


<!--end navbar-->
<div class="row">
        <img src="images/food-eating-potatoes-beer-8313.jpg" width="100%" alt="Image">


    <div class="searchBox">
     <form class="form-inline" method="GET" action="hotel_search.php">
     <h3 style="color:white;text-shadow: 1px 1px 1px black;">Find the best restaurants, cafés, and bars in Pune</h3>
    <input type="text" class="form-control" size="50" placeholder="Search Restaurants in pune" name="rest_search">
    <button type="submit" class="btn btn-danger">Search</button>
  </form>
  <div class="website-logo">
    <img src="logo/logo.png" class="img-rounded" height="225" width="225">
  </div>
  </div>
      <?php
      if(empty($_SESSION['user_id']))
      {
      ?>
    <div class="createAcc">
     <a href="login.php"><strong>Login</strong></a>
     <button><a href="register.php"><strong>Create an Account</strong></a></button>
    </div>
    <?php
     }
     else
     {
      ?>
      <div class="createAcc">
     <button><strong><a href="login.php?needAction=logout"> Logout</a></strong></button>
     </div>
      <?php
     }
    ?>

</div>
  
<div class="container text-center">    
  <h3><strong>Order Food Online</strong></h3>
<p style="font-size: 16px;">Best restaurants delivering to your doorstep</p><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="images/pexels-photo-941861.jpeg" class="img-responsive" style="width:100%" alt="Image">
       <h3> Best of Pune</h3>
    <p>The hunt for the highest-rated restaurants in your city ends here</p>
    </div>
    <div class="col-sm-4"> 
      <img src="images/pexels-photo-714703.jpeg" class="img-responsive" style="width:100%" alt="150*80">
      <h3>New Year's Eve 2018</h3>
<p>The best places to have the best New Year's Eve Celebration!</p>   
    </div>
    <div class="col-sm-4">
      <div class="well">
     <h3> Best of Pune</h3>
<p>The hunt for the highest-rated restaurants in your city ends here</p>
      </div>
      <div class="well">
       <h3>New Year's Eve 2018</h3>
<p>The best places to have the best New Year's Eve Celebration!</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="container-fload quickSearch">
                                    <h3 style="text-shadow:2px 2px 4px #000000;"><strong>Our Services..!</strong></h3>
                          <ul>
                            <li>
                                <div>
                                  <img src="icon/availability.png" height="75px" width="75px"></span>
                                   <center><p>Delivery</p></center>
                              </div>
                            </li>
                           <li>
                              <div>
                                <img src="icon/suitcase.png" height="75px" width="75px">
                                <center><p>Pocket-Friendly</p></center>
                              </div>
                            </li>
                            <li>
                              <div>
                               <img src="icon/dish.png" height="75px" width="75px">
                               <center><p>Breakfast</p></center>
                             </div>
                            </li>
                            <li>
                            <div>
                              <img src="icon/hotel-bell.png" height="75px" width="75px">
                              <center><p>Lunch</p></center>
                            </div>
                            </li>
                        <li>
                        <div>
                           <img src="icon/room-service.png" height="75px" width="75px">
                            <center><p>Dinner</p></center>
                        </div>
                        </li>
                        <li>
                        <div>
                          <img src="icon/minibar.png" height="75px" width="75px">
                          <center><p>Drinks &amp; Nightlife</p></center>
                        </div>
                        </li>
                        <li>
                        <div>
                          <img src="icon/juice.png"  height="75px" width="75px">
                          <center><p>Cafés</p></center>
                        </div>
                        </li>
                        <li>
                        <div>
                          <img src="icon/five-stars.png"  height="75px" width="75px">
                          <center><p> Desserts &amp; Bakes</p></center>
                        </div>
                      </li>
                    </ul>
     </div>
</div>
    <!--login box-->
   <!-- extra login and sign up buttons-->
   <!-- start hotel imp menu -->
<br><br>
 <div class="row">
<div class="container-fluid thumbnail">
   
      <div class="col-sm-3">
        <div class="page-header"><h3>For Foodies</h3></div>
            <ul class="footer-list">
                 <li>Code of Conduct</li>
                  <li>Community</li>
                    <li>Verified Users</li>
                    <li>Blogger Help</li>
                    <li>Developers</li>
                    <li>Mobile Apps</li>
             </ul>
      </div>
      <div class="col-sm-3">
        <div class="page-header"><h3>Notice</h3></div>
        <ul class="footer-list">
          <li>This Site is Made for only </li>
          <li>practise purpose</li>
          <li>we are not Responsible for your Order</li>
        </ul>
      </div>
      <div class="col-sm-3">
        <div class="page-header"><h3>Advertise</h3></div>
        <ul class="footer-list">
         <li></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <div class="page-header"><h3>For Restaurants</h3></div>
        <ul class="footer-list">
         <li><a href="add_hotel.php">Restaurant Login</a></li>
         <li><a href="http://localhost/onlineFood/Delivery">Delivery Login</a></li>
      </div>

    </div>
  </div>
<!-- hotel imp menu upper -->
   
<?php
include('include/footer.php');
?>