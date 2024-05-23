<?php
include('../../admin/config/config.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $soluong = $_GET['amount'];
    $size = $_GET['size'];
    $msp = $_GET['msp'];

    // $id = $_POST['id'];
    // $soluong = $_POST['soluong'];
    // $size = $_POST['size'];
    // $msp = $_POST['msp'];

    if(isset($_SESSION['cart_shoe']) || $id = $_GET['id']){
    $sql_soluong = "SELECT * FROM tbl_size WHERE masanpham='$msp' AND sizeGiay='$size' ";
    $query_soluong = mysqli_query($mysqli, $sql_soluong);
    while ($row_soluong = mysqli_fetch_array($query_soluong)) {
        $checkSoluong = intval($row_soluong['soluong']);
    }

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row['loaihang'] != 'new') {
        $sellGiam = intval($row['gia']) * (intval($row['loaihang'])/100);
        $gia = intval($row['gia']) - $sellGiam;
    } else {
        $gia = $row['gia'];
    }
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        if($cart_item['msp'] == $msp){
            $SLCart = intval($cart_item['soluong']);
        }
    }
    }
    $msp;
    $checkSoluong;
    $SLCart;
    if ($checkSoluong > $SLCart) {
        $soluong = intval($_GET['amount']);
        if ($checkSoluong < ($soluong + $SLCart)) {
            $soluong = $checkSoluong - $SLCart;
        } else {
            $soluong = intval($_GET['amount']);
        }
        if ($row) {
            $new_product = array(array(
                'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'gia' => $gia, 'size' => $size, 'hinh' => $row['hinh'], 'msp' => $msp
            ));

            if (isset($_SESSION['cart_shoe'])) {
                $found = false;

                foreach ($_SESSION['cart_shoe'] as $cart_item) {
                    if ($cart_item['id'] == $id && $cart_item['size'] == $size) {
                        $product[] = array(
                            'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                            'soluong' => $cart_item['soluong'] + $soluong, 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
                        );
                        $found = true;
                    } else {
                        $product[] = array(
                            'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                            'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
                        );
                    }
                }
                if ($found == false) {
                    //Liên kết dữ liệu mới và củ  

                    $_SESSION['cart_shoe'] = array_merge($product, $new_product);
                } else {
                    //không có dữ liệu mới thì giữ nguyên

                    $_SESSION['cart_shoe'] = array_merge($product);
                }
            } else {
                $_SESSION['cart_shoe'] = $new_product;
            }
        }
        // header("Location:../../indexDetail.php?SIZE=$id&MSP=$msp");
        header("Location:detailHeader.php");    
    }
}
?>
<div class="grid wide">
    <ul class="header-list">
        <li class="header-item">
            <span>Kết nối</span>
            <a href="https://www.facebook.com/phi.pv.9/" class="header-item-icon"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/phamviet_phi/" class="header-item-icon"><i class="fa-brands fa-instagram"></i></a>
            <span class="header-information padding-left">Về chúng tôi
                <div class="header-information-list">
                    <a href="https://www.messenger.com/t/263448680189395" class="header-information-link">Về MY SHOE</a>
                    <a href="" class="header-information-link">Shoe Exhibition</a>
                    <a href="" class="header-information-link">Hoạt động cộng đồng</a>
                </div>
            </span>

        </li>
        <li class="header-item">
            <label for="header-item-input">
                <i class="fa-solid fa-bars"></i>
            </label>
            <input type="radio" id="header-item-input" name="header-item">
            <input type="radio" id="header-item-input1" name="header-item">
            <div class="header-item-list-icon">
                <div class="header-item-list-icon-top">
                    <div class="header-search header-search2">
                        <form action="indexSearch.php?pages/content/search.php" method="POST">
                            <button name="search" class="header-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input type="text" autocomplete="off" name="key" placeholder="TÌM KIẾM SẢN PHẨM">
                        </form>
                    </div>
                    <div class="header-item-list-icon-close">
                        <label for="header-item-input1">
                            <i class="fa-solid fa-xmark"></i>
                        </label>
                    </div>
                </div>
                <div class="header-item-list-icon-bottom">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/phi.pv.9/" class="header-item-icon"><i class="fa-brands fa-facebook"></i>Đến Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/phamviet_phi/" class="header-item-icon"><i class="fa-brands fa-instagram"></i>Đên Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="header-item">
            <a href="../shoe_php/index.php">
                <img class="header-item-mylogo" src="image/my_logo.jpg" alt="">
            </a>
        </li>
        <li class="header-item display-flex">
            <div class="header-search">
                <form action="indexSearch.php?pages/content/search.php" method="POST">
                    <button name="search" class="header-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" autocomplete="off" name="keyPC" placeholder="TÌM KIẾM SẢN PHẨM">
                </form>
            </div>
            <a href="" class="header-item-icon  header-infomationAdmin"><i class="fa-solid fa-headphones"></i>
                <div class="infomationAdmin">
                    <div class="infomationAdmin-header">
                        <span>Trợ giúp</span>
                    </div>

                    <div class="infomationAdmin-content">
                        <i class="fa-solid fa-phone-volume"></i>
                        <span>0914608260</span>
                    </div>

                </div>
            </a>



            <?php if (isset($_SESSION['user'])) {
            ?>
                <span href="" class="header-item-icon header-information-icon-link"><i class="fa-regular fa-user"></i>
                    <div class="header-information-list-icon">
                        <div class="header-information-list-icon-name">
                            <h4>Tài khoản của tôi</h4>
                        </div>
                        <ul class="header-information-list-bottom">
                            <li>
                                <a href="indexQldonhang.php?page=1">
                                    <i class="fa-regular fa-user"></i>
                                    <span>Thông tin tài khoản</span>
                                </a>
                            </li>
                            <li>
                                <a href="indexQldonhang.php?page=2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Quản lý đơn hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="indexQldonhang.php?page=3">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>Thông tin địa chỉ</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?logout=1">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </span>
            <?php
            } else {
            ?>
                <a href="indexLogin.php?pages/content/login.php" class="header-item-icon"><i class="fa-regular fa-user"></i></a>
            <?php
            }
            ?>


            <label for="modal-click">
                <span class="header-item-icon"><i class="fa-solid fa-bag-shopping padding-4px"></i></span>
            </label>

            <span class="header-item-number">
                <?php
                if (isset($_SESSION['cart_shoe'])) {
                    $length = count($_SESSION['cart_shoe']);
                    echo $length;
                } else {
                    echo "0";
                }
                ?>
            </span>
        </li>
        <input id="modal-click" name="test" type="radio">
        <input id="modal-click1" name="test" type="radio">
        <?php
        include('../../pages/content/giohang.php');
        ?>
    </ul>
</div>

<script>
    $('.header-search i').click(function(e) {
        if ($('input[name="keyPC"]').val() == "") {
            e.preventDefault();
        }
    })

    $('input[name="keyPC"]').keypress(function(e) {
        if (event.keyCode === 13) {
            // Kiểm tra giá trị của thẻ input
            var inputValue = $(this).val();
            if (inputValue.trim() === '') {
                // Nếu thẻ input rỗng, ngăn chặn sự kiện mặc định của phím Enter
                e.preventDefault();
            }
        }
    })

    $('.modal-price-link').click(function(){
        $('.thongbao-div-text span').text(`Thêm giỏ hàng thành công`)
    })
</script>