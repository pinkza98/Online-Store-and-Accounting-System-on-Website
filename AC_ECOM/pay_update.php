<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);		
	if(isset($_FILES["pay_img"]))
	{
		$pay_key = $_POST['pay_key'];
			$str = $_FILES['pay_img']['name'];
			$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
			$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
			$file_name = $pay_key.".".$file_type;	//เอา primary key ที่เพิ่ง insert บวกกับนามสกุลไฟล์เก็บไว้ในตัวแปร
			$file_tmp = $_FILES['pay_img']['tmp_name'];

			if ($file_type == "jpeg" || $file_type == "jpg" || $file_type == "png") {
				mysqli_query($mysqli, "UPDATE tb_payment SET pay_img='$file_name',pay_status='ส่งหลักฐานแล้ว',pay_pending=NOW() WHERE pay_key='$pay_key'");
				@move_uploaded_file($file_tmp,"admin/img_payment/".$file_name);
			}

	}
		echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'payment.php'; ";
		echo "</script>";

	mysqli_close($mysqli);

?>