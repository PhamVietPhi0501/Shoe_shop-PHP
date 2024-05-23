<?php
session_start();
include('../../admin/config/config.php');

$idUser = $_SESSION['user'];
?>

    <div class="thongbao2 open">
        <div class="thongbao2-div">
            <div class="thongbao-div-close">
                <i class="fa-regular fa-circle-xmark"></i>
            </div>
            <div class="thongbao-div-name">
                <h4>ĐỔI MẬT KHẨU</h4>
            </div>
            <div class="thongbao-div-address-top-pass">
                <div class="form-address">
                    <input type="password" name="oldPass" placeholder="Mật khẩu hiện tại">
                    <span class="oldPass-error"></span>
                </div>
                <div class="form-address">
                    <input type="password" name="newPass" placeholder="Mật khẩu mới">
                    <span class="newPass-error"></span>
                </div>
                <div class="form-address">
                    <input type="password" name="newPass2" placeholder="Nhập lại mật khẩu mới">
                    <span class="newPass2-error"></span>
                </div>
                <div class="updatePassNotiDiv">
                    <span class="updatePassNoti" ></span>
                </div>
            </div>
            <input class="thongbao2-submit" name="updateNewPass" type="submit" value="Đổi mật khẩu">
        </div>
    </div>


<form action="pages/content/uploadImg.php?id=<?php echo $idUser ?>" method="post" enctype="multipart/form-data">
    <div class="QL_content-right-header">
        <h2>TÀI KHOẢN CỦA TÔI</h2>
    </div>

    <div class="QL_content-right-infomation">
        <div class="QL_content-right-infomation-left">
            <p>"Vì chính sách an toàn thẻ, bạn không thể thay đổi gmail, Họ tên. Vui lòng liên hệ CSKH 0914608260 để được hỗ trợ"</p>
            <?php
            $sql_dangky = "SELECT * FROM tbl_dangky WHERE id_dangky='$idUser' ";
            $query_dangky = mysqli_query($mysqli, $sql_dangky);
            while ($row = mysqli_fetch_array($query_dangky)) {
                $gender = $row['gender'];
            ?>

                <div class="form">
                    <span>Họ và tên</span>
                    <input type="text" name="" value="<?php echo $row['fullname'] ?>" readonly>
                </div>

                <div class="form">
                    <span>Số điện thoại</span>
                    <input class="sdt click" type="text" name="sdt" value="<?php echo $row['phone'] ?>">
                </div>
                <div class="form">
                    <span>Email</span>
                    <input type="text" name="" value="<?php echo $row['email'] ?>" readonly>
                </div>
                <div class="form">
                    <span>Giới tính</span>
                    <label id="female" class="gioitinh checked">
                        <input type="checkbox" name="gender" value="female" id="1">
                        <div>Nữ</div>
                    </label>
                    <label id="male" class="gioitinh">
                        <input type="checkbox" name="gender" value="male" id="2">
                        <div>Nam</div>
                    </label>
                    <label id="orther" class="gioitinh">
                        <input type="checkbox" name="gender" value="orther" id="3">
                        <div>Khác</div>
                    </label>
                </div>
                
                <div class="right-infomation-left-error">
                    <span></span>
                </div>

                <div class="right-infomation-left-update">
                    <input type="submit" onclick="return handleSubmit()" name="update" value="CẬP NHẬT">
                    <input type="submit" name="updatePass" value="ĐỔI MẬT KHẨU">
                </div>
                
        </div>
        <div class="QL_content-right-infomation-right">
            <input id="fileInput" type="file">
            <img class="avatar" src="image/Adidas/Avatar/<?php echo (empty($row['hinh']) ? ("OIP.jpg") : ($row['hinh'])) ?>" alt="">
        </div>
    <?php
            }
    ?>
    </div>
