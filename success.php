<?php

session_start();

?>

<html>

<head>

<title>north indian</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</head>

<body style="background-color:#111;">

<?php
include('header.php');
?>

<div class="row" style="height:300px; text-align:center; color:#009900; padding:50px;">
	<h2>YOUR ORDER HAS BEEN PLACED SUCCESSFULLY!!</h2>
	<h3><a href="home.php">WANT TO ORDER MORE?</a></h3>
</div>

<?php
include('footer.php');
?>
</body>

</html>