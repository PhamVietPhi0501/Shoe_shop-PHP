<?php
include('../../admin/config/config.php');
$sql_lietke = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' AND loaihang!='new' ";
$sql_query = mysqli_query($mysqli,$sql_lietke);

?>
    <div class="row sm-gutter">
        <?php
        while($row = mysqli_fetch_array($sql_query)){
        $sellGiam = intval($row['gia']) * (intval($row['loaihang'])/100);
        $sell = intval($row['gia']) - $sellGiam;
        ?>
        <div class="col l-2-4 m-4 c-6 container-product-all-item">    
        <form action="pages/content/addProduct.php?id=<?php echo $row['id_sanpham'] ?>&msp=<?php echo $row['masanpham'] ?>&danhmuc=<?php echo $row['id_danhmuc']?>" method="POST">
            <a class="container-product-item" href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham']?>&danhmuc=<?php echo $row['id_danhmuc']?>">
                <div class="info-ticket ticket-seller">Best Seller</div>
                <div class="baddet ticket-sell">-<?php echo $row['loaihang'] ?>%</div>
                <img class="flippable-image" src="admin/modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt="">
                <p><?php echo $row['tensanpham'] ?></p>
                    <div class="price-cart">
                        <div class="newPrice"><?php echo number_format($sell).'đ' ?></div>
                        <span class="oldPrice"><?php echo number_format($row['gia']).' đ' ?></span>
                        <a href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham']?>&danhmuc=<?php echo $row['id_danhmuc']?>" class="price-cart-icon">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <div class="price-cart-size">
                                <?php
                                $sql_size = "SELECT * FROM tbl_size,tbl_sanpham WHERE tbl_size.masanpham=tbl_sanpham.masanpham AND tbl_size.masanpham='$row[masanpham]' ";
                                $size_query = mysqli_query($mysqli,$sql_size);
                                while($row_size = mysqli_fetch_array($size_query)){
                                ?>
                                <li>
                                    <input type="submit" class="price-cart-submit" name="price-cart-submit-sell" value="<?php echo $row_size['sizeGiay'] ?>">
                                </li>
                                <?php
                                }
                                ?>
                            </div>
                        </a>                    
                    </div>
            </a>
            </form>
        </div>
        <?php
        }
        ?>
    </div> 


<div class="seenAll">
    <a href="indexSeenAll.php?page=1">Xem Tất Cả</a>
</div>


