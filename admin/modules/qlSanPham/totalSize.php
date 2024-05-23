<?php
$sql_lietke = "SELECT * FROM tbl_size,tbl_sanpham WHERE tbl_size.masanpham=tbl_sanpham.masanpham AND tbl_size.masanpham='$_GET[msp]' ";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>
<div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Hình</th>
                <th>Size</th>
                <th>Số lượng</th>
            </tr>
            <?php
            $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                    $i++;
            ?>
            <tr>
                <td class="padding-4px"><?php echo $row['masanpham']?></td>
                <td class="padding-4px ID"><img class="form-img" src="modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt=""></td>
                <td class="padding-4px ID"><?php echo $row['sizeGiay']?></td>
                <td class="padding-4px ID"><?php echo $row['soluong']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>