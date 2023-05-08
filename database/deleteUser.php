<?php
    include 'connection.php';

    if(!empty($_GET['id'])){
        $stmt = $db->prepare('DELETE FROM USER WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $_GET['id']);
        $stmt->execute();
    }

    header('Location: ../pages/userlist.php');
?>