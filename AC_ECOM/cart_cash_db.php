<?php
include 'config_db.php';


$user_id = $_SESSION['ses_user_id'];
$pay_status = "รอการชำระเงิน";
$pay_key = "AC".rand(0000000,9999999);

$qr = mysqli_query($mysqli, "SELECT * FROM tb_cart WHERE user_id='$user_id'");

for($i=0;$data = mysqli_fetch_assoc($qr);$i++){
	$P_Sell_ID = $_POST['P_Sell_ID'][$i];
	$pay_qty = $_POST['pay_qty'][$i];
	$pay_price = $_POST['pay_price'][$i];
	mysqli_query($mysqli, "INSERT INTO tb_payment(P_Sell_ID,pay_qty,pay_price,pay_status,pay_in,user_id,pay_key) VALUES('$P_Sell_ID','$pay_qty','$pay_price','รอการชำระเงิน',NOW(),'$user_id','$pay_key')");
}

mysqli_query($mysqli, "DELETE FROM tb_cart WHERE user_id='$user_id'");

echo "<script type='text/javascript'>";
echo "alert ('เพิ่มข้อมูลสำเร็จ');";
echo "window.location = 'payment.php'; ";
echo "</script>";


























?>
<!--
 Select * form tb_cart where user_id=$_SESSION['ses_user_id']
 	while (query) {
 	isert ข้อมูล tb_cart ลงตาราง tb_payment
 	

 	}

delete tb_cart where user_id=ของคนที่ login เช่น $_SESSION['ses_user_id']

redirect ไปหน้าส่งหลักฐานการชำระ
?>

DB tb_payment
- id การซื้อ เป็น ai
- รหัสสินค้า
- จำนวน
- ราคา/หน่วย
- รูปใบเสร็จ เป็น varchar
- status ว่าสินค้านั้นอยู่ขั้นตอนไหน เช่น รอชำระ/ส่งหลักฐานการโอนแล้ว/ชำระเสร็จสิ้น
- รหัสพัสดุ
- วัน เดือน ปี ที่สั่งแล้ว
- วัน เดือน ปี ทีส่งหลักฐาน
- วัน เดือน ปี ที่อนุมัติ
- id ของคนซื้อ

*/