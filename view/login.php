<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/login.css" />
    <title>Đăng nhập & Đăng ký</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                
                <form action="xulylogin.php" method="post" class="sign-in-form">

                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên người dùng" name="username" />

                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="password" />
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn solid" />
                    <p class="social-text">Hoặc đăng nhập bằng các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>



                <form action="dangky.php" method="post" class="sign-up-form">
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
                        <input type="text" placeholder="Số điện thoại" name="phone" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" />
                    </div>

                    <input type="submit" class="btn" value="Đăng ký" />


                    <p class="social-text">Hoặc đăng ký với các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
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
                <img src="assets/img/shopping.svg" class="image" alt="" />
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
                <img src="assets/img/empty.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
</body>

</html>