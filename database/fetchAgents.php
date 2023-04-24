<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM User WHERE type = "Agent"');
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo "<option value='".$row['user_id']."'>".$row['name']."</option>";
    }

?>