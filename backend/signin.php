<?php 
session_start();
    include 'dbconnect.php';

    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    
    $sql= "SELECT users.*, roles.name as role_name FROM users INNER JOIN model ON users.id=model.user_id INNER JOIN roles ON model.role_id=roles.id WHERE email=:user_email AND password=:user_password"; 
    $stmit=$pdo->prepare($sql);
    $stmit->bindParam(':user_email', $email);
    $stmit->bindParam(':user_password', $password);
    $stmit->execute();
    $data=$stmit->fetch(PDO::FETCH_ASSOC);

    if($data){
        $_SESSION['login_user']= $data;
        if($_SESSION['login_user']){
            header("location:index.php");
        }
        else{
            header("location:login.php");
        }
    }
    else{
        header("location:login.php");
    }
?>