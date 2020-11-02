<?php  

	include 'dbconnect.php';

	$id=$_GET['id'];
	$num=1;

	$sql="UPDATE orders SET status=:num WHERE id=:id";
	$stmit=$pdo->prepare($sql);
	$stmit->bindParam(':num',$num);
	$stmit->bindParam(':id',$id);
	$stmit->execute();
	if ($stmit->rowCount()) {
		header("location:order_list.php");
	}else{
		echo "Error";
	}



?>