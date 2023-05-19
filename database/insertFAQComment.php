<?php
    include 'connection.php';
    session_start();

    if(!empty($_POST['faq'])){
        $stmt = $db->prepare('SELECT answer FROM FAQ WHERE faq_id = :faq_id');
        $stmt->bindParam(':faq_id', $_POST['faq']);
        $stmt->execute();
        $faqanswer = $stmt -> fetch();

        $date = date("Y-m-d");

        $stmt = $db->prepare('INSERT INTO TICKET_ANSWER (ticket_id, answer, date, answer_id) VALUES (:ticket_id, :answer, :date, :answer_id)');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->bindParam(':answer', $faqanswer['answer']);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':answer_id', $_SESSION['user_id']);
        $stmt->execute();

        $stmt=$db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Comment Inserted (FAQ)")');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    header('Location:../pages/ticket.php?id='.$_GET['id']);
?>