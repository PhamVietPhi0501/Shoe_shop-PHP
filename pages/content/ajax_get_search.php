<?php
// Sắp xếp mặc định
include ('../../admin/config/config.php');

if(isset($_GET['default'])) {
    $key = $_GET['default'];
    $sql_lietke = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$key."%'";
    $sql_query = mysqli_query($mysqli,$sql_lietke);
}

// Sắp xếp mới nhất
if(isset($_GET['new'])) {
    $key = $_GET['new'];
    $sql_lietke = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$key."%' ORDER BY id_sanpham DESC";
    $sql_query = mysqli_query($mysqli,$sql_lietke);
}

// Sắp xếp từ cao đến thấp
if(isset($_GET['up'])) {
    $key = $_GET['up'];
    $sql_lietke = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$key."%' ORDER BY gia DESC";
    $sql_query = mysqli_query($mysqli,$sql_lietke);
}

// Sắp xếp từ thấp đến cao
if(isset($_GET['down'])) {
    $key = $_GET['down'];
    $sql_lietke = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$key."%' ORDER BY gia ASC";
    $sql_query = mysqli_query($mysqli,$sql_lietke);
}


while ($row = mysqli_fetch_array($sql_query)) {
?>
    <div class="col l-2-4">
        <a class="container-product-item" href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>">
            <img src="admin/modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt="">
            <p><?php echo $row['tensanpham'] ?></p>
            <div class="price-cart">
                <span><?php echo number_format($row['gia']) . ' đ' ?></span>
                <a href="" class="price-cart-icon"><i class="fa-solid fa-bag-shopping"></i></a>
            </div>
        </a>
    </div>
<?php
}
?>