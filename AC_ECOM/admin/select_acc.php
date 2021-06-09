<?php

/*
 * connection database
 */
 include 'config_db.php';
/*
 * check POST
 */
$categorie_id = isset($_POST['categories']) ? $_POST['categories'] : "";
$Query = mysqli_query($mysqli, "SELECT * FROM tb_acc WHERE acc_id='{$categorie_id}'");
$Rows = mysqli_num_rows($Query);
if ($Rows > 0) {
    while ($Result = mysqli_fetch_array($Query)) {
        echo "<option value=\"" . $Result['acc_id'] . "\">" . $Result['acc_id'] . "</option>";
    }
}else{
    echo "<option value=\"\">ไม่มีสินค้าในหมวดหมู่ที่เลือก</option>";
}
