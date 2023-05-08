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

        echo '<h2><a class="ticket_readmore" href="../pages/ticket.php?id=' . $row['ticket_id'] . '">' . $row['title'] . '</a></h2>
        <div class="ticket">
        <div class="ticket_main_info"> <span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profile_viewer.php?id=' .$row['user_id'] . '">' . $row2['username'] . '</a></span>
        <span class="ticket_status">' . $row['status'] . '</span>
        <span class="ticket_date">' . $row['date'] . ' </span>';

        if(($_SESSION['type'] == 'Admin') || ($_SESSION['user_id'] == $row['user_id'])){

            echo '<div class ="btns">';

            echo '<form class ="editbtnform" action="../pages/editTicket.php?id='.$row['ticket_id'].'" method="POST">
            <input type="hidden" name="site" value="mytickets">
            <button type="submit" id="edit_btn"> Edit </button></form>';
            
            echo '<form class="deletebtnform" action="../database/deleteTicket.php" method="POST"> 
            <input type="hidden" name="site" value="mytickets">
            <input type="hidden" name="id" value=' . $row['ticket_id'] .'>
            <button type="submit" id="delete_btn"> Delete </button> </form></div>';

        }
        echo '</div></div>';
    }
?>