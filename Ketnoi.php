<?php
$conn = mysqli_connect("localhost", "root", "", "qldopet1");
if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
