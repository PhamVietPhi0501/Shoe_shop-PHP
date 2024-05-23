<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id_dangky = $_SESSION['user'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/class.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>My Shoe</title>
</head>
<body>
        <span class="pay_momo_name" >Thanh toán theo những gì bạn muốn</span>
        <div class="pay_momo">    
            <form action="pages/content/momoQR.php" method="post" enctype="application/x-www-form-urlencoded" > 
                <button type="submit" name="QR" class="pay_momo-left" value="<?php if(isset($_GET['sum'])){echo $_GET['sum'];} ?>" >
                    <img src="image/momoQR.png" alt="">
                    <h2>Thanh toán bằng mã QR</h2>
                </button>
            </form> 
            <form id="formATM" action="pages/content/momoATM.php" method="post" enctype="application/x-www-form-urlencoded">
                <button type="submit" name="ATM" class="pay_momo-right" value="<?php if(isset($_GET['sum'])){echo $_GET['sum'];} ?>" >
                    <img src="image/momoATM.jpg" alt="">
                    <h2>Thanh toán bằng tài khoản</h2>
                    <input style="display: none;" type="text" name="sl" value="<?php echo $_GET['sl'] ?>">
                    <input style="display: none;" type="text" name="diachi" value="<?php echo (isset($_GET['diachi']))? ('diachi='.$_GET['diachi']):('dangky='.$id_dangky) ?>">
                </button>
            </form>
        </div>
</body>
</html>



