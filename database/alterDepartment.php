<?php
    include 'connection.php';

    if(!is_numeric($_GET['id'])){
        header('Location:../pages/all_tickets.php');
    }

    if(!empty($_POST['department'])){
        if($_POST['department'] == 'none'){
            $stmt = $db->prepare('UPDATE USER SET department_id = NULL WHERE user_id = :user_id');
            $stmt->bindParam(':user_id', $_GET['id']);
            $stmt->execute();
        }
        else{
            $stmt = $db->prepare('UPDATE USER SET department_id = :department_id WHERE user_id = :user_id');
            $stmt->bindParam(':department_id', $_POST['department']);
            $stmt->bindParam(':user_id', $_GET['id']);
            $stmt->execute();
        }
    }

    header('Location:../pages/profile_viewer.php?id='.$_GET['id']);
?>