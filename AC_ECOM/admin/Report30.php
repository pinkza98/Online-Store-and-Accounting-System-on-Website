<?php include 'config_db.php'; ?>
<!DOCTYPE>
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
            <div class="main" >
                <div class="container-fluid">
                     <form action="generate_tax.php" method="post" name="product" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>หน้า, <span>รายงานขอภาษีมูลค่าเพิ่ม</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                     <div class="col-lg-12" >
                       <div class="row">
                         <div class="col-lg-3">
                           ขอรายงาน//วันแรกภาษี <input type="date" class="form-control" name="date_start" required>
                         </div>
                         <div class="col-lg-3">
                           วันที่สุดท้ายภาษี <input type="date" class="form-control" name="date_end" required>
                         </div>
                         <div class="col-lg-3">
                           ภาษีที่ชำระยกยอดเกินมา
                           <input type="text" name="tax_other" class="form-control" value="0" placeholder="ภาษีที่ชำระยกยอดเกินมา" required>
                         </div>
                         <div class="col-lg-3">
                           <br>
                           <input type="submit" class="btn btn-success" value="ขอรายงาน">
                         </div>
                       </div>





                     </div>
                    <section id="main-content" >
                        <div class="row" >
                            <div class="col-lg-12" >

                <table class='table table-bordered'>
                  <tr align='center' bgcolor='#b4faf8'>
                    <td style="text-align:center;" width="15%">วันที่ขอ</td>
                    <td style="text-align:center;" width="13%">จากวันที่</td>
                    <td style="text-align:center;" width="13%">ถึงวันที่</td>
                    <td style="text-align:center;" >ชำระภาษีเกิน</td>
                    <td style="text-align:center;">เอกสารภาษีซื้อ</td>
                    <td style="text-align:center;">เอกสารภาษีขาย</td>
                    <td style="text-align:center;">รายงานPDFที่ต้องส่ง</td>
                  </tr>
                  <?php
                  $qr = mysqli_query($mysqli, "SELECT * FROM tb_tax_gen ORDER BY gen_id DESC");
                  while($data = mysqli_fetch_assoc($qr)){
                    ?>
                    <tr>
                      <td style="text-align:center;"><?=DateThai($data['gen_date']);?></td>
                      <td style="text-align:center;"><?=DateThai($data['gen_date_start']);?></td>
                      <td style="text-align:center;"><?=DateThai($data['gen_date_end']);?></td>
                      <td style="text-align:center;"><?=number_format($data['gen_tax_gern'],2);?></td>
                      <td style="text-align:center;"><a href="document_tax_buy/<?=$data['gen_doc_buy'];?>">รายงานภาษีซื้อ</a></td>
                      <td style="text-align:center;"><a href="document_tax_sell/<?=$data['gen_doc_sell'];?>">รายงานภาษีขาย</a></td>
                      <td style="text-align:center;"><a href="document_tax_30/<?=$data['gen_doc_vat'];?>">ภ.พ.30(14-07-2019)</a></td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
        </form>
        </div>
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

<?php
function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}


?>
