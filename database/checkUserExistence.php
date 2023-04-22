<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM User WHERE email = :email AND username = :username');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        $aux = true;
    }
    else{
        echo '<script>alert("An account with this username/email already exists!")</script>';
        header('Location:../pages/sign_up.php');
        $aux = false;
    }
?>