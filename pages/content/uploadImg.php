<?php
include('../../admin/config/config.php');
session_start();

if(isset($_POST['update'])){
    $hinhanh = $_FILES['hinh']['name'];
    $hinhanh_tmp = $_FILES['hinh']['tmp_name'];
    $hinhanh_time = time().'_'.$hinhanh;
    $sdt = $_POST['sdt'];
    $gioitinh = $_POST['gender'];
    move_uploaded_file($hinhanh_tmp,'../../image/Adidas/Avatar/'.$hinhanh_time);
    $select_info = "SELECT * FROM tbl_dangky WHERE id_dangky='$_GET[id]' ";
    $query_info = mysqli_query($mysqli,$select_info);
   
    if(empty($hinhanh)){
        $update_info = "UPDATE tbl_dangky SET phone='".$sdt."' WHERE id_dangky='$_GET[id]'";
        $query = mysqli_query($mysqli,$update_info);
        if(empty($_POST['gender'])){
            $update_info = "UPDATE tbl_dangky SET phone='".$sdt."' WHERE id_dangky='$_GET[id]'";
            $query = mysqli_query($mysqli,$update_info);
        }else{
            $update_info = "UPDATE tbl_dangky SET phone='".$sdt."',gender='".$gioitinh."' WHERE id_dangky='$_GET[id]'";
            $query = mysqli_query($mysqli,$update_info);
        }
    }else{
        while($row = mysqli_fetch_array($query_info)){
            unlink('../../image/Adidas/Avatar/'.$row['hinh']);
        }    
        if(empty($_POST['gender'])){
            $update_info = "UPDATE tbl_dangky SET hinh='".$hinhanh_time."',phone='".$sdt."' WHERE id_dangky='$_GET[id]'";
            $query = mysqli_query($mysqli,$update_info);
        }else{
            $update_info = "UPDATE tbl_dangky SET hinh='".$hinhanh_time."',phone='".$sdt."',gender='".$gioitinh."' WHERE id_dangky='$_GET[id]'";
            $query = mysqli_query($mysqli,$update_info);
        }
    }
    
    header("location:../../indexQldonhang.php?page=1");
}



if(isset($_POST['address'])){
    $id_dangky = $_SESSION['user'];
    $ten = $_POST['ten0'];
    $province = $_POST['province0'];
    $sodienthoai = $_POST['sodienthoai0'];
    $district = $_POST['district0'];
    $award= $_POST['award0'];
    $diachi = $_POST['diachi0'];
    $sql_diachi = "INSERT INTO tbl_sodiachi(id_dangky, fullname, phone, province_id, district_id, wards_id, addres) 
    VALUE ('".$id_dangky."', '".$ten."', '".$sodienthoai."', '".$province."', '".$district."', '".$award."', '".$diachi."' )";
    $query = mysqli_query($mysqli,$sql_diachi);
    header("location:../../indexQldonhang.php?page=3");
}


if(isset($_POST['updateAddress'])){
    $id_dangky = $_SESSION['user'];
    $ten = $_POST['ten'];
    $province = $_POST['province'];
    $sodienthoai = $_POST['sodienthoai'];
    $district = $_POST['district'];
    $award= $_POST['award'];
    $diachi = $_POST['diachi'];

    $sql_update = "UPDATE tbl_dangky SET fullname='".$ten."',addres='".$diachi."',phone='".$sodienthoai."',province_id='".$province."'
    ,district_id='".$district."',wards_id='".$award."' WHERE id_dangky=$id_dangky ";
    $query_update = mysqli_query($mysqli,$sql_update);
    header("location:../../indexQldonhang.php?page=3");
}


if(isset($_POST['updateAddress2'])){
    $id_dangky = $_SESSION['user'];
    $ten = $_POST['ten2'];
    $province = $_POST['province2'];
    $sodienthoai = $_POST['sodienthoai2'];
    $district = $_POST['district2'];
    $award= $_POST['award2'];
    $diachi = $_POST['diachi2'];


    $sql_update = "UPDATE tbl_sodiachi SET fullname='".$ten."',addres='".$diachi."',phone='".$sodienthoai."',province_id='".$province."'
    ,district_id='".$district."',wards_id='".$award."' WHERE id_dangky=$id_dangky ";
    $query_update = mysqli_query($mysqli,$sql_update);
    header("location:../../indexQldonhang.php?page=3");
}


if(isset($_GET['updatePassword'])){
    $id_dangky = $_SESSION['user'];
    $sql = "SELECT * FROM tbl_dangky WHERE id_dangky=$id_dangky";
    $query = mysqli_query($mysqli, $sql);

    while($row = mysqli_fetch_assoc($query)){
        $data[]= [
            'pass' => $row['pass'],
        ];
    }
    
    echo json_encode($data);
}



?>
