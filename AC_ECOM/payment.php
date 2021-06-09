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
            $(document).ready(function() {//รอชำระ
            $('#tb1').DataTable( {
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
					<div class="cart_title">แจ้งชำระ</div>
					<div class="cart_container">
						<section id="main-content" >
                        <div class="row">
                            <div class="col-lg-12">
                              <div><br><br></div>
                                <table id="tb1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>รายการที่</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>เลือกรูปภาพ</th>
                                            <th>ส่งหลักฐาน</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $user_id = $_SESSION['ses_user_id'];
                                    $qr1 = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_status='รอการชำระเงิน' AND user_id='$user_id' GROUP BY pay_key");
                                    ?>
                                    <tbody>
                                    	
                                        <?php

                                        for($i1=1;$data1 = mysqli_fetch_assoc($qr1);$i1++){
                                            ?><form action="pay_update.php" method="POST" enctype="multipart/form-data">
                                            <?php
                                            if ($data1['pay_img']=="") {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i1; ?></td>
                                                    <td>
                                                        <?php
                                                        $user_id = $data1['user_id'];
                                                        $sum1 = 0;
                                                        $user1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                                        echo $user1['user_email'];
                                                        echo "<br>";
                                                        $pay_key = $data1['pay_key'];
                                                        $sub_qr1 = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_key='$pay_key'");
                                                        while($sub_data1 = mysqli_fetch_assoc($sub_qr1)){
                                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-";
                                                            $P_Sell_ID = $sub_data1['P_Sell_ID'];
                                                            $sub2_data1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
                                                            echo $sub2_data1['P_Name']." (".$sub_data1['pay_qty'].") = ".number_format(($sub_data1['pay_price']*$sub_data1['pay_qty']));
                                                            echo "<br>";
                                                            $sum1 = $sum1+($sub_data1['pay_price']*$sub_data1['pay_qty']);
                                                      	  }
                                                        ?>
                                                    </td>
                                                    <td><?=number_format($sum1);?></td>
                                                    <td><input type="file" name="pay_img"></td>
                                                    <input type="hidden" name="pay_key" value="<?=$data1['pay_key'];?>">
                                                    <td align="lfet"><button type="submit" class="btn btn-success" >ตกลง</button></td>
                                                    <td></td>
                                                </tr>
                                            <?php
                                            }
                                            ?></form><?php
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