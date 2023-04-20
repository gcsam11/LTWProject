<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        $profile = 'Profile';
        //header('Location: index.php');
    }
    else{
        $profile = $_SESSION['username'];
    }

?>
