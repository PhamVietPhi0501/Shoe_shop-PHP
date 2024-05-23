<?php
    include('../../config/config.php');

    $sql_sua = "SELECT * FROM tbl_danhmucsanpham WHERE id_danhmuc='$_GET[id]' ";
    $query_sua = mysqli_query($mysqli,$sql_sua);
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];

        if(empty($_POST['tensanpham'])){
            $error['tensanpham']['required'] = 'Không được để trống';
        }else{
            if(strlen(trim($_POST['tensanpham']))<5){
                $error['tensanpham']['min'] = 'Phải lớn hơn 5 ký tự';
            }
        }

        $tensanpham = $_POST['tensanpham'];
        if($error == []){
        $sql_update = "UPDATE tbl_danhmucsanpham SET tendanhmucsanpham='".$tensanpham."' WHERE id_danhmuc='$_GET[id]' ";
        mysqli_query($mysqli,$sql_update);
        header("Location:../../indexAdmin.php?action=quanlydanhmucsanpham");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../modules/cssModules/style.css">
    <link rel="stylesheet" href="../../../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Sửa danh mục sản phẩm</title>
</head>
<body>
<div class="main">
    <form class="main-form" action="" method="POST">
        <h3>Cập nhật</h3>
        <?php
        while($row = mysqli_fetch_array($query_sua)){
        ?>
        <div class="form-group">
            <label for="" class="form-lable">Tên sản phẩm</label>
            <input class="form-input" type="text" name="tensanpham" value="<?php echo $row['tendanhmucsanpham'] ?>">
            <?php
            echo (!empty($error['tensanpham']['required']))?'<span 
            class="form-message">'.$error['tensanpham']['required'].'</span>':false; 

            echo (!empty($error['tensanpham']['min']))?'<span 
            class="form-message">'.$error['tensanpham']['min'].'</span>':false; 
            ?>
        </div>
        <?php
        }
        ?>
        <button class="form-submit" name="suasanpham">Cập nhật</button>
        <a class="form-back"  href="../../indexAdmin.php?action=quanlydanhmucsanpham&id_side=1"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>

    </form>
</div>
</body>
</html>