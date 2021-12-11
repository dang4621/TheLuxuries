<!-- breadcrumb-section -->
<style>
.user {
    font-weight: bold;
    color: black;
}

.time {
    color: gray;
}

.userComment {
    color: #000;
    margin-right: 20px;
}

.replies .comment {
    margin-top: 20px;

}

.replies {
    margin-left: 20px;
}

#registerModal input,
#logInModal input {
    margin-top: 10px;
}
</style>
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
                       unset($_SESSION['mgg']);
						if (is_array($onesp)) {
							extract($onesp);
                            tangSoLanXem($ma_san_pham);
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
                        <p class="single-product-pricing"><span></span> <?= $gia_goc ?>$</p>
                        <p><?= $mo_ta ?></p>
                        <!--test-->
                        <div class="dinh">
                            <div class="size">
                                <h1>Size:</h1>
                                <div class="test">
                                    <?php
                                        $a=0;
                                        $sql = "SELECT DISTINCT thuoc_tinh.size FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham= '$ma_sp'";
                                        $getSize = pdo_query($sql);
                                        foreach ($getSize as $loai) {
                                            extract($loai);
                                            $a++   ?>                                      
                                        <div class="a">
                                            <input type="radio" id="size-<?=$a?>" name="select-1" value="<?=$size?>" required   >
                                            <label for="size-<?=$a?>">
                                                <h2><?= $size ?></h2>
                                            </label>
                                        </div>    
                                    
                                    <?php } ?>                                  
                                </div>
                            </div>
                            <div class="mau">
                                <h1>Màu:</h1>
                                <section>
                                    <?php
									$i = 0;
									$sql1 = "SELECT DISTINCT thuoc_tinh.color FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham= '$ma_sp'";
									$getColor = pdo_query($sql1);
									foreach ($getColor as $loai) {
										extract($loai);
										$i++;
									?>
                                        <div>
                                            <input type="radio" id="control_0<?= $i ?>" name="select-2" value="<?= $color ?>" required>
                                            <label for="control_0<?= $i ?>">
                                                <h2><?= $color ?></h2>
                                            </label>
                                        </div>
                                    <?php } ?>   
                                </section>
                            </div>
                        </div>
                        <!--end test-->
                        <!--<div class="them">
                            <div class="size">
                                <h2>Size:</h2>
                             
                                 <?php
									$sql = "SELECT DISTINCT thuoc_tinh.size FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham= '$ma_sp'";
									$getSize = pdo_query($sql);
									foreach ($getSize as $loai) {
										extract($loai);                                        
										echo '	<input name="size" required value="' . $size . '"; type="radio" id="html" value="' . $size . '">
					  							<label for="html">' . $size . '</label>';
									?>
                                <?php } ?>
                            </div>
                            <div class="mau">
                                <h2>Màu</h2>
                                <?php
									$i = 0;
									$sql1 = "SELECT DISTINCT thuoc_tinh.color FROM thuoc_tinh WHERE thuoc_tinh.ma_san_pham= '$ma_sp'";
									$getColor = pdo_query($sql1);
									foreach ($getColor as $loai) {
										extract($loai);
										$i++;
                                        print_r($color);
									?>
                                <!--<input type="radio" class="radio" id="radio-<?= $i ?>" name="color"
                                    value="<?= $color ?>" required />
                                <label for="radio-<?= $i ?>" style="background: <?= $color ?>;"></label>
                                <?php } ?>
                            </div>
                        </div>-->
                        <br>
                        <div class="single-product-form">
                            <!-- form 3 lấy số lượng , mã sản phẩm-->

                            <input type="number" name="quantity" value="1" min="1">
                            <input type="hidden" name="gia" value="<?= $gia_goc - $giam_gia ?>">
                            <input type="hidden" name="id" value="<?= $ma_san_pham ?>">
                            <input type="submit" name="add" value="Thêm vào giỏ">
                    </form>



                    <p><strong>Sản phẩm thuộc thương hiệu: </strong><?= $ten_thuong_hieu ?></p>
                </div>
                    
                     <?php 
 						$id=$_GET['id'];
                         $iduser=$_SESSION['user']['id_tai_khoan'];
                             
                         $sql="SELECT count(yeu_thich.ma_san_pham) as countsp FROM yeu_thich WHERE id_tai_khoan='$iduser' and ma_san_pham='$id'";
                         $yeuthich= pdo_query($sql);
                         $idchitiet =rand(10000,999999) ;
                         foreach ($yeuthich as $like){
                           extract($like);
                           $number= $countsp;
                        if($number==0){ ?>
                        <a href="index.php?act=like&id=<?=$id?>"><i class="fas fa-heart" style="font-size:50px;color:black"></i></a>

                      <?php   }elseif($number>0){ ?>
                        <a href="index.php?act=like&id=<?=$id?>"><i class="fas fa-heart" style="font-size:50px;color:red"></i></a>
                         <?php }
                     }
                ?>
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
						<p class="product-price"> ' . $gia_goc . '$ </p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#binhluan").load("view/binhluan/binhluanform.php", {
        ma_san_pham: <?=$ma_san_pham?>
    });
});
</script>
<div class="cmt" id="binhluan">

</div>
<!--end binh luận-->
<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="view/assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="view/assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="view/assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="view/assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="view/assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->