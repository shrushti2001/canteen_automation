<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
?>
<html>

<head>

<title>about</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>
  .aboutpg {
    background-color: #333;
    color: #fff;
    padding: 100px 25px;
  }
  .bg-grey {
    background-color: #E5E5E5;
    
  }
  .content-fluid {
    padding: 60px 50px;
  }
  .logo-small {
    color: #f4511e;
    font-size: 35px;
  }
  .logo {
    color: #f4511e;
    font-size: 350px;
  }
  @media screen and (max-width: 668px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>
</head>

<body>

<?php
include('header.php');
?>
<div class="aboutpg text-center">
  <h1>Company</h1> 
  <p>Stay tuned for amazing updates !!</p> 
  <form class="form-inline">
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
</div>


<div class="content-fluid ">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Us</h2>
      <h4 style="font-size:19px;font-family:Geneva;">We the members of The Ultimate Soulfood have taken a pledge to provide the customers with best quality food. We are here to satisfy their needs and taste.</h4>      
      <p style="font-size:19px;font-family:Geneva;">The users have to book their food on the e-menu card. As soon as they book their food the order will be sent to the chef for preparing it. The present system consists of the manual system that involves the paper work of the billing system and maintaining the files too. The users will have the username and the password through which they can book. This will help in demonstrating the route from adapting materials to developing an online environment. 
      This brings all necessities in one place that benefits both the user and the canteen owner smartly..</p><br>
      <button class="btn btn-default btn-lg">Get in Touch</button>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>
  </div>
</div>


<div class="container-fluid text-center bg-grey">
  <h2>OUR VALUES</h2>
  <br>
  <div class="row">
    <div class="col-sm-6">
      <span class="glyphicon glyphicon-star logo-small"></span>
      <h4 style="font-size:20px;"><b>MISSION</b></h4>
      <p style="font-size:17px;">We aim to provide best products to our customers <br>and help them in every possible way</p>
    </div>
    <div class="col-sm-6">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4 style="font-size:20px;"><b>ESSENCE</b></h4>

      <p style="font-size:17px;">At our core The Ultimate Soulfood operates on imagination ,<br> individuality, inclusively and impact </p>
    </div>
    
  </div>
  <br><br>
  <div class="row">
    <div class="col-sm-6">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4 style="font-size:20px;"><b>PROMISE</b></h4>
      <p style="font-size:17px;">We deliver optimistic and diverse storytelling, <br>experiences and points of view to our audience.</p>
    </div>
    <div class="col-sm-6">
      <span class="glyphicon glyphicon-flash logo-small"></span>
      <h4 style="font-size:20px;"><b>VIBE</b></h4>
      <p style="font-size:17px;">Here we make magic.We dream it, and then <br> do it-together-every day reinventing what's possible</p>
    </div>
  </div>
  <br><br>
</div>



<?php
include('footer.php');
?>
</body>

</html>