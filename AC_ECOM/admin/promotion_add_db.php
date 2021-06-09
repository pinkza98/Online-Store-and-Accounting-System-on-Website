<meta charset="utf-8">
<?php
	include 'config_db.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	@$PR_Name = $_POST['PR_Name'];
	@$PR_Start  = $_POST['PR_Start'];  
	@$PR_Stop = $_POST['PR_Stop'];
	@$PR_Quantity = $_POST['PR_Quantity'];
	@$muad_id = $_POST['muad_id'];
	@$moo_id = $_POST['moo_id'];
	@$PR_discount = $_POST['PR_discount'];
	@$PR_discount_type = $_POST['PR_discount_type'];
	$sql = "";
	 if ($PR_discount_type == "num") {
	 	
	 	$sql = "INSERT INTO tb_promotion (PR_Name,
		PR_Start,
		PR_Stop,
		PR_Quantity,
		muad_id,
		moo_id,
		PR_discount_num) 
		VALUES ('$PR_Name',
		'$PR_Start',
		'$PR_Stop',
		'$PR_Quantity',
		'$muad_id',
		'$moo_id',
		'$PR_discount')";
	 }
	 else{
	 	$sql = "INSERT INTO tb_promotion (PR_Name,
		PR_Start,
		PR_Stop,
		PR_Quantity,
		muad_id,
		moo_id,
		PR_discount_precent) 
		VALUES ('$PR_Name',
		'$PR_Start',
		'$PR_Stop',
		'$PR_Quantity',
		'$muad_id',
		'$moo_id',
		'$PR_discount')";

	 }
    

	

	

	$last_id="";
	if ($mysqli->query($sql) === TRUE) 
	{
    	$last_id = $mysqli->insert_id;
    	echo "<script type='text/javascript'>";
		echo "alert ('เพิ่มข้อมูลสำเร็จ');";
		echo "window.location = 'promotion_add.php'; ";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "เกิดข้อผิดพลาด".mysqli_errno($mysqli);
		echo "</script>";
		}
	

	

	
	mysqli_close($mysqli);

?>