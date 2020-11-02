<?php
session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']['role_name']=="Admin"){
  
include 'include/header.php';
include 'dbconnect.php';

$id=$_GET['id'];
$sql="SELECT items.*,brands.name as brand_name, subcategories.name as sub_name, categories.name as c_name FROM items 
INNER JOIN brands ON items.brand_id=brands.id  
INNER JOIN subcategories ON items.subcategory_id=subcategories.id 
INNER JOIN categories ON subcategories.category_id=categories.id WHERE items.id=:item_id";
$stmit=$pdo->prepare($sql);
$stmit->bindParam(':item_id',$id);
$stmit->execute();
$item=$stmit->fetch(PDO::FETCH_ASSOC);
// var_dump($item);die();
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Items Detail</h1>
            <a href="items_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Go Back</a>
          </div>

          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <img src="<?php echo $item['photo'];?>" class="img-fluid">
                  </div>
                  <div class="col-md-8">
                      <h3>Item Name: <?php echo $item['name'];?></h3>
                      <h3>Item Brand: <?php echo $item['brand_name'];?></h3>
                      <h3>Item Subcategory: <?php echo $item['sub_name'];?></h3>
                      <h3>Item Price: 
                          <?php 
                          if($item['discount']){

                            echo $item['discount']."MMK";?>
                            
                            <del><?php echo $item['price']; ?></del>
                            <?php
                          }
                          else{
                            echo $item['price']."MMK";
                          }
                          ?>
                        </h3>
                  </div>
              </div>
          </div>
<?php

include 'include/footer.php';
                        }else{
  header("location:../index.php");
}

?>