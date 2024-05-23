<?php
include('../../admin/config/config.php');
session_start();
$id_dangky = $_SESSION['user'];
?>
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

<form action="pages/content/uploadImg.php" method="POST">
    <div class="thongbao3 open">
        <div class="thongbao3-div">
            <div class="thongbao-div-close">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <div class="thongbao-div-name">
                <h4>THÊM ĐỊA CHỈ</h4>
            </div>
            <div class="thongbao-div-address-top">
                <div class="thongbao-div-address-top-left">
                    <div class="form-address form">
                        <input type="text" name="ten" placeholder="Họ tên" readonly>
                        <span class="ten-error"></span>
                    </div>
                    <div class="form-address">
                        <select name="province" id="province1">
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
                        <span class="province-error"></span>
                    </div>
                </div>
                <div class="thongbao-div-address-top-right">
                    <div class="form-address">
                        <input type="text" name="sodienthoai" placeholder="Số điện thoại">
                        <span class="sodienthoai-error"></span>
                    </div>
                    <div class="form-address">
                        <select name="district" id="district1">
                            <option value="0">-Chọn Quận/Huyện-</option>
                        </select>
                        <span class="district-error"></span>
                    </div>
                </div>
            </div>
            <div class="thongbao-div-address-bot">
                <div class="form-address">
                    <select name="award" id="award1">
                        <option value="">-Phường xã-</option>
                    </select>
                    <span class="award-error0"></span>
                </div>
                <div class="form-address">
                    <input type="text" name="diachi" placeholder="Địa chỉ">
                    <span class="diachi-error"></span>
                </div>
            </div>
            <input class="thongbao3-submit" name="updateAddress" type="submit" value="Thêm địa chỉ">
        </div>
    </div>
</form>

<form action="pages/content/uploadImg.php" method="post">
    <div class="thongbao4 open">
        <div class="thongbao4-div">
            <div class="thongbao-div-close">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <div class="thongbao-div-name">
                <h4>THÊM ĐỊA CHỈ</h4>
            </div>
            <div class="thongbao-div-address-top">
                <div class="thongbao-div-address-top-left">
                    <div class="form-address">
                        <input type="text" name="ten2" placeholder="Họ tên">
                        <span class="ten-error2"></span>
                    </div>
                    <div class="form-address">
                        <select name="province2" id="province2">
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
                        <span class="province-error2"></span>
                    </div>
                </div>
                <div class="thongbao-div-address-top-right">
                    <div class="form-address">
                        <input type="text" name="sodienthoai2" placeholder="Số điện thoại">
                        <span class="sodienthoai-error2"></span>
                    </div>
                    <div class="form-address">
                        <select name="district2" id="district2">
                        </select>
                        <span class="district-error2"></span>
                    </div>
                </div>
            </div>
            <div class="thongbao-div-address-bot">
                <div class="form-address">
                    <select name="award2" id="award2">
                    </select>
                    <span class="award-error2"></span>
                </div>
                <div class="form-address">
                    <input type="text" name="diachi2" placeholder="Địa chỉ">
                    <span class="diachi-error2"></span>
                </div>
            </div>
            <input class="thongbao4-submit" name="updateAddress2" type="submit" value="Sửa địa chỉ">
        </div>
    </div>
</form>

<div class="QL_content-right-header">
    <h2>Sổ địa chỉ</h2>
    <a class="add-address" class="address">
        <i class="fa-solid fa-plus"></i>
        <span>Thêm địa chỉ</span>
    </a>
</div>

