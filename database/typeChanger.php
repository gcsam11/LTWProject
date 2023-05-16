<?php 
    include 'connection.php';

    if ( $_GET['type'] && is_numeric($_GET['id'])) {
        
        $stmt = $db->prepare('UPDATE USER SET type=:type WHERE user_id = :user_id');
        $stmt->bindParam(':type', $_GET['type']);
        $stmt->bindParam(':user_id', $_GET['id']);
        $stmt->execute();
        
    }
    header('Location: ../pages/profile_viewer.php?id=' . $_GET['id']);
?>