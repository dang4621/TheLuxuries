<?php
include './model/pdo.php';
//Hàm login sau khi mạng xã hội trả dữ liệu về
function loginFromSocialCallBack($socialUser) {
    


    $sql = "Select * from `tai_khoan` WHERE `email` ='" . $socialUser['email'] . "'";
    $khachhang = pdo_query_one($sql);
    if (!is_array($khachhang)) {
        $random =rand(10000,99999999) ;
        $id_tk= $random;
        $sql = "INSERT INTO tai_khoan(id_tai_khoan,username,email)value(?,?,?)";
        $khachhang = pdo_execute($sql,$id_tk ,$socialUser['name'], $socialUser['email'], );
  
        $sql = "Select * from `tai_khoan` WHERE `email` ='" . $socialUser['email'] . "'";
        $khachhang = pdo_query_one($sql);
    }
    if (is_array($khachhang)) {
        $user = $khachhang;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = $user;
        header("location:index.php");
    }
}

function validateDateTime($date) {
    //Kiểm tra định dạng ngày tháng xem đúng DD/MM/YYYY hay chưa?
    preg_match('/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/', $date, $matches);
    if (count($matches) == 0) { //Nếu ngày tháng nhập không đúng định dạng thì $match = array(); (rỗng)
        return false;
    }
    $separateDate = explode('-', $date);
    $day = (int) $separateDate[0];
    $month = (int) $separateDate[1];
    $year = (int) $separateDate[2];
    //Nếu là tháng 2
    if ($month == 2) {
        if ($year % 4 == 0) { //Nếu là năm nhuận
            if ($day > 29) {
                return false;
            }
        } else { //Không phải năm nhuận
            if ($day > 28) {
                return false;
            }
        }
    }
    //Check các tháng khác
    switch ($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            if ($day > 31) {
                return false;
            }
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            if ($day > 30) {
                return false;
            }
            break;
    }
    return true;
}

?>
