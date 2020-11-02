<?php  
session_start();
if (isset($_SESSION['login_user']) && $_SESSION['login_user']['role_name']=="Admin") {

include 'include/header.php';
include 'dbconnect.php';

?>


<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
	</div>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Order List</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>User Name</th>
							<th>Voucherno</th>
							<th>Order Date</th>
							<th>Total</th>
							<th>Option</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>User Name</th>
							<th>Voucherno</th>
							<th>Order Date</th>
							<th>Total</th>
							<th>Option</th>
						</tr>
					</tfoot>
					<tbody>

						<?php  

							$num=0;

							$sql="SELECT orders.*,users.name as user_name FROM orders INNER JOIN users ON orders.user_id=users.id WHERE orders.status=:num";
							$stmit=$pdo->prepare($sql);
							$stmit->bindParam(':num',$num);
							$stmit->execute();
							$orders=$stmit->fetchAll();

							foreach ($orders as $order) {

						?>

						<tr>
							<td>1</td>
							<td><?=$order['user_name']?></td>
							<td><?=$order['voucherno']?></td>
							<td><?=$order['orderdate']?></td>
							<td><?=$order['total']?></td>
							<td>
								<a href="confirm.php?id=<?=$order['id']?>" class="btn btn-success btn-sm">Confirm</a>
								<a href="order_detail.php?id=<?=$order['id']?>" class="btn btn-primary btn-sm">Detail</a>
								<a href="cancel.php?id=<?=$order['id']?>" class="btn btn-danger btn-sm">Cancel</a>



							</td>



						</tr>

						<?php  
							}	
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>




<?php  

	include 'include/footer.php';

	}else{
  header("location:../index.php");
}

?>