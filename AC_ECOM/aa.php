<?php
include 'config_db.php';

$dat = mysqli_query($mysqli, "SELECT AC_Number,sum(AC_debit) AS deb,sum(AC_credit) AS cre FROM tb_journal WHERE AC_date BETWEEN CAST('2019-07-07' AS DATE) AND CAST('2019-07-22' AS DATE) GROUP BY AC_Number ORDER BY AC_Number ASC");
$sum101
$sum102
$sum103
$sum104
$
while($data = mysqli_fetch_assoc($dat)){
	echo $data['AC_Number']." Debit = ".$data['deb']." and Credit = ".$data['cre']."<br>";
}
?>
<table width="100%">
	<tr>
		<td align="center">ร้าน...........</td>
	</tr>
	<tr>
		<td align="center">งบกำไรขาดทุน</td>
	</tr>
	<tr>
		<td align="center">จากวัน ....... ถึง ..........</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td width="70%" align="left">รายได้</td>
		<td width="30%" align="center"></td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รายได้การขาย (401)
		</td>
		<td align="center">1000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รายได้อื่นๆ (402)
		</td>
		<td align="center">2000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รายได้รวมทั้งสิ้น
		</td>
		<td align="center">3000</td>
	</tr>
	<tr>
		<td width="70%" align="left">ค่าใช้จ่าย</td>
		<td width="30%" align="center"></td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าซื้อสินค้า(501)
		</td>
		<td align="center">1000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าใช้จ่ายในการซื้อ(502)
		</td>
		<td align="center">2000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าใช้จ่ายสาธารณูปโภค(503)+(505)
		</td>
		<td align="center">2000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			ค่าใช้จ่ายบุคลากร(504)
		</td>
		<td align="center">2000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			รวมค่าใช้จ่ายทั้งสิน
		</td>
		<td align="center">2000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			กำไรก่อนหักต้นทุน (sum)=(401)-(501)
		</td>
		<td align="center">2000</td>
	</tr>
	<tr>
		<td align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			กำไรสุทธิ
		</td>
		<td align="center">2000</td>
	</tr>
</table>