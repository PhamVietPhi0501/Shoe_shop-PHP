<div class="menu">
    <?php
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }else{
            $tam = '';
        }

        if($tam == 'quanlydanhmucsanpham') {
            include('modules/qlDanhMucSanPham/lietke.php');
        }elseif($tam == 'quanlysanpham'){
            include('modules/qlSanPham/lietke.php');
        }elseif($tam == 'quanlydonhang'){
            include('modules/qlDonHang/lietke.php');
        }elseif($tam == 'chitiet'){
            include('modules/qlDonHang/chitiet.php');
        }elseif($tam == 'quanlyphukien'){
            include('modules/qlPhukien/lietke.php');
        }elseif($tam == 'quanlythongke'){
            include('modules/qlThongKe/lietke.php');
        }elseif($tam == 'quanlytaikhoang'){
            include('modules/qlTaiKhoang/lietke.php');
        }elseif($tam == 'quanlydanhgia'){
            include('modules/qlDanhGia/lietke.php');
        }elseif($tam == 'totalSize'){
            include('modules/qlSanPham/totalSize.php');
        }else {
            include('modules/qlThongKe/lietke.php');
        }
    ?>

</div>