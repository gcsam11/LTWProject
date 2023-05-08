<?php
    $ticketid2 = $_GET['id'];
    $date = date("Y-m-d");
    session_start();

    if(!empty($_POST['agent']) && $_POST['agent'] != 'none'){
        include 'connection.php';
        $stmt = $db->prepare('UPDATE TICKET SET assigned_agent = :assigned_agent WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':assigned_agent', $_POST['agent']);
        $stmt->bindParam(':ticket_id', $ticketid2);
        $stmt->execute();

        $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Agent Assigned")');
        $stmt->bindParam(':ticket_id', $ticketid2);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        
    }

    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>