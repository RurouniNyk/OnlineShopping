<?php 

include 'include/header.php';
include 'backend/dbconnect.php';

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name,categories.name as c_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON subcategories.category_id=categories.id ORDER BY items.id DESC LIMIT 8";


	$stmit=$pdo->prepare($sql);
	$stmit->execute();
	$items=$stmit->fetchAll();

?>

<section id="carousel">
	<!-- New Arrival -->
	<div class="container my-5">
		<h1 class="text-center mt-5 head">Our Products</h1>
		<hr class="divider">
	</div>

	<div class="container my-5">
		<div class="row">
			<?php 

				foreach ($items as $item) {
					
			?>
			<div class="col-md-3 py-3">
				<div class="card">
					<div class="inner">
                            <img class="card-img-top" src="backend/<?= $item['photo'] ?>" alt="Card image cap" width="500px" height="250px">
                            <div class="overlay">
								<button class="btn btn-warning border-radius view_detail" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-price="<?= $item['price'] ?>" data-discount="<?= $item['discount'] ?>" data-brand="<?= $item['brand_name'] ?>" data-subcategory="<?= $item['sub_name'] ?>" data-description="<?= $item['description'] ?>" data-photo="<?= $item['photo'] ?>">Quick View</button>
							</div>
                    </div>
					<div class="card-body text-justify item-card-body">
						<p class="text-muted py-1 my-0"><b>Category:</b><?= trim($item['c_name']) ?></p>
						<p class="text-muted py-1 my-0"><b>Name: </b><?= $item['name'] ?></p>
						<p class="text-muted py-1 my-0">
							<b>Price: </b>
							<?php  
								if (isset($item['discount'])) {
									echo $item['discount']." MMK";
								
							?>
							<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<del><?= $item['price']." MMK"; ?></del>
							<?php 

						}else{
							echo $item['price']." MMK";
						}
							 ?>

						</p>
						
					</div>

					<div class="container-fluid p-0 m-0">
						<div class="row text-center p-0 m-0">
							<div class="col-md-6 item-bg mt-1">
								<a href="" class="text-decoration-none text-dark item-save">
									<i class="fas fa-heart"></i>
								</a>
							</div>
							<div class="col-md-6 item-bg mt-1">
								<a href="javascript:void(0)" class="text-decoration-none text-dark item-add addtocart" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-price="<?= $item['price'] ?>" data-discount="<?= $item['discount'] ?>">
									<i class="fas fa-cart-plus item-add"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php } ?>

		</div>
		<div class="text-center my-5">
			<a href="product.html" class="btn btn-outline-secondary btn-lg">View More</a>
		</div>
	</div>

	<div class="about bg-warning my-5">
		<div class="container py-5 text-center text-light">
			<h2>About Us</h2>
			<p>At Heinshop.com, our purpose is simple: to live and deliver WOW.</p>
			<button class="btn btn-outline-light">Contact Us</button>
		</div>
	</div>
</section>


<?php include 'include/footer.php'; ?>