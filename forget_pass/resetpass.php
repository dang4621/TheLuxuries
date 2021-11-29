<?php
		session_start();
		include '../model/pdo.php';
 		include '../model/taikhoan.php';	
		if(isset($_POST['submit'])){
			$error = array();
			if($_POST['newpass'] != $_POST['repass'] ){
				$error['fail_pass'] = '<p style="color: red;">Mật khẩu không khớp</p>';
			}else{
				$new_password = $_POST['newpass'];
				$email = $_SESSION['mail'];
				reset_pass($new_password , $email);
				header('location: ../login.php');
				// alert sửa thành công
			}
		}
	?>
    <div class="full-height-section error-section">
	    <div class="full-height-tablecell20">
	        <div class="container">
	            <div class="row40">
	                <div class="img20">
	                    <div class="sign-up1">
	                        <form class="sign-up__form"  method="post">
	                            <div class="sign-up__content">
	                                <h2 class="sign-up__title">Thay đổi mật khẩu</h2>
									<!-- <p style="color: red;">Mã xác nhận không hợp lệ</p> -->
									<?php if(isset($error['fail'])):?>
										<?= $error['fail_pass'] ?>
									<?php endif ?>
	                                <br>
	                                <br>
	                                <input class="sign-up__inp" name="newpass" type="text" placeholder="Mật khẩu mới" required="required" />
                                    <input class="sign-up__inp" name="repass" type="text" placeholder="Nhập lại mật khẩu" required="required" />
	                                <div class="test11">
	                                    <a class="forgot__password">Bạn chưa có tài khoản?</a>
	                                    <a href="#"> ĐĂNG KÍ</a>
	                                </div>
	                            </div>
	                            <div class="sign-up__buttons">
									<button class="btn btn--register" type="submit" name="submit">Xác nhận</button>
	                               
	                                <button class="btn btn--signin" type="reset">Trở về trang chủ</button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end error section -->
	<!-- logo carousel -->
	<div class="logo-carousel-section">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="logo-carousel-inner">
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/1.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/2.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/3.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/4.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/5.png" alt="">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end logo carousel -->
	<link rel="stylesheet" href="../view/assets/css/quenmk.css">