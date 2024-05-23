<?php
$select_name = "SELECT * FROM tbl_dangky WHERE id_dangky='$_SESSION[user]' ";
$name_query = mysqli_query($mysqli,$select_name);

?>

<section class="thongbao open">
    <div class="thongbao-div">
        <div class="thongbao-div-close">
            <i class="fa-regular fa-circle-xmark"></i>
        </div>
        <div class="thongbao-div-cart">
            <h3>Bạn có chắc chắn muốn hủy đơn hàng</h3>
        </div>
        <div class="thongbao-div-text thongbao-div-text-huydon">
            <span class="huy">Hủy đơn hàng</span>
            <span>Quay Lại</span>
        </div>
    </div>
</section>

<div class="QL_donhang">
    <div class="grid wide">
        <div class="seenAll-product-link">
            <span>Trang chủ</span>
            <p>-</p>
            <span>Quản lý tài khoản</span>
        </div>

        <div class="QL_content">
            <div class="QL_content-left">
                <div class="QL_content-left-header">
                    <?php 
                    while($row_name = mysqli_fetch_array($name_query)){
                    ?>            
                    <img class="avatar1" src="image/Adidas/Avatar/<?php echo (empty($row_name['hinh']) ? ("OIP.jpg") : ($row_name['hinh'])) ?>" alt="">
                    <span><?php echo $row_name['fullname'] ?></span>
                    <?php
                    }
                    ?>
                </div>
                <div class="QL_content-left-content">
                    <ul>
                        <li>
                            <a class="taikhoan" href="">
                                <i class="fa-regular fa-user "></i>
                                <span >Thông tin cá nhân</span>
                            </a>
                        </li>
                        <li>
                            <a class="donhang" href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>Quản lý đơn hàng</span>
                            </a>
                        </li>
                        <li>
                            <a class="diachi" href="">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Thông tin địa chỉ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="QL_content-right">
                
            </div>
        </div>
    </div>
</div>

<script>
    $('.QL_content-left-header img').on('error', function(){
        $(this).attr('src','image/Adidas/Avatar/OIP.jpg');
    })

    let pageValue;
    function handlePageValue() {
        if(pageValue == 1){
            $('.QL_content-right').load('pages/content/thongtincanhan.php');
            $(acctive[0]).addClass('acctive')
        }else if(pageValue == 3){
            $('.QL_content-right').load('pages/content/soDiaChi.php');
            $(acctive[2]).addClass('acctive')
        }else if(pageValue == 2) {
            $('.QL_content-right').load('pages/content/xulytrangthaidonhang.php');
            $(acctive[1]).addClass('acctive')
        }
    }

    $(document).ready(function(){
        var currentURL = window.location.href;

        var urlParams = new URLSearchParams(currentURL.split('?')[1]);
        pageValue = urlParams.get('page');
        handlePageValue();
    })

    var acctive = $('.QL_content-left-content li a');

    acctive.click(function(e){
        acctive.removeClass('acctive')

        $(this).addClass('acctive')
    })


    var taikhoan = $('.taikhoan');
    var donhang = $('.donhang');
    var diachi = $('.diachi');

    

    taikhoan.click(function(e){
        e.preventDefault();
        $('.QL_content-right').load('pages/content/thongtincanhan.php');
    })

    diachi.click(function(e){
        e.preventDefault();
        $('.QL_content-right').load('pages/content/soDiaChi.php');
    })

    donhang.click(function(e){
        e.preventDefault();
        $('.QL_content-right').load('pages/content/xulytrangthaidonhang.php');
    })


</script>