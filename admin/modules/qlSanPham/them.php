<link rel="stylesheet" href="../../cssAdmin/admin.css">
<?php
include('../../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    //Validater tên sản phẩm
    if (empty($_POST['tensanpham'])) {
        $error['tensanpham']['required'] = 'Không được để trống';
    } else {
        if (strlen(trim($_POST['tensanpham'])) < 5) {
            $error['tensanpham']['min'] = 'Phải lớn hơn 5 ký tự';
        }
    }

    //Validater nội dung
    if (empty($_POST['noidung'])) {
        $error['noidung']['required'] = 'Không được để trống';
    }


    //Validater giá
    if (empty(trim($_POST['gia']))) {
        $error['gia']['required'] = 'Số phải lớn hơn 0';
    } else {
        if (!filter_var(trim($_POST['gia']), FILTER_VALIDATE_INT, ['options' => ['min_range' =>  1]])) {
            $error['gia']['invalid'] = 'Không được chưa ký tự đặc biệt';
        }
    }

    //Validater số lượng
    // if(empty(trim($_POST['soluong']))) {
    //     $error['soluong']['required'] = 'Số phải lớn hơn 0';
    // }else{
    //     if(!filter_var(trim($_POST['soluong']), FILTER_VALIDATE_INT, ['options' => ['min_range' =>  1]] )){
    //         $error['soluong']['invalid'] = 'Không được chưa ký tự đặc biệt';
    //     }
    // }

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
    $hinhanh_time = time() . '_' . $hinhanh;

    $danhmuc = $_POST['tendanhmuc'];
    // $size = $_POST['size'];


    if ($error == []) {
        $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masanpham,gia,hinh,noidung,chitiet,id_danhmuc,genderProduct,loaihang) 
        VALUE('" . $tensanpham . "','" . $masanpham . "','" . $gia . "','" . $hinhanh_time . "','" . $noidung . "','" . $chitiet . "','" . $danhmuc . "', '" . $loaigiay . "', '" . $loaihang . "' )  ";
        $sql_themSize ="INSERT INTO tbl_size(masanpham,sizeGiay,soluong) VALUE('".$masanpham."', '".$size."','".$soluong."')";
        $sql_themSize = "INSERT INTO tbl_img_product(id_sanpham,img1) VALUE('" . $masanpham . "','" . $hinhanh_time . "')";
        mysqli_query($mysqli, $sql_them);
        mysqli_query($mysqli, $sql_themSize);
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_time);
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
    <title>Thêm danh mục sản phẩm</title>
</head>

<body>
    <div class="main">
        <form class="main-form" action="" method="POST" enctype="multipart/form-data">
            <h3>Thêm mới</h3>

            <div class="form-group">
                <label for="" class="form-lable">Tên sản phẩm</label>
                <input class="form-input" type="text" name="tensanpham">
                <span class="error-name" ></span>
            </div>

            <div class="form-group">
                <label for="" class="form-lable">Mã sản phẩm</label>
                <input class="form-input" type="text" name="masanpham">
                <span class="error-masanpham" ></span>
            </div>

            <div class="form-group">
                <label for="" class="form-lable">Nội dung</label>
                <textarea class="form-input" name="noidung" id="" cols="30" rows="10"></textarea>
                <span class="error-noidung" ></span>
            </div>

            <div class="form-group">
                <label for="" class="form-lable">Chi tiết</label>
                <textarea class="form-input" name="chitiet" id="editor" cols="30" rows="10"></textarea>
                <span class="error-chitiet" ></span>
            </div>

            <div class="form-group">
                <label for="" class="form-lable">Giá</label>
                <input class="form-input" type="text" name="gia">
                <span class="error-gia" ></span>
            </div>

            <!-- <div class="form-group">
            <label for="" class="form-lable">Số lượng</label>
            <input class="form-input" type="text" name="soluong">
            <?php
            echo (!empty($error['soluong']['required'])) ? '<span 
            class="form-message">' . $error['soluong']['required'] . '</span>' : false;

            echo (!empty($error['soluong']['invalid'])) ? '<span 
            class="form-message">' . $error['soluong']['invalid'] . '</span>' : false;
            ?>
        </div> -->

            <div class="form-group">
                <label for="" class="form-lable">Loại giày</label>
                <select class="form-input" name="loaigiay" id="">
                    <option value="Nữ">Nữ</option>
                    <option value="Nam">Nam</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="form-lable">Loại hàng</label>
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
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmucsanpham'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <!-- <div class="form-group">
        <label for="" class="form-lable">Size</label>
            <select class="form-input" name="size" id="">            
            <?php
            $sql_size = "SELECT * FROM size ORDER BY sizeGiay ";
            $query_size = mysqli_query($mysqli, $sql_size);
            while ($row_size = mysqli_fetch_array($query_size)) {
            ?>
                <option value="<?php echo $row_size['sizeGiay'] ?>"><?php echo $row_size['sizeGiay'] ?></option>
            <?php
            }
            ?>
            </select>           
        </div> -->

            <div class="form-group">
                <label for="" class="form-lable">Hình</label>
                <input class="form-input" type="file" name="hinh">
            </div>

            <button class="form-submit" onclick="return handle()"  name="themsanpham">Thêm mới</button>
            <a class="form-back" href="../../indexAdmin.php?action=quanlysanpham&id_side=2"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        </form>
    </div>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

        function handle(){
            var i = 0;
            if($('input[name="tensanpham"]').val() == ""){
                $('.error-name').text("Không được để trống")
                i++;
            }if(/[^\w\s]/.test($('input[name="tensanpham"]').val())){
                $('.error-name').text("Không được sử dụng kí tự đặc biệt")
                i++;
            }if($('input[name="masanpham"]').val() == ""){
                $('.error-masanpham').text("Không được để trống")
                i++;
            }if(/[^\w\s]/.test($('input[name="masanpham"]').val())){
                $('.error-masanpham').text("Không được sử dụng kí tự đặc biệt")
                i++;
            }if($('textarea[name="noidung"]').val() == ""){
                $('.error-noidung').text("Không được để trống")
                i++;
            }if($('textarea[name="chitiet"]').val() == ""){
                $('.error-chitiet').text("Không được để trống")
                i++;
            }if($('input[name="gia"]').val() == ""){
                $('.error-gia').text("Không được để trống")
                i++;
            }if($('input[name="gia"]').val().val()){
                $('.error-gia').text("Không được sử dụng kí tự đặc biệt")
                i++;
            }if(/[A-Z]/.test($('input[name="gia"]').val().val()) || /[a-z]/.test($('input[name="gia"]').val().val())){
                $('.error-gia').text("Phải là số")
                i++;
            }
            if(i !=0 ){
                return false
            }
        }
</script>