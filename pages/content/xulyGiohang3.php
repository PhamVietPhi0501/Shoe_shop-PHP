<?php
session_start();
if(isset($_SESSION['cart_shoe'])){
?>
<ul>
    <li>Giỏ hàng</li>
    <li>Đặt hàng</li>
    <li>Thanh toán</li>
</ul>
<?php
}
?>