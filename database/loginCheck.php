<?php 
    include 'connection.php';

    session_start();

    if(!empty($_POST)){
        if(isset($_POST['username']) && isset($_POST['pass'])){
            $user = $_POST['username'];
            $plaintext_password = $_POST['pass'];
        }
        else{
            header('Location:../pages/login.php');
        }
    
    
        $stmt = $db->prepare('SELECT * FROM User WHERE username = :username');
        $stmt->bindParam(':username', $user);
        $stmt->execute();  
        
        $row = $stmt->fetch();

        if($row != false){
            $hash = $row['password'];
        }
        else{
            $hash = '';
        }
    
        $verify = password_verify($plaintext_password, $hash);
    
        if($verify){
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username']; 
            $_SESSION['email'] = $row['email'];
            $_SESSION['gender'] = $row['gender']; 
            $_SESSION['type'] = $row['type']; 
            header('Location:../pages/my_tickets.php');
        }
        else{
            header('Location:../pages/login.php');
        }
    }
    else{
        header('Location:../pages/login.php');
    }
?>