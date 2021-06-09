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
            <div class="main">
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-lg-12 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-บัญชีแยกประเภท">
                                    <h1>หน้า, <span>งบทดลอง</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <div align="center">
                    <section id="main-content" >
                        <div class="row">
                            <div class="col-lg-12" >
        <div class="container-fluid">
            <div class="col-xs-6"><h4>
                <?php  
                $_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",    
                "04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",    
                "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",    
                "10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม"); 
             
             $vardate=date('Y-m-d');
             $yy=date('Y');
             $mm =date('m');$dd=date('d'); 
            if ($dd<10){
                $dd=substr($dd,1,2);
            }
              $date="วันที่ ".$dd ." ".$_month_name[$mm]." พ.ศ. ".$yy+= 543;
             echo $date;
            ?>
             
            </h4><br><br>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="center">
                    <table class="table table-bordered table-hover" align="center">

                        <thead >
                            <tr class="table-dark">
                            <th rowspan="2"><div align="center"><br>ชื่อบัญชี</div></th>
                            <th rowspan="2"><div align="center"><br>เลขที่บัญชี</div></th>
                            <th colspan="2"><div align="center">เดบิต</div></th>
                            <th colspan="2"><div align="center">เครดิต</div></th>
                            </tr>
                            <tr class="table-dark">
                            <th><div align="center">บาท</div></th>
                            <th><div align="center">สต.</div></th>
                            <th><div align="center">บาท</div></th>
                            <th><div align="center">สต.</div></th>
                        </tr>
                    </thead>
                </div>
                </div>
                </div>
                            <?php
                            $all_dr=0;
                            $all_cr=0;
                            $sql="SELECT  distinct AC_Number,acc_name FROM tb_journal INNER JOIN tb_acc WHERE tb_journal.AC_Number=tb_acc.acc_id ORDER BY AC_Number ASC";
                            $query=mysqli_query($mysqli,$sql);
                            $rows=mysqli_num_rows($query);
                            for($i=1;$i<=$rows;$i++){
                                $data=mysqli_fetch_array($query);
                                $data_detail="select * from tb_journal where AC_Number='".$data["AC_Number"]."'";
                                $query_detail=mysqli_query($mysqli,$data_detail);
                                $rows_detail=mysqli_num_rows($query_detail);
                            $sum_dr=0;
                            $sum_cr=0;
                                for($j=1;$j<=$rows_detail;$j++){
                                    $data_detail=mysqli_fetch_array($query_detail);
                                    if($data_detail["AC_debit"]!=0){
                                        $sum_dr=$sum_dr+$data_detail["AC_debit"];
                                        $n_dr = $sum_dr;
                                        $whole_dr=floor($n_dr);
                                        $fraction_dr = $n_dr - $whole_dr;
                                    }
                                    else if($data_detail["AC_credit"]!=0){
                                        $sum_cr=$sum_cr+$data_detail["AC_credit"];
                                        $n_cr=$sum_cr;
                                        $whole_cr=floor($n_cr);
                                        $fraction_cr=$n_cr-$whole_cr;
                                    }
                                }
                            ?>
                        <tbody>
                            <tr>
                                <td align="center"><?php echo $data["acc_name"];?></td>
                                <td align="center"><?php echo $data["AC_Number"];?></td>
                                <?php
                                if(@$whole_dr>=0 && @$whole_cr>=0){
                                    if(@$whole_dr>=@$whole_cr){
                                        @$whole_dr=$whole_dr-@$whole_cr-$fraction_cr;
                                        $all_dr+=$whole_dr;
                                        $all_dr+=$fraction_dr;
                                    ?>
                                        <td width="15%" align="center"><?php echo number_format($whole_dr);?></td>
                                        <td width="5%" align="center"><?php if($fraction_dr>0){echo $fraction_dr;}else{echo "-";}?></td>
                                        <td width="15%" align="center"></td>
                                        <td width="5%" align="center"></td>
                                    <?php
                                    }
                                    else{
                                        @$whole_cr=$whole_cr-$whole_dr-@$fraction_dr;
                                        $all_cr+=$whole_cr;
                                        $all_cr+=$fraction_cr;
                                    ?>
                                        <td width="15%" align="center"></td>
                                        <td width="5%" align="center"></td>
                                        <td width="15%" align="center"><?php echo number_format($whole_cr);?></td>
                                        <td width="5%" align="center"><?php if($fraction_cr>0){echo $fraction_cr;}else{echo "-";}?></td>
                                    <?php
                                    }
                                }
                                else{
                                ?>
                                <td width="15%" align="center"><?php if($sum_dr!=0){echo number_format($whole_dr);}?></td>
                                <td width="5%" align="center"><?php if($fraction_dr>0){echo $fraction_dr;}else{echo "-";}?></td>
                                <td width="15%" align="center"><?php if($sum_cr!=0){echo number_format($whole_cr);}?></td>
                                <td width="5%" align="center"><?php if($fraction_cr>0){echo $fraction_cr;}else{echo "-";}?></td>
                                <?php }?>
                                </tr>
                            <?php
                            $whole_dr=0;
                            $whole_cr=0;
                            $fraction_dr=0;
                            $fraction_cr=0;
                            }
                            $n_fin_dr = $all_dr;
                            $whole_fin_dr = floor($n_fin_dr);
                            $fraction_fin_dr = $n_fin_dr - $whole_fin_dr;

                            $n_fin_cr = $all_cr;
                            $whole_fin_cr = floor($n_fin_cr);
                            $fraction_fin_cr = $n_fin_cr - $whole_fin_cr;

                            if($all_dr>=$all_cr){$n_fin = $all_dr-$all_cr;}
                            else{$n_fin = $all_cr-$all_dr;}
                            $whole_fin = floor($n_fin);
                            $fraction_fin = $n_fin - $whole_fin;
                            ?>
                            <tr>
                                <td colspan="2" align="center" class="table-Warning">
                                    รวม
                                </td>
                                <td colspan="1" align="center"><u>
                                    <?php echo number_format($whole_fin_dr);?>
                                </u></td>
                                <td align="center">
                                    <?php if($fraction_fin_dr>0){echo $fraction_fin_dr;}else{echo "-";}?>
                                </td>
                                <td colspan="1" align="center"><u>
                                    <?php echo number_format($whole_fin_cr)?>
                                </u></td>
                                <td align="center">
                                    <?php if($fraction_fin_cr>0){echo $fraction_fin_cr;}else{echo "-";}?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" class="table-Primary">
                                    ส่วนต่าง
                                </td>
                                <?php if($all_dr>$all_cr){?>
                                    <td colspan="1" align="center"><?php echo number_format($x=$all_dr-$all_cr);?></td>
                                    <td align="center"><?php if($fraction_fin>0){echo $fraction_fin;}else{echo "-";};?></td>
                                    <td></td><td></td><?php
                                }
                                else{?>
                                    <td></td><td></td>
                                    <td colspan="1" align="center"><?php echo number_format($x=$all_cr-$all_dr);?></td>
                                    <td align="center"><?php if($fraction_fin>0){echo $fraction_fin;}else{echo "-";};?></td><?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'view/footer.php'; ?>
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

