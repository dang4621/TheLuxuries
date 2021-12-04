<?php ob_start();
     session_start();
     include './model/pdo.php';
     include './model/sanpham.php';   
     include './model/danhmuc.php';    
     include './model/thuonghieu.php';
	 include './model/giohang.php';
	 include './model/taikhoan.php';

		include 'view/header.php';
		$danhmuc=loadAll_dm(); 
		$ba_sp=load3_sp();
	
		if( isset($_GET['act']) ){
			$act=$_GET['act'];        
			switch($act){            
				case 'trangchu':                
					include 'view/home.php';
					break;       
				case 'shop':					
					if(isset($_POST['select'])){      
						$id=$_POST['select'];      
						settype($id,"int");      
					}else{  
						$id=0;   
						}
		
					if(isset($_POST['timkiem'])){        
						$keyw=$_POST['keyw'];         
					}else{           
						$keyw="";
					}				
					$sanpham=load_all_sp($keyw,$id);
					include 'view/shop.php';
					break;
				case 'chitiet_sp':
					if(isset($_GET['id'])){
						$id=$_GET['id'];
					}
					$onesp=loadOne_sp($id);
					include 'view/product_details.php';
				case 'add':
                    if(isset($_SESSION["user"])){
                        if(isset($_POST['add'])){
                            $ma_san_pham=$_POST['id'];
                            $soluong=$_POST['quantity'];
							$gia = $_POST['gia'];
							$size=$_POST['select-1'];
							$color=$_POST['select-2'];

                            $alert=themGH($ma_san_pham,$soluong,$gia,$size,$color); 
                            header("Location: index.php?act=cart");							 
                            }
                        }else{
                        	header("Location: login.php"); 
                       	 break; 
                    }
					break;
				case 'del-sp':    
                    if(isset($_SESSION["user"])){
                        if(isset($_GET['id'])){
                            $ma_san_pham=$_GET['id'];
                            xoaSP($ma_san_pham);                  
                    }
                }
				case 'cart':
					if(isset($_SESSION["user"])){
						include 'view/mycart.php';  
					 }
					 else{
						 header("Location: login.php"); 
					 }  					
					break;
				case 'checkout':
					include 'view/checkout.php';
					break;
				case 'confirm':
					include 'mail/index.php';
					if (isset($_POST['sethang'])) {						 					
						$so_hoa_don =  rand(10000, 99999999);	
						$idtk = $_SESSION['user']['id_tai_khoan'];
						$ngaydathang = date('h:i:sa d/m/y');
						
						if(isset($_POST['payment'])){
							$pt_thanhtoan = $_POST['payment'];
						}else{
							$pt_thanhtoan=1;
						}
						$thanhtien = $_POST['total'];
						$phiship = 5000;
						$trang_thai = 0 ;
						$hoten = $_POST['name'];
						$sdt = $_POST['sdt'];
						$email = $_POST['email'];
						$address = $_POST['address'];
						$loi_nhan = $_POST['bill'];						
						$sql = "INSERT INTO hoa_don(so_hoa_don,id_tai_khoan, ngay_hoa_don,  pt_thanhtoan,   thanh_tien, phi_ship, trang_thai, ho_ten,	sdt,	dia_chi, loi_nhan ) value(?,?,?,?,?,?,?,?,?,?,?)";
						pdo_execute($sql, 			$so_hoa_don, $idtk, 	$ngaydathang,   $pt_thanhtoan , $thanhtien, $phiship, $trang_thai , $hoten, $sdt, $address, $loi_nhan);
						foreach ($_SESSION['shopping_cart'] as $value){
							extract($value);
							$idchitiet =rand(10000,999999) ;
							$matt=getid($ma_san_pham,$size,$color);	
							$soluong=$quantity;
							$price=$gia;												
							$sql="insert into chi_tiet_hoa_don(id_cthd,so_hoa_don,id_tt,gia,so_luong) value(?,?,?,?,?)";
							pdo_execute($sql,$idchitiet,$so_hoa_don,$matt,$price,$soluong);							
						}

						$title = "The luxuries Cart";					
						$content .= '<!DOCTYPE html>
											<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
											
											<head>
												<title></title>
												<meta charset="UTF-8">
												<meta name="viewport" content="width=device-width, initial-scale=1.0">
												<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
												<!--[if !mso]><!-->
												<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
												<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">
												<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
												<!--<![endif]-->
												<style>
													* {
														box-sizing: border-box;
													}
											
													body {
														margin: 0;
														padding: 0;
													}
											
													a[x-apple-data-detectors] {
														color: inherit !important;
														text-decoration: inherit !important;
													}
											
													#MessageViewBody a {
														color: inherit;
														text-decoration: none;
													}
											
													p {
														line-height: inherit
													}
											
													@media (max-width:720px) {
														.row-content {
															width: 100% !important;
														}
											
														.image_block img.big {
															width: auto !important;
														}
											
														.mobile_hide {
															display: none;
														}
											
														.stack .column {
															width: 100%;
															display: block;
														}
											
														.mobile_hide {
															min-height: 0;
															max-height: 0;
															max-width: 0;
															overflow: hidden;
															font-size: 0px;
														}
													}
												</style>
											</head>
											
											<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
												<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;">
													<tbody>
														<tr>
															<td>
																<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td>
																				<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																					<tbody>
																						<tr>
																							<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<div class="spacer_block" style="height:20px;line-height:20px;font-size:1px;">&#8202;</div>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td>
																				<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																					<tbody>
																						<tr>
																							<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																									<tr>
																										<td style="width:100%;padding-right:0px;padding-left:0px;">
																											<div align="center" style="line-height:10px"><img class="big" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/rounded_corner_1.png" style="display: block; height: auto; border: 0; width: 700px; max-width: 100%;" width="700" alt="Alternate text" title="Alternate text"></div>
																										</td>
																									</tr>
																								</table>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td>
																				<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161616; color: #000000; width: 700px;" width="700">
																					<tbody>
																						<tr>
																							<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<div class="spacer_block" style="height:25px;line-height:5px;font-size:1px;">&#8202;</div>
																							</td>
																							<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<div class="spacer_block" style="height:5px;line-height:5px;font-size:1px;">&#8202;</div>
																								<div class="spacer_block mobile_hide" style="height:20px;line-height:20px;font-size:1px;">&#8202;</div>
																								<div class="spacer_block" style="height:5px;line-height:5px;font-size:1px;">&#8202;</div>
																							</td>
																							<td class="column" width="50%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																									<tr>
																										<td style="width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;">
																											<div align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/736410_719522/logo3.png" style="display: block; height: auto; border: 0; width: 175px; max-width: 100%;" width="175" alt="Alternate text" title="Alternate text"></a></div>
																										</td>
																									</tr>
																								</table>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td>
																				<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161616; color: #000000; width: 700px;" width="700">
																					<tbody>
																						<tr>
																							<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																									<tr>
																										<td style="width:100%;padding-right:0px;padding-left:0px;padding-top:40px;">
																											<div align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Cart.gif" style="display: block; height: auto; border: 0; width: 140px; max-width: 100%;" width="140" alt="Im an image" title="Im an image"></a></div>
																										</td>
																									</tr>
																								</table>
																								<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																									<tr>
																										<td>
																											<div >
																												<div style="font-size: 12px; color: #f8f8f8; line-height: 1.2;">
																													<p style="margin: 0; font-size: 16px; text-align: center; letter-spacing: 1px;"><strong><span style="font-size:38px;">The Luxuries 🛒</span></strong></p>
																												</div>
																											</div>
																										</td>
																									</tr>
																								</table>
																								<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																									<tr>
																										<td>
																											<div style="font-family: Tahoma, Verdana, sans-serif">
																												<div style="font-size: 12px;  mso-line-height-alt: 14.399999999999999px; color: #f28123; line-height: 1.2;">
																													<p style="margin: 0; font-size: 16px; text-align: center; letter-spacing: 1px;"><span style="font-size:20px;"><em><strong>Thank for you choice</strong></em></span></p>
																												</div>
																											</div>
																										</td>
																									</tr>
																								</table>
																								<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																									<tr>
																										<td style="padding-bottom:10px;padding-left:60px;padding-right:60px;padding-top:30px;">
																											<div style="font-family: sans-serif">
																												<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #d5d4d4; line-height: 1.8; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																													<p style="margin: 0; text-align: center;">218, Phường 14, Quận Gò Vấp, Thành Phố Hồ Chí Minh</p>
																													<p style="margin: 0; text-align: center;">Poly@fpt.edu.vn</p>
																													<p style="margin: 0; text-align: center;">00 11 22 33 44</p>
																												</div>
																											</div>
																										</td>
																									</tr>
																								</table>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td>
																				<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																					<tbody>
																						<tr>
																							<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																								<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																									<tr>
																										<td style="padding-bottom:30px;padding-left:10px;padding-right:10px;padding-top:55px;">
																											<div style="font-family: Tahoma, Verdana, sans-serif">
																												<div style="font-size: 12px;  mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
																													<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:24px;"><strong><span style>Your Cart</span></strong></span></p>
																												</div>
																											</div>
																										</td>
																									</tr>
																								</table>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">';

					
						foreach ($_SESSION['shopping_cart'] as $value) {
							extract($value);
							$content .= '							
									<tbody>
									<tr>
										<td>
											<table class="row-content" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
												<tbody>
													<tr>
														<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
															<table class="empty_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																<tr>
																	<td style="padding-right:0px;padding-bottom:5px;padding-left:0px;padding-top:5px;">
																		<div></div>
																	</td>
																</tr>
															</table>
														</td>
														<td class="column" width="50%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
															<div class="spacer_block" style="height:5px;line-height:5px;font-size:1px;">&#8202;</div>
															<div class="spacer_block mobile_hide" style="height:30px;line-height:30px;font-size:1px;">&#8202;</div>
															<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																<tr>
																	<td style="padding-bottom:10px;padding-left:25px;padding-right:10px;padding-top:10px;">
																		<div style="font-family: sans-serif">
																			<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																				<p style="margin: 0; font-size: 14px;"><span style="font-size:16px;"><strong>'.$ten_san_pham.'</strong></span></p>
																			</div>
																		</div>
																	</td>
																</tr>
															</table>
															<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																<tr>
																	<td style="padding-bottom:10px;padding-left:25px;padding-right:10px;">
																		<div style="font-family: sans-serif">
																			<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																				<p style="margin: 0; font-size: 14px;">Color:&nbsp; &nbsp;'.$color.'</p>
																			</div>
																		</div>
																	</td>
																</tr>
															</table>
															<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																<tr>
																	<td style="padding-bottom:10px;padding-left:25px;padding-right:10px;">
																		<div style="font-family: sans-serif">
																			<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																				<p style="margin: 0; font-size: 14px;">Size:&nbsp; &nbsp; &nbsp;'.$size.'</p>
																			</div>
																		</div>
																	</td>
																</tr>
															</table>
															<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																<tr>
																	<td style="padding-bottom:15px;padding-left:25px;padding-right:10px;">
																		<div style="font-family: sans-serif">
																			<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																				<p style="margin: 0; font-size: 14px;">Qty:&nbsp; &nbsp; &nbsp; '.$quantity.'</p>
																			</div>
																		</div>
																	</td>
																</tr>
															</table>
														</td>
														<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
															<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																<tr>
																	<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:50px;">
																		<div style="font-family: sans-serif">
																			<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																				<p style="margin: 0; font-size: 14px;">'.$gia.'$</p>
																			</div>
																		</div>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							<!-- end   -->												
									';		
								}
							
									$content .= '	</table>
														<table class="row row-7" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="divider_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;">
																									<div align="center">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #161616;"><span>&#8202;</span></td>
																											</tr>
																										</table>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-8" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<div class="spacer_block" style="height:45px;line-height:45px;font-size:1px;">&#8202;</div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-9" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e6e6e6; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:50px;">
																									<div style="font-family: Tahoma, Verdana, sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #161616; line-height: 1.2;">
																											<p style="margin: 0; font-size: 16px; text-align: center;"><em><span style="font-size:15px;">Chúng tôi cũng tập trung vào việc xây dựng một đội ngũ và văn hóa đa dạng, hòa nhập, một trong đó mọi tiếng nói đều được hoan nghênh và lắng nghe. Văn hóa thân thuộc này phản ánh sự đa dạng của các vận động viên mà chúng tôi tôn vinh, những người yêu thích sản phẩm của chúng tôi và cộng đồng mà chúng tôi phục vụ.</span></em></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																						<table class="divider_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:70px;padding-left:10px;padding-right:10px;padding-top:30px;">
																									<div align="center">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #161616;"><span>&#8202;</span></td>
																											</tr>
																										</table>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-10" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161616; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<div class="spacer_block" style="height:40px;line-height:40px;font-size:1px;">&#8202;</div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-11" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161616; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:10px;width:100%;padding-right:0px;padding-left:0px;padding-top:5px;">
																									<div align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Email_Preferences.png" style="display: block; height: auto; border: 0; width: 44px; max-width: 100%;" width="44" alt="Im an image" title="Im an image"></a></div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																											<p style="margin: 0; font-size: 14px; text-align: center;"><strong><a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">Email preferences</a></strong></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																					<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:10px;width:100%;padding-right:0px;padding-left:0px;padding-top:5px;">
																									<div align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Free_Delivery.png" style="display: block; height: auto; border: 0; width: 47px; max-width: 100%;" width="47" alt="Im an image" title="Im an image"></a></div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																											<p style="margin: 0; font-size: 14px; text-align: center;"><strong><a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">Free delivery</a></strong></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																					<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:10px;width:100%;padding-right:0px;padding-left:0px;padding-top:5px;">
																									<div align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/iphone-x.png" style="display: block; height: auto; border: 0; width: 28px; max-width: 100%;" width="28" alt="Im an image" title="Im an image"></a></div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																											<p style="margin: 0; font-size: 14px; text-align: center;"><strong><a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">Get the app</a></strong></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																					<td class="column" width="25%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:10px;width:100%;padding-right:0px;padding-left:0px;padding-top:5px;">
																									<div align="center" style="line-height:10px"><a href="#" target="_blank" style="outline:none" tabindex="-1"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/discount.png" style="display: block; height: auto; border: 0; width: 47px; max-width: 100%;" width="47" alt="Im an image" title="Im an image"></a></div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																											<p style="margin: 0; font-size: 14px; text-align: center;"><strong><span style="color:#ffffff;"><a style="text-decoration:none;color:#ffffff;" href="#" target="_blank" rel="noopener">Outlet</a></span></strong></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-12" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161616; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-top:20px;">
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																											<p style="margin: 0; font-size: 16px; text-align: center;"><strong><span style="font-size:38px;">EXTRA 10% OFF</span></strong></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td style="padding-bottom:30px;padding-left:60px;padding-right:60px;padding-top:10px;">
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #d5d4d4; line-height: 1.8; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
																											<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 28.8px;"><span style="font-size:16px;">For Students</span></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-13" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161616; background-position: top center; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="divider_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:20px;padding-left:25px;padding-right:25px;padding-top:10px;">
																									<div align="center">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px dotted #F9F9F9F9;"><span>&#8202;</span></td>
																											</tr>
																										</table>
																									</div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td>
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2;">
																											<p style="margin: 0; font-size: 12px; text-align: center;"><span style="font-size:18px;">Follow us</span></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																						<table class="social_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="text-align:center;padding-right:0px;padding-left:0px;">
																									<table class="social-table" width="168px" border="0" cellpadding="0" cellspacing="0" role="presentation" align="center" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																										<tr>
																											<td style="padding:0 5px 0 5px;"><a href="#" target="_blank"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Instagram.png" width="32" height="32" alt="Custom" title="Custom" style="display: block; height: auto; border: 0;"></a></td>
																											<td style="padding:0 5px 0 5px;"><a href="#" target="_blank"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Facebook.png" width="32" height="32" alt="Custom" title="Custom" style="display: block; height: auto; border: 0;"></a></td>
																											<td style="padding:0 5px 0 5px;"><a href="#" target="_blank"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Twitter.png" width="32" height="32" alt="Custom" title="Custom" style="display: block; height: auto; border: 0;"></a></td>
																											<td style="padding:0 5px 0 5px;"><a href="#" target="_blank"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Pinterest.png" width="32" height="32" alt="Custom" title="Custom" style="display: block; height: auto; border: 0;"></a></td>
																										</tr>
																									</table>
																								</td>
																							</tr>
																						</table>
																						<table class="divider_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;">
																									<div align="center">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="65%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px dotted #FFFFFF;"><span>&#8202;</span></td>
																											</tr>
																										</table>
																									</div>
																								</td>
																							</tr>
																						</table>
																						<table class="text_block" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																							<tr>
																								<td>
																									<div style="font-family: sans-serif">
																										<div style="font-size: 12px; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2;">
																											<p style="margin: 0; font-size: 12px; text-align: center;"><a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">Magane Preferences</a> | <a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">Help &amp; Contact</a>t | <a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">Privacy Notice</a> | <a style="text-decoration: none; color: #ffffff;" href="#" target="_blank" rel="noopener">View Online</a></p>
																										</div>
																									</div>
																								</td>
																							</tr>
																						</table>
																						<table class="divider_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;">
																									<div align="center">
																										<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="65%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																											<tr>
																												<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px dotted #FFFFFF;"><span>&#8202;</span></td>
																											</tr>
																										</table>
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-14" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="width:100%;padding-right:0px;padding-left:0px;">
																									<div align="center" style="line-height:10px"><img class="big" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/1336/Bottom_round.png" style="display: block; height: auto; border: 0; width: 700px; max-width: 100%;" width="700" alt="Alternate text" title="Alternate text"></div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
														<table class="row row-15" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
															<tbody>
																<tr>
																	<td>
																		<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;" width="700">
																			<tbody>
																				<tr>
																					<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																						<div class="spacer_block" style="height:20px;line-height:20px;font-size:1px;">&#8202;</div>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</body>
									
									</html>';
							$_SESSION['user']['email']=$email;
							mail::sendMail($title,$content,$email);
							unset($_SESSION["shopping_cart"]);
						header("Location:index.php");
					}              
					 break;
				case 'logout':
					unset($_SESSION['user']);
					header("Location: index.php");  
					break;			
					 
				case 'cartdetails':						                
					include 'view/trangthaidh.php';
					break;

				case 'cartde':						                
					include 'view/chitietdh.php';
					break;	
				case 'sua_tt':
					if(isset($_GET['ma_hoa_don'])){
                        if(isset($_GET['tt'])){
                            $trangthai=$_GET['tt'];
                            $so_hoa_don=$_GET['ma_hoa_don'];
                            sua_tt($trangthai,$so_hoa_don);
                        }else if(isset($_GET['huy'])){
                            $so_hoa_don=$_GET['ma_hoa_don'];
                            $ma_kh=$_GET['huy'];
                            xoa_dh($so_hoa_don,$ma_kh);                            
                        }                     
						include 'view/trangthaidh.php';                 

                    }
					break;
			    case 'trangthaidh' :
					include 'view/trangthaidh.php';
					break;
				case 'chitietdh' :
					include 'view/chitietdh.php';
					break;
				//include các file trên header
				case 'about':                
					include 'view/about.php';
					break;
				case 'contact':                
					include 'view/contact.php';
					break;  
					
				case 'noti' :
					include 'view/404.php';  
					break;
				case 'done' :
					include 'view/done.php';  
					break;
					
					case 'like':                
						$id=$_GET['id'];
						$iduser=$_SESSION['user']['id_tai_khoan'];
							
						$sql="SELECT count(yeu_thich.ma_san_pham) as countsp FROM yeu_thich WHERE id_tai_khoan='$iduser' and ma_san_pham='$id'";
						$yeuthich= pdo_query($sql);
						$idchitiet =rand(10000,999999) ;
						foreach ($yeuthich as $like){
						  extract($like);
						  $number= $countsp;
					   if($number==0){
						   $sql="insert into yeu_thich(id_yt,ma_san_pham,id_tai_khoan,trang_thai) values('$idchitiet','$id','$iduser','1')";
							pdo_execute($sql);
						}elseif($number>0){
							$sql="delete from yeu_thich where ma_san_pham='$id' and id_tai_khoan='$iduser' ";
							pdo_execute($sql);
						}
					}
					if(isset($_GET['id'])){
						$id=$_GET['id'];
					}
					$onesp=loadOne_sp($id);
					include 'view/product_details.php';
					
						break; 

				case 'quenmk' :
					    include 'view/quenmk.php';
						break;		

				
				//Chuyển hướng khi action sai
				default :  
					include 'view/home.php';         
					break;
				}
					
			}else{
				include 'view/home.php';
			}            
	  
			
		include 'view/footer.php';
	 


 

?>




<link rel="shortcut icon" type="image/png" href="view/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="view/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="view/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="view/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="view/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="view/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="view/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="view/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="view/assets/css/responsive.css">
	<link rel="stylesheet" href="view/assets/css/css3.css">
	<link rel="stylesheet" href="view/assets/css/css2.css">
	<link rel="stylesheet" href="view/assets/css/quenmk.css">
	<link rel="stylesheet" href="view/assets/css/trangthaidh.css">
	<link rel="stylesheet" href="view/assets/css/chitietdh.css">

    <script src="view/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="view/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="view/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="view/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="view/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="view/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="view/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="view/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="view/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="view/assets/js/main.js"></script>
	<!-- sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>









