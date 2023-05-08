<?php
    include 'connection.php';
    $exists = true;
    if(!empty($_POST['department'])){
        $stmt = $db -> prepare('SELECT name FROM DEPARTMENT');
        $stmt -> execute();
        while($row50 = $stmt -> fetch()){
            if($_POST['department'] == $row50['name']){
                $exists = false;
                break;
            }
        }
        if($exists){
            $stmt = $db -> prepare('INSERT INTO DEPARTMENT (name) VALUES (:name)');
            $stmt -> bindParam(':name', $_POST['department']);
            $stmt -> execute();
        }
        
        header('Location:../pages/editDepartment.php');
    }
?>