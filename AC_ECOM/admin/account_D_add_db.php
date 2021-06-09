<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	@$AC_Deteil = $_POST['AC_Deteil']; 
	@$AC_Number = $_POST['AC_Number'];
	@$AC_Name  = $_POST['AC_Name']; 
	@$AC_Status_type = $_POST['AC_Status_type'];
	@$AC_price = $_POST['AC_price'];
	@$AC_Statusline =$_POST['AC_Statusline'];
	$sql = "";
	 if ($AC_Status_type == "debit") {
	 	
	 	$sql = "INSERT INTO tb_journal (AC_Deteil,
	 	AC_Number,
		AC_Date,
		AC_debit,
		AC_Statusline) 
		VALUES ('$AC_Deteil',
		'$AC_Number',
		 NOW(),
		'$AC_price',
		'$AC_Statusline')";
	 }
	 else{
	 	$sql = "INSERT INTO tb_journal (AC_Deteil,
		AC_Number,
		AC_Date,
		AC_credit,
		AC_Statusline) 
		VALUES ('$AC_Deteil',
		'$AC_Number',
		 NOW(),
		'$AC_price',
		'$AC_Statusline')";

	 }
    

	

	

	$last_id="";
	if ($mysqli->query($sql) === TRUE) 
	{
    	$last_id = $mysqli->insert_id;
    	echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'account_D_add.php'; ";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "เกิดข้อผิดพลาด".mysqli_errno($mysqli);
		echo "</script>";
		}
	

	

	
	mysqli_close($mysqli);

?>