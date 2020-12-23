<?php 
session_start();

include('../db/connect.php');
 ?>
<?php 
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['taikhoan'];
		$matkhau = md5($_POST['matkhau']);
		if($taikhoan=='' || $matkhau==''){
			echo '<p>Xin nhập đủ thông tin đăng nhập!</p>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND pass='$matkhau' LIMIT 1 " );
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count >0){
				$_SESSION['dangnhap']=$row_dangnhap['admin_Name'];
				$_SESSION['admin_Id']=$row_dangnhap['admin_Id'];
				header('Location: homeadmin.php');
			}else{
				echo '<p> Tài khoản hoặc mật khẩu sai</p>';
			}
			
		}
	}
 ?>

<!DOCTYPE html>
<html >
<head>
	<title>ĐĂNG NHẬP ADMIN</title>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<h5 align="center">ĐĂNG NHẬP ADMIN</h5>
	<div class="col-md-6">
	<div class="from-group">
		<form action="" method="POST">
		<label>Tài khoản</label>
		<input type="text"  name="taikhoan" placeholder="Điền email" class="form-control"><br>
		<label>Mật Khẩu</label>
		<input type="pass"  name="matkhau" placeholder="Điền mật khẩu" class="form-control"><br>
		<input type="submit" name="dangnhap" class="btn btn-primary" value="đăng nhập admin" >
		</form>
	</div>
	</div>
</body>
</html>