<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM FAQ');
    $stmt->execute();

    while($row = $stmt->fetch()){
        echo '<option value="'.$row['faq_id'].'">'.$row['question'].'</option>';
    }

?>