<?php
include 'config_db.php';
if (isset($_POST['muad_name'])) {
	$muad_name = $_POST['muad_name'];
	mysqli_query($mysqli, "INSERT INTO tb_muad(muad_name) VALUES('$muad_name')");
}
?>
<script type='text/javascript'>
	window.location = 'product_add.php';
</script>
<?php

?>