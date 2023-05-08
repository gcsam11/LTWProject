<?php
    include 'connection.php';

    if(!empty($_POST['id']) && !empty($_POST['site'])){
        $ticketid = $_POST['id'];
        
        $stmt = $db->prepare('DELETE FROM Ticket WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':ticket_id', $ticketid);
        $stmt->execute();

        if($_POST['site'] == 'mytickets'){
            header('Location: ../pages/my_tickets.php');
        }
        else if($_POST['site'] == 'alltickets'){
            header('Location: ../pages/all_tickets.php');
        }
    }
    
?>