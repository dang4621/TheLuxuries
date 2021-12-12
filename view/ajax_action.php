<?php 

include './model/pdo.php';
include './model/sanpham.php';   
include './model/danhmuc.php';    
include './model/thuonghieu.php';
include './model/giohang.php';
include './model/taikhoan.php';
include './model/mgg.php';

if(isset($_POST['mgg'])){
    $mgg = $_POST['mgg'];
    $check = compare_admin($mgg);
    if($check == 1){
        $gia_tri=get_value($mgg);
        extract($gia_tri);
        $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
        $ss = compare_user($id_mgg,$id_tai_khoan);
        if($ss == 1){
        $_SESSION['mgg']=["code"=>$mgg, "value"=>$gia_tri ,"id_mgg" => $id_mgg];
        $thongbao = '<script>swal ( "Mã hợp lệ", "Mã đã được áp dụng", "success");</script>';	
        include 'view/checkout.php';	
        }else{
            $thongbao =  '<script>swal ( "Mã không hợp lệ", "Hãy thử lại" ,  "error" );</script>';
            include 'view/checkout.php';
        }
                            
    }else{
          $thongbao =  '<script>swal ( "Mã không hợp lệ", "Hãy thử lại" ,  "error" );</script>';
        include 'view/checkout.php';
    }						
}

?>