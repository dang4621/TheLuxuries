<?php

function loadAll_bl(){
    $sql="SELECT*FROM binh_luan ORDER BY ma_bl";
    return pdo_query($sql);
}

function loadsp($ma_sp){
    $sql="SELECT*FROM san_pham WHERE ma_san_pham=$ma_sp";
    return pdo_query_one($sql);
}

function loadsp_all(){
    $sql="SELECT*FROM san_pham WHERE 1";
    return pdo_query($sql);
}

function loadAll_bl_sanpham($car){
    $sql="SELECT*FROM binh_luan WHERE ma_san_pham=$car";
    return pdo_query($sql);
}

function del_bl($id){
    $sql="DELETE FROM binh_luan WHERE ma_bl='$id'";
    pdo_execute($sql);
}


?>