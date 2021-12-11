<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Thời Trang Và Thương Hiệu</p>
                    <h1>Sản phẩm bạn đã yêu thích</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row product-lists">
            <?php
            $username=$_SESSION['user']['id_tai_khoan'];
            $sanpham=layTaiKhoan_like($username);
            foreach ($sanpham as $value) {
                extract($value);
                $url_hinh="";                                
                if(isset($hinh)&&!$hinh==""){
                    $file = explode(",",substr($hinh, 0, -1));
                }else{
                    $url_hinh="không có hình";
                }; 
               
            ?>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="index.php?act=chitiet_sp&id=<?= $code ?>"><img src="upload/<?php echo($file[0]); ?>"alt=""></a>
                        </div>
                        <h3><?= $name ?></h3>
                        <p class="product-price"><span><?= $code ?></span> <?= $price ?> </p>
                        <a href="index.php?act=chitiet_sp&id=<?= $code ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Xem chi tiết</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Trước</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Sau</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->

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