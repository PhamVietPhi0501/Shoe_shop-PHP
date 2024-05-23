<section class="section1">
    <div class="grid wide">
        <div class="section1-block">
            <div class="section1-block1">
                <i class="fa-solid fa-ranking-star"></i>
                <p>Hàng chính hảng 100%</p>
            </div>
            <div class="section1-block2">
                <i class="fa-solid fa-truck-fast"></i>
                <p>Miễn phí giao hàng với đơn >500k</p>
            </div>
            <div class="section1-block3">
                <i class="fa-solid fa-right-left"></i>
                <p>Đổi hàng 30 ngày, Bảo hành lên đến 6 tháng</p>
            </div>
        </div>
    </div>
</section>

<div id="container" class="container">
    <div class="grid wide">
        <div class="container-text">
            <h1 id="footer">NEW ARRIVAL</h1>
        </div>

        <div class="container-name-product">
            <ul class="container-name-list">
                <?php
                $sql_lietke = "SELECT * FROM tbl_danhmucsanpham ORDER BY id_danhmuc";
                $sql_query = mysqli_query($mysqli,$sql_lietke);
                $i = 0;
                while ($row = mysqli_fetch_array($sql_query)) {
                    $i++;
                ?>
                <li class="container-name-item">
                    <a href="" class="container-name-item-link" id="<?php echo $row['id_danhmuc'] ?>" ><?php echo $row['tendanhmucsanpham'] ?></a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div id="container-product" class="container-product">                   
    
        </div>
    </div>
</div>

<div class="container-seller">
    <div class="grid wide">
        <div class="container-text">
            <h1 id="footer">BEST SELLER</h1>
        </div>

        <div class="container-name-product">
            <ul class="container-name-list">
                <?php
                $sql_lietke = "SELECT * FROM tbl_danhmucsanpham ORDER BY id_danhmuc";
                $sql_query = mysqli_query($mysqli,$sql_lietke);
                while ($row = mysqli_fetch_array($sql_query)) {
                ?>
                <li class="containerSell">
                    <a href="" class="container-name-item-link-seller" id="<?php echo $row['id_danhmuc'] ?>" ><?php echo $row['tendanhmucsanpham'] ?></a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div id="container-product-seller" class="container-product">                   
    
        </div>
    </div>
</div>


<script>
    // Load trang bằng ajax
    var aTags = $('.container-name-item-link');
    var idanhmuc = aTags[0].id
    aTags.click(function(e){
        e.preventDefault();
        idanhmuc = e.currentTarget.id;
        $("#container-product").load(`pages/content/trangchu.php?id=${idanhmuc}`);
        console.log(idanhmuc)
    })
    $("#container-product").load(`pages/content/trangchu.php?id=${idanhmuc}`);

    var aTags = $('.container-name-item-link-seller');
    aTags.click(function(e){
        e.preventDefault();
        var idanhmuc = e.currentTarget.id;
        $("#container-product-seller").load(`pages/content/conProductSell.php?id=${idanhmuc}`);
    })
    $("#container-product-seller").load(`pages/content/conProductSell.php?id=${idanhmuc}`);
    

    //add class container-active
    var containerAcctive = document.querySelectorAll('.container-name-item')
    var container = document.querySelector('.container-name-item')
    container.classList.add('container-active');

    containerSellAcctive = document.querySelectorAll('.containerSell');
    containerSell = document.querySelector('.containerSell');
    containerSell.classList.add('container-active');

    


    
    //click vào cái nào add class vào cái đó và xóa cái còn lại
    containerAcctive.forEach(function(tab,index){
        tab.onclick = function(){
            document.querySelector('.container-name-item.container-active').classList.remove('container-active')          
            this.classList.add('container-active')
        }
    })

    containerSellAcctive.forEach(function(tab,index){
        tab.onclick = function(){
            document.querySelector('.containerSell.container-active').classList.remove('container-active')          
            this.classList.add('container-active')
        }
    })

</script>