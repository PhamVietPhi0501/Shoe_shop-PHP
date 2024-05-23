<?php
$sql_lietke = "SELECT * FROM tbl_comments,tbl_dangky,tbl_sanpham 
WHERE tbl_comments.id_dangky=tbl_dangky.id_dangky 
AND tbl_comments.id_sanpham=tbl_sanpham.id_sanpham ";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="form">
    <div class="header-add">
        <i class="fa-solid fa-comment"></i>
        <a >Đánh giá</a>
    </div>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID đánh giá</th>
                <th>Tên khách hàng</th>
                <th>Nội dung</th>
                <th>Đánh giá</th>
                <th>Tên sản phẩm</th>
                <th>Quản lí</th>
            </tr>
            <?php
            $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                    $i++;
            ?>
            <tr>
                <td class="ID"><?php echo $i ?></td>
                <td class="padding-4px"><?php echo $row['fullname']?></td>
                <td class="padding-4px"><?php echo $row['comments']?></td>
                <td class="padding-4px"><?php echo $row['star']." sao"?></td>
                <td class="padding-4px"><?php echo $row['tensanpham']?></td>
                <td class="show-table-QL">
                    <a href="modules/qlDanhGia/xoa.php?id=<?php echo $row['id_comments']?>"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            </tr>
            
            <?php
                }
            ?>
        </table>
    </div>

</div>