<?php
	
	$connect=mysqli_connect("localhost","root","","canteen") or die("srever not connected");
	session_start();
	$user_name=$_SESSION['uname'];
?>

<html>

<head>

<title>my cart</title>

<link rel="stylesheet" type="text/css" href="files/bootstrap-3.3.7/dist/css/bootstrap.min.css">

<script src="files/JQUERY.js"></script>

<script src="files/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>

th
{
	text-align:center;
	font-family:Georgia;
	font-size:20px;
	padding:15px;
}

td
{
	text-align:center;
	padding:15px;
	font-size:18px;
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

<div style="width:95%; height:150px; background-color:#999999; color:#000; margin:2.5%; padding:15px;"><h2 style="text-align:center; font-family:Georgia;">MY CART</h2><center><font face="Geneva" size="+2" color="#006600">For your Hunger, you can always rely on us!</font></center></div>



<?php 

if($count==0)
{
	?>
	
	<div style="margin:2.5%; text-align:center; color:#FF9933;"><h1>Your cart is empty!</h1></div>
	
	<?php
}
else
{
?>

<div style="width:95%; background-color:#CCCCCC; margin:2.5%; ">

<form>

<table style="width:100%;">
	<tr style="background-color:#999999; height:100px;">
		<th colspan="2" style="text-align:left">PRODUCT</th>
		<th>PRICE</th>
		<th>QUANTITY</th>
		<th>SUBTOTAL</th>
		<th>REMOVE</th>
	</tr>

<?php
	
	$select="select * from cart where user_name='$user_name'";
	
	$result=mysqli_query($connect,$select);
	
	$total=0;
	
	$i=0;
	
	while($row2=mysqli_fetch_array($result))
	{
		$_SESSION['dname'][$i]=$row2['dish_name'];
		$_SESSION['dprice'][$i]=$row2['price'];
		$_SESSION['dimage'][$i]=$row2['image'];
	
		$i++;
		
?>
	
	<tr class="data">
		<td><img src="images/<?php echo $row2['image']; ?>" style="height:150px; width:130px;"></td>
		<td><strong><?php echo $row2['dish_name']; ?></strong></td>
		<td><strong><i class="fa fa-rupee"></i>&nbsp;<span class="price"><?php echo $row2['price']; ?></span></strong></td>
		<td class="qty"><button type="button" class="minus">-</button>&nbsp;&nbsp;<input type="tel" value="1" max="10" min="1" size="3" style="text-align:center;" id="qty" class="q">&nbsp;&nbsp;<button type="button" class="plus">+</button></td>
		<td><i class="fa fa-rupee"></i>&nbsp;<input type="tel" size="4" readonly="" style="text-align:center;" id="sub_total" value="<?php echo $row2['price']; ?>"></td>
		<td><a href="remove.php?x=<?php echo $row2['cart_id'];?>"><button type="button" id="remove">Remove</button></a></td>
	</tr>
	
	
		
		<?php
		
			$total=$total+$row2['price'];
		
		}
		?>
		<input type="hidden" id="quantity" value="<?php echo $i; ?>">
		
	<tfoot style="background-color:#999999;">
		<td colspan="4" style="text-align:right;"><strong>TOTAL:</strong></td>
		<td colspan="2" style="text-align:left;"><i class="fa fa-rupee"></i>&nbsp;<input type="tel" readonly="" style="text-align:center;" id="total" value="<?php echo $total;?>"></td>
	</tfoot>
	
</table>

</div>


<center><button class="btn btn-success" style="text-align:center;" type="button" id="checkout">PROCEED TO CHECKOUT&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button></center>

<br><br>

</form>		



<?php

}

include('footer.php');
?>

<script>
	
	var x,y,z,total,quantity_array=[],pos,len=$("#quantity").val();
	
	for(var i=0;i<len;i++)
	{
		quantity_array[i]=1;
	}
	
	$('.minus').click(function(){
		x=$(this).closest('.qty').find('#qty').val();
		y=parseInt($(this).closest('.data').find('.price').text());
		total=parseInt($('#total').val());
		if(x>0)
		{
			x--;
			$(this).closest('.qty').find('#qty').val(x);
			z=x*y;
			$(this).closest('.data').find('#sub_total').val(z);
			total=total-y;
			$('#total').val(total);
			pos=$(".minus").index(this);
			quantity_array[pos]=x;
		}
	})
	
	$('.plus').click(function(){
		x=$(this).closest('.qty').find('#qty').val();
		y=parseInt($(this).closest('.data').find('.price').text());
		total=parseInt($('#total').val());
		if(x<10)
		{
			x++;
			$(this).closest('.qty').find('#qty').val(x);
			z=x*y;
			$(this).closest('.data').find('#sub_total').val(z);
			total=total+y;
			$('#total').val(total);
			pos=$(".plus").index(this);
			quantity_array[pos]=x;
		}
	})
	
	$('#checkout').click(function(){
		window.location.href="buy_now.php?y="+quantity_array;
	})
</script>

</body>

</html>
