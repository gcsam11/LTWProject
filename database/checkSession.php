<?php 
    include_once('database/connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        $profile = 'Profile';
    }
    else{
        $profile = $_SESSION['username'];
    }

?>
