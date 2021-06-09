<?php
include 'config_db.php';

$clog_id = $_POST['clog_id'];
$paid_id = $_POST['paid_id'];
$clog_price = $_POST['clog_price'];

$paid_detail = "";

mysqli_query($mysqli, "UPDATE tb_credit_log SET clog_price='$clog_price',clog_status='2' WHERE clog_id='$clog_id'");

$dat = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_credit WHERE paid_id='$paid_id'"));
$price_new = $dat['credit_all']-$clog_price;

if ($price_new > 0) {
	mysqli_query($mysqli, "UPDATE tb_credit SET credit_all='$price_new' WHERE paid_id='$paid_id'");
}
else{
	mysqli_query($mysqli, "DELETE FROM tb_credit WHERE paid_id='$paid_id'");


	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
	require_once __DIR__ . '/mpdf/vendor/autoload.php';
	
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$mpdf = new \Mpdf\Mpdf([
				'default_font_size' => 16,
				'default_font' => 'supermarket'
		]);


//$mpdf = new mPDF();




$user_id = $dat['user_id'];

$commerce = mysqli_query($mysqli, "SELECT * FROM tb_commerce WHERE CR_ID");
$data1 = mysqli_fetch_assoc($commerce);
$commerce_id =$data1['CR_ID'];

$admin = mysqli_query($mysqli, "SELECT * FROM tb_admin WHERE admin_id");
$data2 = mysqli_fetch_assoc($admin);
$admin_id =$data2['admin_id'];


$content = "";

$i = 1;
$data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE paid_id='$paid_id' AND user_id='$user_id'"));
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
			ร้าน'.($data1['CRD_Name']).'
		</td>
		<td width="33%" align="center">
			ใบกำกับภาษีเต็มรูปแบบ
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
			เลขประจำตัวผู้เสียภาษี : '.$user['user_tax_id'].'
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





$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->SetFooter($footer);

$filename_pdf = "document_tax/".$paid_id.".pdf";

$mpdf->Output($filename_pdf,'F');
}


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

echo "<script type='text/javascript'>";
echo "window.location = 'approve.php'; ";
echo "</script>";
?>