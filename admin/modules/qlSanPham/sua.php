<?php
    include('../../config/config.php');
    $sql_sua = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id]' ";
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
        // $soluong = $_POST['soluong'];
        $loaigiay = $_POST['loaigiay'];
        $loaihang = $_POST['loaihang'];
        
        $hinhanh = $_FILES['hinh']['name'];
        $hinhanh_tmp = $_FILES['hinh']['tmp_name'];
        $hinhanh_time = time().'_'.$hinhanh;

        $danhmuc = $_POST['tendanhmuc'];
        // $size = $_POST['size'];


        if($error == []){
            if($hinhanh!=""){
                //Thêm hình ảnh mới và xóa hình ảnh cũ
        
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
                $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id]' LIMIT 1";
                $query = mysqli_query($mysqli,$sql);
                while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinh']);
                }
                    //Nếu sửa sản phẩm có hình
        
                $sql_sua = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."' ,hinh='".$hinhanh_time."',
                gia='".$gia."',noidung='".$noidung."',chitiet='".$chitiet."',id_danhmuc='".$danhmuc."',genderProduct='".$loaigiay."',loaihang='".$loaihang."' WHERE id_sanpham='$_GET[id]' ";
                $sql_themImg1 = "UPDATE tbl_img_product SET img1='".$hinhanh_time."' WHERE id_sanpham='$_GET[id]'";
                mysqli_query($mysqli, $sql_themImg1);
            }else {
                //Nếu sửa sản phẩm không có hình
                
                $sql_sua = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."',
                gia='".$gia."',noidung='".$noidung."',chitiet='".$chitiet."',id_danhmuc='".$danhmuc."',genderProduct='".$loaigiay."',loaihang='".$loaihang."' WHERE id_sanpham='$_GET[id]' ";
            }
            mysqli_query($mysqli,$sql_sua);
            header("Location:../../indexAdmin.php?action=quanlysanpham&id_side=2");
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
    <link rel="stylesheet" href="../../../Ckedit/build/ckeditor.js.map">
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
            <input class="form-input" value="<?php echo $row['tensanpham'] ?>" type="text" name="tensanpham">
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
            <label for="" class="form-lable">Mô tả</label>
            <textarea class="form-input" name="chitiet" id="editor" cols="30" rows="10"><?php echo $row['chitiet'] ?></textarea>
            <?php
            echo (!empty($error['noidung']['required']))?'<span 
            class="form-message">'.$error['noidung']['required'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
            <label for="" class="form-lable">Giá</label>
            <input class="form-input" value="<?php echo $row['gia'] ?>" type="text" name="gia">
            <?php
            echo (!empty($error['gia']['required']))?'<span 
            class="form-message">'.$error['gia']['required'].'</span>':false; 

            echo (!empty($error['gia']['invalid']))?'<span 
            class="form-message">'.$error['gia']['invalid'].'</span>':false; 
            ?>
        </div>

        <div class="form-group">
        <label for="" class="form-lable">Loại giày</label>
            <select class="form-input" name="loaigiay" id="">
                <option value="Nữ">Nữ</option>
                <option value="Nam">Nam</option>
            </select>           
        </div>

        <div class="form-group">
        <label for="" class="form-lable">Loại Hàng</label>
            <select class="form-input" name="loaihang" id="">
                <option value="new">New</option>
                <option value="phukien">Phụ Kiện</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
            </select>           
        </div>

        <div class="form-group">
        <label for="" class="form-lable">Tên danh mục</label>
            <select class="form-input" name="tendanhmuc" id="">
            <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmucsanpham";
            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row['id_danhmuc'] == $row_danhmuc['id_danhmuc']){
            ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmucsanpham'] ?></option>
            <?php
                }else{
                    ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmucsanpham'] ?></option>
                    <?php
                }
            }
            ?>
            </select>           
        </div>
        
        <div class="form-group">
            <label for="" class="form-lable">Hình</label>
            <input class="form-input" type="file" name="hinh">
        </div>
        <?php
        }
        ?>
        <button class="form-submit" name="suasanpham">Cập nhật</button>
        <a class="form-back"  href="../../indexAdmin.php?action=quanlysanpham&id_side=2"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
    </form>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script> -->

<script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
