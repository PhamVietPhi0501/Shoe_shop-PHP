<?php
    include('../../admin/config/config.php');

    $id_dangky = $_POST['id'];
    $newPass = $_POST['checkMK'];

    $sql_update = "UPDATE tbl_dangky SET pass='".$newPass."' WHERE id_dangky=$id_dangky ";
    $query_update = mysqli_query($mysqli,$sql_update);

    $data[]= [
        'check' => true,
    ];

    echo json_encode($data);
?>