<?php
include 'config_db.php';

$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$tax_other = $_POST['tax_other'];

$arr_T_Date = array();        //tb_tax
$arr_T_Key = array();         //tb_tax
$arr_user_cart_num = array(); //tb_tax>tbl_simple_user
$arr_P_Name = array();        //tb_tax
$arr_T_Price = array();       //tb_tax
$arr_T_Sum = array();         //tb_tax
$arr_T_Quantity = array();    //tb_tax
$arr_T_status = array();      //tb_tax
$content = "";
$content1 = "";


if ($mysqli->query("INSERT INTO tb_tax_gen(gen_date,gen_date_start,gen_date_end) VALUES(NOW(),'$date_start','$date_end')") === TRUE) {
    $last_id = $mysqli->insert_id;
    $qr = mysqli_query($mysqli, "SELECT * FROM tb_tax WHERE T_Date >= CAST('$date_start' AS DATE) AND T_Date <= CAST('$date_end' AS DATE) ORDER BY T_Date");
    for($i=0;$data = mysqli_fetch_assoc($qr);$i++){
      $arr_T_Date[$i] = $data['T_Date'];
      $arr_T_Key[$i] = $data['T_Key'];
      $user_id = $data['T_user'];
      $user_cart_num = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
      $arr_user_cart_num[$i] = $user_cart_num['user_cart_num'];
      $product_name = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT P_Name FROM tb_product WHERE P_Sell_ID='".$data['PT_ID']."'"));
      $arr_P_Name[$i] = $product_name['P_Name'];
      $arr_T_Price[$i] = $data['T_Price'];
      $arr_T_Sum[$i] = $data['T_Sum'];
      $arr_T_Quantity[$i] = $data['T_Quantity'];
      $arr_T_status[$i] = $data['T_status'];
    }

    /*===============================PDF ภาษีซื้อ/ขาย=============================*/
    	require_once __DIR__ . '/mpdf/vendor/autoload.php';
    	$mpdf = new \Mpdf\Mpdf([
    		'default_font_size' => 16,
    		'default_font' => 'supermarket'
    	]);
      $mpdf1 = new \Mpdf\Mpdf([
  			'default_font_size' => 16,
				'default_font' => 'supermarket'
  		]);

    $store = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_commerce"));

    $head = '
    <table width="100%">
    	<tr>
    		<td width="100%" align="center">
    			รายการภาษีซื้อ
    		</td>
    	</tr>
      <tr>
        <td align="center">
          จากวันที่ '.DateThai1($date_start).' ถึงวันที่ '.DateThai1($date_end).'
        </td>
      </tr>
    </table>
    <table width="100%" style="font-size:12pt;">
      <tr>
        <td width="60%">
          ชื่อผู้ประกอบการ : '.$store['CR_Name'].'
          <br>
          ชื่อร้านประกอบการ : '.$store['CRD_Name'].'
          <br>
          ที่อยู่ : '.$store['CR_Address'].'
        </td>
        <td>
          เลขที่ประจำตัวผู้เสียภาษี : '.$store['CR_ID'].'
        </td>
      </tr>
    </table>
    <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
      <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="6%">ลำดับ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="13%">วันที่</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;">ชื่อสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="11%">จำนวนสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">มูลค่าสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%">ภาษีรวม</td>
      </tr>
    </thead>
    <tbody>';


    $head1 = '
    <table width="100%">
    	<tr>
    		<td width="100%" align="center">
    			รายการภาษีขาย
    		</td>
    	</tr>
      <tr>
        <td align="center">
          จากวันที่ '.DateThai1($date_start).' ถึงวันที่ '.DateThai1($date_end).'
        </td>
      </tr>
    </table>
    <table width="100%" style="font-size:12pt;">
      <tr>
        <td width="60%">
          ชื่อผู้ประกอบการ : '.$store['CR_Name'].'
          <br>
          ชื่อร้านประกอบการ : '.$store['CRD_Name'].'
          <br>
          ที่อยู่ : '.$store['CR_Address'].'
        </td>
        <td>
          เลขที่ประจำตัวผู้เสียภาษี : '.$store['CR_ID'].'
        </td>
      </tr>
    </table>
    <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
      <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="6%">ลำดับ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="13%">วันที่</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="12%">เลขที่สั่ง</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">รหัสผู้เสียภาษี</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;">ชื่อสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="12%">มูลค่าสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="9%">ภาษีรวม</td>
      </tr>
    </thead>
    <tbody>';

    $tax_buy = 0;
    $price_sum_buy = 0;
    $tax_sell = 0;
    $price_sum_sell = 0;
    $cnt = count($arr_T_Date);
    $elem = 0;
    $elem1 = 0;
    for($j=0;$j<$cnt;$j++){
      if($arr_T_status[$j] == "Buy"){
        $elem++;
        $content .= '<tr>
          <td  style="border-left:1px solid #000;border-right:1px solid #000;padding:4px;text-align:center;">'.$elem.'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.DateThai($arr_T_Date[$j]).'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:left;">'.$arr_P_Name[$j].'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.number_format($arr_T_Quantity[$j]).'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.number_format($arr_T_Price[$j]).'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.number_format($arr_T_Sum[$j],2).'</td>
        </tr>';
        $price_sum_buy = $price_sum_buy+($arr_T_Price[$j]*$arr_T_Quantity[$j]);
        $tax_buy = $tax_buy+$arr_T_Sum[$j];
      }else{
        $elem1++;
        $content1 .= '<tr>
          <td  style="border-left:1px solid #000;border-right:1px solid #000;padding:4px;text-align:center;">'.$elem1.'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.DateThai($arr_T_Date[$j]).'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.$arr_T_Key[$j].'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.$arr_user_cart_num[$j].'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:left;">'.$arr_P_Name[$j].'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.number_format($arr_T_Price[$j]).'*'.number_format($arr_T_Quantity[$j]).'</td>
          <td  style="border-right:1px solid #000;padding:4px;text-align:center;">'.number_format($arr_T_Sum[$j],2).'</td>
        </tr>';
        $price_sum_sell = $price_sum_sell+($arr_T_Price[$j]*$arr_T_Quantity[$j]);
        $tax_sell = $tax_sell+$arr_T_Sum[$j];
      }
    }

    $end = '<tr style="border:1px solid #000;padding:4px;">
    		<td colspan="3" style="border-right:1px solid #000;padding:4px;text-align:right;">
          ราคารวม
        </td>
        <td colspan="2" style="border-right:1px solid #000;padding:4px;text-align:center;">
          '.number_format($price_sum_buy).'
        </td>
        <td align="center">
          '.number_format($tax_buy,2).'
        </td>
    	</tr>
    </tbody>
    </table>';

    $end1 = '<tr style="border:1px solid #000;padding:4px;">
    		<td colspan="5" style="border-right:1px solid #000;padding:4px;text-align:right;">
          ราคารวม
        </td>
        <td style="border-right:1px solid #000;padding:4px;text-align:center;">
          '.number_format($price_sum_sell).'
        </td>
        <td align="center">
          '.number_format($tax_sell,2).'
        </td>
    	</tr>
    </tbody>
    </table>';

    $mpdf->WriteHTML($head);
    $mpdf->WriteHTML($content);
    $mpdf->WriteHTML($end);
    $filename_pdf = $last_id."_buy_".date("Y-m-d").".pdf";
    $mpdf->Output("document_tax_buy/".$filename_pdf,'F');
    //$mpdf->Output();

    $mpdf1->WriteHTML($head1);
    $mpdf1->WriteHTML($content1);
    $mpdf1->WriteHTML($end1);
    $filename_pdf1 = $last_id."_sell_".date("Y-m-d").".pdf";
    $mpdf1->Output("document_tax_sell/".$filename_pdf1,'F');
    //$mpdf1->Output();


    mysqli_query($mysqli, "UPDATE tb_tax_gen SET gen_doc_buy='$filename_pdf',gen_doc_sell='$filename_pdf1' WHERE gen_id='$last_id'");
    /*===============================PDF ภาษีซื้อ/ขาย=============================*/

    echo "<script type='text/javascript'>";
    echo "window.location = 'generate_tax_30.php?date_start=".$date_start."&date_end=".$date_end."&last_id=".$last_id."&CR_Name=".$store['CR_Name']."&CRD_Name=".$store['CRD_Name']."&CR_Address=".$store['CR_Address']."&CR_ID=".$store['CR_ID']."&price_sum_sell=".$price_sum_sell."&tax_sell=".$tax_sell."&price_sum_buy=".$price_sum_buy."&tax_buy=".$tax_buy."&tax_other=".$tax_other."'; ";
    echo "</script>";




} //ปิด if ใหญ่




	function DateThai1($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

  function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
?>
