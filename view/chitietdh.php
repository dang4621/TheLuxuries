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
	            <div class="row">
	                    <div class="order-track container-fluid">
	                        <div class="group">
							<?php if(isset($_GET['id'])){ 
								$id=$_GET['id'];
								$nhom_hang=load_chitiet($id);
								 if(is_array($nhom_hang)){
									extract($nhom_hang);
									} 
								?>
	                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 group-left">
	                                    <div class="media22">
	                                        <div class="media-body">
	                                            <h4 class="title">THÔNG TIN KHÁCH HÀNG</h4>
	                                            <div class="khachhang">
	                                                <div class="ttkh">
	                                                    <div class="text-1"> Họ tên:</div>&nbsp;&nbsp;
	                                                    <div class="text-2"> <?=$ho_ten?></div>
	                                                </div>
	                                                <div class="ttkh">
	                                                    <div class="text-1"> Điện thoại:</div>&nbsp;&nbsp;
	                                                    <div class="text-3"> <?=$sdt?></div>
	                                                </div>
	                                                <div class="ttkh">
	                                                    <div class="text-1"> Email:</div>&nbsp;&nbsp;
	                                                    <div class="text-4"> <?php echo $_SESSION['user']['email'];; ?></div>
	                                                </div>
	                                                <div class="ttkh">
	                                                    <div class="text-1"> Địa chỉ:</div>&nbsp;&nbsp;
	                                                    <div class="text-4"> <?=$dia_chi?></div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
									<?php } ?>
	                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 group-left">
	                                    <li class="list-group-item items">
	                                        <div class="media22">
	                                            <h4 class="title">DANH SÁCH SẢN PHẨM</h4>
										<?php 
                                        $donhang=load_sp_dh();
							            foreach($donhang as $value){ 
								         extract($value); 							
							               $idtt= $id_tt;

										  
										   $nhom_hang1=load_sp_theo_dh($so_hoa_don);
										   if(is_array($nhom_hang1)){
											  extract($nhom_hang1);
											  } 

											  $url_hinh="";                                
											  if(isset($image)&&!$image==""){
												  $file = explode(",",substr($image, 0, -1));
											  }else{
												  $url_hinh="không có hình";
											  }; 
									  $imgpath = "upload/" . $file[0];
										 ?>
	                                            <div class="sanpham">
	                                                <div class="media-left">
	                                                    <img class="media-object"
	                                                        src="<?php echo $imgpath; ?>"
	                                                        data-holder-rendered="true">
	                                                </div>
	                                                <div class="media-body">
	                                                    <h4 class="media-heading"><?php echo $ten_san_pham; ?>
	                                                    </h4>
	                                                    <h5>
	                                                        <span class="price">Giá: </span><span class="value"><?php echo $gia_goc; ?>
	                                                            VNĐ</span>
	                                                    </h5>



	                                                    <h5>
	                                                        <span class="size">size </span><span class="value"><?php echo $size; ?></span>
	                                                    </h5>
	                                                    <h5>
	                                                        <span class="quantity">Số lượng: </span><span
	                                                            class="value"><?php echo $so_luong; ?> </span>
	                                                    </h5>
	                                                    <br>
	                                                    <h5>
	                                                        <span class="total"><?php echo $gia_goc; ?> VNĐ</span>
	                                                    </h5>
	                                                </div>
	                                            </div>
	                                            <hr>

                                <?php } ?>


	                                        </div>
	                                    </li>
	                                </div>
	                
	                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 group-right calculate">
	                                <div class="media22">
	                                    <div class="media-body">
											
	                                        <h4 class="title">THANH TOÁN</h4>
	                                        <h4><span class="pleft">Trị giá đơn hàng:</span><span
	                                                class="pright bold"><?php echo $thanh_tien;?> <span>VNĐ</span></span>
	                                        </h4>
	                                        <h4><span class="pleft">Giảm giá:</span><span class="pright bold">-0
	                                                <span>VNĐ</span></span>
	                                        </h4>
	                                        <h4><span class="pleft">Phí giao hàng:</span><span class="pright bold"><?php echo $phi_ship;?>
	                                                <span>VNĐ</span></span>
	                                        </h4>
	                                        <h4><span class="pleft">Phí thanh toán:</span><span class="pright bold">0
	                                                <span>VNĐ</span></span>
	                                        </h4>
	                                        <h4 class="divider"></h4>

	                                        <h4>
	                                            <span class="pleft ">Tổng thanh toán:</span><span
	                                                class="pright bold"><?php echo $thanh_tien + $phi_ship ; ?> <span>VNĐ</span></span>
	                                        </h4>
	                                        <br>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="butn">
	                                <a href="#"><input type="submit" value="Quay lại"></a>
									<a href="index.php?act=sua_tt&ma_hoa_don=<?= $so_hoa_don ?>&tt=4">Hủy đơn hàng</a><br>
           							<a href="index.php?act=sua_tt&ma_hoa_don=<?= $so_hoa_don ?>&tt=3">Đã nhận được hàng</a><br>
	                            </div>

	                        </div>
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