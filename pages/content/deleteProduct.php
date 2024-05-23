<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<?php
session_start();
//session_destroy();
include('../../admin/config/config.php');

if (isset($_GET['giam'])) {
    $id = $_GET['giam'];
    $size = $_GET['size'];
    $msp = $_GET['msp'];
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        if ($cart_item['id'] != $id || $cart_item['size'] != $size) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $msp
            );
            $_SESSION['cart_shoe'] = $product;
        } else {
            $giamsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1 && isset($_GET['run'])) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                    'soluong' => $giamsoluong, 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
                );
            }
            $_SESSION['cart_shoe'] = $product;
        }
        header('Location:deleteProduct.php');
    }
}

if (isset($_GET['tang'])) {
    $id = $_GET['tang'];
    $size = $_GET['size'];
    $msp = $_GET['msp'];
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        if ($cart_item['id'] != $id || $cart_item['size'] != $size) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $msp
            );
            $_SESSION['cart_shoe'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] < 20 && isset($_GET['run'])) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                    'soluong' => $tangsoluong, 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
                );
            }
            $_SESSION['cart_shoe'] = $product;
        }
        header('Location:deleteProduct.php');
    }
}


// xóa một sản phẩm
if (isset($_SESSION['cart_shoe']) && isset($_GET['id']) && isset($_GET['size'])) {
    $id = $_GET['id'];
    $size = $_GET['size'];
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        if ($cart_item['id'] != $id || $cart_item['size'] != $size) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
            );
        }
        $_SESSION['cart_shoe'] = $product;
        header('Location:deleteProduct.php');
    }
}


if (isset($_GET['deleteAll']) && $_GET['deleteAll'] == 1) {
    unset($_SESSION['cart_shoe']);
    //header('Location:../../pages/content/giohang.php');
}
?>

