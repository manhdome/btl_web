<?php
ob_start();
include('Ketnoi.php');

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dangki'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tennguoidung = mysqli_real_escape_string($conn, $_POST['tennguoidung']);
    $matkhau = mysqli_real_escape_string($conn, $_POST['matkhau']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['re-pass']);
    $diachi = mysqli_real_escape_string($conn, $_POST['adress']);
    $sodienthoai = mysqli_real_escape_string($conn, $_POST['sodienthoai']);
    $user_role_id = 1;
    $admin_role_id = 2;

    // Kiểm tra xem email, tên người dùng và số điện thoại đã tồn tại hay chưa
    $check_existing_sql = "SELECT * FROM nguoi_dung WHERE email = '$email' OR tennguoidung = '$tennguoidung' OR sodienthoai = '$sodienthoai'";
    $result_existing = mysqli_query($conn, $check_existing_sql);

    if (mysqli_num_rows($result_existing) > 0) {
        while ($row = mysqli_fetch_assoc($result_existing)) {
            if ($row['email'] == $email) {
                $errors[] = "Email đã được sử dụng bởi người dùng khác.";
            }
            if ($row['tennguoidung'] == $tennguoidung) {
                $errors[] = "Tên người dùng đã được sử dụng bởi người dùng khác.";
            }
            if ($row['sodienthoai'] == $sodienthoai) {
                $errors[] = "Số điện thoại đã được sử dụng bởi người dùng khác.";
            }
        }
    }

    // Bắt lỗi khi nhập lại mật khẩu không khớp
    if ($matkhau !== $confirm_pass) {
        $errors[] = "Mật khẩu và nhập lại mật khẩu không khớp.";
    }

    // Bắt lỗi số điện thoại không hợp lệ
    if (!is_numeric($sodienthoai) || strlen($sodienthoai) != 10) {
        $errors[] = "Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại hợp lệ có độ dài 10 ký tự.";
    }

    if (empty($errors)) {
        if ($tennguoidung == 'Admin') {
            $role_id = $admin_role_id;
        } else {
            $role_id = $user_role_id;
        }

     

        $sql = "INSERT INTO nguoi_dung (`matkhau`, `tennguoidung`, `email`, `sodienthoai`, `diachi`, `mavaitro`) 
                VALUES ('$matkhau', '$tennguoidung', '$email', '$sodienthoai', '$diachi', '$role_id')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>showSuccessPopup("Tạo tài khoản thành công ");</script>';
            header('location: Login.php');
            exit(); // Dừng chương trình ngay sau khi chuyển hướng
        } else {
            echo '<script>showErrorPopup("Tạo tài khoản thất bại: ' . mysqli_error($conn) . '");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/login.css">
    <title>Đăng Kí</title>
    <!-- Thêm thư viện SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
    function showErrorPopup(message) {
        if (message) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: message,
            });
        }
    }

    function showSuccessPopup(message) {
        if (message) {
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: message,
            });
        }
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <p class="title">Đăng Kí Tài khoản</p>
            <!-- Thêm biến JavaScript để kiểm tra có lỗi hay không -->
            <script>
                var hasErrors = <?php echo !empty($errors) && $_SERVER['REQUEST_METHOD'] === 'POST' ? 'true' : 'false'; ?>;
                var errorMessages = <?php echo json_encode($errors); ?>;
            </script>
            <form class="form" method="post" action="register.php" onsubmit="return validateForm()">
                <input type="email" required name="email" class="input" placeholder="Email">
                <input type="text" required name="tennguoidung" class="input" placeholder="Tài khoản">
                <input type="password" required name="matkhau" class="input" placeholder="Mật khẩu">
                <input type="password" required name="re-pass" class="input" placeholder="Nhập lại mật khẩu">
                <input type="text" required name="sodienthoai" class="input" placeholder="Số điện thoại">
                <input type="text" required name="adress" class="input" placeholder="Địa chỉ">
                <button class="form-btn" name="dangki">Đăng kí </button>
            </form>
            <p class="sign-up-label">
                Bạn đã có tài khoản?<span class="sign-up-link">
                    <a href="Login.php">Đăng Nhập</a>
                </span>
            </p>
            <?php
                // Hiển thị thông báo lỗi nếu có
                if (!empty($errors) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo '<script>showErrorPopup("'.implode('\n', $errors).'");</script>';
                }
            ?>
        </div>
    </div>

    <script>
    function validateForm() {
        var pass = document.getElementsByName('matkhau')[0].value;
        var confirm_pass = document.getElementsByName('re-pass')[0].value;
        var sodienthoai = document.getElementsByName('sodienthoai')[0].value;

        if (pass !== confirm_pass) {
            showErrorPopup("Mật khẩu và nhập lại mật khẩu không khớp.");
            return false;
        }

        if (isNaN(sodienthoai) || sodienthoai.length !== 10) {
            showErrorPopup("Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại hợp lệ có độ dài 10 ký tự.");
            return false;
        }

        // Kiểm tra có lỗi hay không và hiển thị thông báo nếu có
        if (hasErrors) {
            showErrorPopup("Có lỗi xảy ra. Vui lòng kiểm tra lại thông tin đăng kí.");
            return false;
        }

        return true;
    }
    </script>
</body>

</html>
