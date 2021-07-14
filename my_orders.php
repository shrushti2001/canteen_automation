<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
	
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

<?php

	$select4="select date,sum(total) as payment from orders where user_name='$user_name' group by date desc";
	
	$result4=mysqli_query($connect,$select4);	
	
	while($row4=mysqli_fetch_array($result4))
	//while($row = mysqli_fetch_array( $result4,MYSQLI_ASSOC))
	{

?>
	
<table style="width:100%; border:solid 2px #000;" class="orders">
	<tr style="background-color:#CCCCCC; height:80px;">
		<td rowspan="4"><strong><?php $d=date_create($row4['date']); echo date_format($d,"d-m-Y");  ?></strong></td>
		<td rowspan="4">TOTAL PAYMENT</td>
		<td colspan="3"><strong><?php echo $row4['payment'];?></strong></td>
		<td><a href="my_orders_2.php?dt=<?php echo $row4['date']; ?>"><button>VIEW DETAILS</button></a></td>
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