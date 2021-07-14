<?php

$connect=mysqli_connect("localhost","root","","canteen") or die("server not connected");

$x=$_REQUEST['x'];

$del="delete from cart where cart_id=$x";

$result3=mysqli_query($connect,$del);

header("location:my_cart.php");



?>