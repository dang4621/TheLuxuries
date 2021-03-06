<?php 

function themSanPham($ma_san_pham,$ma_nhom_hang,$ma_thuong_hieu,$ten_san_pham,$file, $gia_goc,$giam_gia,$today, $mo_ta){
    $sql = "INSERT INTO san_pham
            (ma_san_pham,ma_nhom_hang ,ma_thuong_hieu,ten_san_pham, image , gia_goc , giam_gia ,ngay_nhap ,mo_ta) 
    VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ma_san_pham,$ma_nhom_hang,$ma_thuong_hieu,$ten_san_pham,$file,$gia_goc,$giam_gia,$today,$mo_ta);
}
function themThuocTinh($code,$size,$color,$so_luong){
    $sql = "INSERT INTO thuoc_tinh
            (ma_san_pham , size , color , so_luong) 
    VALUES ('$code','$size','$color','$so_luong')";
    pdo_execute($sql);
}
function load_all_sp($keyw,$id){
    $sql="SELECT*FROM san_pham WHERE 1";
    if($keyw!=""){
        $sql.=" and ten_san_pham like '%".$keyw."%'";            
    }
    if($id!=""&&$id!==0&&$id!==999&&$id!==998&&$id!==997&&$id!==996){
        $sql.=" and ma_nhom_hang='".$id."'";
    }if($id==999){
        $sql.=" ORDER BY view";
    }
    if($id==998){
        $sql.=" ORDER BY view DESC";
    }
    if($id==997){
        $sql.=" ORDER BY gia_goc";
    }
    if($id==996){
        $sql.=" ORDER BY gia_goc DESC";
    }
    if($id=0){
        $sql.=" ORDER BY ma_nhom_hang";
    }   
    return pdo_query($sql);
}
function loadAll_sp($keyw,$id_dm_c){
    $sql="SELECT*FROM san_pham WHERE 1";
    if($keyw!=""){
        $sql.=" and ten_san_pham like '%".$keyw."%'";            
    }
    if($id_dm_c!=""){
        $sql.=" and ma_nhom_hang='".$id_dm_c."'";
    }
    $sql.=" ORDER BY ma_san_pham";
    return pdo_query($sql);
}
function load3_sp(){
    $sql="SELECT*FROM san_pham LIMIT 3";
    return pdo_query($sql);
}
function loadOne_sp($id){
    $sql="SELECT * FROM(san_pham INNER JOIN thuong_hieu ON san_pham.ma_thuong_hieu=thuong_hieu.ma_thuong_hieu)                               
                            WHERE san_pham.ma_san_pham = '$id'";
            return pdo_query_one($sql);     
}
function test(){
    $sql = "SELECT * FROM ((san_pham INNER JOIN thuong_hieu ON san_pham.ma_thuong_hieu=thuong_hieu.ma_thuong_hieu)
                                INNER JOIN thuoc_tinh ON san_pham.ma_san_pham =thuoc_tinh.ma_san_pham)
                                WHERE san_pham.ma_san_pham = 24082019";
    return pdo_query_one($sql);  
}

function del_sp($id){
    $sql="DELETE FROM `san_pham` WHERE `san_pham`.`ma_san_pham` = $id";
    pdo_execute($sql); 
}

function update_sp($ma_san_pham,$ma_nhom_hang,$ma_thuong_hieu,$ten_san_pham,$file, $gia_goc,$giam_gia,$today, $mo_ta){
   if($file!=""){
    $sql="UPDATE san_pham SET ma_nhom_hang = '$ma_nhom_hang',ma_thuong_hieu = '$ma_thuong_hieu',ten_san_pham='$ten_san_pham',gia_goc='$gia_goc',giam_gia='$giam_gia',image='$file',mo_ta='$mo_ta',ngay_nhap='$today' WHERE ma_san_pham='$ma_san_pham'";
   }else{
    $sql="UPDATE san_pham SET ma_nhom_hang = '$ma_nhom_hang',ma_thuong_hieu = '$ma_thuong_hieu',ten_san_pham='$ten_san_pham',gia_goc='$gia_goc',giam_gia='$giam_gia',mo_ta='$mo_ta',ngay_nhap='$today' WHERE ma_san_pham='$ma_san_pham'";
   }
    pdo_execute($sql);
}
function tangSoLanXem($id=0){
    $sql="UPDATE san_pham SET view= view+1 WHERE ma_san_pham=$id";
    pdo_execute($sql); 
}

function loadthuoctinh($id){
    $sql="SELECT * FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham = '$id'";
        return pdo_query($sql);
}
function loadOne_sp2(){
    $id=$_GET['id'];
    $sql="SELECT*FROM san_pham WHERE ma_san_pham='$id'";
            return pdo_query_one($sql);     
}
function edit_tt($size,$color,$so_luong,$id){
    $sql = "UPDATE thuoc_tinh SET size = '$size' , color = '$color' ,so_luong = '$so_luong' WHERE thuoc_tinh.id_tt = '$id';";
    pdo_execute($sql); 
}

?>