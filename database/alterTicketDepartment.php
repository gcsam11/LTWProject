<?php 
    $ticketid2 = $_GET['id'];
    $date = date("Y-m-d");
    session_start();

    if(!empty($_POST['department']) && ($_POST['department'] != 'none')){
        if($_POST['department'] == 'not_assigned'){
            $_POST['department'] = NULL;
        }

        include 'connection.php';

        $stmt = $db->prepare('UPDATE TICKET SET department_id = :department_id WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':department_id', $_POST['department']);
        $stmt->bindParam(':ticket_id', $ticketid2);
        $stmt->execute();

        $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Department Changed")');
        $stmt->bindParam(':ticket_id', $ticketid2);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

    }
    header('Location:../pages/ticket.php?id='.$ticketid2.'');
    exit;
?>