</form>
<script>
    var checkGender = `<?php echo $gender ?>`;
    var genderId = $('.gioitinh');


    genderId.each(function(index, element) {
        if (element.id == checkGender) {
            $(element).addClass('gender');
        }
        genderId.click(function(e) {
            checkElement = e.target.parentElement;
            $(element).removeClass('gender');
            $(this).addClass('gender');
        })
    })


    var imgClick = $('.avatar');

    imgClick.click(function() {
        $('#fileInput').click();
    })



    $('#fileInput').on('change', function(e) {
        var formData = new FormData();
        var file = $('#fileInput')[0].files[0]; // Lấy file từ input
        var idValue = `<?php echo $idUser ?>`;
        formData.append('file', file);
        formData.append('id', idValue);

        $.ajax({
            url: 'pages/content/ajax_get_newImg.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var data = JSON.parse(response);
                url = data[0].hinh;
                $('.avatar').attr('src', `image/Adidas/Avatar/${url}`)
                $('.avatar1').attr('src', `image/Adidas/Avatar/${url}`)
            },

        });
    });

    function handleImg() {
    }

    handleImg();
    var errorImg = $('.avatar');

    errorImg.on('error', function() {
        $(this).attr('src', 'image/Adidas/Avatar/OIP.jpg');
    })
    function handleSubmit() {
        var sdt = $('.sdt');
        var checkError = $('.right-infomation-left-error span')
        i= 0;

            

            if (/[^\w\s]/.test(sdt.val())) {
                sdt.addClass('error');
                i++;
                checkError.text('Không được sử dụng kí tự đặt biệt')
            } else if(/[A-Z]/.test(sdt.val()) || /[a-z]/.test(sdt.val())){
                sdt.addClass('error');
                i++;
                checkError.text('Không phải số điện thoại')
            } else if(sdt.val() == ""){
                sdt.addClass('error');
                i++;
                checkError.text('Không được để trống')
            } else if(sdt.val().length != 10){
                sdt.addClass('error');
                i++;
                checkError.text('Không đủ 10 số')
            } else if(sdt.val()[0] != 0 ){
                sdt.addClass('error');
                i++;
                checkError.text('Không phải số điện thoại')
            } else {
                sdt.removeClass('error');
            }
            
        if(i != 0){
            return false;
        }
    }

    thongbao2 = $('.thongbao2');
    thongBaoDiv = $('.thongbao2-div');
    closeThongbao = $('.thongbao-div-close i');

    closeThongbao.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    $('input[name="updatePass"]').click(function(e) {
        e.preventDefault();
        thongbao2.css('display', 'flex');
        thongBaoDiv.css('display', 'block');
    })

    $('input[name="oldPass"]').on('input', function(){
        checkMK = $('input[name="oldPass"]').val() // value
        id = `<?php echo $idUser ?> `; //11
        $.ajax({
                url: 'pages/content/ajax_get_mk.php',
                method: 'post',
                dataType: 'json',
                data: {
                    checkMK: checkMK,
                    id: id,
                },
                success: function(data){
                    $.each(data, function(i, val){
                        if(val.check == false){
                            $('input[name="oldPass"]').attr('id','loi')
                        }else{
                            $('input[name="oldPass"]').removeAttr('id')
                        }
                    })
                }
            })
        })

    

    $('input[name="updateNewPass"]').click(function(e) {
        var i = 0;
        checkMK = $('input[name="oldPass"]').val() // value
        id = `<?php echo $idUser ?> `; //11
        $.ajax({
                url: 'pages/content/ajax_get_mk.php',
                method: 'post',
                dataType: 'json',
                data: {
                    checkMK: checkMK,
                    id: id,
                },
                success: function(data){
                    $.each(data, function(i, val){
                        if(val.check == false){
                            $('.oldPass-error').text('Mật khẩu không trùng khớp')
                            $('input[name="oldPass"]').addClass('active-address')
                            $('input[name="oldPass"]').attr('id','loi')
                        }else{
                            $('input[name="oldPass"]').removeAttr('id')
                        }
                    })
                }
            })
            
        if ($('input[name="oldPass"]').val() == "") {
            $('.oldPass-error').text('Không được để trống')
            $('input[name="oldPass"]').addClass('active-address')
            i++
        }
        if ($('input[name="oldPass"]').attr('id') == 'loi'){
            i++
        }
        if (($('input[name="newPass"]').val().length < 5)) {
            $('.newPass-error').text('Mật khẩu phải lớn hơn 5 kí tự')
            $('input[name="newPass"]').addClass('active-address')
            i++
        }
        if (($('input[name="newPass2"]').val().length < 5)) {
            $('.newPass2-error').text('Mật khẩu phải lớn hơn 5 kí tự')
            $('input[name="newPass2"]').addClass('active-address')
            i++
        }
        if (($('input[name="newPass"]').val() == $('input[name="oldPass"]').val())) {
            $('.newPass-error').text('Trùng mật khẩu cũ')
            $('input[name="newPass"]').addClass('active-address')
            i++
        }
        if ($('input[name="newPass"]').val() != $('input[name="newPass2"]').val()) {
            $('.newPass2-error').text('Mật khẩu không trùng khớp')
            $('input[name="newPass2"]').addClass('active-address')
            i++
        }
        if ((/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/).test($('input[name="newPass"]').val())) {
            $('.newPass-error').text('Mật khẩu phải là [a-z] [A-Z]')
            $('input[name="newPass"]').addClass('active-address')
            i++
        }
        if ((/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/).test($('input[name="newPass2"]').val())) {
            $('.newPass2-error').text('Mật khẩu phải là [a-z] [A-Z]')
            $('input[name="newPass2"]').addClass('active-address')
            i++
        }
        if (i === 0) {
            checkMK = $('input[name="newPass"]').val() // value
            id = `<?php echo $idUser ?> `; //11
            $.ajax({
                url: 'pages/content/ajax_doimatkhau.php',
                method: 'post',
                dataType: 'json',
                data: {
                    checkMK: checkMK,
                    id: id
                },
                success: function(data){
                    $.each(data,function(i,val){
                        if(val.check == true){
                            $('.updatePassNoti').text('Đổi mật khẩu thành công')
                            setTimeout(function(){
                                thongbao2.css('display', 'none');
                                thongBaoDiv.css('display', 'none');
                            },1000)
                        }
                    })
                },
            })
        }
    })




    $('input[name="oldPass"]').on('input', function() {
        $('.oldPass-error').text('')
        $('input[name="oldPass"]').removeClass('active-address')
    })
    $('input[name="newPass"]').on('input', function() {
        $('.newPass-error').text('')
        $('input[name="newPass"]').removeClass('active-address')
    })
    $('input[name="newPass2"]').on('input', function() {
        $('.newPass2-error').text('')
        $('input[name="newPass2"]').removeClass('active-address')
    })
</script>