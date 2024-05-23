<?php
if (isset($_GET['id_side'])) {
    $tam = $_GET['id_side'];
} else {
    $tam = '';
}

?>
<?php
if (isset($_GET['id_side'])) {
    $tam = $_GET['id_side'];
} else {
    $tam = '';
}

?>
<div class="sidebar">
    <ul class="sidebar-list">
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-gauge"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlythongke&id_side=1">
                    Quản lý thống kê
                </a>
            </div>
            <span class="sidebar-span 
                 <?php
                    if ($tam == 1 || $tam == '') {
                        echo 'active';
                    }
                    ?>">
            </span>
        </li>
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-bars"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlydanhmucsanpham&id_side=5">
                    <?php
                    if ($tam == "size") {
                        echo "Size giày";
                    } else {
                        echo "Quản lý danh mục sản phẩm";
                    }
                    ?>
                </a>
            </div>
            <span class="sidebar-span 
                <?php
                if ($tam == 5) {
                    echo 'active';
                }
                ?>">
            </span>
        </li>
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-briefcase"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlysanpham&id_side=2">
                    Quản lý sản phẩm
                </a>
            </div>
            <span class="sidebar-span 
                 <?php
                    if ($tam == 2  || $tam == 'size') {
                        echo 'active';
                    }
                    ?>">
            </span>
        </li>
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-chart-line"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlydonhang&id_side=3">
                    Quản lý đơn hàng
                </a>
            </div>
            <span class="sidebar-span 
                 <?php
                    if ($tam == 3) {
                        echo 'active';
                    }
                    ?>">
            </span>
        </li>
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-window-restore"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlyphukien&id_side=4">
                    Quản lý phụ kiện
                </a>
            </div>
            <span class="sidebar-span 
                 <?php
                    if ($tam == 4) {
                        echo 'active';
                    }
                    ?>">
            </span>
        </li>
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-user"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlytaikhoang&id_side=6">
                    Quản lý tài khoản
                </a>
            </div>
            <span class="sidebar-span 
                 <?php
                    if ($tam == 6) {
                        echo 'active';
                    }
                    ?>">
            </span>
        </li>
        <li class="sidebar-item">
            <div class="sidebar-item-wrap">
                <i class="fa-solid fa-star"></i>
                <a class="sidebar-link" href="indexAdmin.php?action=quanlydanhgia&id_side=7">
                    Quản lý đánh giá
                </a>
            </div>
            <span class="sidebar-span 
                 <?php
                    if ($tam == 7) {
                        echo 'active';
                    }
                    ?>">
            </span>
        </li>
    </ul>
</div>