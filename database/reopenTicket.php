<?php
    $ticketid2 = $_GET['id'];
    $date = date("Y-m-d");
    include 'connection.php';
    session_start();

    $stmt = $db->prepare('UPDATE TICKET SET status = "Open" WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->execute();

    $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Ticket Reopened")');
    $stmt->bindParam(':ticket_id', $ticketid2);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>