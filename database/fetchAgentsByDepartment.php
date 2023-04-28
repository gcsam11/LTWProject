<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM User WHERE (type = "Agent" or type="Admin") AND department_id = :department_id');
    $stmt->bindParam(':department_id', $row3['department_id']);
    $stmt->execute();

    while($row10 = $stmt->fetch()){
        if($isTicket && $userid == $row10['user_id']){
            continue;
        }
        echo "<option value='".$row10['user_id']."'>".$row10['name']."</option>";
    }

?>