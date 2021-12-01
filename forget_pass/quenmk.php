<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><?php  
		session_start();
		include '../model/pdo.php';
 		include '../model/taikhoan.php';		
		include '../mail/index.php';
		
		if(isset($_POST['submit'])){
			$error = array();
			$email = $_POST['email'];
			if($email == ''){
				$error['email']="không được để trống";
			}
			if(empty($error)){
				$result = get_email($email);
				if(!empty($result)){
					$code = substr(rand(0,999999),0,6);
				$title = "The luxuries Forget Password";
				$content = '<head>
							<title></title>
							<meta charset="UTF-8">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
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
						
								@media (max-width:700px) {
						
									.fullMobileWidth,
									.row-content {
										width: 100% !important;
									}
						
									.image_block img.big {
										width: auto !important;
									}
						
									.menu-checkbox[type=checkbox]~.menu-links {
										display: none !important;
										padding: 5px 0;
									}
						
									.menu-checkbox[type=checkbox]:checked~.menu-trigger .menu-open {
										display: none !important;
									}
						
									.menu-checkbox[type=checkbox]:checked~.menu-links,
									.menu-checkbox[type=checkbox]~.menu-trigger {
										display: block !important;
										max-width: none !important;
										max-height: none !important;
										font-size: inherit !important;
									}
						
									.menu-checkbox[type=checkbox]~.menu-links>a,
									.menu-checkbox[type=checkbox]~.menu-links>span.label {
										display: block !important;
										text-align: center;
									}
						
									.menu-checkbox[type=checkbox]:checked~.menu-trigger .menu-close {
										display: block !important;
									}
						
									.stack .column {
										width: 100%;
										display: block;
									}
								}
							</style>
						</head>
						
						<body style="background-color: #d2e7f5; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
							<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d2e7f5;">
								<tbody>
									<tr>
										<td>
											<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
												<tbody>
													<tr>
														<td>
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:30px;line-height:30px;font-size:1px;">&#8202;</div>
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
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:10px;line-height:10px;font-size:1px;">&#8202;</div>
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
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<table class="image_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="width:100%;padding-right:0px;padding-left:0px;padding-bottom:5px;">
																						<div align="center" style="line-height:10px"><img class="fullMobileWidth big" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/3996/Forgot_Password.gif" style="display: block; height: auto; border: 0; width: 612px; max-width: 100%;" width="612" alt="bear looking at password" title="bear looking at password"></div>
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
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																		<td class="column" width="66.66666666666667%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="text-align:center;width:100%;padding-top:5px;">
																						<h1 style="margin: 0; color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 40px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">CODE : '.$code.'</h1>
																					</td>
																				</tr>
																			</table>
																			<table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="padding-bottom:45px;text-align:center;width:100%;">
																						<h1 style="margin: 0; color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 40px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"></h1>
																					</td>
																				</tr>
																			</table>
																		</td>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;">&#8202;</div>
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
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-bottom: 0px solid #D2E7F5; border-left: 0px solid #D2E7F5; border-right: 0px solid #D2E7F5; border-top: 0px solid #D2E7F5;">
																			<div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																		<td class="column" width="33.333333333333336%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; background-color: #ffffff; border-bottom: 6px solid #D2E7F5; border-left: 6px solid #D2E7F5; border-right: 6px solid #D2E7F5; border-top: 6px solid #D2E7F5;">
																			<table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="text-align:center;width:100%;padding-top:25px;">
																						<h1 style="margin: 0; color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 26px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Call</strong></h1>
																					</td>
																				</tr>
																			</table>
																			<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																				<tr>
																					<td style="padding-bottom:35px;padding-left:20px;padding-right:10px;padding-top:10px;">
																						<div style="font-family: sans-serif">
																							<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #03191e; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																								<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 25.2px;"><span style="font-size:14px;">0813996786</span></p>
																							</div>
																						</div>
																					</td>
																				</tr>
																			</table>
																		</td>
																		<td class="column" width="33.333333333333336%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; background-color: #ffffff; border-bottom: 6px solid #D2E7F5; border-left: 6px solid #D2E7F5; border-right: 6px solid #D2E7F5; border-top: 6px solid #D2E7F5;">
																			<table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="text-align:center;width:100%;padding-top:25px;">
																						<h1 style="margin: 0; color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 26px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Reply</strong></h1>
																					</td>
																				</tr>
																			</table>
																			<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																				<tr>
																					<td style="padding-bottom:35px;padding-left:20px;padding-right:10px;padding-top:10px;">
																						<div style="font-family: sans-serif">
																							<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #03191e; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																								<p style="margin: 0; font-size: 14px; text-align: center;"><a href="mailto:Support@company.com" target="_blank" title="Support@company.com" style="text-decoration: none; color: #03191e;" rel="noopener"><span style="font-size:14px;">pvcpvc099@gmail.com</span></a></p>
																							</div>
																						</div>
																					</td>
																				</tr>
																			</table>
																		</td>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
												<tbody>
													<tr>
														<td>
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:35px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																		<td class="column" width="66.66666666666667%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<table class="heading_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="text-align:center;width:100%;padding-top:30px;">
																						<h1 style="margin: 0; color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 20px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Follow us</strong></h1>
																					</td>
																				</tr>
																			</table>
																			<table class="text_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
																				<tr>
																					<td style="padding-bottom:10px;padding-left:20px;padding-right:10px;padding-top:10px;">
																						<div style="font-family: sans-serif">
																							<div style="font-size: 12px; mso-line-height-alt: 21.6px; color: #848484; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
																								<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 25.2px;"><span style="font-size:14px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</span></p>
																							</div>
																						</div>
																					</td>
																				</tr>
																			</table>
																			<table class="social_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;text-align:center;">
																						<table class="social-table" width="144px" border="0" cellpadding="0" cellspacing="0" role="presentation" align="center" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="padding:0 2px 0 2px;"><a href="https://www.facebook.com/" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/facebook@2x.png" width="32" height="32" alt="Facebook" title="facebook" style="display: block; height: auto; border: 0;"></a></td>
																								<td style="padding:0 2px 0 2px;"><a href="https://www.twitter.com/" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/twitter@2x.png" width="32" height="32" alt="Twitter" title="twitter" style="display: block; height: auto; border: 0;"></a></td>
																								<td style="padding:0 2px 0 2px;"><a href="https://www.linkedin.com/" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/linkedin@2x.png" width="32" height="32" alt="Linkedin" title="linkedin" style="display: block; height: auto; border: 0;"></a></td>
																								<td style="padding:0 2px 0 2px;"><a href="https://www.instagram.com/" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-only-logo-dark-gray/instagram@2x.png" width="32" height="32" alt="Instagram" title="instagram" style="display: block; height: auto; border: 0;"></a></td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</table>
																			<table class="menu_block" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																				<tr>
																					<td style="color:#101010;font-family:inherit;font-size:14px;text-align:center;padding-bottom:5px;">
																						<table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																							<tr>
																								<td style="text-align:center;font-size:0px;">
																									<!--[if !mso><!--><input class="menu-checkbox" id="menuqo3wkk" type="checkbox" style="display:none !important;max-height:0;visibility:hidden;">
																									<!--<![endif]-->
																									<div class="menu-trigger" style="display:none;max-height:0px;max-width:0px;font-size:0px;overflow:hidden;"><label class="menu-label" for="menuqo3wkk" style="height:36px;width:36px;display:inline-block;cursor:pointer;mso-hide:all;user-select:none;align:center;text-align:center;color:#ffffff;text-decoration:none;background-color:#000000;"><span class="menu-open" style="mso-hide:all;font-size:26px;line-height:36px;">☰</span><span class="menu-close" style="display:none;mso-hide:all;font-size:26px;line-height:36px;">✕</span></label></div>
																									<div class="menu-links">
																										<!--[if mso]>
						<table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" style="">
						<tr>
						<td style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px">
						<![endif]--><a href="www.example.com" style="padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:15px;display:inline-block;color:#101010;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;text-decoration:none;letter-spacing:normal;">Unsubscribe</a>
																										<!--[if mso]></td><td style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px"><![endif]--><a href="www.example.com" style="padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:15px;display:inline-block;color:#101010;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;text-decoration:none;letter-spacing:normal;">Help</a>
																										<!--[if mso]></td><td style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px"><![endif]--><a href="www.example.com" style="padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:15px;display:inline-block;color:#101010;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;text-decoration:none;letter-spacing:normal;">Login</a>
																										<!--[if mso]></td><td style="padding-top:5px;padding-right:15px;padding-bottom:5px;padding-left:15px"><![endif]--><a href="www.example.com" style="padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:15px;display:inline-block;color:#101010;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;text-decoration:none;letter-spacing:normal;">Privacy</a>
																										<!--[if mso]></td></tr></table><![endif]-->
																									</div>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</table>
																		</td>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:35px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table class="row row-7" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
												<tbody>
													<tr>
														<td>
															<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
																<tbody>
																	<tr>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																		<td class="column" width="66.66666666666667%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:45px;line-height:5px;font-size:1px;">&#8202;</div>
																		</td>
																		<td class="column" width="16.666666666666668%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
																			<div class="spacer_block" style="height:10px;line-height:5px;font-size:1px;">&#8202;</div>
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
							</table><!-- End -->
						</body>';
				$_SESSION['mail']=$email;
				$_SESSION['code']=$code;
					mail::sendMail($title,$content,$email);
					header('location: xacnhan.php');
					exit();
				}else{
				 $thongbao = '<script>swal ( "Email không tồn tại", "Bạn đã nhập sai email", "error");</script>';
				}
				
			}
		}
	
	?>
	<?php 
		if (isset($thongbao)) {
			echo '<p>' . $thongbao . '</p>';
		}
	?>
	<div class="full-height-section error-section">
	    <div class="full-height-tablecell20">
	        <div class="container">
	            <div class="row40">
	                <div class="img20">
	                    <div class="sign-up1">
	                        <form class="sign-up__form"  method="post">
	                            <div class="sign-up__content">
	                                <h2 class="sign-up__title">Quên Mật Khẩu</h2>
	                                <br>
	                                <br>
	                                <input class="sign-up__inp" name="email" type="email" placeholder="EMAIL" required="required" />
	                                <div class="test11">
	                                    <a class="forgot__password">Bạn chưa có tài khoản?</a>
	                                    <a href="#"> ĐĂNG KÍ</a>
	                                </div>
	                            </div>
	                            <div class="sign-up__buttons">
									<button class="btn btn--register" type="submit" name="submit">Gửi yêu cầu</button>
	                               
	                                <button class="btn btn--signin" type="reset">Nhập lại</button>
	                            </div>
	                        </form>
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
	
	<link rel="stylesheet" href="../view/assets/css/quenmk.css">