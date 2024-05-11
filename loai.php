<div class="category">
    <input type="checkbox" id="Togglers">
    <label for="Togglers"><i class="fa-solid fa-bars"></i></label>
    <h2>Danh mục </h2>
    <ul class="categories_item">
        <?php
            require_once 'Ketnoi.php';
            $sql = "SELECT * FROM `loai`";
            $query = mysqli_query($conn, $sql);
            foreach ($query as $r) {
        ?>
        <li><a href="sanpham.php?maloai=<?php echo $r["maloai"] ?> "><?php echo $r["tenloai"] ?></a></li>
        <?php
            }
        ?>
    </ul>
</div>