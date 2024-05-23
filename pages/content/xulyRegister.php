<?php
include('../../admin/config/config.php');

if(isset($_POST)){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phonenumber'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $wards = $_POST['award'];


    // Check cả hải
    $sql_checkAll = "SELECT * FROM tbl_dangky WHERE phone = '".$phone."' AND email = '".$email."' ";
    $sql_AllQuery = mysqli_query($mysqli,$sql_checkAll);

    //Check email
    $sql_checkEmail = "SELECT * FROM tbl_dangky WHERE email = '".$email."' ";
    $sql_checkQuery = mysqli_query($mysqli,$sql_checkEmail);

    //Check phone
    $sql_checkPhone = "SELECT * FROM tbl_dangky WHERE phone = '".$phone."' ";
    $sql_PhoneQuery = mysqli_query($mysqli,$sql_checkPhone);
    
    if($sql_AllQuery->num_rows > 0){
        header("Location:../../indexRegister.php?register.php&trung=3&fullname=$fullname&pass=$pass&gender=$gender&addres=$address");  
    }else if($sql_checkQuery->num_rows > 0){
        header("Location:../../indexRegister.php?register.php&trung=1&fullname=$fullname&pass=$pass&gender=$gender&addres=$address&phone=$phone"); 
    }else if($sql_PhoneQuery->num_rows > 0){
        header("Location:../../indexRegister.php?register.php&trung=2&fullname=$fullname&pass=$pass&gender=$gender&addres=$address&email=$email"); 
    }else {
        $sql_add = "INSERT INTO tbl_dangky(fullname,email,addres,phone,pass,gender,province_id,wards_id,district_id) VALUE('".$fullname."', '".$email."','".$address."','".$phone."',
        '".$pass."','".$gender."','".$province."','".$wards."','".$district."' )";
        $sql_query = mysqli_query($mysqli,$sql_add);
        header("Location:../../indexLogin.php?pages/content/login.php&success=1");
    } 
    

    
    
    

    
    
      
}
?>