<meta charset="utf-8">
<?php
	include 'config_db.php';

	ini_set('display_errors', 1);
	error_reporting(~0);

	$CR_ID = $_POST['CR_ID'];
	$CR_Model  = $_POST['CR_Model'];
	$CR_NAME  = $_POST['CR_NAME'];  
	$CRD_NAME = $_POST['CRD_NAME'];  
	$CR_Type  = $_POST['CR_Type'];
	$CR_Address = $_POST['CR_Address'];
	$CR_Namemr = $_POST['CR_Namemr'];

	$sql = "INSERT INTO tb_commerce (CR_ID,
	CR_Model,
	CR_NAME,
	CRD_NAME,
	CR_Type,
	CR_Address,
	CR_Namemr,
	user_id) 
	VALUES ('$CR_ID',
	'$CR_Model',
	'$CR_NAME',
	'$CRD_NAME',
	'$CR_Type',
	'$CR_Address',
	'$CR_Namemr',
	'".$_SESSION['ses_user_id']."')";
	
	if(isset($_FILES["CR_Image"]))
	{
		$str = $_FILES['CR_Image']['name'];
		$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
		$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
		$file_name = $str;
		$file_tmp = $_FILES['CR_Image']['tmp_name'];
		mysqli_query($mysqli, "UPDATE tb_commerce SET CR_Image='$file_name'");
		move_uploaded_file($file_tmp,"img_commerce/".$file_name);
		
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