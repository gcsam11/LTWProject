<?php 
    include 'connection.php';
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/faq.php');
    }

    if((!empty($_POST['question']) && (strlen($_POST['question']) <= 255)) && (!empty($_POST['answer']) && (strlen($_POST['answer']) <= 1000))){
        $stmt = $db->prepare('INSERT INTO FAQ (question, answer) VALUES (:question, :answer)');
        $stmt->bindParam(':question', $_POST['question']);
        $stmt->bindParam(':answer', $_POST['answer']);
        $stmt->execute();
    }

    header('Location:../pages/faq.php');
?>