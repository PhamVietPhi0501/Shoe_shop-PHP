<?php
    include('../../admin/config/config.php');
if (isset($_GET['idDangKy'])) {
    $idDangKy = $_GET['idDangKy'];
    $comments = $_GET['comments'];
    $idStar = $_GET['idStar'];
    $idSanPham = $_GET['idSanPham'];

    $sql = "INSERT INTO tbl_comments(id_dangky,comments,star,id_sanpham) VALUE ('" . $idDangKy . "', '" . $comments . "', '" . $idStar . "', '" . $idSanPham . "')";
    $query = mysqli_query($mysqli, $sql);
}
?>


<div class="detail5-comment-danhgia">
    <span>Đánh giá sản phẩm</span>
    <?php
    $sql_comment = "SELECT * FROM tbl_comments WHERE id_sanpham='$_GET[id]' ";
    $query_comment = mysqli_query($mysqli, $sql_comment);
    $i = 0;
    while (mysqli_fetch_array($query_comment)) {
        $i++;
    }
    ?>
    <p><?php echo $i ?> bình luận</p>
</div>

<div class="detail5-comment-detail">

    <?php
    $sql_select = "SELECT * FROM tbl_comments,tbl_dangky WHERE tbl_comments.id_sanpham='$_GET[id]' AND tbl_comments.id_dangky=tbl_dangky.id_dangky ";
    $query_select = mysqli_query($mysqli, $sql_select);
    while ($row = mysqli_fetch_array($query_select)) {
    ?>
        <div class="detail5-flex">
            <div class="detail5-comment-detail-name">
                <h4><?php echo $row['fullname'] ?></h4>
                <!-- <span>05/1/2002</span> -->
            </div>
            <div class="detail5-comment-detail-text">
                <p><?php echo $row['comments'] ?></p>
            </div>
            <div class="detail5-comment-detail-start">
                <?php
                if ($row['star'] == 1) {
                ?>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                <?php
                }
                if ($row['star'] == 2) {
                ?>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                <?php
                }
                if ($row['star'] == 3) {
                ?>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                <?php
                }
                if ($row['star'] == 4) {
                ?>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star"></i>
                <?php
                }
                if ($row['star'] == 5) {
                ?>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                    <i class="fa-regular fa-star start"></i>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>