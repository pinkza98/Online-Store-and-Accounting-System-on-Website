<?php
include 'config_db.php';

$pay_key = $_GET['key'];
$paid_sum = $_GET['sum'];
$user_id = $_GET['user_id'];
$paid_detail = "";


$qr = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_key='$pay_key'");
while($data = mysqli_fetch_assoc($qr)){


	/*ภาษีขาย-------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	$P_Sell_ID = $data['P_Sell_ID'];
	$T_status = "Sell";
	$pay_qty = $data['pay_qty'];
	$pay_price = $data['pay_price'];
	$T_sum = 0.0;
	$user_id=$data['user_id'];

	$T_sum=($pay_qty*$pay_price)/100*7;
	$T_name="รหัสสินค้า".$P_Sell_ID;
	$sql1 = "INSERT INTO tb_tax(
	T_Price,
	T_Quantity,
	T_Sum,
	T_Date,
	T_status,
	T_name,
	PT_ID,
	T_user,
	T_Key)
	VALUES (
	'$pay_price',
	'$pay_qty',
	'$T_sum',
	NOW(),
	'$T_status',
	'$T_name',
	'$P_Sell_ID',
	'$user_id',
	'$pay_key')";
	mysqli_query($mysqli, $sql1);
	/*เพิ่มบัญชีรายวัน*/
	$AC_Number = "401";
	$AC_Name = "ขาย".$P_Sell_ID;
	$AC_credit = ($pay_qty*$pay_price)-$T_sum;
	$AC_Statusline = "on";
	$AC_Deteil = "ขาย".$P_Sell_ID;

	$sql3 = "INSERT INTO tb_journal(
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
	'$AC_credit',
	'$AC_Statusline')";
	mysqli_query($mysqli, $sql3);

	/*######################################################################*/
	$AC_Number = "202";
	$AC_Name = "ภาษีขาย".$P_Sell_ID;
	$AC_Statusline = "on";

	$sql2 = "INSERT INTO tb_journal(
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
	'$T_sum',
	'$AC_Statusline')";
	mysqli_query($mysqli, $sql2);

	$AC_debit = $pay_qty*$pay_price;
	$AC_Name = "เงินฝาก";
	$AC_Number = "102";
	$sql4 = "INSERT INTO tb_journal(
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
	mysqli_query($mysqli, $sql4);
	$paid_detail = $paid_detail.$data['P_Sell_ID']."+".$data['pay_qty']."=".$data['pay_price'].",";
}
$paid_detail = substr($paid_detail, 0, -1);
$paid_pdf = $pay_key.".pdf";
mysqli_query($mysqli, "INSERT INTO tb_paid(paid_id,paid_detail,paid_sum,paid_pdf,paid_date,user_id) VALUES('$pay_key','$paid_detail','$paid_sum','$paid_pdf',NOW(),'$user_id')");


/*------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

mysqli_query($mysqli, "DELETE FROM tb_payment WHERE pay_key='$pay_key'");

if(@$_GET['credit'] == "T"){
	$credit = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT user_credit FROM tbl_simple_user WHERE user_id='$user_id'"));
	$credit_old = $credit['user_credit']-$paid_sum;
	mysqli_query($mysqli, "UPDATE tbl_simple_user SET user_credit='$credit_old' WHERE user_id='$user_id'");

	$end_date = date('Y-m-d',strtotime("+30 day"));

	mysqli_query($mysqli2, "INSERT INTO tb_credit(credit_all,credit_date,credit_date_end,paid_id,user_id) VALUES('$paid_sum',NOW(),'$end_date','$pay_key','$user_id')");
}


/*===============================PDF=============================*/


	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
	require_once __DIR__ . '/mpdf/vendor/autoload.php';

	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$mpdf = new \Mpdf\Mpdf([
				'default_font_size' => 16,
				'default_font' => 'supermarket'
		]);


//$mpdf = new mPDF();



$paid_id = $pay_key;

$commerce = mysqli_query($mysqli, "SELECT * FROM tb_commerce WHERE CR_ID");
$data1 = mysqli_fetch_assoc($commerce);
$commerce_id =$data1['CR_ID'];

$admin = mysqli_query($mysqli, "SELECT * FROM tb_admin WHERE admin_id");
$data2 = mysqli_fetch_assoc($admin);
$admin_id =$data2['admin_id'];



$result = mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE paid_id='$paid_id' AND user_id='$user_id'");

$content = "";


