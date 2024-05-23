<?php
include('../../admin/config/config.php');
$sql_seen = "SELECT * FROM tbl_dangky WHERE id_dangky='$_SESSION[user]' ";
$sql_seenQuery = mysqli_query($mysqli,$sql_seen);

?>
<div class="cart-pay">
    <div class="grid wide">
        <div class="cart-pay-content">
            <div class="cart-pay-content-left">

                <div class="cart-pay-content-left-top">
                    <ul>
                        <li>Giỏ hàng</li>
                        <li class="cart-pay-active" >Đặt hàng</li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
                <div class="cart-pay-content-left-bottom">
                    <div class="content-left-bottom-header">
                        <h3>Địa chỉ giao hàng</h3>
                    </div> 
                    <div class="content-left-bottom-address">
                        <div class="content-left-bottom-address-header">
                            <h4>Phi</h4>
                            <a href="">Chọn địa chỉ khác</a>
                        </div>
                        <?php
                        while($row = mysqli_fetch_array($sql_seenQuery)){
                        ?>
                        <div class="content-left-bottom-address-phone">
                            <span>Điện thoại:</span>
                            <p><?php echo $row['phone'] ?></p>
                        </div>
                        <div class="content-left-bottom-address-order">
                            <span>Địa chỉ:</span>
                            <p><?php echo $row['addres'] ?></p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <a href="indexCart.php" class="back-shop">
                    <i class="fa-solid fa-arrow-left"></i>
                    <p>Giỏ hàng</p>
                </a>
            </div>

            <div class="cart-pay-content-right">
                <div class="cart-pay-content-right-name">
                    <h4>Tóm tắt đơn hàng</h4>
                </div>
                <div class="cart-pay-content-right-product">
                    <span>Tổng tiền hàng</span>
                    <p><?php echo number_format($_GET['sum']).'đ' ?></p>
                </div>
                <div class="cart-pay-content-right-price">
                    <span>Phí vận chuyển</span>
                    <p>0đ</p>
                </div>
                <div class="cart-pay-content-right-end">
                    <span>Tiền thanh toán</span>
                    <p><?php echo number_format($_GET['sum']).'đ' ?></p>
                </div>
                <div class="cart-pay-content-right-submit">
                    <a href="cart_thanhtoan.php">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>