<?php

$sql_lietke = "SELECT * FROM tbl_danhmucsanpham ORDER BY id_danhmuc";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="form">
    <div class="header-add">
        <i class="fa-solid fa-plus"></i>
        <a href="../admin/modules/qlDanhMucSanPham/them.php">Thêm mới</a>
    </div>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID danh mục</th>
                <th>Tên sản phẩm</th>
                <th>Quản lý</th>
            </tr>
            <?php
            $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                    $i++;
            ?>
            <tr>
                <td class="ID"><?php echo $i ?></td>
                <td class="padding-4px"><?php echo $row['tendanhmucsanpham']?></td>
                <td class="show-table-QL">
                    <a href="modules/qlDanhMucSanPham/xoa.php?id=<?php echo $row['id_danhmuc']?>"><i class="fa-solid fa-trash"></i></a> |
                    <a href="modules/qlDanhMucSanPham/sua.php?id=<?php echo $row['id_danhmuc']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

</div>