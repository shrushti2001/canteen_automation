<?php
	
	$connect=mysqli_connect("localhost","root","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
	?>
	
	<html>
	
	<head>
	<title></title>
	</head>
	<body>
	
	<?php
	
	$select8="select date,sum(total) as payment from orders where user_name='$user_name' group by date";
	
	$result8=mysqli_query($connect,$select8);
	
	while($row8=mysqli_fetch_array($result8))
	{
		echo $row8['date'];
		echo "=>";
		echo $row8['payment'];
		echo "<br>";
	}
?>

	</body>
	</html>