<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/assets/css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Đăng nhập & Đăng ký</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
</head>
<?php include './facebook_source.php';
include './google_source.php';
 ?>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form action="" method="post" class="sign-in-form">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên người dùng" name="username" />

                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="password" />
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn solid" name="submit" />
                    <a href="forget_pass/quenmk.php" style="text-decoration: none;">Quên mật khẩu</a>
                    <a href="index.php?" style="text-decoration: none;">Quay trở lại trang chủ</a>
                    <p class="social-text">Hoặc đăng nhập bằng các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="<?= $loginUrl ?>" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="<?=$authUrl?>" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <?php
                include './model/pdo.php';
                session_start();
                if (isset($_POST['submit'])) {
                    $user = $_POST['username'];
                    $password = $_POST['password'];
                    $sql = "SELECT * FROM tai_khoan WHERE username='{$user}' AND password ='{$password}'";
                    $khachhang = pdo_query_one($sql);
                    if (is_array($khachhang)) {
                        extract($khachhang);
                        if($vai_tro == 0){
                            $_SESSION['user'] = $khachhang;
                            header("location:index.php");
                        }elseif($vai_tro == 1 ){
                            header('location:admin/index.php');
                        }
                        
                    } else {
                        $thongbao =  '<script>swal ( "Rất tiếc", "Tài khoản hoặc mật khẩu đã sai!" ,  "error" );</script>';
                    }
                }
                ?>
                <?php
                if (isset($thongbao)) {
                    echo '<p>' . $thongbao . '</p>';
                }
                ?>


                <?php
                include 'model/taikhoan.php';
                if (isset($_POST['signin'])) {
                    $u = $_POST['username'];
                    $load_acc = lay_all_tk();
                    foreach($load_acc as $val){
                        extract($val);
                        if( $u == $username){
                            $thongbao = '<script>swal ( "Rất tiếc", "User name đã tồn tại!" ,  "error" );</script>' ;
                        }else{
                        $pass = $_POST['password'];
                        $repass = $_POST['repassword'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        
                        $random =rand(10000,99999999) ;
                        $id_tk= $random;
                        $thongbao = "";
                        if ($pass != $repass) {
                            $thongbao .= '<script>swal ( "Rất tiếc", "Mật khẩu không giống nhau!" ,  "error" );</script>';
                        }
                        if ($thongbao != "") {
                        } else {
                            $sql = "INSERT INTO tai_khoan(id_tai_khoan,username,password,email,sdt)value(?,?,?,?,?)";
                            $kq = pdo_execute($sql,$id_tk , $u, $pass, $email, $phone);
                            $thongbao .= '<script>swal ( "Đăng ký thành công!", "Bạn đã nhấp vào nút!", "success");</script>';  
                        }
                        }
                    }
                  
                } ?>
                <?php
                if (isset($thongbao)) {
                    echo '<p>' . $thongbao . '</p>';
                }
                ?>
                <form action="" method="post" class="sign-up-form">
                    <h2 class="title">Đăng ký</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên người dùng" name="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" placeholder="Số điện thoại" name="phone" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" />
                    </div>

                    <input type="submit" name="signin" class="btn" value="Đăng ký" />


                    <p class="social-text">Hoặc đăng ký với các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="<?= $loginUrl ?>" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="<?=$authUrl?>" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bạn là Người Mới ?</h3>
                    <p>
                        Đăng ký để nhận ngay ưu đãi cho 1 số món hàng đắt tiền
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Đăng ký
                    </button>
                </div>
                <img src="view/assets/img/shopping.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Bạn đã có tài khoản ?</h3>
                    <p>
                        đăng nhập và shopping cùng chúng tôi nào
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Đăng nhập
                    </button>
                </div>
                <img src="view/assets/img/empty.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="view/assets/js/app.js"></script>
</body>

</html>