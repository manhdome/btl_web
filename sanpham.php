<?php
include_once('Header.php');
include_once('Menu.php');
include_once('Banner.php');
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <?php require('danhmuc.php') ?>
        </div>
        <div class="col-sm-9">
            <div class="container mt-3">
                <p style="color: blue; font-size: 18px; text-transform: uppercase;font-weight: 600;">Có 30 sản phẩm</p>
                <div class="cart_body ">
                    <div class="row ">
                        <?php
                        require_once('Ketnoi.php');
                        $sql = "SELECT * FROM `san_pham`";

                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $tensanpham = $row["tensanpham"];
                                $image = $row['anh'];
                                $gia = $row['gia'];

                        ?>
                                <div class="col-sm-3 mb-5 ">
                                    <div class="card" style="width: 220px;">
                                        <img class="card-img-top" height="200px" src="./Image/Product/<?php echo $image; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <a href="product_deltail.php?masanpham=<?php echo $row["masanpham"] ?>"><?php echo $row['tensanpham']; ?></a>
                                            <br>
                                            <p class="card-text" style="color: red;font-weight: 700;font-size: 16px; text-align: center;"><?php echo number_format($gia); ?>đ</p>
                                            <a href="giohang.php?masanpham=<?php echo $row["masanpham"] ?>" class="btn btn-primary position-absolute top:50%; right:50%; ml-2">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "Không tìm thấy sản phẩm bán chạy nào.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once('Footer.php');
        ?>