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


        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
        
        
  
<!--    ต้องมีการเรียกใช้งาน Google Platform Library ในหน้าที่มีการใช้งาน Google Sign In-->
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

    </head>

    <body>
        <script>   
            $(document).ready(function() {//รอชำระ
            $('#tb1').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
    </script>
        <?php include 'view/sidebar.php'; ?>


        <?php include 'view/header.php'; ?>


        <div class="content-wrap">
            <div class="main" >
                <div class="container-fluid">
                    <div class="row">
                            <div class="col-lg-12">
                                <br>
                                <center><h3>ตารางขายสินค้าสำเร็จ</h3></center>
                                <table id="tb1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>รหัสขาย</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ที่อยู่ผู้ใช้บริการ</th>
                                            <th>รูปภาพใบเสร็จส่งของ</th>
                                            <th>ใบกำกับภาษีเต็มรูป</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $qr = mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE paid_ems!='' ORDER BY paid_date");
                                    ?>
                                    <tbody>
                                        <?php
                                        for($i=1;$data = mysqli_fetch_assoc($qr);$i++){
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['paid_id']; ?></td>
                                                    <td>
                                                        <?php
                                                        $user_id = $data['user_id'];
                                                        $user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                                        echo $user['user_email'];
                                                        echo "<br>";


                                                        $detail_arr = explode(",",$data['paid_detail']);
                                                        $cnt = count($detail_arr);
                                                        for($i=0;$i<$cnt;$i++){
                                                            $P_Sell_ID_raw = explode("+",$detail_arr[$i]);
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
                                                    <td width="30%"><?=$user['user_address'];?></td>
                                                    <input type="hidden" name="paid_id" value="<?=$data['paid_id'];?>">
                                                    <td align="center"><a class="btn btn-info" href="img_ems/<?=$data['paid_ems_img'];?>" target="_blank">ใบส่งของ</a></td>
                                                    <td align="center"><a class="btn btn-warning" href="document_tax/<?=$data['paid_pdf'];?>" target="_blank">ใบกำกับภาษี</a></td>
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>รหัสขาย</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ที่อยู่ผู้ใช้บริการ</th>
                                            <th>รูปภาพใบเสร็จส่งของ</th>
                                            <th>ใบกำกับภาษีเต็มรูป</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
        var urlDirect="http://localhost/AC_ECOM/admin/auth/login.php"; // หนัาที่ต้องการให้แสดงหลังล็อกอิน
     
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
