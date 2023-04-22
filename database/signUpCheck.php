<?php 
    include 'connection.php';
    $type = 'client';

    if(!empty($_POST)){
        if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['username']) && isset($_POST['name'])){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $name = $_POST['name'];
            $plaintext_password = $_POST['pass'];
        }
        else{
            header('Location:../pages/sign_up.php');
        }
    
        include 'checkUserExistence.php';
    
        if($aux){
            $hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
    
            $stmt = $db->prepare('INSERT INTO User (name, username, email, password, type) VALUES (:name, :username, :email, :password, :type)');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hash);
            $stmt->bindParam(':type', $type);
            $stmt->execute();
        }
        else{
            header('Location:../pages/sign_up.php');
        }
    
        header('Location:../pages/login.php');
    }
    else{
        header('Location:../pages/sign_up.php');
    }
?>