<?php
include 'dbconnect.php';
$id=$_GET['id'];
$sql="DELETE FROM brands WHERE brands.id=:brand_id";
$stmit=$pdo->prepare($sql);
$stmit->bindParam(':brand_id',$id);
$stmit->execute();

if($stmit->rowCount()){
    header("location:brand_list.php");
}else{
    echo "error";
}
?>