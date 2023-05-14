<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM User WHERE (type = "Agent" OR type = "Admin")');
    $stmt->execute();

    while($row10 = $stmt->fetch()){
        if($isTicket && ($userid == $row10['user_id'])){
            continue;
        }
        echo "<option value='".$row10['user_id']."'>".$row10['name']."</option>";
    }

?>