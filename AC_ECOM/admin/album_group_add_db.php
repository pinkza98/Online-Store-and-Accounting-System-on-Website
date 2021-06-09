<?php
include 'config_db.php';
$algroup_name = $_POST['algroup_name'];
mysqli_query($mysqli, "INSERT INTO tb_album_group(algroup_name) VALUES('$algroup_name')");
echo "<script type='text/javascript'>";
echo "alert ('เพิ่มอัลบั้มสำเร็จ');";
echo "window.location = 'album.php'; ";
echo "</script>";
?>