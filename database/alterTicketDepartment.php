<?php 
    $ticketid2 = $_GET['id'];
    if(!empty($_POST['department']) && ($_POST['department'] != 'none')){
        if($_POST['department'] == 'not_assigned'){
            $_POST['department'] = NULL;
        }

        include 'connection.php';

        $stmt = $db->prepare('UPDATE TICKET SET department_id = :department_id WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':department_id', $_POST['department']);
        $stmt->bindParam(':ticket_id', $ticketid2);
        $stmt->execute();

    }
    header('Location:../pages/ticket.php?id='.$ticketid2.'');
    exit;
?>