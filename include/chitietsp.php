	<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sp WHERE sp_Id='$id'");
	 ?>
	 <?php
	 if(isset($_POST['Thêm'])){
	 	$tensp = $_POST['Tensp'];
	 	$sp_Id = $_POST['sp_Id'];
	 	$anh = $_POST['anhsp'];
	 	$gia = $_POST['giasp'];
	 	$soluong = $_POST['soluong'];
	 	$sql_giohang = mysqli_query($con,"INSERT INTO tbl_giohang(Tensp,sp_Id,anhsp,giasp,soluong) values('$tensp','$sp_Id','$anh','$gia','$soluong')");
	 	$count_giohang = mysqli_num_rows($sql_giohang);
	 	if($count_giohang>0){
	 		header('location:index.php?quanly=giohang');
	 	}else{
	 		header('location:index.php?quanly=chitietsp&id=' .$sp_Id);
	 	}
	 } 
	  ?>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Trang Chủ</a>
						<i>|</i>
					</li>
					<li>Single Product 1</li>
				</ul>
			</div>
		</div>
	</div>
	<?php 
	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){
	 ?>
	
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
		
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">

								<li data-thumb="images/<?php echo $row_chitiet['sp_Anh'] ?>">
									<div class="thumb-image">
										<img src="images/<?php echo $row_chitiet['sp_Anh'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['sp_Name'] ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo number_format($row_chitiet['sp_Gia']).'vnđ' ?></span>
						
						<label>Miễn phí vận chuyển</label>
					</p>
					
					<div class="product-single-w3l">
						<p>
							<?php echo $row_chitiet['sp_Mota'] ?>

						</p>

					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="?quanly=giohang" method="post">
								<fieldset>
									<input type="hidden" name="Tensp" value="<?php echo $row_chitiet['sp_Name'] ?>" />
									<input type="hidden" name="sp_Id" value="<?php echo $row_chitiet['sp_Id'] ?>" />
									<input type="hidden" name="giasp" value="<?php echo $row_chitiet['sp_Gia'] ?>" />
									<input type="hidden" name="anhsp" value="<?php echo $row_chitiet['sp_Anh'] ?>" />
									<input type="hidden" name="soluong" value="1" />
									
								
									<input type="submit" name="Thêm" value="Thêm giỏ hàng" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	 ?>

	<!-- //Single Page -->