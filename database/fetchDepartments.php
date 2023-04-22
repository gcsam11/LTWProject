<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM DEPARTMENT');
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo "<option value='".$row['department_id']."'>".$row['name']."</option>";
    }

?>