<?php
$sql_lietke = "SELECT * FROM tbl_sanpham,tbl_cart_details WHERE tbl_sanpham.id_sanpham=tbl_cart_details.id_sanpham 
AND code_cart='$_GET[code]' ORDER BY id_cart_details ";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="form">
    <div class="header-add">
        <i class="fa-solid fa-backward"></i>
        <a href="indexAdmin.php?action=quanlydonhang&id_side=3">Quay lại</a>
    </div>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $i = 0;
            $sum = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                    $thanhtien = $row['gia'] * $row['soluongmua'];
                    $sum += $thanhtien;
                    $i++;
            ?>
            <tr>
                <td class="ID"><?php echo $i ?></td>
                <td class="padding-4px"><?php echo $row['code_cart']?></td>
                <td class="padding-4px"><?php echo $row['tensanpham']?></td>
                <td class="padding-4px"><?php echo $row['soluongmua']?></td>
                <td class="padding-4px"><?php echo number_format($row['gia']).'đ' ?></td>
                <td class="padding-4px"><?php echo number_format($thanhtien).'đ' ?></td>
            </tr>
            
            <?php
                }
            ?>
            <tr>
                <td colspan="6">Tổng đơn hàng: <?php echo number_format($sum).'đ' ?></td>
            </tr>   
        </table>
    </div>

</div>