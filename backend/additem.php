<?php
    include 'dbconnect.php';

    $name=$_POST['name'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $brand=$_POST['brand'];
    $subcatgory=$_POST['subcategory'];
    $description=$_POST['description'];
    $photo=$_FILES['photo'];
    $codeno = "CODE_".mt_rand(100000,999999);



    $basepath="img/items/";
    $fullpath=$basepath.$photo['name'];
    move_uploaded_file($photo['tmp_name'], $fullpath);

    $sql="INSERT INTO items (codeno, name, photo, price, discount, description, brand_id, subcategory_id)
    VALUES(:item_codeno,:item_name,:item_photo,:item_price,:item_discount,:item_description,:item_brand,:item_subcategory)";
    $stmit = $pdo->prepare($sql);
    $stmit->bindParam(':item_codeno',$codeno);
    $stmit->bindParam(':item_name',$name);
    $stmit->bindParam(':item_photo',$fullpath);
    $stmit->bindParam(':item_price',$price);
    $stmit->bindParam(':item_discount',$discount);
    $stmit->bindParam(':item_description',$description);
    $stmit->bindParam(':item_brand',$brand);
    $stmit->bindParam(':item_subcategory',$subcatgory);

    $stmit->execute();

    if($stmit->rowCount()){
        header("location:items_list.php");
    }else{
        echo "error";
    }
?>