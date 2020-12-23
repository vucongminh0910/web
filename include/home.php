
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<h3 style ="padding:20px;text-align: center;">Danh mục Sản Phẩm </h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<?php
						$sql_cate_home = mysqli_query($con,"SELECT * FROM tbl_category ");
						while($row_cate_home = mysqli_fetch_array($sql_cate_home)){ 
							$id_category = $row_cate_home['cat_Id'];
						 ?>
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic"><?php echo $row_cate_home['cat_Name'] ?></h3>
							<div class="row">
								<?php
								 $sql_sp=mysqli_query($con,"SELECT * FROM tbl_sp");
								 while($row_sp = mysqli_fetch_array($sql_sp)){
								 	if($row_sp['cat_Id']==$id_category){
								 ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_sp['sp_Anh'] ?>"  width="100" height="100">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sp['sp_Id']?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?quanly=chhitietsp&id<?php echo $row_sp['sp_Id']?>"><?php echo $row_sp['sp_Name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo $row_sp['sp_Gia'] ?></span>
												
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
								<fieldset>
									<input type="hidden" name="Tensp" value="<?php echo $row_sp['sp_Name'] ?>" />
									<input type="hidden" name="sp_Id" value="<?php echo $row_sp['sp_Id'] ?>" />
									<input type="hidden" name="giasp" value="<?php echo $row_sp['sp_Gia'] ?>" />
									<input type="hidden" name="anhsp" value="<?php echo $row_sp['sp_Anh'] ?>" />
									<input type="hidden" name="soluong" value="1" />
									
								
									<input type="submit" name="Thêm" value="Thêm giỏ hàng" class="button" />
								</fieldset>
							</form>
											</div>
										</div>
									</div>
								</div>
								<?php 
									}
								}
								 ?>
									
								</div>
								</div>
						<?php 
						}
						 ?>
						</div>
						</div>
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tìm kiếm</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Sản phẩm..." name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Dưới 1tr</a>
									</li>
									
								</ul>
							</div>
						</div>
						<!-- //price -->
						
						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Khách hàng đánh giá</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>4.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half"></i>
										<span>3.5</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>3.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half"></i>
										<span>2.5</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->
						<!-- electronics -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
							<ul>
								<?php
									$sql_category_sidebar=mysqli_query($con,'SELECT * FROM tbl_category'); 
									while($row_category_sidebar=mysqli_fetch_array($sql_category_sidebar)){
								 ?>
								<li>
									<span class="span"><a href="danhmucsp.php?id=<?php echo $row_category_sidebar['cat_Id'] ?>"><?php echo $row_category_sidebar['cat_Name'] ?></a></span>
								</li>
								<?php 
							 	}	
								 ?>
								
							</ul>
						</div>
						<!-- //electronics -->
						
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sản Phẩm nổi bật</h3>
							<div class="box-scroll">
								<div class="scroll">
									<?php 
									$sql_sp_sidebar=mysqli_query($con,"SELECT * FROM tbl_sp WHERE sp_Hot='0' ORDER BY sp_Id DESC");
									while($row_sp_sidebar = mysqli_fetch_array($sql_sp_sidebar)){
									 ?>
									<div class="row">	
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="images/<?php echo $row_sp_sidebar['sp_Anh'] ?>"  class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href=""><?php echo $row_sp_sidebar['sp_Name'] ?></a>
											<a href="" class="price-mar mt-2"><?php echo $row_sp_sidebar['sp_Gia'] ?></a>
										</div>a
									</div>
									<?php 
									}
									 ?>
								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->