<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login-Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-scope" content="profile email">
<!--    กำหนด client ID ที่เราได้สร้างไว้-->
    <meta name="google-signin-client_id" content="359810758501-72l25omseo04qvpanpa4idfghn98kjb3.apps.googleusercontent.com">
    
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<!--    ต้องมีการเรียกใช้งาน Google Platform Library ในหน้าที่มีการใช้งาน Google Sign In-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					
					<span class="login100-form-title p-b-16">
						Welcome<br>
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
					
					<div align="center">
					<?php if(!isset($_SESSION['ses_user_id']) || $_SESSION['ses_user_id']==""){?>

					<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
					<br>
					<br>
					<?php }else{ ?>
					ยินดีตอนรับ<br>
					<strong>คุณ</strong>: <?=$_SESSION['ses_user_fullname']?><br>
					<strong>LastLogin</strong>: <?=$_SESSION['ses_user_last_login']?><br>
					<!--ปุ่มล็อกเอ้าท์ออกจาก Google Sign In อย่างง่าย ที่ให้เราออกจากการล็อกอินผ่าน Google-->
					<a href="javascript:void(0);" onclick="signOut();">ออกจากระบบ</a>   
					<!--ซ่อนปุ่มล็อกอิน เพราะจำเป้นต้องมีการเรียกใช้งานกรณีต้องการเรียกใช้การล็อกเอาท์-->
					<div class="g-signin2" data-onsuccess="onSignIn" data-theme="light" style="display:none;"></div>
					<?php } ?>
					<span class="login100-form-title p-b-26">
						ADMIN(AC-ECOM)
					</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
        var urlDirect="http://localhost/AC_ECOM/admin"; // หนัาที่ต้องการให้แสดงหลังล็อกอิน
     
/*      สังเกตจากปุ่มล็อกอินด้านบน จะเห็นว่ามีการกำหนด data-onsuccess="onSignIn"
        ซึ่งก็คือเมื่อมีการล็อกอินผ่าน Google แล้วให้เรียกใช้งานฟังก์ชั่น ที่ชื่อ onSignIn*/
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
            $.post("checkuser.php",{  
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