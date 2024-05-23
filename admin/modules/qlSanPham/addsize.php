<?php
include("../../config/config.php");
if(isset($_POST['themsize'])) {
    echo $msp = $_GET['msp'];
    echo $soluong = $_POST['soluong'];
    echo $size = $_POST['size'];
    echo $id = $_GET['id'];
    $select_size = "SELECT * FROM tbl_size WHERE sizeGiay='$size' AND masanpham='$msp' ";
    $check = mysqli_query($mysqli,$select_size);
    if($check->num_rows > 0){      
        $sua_size = "UPDATE tbl_size SET soluong=soluong+'$soluong' WHERE masanpham='$msp' AND sizeGiay='$size' ";
        mysqli_query($mysqli,$sua_size);
    }else {
        $them_size = "INSERT INTO tbl_size(id_danhmuc,masanpham,sizeGiay,soluong) VALUES('".$id."','".$msp."', '".$size."', '".$soluong."')";
        mysqli_query($mysqli,$them_size);
    }
    header("Location:../../indexAdmin.php?action=quanlysanpham&id_side=2");
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
        <h3>Thêm size</h3>

        <div class="form-group">
            <label for="" class="form-lable">Số lượng</label>
            <input class="form-input" type="text" name="soluong">
        </div>


        <div class="form-group">
        <label for="" class="form-lable">Size</label>
            <select class="form-input" name="size" id="">            
            <?php
            $sql_size = "SELECT * FROM size ORDER BY sizeGiay ASC";
            $query_size = mysqli_query($mysqli,$sql_size);
            while($row_size = mysqli_fetch_array($query_size)){
            ?>
                <option value="<?php echo $row_size['sizeGiay'] ?>"><?php echo $row_size['sizeGiay'] ?></option>
            <?php
            }
            ?>
            </select>           
        </div>
        

        <button class="form-submit" name="themsize">Thêm mới</button>
        <a class="form-back"  href="../../indexAdmin.php?action=quanlysanpham&id_side=2"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
    </form>
</div>
</body>
</html>

