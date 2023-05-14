<?php 
    include 'connection.php';
    session_start();
    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!empty($_POST['department']) && ($_POST['department'] != 'none')){

        $stmt = $db -> prepare('DELETE FROM DEPARTMENT WHERE department_id = :department_id');
        $stmt -> bindParam(':department_id', $_POST['department']);
        $stmt -> execute();

    }

    header('Location:../pages/editDepartment.php');

?>
