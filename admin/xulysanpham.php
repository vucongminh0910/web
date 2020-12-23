<?php
  include('../db/connect.php');
?>
<?php
  if(isset($_POST['themsanpham'])){
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name']; 
    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sp(sp_Name,sp_Chitiet,sp_Mota,sp_Gia,sp_Soluong,sp_Anh,cat_Id) values ('$tensanpham','$chitiet','$mota','$gia','$soluong','$hinhanh','$danhmuc')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
  }elseif(isset($_POST['capnhatsanpham'])) {
    $id_update = $_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    if($hinhanh==''){
      $sql_update_image = "UPDATE tbl_sp SET sp_Name='$tensanpham',sp_Chitiet='$chitiet',sp_Mota='$mota',sp_Gia='$gia',sp_Soluong='$soluong',cat_Id='$danhmuc' WHERE sp_Id='$id_update'";
    }else{
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
      $sql_update_image = "UPDATE tbl_sp SET sp_Name='$tensanpham',sp_Chitiet='$chitiet',sp_Mota='$mota',sp_Gia='$gia',sp_Soluong='$soluong',sp_Anh='$hinhanh',cat_Id='$danhmuc' WHERE sp_Id='$id_update'";
    }
    mysqli_query($con,$sql_update_image);
  }
?> 
<?php
    if(isset($_GET['xoa'])){
    $id= $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tbl_sp WHERE sp_Id='$id'");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sản phẩm</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
        </li>
          <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
        </li>
      </ul>
    </div>
  </nav><br><br>
  <div class="container">
    <div class="row">
    <?php
      if(isset($_GET['quanly'])=='capnhat'){
        $id_capnhat = $_GET['capnhat_id'];
        $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sp WHERE sp_Id='$id_capnhat'");
        $row_capnhat = mysqli_fetch_array($sql_capnhat);
        $id_category_1 = $row_capnhat['cat_Id'];
        ?>
        <div class="col-md-4">
        <h4>Cập nhật sản phẩm</h4>
        
        <form action="" method="POST" enctype="multipart/form-data">
          <label>Tên sản phẩm</label>
          <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sp_Name'] ?>"><br>
          <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sp_Id'] ?>">
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="hinhanh"><br>
          <img src="../uploads/<?php echo $row_capnhat['sp_Anh'] ?>" height="80" width="80"><br>
          <label>Giá</label>
          <input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sp_Gia'] ?>"><br>
          
          <label>Số lượng</label>
          <input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sp_Soluong'] ?>"><br>
          <label>Mô tả</label>
          <textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['sp_Mota'] ?></textarea><br>
          <label>Chi tiết</label>
          <textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['sp_Chitiet'] ?></textarea><br>
          <label>Danh mục</label>
          <?php
          $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY cat_Id DESC"); 
          ?>
          <select name="danhmuc" class="form-control">
            <option value="0">-----Chọn danh mục-----</option>
            <?php
            while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
              if($id_category_1==$row_danhmuc['cat_Id']){
            ?>
            <option selected value="<?php echo $row_danhmuc['cat_Id'] ?>"><?php echo $row_danhmuc['cat_Name'] ?></option>
            <?php 
              }else{
            ?>
            <option value="<?php echo $row_danhmuc['cat_Id'] ?>"><?php echo $row_danhmuc['cat_Name'] ?></option>
            <?php
              }
            }
            ?>
          </select><br>
          <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
        </form>
        </div>
      <?php
      }else{
        ?> 
        <div class="col-md-4">
        <h4>Thêm sản phẩm</h4>
        
        <form action="" method="POST" enctype="multipart/form-data">
          <label>Tên sản phẩm</label>
          <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="hinhanh"><br>
          <label>Giá</label>
          <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
        
          <label>Số lượng</label>
          <input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
          <label>Mô tả</label>
          <textarea class="form-control" name="mota"></textarea><br>
          <label>Chi tiết</label>
          <textarea class="form-control" name="chitiet"></textarea><br>
          <label>Danh mục</label>
          <?php
          $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY cat_Id DESC"); 
          ?>
          <select name="danhmuc" class="form-control">
            <option value="0">-----Chọn danh mục-----</option>
            <?php
            while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['cat_Id'] ?>"><?php echo $row_danhmuc['cat_Name'] ?></option>
            <?php 
            }
            ?>
          </select><br>
          <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
        </form>
        </div>
        <?php
      } 
      
        ?>
      <div class="col-md-8">
        <h4>Liệt kê sản phẩm</h4>
        <?php
        $sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_sp,tbl_category WHERE tbl_sp.cat_Id=tbl_category.cat_Id ORDER BY tbl_sp.sp_Id DESC"); 
        ?> 
        <table class="table table-bordered ">
          <tr>
            <th>Thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Giá sản phẩm</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i = 0;
          while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
            $i++;
          ?> 
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row_sp['sp_Name'] ?></td>
            <td><img src="../uploads/<?php echo $row_sp['sp_Anh'] ?>" height="100" width="80"></td>
            <td><?php echo $row_sp['sp_Soluong'] ?></td>
            <td><?php echo $row_sp['cat_Name'] ?></td>
            <td><?php echo number_format($row_sp['sp_Gia']).'vnđ' ?></td>
            <td><a href="?xoa=<?php echo $row_sp['sp_Id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sp_Id'] ?>">Cập nhật</a></td>
          </tr>
        <?php
          } 
          ?> 
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>