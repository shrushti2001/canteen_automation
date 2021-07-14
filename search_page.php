<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	
	$key=$_REQUEST['key'];
	$select7="select * from dishes where dish_name like '%$key%'";
	
	$result7=mysqli_query($connect,$select7);
	
?>

<html>

<head>

<title>my profile</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="food_list.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>
<div class="row" style="font-size:28px; color:#33FFFF; text-align:center; margin-top:20px;">YOUR SEARCH RESULT IS HERE!</div>

<div class="row" style="margin-bottom:20px;">

<?php 

while($row7=mysqli_fetch_array($result7))
{
	?>
		<div class="col-md-3" align="center">
		<div class="card">
			<span style="background-image:url(images/<?php echo $row7['image']; ?>);"></span>
			<span style="background-image:url(images/<?php echo $row7['image']; ?>);"></span>
			<span style="background-image:url(images/<?php echo $row7['image']; ?>);"></span>
			<span style="background-image:url(images/<?php echo $row7['image']; ?>);"></span>
			<div class="content">
				<h2>Description</h2>
				<p><?php echo $row7['description']; ?></p>
			</div>
		</div>
		<div style="color:#FFFF66; padding:5px;"><?php echo $row7['dish_name']; ?><br></div>
		<div style="color:#00FF66; padding:5px;"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $row7['price']; ?><br></div>
		<div style="padding:5px;"><a href="buy_now.php?x=<?php echo $row7['dish_id'];?> "><button class="btn btn-primary" style="border-radius:0; width:100px;">buy now</button></a>&nbsp;&nbsp;&nbsp;<a href="cart.php?x=<?php echo $row7['dish_id'];?> "><button class="btn btn-warning" style="border-radius:0; width:100px;">add to cart</button></a></div>
	</div>
	<?php
}
?>
</div>

<?php
include('footer.php');
?>

</body>

</html>