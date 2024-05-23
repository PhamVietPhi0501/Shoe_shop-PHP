<?php
if(isset($_POST['checkMK'])){
    $checkMK = $_POST['checkMK'];
    $id = $_POST['id'];

    function checkMK() {
        global $checkMK;
        global $id;
        include('../../admin/config/config.php');
        $sql = "SELECT * FROM tbl_dangky WHERE pass='$checkMK' AND id_dangky='$id' ";
        $query = mysqli_query($mysqli,$sql);
        if($query->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    $data[] = [
        'check' => checkMK(),
    ];

    echo json_encode($data);
}
?>