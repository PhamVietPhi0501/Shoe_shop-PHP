<?php
include('../../config/config.php');
$id = $_GET['id'];
$sql_xoa = "DELETE FROM tbl_comments WHERE id_comments='$_GET[id]' ";
mysqli_query($mysqli,$sql_xoa);
header("Location:../../indexAdmin.php?action=quanlydanhgia");

?>