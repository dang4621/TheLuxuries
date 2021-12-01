	<!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<p>Fresh adn Organic</p>
							<h1>404 - Không tìm thấy</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
		<!-- error section -->
		<div class="full-height-section error-section">
			<div class="full-height-tablecell">
				<div class="container">
					<div class="row21">
                    <div class="tracuu">
                        <h2>
                            <span2> &nbsp;&nbsp;&nbsp;Thông Tin Giỏ Hàng&nbsp;&nbsp;&nbsp; </span2>
                        </h2>
                        <table>
                            <tr>
                                <th>MÃ HOÁ ĐƠN</th>
                                <th>HỌ TÊN</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>NGÀY ĐẶT</th>
                                <th>TRẠNG THÁI</th>
                                <th>TỔNG TIỀN</th>
                            </tr>
							<?php 
                             $donhang=load_dh();
							foreach($donhang as $value){ 
								    extract($value); ?>
                            <tr>
                                <td><?php echo $so_hoa_don; ?></td>
                                <td><?php echo $ho_ten; ?></td>
                                <td><?php echo $sdt; ?></td>
                                <td><?php echo $ngay_hoa_don; ?></td>
                                <td>
                                    <?php 
									if($trang_thai==1){
										echo'<span1 style="background-color: #D3E4CD;">Đang chuẩn bị hàng</span1>';
									}elseif($trang_thai==0){
                                         echo'<span1 style="background-color: #F3950D;">Đang xác nhận</span1>';
									} 
									elseif($trang_thai==2){
										echo'<span1 style="background-color: #FF87CA;">Đang giao</span1>';
								   } 
								   elseif($trang_thai==3){
									echo'<span1 style="background-color: #71DFE7;">Đã giao</span1>';
							   		} 
									    elseif($trang_thai==4){
									echo'<span1 style="background-color: #71DFE7;">Đã hủy</span1>';
							   		} 
									?>
                                </td>
                                <td><?php echo $thanh_tien; ?><span>&nbsp;USĐ</span></td>
                                <td><a href="index.php?act=cartde&id=<?php echo $so_hoa_don; ?>">Chi tiết</a></td>
                            </tr>
							<?php }?>
                        </table>
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