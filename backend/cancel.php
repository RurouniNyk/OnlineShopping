<?php  

	include 'dbconnect.php';

	$id=$_GET['id'];


	$sql="DELETE FROM orders WHERE id=:id";
	$stmit=$pdo->prepare($sql);
	$stmit->bindParam(':id',$id);
	$stmit->execute();
	if ($stmit->rowCount()) {
		header("location:order_list.php");
	}else{
		echo "Error";
	}



?>