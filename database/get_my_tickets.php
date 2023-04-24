<?php
    include 'connection.php';

    $stmt = $db->prepare('SELECT * FROM Ticket WHERE user_id = :user_id'); //adicionar filtro
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();

    $stmt2 = $db -> prepare('SELECT username FROM User WHERE user_id = :user_id');
    $stmt2 -> bindParam(':user_id', $_SESSION['user_id']);
    $stmt2 -> execute();
    $row2 = $stmt2 -> fetch();

    while($row = $stmt -> fetch()){
        echo '<h2><a class="ticket_readmore" href="../pages/ticket.php?id=' . $row['ticket_id'] . '">' . $row['title'] . '</a></h2>';
        echo '<span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profile_viewer.php?id=' . $row['user_id'] . '">' . $row2['username'] . '</a> on ' . $row['date'] . ' </span><br>';
        echo '<span class="ticket_description">' . $row['description'] . '</span>';
    }
?>