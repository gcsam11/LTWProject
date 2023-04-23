<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM Ticket'); //adicionar filtro
    $stmt->execute();

    while($row = $stmt -> fetch()){
        echo '<h2><a class="ticket_readmore" href="../pages/ticket.php?id=' . $row['ticket_id'] . '">' . $row['title'] . '</a></h2>';
        $stmt2 = $db -> prepare('SELECT username FROM User WHERE user_id = :user_id');
        $stmt2 -> bindParam(':user_id', $row['user_id']);
        $stmt2 -> execute();
        $row2 = $stmt2 -> fetch();
        echo '<span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profileviewer.php?id=' .$row['user_id'] . '">' . $row2['username'] . '</a> on ' . $row['date'] . ' </span><br>';
        echo '<span class="ticket_description">' . $row['description'] . '</span>';
    }
?>