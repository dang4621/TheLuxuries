<?php
function themBinhLuan($id_tai_khoan,$username,$ma_san_pham,$noi_dung,$ngay_bl){
    $sql = "INSERT INTO binh_luan( id_tai_khoan, username, ma_san_pham, noi_dung, ngay_bl) VALUES 
    ('$id_tai_khoan','$username','$ma_san_pham','$noi_dung','$ngay_bl')";
    pdo_execute($sql);
}
function layBL($ma_san_pham){
    $sql="SELECT tai_khoan.Hoten,binh_luan.noi_dung,binh_luan.ngay_bl              
            FROM(binh_luan INNER JOIN tai_khoan ON binh_luan.id_tai_khoan=tai_khoan.id_tai_khoan) 
            WHERE binh_luan.ma_san_pham = '$ma_san_pham'";
    return pdo_query($sql);
}
function lay_idtk($username){
    $sql="SELECT id_tai_khoan FROM tai_khoan WHERE username='$username'";
    return pdo_query_one($sql);
}
?>