<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);
	$user_id = $_SESSION['ses_user_id'];
	$user_address = $_POST['ress1']." ".$_POST['ress2']." ".$_POST['ress3']." ".$_POST['ress4']." ".$_POST['ress5']." ".$_POST['ress6'];
	$user_number  = $_POST['user_number'];
	$user_date  = $_POST['user_date'];  
	$user_cart_num  = $_POST['user_cart_num'];  
	
	$sql = "UPDATE tbl_simple_user SET user_address='$user_address',
	user_number='$user_number',
	user_date='$user_date',
	user_type='user',
	user_cart_num='$user_cart_num' where user_id='$user_id'";

	$last_id="";
	
	
	if(isset($_FILES["user_card"]))
	{
		$str = $_FILES['user_card']['name'];
		$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
		$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
		$file_name = $str;
		$file_tmp = $_FILES['user_card']['tmp_name'];
		mysqli_query($mysqli, "UPDATE tbl_simple_user SET user_card='$file_name' where user_id='$user_id'");
		move_uploaded_file($file_tmp,"admin/ID_card/".$file_name);
		
	}
	if ($mysqli->query($sql) === TRUE) {
    	$last_id = $mysqli->insert_id;
    	echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'index.php'; ";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "เกิดข้อผิดพลาด".mysqli_errno($mysqli);
		echo "</script>";
	}
	mysqli_close($mysqli);

?>