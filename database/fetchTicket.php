<?php
    include 'connection.php';

    if(!empty($_GET['id'])){
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->execute();
        $row3 = $stmt->fetch(); 
    }
    else{
        header('Location:../pages/all_tickets.php');
    }
?>