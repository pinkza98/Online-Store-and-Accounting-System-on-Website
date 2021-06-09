<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	$CR_ID = $_POST['CR_ID'];
	$CR_ID_old = $_POST['CR_ID_old'];
	$CR_Model  = $_POST['CR_Model'];
	$CR_NAME  = $_POST['CR_NAME'];  
	$CRD_NAME = $_POST['CRD_NAME'];  
	$CR_Type  = $_POST['CR_Type'];
	$CR_Address = $_POST['CR_Address'];
	$CR_Namemr = $_POST['CR_Namemr'];


	$sql = "UPDATE tb_commerce SET 
		CR_ID='$CR_ID',
		CR_Model='$CR_Model',
		CR_NAME='$CR_NAME',
		CRD_NAME='$CRD_NAME',
		CR_Type='$CR_Type',
		CR_Address='$CR_Address',
		CR_Namemr='$CR_Namemr' WHERE CR_ID='$CR_ID_old'";

	if (!empty( $_FILES["CR_Image"]["name"])) 
	{
	    mysqli_query($mysqli, "UPDATE tb_commerce SET CR_Image='".$_FILES['CR_Image']['name']."' WHERE CR_ID='$CR_ID_old'");
		move_uploaded_file($_FILES['CR_Image']['tmp_name'],"img_commerce/".$_FILES['CR_Image']['name']);
	}


	if ($mysqli->query($sql) === TRUE) {
    	$last_id = $mysqli->insert_id;
    	echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'commerce.php'; ";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลไม่สำเร็จ');";
		echo "เกิดข้อผิดพลาด".mysqli_errno($mysqli);
		echo "</script>";
	}
	
	mysqli_close($mysqli);

?>