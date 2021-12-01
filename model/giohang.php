<?php 
    function laysp($ma_san_pham){
        $sql="SELECT * FROM `san_pham` WHERE `ma_san_pham`='$ma_san_pham'";
        return pdo_query_one($sql);
    }
    function lay_idTT($ma_san_pham,$size,$color){
        $sql2="SELECT thuoc_tinh.id_tt FROM `thuoc_tinh` WHERE 
        thuoc_tinh.ma_san_pham = '$ma_san_pham' 
        and thuoc_tinh.size = '$size'
            AND thuoc_tinh.color= '$color'";
        return pdo_query_one($sql2);    
    }
    function getid($ma_san_pham,$size,$color){
        $id=lay_idTT($ma_san_pham,$size,$color);
        if(is_array($id)){
            extract($id);
        }        
        return $id_tt;
    }
    function themGH($ma_san_pham,$soluong,$gia,$size,$color) {
        // $sql="SELECT * FROM `san_pham` WHERE `ma_san_pham`='$ma_san_pham'";
        // $onesp=pdo_query_one($sql);
        $onesp = laysp($ma_san_pham);
        if(is_array($onesp)){
             extract($onesp);
        }
       

        // $sql2="SELECT thuoc_tinh.id_tt FROM `thuoc_tinh` WHERE 
        //                 thuoc_tinh.ma_san_pham = '$ma_san_pham' 
        //                 and thuoc_tinh.size = '$size'
        //                 AND thuoc_tinh.color= '$color'";
        // $idTT = pdo_query_one($sql2);  
        $idTT =lay_idTT($ma_san_pham,$size,$color);
        if(is_array($idTT)){
            extract($idTT);
        }
        

        $key = $ma_san_pham . $id_tt ;
        
			$cartArray = array(
                'ten_san_pham'=>$ten_san_pham,
                'ma_san_pham'=>$ma_san_pham,
                'gia'=>$gia,
                'quantity'=>$soluong,
                'image'=>$image,
                'idTT' =>$id_tt,
                'size'=>$size,
                'color'=>$color,
                'key' => $key
		    );
            if(empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"][$ma_san_pham . $id_tt] = $cartArray;
                    return "<p>Thêm thành công</p>";
            }else{
                $array_keys = array_keys($_SESSION["shopping_cart"]);                
                if(in_array($ma_san_pham . $id_tt,$array_keys)) {
                    $_SESSION["shopping_cart"][$ma_san_pham . $id_tt]['quantity']+=1;
                    return "<p>Thêm thành công.</p>";
                }else{
                    $_SESSION["shopping_cart"][$ma_san_pham . $id_tt] = $cartArray;
                    return "<p>Thêm thành công..</p>";
                }
            }
    }
    function xoaSP($ma_san_pham){
        unset($_SESSION['shopping_cart'][$ma_san_pham]);
        return true;
    }
    function radom(){
        return mt_rand(10000,99999);
    }
    function them_kh($ma_kh ,$ten_kh ,$dia_chi, $sdt, $username){
        $sql="INSERT INTO khach_hang(ma_kh , ten_kh , dia_chi , sdt , username) VALUES ('$ma_kh','$ten_kh','$dia_chi','$sdt','$username')";
        pdo_query($sql);
        return true;
    }
    function them_hd($so_hoa_don,$ma_kh,$thanhtien,$ngay_hoa_don,$pttt,$trang_thai){
        $sql="INSERT INTO hoa_don(so_hoa_don , ma_kh, thanhtien ,ngay_hoa_don, pttt , trang_thai) VALUES
             ('$so_hoa_don','$ma_kh','$thanhtien','$ngay_hoa_don','$pttt','$trang_thai')";
        pdo_query($sql);
        return true;
    }
    function them_cthd($so_hoa_don,$ma_san_pham,$so_luong){
        $sql="INSERT INTO chi_tiet_hoa_don(so_hoa_don , ma_san_pham , so_luong) VALUES ('$so_hoa_don','$ma_san_pham','$so_luong')";
        pdo_query($sql);
        return true;
    }    
    function sua_tt($trangthai,$so_hoa_don){
        $sql="UPDATE hoa_don SET trang_thai = '$trangthai' WHERE so_hoa_don='$so_hoa_don'";
        return pdo_execute($sql);
    }

    function load_dh(){
        $id=$_SESSION['user']['id_tai_khoan'];
        $sql="SELECT*FROM hoa_don WHERE id_tai_khoan='$id'";
                return pdo_query($sql);     
    }

    function load_chitiet(){
        $id=$_GET['id'];
        $sql="SELECT*FROM hoa_don WHERE so_hoa_don='$id'";
                return pdo_query_one($sql);     
    }

    function load_sp_dh(){
        $id=$_GET['id'];
        $sql="SELECT*FROM chi_tiet_hoa_don WHERE so_hoa_don='$id'";
                return pdo_query($sql);     
    }


    function load_sp_theo_dh($so_hoa_don){
        
        $sql="SELECT  chi_tiet_hoa_don.so_hoa_don, chi_tiet_hoa_don.gia , chi_tiet_hoa_don.so_luong ,thuoc_tinh.size ,thuoc_tinh.color ,san_pham.ten_san_pham ,san_pham.image ,san_pham.gia_goc
										   FROM    ((chi_tiet_hoa_don INNER JOIN hoa_don ON chi_tiet_hoa_don.so_hoa_don = hoa_don.so_hoa_don)
														   INNER JOIN thuoc_tinh ON chi_tiet_hoa_don.id_tt = thuoc_tinh.id_tt)
														   INNER JOIN san_pham ON thuoc_tinh.ma_san_pham = san_pham.ma_san_pham
										   WHERE   chi_tiet_hoa_don.so_hoa_don = $so_hoa_don ";
										 return pdo_query_one($sql);     
    }
?>