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

        <?php
        function monthThai($int){
        $num = intval($int);
        $arr = [" ","ม.ค.","ก.พ.","มี.ค.","เม.ษ","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
        return $arr[$num];
          }
        ?>


        <div class="content-wrap">
            <div class="main" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-บัญชีแยกประเภท">
                                    <h1>หน้า, <span>รายการสมุดบัญชีรายวัน</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <section id="main-content" >
                        <div class="row" >
                            <div class="col-lg-12" >
        
            <?php
            /*เดี่ยวค่อยว่ากัน*/
                $sql="SELECT  distinct AC_Number,acc_name FROM tb_journal INNER JOIN tb_acc WHERE tb_journal.AC_Number=tb_acc.acc_id ORDER BY AC_Number ASC";
                $query=mysqli_query($mysqli,$sql);

                $rows=mysqli_num_rows($query);
            for($i=1;$i<=$rows;$i++){
                $data=mysqli_fetch_array($query);
                if($data["AC_Number"]!=""){
            $sum_dr=0;
            $sum_cr=0;
                    ?>
                 <br><br>
                <div class="container-fluid">
                <div class="col-xs-6" align="right"><h4>บัญชี : <?php echo $data["acc_name"];?></h4></div>
                <div class="col-xs-4" align="right"><h4>เลขที่บัญชี : <?php echo $data["AC_Number"];?></h4></div>
                <br>
                <div class="row">
                <div class="col-lg-6">
                    <table class="table table-bordered table-hover">
                        <thead class="table-borderless table-dark">
                            <tr></tr>
                            <tr>
                                <th width="20%" colspan="2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันเดือนปี
                                </th>
                                <th width="40%" rowspan="2"><br>
                                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายการ</h4>
                                </th>
                                <th width="20%" rowspan="2">
                                    <h4><br>&nbsp;หน้าบัญชี</h4>
                                </th>
                                <th width="20%" rowspan="2" colspan="2">
                                    <h4><br>เดบิต&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                </th>
                            </tr>
                            <tr>
                                <th width="10%" align="center">&nbsp;&nbsp;เดือน</th>
                                <th width="10%" align="center">วันที่&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            

                <?php
                $number_debit=$data["AC_Number"];
                $sql_debit="select * from tb_journal where AC_Number='$number_debit' and AC_debit!='0' order by AC_Date";
                $query_debit=mysqli_query($mysqli,$sql_debit);
                $rows_detail_dr=mysqli_num_rows($query_debit);
                $mo_dr = "";
                $da_dr = "";
                    for($j=1;$j<=$rows_detail_dr;$j++){
                        $data_detail_dr=mysqli_fetch_array($query_debit);
                        if($data_detail_dr["AC_debit"]!='0'){
                            $date_dr=$data_detail_dr["AC_Date"];
                            $sql_date_dr="select * from tb_journal where AC_Date='$date_dr'";
                            $query_date_dr=mysqli_query($mysqli,$sql_date_dr);
                            $data_date_dr=mysqli_fetch_array($query_date_dr);
                            
                            $date_dr = date_create($data_date_dr["AC_Date"]);
                            $month_dr = date_format($date_dr,"m");
                            $months_dr = monthThai($month_dr);
                            $day_dr = date_format($date_dr,"d");

                            $n_dr = $data_detail_dr['AC_debit'];
                            $sum_dr+=$data_detail_dr['AC_debit'];
                            $whole_dr = floor($n_dr);
                            $fraction_dr = $n_dr - $whole_dr;
                            
                             ?>          
                           <?php 
                            


                            ?>
                            <tr>
                                <td align="center">
                                    <?php
                                    if ($mo_dr!=$month_dr) {
                                        echo $months_dr;
                                        }
                                        $mo_dr = $month_dr;
                                    ?>  
                                </td>
                                <td align="center">
                                    <?php
                                    if ($da_dr!=$day_dr) {
                                       echo $day_dr;
                                       }
                                        $da_dr = $day_dr;
                                     ?>
                                </td>
                                <td align="center">
                                    <?php echo $data["acc_name"];?>
                                </td>
                                <td align="center">
                                    <?php echo $data["AC_Number"];?>
                                </td>
                                <td align="right">
                                    <?php echo number_format($whole_dr);?>
                                </td>
                                <td width="5%">
                                <?php if($fraction_dr!=0){
                                    echo $fraction_dr;
                                }
                                else{
                                    echo "-";
                                }
                                    ?>
                                </td>
                            </tr>
                <?php   
                        }
                    }
                ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-bordered table-hover">
                        <thead class="table-borderless table-Primary">
                            <tr>
                                <th width="20%" colspan="2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันเดือนปี
                                </th>
                                <th width="40%" rowspan="2">
                                    <h4><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายการ</h4>
                                </th>
                                <th width="20%" rowspan="2">
                                    <h4><br>&nbsp;หน้าบัญชี</h4>
                                </th>
                                <th width="20%" rowspan="2" colspan="2">
                                    <h4><br>เครดิต&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                </th>
                            </tr>
                            <tr>
                                <th width="10%" align="center">&nbsp;&nbsp;เดือน</th>
                                <th width="10%" align="center">วันที่&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                 $number_credit=$data["AC_Number"];
                $sql_credit="select * from tb_journal where AC_Number='$number_credit' and AC_credit!='0' order by AC_Date";
                $query_credit=mysqli_query($mysqli,$sql_credit);
                $rows_detail_cr=mysqli_num_rows($query_credit);
                $mo_cr = "";
                $da_cr = "";
                    for($j=1;$j<=$rows_detail_cr;$j++){
                        $data_credit=mysqli_fetch_array($query_credit);
                        if($data_credit["AC_credit"]){
                            $date_cr=$data_credit["AC_Date"];
                            $sql_date_cr="select * from tb_journal where AC_Date='$date_cr'";
                            $query_date_cr=mysqli_query($mysqli,$sql_date_cr);
                            $data_date_cr=mysqli_fetch_array($query_date_cr);
                            
                            $date_cr = date_create($data_date_cr["AC_Date"]);
                            $month_cr = date_format($date_cr,"m");
                            $months_cr = monthThai($month_cr);
                            $day_cr = date_format($date_cr,"d");

                            $n_cr = $data_credit['AC_credit'];
                            $sum_cr+=$data_credit['AC_credit'];
                            $whole_cr = floor($n_cr);
                            $fraction_cr = $n_cr - $whole_cr;
                ?>
                            <tr>
                                <td align="center">
                                    <?php
                                    if ($mo_cr!=$month_cr) {
                                        echo $months_cr;
                                        }
                                        $mo_cr = $month_cr;
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($da_cr!=$day_cr) {
                                       echo $day_cr;
                                       }
                                        $da_cr = $day_cr;
                                     ?>
                                </td>
                                <td align="center">
                                    <?php echo $data["acc_name"];?>
                                </td>
                                <td align="center">
                                    <?php echo $data["AC_Number"];?>
                                </td>
                                <td align="right">
                                    <?php echo number_format($whole_cr);?>
                                </td>
                                <td width="5%">
                                <?php if($fraction_cr!=0){
                                    echo $fraction_cr;
                                }
                                else{
                                    echo "-";
                                }
                                    ?>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-offset-2"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-xs-offset-2 col-xs-4" align="center">
                            <table class='striped'><tr><td>
                                <?php
                                if($sum_dr>$sum_cr){
                                    $sum_dr=$sum_dr-$sum_cr;
                                    echo "<h5>&nbsp;&nbsp;<u>คงเหลือเดบิต :".number_format($sum_dr)." บาท</u></h5>";
                                }
                                ?>
                            </td></tr></table>
                        </div>
                        <div class="col-md-12">                         
                             <table class='striped'><tr align="right"><td>
                                <?php
                                if($sum_dr<$sum_cr){
                                    $sum_cr=$sum_cr-$sum_dr;
                                     echo "<h5 class'right'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>คงเหลือเครดิต :".number_format($sum_cr)." บาท</u></h5>";
                                }
                                ?>
                            </td></tr>
                        </div>
                        </table>
                        </div>
                        <div class="col-xs-offset-2"></div>
                    </div>
                </div>
                </div>
                </div>
                            <?php
                    }
                }
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
