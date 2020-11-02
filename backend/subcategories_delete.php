<?php
include 'dbconnect.php';
$id=$_GET['id'];
$sql="DELETE FROM subcategories WHERE subcategories.id=:subcategory_id";
$stmit=$pdo->prepare($sql);
$stmit->bindParam(':subcategory_id',$id);
$stmit->execute();

if($stmit->rowCount()){
    header("location:subcategories_list.php");
}else{
    echo "error";
}
?>