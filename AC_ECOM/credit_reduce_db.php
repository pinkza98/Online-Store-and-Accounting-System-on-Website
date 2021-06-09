<?php
include 'config_db.php';


$user_id = $_SESSION['ses_user_id'];
$paid_id = $_POST['paid_id'];


$sql = "INSERT INTO tb_credit_log(clog_status,paid_id,user_id) VALUES(1,'$paid_id','$user_id')";

if ($mysqli->query($sql) === TRUE) {
	$last_id = $mysqli->insert_id;
	$str = $_FILES['clog_img']['name'];
	$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
	$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
	$file_name = $last_id.".".$file_type;	//เอา primary key ที่เพิ่ง insert บวกกับนามสกุลไฟล์เก็บไว้ในตัวแปร
	$file_tmp = $_FILES['clog_img']['tmp_name'];
	mysqli_query($mysqli,"UPDATE tb_credit_log SET clog_img='$file_name' WHERE clog_id='$last_id'");

	move_uploaded_file($file_tmp,"admin/img_credit_log/".$file_name);
}



echo "<script type='text/javascript'>";
echo "window.location = 'Parcel.php'; ";
echo "</script>";
?>