<?php  
	session_start();
	include 'backend/dbconnect.php';
	$note=$_POST['notes'];
	$total=$_POST['total'];
	$shop_arr=$_POST['shop_arr'];
	$user_id=$_SESSION['login_user']['id'];

	date_default_timezone_set('Asia/Yangon');
	$orderdate=date('Y-m-d');

	$voucherno =strtotime(date("h:i:s"));
	$status=0;

	$sql="INSERT INTO orders (orderdate,voucherno,total,note,status,user_id) VALUES(:orderdate,:voucherno,:total,:note,:status,:user_id)";
	$stmit=$pdo->prepare($sql);
	$stmit->bindParam(':orderdate',$orderdate);
	$stmit->bindParam(':voucherno',$voucherno);
	$stmit->bindParam(':total',$total);
	$stmit->bindParam(':note',$note);
	$stmit->bindParam(':status',$status);
	$stmit->bindParam(':user_id',$user_id);
	$stmit->execute();

	if ($stmit->rowCount()) {
		echo "Ok";	
	}else{
		echo "Error";
	}


	$sql="SELECT * FROM orders ORDER BY id DESC LIMIT 1";
	$stmit=$pdo->prepare($sql);
	$stmit->execute();
	$order=$stmit->fetch(PDO::FETCH_ASSOC);

	$order_id=$order['id'];

	foreach ($shop_arr as $shop) {
		$qty=$shop['qty'];
		$item_id=$shop['id'];

		$sql="INSERT INTO items_order (order_id,qty,item_id) VALUES(:order_id,:qty,:item_id)";
		$stmit=$pdo->prepare($sql);
		$stmit->bindParam(':order_id',$order_id);
		$stmit->bindParam(':qty',$qty);
		$stmit->bindParam(':item_id',$item_id);
		$stmit->execute();

		if ($stmit->rowCount()) {
			echo "Success";	
		}else{
			echo "Error";
		}
	}

	

	



?>