$i = 1;
$data = mysqli_fetch_assoc($result);
$vat =($data['paid_sum']/100)*7;//ภาษี
$price_product =$data['paid_sum']-$vat;//เข้าบัญชี102
$user_id = $data['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
$detail_arr = explode(",",$data['paid_detail']);
$cnt = count($detail_arr);

for($i=0;$i<$cnt;$i++){
	$e=$i+1;


    $P_Sell_ID_raw = explode("+",$detail_arr[$i]);
    $P_Sell_ID = $P_Sell_ID_raw[0];
    $pay_qty_raw = explode("=",$P_Sell_ID_raw[1]);
    $pay_qty = $pay_qty_raw[0];
    $pay_price = $pay_qty_raw[1];
    $sub_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
    $sum = $pay_qty*$pay_price;

    $content .= '<tr>
		<td style="border-right:1px solid #000;border-left:1px solid #000;padding:3px;text-align:center;"  >'.$e.'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$sub_data['P_Name'].'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$pay_qty.'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.number_format($pay_price,2).'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:right;"  >'.number_format($sum,2).'</td>
	</tr>



	';
}


$tt = "";
if(@$_GET['credit'] == "T"){
	$tt = "ใบแจ้งหนี้";
}else{
	$tt = "ใบกำกับภาษีเต็มรูปแบบ";
}
$head = '
<style>

</style>
<table width="100%">
	<tr>
		<td width="34%">
			<table width="100%" border="0">
				<tr>
					<td height="100">
						<img src="img_admin/logo.jpg" alt="100" width="200">
					</td>
				</tr>
			</table>
		</td>
		<td width="33%" align="center">
			'.($data1['CRD_Name']).'
		</td>
		<td width="33%" align="center">
			'.$tt.'
		</td>
	</tr>
</table>

<table width="100%" style="font-size:12pt;">
	<tr>
		<td><h4>ผู้ขาย</h4></td>
		<td></td>
	</tr>
	<tr>
		<td >
			ที่อยู่สำนักงาน : '.($data1['CR_Address']).'
		</td>
		<td width="30%">

		</td>
	</tr>
	<tr>
		<td>
			เลขประจำตัวผู้เสียภาษีอากร : '.($data1['CR_ID']).'
		</td>
		<td>
			โทร : '.($data2['admin_phone']).'
		</td>
	</tr>
	<tr>
		<td>
			<h4>ลูกค้า</h4>
		</td>
		<td>

		</td>
	</tr>
	<tr>
		<td>
			ชื่อผู้ใช้บริการ : '.$user['user_fullname'].'
		</td>
		<td>
			เลขที่/No. '.$paid_id.'
		</td>
	</tr>
	<tr>
		<td>
			ที่อยู่ : '.$user['user_address'].'
		</td>
		<td>

		</td>
	</tr>
	<tr>
		<td>
			เลขประจำตัวผู้เสียภาษี : '.$user['user_cart_num'].'
		</td>
		<td>
			วันที่/Date : '.date("d/m/Y").'
		</td>
	</tr>
</table>

<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">รายการที่</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;">รายละเอียดสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">จำนวน</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">ราคาต่อหน่วย</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">ยอดรวม</td>
    </tr>


</thead>
	<tbody>';



$end = '<tr style="border:1px solid #000;padding:4px;">
		<td></td>
		<td style="padding:3px;text-align:center;" colspan="1" valign="middle"><b>'.numtothai($data['paid_sum']).'</b></td>
		<td style="border-right:1px solid #000;padding:3px;text-align:right;" colspan="2">รวมเป็นเงิน<br>ภาษีมูลค่าเพิ่ม 7%<br>จำนวนรวมทั้งสิ้น</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:right;">'.$price_product.' บาท<br>'.$vat.' บาท<br>'.$data['paid_sum'].' บาท</td>
	</tr>
</tbody>
</table>';

$footer = '<table width="100%" style="font-size:12pt;">
	<tr>
		<td colspan="4" align="right">
			ในนาม '.$data1['CRD_Name'].'
		</td>
	</tr>
	<tr>
		<td align="center" valign="bottom" width="25%">
			<hr>
			<br>
			ผู้รับสินค้า
		</td>
		<td align="center" valign="bottom" width="25%">
			<hr>
			<br>
			วันที่
		</td>
		<td align="center" valign="bottom" width="25%">
			<img src="img_admin/'.$data2['admin_sign'].'" width="80">
			<br>
			<hr>
			<br>
			ผู้อนุมัติ
		</td>
		<td align="center" valign="bottom" width="25%">
			'.date('d/m/Y').'
			<br>
			<hr>
			<br>
			วันที่
		</td>
	</tr>
</table>';


function numtothaistring($num)
{
$return_str = "";
$txtnum1 = array('','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า');
$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
$num_arr = str_split($num);
$count = count($num_arr);
foreach($num_arr as $key=>$val)
{
	if($count > 1 && $val == 1 && $key ==($count-1))
	$return_str .= "เอ็ด";
	else
	$return_str .= $txtnum1[$val].$txtnum2[$count-$key-1];
}
return $return_str ;
}
function numtothai($num)
{
$return = "";
$num = str_replace(",","",$num);
$number = explode(".",$num);
if(sizeof($number)>2){
return 'รูปแบบข้อมุลไม่ถูกต้อง';
exit;
}
$return .= numtothaistring($number[0])."บาท";
$stang = intval($number[1]);
if($stang > 0)
$return.= numtothaistring($stang)."สตางค์";
else
$return .= "ถ้วน";
return $return ;
}



$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->SetFooter($footer);

$filename_pdf = "error";
if (@$_GET['credit'] == "T") {
	$filename_pdf = "document_credit/".$paid_id.".pdf";
}
else{
	$filename_pdf = "document_tax/".$paid_id.".pdf";
}
$mpdf->Output($filename_pdf,'F');

mysqli_close($mysqli);


/*===============================PDF=============================*/



echo "<script type='text/javascript'>";
echo "alert ('อนุมัติแล้ว');";
echo "window.location = 'approve.php'; ";
echo "</script>";




?>
