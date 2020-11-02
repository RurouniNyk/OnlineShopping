<?php
  session_start();
  include "backend/dbconnect.php";
  $sql = "SELECT * FROM categories";
  $stmit=$pdo->prepare($sql);
  $stmit->execute();
  $categories=$stmit->fetchAll();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Cherry Blosson</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="product-carousel/css/style.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>

<body>
  <section id="navigation">
      <div class="container">
          <nav class="navbar navbar-dark navbar-expand-md pt-5 pb-3 fixed-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarToggleExternalContent">
        <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" class="d-block w-25 h-25 pl-5"/></a>
        <ul class="navbar-nav ml-auto mr-5">
          <li class="nav-item">
            <a class="nav-link " href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          CATEGORIES
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
				        	<?php 

				        	foreach ($categories as $category) {
				        		
				        	?>
				        		<a class="dropdown-item" href="categories.php?id=<?=$category['id']?>"><?=$category['name']?></a>
					       	<?php } ?>
				          
				        </div>
              </li>
              <li class="nav-item">
            <a class="nav-link " href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Contact</a>
          </li>
          
          <?php
            if (isset($_SESSION['login_user'])) {

           ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['login_user']['name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="backend/index.php">Profile</a>
              <a class="dropdown-item" href="backend/logout.php">Logout</a>
            </div>
          </li>
          <?php
              }else{

          ?>

          <li class="nav-item">
            <a class="nav-link" href="backend/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="backend/register.php">Register</a>
          </li>
        <?php } ?>
        <li class="nav-item">
						<a href="checkout.php" class="nav-link" id="count">
							<span class="p1 fa-stack has-badge" id="item_count">
								<i class="p3 fa fa-cart-plus fa-stack-1x xfa-inverse"></i>
							</span>
						
						</a>
					</li>
        </ul>
      </div>
    </nav>
</div>
    
  </section>

