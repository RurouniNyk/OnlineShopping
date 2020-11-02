<?php
include 'dbconnect.php';
$id=$_GET['id'];
$sql="DELETE FROM categories WHERE categories.id=:category_id";
$stmit=$pdo->prepare($sql);
$stmit->bindParam(':category_id',$id);
$stmit->execute();

if($stmit->rowCount()){
    header("location:categories_list.php");
}else{
    echo "error";
}
?>