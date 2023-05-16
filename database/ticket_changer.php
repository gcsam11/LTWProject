<?php
    include 'connection.php';
    $date = date("Y-m-d");
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!empty($_GET['id']) && is_numeric($_GET['id'])){
        if(!empty($_POST['name']) && (strlen($_POST['name']) <= 255)){
            $stmt = $db->prepare('UPDATE TICKET SET title = :title WHERE ticket_id = :ticket_id');
            $stmt->bindParam(':title', $_POST['name']);
            $stmt->bindParam(':ticket_id', $_GET['id']);
            $stmt->execute();
        }
        if(!empty($_POST['description']) && (strlen($_POST['description']) <= 1000)){
            $stmt = $db->prepare('UPDATE TICKET SET description = :description WHERE ticket_id = :ticket_id');
            $stmt->bindParam(':description', $_POST['description']);
            $stmt->bindParam(':ticket_id', $_GET['id']);
            $stmt->execute();
        }
        if(!empty($_POST['priority']) && $_POST['priority'] != 'None'){
            $stmt = $db->prepare('UPDATE TICKET SET priority = :priority WHERE ticket_id = :ticket_id');
            $stmt->bindParam(':priority', $_POST['priority']);
            $stmt->bindParam(':ticket_id', $_GET['id']);
            $stmt->execute();
        }
        if(!empty($_POST['hashtag']) && (strlen($_POST['hashtag']) <=255)){
            $stmt = $db->prepare('UPDATE TICKET SET hashtag = :hashtag WHERE ticket_id = :ticket_id');
            $stmt->bindParam(':hashtag', $_POST['hashtag']);
            $stmt->bindParam(':ticket_id', $_GET['id']);
            $stmt->execute();
        }

        $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Ticket Edited")');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }
    
    header('Location: ../pages/ticket.php?id='.$_GET['id'].'');
    
?>
