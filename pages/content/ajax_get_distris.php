<?php
    require ('../../admin/config/config.php');

    $province_id = $_GET['province_id'];

    $sql = "SELECT * FROM district WHERE province_id=$province_id ";
    $result = mysqli_query($mysqli,$sql);

    $data[0]=[
        'id' => 0,
        'name' => 'Chọn Quận/huyện'
    ];

    while($row = mysqli_fetch_assoc($result)){
        $data[]=[
            'id' => $row['district_id'],
            'name' => $row['name_district']
        ];
    }
    echo json_encode($data);
?>
