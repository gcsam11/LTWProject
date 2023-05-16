<?php 
    include 'connection.php';

    if(file_exists('../json/filter_content.json')){
        $data = file_get_contents('../json/filter_content.json');
        $tickets=json_decode($data);

        if($site == 'my_tickets'){
                foreach($tickets as $ticket){
                    echo '<h2><a class="ticket_readmore" href="../pages/ticket.php?id=' . $ticket->ticket_id . '">' . $ticket->title . '</a></h2>
                    <div class="ticket">
                    <div class="ticket_main_info"> <span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profile_viewer.php?id=' . $_SESSION['user_id'] . '">' . $_SESSION['username'] . '</a></span>
                    <span class="ticket_status">' . $ticket->status . '</span>
                    <span class="ticket_date">' . $ticket->date . ' </span>';

                    if(($_SESSION['type'] == 'Admin') || ($_SESSION['user_id'] == $ticket->user_id)){

                        echo '<div class ="btns">';

                        echo '<form class ="editbtnform" action="../pages/editTicket.php?id='.$ticket->ticket_id.'" method="POST">
                        <input type="hidden" name="csrf" value="' . $_SESSION['csrf'] . '">
                        <input type="hidden" name="site" value="mytickets">
                        <button type="submit" id="edit_btn"> Edit </button></form>';
                        
                        echo '<form class="deletebtnform" action="../database/deleteTicket.php" method="POST"> 
                        <input type="hidden" name="csrf" value="' . $_SESSION['csrf'] . '">
                        <input type="hidden" name="site" value="mytickets">
                        <input type="hidden" name="id" value=' . $ticket->ticket_id .'>
                        <button type="submit" id="delete_btn"> Delete </button> </form></div>';

                    }
                    echo '</div></div>';
                }
        }
        else{
            foreach($tickets as $ticket){
                $stmt = $db->prepare('SELECT username FROM USER WHERE user_id = :user_id');
                $stmt->bindParam(':user_id', $ticket->user_id);
                $stmt->execute();
                $user = $stmt->fetch();
                echo '<h2><a class="ticket_readmore" href="../pages/ticket.php?id=' . $ticket->ticket_id . '">' . $ticket->title . '</a></h2>
                <div class="ticket">
                <div class="ticket_main_info"> <span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profile_viewer.php?id=' .$ticket->user_id . '">' . $user['username'] . '</a></span>
                <span class="ticket_status">' . $ticket->status . '</span>
                <span class="ticket_date">' . $ticket->date . ' </span>';

                if(($_SESSION['type'] == 'Admin') || ($_SESSION['user_id'] == $ticket->user_id)){

                    echo '<div class ="btns">';

                    echo '<form class ="editbtnform" action="../pages/editTicket.php?id='.$ticket->ticket_id.'" method="POST">
                    <input type="hidden" name="csrf" value="' . $_SESSION['csrf'] . '">
                    <input type="hidden" name="site" value="mytickets">
                    <button type="submit" id="edit_btn"> Edit </button></form>';
                    
                    echo '<form class="deletebtnform" action="../database/deleteTicket.php" method="POST"> 
                    <input type="hidden" name="csrf" value="' . $_SESSION['csrf'] . '">
                    <input type="hidden" name="site" value="mytickets">
                    <input type="hidden" name="id" value=' . $ticket->ticket_id .'>
                    <button type="submit" id="delete_btn"> Delete </button> </form></div>';

                }
                echo '</div></div>';
            }
        }
    }
?>