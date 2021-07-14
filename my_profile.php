<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
	
?>

<html>

<head>

<title>my profile</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

#table1 th
{
	padding:10px;
	color:#FFFF00;
	padding-left:30px;
	padding-top:15px;
	padding-bottom:15px;
}

#table1 td
{
	padding:10px;
	color:#FFFF99;
	padding-top:15px;
	padding-bottom:15px;
	padding-left:30px;
	
}

.r1
{
	background-color:#333333;
}

.r2
{
	background-color:#666666;
}

.button 
{
	background-color: #4CAF50; 
	border: none;
	color: white;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	transition-duration: 0.4s;
	cursor: pointer;
}

.button2 
{
 	background-color: white; 
 	color:#666666; 
 	border: 2px solid #00FFCC;
}

.button2:hover 
{
 	background-color: #00FFCC;
 	color: white;
}

.change_photo
{
	height:40px;
	width:60%;
	background-color:#333333;
	overflow:hidden;
	position:relative;
	color:#6699CC;
	padding-top:10px;
}

.change_photo span input
{
	opacity:0;
	top:-2;
	position:absolute;
}

#save
{
	height:40px;
	width:30%;
	background-color:#6699CC;
	color:#333333;
}
</style>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">MY PROFILE</h2><center><font face="Geneva" size="+2" color="#006600">Your profile looks good!</font></center></div>

<?php 

	$select5="select * from users where user_name='$user_name'";
	
	$result5=mysqli_query($connect,$select5);
	
	$row5=mysqli_fetch_array($result5);
	
	$img_type="";
	
	if(isset($_REQUEST['save_photo']))
	{
		$img_name=$_FILES['image']['name'];
		$img_temp_name=$_FILES['image']['tmp_name'];
		$img_size=$_FILES['image']['size'];
		$img_type=$_FILES['image']['type'];
		
				
		if(move_uploaded_file($img_temp_name,"images/uploads/".$img_name))
		{
			$_SESSION['photo']=$img_name;	
			$update="update users set photo='$img_name' where user_name='$user_name'";
			$result6=mysqli_query($connect,$update);
			?>
			<script>
				alert("Uploaded Successfully!");
				window.location.href="my_profile.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>alert("Failed to upload!!\nPlease try again");</script>
			<?php
		}
			
	}

	if(isset($_REQUEST['edit_profile']))
	{
	
		$flat=$_REQUEST['flat'];
		$street=$_REQUEST['street'];
		$landmark=$_REQUEST['landmark'];
		$city=$_REQUEST['city'];
		$state=$_REQUEST['state'];
		$pincode=$_REQUEST['pincode'];
		$dob=$_REQUEST['dob'];
		$name=$_REQUEST['name'];
		$gender=$_REQUEST['gender'];
		
		$update6="update users set name='$name',dob='$dob',gender='$gender',flat='$flat',street='$street',landmark='$landmark',city='$city',state='$state',pincode='$pincode' where user_name='$user_name'";
				
		$result6=mysqli_query($connect,$update6);
		
		if($result6)
		{
					
			?>
			<script>
			alert("Your profile has successfully changed!");
			window.location.href="my_profile.php";
			</script>
			<?php
		}
		else
		{
			echo mysqli_error($connect);
		}
	}
?>

