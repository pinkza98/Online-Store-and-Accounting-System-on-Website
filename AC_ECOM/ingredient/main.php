<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-4 col-2 ">
						<div class="logo_container">
							<div class="logo"><a href="index.php">ร้านค้าออนไลน์</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="">
								<div class="">
									<form action="#" class="">
										
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc"></span>
												
												<ul class="custom_list clc">
													
												</ul>
											</div>
										</div>
										
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								
							

							<?php if(!isset($_SESSION['ses_user_id']) || $_SESSION['ses_user_id']==""){?>
							<!-- Cart -->
							<div class="cart">
											<div class="cart_container d-flex flex-row align-items-center justify-content-end">

												<div >
													<img >
													<div ><span></span></div>
												</div>
												<div >
													<div ><a ></a></div>
													<div ></div>
												</div>
												
											</div>
										</div>

									</div>
								</div>
							</div>
								<?php }else{ ?>
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">

									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span></span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="cart.php">Cart</a></div>
										<div class="cart_price"></div>
									</div>
									
								</div>
							</div>

						</div>
					</div>
				</div>
					<?php } ?>
			</div>
		</div>