<div class="modal-header">
        <h4>Giỏ hàng</h4>
        <span class="modal-header-number"><?php      
        if(isset($_SESSION['cart_shoe'])){
            $length = count($_SESSION['cart_shoe']);
            echo $length;
        }else{
            echo "0";
        }
        ?></span>
        <label for="modal-click1">
        <i class="fa-solid fa-xmark modal-close"></i>
        </label>
    </div>

    <div class="modal-product">
<?php
//session_destroy();
if(isset($_SESSION['cart_shoe'])){
    $sum = 0;
    $sumItem = 0;
foreach($_SESSION['cart_shoe'] as $item){
    $sum += $item['gia'];
?>
        <div class="product-cart">
            <div class="modal-product-img">
                <img class="product-img" src="admin/modules/qlSanPham/uploads/<?php echo $item['hinh'] ?>" alt="">
            </div>
            <div class="modal-information">
                <h4><?php echo $item['tensanpham'] ?></h4>
                <span class="modal-informatio-size"><?php echo $item['size'] ?></span>
                <div class="modal-information-add">
                    <a href="pages/content/deleteProduct.php?giam=<?php echo $item['id']?>&size=<?php echo $item['size']?>">-</a>
                    <p><?php echo $item['soluong'] ?></p>
                    <a href="pages/content/deleteProduct.php?tang=<?php echo $item['id']?>&size=<?php echo $item['size']?>">+</a>
                </div>
            </div>
            <div class="modal-price">
                <p><?php echo $sumItem = $item['gia'] * $item['soluong'] ?></p>
                <a class="modal-price-link" id="<?php echo $item['id']?>" href="">Xóa</a>
            </div>
        </div>

<?php
}
 }
?>