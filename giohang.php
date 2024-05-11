<?php
    session_start();
    ob_start();
    include 'Ketnoi.php';
    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
    // Số Lượng
    $soluong = (isset($_GET['soluong'])) ? $_GET['soluong'] : 1 ;
    if (isset($_GET['masanpham'])) 
    {
        $masanpham = $_GET['masanpham'];
    
    }
    $query = mysqli_query($conn, "SELECT * FROM `san_pham` WHERE `masanpham`= '$masanpham'");
    if ($query) 
    {
        $product = mysqli_fetch_assoc($query);
    }
    // Nếu < 0 xóa
    if($soluong<0){
        $action = 'delete';
    }
    $item = [
        'masanpham' => $product['masanpham'],
        'tensanpham' => $product['tensanpham'],
        'anh' => $product['anh'],
        'gia' => $product['gia'],
        'soluong' =>  $soluong 
    ];
    //Thêm giỏ hàng
    if ($action == 'add') {
        if (isset($_SESSION['giohang'][$masanpham])) {
            $_SESSION['giohang'][$masanpham]['soluong'] += $soluong; 
            
        } else {
            $_SESSION['giohang'][$masanpham] = $item;
        }
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }

    //Câp Nhật
    if ($action == 'update') {
        $_SESSION['giohang'][$masanpham]['soluong'] = $soluong;
    }
    //Xóa
    if ($action == 'delete') {
        unset($_SESSION['giohang'][$masanpham]);
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
?>