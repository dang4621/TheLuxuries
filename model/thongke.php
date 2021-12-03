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
?>