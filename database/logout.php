<?php
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }
    $_SESSION = array(); 
    session_destroy();
    header('Location: ../index.php');
?>