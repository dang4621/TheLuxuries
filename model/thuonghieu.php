<?php 

 function themthuonghieu($math,$tenth,$xuatxu,$filename){
   
    $sql="insert into thuong_hieu(ma_thuong_hieu,ten_thuong_hieu,xuat_xu,logo) values ('$math','$tenth','$xuatxu','$filename')";
   return pdo_execute($sql);
}
function loadAll_th(){
    $sql="SELECT*FROM thuong_hieu ORDER BY ma_thuong_hieu";
            return pdo_query($sql);
}
function loadOne_th($id){
    $sql="SELECT*FROM thuong_hieu WHERE ma_thuong_hieu='$id'";
            return pdo_query_one($sql);     
}

function update_th($tenth,$xuatxu,$logo){
    $id=$_GET['id'];
    $sql="UPDATE thuong_hieu SET ten_thuong_hieu = '$tenth',xuat_xu= '$xuatxu',logo= '$logo' WHERE ma_thuong_hieu='$id'";
    pdo_execute($sql);
}

function del_th($id){
    $sql="DELETE FROM thuong_hieu where ma_thuong_hieu='$id'";
    pdo_execute($sql);
}
?>