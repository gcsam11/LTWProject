<?php
    include 'connection.php';
    session_start();

    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!is_numeric($_GET['id'])){
        header('Location:../pages/my_tickets.php');
    }

    $date = date("Y-m-d");

    if(!empty($_POST['comment']) && (strlen($_POST['comment']) <= 1000)){
        $stmt = $db->prepare('INSERT INTO TICKET_ANSWER (ticket_id, answer_id, answer, date) VALUES (:ticket_id, :answer_id, :answer, :date)');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->bindParam(':answer_id', $_SESSION['user_id']);
        $stmt->bindParam(':answer', $_POST['comment']);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Comment Inserted")');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    header('Location:../pages/ticket.php?id=' . $_GET['id'] . '');
?>
