<?php
    include 'connection.php';
    session_start();

    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!empty($_POST)){
        if((strlen($_POST['subject']) < 255 && isset($_POST['subject'])) && (strlen($_POST['description']) <= 1000 && isset($_POST['description']))){
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $date = date("Y-m-d");

            if(($_POST['department'] == "0") && ($_POST['priority'] == "none")){
                $stmt = $db->prepare('INSERT INTO Ticket (title, description, user_id, date, hashtag) VALUES (:subject, :description, :user_id, :date, :hashtag)');
                $stmt->bindParam(':subject', $subject);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':date', $date);
                $stmt->execute();
            }

            else if($_POST['department'] == "0"){
                $priority = $_POST['priority'];
                $stmt = $db->prepare('INSERT INTO Ticket (title, priority, description, user_id, date) VALUES (:subject, :priority, :description, :user_id, :date)');
                $stmt->bindParam(':subject', $subject);
                $stmt->bindParam(':priority', $priority);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':date', $date);
                $stmt->execute();
            }

            else if($_POST['priority'] == "none"){
                $department = $_POST['department'];
                $stmt = $db->prepare('INSERT INTO Ticket (title, department_id, description, user_id, date) VALUES (:subject, :department_id, :description, :user_id, :date)');
                $stmt->bindParam(':subject', $subject);
                $stmt->bindParam(':department_id', $department);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':date', $date);
                $stmt->execute();
            }

            else{
                $department = $_POST['department'];
                $priority = $_POST['priority'];
                $stmt = $db->prepare('INSERT INTO Ticket (title, department_id, priority, description, user_id, date) VALUES (:subject, :department_id, :priority, :description, :user_id, :date)');
                $stmt->bindParam(':subject', $subject);
                $stmt->bindParam(':department_id', $department);
                $stmt->bindParam(':priority', $priority);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':date', $date);
                $stmt->execute();
            }

            $ticket_id = $db->lastInsertId();

            $stmt = $db->prepare('INSERT INTO TICKET_CHANGES (ticket_id, user_id, date, type) VALUES (:ticket_id, :user_id, :date, "Ticket Creation")');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':date', $date);
            $stmt->execute();

            if(!empty($_POST['hashtag']) && (strlen($_POST['hashtag']) <= 255)){
                $hashtag = $_POST['hashtag'];
                $stmt = $db->prepare('UPDATE TICKET SET hashtag = :hashtag WHERE ticket_id = :ticket_id ');
                $stmt->bindParam(':hashtag', $hashtag);
                $stmt->bindParam(':ticket_id', $ticket_id);
                $stmt->execute();
            }

            header('Location:../pages/my_tickets.php');
        }
        else{
            header('Location:../pages/create_tickets.php');
        }
    }
?>