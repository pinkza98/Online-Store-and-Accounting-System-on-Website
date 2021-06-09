<?php
	include 'config_db.php';

	$algroup_id = $_POST['algroup_id'];


	if(isset($_FILES["album_image"]))
	{
		foreach($_FILES['album_image']['tmp_name'] as $key => $val)
		{
			if ($mysqli->query("INSERT INTO tb_album (algroup_id,album_date) VALUES('$algroup_id',NOW())") === TRUE) {
			    $last_id_img = $mysqli->insert_id;
			}

			$str = $_FILES['album_image']['name'][$key];
			$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
			$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
			$file_name = $last_id_img.".".$file_type;	//เอา primary key ที่เพิ่ง insert บวกกับนามสกุลไฟล์เก็บไว้ในตัวแปร
			$file_tmp = $_FILES['album_image']['tmp_name'][$key];

			@move_uploaded_file($file_tmp,"img_album/".$file_name);
			mysqli_query($mysqli, "UPDATE tb_album SET album_image='$file_name' WHERE album_id='$last_id_img'");
		}
	}

echo "<script type='text/javascript'>";
echo "alert ('เพิ่มรูปภาพในอัลบั้มสำเร็จ');";
echo "window.location = 'album.php'; ";
echo "</script>";
?>