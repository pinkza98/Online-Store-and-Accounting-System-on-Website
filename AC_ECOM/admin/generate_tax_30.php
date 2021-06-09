<?php
include 'config_db.php';
$date_start = $_GET['date_start'];
$date_end = $_GET['date_end'];
$last_id = $_GET['last_id'];
$CR_Name = $_GET['CR_Name'];
$CRD_Name = $_GET['CRD_Name'];
$CR_Address = $_GET['CR_Address'];
$CR_ID = $_GET['CR_ID'];
$price_sum_sell = $_GET['price_sum_sell'];
$tax_sell = $_GET['tax_sell'];
$price_sum_buy = $_GET['price_sum_buy'];
$tax_buy = $_GET['tax_buy'];
$tax_other = $_GET['tax_other'];
$content = "";
$filename_pdf = $last_id."_30_".date("Y-m-d").".pdf";

$z8 = "";
$z9 = "";
$z11 = "";
$z12 = "";

if($tax_sell > $tax_buy){
  $z8 = $tax_sell-$tax_buy;
  $z9 = "-";
  if ($z8 > $tax_other) {
    $z11 = number_format($z8-$tax_other,2);
  }
  else{
    $z11 = "-";
  }
  if ($tax_other > $z8) {
    $z11 = "-";
    $z12 = $tax_other - $z8;
    mysqli_query($mysqli, "UPDATE tb_tax_gen SET gen_tax_gern='$z12',gen_doc_vat='$filename_pdf' WHERE gen_id='$last_id'");
    $z12 = number_format($z12,2);
  }
  else{
    $z12 = "-";
  }
  $z8 = number_format($z8,2);
}else{
  $z8 = "-";
  $z9 = $tax_buy-$tax_sell;
  $z9 = number_format($z9,2);
}





require_once __DIR__ . '/mpdf/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
  'default_font_size' => 16,
  'default_font' => 'supermarket'
]);

$content = '
<table width="100%">
  <tr>
    <td width="100%" align="center">
      ฉบับร่าง ภ.พ.30
    </td>
  </tr>
  <tr>
    <td align="center">
      '.DateThai($date_end).'
    </td>
  </tr>
</table>
<table width="100%" style="font-size:12pt;">
  <tr>
    <td width="60%">
      ชื่อผู้ประกอบการ : '.$CR_Name.'
      <br>
      ชื่อร้านประกอบการ : '.$CRD_Name.'
      <br>
      ที่อยู่ : '.$CR_Address.'
    </td>
    <td>
      เลขที่ประจำตัวผู้เสียภาษี : '.$CR_ID.'
    </td>
  </tr>
</table>
<table id="bg-table" align="center" width="80%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">1</td>
    <td  style="padding:4px;text-align:left;" width="60%">ยอดขายเดือนนี้</td>
    <td  style="padding:4px;text-align:center;">'.number_format($price_sum_sell,2).'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">2</td>
    <td  style="padding:4px;text-align:left;" width="60%">(ลบ)ยอดขายที่เสียภาษีในอัตราร้อยละ</td>
    <td  style="padding:4px;text-align:center;">-</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">3</td>
    <td  style="padding:4px;text-align:left;" width="60%">ลบยอดขายที่ได้รับการยกเว้น</td>
    <td  style="padding:4px;text-align:center;">-</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">4</td>
    <td  style="padding:4px;text-align:left;" width="60%">ยอดขายที่ต้องเสียภาษี (1-2-3)</td>
    <td  style="padding:4px;text-align:center;">'.number_format($price_sum_sell,2).'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">5</td>
    <td  style="padding:4px;text-align:left;" width="60%">ภาษีขายในเดือนนี้</td>
    <td  style="padding:4px;text-align:center;">'.number_format($tax_sell,2).'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">6</td>
    <td  style="padding:4px;text-align:left;" width="60%">ยอดซื้อที่มีสิทธิ์นำภาษีซื้อ</td>
    <td  style="padding:4px;text-align:center;">'.number_format($price_sum_buy,2).'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">7</td>
    <td  style="padding:4px;text-align:left;" width="60%">ภาษีซื้อเดือนนี้</td>
    <td  style="padding:4px;text-align:center;">'.number_format($tax_buy,2).'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">8</td>
    <td  style="padding:4px;text-align:left;" width="60%">ภาษีที่ต้องชำระเดือนนี้ ถ้า(5>7)</td>
    <td  style="padding:4px;text-align:center;">'.$z8.'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">9</td>
    <td  style="padding:4px;text-align:left;" width="60%">ภาษีที่ชำระเกินเดือนนี้ ถ้า(7>5)</td>
    <td  style="padding:4px;text-align:center;">'.$z9.'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">10</td>
    <td  style="padding:4px;text-align:left;" width="60%">ภาษีที่ชำระยกยอดเกินมา</td>
    <td  style="padding:4px;text-align:center;">'.number_format($tax_other,2).'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">11</td>
    <td  style="padding:4px;text-align:left;" width="60%">ต้องชำระ ถ้า(8>10)</td>
    <td  style="padding:4px;text-align:center;">'.$z11.'</td>
  </tr>
  <tr style="padding:4px;">
    <td  style="padding:4px;text-align:center;" width="10%">12</td>
    <td  style="padding:4px;text-align:left;" width="60%">ชำระเกิน (ถ้า10>8) และ[9+10]แล้ว</td>
    <td  style="padding:4px;text-align:center;">'.$z12.'</td>
  </tr>
</thead>
<tbody>
</tbody>
</table>';


$mpdf->WriteHTML($content);




$mpdf->Output("document_tax_30/".$filename_pdf,'F');
//$mpdf->Output();

echo "<script type='text/javascript'>";
echo "alert ('Generate ข้อมูลเสร็จสิ้น');";
echo "window.location = 'Report30.php'; ";
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
