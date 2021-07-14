<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
	$dt=$_REQUEST['dt'];
?>

<html>

<head>

<title>my orders</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

td
{
	text-align:center;
	padding:15px;
	font-size:18px;
	border:solid 2px #666666;
}

tr
{
	border:solid 2px #666666;
}

</style>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">MY ORDERS</h2><center><font face="Geneva" size="+2" color="#006600">Here are your previous orders!</font></center></div>

<div style="width:95%; margin:2.5%; ">

<h1><?php echo $dt;  ?></h1>

<?php

	
	
	$select8="select * from orders where user_name='$user_name' and date='$dt'";
	
	$result8=mysqli_query($connect,$select8);	
	
	while($row4=mysqli_fetch_array($result8))
	{

?>
	
<table style="width:100%; border:solid 2px #000;" class="orders">
	
	<tr style="background-color:#CCCCCC; height:80px;">
		<td rowspan="4"><img src="images/<?php echo $row4['image']; ?>" style="height:150px; width:130px;"></td>
		<td colspan="3"><strong><?php echo $row4['dish_name']; ?></strong></td>
	</tr>
	<tr style="background-color:#CCCCCC; height:80px;">
		<td><strong>PRICE</strong></td>
		<td><strong>QUANTITY</strong></td>
		<td><strong>TOTAL</strong></td>
	</tr>
	<tr style="background-color:#CCCCCC; height:80px;">
		<td><strong><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $row4['price']; ?></strong></td>
		<td><strong><?php echo $row4['quantity']; ?></strong></td>
		<td><strong><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $row4['total']; ?></strong></td>
	</tr>
	<tr style="background-color:#999999; height:60px;" class="more">
		<td colspan="3"><strong>More details&nbsp;&nbsp;<i class="fa fa-angle-double-down"></i></strong></td>
	</tr>
	<tr class="display" style="display:none;">
		<td colspan="3"><div><h3>PERSONAL DETAILS</h3><br><label>USER NAME:</label><?php echo $row4['user_name']; ?><br><br><label>NAME:</label><?php echo $row4['name']; ?><br><br><label>MOBILE NUMBER:</label><?php echo $row4['mobile_no']; ?><br><br><label>EMAIL ID:</label><?php echo $row4['email_id']; ?></div></td>
		<td colspan="2"><div><h3>ADDRESS</h3><br><label>FLAT:</label><?php echo $row4['flat']; ?><br><br><label>STREET:</label><?php echo $row4['street']; ?><br><br><label>LANDMARK:</label><?php echo $row4['landmark']; ?><br><br><label>CITY:</label><?php echo $row4['city']; ?><br><br><label>STATE:</label><?php echo $row4['state']; ?><br><br><label>PINCODE:</label><?php echo $row4['pincode']; ?></div></td>
	</tr>
</table>
<br><br>

<?php
	}
?>

</div>

<?php
include('footer.php');
?>

</body>

<script>

$(".more").click(function(){
	$(this).closest('.orders').find('.display').toggle(1000);
})



</script>

</html>