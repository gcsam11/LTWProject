<?php
    if(!empty($row['department_id'])){
        $stmt2 = $db -> prepare('SELECT name FROM Department WHERE department_id = :department_id');
        $stmt2 -> bindParam(':department_id', $row['department_id']);
        $stmt2 -> execute();
        $row2 = $stmt2 -> fetch();
        $department = $row2['name'];
    }
    else{
        $department = 'Not Assigned';
    }
?>