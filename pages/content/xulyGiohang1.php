<?php
session_start();

if(isset($_SESSION['cart_shoe'])){
$sumall = 0;
$tongSL = 0;
foreach($_SESSION['cart_shoe'] as $item){
    $sumItem = $item['soluong'] * $item['gia'];
    $sumall += $sumItem;
    $soluong = $item['soluong'];
    $tongSL = $tongSL + $soluong;
}
?>


    <div class="cart-pay-content-right-name">
        <h4>Tổng tiền giỏ hàng</h4>
    </div>

    <div class="cart-pay-content-right-product">
        <span>Tổng sản phẩm</span>
        <p><?php 
        if(isset($_SESSION['cart_shoe'])){
            $length = count($_SESSION['cart_shoe']);
            echo $length;
        }else{
            echo "0";
        }
        ?></p>
    </div>

    <div class="cart-pay-content-right-price">
        <span>Tổng tiền hàng</span>
        <p><?php echo number_format($sumall).'đ' ?></p>
    </div>

    <div class="cart-pay-content-right-end">
        <span>Thành tiền</span>
        <p><?php echo number_format($sumall).'đ' ?></p>
    </div>
    
    <?php
    if(isset($_SESSION['user'])){
    ?>                
    <div class="cart-pay-content-right-submit">
        <a href="indexOrder.php?sum=<?php echo $sumall ?>&sl=<?php echo $tongSL ?>">Đặt hàng</a>
    </div>

    <?php
    }else {
    ?>
    <div class="cart-pay-content-right-submit">
        <a href="indexLogin.php?pages/content/login.php">Đăng nhập trước khi đặt hàng</a>
    </div>
    <?php
    }
}
    ?>
    