<?php
include('admin/config/config.php');
$sql_lietke = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham='$_GET[id]' ";
$sql_query = mysqli_query($mysqli, $sql_lietke);
$quantity = 1;
$MSP = $_GET['MSP'];
$danhmuc = $_GET['danhmuc'];


if (isset($_SESSION['user'])) {

    $sql_comments = "SELECT * FROM tbl_cart WHERE id_khachhang=$_SESSION[user] ";
    $query_comments = $mysqli->query($sql_comments);
    while ($row_cms = $query_comments->fetch_assoc()) {
        $check_tungmua = $row_cms['code_cart'];
    }

    if (empty($check_tungmua)) {
        $checkSPM = "'"."'";
    } else {
        $sql_comments = "SELECT * FROM tbl_cart WHERE id_khachhang=$_SESSION[user] ";
        $query_comments = $mysqli->query($sql_comments);
        while ($row_cmsSP = $query_comments->fetch_assoc()) {
            $valueSPM[] = "'".$row_cmsSP['code_cart']."'";
        }
        $checkSPM = implode(',',$valueSPM);
    }
        $timVL[] = "";
        $sql_comment = "SELECT * FROM tbl_cart_details WHERE code_cart IN($checkSPM)";
        $query_comment = $mysqli->query($sql_comment);
        while ($row_cm = $query_comment->fetch_assoc()) {
            $timVL[] = $row_cm['id_sanpham'];
        }
        if(in_array($_GET['id'],$timVL)){
            $id_dangky = $_SESSION['user'];
        }else{
            $id_dangky = 0;
        }
} else {
    $id_dangky = 0;
}


$sql_lietke1 = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham='$_GET[id]' AND loaihang!='new' ";
$sql_query1 = mysqli_query($mysqli, $sql_lietke1);
while ($row_loaihang = mysqli_fetch_array($sql_query1)) {
    $newPrice = $row_loaihang['loaihang'];
}
?>

<div class="header">
    <div class="grid wide">
        <ul class="header-list">
            <li class="header-item">
                <span>Kết nối</span>
                <a href="https://www.facebook.com/phi.pv.9/" class="header-item-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/phamviet_phi/" class="header-item-icon"><i class="fa-brands fa-instagram"></i></a>
                <span class="header-information padding-left">Về chúng tôi
                    <div class="header-information-list">
                        <a href="https://www.messenger.com/t/263448680189395" class="header-information-link">Về MY SHOE</a>
                        <a href="" class="header-information-link">Shoe Exhibition</a>
                        <a href="" class="header-information-link">Hoạt động cộng đồng</a>
                    </div>
                </span>

            </li>
            <li class="header-item">
                <label for="header-item-input">
                    <i class="fa-solid fa-bars"></i>
                </label>
                <input type="radio" id="header-item-input" name="header-item">
                <input type="radio" id="header-item-input1" name="header-item">
                <div class="header-item-list-icon">
                    <div class="header-item-list-icon-top">
                        <div class="header-search header-search2">
                            <form action="indexSearch.php?pages/content/search.php" method="POST">
                                <button name="search" class="header-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <input type="text" autocomplete="off" name="key" placeholder="TÌM KIẾM SẢN PHẨM">
                            </form>
                        </div>
                        <div class="header-item-list-icon-close">
                            <label for="header-item-input1">
                                <i class="fa-solid fa-xmark"></i>
                            </label>
                        </div>
                    </div>
                    <div class="header-item-list-icon-bottom">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/phi.pv.9/" class="header-item-icon"><i class="fa-brands fa-facebook"></i>Đến Facebook</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/phamviet_phi/" class="header-item-icon"><i class="fa-brands fa-instagram"></i>Đên Instagram</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="header-item">
                <a href="../shoe_php/index.php">
                    <img class="header-item-mylogo" src="image/my_logo.jpg" alt="">
                </a>
            </li>
            <li class="header-item display-flex">
                <div class="header-search">
                    <form action="indexSearch.php?pages/content/search.php" method="POST">
                        <button name="search" class="header-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" autocomplete="off" name="keyPC" placeholder="TÌM KIẾM SẢN PHẨM">
                    </form>
                </div>
                <a href="" class="header-item-icon  header-infomationAdmin"><i class="fa-solid fa-headphones"></i>
                    <div class="infomationAdmin">
                        <div class="infomationAdmin-header">
                            <span>Trợ giúp</span>
                        </div>

                        <div class="infomationAdmin-content">
                            <i class="fa-solid fa-phone-volume"></i>
                            <span>0914608260</span>
                        </div>

                    </div>
                </a>



                <?php if (isset($_SESSION['user'])) {
                ?>
                    <span href="" class="header-item-icon header-information-icon-link"><i class="fa-regular fa-user"></i>
                        <div class="header-information-list-icon">
                            <div class="header-information-list-icon-name">
                                <h4>Tài khoản của tôi</h4>
                            </div>
                            <ul class="header-information-list-bottom">
                                <li>
                                    <a href="indexQldonhang.php?page=1">
                                        <i class="fa-regular fa-user"></i>
                                        <span>Thông tin tài khoản</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="indexQldonhang.php?page=2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Quản lý đơn hàng</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="indexQldonhang.php?page=3">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span>Thông tin địa chỉ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php?logout=1">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </span>
                <?php
                } else {
                ?>
                    <a href="indexLogin.php?pages/content/login.php" class="header-item-icon"><i class="fa-regular fa-user"></i></a>
                <?php
                }
                ?>


                <label for="modal-click">
                    <span class="header-item-icon"><i class="fa-solid fa-bag-shopping padding-4px"></i></span>
                </label>

                <span class="header-item-number">
                    <?php
                    if (isset($_SESSION['cart_shoe'])) {
                        $length = count($_SESSION['cart_shoe']);
                        echo $length;
                    } else {
                        echo "0";
                    }
                    ?>
                </span>
            </li>
            <input id="modal-click" name="test" type="radio">
            <input id="modal-click1" name="test" type="radio">
            <?php
            include('pages/content/giohang.php')
            ?>
        </ul>
    </div>
