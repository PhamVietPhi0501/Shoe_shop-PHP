<?php


// Tìm kiếm sản phẩm
if(isset($_POST['search'])){
    $key = $_POST['keyPC'];
    $sql_lietke = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$key."%'";
    $sql_query = mysqli_query($mysqli,$sql_lietke);
}




?>
<div class="seenAll-product">
    <div class="grid wide">
        <div class="seenAll-product-link">
            <span>Trang chủ</span>
            <p>-</p>
            <span>KEYWORDS</span>
        </div>

        <div class="seenAll-container-product">
            <div id="container-product" class="container-product">    
                
                
                <div class="seenAll-header">
            
                
                    <div class="arrange">
                        <div class="arrange-left">
                            <span>Kết quả tìm kiếm theo '<?php echo $key ?>'</span>
                        </div>

                        <div class="arrange-right">
                            <div class="arrange-default">
                                <span href="">Sắp xếp theo</span>
                                <i class="fa-solid fa-angle-down"></i>
                                <i class="fa-solid fa-angle-up"></i>
                                

                                <div class="arrange-style">
                                    <ul>
                
                                        <li>
                                            <a href="indexSearch.php?pages/content/search.php&default=<?php echo $key ?>" class="seen-new" >Mặc định</a>
                                        </li>
                
                                        <li>
                                            <a href="indexSearch.php?pages/content/search.php&new=<?php echo $key ?>" class="seen-new1" >Mới nhất</a>
                                        </li>
                
                                        <li>
                                            <a href="indexSearch.php?pages/content/search.php&up=<?php echo $key ?>" class="seen-up">Giá: cao đến thấp</a>
                                        </li>
                
                                        <li>
                                            <a href="indexSearch.php?pages/content/search.php&down=<?php echo $key ?>" class="seen-down">Giá: thấp đến cao</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                        
                <div class="row sm-gutter loadProduct">
                    <?php
                    while($row = mysqli_fetch_array($sql_query)){
                        $sellGiam = intval($row['gia']) * (intval($row['loaihang'])/100);
                        $sell = intval($row['gia']) - $sellGiam;
                    ?>
                    <div class="col l-2-4">
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
                                <div class="newPrice"><?php echo $sell . 'đ' ?></div>
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
        </div>
    </div>
</div>

<script>
    $('.seen-new').click(function(e){
            e.preventDefault();
            $('.arrange-default span').text('Mặc định')
            $('.loadProduct').load(`pages/content/ajax_get_search.php?default=<?php echo $key ?>`)
        })

        $('.seen-new1').click(function(e){
            e.preventDefault();
            $('.arrange-default span').text('Mới nhất')
            $('.loadProduct').load(`pages/content/ajax_get_search.php?new=<?php echo $key ?>`)
        })

        $('.seen-up').click(function(e){
            e.preventDefault();
            $('.arrange-default span').text('Giá: cao đến thấp')
            $('.loadProduct').load(`pages/content/ajax_get_search.php?up=<?php echo $key ?>`)
        })

        $('.seen-down').click(function(e){
            e.preventDefault();
            $('.arrange-default span').text('Giá: thấp đến cao')
            $('.loadProduct').load(`pages/content/ajax_get_search.php?down=<?php echo $key ?>`)
        })
</script>