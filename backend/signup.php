<?php
session_start();
include 'dbconnect.php';
    $name=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $rp_password=$_POST['rp_password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $photo=$_FILES['photo'];

    $_SESSION['old_name']=$name;
	$_SESSION['old_email']=$email;
	$_SESSION['old_phone']=$phone;
	$_SESSION['old_password']=$password;
	$_SESSION['old_rp_password']=$rp_password;
	$_SESSION['old_address']=$address;

	$basepath = "img/users/";
	$fullpath = $basepath.$photo['name'];
    move_uploaded_file($photo['tmp_name'], $fullpath);

    if($name==null || $email==null || $password==null || $rp_password==null || $phone==null || $address==null || $photo['size']==0){
        if($photo['size']==0){
            $_SESSION['profile_error_msg']="Profile Picture is require!";
        }else if($name==null){
            $_SESSION['name_error_msg']="User Name is require!";
        }
        else if($email==null){
            $_SESSION['email_error_msg']="Email is require!";
        }
        else if($password==null){
            $_SESSION['Password_error_msg']="Password is require!";
        }
        else if($rp_password==null){
            $_SESSION['rp_password_error_msg']="Password need to confirm!";
        }
        else if($phone==null){
            $_SESSION['phone_error_msg']="Phone Number is require!";
        }
        else{
            $_SESSION['address_error_msg']="Address is require!";
        }
        header("location:register.php");
    }elseif($password!=$rp_password){
        $_SESSION['Password_error_msg']="Password does not match";
        header("location:register.php");
    }
    else{
        $password=sha1($password);
        $sql = "INSERT INTO users (name,profile,email,password,phone,address) VALUES(:name,:profile,:email,:password,:phone,:address)";
		$stmt=$pdo->prepare($sql);
		$stmt->bindParam(':name',$name);
		$stmt->bindParam(':profile',$fullpath);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->bindParam(':phone',$phone);
		$stmt->bindParam(':address',$address);
		$stmt->execute();
		if ($stmt->rowCount()) {
			header("location:login.php");
		}else {
			echo "Error";
		}
    }
   
    $sql="SELECT * FROM users ORDER BY id DESC LIMIT 1";
    $stmit=$pdo->prepare($sql);
    $stmit->execute();
    $user=$stmit->fetch(PDO::FETCH_ASSOC);
    $user_id=$user['id'];
    $role_id=1;

    $sql="INSERT INTO model (user_id, role_id) VALUES(:user_id,:role_id)";
    $stmit=$pdo->prepare($sql);
    $stmit->bindParam(':user_id', $user_id);
    $stmit->bindParam(':role_id',$role_id);
    $stmit->execute();
    if ($stmt->rowCount()) {
        header("location:login.php");
    }else {
        echo "Error";
    }
?>