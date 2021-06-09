<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);
	$user_id = $_POST['user_id'];
	$user_credit=$_POST['user_credit'];
	
	
	$sql = "UPDATE tbl_simple_user SET user_credit='$user_credit' where user_id='$user_id'";

	
	if ($mysqli->query($sql) === TRUE) {
    	$last_id = $mysqli->insert_id;
    	echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'add_credit.php'; ";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "เกิดข้อผิดพลาด".mysqli_errno($mysqli);
		echo "</script>";
	}
	mysqli_close($mysqli);

?>