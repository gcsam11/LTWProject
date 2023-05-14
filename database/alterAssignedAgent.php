<?php
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(is_numeric($_GET['id'])){
        $ticketid2 = $_GET['id'];
    }
    else{
        header('Location:../pages/my_tickets.php');
    }

    $date = date("Y-m-d");

    if(!empty($_POST['agent']) && $_POST['agent'] != 'none'){
        if ( !preg_match ("/^[a-zA-Z\s]+$/", $_POST['agent'])) {

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
    }

    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>