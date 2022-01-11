<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>GET TODAY'S SPECIAL EXCITING OFFER, SHOP NOW!</p>
			</div>
			<div class="agile-login">
				<ul>
				<?php if(!isset($_SESSION['log'])){
    					echo '
    					<li><a href="registered.php">Register</a></li>
    					<li><a href="loginform.php">Login</a></li>
    					';
    				} else {
    				if($_SESSION['role']=='Member'){
    				echo '
    				<li style="color:white">Halo, '.$_SESSION["name"].'
    				<li><a href="logout.php">Logout ?</a></li>';
    				}else{
    				};
    				    
    				}
    			?>
				</ul>
			</div>
			<div class="product_list_header">
					<a href="cart.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					 </a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Contact US : (+6281) 420 666</li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<a href="index.php"><img src="images/logo.png" width="100px" alt=""></a>
			</div>
		<div class="w3l_search">
			<form action="search.php" method="post">
				<input type="search" name="Search" placeholder="Search Menu">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>

			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Category</h6>

														<?php
														$kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
														<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>

														<?php
																	}
														?>
													</ul>
												</div>

											</div>
										</ul>
									</li>
									<li><a href="gallery.php">Gallery</a></li>
									<li><a href="cart.php">My Cart</a></li>
									<li><a href="daftarorder.php">Order List</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>

<!-- //navigation -->
