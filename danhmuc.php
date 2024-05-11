<div class="left-sidebar mt-3 ">
    <h3 class='widget-title'>Danh mục sản phẩm</h3>
    <div class='widget_nav_menu'>
        <ul class="widget_ul">
            <?php
            require_once 'Ketnoi.php';
            $sql = "SELECT * FROM `loai`";
            $query = mysqli_query($conn, $sql);
            foreach ($query as $row) {
            ?>
                <li class="widget_item">
                    <a href="chitietdanhmuc.php?maloai=<?php echo $row["maloai"] ?>"><?php echo $row["tenloai"] ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

</div>