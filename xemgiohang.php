<?php
include('Header.php');
require('Ketnoi.php');
require('giohang_f.php');
$giohang = (isset($_SESSION['giohang'])) ? $_SESSION['giohang'] : [];

if (isset($_POST['thanhtoan'])) {
    $tenkh = $_POST['tenkh'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $note = $_POST['note'];
    $prices = total($giohang);
    // Kiểm tra nếu bất kỳ trường nào trống thì hiển thị thông báo
    if (empty($tenkh) || empty($email) || empty($sdt) || empty($diachi)) {
        echo ('<script>alert("Vui lòng nhập đủ thông tin");</script>');
    } else {
        $sqls = "INSERT INTO dat_hang(`tenkhachhang`, `diachi`, `email`, `sodienthoai`, `tongtien`, `tinnhan`) VALUES(
            '$tenkh','$diachi','$email','$sdt','$prices','$note'
        )";
        $kq = mysqli_query($conn, $sqls);
        if ($kq) {
            $madathang = mysqli_insert_id($conn);
            foreach ($giohang as $value) {
                $masanpham = $value['masanpham'];
                $gia = $value['gia'];
                $soluong = $value['soluong'];
                $resultorder = mysqli_query($conn, "INSERT INTO chi_tiet_dat_hang(`madathang`, `masanpham`, `soluong`, `gia`) 
                    VALUES ('$madathang','$masanpham','$soluong','$gia')");
            }
            echo '<script>
            alert("Thêm đơn hàng thành công");
            window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";
            </script>';
            unset($_SESSION['giohang']);
        }
    }
}
?>

<?php include('Menu.php') ?>
<section id="cart">
    <div class="container">
        <div class="breadcrumbs">
        </div>
        <?php
        if (empty($giohang)) {
            echo ("<h3 style='text-align: center; color:#009966; text-transform: uppercase;'>Giỏ hàng của bạn đang trống !</h3>");
            echo ("<div style=\"display: flex; justify-content: center; align-items: center;\"><img src='./cart_empty.png' alt='ảnh giohang'></div>");
        } else {
        ?>
            <div class="table_cart">
                <table class="table_cus">
                    <thead>
                        <tr class="cart_menu">
                            <td class="cart_menu_product">Sản phẩm</td>
                            <td class="cart_menu_price">Giá</td>
                            <td class="cart_menu_quanity">Số lượng</td>
                            <td class="cart_menu_thanhtien">Thành tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($giohang as $key => $value) { ?>
                            <tr style="border-bottom: 1px solid #C4DFDF;">
                                <td class="cart_img">
                                    <a href><img src="./Image/Product/<?php echo $value['anh'] ?>" alt="Ảnh sản phẩm"></a>
                                    <h4><a><?php echo $value['tensanpham'] ?></a></h4>
                                </td>
                                <td>
                                    <p><?php echo number_format($value['gia']) ?></p>
                                </td>
                                <td>
                                    <form action="giohang.php" method="get">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="masanpham" value="<?php echo $value['masanpham'] ?>">
                                        <input class="cart_quantity_input" type="number" name="soluong" value="<?php echo $value['soluong'] ?>" onkeyup="updateQuantity(event, <?php echo $value['masanpham']; ?>)">
                                    </form>
                                </td>
                                <td class="thanhtien">
                                    <p><?php echo number_format($value['soluong'] * $value['gia']) ?>đ</p>
                                </td>
                                <td class="delete"><a href="giohang.php?masanpham=<?php echo $value['masanpham'] ?>&action=delete"><i class="fa-solid fa-delete-left"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <form action="" method="post">
                <div class="pay">
                    <div class="info">
                        <h3>Thông tin của bạn</h3>
                        <div class="check_info">
                            <div class="name">
                                <input type="text" name="tenkh" placeholder="Họ & Tên">
                                <input type="text" name="sdt" placeholder="Số điện Thoại">
                            </div>
                            <div class="dress">
                                <input type="email" name="email" placeholder="Email">
                                <input type="text" name="diachi" placeholder="Địa chỉ của bạn">
                            </div>
                            <textarea name="note" id="adress" cols="75" rows="5" placeholder="Ghi chú (Không bắt buộc)"></textarea>
                        </div>
                    </div>
                    <!-- pay -->
                    <table>
                        <tr class="total">
                            <td>Tổng tiền : <span><?php echo number_format(total($giohang)) ?> VND</span></td>
                            <td><input type="submit" name="thanhtoan" value="Thanh Toán Đơn Hàng" class="thanhtoan"></td>
                        </tr>
                    </table>
                </div>
            </form>
        <?php } ?>
    </div>
</section>

<?php include('Footer.php') ?>
<!-- Jquery để update số lượng -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateQuantity(event, masanpham) {
        if (event.key === "Enter") {
            $.ajax({
                type: "POST",
                url: "giohang.php",
                data: {
                    action: "update",
                    masanpham: masanpham,
                    soluong: soluong
                },
                success: function(response) {

                }
            });
        }
    }
</script>