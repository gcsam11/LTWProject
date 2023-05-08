<?php
    //Alter ticket status to Assigned
    $date = date("Y-m-d");
    session_start();
    
    $stmt = $db->prepare('UPDATE TICKET SET status = "Assigned" WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid);
    $stmt->execute();

    $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Ticket Status Assigned")');
    $stmt->bindParam(':ticket_id', $ticketid);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

?>
