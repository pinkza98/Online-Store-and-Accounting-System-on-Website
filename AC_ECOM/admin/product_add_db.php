<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	@$P_Name = $_POST['P_Name'];
	@$P_Detali  = $_POST['P_Detali'];  
	@$P_Import = $_POST['P_Import'];  
	@$P_Sell  = $_POST['P_Sell'];
	@$P_Quantity = $_POST['P_Quantity'];
	@$muad_id = $_POST['muad_id'];
	@$moo_id = $_POST['moo_id'];
	@$P_Percent = $_POST['P_Percent'];
    

	

	$sql = "INSERT INTO tb_product (P_Name,
	P_Detali,
	P_Import,
	P_Sell,
	P_Quantity,
	muad_id,
	moo_id,
	P_Date,
	P_Percent) 
	VALUES ('$P_Name',
	'$P_Detali',
	'$P_Import',
	'$P_Sell',
	'$P_Quantity',
	'$muad_id',
	'$moo_id',NOW(),
	'$P_Percent')";
	
	

	$last_id="";
	if ($mysqli->query($sql) === TRUE) {
    	$last_id = $mysqli->insert_id;
    	echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'product_add.php'; ";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "เกิดข้อผิดพลาด".mysqli_errno($mysqli);
		echo "</script>";
	}
	/*---------เพิ่มภาษีซื้อ--------------*/

	$T_Sum = (($P_Import/100)*$P_Percent)*$P_Quantity;
	$T_status = "Buy";

	$sql1 = "INSERT INTO tb_tax(
	T_Price,
	T_Quantity,
	T_Sum,
	T_Date,
	T_status,
	T_name,
	PT_ID) 
	VALUES (
	'$P_Import',
	'$P_Quantity',
	'$T_Sum',
	NOW(),
	'$T_status',
	'$P_Name',
	'$last_id')";
	mysqli_query($mysqli, $sql1);

	/*บันทึกบัญชีภาษี*/

	/*######################################################################*/

	/*บัญชีรายวันสินค้า*/
	$AC_Number = "501";
	$AC_Name = "ซื้อ ".$P_Name;
	$AC_debit = ($P_Import*$P_Quantity)-$T_Sum;
	$AC_Statusline = "on";
	$AC_Deteil = "ซื้อ".$P_Name;

	$sql3 = "INSERT INTO tb_journal(
	AC_Number,
	AC_Name,
	AC_Deteil,
	AC_Date,
	AC_debit,
	AC_Statusline) 
	VALUES (
	'$AC_Number',
	'$AC_Name',
	'$AC_Deteil',
	NOW(),
	'$AC_debit',
	'$AC_Statusline')";
	mysqli_query($mysqli, $sql3);

	/*######################################################################*/
	$AC_Number = "104";
	$AC_Name = "ภาษีซื้อ".$P_Name;
	$AC_Statusline = "on";

	$sql2 = "INSERT INTO tb_journal(
	AC_Number,
	AC_Name,
	AC_Deteil,
	AC_Date,
	AC_debit,
	AC_Statusline) 
	VALUES (
	'$AC_Number',
	'$AC_Name',
	'$AC_Deteil',
	NOW(),
	'$T_Sum',
	'$AC_Statusline')";
	mysqli_query($mysqli, $sql2);

	$AC_crebit = $P_Import*$P_Quantity;
	$AC_Name = "เงินสด";
	$AC_Number = "101";
	$sql4 = "INSERT INTO tb_journal(
	AC_Number,
	AC_Name,
	AC_Deteil,
	AC_Date,
	AC_credit,
	AC_Statusline) 
	VALUES (
	'$AC_Number',
	'$AC_Name',
	'$AC_Deteil',
	NOW(),
	'$AC_crebit',
	'$AC_Statusline')";
	mysqli_query($mysqli, $sql4);


	if(isset($_FILES["P_Image"]))
	{
		foreach($_FILES['P_Image']['tmp_name'] as $key => $val)
		{
			if ($mysqli->query("INSERT INTO tb_product_img (P_Sell_ID) VALUES('$last_id')") === TRUE) {
			    $last_id_img = $mysqli->insert_id;
			}

			$str = $_FILES['P_Image']['name'][$key];
			$file_type_raw = explode(".",$str);		//แบ่ง String ด้วย . และจะเก็บเป็น array
			$file_type = end($file_type_raw);		//เรียกค่าของ array ตัวสุดท้ายออกมา
			$file_name = $last_id_img.".".$file_type;	//เอา primary key ที่เพิ่ง insert บวกกับนามสกุลไฟล์เก็บไว้ในตัวแปร
			$file_tmp = $_FILES['P_Image']['tmp_name'][$key];

			if ($file_type == "jpeg" || $file_type == "jpg" || $file_type == "png") {
				@move_uploaded_file($file_tmp,"img_product/".$file_name);
			}
			else{
	
			}
			

			mysqli_query($mysqli, "UPDATE tb_product_img SET img_name='$file_name' WHERE img_id='$last_id_img'");
		}
	}

	
	mysqli_close($mysqli);

?>