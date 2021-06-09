<?php
include 'config_db.php';
$qr = mysqli_query($mysqli, "SELECT AC_Number,sum(AC_debit) AS debit,sum(AC_credit) AS credit FROM tb_journal WHERE AC_Statusline='on' GROUP BY AC_Number ORDER BY AC_Number");
mysqli_query($mysqli, "UPDATE tb_journal SET AC_Statusline='off' WHERE AC_Number='401' OR AC_Number='402' OR AC_Number='501' OR AC_Number='502' OR AC_Number='503' OR AC_Number='504' OR AC_Number='505'");

$ac101_debit = "";
$ac102_debit = "";
$ac103_debit = "";
$ac104_debit = "";
$ac105_debit = "";
$ac106_debit = "";
$ac107_debit = "";
$ac108_debit = "";
$ac201_debit = "";
$ac202_debit = "";
$ac203_debit = "";
$ac204_debit = "";
$ac301_debit = "";
$ac302_debit = "";

$ac101_credit = "";
$ac102_credit = "";
$ac103_credit = "";
$ac104_credit = "";
$ac105_credit = "";
$ac106_credit = "";
$ac107_credit = "";
$ac108_credit = "";
$ac201_credit = "";
$ac202_credit = "";
$ac203_credit = "";
$ac204_credit = "";
$ac301_credit = "";
$ac302_credit = "";

$ac401 = 0;
$ac402 = 0;
$ac501 = 0;
$ac502 = 0;
$ac503 = 0;
$ac504 = 0;
$ac505 = 0;



