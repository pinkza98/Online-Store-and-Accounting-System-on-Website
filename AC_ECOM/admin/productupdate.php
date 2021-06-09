<?php include 'config_db.php'; 
$P_ID = $_GET['ID'];
$query = "SELECT * FROM tb_product WHERE P_Sell_ID=$P_ID";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);

if ($_POST) {
 $P_ID = $_POST['P_Sell_ID'];
 $P_Name = $_POST['P_Name'];
 $P_Detali = $_POST['P_Detali'];
 $P_Import = $_POST['P_Import'];
 $P_Sell = $_POST['P_Sell'];
 $P_Quantity = $_POST['P_Quantity'];
 $P_Group = $_POST['P_Group'];
 $P_Swine = $_POST['P_Swine'];
 $P_Image = $_POST['P_Image'];
 $P_Date = $_POST['P_Date'];
 $P_Percent = $_POST['P_Percent'];

 $result = mysqli_query($mysqli, "update tb_product set P_Name='{$P_Name}',
  P_Detali='{$P_Detali}',
  P_Import='{$P_Import}',
  P_Sell='{$P_Sell}',
  P_Quantity='{$P_Quantity}',
  P_Group='{$P_Group}',
  P_Swine='{$P_Swine}',
  P_Image='{$P_Image}',
  P_Date='{$P_Date}',
  P_Percent='{$P_Percent}' 
  WHERE P_Sell_ID='{$P_ID}'");
?>
  <script type="text/javascript">
    window.location.href = "show_del_product.php";
  </script>
 <?php

}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="google-signin-scope" content="profile email">
<!--    กำหนด client ID ที่เราได้สร้างไว้-->
    <meta name="google-signin-client_id" content="359810758501-72l25omseo04qvpanpa4idfghn98kjb3.apps.googleusercontent.com">
        
        <title>AC ECOM</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/lib/helper.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<!--    ต้องมีการเรียกใช้งาน Google Platform Library ในหน้าที่มีการใช้งาน Google Sign In-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>

    <body>
        
        <?php include 'view/sidebar.php'; ?>


        <?php include 'view/header.php'; ?>


        <div class="content-wrap">
            <div class="main" action="product_add_db.php">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>หน้า, <span>แก้ไขสินค้า</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <section id="main-content" >
                        <div class="row" >
                            <div class="col-lg-3" >
                        <form method="post">

                      <table class="btn-primary">
                        <tr>
                          รหัสสินค้า: <?php echo $row["P_Sell_ID"];?><br><br>
                          <input type="hidden" name="P_Sell_ID" value="<?php echo $row["P_Sell_ID"];?>">
                    
                    ชื่อสินค้า :<input class="form-control input-default " type="text" name="P_Name"  value="<?php echo $row["P_Name"];?>"><br>
                           รายละเอียดสินค้า :<input class="form-control input-default " type="text" name="P_Detali" value="<?php echo $row["P_Detali"];?>"></input><br>
                            
                            ราคาซื้อ/ชิ้น :<input class="form-control input-default " type="number"  name="P_Import" value="<?php echo $row["P_Import"];?>"><br>

                            ราคาขาย/ชิ้น :<input class="form-control input-default " type="number"  name="P_Sell" value="<?php echo $row["P_Sell"];?>"><br>

                            จำนวนสินค้า :<input class="form-control input-default " type="number"  name="P_Quantity" value="<?php echo $row["P_Quantity"];?>"><br>
                            
                            
                             
                        </tr>
                     
                        <output value="<?php echo $row["P_Group"];?>"></output>
                        หมวดสินค้า :<input class="form-control input-default " type="text"  name="P_Group" value="<?php echo $row["P_Group"];?>"><br>

                       หมู่สินค้า :<input class="form-control input-default " type="text"  name="P_Swine" value="<?php echo $row["P_Swine"];?>"><br>

                        รูปภาพ :<input class="form-control input-default " type="file"  multiple name="P_Image" value="<?php echo $row["P_Image"];?>"><br>

                        วันเดือนปี :<input class="form-control input-default " type="date"  name="P_Date" value="<?php echo $row["P_Date"];?>"><br>

                        VAT%ภาษีขาย :<input class="form-control input-default " type="number"  name="P_Percent" value="<?php echo $row["P_Percent"];?>">
                             <input class="btn btn-success btn sweet-success" type="submit" name="submit" value="บันทึก" onclick="return confirm('ยืนยันแก้ไข');">

                            
                            </div>
                            <div class="col-lg-3">     
                            </div>
                      </table>
             </form>
              <?php
                  mysqli_close($mysqli);
              ?>
                            <div class="col-lg-3">                               
                            </div>
                            <div class="col-lg-3">                               
                            </div>
                            <!-- /# column -->
                        </div>
                        <!-- /# row -->


                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-6">

                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                
                            </div>
                        </div>


                        <?php include 'view/footer.php'; ?>
                    </section>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- jquery vendor -->
        <script src="assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->
        <script src="assets/js/lib/bootstrap.min.js"></script>

        <!-- bootstrap -->

        <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>

        <script src="assets/js/lib/morris-chart/raphael-min.js"></script>
        <script src="assets/js/lib/morris-chart/morris.js"></script>
        <script src="assets/js/lib/morris-chart/morris-init.js"></script>

        <!--  flot-chart js -->
        <script src="assets/js/lib/flot-chart/jquery.flot.js"></script>
        <script src="assets/js/lib/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/js/lib/flot-chart/flot-chart-init.js"></script>
        <!-- // flot-chart js -->


        <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.france.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.germany.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.greece.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.iran.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.russia.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.europe.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/country/jquery.vmap.usa.js"></script>
        <!-- scripit init-->
        <script src="assets/js/lib/vector-map/vector.init.js"></script>

        <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/lib/weather/weather-init.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
        <script src="assets/js/scripts.js"></script>
        <!-- scripit init-->

        <script>
        var urlDirect="http://localhost/AC_ECOM/auth/login.php"; // หนัาที่ต้องการให้แสดงหลังล็อกอิน
     
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
