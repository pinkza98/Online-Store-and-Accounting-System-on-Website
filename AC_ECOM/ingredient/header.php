<?php // ใช้งาน session
require_once("config_db.php");//  ไฟล์เชื่อมต่อฐานข้อมูล
?>
<header class="header">
	<meta name="google-signin-scope" content="profile email">
<!--    กำหนด client ID ที่เราได้สร้างไว้-->
    <meta name="google-signin-client_id" content="359810758501-72l25omseo04qvpanpa4idfghn98kjb3.apps.googleusercontent.com">
    <title>javascript google login</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<!--    ต้องมีการเรียกใช้งาน Google Platform Library ในหน้าที่มีการใช้งาน Google Sign In-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>082-8602-362</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:pinkza88@gmail.com">pinkza88@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
								</ul>
							</div>
							<div class="top_bar_user">
								<?php if(!isset($_SESSION['ses_user_id']) || $_SESSION['ses_user_id']==""){?>
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a>เข้าระบบ</a></div>
								<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
								<?php }else{ ?>
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div ><a href="user_add.php"><?=$_SESSION['ses_user_fullname']?></a></div>
								<div><a><a href="javascript:void(0);" onclick="signOut();">ออกจากระบบ</a>   
<!--ซ่อนปุ่มล็อกอิน เพราะจำเป้นต้องมีการเรียกใช้งานกรณีต้องการเรียกใช้การล็อกเอาท์-->
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light" style="display:none;"></a></div></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>