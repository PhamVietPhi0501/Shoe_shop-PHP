<?php
include('../../admin/config/config.php');
session_start();
$checkSoLuong = $_GET['checkSoLuong'];
$sizeClick = $_GET['sizeClick'];
$msp = $_GET['msp'];

if (isset($_SESSION['cart_shoe'])) {
    function getSoluong()
    {
        foreach ($_SESSION['cart_shoe'] as $cart_item) {
            if ($cart_item['msp'] == $_GET['msp'] && $cart_item['size'] == $_GET['sizeClick']) {
                return $cart_item['soluong'];
            }
        }
    }

    $check = "SELECT * FROM tbl_size WHERE masanpham='$msp' AND sizeGiay='$sizeClick' ";
    $query = mysqli_query($mysqli, $check);

    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = [
            'soluong' => $row['soluong'],
            'getCartSL' => getSoluong()
        ];
    }
}

    $check = "SELECT * FROM tbl_size WHERE masanpham='$msp' AND sizeGiay='$sizeClick' ";
    $query = mysqli_query($mysqli, $check);

    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = [
            'soluong' => $row['soluong'],
        ];
    }
    
echo json_encode($data);
