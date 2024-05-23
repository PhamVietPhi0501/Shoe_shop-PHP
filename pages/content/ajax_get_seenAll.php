<?php
include('../../admin/config/config.php');
if ((isset($_GET['danhmuc'])) || (isset($_GET['gender'])) || (isset($_GET['price']))) {
    $size = $_GET['size'];
    $danhmuc = $_GET['danhmuc'];
    $gender = $_GET['gender'];
    $price = $_GET['price'];


    // Check DM trống
    if ($danhmuc == "") {
        $sql_checkDM = "SELECT * FROM tbl_danhmucsanpham";
        $checkDM_query = mysqli_query($mysqli, $sql_checkDM);
        while ($row_checkDM = mysqli_fetch_assoc($checkDM_query)) {
            $valuesDM[] = "'" . $row_checkDM['id_danhmuc'] . "'";
        }
        $danhmuc = implode(',', $valuesDM);
    }

    if ($_GET['gender'] == 'undefined') {
        $gender = ("'" . 'Nam' . "'" . ',' . "'" . 'Nữ' . "'");
    } else {
        $gender = "'" . $gender . "'";
    }

    if ($price == 0) {
        $price = 5000000;
    }


    if($size == ""){
    $sql_checkSize = "SELECT * FROM tbl_sanpham";
    $checkSize_query = mysqli_query($mysqli,$sql_checkSize);

    while($row_checkSize = mysqli_fetch_assoc($checkSize_query)){
        $valuesSize[] = "'" . $row_checkSize['masanpham'] . "'";
    }
        $ma = implode(',', $valuesSize); 
    }else{
        $size;
    }

    if($size){
        $sql_lietkeMa = "SELECT DISTINCT masanpham FROM tbl_size WHERE sizeGiay IN($size)";
        $sql_queryMa = mysqli_query($mysqli, $sql_lietkeMa);
        while ($row_ma = mysqli_fetch_array($sql_queryMa)){
            $valuesMA[] = "'" . $row_ma['masanpham'] . "'";
        }
        $ma = implode(',',$valuesMA);
    }


    if (isset($_GET['seen']) && $_GET['seen'] == "default" ) {
        $sql_lietke = "SELECT * FROM tbl_sanpham WHERE id_danhmuc IN($danhmuc) AND genderProduct IN($gender) AND gia<$price ORDER BY id_sanpham ASC ";
        $sql_query = mysqli_query($mysqli, $sql_lietke);
    } else if (isset($_GET['seen']) && $_GET['seen'] == "new") {
        $sql_lietke = "SELECT * FROM tbl_sanpham WHERE id_danhmuc IN($danhmuc) AND genderProduct IN($gender) AND gia<$price ORDER BY id_sanpham DESC ";
        $sql_query = mysqli_query($mysqli, $sql_lietke);
    } else if (isset($_GET['seen']) && $_GET['seen'] == "up") {
        $sql_lietke = "SELECT * FROM tbl_sanpham WHERE id_danhmuc IN($danhmuc) AND genderProduct IN($gender) AND gia<$price ORDER BY gia DESC ";
        $sql_query = mysqli_query($mysqli, $sql_lietke);
    } else if (isset($_GET['seen']) && $_GET['seen'] == "down") {
        $sql_lietke = "SELECT * FROM tbl_sanpham WHERE id_danhmuc IN($danhmuc) AND genderProduct IN($gender) AND gia<$price ORDER BY gia ASC ";
        $sql_query = mysqli_query($mysqli, $sql_lietke);
    } else {
        $sql_lietke = "SELECT * FROM tbl_sanpham WHERE masanpham IN($ma) AND id_danhmuc IN($danhmuc) AND genderProduct IN($gender) AND gia<$price ";
        $sql_query = mysqli_query($mysqli, $sql_lietke);
    }

    while ($row = mysqli_fetch_array($sql_query)) {
        
?>
        <div class="col l-3">
            <a class="container-product-item" href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham'] ?>&danhmuc=<?php echo $row['id_danhmuc']?>">
                <?php
                if ($row['loaihang'] == 'new') {
                ?>
                    <div class="info-ticket ticket-news">New</div>
                <?php
                } else {
                ?>
                    <div class="info-ticket ticket-seller">Best Seller</div>
                    <div class="baddet ticket-sell">-<?php echo $row['loaihang'] ?>%</div>
                <?php
                }
                ?>
                <img src="admin/modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt="">
                <p><?php echo $row['tensanpham'] ?></p>
                <div class="price-cart">
                    <?php
                    if ($row['loaihang'] == 'new') {
                    ?>
                        <span><?php echo number_format($row['gia']) . ' đ' ?></span>
                    <?php
                    } else {
                    ?>
                        <div class="newPrice"><?php echo number_format($row['gia'] * (intval($row['loaihang']) / 100)) . 'đ' ?></div>
                        <span class="oldPrice"><?php echo number_format($row['gia']) . ' đ' ?></span>
                    <?php
                    }
                    ?>
                    <a href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham'] ?>&danhmuc=<?php echo $row['id_danhmuc']?>" class="price-cart-icon">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <div class="price-cart-size">
                            <?php
                            $sql_size = "SELECT * FROM tbl_size,tbl_sanpham WHERE tbl_size.masanpham=tbl_sanpham.masanpham AND tbl_size.masanpham='$row[masanpham]' ";
                            $size_query = mysqli_query($mysqli, $sql_size);
                            while ($row_size = mysqli_fetch_array($size_query)) {
                            ?>
                                <li>
                                    <input type="submit" class="price-cart-submit" name="price-cart-submit" value="<?php echo $row_size['sizeGiay'] ?>">
                                </li>
                            <?php
                            }
                            ?>
                        </div>
                    </a>

                </div>
            </a>
        </div>
<?php
    }
}
?>