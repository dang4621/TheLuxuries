	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12" style="flex: 100%;max-width: 100%;">
					<div class="cart-table-wrap">
						<table class="cart-table">

							<thead class="cart-table-head">
								<tr class="table-head-row" style="background-color: #051922;color: #F28123;">
									<th class="product-remove">Mã loại</th>
									<th class="product-name">Tên loại</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
							<?php foreach($danhmuc as $value){ 
								extract($value);
									echo(' 
										<tr class="table-body-row">
											<td class="product-remove">'.$ma_nhom_hang.'</td>
											<td class="product-name">'.$ten_nhom_hang.'</td>
										<td>
											<a href="index.php?act=edit_dm&id='.$ma_nhom_hang.'">
												<input type="button" value="Sửa">
											</a>
											<a href="index.php?act=del_dm&id='.$ma_nhom_hang.'">
												<input type="button" value="Xóa">
											</a>
										</td>
										</tr>
										
										');

							} ?>								
							
							</tbody>
						</table>
						<div class="buttons">
							<a href="index.php?act=add_dm" class="boxed-btn">Nhập thêm</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>