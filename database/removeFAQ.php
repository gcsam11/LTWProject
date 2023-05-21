<?php
    include 'connection.php';
    session_start();

    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/index.php');
    }

    if(!empty($_POST['faq']) && ($_POST['faq'] != 'none')){
        $faq = $_POST['faq'];

        $stmt = $db->prepare('DELETE FROM FAQ WHERE faq_id = :faq_id');
        $stmt->bindParam(':faq_id', $faq);
        $stmt->execute();

    }

    header('Location:../pages/editFAQ.php');

?>