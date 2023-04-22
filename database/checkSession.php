<?php 
    session_start();
    if(isset($_SESSION['username'])){
        $profile = $_SESSION['username'];
    }
    else{
        header('Location:../index.php');
    }

?>
