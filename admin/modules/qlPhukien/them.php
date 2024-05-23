<?php
    include('../../config/config.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];

        //Validater tên sản phẩm
        if(empty($_POST['tensanpham'])){
            $error['tensanpham']['required'] = 'Không được để trống';
        }else{
            if(strlen(trim($_POST['tensanpham']))<5){
                $error['tensanpham']['min'] = 'Phải lớn hơn 5 ký tự';
            }
        }

        //Validater nội dung
        if(empty($_POST['noidung'])){
            $error['noidung']['required'] = 'Không được để trống';
        }


        //Validater giá
        if(empty(trim($_POST['gia']))) {
            $error['gia']['required'] = 'Số phải lớn hơn 0';
        }else{
            if(!filter_var(trim($_POST['gia']), FILTER_VALIDATE_INT, ['options' => ['min_range' =>  1]] )){
                $error['gia']['invalid'] = 'Không được chưa ký tự đặc biệt';
            }
        }

        //Validater số lượng
        if(empty(trim($_POST['soluong']))) {
            $error['soluong']['required'] = 'Số phải lớn hơn 0';
        }else{
            if(!filter_var(trim($_POST['soluong']), FILTER_VALIDATE_INT, ['options' => ['min_range' =>  1]] )){
                $error['soluong']['invalid'] = 'Không được chưa ký tự đặc biệt';
            }
        }

        $tensanpham = $_POST['tensanpham'];
        $masanpham = $_POST['masanpham'];
        $noidung = $_POST['noidung'];
        $chitiet = $_POST['chitiet'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];

        
        $hinhanh = $_FILES['hinh']['name'];
        $hinhanh_tmp = $_FILES['hinh']['tmp_name'];
        $hinhanh_time = time().'_'.$hinhanh;


        if($error == []){
        $sql_them = "INSERT INTO tbl_phukien(tenphukien,soluong,masanpham,giaphukien,noidung,chitiet,hinh) 
        VALUE('".$tensanpham."','".$soluong."','".$masanpham."','".$gia."','".$noidung."','".$chitiet."','".$hinhanh_time."')  ";
        $sql_themSize ="INSERT INTO tbl_img_product(masanpham,img1) VALUE('".$masanpham."','".$hinhanh_time."')";
        mysqli_query($mysqli,$sql_them);
        mysqli_query($mysqli,$sql_themSize);
        move_uploaded_file($hinhanh_tmp,'../qlSanPham/uploads/'.$hinhanh_time);
        header("Location:../../indexAdmin.php?action=quanlyphukien&id_side=4");
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
    <title>Thêm danh mục sản phẩm</title>
</head>
<body>
<div class="main">
    <form class="main-form" action="" method="POST" enctype="multipart/form-data">
        <h3>Thêm mới</h3>

        <div class="form-group">
            <label for="" class="form-lable">Tên sản phẩm</label>
            <input class="form-input" type="text" name="tensanpham">
            <?php
            echo (!empty($error['tensanpham']['required']))?'<span 
            class="form-message">'.$error['tensanpham']['required'].'</span>':false; 

            echo (!empty($error['tensanpham']['min']))?'<span 
            class="form-message">'.$error['tensanpham']['min'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Mã sản phẩm</label>
            <input class="form-input" type="text" name="masanpham">
            <?php
            echo (!empty($error['tensanpham']['required']))?'<span 
            class="form-message">'.$error['tensanpham']['required'].'</span>':false; 

            echo (!empty($error['tensanpham']['min']))?'<span 
            class="form-message">'.$error['tensanpham']['min'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Nội dung</label>
            <textarea class="form-input" name="noidung" id="" cols="30" rows="10"></textarea>
            <?php
            echo (!empty($error['noidung']['required']))?'<span 
            class="form-message">'.$error['noidung']['required'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Chi tiết</label>
            <textarea class="form-input" name="chitiet" id="editor" cols="30" rows="10"></textarea>
            <?php
            echo (!empty($error['noidung']['required']))?'<span 
            class="form-message">'.$error['noidung']['required'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Giá</label>
            <input class="form-input" type="text" name="gia">
            <?php
            echo (!empty($error['gia']['required']))?'<span 
            class="form-message">'.$error['gia']['required'].'</span>':false; 

            echo (!empty($error['gia']['invalid']))?'<span 
            class="form-message">'.$error['gia']['invalid'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Số lượng</label>
            <input class="form-input" type="text" name="soluong">
            <?php
            echo (!empty($error['soluong']['required']))?'<span 
            class="form-message">'.$error['soluong']['required'].'</span>':false; 

            echo (!empty($error['soluong']['invalid']))?'<span 
            class="form-message">'.$error['soluong']['invalid'].'</span>':false; 
            ?>
        </div>
        
        <div class="form-group">
            <label for="" class="form-lable">Hình</label>
            <input class="form-input" type="file" name="hinh">
        </div>

        <button class="form-submit" name="themsanpham">Thêm mới</button>
        <a class="form-back"  href="../../indexAdmin.php?action=quanlysanpham&id_side=2"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
    </form>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>