<?php
    include('../../config/config.php');
    $sql_sua = "SELECT * FROM tbl_phukien WHERE id_phukien='$_GET[id]' ";
    $query_sua = mysqli_query($mysqli,$sql_sua);

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


        $tensanpham = $_POST['tensanpham'];
        $masanpham = $_POST['masanpham'];
        $noidung = $_POST['noidung'];
        $chitiet = $_POST['chitiet'];
        $gia = $_POST['gia'];
        
        $hinhanh = $_FILES['hinh']['name'];
        $hinhanh_tmp = $_FILES['hinh']['tmp_name'];
        $hinhanh_time = time().'_'.$hinhanh;


        if($error == []){
            if($hinhanh!=""){
                //Thêm hình ảnh mới và xóa hình ảnh cũ
                move_uploaded_file($hinhanh_tmp,'../qlSanPham/uploads/'.$hinhanh_time);
                $sql = "SELECT * FROM tbl_phukien WHERE id_phukien='$_GET[id]' LIMIT 1";
                $query = mysqli_query($mysqli,$sql);
                while($row = mysqli_fetch_array($query)){
                unlink('../qlSanPham/uploads/'.$row['hinh']);
                }
                    //Nếu sửa sản phẩm có hình
        
                $sql_sua = "UPDATE tbl_phukien SET tenphukien='".$tensanpham."',masanpham='".$masanpham."', hinh='".$hinhanh_time."',
                giaphukien='".$gia."',noidung='".$noidung."',chitiet='".$chitiet."' WHERE id_phukien=$_GET[id] ";
            }else {
                    //Nếu sửa sản phẩm không có hình

                $sql_sua = "UPDATE tbl_phukien SET tenphukien='".$tensanpham."',masanpham='".$masanpham."',
                giaphukien='".$gia."',noidung='".$noidung."',chitiet='".$chitiet."' WHERE id_phukien=$_GET[id] ";
            }
            mysqli_query($mysqli,$sql_sua);
            // header("Location:../../indexAdmin.php?action=quanlyphukien&id_side=4");
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
    <title>Sửa sản phẩm</title>
</head>
<body>
<div class="main">
    <form class="main-form" action="" method="POST" enctype="multipart/form-data">
        <h3>Cập nhật</h3>
        <?php
        while($row = mysqli_fetch_array($query_sua)){
        ?>
        <div class="form-group">
            <label for="" class="form-lable">Tên sản phẩm</label>
            <input class="form-input" value="<?php echo $row['tenphukien'] ?>" type="text" name="tensanpham">
            <?php
            echo (!empty($error['tensanpham']['required']))?'<span 
            class="form-message">'.$error['tensanpham']['required'].'</span>':false; 

            echo (!empty($error['tensanpham']['min']))?'<span 
            class="form-message">'.$error['tensanpham']['min'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Mã sản phẩm</label>
            <input class="form-input" value="<?php echo $row['masanpham'] ?>" type="text" name="masanpham">
            <?php
            echo (!empty($error['tensanpham']['required']))?'<span 
            class="form-message">'.$error['tensanpham']['required'].'</span>':false; 

            echo (!empty($error['tensanpham']['min']))?'<span 
            class="form-message">'.$error['tensanpham']['min'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Nội dung</label>
            <textarea class="form-input" name="noidung" id="" cols="30" rows="10"><?php echo $row['noidung'] ?></textarea>
            <?php
            echo (!empty($error['noidung']['required']))?'<span 
            class="form-message">'.$error['noidung']['required'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Chi tiết</label>
            <textarea class="form-input" name="chitiet" id="editor" cols="30" rows="10"><?php echo $row['chitiet'] ?></textarea>
            <?php
            echo (!empty($error['noidung']['required']))?'<span 
            class="form-message">'.$error['noidung']['required'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Giá</label>
            <input class="form-input" value="<?php echo $row['giaphukien'] ?>" type="text" name="gia">
            <?php
            echo (!empty($error['gia']['required']))?'<span 
            class="form-message">'.$error['gia']['required'].'</span>':false; 

            echo (!empty($error['gia']['invalid']))?'<span 
            class="form-message">'.$error['gia']['invalid'].'</span>':false; 
            ?>
        </div>
        
        <div class="form-group">
            <label for="" class="form-lable">Hình</label>
            <input class="form-input" type="file" name="hinh">

        </div>
        <?php
        }
        ?>
        <button class="form-submit" name="suasanpham">Cập nhật</button>
        <a class="form-back"  href="../../indexAdmin.php?action=quanlyphukien&id_side=4"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
    </form>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cnd.ckeditor.com/4.16.2/full/cheditor.js"></script>
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
