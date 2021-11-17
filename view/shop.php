<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <form action="" method="post">
                        <ul>
                            <li class="active" name="select" value="0">Tất cả</li>
                            <?php             
                      foreach($danhmuc as $value){
                      extract($value);
                      echo('
                      <li name="select" value="'.$ma_nhom_hang.'">'.$ten_nhom_hang.'</li>
                              ');
                          }
                      ?>
                        </ul>
                    </form>
                </div>
                <!-- test -->
            </div>
        </div>
        <div class="row product-lists">
            <?php 
                     foreach($dssp as $value){                         
                        extract($value);
                            $url_hinh="";                                
                            if(isset($image)&&!$image==""){
                                $hinh=$image;
                                $path_hinh="./content/uploads/$hinh";
                                $url_hinh=$path_hinh;
                            }else{
                                $url_hinh="không có hình";
                            }; 
                           $gia_goc = number_format($gia_goc, 0, ",", "."); ?>
            <div class="col-lg-4 col-md-6 text-center strawberry">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
                    </div>
                    <h3><?= $ten_san_pham ?></h3>
                    <p class="product-price"><span><?= $ma_thuong_hieu ?></span> <?= $gia_goc ?> </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</a>
                </div>
            </div>
            <?php }?>
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