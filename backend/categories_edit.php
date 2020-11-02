<?php 
session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']['role_name']=="Admin"){
  
  include 'include/header.php';
  include 'dbconnect.php';

  $id=$_GET['id'];
  $sql = "SELECT * FROM categories where categories.id=:item_id";
  $stmit= $pdo->prepare($sql);
  $stmit->bindParam('item_id',$id);
  $stmit->execute();
  $item=$stmit->fetch(PDO::FETCH_ASSOC);
  ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Edit</h1>
            <a href="categories_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Go Back</a>
          </div>

          <div class="row">
              <div class="offset-md-2 col-md-8">
                <form action="updatecategories.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                <input type="hidden" name="codeno" value="<?php echo $item['codeno'] ?>">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $item['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="photo">Category Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
                        <input type="hidden" name="oldphoto" value="<?php $item['photo'] ?>">
                        <img src="<?php echo $item['photo'] ?>" width="150" height="150">
                    </div>
                    
                    <input type="submit" class="btn btn-primary float-right" value="Update">
                </form>
              </div>
          </div>

<?php 
          include 'include/footer.php';
                            }
          else{
            header("location:../index.php");
          }
          ?>