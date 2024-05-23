<?php
    require ('../../admin/config/config.php');

    $district_id = $_GET['district_id'];

    $sql = "SELECT * FROM wards WHERE district_id=$district_id ";
    $result = mysqli_query($mysqli,$sql);

    $data[0]=[
        'id' => 0,
        'name' => 'Chọn Phường xã'
    ];

    while($row = mysqli_fetch_assoc($result)){
        $data[]=[
            'id' => $row['wards_id'],
            'name' => $row['name_wards']
        ];
    }
    echo json_encode($data);
?>