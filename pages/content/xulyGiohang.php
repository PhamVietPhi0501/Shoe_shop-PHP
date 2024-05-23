<?php
session_start();
include '../../admin/config/config.php';
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
        header("Location:xulyGiohang.php ");
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
        header("Location:xulyGiohang.php ");
    }
}


// xóa một sản phẩm
if (isset($_SESSION['cart_shoe']) && isset($_GET['id']) && isset($_GET['size'])) {
    $id = $_GET['id'];
    $size = $_GET['size'];
    $msp = $_GET['msp'];
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        if ($cart_item['id'] != $id || $cart_item['size'] != $size) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'], 'gia' => $cart_item['gia'], 'size' => $cart_item['size'], 'hinh' => $cart_item['hinh'], 'msp' => $cart_item['msp']
            );
        }
        $_SESSION['cart_shoe'] = $product;
        header("Location:xulyGiohang.php ");
    }
}
?>


<?php

if (isset($_SESSION['cart_shoe'])) {
?>
    <div class="content-left-bottom-header">
        <h3>Giỏ hàng của bạn:</h3>
        <span><?php if (isset($_SESSION['cart_shoe'])) {
                    $length = count($_SESSION['cart_shoe']);
                    echo $length;
                } else {
                    echo "0";
                } ?> sản phẩm
        </span>
    </div>
    <?php
    $sumall = 0;
    $i = 0;
    foreach ($_SESSION['cart_shoe'] as $item) {
        $sumItem = $item['soluong'] * $item['gia'];
        $sumall += $sumItem;
        $i++;
        $sql = "SELECT * FROM tbl_size WHERE sizeGiay='$item[size]' AND masanpham='$item[msp]' ";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $khohang = $row['soluong'];
        }
    ?>
        <div id="<?php echo $khohang ?>" class="content-left-bottom-product">
            <a href="">
                <img src="admin/modules/qlSanPham/uploads/<?php echo $item['hinh'] ?>" alt="">
            </a>
            <div class="content-left-bottom-product-info">
                <p><?php echo $item['tensanpham'] ?></p>
                <div class="masanpham" id="<?php echo $item['msp'] ?>"><?php echo $item['msp'] ?></div>
                <div class="content-left-bottom-product-info-khohang">
                    <!-- <span>Kho hàng: <?php echo $khohang ?></span>  -->
                </div>
                <span class="size" id="<?php echo $item['size'] ?>">Size: <?php echo $item['size'] ?></span>
            </div>
            <div id="<?php echo $item['msp'] ?>" class="content-left-bottom-product-price">
                <div class="content-left-quantity">
                    <a id="<?php echo $item['id'] ?>" class="content-left-quantity-giam" href="">-</a>
                    <input type="text" class="amount" id="amount" name="amount" value="<?php echo $item['soluong'] ?>">
                    <a id="<?php echo $item['id'] ?>" class="content-left-quantity-tang plus-btn" href="">+</a>
                </div>
                <div class="content-left-price">
                    <p><?php echo number_format($sumItem) . 'đ' ?></p>
                    <a id="<?php echo $item['id'] ?>" class="content-left-quantity-xoa" href=""><i class=" fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    <a href="index.php" class="back-shop">
        <i class="fa-solid fa-arrow-left"></i>
        <p>Tiếp tục mua sắm</p>
    </a>
<?php
} else {
?>
    <div class="no-cart-pay-content">
        <a href="index.php">Không có sản phẩm<i class="fa-solid fa-person-walking-arrow-loop-left"></i></a>
    </div>
<?php
}


?>

