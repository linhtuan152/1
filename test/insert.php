<?php 
	include("connect.php");
	$sqlSelect = "SELECT Pro_name FROM tbl_province ";
	$result = mysqli_query($conn,$sqlSelect) or die("Lỗi");
 	if (isset($_POST['insert'])) {
 		$select = "(SELECT Pro_id FROM tbl_province WHERE Pro_name = '".$_POST['user_pro_id']."')";
 		$a =mysqli_query($conn,$select) or die($select);
 		$b = mysqli_fetch_assoc($a);
 		
 		$sqlInsert = "INSERT INTO tbl_user(User_Name, User_pro_id, User_email, User_phone, User_gender, User_address, User_description) 
					  VALUES ('".$_POST['User_Name']."','".$b['Pro_id']."','".$_POST['User_email']."','".$_POST['User_phone']."',".$_POST['User_gender'].",'".$_POST['User_address']."','".$_POST['User_description']."')";
	    mysqli_query($conn,$sqlInsert) or die($sqlInsert);
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
 		<legend>Thêm Thông Tin</legend>
 		<div class="form-group">
 			<label for="">Họ và Tên</label>
 			<input type="text" class="form-control" name="User_Name" placeholder="Input field" value="">
 		</div>
 		<div class="form-group">
 			<label for="">Email</label>
 			<input type="text" class="form-control" name="User_email" placeholder="Input field" value="">
 		</div>
 		<div class="form-group">
 			<label for="">Điện Thoại</label>
 			<input type="text" class="form-control" name="User_phone" placeholder="Input field" value="">
 		</div>
 		<div class="form-check">
            <label for="radio" class="form-check-label">
                <input type="radio" id="gender" name="User_gender" value="0" class="form-check-input">Nữ <br>
                <input type="radio" id="gender" name="User_gender" value="1" class="form-check-input">Nam <br>
            </label>
        </div>    
 		<div class="form-group">
 			<label for="">Tỉnh Thành</label>
 			
			<!-- Single button -->
			<select name="user_pro_id" id="input" class="form-control">
				<?php while ($infor = mysqli_fetch_assoc($result)) {
				  ?>
				<option value="<?php echo $infor['Pro_name']; ?>"><?php echo $infor['Pro_name']; ?></option>
				<?php } ?>
			</select>
 		</div>
 		<div class="form-group">
 			<label for="">Địa Chỉ</label>
 			<input type="text" class="form-control" name="User_address" placeholder="Input field" value="">
 		</div>
 		<div class="form-group">
 			<label for="">Mô tả người dùng</label>
 			<input type="text" class="form-control" name="User_description" placeholder="Input field" value="">
 		</div>

 	
 		
 	
 		<button type="submit" class="btn btn-primary" name="insert">Thêm</button>
 	</form>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
 </body>
 </html>