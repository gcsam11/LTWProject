<?php
    if(is_numeric($_GET['id'])){
        $ticketid2 = $_GET['id'];
    }
    else{
        header('Location:../pages/my_tickets.php');
    }
    
    $date = date("Y-m-d");
    include 'connection.php';
    session_start();

    $stmt = $db->prepare('UPDATE TICKET SET assigned_agent = NULL WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->execute();

    $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Agent Deassigned")');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>