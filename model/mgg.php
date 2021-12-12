<?php
    function them_mgg($ma_giam_gia ,$ngay_bat_dau ,$ngay_ket_thuc,$gia_tri, $title){
        $sql="INSERT INTO ma_giam_gia(ma_giam_gia , ngay_bat_dau , ngay_ket_thuc,gia_tri ,title	) 
                VALUES ('$ma_giam_gia','$ngay_bat_dau','$ngay_ket_thuc','$gia_tri','$title')";
        pdo_query($sql);
        return true;
    }
    function loadAll_mgg(){
        $sql="SELECT*FROM ma_giam_gia ORDER BY id_mgg";
                return pdo_query($sql);
    }
    function loadAll_mail(){
        $sql="SELECT email FROM tai_khoan";
                return pdo_query($sql);
    }
    // function check_mgg(){
    //     $sql="SELECT trang_thai FROM trang_thai_mgg WHERE id_tai_khoan = '$id_tai_khoan'";
    //             return pdo_query($sql);
    // }
    function compare($ma_giam_gia){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $sql="SELECT ngay_bat_dau , ngay_ket_thuc FROM ma_giam_gia WHERE ma_giam_gia = '$ma_giam_gia'";
           $mgg = pdo_query_one($sql);
           if(!empty($mgg)){
               extract($mgg);
                $timestamp = time();
                $today = date("20y-m-d h:i:s", $timestamp);
                if($today >= $ngay_bat_dau && $today <= $ngay_ket_thuc ){
                    return FALSE;
                }else{
                    return TRUE;
                }
           }else{
               return 0;
           }
           
    }
    function get_value($ma_giam_gia){
        $sql="SELECT gia_tri , id_mgg  FROM ma_giam_gia WHERE ma_giam_gia = '$ma_giam_gia'";
       return pdo_query_one($sql);
    }
    function compare_user($id_mgg,$id_tai_khoan){
        $sql="SELECT trang_thai FROM trang_thai_mgg WHERE id_mgg = '$id_mgg' AND id_tai_khoan ='$id_tai_khoan'";
        return  pdo_query_one($sql);
    }
    function get_mgg(){
        $timestamp = time();
        $today = date("20y-m-d H:i:s", $timestamp);
        $sql="SELECT ma_giam_gia , gia_tri FROM ma_giam_gia
        WHERE '$today' >= ngay_bat_dau   AND  '$today' <= ngay_ket_thuc LIMIT 1";
         return  pdo_query_one($sql);
      
    }

    function compare_admin($ma_giam_gia){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $sql="SELECT ngay_bat_dau , ngay_ket_thuc FROM ma_giam_gia WHERE ma_giam_gia = '$ma_giam_gia'";
           $mgg = pdo_query_one($sql);
           extract($mgg);
           $timestamp = time();
           $today = date("20y-m-d H:i:s", $timestamp);
           if($today >= $ngay_bat_dau && $today <= $ngay_ket_thuc ){
               return 1;
           }else if($today > $ngay_bat_dau && $today > $ngay_ket_thuc){
               return 3;
           }else if($today < $ngay_bat_dau){
               return 2;
           }
    }
?>