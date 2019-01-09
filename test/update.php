<?php 
	include("connect.php");
	$sqlSelect = "SELECT tbl_user.User_Name, tbl_user.User_email, tbl_province.Pro_name, 
				  tbl_user.User_gender, tbl_user.User_address, tbl_user.User_id, tbl_user.User_phone,tbl_user.User_description 
				  FROM tbl_user INNER JOIN tbl_province 
				  ON tbl_province.Pro_id = tbl_user.User_pro_id
				  WHERE tbl_user.User_id =".$_GET['id'];
	$result = mysqli_query($conn,$sqlSelect) or die("Lỗi");
	$infor = mysqli_fetch_assoc($result);
	$sqlSelect2 = "SELECT tbl_province.Pro_name FROM tbl_province WHERE tbl_province.Pro_name NOT IN(SELECT tbl_province.Pro_name 
			   FROM tbl_province INNER JOIN tbl_user
			   ON tbl_province.Pro_id = tbl_user.User_pro_id
			   WHERE tbl_user.User_id =".$_GET['id'].")";
	$result2 = mysqli_query($conn,$sqlSelect2) or die("Lỗi");
	if (isset($_POST['update'])) {
		
		$select = "(SELECT Pro_id FROM tbl_province WHERE Pro_name = '".$_POST['User_pro_id']."')";
 		$a =mysqli_query($conn,$select) or die($select);
 		$b = mysqli_fetch_assoc($a);
		$sqlUpdate = "UPDATE tbl_user SET User_Name ='".$_POST['User_Name']."', User_pro_id ='".$b."', User_email ='".$_POST['User_email']."', User_phone ='".$_POST['User_phone']."', User_gender ='".$_POST['User_gender']."', User_address = '".$_POST['User_address']."', User_description = '".$_POST['User_description']."' WHERE User_id =".$_GET['id'];
		// die($sqlUpdate);
		mysqli_query($conn,$sqlUpdate) or die($sqlUpdate);
		header("location:index.php");
	}
				
 
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
 	
 </head>
 <body>
 	<form action="" method="POST" role="form">
 		<legend>Sửa Thông Tin</legend>
 		<div class="form-group">
 			<label for="">Họ và Tên</label>
 			<input type="text" class="form-control" id="" name="User_Name" placeholder="Input field" value="<?php echo $infor['User_Name'] ?>">
 		</div>
 		<div class="form-group">
 			<label for="">Email</label>
 			<input type="text" class="form-control" id="" name="User_email" placeholder="Input field" value="<?php echo $infor['User_email'] ?>">
 		</div>
 		<div class="form-group">
 			<label for="">Điện Thoại</label>
 			<input type="text" class="form-control" id="" name="User_phone" placeholder="Input field" value="<?php echo $infor['User_phone'] ?>">
 		</div>
 		<div class="form-group">
 			<label for="">Tỉnh Thành</label>
 			
			<!-- Single button -->
			<select name="User_pro_id" id="input" class="form-control">
				<option value="<?php echo $infor['Pro_name']; ?>"><?php echo $infor['Pro_name']; ?></option>
				<?php while ($infor2 = mysqli_fetch_assoc($result2)) {
				  ?>
				<option value="<?php echo $infor2['Pro_name']; ?>"><?php echo $infor2['Pro_name']; ?></option>
				<?php } ?>
			</select>
 		</div>
 		<div class="form-group">
 			<label for="">Địa Chỉ</label>
 			<input type="text" class="form-control" id="" name="User_address" placeholder="Input field" value="<?php echo $infor['User_address'] ?>">
 		</div>
 		<div class="form-check">
            <label for="radio" class="form-check-label">
                <input type="radio" id="gender" name="User_gender" value="0" class="form-check-input">Nữ <br>
                <input type="radio" id="gender" name="User_gender" value="1" class="form-check-input">Nam <br>
            </label>
        </div>    
 		<div class="form-group">
 			<label for="">Mô tả người dùng</label>
 			<input type="text" class="form-control" id="" name="User_description" placeholder="Input field" value="<?php echo $infor['User_description'] ?>">
 		</div>

 	
 		
 	
 		<button type="submit" name="update" class="btn btn-primary">Sửa</button>
 	</form>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
 </body>
 </html>