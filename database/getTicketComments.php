<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM TICKET_ANSWER WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid);
    $stmt->execute();
    $comment = $stmt->fetchAll();

    echo '<div class="ticket_comments">';

    foreach($comment as $ticketcomment){
        $userid = $ticketcomment['answer_id'];
        include 'fetchUser.php';

        echo '<span class="ticket_comment_username"> By <a href="profile_viewer.php?'.$ticketcomment['answer_id']. '">' . $row['username'] . '</a></span><br>
        <span class="ticket_comment_date">'. $ticketcomment['date'] .'</span><br>
        <span class="ticket_comment_text">'. $ticketcomment['answer'] .'</span><br><br>'; 
    }

    echo '</div>';
?>