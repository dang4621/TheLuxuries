<?php 


function check_username($username){
    if(!preg_match("/^[A-Za-z0-9_\.]{6,32}$/", $username)){
        return true; 
    }else{
        return false;
    }
} 
function check_password($password){
    if(!preg_match("/^[A-Za-z0-9_\.]{6,32}$/", $password)){
        return true; 
    }else{
        return false;
    }
}
function check_email($email){ 
    if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)){
        return true; 
    }else{
        return false;
    }        
} 

function themTaiKhoan($username,$password,$ten_kh,$email){
    $sql = "INSERT INTO dang_ky_kh(username,password,ten_kh,email) VALUES ('$username','$password','$ten_kh','$email')";
    pdo_execute($sql);
}
function layTaiKhoan($username){
    $sql="SELECT*FROM dang_ky_kh WHERE username='$username'";
    return pdo_query_one($sql);
}
function lay_all_tk(){
    $sql="SELECT username FROM tai_khoan";
    return pdo_query($sql);
}
function kt_taikhoan($username,$password){
    $sql="SELECT*FROM dang_ky_kh WHERE username='$username' AND password='$password'";
    $kq= pdo_query_one($sql);
    extract($kq);
    if($vai_tro==1){
        return FALSE;
    }else{
        return TRUE;
    }

}

function doi_mk($new_password,$username){
    $sql="UPDATE dang_ky_kh SET password = '$new_password' WHERE username='$username'";
    return pdo_execute($sql);
}
function capNhatTT($ten_kh,$email,$username){
    $sql="UPDATE dang_ky_kh SET ten_kh = '$ten_kh' , email = '$email' WHERE username='$username'";
    return pdo_execute($sql);
}

function set_cookie($username,$hour){
    setcookie("username", "$username", time() + (3600 * $hour), "/");
    return true; 
}
function set_session($username){
    $_SESSION["username"] = $username;
    return true;
}

function layNgay(){
   return date("y-m-d");
}
function lay_all_kh($keyw,$tt){
    $sql="SELECT khach_hang.ma_kh,khach_hang.ten_kh,khach_hang.dia_chi,khach_hang.sdt ,
                hoa_don.so_hoa_don,hoa_don.thanhtien,hoa_don.ngay_hoa_don,hoa_don.pttt,hoa_don.trang_thai
                FROM(khach_hang INNER JOIN hoa_don ON khach_hang.ma_kh=hoa_don.ma_kh) WHERE 1";
        if($keyw!=""){
            $sql.=" AND so_hoa_don like '%".$keyw."%'";            
        }
        if($tt==999){
            $sql.=" ORDER BY ngay_hoa_don DESC";
        }
        if($tt==0||$tt==1||$tt==2||$tt==3){
            $sql.=" AND trang_thai = '$tt' ";
        }
        if($tt==998){
            $sql.=" ORDER BY thanhtien ";
        }
        if($tt==997){
            $sql.=" ORDER BY thanhtien DESC";
        }
        
    return pdo_query($sql);
}
function lay_kh($username){
    $sql="SELECT khach_hang.ma_kh,khach_hang.ten_kh,khach_hang.dia_chi,khach_hang.sdt ,
                hoa_don.so_hoa_don,hoa_don.thanhtien,hoa_don.ngay_hoa_don,hoa_don.pttt,hoa_don.trang_thai
                FROM(khach_hang INNER JOIN hoa_don ON khach_hang.ma_kh=hoa_don.ma_kh) 
                WHERE username='$username'";
    return pdo_query($sql);
}
function lay_dshd($so_hoa_don){
    $sql = "SELECT chi_tiet_hoa_don.ma_san_pham , chi_tiet_hoa_don.so_luong ,
            san_pham.ten_san_pham ,san_pham.gia ,san_pham.image 
            FROM (chi_tiet_hoa_don INNER JOIN san_pham ON chi_tiet_hoa_don.ma_san_pham=san_pham.ma_san_pham)
            WHERE chi_tiet_hoa_don.so_hoa_don='$so_hoa_don';";
        return pdo_query($sql);
}
function get_pttt($pttt){
    switch($pttt){
        case '1':
            return "Thanh toán lúc nhận hàng";
        case '2':
            return "Thanh toán chuyển khoản";
        case '3':
            return "Thanh toán bằng PayPal";
    }

}
function get_tt($trang_thai){
    switch($trang_thai){
        case '0':
            return "<p style='color: #FEE440 ;'>Đang xác nhận</p>";
        case '1':
            return "<p style='color: #69DADB ;'>Đang giao hàng</p>";
        case '2':
            return "<p style='color: #77D970 ;'>Giao hàng thành công</p>";
         case '3':
            return "<p style='color: #FF0000 ;'>Chúng tôi rất tiếc đơn hàng đã bị hủy</p>";    
    }
}
function xoa_dh($so_hoa_don,$ma_kh){
    $sql="DELETE FROM chi_tiet_hoa_don where so_hoa_don='$so_hoa_don';
            DELETE FROM hoa_don where so_hoa_don='$so_hoa_don';
            DELETE FROM khach_hang where ma_kh='$ma_kh';";
    pdo_execute($sql);
}
?>