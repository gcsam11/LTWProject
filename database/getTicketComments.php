<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM TICKET_ANSWER WHERE ticket_id = :ticket_id');
    $stmt->bindParam(':ticket_id', $ticketid);
    $stmt->execute();
    $comment = $stmt->fetchAll();

    foreach($comment as $ticketcomment){
        $userid = $ticketcomment['answer_id'];
        include 'fetchUser.php';

        echo '<div class="ticket_comments"><div class="ticket_comment_username_and_date"><span> By <a class="ticket_comment_username" href="profile_viewer.php?'.$ticketcomment['answer_id']. '">' . $row['username'] . '</a></span>
        <span class="ticket_comment_date">'. $ticketcomment['date'] .'</span></div><br>
        <span class="ticket_comment_text">'. $ticketcomment['answer'] .'</span></div>'; 
    }
?>