<div style="margin-bottom:2.5%;" class="container">
	<div class="row">
		<div class="col-md-4" style="float:left;">
			<div class="profile_img" style="background-color:#999999;">
				<center><img src="images/uploads/<?php echo $row5['photo']; ?>" style="border-radius:50%; margin:20px 0px; height:225px; width:225px;"></center>
				<center><form method="post" enctype="multipart/form-data"><label class="change_photo" name="change_photo">SELECT PHOTO TO CHANGE<br><span><input type="file" name="image"></span></label><br><button type="submit" name="save_photo" class="btn btn-primary" id="save">CHANGE</button></form></center>
				<center><p style="font-size:24px;"><?php echo $row5['name']; ?></p><p style="font-size:24px;">+91&nbsp;<?php echo $row5['mobile_no']; ?></p></center>
			</div>
			<div style="background-color:#666666; padding:75px 0px;">
				<h4 style="text-align:center; color:#FFFFFF;">Want to edit your details?</h4>
				<center><button class="button button2" name="edit_details" data-toggle="modal" data-target="#myModal3"><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Here you go&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></button></center>
			</div>
		</div>
		
		<div id="myModal3" class="modal fade" role="dialog" style="margin-top:7%;">
  			<div class="modal-dialog">

    			<!-- Modal content-->
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h4 class="modal-title" style="text-align:center;">EDIT YOUR PROFILE</h4>
      				</div>
	  				<div class="modal-body form-group">
						<center>
						<form method="post" style="color:#000066;">
							<table cellpadding="20">
								<tr>
									<th><label>NAME:</label></th>
									<td><input class="form-control" type="text" name="name" value="<?php echo $row5['name']; ?>"></td>
								</tr>
								<tr>
									<th><label>USER NAME:</label></th>
									<td><input class="form-control" type="text" name="user_name" value="<?php echo $row5['user_name']; ?>" readonly=""></td>
								</tr>
								<tr>
									<th><label>MOBILE NUMBER:</label></th>
									<td><input class="form-control" type="tel" name="mob" value="<?php echo $row5['mobile_no']; ?>" readonly=""></td>
								</tr>
								<tr>
									<th><label>EMAIL ID:</label></th>
									<td><input class="form-control" type="email" name="email" value="<?php echo $row5['email_id']; ?>" readonly=""></td>
								</tr>
								<tr>
									<th><label>DATE OF BIRTH:</label></th>
									<td><input class="form-control" type="date" name="dob" value="<?php echo $row5['dob']; ?>"></td>
								</tr>
								<?php
								if($row5['gender']=='male')
								{
								?>
								<tr>
									<th><label>GENDER:</label></th>
									<td><input type="radio" name="gender" value="male" checked="checked">MALE&nbsp;<input type="radio" name="gender" value="female">FEMALE</td>
								</tr>
								<?php
								}
								else if($row5['gender']=='female')
								{
								?>
								<tr>
									<th><label>GENDER:</label></th>
									<td><input type="radio" name="gender" value="male">MALE&nbsp;<input type="radio" name="gender" value="female" checked="checked">FEMALE</td>
								</tr>
								<?php
								}
								?>
								<tr>
									<th><label>STREET:</label></th>
									<td><input class="form-control" type="text" name="street" value=" <?php echo $row5['street']; ?>"></td>
								</tr>
								<tr>
									<th><label>FLAT:</label></th>
									<td><input class="form-control" type="text" name="flat" value=" <?php echo $row5['flat']; ?>"></td>
								</tr>
								<tr>
									<th><label>LANDMARK:</label></th>
									<td><input class="form-control" type="text" name="landmark" value=" <?php echo $row5['landmark']; ?>"></td>
								</tr>
								<tr>
									<th><label>STREET:</label></th>
									<td><input class="form-control" type="text" name="city" value=" <?php echo $row5['city']; ?>"></td>
								</tr>
								<tr>
									<th><label>STATE:</label></th>
									<td><input class="form-control" type="text" name="state" value=" <?php echo $row5['state']; ?>"></td>
								</tr>
								<tr>
									<th><label>PINCODE:</label></th>
									<td><input class="form-control" type="tel" name="pincode" value=" <?php echo $row5['pincode']; ?>" maxlength="6"></td>
								</tr>
							</table>
							<br>
							<button type="submit" class="btn btn-default btn-success" name="edit_profile">SAVE CHANGES</button>
						</form>
						</center>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-8" style="float:left; background-color:#CCCCCC;">
			<center><div style="text-align:center; width:80%;">
				<h2>Hi! <?php echo $row5['name']; ?></h2>
				<h3>Here you can see your profile!</h3>
			</div></center>
			<div>
				<center><table width="60%" style="padding:25px; margin-bottom:20px; margin-top:20px;" id="table1">
					<tr class="r1">
						<th>NAME</th>
						<td><?php echo $row5['name']; ?></td>
					</tr>
					<tr class="r2">
						<th>USER NAME</th>
						<td><?php echo $row5['user_name']; ?></td>
					</tr>
					<tr class="r1">
						<th>MOBILE NUMBER</th>
						<td><?php echo $row5['mobile_no']; ?></td>
					</tr>
					<tr class="r2">
						<th>EMAIL ID</th>
						<td><?php echo $row5['email_id']; ?></td>
					</tr>
					<tr class="r1">
						<th>DATE OF BIRTH</th>
						<td><?php $d1=date_create($row5['dob']); echo date_format($d1,"d-m-Y"); ?></td>
					</tr>
					<tr class="r2">
						<th>GENDER</th>
						<td><?php echo $row5['gender']; ?></td>
					</tr>
					<tr class="r1">
						<th>STREET</th>
						<td><?php echo $row5['street']; ?></td>
					</tr>
					<tr class="r2">
						<th>FLAT</th>
						<td><?php echo $row5['flat']; ?></td>
					</tr>
					<tr class="r1">
						<th>LANDMARK</th>
						<td><?php echo $row5['landmark']; ?></td>
					</tr>
					<tr class="r2">
						<th>CITY</th>
						<td><?php echo $row5['city']; ?></td>
					</tr>
					<tr class="r1">
						<th>STATE</th>
						<td><?php echo $row5['state']; ?></td>
					</tr>
					<tr class="r2">
						<th>PINCODE</th>
						<td><?php echo $row5['pincode']; ?></td>
					</tr>
				</table></center>
			</div>
		</div>
	</div>
</div>

<?php
include('footer.php');
?>

</body>

</html>