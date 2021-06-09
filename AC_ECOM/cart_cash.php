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

<body>

<div class="super_container">

	<!-- Header -->

	<?php include 'ingredient/header.php'; ?>

		<!-- Header Main -->

	<?php include 'ingredient/main.php'; ?>

		<!-- Main Navigation -->

	<?php include 'ingredient/tag.php'; ?>
	</header>


	</header>

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">ยืนยันการสั่งซื้อ</div>
						<form method="post">
						<div class="cart_items">
							<ul class="cart_list">
								<table width="100%">
									<tr>
										<td align="center" height="50"><label><b>รายการที่</b></label></td>
										<td align="center" height="50"><label><b>ชื่อสินค้า</b></label></td>
										<td align="center" height="50"><label><b>จำนวน</b></label></td>
										<td align="center" height="50"><label><b>ราคา/หน่วย</b></label></td>
										<td align="center" height="50"><label><b>ราคารวมสินค้า</b></label></td>
									</tr>
								<?php
								$user_id = $_SESSION['ses_user_id'];
								$cart_qr = mysqli_query($mysqli, "SELECT * FROM tb_cart WHERE user_id='$user_id'");
								$sum = 0;
								$arr_P_Sell_ID = array();
								$arr_total = array();
								for($i=0;$cart = mysqli_fetch_assoc($cart_qr);$i++){
									$cart_id = $cart['cart_id'];
									$P_Sell_ID = $cart['P_Sell_ID'];
									$arr_P_Sell_ID[$i] = $P_Sell_ID;
									$product_cart = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
									$img = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product_img WHERE P_Sell_ID='$P_Sell_ID'"));
									?>
									<input type="hidden" name="P_Sell_ID[]" value="<?=$P_Sell_ID;?>">
										<tr>
											<td align="center" width="15%" height="50"><?=$i+1;?></td>
											<td align="left" width="35%"><?=$product_cart['P_Name'];?></td>
											<td align="center" width="10%"><?=$cart['cart_quantity'];?></td>
											<input type="hidden" name="pay_qty[]" value="<?=$cart['cart_quantity'];?>">
											<td align="center" width="20%">
												<?php
												$moo_id = $product_cart['moo_id'];
												$promotion = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_promotion WHERE moo_id='$moo_id' ORDER BY PR_ID DESC"));
												$sell = 0;
												if ($promotion['PR_discount_num'] != 0 || $promotion['PR_discount_precent'] != 0) {
													if ($promotion['PR_discount_num'] != 0){
														echo "(";
														echo number_format($product_cart['P_Sell']);
														echo "-";
														echo $promotion['PR_discount_num'];
														echo ") = ";
														echo $sell = $product_cart['P_Sell']-$promotion['PR_discount_num'];
														echo " บาท";
													}
													else{
														echo "(";
														echo number_format($product_cart['P_Sell']);
														echo "-";
														echo $promotion['PR_discount_precent']."%";
														echo ") = ";
														echo $sell = $product_cart['P_Sell']-(($product_cart['P_Sell']*$promotion['PR_discount_precent'])/100);
														echo " บาท";
													}
												}
												else{
													echo number_format($product_cart['P_Sell']);
													echo " บาท";
													$sell = $product_cart['P_Sell'];
												}
												?>
												<input type="hidden" name="pay_price[]" value="<?=$sell?>">
											</td>
											<td align="center" width="20%">
												<?php
												$total = $cart['cart_quantity']*$sell;
												?>
												<?=number_format($total);?>
												 บาท
											</td>
										</tr>
									<?php
									$sum = $sum+$total;
									$arr_total[$i] = $total;

								}

								?>
								</table>
							</ul>
						</div><?php

						$user1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT user_credit FROM tbl_simple_user"));
						@$result = mysqli_query($mysqli,$user1);
						?>
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<?php if ($user1['user_credit']>=$sum) {
								?>
								<div class="order_total_title">เครดิตที่มี:</div>
								<div class="order_total_amount" ><?=number_format($user1['user_credit']);?></div>
								<td></td>
								<?php
								}?>

								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount" ><?=number_format($sum);?> บาท</div>
							</div>
						</div>

							<div class="cart_items">
								<ul class="cart_list">
									<br>
									<label>
										<table width="1000">
											<tr>
												<td width="50"></td>
												<td width="50" align="center"><input type="radio" name="bank" value="ktb" ></td>
												<td width="300" height="150">
													<img src="images/ktb.jpg" width="300">
												</td>
												<td width="10%"></td>
												<td>
													<h3>
														ธนาคาร : กรุงไทย
														<br><br>
														นายอรรถพล สีชา
														<br><br>
														เลขที่บัญชี : 407-6251-2216
													</h3>
												</td>
											</tr>
										</table>
									</label>
									<br>
									<br>
									<label>
										<table width="1000">
											<tr>
												<td width="50"></td>
												<td width="50" align="center"><input type="radio" name="bank" value="SCB" ></td>
												<td width="300" height="150">
													<img src="images/scb.jpg" width="300">
												</td>
												<td width="10%"></td>
												<td>
													<h3>
														ธนาคาร : ไทยพาณิชย์
														<br><br>
														นายอรรถพล สีซา
														<br><br>
														เลขที่บัญชี : 407-6251-2216
													</h3>
												</td>
											</tr>
										</table>
									</label>
									<br>
								</ul>
							</div>
							<input type="hidden" name="$arr_P_Sell_ID['P_Sell_ID']">
							<input type="hidden" name="arr_total[$sum]">
							<?php if ($user1['user_credit']>=$sum) {?>
							<div class="cart_buttons">
							<?php } ?>
									<button type="submit" class="button cart_button_checkout" value=" cart_cash_db.php" onClick="this.form.action='cart_cash_db.php';">ยืนยันชำระเงิน</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
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
</body>
</html>
