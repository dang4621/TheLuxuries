<?php 
    function lay_tong_hang(){
        $sql = "SELECT san_pham.ten_san_pham , SUM(chi_tiet_hoa_don.so_luong) AS Tong
                FROM chi_tiet_hoa_don INNER JOIN san_pham ON chi_tiet_hoa_don.ma_san_pham = san_pham.ma_san_pham
                GROUP BY chi_tiet_hoa_don.ma_san_pham;";
       return pdo_query($sql);
    }
    function lay_dtt($thang){
        $sql = "SELECT ngay_hoa_don , SUM(thanh_tien) as Tongtien 
                FROM hoa_don
                WHERE ngay_hoa_don LIKE '%2021-".$thang."%' GROUP BY ngay_hoa_don";
            return pdo_query($sql);
    }
       
    function loadall_thongke(){
        $sql=" select danh_muc.ma_nhom_hang as madm,danh_muc.ten_nhom_hang as tendm, count(san_pham.ma_san_pham) as countsp, min(san_pham.gia_goc) as minprice, max(san_pham.gia_goc) as maxprice, avg(san_pham.gia_goc) as avgprice";
        $sql.=" from san_pham left join danh_muc on danh_muc.ma_nhom_hang=san_pham.ma_nhom_hang"; 
        $sql.=" group by danh_muc.ma_nhom_hang order by danh_muc.ma_nhom_hang desc";
        $listthongke=pdo_query($sql);
        return $listthongke; 
    }
    
?>