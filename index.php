<?php
include_once('Header.php');
include_once('Menu.php');
include_once('Banner.php');
?>
<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#moinhat" class="nav-link active" data-toggle="tab">Sản Phẩm mới nhất</a>
        </li>
        <li class="nav-item">
            <a href="#banchay" class="nav-link" data-toggle="tab">Sản phẩm bán chạy</a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="moinhat">
            <div class="product_newcart">
                <?php
                require_once('Ketnoi.php');

                // Số sản phẩm trên mỗi trang
                $productsPerPage = 10;

                // Xác định trang hiện tại
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $startFrom = ($page - 1) * $productsPerPage;

                // Truy vấn SQL với LIMIT và OFFSET
                $sql = "SELECT * FROM san_pham ORDER BY thoihan DESC LIMIT $startFrom, $productsPerPage";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tensanpham = $row["tensanpham"];
                        $image = $row['anh'];
                        $gia = $row['gia'];
                ?>
                        <div class="cart_item">
                            <img src="./Image/Product/<?php echo $image; ?>" alt="<?php echo $tensanpham; ?>">
                            <a href="product_deltail.php?masanpham=<?php echo $row["masanpham"] ?>"><?php echo $row['tensanpham']; ?></a>
                            <span><?php echo number_format($gia); ?>đ</span>
                            <a class="add" href="giohang.php?masanpham=<?php echo $row["masanpham"] ?>">Thêm vào giỏ hàng</a>
                        </div>
                <?php
                    }
                } else {
                    echo "Không tìm thấy sản phẩm bán chạy nào.";
                }

                // Tính giá trị của $totalPages
                $totalProducts = mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM san_pham'));
                $totalPages = ceil($totalProducts / $productsPerPage);
                ?>
            </div>

            <div class="pagination" style="text-align: center;">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '">' . $i . '</a>';
                }
                ?>
            </div>
        </div>


        <div class="tab-pane fade" id="banchay">
            <div class="product_newcart">
                <?php
                require_once('Ketnoi.php');

                // Số sản phẩm trên mỗi trang
                $productsPerPageBanchay = 10;

                // Xác định trang hiện tại
                $pageBanchay = isset($_GET['pageBanchay']) ? (int)$_GET['pageBanchay'] : 1;
                $startFromBanchay = ($pageBanchay - 1) * $productsPerPageBanchay;

                // Truy vấn SQL với LIMIT và OFFSET
                $sqlBanchay = "SELECT * FROM san_pham ORDER BY tongmua DESC LIMIT $startFromBanchay, $productsPerPageBanchay";
                $resultBanchay = mysqli_query($conn, $sqlBanchay);

                if ($resultBanchay && mysqli_num_rows($resultBanchay) > 0) {
                    while ($rowBanchay = mysqli_fetch_assoc($resultBanchay)) {
                        $tensanphamBanchay = $rowBanchay["tensanpham"];
                        $imageBanchay = $rowBanchay['anh'];
                        $giaBanchay = $rowBanchay['gia'];
                ?>
                        <div class="cart_item">
                            <img src="./Image/Product/<?php echo $imageBanchay; ?>" alt="<?php echo $tensanphamBanchay; ?>">
                            <a href="product_deltail.php?masanpham=<?php echo $rowBanchay["masanpham"] ?>"><?php echo $rowBanchay['tensanpham']; ?></a>
                            <span><?php echo number_format($giaBanchay); ?>đ</span>
                            <a class="add" href="giohang.php?masanpham=<?php echo $rowBanchay["masanpham"] ?>">Thêm vào giỏ hàng</a>
                        </div>

                <?php
                    }
                } else {
                    echo "Không tìm thấy sản phẩm bán chạy nào.";
                }

                // Tính giá trị của $totalPagesBanchay
                $totalProductsBanchay = mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM san_pham'));
                $totalPagesBanchay = ceil($totalProductsBanchay / $productsPerPageBanchay);
                ?>
            </div>

            <div class="pagination" style="text-align: center;">
                <?php
                for ($i = 1; $i <= $totalPagesBanchay; $i++) {
                    echo '<a href="?pageBanchay=' . $i . '">' . $i . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once('Footer.php');
?>