 <?php
	 if(isset($_POST['Thêm'])){
	 	$tensp = $_POST['Tensp'];
	 	$sp_Id = $_POST['sp_Id'];
	 	$anh = $_POST['anhsp'];
	 	$gia = $_POST['giasp'];
	 	$soluong = $_POST['soluong'];
	 	$sql_select_giohang = mysqli_query($con,"SELECT * from tbl_giohang WHERE sp_Id='$sp_Id'");
	 	$count = mysqli_num_rows($sql_select_giohang);
	 	if($count >0){
	 		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
	 		$soluong = $row_sanpham['soluong'] = 1;
	 		$sql_giohang="UPDATE tbl_giohang SET soluong='$soluong' WHERE sp_Id='$sp_Id'";
	 	}else{
	 		$soluong=$soluong;
	 		$sql_giohang = "INSERT INTO tbl_giohang(Tensp,sp_Id,anhsp,giasp,soluong) values('$tensp','$sp_Id','$anh','$gia','$soluong')";
	 	}
	 	$insert_row = mysqli_query($con,$sql_giohang);
	 	if($insert_row==0){
	 		
	 		header('location:index.php?quanly=chitietsp&id=' .$sp_Id);
	 	}
	 	}elseif (isset($_GET['xoa'])) {
	 		$id=$_GET['xoa'];
	 		$sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_Id='$id'");
	 	
	 	}elseif (isset($_POST['thanhtoan'])){
	 		$name=$_POST['name'];
			$phone=$_POST['phone'];
	 		$Address=$_POST['Address'];
	 		$email=$_POST['email'];
	 		$giaohang=$_POST['giaohang'];
	 		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,address,email,giaohang) values('$name','$phone','$Address','$email','$giaohang')");
	 	}
	  ?>
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>G</span>iỏ hàng
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<?php 
			
				$sql_laygiohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_Id DESC");
				
				 ?>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT.</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>

								<th>Giá</th>
								<th>Giá tổng</th>
								<th>Hủy</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i=0;
								$total=0;
							while ($row_fetch_giohang = mysqli_fetch_array ($sql_laygiohang)){
								$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasp'];
								$total+=$subtotal;
								$i++;
							 ?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img src="images/<?php echo $row_fetch_giohang['anhsp'] ?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<input type="number" min="1" name="soluong" value ="<?php echo $row_fetch_giohang['soluong'] ?> ">
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['Tensp'] ?></td>
								<td class="invert"><?php echo number_format($row_fetch_giohang['giasp']).'vnđ'  ?></td>
								<td class="invert"><?php echo number_format($subtotal).'vnđ'?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_Id'] ?>">Xóa</a>
								</td>
							</tr>
							<?php 
							}
							 ?>
							 <tr>
							 	<td colspan="7">Tổng tiền : <?php echo number_format($total).'vnđ'?></td>
							 </tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Nhập thông tin giao hàng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="ĐIền tên" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Số điện thoại" name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Địa chỉ" name="Address" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="email" name="email" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls"  name="giaohang">
											<option>Chọn hình thức giao hàng</option>
											<option value="1">thanh toán online</option>
											<option value="0">Nhận hàng thanh toán tại nhà</option>
										

										</select>
									</div>
								</div>
								<input type="submit" name ="thanhtoan"  class="btn btn-success" style ="width:20%" value="Thanh toán"></button>
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->