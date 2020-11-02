<?php 

include 'include/header.php';
include 'backend/dbconnect.php';

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name,categories.name as c_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON subcategories.category_id=categories.id ORDER BY items.id DESC LIMIT 8";


	$stmit=$pdo->prepare($sql);
	$stmit->execute();
	$items=$stmit->fetchAll();
	// var_dump($items);die();

?>
    <section >
	<div id='slider'>
            <div class="container-carousel"> 
                <input checked id='slide-1' name='slides' type='radio'>
                <div class='slide-item'>
                    <div class="slide-content"> 
                        <h3>Shop with Us</h3>
                        <p>Lorem ipsum dolor.</p>
                    </div>
                    <div class="slide-img"><img src="https://storage.googleapis.com/gweb-uniblog-publish-prod/original_images/Flagship_100_Blog_2880x1800_Apparel.jpg"></div>
                </div>
                <nav class='slide-nav'>
                    <label class='slide-prev' for='slide-1'></label>
                    <label class='slide-next' for='slide-2'></label>
                </nav>
                <nav class='slide-dots'>
                    <label class='slide-dot' for='slide-1'></label>
                    <label class='slide-dot' for='slide-2'></label>
                    <label class='slide-dot' for='slide-3'></label>
                </nav>

                <input id='slide-2' name='slides' type='radio'>
                <div class='slide-item'>
                    <div class="slide-content"> 
                        <h3>We have all you need</h3>
                        <p>Lorem ipsum dolor.</p>
                    </div>
                    <div class="slide-img"><img src="http://www.menucool.com/slider/prod/image-slider-5.jpg"></div>
                </div>
                <nav class='slide-nav'>
                    <label class='slide-prev' for='slide-1'></label>
                    <label class='slide-next' for='slide-3'></label>
                </nav>
                <nav class='slide-dots'>
                    <label class='slide-dot' for='slide-1'></label>
                    <label class='slide-dot' for='slide-2'></label>
                    <label class='slide-dot' for='slide-3'></label>
                </nav>

                <input id='slide-3' name='slides' type='radio'>
                <div class='slide-item'>
                    <div class="slide-content"> 
                        <h3>You Order, We deliver</h3>
                        <p>Lorem ipsum dolor.</p>
                    </div>
                    <div class="slide-img"><img src="https://img.freepik.com/free-vector/delivery-service-with-masks-concept_23-2148499097.jpg?size=626&ext=jpg"></div>
                </div>
                <nav class='slide-nav'>
                    <label class='slide-prev' for='slide-2'></label>
                    <label class='slide-next' for='slide-3'></label>
                </nav>
                <nav class='slide-dots'>
                    <label class='slide-dot' for='slide-1'></label>
                    <label class='slide-dot' for='slide-2'></label>
                    <label class='slide-dot' for='slide-3'></label>
                </nav>
            </div>
        </div>


    </section>
	
	<!-- New Arrival -->
	<div class="container my-5">
		<h1 class="text-center mt-5 head">Our New Arrivel</h1>
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
			<a href="products.php" class="btn btn-outline-secondary btn-lg">View More</a>
		</div>
	</div>

	

</body>


<?php include 'include/footer.php'; ?>