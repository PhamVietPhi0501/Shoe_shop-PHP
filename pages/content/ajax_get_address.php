<?php
    require ('../../admin/config/config.php');

    if(isset($_GET['update1'])){
    $id_khachhang = $_GET['id_khachhang'];

    $sql = "SELECT * FROM tbl_dangky,province,district,wards WHERE id_dangky=$id_khachhang AND tbl_dangky.province_id=province.province_id
    AND tbl_dangky.district_id=district.district_id AND tbl_dangky.wards_id=wards.wards_id ";
    $result = mysqli_query($mysqli,$sql);

    while($row = mysqli_fetch_assoc($result)){
        $data[]=[
            'fullname' => $row['fullname'],
            'phone' => $row['phone'],
            'addres' => $row['addres'],
            'province' => $row['province_id'], 
            'district' => $row['district_id'], 
            'wards' => $row['wards_id'],
            'districtName' => $row['name_district'],
            'wardsName' => $row['name_wards'],
        ];
    }
    echo json_encode($data);
    }

    if(isset($_GET['update2'])){
        $id_khachhang = $_GET['id_khachhang'];

        $sql = "SELECT * FROM tbl_sodiachi,province,district,wards WHERE id_dangky=$id_khachhang AND tbl_sodiachi.province_id=province.province_id
        AND tbl_sodiachi.district_id=district.district_id AND tbl_sodiachi.wards_id=wards.wards_id ";
        $result = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[]=[
                'fullname' => $row['fullname'],
                'phone' => $row['phone'],
                'addres' => $row['addres'],
                'province' => $row['province_id'], 
                'district' => $row['district_id'], 
                'wards' => $row['wards_id'],
                'districtName' => $row['name_district'],
                'wardsName' => $row['name_wards'],
            ];
        }
        echo json_encode($data);
    }

?>