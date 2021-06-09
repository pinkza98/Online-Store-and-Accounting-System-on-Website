<?php
include 'config_db.php';
if (isset($_POST['acc_id'])) {
	$acc_id = $_POST['acc_id'];
	$acc_name = $_POST['acc_name'];
	mysqli_query($mysqli, "INSERT INTO tb_acc(acc_id,acc_name) VALUES('$acc_id','$acc_name')");
}
?>
<script type='text/javascript'>
	window.location = 'account_D_add.php';
</script>
<?php

?>