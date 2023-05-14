<?php 
    if(is_numeric($_GET['id'])){
        $ticketid2 = $_GET['id'];
    }
    else{
        header('Location:../pages/my_tickets.php');
    }

    $date = date("Y-m-d");
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!empty($_POST['department']) && ($_POST['department'] != 'none')){
        if(!preg_match ("/^[a-zA-Z\s]+$/", $_POST['department'])){
            if($_POST['department'] == 'not_assigned'){
                $department2 = NULL;
            }
            else{
                $department2 = $_POST['department'];
            }
            include 'connection.php';

            $stmt = $db->prepare('UPDATE TICKET SET department_id = :department_id WHERE ticket_id = :ticket_id');
            $stmt->bindParam(':department_id', $department2);
            $stmt->bindParam(':ticket_id', $ticketid2);
            $stmt->execute();

            $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Department Changed")');
            $stmt->bindParam(':ticket_id', $ticketid2);
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->bindParam(':date', $date);
            $stmt->execute();
        }
    }
    header('Location:../pages/ticket.php?id='.$ticketid2.'');
?>