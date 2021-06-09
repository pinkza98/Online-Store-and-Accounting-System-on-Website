<?php
session_start();
require_once("../config_db.php");
// ตรวจสอบค่าที่ส่งมาผ่าน ajax แบบ POST ในที่นี้เราจะเช็ค 3 ค่า ว่ามีส่งมาไหม
if(isset($_POST['ggname']) && isset($_POST['ggemail']) && $_POST['ggname']!="" && isset($_POST['ggid']) && $_POST['ggid']!=""
&& isset($_POST['idTK']) && $_POST['idTK']!=""
){
    // กำหนดรูปแบบรหัสสำหรับ gg_authorized สำหรับไว้ใช้ล็อกอิน ในท่ี่นี้ใช้รูปแบบอย่างง่าย 
    // ใช้ ไอดี ต่อกับ รหัสพิเศษกำหนดเอง สามารถไปประยุกต์เข้ารหัสรูปแบบอื่นเพิ่มเติมได้
    $gg_secret_set = "mysecret";
    $gg_string_authorized = $gg_secret_set.trim($_POST['ggid']); // ต่อข้อความสำหรับเข้ารหัส
    $gg_gen_authorized = md5($gg_string_authorized);
     
    $sql_check="
    SELECT * FROM tbl_simple_user WHERE user_gg_authorized='".$gg_gen_authorized."'
    AND user_gg_connect=1 
    ";
    $result = $mysqli->query($sql_check);
    if($result && $result->num_rows>0){  // มีสมาชิกที่ล็อกอินด้วย google id นี้ในระบบแล้ว
        // ดึงข้อมูลมาแสดง และสร้าง session
        $row = $result->fetch_array();
        $_SESSION['ses_user_id']=$row['user_id'];
        $_SESSION['ses_user_email']=$row['user_email'];
        $_SESSION['ses_user_fullname']=$row['user_fullname'];
        $_SESSION['ses_user_type']=$row['user_type'];
        $_SESSION['ses_user_name']=$row['user_name'];       
        $_SESSION['ses_user_last_login']=date("Y-m-d H:i:s");
        // อัพเดทเวลาล็อกอินล่าสุด
        $sql_update="
        UPDATE tbl_simple_user SET 
        user_last_login=NOW()
        WHERE user_id='".$row['user_id']."'
        ";
        $mysqli->query($sql_update);
    }else{   // ไม่พบสมาชิกที่ใช้ google id นี้ล็อกอิน
        // สร้างผู้ใช้ใหม่
        //  สมมติให้ชื่อผู้ใช้ใหม่เป็น gg_ไอดี รหัสผ่านเป็น แรนดอม 
        $sql_insert="
        INSERT INTO tbl_simple_user SET
        user_email='".$_POST['ggemail']."',
        user_fullname='".$_POST['gggivenname']." ".$_POST['ggfamilyname']."',
        user_name='gg_".$_POST['ggid']."',
        user_pass='".rand(11111111, 9999999)."',
        user_gg_connect='1',
        user_gg_authorized='".$gg_gen_authorized."',
        user_last_login=NOW()
        ";  
        $result = $mysqli->query($sql_insert);
        if($result && $mysqli->affected_rows>0){
            $insert_userID = $mysqli->insert_id;
            $sql="
            SELECT * FROM tbl_simple_user WHERE user_gg_authorized='".$gg_gen_authorized."'
            AND user_gg_connect=1 
            ";
            $result = $mysqli->query($sql);
            if($result && $result->num_rows>0){  // มีสมาชิกที่ล็อกอินด้วย google id นี้ในระบบแล้ว
                // ดึงข้อมูลมาแสดง และสร้าง session
                $row = $result->fetch_array();
                $_SESSION['ses_user_id']=$row['user_id'];
                $_SESSION['ses_user_email']=$row['user_email'];
                $_SESSION['ses_user_fullname']=$row['user_fullname'];
                $_SESSION['ses_user_type']=$row['user_type'];
                $_SESSION['ses_user_name']=$row['user_name'];       
                $_SESSION['ses_user_last_login']=date("Y-m-d H:i:s");          
                // อัพเดทเวลาล็อกอินล่าสุด
                $sql_update="
                UPDATE tbl_simple_user SET 
                user_last_login=NOW()
                WHERE user_id='".$row['user_id']."'
                ";
                $mysqli->query($sql_update);                         
            }
        }
         
    }
/*echo "<pre>";
echo $gg_gen_authorized;
print_r($_POST);
echo "</pre>";*/
}