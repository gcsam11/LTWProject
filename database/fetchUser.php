<?php
    include 'connection.php';

    $stmt = $db -> prepare('SELECT * FROM User WHERE user_id = :user_id');
    $stmt -> bindParam(':user_id', $_GET['id']);
    $stmt -> execute();
    $row = $stmt -> fetch();

    include 'getUserDepartment.php';
?>