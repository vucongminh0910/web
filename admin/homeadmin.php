<?php 
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>XIN CHÀO ADMIN</title>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<p>Admin</p>
	<p>Xin chào: <?php echo $_SESSION['dangnhap'] ?>   <a href="?login=dangxuat">đăng xuất</a> </p>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Đơn hàng<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Khách hàng</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>