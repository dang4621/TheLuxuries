<?php 
 session_start();
    include '../model/pdo.php';
    include '../model/mgg.php';

	if (isset($_POST['mgg'])) {
        $mgg = $_POST['mgg'];

        $check = compare_admin($mgg);

        if ($check == 1) {
            $gia_tri = get_value($mgg);
            extract($gia_tri);
            $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
            $ss = compare_user($id_mgg, $id_tai_khoan);
            $_SESSION['test'] = $ss;
            if ($ss == 0 || $ss == "") {
                $_SESSION['mgg'] = ["code" => $mgg, "value" => $gia_tri, "id_mgg" => $id_mgg];

                    $total =0 ;
                    if (isset($_SESSION['mgg'])) {
                        $hieu = $_SESSION['total'] / 100 * $_SESSION['mgg']['value'];
                        $total =  $_SESSION['total'] - $hieu;
                        echo json_encode(['Áp dụng thành công mã giảm giá : '.$mgg.' bạn được giảm '.$gia_tri.'% cho hóa đơn',$total,$id_mgg]);
                    }         
            }    
        }else{
            echo json_encode(['Áp dụng không thành công mã giảm giá không hợp lệ',false]);
        }
    }
?>