<script>
    var thongbao = $('.add-product a');
    thongbao2 = $('.thongbao');
    thongBaoDiv = $('.thongbao-div');
    closeThongbao = $('.thongbao-div-close i');

    closeThongbao.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    thongbao2.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    thongbao.css('display', 'block')



    $('.content-left-quantity-tang').click(function(e) {

        e.preventDefault()

        function getTangId() {
            id = e.target.id
            return id;
        }

        function getSize() {
            let getSizeParent = e.target.parentElement.parentElement.parentElement;
            for (const sizeParentChild of getSizeParent.children) {
                for (const sizeChild of sizeParentChild.children) {
                    if ($(sizeChild).hasClass('size')) {
                        size = sizeChild.id
                        return size
                    }
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
                    soluong = $(getSoluong).val()
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
                $(".cart-pay-content-left-bottom").load(`pages/content/xulyGiohang.php?tang=${id}&size=${size}&msp=${msp}`);
            } else {
                $(".cart-pay-content-left-bottom").load(`pages/content/xulyGiohang.php?tang=${id}&size=${size}&msp=${msp}&run=run`);
            }
        }
        handle(getTangId, getSize, getMsp, getSoluong, khohang)
    })

    // Giảm sản phẩm
    $('.content-left-quantity-giam').click(function(e) {
        e.preventDefault();

        function getTangId() {
            id = e.target.id
            return id;
        }

        function getSize() {
            let getSizeParent = e.target.parentElement.parentElement.parentElement;
            for (const sizeParentChild of getSizeParent.children) {
                for (const sizeChild of sizeParentChild.children) {
                    if ($(sizeChild).hasClass('size')) {
                        size = sizeChild.id
                        return size
                    }
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
                    soluong = $(getSoluong).val()
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
            $(".cart-pay-content-left-bottom").load(`pages/content/xulyGiohang.php?giam=${id}&size=${size}&msp=${msp}&run=run`);
        }
        handle(getTangId, getSize, getMsp, getSoluong, khohang)
    })

    // Xóa sản phẩm
    $('.content-left-quantity-xoa').click(function(e) {
        e.preventDefault();

        function getTangId() {
            id = e.target.id
            return id;
        }

        function getSize() {
            let getSizeParent = e.target.parentElement.parentElement.parentElement;
            for (const sizeParentChild of getSizeParent.children) {
                for (const sizeChild of sizeParentChild.children) {
                    if ($(sizeChild).hasClass('size')) {
                        size = sizeChild.id
                        return size
                    }
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
                    soluong = $(getSoluong).val()
                    return soluong;
                }
            }
        }
        const size = e.currentTarget.parentElement.parentElement.parentElement
        for (const child of size.children) {
            if (child.classList.contains('content-left-bottom-product-info')) {
                for (const child1 of child.children) {
                    if (child1.classList.contains('size')) {
                        $(".cart-pay-content-left-bottom").load(`pages/content/xulyGiohang.php?id=${e.currentTarget.id}&size=${child1.id}`);
                    }
                }
            }
        }
    })

    $(".cart-pay-content-left-top").load(`pages/content/xulyGiohang3.php`);
    $(".cart-pay-content-right").load(`pages/content/xulyGiohang1.php`);

    $('.amount').click(function(e) {
        function khohang() {
            return e.target.parentElement.parentElement.parentElement.id
        }

        function handleInput(khohang) {
            khohang = parseInt(khohang())
            inputClick = e.target;
            saveInputClick = $(inputClick).val();
            $(inputClick).val(saveInputClick);
            $(inputClick).val("");
            $(inputClick).blur(function() {
                if ($(inputClick).val() == "") {
                    $(inputClick).val(saveInputClick);
                }
            })

            $(inputClick).on('input', function() {
                if (parseInt($(inputClick).val()) >= khohang) {
                    checkKho = $(inputClick).val(khohang)
                    console.log($(checkKho).val())
                    if ($(checkKho).val() > 20) {
                        $(inputClick).val(20)
                        thongbao2.css('display', 'flex');
                        thongBaoDiv.css('display', 'block');
                        setTimeout(function() {
                            thongbao2.css('display', 'none')
                            thongBaoDiv.css('display', 'none')
                        }, 2000)
                        $('.thongbao-div-text span').text(`Không thể đặt lượng hàng lớn hơn 20`)
                    } else {
                        $(inputClick).val(khohang)
                        thongbao2.css('display', 'flex');
                        thongBaoDiv.css('display', 'block');
                        setTimeout(function() {
                            thongbao2.css('display', 'none')
                            thongBaoDiv.css('display', 'none')
                        }, 2000)
                        $('.thongbao-div-text span').text(`Không đủ sản phẩm trong kho`)
                    }
                }
                if (isNaN($(inputClick).val())) {
                    $(inputClick).val(saveInputClick);
                }

            })

        }
        handleInput(khohang)
    })
</script>