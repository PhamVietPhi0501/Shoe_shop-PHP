<?php

$sql_lietke = "SELECT * FROM tbl_phukien ";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="form">
    <div class="header-add">
        <i class="fa-solid fa-plus"></i>
        <a href="../admin/modules/qlPhukien/them.php">Thêm mới</a>
    </div>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID phụ kiện</th>
                <th>Tên phụ kiện</th>
                <th>Mã sản phẩm</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Quản lý</th>
            </tr>
            <?php
            $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                    $i++;
            ?>
            <tr>
                <td class="ID"><?php echo $i ?></td>
                <td class="padding-4px"><?php echo $row['tenphukien']?></td>
                <td class="padding-4px"><?php echo $row['masanpham']?></td>
                <td class="padding-4px ID"><img class="form-img" src="modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt=""></td>
                <td class="padding-4px"><?php echo number_format($row['giaphukien']).'đ'?></td>
                <td class="padding-4px"><?php echo $row['noidung']?></td>           
                <td class="padding-4px"><?php echo $row['soluong']?></td>           
                <td class="show-table-QL">               
                    <a href="modules/qlPhukien/xoa.php?id=<?php echo $row['id_phukien']?>"><i class="fa-solid fa-trash"></i></a> |
                    <a href="modules/qlPhukien/sua.php?id=<?php echo $row['id_phukien']?>"><i class="fa-solid fa-pen-to-square"></i></a> |
                    <a href="modules/qlPhukien/imgPhukien.php?msp=<?php echo $row['masanpham'] ?>"><i class="fa-solid fa-image"></i></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

</div>