<div class="modal-header">
    <h4>Giỏ hàng</h4>
    <span class="modal-header-number"><?php
                                        if (isset($_SESSION['cart_shoe'])) {
                                            $length = count($_SESSION['cart_shoe']);
                                            echo $length;
                                        } else {
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
    if (isset($_SESSION['cart_shoe'])) {
        $sum = 0;
        $sumItem = 0;
        foreach ($_SESSION['cart_shoe'] as $item) {
            $sumItem = $item['gia'] * $item['soluong'];
            $sum += $sumItem;
            $sql = "SELECT * FROM tbl_size WHERE sizeGiay='$item[size]' AND masanpham='$item[msp]' ";
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
                $khohang = $row['soluong'];
            }

    ?>
            <div id="<?php echo $khohang ?>" class="product-cart">
                <div class="modal-product-img">
                    <img class="product-img" src="admin/modules/qlSanPham/uploads/<?php echo $item['hinh'] ?>" alt="">
                </div>
                <div id="<?php echo $item['msp']  ?>" class="modal-information">
                    <h4><?php echo $item['tensanpham'] ?></h4>
                    <span class="modal-informatio-size" id="<?php echo $item['size'] ?>">Size: <?php echo $item['size'] ?></span>
                    <div class="modal-information-add">
                        <a class="modal-information-giam" id="<?php echo $item['id'] ?>" href="">-</a>
                        <p class="modal-information-quantity amount"><?php echo $item['soluong'] ?></p>
                        <a class="modal-information-tang" id="<?php echo $item['id'] ?>" href="">+</a>
                    </div>
                </div>
                <div class="modal-price">
                    <p><?php echo number_format($sumItem) . 'đ' ?></p>
                    <?php
                    $sql_giamgia = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$item[id]' AND loaihang!='new' ";
                    $giamgia_query = mysqli_query($mysqli, $sql_giamgia);
                    while ($row_giamgia = mysqli_fetch_array($giamgia_query)) {
                    ?>
                        <p class="giamgia"><?php echo number_format($item['soluong'] * $row_giamgia['gia']) . 'đ' ?></p>
                    <?php
                    }
                    ?>
                    <a class="modal-price-link" id="<?php echo $item['id'] ?>" href="">Xóa</a>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>

<?php
if (isset($_SESSION['cart_shoe'])) {
?>
    <div class="modal-total">
        <span>Tổng cộng: <p class="modal-total-item"><?php if (isset($_SESSION['cart_shoe'])) {
                                                            echo number_format($sum) . 'đ';
                                                        } else {
                                                            echo '0đ';
                                                        } ?>
            </p></span>
    </div>

    <div class="modal-delete">
        <a id="modal-delete-link" href="">Xóa tất cả</a>
    </div>

    <div class="modal-seen">
        <a href="indexCart.php">XEM GIỎ HÀNG</a>
    </div>
<?php
}
?>
<section class="thongbao open">
    <div class="thongbao-div">
        <div class="thongbao-div-close">
            <i class="fa-regular fa-circle-xmark"></i>
        </div>
        <div class="thongbao-div-cart">
            <i class="fa-solid fa-cart-plus"></i>
        </div>
        <div class="thongbao-div-text">
            <span>Thêm giỏ hàng thành công</span>
        </div>
    </div>
</section>
<script>
    var thongbao = $('.add-product a');
    thongbao2 = $('.thongbao');
    thongBaoDiv = $('.thongbao-div');
    closeThongbao = $('.thongbao-div-close i');

    $('#modal-delete-link').click(function(e) {
        e.preventDefault();
        $(".modal").load("pages/content/deleteProduct.php?deleteAll=1");
        const headerNumberCart = document.querySelector('.header-item-number');
        headerNumberCart.innerHTML = '0';
    })


    $('.modal-information-giam').click(function(e) {
        e.preventDefault();
        function getTangId() {
            id = e.target.id
            return id;
        }

        function getSize() {
            let getSizeParent = e.target.parentElement.parentElement;
            for (const sizeParentChild of getSizeParent.children) {
                if ($(sizeParentChild).hasClass('modal-informatio-size')) {
                        size = sizeParentChild.id
                        return size
                    }
                
            }
        }

        function getMsp() {
            let getMsp = e.target.parentElement.parentElement
            msp = getMsp.id
            return msp;
        }

        function getSoluong() {
            let getSoluongParent = e.target.parentElement
            for (const getSoluong of getSoluongParent.children) {
                if ($(getSoluong).hasClass('amount')) {
                    soluong = $(getSoluong).text()
                    return soluong;
                }
            }
        }

        function khohang() {
            return e.target.parentElement.parentElement.parentElement.id
        }

        function handle(id, size, msp, soluong, khohang) {
            id = id()
            size = size()
            msp = msp()
            soluong = soluong()
            khohang = parseInt(khohang())
            $(".modal").load(`pages/content/deleteProduct.php?giam=${id}&size=${size}&msp=${msp}&run=run`);
        }
        handle(getTangId, getSize, getMsp, getSoluong, khohang)
    })

    $('.modal-information-tang').click(function(e) {
        e.preventDefault()
        function getTangId() {
            id = e.target.id
            return id;
        }

        function getSize() {
            let getSizeParent = e.target.parentElement.parentElement;
            for (const sizeParentChild of getSizeParent.children) {
                if ($(sizeParentChild).hasClass('modal-informatio-size')) {
                        size = sizeParentChild.id
                        return size
                    }
                
            }
        }

        function getMsp() {
            let getMsp = e.target.parentElement.parentElement
            msp = getMsp.id
            return msp;
        }

        function getSoluong() {
            let getSoluongParent = e.target.parentElement
            for (const getSoluong of getSoluongParent.children) {
                if ($(getSoluong).hasClass('amount')) {
                    soluong = $(getSoluong).text()
                    return soluong;
                }
            }
        }

        function khohang() {
            return e.target.parentElement.parentElement.parentElement.id
        }

        function handle(id, size, msp, soluong, khohang) {
            id = id()
            size = size()
            msp = msp()
            soluong = soluong()
            khohang = parseInt(khohang())
            if (soluong >= khohang) {
                thongbao2.css('display', 'flex');
                thongBaoDiv.css('display', 'block');
                setTimeout(function() {
                    thongbao2.css('display', 'none')
                    thongBaoDiv.css('display', 'none')
                }, 2000)
                $('.thongbao-div-text span').text(`Không đủ sản phẩm trong kho`)
                $('.modal').load(`pages/content/deleteProduct.php?tang=${id}&size=${size}&msp=${msp}`);
            } else {
                $('.modal').load(`pages/content/deleteProduct.php?tang=${id}&size=${size}&msp=${msp}&run=run`);
            }
            if (soluong == 20) {
            thongbao2.css('display', 'flex');
            thongBaoDiv.css('display', 'block');
            setTimeout(function() {
                thongbao2.css('display', 'none')
                thongBaoDiv.css('display', 'none')
            }, 2000)
            $('.thongbao-div-text span').text(`Không thể đặt lượng hàng lớn hơn 20`)
            }
        }
        
        handle(getTangId, getSize, getMsp, getSoluong, khohang)
    })

    $('.modal-price-link').click(function(e) {
        e.preventDefault();
        const ParentOfe = e.target.parentElement.parentElement;

        // lặp để lấy size của thẻ được click vào
        for (const child of ParentOfe.children) {

            //Kiểm tra class modal-information
            if (child.classList.contains('modal-information')) {

                // Nếu có thì lặp tiếp để lấy ra size
                for (const child_modal_information of child.children) {

                    //Kiểm tra và lấy ra size
                    if (child_modal_information.classList.contains('modal-informatio-size')) {

                        //Gửi qua trang xữ lý với id=e.target.id và size=child_modal_information.innerHTML
                        $('.modal').load(`pages/content/deleteProduct.php?id=${e.target.id}&size=${child_modal_information.id}`);

                        const lap = document.querySelectorAll('.product-cart');

                        lap.forEach(function(e, index) {
                            const headerNumberCart = document.querySelector('.header-item-number');
                            headerNumberCart.innerHTML = index;
                        })
                    }
                }
            }
        }
    })
</script>