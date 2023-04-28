<?php
    if(!empty($row3['department_id'])){
        $stmt2 = $db -> prepare('SELECT name FROM Department WHERE department_id = :department_id');
        $stmt2 -> bindParam(':department_id', $row3['department_id']);
        $stmt2 -> execute();
        $row2 = $stmt2 -> fetch();
        $ticketdepartment = $row2['name'];
    }
    else{
        $ticketdepartment = 'Not Assigned';
    }
?>