for($i=0;$data = mysqli_fetch_assoc($qr);$i++){
	$acc_id = $data['AC_Number'];
	$name_acc = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT acc_name FROM tb_acc WHERE acc_id='$acc_id'"));
	if($data['AC_Number'] == "101"){
		if ($data['debit'] != 0) {
			$ac101_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac101_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "102"){
		if ($data['debit'] != 0) {
			$ac102_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac102_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "103"){
		if ($data['debit'] != 0) {
			$ac103_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac103_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "104"){
		if ($data['debit'] != 0) {
			$ac104_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac104_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "105"){
		if ($data['debit'] != 0) {
			$ac105_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac105_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "106"){
		if ($data['debit'] != 0) {
			$ac106_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac106_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "107"){
		if ($data['debit'] != 0) {
			$ac107_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac107_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "108"){
		if ($data['debit'] != 0) {
			$ac108_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac108_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "201"){
		if ($data['debit'] != 0) {
			$ac201_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac201_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "202"){
		if ($data['debit'] != 0) {
			$ac202_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac202_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "203"){
		if ($data['debit'] != 0) {
			$ac203_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac203_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "204"){
		if ($data['debit'] != 0) {
			$ac204_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac204_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "301"){
		if ($data['debit'] != 0) {
			$ac301_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac301_credit = $data['credit'];
		}
	}elseif($data['AC_Number'] == "302"){
		if ($data['debit'] != 0) {
			$ac302_debit = $data['debit'];
		}if ($data['credit'] != 0) {
			$ac302_credit = $data['credit'];
		}
	}elseif ($data['AC_Number'] == "401") {
		$ac401 = $data['credit'];
	}elseif($data['AC_Number'] == "402"){
		$ac402 = $data['credit'];
	}elseif($data['AC_Number'] == "501"){
		$ac501 = $data['debit'];
	}elseif($data['AC_Number'] == "502"){
		$ac502 = $data['debit'];
	}elseif($data['AC_Number'] == "503"){
		$ac503 = $data['debit'];
	}elseif($data['AC_Number'] == "504"){
		$ac504 = $data['debit'];
	}elseif($data['AC_Number'] == "505"){
		$ac505 = $data['debit'];
	}
}

$x001 = $ac201_credit+$ac204_credit;

if ($ac101_debit != "") {$ac101_debit = number_format($ac101_debit);}
if ($ac101_credit != "") {$ac101_credit = number_format($ac101_credit);}

if ($ac102_debit != "") {$ac102_debit = number_format($ac102_debit);}
if ($ac102_credit != "") {$ac102_credit = number_format($ac102_credit);}

if ($ac103_debit != "") {$ac103_debit = number_format($ac103_debit);}
if ($ac103_credit != "") {$ac103_credit = number_format($ac103_credit);}

if ($ac104_debit != "") {$ac104_debit = number_format($ac104_debit);}
if ($ac104_credit != "") {$ac104_credit = number_format($ac104_credit);}

if ($ac105_debit != "") {$ac105_debit = number_format($ac105_debit);}
if ($ac105_credit != "") {$ac105_credit = number_format($ac105_credit);}

if ($ac106_debit != "") {$ac106_debit = number_format($ac106_debit);}
if ($ac106_credit != "") {$ac106_credit = number_format($ac106_credit);}

if ($ac107_debit != "") {$ac107_debit = number_format($ac107_debit);}
if ($ac107_credit != "") {$ac107_credit = number_format($ac107_credit);}

if ($ac108_debit != "") {$ac108_debit = number_format($ac108_debit);}
if ($ac108_credit != "") {$ac108_credit = number_format($ac108_credit);}

if ($ac201_debit != "") {$ac201_debit = number_format($ac201_debit);}
if ($ac201_credit != "") {$ac201_credit = number_format($ac201_credit);}

if ($ac202_debit != "") {$ac202_debit = number_format($ac202_debit);}
if ($ac202_credit != "") {$ac202_credit = number_format($ac202_credit);}

if ($ac203_debit != "") {$ac203_debit = number_format($ac203_debit);}
if ($ac203_credit != "") {$ac203_credit = number_format($ac203_credit);}

if ($ac204_debit != "") {$ac204_debit = number_format($ac204_debit);}
if ($ac204_credit != "") {$ac204_credit = number_format($ac204_credit);}

if ($ac301_debit != "") {$ac301_debit = number_format($ac301_debit);}
if ($ac301_credit != "") {$ac301_credit = number_format($ac301_credit);}

if ($ac302_debit != "") {$ac302_debit = number_format($ac302_debit);}
if ($ac302_credit != "") {$ac302_credit = number_format($ac302_credit);}

$store = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_commerce"));
require_once __DIR__ . '/mpdf/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
  'default_font_size' => 16,
  'default_font' => 'supermarket'
]);

$mpdf1 = new \Mpdf\Mpdf([
  'default_font_size' => 16,
  'default_font' => 'supermarket'
]);

$content = '
<table width="100%">
  <tr>
    <td width="100%" align="center">
      ร้าน '.$store['CRD_Name'].'
    </td>
  </tr>
  <tr>
    <td align="center">
      งบกำไรขาดทุน
    </td>
  </tr>
	<tr>
    <td align="center">
      '.DateThai(date("Y-m-d")).'
    </td>
  </tr>
</table>
<table id="bg-table" align="center" width="70%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
	<tr>
		<td width="70%" style="padding:4px;text-align:left;">รายได้</td>
		<td width="30%" style="padding:4px;text-align:center;"></td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รายได้การขาย (401)
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac401).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รายได้อื่นๆ (402)
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac402).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รายได้รวมทั้งสิ้น
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac401+$ac402).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">ค่าใช้จ่าย</td>
		<td style="padding:4px;text-align:center;"></td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าซื้อสินค้า(501)
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac501).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าใช้จ่ายในการซื้อ(502)
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac502).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าใช้จ่ายสาธารณูปโภค(503)+(505)
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac503+$ac505).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าใช้จ่ายบุคลากร(504)
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac504).'</td>
	</tr>
	<tr>
		<td style="padding:4px;text-align:left;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รวมค่าใช้จ่ายทั้งสิน
		</td>
		<td style="padding:4px;text-align:center;">'.number_format($ac501+$ac502+$ac503+$ac504+$ac505).'</td>
	</tr>';

	if (($ac401+$ac402) >= ($ac501+$ac502+$ac503+$ac504+$ac505)) {
		$content.='<tr>
			<td style="padding:4px;text-align:left;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				กำไรสุทธิ
			</td>
			<td style="padding:4px;text-align:center;">'.number_format(($ac401+$ac402)-($ac501+$ac502+$ac503+$ac504+$ac505)).'</td>
		</tr>
	</thead>
	<tbody>
	</tbody>
	</table>';
	}else{
		$content.='<tr>
			<td style="padding:4px;text-align:left;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				ขาดทุนสุทธิ
			</td>
			<td style="padding:4px;text-align:center;">'.number_format(($ac501+$ac502+$ac503+$ac504+$ac505)-($ac401+$ac402)).'</td>
		</tr>
	</thead>
	<tbody>
	</tbody>
	</table>';
	}

	$content1='
	<table width="100%">
	  <tr>
	    <td width="100%" align="center">
	      ร้าน '.$store['CRD_Name'].'
	    </td>
	  </tr>
	  <tr>
	    <td align="center">
	      งบฐานะการเงิน
	    </td>
	  </tr>
		<tr>
	    <td align="center">
	      '.DateThai(date("Y-m-d")).'
	    </td>
	  </tr>
	</table>
	<table id="bg-table" align="center" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
		<tr>
			<td colspan="3" align="center" style="border-right:1px solid #000;border-top:1px solid #000;">
				<u>สินทรัพย์</u>
			</td>
			<td colspan="3" align="center" style="border-top:1px solid #000;">
				<u>หนี้สิน</u>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="left" style="border-right:1px solid #000;">
				<u>สินทรัพย์หมุนเวียน</u>
			</td>
			<td colspan="3" align="left">
				<u>หนี้สินหมุนเวียน</u>
			</td>
		</tr>
		<tr>
			<td style="padding:4px;text-align:left;width:30%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงินสด</td>
			<td style="padding:4px;text-align:center;width:10%;">'.$ac101_credit.'</td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;width:10%;">'.$ac101_debit.'</td>
			<td style="padding:4px;text-align:left;width:30%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เจ้าหนี้การค้า</td>
			<td style="padding:4px;text-align:center;width:10%;">'.$ac201_debit.'</td>
			<td style="padding:4px;text-align:center;width:10%;"><u>'.$ac201_credit.'</u></td>
		</tr>
		<tr>
			<td style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงินฝากธนาคาร</td>
			<td style="padding:4px;text-align:center;">'.$ac102_credit.'</td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;">'.$ac102_debit.'</td>
			<td colspan="2" style="padding:4px;text-align:center;">รวมหนี้สินหมุนเวียน</td>
			<td style="padding:4px;text-align:center;">'.$ac201_credit.'</td>
		</tr>
		<tr>
			<td style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลูกหนี้การค้า</td>
			<td style="padding:4px;text-align:center;">'.$ac103_credit.'</td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;">'.$ac103_debit.'</td>
			<td colspan="2" style="padding:4px;text-align:left;"><u>หนี้สินไม่หมุนเวียน</u></td>
			<td style="padding:4px;text-align:center;"></td>
		</tr>
		<tr>
			<td style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สินค้าคงเหลือ</td>
			<td style="padding:4px;text-align:center;">'.$ac108_credit.'</td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;">'.$ac108_debit.'</td>
			<td colspan="2" style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงินกู้</td>
			<td style="padding:4px;text-align:center;"><u>'.$ac204_credit.'</u></td>
		</tr>
		<tr>
			<td style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ค่าเผื่อหนี้สงสัยจะสูญ</td>
			<td style="padding:4px;text-align:center;">'.$ac106_credit.'</td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;">'.$ac106_debit.'</td>
			<td colspan="2" style="padding:4px;text-align:center;">รวมหนี้สินทั้งหมด</td>
			<td style="padding:4px;text-align:center;">'.number_format($x001).'</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:4px;text-align:center;">รวมสินทรัพย์หมุนเวียน</td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;">'.$ac106_debit.'</td>
			<td style="padding:4px;text-align:left;"><u>หนี้สินไม่หมุนเวียน</u></td>
			<td style="padding:4px;text-align:center;">'.$ac204_debit.'</td>
			<td style="padding:4px;text-align:center;">'.$ac204_credit.'</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:4px;text-align:center;"></td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;"></td>
			<td style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ทุนเจ้าของ</td>
			<td style="padding:4px;text-align:center;">'.$ac301_debit.'</td>
			<td style="padding:4px;text-align:center;">'.$ac301_credit.'</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:4px;text-align:center;"></td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;"></td>
			<td style="padding:4px;text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กำไรสุทธิ</td>
			<td style="padding:4px;text-align:center;"><u>'.number_format(($ac401+$ac402)-($ac501+$ac502+$ac503+$ac504+$ac505)).'</u></td>
			<td style="padding:4px;text-align:center;"></td>
		</tr>
		<tr>
			<td colspan="2" style="padding:4px;text-align:center;"></td>
			<td style="border-right:1px solid #000;padding:4px;text-align:center;"></td>
			<td style="padding:4px;text-align:left;"></td>
			<td style="padding:4px;text-align:center;"><u>'.number_format(($ac401+$ac402)-($ac501+$ac502+$ac503+$ac504+$ac505)).'</u></td>
			<td style="padding:4px;text-align:center;"></td>
		</tr>
	</table>';


//insert ใส่ tb_journal ค่าที่ sum แล้ว
$rd = rand(0,9999);
$file_name_pdf = $rd."_".date("Y-m-d")."_price.pdf";
$file_name_pdf1 = $rd."_".date("Y-m-d")."_money.pdf";

//insert เข้าตารางใหม่ ที่ select ใส่หน้า carry.php
$sql = "INSERT INTO tb_report_closed
	(report_date,
	 report_price, 
	 report_money)
VALUES
 	(NOW(), 
 	'$file_name_pdf',
 	 '$file_name_pdf1')";
 mysqli_query($mysqli, $sql);

$mpdf->WriteHTML($content);
$mpdf->Output("document_report_price/".$file_name_pdf,'F');
//$mpdf->Output();


$mpdf1->WriteHTML($content1);
$mpdf1->Output("document_report_money/".$file_name_pdf1,'F');
//$mpdf1->Output();


echo "<script type='text/javascript'>";
echo "alert ('Generate ขอรายงานเสร็จสิ้น');";
echo "window.location = 'carry.php'; ";
echo "</script>";

function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}
?>
