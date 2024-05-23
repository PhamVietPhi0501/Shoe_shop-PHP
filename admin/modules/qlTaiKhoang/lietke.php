<?php
$sql_lietke = "SELECT * FROM tbl_dangky,province,district,wards 
WHERE tbl_dangky.province_id=province.province_id 
AND tbl_dangky.district_id=district.district_id
AND tbl_dangky.wards_id=wards.wards_id ";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>

<div class="form">
    <div class="header-add">
        <i class="fa-regular fa-user"></i>
        <a>Khách hàng</a>
    </div>

    <div class="show">
        <table class="show-table" border="1">
            <tr>
                <th>ID khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Số nhà, Đường</th>
                <th>Phường/ xã</th>
                <th>Quận/Huyện</th>
                <th>Tỉnh/ Thành phố</th>
            </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                $i++;
            ?>
            <tr>
                <td class="ID"><?php echo $i ?></td>
                <td class="padding-4px"><?php echo $row['fullname']?></td>
                <td class="padding-4px"><?php echo $row['email']?></td>
                <td class="padding-4px"><?php echo $row['phone']?></td>  
                <td class="padding-4px"><?php echo $row['addres']?></td>  
                <td class="padding-4px"><?php echo $row['name_wards']?></td>  
                <td class="padding-4px"><?php echo $row['name_district']?></td>  
                <td class="padding-4px"><?php echo $row['name']?></td>  
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

</div>