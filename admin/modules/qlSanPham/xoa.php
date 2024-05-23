<?php
include('../../config/config.php');

$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id]' LIMIT 1";
$query = mysqli_query($mysqli,$sql);
while($row = mysqli_fetch_array($query)){
    unlink('uploads/'.$row['hinh']);
}
//Xóa sản phẩm

$sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$_GET[id]' LIMIT 1 ";
mysqli_query($mysqli,$sql_xoa);

$sql_xoaSize = "DELETE FROM tbl_size WHERE masanpham='$_GET[msp]' LIMIT 1 ";
mysqli_query($mysqli,$sql_xoaSize);

header('Location:../../indexAdmin.php?action=quanlysanpham&id_side=2');
?>