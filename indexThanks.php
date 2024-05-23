
<?php
require 'mail/send.php';
include('admin/config/config.php');
session_start();


if(isset($_GET['partnerCode'])){
    $date = date('Y-m-d');
    $code_order = "MS".rand(0,99999);
    $_thanhtoan = 'momo';
    $id_khachhang = $_SESSION['user'];
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['partnerCode'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['partnerCode'];


    if(isset($_GET['diachi'])){
        $id = $_GET['diachi'];
        $getSoDiaChi = "SELECT * FROM tbl_sodiachi,province,district,wards 
        WHERE id_dangky=$id_khachhang 
        AND tbl_sodiachi.province_id=province.province_id 
        AND tbl_sodiachi.district_id=district.district_id
        AND tbl_sodiachi.wards_id=wards.wards_id 
        AND id_diachi='$_GET[diachi]' ";
        $query_SoDiaChi = mysqli_query($mysqli,$getSoDiaChi);
        while($row_diachi = mysqli_fetch_array($query_SoDiaChi)){
           $diachi = $row_diachi['addres'].','.$row_diachi['name_wards'].','.$row_diachi['name_district'].','.$row_diachi['name'] ;
        }
        $insert_cart = "INSERT INTO tbl_cart(id_khachhang,id_diachi,code_cart,cart_status,pay_cart,cart_date_time,addres) 
        VALUE('".$id_khachhang."','".$id."','".$code_order."',2,'".$_thanhtoan."','".$date."','".$diachi."' ) ";
    }
    if(isset($_GET['dangky'])){
        $id = $_GET['dangky'];
        $getSoDiaChi = "SELECT * FROM tbl_dangky,province,district,wards 
        WHERE id_dangky=$id_khachhang 
        AND tbl_dangky.province_id=province.province_id 
        AND tbl_dangky.district_id=district.district_id
        AND tbl_dangky.wards_id=wards.wards_id 
        AND id_dangky='$_GET[dangky]' ";
        $query_SoDiaChi = mysqli_query($mysqli,$getSoDiaChi);
        while($row_diachi = mysqli_fetch_array($query_SoDiaChi)){
           $diachi = $row_diachi['addres'].','.$row_diachi['name_wards'].','.$row_diachi['name_district'].','.$row_diachi['name'] ;
        }
        $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,pay_cart,cart_date_time,addres) 
        VALUE('".$id."','".$code_order."',2,'".$_thanhtoan."','".$date."','".$diachi."' ) ";
    }
    $insert_cartQuery = mysqli_query($mysqli,$insert_cart);
    if($insert_cart) {
        foreach($_SESSION["cart_shoe"] as $value){
            $id_sanpham = $value['id'];
            $size = $value['size'];
            $soluong = $value['soluong'];           
            $msp = $value['msp'];

            $insert_cartDetails = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,size,soluongmua) 
            VALUE('".$id_sanpham."','".$code_order."','".$size."','".$soluong."' ) ";
            mysqli_query($mysqli,$insert_cartDetails);
            //Trừ số lượng sản phẩm
            $trusoluong = "UPDATE tbl_size SET soluong=soluong-'$soluong' WHERE masanpham='$msp' AND sizeGiay='$size' ";
            mysqli_query($mysqli,$trusoluong);
        }      
        unset($_SESSION['cart_shoe']);
        // header("Location:../../indexThanks.php");
        $tieude = "<h2>Đặt hàng thành công đơn hàng của quý khách sẻ được chuyển đến trong vài ngày tới</h2>";
        $noidung = "<h1>Cảm ơn quý khách</h1>" ;
        $maildat = $_SESSION['mail'];

        $mail = new mailer();
        $mail->dathang($tieude,$noidung,$maildat);
    }

    // thong ke
    $select_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat='$date' ";
    $query_thongke = mysqli_query($mysqli,$select_thongke);
    if($query_thongke->num_rows > 0){
        $amount;
        $soluongGet = $_GET['sl'];
        // echo $date;
        while($rowtthongke = $query_thongke->fetch_assoc()){
            $updateTien = $rowtthongke['tien'] + intval($amount);
            $updateSL = $rowtthongke['soluong'] + intval($soluongGet);
        }
        $select_thongke = "UPDATE tbl_thongke SET tien='".$updateTien."', soluong='".$updateSL."' WHERE ngaydat='$date' ";
        $query_thongkeUpdate = mysqli_query($mysqli,$select_thongke);
    }else {
        echo $date;
        $soluongGet = $_GET['sl'];
        $sql_thongke = "INSERT INTO tbl_thongke(ngaydat,tien,soluong) VALUES('".$date."','".$amount."','".$soluongGet."') ";
        $query_thongke = mysqli_query($mysqli,$sql_thongke);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="css/class.css">
    <link rel="stylesheet" href="css/base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>My Shoe</title>
</head>
<body>
    <div class="shop">
        <?php
        //session_destroy();
        include("admin/config/config.php");
        include("pages/header.php");
        include("pages/messenger.php");
        ?>

        <div class="grid wide">
            <div class="thanks">
                <h1>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</h1>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
            
        </div>
        
    </div>

   <!-- <script src="js/index_js.js"></script>  -->
</body>
</html>