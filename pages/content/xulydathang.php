<?php
session_start();
require '../../carbon/autoload.php';

use Carbon\Carbon;

require '../../mail/send.php';
$date_time = Carbon::now('Asia/Ho_Chi_Minh');
$date = date('Y-m-d');
include('../../admin/config/config.php');
if($_POST['thanhtoan'] == 'tienmat'){
    $_thanhtoan = $_POST['thanhtoan'];
    $code_order ="MS".rand(0,99999);
    $tien = $_GET['sum'];
    $id_khachhang = $_SESSION['user'];
    $iddiachi = "";
    
    if(isset($_GET['diachi'])){
        $iddiachi = $_GET['diachi'];
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
        VALUE('".$id_khachhang."','".$iddiachi."','".$code_order."',1,'".$_thanhtoan."','".$date_time."','".$diachi."' ) ";
    }
    if(isset($_GET['dangky'])){
        echo 'vo day';
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
        $insert_cart = "INSERT INTO tbl_cart(id_khachhang,id_diachi,code_cart,cart_status,pay_cart,cart_date_time,addres) 
        VALUE('".$id_khachhang."','','".$code_order."',1,'".$_thanhtoan."','".$date_time."','".$diachi."' ) ";
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
        header("Location:../../indexThanks.php");
        $tieude = "<p>Đặt hàng thành công đơn hàng của quý khách sẻ được chuyển đến trong vài ngày tới</p>";
        $noidung = "<h1>Cảm ơn quý khách</h1>" ;
        $maildat = $_SESSION['mail'];

        $mail = new mailer();
        $mail->dathang($tieude,$noidung,$maildat);
    }

    // thong ke
    $select_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat='$date' ";
    $query_thongke = mysqli_query($mysqli,$select_thongke);
    if($query_thongke->num_rows > 0){
        $tien;
        $soluongGet = $_GET['sl'];
        // echo $date;
        while($rowtthongke = $query_thongke->fetch_assoc()){
            $updateTien = $rowtthongke['tien'] + $tien;
            $updateSL = $rowtthongke['soluong'] + intval($soluongGet);
        }
        $select_thongke = "UPDATE tbl_thongke SET tien='".$updateTien."', soluong='".$updateSL."' WHERE ngaydat='$date' ";
        $query_thongkeUpdate = mysqli_query($mysqli,$select_thongke);
    }else {
        echo $date;
        $soluongGet = $_GET['sl'];
        $sql_thongke = "INSERT INTO tbl_thongke(ngaydat,tien,soluong) VALUES('".$date."','".$tien."','".$soluongGet."') ";
        $query_thongke = mysqli_query($mysqli,$sql_thongke);
    }
}
if($_POST['thanhtoan'] == 'momo'){
    $id_khachhang = $_SESSION['user'];
    $diachi = (isset($_GET['diachi']))? ('diachi='.$_GET['diachi']):('dangky='.$id_khachhang);
    header("Location:../../indexMomo.php?sum=$_GET[sum]&sl=$_GET[sl]&$diachi"); 
}
?>
