<!-- breadcrumb-section -->
<style>
    .binhluan table th {
    color: black;
}
.binhluan table{
    background-color: white;
    padding: 10px;
}
.binhluan table td:nth-child(1){
    width: 20%;
}
.binhluan table td:nth-child(2){
    width: 50%;
}
.binhluan table td:nth-child(3){
    width: 10%;
}
.binhluan table td:nth-child(4){
    width: 20%;
}

</style>
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Xem thêm chi tiết</p>
                    <h1>Single Product</h1>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<?php
// $abc = test();
// echo("<pre>");
// print_r($abc);
?>
<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <!--<img src="assets/img/products/product-img-5.jpg"> -->
                    <div class="slideshow-container">
                        <?php
						if (is_array($onesp)) {
							extract($onesp);
							$file = explode(",", substr($image, 0));
						}
						foreach ($file as $id => $value) {
							$hinh = $value;
							echo ('
								<div class="mySlides1">
									<img src="upload/' . $value . '" style="width:100%">
								</div>
								');
						} ?>
                        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                    </div>
                    <script>
                    var slideIndex = [1, 1];
                    var slideId = ["mySlides1", "mySlides2"]
                    showSlides(1, 0);
                    showSlides(1, 1);

                    function plusSlides(n, no) {
                        showSlides(slideIndex[no] += n, no);
                    }

                    function showSlides(n, no) {
                        var i;
                        var x = document.getElementsByClassName(slideId[no]);
                        if (n > x.length) {
                            slideIndex[no] = 1
                        }
                        if (n < 1) {
                            slideIndex[no] = x.length
                        }
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        x[slideIndex[no] - 1].style.display = "block";
                    }
                    </script>
                </div>
            </div>


            <?php
			if (is_array($onesp)) {
				extract($onesp);
				$ma_nh = $ma_nhom_hang;
				$ma_sp = $ma_san_pham;
			?>
            <div class="col-md-7">
                <div class="single-product-content">

                    <form action="index.php?act=add" method="POST">

                        <h3><?= $ten_san_pham ?></h3>
                        <p class="single-product-pricing"><span>Per Products</span> <?= $gia_goc ?></p>
                        <p><?= $mo_ta ?></p>
                        <div class="them">
                            <div class="size">
                                <h2>Size:</h2>
                                <!-- form 1 lấy size -->


                                <?php
									$sql = "SELECT DISTINCT thuoc_tinh.size FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham= '$ma_sp'";
									$getSize = pdo_query($sql);
									foreach ($getSize as $loai) {
										extract($loai);
                                        
										echo '	<input name="size" value="' . $size . '"; type="radio" id="html" value="' . $size . '">
					  							<label for="html">' . $size . '</label>';
									?>
                                <?php } ?>

                            </div>
                            <div class="mau">
                                <h2>Màu</h2>
                                <!-- form 1 lấy màu -->

                                <?php
									$i = 0;
									$sql1 = "SELECT DISTINCT thuoc_tinh.color FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham= '$ma_sp'";
									$getColor = pdo_query($sql1);
									foreach ($getColor as $loai) {
										extract($loai);
										$i++;
                                        print_r($color);
									?>
                                <input type="radio" class="radio" id="radio-<?= $i ?>" name="color"
                                    value="<?= $color ?>" />
                                <label for="radio-<?= $i ?>" style="background: <?= $color ?>;"></label>
                                <?php } ?>



                            </div>
                        </div>

                        <div class="single-product-form">
                            <!-- form 3 lấy số lượng , mã sản phẩm-->

                            <input type="number" name="quantity" value="1">
                            <input type="hidden" name="gia" value="<?= $gia_goc - $giam_gia ?>">
                            <input type="hidden" name="id" value="<?= $ma_san_pham ?>">
                            <input type="submit" name="add" value="Thêm vào giỏ">
                    </form>



                    <p><strong>Sản phẩm thuộc thương hiệu: </strong><?= $ten_thuong_hieu ?></p>
                </div>
                <h4>Share:</h4>
                <ul class="product-share">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
<!-- end single product -->
<!-- more products -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Những sản phẩm<span class="orange-text"> tương tự</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
			$sql = "SELECT*FROM san_pham WHERE ma_nhom_hang=$ma_nh LIMIT 3";
			$cungloai = pdo_query($sql);

			foreach ($cungloai as $loai) {
				extract($loai);
				$file = explode(",", substr($image, 0, -1));
				echo '<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="./upload/' . $file[0] . '" style="height:200px" ></a>
						</div>
						<h3>' . $ten_san_pham . '</h3>
						<p class="product-price"> ' . $gia_goc . ' VND </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</a>
					</div>
				</div>';
			}
			?>
        </div>
    </div>
</div>
<!-- end more products -->
<!-- binh luan -->
<div class="cmt" style="width:100%;">
        <h3 style="text-align:center;">Bình luận</h3>
        <div class="binhluan">
            <table>
            <tr>
                <th>Tên</th>
                <th>Nội dung</th>
                <th>Mã Sản phẩm</th>
                <th>Ngày bình luận</th>
             </tr>
             <tr>
                <td>Truyen</td>
                <td>Văn bản là một loại hình phương tiện để ghi nhận, lưu giữ và truyền đạt các thông tin</td>
                <td>10</td>
                <td>18-11-2021</td>
             </tr>
             <tr>
                <td>Truyen</td>
                <td>Văn bản là một loại hình phương tiện để ghi nhận, lưu giữ và truyền đạt các thông tin</td>
                <td>10</td>
                <td>18-11-2021</td>
             </tr>
             </table>
        </div>
        <br>
        <div class="binhluanform">
            <form action="" method="post" style="text-align:center;">
                <input type="hidden" name="idpro" value="">
                <input type="text" name="noidung" style="text-align:center;width:500px;height:50px">
                <input type="submit" id="sm" name="guibinhluan" value="Gửi bình luận" >
            </form>
        </div>  
    </div>
<!-- end binh luan -->
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