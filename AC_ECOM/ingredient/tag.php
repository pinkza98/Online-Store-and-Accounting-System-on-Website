
<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">
							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-stop">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">shop</div>
								</div>
								<ul class="cat_menu">
									<?php
									$menu_qr = mysqli_query($mysqli, "SELECT * FROM tb_muad ORDER BY muad_name");
									while($menu = mysqli_fetch_assoc($menu_qr)){
										?>
										<li class="hassubs"><a><?=$menu['muad_name'];?><i class="fas fa-chevron-right"></a></i>
											<ul>
										<?php
										$muad_id = $menu['muad_id'];
										$list_qr = mysqli_query($mysqli, "SELECT * FROM tb_moo WHERE muad_id='$muad_id' ORDER BY moo_name");
										while($list = mysqli_fetch_assoc($list_qr)){
											$moo_id = $list['moo_id'];
											?>
											<li><a href="shop.php?muad_id=<?=$muad_id?>&moo_id=<?=$moo_id?>"><?=$list['moo_name'];?><i class="fas fa-chevron-right"></i></a></li>
											<?php
										}
										?>
											</ul>
										<?php
									}
									?>
								</ul>
							</div>
							<div class="main_nav_menu ml-auto">
								<?php if(!isset($_SESSION['ses_user_id']) || $_SESSION['ses_user_id']==""){?>

									<?php }else{ ?>
								<ul class="standard_dropdown main_nav_dropdown">					
									<li><a href="cart.php">ชำระสินค้า<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a href="#">รายละเอียดการซื้อ<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="Parcel.php">รายการซื้อของฉัน<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="payment.php">แจ้งชำระ<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>	
									</ul>				
							</div>
							<ul class="standard_dropdown main_nav_dropdown">					
									<li><a ><i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a ><i ></i></a>
										<ul>
											
										</ul>
									</li>	
									</ul>
									<?php } ?>
							<ul class="standard_dropdown main_nav_dropdown">
							<li><a href="contact.php">เกี่ยวกับเรา<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>