<?php
include('../../config/config.php');

$sql = "SELECT * FROM tbl_phukien WHERE id_phukien='$_GET[id]' LIMIT 1";
$query = mysqli_query($mysqli,$sql);
while($row = mysqli_fetch_array($query)){
    unlink('../qlSanPham/uploads/'.$row['hinh']);
}
//Xóa sản phẩm

$sql_xoa = "DELETE FROM tbl_phukien WHERE id_phukien='$_GET[id]' LIMIT 1 ";
mysqli_query($mysqli,$sql_xoa);
header('Location:../../indexAdmin.php?action=quanlyphukien&id_side=4');
?>