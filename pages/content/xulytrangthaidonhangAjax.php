<?php
include("../../admin/config/config.php");
session_start();
$select_don = "SELECT * FROM tbl_cart WHERE tbl_cart.id_khachhang='$_SESSION[user]'";
$don_query = mysqli_query($mysqli, $select_don);

if(isset($_GET['code'])){
    $code = $_GET['code'];
    $sql = mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status = 0 WHERE code_cart='".$code."'");
    header('Location:xulytrangthaidonhangAjax.php');
}

?>



<div class="QL_content-right-header">
    <h2>QUẢN LÝ ĐƠN HÀNG</h2>
</div>
<div class="QL_content-right-don">
    <table class="show-table">
        <tr>
            <th>MÃ ĐƠN HÀNG</th>
            <th>NGÀY</th>
            <th>TRẠNG THÁI</th>
            <th>CHI TIẾT</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($don_query)) {
        ?>
            <tr class="xuly">
                <td class="code"><?php echo $row['code_cart'] ?></td>
                <td><?php echo $row['cart_date_time'] ?></td>
                <td>
                    <a class="trangthai">
                        <i class="fa-solid fa-repeat"></i>
                        <button value="<?php echo $row['cart_status'] ?>" class="click"><?php echo $row['cart_status'] ?></button>
                    </a>
                </td>
                <td><i class="click-here fa-solid fa-eye"></i></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>

<script>
    var thongbao = $('.add-product a');
    thongbao2 = $('.thongbao');
    thongBaoDiv = $('.thongbao-div');
    closeThongbao = $('.thongbao-div-close i');
    

    $('.trangthai button').click(function(e) {
        if($(e.target).val() == 1 ){
            thongbao2.css('display', 'flex');
            thongBaoDiv.css('display', 'block');
            $('.thongbao').attr('id', code())
        }
        function code(){
            parentCode = e.target.parentElement.parentElement.parentElement
            for (let code of parentCode.children){
                if($(code).hasClass('code')){
                    return $(code).text()
                }
            }
        }
        
    })

    $('.huy').click(function(e){
        function code() {
            return e.target.parentElement.parentElement.parentElement.id
        }

        function handleCancel(code){
            $('.load-ajax').load(`pages/content/xulytrangthaidonhangAjax.php?code=${code}`);
        }      
        handleCancel(code())
    })

    closeThongbao.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    thongbao2.click(function() {
        thongbao2.css('display', 'none')
        thongBaoDiv.css('display', 'none')
    })

    for (const lap of $('.click')) {
        if (lap.value == 1) {
            lap.innerHTML = "Chưa xử lý";
            $(lap).css('color', '#aeae00')
        }else if(lap.value == 0){
            lap.innerHTML = "Đã hủy đơn";
            $(lap).css('color', 'red')
        }else if(lap.value == 3){
            lap.innerHTML = "Đã giao";
            $(lap).css('color', 'blue')
        }else if(lap.value == 4){
            lap.innerHTML = "Đang giao";
            $(lap).css('color', '#9b82ee')
        }
        else {
            lap.innerHTML = "Đã thanh toán";
            $(lap).css('color', 'green')
        }
    }

    

    $('.click-here').click(function(e) {
        e.preventDefault();
        const child = e.currentTarget.parentElement.parentElement.children;
        for (const child1 of child) {
            if (child1.classList.contains('code')) {
                $('.QL_content-right').load(`pages/content/xulyxemchitietdonhang.php?code=${child1.innerHTML}`);
            }
        }
    })
</script>