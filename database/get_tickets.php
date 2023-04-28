<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM Ticket'); //adicionar filtro
    $stmt->execute();

    while($row = $stmt -> fetch()){
        
        echo '<h2><a class="ticket_readmore" href="../pages/ticket.php?id=' . $row['ticket_id'] . '">' . $row['title'] . '</a></h2>';
        echo '<div class="ticket">';
        $stmt2 = $db -> prepare('SELECT username FROM User WHERE user_id = :user_id');
        $stmt2 -> bindParam(':user_id', $row['user_id']);
        $stmt2 -> execute();
        $row2 = $stmt2 -> fetch();
        echo '<div class="ticket_username_and_date"> <span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profile_viewer.php?id=' .$row['user_id'] . '">' . $row2['username'] . '</a> </span> <br> <span class="ticket_date">' . $row['date'] . ' </span></div><br>';
        echo '<span class="ticket_description">' . $row['description'] . '</span>';
        echo '</div>';
    }
?>