<div class="QL_content-right-infomation space-between">
    <?php
    $sql_real = "SELECT * FROM tbl_dangky WHERE id_dangky=$id_dangky";
    $sql_real_query = mysqli_query($mysqli, $sql_real);
    while ($row_real = mysqli_fetch_array($sql_real_query)) {
    ?>
        <div class="QL_content-right-infomation-address">
            <div class="QL_content-right-infomation-address-top">
                <p><?php echo $row_real['fullname'] ?></p>
                <a class="updateReal-address">Sửa</a>
            </div>
            <div class="QL_content-right-infomation-address-bot">
                <p>Điện thoại: <?php echo $row_real['phone'] ?></p>
                <?php
                $sql_diachi = "SELECT * FROM tbl_dangky,province,district,wards WHERE id_dangky=$id_dangky 
                AND tbl_dangky.province_id=province.province_id AND tbl_dangky.district_id=district.district_id
                AND tbl_dangky.wards_id=wards.wards_id";
                $sql_diachi_query = mysqli_query($mysqli, $sql_diachi);
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
    $sql_noreal = "SELECT * FROM tbl_sodiachi WHERE id_dangky=$id_dangky ";
    $sql_noreal_query = mysqli_query($mysqli, $sql_noreal);
    while ($row_noreal = mysqli_fetch_assoc($sql_noreal_query)) {
    ?>
        <div class="QL_content-right-infomation-address">
            <div class="QL_content-right-infomation-address-top">
                <p><?php echo $row_noreal['fullname'] ?></p>
                <a class="update-address">Sửa</a>
            </div>
            <div class="QL_content-right-infomation-address-bot">
                <p>Điện thoại: <?php echo $row_noreal['phone'] ?></p>
                <?php
                $code = $row_noreal['id_diachi'];
                $sql_diachi2 = "SELECT * FROM tbl_sodiachi,province,district,wards WHERE id_dangky=$id_dangky 
            AND tbl_sodiachi.province_id=province.province_id AND tbl_sodiachi.district_id=district.district_id
            AND tbl_sodiachi.wards_id=wards.wards_id AND id_diachi=$code";
                $sql_diachi2_query = mysqli_query($mysqli, $sql_diachi2);
                while ($row_diachi2 = mysqli_fetch_array($sql_diachi2_query)) {
                ?>
                    <p>Địa chỉ: <?php echo $row_noreal['addres'] ?>, <?php echo $row_diachi2['name_wards'] ?>, <?php echo $row_diachi2['name_district'] ?>, <?php echo $row_diachi2['name'] ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<script>
    var add = $('.add-address');
    var updateReal = $('.updateReal-address')
    var update = $('.update-address')

    thongbao2 = $('.thongbao2');
    thongbao3 = $('.thongbao3');
    thongbao4 = $('.thongbao4');
    thongBaoDiv = $('.thongbao2-div');
    thongBao3Div = $('.thongbao3-div');
    thongBao4Div = $('.thongbao4-div');
    closeThongbao = $('.thongbao-div-close i');

    closeThongbao.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    closeThongbao.click(function() {
        thongbao3.css('display', 'none')
        thongBao3Div.css('display', 'none')
    })

    closeThongbao.click(function() {
        thongbao4.css('display', 'none')
        thongBao4Div.css('display', 'none')
    })

    add.click(function() {
        thongbao2.css('display', 'flex');
        thongBaoDiv.css('display', 'block');
    })

    update.click(function() {
        thongbao4.css('display', 'flex');
        thongBao4Div.css('display', 'block');
        var id_khachhang = `<?php echo $_SESSION['user'] ?>`;
        var check2 = 'update2';
        if (id_khachhang) {
            $.ajax({
                url: 'pages/content/ajax_get_address.php',
                method: 'get',
                dataType: 'json',
                data: {
                    id_khachhang: id_khachhang,
                    update2: check2,
                },
                success: function(data) {
                    $.each(data, function(i, value) {
                        $(nameValidater2).val(value.fullname)
                        $(sdtValidater2).val(value.phone)
                        $(diachiValidater2).val(value.addres)
                        $(provinceValidater2).val(value.province)
                        district_id = value.district
                        province_id = value.province
                        $.ajax({
                            url: 'pages/content/ajax_get_distris.php',
                            method: 'get',
                            dataType: 'json',
                            data: {
                                province_id: province_id
                            },
                            success: function(data) {
                                $.each(data, function(i, district) {
                                    $(districtValidater2).append($('<option>', {
                                        value: district.id,
                                        text: district.name
                                    }))
                                })
                                $(`#district2 option[value='${value.district}']`).prop("selected", true);
                            },
                        })

                        $.ajax({
                            url: 'pages/content/ajax_get_award.php',
                            method: 'get',
                            dataType: 'json',
                            data: {
                                district_id: district_id
                            },
                            success: function(data) {
                                $.each(data, function(i, award) {
                                    $(awardValidater2).append($('<option>', {
                                        value: award.id,
                                        text: award.name
                                    }))
                                })
                                $(`#award2 option[value='${value.wards}']`).prop("selected", true);
                            },
                        })

                    })

                    $('#province2').on('change', function() {
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
                                    $('#district2').empty();

                                    $.each(data, function(i, district) {
                                        $('#district2').append($('<option>', {
                                            value: district.id,
                                            text: district.name
                                        }))
                                    })
                                },
                            })
                            $('#award2').empty();
                        }
                    })

                    $('#district2').on('change', function() {
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
                                    $('#award2').empty();

                                    $.each(data, function(i, award) {
                                        $('#award2').append($('<option>', {
                                            value: award.id,
                                            text: award.name
                                        }))
                                    })
                                }
                            })
                        }
                    })

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: ' + errorThrown);
                }
            })
        }
    })

    updateReal.click(function() {
        thongbao3.css('display', 'flex');
        thongBao3Div.css('display', 'block');
        var id_khachhang = `<?php echo $_SESSION['user'] ?>`;
        var check1 = 'update1';
        if (id_khachhang) {
            $.ajax({
                url: 'pages/content/ajax_get_address.php',
                method: 'get',
                dataType: 'json',
                data: {
                    id_khachhang: id_khachhang,
                    update1: check1,
                },
                success: function(data) {
                    $.each(data, function(i, value) {
                        $(nameValidater).val(value.fullname)
                        $(sdtValidater).val(value.phone)
                        $(diachiValidater).val(value.addres)
                        $(provinceValidater).val(value.province)
                        district_id = value.district
                        province_id = value.province
                        $.ajax({
                            url: 'pages/content/ajax_get_distris.php',
                            method: 'get',
                            dataType: 'json',
                            data: {
                                province_id: province_id
                            },
                            success: function(data) {
                                $.each(data, function(i, district) {
                                    $(districtValidater).append($('<option>', {
                                        value: district.id,
                                        text: district.name
                                    }))
                                })
                                $(`#district1 option[value='${value.district}']`).prop("selected", true);
                            },
                        })

                        $.ajax({
                            url: 'pages/content/ajax_get_award.php',
                            method: 'get',
                            dataType: 'json',
                            data: {
                                district_id: district_id
                            },
                            success: function(data) {
                                $.each(data, function(i, award) {
                                    $(awardValidater).append($('<option>', {
                                        value: award.id,
                                        text: award.name
                                    }))
                                })
                                $(`#award1 option[value='${value.wards}']`).prop("selected", true);
                            },
                        })

                    })

                    $('#province1').on('change', function() {
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
                                    $('#district1').empty();

                                    $.each(data, function(i, district) {
                                        $('#district1').append($('<option>', {
                                            value: district.id,
                                            text: district.name
                                        }))
                                    })
                                },
                            })
                            $('#award1').empty();
                        }
                    })

                    $('#district1').on('change', function() {
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
                                    $('#award1').empty();

                                    $.each(data, function(i, award) {
                                        $('#award1').append($('<option>', {
                                            value: award.id,
                                            text: award.name
                                        }))
                                    })
                                }
                            })
                        }
                    })

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: ' + errorThrown);
                }
            })
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


    $('.thongbao3-submit').click(function(e) {
        var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var name = $('input[name="ten"]');
        var sdt = $('input[name="sodienthoai"]');
        var diachi = $('input[name="diachi"]');
        var province = $('select[name="province"]');
        var district = $('select[name="district"]');
        var award = $('select[name="award"]');
        var checkSubmit = 0;

        if (!$.isNumeric(sdt.val()) || (sdt.val()).length != 10) {
            $(sdt).addClass('active-address')
            $('.sodienthoai-error').text("Sai cú pháp");
            checkSubmit++;
        }
        if ($.isNumeric(name.val())) {
            $(name).addClass('active-address')
            $('.ten-error').text("Không được là số");
            checkSubmit++;
        }
        if ((name.val()).match(specialChars) || name.val() == "") {
            $(name).addClass('active-address')
            $('.ten-error').text("Sai cú pháp");
            checkSubmit++;
        }
        if ((name.val()).match(specialChars) || diachi.val() == "") {
            $(diachi).addClass('active-address')
            $('.diachi-error').text("Sai cú pháp");
            checkSubmit++;
        }
        if (province.val() == 0) {
            $(province).addClass('active-address')
            $('.province-error').text("Sai cú pháp");
            checkSubmit++;
        }
        if (district.val() == 0) {
            $(district).addClass('active-address')
            $('.district-error').text("Sai cú pháp");
            checkSubmit++;
        }
        if (award.val() == 0) {
            $(award).addClass('active-address')
            $('.award-error').text("Sai cú pháp");
            checkSubmit++;
        }

        if (checkSubmit != 0) {
            return false;
        }

    })

    var nameValidater = $('input[name="ten"]');
    var sdtValidater = $('input[name="sodienthoai"]');
    var diachiValidater = $('input[name="diachi"]');
    var provinceValidater = $('select[name="province"]');
    var districtValidater = $('select[name="district"]');
    var awardValidater = $('select[name="award"]');




    $(nameValidater).on('input',function() {
        $(this).val($(this).val().toUpperCase())
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.ten-error').text("");
        }
    })
    $(sdtValidater).on('input',function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.sodienthoai-error').text("");
        }
    })
    $(diachiValidater).on('input',function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.diachi-error').text("");
        }
    })
    $(provinceValidater).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.province-error').text("");
        }
    })
    $(districtValidater).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.district-error').text("");
        }
    })
    $(awardValidater).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.award-error').text("");
        }
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

    var nameValidater0 = $('input[name="ten0"]');
    var sdtValidater0 = $('input[name="sodienthoai0"]');
    var diachiValidater0 = $('input[name="diachi0"]');
    var provinceValidater0 = $('select[name="province0"]');
    var districtValidater0 = $('select[name="district0"]');
    var awardValidater0 = $('select[name="award0"]');




    $(nameValidater0).on('input',function() {
        $(this).val($(this).val().toUpperCase())
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.ten-error0').text("");
        }
    })
    $(sdtValidater0).on('input',function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.sodienthoai-error0').text("");
        }
    })
    $(diachiValidater0).on('input',function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.diachi-error0').text("");
        }
    })
    $(provinceValidater0).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.province-error0').text("");
        }
    })
    $(districtValidater0).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.district-error0').text("");
        }
    })
    $(awardValidater0).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.award-error0').text("");
        }
    })

    $('.thongbao4-submit').click(function(e) {
        var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var name = $('input[name="ten2"]');
        var sdt = $('input[name="sodienthoai2"]');
        var diachi = $('input[name="diachi2"]');
        var province = $('select[name="province2"]');
        var district = $('select[name="district2"]');
        var award = $('select[name="award2"]');
        var checkSubmit = 0;

        if (!$.isNumeric(sdt.val()) || (sdt.val()).length != 10) {
            $(sdt).addClass('active-address')
            $('.sodienthoai-error2').text("Sai cú pháp");
            checkSubmit++;
        }
        if ($.isNumeric(name.val())) {
            $(name).addClass('active-address')
            $('.ten-error2').text("Không được là số");
            checkSubmit++;
        }
        if ((name.val()).match(specialChars) || name.val() == "") {
            $(name).addClass('active-address')
            $('.ten-error2').text("Sai cú pháp");
            checkSubmit++;
        }
        if ((name.val()).match(specialChars) || diachi.val() == "") {
            $(diachi).addClass('active-address')
            $('.diachi-error2').text("Sai cú pháp");
            checkSubmit++;
        }
        if (province.val() == 0) {
            $(province).addClass('active-address')
            $('.province-error2').text("Sai cú pháp");
            checkSubmit++;
        }
        if (district.val() == 0) {
            $(district).addClass('active-address')
            $('.district-error2').text("Sai cú pháp");
            checkSubmit++;
        }
        if (award.val() == 0) {
            $(award).addClass('active-address')
            $('.award-error2').text("Sai cú pháp");
            checkSubmit++;
        }

        if (checkSubmit != 0) {
            return false;
        }

    })

    var nameValidater2 = $('input[name="ten2"]');
    var sdtValidater2 = $('input[name="sodienthoai2"]');
    var diachiValidater2 = $('input[name="diachi2"]');
    var provinceValidater2 = $('select[name="province2"]');
    var districtValidater2 = $('select[name="district2"]');
    var awardValidater2 = $('select[name="award2"]');




    $(nameValidater2).on('input',function() {
        $(this).val($(this).val().toUpperCase())
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.ten-error2').text("");
        }
    })
    $(sdtValidater2).on('input',function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.sodienthoai-error2').text("");
        }
    })
    $(diachiValidater2).on('input',function() {
        if ($(this).val() != "") {
            $(this).removeClass('active-address')
            $('.diachi-error2').text("");
        }
    })
    $(provinceValidater2).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.province-error2').text("");
        }
    })
    $(districtValidater2).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.district-error2').text("");
        }
    })
    $(awardValidater2).on('input',function() {
        if ($(this).val() != 0) {
            $(this).removeClass('active-address')
            $('.award-error2').text("");
        }
    })
</script>