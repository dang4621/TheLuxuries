<?php 

function themDanhMuc($ten_nhom_hang){
    $sql = "INSERT INTO danh_muc(ten_nhom_hang) VALUES ('$ten_nhom_hang')";
    pdo_execute($sql);
}
function loadAll_dm(){
    $sql="SELECT*FROM danh_muc ORDER BY ma_nhom_hang";
            return pdo_query($sql);
}
function loadOne_dm($id){
    $sql="SELECT*FROM danh_muc WHERE ma_nhom_hang='$id'";
            return pdo_query_one($sql);     
}
function del_dm($id){
    $sql="DELETE FROM danh_muc WHERE ma_nhom_hang='$id'";
    pdo_execute($sql);
}
function update_dm($ten_nhom_hang,$ma_nhom_hang){
    $sql="UPDATE danh_muc SET ten_nhom_hang = '$ten_nhom_hang' WHERE ma_nhom_hang='$ma_nhom_hang'";
    pdo_execute($sql);
}

?>