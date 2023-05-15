<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM FAQ');
    $stmt->execute();

    while($result = $stmt -> fetch()){
        echo '<h2 class="question">'.$result['question'].'</h2>';
        echo '<span class="answer">'.$result['answer'].'</span>';
    }

?>