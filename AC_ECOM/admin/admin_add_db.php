<meta charset="utf-8">
<?php
	include 'config_db.php';
	error_reporting(~0);
	
	$admin_name = $_POST['admin_name'];
	$admin_address  = $_POST['admin_address'];  
	$admin_phone = $_POST['admin_phone'];  
	$admin_Bank = $_POST['admin_Bank'];

	
	


	$sql = "INSERT INTO tb_admin
	(admin_name,
	 admin_address, 
	 admin_phone,
	 admin_Bank,
	 user_id)
VALUES
 	('$admin_name', 
 	'$admin_address',
 	 '$admin_phone',
 	 '$admin_Bank',
 	 '".$_SESSION['ses_user_id']."')";
 mysqli_query($mysqli, $sql);
	
if(($_FILES["admin_trademark"]&&$_FILES["admin_sign"]&&$_FILES["admin_accountdetails"]))
	{		
			$str = $_FILES['admin_sign']['name'];
			$str1 = $_FILES['admin_trademark']['name'];
			$str2 = $_FILES['admin_accountdetails']['name'];
			$file_type_raw = explode(".",$str);
			$file_type_raw1 = explode(".",$str1);
			$file_type_raw2 = explode(".",$str2);		//แบ่ง String ด้วย . และจะเก็บเป็น array
			$file_type = end($file_type_raw);
			$file_name = $str;	//เรียกค่าของ array ตัวสุดท้ายออกมา	//เอา primary key ที่เพิ่ง insert 
			$file_name1 = $str1;
			$file_name2 = $str2;
			$file_tmp = $_FILES['admin_sign']['tmp_name'];
			$file_tmp1 = $_FILES['admin_trademark']['tmp_name'];
			$file_tmp2 = $_FILES['admin_accountdetails']['tmp_name'];

			if ($file_type == "jpeg" || $file_type == "jpg" || $file_type == "png") {
				mysqli_query($mysqli, "UPDATE tb_admin SET admin_sign='$file_name',admin_trademark='$file_name1',admin_accountdetails='$file_name2'");
				@move_uploaded_file($file_tmp,"img_admin/".$file_name);
				@move_uploaded_file($file_tmp1,"img_admin/".$file_name1);
				@move_uploaded_file($file_tmp2,"img_admin/".$file_name2);
			}

	}
		echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'commerce_add.php'; ";
		echo "</script>";

	mysqli_close($mysqli);

?>