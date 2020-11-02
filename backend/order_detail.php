<?php  
	session_start();
	if (isset($_SESSION['login_user']) && $_SESSION['login_user']['role_name']=="Admin") {
	include 'include/header.php';
	include 'dbconnect.php';

	$id=$_GET['id'];

	
	$sql="SELECT items_order.*, items.name as item_name,users.name as u_name,orders.voucherno as order_von,orders.orderdate as order_date,items.price as item_price,items.discount as item_discount,orders.total as order_total FROM items_order INNER JOIN items ON items_order.item_id=items.id INNER JOIN orders ON items_order.order_id=orders.id INNER JOIN users ON orders.user_id=users.id  WHERE items_order.order_id=:id";
	$stmit=$pdo->prepare($sql);
	$stmit->bindParam(':id',$id);
	$stmit->execute();
	$orderdetails= $stmit->fetch(PDO::FETCH_ASSOC);

	var_dump($orderdetails);
?>
<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order Details</h1>
		<a href="order_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	</div>
			<table class="table">
				<thead>					
					<tr>
						<th colspan="2">Casher</th>
						<th>:</th>
						<th><?php echo $orderdetails['u_name']; ?></th>
						<th>Date</th>
						<th>:</th>
						<th><?php echo $orderdetails['order_date']; ?></th>
					</tr>
					<tr>
						<th colspan="2">Voucher</th>
						<th>:</th>
						<th><?php echo $orderdetails['order_von']; ?></th>
						<th>Order Time</th>
						<th>:</th>
						<th><?php echo date("h:i:sa") ?></th>
					</tr>
					<tr>
						<th colspan="4">Item Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Amount</th>
					</tr>
					
				</thead>
				<tbody class="table table-bordered">

					<?php
					$sql="SELECT items_order.*, items.name as item_name,users.name as user_name,orders.voucherno as order_von,orders.orderdate as order_date,items.price,items.price as item_price,items.discount as item_discount,orders.total as order_total FROM items_order INNER JOIN items ON items_order.item_id=items.id INNER JOIN orders ON items_order.order_id=orders.id INNER JOIN users ON orders.user_id=users.id  WHERE items_order.order_id=:id";
					$stmit=$pdo->prepare($sql);
					$stmit->bindParam(':id',$id);
					$stmit->execute();
					$orderdetails= $stmit->fetchAll();
					 foreach ($orderdetails as $orderdetail) {
					?>
					<tr>
						<th colspan="4"><?php echo $orderdetail['item_name']; ?></th>
						<td>
							<?php 
							if($orderdetail['item_discount']){
								echo $orderdetail['item_discount']."MMK";
								?>
								<del><?php echo $orderdetail['item_price']."MMK"; ?></del>
								<?php 
							}else{
								echo $orderdetail['item_price']."MMK";
							}
							?>
						</td>
						<td><?php echo $orderdetail['qty']; ?></td>
						<td>
							<?php 
							if($orderdetail['item_discount']){
								echo $orderdetail['item_discount']*$orderdetail['qty']."MMK";
								?>
								<?php 
							}else{
								echo $orderdetail['item_price']*$orderdetail['qty']."MMK";
							}
							?>
						</td>
					</tr>					
				<?php } ?>
				<tr>
					<th colspan="6">Total Amount</th>
					<td><?php echo $orderdetail['order_total']."MMK"; ?></td>
				</tr>
				</tbody>
			</table>




<?php 

include 'include/footer.php';

}else{
  header("location:../index.php");
}

?>