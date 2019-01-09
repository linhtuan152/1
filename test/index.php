<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
 </head>
 <body>

 	<?php 
		include("connect.php");
		$sqlSelect = "SELECT tbl_user.User_Name, tbl_user.User_email, tbl_province.Pro_name, 
					  tbl_user.User_gender, tbl_user.User_address, tbl_user.User_id 
					  FROM tbl_user INNER JOIN tbl_province 
					  ON tbl_province.Pro_id = tbl_user.User_pro_id ";
					  // die($sqlSelect);
		$result = mysqli_query($conn,$sqlSelect) or die("Lỗi");
 	?>
 	<table class="table table-hover">
 		<thead>
 			<tr>
 				<th>STT</th>
 				<th>Họ Tên</th>
 				<th>Email</th>
 				<th>Tỉnh Thành</th>
 				<th>Giới Tính</th>
 				<th>Địa Chỉ</th>
 				<th></th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 				$i = 0;
 				while ($row = mysqli_fetch_assoc($result)) {
 					$i++;
 			 ?>
 			<tr>
 				<td><?php echo $i ?></td>
 				<td><?php echo $row['User_Name']; ?></td>
 				<td><?php echo $row['User_email']; ?></td>
 				<td><?php echo $row['Pro_name']; ?></td>
 				<td><?php echo ($row["User_gender"])?"Nữ":"Nam"; ?></td>
 				<td><?php echo $row['User_address']; ?></td>
 				<td><a href="update.php?id=<?php echo $row["User_id"] ?>" >Sửa </a><a href="delete.php?id=<?php echo $row['User_id'] ?>">Xóa</a></td>
 			</tr>
 			<?php } ?>
 		</tbody>
 	</table>
 	<button type="button" class="btn btn-default" ><a href="insert.php" title="">Thêm mới người dùng</a></button>
 </body>
 </html>