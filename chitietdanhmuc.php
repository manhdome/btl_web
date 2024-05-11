<?php
include_once('Header.php');
include_once('Menu.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <?php require('danhmuc.php') ?>
        </div>
        <?php
        require_once 'Ketnoi.php';
        $query_products = null;
        $sql_all_products = "SELECT * FROM san_pham";
        $query_all_products = mysqli_query($conn, $sql_all_products);
        if ($query_all_products && mysqli_num_rows($query_all_products) > 0) {
            $query_products = $query_all_products;
        }
        if (isset($_GET['maloai'])) {
            $maloai = $_GET['maloai'];
            $sql_loai = "SELECT * FROM loai WHERE `maloai` = $maloai";
            $query_loai = mysqli_query($conn, $sql_loai);

            if ($query_loai && mysqli_num_rows($query_loai) > 0) {
                $row_loai = mysqli_fetch_assoc($query_loai);
                $tenloai = $row_loai['tenloai'];
                $sql_danhmuc = "SELECT * FROM loai";
                $queryCategories = mysqli_query($conn, $sql_danhmuc);

                // Get the products for the selected category
                $sql_products = "SELECT * FROM san_pham WHERE `maloai` = $maloai";
                $query_products = mysqli_query($conn, $sql_products);
            }
        }
        ?>
        <div class="col-sm-9">
            <div class="container mt-3">
                <p style="color: blue; font-size: 18px; text-transform: uppercase;font-weight: 600;">
                    <?php echo $tenloai; ?>
                </p>
                <div class="cart_body ">
                    <div class="row ">

                        <?php
                        if ($query_products !== null) {
                            while ($row_product = mysqli_fetch_assoc($query_products)) {
                        ?>
                        <div class="col-sm-3 mb-5 ">
                            <div class="card" style="width: 220px;">
                                <img class="card-img-top" height="200px" width="200px"
                                    src="./Image/Product/<?php echo $row_product['anh']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <a href="product_deltail.php?masanpham=<?php echo $row_product["masanpham"] ?>"><?php echo $row_product['tensanpham']; ?></a>
                                    <br>
                                    <p class="card-text" style="color: red; font-weight: 700; font-size: 16px; text-align: center;"><?php echo $row_product['gia']; ?>đ</p>
                                    <a href="giohang.php?masanpham=<?php echo $row_product["masanpham"]?>" class="btn btn-primary position-absolute top:50%; right:50%; ml-2">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <?php
                        } else {
                            echo "Không có sản phẩm nào trong danh mục.";
                        }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
require('Footer.php')
?>