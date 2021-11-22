<!-- cart -->
<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12" style="flex: 100%;max-width: 100%;">
					<div class="cart-table-wrap">
						<table class="cart-table" >
							<thead class="cart-table-head" >
								<tr class="table-head-row" style="background-color: #051922;color: #F28123;">
									<th class="product-remove">Mã sản phẩm</th>
									<th class="product-name">Tên san pham</th>
									<th class="product-image">Hình ảnh</th>
									<th class="product-price">Giá</th>
									<th class="product-mota">Mô tả</th>
									<th class="product-status"></th>
								</tr>
							</thead>
							<tbody>
							<?php
							 foreach($sanpham as $value){ 
								extract($value);
								extract($value);
									$url_hinh="";                                
									if(isset($image)&&!$image==""){
										$file = explode(",",substr($image, 0, -1));
									}else{
										$url_hinh="không có hình";
									}; 
									echo(' 
										<tr class="table-body-row">
											<td class="product-remove">'.$ma_san_pham.'</td>
											<td class="product-name">'.$ten_san_pham.'</td>
											<td class="product-image"><img src="../upload/'.$file[0].'" alt=""></td>
											<td class="product-price">'.$gia_goc.'</td>
											<td class="product-mota">'.$mo_ta.'</td>
										<td>
											<a href="index.php?act=edit_sp&id='.$ma_san_pham.'">
												<input type="button" value="Sửa">
											</a>
											<a href="index.php?act=del_sp&id='.$ma_san_pham.'">
												<input type="button" value="Xóa">
											</a>
										</td>
										</tr>
										
										');

							} ?>			
								<!-- <tr class="table-body-row">
									<td class="product-remove">1</td>
									<td class="product-name">Strawberry</td>
									<td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td>
									<td class="product-price">$85</td>
									<td>
									<a href="sanpham.html"><input type="button" value="Sửa"></a>
									<a href=""><input type="button" value="Xóa"></a>
									</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove">2</td>
									<td class="product-name">Strawberry</td>
									<td class="product-image"><img src="assets/img/products/product-img-2.jpg" alt=""></td>
									<td class="product-price">$85</td>
									<td>
										<a href="sanpham.html"><input type="button" value="Sửa"></a>
										<a href=""><input type="button" value="Xóa"></a>
										</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove">3</td>
									<td class="product-name">Strawberry</td>
									<td class="product-image"><img src="assets/img/products/product-img-3.jpg" alt=""></td>
									<td class="product-price">$85</td>
									<td>
									<a href="sanpham.html"><input type="button" value="Sửa"></a>
									<a href=""><input type="button" value="Xóa"></a>
								    </td>
								</tr> -->
							</tbody>
						</table>
						<div class="buttons">
							<a href="index.php?act=add_sp" class="boxed-btn">Nhập thêm</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>