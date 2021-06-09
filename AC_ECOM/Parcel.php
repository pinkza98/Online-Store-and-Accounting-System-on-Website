<?php // ใช้งาน session
require_once("config_db.php");//  ไฟล์เชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>
 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#categories').change(function() {
                $.ajax({
                    type: 'POST',
                    data: {categories: $(this).val()},
                    url: 'select_acc.php',
                    success: function(data) {
                        $('#products').html(data);
                    }
                });
                return false;
            });
        });

        </script>
	<body>
	<script>
            $(document).ready(function() {//รายการซื้อสมบูรณ์
            $('#tb1').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
             $(document).ready(function() {//แจ้งพัสดุ
            $('#tb2').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );

    </script>
	<div class="super_container">

		<!-- Header -->

	<?php include 'ingredient/header.php'; ?>

		<!-- Header Main -->

	<?php include 'ingredient/main.php'; ?>

		<!-- Main Navigation -->

	<?php include 'ingredient/tag.php'; ?>
	</header>
	</header>
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_title">รายการสั่งซื้อของฉัน</div>
					<div class="cart_container">
						<section id="main-content" >
                        <div class="row">
                            <div class="col-lg-12">
                              <div><br><br></div>
                              <head><h3>รายการซื้อสมบูรณ์</h3></head>
                                <table id="tb1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">รายการที่</th>
                                            <th style="text-align: center">รายละเอียดการซื้อ</th>
                                            <th style="text-align: center">วันที่ส่่ง</th>
                                            <th style="text-align: center">รูป EMS</th>
                                            <th style="text-align: center">เลข EMS</th>
                                            <th style="text-align: center">รายงานภาษีเต็มรูป</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $user_id = $_SESSION['ses_user_id'];
                                    $qr = mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE user_id='$user_id' ORDER BY paid_date");
                                    ?>
                                    <tbody>
                                        <?php
                                        for($i=1;$data = mysqli_fetch_assoc($qr);$i++){
                                          if ($data['paid_ems']!="") {
                                            // code...

                                            ?>
                                                <tr>
                                                    <td  align="center" ><?php echo $i; ?></td>
                                                    <td width="20%">
                                                        <?php
                                                        $user_id = $data['user_id'];
                                                        $user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                                        echo $user['user_email'];
                                                        echo "<br>";


                                                        $detail_arr = explode(",",$data['paid_detail']);
                                                        $cnt = count($detail_arr);
                                                        for($j=0;$j<$cnt;$j++){
                                                            $P_Sell_ID_raw = explode("+",$detail_arr[$j]);
                                                            $P_Sell_ID = $P_Sell_ID_raw[0];
                                                            $pay_qty_raw = explode("=",$P_Sell_ID_raw[1]);
                                                            $pay_qty = $pay_qty_raw[0];
                                                            $pay_price = $pay_qty_raw[1];

                                                            echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-";
                                                            $sub_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
                                                            echo $sub_data['P_Name']."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ราคา ".number_format($pay_price)."*".$pay_qty." = ".number_format(($pay_price*$pay_qty))."</p>";
                                                        }

                                                        ?>
                                                    </td>
                                                    <td width="10%"><?=$data['paid_date'];?></td>
                                                    <input type="hidden" name="paid_id" value="<?=$data['paid_id'];?>">
                                                    <td align="center"><a class="btn btn-info" href="admin/img_ems/<?=$data['paid_ems_img'];?>" target="_blank">ใบส่งของ</a></td>
                                                    <td align="center"><?=$data['paid_ems'];?></td>
                                                    <td align="center"><a class="btn btn-warning" href="admin/document_tax/<?=$data['paid_pdf'];?>" target="_blank">ใบกำกับภาษี</a></td>
                                                </tr>

                                            <?php
                                            }
                                        }
                                        ?>
                                                    </td>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                          <hr>
                        <div class="row">
                            <div class="col-lg-12">
                              <div><br><br></div>
                              <head><h3>รายการแจ้งหนี้</h3></head>
                                <table id="tb2" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>รายละเอียดการสั่งซื้อ</th>
                                            <th>วันที่สั่ง</th>
                                            <th>กำหนดชำระ</th>
                                            <th>ราคาหนี้ทั้งหมด</th>
                                            <th>จ่ายแล้ว</th>
                                            <th>หนี้คงเหลือ</th>
                                            <th>เพิ่มใบเสร็จลดหนี้</th>
                                            <th>ส่ง/สถานนะ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $qr1 = mysqli_query($mysqli, "SELECT * FROM tb_credit WHERE user_id='".$_SESSION['ses_user_id']."' ORDER BY credit_date ASC");
                                    ?>
                                    <tbody>
                                        <?php
                                        for($i1=1;$data1 = mysqli_fetch_assoc($qr1);$i1++){
                                            $user_id = $_SESSION['ses_user_id'];
                                            $paid_id = $data1['paid_id'];
                                            $user1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                            ?>
                                                <tr>
                                                    <td align="center"><a href="admin/document_credit/<?php echo $paid_id.'.pdf'; ?>" target="_blank"><?php echo $data1['paid_id']."</a><br>(".$user1['user_email'].")";?></td>
                                                    <td><?=$data1['credit_date'];?></td>
                                                    <td align="center">
                                                        <?php
                                                        $end_date = date('Y-m-d',strtotime($data1['credit_date']."+30 day"));

                                                        $startTimeStamp = strtotime($data1['credit_date']);
                                                        $endTimeStamp = strtotime($data1['credit_date_end']);

                                                        $timeDiff = abs($endTimeStamp - $startTimeStamp);

                                                        $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                                                        // and you might want to convert to integer
                                                        $numberDays = intval($numberDays);

                                                        echo $data1['credit_date_end']."<br>(อีก ".$numberDays." วัน)";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $credit_all = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE paid_id='$paid_id'"));
                                                            echo number_format($credit_all['paid_sum'])." บาท";
                                                        ?>
                                                    </td>
                                                    <td><?=number_format($credit_all['paid_sum']-$data1['credit_all'])." บาท";?></td>
                                                    <td><?=number_format($data1['credit_all'])." บาท";?></td>

                                                    <?php
                                                    $credit_log = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_credit_log WHERE user_id='".$_SESSION['ses_user_id']."' AND paid_id='$paid_id' ORDER BY clog_id DESC"));
                                                    if ($credit_log['clog_status'] == 0 || $credit_log['clog_status'] == 2) {  //ยังไม่ส่ง
                                                        ?>
                                                        <form action="credit_reduce_db.php" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="paid_id" value="<?=$data1['paid_id']?>">
                                                            <td align="center">
                                                                <input type="file" name="clog_img" accept=".jpg,.png,.jpeg" style="width:130px" required>
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-success">ลดหนี้</button>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    elseif($credit_log['clog_status'] == 1){  //ส่งแล้วยังไม่อนุมัติ
                                                        ?>
                                                        <td colspan="2" align="center">
                                                            <font color="blue">กำลังตรวจสอบ</font>
                                                        </td>
                                                        <?php
                                                    }
                                                    ?>

                                                </tr>
                                            <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/cart_custom.js"></script>
</body>
<script>
        var urlDirect="http://localhost/AC_ECOM/index.php"; // หนัาที่ต้องการให้แสดงหลังล็อกอิน

      function onSignIn(googleUser) {

        // ขอมูลของผู้ใช้งานที่ล็อกอิน ที่เราสามารถนำไปใช้งานได้
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // google แนะนำว่าไม่ควรส่งคานี้ไปเก็บไว้บน server
        // ค่า ID นี้เราสามรรถประยุกต์เพิ่มเติมตามต้องการ เช่นอาจจะเข้ารหัสก่อนบันทึกหรืออะไรก็ได้
        // แต่ในที่นี้จะใช้วิธีอยางง่่ายเพื่อเป็นแนวทาง
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // google แนะนำให้ใช้ ID token สำหรับใช้ในการตรวจสอบการล็อกอิน
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

        if(profile.getId()!=null && profile.getName()!=null){
            // ส่งข้อมูลไปใช้งาน เช่นตรวจสอบการล็อกอิน หรือสร้างข้อมูลสมาชิกใหม่
            $.post("auth/checkuser.php",{
                ggname:profile.getName(),
                gggivenname:profile.getGivenName(),
                ggfamilyname:profile.getFamilyName(),
                ggemail:profile.getEmail(),
                ggid:profile.getId(),
                idTK:id_token
            },function(data){
                console.log(data);
                window.location=urlDirect;
            });
        }else{
            alert("เกิดข้อผิดพลาด กรุณาลอกใหม่!");
        }

      };
    </script>
		<script>
/*      ฟังก์ชั่นล็อกเอาท์*/
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            // เรียกไฟล์ล็อกเอาท์ เพื่อล้างค่าตัวแปร session
            $.post("logout.php",function(){
                  console.log('User signed out.');
                  window.location=urlDirect; // รีโหลดหน้านี้ใหม่
            });
        });
      }
    </script>
</html>
