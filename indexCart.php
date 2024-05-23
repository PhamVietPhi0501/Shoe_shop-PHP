<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/class.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>My Shoe</title>
</head>
<body>
    <div class="shop">
        <?php
        session_start();
        include("admin/config/config.php");
        include("pages/header_pay.php");
        include("pages/content/cart_pay.php");
        include("pages/footer.php");
        include("pages/messenger.php");
        ?>
    </div>
</body>
</html>