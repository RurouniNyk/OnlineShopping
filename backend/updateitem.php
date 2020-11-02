<?php 

    include 'dbconnect.php';; 

    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $brand=$_POST['brand'];
    $subcatgory=$_POST['subcategory'];
    $description=$_POST['description'];
    $fullpath=$_POST['oldphoto'];
    $photo=$_FILES['photo'];
    $codeno=$_POST['codeno'];

    if($photo['size']>0){
        $basepath="img/items/";
        $fullpath=$basepath.$photo['name'];
        move_uploaded_file($photo['tmp_name'], $fullpath);
    }

    $sql = "UPDATE items SET codeno=:item_codeno, name=:item_name, photo=:item_photo, price=:item_price, discount=:item_discount, brand_id=:item_brand, subcategory_id=:item_sub, description=:item_desc WHERE items.id=:item_id";
    $stmit= $pdo->prepare($sql); 
    $stmit->bindParam('item_id', $id);
    $stmit->bindParam(':item_codeno', $codeno);
    $stmit->bindParam(':item_name', $name);
    $stmit->bindParam(':item_photo', $fullpath);
    $stmit->bindParam(':item_price', $price);
    $stmit->bindParam(':item_discount', $discount);
    $stmit->bindParam(':item_brand', $brand);
    $stmit->bindParam(':item_sub', $subcatgory);
    $stmit->bindParam(':item_desc', $description);
    $stmit->execute();
    
    header("location:items_list.php");
?>