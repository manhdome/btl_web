<?php
session_start();
ob_start();
require('Ketnoi.php');
if (isset($_POST['login'])) {
    if (isset($_POST['tennguoidung']) && isset($_POST['matkhau'])) {
        $tennguoidung = $_POST['tennguoidung'];
        $matkhau = $_POST['matkhau'];

        $sql = "SELECT * FROM `nguoi_dung` WHERE tennguoidung = '$tennguoidung' AND matkhau='$matkhau' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("Đăng Nhập Thành Công ");</script>';

            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                header('location: ' . $action . '.php');
            } else {
                header('location: index.php');
            }
            $_SESSION['login']['tennguoidung'] = $tennguoidung;
        } else {
            echo '<script>alert("Sai mật khẩu ");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\login.css">
    <title>Đăng Nhập</title>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <p class="title">Đăng Nhập</p>
            <form class="form" method="post" action="Login.php">
                <input type="text" required name="tennguoidung" class="input" placeholder="Tài khoản">

                <input type="password" required name="matkhau" class="input" placeholder="Mật khẩu">
                <p class="page-link">
                    <span class="page-link-label">Quên mật khẩu?</span>
                </p>
                <button class="form-btn" name="login">Đăng nhập</button>
            </form>
            <p class="sign-up-label">Bạn chưa có tài khoản?<span class="sign-up-link"><a href="register.php">Đăng kí</a></span></p>

        </div>
    </div>
    </div>
</body>

</html>