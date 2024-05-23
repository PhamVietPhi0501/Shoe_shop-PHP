<?php
session_start();
include('../../admin/config/config.php');

if (isset($_POST['themgiohang'])) {
    $id = $_GET['id'];
    // $soluong = $_POST['amount'];
    $size = $_POST['size'];
    $msp = $_GET['msp'];

    // $id = $_POST['id'];
    // $soluong = $_POST['soluong'];
    // $size = $_POST['size'];
    // $msp = $_POST['msp'];
    $sql_soluong = "SELECT * FROM tbl_size WHERE masanpham='$msp' AND sizeGiay='$size' ";
    $query_soluong = mysqli_query($mysqli, $sql_soluong);
    while ($row_soluong = mysqli_fetch_array($query_soluong)) {
        $checkSoluong = $row_soluong['soluong'];
    }

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row['loaihang'] != 'new') {
        $gia = $row['gia'] * ($row['loaihang'] / 100);
    } else {
        $gia = $row['gia'];
    }
    
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        $cart_item['soluong'];
    }
    if ($checkSoluong > $cart_item['soluong']) {
        $soluong = $_POST['amount'];
        if ($checkSoluong < ($soluong + $cart_item['soluong'])) {
            $soluong = $checkSoluong - $cart_item['soluong'];
        } else {
            $soluong = $_POST['amount'];
        }
        if ($row) {
            $new_product = array(array(
                'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'gia' => $row['gia'], 'size' => $size, 'hinh' => $row['hinh'], 'msp' => $msp
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
        header("Location:../../indexDetail.php?id=$id&MSP=$msp");
    }
}

?>

<?php


if (isset($_POST['muahang'])) {
    $id = $_GET['id'];
    $size = $_POST['size'];
    // $soluong = $_POST['amount'];
    $msp = $_GET['msp'];
    $sql_soluong = "SELECT * FROM tbl_size WHERE masanpham='$msp' AND sizeGiay='$size' ";
    $query_soluong = mysqli_query($mysqli, $sql_soluong);
    while ($row_soluong = mysqli_fetch_array($query_soluong)) {
        $checkSoluong = $row_soluong['soluong'];
    }

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    foreach ($_SESSION['cart_shoe'] as $cart_item) {
        $cart_item['soluong'];
    }
    if ($checkSoluong > $cart_item['soluong']) {
        $soluong = $_POST['amount'];
        if ($checkSoluong < ($soluong + $cart_item['soluong'])) {
            $soluong = $checkSoluong - $cart_item['soluong'];
        } else {
            $soluong = $_POST['amount'];
        }
        if ($row) {
            $new_product = array(array(
                'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'gia' => $row['gia'], 'size' => $size, 'hinh' => $row['hinh'], 'msp' => $msp
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
    }
    header("Location:../../indexCart.php");
}

?>



<?php


if (isset($_POST['price-cart-submit'])) {
    $id = $_GET['id'];
    $soluong = 1;
    $size = $_POST['price-cart-submit'];
    $msp = $_GET['msp'];
    $danhmuc = $_GET['danhmuc'];

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'gia' => $row['gia'], 'size' => $size, 'hinh' => $row['hinh'], 'msp' => $msp
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
    header("Location:../../indexDetail.php?id=$id&MSP=$msp&danhmuc=$danhmuc");
}

if (isset($_POST['price-cart-submit-sell'])) {
    $id = $_GET['id'];
    $soluong = 1;
    $size = $_POST['price-cart-submit'];
    $msp = $_GET['msp'];
    $danhmuc = $_GET['danhmuc'];

    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row['loaihang'] != 'new') {
        $gia = $row['gia'] * ($row['loaihang'] / 100);
    } else {
        $gia = $row['gia'];
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
    header("Location:../../indexDetail.php?id=$id&MSP=$msp&danhmuc=$danhmuc");
}

?>