<?php

$connect=mysqli_connect("localhost","root","","canteen") or die("server not connected");

if(isset($_SESSION['uname']))
{

	$user_name=$_SESSION['user_name'];
	
	$count=0;
	
	$select1="select count(cart_id) as cnt from cart where user_name='$user_name'";
	
	$result1=mysqli_query($connect,$select1);
	
	while($row3=mysqli_fetch_array($result1))
	{
		$count=$row3['cnt'];
	}
	
}

if(isset($_REQUEST['search']))
{
	$search=$_REQUEST['search_bar'];
	
	header("location:search_page.php?key=".$search);
}

?>
<html>

<head>

<title>Untitled Document</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style>

.jumbotron
{
	font-family:Geneva;
	font-size:48px;
	background-color:#222;
	/*background-color:#000000;*/
}

.menu:hover
{
	color:#222;
}

</style>

</head>

<body>

<div class="jumbotron" style="margin:0;">
	<div class="row" style="text-align:center; color:#FFFFFF;">
		<div class="col-md-2">
			<img src="images/logo1.png" height="100" width="120">
		</div>
		<div class="col-md-8">
		THE ULTIMATE SOULFOOD
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<nav class="navbar navbar-inverse" style="margin:0; border-radius:0;">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
				<span class="glyphicon glyphicon-align-justify" style="color:white; font-size:20px;"></span>
			</button>
		</div>
	</div>
	<div class="collapse navbar-collapse" id="mynavbar">
     	 <ul class="nav navbar-nav">
       	 	<li class="active"><a href="home.php">HOME</a></li>
        		<li class="dropdown">
         			<a class="dropdown-toggle" data-toggle="dropdown" href="#">MENU<span class="caret"></span></a>
          				<ul class="dropdown-menu" style="background-color:#222;">
							<?php
							$category="select * from categories";
							
							$res=mysqli_query($connect,$category);
							
							while($row=mysqli_fetch_array($res))
							//while($row = mysqli_fetch_array( $res,MYSQLI_ASSOC))
							{
								?>
									<li><a href="food_list.php?x=<?php echo $row['id']; ?>&y=<?php echo $row['name']; ?>" style="color:#FFFFFF;"><span class="menu"><?php echo $row['name'];?></span></a></li>
								<?php
    						}
							?>
	      				</ul>	
       		 	</li>
        	<li><a href="order.php">ORDER</a></li>
			<li><a href="about.php">ABOUT</a></li>
			<li><a href="features.php">FEATURES</a></li>
        	<li><a href="contact.php">CONTACT</a></li>
      	</ul>
		<?php
			
			if(isset($_SESSION['uname']))
			{
				?>
					<ul class="nav navbar-nav navbar-right">
						<li><form method="post" style="margin-top:13px;"><input type="text" name="search_bar" placeholder="Search..."><button type="submit" name="search" class="btn" style="border:none; text-decoration:none; border-radius:0;"><i class="fa fa-search"></i></button></form></li>
						<li class="dropdown-toggle"><a href="my_cart.php"><i class='fas fa-shopping-cart' style="font-size:20px;"></i><span class="badge" style="background-color:#FF0000; top:0.2rem; right:-0.1rem; position:absolute;"><?php echo $count;?></span></a></li>
						<li class="dropdown-toggle" data-toggle="dropdown"><a href="#"><img src="images/uploads/<?php echo $_SESSION['photo']; ?>" style="border-radius:50%; height:22.5px;; width:22.5px;;"> Hi! <?php echo $_SESSION['uname'];?></a><span class="caret"></span></li>
						<ul class="dropdown-menu">
							<li><a href="my_profile.php">MY PROFILE</a></li>
							<li><a href="my_orders.php">MY ORDERS</a></li>
							<li><a href="my_bills.php">MY BILLS</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
						  </ul>
					</ul>
				<?php
			}
			else
			{
				?>
					<ul class="nav navbar-nav navbar-right">
					<li><form method="post" style="margin-top:13px;"><div class="input-group"><input type="text" name="search_bar" placeholder="Search..."><button type="submit" name="search" class="btn" style="border:none; text-decoration:none; border-radius:0;"><i class="fa fa-search"></i></button></div></form></li>
						<li data-toggle="modal" data-target="#myModal" style="cursor:pointer;"><a><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li data-toggle="modal" data-target="#myModal2" style="cursor:pointer;"><a><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				<?php
			
			}
			
		?>
     	 
    </div>
  </div>
</nav>

