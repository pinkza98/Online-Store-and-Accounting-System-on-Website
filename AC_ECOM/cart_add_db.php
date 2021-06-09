<?php
include 'config_db.php';

$cart_quantity = $_POST['cart_quantity'];
$P_Sell_ID = $_POST['P_Sell_ID'];
$user_id = $_SESSION['ses_user_id'];

$product = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
$P_Quantity = $product['P_Quantity'];
if($cart_quantity > $P_Quantity){
	?>
	<script>
		alert('จำนวนสินค้าไม่เพียงพอ!');
		javascript:history.go(-1);
	</script>
	<?php
}
else{
	mysqli_query($mysqli, "INSERT INTO tb_cart(cart_quantity,P_Sell_ID,user_id) VALUES('$cart_quantity','$P_Sell_ID','$user_id')");
	?><script>window.location = 'cart.php';</script><?php
}

?>
