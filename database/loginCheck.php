<?php 
    include 'connection.php';

    if(!empty($_GET['email']) && !empty($_GET['pass'])){
        $usermail = $_GET['email'];
        $plaintext_password = $_GET['pass'];
    }
    else{
        header('Location:../login.php');
    }

    include 'EmailUsernameCheck.php';

    if($isUsername){
        $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
        $stmt->execute(array($usermail));
    }
    else{
        $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
        $stmt->execute(array($usermail));
    }
    
    $row = $stmt->fetch();

    if($row){
        $hash = $row['password'];
    }
    else{
        header('Location:../login.php');
    }

    $verify = password_verify($plaintext_password, $hash);

    if($verify){
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username']; 
        $_SESSION['email'] = $row['email'];
        $_SESSION['gender'] = $row['gender']; 
        $_SESSION['type'] = $row['type']; 
        echo 'Logging In!';
        header('Location:../my_tickets.php');
    }
?>