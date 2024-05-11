    <?php
    require_once('Header.php');
    ?>
    <!-- Navbar(Menu) -->
    <?php
    require_once('Menu.php');
    ?>

    <!-- Main conten -->
    <?php
    include('Ketnoi.php');
    if (isset($_GET['masanpham'])) {
        $masp = $_GET['masanpham'];
        $sql = "SELECT * FROM san_pham WHERE masanpham=$masp";
        $kq = mysqli_query($conn, $sql);
        if ($kq) {
            $sanpham = mysqli_fetch_assoc($kq);
        }
    }
    ?>
    <?php
    include('Ketnoi.php');
    if (isset($_GET['masanpham'])) {
        $masp = $_GET['masanpham'];
        $sql = "SELECT * FROM san_pham WHERE masanpham=$masp";
        $kq = mysqli_query($conn, $sql);
        if ($kq) {
            $sanpham = mysqli_fetch_assoc($kq);
        }
    }
    ?>
    <section id="main_deltail">
        <div class="main_deltails">
            <!-- Sản phẩm -->
            <div class="img">
                <div class="image_main">
                    <img id="mainImage" src="./Image/Product/<?= $sanpham['anh'] ?>" alt="<?= $sanpham['tensanpham'] ?>">
                </div>

            </div>

            <div class="product_deltail">
                <div class="deltail_main">

                    <div class="deltail_conten">
                        <h3><?= $sanpham['tensanpham'] ?>
                        </h3>
                        <bdi> <?= number_format($sanpham['gia']) ?>đ</bdi>
                        <div class="qanity_btn">
                            <div class="quani">
                                <label for="">Số lượng :</label>
                                <input type="number" value="1">
                            </div>
                            <div class="btn_cart">
                                <a href="giohang.php?masanpham=<?php echo $sanpham["masanpham"] ?>"><input type="button" value=" Thêm vào giỏ hàng"></a>
                            </div>
                        </div>
                        <div class="conten">
                            <p><?= $sanpham['mieuta'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="new">
            <div class="product_new">
                <div class="product_title">
                    <h3>Sản phẩm liên quan</h3>
                </div>
                <div class="product_newcart">
                    <?php
                    require('Ketnoi.php');
                    $productID = $_GET['masanpham'];
                    // Lấy danh mục của sản phẩm hiện tại
                    $sql = "SELECT maloai FROM san_pham WHERE masanpham=$productID";
                    $result = mysqli_query($conn, $sql);
                    $maloai = mysqli_fetch_assoc($result)['maloai'];
                    // Lấy danh sách các sản phẩm liên quan khác với sản phẩm hiện tại và có danh mục cùng
                    $sql = "SELECT * FROM san_pham WHERE maloai=$maloai AND masanpham<>$productID";
                    $result = mysqli_query($conn, $sql);
                    $relatedProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($relatedProducts as $product) {
                        echo '<div class="cart_item">';
                        echo '<img src="./Image/Product/' . $product['anh'] . '" alt="' . $product['tensanpham'] . '">';
                        echo '<a href="product_deltail.php?masanpham=' . $product["masanpham"] . '">' . $product['tensanpham'] . '</a><br>';
                        echo '<span>' . number_format($product['gia']) . 'đ</span>';
                        echo '<a class="add" href="giohang.php?masanpham=' . $product["masanpham"] . '">Thêm vào giỏ hàng</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once('Footer.php');
    ?>