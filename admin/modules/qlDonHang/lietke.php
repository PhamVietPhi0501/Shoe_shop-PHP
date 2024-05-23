<?php

if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql_lietke = "SELECT * FROM tbl_cart,tbl_dangky,province,district,wards WHERE tbl_dangky.id_dangky=tbl_cart.id_khachhang 
    AND tbl_dangky.province_id=province.province_id 
    AND tbl_dangky.district_id=district.district_id
    AND tbl_dangky.wards_id=wards.wards_id
    AND code_cart like '%$search%' ";
}
else{
    $sql_lietke = "SELECT * FROM tbl_cart,tbl_dangky,province,district,wards WHERE tbl_dangky.id_dangky=tbl_cart.id_khachhang 
    AND tbl_dangky.province_id=province.province_id 
    AND tbl_dangky.district_id=district.district_id
    AND tbl_dangky.wards_id=wards.wards_id ORDER BY id_cart DESC ";
}
$query_lietke = mysqli_query($mysqli, $sql_lietke);
?>

<div class="options-QL-AD">
    <div class="options-QL-AD-form">
        <div class="options-QL-AD-form-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="options-QL-AD-form-all">
            <span id="4" class="options">Đang giao</span>
            <span id="3" class="options">Đã giao</span>
            <span id="0" class="options">Hủy đơn</span>
        </div>
    </div>
</div>

<div class="form">
    <div class="header-add">
        <i class="fa-solid fa-car-side"></i>
        <span>ADMIN</span>
    </div>

    <form action="" method="post">
        <div class="search-SP">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="search">
        </div>
    </form>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <!-- <th>Email</th> -->
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke)) {
                $i++;
            ?>
                <tr>
                    <td class="ID"><?php echo $i ?></td>
                    <td class="padding-4px"><?php echo $row['code_cart'] ?></td>
                    <td class="padding-4px"><?php 
                    if(empty($row['id_diachi'])){
                        echo $row['fullname'];
                    }else{
                        $nameK = "SELECT * FROM tbl_sodiachi WHERE id_diachi='$row[id_diachi]' ";
                        $queryK = $mysqli->query($nameK);
                        while($rowK = $queryK->fetch_assoc()){
                            echo $rowK['fullname'];
                        }
                    }
                    ?></td>
                    <td class="padding-4px"><?php 
                    if(empty($row['id_diachi'])){
                        echo $row['phone'];
                    }else{
                        $nameK = "SELECT * FROM tbl_sodiachi WHERE id_diachi='$row[id_diachi]' ";
                        $queryK = $mysqli->query($nameK);
                        while($rowK = $queryK->fetch_assoc()){
                            echo $rowK['phone'];
                        }
                    }
                    ?></td>

                    <td class="padding-4px"><?php
                                            if (empty($row['id_diachi'])) {
                                                // echo 'trống';
                                                echo$row['addres'] . ',' . $row['name_wards'] . ',' . $row['name_district'] . ',' . $row['name'];
                                            } else {
                                                $idDiaChi = $row['id_diachi'];
                                                $sql_sodiachi = "SELECT * FROM tbl_sodiachi,province,district,wards WHERE id_diachi=$idDiaChi
                                            AND tbl_sodiachi.province_id=province.province_id 
                                            AND tbl_sodiachi.district_id=district.district_id
                                            AND tbl_sodiachi.wards_id=wards.wards_id  ";
                                                $query_sodiachi = mysqli_query($mysqli, $sql_sodiachi);
                                                while ($rowso = $query_sodiachi->fetch_assoc()) {
                                                    echo $rowso['addres'] . ',' . $rowso['name_wards'] . ',' . $rowso['name_district'] . ',' . $rowso['name'];
                                                }
                                            }
                                            ?></td>
                    <!-- <td class="padding-4px"><?php echo $row['email'] ?></td> -->
                    <td class="padding-4px"><?php echo $row['cart_date_time'] ?></td>
                    <td class="padding-4px"><a id="<?php echo $row['code_cart'] ?>" class="check-status check-status<?php echo $row['cart_status'] ?>"><?php echo $row['cart_status'] ?></a></td>
                    <td class="show-table-QL">
                        <a href="indexAdmin.php?action=chitiet&id_side=3&code=<?php echo $row['code_cart'] ?>">Xem chỉ tiết</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

</div>

<script>
     
    var dataEach = $('.check-status'); 

    $.each(dataEach,function(i,val){
        if($(val).text() == 0){
            $(val).text('Đã hủy')
            $(val).css('color','red')
        }else if($(val).text() == 1) {
            $(val).text('Chưa xữ lý')
            $(val).css('color','#aeae00')
        }else if($(val).text() == 2) {
            $(val).text('Đã thanh toán')
            $(val).css('color','green')
        }else if($(val).text() == 3){
            $(val).text('Đã giao')
            $(val).css('color','blue')
        }else if($(val).text() == 4){
            $(val).text('Đang giao')
            $(val).css('color','#9b82ee')
        }
    })


    $('.check-status1').click(function(e) {
        childMD = e.target.parentElement.parentElement.children[1]
        $('.options-QL-AD-form').attr('id', $(childMD).text());
        $('.options-QL-AD').css('display', 'flex');
    })

    $('.check-status4').click(function(e) {
        childMD = e.target.parentElement.parentElement.children[1]
        $('.options-QL-AD-form').attr('id', $(childMD).text());
        $('.options-QL-AD').css('display', 'flex');
    })

    $('.options-QL-AD-form-close i').click(function() {
        $('.options-QL-AD').css('display', 'none');
    })


    $('.options').click(function(e) {

        function getMD(){
           md = e.target.parentElement.parentElement.id
           return md
        }

        function getID(){
            id = e.target.id
            return id
        }
        function hendleStatus(md,id) {
            md = md();
            id = id();

            if(md){
                $.ajax({
                    url: 'modules/qlDonHang/xuly.php',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        md: md,
                        id: id
                    },
                    success: function(data){
                        $.each(data, function(i, val){
                            if(val.id == 0){
                                text = "Đã hủy"
                                color = 'red'
                            }else if(val.id == 3){
                                text = "Đã giao"
                                color = 'blue'
                            }else{
                                text = "Đang giao"
                                color = '#9b82ee'
                            }
                            $('a#' + val.code).text(text)
                            $('a#' + val.code).css('color',color)
                            $('.options-QL-AD').css('display', 'none');
                        })
                    },
                })
            }

        }

        hendleStatus(getMD,getID)
    })

</script>