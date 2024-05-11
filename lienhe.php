<?php
include_once('Header.php');
include_once('Menu.php');
include_once('Banner.php');

$conn = mysqli_connect("localhost", "root", "", "qldopet1");

if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

$successMessage = "";

function isValidPhoneNumber($phone) {
    return preg_match("/^[0-9]{10}$/", $phone);
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho_ten = $_POST["hoTen"];
    $email = $_POST["email"];
    $so_dien_thoai = $_POST["soDienThoai"];
    $noi_dung = $_POST["noiDung"];

    if (!isValidPhoneNumber($so_dien_thoai)) {
        echo "<script>alert('Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại gồm 10 chữ số.');</script>";
    } elseif (!isValidEmail($email)) {
        echo "<script>alert('Địa chỉ email không hợp lệ. Vui lòng nhập địa chỉ email hợp lệ.');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO lienhe (hoTen, soDienThoai, email, noiDung, thoiGianGui)
                                VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $ho_ten, $so_dien_thoai, $email, $noi_dung);

        if ($stmt->execute()) {
            $successMessage = "Gửi liên hệ thành công!";
        } else {
            echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Liên Hệ</h2>
            <?php
                if (!empty($successMessage)) {
                    echo "<script>alert('$successMessage');</script>";
                }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="hoTen">Họ và Tên:</label>
                    <input type="text" class="form-control" id="hoTen" name="hoTen" required>
                </div>
                <div class="form-group">
                    <label for="soDienThoai">Số Điện Thoại:</label>
                    <input type="tel" class="form-control" id="soDienThoai" name="soDienThoai" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="noiDung">Nội Dung:</label>
                    <textarea class="form-control" id="noiDung" name="noiDung" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5" name="submit">Gửi tin nhắn</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once('Footer.php');
?>
