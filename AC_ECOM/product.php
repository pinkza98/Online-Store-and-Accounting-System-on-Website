<?php // ใช้งาน session
require_once("config_db.php");//  ไฟล์เชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

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

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">
				<?php
				$P_Sell_ID = $_GET['P_Sell_ID'];
				$product = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
				?>
				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<?php
						$img_qr = mysqli_query($mysqli, "SELECT * FROM tb_product_img WHERE P_Sell_ID='$P_Sell_ID' LIMIT 3");
						$img_name = "";
						while($img = mysqli_fetch_assoc($img_qr)){
							$img_name = $img['img_name'];
							?>
							<li data-image="admin/img_product/<?=$img_name;?>"><img src="admin/img_product/<?=$img_name;?>" alt=""></li>
							<?php
						}
						?>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="admin/img_product/<?=$img_name;?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<?php
						$moo_id = $product['moo_id'];
						$moo = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_moo WHERE moo_id='$moo_id'"));
						?>
						<div class="product_category"><?=$moo['moo_name'];?></div>
						<div class="product_name"><?=$product['P_Name'];?></div>
						<div class="product_text"><p><?=$product['P_Detali'];?></p></div>
						<div class="order_info d-flex flex-row">
							<form action="cart_add_db.php" method="post">
								<div class="clearfix" style="z-index: 1000;">
									<?php 
									@$user_id = $_SESSION['ses_user_id'];
									 $user=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'")); 
									?>

									<!-- Product Quantity -->
									
					<?php if(!isset($_SESSION['ses_user_id'])){?>
							<div class="product_price">ราคา<?=number_format($product['P_Sell']);?>&nbsp;&nbsp;บาท</div><br>	
						<?php }else{ ?>
									<?php if($user['user_address']==""){?>
								<div class="product_price">ราคา<?=number_format($product['P_Sell']);?>&nbsp;&nbsp;บาท</div>
										<br> <br> <br><br><br><a><h5>ไม่สามารถเพิ่มสินค้าเข้าตากร้าสินค้าได้</h5></a><br><br>
										<a href="user_add.php">กรุณาเพิ่มข้อมูลที่จำเป็น!</a>
										<?php }else{ ?>
										<input type="hidden" name="P_Sell_ID" value="<?=$P_Sell_ID;?>">
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<?php
										$P_Quantity = $product['P_Quantity'];
										?>
										<input id="quantity_input" type="text" name="cart_quantity" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>	
								</div>
								<div class="product_price">ราคา<?=number_format($product['P_Sell']);?>&nbsp;&nbsp;บาท</div>
								<div class="button_container">
									<button type="submit" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
					<?php 
							} 
								} ?>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->


	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<!-- Footer -->


<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
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