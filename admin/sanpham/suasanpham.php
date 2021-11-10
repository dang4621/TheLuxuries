<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Thêm sản phẩm</h2>
					</div>
					<div class="danhmuc" style="font-size: 15px;margin-bottom: 10px;">
						<b>Danh mục</b><br>
						<select name="id_dm" style="width:100px;">
							< <?php                                 
                                    foreach($danhmuc as $value){
                                        extract($value);
                                        echo '<option value="'.$ma_nhom_hang.'">'.$ten_nhom_hang.'</option>';
                                    }   
                                ?>
						</select>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
							<p>
								<input type="text" placeholder="Tên" name="ten_sp">
								<input type="text" placeholder="Giá" name="gia">
							</p>
							<p>
								<input type="file" name="files[]" multiple ><br>
							</p>
							<p><textarea name="mota" id="mota" cols="30" rows="10" placeholder="Mô tả"></textarea></p>
							<div class="button">
								<p><input type="submit" value="THÊM"></p>
								<a href="index.php?act=add_sp"><input type="button" value="DANH SÁCH"></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>