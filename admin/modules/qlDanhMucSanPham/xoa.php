<?php
include('../../config/config.php');
$id = $_GET['id'];
$sql_xoa = "DELETE FROM tbl_danhmucsanpham WHERE id_danhmuc='$_GET[id]' ";
mysqli_query($mysqli,$sql_xoa);
$sql_xoaSP = "DELETE FROM tbl_sanpham WHERE id_danhmuc='$_GET[id]'";
mysqli_query($mysqli,$sql_xoaSP);
$sql_xoaSize = "DELETE FROM tbl_size WHERE id_danhmuc='$_GET[id]'";
mysqli_query($mysqli,$sql_xoaSize);

header("Location:../../indexAdmin.php?action=quanlydanhmucsanpham");
?>
