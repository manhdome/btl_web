<?php 
    require_once('Ketnoi.php');
    // thành tiền
    function total ($giohang){
        $tonggiohang = 0;
        foreach ($giohang as $key => $value) {
            $tonggiohang += ($value['soluong']*$value['gia']);
        }
        return $tonggiohang;
    }
?>

