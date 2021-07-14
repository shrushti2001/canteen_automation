<?php

session_start();

if(!isset($_SESSION['uname']))
{
	?>
		<script>
		alert("Please login to continue");
		window.history.back();
		</script>
	<?php
}

?>
<html>

<head>

<title>Buy now</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

td
{
	padding:5px;
}

th
{
	padding:5px;
	color:#FFFFFF;
}

</style>

</head>

<body style="background-color:#111;">
<?php
include('header.php');

if(isset($_REQUEST['x']))
{
	
	$did=$_REQUEST['x'];
	
	$sel1= " select * from dishes where dish_id='$did'";
	
	$res3=mysqli_query($connect,$sel1);
	
	while($row3=mysqli_fetch_array($res3))
	{
		$dish_name=$row3['dish_name'];
		$dish_image=$row3['image'];
		$dish_price=$row3['price'];
	}
}


?>


    
 <div>
	  <?php
		
		if(isset($_REQUEST['place_order']))
		{
			$flat=$_REQUEST['flat'];
			$street=$_REQUEST['street'];
			$landmark=$_REQUEST['landmark'];
			$city=$_REQUEST['city'];
			$state=$_REQUEST['state'];
			$pincode=$_REQUEST['pincode'];
			$order_date=date("Y-m-d");
			$name=$_REQUEST['name'];
			$user_name=$_REQUEST['user_name'];
			$mobile=$_REQUEST['mobile_number'];
			$email=$_REQUEST['email'];
			
			
			
			
			if(isset($_REQUEST['save']))
			{
			
				$upd="update users set flat='$flat',street='$street',landmark='$landmark',city='$city',state='$state',pincode='$pincode' where user_name='$user_name'";
				
				$res2=mysqli_query($connect,$upd);
				
				if($res2)
				{
					$_SESSION['street']=$street;
					$_SESSION['flat']=$flat;
					$_SESSION['landmark']=$landmark;
					$_SESSION['pincode']=$pincode;
					$_SESSION['city']=$city;
					$_SESSION['state']=$state;
					
					?>
					<script>
					alert("Address Saved");
					</script>
					<?php
				}
				else
				{
					echo mysqli_error($connect);
				}
				
			}
			if(isset($_REQUEST['x']))
			{
				$qty=$_REQUEST['qty'];
				$total=$dish_price*$qty;
				
				$ins2="insert into orders(date,name,mobile_no,email_id,flat,street,landmark,city,state,pincode,user_name,dish_name,image,price,quantity,total) values ('$order_date','$name','$mobile','$email','$flat','$street','$landmark','$city','$state','$pincode','$user_name','$dish_name','$dish_image','$dish_price','$qty','$total')";
			
				$res2=mysqli_query($connect,$ins2);
			}
			else
			{
				$len=strlen($_REQUEST['y']);
				$z=0;
				for($i=0;$i<$len;$i=$i+2)
				{
					$dish_name=$_SESSION['dname'][$z];
					$dish_image=$_SESSION['dimage'][$z];
					$dish_price=$_SESSION['dprice'][$z];
					$qty=$_REQUEST['y'][$i];
					$z++;
					$total=$dish_price*$qty;
					
					$ins2="insert into orders(date,name,mobile_no,email_id,flat,street,landmark,city,state,pincode,user_name,dish_name,image,price,quantity,total) values ('$order_date','$name','$mobile','$email','$flat','$street','$landmark','$city','$state','$pincode','$user_name','$dish_name','$dish_image','$dish_price','$qty','$total')";
			
					$res2=mysqli_query($connect,$ins2);
			
				}
				
				$delete="delete from cart where user_name='$user_name'";
				
				$result4=mysqli_query($connect,$delete);
			}
			
			
			
			if($res2)
			{
				?>
				<script>window.location.href="success.php";</script>
				<?php
			}
			else
			{
				echo mysqli_error($connect);
			}
		}
		
	?>
       <center><form method="post">
	   
	   <br><br>
	   
	   <?php 
	   
	   if(isset($_REQUEST['x']))
	   {
	   ?>
	   
	   <img src="images/<?php echo $dish_image; ?>" height="200" width="200" style="padding-bottom:20px;">
	   
	   <br>
	   
	   <strong><label style="color:#CCFFCC; font-size:24px;"><?php echo $dish_name; ?></label></strong>
	   <strong><label style="color:#CCFFCC; font-size:24px;">(<i class="fa fa-rupee"></i><?php echo $dish_price; ?>)</label></strong><br>
	   <label style="color:#CCFFCC; font-size:18px;">QUANTITY:</label><input type="number" name="qty" class="qty" value="1" min="1" max="10" style="width:50px;">
	   <?php
	   }
	   ?>
	   <h1 style="color:#CCFF00;">DETAILS</h1>
	   	<table cellpadding="20">
			<tr>
				<th><label>NAME:</label></th>
				<td><input class="form-control" type="text" name="name" value="<?php echo $_SESSION['uname'];?> "></td>
			</tr>
			<tr>
				<th><label>USER NAME:</label></th>
				<td><input class="form-control" type="text" name="user_name" readonly="" value="<?php echo $_SESSION['user_name'];?> "></td>
			</tr>
			<tr>
				<th><label>MOBILE NUMBER:</label></th>
				<td><input class="form-control" type="tel" name="mobile_number" value="<?php echo $_SESSION['mobile'];?> "></td>
			</tr>
			<tr>
				<th><label>EMAIL ADDRESS:</label></th>
				<td><input class="form-control" type="email" name="email" readonly="" value="<?php echo $_SESSION['email'];?> "></td>
			</tr>
			<tr>
				<th><label>FLAT:</label></th>
				<td><input class="form-control" type="text" name="flat" value="<?php echo $_SESSION['flat'];?>"></td>
			</tr>
			<tr>
				<th><label>STREET:</label></th>
				<td><input class="form-control" type="text" name="street"value="<?php echo $_SESSION['street'];?>"></td>
			</tr>
			<tr>
				<th><label>LANDMARK:</label></th>
				<td><input class="form-control" type="text" name="landmark"value="<?php echo $_SESSION['landmark'];?>"></td>
			</tr>
			<tr>
				<th><label>CITY:</label></th>
				<td><input class="form-control" type="text" name="city" value="<?php echo $_SESSION['city'];?>"></td>
			</tr>
			<tr>
				<th><label>STATE:</label></th>
				<td><input class="form-control" type="text" name="state" value="<?php echo $_SESSION['state'];?>"></td>
			</tr>
			<tr>
				<th><label>PINCODE:</label></th>
				<td><input class="form-control" type="number" name="pincode" maxlength="6" value="<?php echo $_SESSION['pincode'];?>"></td>
			</tr>
		</table>
		<br>
		<input type="checkbox" value="save" name="save">&nbsp;&nbsp;<label style="color:#FFFFFF;">Save address for further orders...</label><br>
		<button type="submit" class="btn btn-default btn-success" name="place_order" style="margin:10px;">PLACE ORDER</button>
	   </form></center>
      </div>

    </div>

  </div>
</div>


<?php
include('footer.php');
?>
</body>

</html>