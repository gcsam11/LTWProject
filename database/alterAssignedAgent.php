<?php
    $ticketid2 = $_GET['id'];
    if(!empty($_POST['agent']) && $_POST['agent'] != 'none'){
        include 'connection.php';
        $stmt = $db->prepare('UPDATE TICKET SET assigned_agent = :assigned_agent WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':assigned_agent', $_POST['agent']);
        $stmt->bindParam(':ticket_id', $ticketid2);
        $stmt->execute();
    }
    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>