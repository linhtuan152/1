<?php 
	include("connect.php");
	if(isset($_GET["id"])){
		$sqlDelete = "DELETE FROM tbl_user WHERE User_id = ".$_GET["id"];
		// die($sqlDelete);
		mysqli_query($conn,$sqlDelete) or die("Lỗi xóa danh mục");
		header("location:index.php");
	}
 
 ?>