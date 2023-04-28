<?php
    $ticketid2 = $_GET['id'];
    include 'connection.php';

    $stmt = $db->prepare('UPDATE TICKET SET assigned_agent = NULL WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->execute();

    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>