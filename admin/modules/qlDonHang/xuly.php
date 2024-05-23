<?php
include("../../config/config.php");

if(isset($_POST['md'])){
    $id = $_POST['id'];
    $code = $_POST['md'];

    $sql = mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status = $id WHERE code_cart='".$code."'");
    $data[]=[
        'code' => $code,
        'id' => $id
    ];

    echo json_encode($data);
}
?>