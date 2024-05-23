<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssAdmin/admin.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Đăng nhập</title>
</head>

<body>
    <div class="login-center">
        <form action="" method="post">
            <div class="login-admin">
                <h2>Đăng nhập</h2>
                <form>
                    <div class="input-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" id="username" name="username" >
                    </div>
                    <div class="input-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" >
                    </div>
                    <button type="submit" name="loginAdmin">Đăng nhập</button>
                </form>
            </div>
        </form>
    </div>
</body>

</html>

<?php
    include('../admin/config/config.php');

    if(isset($_POST['loginAdmin'])){
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE taikhoan='$name' AND matkhau='$pass' ";
        $query = $mysqli->query($sql);

        if($query->num_rows > 0){
            header("Location:../admin/indexAdmin.php");
        }
    }
?>