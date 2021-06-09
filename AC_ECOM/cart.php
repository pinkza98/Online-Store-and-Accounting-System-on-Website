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
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<?php
								@$user_id = $_SESSION['ses_user_id'];
								$cart_qr = mysqli_query($mysqli, "SELECT * FROM tb_cart WHERE user_id='$user_id'");
								$sum = 0;
								$arr_total = array();
								for($i=0;$cart = mysqli_fetch_assoc($cart_qr);$i++){
									$cart_id = $cart['cart_id'];
									$P_Sell_ID = $cart['P_Sell_ID'];
									$product_cart = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
									$img = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product_img WHERE P_Sell_ID='$P_Sell_ID'"));
									?>
									<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="admin/img_product/<?=$img['img_name'];?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><?=$product_cart['P_Name'];?></div>
										</div>

										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text"><?=$cart['cart_quantity'];?></div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">
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
													}
													else{
														echo "(";
														echo number_format($product_cart['P_Sell']);
														echo "-";
														echo $promotion['PR_discount_precent']."%";
														echo ") = ";
														echo $sell = $product_cart['P_Sell']-(($product_cart['P_Sell']*$promotion['PR_discount_precent'])/100);
													}
												}
												else{
													echo number_format($product_cart['P_Sell']);
													$sell = $product_cart['P_Sell'];
												}

												?>
											</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<?php
											$total = $cart['cart_quantity']*$sell;
											?>
											<div class="cart_item_text"><?=number_format($total);?></div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Remove</div>
											<p><center><a href="cart_remove.php?cart_id=<?=$cart_id?>" onclick="return confirm('คุณจะลบสินค้านี้หรือไม่?');"><img src="images/remove.png" width="35" alt=""></a></center>
										</div>
									</div>
								</li>
									<?php
									$sum = $sum+$total;
								}
								?>




							</ul>
						</div>


						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount"><?=number_format($sum);?> บาท</div>
							</div>
						</div>
							<div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-4 footer_col">
					<div class="footer_column footer_contact">

						<?php

						 $user=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
						?>

						<div class="footer_phone">ที่อยู่ผู้รับ</div>
						<div class="footer_contact_text">


							<?php if($user['user_address'] == ""){?>
								<br>
								<h4><a href="user_add.php">กรุณาเพิ่มข้อมูลเพิ่มเติมที่จำเป็น!</a></h4>
								<?php }else{ ?>
							<p>คุณ <?=$_SESSION['ses_user_fullname'];?></p>
							<p><?=$user['user_address'];?></p>
							<p>เบอร์โทร : <?=$user['user_number'];?></p>

						</div>
						<div class="footer_social">

						</div>
						</div>
						</div>
						</div>

						<div class="cart_buttons">

								<input type="hidden" name="process_price" value="<?=$sum;?>">
								<a href="report_price.php" class="button cart_button_clear">ขอใบเสนอราคา</a>
								<a href="cart_cash.php" class="button cart_button_checkout">ชำระเงิน</a>





						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<!-- Copyright -->



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
