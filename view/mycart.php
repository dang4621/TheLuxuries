<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Thời trang chính là nghệ thuật</p>
						<h1>Giỏ hàng của bạn</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-remove"></th>
								<th class="product-image">Ảnh sản phẩm</th>
								<th class="product-name">Tên</th>
								<th class="product-price">Giá</th>
								<th class="product-quantity">Số lượng</th>
								<th class="product-quantity">Size</th>
								<th class="product-total">Màu</th>
								<th class="product-total">Thành tiền</th>
							</tr>
						</thead>

							<tbody>
								<?php 
								 if(!empty($_SESSION["shopping_cart"])){
									$total=0;
									$a=1;
									foreach ($_SESSION["shopping_cart"] as $value) {
										extract($value);
											$url_hinh="";                                
											if(isset($image)&&!$image==""){
												$file = explode(",",substr($image, 0, -1));
											}else{
												$url_hinh="không có hình";
											}; 
									$imgpath = "upload/" . $file[0];
									$hinhp = "<img src='" . $imgpath . "' height='80px'>";

								?>
					<form action="" method="post">			
								<tr class="table-body-row">
									<td class="product-remove"><a href="index.php?act=del-sp&id=<?=$key?>"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><?= 	$hinhp ?></td>
									<td class="product-name"><?= $ten_san_pham ?></td>
									<td class="product-price"><?= $gia ?></td>
									<td class="product-quantity"><input type="number" name="quan[<?php echo $key ;?>]"  value="<?=$quantity?>">	</td>
									<td class="product-size"><?= $size ?></td>
									<td class="product-color"><?= $color ?></td>
									<td class="product-total"><?= $tt[$a]=$gia*$quantity ; ?></td>
                           		</tr>
								<?php $a++; }}?>
							</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Tất cả</th>
								<th>Giá</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Thành tiền sản phẩm: </strong></td>
								<td><?php 
									if(!empty($a)){
											for($j=1;$j<$a;$j++){
											$total+=$tt[$j];
											}
										print_r($total);
										}
									?></td>
							</tr>
							<tr class="total-data">
								<td><strong>Vận chuyển: </strong></td>
								<td>0 vnd</td>
							</tr>
							<tr class="total-data">
								<td><strong>Tất cả: </strong></td>
								<td></td>
							</tr>
						</tbody>
					</table>
           
					<div class="cart-buttons">
						<!-- <input class="boxed-btn" type="submit" name="cartup" value="cập nhập giỏ hàng"> -->
						<a href="index.php?act=checkout" class="boxed-btn black">Tiến hành thanh toán</a>			
						<input class="boxed-btn32" type="submit" name="cartup" value="Cập nhập">
					</div>
					<br>
					<?php require 'view/paybutton.php'; ?>
			</form>
			
					<?php


     if (isset($_POST['cartup'])) {
	      foreach ($_POST['quan'] as $key2 => $val){
		  if($val==0){
			unset($_SESSION['shopping_cart'][$key2]);
		 }else{
			$_SESSION['shopping_cart'][$key2]['quantity']=$val;
		 }
	 }
	  header("Location:index.php?act=cart");
}
?>
				</div>
			</div>
		</div>
	</div>
</div>

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