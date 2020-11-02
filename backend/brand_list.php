<?php 
session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']['role_name']=="Admin"){
  
  include 'include/header.php';
  include 'dbconnect.php';
  ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand List</h1>
            <a href="brand_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Brands</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Brand Name</th>
                      <th>Photo</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>#</th>
                      <th>Brand Name</th>
                      <th>Photo</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM brands"; 
                    $stmit=$pdo->prepare($sql);
                    $stmit->execute(); 
                    $brands=$stmit->fetchAll();
                    $i =1;
                    foreach($brands as $brand){
                     
                    ?>
                    <tr>
                    <td><?php echo $i++;?></td>
                        <td><?php echo $brand['name'];?></td>
                        <td><?php echo $brand['photo'];?></td>
                        <td><a href="brand_detail.php?id=<?php echo $brand['id'];?>" class="btn btn-outline-primary btn-sm">Detail</a>
                        <a href="brand_edit.php?id=<?php echo $brand['id'];?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <a href="brand_delete.php?id=<?php echo $brand['id'];?>" class="btn btn-outline-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php } ?> 
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