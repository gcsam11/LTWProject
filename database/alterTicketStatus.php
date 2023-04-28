<?php
    //Alter ticket status to Assigned
    
    $stmt = $db->prepare('UPDATE TICKET SET status = "Assigned" WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid);
    $stmt->execute();
?>