<div id="myModal" class="modal fade" role="dialog" style="margin-top:7%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SIGN UP</h4>
      </div>
	  <?php
	  
	  if(isset($_REQUEST['sign_up']))
	  {
		  
		  $name=$_REQUEST['name'];
		  $mob=$_REQUEST['mob'];
		  $email=$_REQUEST['email'];
		  $dob=$_REQUEST['dob'];
		  $user_name=$_REQUEST['user_name'];
		  $password=$_REQUEST['password'];
		  $cpassword=$_REQUEST['cpassword'];
		  $gender=$_REQUEST['gender'];
		  $doj=date("Y-m-d");
		  
		  $count_user_name=0;
		  $sum=0;
		  
		  $sel3="select count(user_name) as cnt1 from users where user_name='$user_name'";
		  
		  $res4=mysqli_query($connect,$sel3);
		  
		  while($row2=mysqli_fetch_array($res4))
		  {
			  $count_user_name=$row2['cnt1'];
		  }
		  
		  if($count_user_name>0)
		  {
			  ?>
			  <script>
				  alert("USER NAME ALREADY EXISTS!");
			  </script>
			  <?php
		  }
		  else
		  {
			  if($password==$cpassword)
			  {
				  $sum++;
			  }
			  else
			  {
				  ?>
				  <script>
					  alert("PASSWORDS DON'T MATCH!");
				  </script>
				  <?php
			  }
		  }
		  
		  if(strlen($mob)==10)
		  {
			  $sum++;
		  }
		  else
		  {
			  ?>
			  <script>
				  alert("MOBILE NUMBER LENGTH SHOULD BE 10!");
			  </script>
			  <?php
		  }
		  
		  if(!empty($gender))
		  {
			  $sum++;
		  }
		  else
		  {
			  ?>
			  <script>
				  alert("Please select your gender!");
			  </script>
			  <?php
		  }
		  
		  if($sum==3)
		  {
			  $ins="insert into users(name,mobile_no,email_id,dob,user_name,password,gender,date_of_joining) values ('$name','$mob','$email','$dob','$user_name','$password','$gender','$doj')";
			  
			  $res2=mysqli_query($connect,$ins);
			  
			  if($res2)
			  {
				  $_SESSION['name']=$name;
				  $_SESSION['mobile']=$mob;
				  $_SESSION['email']=$email;
				  $_SESSION['user_name']=$user_name;
				  ?>
					  <script>
						  alert("Account created successfully ...");
					  </script>
				  <?php
			  }
			  else
			  {
				  echo mysqli_error($connect);
			  }
		  }
	  }
	  
	?>
      <div class="modal-body form-group">
       <center><form method="post">
	   	<table cellpadding="20">
			<tr>
				<th><label>NAME:</label></th>
				<td><input class="form-control" type="text" name="name" required></td>
			</tr>
			<tr>
				<th><label>MOBILE NUMBER:</label></th>
				<td><input class="form-control" type="tel" name="mob" required></td>
			</tr>
			<tr>
				<th><label>EMAIL ID:</label></th>
				<td><input class="form-control" type="email" name="email" required></td>
			</tr>
			<tr>
				<th><label>DATE OF BIRTH:</label></th>
				<td><input class="form-control" type="date" name="dob" required></td>
			</tr>
			<tr>
				<th><label>USER NAME:</label></th>
				<td><input class="form-control" type="text" name="user_name"></td>
			</tr>
			<tr>
				<th><label>PASSWORD:</label></th>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			<tr>
				<th><label>CONFIRM PASSWORD:</label></th>
				<td><input class="form-control" type="cpassword" name="cpassword"></td>
			</tr>
			<tr>
				<th><label>GENDER:</label></th>
				<td><input type="radio" name="gender" value="male">MALE&nbsp;<input type="radio" name="gender" value="female">FEMALE</td>
			</tr>
		</table>
		<br>
		<button type="submit" class="btn btn-default btn-success" name="sign_up">SIGN UP</button>
	   </form></center>
      </div>

    </div>

  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog" style="margin-top:7%;">
  <div class="modal-dialog">

    <!-- Modal2 content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">LOGIN</h4>
      </div>
	  <?php
	  
	  	if(isset($_REQUEST['login']))
		{
			
			$user_name=$_REQUEST['user_name'];
			$password=$_REQUEST['password'];
			
			$sel="select * from users where user_name='$user_name' and password='$password'";
			
			$res=mysqli_query($connect,$sel);
			
			if($row=mysqli_fetch_array($res))
			{
				$_SESSION['uname']=$row['name'];
				$_SESSION['mobile']=$row['mobile_no'];
				$_SESSION['email']=$row['email_id'];
				$_SESSION['user_name']=$row['user_name'];
				$_SESSION['street']=$row['street'];
				$_SESSION['flat']=$row['flat'];
				$_SESSION['landmark']=$row['landmark'];
				$_SESSION['pincode']=$row['pincode'];
				$_SESSION['city']=$row['city'];
				$_SESSION['state']=$row['state'];
				$_SESSION['photo']=$row['photo'];
				
				?>
				<script>
					window.location.href="home.php";
				</script>
				<?php
			}
			else
			{
				echo "Invalid User name or Password!";
				echo "Please try again!";
			}
		}
		
	  ?>
      <div class="modal-body form-group">
       <center><form method="post">
	   	<table cellpadding="20">
			
			<tr>
				<th><label>USER NAME:</label></th>
				<td><input class="form-control" type="text" name="user_name"></td>
			</tr>
			<tr>
				<th><label>PASSWORD:</label></th>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			
		</table>
		<br>
		<button type="submit" class="btn btn-default btn-success" name="login">LOGIN</button>
	   </form></center>
      </div>

    </div>

  </div>
</div>
</body>

</html>
