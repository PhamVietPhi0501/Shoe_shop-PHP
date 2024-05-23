<?php
    include('../../config/config.php');
    if(isset($_POST['themsanpham'])){
        $msp = $_GET['msp'];    

        $hinhanh2 = $_FILES['hinh2']['name'];
        $hinhanh2_tmp = $_FILES['hinh2']['tmp_name'];
        $hinhanh2_time = time().'_'.$hinhanh2;

        $hinhanh3 = $_FILES['hinh3']['name'];
        $hinhanh3_tmp = $_FILES['hinh3']['tmp_name'];
        $hinhanh3_time = time().'_'.$hinhanh3;
        
        $hinhanh4 = $_FILES['hinh4']['name'];
        $hinhanh4_tmp = $_FILES['hinh4']['tmp_name'];
        $hinhanh4_time = time().'_'.$hinhanh4;

        $hinhanh5 = $_FILES['hinh5']['name'];
        $hinhanh5_tmp = $_FILES['hinh5']['tmp_name'];
        $hinhanh5_time = time().'_'.$hinhanh5;

        $hinhanh6 = $_FILES['hinh6']['name'];
        $hinhanh6_tmp = $_FILES['hinh6']['tmp_name'];
        $hinhanh6_time = time().'_'.$hinhanh6;

        $sql_them = "UPDATE tbl_img_product SET img2='".$hinhanh2_time."',img3='".$hinhanh3_time."',img4='".$hinhanh4_time."' WHERE masanpham='$msp' ";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh2_tmp,'../qlSanPham/uploads/'.$hinhanh2_time);
        move_uploaded_file($hinhanh3_tmp,'../qlSanPham/uploads/'.$hinhanh3_time);
        move_uploaded_file($hinhanh4_tmp,'../qlSanPham/uploads/'.$hinhanh4_time);
        // move_uploaded_file($hinhanh5_tmp,'../qlSanPham/uploads/'.$hinhanh5_time);
        // move_uploaded_file($hinhanh6_tmp,'../qlSanPham/uploads/'.$hinhanh6_time);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../modules/cssModules/style.css">
    <link rel="stylesheet" href="../../../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Thêm danh mục sản phẩm</title>
</head>
<body>
<div class="main">
    <form class="main-form" action="" method="POST" enctype="multipart/form-data">
        <h3>Thêm mới</h3>

        <div class="form-group">
            <label for="" class="form-lable">Hình 2</label>
            <input class="form-input" type="file" name="hinh2">
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Hình 3</label>
            <input class="form-input" type="file" name="hinh3">
        </div>
        
        <div class="form-group">
            <label for="" class="form-lable">Hình 4</label>
            <input class="form-input" type="file" name="hinh4">
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Hình 5</label>
            <input class="form-input" type="file" name="hinh5">
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Hình 6</label>
            <input class="form-input" type="file" name="hinh6">
        </div>

        <button class="form-submit" name="themsanpham">Thêm mới</button>
        <a class="form-back"  href="../../indexAdmin.php?action=quanlysanpham&id_side=2"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
    </form>
</div>
</body>
</html>

