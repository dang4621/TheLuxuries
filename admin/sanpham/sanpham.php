<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Thêm sản phẩm</h2>
					</div>
					<div class="contact-form">
						<b>Danh mục</b><br>
						<!-- form thêm danh mục -->
						<form id="add_sp" action="index.php?act=sp_confirm" method="post" enctype="multipart/form-data">						
							<select name="id_dm" style="width:100px;">
								 <?php                                 
										foreach($danhmuc as $value){
											extract($value);
											echo '<option value="'.$ma_nhom_hang.'">'.$ten_nhom_hang.'</option>';
										}   
									?>
							</select><br>
							<b>Thương hiệu</b><br>
							<select name="id_th" style="width:100px;">
										<option value="">Trống</option>
								 <?php                                 
										foreach($thuong_hieu as $val){
											extract($val);
											echo '<option value="'.$ma_thuong_hieu.'">'.$ten_thuong_hieu.'</option>';
										}   
									?>
							</select>
							<p>
								<input type="text" placeholder="Tên" name="ten_sp" required>
								<input type="number" min="1" max="999999999" placeholder="Giá" name="gia_goc">
								<input type="number" min="1" max="999999999" placeholder="Giảm giá" name="giam_gia">
							</p>
							<p>	<input type="file" name="anhsp[]" multiple="multiple" ></p>				
							<p><textarea name="mota" id="mota" cols="30" rows="10" placeholder="Mô tả" required></textarea></p>							
						</form>
						
						<!-- kết thúc form -->
						<div class="button">
								<!-- nút thêm trỏ tới form add_sp -->
							<p><input form="add_sp" name="submit" type="submit" value="THÊM"></p>
							<a href="index.php?act=add_sp"><input type="button" value="DANH SÁCH"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>