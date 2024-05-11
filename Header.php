<?php
session_start();
ob_start();
$giohang = (isset($_SESSION['giohang'])) ? $_SESSION['giohang'] : [];
if (!isset($_SESSION['login']['tennguoidung'])) {
    header('location: http://localhost/Hai/BTL_manh/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng bán đồ Pet </title>
    <!-- Custom css -->
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="stylesheet" href="./Css/pay.css">
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <!-- Header -->
    <header id="header">
        <!-- Header_top -->
        <div class="header_top">
            <div class="contacinfo">
                <ul class="nav">
                    <li><a href="#"><i class="fa fa-phone"></i> +84 1234567890</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> ShopPet.com</a></li>
                </ul>
            </div>

        </div>
        <!-- header-middle -->
        <div class="header-middle">
            <div class="container_header">
                <!-- Logo -->
                <div class="header_logo">
                    <a href="index.php">
                        <p>Nhóm <strong>4</strong>
                            <span>Cửa hàng bán đồ cho thú cưng</span>
                        </p>
                    </a>
                </div>
                <div class="header_mid">
                    <ul class="header_mids">
                        <?php
                        // Kiểm tra xem người dùng đã đăng nhập chưa
                        if (isset($_SESSION['login']['tennguoidung'])) {
                            echo "<li><i class='fa-solid fa-user'></i>Xin chào, {$_SESSION['login']['tennguoidung']}</li>
                                    <li><i class='fas fa-right-from-bracket'></i><a href='logout.php'>Đăng xuất</a></li>";
                        } else {
                            echo "<li><i class='fa-solid fa-users'></i><a href='login.php'>Đăng Nhập</a></li>";
                        }
                        ?>
                        <li><i class="fa-solid fa-cart-shopping"></i><a href="xemgiohang.php">Giỏ Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>