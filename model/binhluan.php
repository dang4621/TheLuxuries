<?php
function themBinhLuan($id_tai_khoan,$username,$ma_san_pham,$noi_dung,$ngay_bl){
    $sql = "INSERT INTO binh_luan( id_tai_khoan, username, ma_san_pham, noi_dung, ngay_bl) VALUES 
    ('$id_tai_khoan','$username','$ma_san_pham','$noi_dung','$ngay_bl')";
    pdo_execute($sql);
}
?>