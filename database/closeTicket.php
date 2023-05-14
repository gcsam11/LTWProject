<?php
    if(is_numeric($_GET['id'])){
        $ticketid2 = $_GET['id'];
    }
    else{
        header('Location:../pages/my_tickets.php');
    }
    
    $date = date("Y-m-d");
    session_start();
    include 'connection.php';

    $stmt = $db->prepare('UPDATE TICKET SET status = "Closed" WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->execute();
    
    $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Ticket Closed")');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    
    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>