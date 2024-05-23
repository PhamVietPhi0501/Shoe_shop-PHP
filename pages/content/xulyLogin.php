<?php
include('../../admin/config/config.php');
session_start();

if(isset($_POST)){
    $email = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND pass='".$pass."' ";
    $row = mysqli_query($mysqli,$sql);
    if(mysqli_num_rows($row) > 0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['user'] = $row_data['id_dangky'];
        $_SESSION['mail'] = $row_data['email'];
        header('Location:../../index.php');
    }else {
        header("Location:../../indexLogin.php?login.php&false=0");      
    }
}
?>