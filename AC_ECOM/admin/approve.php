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
            $(document).ready(function() {//รออนุมัติ
            $('#tb2').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
            $(document).ready(function() {////ชำระเงินแล้ว
            $('#tb3').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
            $(document).ready(function() {//รอส่งเลขพัสดุ
            $('#tb4').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
            $(document).ready(function() {//รายการขายสมบูรณ์
            $('#tb5').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
            $(document).ready(function() {//ลูกหนี้การค้า
            $('#tb6').DataTable( {
                "order": [[ 0, "asc" ]]
            } );
        } );
        </script>
        
        <?php include 'view/sidebar.php'; ?>


        <?php include 'view/header.php'; ?>


        <div class="content-wrap">
            <div class="main"  >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>หน้า, <span>อนุมัติขายสินค้า</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <section id="main-content" >
                        <div class="row">
                            <div class="col-lg-12">
                                <center><h3>ตารางรอชำระ</h3></center>
                                <table id="tb1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่ง</th>
                                            <th>เครดิตคงเหลือ</th>
                                            <th>ชำระโดยใช้เครดิต</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $qr1 = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_status='รอการชำระเงิน' GROUP BY pay_key");
                                    ?>
                                    <tbody>
                                        <?php
                                         
                                        for($i1=1;$data1 = mysqli_fetch_assoc($qr1);$i1++){
                                           
                                            ?>
                                                <tr>
                                                    <td><?php echo $i1; ?></td>
                                                    <td>
                                                        <?php
                                                        $user_id = $data1['user_id'];
                                                        $sum1 = 0;
                                                        $user1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                                       
                                                           
                                                        
                                                        echo $user1['user_email'];
                                                        echo "<br>";
                                                        $pay_key = $data1['pay_key'];
                                                        $sub_qr1 = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_key='$pay_key'");
                                                        while($sub_data1 = mysqli_fetch_assoc($sub_qr1)){
                                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-";
                                                            $P_Sell_ID = $sub_data1['P_Sell_ID'];
                                                            $sub2_data1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
                                                            echo $sub2_data1['P_Name']." (".$sub_data1['pay_qty'].") = ".number_format($sub_data1['pay_price']*$sub_data1['pay_qty']);
                                                            echo "<br>";
                                                            $sum1 = $sum1+($sub_data1['pay_price']*$sub_data1['pay_qty']);
                                                            
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?=$sum1;?></td>
                                                    <td><?=$data1['pay_in'];?></td>
                                                    <td><?=$user1['user_credit'];?></td>
                                                    <td>
                                                        <?php
                                                        if ($user1['user_credit']>= $sum1) {?>
                                                          <a class="btn btn-success" href="paid_main_update.php?key=<?=$data1['pay_key'];?>&sum=<?=$sum1;?>&user_id=<?=$data1['user_id'];?>&credit=T">อนุมัติ</a>
                                                          <?php
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                            
                                         }
                                        ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่ง</th>
                                            <th>เครดิตคงเหลือ</th>
                                            <th>อนุมัติโดยใช้เครดิต</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
    
                        <hr>
                    


    <!--###################################################################################################### -->


                        <div class="row">
                            <div class="col-lg-12">
                                <center><h3>ตารางรออนุมัติ</h3></center>
                                <table id="tb2" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่ง</th>
                                            <th>หลักฐานการโอนเงิน</th>
                                            <th>อนุมัติการชำระ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $qr1 = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_status='ส่งหลักฐานแล้ว' GROUP BY pay_key");
                                    ?>
                                    <tbody>
                                        <?php
                                        for($i1=1;$data1 = mysqli_fetch_assoc($qr1);$i1++){
                                            ?>
                                                <tr>
                                                    <td><?php echo $i1; ?></td>
                                                    <td>
                                                        <?php
                                                        $user_id = $data1['user_id'];
                                                        $sum1 = 0;
                                                        $user1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                                        echo $user1['user_email'];
                                                        echo "<br>";
                                                        $pay_key = $data1['pay_key'];
                                                        $sub_qr1 = mysqli_query($mysqli, "SELECT * FROM tb_payment WHERE pay_key='$pay_key'");
                                                        while($sub_data1 = mysqli_fetch_assoc($sub_qr1)){
                                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-";
                                                            $P_Sell_ID = $sub_data1['P_Sell_ID'];
                                                            $sub2_data1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_product WHERE P_Sell_ID='$P_Sell_ID'"));
                                                            echo $sub2_data1['P_Name']." (".$sub_data1['pay_qty'].") = ".number_format($sub_data1['pay_price']*$sub_data1['pay_qty']);
                                                            echo "<br>";
                                                            $sum1 = $sum1+($sub_data1['pay_price']*$sub_data1['pay_qty']);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?=$sum1;?></td>
                                                    <td><?=$data1['pay_pending'];?></td>
                                                    <td><a class="btn btn-danger" href="img_payment/<?=$data1['pay_img'];?>" target="_blank">หลักฐานการโอน</a></td>
                                                    <td>
                                                        <a class="btn btn-success" href="paid_main_update.php?key=<?=$data1['pay_key'];?>&sum=<?=$sum1;?>&user_id=<?=$data1['user_id'];?>">อนุมัติ</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            
                                             }
                                        ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>วันที่สั่ง</th>
                                            <th>เครดิตคงเหลือ</th>
                                            <th>อนุมัติโดยใช้เครดิต</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <hr>




<!--###################################################################################################### -->


                        <div class="row">
                            <div class="col-lg-12">
                                  <center><h3>ตารางรอส่งเลขพัสดุ</h3></center>
                                  
                                <table id="tb4" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>รหัสขาย</th>
                                            <th>รายละเอียดผู้ซื้อ</th>
                                            <th>ที่อยู่ผู้ใช้บริการ</th>
                                            <th>รูปภาพใบเสร็จส่งของ</th>
                                            <th>เลขพัสดุ</th>
                                            <th>ส่ง</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $qr = mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE paid_ems='' ORDER BY paid_date");
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
                                                    <form action="paid_ems_update.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="paid_id" value="<?=$data['paid_id'];?>">
                                                    <td><input type="file" name="paid_ems_img" style="width:130px"></td>
                                                    <td><input type="text" name="paid_ems" size="12" maxlength="14"></td>
                                                    <td><button type="submit" class="btn btn-success">อนุมัติ</button></td>
                                                    </form>
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
                                            <th>เลขพัสดุ</th>
                                            <th>ส่ง</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                            </div>
                        </div>
                    <hr>


<!--###################################################################################################### -->


                        <div class="row">
                            <div class="col-lg-12">
                                <center><h3>ตารางขายสมบูรณ์</h3></center>
                                <table id="tb5" class="display" style="width:100%">
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
                            </div>
                        </div>
                        <hr>
                        

<!--###################################################################################################### -->


                        <div class="row">
                            <div class="col-lg-12">
                                <center><h3>ตารางลูกหนี้การค้า</h3></center>
                                <table id="tb6" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ผู้ซื้อ/รหัสหนี้</th>
                                            <th>หนี้ทั้งหมด</th>
                                            <th>หนี้คงเหลือ</th>
                                            <th>จ่ายแล้ว</th>
                                            <th>วันที่สั่งสินค้า</th>
                                            <th>กำหนดชำระ</th>
                                            <th>ชำระหนี้</th>
                                            <th>อนุมัติ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $qr1 = mysqli_query($mysqli, "SELECT * FROM tb_credit ORDER BY credit_date ASC");
                                    ?>
                                    <tbody>
                                        <?php
                                        for($i1=1;$data1 = mysqli_fetch_assoc($qr1);$i1++){
                                            $user_id = $data1['user_id'];
                                            $paid_id = $data1['paid_id'];
                                            $user1 = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tbl_simple_user WHERE user_id='$user_id'"));
                                            ?>
                                                <tr>
                                                    <td align="center"><a href="document_credit/<?=$paid_id;?>.pdf" target="_blank"><?php echo $paid_id."</a><br>(".$user1['user_email'].")";?></td>
                                                    <td>
                                                        <?php
                                                            $credit_all = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_paid WHERE paid_id='$paid_id'"));
                                                            echo number_format($credit_all['paid_sum'])." บาท";
                                                        ?>
                                                    </td>
                                                    <td><?=number_format($data1['credit_all'])." บาท";?></td>
                                                    <td><?=number_format($credit_all['paid_sum']-$data1['credit_all'])." บาท";?></td>
                                                    <td><?=$data1['credit_date'];?></td>
                                                    <td align="center">
                                                        <?php

                                                        $startTimeStamp = strtotime($data1['credit_date']);
                                                        $endTimeStamp = strtotime($data1['credit_date_end']);

                                                        $timeDiff = abs($endTimeStamp - $startTimeStamp);

                                                        $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                                                        // and you might want to convert to integer
                                                        $numberDays = intval($numberDays);

                                                        echo $data1['credit_date_end']."<br>(อีก ".$numberDays." วัน)";

                                                        
                                                        ?>
                                                    </td>
                                                    <form action="credit_log_db.php" method="post">
                                                    <td align="center">
                                                        <p>
                                                            <?php
                                                            $credit_log = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tb_credit_log WHERE user_id='$user_id' AND paid_id='$paid_id' ORDER BY clog_id DESC"));
                                                            if ($credit_log['clog_status'] == 1) {
                                                                ?>
                                                                <a href="img_credit_log/<?=$credit_log['clog_img'];?>" class="btn btn-primary" target="_blank">ใบเสร็จ</a>
                                                            <br><br>
                                                                <?php
                                                            }
                                                            ?>
                                                            <input type="hidden" name="clog_id" value="<?=$credit_log['clog_id'];?>">
                                                            <input type="hidden" name="paid_id" value="<?=$paid_id;?>">
                                                            <input type="number" name="clog_price" placeholder="จำนวนเงิน/บาท">
                                                        </p>
                                                        
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success">ลดหนี้</button>
                                                    </td>
                                                    </form>
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ผู้ซื้อ/รหัสหนี้</th>
                                            <th>หนี้ทั้งหมด</th>
                                            <th>หนี้คงเหลือ</th>
                                            <th>จ่ายแล้ว</th>
                                            <th>วันที่สั่งสินค้า</th>
                                            <th>กำหนดชำระ</th>
                                            <th>ชำระหนี้</th>
                                            <th>อนุมัติ</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
        var urlDirect="http://localhost/AC_ECOM/admin/auth/login.php";  // หนัาที่ต้องการให้แสดงหลังล็อกอิน
     
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
