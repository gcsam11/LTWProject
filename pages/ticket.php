<?php 
    include '../database/checkSession.php';
    include '../database/fetchTicket.php';

    $ticketid = $_GET['id'];
    $userid = $row3['user_id'];
    $status = $row3['status'];

    include '../database/fetchUser.php';

    if(!empty($row3['assigned_agent']) && ($status == 'Open')){
        include '../database/alterTicketStatus.php'; //alter Ticket status to assigned;
        $status = 'Assigned';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<title><?php echo $row3['title'] ?></title>
	<link rel="stylesheet" href="../css/ticket.css">
</head>
    <body>
        <a class="backbtn" href="../pages/all_tickets.php"> <- Back</a>
        <header>
            <h1><?php echo $row3['title'] ?></h1>
            <hr>
        </header>

        <div class="ticket_content">
            <div class="ticket_info">
                <div class="ticket_username_and_date">
                    <span class="ticket_username"> By <a class="ticket_username_link" href="../pages/profile_viewer.php?id=<?php echo $row3['user_id'] ?>"><?php echo $row['username'] ?></a> </span>
                    <span class="ticket_date"> <?php echo $row3['date'] ?> </span>
                </div>
                <br><br>
                <div class="ticket_more_info">
                    <?php
                        include '../database/getTicketDepartment.php';
                        echo '<div class="ticket_department"> Department: ' . $ticketdepartment;

                        if(($_SESSION['type'] != 'Client') && ($status != 'Closed')){

                            echo '<form action="../database/alterTicketDepartment.php?id=' . $ticketid . '" method="post">';
                            echo '<select id="department" name="department">
						    <option value="none">---</option>';

                            include '../database/fetchDepartments.php';

						    echo '<option value="not_assigned">Not Assigned</option></select>';
                            echo '<button type="submit" class="changeticketdepbtn">Change</button></form>';
                        };
                        echo '</div>';

                        echo '<div class="assigned_agent"';
                        if(!empty($row3['assigned_agent'])){

                            echo '<br>Assigned to: <a class="ticket_username_link" href="../pages/profile_viewer.php?id=' . $row3['assigned_agent'] . '">';
                            $agentid = $row3['assigned_agent'];

                            include '../database/getAssignedAgent.php';

                            echo $assignedagent['username'];
                            echo '</a>';

                            if((($row3['assigned_agent'] == $_SESSION['user_id']) || ($_SESSION['type'] == 'Admin')) && ($status != 'Closed')){
                                echo '<a class="deassign" href="../database/deassign.php?id='. $ticketid .'">Deassign</a>'; //remove Assigned Agent
                            }
                        }
                        else{
                            echo '<br><br>Assigned to: Not Assigned';

                            if(($_SESSION['type'] != 'Client') && ($status != 'Closed')){
                                if($ticketdepartment == 'Not Assigned'){

                                    echo '<form action="../database/alterAssignedAgent.php?id=' . $ticketid . '" method="post">';
                                    echo '<select id="agent" name="agent">
                                    <option value="none">---</option>';

                                    $isTicket = true;
                                    include '../database/fetchAgents.php';

                                    echo '<option value="not_assigned">Not Assigned</option></select>';
                                    echo '<button type="submit" class="changeassignedagentbtn">Change</button></form>';

                                }
                                else{

                                    echo '<form action="../database/alterAssignedAgent.php?id=' . $ticketid . '" method="post">';
                                    echo '<select id="agent" name="agent">
                                    <option value="none">---</option>';

                                    $isTicket = true;
                                    include '../database/fetchAgentsByDepartment.php';

                                    echo '<option value="not_assigned">Not Assigned</option></select>';
                                    echo '<button type="submit" class="changeassignedagentbtn">Change</button></form>';
                                } //alterAssignedAgent
                            }
                        }
                        echo '</div>';

                        echo '<br><div class="ticket_status"> Status: ' . $status;
                        if((($row3['assigned_agent'] == $_SESSION['user_id']) || $_SESSION['type'] == 'Admin') && $status != 'Closed'){
                            echo '<a class="closeticket" href="../database/closeTicket.php?id=' . $ticketid . '">Close Ticket</a>';//close Ticket and remove possibility to comment
                        }
                        if((($row3['assigned_agent'] == $_SESSION['user_id']) || $_SESSION['type'] == 'Admin') && $status == 'Closed'){
                            echo '<a class="reopenticket" href="../database/reopenTicket.php?id=' . $ticketid . '">Reopen Ticket</a>';//close Ticket and remove possibility to comment
                        }
                        echo '</div>';
                    ?>
        
                    <br>
                    <div class="priority"> Priority: <?php echo $row3['priority'] ?></div>
                </div>
            </div>

            <br>
            <div class="ticket_description_container">
                <div class="ticket_description">
                    <?php echo $row3['description'] ?>
                </div>
            </div>
        </div>

        <!-- Ticket Comments -->
    </body>
</html>