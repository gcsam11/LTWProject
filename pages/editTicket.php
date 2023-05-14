<?php 
    include '../database/checkSession.php';

    if($_SESSION['csrf'] !== $_POST['csrf']){
        header('Location:../pages/my_tickets.php');
    }

    if(!empty($_GET['id']) && is_numeric($_GET['id'])){
        include '../database/connection.php';
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id = :ticket_id');
        $stmt->bindParam(':ticket_id', $_GET['id']);
        $stmt->execute();
        $row55 = $stmt->fetch();
    }
    else{
        if($_POST['site'] == 'mytickets'){ header('Location:../pages/my_tickets.php');}
        else{header('Location:../pages/all_tickets.php');} 
    }
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Ticket: Edit</title>
        <link href="../css/editTicket.css" rel="stylesheet">
    </head>
    <body>
        <h1>Only the non-empty fields will be saved</h1>
            <div class="box">
                <form name="change" action=<?php echo '../database/ticket_changer.php?id='.$_GET['id'].''; ?> method="post">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']; ?>">
                
                    <div class="labels">
                        <label for="name">Title:</label>
                        <input type="text" placeholder="<?php echo $row55['title'] ?>" name="name"><br><br>

                        <label for="description">Description:</label>
                        <input type="text" placeholder="" name="description"><br><br>

                        <label for="priority">Priority:</label>
                        <select id="priority" name="priority">
                            <option value="None">---</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select><br><br>
                        
                    </div>
                    <div class="buttons">
                        <button type="submit" class="savebtn">Save</button>
                    </div>
                </form>

                <div class="buttons">
                    <a href= <?php 
                    if($_POST['site'] == 'mytickets')
                        {echo 'my_tickets.php';}
                    else{
                        echo 'all_tickets.php';
                    } ?>
                    class="cancelbtn">Cancel</a>
                </div>
            </div>
    </body>
</html>