<?php
if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    unset($_SESSION['cart_shoe']);
    unset($_SESSION['add']);
}
?>

<div class="header">
    <div class="grid wide">
        <ul class="header-list">
            <li class="header-item">
                <span>Kết nối</span>
                <a href="https://www.facebook.com/profile.php?id=61557885932989" class="header-item-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/phamviet_phi/" class="header-item-icon"><i class="fa-brands fa-instagram"></i></a>
                <span class="header-information padding-left">Về chúng tôi
                <div class="header-information-list">
                    <a href="" class="header-information-link">Về MY SHOE</a>
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
                                <button name="search" class="header-search-btn" ><i class="fa-solid fa-magnifying-glass"></i></button> 
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
                    <button name="search" class="header-search-btn" ><i class="fa-solid fa-magnifying-glass"></i></button> 
                    <input type="text" autocomplete="off" name="keyPC"  placeholder="TÌM KIẾM SẢN PHẨM">
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

                

                <?php if(isset($_SESSION['user'])){ 
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
                }else{
                ?>
                <a href="indexLogin.php?pages/content/login.php" class="header-item-icon"><i class="fa-regular fa-user"></i></a>
                <?php
                }
                ?>


                <label for="modal-click">
                    <span  class="header-item-icon"><i class="fa-solid fa-bag-shopping padding-4px"></i></span>    
                </label>

                <span class="header-item-number">
                <?php
                if(isset($_SESSION['cart_shoe'])){
                    $length = count($_SESSION['cart_shoe']);
                    echo $length;
                }else{
                    echo "0";
                }
                ?>
                </span>
            </li>
            <input id="modal-click" name="test" type="radio">
            <input id="modal-click1" name="test" type="radio">
            <?php
            include('content/giohang.php');
            ?>
        </ul>      
    </div>
</div>

<script>
    $('.header-search i').click(function(e){
        if($('input[name="keyPC"]').val() == ""){
            e.preventDefault();
        } 
    })

    $('input[name="keyPC"]').keypress(function(e){
        if(event.keyCode === 13){
            // Kiểm tra giá trị của thẻ input
            var inputValue = $(this).val();
            if(inputValue.trim() === '') {
                // Nếu thẻ input rỗng, ngăn chặn sự kiện mặc định của phím Enter
                e.preventDefault();
            }
        }
    })
    

    
</script>