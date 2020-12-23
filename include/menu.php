<?php
		$sql_category=mysqli_query($con,'SELECT * FROM tbl_category'); 
	 ?>
	
<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="">Danh mục Sản phẩm</option>
							<?php
							while($row_category = mysqli_fetch_array($sql_category)){
							 ?>
							
							<option value="Home Audio & Theater"><?php echo $row_category['cat_Name'] ?></option>
							<?php
							} 
							 ?>
						</select>
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Trang Chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<?php
							$sql_category_danhmuc=mysqli_query($con,'SELECT * FROM tbl_category');
							while($row_category_danhmuc =mysqli_fetch_array($sql_category_danhmuc)){ 
	 					?>	
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link " href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['cat_Id'] ?>" role="button"  aria-haspopup="true" aria-expanded="false">
								<?php echo $row_category_danhmuc['cat_Name'] ?>
							</a>
							
						</li>
						
					
						<?php
						} 
						 ?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Trang
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="product.html">Sản Phẩm</a>
								
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="checkout.html">Kiểm Tra đơn hàng</a>
								<a class="dropdown-item" href="payment.html">Thanh toán đơn hàng</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Liên hệ</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>