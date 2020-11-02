<?php
include 'dbconnect.php';
$id=$_GET['id'];
$sql="DELETE FROM items WHERE items.id=:item_id";
$stmit=$pdo->prepare($sql);
$stmit->bindParam(':item_id',$id);
$stmit->execute();

if($stmit->rowCount()){
    header("location:items_list.php");
}else{
    echo "error";
}
?>