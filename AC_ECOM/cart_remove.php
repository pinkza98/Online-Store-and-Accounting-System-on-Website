<?php
include 'config_db.php';

$cart_id = $_GET['cart_id'];

mysqli_query($mysqli, "DELETE FROM tb_cart WHERE cart_id='$cart_id'");
?>
<script>
	javascript:history.go(-1);
</script>