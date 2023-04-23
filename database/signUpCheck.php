<?php 
    include 'connection.php';

    if(!empty($_POST)){
        if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['username']) && isset($_POST['name'])){
            if(strlen($_POST['name']) < 255 && strlen($_POST['username']) < 8 && strlen($_POST['email']) < 255 && strlen($_POST['pass']) < 255){
                $email = $_POST['email'];
                $username = $_POST['username'];
                $name = $_POST['name'];
                $plaintext_password = $_POST['pass'];

                include 'checkUserExistence.php';
    
                if($aux){
                    $hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
    
                    $stmt = $db->prepare('INSERT INTO User (name, username, email, password) VALUES (:name, :username, :email, :password)');
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $hash);
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
        }
        else{
            header('Location:../pages/sign_up.php');
        }
    }
    else{
        header('Location:../pages/sign_up.php');
    }
?>