</div>

<section class="thongbao open">
    <div class="thongbao-div">
        <div class="thongbao-div-close">
            <i class="fa-regular fa-circle-xmark"></i>
        </div>
        <div class="thongbao-div-cart">
            <i class="fa-solid fa-cart-plus"></i>
        </div>
        <div class="thongbao-div-text">
            <span>Thêm giỏ hàng thành công</span>
        </div>
    </div>
</section>

<div class="grid wide">
    <div class="detail">
        <form action="pages/content/addProduct.php?id=<?php echo $_GET['id'] ?>&msp=<?php echo $_GET['MSP'] ?>" method="POST">
            <div class="detail-item">
                <?php
                while ($row = mysqli_fetch_array($sql_query)) {
                    $sellGiam = intval($row['gia']) * (intval($row['loaihang'])/100);
                    $sell = intval($row['gia']) - $sellGiam;
                ?>
                    <div class="detail-item-left">
                        <img class="detail-item-img" src="admin/modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt="">
                    </div>

                    <div class="detail-item-right">
                        <h3><?php echo $row['tensanpham'] ?></h3>
                        <p class="detail-item-right-id">SKU: <?php echo $row['masanpham'] ?></p>
                        <div class="detail-item-right-khohang">
                            <span>Kho hàng: </span>
                            <span class="detail-item-right-khohang-soluong"></span>
                        </div>
                        <span class="detail-item-price">
                            <?php
                            if ($row['loaihang'] == 'new') {
                                echo number_format($row['gia']) . ' đ';
                            } else {
                                echo number_format($sell) . 'đ';
                            }
                            ?></span>
                        <?php
                        $sql_giamgia = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id]' AND loaihang!='new' ";
                        $giamgia_query = mysqli_query($mysqli, $sql_giamgia);
                        while ($row_giamgia = mysqli_fetch_array($giamgia_query)) {
                        ?>
                            <span class="giamgia"><?php echo number_format($row_giamgia['gia']) . 'đ' ?></span>
                            <span class="giamgia2"><?php echo $row_giamgia['loaihang'] ?>%</span>
                        <?php
                        }
                        ?>
                        <div class="detail-list-size">
                            <?php
                            $sql_size = "SELECT * FROM tbl_size WHERE masanpham='$MSP' ORDER BY sizeGiay ASC ";
                            $sql_size_query = mysqli_query($mysqli, $sql_size);
                            while ($row_size = mysqli_fetch_array($sql_size_query)) {
                            ?>
                                <label class="<?php
                                                if ($row_size['soluong'] < 1) {
                                                    echo "check-size";
                                                }else{
                                                    echo "checkedIP";
                                                }
                                                ?>" for="size-<?php echo $row_size['sizeGiay'] ?>">
                                    <input class="size-input" type="radio" id="size-<?php echo $row_size['sizeGiay'] ?>" name="size" value="<?php echo $row_size['sizeGiay'] ?>">
                                    <span class="check-input"><?php echo $row_size['sizeGiay'] ?></span>
                                </label>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="quantity">
                            <span>Số lượng</span>
                            <div class="quantity-list">
                                <a class="minus-btn" onclick="handlelMinus()">-</a>
                                <input type="text" id="amount" name="amount" value="1"></input>
                                <a class="plus-btn">+</a>
                            </div>
                        </div>
                        <div class="add-product">
                            <!-- <input type="submit" name="themgiohang" value="Thêm giỏ hàng"></input> -->
                            <a href="">Thêm giỏ hàng</a>
                            <input type="submit" name="muahang" value="Mua hàng">
                            <!-- <i class="fa-regular fa-heart"></i>
                        <i class="fa-solid fa-heart display-none"></i> -->
                        </div>
                        <div class="tabs">
                            <ul id="tabs-nav">
                                <li><a href="#tab1">Giới thiệu</a></li>
                            </ul> <!-- END tabs-nav -->
                            <div id="tabs-content">
                                <div id="tab1" class="tab-content">
                                    <p><?php echo $row['noidung'] ?></p>
                                </div>
                            </div> <!-- END tabs-content -->
                        </div> <!-- END tabs -->
                    </div>
                <?php
                }
                ?>
            </div>
        </form>

    </div>

    <section class="detail2">
        <p>NHỮNG SẢN PHẨM CHĂM SÓC GIÀY NÊN MUA KÈM</p>

        <div class="detail2-accsessory row sm-gutter">
            <?php
            $sql_phukien = "SELECT * FROM tbl_phukien";
            $query_phukien = mysqli_query($mysqli, $sql_phukien);
            while ($row_phukien = mysqli_fetch_array($query_phukien)) {
            ?>
                <a class="col l-3 detail2-accsessory-link">
                    <form action="">
                        <img src="admin/modules/qlSanPham/uploads/<?php echo $row_phukien['hinh'] ?>" alt="">
                        <h2><?php echo $row_phukien['tenphukien'] ?></h2>
                        <span><?php echo number_format($row_phukien['giaphukien']) . ' đ' ?></span>
                    </form>
                </a>
            <?php
            }
            ?>
        </div>

    </section>

    <section class="detail3">
        <h4>MÔ TẢ SẢN PHẨM</h4>
        <div class="detail3-info row">
            <div class="detail3-left col">
                <p class="detail3-left-text">
                    <?php
                    $select_detail = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id]' ";
                    $sql_detail = mysqli_query($mysqli, $select_detail);
                    while ($row_tomtat = mysqli_fetch_array($sql_detail)) {
                        echo $row_tomtat['chitiet'];
                    }
                    ?>
                </p>
                <?php
                $select_sql = "SELECT * FROM tbl_img_product,tbl_sanpham WHERE tbl_img_product.id_sanpham=tbl_sanpham.masanpham AND tbl_img_product.id_sanpham='$_GET[MSP]' ";
                $query_img = mysqli_query($mysqli, $select_sql);
                while ($row_img = mysqli_fetch_array($query_img)) {
                ?>
                    <img src="admin/modules/qlSanPham/uploads/<?php echo $row_img['img1'] ?>" alt="">
                    <img src="admin/modules/qlSanPham/uploads/<?php echo $row_img['img2'] ?>" alt="">
                    <img src="admin/modules/qlSanPham/uploads/<?php echo $row_img['img3'] ?>" alt="">
            </div>
            <div class="detail3-right col">
                <img src="admin/modules/qlSanPham/uploads/<?php echo $row_img['img4'] ?>" alt="">
                <img src="admin/modules/qlSanPham/uploads/<?php echo $row_img['img5'] ?>" alt="">
                <img src="admin/modules/qlSanPham/uploads/<?php echo $row_img['img6'] ?>" alt="">
            <?php
                }
            ?>
            <div class="detail3-right-lienhe">
                <br>
                <br>
                <span>* Myshoes.vn cam kết:</span>
                <br>
                <br>
                <h5>
                    - Giày chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm.
                    <br>
                    <br>
                    - Myshoes.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).
                    <br>
                    <br>
                    - Đổi hàng trong 30 ngày đơn giản dễ dàng
                </h5>
                <br>
                <span>* Cách thức mua hàng:</span>
                <br>
                <br>
                - Khách hàng MUA HÀNG trên website hoặc gọi điện tới Hotline: <a href="">0914608260</a> để được tư vấn.
                <br>
                - Khách hàng sẽ nhận được sản phẩm sau 1 - 3 ngày kể từ khi đặt hàng.
                <br>
                <br>
                <span>* Thông tin liên hệ Myshoes.vn:</span>
                <br>
                <br>
                + Showroom: 388 Hoàng Diệu, Đà Nẵng.
                <br>
                <br>
                + Điện thoại: <a href="">0914608260</a> / Hotline: <a href="">0914608260</a> (Zalo)
                <br>
                <br>
                + Email: Pham512002@gmail.com
                <br>
                <br>
                + Website: <a href="">https://myshoes.vn</a>
            </div>
            </div>
        </div>



    </section>

    <section class="detail3-5">
        <h2>CÓ THỂ BẠN CŨNG THÍCH</h2>
        <p>#SAME</p>
        <i id="left" class="fa-solid fa-angle-left detail3-5-img-i1 detail3-5-i"></i>
        <i id="right" class="fa-solid fa-angle-right detail3-5-img-i2 detail3-5-i"></i>
        <div class="detail3-5-link">
            <?php
            $sql_lietke = "SELECT * FROM tbl_sanpham WHERE id_danhmuc='$danhmuc' AND masanpham!='$MSP' ";
            $sql_query = mysqli_query($mysqli, $sql_lietke);
            while ($row = mysqli_fetch_array($sql_query)) {
                $sellGiam = intval($row['gia']) * (intval($row['loaihang'])/100);
                $sell = intval($row['gia']) - $sellGiam;
            ?>
                <div class="col l-2-4 m-4 c-6 container-product-all-item">
                    <form action="pages/content/addProduct.php?id=<?php echo $row['id_sanpham'] ?>&msp=<?php echo $row['masanpham'] ?>" method="POST">
                        <a class="container-product-item" href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham'] ?>&danhmuc=<?php echo $row['id_danhmuc'] ?>">
                            <?php
                            if ($row['loaihang'] == 'new') {
                            ?>
                                <div class="info-ticket ticket-news">New</div>
                            <?php
                            } else {
                            ?>
                                <div class="info-ticket ticket-seller">Best Seller</div>
                                <div class="baddet ticket-sell">-<?php echo $row['loaihang'] ?>%</div>
                            <?php
                            }
                            ?>
                            <img class="flippable-image" src="admin/modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt="">
                            <p><?php echo $row['tensanpham'] ?></p>
                            <div class="price-cart">
                                <?php
                                if ($row['loaihang'] == 'new') {
                                ?>
                                    <span><?php echo number_format($row['gia']) . ' đ' ?></span>
                                <?php
                                } else {
                                ?>
                                    <div class="newPrice"><?php echo number_format($sell) . 'đ' ?></div>
                                    <span class="oldPrice"><?php echo number_format($row['gia']) . ' đ' ?></span>
                                <?php
                                }
                                ?>
                                <a href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham'] ?>" class="price-cart-icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <div class="price-cart-size">
                                        <?php
                                        $sql_size = "SELECT * FROM tbl_size,tbl_sanpham WHERE tbl_size.masanpham=tbl_sanpham.masanpham AND tbl_size.masanpham='$row[masanpham]' ";
                                        $size_query = mysqli_query($mysqli, $sql_size);
                                        while ($row_size = mysqli_fetch_array($size_query)) {
                                        ?>
                                            <li>
                                                <input type="submit" class="price-cart-submit" name="price-cart-submit" value="<?php echo $row_size['sizeGiay'] ?>">
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </a>

                            </div>
                        </a>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>

    </section>

    <section class="detail4">
        <h2>KHÁCH HÀNG NÓI GÌ VỀ MY SHOE</h2>
        <p>#FEEDBACK</p>
        <i id="left" class="fa-solid fa-angle-left detail4-img-i1"></i>
        <i id="right" class="fa-solid fa-angle-right detail4-img-i2"></i>
        <div class="detail4-img">
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh1.jpg" alt="">
                <p>Tôi đã mua giày của Myshoes.vn và thật sự nó vô cùng chất lượng. Hàng đảm bảo chính hãng 100% và chính sách bảo hành rất yên tâm ạ. Cảm ơn Myshoes.vn!</p>
                <h4>- Anh Phạm Viết Phi -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/kiet.jpg" alt="">
                <p>Myshoes.vn bán hàng chính hãng, giá rất ok, tôi đã mua một đôi giày chạy bộ của Nike đi rất êm và thích.</p>
                <h4>- Anh Tấn Kiệt -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/mai.jpg" alt="">
                <p>Mua hàng của Myshoes.vn thì rất yên tâm rồi, mình mua luôn 2 đôi vì nhiều mẫu đẹp quá! Sẽ ủng hộ shop thường xuyên.</p>
                <h4>- Anh Mãi -</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/huy.jpg" alt="">
                <p>Tìm một đôi giày ưng ý không hề dễ dàng, nhưng từ khi biết đến Myshoes.vn thì hoàn toàn tin tưởng, nhiều mẫu đẹp và đã chọn được một em Adidas ưng ý!</p>
                <h4>- Anh Huy Châu-</h4>
            </div>
            <div class="detail4-img-feedback">
                <img src="image/FEEDBACK/anh5.jpg" alt="">
                <p>Mới mua combo chăm sóc giày của Myshoes sử dụng rất tốt, vệ sinh giày siêu sạch, xịt nano rất hiệu quả khi đi trời mưa.</p>
                <h4>- Anh Phi CODER -</h4>
            </div>
        </div>
    </section>

    <section class="detail5">
        <div class="detail5-text">
            <textarea name="danhgia" id="" placeholder="Viết đánh giá..."></textarea>
            <div class="detail5-text-start">
                <i id="1" class="fa-solid fa-star"></i>
                <i id="2" class="fa-solid fa-star"></i>
                <i id="3" class="fa-solid fa-star"></i>
                <i id="4" class="fa-solid fa-star"></i>
                <i id="5" class="fa-solid fa-star"></i>
            </div>
            <div class="detail5-div-link">
                <a href="" class="detail5-text-link">Gửi</a>
            </div>
        </div>

        <div class="detail5-comment">

        </div>

    </section>
</div>

<script>
    var idStar = 5;
    $('.detail5-text-start i').click(function(e) {
        idStar = e.target.id;
    })

    var checkCommetUser = `${<?php echo $id_dangky ?>}`;

    if (checkCommetUser == 0) {
        $('.detail5-text').css('display', 'none');
    }
    $('.detail5-text-link').click(function(e) {
        e.preventDefault();

        idDangKy = `${<?php echo $id_dangky ?>}`;
        var comments = $('textarea[name="danhgia"]').val();
        var idSanPham = `<?php echo $_GET['id'] ?>`;

        $('textarea[name="danhgia"]').on('input', function() {
            $('textarea[name="danhgia"]').removeClass('boder_red')
        })

        $('.detail5-text-start i').removeClass('start')
        $('textarea[name="danhgia"]').val('');

        if (comments != '') {
            $.ajax({
                url: 'pages/content/ajax_get_comments.php',
                method: 'get',
                dataType: 'json',
                data: {
                    idDangKy: idDangKy,
                    comments: comments,
                    idStar: idStar,
                    idSanPham: idSanPham,
                }
            })
        } else {
            $('textarea[name="danhgia"]').addClass('boder_red')
        }
        $('.detail5-comment').load(`pages/content/ajax_get_comments.php?id=${<?php echo $_GET['id'] ?>}`);
    })
    $('.detail5-comment').load(`pages/content/ajax_get_comments.php?id=${<?php echo $_GET['id'] ?>}`);


    let amountElement = document.querySelector('#amount');
    let amount = amountElement.value;


    let render = function(amount) {
        amountElement.value = amount
    }


    $('#amount').click(function(e) {
        console.log($(this).val())
        $(this).val("");
    })

    $('#amount').blur(function() {
        if ($(this).val() == "") {
            $(this).val(1);
        }
    })



    let handlelMinus = function() {
        if (amount > 1) {
            amount--;
        }
        render(amount);
    }

    amountElement.addEventListener('input', function() {
        amount = amountElement.value;
        amount = parseInt(amount);
        amount = (isNaN(amount)) ? 1 : amount;
        if (amount > 20) {
            amount = 20;
            thongbao2.css('display', 'flex');
            thongBaoDiv.css('display', 'block');
            setTimeout(function() {
                thongbao2.css('display', 'none')
                thongBaoDiv.css('display', 'none')
            }, 2000)
            $('.thongbao-div-text span').text(`Không thể đặt lượng hàng lớn hơn 20`)
        } else {
            amount = amount;
        }

        render(amount);
    })

    var input = document.querySelector('.checkedIP .size-input');
    input.checked = true;


    var checkInput = $('.checkedIP .check-input');
    var sizeClick = input.value;

    

    // size hết thì ẩn

    checkInput.click(function(e) {
        sizeClick = e.target.innerHTML;
    })

    let checkSoLuong = $('#amount').val();
    let msp = `<?php echo $_GET['MSP'] ?>`;

    function khohang(checkSoLuong, msp) {
        $.ajax({
            url: 'pages/detailProduct/get_kho.php',
            method: 'get',
            dataType: 'json',
            data: {
                checkSoLuong: checkSoLuong,
                sizeClick: sizeClick,
                msp: msp
            },
            success: function(data) {
                $.each(data, function(i, val) {
                    var checkCSDL = val.soluong;
                    console.log(checkCSDL)
                    $('.detail-item-right-khohang-soluong').text(checkCSDL)
                })
            }
        })
    }
    khohang(checkSoLuong, msp)

    $('.size-input').on('change', function() {
        let checkSoLuong = $('#amount').val();
        let msp = `<?php echo $_GET['MSP'] ?>`;
        $.ajax({
            url: 'pages/detailProduct/get_kho.php',
            method: 'get',
            dataType: 'json',
            data: {
                checkSoLuong: checkSoLuong,
                sizeClick: sizeClick,
                msp: msp
            },
            success: function(data) {
                $.each(data, function(i, val) {
                    var checkCSDL = val.soluong;
                    $('.detail-item-right-khohang-soluong').text(checkCSDL)
                })
            }
        })
    })

    var thongbao = $('.add-product a');
    thongbao2 = $('.thongbao');
    thongBaoDiv = $('.thongbao-div');
    closeThongbao = $('.thongbao-div-close i');


    thongbao.click(function(e) {
        e.preventDefault();
        let checkSoLuong = $('#amount').val();
        let msp = `<?php echo $_GET['MSP'] ?>`;
        $.ajax({
            url: 'pages/detailProduct/ajax_get_soluong.php',
            method: 'get',
            dataType: 'json',
            data: {
                checkSoLuong: checkSoLuong,
                sizeClick: sizeClick,
                msp: msp
            },
            success: function(data) {
                $.each(data, function(i, val) {
                    var checkCSDL = val.soluong;
                    var checkCart = parseInt(val.getCartSL) + parseInt(checkSoLuong);
                    // console.log(checkCSDL)
                    // console.log(checkCart - 1)
                    if (checkCSDL <= checkCart - 1) {
                        $('.thongbao-div-text span').text(`Không đủ sản phẩm trong kho`)
                    } else {
                        $('.thongbao-div-text span').text(`Thêm giỏ hàng thành công`)
                    }
                })
            }
        })
        thongbao2.css('display', 'flex');
        thongBaoDiv.css('display', 'block');
        setTimeout(function() {
            thongbao2.css('display', 'none')
            thongBaoDiv.css('display', 'none')
        }, 2000)
        $('.header').load(`pages/detailProduct/detailHeader.php?id=<?php echo $_GET['id'] ?>&amount=${checkSoLuong}&size=${sizeClick}&msp=<?php echo $_GET['MSP'] ?>`);
    })


    closeThongbao.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    thongbao2.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    // Lăn ảnh 2
    var carousel2 = document.querySelector('.detail3-5-link')
    firstImg2 = document.querySelectorAll('.container-product-all-item')[0];


    var arrowIcons2 = document.querySelectorAll('.detail3-5-i')
    let firstImgWidth2 = firstImg2.clientWidth + 8;
    let scrollWidth2 = carousel2.scrollWidth - carousel2.clientWidth;

    const showHideIcons2 = () => {
        arrowIcons2[0].style.display = carousel2.scrollLeft == 0 ? "none" : "block";
        arrowIcons2[1].style.display = carousel2.scrollLeft == scrollWidth ? "none" : "block";
    }

    arrowIcons2.forEach(function(icon) {
        icon.addEventListener('click', function() {
            carousel2.scrollLeft += icon.id == "left" ? -firstImgWidth2 : firstImgWidth2;
            setTimeout(() => showHideIcons(), 60)
        })
    })

    let isDragStart2 = false,
        prevPageX2, prevScrollLeft2;
    const dragStart2 = function(e) {
        isDragStart2 = true;
        prevPageX2 = e.pageX;
        prevScrollLeft2 = carousel2.scrollLeft;
    }

    const dragging2 = function(e) {
        if (!isDragStart2) return;
        e.preventDefault();
        carousel2.classList.add('dragging')
        let positionDriff2 = e.pageX - prevPageX2;
        carousel2.scrollLeft = prevScrollLeft2 - positionDriff2;
        showHideIcons2();
    }

    const dragStop2 = function() {
        isDragStart2 = false;
        carousel2.classList.remove('dragging')
    }


    carousel2.addEventListener('mousedown', dragStart2);
    carousel2.addEventListener('mousemove', dragging2);
    carousel2.addEventListener('mouseup', dragStop2);

    // Lăn ảnh

    var carousel = document.querySelector('.detail4-img')
    firstImg = document.querySelectorAll('.detail4-img-feedback')[0];

    var arrowIcons = document.querySelectorAll('.detail4 i')
    let firstImgWidth = firstImg.clientWidth + 16;
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth;

    const showHideIcons = () => {
        arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
        arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
    }

    arrowIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
            setTimeout(() => showHideIcons(), 60)
        })
    })

    let isDragStart = false,
        prevPageX, prevScrollLeft;
    const dragStart = function(e) {
        isDragStart = true;
        prevPageX = e.pageX;
        prevScrollLeft = carousel.scrollLeft;
    }

    const dragging = function(e) {
        if (!isDragStart) return;
        e.preventDefault();
        carousel.classList.add('dragging')
        let positionDriff = e.pageX - prevPageX;
        carousel.scrollLeft = prevScrollLeft - positionDriff;
        showHideIcons();
    }

    const dragStop = function() {
        isDragStart = false;
        carousel.classList.remove('dragging')
    }


    carousel.addEventListener('mousedown', dragStart);
    carousel.addEventListener('mousemove', dragging);
    carousel.addEventListener('mouseup', dragStop);
    // đánh giá sản phẩm

    var star = document.querySelectorAll('.detail5-text-start i');
    var iconClick;

    star.forEach(function(icon) {
        icon.addEventListener('click', function(e) {
            iconClick = icon.id;
            if (iconClick == 1) {
                star[0].classList.add('start');
                star[1].classList.remove('start');
                star[2].classList.remove('start');
                star[3].classList.remove('start');
                star[4].classList.remove('start');
            } else if (iconClick == 2) {
                star[0].classList.add('start');
                star[1].classList.add('start');
                star[2].classList.remove('start');
                star[3].classList.remove('start');
                star[4].classList.remove('start');
            } else if (iconClick == 3) {
                star[0].classList.add('start');
                star[1].classList.add('start');
                star[2].classList.add('start');
                star[3].classList.remove('start');
                star[4].classList.remove('start');
            } else if (iconClick == 4) {
                star[0].classList.add('start');
                star[1].classList.add('start');
                star[2].classList.add('start');
                star[3].classList.add('start');
                star[4].classList.remove('start');
            } else {
                star[0].classList.add('start');
                star[1].classList.add('start');
                star[2].classList.add('start');
                star[3].classList.add('start');
                star[4].classList.add('start');
            }
        })

    })

    $('.header-search i').click(function(e) {
        if ($('input[name="keyPC"]').val() == "") {
            e.preventDefault();
        }
    })

    $('input[name="keyPC"]').keypress(function(e) {
        if (event.keyCode === 13) {
            // Kiểm tra giá trị của thẻ input
            var inputValue = $(this).val();
            if (inputValue.trim() === '') {
                // Nếu thẻ input rỗng, ngăn chặn sự kiện mặc định của phím Enter
                e.preventDefault();
            }
        }
    })

    $('.plus-btn').click(function() {
        let checkSoLuong = $('#amount').val();
        let msp = `<?php echo $_GET['MSP'] ?>`;
        console.log(checkSoLuong)
        if (checkSoLuong) {
            $.ajax({
                url: 'pages/detailProduct/ajax_get_soluong.php',
                method: 'get',
                dataType: 'json',
                data: {
                    checkSoLuong: checkSoLuong,
                    sizeClick: sizeClick,
                    msp: msp
                },
                success: function(data) {
                    $.each(data, function(i, value) {
                        let getSoluong = parseInt(value.soluong);
                        if (checkSoLuong < getSoluong) {
                            amount++
                            render(amount);
                        } else {
                            thongbao2.css('display', 'flex');
                            thongBaoDiv.css('display', 'block');
                            setTimeout(function() {
                                thongbao2.css('display', 'none')
                                thongBaoDiv.css('display', 'none')
                            }, 2000)
                            $('.thongbao-div-text span').text(`Không đủ sản phẩm trong kho`)
                        }
                    })
                }
            })
        }
        if (checkSoLuong >= 20) {
            render(amount = 19);
            thongbao2.css('display', 'flex');
            thongBaoDiv.css('display', 'block');
            setTimeout(function() {
                thongbao2.css('display', 'none')
                thongBaoDiv.css('display', 'none')
            }, 2000)
            $('.thongbao-div-text span').text(`Không thể đặt lượng hàng lớn hơn 20`)
        }
    })

    $('#amount').on('input', function() {
        let checkSoLuong = $('#amount').val();
        let msp = `<?php echo $_GET['MSP'] ?>`;
        if (amount) {
            $.ajax({
                url: 'pages/detailProduct/ajax_get_soluong.php',
                method: 'get',
                dataType: 'json',
                data: {
                    checkSoLuong: amount,
                    sizeClick: sizeClick,
                    msp: msp
                },
                success: function(data) {
                    $.each(data, function(i, value) {
                        let getSoluong = parseInt(value.soluong);
                        if (checkSoLuong > getSoluong) {
                            thongbao2.css('display', 'flex');
                            thongBaoDiv.css('display', 'block');
                            setTimeout(function() {
                                thongbao2.css('display', 'none')
                                thongBaoDiv.css('display', 'none')
                            }, 2000)
                            $('.thongbao-div-text span').text(`Không đủ sản phẩm trong kho`)
                            render(getSoluong)
                        }
                    })
                }
            })
        }
    })

</script>