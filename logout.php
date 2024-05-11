<?php
session_start();
ob_start();
session_destroy();
header('location: index.php');
exit; // Đảm bảo rằng không có mã PHP hoặc HTML khác được thực thi sau lệnh header
