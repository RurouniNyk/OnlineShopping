<?php 

    include 'dbconnect.php';; 

    $id=$_POST['id'];
    $name=$_POST['name'];


    $sql = "UPDATE subcategories SET name=:item_name WHERE subcategoreis.id=:item_id";
    $stmit= $pdo->prepare($sql); 
    $stmit->bindParam('item_id', $id);
    $stmit->bindParam(':item_name', $name);
    $stmit->execute();
    
    header("location:brand_list.php");
?>