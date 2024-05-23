<?php

// Phân trang
if (isset($_GET['page'])) {
    $pages = $_GET['page'];
} else {
    $pages = '';
}

if ($pages == '' || $pages == 1) {
    $begin = 0;
} else {
    $begin = ($pages * 10) - 10;
    $sql_lietke = "SELECT * FROM tbl_sanpham LIMIT $begin,10";
    $sql_query = mysqli_query($mysqli, $sql_lietke);
}



?>

<div id="container-product" class="container-product">


    <div class="seenAll-header">


        <div class="arrange">
            <?php
            if (isset($_POST['key'])) {
            ?>
                <div class="arrange-left">
                    <span>Kết quả tìm kiếm theo '<?php echo $key ?>'</span>
                </div>
            <?php
            }
            ?>
            <div class="arrange-right">
                <div class="arrange-default">
                    <span href="">Sắp xếp theo</span>
                    <i class="fa-solid fa-angle-down"></i>
                    <i class="fa-solid fa-angle-up"></i>


                    <div class="arrange-style">
                        <ul>

                            <li>
                                <a href="indexSeenAll.php?pages/content/hienthisanpham.php&seen=default&page=1" class="seen-new">Mặc định</a>
                            </li>

                            <li>
                                <a href="indexSeenAll.php?pages/content/hienthisanpham.php&seen=new&page=1" class="seen-new1">Mới nhất</a>
                            </li>

                            <li>
                                <a href="indexSeenAll.php?pages/content/hienthisanpham.php&seen=up&page=1" class="seen-up">Giá: cao đến thấp</a>
                            </li>

                            <li>
                                <a href="indexSeenAll.php?pages/content/hienthisanpham.php&seen=down&page=1" class="seen-down">Giá: thấp đến cao</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="item-side-0">
        <div class="sm-gutter-left">
            <ul class="list-side">
                <li class="item-side ">
                    <div class="item-side-title">
                        <p>Hiệu giày</p>
                        <i class="fa-solid fa-plus 1"></i>
                        <i class="fa-solid fa-minus 1"></i>
                    </div>
                    <div class="item-side-shoe">
                        <?php
                        $sqlGiay = "SELECT * FROM tbl_danhmucsanpham";
                        $giayQuery = mysqli_query($mysqli, $sqlGiay);
                        while ($rowGiay = mysqli_fetch_array($giayQuery)) {
                        ?>
                            <div id="<?php echo $rowGiay['id_danhmuc'] ?>" class="item-side-shoe-form item-side-all">
                                <label class="item-side-shoe-btn">
                                    <input type="radio">
                                </label>
                                <span><?php echo $rowGiay['tendanhmucsanpham'] ?></span>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </li>
                <li class="item-side">
                    <div class="item-side-title">
                        <p>Size</p>
                        <i class="fa-solid fa-plus 2"></i>
                        <i class="fa-solid fa-minus 2"></i>
                    </div>
                    <div class="item-side-size">
                        <?php
                        $sqlSize1 = "SELECT * FROM size ORDER BY sizeGiay ASC";
                        $size1Query = mysqli_query($mysqli, $sqlSize1);
                        while ($rowSize = mysqli_fetch_array($size1Query)) {
                        ?>
                            <label id="<?php echo $rowSize['sizeGiay'] ?>" class="item-side-size-number item-side-all">
                                <p> <?php echo $rowSize['sizeGiay'] ?></p>
                            </label>
                            <input type="text" value="<?php echo $rowSize['sizeGiay'] ?>">
                        <?php
                        }
                        ?>
                    </div>
                </li>
                <li class="item-side ">
                    <div class="item-side-title">
                        <p>Mức giá</p>
                        <i class="fa-solid fa-plus 3"></i>
                        <i class="fa-solid fa-minus 3"></i>
                    </div>
                    <div class="slider-container">
                        <input type="range" min="0" max="5000000" value="0" class="slider" id="myRange">
                        <p>Giá: <span id="sliderValue"></span> đ</p>
                    </div>
                </li>
                <li class="item-side">
                    <div class="item-side-title">
                        <p>Giới tính</p>
                        <i class="fa-solid fa-plus 4"></i>
                        <i class="fa-solid fa-minus 4"></i>
                    </div>
                    <div class="item-side-sex">
                        <div id="Nam" class="item-side-shoe-form-sex item-side-all">
                            <label class="item-side-shoe-btn">
                                <input type="radio">
                            </label>
                            <span>Nam</span>
                        </div>
                        <div id="Nữ" class="item-side-shoe-form-sex item-side-all">
                            <label class="item-side-shoe-btn">
                                <input type="radio">
                            </label>
                            <span>Nữ</span>
                        </div>
                    </div>

                </li>
                <div class="add-product">
                    <input class="boloc" type="submit" name="boloc" value="Bỏ lọc">
                    <input class="loc" type="submit" name="loc" value="Lọc">
                </div>
            </ul>
        </div>
        <div class="sm-gutter row loadProduct">
            <?php
            $sql_lietke = "SELECT * FROM tbl_sanpham";
            $sql_query = mysqli_query($mysqli, $sql_lietke);
            while ($row = mysqli_fetch_array($sql_query)) {
                $sellGiam = intval($row['gia']) * (intval($row['loaihang'])/100);
                $sell = intval($row['gia']) - $sellGiam;
            ?>
                <div class="col l-3">
                    <a class="container-product-item" href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham']?>&danhmuc=<?php echo $row['id_danhmuc']?>">
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
                        <img src="admin/modules/qlSanPham/uploads/<?php echo $row['hinh'] ?>" alt="">
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
                            <a href="../../shoe_php/indexDetail.php?id=<?php echo $row['id_sanpham'] ?>&MSP=<?php echo $row['masanpham']?>&danhmuc=<?php echo $row['id_danhmuc']?>" class="price-cart-icon">
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
                </div>
            <?php
            }
            ?>

        </div>
    </div>


    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham ");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 10);
    ?>
    <div class="pages">
        <ul>
            <li>1</li>
        </ul>
    </div>

</div>

<script>
    $(document).ready(function() {
        $(".item-side-title").click(function(e) {
            cha = e.target.parentElement
            if ($(cha).hasClass('active-click-show')) {
                $(cha).removeClass('active-click-show')
            } else {
                $(cha).addClass('active-click-show')
            }
        })

        $(".item-side-title p").click(function(e) {
            cha = e.target.parentElement.parentElement
            if ($(cha).hasClass('active-click-show')) {
                $(cha).removeClass('active-click-show')
            } else {
                $(cha).addClass('active-click-show')
            }
        })

        $(".item-side-title i").click(function(e) {
            cha = e.target.parentElement.parentElement
            if ($(cha).hasClass('active-click-show')) {
                $(cha).removeClass('active-click-show')
            } else {
                $(cha).addClass('active-click-show')
            }
        })



        //active 
        var arraySize = [];
        var objSide = [];
        var numberPrice = 0;
        var gender;


        $(".item-side-shoe-form").click(function(e) {
            if ($(this).hasClass('active-all')) {
                $(e.currentTarget).removeClass('active-all');
                var index = objSide.indexOf(e.currentTarget.id);
                if (index !== -1) {
                    objSide.splice(index, 1);
                }
            } else {
                $(e.currentTarget).addClass('active-all');
                objSide.push(e.currentTarget.id)
            }
        });

        $(".item-side-size-number").click(function(e) {
            if ($(this).hasClass('active-all')) {
                $(e.currentTarget).removeClass('active-all');
                var index = arraySize.indexOf(e.currentTarget.id);
                if (index !== -1) {
                    arraySize.splice(index, 1);
                }
            } else {
                $(e.currentTarget).addClass('active-all');
                arraySize.push(e.currentTarget.id)
            }
        });

        $('#myRange').on('change', function() {
            numberPrice = $(this).val()
        })

        $(".item-side-shoe-form-sex").click(function(e) {
            $(".item-side-shoe-form-sex").removeClass("active-all");
            $(this).addClass("active-all");
            gender = e.currentTarget.id
        })


        $('input[name="loc"]').click(function() {
            var newArray = $.map(objSide, function(item) {
                return "'" + item + "'";
            });
            var result = newArray.join(',');

            var newArraySize = $.map(arraySize, function(item) {
                return "'" + item + "'";
            });
            var resultSize = newArraySize.join(',');
            
            $('.loadProduct').load(`pages/content/ajax_get_seenAll.php?danhmuc=${result}&size=${resultSize}&gender=${gender}&price=${numberPrice}`)
        })
        

        $('.seen-new').click(function(e){
            e.preventDefault();
            var newArray = $.map(objSide, function(item) {
                return "'" + item + "'";
            });
            var result = newArray.join(',');

            var newArraySize = $.map(arraySize, function(item) {
                return "'" + item + "'";
            });
            var resultSize = newArraySize.join(',');
            $('.arrange-default span').text('Mặc định')
            $('.loadProduct').load(`pages/content/ajax_get_seenAll.php?danhmuc=${result}&size=${resultSize}&gender=${gender}&price=${numberPrice}&seen=default`)
        })

        $('.seen-new1').click(function(e){
            e.preventDefault();
            var newArray = $.map(objSide, function(item) {
                return "'" + item + "'";
            });
            var result = newArray.join(',');

            var newArraySize = $.map(arraySize, function(item) {
                return "'" + item + "'";
            });
            var resultSize = newArraySize.join(',');
            $('.arrange-default span').text('Mới nhất')
            $('.loadProduct').load(`pages/content/ajax_get_seenAll.php?danhmuc=${result}&size=${resultSize}&gender=${gender}&price=${numberPrice}&seen=new`)
        })

        $('.seen-up').click(function(e){
            e.preventDefault();
            var newArray = $.map(objSide, function(item) {
                return "'" + item + "'";
            });
            var result = newArray.join(',');

            var newArraySize = $.map(arraySize, function(item) {
                return "'" + item + "'";
            });
            var resultSize = newArraySize.join(',');
            $('.arrange-default span').text('Giá: cao đến thấp')
            $('.loadProduct').load(`pages/content/ajax_get_seenAll.php?danhmuc=${result}&size=${resultSize}&gender=${gender}&price=${numberPrice}&seen=up`)
        })

        $('.seen-down').click(function(e){
            e.preventDefault();
            var newArray = $.map(objSide, function(item) {
                return "'" + item + "'";
            });
            var result = newArray.join(',');

            var newArraySize = $.map(arraySize, function(item) {
                return "'" + item + "'";
            });
            var resultSize = newArraySize.join(',');
            $('.arrange-default span').text('Giá: thấp đến cao')
            $('.loadProduct').load(`pages/content/ajax_get_seenAll.php?danhmuc=${result}&size=${resultSize}&gender=${gender}&price=${numberPrice}&seen=down`)
        })
    })


    $(".boloc").click(function(e) {
        $(".item-side-all").removeClass("active-all");
        $('#myRange').val(0);
        $('.slider-container span').text('0')
    })

</script>

<!-- Thanh trượt mức giá -->
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("sliderValue");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }

    // Lấy phần tử input range
    var slider = document.getElementById("myRange");

    // Lấy phần tử span để hiển thị giá trị
    var output = document.getElementById("sliderValue");

    // Định dạng giá trị mỗi khi giá trị của input thay đổi
    slider.oninput = function() {
        // Lấy giá trị từ input range
        var value = parseFloat(this.value);
        // Định dạng giá trị với dấu phẩy
        var formattedValue = numberWithCommas(value);
        // Hiển thị giá trị đã định dạng
        output.innerHTML = formattedValue;
    }

    // Hàm để thêm dấu phẩy vào số
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>