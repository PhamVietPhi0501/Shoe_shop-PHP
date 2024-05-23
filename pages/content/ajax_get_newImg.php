<?php
include('../../admin/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $hinhanh = $_FILES['file']['name'];
    $hinhanh_tmp = $_FILES['file']['tmp_name'];
    $hinhanh_time = time() . '_' . $hinhanh;

    $sql_old = "SELECT * FROM tbl_dangky WHERE id_dangky='$id' ";
    $query_oldImg = mysqli_query($mysqli, $sql_old);

    while ($row = mysqli_fetch_array($query_oldImg)) {
        if(!empty($row['hinh'])){
            unlink('../../image/Adidas/Avatar/' . $row['hinh']);
        }
    }


    move_uploaded_file($hinhanh_tmp, '../../image/Adidas/Avatar/' . $hinhanh_time);
    $sql = "UPDATE tbl_dangky SET hinh='" . $hinhanh_time . "' WHERE id_dangky='$id' ";
    $query = mysqli_query($mysqli, $sql);

    $data[] = [
        'hinh' => $hinhanh_time,
    ];

    echo json_encode($data);
}
