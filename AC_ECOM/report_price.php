<?php
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
	require_once __DIR__ . '/admin/mpdf/vendor/autoload.php';
	include 'config_db.php';
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$mpdf = new \Mpdf\Mpdf([
				'default_font_size' => 16,
				'default_font' => 'supermarket'
		]);

	if (!$mysqli) {
		die("Connection failed: " . mysqli_connect_error());
	}


$data1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_commerce"));
$commerce_id =$data1['CR_ID'];
$data2 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_admin"));
$admin_id =$data2['admin_id'];

$content = "";
$sum = 0;
$user_id = $_SESSION['ses_user_id'];
$qr_cart = mysqli_query($mysqli, "SELECT * FROM tb_cart WHERE user_id='$user_id'");
for($i=1;$data_cart = mysqli_fetch_assoc($qr_cart);$i++){
  $P_Sell_ID = $data_cart['P_Sell_ID'];
  $data_product = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));

    $content .= '<tr>
		<td style="border-right:1px solid #000;border-left:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:left;" >'.$data_product['P_Name'].'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$data_cart['cart_quantity'].'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.number_format($data_product['P_Sell']).'</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:right;"  >'.number_format($data_cart['cart_quantity']*$data_product['P_Sell']).'</td>
	</tr>';
  $sum = $sum + ($data_cart['cart_quantity']*$data_product['P_Sell']);
}



$head = '
<style>

</style>
<table width="100%">
<tr>
  <td width="100%" align="center">
    ใบเสนอราคา
  </td>
</tr>
  <tr>
		<td width="100%" align="center">
			ร้าน'.($data1['CRD_Name']).'
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
      วันที่ '.date("Y-m-d").'
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
		<td style="padding:3px;text-align:center;" colspan="1" valign="middle"></td>
		<td style="border-right:1px solid #000;padding:3px;text-align:right;" colspan="2">รวมเป็นเงินทั้งสิ้น</td>
		<td style="border-right:1px solid #000;padding:3px;text-align:right;">'.number_format($sum).' บาท</td>
	</tr>
</tbody>
</table>
<br><br>
<table align="center">
  <tr>
    <td align="center">
      ใบเสนอราคานี้ สามารถใช้ได้ 30 วันนับจากวันที่ออกใบเสนอราคาเท่านั้น
    </td>
  </tr>
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

//$filename_pdf = "document_tax/".$paid_id.".pdf";

$mpdf->Output();

mysqli_close($mysqli);
