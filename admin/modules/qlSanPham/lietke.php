<?php



if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql_lietke = "SELECT * FROM tbl_sanpham,tbl_danhmucsanpham 
    WHERE tbl_sanpham.id_danhmuc=tbl_danhmucsanpham.id_danhmuc AND masanpham  LIKE '%$search%'";
}else{
    $sql_lietke = "SELECT * FROM tbl_sanpham,tbl_danhmucsanpham 
    WHERE tbl_sanpham.id_danhmuc=tbl_danhmucsanpham.id_danhmuc ORDER BY id_sanpham";
}


$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="form">
    <div class="header-add">
        <i class="fa-solid fa-plus"></i>
        <a href="../admin/modules/qlSanPham/them.php">Thêm mới</a>
    </div>

    <form action="" method="post">
        <div class="search-SP">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="search">
        </div>
    </form>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Tên danh mục</th>
                <th>Loại giày</th>
                <th>Mô tả</th>
                <th>Loại hàng</th>
                <th>Quản lý</th>
            </tr>
            <?php
            $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                    $i++;
            ?>
            <tr>
                <td class="ID"><?php echo $i ?></td>
                <td class="padding-4px"><?php echo $row['tensanpham']?></td>
                <td class="padding-4px"><?php echo $row['masanpham']?></td>
                <td class="padding-4px ID"><img class="form-img" src="modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt=""></td>
                <td class="padding-4px"><?php echo number_format($row['gia']) ?></td>
                <td class="padding-4px"><?php echo $row['tendanhmucsanpham']?></td>
                <td class="padding-4px"><?php echo $row['genderProduct']?></td>
                <td class="padding-4px"><?php echo $row['noidung']?></td>           
                <td class="padding-4px"><?php echo $row['loaihang']?></td>           
                <td class="show-table-QL">
                
                    <a href="modules/qlSanPham/xoa.php?id=<?php echo $row['id_sanpham']?>&msp=<?php echo $row['masanpham'] ?>"><i class="fa-solid fa-trash"></i></a> |
                    <a href="modules/qlSanPham/sua.php?id=<?php echo $row['id_sanpham']?>"><i class="fa-solid fa-pen-to-square"></i></a> |
                    <a href="indexAdmin.php?action=totalSize&id_side=size&msp=<?php echo $row['masanpham'] ?>"><i class="fa-solid fa-eye"></i></a> |
                    <a href="modules/qlSanPham/addsize.php?msp=<?php echo $row['masanpham'] ?>&id=<?php echo $row['id_danhmuc'] ?>"><i class="fa-solid fa-plus"></i></a> |
                    <a href="modules/qlSanPham/imgProduct.php?msp=<?php echo $row['masanpham'] ?>"><i class="fa-solid fa-image"></i></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

</div>