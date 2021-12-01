	<?php
		session_start();
		if(isset($_POST['submit'])){
			$error = array();
			if($_POST['code'] != $_SESSION['code']){
				$error['fail'] = '<p style="color: red;">Mã xác nhận không hợp lệ</p>';
			}else{
				header('location: resetpass.php');
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
	                                <h2 class="sign-up__title">Xác nhận mã code</h2>
									<!-- <p style="color: red;">Mã xác nhận không hợp lệ</p> -->
									<?php if(isset($error['fail'])):?>
										<?= $error['fail'] ?>
									<?php endif ?>
	                                <br>
	                                <br>
	                                <input class="sign-up__inp" name="code" type="text" placeholder="CODE" required="required" />
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