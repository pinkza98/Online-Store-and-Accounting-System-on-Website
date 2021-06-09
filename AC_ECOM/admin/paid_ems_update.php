<?php

include 'config_db.php';

$paid_id = $_POST['paid_id'];
$paid_ems = $_POST['paid_ems'];

$str = $_FILES['paid_ems_img']['name'];
$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
$file_name = $paid_id.".".$file_type;	//เอา primary key ที่เพิ่ง insert บวกกับนามสกุลไฟล์เก็บไว้ในตัวแปร
$file_tmp = $_FILES['paid_ems_img']['tmp_name'];

if ($file_type == "jpeg" || $file_type == "jpg" || $file_type == "png") {
	mysqli_query($mysqli, "UPDATE tb_paid SET paid_ems='$paid_ems',paid_ems_img='$file_name' WHERE paid_id='$paid_id'");
	move_uploaded_file($file_tmp,"img_ems/".$file_name);
}


echo "<script type='text/javascript'>";
echo "alert ('เพิ่มข้อมูลสำเร็จ');";
echo "window.location = 'approve.php'; ";
echo "</script>";
?>