<?php

session_start();


?>

<html>

<head>

<title>MY CART</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</head>

<body style="background-color:#111;">

<?php
include('header.php');

if(!isset($_SESSION['uname']))
{
	?>
		<script>
		alert("Please login to continue");
		window.history.back();
		</script>
	<?php
}

else
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

$user_name=$_SESSION['user_name'];

$ins3="insert into cart(user_name,dish_name,price,image) values ('$user_name','$dish_name','$dish_price','$dish_image')";

$res4=mysqli_query($connect,$ins3);

if($res4)
{
	?>
	<script>
	
	alert("Item added to cart");
	window.history.back();
	
	</script>
	<?php
}
}

?>



<?php
include('footer.php');
?>

</body>

</html>
