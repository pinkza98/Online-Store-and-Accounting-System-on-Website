<?php
include 'config_db.php';
if (isset($_POST['muad_id']) && isset($_POST['moo_name'])) {
	$moo_name = $_POST['moo_name'];
	$muad_id = $_POST['muad_id'];
	mysqli_query($mysqli, "INSERT INTO tb_moo(moo_name,muad_id) VALUES('$moo_name','$muad_id')");
}

?>
<script type='text/javascript'>
	window.location = 'product_add.php';
</script>
<?php

?>