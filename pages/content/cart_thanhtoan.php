<?php
session_start();
$id_dangky = $_SESSION['user'];
?>
<div class="chondiachi">
    <div class="chondiachi-form">
        <div class="chondiachi-close">
            <i class="fa-solid fa-x"></i>
        </div>
        <div class="chondiachi-tieude">
            <h4>Chọn địa chỉ khác</h4>
        </div>
        <div class="chondiachi-thaydoi">
            <?php
            $select_address = "SELECT * FROM tbl_sodiachi WHERE id_dangky=$id_dangky";
            $address_query = mysqli_query($mysqli, $select_address);
            while ($row_thaydoi = mysqli_fetch_array($address_query)) {
                $code = $row_thaydoi['id_diachi'];
            ?>
                <div class="form-thaydoi">
                    <a href="http://localhost/shoe_php/indexOrder.php?sum=<?php echo $_GET['sum'] ?>&sl=<?php echo $_GET['sl'] ?>&idDiaChi=<?php echo $code ?> ">
                        <div class="form-thaydoi-top">
                            <h5><?php echo $row_thaydoi['fullname'] ?></h5>
                            <p><?php echo $row_thaydoi['phone'] ?></p>
                        </div>
                        <?php
                        $sql_diachi2 = "SELECT * FROM tbl_sodiachi,province,district,wards WHERE id_dangky=$id_dangky 
            AND tbl_sodiachi.province_id=province.province_id AND tbl_sodiachi.district_id=district.district_id
            AND tbl_sodiachi.wards_id=wards.wards_id AND id_diachi=$code";
                        $sql_diachi2_query = mysqli_query($mysqli, $sql_diachi2);
                        while ($row_diachi2 = mysqli_fetch_array($sql_diachi2_query)) {
                        ?>
                            <div class="form-thaydoi-bot">
                                Địa chỉ: <?php echo $row_thaydoi['addres'] ?>, <?php echo $row_diachi2['name_wards'] ?>, <?php echo $row_diachi2['name_district'] ?>, <?php echo $row_diachi2['name'] ?>
                            </div>
                        <?php
                        }
                        ?>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<form action="pages/content/uploadImg.php" method="POST">
    <div class="thongbao2 open">
        <div class="thongbao2-div">
            <div class="thongbao-div-close">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <div class="thongbao-div-name">
                <h4>THÊM ĐỊA CHỈ</h4>
            </div>
            <div class="thongbao-div-address-top">
                <div class="thongbao-div-address-top-left">
                    <div class="form-address">
                        <input type="text" name="ten0" placeholder="Họ tên">
                        <span class="ten-error0"></span>
                    </div>
                    <div class="form-address">
                        <select name="province0" id="province">
                            <option value="0">-Chọn Tỉnh/TP-</option>
                            <?php
                            $tinh = "SELECT * FROM province";
                            $query_tinh = mysqli_query($mysqli, $tinh);
                            while ($row_tinh = mysqli_fetch_array($query_tinh)) {
                            ?>
                                <option value="<?php echo $row_tinh['province_id'] ?>"><?php echo $row_tinh['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <span class="province-error0"></span>
                    </div>
                </div>
                <div class="thongbao-div-address-top-right">
                    <div class="form-address">
                        <input type="text" name="sodienthoai0" placeholder="Số điện thoại">
                        <span class="sodienthoai-error0"></span>
                    </div>
                    <div class="form-address">
                        <select name="district0" id="district">
                            <option value="0">-Chọn Quận/Huyện-</option>
                        </select>
                        <span class="district-error0"></span>
                    </div>
                </div>
            </div>
            <div class="thongbao-div-address-bot">
                <div class="form-address">
                    <select name="award0" id="award">
                        <option value="0">-Phường xã-</option>
                    </select>
                    <span class="award-error0"></span>
                </div>
                <div class="form-address">
                    <input type="text" name="diachi0" placeholder="Địa chỉ">
                    <span class="diachi-error0"></span>
                </div>
            </div>
            <input class="thongbao2-submit" name="address" type="submit" value="Thêm địa chỉ">
        </div>
    </div>
</form>

<form action="pages/content/xulydathang.php?sum=<?php echo $_GET['sum'] ?>&sl=<?php echo $_GET['sl'] ?>&
<?php echo (isset($_GET['idDiaChi']))? ('diachi='.$_GET['idDiaChi']):('dangky='.$id_dangky)?>" method="post">
    <div class="cart_thanhtoan">
        <div class="grid wide">
            <div class="cart-pay-content">
                <div class="cart-pay-content-left">
                    <div class="cart-pay-content-left-top">
                        <ul>
                            <li>Giỏ hàng</li>
                            <li class="cart-pay-active">Đặt hàng</li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                    <div class="cart-thanhtoan-content-address-giao">
                        <p>Địa chỉ giao hàng</p>
                    </div>

                    <?php
                    if (isset($_GET['idDiaChi'])) {
                        $sql_real = "SELECT * FROM tbl_sodiachi WHERE id_dangky=$id_dangky AND id_diachi='$_GET[idDiaChi]' ";
                        $sql_real_query = mysqli_query($mysqli, $sql_real);
                    } else {
                        $sql_real = "SELECT * FROM tbl_dangky WHERE id_dangky=$id_dangky";
                        $sql_real_query = mysqli_query($mysqli, $sql_real);
                    }
                    while ($row_real = mysqli_fetch_array($sql_real_query)) {
                    ?>
                        <div class="QL_content-right-infomation-address">
                            <div class="QL_content-right-infomation-address-top">
                                <p><?php echo $row_real['fullname'] ?></p>
                                <label>
                                    <span>Thay đổi địa chỉ</span>
                                    <a href="http://localhost/shoe_php/indexOrder.php?sum=<?php echo $_GET['sum'] ?>&sl=<?php echo $_GET['sl'] ?>">Mặc định</a>
                                </label>
                            </div>
                            <div class="QL_content-right-infomation-address-bot">
                                <p>Điện thoại: <?php echo $row_real['phone'] ?></p>
                                <?php
                                if(isset($_GET['idDiaChi'])){
                                    $sql_diachi = "SELECT * FROM tbl_sodiachi,province,district,wards WHERE id_diachi=$_GET[idDiaChi] 
                                    AND tbl_sodiachi.province_id=province.province_id AND tbl_sodiachi.district_id=district.district_id
                                    AND tbl_sodiachi.wards_id=wards.wards_id";
                                    $sql_diachi_query = mysqli_query($mysqli, $sql_diachi);
                                }else{
                                    $sql_diachi = "SELECT * FROM tbl_dangky,province,district,wards WHERE id_dangky=$id_dangky 
                                    AND tbl_dangky.province_id=province.province_id AND tbl_dangky.district_id=district.district_id
                                    AND tbl_dangky.wards_id=wards.wards_id";
                                    $sql_diachi_query = mysqli_query($mysqli, $sql_diachi);
                                }
                                
                                while ($row_diachi = mysqli_fetch_array($sql_diachi_query)) {
                                ?>
                                    <p>Địa chỉ: <?php echo $row_real['addres'] ?>, <?php echo $row_diachi['name_wards'] ?>, <?php echo $row_diachi['name_district'] ?>, <?php echo $row_diachi['name'] ?> </p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="cart-thanhtoan-content-address-them">
                        <a class="add-address">+ THÊM ĐỊA CHỈ</a>
                    </div>
                    <div class="cart-thanhtoan-content-top">
                        <p>Phương thức thanh toán</p>
                    </div>
                    <div class="cart-thanhtoan-content-bottom">
                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                        <div class="cart-thanhtoan-content-form">
                            <input checked type="radio" name="thanhtoan" value="tienmat">
                            <span>Thanh toán khi nhận hàng</span>
                            <img src="image/moneyLogo.png" alt="">
                        </div>
                        <div class="cart-thanhtoan-content-form">
                            <input type="radio" name="thanhtoan" value="momo">
                            <span>Thanh toán qua ví momo</span>
                            <img src="image/logo_momo.jpg" alt="">
                        </div>
                    </div>

                </div>
                <div class="cart-pay-content-right">
                    <div class="cart-pay-content-right-name">
                        <h4>Tóm tắt đơn hàng</h4>
                    </div>
                    <div class="cart-pay-content-right-product">
                        <span>Tổng tiền hàng</span>
                        <p><?php echo number_format($_GET['sum']) . 'đ' ?></p>
                    </div>
                    <div class="cart-pay-content-right-price">
                        <span>Phí vận chuyển</span>
                        <p>0đ</p>
                    </div>
                    <div class="cart-pay-content-right-end">
                        <span>Tiền thanh toán</span>
                        <p><?php echo number_format($_GET['sum']) . 'đ' ?></p>
                    </div>
                    <div class="cart-pay-content-right-submit">
                        <button type="submit" name="xulydathang">Tiếp tục thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var add = $('.add-address');
    thongbao2 = $('.thongbao2');
    thongBaoDiv = $('.thongbao2-div');

    closeThongbao = $('.thongbao-div-close i');
    closeThongbao.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })


    add.click(function() {
        thongbao2.css('display', 'flex');
        thongBaoDiv.css('display', 'block');
    })


    $('.thongbao2-submit').click(function(e) {
        var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var name = $('input[name="ten0"]');
        var sdt = $('input[name="sodienthoai0"]');
        var diachi = $('input[name="diachi0"]');
        var province = $('select[name="province0"]');
        var district = $('select[name="district0"]');
        var award = $('select[name="award0"]');
        var checkSubmit = 0;

        if (!$.isNumeric(sdt.val()) || (sdt.val()).length != 10) {
            $(sdt).addClass('active-address')
            $('.sodienthoai-error0').text("Sai cú pháp");
            checkSubmit++;
        }
        if ($.isNumeric(name.val())) {
            $(name).addClass('active-address')
            $('.ten-error0').text("Không được là số");
            checkSubmit++;
        }
        if ((name.val()).match(specialChars) || name.val() == "") {
            $(name).addClass('active-address')
            $('.ten-error0').text("Sai cú pháp");
            checkSubmit++;
        }
        if ((name.val()).match(specialChars) || diachi.val() == "") {
            $(diachi).addClass('active-address')
            $('.diachi-error0').text("Sai cú pháp");
            checkSubmit++;
        }
        if (province.val() == 0) {
            $(province).addClass('active-address')
            $('.province-error0').text("Sai cú pháp");
            checkSubmit++;
        }
        if (district.val() == 0) {
            $(district).addClass('active-address')
            $('.district-error0').text("Sai cú pháp");
            checkSubmit++;
        }
        if (award.val() == 0) {
            $(award).addClass('active-address')
            $('.award-error0').text("Sai cú pháp");
            checkSubmit++;
        }

        if (checkSubmit != 0) {
            return false;
        }

    })

    $(document).ready(function() {
        $('#province').on('change', function() {
            var province_id = $(this).val();

            if (province_id) {
                $.ajax({
                    url: 'pages/content/ajax_get_distris.php',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        province_id: province_id
                    },
                    success: function(data) {
                        $('#district').empty();

                        $.each(data, function(i, district) {
                            $('#district').append($('<option>', {
                                value: district.id,
                                text: district.name
                            }))
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log('Error: ' + errorThrown);
                    }
                })
                //$('#award').empty();

            } else {
                $('#district').empty();
            }
        })

        $('#district').on('change', function() {
            var district_id = $(this).val();

            if (district_id) {
                $.ajax({
                    url: 'pages/content/ajax_get_award.php',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        $('#award').empty();

                        $.each(data, function(i, award) {
                            $('#award').append($('<option>', {
                                value: award.id,
                                text: award.name
                            }))
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log('Error: ' + errorThrown);
                    }
                })
            } else {
                $('#award').empty();
            }
        })
    })

    var nameValidater0 = $('input[name="ten0"]');
    var sdtValidater0 = $('input[name="sodienthoai0"]');
    var diachiValidater0 = $('input[name="diachi0"]');
    var provinceValidater0 = $('select[name="province0"]');
    var districtValidater0 = $('select[name="district0"]');
    var awardValidater0 = $('select[name="award0"]');




    $(nameValidater0).on('input', function() {
        $(this).val($(this).val().toUpperCase())
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.ten-error0').text("");
        }
    })
    $(sdtValidater0).on('input', function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.sodienthoai-error0').text("");
        }
    })
    $(diachiValidater0).on('input', function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.diachi-error0').text("");
        }
    })
    $(provinceValidater0).on('input', function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.province-error0').text("");
        }
    })
    $(districtValidater0).on('input', function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.district-error0').text("");
        }
    })
    $(awardValidater0).on('input', function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.award-error0').text("");
        }
    })

    $('.chondiachi').css('display', 'none')
    $('.QL_content-right-infomation-address-top').click(function() {
        $('.chondiachi').css('display', 'flex')
    })

    $('.chondiachi-close').click(function() {
        $('.chondiachi').css('display', 'none')
    })
</script>