<?php
include('../../admin/config/config.php');
$sql_lietke = "SELECT * FROM tbl_sanpham,tbl_cart_details WHERE tbl_sanpham.id_sanpham=tbl_cart_details.id_sanpham 
AND code_cart='$_GET[code]' ORDER BY id_cart_details ";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="QL_content-right-header">
    <h2>CHI TIẾT ĐƠN HÀNG</h2>
    <a href="" class="back donhang">
        <i class="fa-solid fa-backward"></i>
        <h4>QUAY LẠI</h4>
    </a>
</div>
<div class="QL_content-right-don">
    <table class="show-table">
        <tr>
            <th>MÃ ĐƠN HÀNG</th>
            <th>TÊN SẢN PHẨM</th>
            <th>THÀNH TIỀN</th>
        <tr>

        <?php
        $sum = 0;
        while($row = mysqli_fetch_array($query_lietke)){
            $thanhtien = $row['gia'] * $row['soluongmua'];
            $sum += $thanhtien;
        ?>
        </tr>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo "X".$row['soluongmua']." ".$row['tensanpham']?></td>
            <td><?php echo number_format($thanhtien).'đ' ?></td>
        <tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="3">TỔNG TIỀN: <?php echo number_format($sum).'đ' ?></td>
        </tr>
    </table>   
</div>

<script>
    var donhang = $('.donhang');

    donhang.click(function(e){
        e.preventDefault();
        $('.QL_content-right').load('pages/content/xulytrangthaidonhang.php');
    })
</script>