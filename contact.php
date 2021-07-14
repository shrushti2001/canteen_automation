<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
?>
<html>

<head>

<title>contact</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
<style>
.contact-section{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact-info{
  color: #fff;
  max-width: 500px;
  line-height: 65px;
  padding-left: 50px;
  font-size: 18px;
}

.contact-info i{
  margin-right: 20px;
  font-size: 25px;
}

.contact-form{
  max-width: 700px;
  margin-right: 50px;
}

.contact-info, .contact-form{
  flex: 1;
}

.contact-form h2{
  color: #ffff00;
  text-align: center;
  font-size: 35px;
  text-transform: uppercase;
  margin-bottom: 30px;
}

.contact-form .text-box{
  background: #000;
  color: #fff;
  border: none;
  width: calc(50% - 10px);
  height: 50px;
  padding: 12px;
  font-size: 15px;
  border-radius: 5px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  opacity: 0.9;
}

.contact-form .text-box:first-child{
  margin-right: 15px;
}
.contact-form .send-btn{
  float: right;
  background: #2E94E3;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}

.contact-form .send-btn:hover{
  background: #0582E3;
}
.contact-form textarea{
  background: #000;
  color: #fff;
  border: none;
  width: 100%;
  padding: 12px;
  font-size: 15px;
  min-height: 200px;
  max-height: 400px;
  resize: vertical;
  border-radius: 5px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  opacity: 0.9;
}
</style>


</head>

<body style="background: url(images/xyz.jpg) no-repeat;background-size: cover;">

<?php
include('header.php');
?>
<div class="contact-section">
      <div class="contact-info"><br>
        <div><i class="fas fa-map-marker-alt"></i>Chennai , India</div>
        <div><i class="fas fa-envelope"></i>ultimatesoulfood@gmail.com</div>
        <div><i class="fas fa-phone"></i>9103836271/8593082120</div>
        <div><i class="fas fa-clock"></i>Mon - Sat 8:00 AM to 6:00 PM</div>
      </div>
      <div class="contact-form">
        <h2><br>For Any Queries Contact Us</h2>
        <form class="contact" action="" method="post">
        <input type="text" name="name" class="text-box" placeholder="Your Name" required>
        <input type="email" name="email" class="text-box" placeholder="Your Email" required>
        <textarea name="msg" placeholder="Please enter your message here ....." required></textarea>
        <input type="submit" name="submit" class="send-btn" value="Send"><br>
        </form><br>
      </div>
    </div><br><br>
<?php
include('footer.php');
?>
</body>

</html>